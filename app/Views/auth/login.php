<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - TK Monitor</title>
    
    <!-- External CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Custom CSS (Pisah) -->
    <link href="<?= base_url('assets/css/login-style.css'); ?>" rel="stylesheet">
</head>
<body>
    <div class="login-wrapper">
        <!-- Left Side: Welcome Section -->
        <div class="welcome-side">
            <div class="welcome-content">
                <div class="welcome-badge">
                    <i class="fas fa-shield-alt me-2"></i>Sistem Terintegrasi
                </div>
                <h1 class="welcome-title">Selamat Datang<br>di TK Monitor</h1>
                <p class="welcome-subtitle">Platform monitoring dan manajemen data terpadu untuk pendidikan anak usia dini</p>
                
                <div class="feature-list">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <span>Monitoring Real-time</span>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-database"></i>
                        </div>
                        <span>Data Terintegrasi</span>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <span>Akses Mobile</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side: Login Form -->
        <div class="login-side">
            <div class="login-container">
                <!-- Logo Section -->
                <div class="logo-section">
                    <div class="logo-wrapper">
                        
                        <img src="<?= base_url('assets/images/images(6).jpeg'); ?>" alt="Logo Sekolah"> -->
                        <div class="logo-placeholder">TK</div>
                    </div>
                </div>

                <div class="form-card">
                    <div class="form-header">
                        <h3 class="form-title">Masuk ke Akun Anda</h3>
                        <p class="form-subtitle">Silakan masukkan kredensial untuk melanjutkan</p>
                    </div>

                    <!-- Alert Error -->
                    <?php if(session()->getFlashdata('error')): ?>
                        <div class="alert-modern alert-danger-modern">
                            <i class="fas fa-exclamation-circle"></i>
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('auth/proses_login'); ?>" method="post" id="loginForm">
                        <!-- Username Input -->
                        <div class="form-floating">
                            <i class="fas fa-user input-icon"></i>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                            <label for="username">Username</label>
                        </div>

                        <!-- Password Input -->
                        <div class="form-floating">
                            <i class="fas fa-lock input-icon"></i>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            <label for="password">Password</label>
                            <i class="fas fa-eye toggle-password" onclick="togglePassword()"></i>
                        </div>

                        <!-- Options -->
                        <div class="form-options">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                <label class="form-check-label" for="remember">
                                    Ingat saya
                                </label>
                            </div>
                            <a href="#" class="forgot-link">Lupa password?</a>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn-login" id="submitBtn">
                            Masuk <i class="fas fa-arrow-right ms-2"></i>
                        </button>
                    </form>
                </div>

                <div class="login-footer">
                    <p>&copy; <?= date('Y'); ?> TK Monitor. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- External JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script>
        // Toggle Password Visibility
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.querySelector('.toggle-password');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        // Loading Animation on Submit
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const btn = document.getElementById('submitBtn');
            btn.classList.add('loading');
            btn.innerHTML = 'Memproses <span class="spinner"></span>';
        });

        // Input Animation
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });
    </script>
</body>
</html>