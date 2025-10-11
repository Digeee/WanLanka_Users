@extends('layouts.app')

@section('title', 'Travel Locker - WanLanka')

@section('styles')
<style>
.travel-locker {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    min-height: 100vh;
    padding: 2rem 0;
}

.locker-header {
    text-align: center;
    color: white;
    margin-bottom: 3rem;
}

.locker-header h1 {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 1rem;
    text-shadow: 0 2px 4px rgba(0,0,0,0.3);
}

.locker-header p {
    font-size: 1.2rem;
    opacity: 0.9;
}

.locker-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
    margin-bottom: 3rem;
}

.stat-card {
    background: rgba(255,255,255,0.1);
    backdrop-filter: blur(10px);
    border-radius: 15px;
    padding: 1.5rem;
    text-align: center;
    color: white;
    border: 1px solid rgba(255,255,255,0.2);
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.stat-label {
    font-size: 0.9rem;
    opacity: 0.8;
}

.controls {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    margin-bottom: 2rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.search-filter {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
    align-items: end;
}

.search-group {
    flex: 1;
    min-width: 250px;
}

.filter-group {
    min-width: 200px;
}

.btn-upload {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    color: white;
    padding: 0.75rem 2rem;
    border-radius: 50px;
    font-weight: 600;
    text-decoration: none;
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
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    border: 1px solid #e2e8f0;
}

.document-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.15);
}

.document-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 1rem;
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
    margin-right: 1rem;
}

.document-icon.passport { background: linear-gradient(135deg, #4f46e5, #7c3aed); }
.document-icon.visa { background: linear-gradient(135deg, #059669, #0d9488); }
.document-icon.booking { background: linear-gradient(135deg, #dc2626, #ea580c); }
.document-icon.medical { background: linear-gradient(135deg, #db2777, #be185d); }
.document-icon.emergency { background: linear-gradient(135deg, #ea580c, #dc2626); }
.document-icon.valuables { background: linear-gradient(135deg, #7c2d12, #92400e); }
.document-icon.other { background: linear-gradient(135deg, #6b7280, #4b5563); }

.document-info {
    flex: 1;
}

.document-title {
    font-size: 1.1rem;
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 0.25rem;
}

.document-category {
    font-size: 0.85rem;
    color: #6b7280;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.document-description {
    color: #6b7280;
    font-size: 0.9rem;
    margin-bottom: 1rem;
    line-height: 1.4;
}

.document-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1rem;
    font-size: 0.8rem;
    color: #6b7280;
}

.document-actions {
    display: flex;
    gap: 0.5rem;
}

.btn-action {
    padding: 0.5rem 1rem;
    border-radius: 8px;
    text-decoration: none;
    font-size: 0.85rem;
    font-weight: 500;
    transition: all 0.2s ease;
    border: none;
    cursor: pointer;
}

.btn-view {
    background: #f3f4f6;
    color: #374151;
}

.btn-view:hover {
    background: #e5e7eb;
    color: #374151;
    text-decoration: none;
}

.btn-download {
    background: #dbeafe;
    color: #1d4ed8;
}

.btn-download:hover {
    background: #bfdbfe;
    color: #1d4ed8;
    text-decoration: none;
}

.btn-edit {
    background: #fef3c7;
    color: #d97706;
}

.btn-edit:hover {
    background: #fde68a;
    color: #d97706;
    text-decoration: none;
}

.btn-delete {
    background: #fee2e2;
    color: #dc2626;
}

.btn-delete:hover {
    background: #fecaca;
    color: #dc2626;
    text-decoration: none;
}

.empty-state {
    text-align: center;
    padding: 4rem 2rem;
    color: #6b7280;
}

.empty-state i {
    font-size: 4rem;
    margin-bottom: 1rem;
    opacity: 0.5;
}

.empty-state h3 {
    font-size: 1.5rem;
    margin-bottom: 1rem;
    color: #374151;
}

.expired-badge {
    background: #fee2e2;
    color: #dc2626;
    padding: 0.25rem 0.5rem;
    border-radius: 4px;
    font-size: 0.75rem;
    font-weight: 600;
}

@media (max-width: 768px) {
    .search-filter {
        flex-direction: column;
    }
    
    .search-group, .filter-group {
        min-width: 100%;
    }
    
    .documents-grid {
        grid-template-columns: 1fr;
    }
    
    .locker-header h1 {
        font-size: 2rem;
    }
}
</style>
@endsection

@section('content')
<div class="travel-locker">
    <div class="container">
        <!-- Header -->
        <div class="locker-header">
            <h1><i class="fas fa-lock me-3"></i>Travel Locker</h1>
            <p>Secure storage for your important travel documents</p>
        </div>

        <!-- Stats -->
        <div class="locker-stats">
            <div class="stat-card">
                <div class="stat-number">{{ $documents->total() }}</div>
                <div class="stat-label">Total Documents</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $documents->where('category', 'passport')->count() }}</div>
                <div class="stat-label">Passports/IDs</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $documents->where('category', 'booking')->count() }}</div>
                <div class="stat-label">Bookings</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $documents->where('is_expired', true)->count() }}</div>
                <div class="stat-label">Expired</div>
            </div>
        </div>

        <!-- Controls -->
        <div class="controls">
            <form method="GET" action="{{ route('travel-locker.filter') }}" class="search-filter">
                <div class="search-group">
                    <label for="search" class="form-label">Search Documents</label>
                    <input type="text" class="form-control" id="search" name="search" 
                           value="{{ request('search') }}" placeholder="Search by title or description...">
                </div>
                <div class="filter-group">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select" id="category" name="category">
                        <option value="">All Categories</option>
                        @foreach($categories as $key => $label)
                            <option value="{{ $key }}" {{ request('category') == $key ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex align-items-end">
                    <button type="submit" class="btn btn-outline-primary me-2">
                        <i class="fas fa-search me-1"></i>Filter
                    </button>
                    <a href="{{ route('travel-locker.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-times me-1"></i>Clear
                    </a>
                </div>
            </form>
            
            <div class="d-flex justify-content-between align-items-center mt-3">
                <div>
                    <a href="{{ route('travel-locker.create') }}" class="btn-upload">
                        <i class="fas fa-plus me-2"></i>Upload New Document
                    </a>
                </div>
                <div class="text-muted">
                    <i class="fas fa-shield-alt me-1"></i>
                    All documents are encrypted and stored securely
                </div>
            </div>
            
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
        </div>

        <!-- Documents Grid -->
        @if($documents->count() > 0)
            <div class="documents-grid">
                @foreach($documents as $document)
                    <div class="document-card">
                        <div class="document-header">
                            <div class="document-icon {{ $document->category }}">
                                @switch($document->category)
                                    @case('passport')
                                        <i class="fas fa-passport"></i>
                                        @break
                                    @case('visa')
                                        <i class="fas fa-file-contract"></i>
                                        @break
                                    @case('booking')
                                        <i class="fas fa-plane"></i>
                                        @break
                                    @case('medical')
                                        <i class="fas fa-heartbeat"></i>
                                        @break
                                    @case('emergency')
                                        <i class="fas fa-phone"></i>
                                        @break
                                    @case('valuables')
                                        <i class="fas fa-camera"></i>
                                        @break
                                    @default
                                        <i class="fas fa-file"></i>
                                @endswitch
                            </div>
                            <div class="document-info">
                                <div class="document-title">{{ $document->title }}</div>
                                <div class="document-category">{{ $document->category_label }}</div>
                            </div>
                        </div>
                        
                        @if($document->description)
                            <div class="document-description">
                                {{ \Illuminate\Support\Str::limit($document->description, 100) }}
                            </div>
                        @endif
                        
                        <div class="document-meta">
                            <span><i class="fas fa-file me-1"></i>{{ $document->file_size_human }}</span>
                            <span><i class="fas fa-calendar me-1"></i>{{ $document->created_at->format('M d, Y') }}</span>
                            @if($document->expiry_date && $document->is_expired)
                                <span class="expired-badge">Expired</span>
                            @elseif($document->expiry_date)
                                <span>Expires: {{ $document->expiry_date->format('M d, Y') }}</span>
                            @endif
                        </div>
                        
                        <div class="document-actions">
                            <a href="{{ route('travel-locker.show', $document) }}" class="btn-action btn-view" 
                               onclick="console.log('View clicked for document {{ $document->id }}')">
                                <i class="fas fa-eye me-1"></i>View
                            </a>
                            <a href="{{ route('travel-locker.download', $document) }}" class="btn-action btn-download"
                               onclick="console.log('Download clicked for document {{ $document->id }}')">
                                <i class="fas fa-download me-1"></i>Download
                            </a>
                            <a href="{{ route('travel-locker.edit', $document) }}" class="btn-action btn-edit"
                               onclick="console.log('Edit clicked for document {{ $document->id }}')">
                                <i class="fas fa-edit me-1"></i>Edit
                            </a>
                            <form method="POST" action="{{ route('travel-locker.destroy', $document) }}" 
                                  style="display: inline;" 
                                  onsubmit="return confirm('Are you sure you want to delete this document?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action btn-delete"
                                        onclick="console.log('Delete clicked for document {{ $document->id }}')">
                                    <i class="fas fa-trash me-1"></i>Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $documents->appends(request()->query())->links() }}
            </div>
        @else
            <div class="empty-state">
                <i class="fas fa-folder-open"></i>
                <h3>No documents found</h3>
                <p>Start by uploading your first travel document to keep it safe and accessible.</p>
                <a href="{{ route('travel-locker.create') }}" class="btn-upload mt-3">
                    <i class="fas fa-plus me-2"></i>Upload Your First Document
                </a>
            </div>
        @endif
    </div>
</div>
@endsection