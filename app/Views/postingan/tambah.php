<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?> - TK Monitor</title>
    
    <!-- External CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/postingan.css'); ?>">
</head>
<body>
    <!-- Navbar -->
    <?= $this->include('layout/navbar'); ?>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <!-- Back Button -->
            <a href="<?= base_url('postingan'); ?>" class="btn-back">
                <i class="fas fa-arrow-left"></i> Kembali ke Daftar Kegiatan
            </a>

            <!-- Form Card -->
            <div class="form-container">
                <div class="form-header">
                    <div class="form-icon">
                        <i class="fas fa-edit"></i>
                    </div>
                    <div class="form-title-section">
                        <h1>Buat Postingan Baru</h1>
                        <p>Bagikan momen kegiatan belajar anak-anak</p>
                    </div>
                </div>

                <div class="form-body">
                    <form action="<?= base_url('postingan/simpan'); ?>" method="post" enctype="multipart/form-data" id="postinganForm">
                        <?= csrf_field(); ?>
                        
                        <!-- Judul -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-heading"></i> Judul Kegiatan
                            </label>
                            <input type="text" name="judul" class="form-control custom-input" 
                                   placeholder="Contoh: Kunjungan Edukasi ke Kebun Binatang" required>
                            <div class="form-hint">Buat judul yang menarik dan deskriptif</div>
                        </div>

                        <!-- Konten -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-align-left"></i> Konten / Cerita Kegiatan
                            </label>
                            <textarea name="isi_konten" class="form-control custom-textarea" rows="6" 
                                      placeholder="Ceritakan keseruan anak-anak hari ini... apa yang mereka pelajari? Bagaimana reaksi mereka?" required></textarea>
                            <div class="char-count"><span id="charCount">0</span> karakter</div>
                        </div>

                        <!-- Upload Gambar -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-camera"></i> Unggah Foto Kegiatan
                            </label>
                            <div class="upload-area" id="uploadArea">
                                <input type="file" name="gambar" id="fileInput" accept="image/*" hidden>
                                <div class="upload-content">
                                    <div class="upload-icon">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                    </div>
                                    <p class="upload-text">Klik atau seret foto ke sini</p>
                                    <p class="upload-hint">Maksimal 2MB (JPG, PNG, WEBP)</p>
                                </div>
                                <div class="upload-preview" id="uploadPreview" style="display: none;">
                                    <img src="" alt="Preview" id="previewImage">
                                    <button type="button" class="btn-remove-image" onclick="removeImage()">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary-gradient btn-lg">
                                <i class="fas fa-paper-plane me-2"></i> Publikasikan Sekarang
                            </button>
                            <a href="<?= base_url('postingan'); ?>" class="btn btn-outline-secondary btn-lg">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="page-footer">
        <div class="container">
            <p>&copy; <?= date('Y'); ?> TK Monitor. All rights reserved.</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Character count
        const textarea = document.querySelector('textarea[name="isi_konten"]');
        const charCount = document.getElementById('charCount');
        
        textarea.addEventListener('input', function() {
            charCount.textContent = this.value.length;
        });

        // File Upload Handling
        const uploadArea = document.getElementById('uploadArea');
        const fileInput = document.getElementById('fileInput');
        const uploadPreview = document.getElementById('uploadPreview');
        const previewImage = document.getElementById('previewImage');
        const uploadContent = uploadArea.querySelector('.upload-content');

        uploadArea.addEventListener('click', () => fileInput.click());
        
        uploadArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadArea.classList.add('dragover');
        });

        uploadArea.addEventListener('dragleave', () => {
            uploadArea.classList.remove('dragover');
        });

        uploadArea.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadArea.classList.remove('dragover');
            const files = e.dataTransfer.files;
            if(files.length) handleFile(files[0]);
        });

        fileInput.addEventListener('change', function() {
            if(this.files.length) handleFile(this.files[0]);
        });

        function handleFile(file) {
            if(file.size > 2 * 1024 * 1024) {
                alert('Ukuran file maksimal 2MB');
                return;
            }
            
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                uploadContent.style.display = 'none';
                uploadPreview.style.display = 'block';
                uploadArea.classList.add('has-image');
            };
            reader.readAsDataURL(file);
        }

        function removeImage() {
            fileInput.value = '';
            uploadPreview.style.display = 'none';
            uploadContent.style.display = 'block';
            uploadArea.classList.remove('has-image');
        }

        // Form submission loading
        document.getElementById('postinganForm').addEventListener('submit', function(e) {
            const btn = this.querySelector('button[type="submit"]');
            btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Mempublikasikan...';
            btn.disabled = true;
        });
    </script>
</body>
</html>