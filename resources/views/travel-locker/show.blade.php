@extends('layouts.app')

@section('title', $travelDocument->title . ' - Travel Locker')

@section('styles')
<style>
.document-view {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    min-height: 100vh;
    padding: 2rem 0;
}

.document-container {
    max-width: 800px;
    margin: 0 auto;
}

.document-header {
    text-align: center;
    color: white;
    margin-bottom: 2rem;
}

.document-header h1 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    text-shadow: 0 2px 4px rgba(0,0,0,0.3);
}

.document-card {
    background: white;
    border-radius: 20px;
    padding: 2.5rem;
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    margin-bottom: 2rem;
}

.document-info {
    display: flex;
    align-items: flex-start;
    gap: 2rem;
    margin-bottom: 2rem;
}

.document-icon {
    width: 80px;
    height: 80px;
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2.5rem;
    color: white;
    flex-shrink: 0;
}

.document-icon.passport { background: linear-gradient(135deg, #4f46e5, #7c3aed); }
.document-icon.visa { background: linear-gradient(135deg, #059669, #0d9488); }
.document-icon.booking { background: linear-gradient(135deg, #dc2626, #ea580c); }
.document-icon.medical { background: linear-gradient(135deg, #db2777, #be185d); }
.document-icon.emergency { background: linear-gradient(135deg, #ea580c, #dc2626); }
.document-icon.valuables { background: linear-gradient(135deg, #7c2d12, #92400e); }
.document-icon.other { background: linear-gradient(135deg, #6b7280, #4b5563); }

.document-details h2 {
    font-size: 1.8rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 0.5rem;
}

.document-category {
    font-size: 1rem;
    color: #6b7280;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 1rem;
}

.document-description {
    color: #4b5563;
    font-size: 1.1rem;
    line-height: 1.6;
    margin-bottom: 1.5rem;
}

.document-meta {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.meta-item {
    background: #f8fafc;
    padding: 1rem;
    border-radius: 10px;
    border-left: 4px solid #667eea;
}

.meta-label {
    font-size: 0.85rem;
    color: #6b7280;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 0.25rem;
}

.meta-value {
    font-size: 1rem;
    font-weight: 600;
    color: #374151;
}

.expired-badge {
    background: #fee2e2;
    color: #dc2626;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

.expiring-soon {
    background: #fef3c7;
    color: #d97706;
}

.document-actions {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
    justify-content: center;
    margin-bottom: 2rem;
}

.btn-action {
    padding: 0.75rem 1.5rem;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.2s ease;
    border: none;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

.btn-download {
    background: linear-gradient(135deg, #3b82f6, #1d4ed8);
    color: white;
}

.btn-download:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
    color: white;
    text-decoration: none;
}

.btn-edit {
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
}

.btn-edit:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(245, 158, 11, 0.3);
    color: white;
    text-decoration: none;
}

.btn-delete {
    background: linear-gradient(135deg, #ef4444, #dc2626);
    color: white;
}

.btn-delete:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(239, 68, 68, 0.3);
    color: white;
    text-decoration: none;
}

.btn-back {
    background: #f3f4f6;
    color: #374151;
    border: 2px solid #e5e7eb;
}

.btn-back:hover {
    background: #e5e7eb;
    color: #374151;
    text-decoration: none;
}

.file-preview {
    background: #f8fafc;
    border: 2px dashed #d1d5db;
    border-radius: 15px;
    padding: 3rem;
    text-align: center;
    margin-bottom: 2rem;
}

.file-preview-icon {
    font-size: 4rem;
    color: #9ca3af;
    margin-bottom: 1rem;
}

.file-preview-text {
    font-size: 1.2rem;
    color: #6b7280;
    margin-bottom: 0.5rem;
}

.file-preview-subtext {
    color: #9ca3af;
    font-size: 0.9rem;
}

.security-notice {
    background: #f0f9ff;
    border: 1px solid #bae6fd;
    border-radius: 15px;
    padding: 1.5rem;
    text-align: center;
}

.security-notice i {
    font-size: 2rem;
    color: #0284c7;
    margin-bottom: 1rem;
}

.security-notice h4 {
    color: #0369a1;
    margin-bottom: 0.5rem;
}

.security-notice p {
    color: #0369a1;
    margin: 0;
}

@media (max-width: 768px) {
    .document-info {
        flex-direction: column;
        text-align: center;
    }
    
    .document-meta {
        grid-template-columns: 1fr;
    }
    
    .document-actions {
        flex-direction: column;
    }
    
    .btn-action {
        width: 100%;
        justify-content: center;
    }
}
</style>
@endsection

@section('content')
<div class="document-view">
    <div class="container">
        <div class="document-container">
            <!-- Header -->
            <div class="document-header">
                <h1><i class="fas fa-file-alt me-3"></i>{{ $travelDocument->title }}</h1>
                <p>Document Details & Actions</p>
            </div>

            <!-- Document Card -->
            <div class="document-card">
                <!-- Document Info -->
                <div class="document-info">
                    <div class="document-icon {{ $travelDocument->category }}">
                        @switch($travelDocument->category)
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
                    <div class="document-details">
                        <h2>{{ $travelDocument->title }}</h2>
                        <div class="document-category">{{ $travelDocument->category_label }}</div>
                        @if($travelDocument->description)
                            <div class="document-description">{{ $travelDocument->description }}</div>
                        @endif
                    </div>
                </div>

                <!-- Document Metadata -->
                <div class="document-meta">
                    <div class="meta-item">
                        <div class="meta-label">File Name</div>
                        <div class="meta-value">{{ $travelDocument->file_name }}</div>
                    </div>
                    <div class="meta-item">
                        <div class="meta-label">File Size</div>
                        <div class="meta-value">{{ $travelDocument->file_size_human }}</div>
                    </div>
                    <div class="meta-item">
                        <div class="meta-label">File Type</div>
                        <div class="meta-value">{{ $travelDocument->file_type }}</div>
                    </div>
                    <div class="meta-item">
                        <div class="meta-label">Uploaded</div>
                        <div class="meta-value">{{ $travelDocument->created_at->format('M d, Y \a\t g:i A') }}</div>
                    </div>
                    @if($travelDocument->expiry_date)
                        <div class="meta-item">
                            <div class="meta-label">Expiry Date</div>
                            <div class="meta-value">
                                {{ $travelDocument->expiry_date->format('M d, Y') }}
                                @if($travelDocument->is_expired)
                                    <span class="expired-badge">
                                        <i class="fas fa-exclamation-triangle"></i>
                                        Expired
                                    </span>
                                @elseif($travelDocument->expiry_date->diffInDays(now()) <= 30)
                                    <span class="expired-badge expiring-soon">
                                        <i class="fas fa-clock"></i>
                                        Expires Soon
                                    </span>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>

                <!-- File Preview -->
                <div class="file-preview">
                    <div class="file-preview-icon">
                        @php
                            $extension = pathinfo($travelDocument->file_name, PATHINFO_EXTENSION);
                        @endphp
                        @if(in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']))
                            <i class="fas fa-image"></i>
                        @elseif(strtolower($extension) === 'pdf')
                            <i class="fas fa-file-pdf"></i>
                        @elseif(in_array(strtolower($extension), ['doc', 'docx']))
                            <i class="fas fa-file-word"></i>
                        @else
                            <i class="fas fa-file"></i>
                        @endif
                    </div>
                    <div class="file-preview-text">{{ $travelDocument->file_name }}</div>
                    <div class="file-preview-subtext">{{ $travelDocument->file_size_human }} • {{ $travelDocument->file_type }}</div>
                </div>

                <!-- Actions -->
                <div class="document-actions">
                    <a href="{{ route('travel-locker.download', $travelDocument) }}" class="btn-action btn-download">
                        <i class="fas fa-download"></i>
                        Download Document
                    </a>
                    <a href="{{ route('travel-locker.edit', $travelDocument) }}" class="btn-action btn-edit">
                        <i class="fas fa-edit"></i>
                        Edit Details
                    </a>
                    <form method="POST" action="{{ route('travel-locker.destroy', $travelDocument) }}" 
                          style="display: inline;" 
                          onsubmit="return confirm('Are you sure you want to delete this document? This action cannot be undone.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-action btn-delete">
                            <i class="fas fa-trash"></i>
                            Delete Document
                        </button>
                    </form>
                </div>
            </div>

            <!-- Security Notice -->
            <div class="security-notice">
                <i class="fas fa-shield-alt"></i>
                <h4>Secure Storage</h4>
                <p>This document is encrypted and stored securely. Only you can access it through your account.</p>
            </div>

            <!-- Back Button -->
            <div class="text-center">
                <a href="{{ route('travel-locker.index') }}" class="btn-action btn-back">
                    <i class="fas fa-arrow-left"></i>
                    Back to Travel Locker
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
