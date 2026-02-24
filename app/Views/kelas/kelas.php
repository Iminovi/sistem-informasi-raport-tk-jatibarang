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
                <h2 class="fw-bold">Daftar Siswa: <?= $kelas['nama_kelas']; ?></h2>
                <p class="text-muted">Wali Kelas: <strong><?= $kelas['wali_kelas']; ?></strong></p>
            </div>
            <div class="d-flex gap-2">
                <a href="<?= base_url('kelas/pilih_siswa/' . $kelas['id_kelas']); ?>" class="btn btn-success shadow-sm">
                    <i class="fas fa-user-plus me-1"></i> Tambah Siswa
                </a>
                <a href="<?= base_url('kelas'); ?>" class="btn btn-secondary shadow-sm">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th class="ps-4">No</th>
                                <th>Nama Lengkap</th>
                                <th>NISN</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($siswa)) : ?>
                                <tr>
                                    <td colspan="4" class="text-center py-5 text-muted">
                                        <i class="fas fa-users-slash fa-3x mb-3 d-block"></i>
                                        Belum ada siswa di kelas ini.
                                    </td>
                                </tr>
                            <?php else : ?>
                                <?php foreach ($siswa as $index => $s) : ?>
                                    <tr>
                                        <td class="ps-4"><?= $index + 1; ?></td>
                                        <td class="fw-bold"><?= $s['nama_anak']; ?></td>
                                        <td><?= $s['nisn'] ?? '-'; ?></td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="<?= base_url('laporan/detail/' . $s['id_siswa']); ?>" class="btn btn-sm btn-info text-white">
                                                    <i class="fas fa-file-alt"></i> Rapor
                                                </a>
                                                <a href="<?= base_url('kelas/hapus_siswa/' . $s['id_relasi']); ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Keluarkan siswa dari kelas ini?')">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>