@extends('layouts.app')

@section('title', 'Upload Document - Travel Locker')

@section('styles')
<style>
.upload-page {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    min-height: 100vh;
    padding: 2rem 0;
}

.upload-container {
    max-width: 600px;
    margin: 0 auto;
}

.upload-header {
    text-align: center;
    color: white;
    margin-bottom: 2rem;
}

.upload-header h1 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    text-shadow: 0 2px 4px rgba(0,0,0,0.3);
}

.upload-card {
    background: white;
    border-radius: 20px;
    padding: 2.5rem;
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    border: 1px solid rgba(255,255,255,0.2);
}

.upload-area {
    border: 2px dashed #d1d5db;
    border-radius: 15px;
    padding: 3rem 2rem;
    text-align: center;
    margin-bottom: 2rem;
    transition: all 0.3s ease;
    cursor: pointer;
    background: #f9fafb;
}

.upload-area:hover {
    border-color: #667eea;
    background: #f0f4ff;
}

.upload-area.dragover {
    border-color: #667eea;
    background: #e0e7ff;
    transform: scale(1.02);
}

.upload-icon {
    font-size: 3rem;
    color: #9ca3af;
    margin-bottom: 1rem;
}

.upload-text {
    font-size: 1.1rem;
    color: #374151;
    margin-bottom: 0.5rem;
}

.upload-subtext {
    color: #6b7280;
    font-size: 0.9rem;
}

.file-input {
    display: none;
}

.file-preview {
    background: #f3f4f6;
    border-radius: 10px;
    padding: 1rem;
    margin-bottom: 1.5rem;
    display: none;
}

.file-preview.show {
    display: block;
}

.file-info {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.file-icon {
    width: 40px;
    height: 40px;
    background: #667eea;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
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

.btn-upload {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    color: white;
    padding: 0.75rem 2rem;
    border-radius: 50px;
    font-weight: 600;
    width: 100%;
    transition: transform 0.2s ease;
}

.btn-upload:hover {
    transform: translateY(-2px);
    color: white;
}

.btn-upload:disabled {
    opacity: 0.6;
    cursor: not-allowed;
    transform: none;
}

.upload-progress {
    margin-top: 1rem;
}

.progress {
    height: 8px;
    border-radius: 4px;
    background: #e5e7eb;
    overflow: hidden;
}

.progress-bar {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    transition: width 0.3s ease;
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

@media (max-width: 768px) {
    .upload-card {
        padding: 1.5rem;
        margin: 0 1rem;
    }
    
    .upload-area {
        padding: 2rem 1rem;
    }
    
    .category-icons {
        grid-template-columns: repeat(2, 1fr);
    }
}
</style>
@endsection

@section('content')
<div class="upload-page">
    <div class="container">
        <div class="upload-container">
            <!-- Header -->
            <div class="upload-header">
                <h1><i class="fas fa-upload me-3"></i>Upload Document</h1>
                <p>Add a new document to your secure travel locker</p>
            </div>

            <!-- Upload Form -->
            <div class="upload-card">
                <form method="POST" action="{{ route('travel-locker.store') }}" enctype="multipart/form-data" id="uploadForm">
                    @csrf
                    
                    <!-- File Upload Area -->
                    <div class="upload-area" id="uploadArea">
                        <div class="upload-icon">
                            <i class="fas fa-cloud-upload-alt"></i>
                        </div>
                        <div class="upload-text">Click to upload or drag and drop</div>
                        <div class="upload-subtext">PDF, JPG, PNG, DOC, DOCX, TXT (Max 10MB)</div>
                        <input type="file" name="document" id="fileInput" class="file-input" accept=".pdf,.jpg,.jpeg,.png,.gif,.doc,.docx,.txt" required>
                    </div>

                    <!-- File Preview -->
                    <div class="file-preview" id="filePreview">
                        <div class="file-info">
                            <div class="file-icon">
                                <i class="fas fa-file"></i>
                            </div>
                            <div class="file-details">
                                <h6 id="fileName">No file selected</h6>
                                <small id="fileSize">0 KB</small>
                            </div>
                        </div>
                    </div>

                    <!-- Document Details -->
                    <div class="form-group">
                        <label for="title" class="form-label">Document Title *</label>
                        <input type="text" class="form-control" id="title" name="title" 
                               value="{{ old('title') }}" placeholder="e.g., Passport Copy, Flight Ticket" required>
                        @error('title')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" 
                                  placeholder="Optional description of the document">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Document Category *</label>
                        <div class="category-icons">
                            @foreach($categories as $key => $label)
                                <div class="category-option" data-category="{{ $key }}">
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
                        <input type="hidden" name="category" id="categoryInput" value="{{ old('category') }}" required>
                        @error('category')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="expiry_date" class="form-label">Expiry Date</label>
                        <input type="date" class="form-control" id="expiry_date" name="expiry_date" 
                               value="{{ old('expiry_date') }}" min="{{ date('Y-m-d') }}">
                        <small class="text-muted">Optional - for documents with expiration dates</small>
                        @error('expiry_date')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Security Notice -->
                    <div class="security-notice">
                        <i class="fas fa-shield-alt"></i>
                        <small>Your document will be encrypted and stored securely. Only you can access it.</small>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-upload" id="submitBtn" disabled>
                        <i class="fas fa-upload me-2"></i>Upload Document
                    </button>
                    
                    <!-- Progress Bar -->
                    <div class="upload-progress" id="uploadProgress" style="display: none;">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 0%"></div>
                        </div>
                        <small class="text-muted">Uploading document...</small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const uploadArea = document.getElementById('uploadArea');
    const fileInput = document.getElementById('fileInput');
    const filePreview = document.getElementById('filePreview');
    const fileName = document.getElementById('fileName');
    const fileSize = document.getElementById('fileSize');
    const submitBtn = document.getElementById('submitBtn');
    const categoryOptions = document.querySelectorAll('.category-option');
    const categoryInput = document.getElementById('categoryInput');

    // File upload handling
    uploadArea.addEventListener('click', () => {
        console.log('Upload area clicked');
        fileInput.click();
    });
    
    uploadArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        e.stopPropagation();
        console.log('Drag over detected');
        uploadArea.classList.add('dragover');
    });
    
    uploadArea.addEventListener('dragenter', (e) => {
        e.preventDefault();
        e.stopPropagation();
        console.log('Drag enter detected');
        uploadArea.classList.add('dragover');
    });
    
    uploadArea.addEventListener('dragleave', (e) => {
        e.preventDefault();
        e.stopPropagation();
        console.log('Drag leave detected');
        uploadArea.classList.remove('dragover');
    });
    
    uploadArea.addEventListener('drop', (e) => {
        e.preventDefault();
        e.stopPropagation();
        console.log('Drop detected');
        uploadArea.classList.remove('dragover');
        
        const files = e.dataTransfer.files;
        console.log('Files dropped:', files.length);
        
        if (files.length > 0) {
            fileInput.files = files;
            handleFileSelect();
        }
    });

    fileInput.addEventListener('change', handleFileSelect);

    function handleFileSelect() {
        console.log('handleFileSelect called');
        const file = fileInput.files[0];
        console.log('Selected file:', file);
        
        if (file) {
            console.log('File details:', {
                name: file.name,
                size: file.size,
                type: file.type
            });
            
            fileName.textContent = file.name;
            fileSize.textContent = formatFileSize(file.size);
            filePreview.classList.add('show');
            submitBtn.disabled = false;
            
            // Update file icon based on type
            const fileIcon = filePreview.querySelector('.file-icon i');
            const extension = file.name.split('.').pop().toLowerCase();
            
            if (['jpg', 'jpeg', 'png', 'gif'].includes(extension)) {
                fileIcon.className = 'fas fa-image';
            } else if (extension === 'pdf') {
                fileIcon.className = 'fas fa-file-pdf';
            } else if (['doc', 'docx'].includes(extension)) {
                fileIcon.className = 'fas fa-file-word';
            } else {
                fileIcon.className = 'fas fa-file';
            }
            
            console.log('File preview updated');
        } else {
            console.log('No file selected');
        }
    }

    function formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    }

    // Category selection
    categoryOptions.forEach(option => {
        option.addEventListener('click', () => {
            console.log('Category clicked:', option.dataset.category);
            categoryOptions.forEach(opt => opt.classList.remove('selected'));
            option.classList.add('selected');
            categoryInput.value = option.dataset.category;
            console.log('Category input value set to:', categoryInput.value);
        });
    });

    // Set initial category if old input exists
    if (categoryInput.value) {
        const selectedOption = document.querySelector(`[data-category="${categoryInput.value}"]`);
        if (selectedOption) {
            selectedOption.classList.add('selected');
        }
    }

    // Form validation and upload progress
    document.getElementById('uploadForm').addEventListener('submit', function(e) {
        if (!fileInput.files.length || !categoryInput.value) {
            e.preventDefault();
            alert('Please select a file and category before uploading.');
            return;
        }
        
        // Show progress bar
        const progressDiv = document.getElementById('uploadProgress');
        const progressBar = progressDiv.querySelector('.progress-bar');
        const submitBtn = document.getElementById('submitBtn');
        
        progressDiv.style.display = 'block';
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Uploading...';
        
        // Simulate progress (since we can't track real progress with regular form submission)
        let progress = 0;
        const interval = setInterval(() => {
            progress += Math.random() * 15;
            if (progress > 90) progress = 90;
            progressBar.style.width = progress + '%';
        }, 200);
        
        // Clear interval after form submission
        setTimeout(() => {
            clearInterval(interval);
            progressBar.style.width = '100%';
        }, 2000);
    });
});
</script>
@endsection
