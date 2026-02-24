<!DOCTYPE html>
<html>

<head>
    <title><?= $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <?= $this->include('layout/navbar'); ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">TK Monitor</a>
            <div class="navbar-nav ms-auto">
                <span class="nav-link text-white">Halo, <?= $nama; ?> (<?= ucfirst($role); ?>)</span>
                <a class="nav-link btn btn-danger btn-sm text-white ms-3" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <?php if ($role == 'admin' || $role == 'guru') : ?>
                <div class="col-md-4">
                    <div class="card text-center shadow-sm">
                        <div class="card-body">
                            <h3>Data Siswa</h3>
                            <p>Kelola data dan input laporan</p>
                            <a href="<?= base_url('siswa'); ?>" class="btn btn-primary">Buka</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (session()->get('role') == 'admin') : ?>
                <div class="col-md-4">
                    <div class="card shadow-sm border-primary">
                        <div class="card-body text-center">
                            <h3>Kelola User</h3>
                            <p>Tambah atau hubungkan Orang Tua dengan Siswa.</p>
                            <a href="<?= base_url('users'); ?>" class="btn btn-primary">Buka Modul</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($role == 'kepsek') : ?>
                <div class="col-md-4">
                    <div class="card text-center shadow-sm border-warning">
                        <div class="card-body">
                            <h3>Validasi Rapor</h3>
                            <p>Perlu persetujuan Kepala Sekolah</p>
                            <a href="<?= base_url('siswa'); ?>" class="btn btn-warning">Cek Laporan</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($role == 'orangtua') : ?>
                <div class="col-md-4">
                    <div class="card text-center shadow-sm border-success">
                        <div class="card-body">
                            <h3>Laporan Anakku</h3>
                            <p>Lihat perkembangan buah hati</p>
                            <a href="#" class="btn btn-success">Lihat Rapor</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>