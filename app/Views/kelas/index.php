<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light">
    <?= $this->include('layout/navbar'); ?>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold">Manajemen Kelas</h2>
                <p class="text-muted">Daftar kelas yang Anda kelola di TK Aisyiyah Bustanul Athfal</p>
            </div>
            <?php if (session()->get('role') == 'guru') : ?>
                <a href="<?= base_url('kelas/tambah'); ?>" class="btn btn-primary shadow-sm">
                    <i class="fas fa-plus-circle me-2"></i> Buat Kelas Baru
                </a>
            <?php endif; ?>
        </div>

        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="row">
            <?php if (empty($kelas)) : ?>
                <div class="col-12">
                    <div class="alert alert-info text-center py-5 shadow-sm">
                        <i class="fas fa-chalkboard fa-3x mb-3 text-secondary"></i>
                        <p class="lead">Belum ada kelas yang terdaftar. Silakan buat kelas pertama Anda.</p>
                    </div>
                </div>
            <?php else : ?>
                <?php foreach ($kelas as $k) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-primary text-white rounded p-3 me-3">
                                    <i class="fas fa-school fa-lg"></i>
                                </div>
                                <div>
                                    <h5 class="card-title fw-bold mb-0"><?= $k['nama_kelas']; ?></h5>
                                    <small class="text-muted">Wali: <?= $k['wali_kelas']; ?></small>
                                </div>
                            </div>
                            
                            <p class="card-text text-muted small">
                                Kelola pembagian siswa dan pantau riwayat rapor untuk kelas ini secara kolektif.
                            </p>
                        </div>
                        <div class="card-footer bg-transparent border-0 pb-3">
                            <div class="d-grid gap-2">
                                <a href="<?= base_url('kelas/pilih_siswa/' . $k['id_kelas']); ?>" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-user-plus me-1"></i> Masukkan Siswa
                                </a>
                                <a href="<?= base_url('kelas/detail/' . $k['id_kelas']); ?>" class="btn btn-primary btn-sm">
                                    <i class="fas fa-eye me-1"></i> Lihat Daftar Siswa
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>