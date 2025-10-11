@extends('layouts.app')

@section('title', 'Edit Document - Travel Locker')

@section('styles')
<style>
.edit-page {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    min-height: 100vh;
    padding: 2rem 0;
}

.edit-container {
    max-width: 600px;
    margin: 0 auto;
}

.edit-header {
    text-align: center;
    color: white;
    margin-bottom: 2rem;
}

.edit-header h1 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    text-shadow: 0 2px 4px rgba(0,0,0,0.3);
}

.edit-card {
    background: white;
    border-radius: 20px;
    padding: 2.5rem;
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
}

.current-file {
    background: #f8fafc;
    border: 2px solid #e5e7eb;
    border-radius: 15px;
    padding: 1.5rem;
    margin-bottom: 2rem;
}

.file-info {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.file-icon {
    width: 50px;
    height: 50px;
    background: #667eea;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
}

.file-details h6 {
    margin: 0;
    color: #374151;
    font-weight: 600;
}

.file-details small {
    color: #6b7280;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-label {
    font-weight: 600;
    color: #374151;
    margin-bottom: 0.5rem;
}

.form-control, .form-select {
    border: 2px solid #e5e7eb;
    border-radius: 10px;
    padding: 0.75rem 1rem;
    transition: border-color 0.2s ease;
}

.form-control:focus, .form-select:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

.btn-save {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    color: white;
    padding: 0.75rem 2rem;
    border-radius: 50px;
    font-weight: 600;
    width: 100%;
    transition: transform 0.2s ease;
}

.btn-save:hover {
    transform: translateY(-2px);
    color: white;
}

.btn-cancel {
    background: #f3f4f6;
    color: #374151;
    border: 2px solid #e5e7eb;
    padding: 0.75rem 2rem;
    border-radius: 50px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    transition: all 0.2s ease;
    width: 100%;
    margin-bottom: 1rem;
}

.btn-cancel:hover {
    background: #e5e7eb;
    color: #374151;
    text-decoration: none;
}

.category-icons {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
    gap: 1rem;
    margin-top: 1rem;
}

.category-option {
    text-align: center;
    padding: 1rem;
    border: 2px solid #e5e7eb;
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.2s ease;
    background: white;
}

.category-option:hover {
    border-color: #667eea;
    background: #f0f4ff;
}

.category-option.selected {
    border-color: #667eea;
    background: #e0e7ff;
}

.category-option i {
    font-size: 2rem;
    color: #6b7280;
    margin-bottom: 0.5rem;
}

.category-option.selected i {
    color: #667eea;
}

.category-option span {
    display: block;
    font-size: 0.85rem;
    font-weight: 500;
    color: #374151;
}

.security-notice {
    background: #f0f9ff;
    border: 1px solid #bae6fd;
    border-radius: 10px;
    padding: 1rem;
    margin-top: 1.5rem;
}

.security-notice i {
    color: #0284c7;
    margin-right: 0.5rem;
}

.security-notice small {
    color: #0369a1;
}

@media (max-width: 768px) {
    .edit-card {
        padding: 1.5rem;
        margin: 0 1rem;
    }
    
    .category-icons {
        grid-template-columns: repeat(2, 1fr);
    }
}
</style>
@endsection

@section('content')
<div class="edit-page">
    <div class="container">
        <div class="edit-container">
            <!-- Header -->
            <div class="edit-header">
                <h1><i class="fas fa-edit me-3"></i>Edit Document</h1>
                <p>Update your document information</p>
            </div>

            <!-- Edit Form -->
            <div class="edit-card">
                <!-- Current File Info -->
                <div class="current-file">
                    <div class="file-info">
                        <div class="file-icon">
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
                        <div class="file-details">
                            <h6>{{ $travelDocument->file_name }}</h6>
                            <small>{{ $travelDocument->file_size_human }} • {{ $travelDocument->file_type }}</small>
                        </div>
                    </div>
                </div>

                <form method="POST" action="{{ route('travel-locker.update', $travelDocument) }}">
                    @csrf
                    @method('PUT')
                    
                    <!-- Document Details -->
                    <div class="form-group">
                        <label for="title" class="form-label">Document Title *</label>
                        <input type="text" class="form-control" id="title" name="title" 
                               value="{{ old('title', $travelDocument->title) }}" placeholder="e.g., Passport Copy, Flight Ticket" required>
                        @error('title')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" 
                                  placeholder="Optional description of the document">{{ old('description', $travelDocument->description) }}</textarea>
                        @error('description')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Document Category *</label>
                        <div class="category-icons">
                            @foreach($categories as $key => $label)
                                <div class="category-option {{ old('category', $travelDocument->category) == $key ? 'selected' : '' }}" 
                                     data-category="{{ $key }}">
                                    @switch($key)
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
                                    <span>{{ $label }}</span>
                                </div>
                            @endforeach
                        </div>
                        <input type="hidden" name="category" id="categoryInput" value="{{ old('category', $travelDocument->category) }}" required>
                        @error('category')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="expiry_date" class="form-label">Expiry Date</label>
                        <input type="date" class="form-control" id="expiry_date" name="expiry_date" 
                               value="{{ old('expiry_date', $travelDocument->expiry_date?->format('Y-m-d')) }}" 
                               min="{{ date('Y-m-d') }}">
                        <small class="text-muted">Optional - for documents with expiration dates</small>
                        @error('expiry_date')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Security Notice -->
                    <div class="security-notice">
                        <i class="fas fa-shield-alt"></i>
                        <small>Your document will remain encrypted and stored securely. Only you can access it.</small>
                    </div>

                    <!-- Action Buttons -->
                    <a href="{{ route('travel-locker.show', $travelDocument) }}" class="btn-cancel">
                        <i class="fas fa-times me-2"></i>Cancel
                    </a>
                    
                    <button type="submit" class="btn btn-save">
                        <i class="fas fa-save me-2"></i>Save Changes
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const categoryOptions = document.querySelectorAll('.category-option');
    const categoryInput = document.getElementById('categoryInput');

    // Category selection
    categoryOptions.forEach(option => {
        option.addEventListener('click', () => {
            categoryOptions.forEach(opt => opt.classList.remove('selected'));
            option.classList.add('selected');
            categoryInput.value = option.dataset.category;
        });
    });

    // Set initial category
    const initialCategory = categoryInput.value;
    if (initialCategory) {
        const selectedOption = document.querySelector([data-category="${initialCategory}"]);
        if (selectedOption) {
            selectedOption.classList.add('selected');
        }
    }
});
</script>
@endsection
