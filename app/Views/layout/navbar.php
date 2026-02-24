<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="<?= base_url('dashboard'); ?>">TK MONITOR</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('dashboard'); ?>">Dashboard</a>
                </li>

                <?php if (session()->get('role') == 'admin') : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('users'); ?>">Kelola User</a>
                    </li>
                <?php endif; ?>

                
                

                <?php if (session()->get('role') == 'kepsek') : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('siswa'); ?>">Validasi Rapor</a>
                    </li>
                <?php endif; ?>
            </ul>

            <div class="navbar-nav ms-auto">
                <span class="nav-link text-white me-3">
                    <i class="bi bi-person-circle"></i> <?= session()->get('nama'); ?>
                </span>
                <a class="btn btn-light btn-sm fw-bold text-primary" href="<?= base_url('auth/logout'); ?>" 
                   onclick="return confirm('Apakah Anda yakin ingin keluar?')">Logout</a>
            </div>
        </div>
    </div>
</nav>