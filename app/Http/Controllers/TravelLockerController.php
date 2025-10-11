<?php

namespace App\Http\Controllers;

use App\Models\TravelDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;

class TravelLockerController extends Controller
{
    public function index()
    {
        // Get user's documents using direct query
        $userId = Auth::id();
        $documents = TravelDocument::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        $categories = TravelDocument::getCategories();
        
        return view('travel-locker.index', compact('documents', 'categories'));
    }

    public function create()
    {
        $categories = TravelDocument::getCategories();
        return view('travel-locker.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'category' => 'required|in:passport,visa,booking,medical,emergency,valuables,other',
            'document' => 'required|file|max:10240|mimes:pdf,jpg,jpeg,png,gif,doc,docx,txt',
            'expiry_date' => 'nullable|date|after:today',
        ]);

        try {
            $file = $request->file('document');
            $fileName = time() . '_' . Str::slug($request->title) . '.' . $file->getClientOriginalExtension();
            $filePath = 'travel-documents/' . Auth::id() . '/' . $fileName;

            // Encrypt file content before storing
            $fileContent = file_get_contents($file);
            $encryptedContent = Crypt::encrypt($fileContent);

            // Store encrypted file in private storage
            Storage::disk('private')->put($filePath, $encryptedContent);

            TravelDocument::create([
                'user_id' => Auth::id(),
                'title' => $request->title,
                'description' => $request->description,
                'category' => $request->category,
                'file_path' => $filePath,
                'file_name' => $file->getClientOriginalName(),
                'file_size' => $file->getSize(),
                'file_type' => $file->getMimeType(),
                'is_encrypted' => true,
                'expiry_date' => $request->expiry_date,
            ]);

            Log::info('Document uploaded successfully', [
                'user_id' => Auth::id(),
                'document_title' => $request->title,
                'category' => $request->category
            ]);

            return redirect()->route('travel-locker.index')
                ->with('success', 'Document uploaded and encrypted successfully!');
                
        } catch (\Exception $e) {
            Log::error('Document upload failed', [
                'user_id' => Auth::id(),
                'error' => $e->getMessage()
            ]);
            
            return redirect()->back()
                ->with('error', 'Failed to upload document. Please try again.')
                ->withInput();
        }
    }

    public function show(TravelDocument $travelDocument)
    {
        // Ensure user can only view their own documents
        if ($travelDocument->user_id !== Auth::id()) {
            abort(403, 'You do not have permission to view this document.');
        }

        Log::info('Document viewed', [
            'user_id' => Auth::id(),
            'document_id' => $travelDocument->id,
            'document_title' => $travelDocument->title
        ]);

        return view('travel-locker.show', compact('travelDocument'));
    }

    public function edit(TravelDocument $travelDocument)
    {
        // Ensure user can only edit their own documents
        if ($travelDocument->user_id !== Auth::id()) {
            abort(403);
        }

        $categories = TravelDocument::getCategories();
        return view('travel-locker.edit', compact('travelDocument', 'categories'));
    }

    public function update(Request $request, TravelDocument $travelDocument)
    {
        // Ensure user can only update their own documents
        if ($travelDocument->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'category' => 'required|in:passport,visa,booking,medical,emergency,valuables,other',
            'expiry_date' => 'nullable|date|after:today',
        ]);

        $travelDocument->update([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'expiry_date' => $request->expiry_date,
        ]);

        Log::info('Document updated successfully', [
            'user_id' => Auth::id(),
            'document_id' => $travelDocument->id,
            'document_title' => $request->title
        ]);

        return redirect()->route('travel-locker.index')
            ->with('success', 'Document updated successfully!');
    }

    public function destroy(TravelDocument $travelDocument)
    {
        // Ensure user can only delete their own documents
        if ($travelDocument->user_id !== Auth::id()) {
            abort(403);
        }

        try {
            // Delete file from storage
            Storage::disk('private')->delete($travelDocument->file_path);

            $travelDocument->delete();

            Log::info('Document deleted successfully', [
                'user_id' => Auth::id(),
                'document_id' => $travelDocument->id,
                'document_title' => $travelDocument->title
            ]);

            return redirect()->route('travel-locker.index')
                ->with('success', 'Document deleted successfully!');
                
        } catch (\Exception $e) {
            Log::error('Document deletion failed', [
                'user_id' => Auth::id(),
                'document_id' => $travelDocument->id,
                'error' => $e->getMessage()
            ]);
            
            return redirect()->back()
                ->with('error', 'Failed to delete document. Please try again.');
        }
    }

    public function download(TravelDocument $travelDocument)
    {
        // Ensure user can only download their own documents
        if ($travelDocument->user_id !== Auth::id()) {
            abort(403);
        }

        if (!Storage::disk('private')->exists($travelDocument->file_path)) {
            abort(404, 'File not found');
        }

        try {
            // Get encrypted content and decrypt it
            $encryptedContent = Storage::disk('private')->get($travelDocument->file_path);
            $decryptedContent = Crypt::decrypt($encryptedContent);

            Log::info('Document downloaded successfully', [
                'user_id' => Auth::id(),
                'document_id' => $travelDocument->id,
                'document_title' => $travelDocument->title
            ]);

            return response($decryptedContent)
                ->header('Content-Type', $travelDocument->file_type)
                ->header('Content-Disposition', 'attachment; filename="' . $travelDocument->file_name . '"');
                
        } catch (\Exception $e) {
            Log::error('Document download failed', [
                'user_id' => Auth::id(),
                'document_id' => $travelDocument->id,
                'error' => $e->getMessage()
            ]);
            
            abort(500, 'Failed to download document. Please try again.');
        }
    }

    public function filter(Request $request)
    {
        $userId = Auth::id();
        $query = TravelDocument::where('user_id', $userId);

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        $documents = $query->orderBy('created_at', 'desc')->paginate(12);
        $categories = TravelDocument::getCategories();

        return view('travel-locker.index', compact('documents', 'categories'));
    }

    public function bulkDelete(Request $request)
    {
        $request->validate([
            'document_ids' => 'required|array',
            'document_ids.*' => 'exists:travel_documents,id'
        ]);

        $userId = Auth::id();
        $documents = TravelDocument::whereIn('id', $request->document_ids)
            ->where('user_id', $userId)
            ->get();

        $deletedCount = 0;
        foreach ($documents as $document) {
            try {
                Storage::disk('private')->delete($document->file_path);
                $document->delete();
                $deletedCount++;
            } catch (\Exception $e) {
                Log::error('Bulk delete failed for document', [
                    'user_id' => $userId,
                    'document_id' => $document->id,
                    'error' => $e->getMessage()
                ]);
            }
        }

        Log::info('Bulk delete completed', [
            'user_id' => $userId,
            'requested_count' => count($request->document_ids),
            'deleted_count' => $deletedCount
        ]);

        return redirect()->route('travel-locker.index')
            ->with('success', $deletedCount . ' documents deleted successfully!');
    }
}