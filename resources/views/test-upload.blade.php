<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Test</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .upload-area {
            border: 2px dashed #ccc;
            padding: 20px;
            text-align: center;
            margin: 20px 0;
            cursor: pointer;
        }
        .upload-area.dragover {
            border-color: #007bff;
            background-color: #f8f9fa;
        }
        .file-info {
            margin-top: 10px;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>File Upload Test</h1>
    
    <div class="upload-area" id="uploadArea">
        <p>Click to upload or drag and drop files here</p>
        <input type="file" id="fileInput" style="display: none;" multiple>
    </div>
    
    <div id="fileInfo" class="file-info" style="display: none;">
        <h3>Selected Files:</h3>
        <ul id="fileList"></ul>
    </div>
    
    <script>
        const uploadArea = document.getElementById('uploadArea');
        const fileInput = document.getElementById('fileInput');
        const fileInfo = document.getElementById('fileInfo');
        const fileList = document.getElementById('fileList');
        
        // Click to upload
        uploadArea.addEventListener('click', () => {
            console.log('Upload area clicked');
            fileInput.click();
        });
        
        // Drag and drop events
        uploadArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            e.stopPropagation();
            console.log('Drag over');
            uploadArea.classList.add('dragover');
        });
        
        uploadArea.addEventListener('dragenter', (e) => {
            e.preventDefault();
            e.stopPropagation();
            console.log('Drag enter');
            uploadArea.classList.add('dragover');
        });
        
        uploadArea.addEventListener('dragleave', (e) => {
            e.preventDefault();
            e.stopPropagation();
            console.log('Drag leave');
            uploadArea.classList.remove('dragover');
        });
        
        uploadArea.addEventListener('drop', (e) => {
            e.preventDefault();
            e.stopPropagation();
            console.log('Drop');
            uploadArea.classList.remove('dragover');
            
            const files = e.dataTransfer.files;
            console.log('Files dropped:', files.length);
            
            if (files.length > 0) {
                fileInput.files = files;
                handleFiles();
            }
        });
        
        // File input change
        fileInput.addEventListener('change', handleFiles);
        
        function handleFiles() {
            const files = fileInput.files;
            console.log('Files selected:', files.length);
            
            if (files.length > 0) {
                fileList.innerHTML = '';
                
                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    const li = document.createElement('li');
                    li.textContent = `${file.name} (${formatFileSize(file.size)})`;
                    fileList.appendChild(li);
                }
                
                fileInfo.style.display = 'block';
            } else {
                fileInfo.style.display = 'none';
            }
        }
        
        function formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }
    </script>
</body>
</html>

