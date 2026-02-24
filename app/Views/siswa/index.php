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
    <div class="container-fluid mt-4 px-4">
        <div class="row">
            <div class="col-xl-4 col-lg-5 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white py-3">
                        <h5 class="mb-0"><i class="fas fa-user-plus me-2"></i>Tambah Siswa Baru</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('siswa/simpan'); ?>" method="post">
                            <?= csrf_field(); ?>
                            
                            <div class="mb-3">
                                <label class="form-label small fw-bold">Nama Lengkap</label>
                                <input type="text" name="nama_anak" class="form-control" required placeholder="Nama sesuai ijazah/akta">
                            </div>

                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label class="form-label small fw-bold">Nama Panggilan</label>
                                    <input type="text" name="nama_panggilan" class="form-control">
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label small fw-bold">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-select">
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label class="form-label small fw-bold">NIS</label>
                                    <input type="text" name="nis" class="form-control">
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label small fw-bold">NISN</label>
                                    <input type="text" name="nisn" class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label class="form-label small fw-bold">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" class="form-control">
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label small fw-bold">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" class="form-control">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label small fw-bold">Nama Orang Tua/Wali</label>
                                <input type="text" name="nama_orang_tua" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label small fw-bold">Kelas</label>
                                <input type="text" name="kelas" class="form-control" placeholder="Contoh: TK A" required>
                            </div>

                            <button type="submit" class="btn btn-success w-100 py-2">
                                <i class="fas fa-save me-2"></i>Simpan Data Siswa
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-xl-8 col-lg-7">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0 text-primary"><i class="fas fa-users me-2"></i>Daftar Siswa</h5>
                    </div>
                    <div class="card-body">
                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('pesan'); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>

                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Nama Siswa</th>
                                        <th>NISN</th>
                                        <th>Kelas</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($siswa as $s) : ?>
                                        <tr>
                                            <td>
                                                <div class="fw-bold"><?= $s['nama_anak']; ?></div>
                                                <small class="text-muted"><?= $s['nama_panggilan'] ? '(' . $s['nama_panggilan'] . ')' : ''; ?></small>
                                            </td>
                                            <td><?= $s['nisn'] ?: '-'; ?></td>
                                            <td><span class="badge bg-info text-dark"><?= $s['kelas']; ?></span></td>
                                            <td class="text-center">
                                                <div class="btn-group gap-1">
                                                    <a href="<?= base_url('laporan/detail/' . $s['id_siswa']); ?>" class="btn btn-sm btn-outline-primary" title="Riwayat">
                                                        <i class="fas fa-history"></i>
                                                    </a>
                                                    
                                                    <?php if (session()->get('role') == 'guru' || session()->get('role') == 'admin') : ?>
                                                        <a href="<?= base_url('siswa/edit/' . $s['id_siswa']); ?>" class="btn btn-sm btn-outline-warning" title="Edit">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form action="<?= base_url('siswa/hapus/' . $s['id_siswa']); ?>" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus siswa ini?')">
                                                            <?= csrf_field(); ?>
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>