<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Postingan - TK Monitor</title>
    
    <!-- External CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/postingan.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/edit_postingan.css'); ?>">
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

            <!-- Edit Form Card -->
            <div class="form-container">
                <div class="form-header edit-header">
                    <div class="form-icon">
                        <i class="fas fa-edit"></i>
                    </div>
                    <div class="form-title-section">
                        <h1>Edit Postingan</h1>
                        <p>Perbarui informasi kegiatan yang sudah ada</p>
                    </div>
                </div>

                <div class="form-body">
                    <form action="<?= base_url('postingan/update/' . $post['id_post']); ?>" method="post" enctype="multipart/form-data" id="editForm">
                        <?= csrf_field(); ?>
                        
                        <!-- Judul -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-heading"></i> Judul Kegiatan
                            </label>
                            <input type="text" name="judul" class="form-control custom-input" 
                                   value="<?= $post['judul']; ?>" required>
                            <div class="form-hint">Judul saat ini: <?= $post['judul']; ?></div>
                        </div>

                        <!-- Konten -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-align-left"></i> Isi Konten
                            </label>
                            <textarea name="isi_konten" class="form-control custom-textarea" rows="8" 
                                      required><?= $post['isi_konten']; ?></textarea>
                            <div class="char-count"><span id="charCount"><?= strlen($post['isi_konten']); ?></span> karakter</div>
                        </div>

                        <!-- Current Image Preview -->
                        <?php if($post['gambar']): ?>
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-image"></i> Foto Saat Ini
                            </label>
                            <div class="current-image-preview">
                                <img src="<?= base_url('uploads/kegiatan/' . $post['gambar']); ?>" alt="Current Image">
                                <div class="image-info">
                                    <span class="image-name"><?= $post['gambar']; ?></span>
                                    <span class="image-status">Foto aktif</span>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <!-- Upload New Image -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-camera"></i> Ganti Foto (Opsional)
                            </label>
                            <div class="upload-area" id="uploadArea">
                                <input type="file" name="gambar" id="fileInput" accept="image/*" hidden>
                                <div class="upload-content">
                                    <div class="upload-icon warning-icon">
                                        <i class="fas fa-exchange-alt"></i>
                                    </div>
                                    <p class="upload-text">Klik untuk mengganti foto</p>
                                    <p class="upload-hint">Biarkan kosong jika tidak ingin mengganti foto</p>
                                </div>
                                <div class="upload-preview" id="uploadPreview" style="display: none;">
                                    <img src="" alt="Preview" id="previewImage">
                                    <button type="button" class="btn-remove-image" onclick="removeImage()">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    <div class="new-image-badge">Foto Baru</div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="form-actions edit-actions">
                            <button type="submit" class="btn btn-warning-gradient btn-lg">
                                <i class="fas fa-save me-2"></i> Simpan Perubahan
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
        document.getElementById('editForm').addEventListener('submit', function(e) {
            const btn = this.querySelector('button[type="submit"]');
            btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Menyimpan...';
            btn.disabled = true;
        });

        // Confirm before leaving with unsaved changes
        let formChanged = false;
        document.querySelectorAll('input, textarea').forEach(input => {
            input.addEventListener('change', () => formChanged = true);
        });

        window.addEventListener('beforeunload', (e) => {
            if(formChanged) {
                e.preventDefault();
                e.returnValue = '';
            }
        });
    </script>
</body>
</html>