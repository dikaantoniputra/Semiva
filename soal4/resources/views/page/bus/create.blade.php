@extends('layout.master')

@section('title')
    Tambah Buku Pelajaran
@endsection

@push('after-style')
    <style>
        .upload-container {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        /* Upload Box */
        .upload-box {
            position: relative;
            padding: 3rem 2rem;
            text-align: center;
            border: 3px dashed rgba(255, 255, 255, 0.3);
            border-radius: 20px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            cursor: pointer;
        }

        .upload-box.dragover {
            border-color: #f093fb;
            background: rgba(240, 147, 251, 0.1);
            transform: scale(1.02);
        }

        .upload-box.uploading {
            border-color: #f093fb;
            background: rgba(240, 147, 251, 0.05);
        }

        .upload-content {
            transition: all 0.3s ease;
        }

        .upload-box.uploading .upload-content {
            opacity: 0;
            visibility: hidden;
        }

        .upload-box.uploading .upload-progress {
            opacity: 1;
            visibility: visible;
        }

        .upload-icon {
            margin-bottom: 1.5rem;
            color: #f093fb;
        }

        .upload-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #fff;
        }

        .upload-subtitle {
            color: #e2e8f0;
            margin-bottom: 2rem;
            font-size: 0.95rem;
        }

        .upload-button {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(240, 147, 251, 0.3);
        }

        .upload-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(240, 147, 251, 0.4);
        }

        /* Progress */
        .upload-progress {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            text-align: center;
        }

        .progress-circle {
            position: relative;
            display: inline-block;
            margin-bottom: 1rem;
        }

        .progress-ring {
            transform: rotate(-90deg);
        }

        .progress-bar {
            transition: stroke-dashoffset 0.3s ease;
            stroke-linecap: round;
        }

        .progress-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-weight: 600;
            font-size: 1rem;
            color: #fff;
        }

        .progress-label {
            color: #e2e8f0;
            font-size: 0.9rem;
        }

        /* Files Preview */
        .files-preview {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 2rem;
            opacity: 0;
            visibility: hidden;
            transform: translateY(20px);
            transition: all 0.4s ease;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        }

        .files-preview.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .preview-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .preview-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: #fff;
        }

        .add-more-btn {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .add-more-btn:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .files-list {
            display: grid;
            gap: 1rem;
        }

        .file-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .file-item:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }

        .file-preview {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.1);
        }

        .file-info {
            flex: 1;
        }

        .file-name {
            font-weight: 500;
            color: #fff;
            margin-bottom: 0.25rem;
        }

        .file-size {
            font-size: 0.85rem;
            color: #e2e8f0;
        }

        .file-status {
            margin-right: 1rem;
        }

        .status-icon {
            font-size: 1.5rem;
        }

        .status-uploading {
            color: #f093fb;
        }

        .status-success {
            color: #48bb78;
        }

        .file-actions {
            display: flex;
            gap: 0.5rem;
        }

        .file-action {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #fff;
            width: 32px;
            height: 32px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .file-action:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .file-action.delete:hover {
            background: rgba(245, 87, 108, 0.2);
            border-color: #f5576c;
        }

        /* Upload Complete */
        .upload-complete {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 3rem 2rem;
            text-align: center;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        }

        .complete-header {
            margin-bottom: 2rem;
        }

        .success-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: white;
            margin: 0 auto 1.5rem;
            animation: successBounce 0.6s ease;
        }

        @keyframes successBounce {
            0% {
                transform: scale(0);
            }

            50% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
            }
        }

        .complete-title {
            font-size: 1.8rem;
            font-weight: 600;
            color: #fff;
            margin-bottom: 0.5rem;
        }

        .complete-subtitle {
            color: #e2e8f0;
            font-size: 1rem;
        }

        .complete-actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
        }

        .new-upload-btn,
        .view-files-btn {
            padding: 1rem 1.5rem;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .new-upload-btn {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(240, 147, 251, 0.3);
        }

        .new-upload-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(240, 147, 251, 0.4);
        }

        .view-files-btn {
            background: rgba(255, 255, 255, 0.1);
            color: #0000;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .view-files-btn:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        /* Success Animation */
        .success-animation {
            text-align: center;
        }

        .success-animation .success-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            animation: successPulse 1.5s infinite;
        }

        @keyframes successPulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        .success-text {
            font-size: 1.3rem;
            font-weight: 600;
            color: #fff;
        }

        /* Error States */
        .file-item.error {
            border: 1px solid #fecaca;
            background: #fef2f2;
        }

        .error-message {
            color: #dc2626;
            font-size: 0.75rem;
            margin-top: 0.25rem;
        }

        /* Responsive Design */
        @media (max-width: 640px) {
            body {
                padding: 1rem;
            }

            .upload-box {
                padding: 2rem 1rem;
                margin: 1rem;
            }

            .upload-title {
                font-size: 1.25rem;
            }

            .files-preview {
                padding: 1rem;
            }

            .file-item {
                flex-direction: column;
                text-align: center;
                gap: 1rem;
            }

            .file-preview {
                margin-right: 0;
            }

            .file-actions {
                justify-content: center;
            }
        }

        /* Loading Animation */
        @keyframes spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .loading {
            animation: spin 1s linear infinite;
        }

        /* Drag and Drop Visual Feedback */
        .upload-box::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(99, 102, 241, 0.1));
            opacity: 0;
            transition: opacity 0.3s ease;
            border-radius: 13px;
        }

        .upload-box.dragover::before {
            opacity: 1;
        }

        /* Animation for slide out */
        @keyframes slideOut {
            from {
                opacity: 1;
                transform: translateY(0);
            }

            to {
                opacity: 0;
                transform: translateY(-20px);
            }
        }

        /* Error notifications */
        .error-notification {
            position: fixed;
            top: 20px;
            right: 20px;
            background: rgba(254, 226, 226, 0.95);
            color: #dc2626;
            padding: 1rem;
            border-radius: 12px;
            border: 1px solid rgba(252, 165, 165, 0.5);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            backdrop-filter: blur(10px);
            max-width: 300px;
        }

        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideOutRight {
            from {
                transform: translateX(0);
                opacity: 1;
            }

            to {
                transform: translateX(100%);
                opacity: 0;
            }
        }
    </style>
@endpush

@section('content')
    <div class="row row-deck row-cards">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('bus.store') }}" id="form" enctype="multipart/form-data">
                        @csrf
                        @include('page.bus.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-script')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        class FileUploadComponent {
            constructor() {
                this.uploadBox = document.getElementById('uploadBox');
                this.fileInput = document.getElementById('fileInput');
                this.filesPreview = document.getElementById('filesPreview');
                this.filesList = document.getElementById('filesList');
                this.uploadProgress = document.getElementById('uploadProgress');
                this.uploadComplete = document.getElementById('uploadComplete');
                // this.addMoreBtn = document.getElementById('addMoreBtn');
                this.newUploadBtn = document.getElementById('newUploadBtn');
                this.viewFilesBtn = document.getElementById('viewFilesBtn');

                this.files = [];
                this.maxFileSize = 10 * 1024 * 1024; // 10MB
                this.allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

                this.init();
            }

            init() {
                this.setupEventListeners();
            }

            setupEventListeners() {
                // Upload box events
                this.uploadBox.addEventListener('click', () => {
                    this.fileInput.click();
                });

                this.fileInput.addEventListener('change', (e) => {
                    this.handleFiles(e.target.files);
                });

                // Drag and drop events
                this.uploadBox.addEventListener('dragover', (e) => {
                    e.preventDefault();
                    this.uploadBox.classList.add('dragover');
                });

                this.uploadBox.addEventListener('dragleave', (e) => {
                    e.preventDefault();
                    this.uploadBox.classList.remove('dragover');
                });

                this.uploadBox.addEventListener('drop', (e) => {
                    e.preventDefault();
                    this.uploadBox.classList.remove('dragover');
                    this.handleFiles(e.dataTransfer.files);
                });


                this.newUploadBtn.addEventListener('click', () => {
                    this.startNewUpload();
                });

                this.viewFilesBtn.addEventListener('click', () => {
                    this.viewUploadedFiles();
                });

                // Prevent default drag behaviors
                ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                    document.addEventListener(eventName, (e) => {
                        e.preventDefault();
                        e.stopPropagation();
                    });
                });
            }
            handleFiles(fileList) {
                const newFiles = Array.from(fileList);

                newFiles.forEach(file => {
                    if (this.validateFile(file)) {
                        this.addFile(file);
                    }
                });

                if (this.files.length > 0) {
                    this.showPreview();
                    this.simulateUpload();
                }
            }

            validateFile(file) {
                // Check file type
                if (!this.allowedTypes.includes(file.type)) {
                    this.showError(`${file.name}: Only JPG, PNG, and GIF files are allowed.`);
                    return false;
                }

                // Check file size
                if (file.size > this.maxFileSize) {
                    this.showError(`${file.name}: File size must be less than 10MB.`);
                    return false;
                }

                // Check if file already exists
                if (this.files.some(f => f.name === file.name && f.size === file.size)) {
                    this.showError(`${file.name}: File already selected.`);
                    return false;
                }

                return true;
            }

            addFile(file) {
                const fileObj = {
                    file: file,
                    id: Date.now() + Math.random(),
                    name: file.name,
                    size: this.formatFileSize(file.size),
                    status: 'pending',
                    progress: 0
                };

                this.files.push(fileObj);
                this.renderFile(fileObj);
            }

            renderFile(fileObj) {
                const fileElement = document.createElement('div');
                fileElement.className = 'file-item';
                fileElement.setAttribute('data-file-id', fileObj.id);

                // Create preview image
                const reader = new FileReader();
                reader.onload = (e) => {
                    fileElement.innerHTML = `
                <img src="${e.target.result}" alt="${fileObj.name}" class="file-preview">
                <div class="file-info">
                    <div class="file-name">${fileObj.name}</div>
                    <div class="file-size">${fileObj.size}</div>
                </div>
                <div class="file-status">
                    <div class="status-icon status-uploading">⏳</div>
                </div>
             
            `;
                };
                reader.readAsDataURL(fileObj.file);

                this.filesList.appendChild(fileElement);
            }

            showPreview() {
                this.filesPreview.classList.add('show');
                // this.addMoreBtn.style.display = 'inline-block';
            }

            simulateUpload() {
                this.uploadBox.classList.add('uploading');

                let completedFiles = 0;
                const totalFiles = this.files.length;

                this.files.forEach((fileObj, index) => {
                    setTimeout(() => {
                        this.uploadFile(fileObj, (progress) => {
                            const overallProgress = ((completedFiles + progress / 100) /
                                totalFiles) * 100;
                            this.updateProgress(overallProgress);

                            if (progress === 100) {
                                completedFiles++;
                                if (completedFiles === totalFiles) {
                                    this.completeUpload();
                                }
                            }
                        });
                    }, index * 200);
                });
            }

            uploadFile(fileObj, progressCallback) {
                let progress = 0;
                const fileElement = document.querySelector(`[data-file-id="${fileObj.id}"]`);

                const uploadInterval = setInterval(() => {
                    progress += Math.random() * 15;
                    if (progress >= 100) {
                        progress = 100;
                        clearInterval(uploadInterval);

                        fileObj.status = 'success';
                        const statusIcon = fileElement.querySelector('.status-icon');
                        statusIcon.className = 'status-icon status-success';
                        statusIcon.textContent = '✓';
                    }

                    progressCallback(progress);
                }, 100 + Math.random() * 200);
            }

            updateProgress(progress) {
                const progressBar = document.querySelector('.progress-bar');
                const progressText = document.querySelector('.progress-text');

                const circumference = 2 * Math.PI * 25;
                const offset = circumference - (progress / 100) * circumference;

                progressBar.style.strokeDashoffset = offset;
                progressText.textContent = Math.round(progress) + '%';
            }
            completeUpload() {
                setTimeout(() => {
                    this.uploadBox.style.display = 'none';
                    this.uploadComplete.style.display = 'block';

                    const completeTitle = this.uploadComplete.querySelector('.complete-title');
                    const completeSubtitle = this.uploadComplete.querySelector('.complete-subtitle');

                    completeTitle.textContent = 'Upload Successful!';
                    completeSubtitle.textContent = `${this.files.length} file(s) uploaded successfully`;
                }, 500);
            }

            startNewUpload() {
                // Reset all states
                this.files = [];

                // Clear files list
                this.filesList.innerHTML = '';

                // Reset displays
                this.uploadComplete.style.display = 'none';
                this.uploadBox.style.display = 'block';
                this.uploadBox.classList.remove('uploading', 'success');
                this.filesPreview.classList.remove('show');
                // this.addMoreBtn.style.display = 'none';

                // Reset progress
                const progressBar = document.querySelector('.progress-bar');
                const progressText = document.querySelector('.progress-text');
                progressBar.style.strokeDashoffset = '157';
                progressText.textContent = '0%';

                // Re-setup file input
                this.fileInput.value = ''
            }

            viewUploadedFiles() {
                // Show the uploaded files by hiding complete screen and showing files
                this.uploadComplete.style.display = 'none';
                this.filesPreview.classList.add('show');
                // this.addMoreBtn.style.display = 'inline-block';

                // Update preview title
                const previewTitle = this.filesPreview.querySelector('.preview-title');
                previewTitle.textContent = 'Uploaded Files';
            }

            formatFileSize(bytes) {
                if (bytes === 0) return '0 Bytes';

                const k = 1024;
                const sizes = ['Bytes', 'KB', 'MB', 'GB'];
                const i = Math.floor(Math.log(bytes) / Math.log(k));

                return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
            }

            showError(message) {
                const errorDiv = document.createElement('div');
                errorDiv.className = 'error-notification';
                errorDiv.style.animation = 'slideInRight 0.3s ease';
                errorDiv.textContent = message;

                document.body.appendChild(errorDiv);

                setTimeout(() => {
                    errorDiv.style.animation = 'slideOutRight 0.3s ease';
                    setTimeout(() => errorDiv.remove(), 300);
                }, 4000);
            }

            removeFile(fileId) {
                this.files = this.files.filter(f => f.id != fileId);
                const fileElement = document.querySelector(`[data-file-id="${fileId}"]`);

                if (fileElement) {
                    fileElement.style.animation = 'slideOut 0.3s ease forwards';
                    setTimeout(() => {
                        fileElement.remove();

                        if (this.files.length === 0) {
                            this.filesPreview.classList.remove('show');
                            // this.addMoreBtn.style.display = 'none';
                            this.uploadBox.classList.remove('uploading');
                        }
                    }, 300);
                }
            }
        }

        // Add slide animations for notifications
        const style = document.createElement('style');
        style.textContent = `
    @keyframes slideInRight {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    @keyframes slideOutRight {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }
    
    @keyframes slideOut {
        from {
            opacity: 1;
            transform: translateY(0);
        }
        to {
            opacity: 0;
            transform: translateY(-20px);
        }
    }
`;
        document.head.appendChild(style);

        // Initialize the component
        let fileUpload;
        document.addEventListener('DOMContentLoaded', () => {
            fileUpload = new FileUploadComponent();
        });

        // Export for potential module use
        if (typeof module !== 'undefined' && module.exports) {
            module.exports = FileUploadComponent;
        }
    </script>
@endpush
