<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\TravelDocument;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserOwnsDocument
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $documentId = $request->route('travelDocument');
        
        if ($documentId) {
            $document = TravelDocument::findOrFail($documentId);
            
            if ($document->user_id !== auth()->id()) {
                abort(403, 'You do not have permission to access this document.');
            }
        }

        return $next($request);
    }
}