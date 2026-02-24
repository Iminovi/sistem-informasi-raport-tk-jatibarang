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
    <link rel="stylesheet" href="<?= base_url('assets/css/dashboard.css'); ?>">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('dashboard'); ?>">
                <div class="brand-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <span>TK Monitor</span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle user-profile" href="#" role="button" data-bs-toggle="dropdown">
                            <div class="avatar">
                                <?= substr($nama, 0, 1); ?>
                            </div>
                            <div class="user-info">
                                <span class="user-name"><?= $nama; ?></span>
                                <span class="user-role"><?= ucfirst($role); ?></span>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item text-danger" href="<?= base_url('auth/logout'); ?>">
                                    <i class="fas fa-sign-out-alt me-2"></i>Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <!-- Welcome Section -->
            <div class="welcome-section">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h1 class="welcome-title">Selamat Datang, <?= $nama; ?>! 👋</h1>
                        <p class="welcome-text">Anda login sebagai <span class="role-badge role-<?= $role; ?>"><?= ucfirst($role); ?></span></p>
                    </div>
                    <div class="col-md-4 text-end d-none d-md-block">
                        <div class="date-display">
                            <i class="far fa-calendar-alt"></i>
                            <span id="currentDate"></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dashboard Cards -->
            <div class="dashboard-grid">
                <?php if ($role == 'admin') : ?>
                    <!-- Admin Card -->
                    <div class="dashboard-card">
                        <div class="card-icon bg-primary-gradient">
                            <i class="fas fa-users-cog"></i>
                        </div>
                        <div class="card-content">
                            <h3>Kelola Data User</h3>
                            <p>Tambah, edit, dan hapus data pengguna sistem</p>
                            <a href="<?= base_url('users'); ?>" class="btn btn-card">
                                Akses Menu <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($role == 'guru') : ?>
                    <!-- Guru Card -->
                    <div class="dashboard-card">
                        <div class="card-icon bg-success-gradient">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="card-content">
                            <h3>Kelola Data Siswa</h3>
                            <p>Input dan kelola data siswa serta perkembangannya</p>
                            <a href="<?= base_url('siswa'); ?>" class="btn btn-card">
                                Akses Menu <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                        <div class="card-content">
            <h3>Manajemen Kelas</h3>
            <p>Kelola pembagian kelas, dan input perkembangan rapor.</p>
            
            <div class="d-grid gap-2">
                
                
                <a href="<?= base_url('kelas'); ?>" class="btn btn-outline-success">
                    <i class="fas fa-chalkboard-teacher me-2"></i> Kelola Kelas
                </a>
            </div>
        </div>
                    </div>
                    <div class="dashboard-card">
    <div class="card-icon bg-info-gradient">
        <i class="fas fa-bullhorn"></i>
    </div>
    <div class="card-content">
        <h3>Kegiatan & Diskusi</h3>
        <p>Lihat dokumentasi kegiatan anak dan berikan komentar atau pertanyaan kepada guru.</p>
        <div class="d-grid gap-2">
            <a href="<?= base_url('postingan'); ?>" class="btn btn-card">
                Lihat Semua Kegiatan <i class="fas fa-arrow-right"></i>
            </a>
            
            <?php if (session()->get('role') == 'guru') : ?>
                <a href="<?= base_url('postingan/tambah'); ?>" class="btn btn-outline-info btn-sm">
                    <i class="fas fa-plus-circle me-2"></i> Buat Postingan Baru
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>
                <?php endif; ?>

                <?php if ($role == 'kepsek') : ?>
                    <!-- Kepsek Card -->
                    <div class="dashboard-card">
                        <div class="card-icon bg-warning-gradient">
                            <i class="fas fa-clipboard-check"></i>
                        </div>
                        <div class="card-content">
                            <h3>Validasi Rapor</h3>
                            <p>Ada <strong><?= $total_pending; ?></strong> laporan menunggu persetujuan</p>
                            <a href="<?= base_url('siswa'); ?>" class="btn btn-card btn-warning-card">
                                Validasi Sekarang <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($role == 'orangtua') : ?>
                    <!-- Orang Tua Card -->
                    <div class="dashboard-card">
                        <div class="card-icon bg-info-gradient">
                            <i class="fas fa-child"></i>
                        </div>
                        <div class="card-content">
                            <h3>Perkembangan Anak</h3>
                            <?php if ($anak) : ?>
                                <p>Lihat perkembangan <strong><?= $anak['nama_anak']; ?></strong></p>
                                <a href="<?= base_url('laporan/detail/' . $anak['id_siswa']); ?>" class="btn btn-card btn-success-card">
                                    Lihat Rapor <i class="fas fa-arrow-right"></i>
                                </a>
                            <?php else : ?>
                                <p class="text-danger">Data anak belum dihubungkan ke akun Anda</p>
                                <button class="btn btn-card" disabled>Hubungi Admin</button>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Quick Stats (Hanya untuk Admin & Kepsek) -->
            <?php if ($role == 'admin' || $role == 'kepsek') : ?>
                <div class="stats-section">
                    <h4 class="section-title">Statistik Cepat</h4>
                    <div class="stats-grid">
                        <div class="stat-card">
                            <div class="stat-icon bg-primary-light">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="stat-info">
                                <span class="stat-number">150</span>
                                <span class="stat-label">Total Siswa</span>
                            </div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-icon bg-success-light">
                                <i class="fas fa-chalkboard-teacher"></i>
                            </div>
                            <div class="stat-info">
                                <span class="stat-number">12</span>
                                <span class="stat-label">Total Guru</span>
                            </div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-icon bg-warning-light">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <div class="stat-info">
                                <span class="stat-number">45</span>
                                <span class="stat-label">Rapor Bulan Ini</span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Info Section untuk Orang Tua -->
            <?php if ($role == 'orangtua' && $anak) : ?>
                <div class="info-section">
                    <div class="info-card">
                        <div class="info-header">
                            <i class="fas fa-info-circle"></i>
                            <h4>Informasi Anak</h4>
                        </div>
                        <div class="info-body">
                            <div class="info-item">
                                <span class="info-label">Nama Lengkap</span>
                                <span class="info-value"><?= $anak['nama_anak']; ?></span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Kelas</span>
                                <span class="info-value"><?= $anak['kelas'] ?? 'TK A'; ?></span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Semester</span>
                                <span class="info-value"><?= $anak['semester'] ?? 'Genap 2024'; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="dashboard-grid">
    <?php if ($role == 'guru' || $role == 'orangtua' || $role == 'kepsek') : ?>
    <div class="dashboard-card shadow-sm border-0 animate-in">
        <div class="card-icon bg-info-gradient text-white">
            <i class="fas fa-bullhorn"></i>
        </div>
        <div class="card-content">
            <h3>Kegiatan & Diskusi</h3>
            <p>Dokumentasi kegiatan sekolah dan interaksi melalui Disqus.</p>
            <div class="d-grid gap-2">
                <a href="<?= base_url('postingan'); ?>" class="btn btn-card">
                    Lihat Semua Kegiatan <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
<?php endif; ?>
    
    </div>
    </main>

    <!-- Footer -->
    <footer class="dashboard-footer">
        <div class="container">
            <p>&copy; <?= date('Y'); ?> TK Monitor. All rights reserved.</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Display Current Date
        function updateDate() {
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            document.getElementById('currentDate').textContent = new Date().toLocaleDateString('id-ID', options);
        }
        updateDate();

        // Add animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: "0px 0px -50px 0px"
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.dashboard-card, .stat-card').forEach(el => {
            observer.observe(el);
        });
    </script>
</body>
</html>