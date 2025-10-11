@extends('layouts.app')

@section('title', 'Travel Locker - WanLanka')

@section('styles')
<style>
    .travel-locker {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        padding-top: 2rem;
        padding-bottom: 3rem;
    }

    .locker-header {
        text-align: center;
        color: white;
        margin-bottom: 2.5rem;
    }

    .locker-header h1 {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        text-shadow: 0 2px 4px rgba(0,0,0,0.3);
    }

    .locker-header p {
        font-size: 1.2rem;
        opacity: 0.9;
    }

    .stat-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 15px;
        padding: 1.5rem;
        text-align: center;
        color: white;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
    }

    .controls {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .documents-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 1.5rem;
    }

    .document-card {
        background: white;
        border-radius: 15px;
        padding: 1.5rem;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: all 0.2s ease;
        border: 1px solid #e2e8f0;
    }

    .document-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.15);
    }

    .document-icon {
        width: 50px;
        height: 50px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: white;
    }

    .document-icon.passport { background: #4f46e5; }
    .document-icon.visa { background: #059669; }
    .document-icon.booking { background: #dc2626; }
    .document-icon.medical { background: #db2777; }
    .document-icon.emergency { background: #ea580c; }
    .document-icon.valuables { background: #92400e; }
    .document-icon.other { background: #6b7280; }

    .btn-upload {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        color: white;
        padding: 0.75rem 2rem;
        border-radius: 50px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: transform 0.2s ease;
    }

    .btn-upload:hover {
        transform: translateY(-2px);
        color: white;
        text-decoration: none;
    }

    .empty-state {
        text-align: center;
        color: #6b7280;
        padding: 4rem 2rem;
    }

    .empty-state i {
        font-size: 4rem;
        opacity: 0.5;
        margin-bottom: 1rem;
    }

    .empty-state h3 {
        font-size: 1.5rem;
        color: #374151;
    }

    @media (max-width: 768px) {
        .documents-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

@section('content')
<div class="travel-locker">
    <div class="container">
       <!-- Fixed Top Center Header -->
<div class="text-center py-4 bg-gradient" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
    <h1 class="text-white fw-bold mb-2" style="font-size: 2.5rem;">
        <i class="fas fa-lock me-2"></i>Travel Locker
    </h1>
    <p class="text-white opacity-75 mb-0">Secure storage for your important travel documents</p>
</div>

        <!-- Stats -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="stat-number">{{ $documents->total() }}</div>
                    <div>Total Documents</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="stat-number">{{ $documents->where('category', 'passport')->count() }}</div>
                    <div>Passports/IDs</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="stat-number">{{ $documents->where('category', 'booking')->count() }}</div>
                    <div>Bookings</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="stat-number">{{ $documents->where('is_expired', true)->count() }}</div>
                    <div>Expired</div>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="controls">
            <form method="GET" action="{{ route('travel-locker.filter') }}" class="row g-3 align-items-end">
                <div class="col-md-6">
                    <label for="search" class="form-label">Search</label>
                    <input type="text" name="search" id="search" class="form-control" value="{{ request('search') }}" placeholder="Search by title or description...">
                </div>
                <div class="col-md-4">
                    <label for="category" class="form-label">Category</label>
                    <select name="category" id="category" class="form-select">
                        <option value="">All Categories</option>
                        @foreach($categories as $key => $label)
                            <option value="{{ $key }}" {{ request('category') == $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 d-grid">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-filter me-1"></i> Filter</button>
                </div>
            </form>
        </div>

        <!-- Upload Button -->
        <div class="d-flex justify-content-between align-items-center my-3">
            <a href="{{ route('travel-locker.create') }}" class="btn-upload">
                <i class="fas fa-upload me-2"></i>Upload New Document
            </a>
            <div class="text-white">
                <i class="fas fa-shield-alt me-1"></i> All documents are encrypted and securely stored.
            </div>
        </div>

        <!-- Alerts -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Document Grid -->
        @if($documents->count())
            <div class="documents-grid">
                @foreach($documents as $document)
                    <div class="document-card">
                        <div class="d-flex align-items-start mb-3">
                            <div class="document-icon {{ $document->category }}">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <div class="ms-3">
                                <h5 class="mb-1">{{ $document->title }}</h5>
                                <small class="text-muted text-uppercase">{{ $document->category_label }}</small>
                            </div>
                        </div>
                        <p>{{ \Illuminate\Support\Str::limit($document->description, 100) }}</p>
                        <div class="d-flex justify-content-between text-muted mb-2">
                            <small><i class="fas fa-calendar me-1"></i>{{ $document->created_at->format('M d, Y') }}</small>
                            @if($document->expiry_date)
                                @if($document->is_expired)
                                    <span class="badge bg-danger">Expired</span>
                                @else
                                    <small>Expires: {{ $document->expiry_date->format('M d, Y') }}</small>
                                @endif
                            @endif
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('travel-locker.show', $document) }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-eye me-1"></i>View
                            </a>
                            <a href="{{ route('travel-locker.download', $document) }}" class="btn btn-sm btn-outline-success">
                                <i class="fas fa-download me-1"></i>Download
                            </a>
                            <a href="{{ route('travel-locker.edit', $document) }}" class="btn btn-sm btn-outline-warning">
                                <i class="fas fa-edit me-1"></i>Edit
                            </a>
                            <form method="POST" action="{{ route('travel-locker.destroy', $document) }}" onsubmit="return confirm('Delete this document?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-trash me-1"></i>Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-4 d-flex justify-content-center">
                {{ $documents->appends(request()->query())->links() }}
            </div>
        @else
            <div class="empty-state">
                <i class="fas fa-folder-open"></i>
                <h3>No documents found</h3>
                <p>Start by uploading your first travel document to keep it safe and accessible.</p>
                <a href="{{ route('travel-locker.create') }}" class="btn-upload mt-3">
                    <i class="fas fa-plus me-2"></i>Upload Document
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
