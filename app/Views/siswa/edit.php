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

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-warning text-dark py-3">
                        <h5 class="mb-0"><i class="fas fa-edit me-2"></i>Edit Identitas Siswa: <?= $siswa['nama_anak']; ?></h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="<?= base_url('siswa/update/' . $siswa['id_siswa']); ?>" method="post">
                            <?= csrf_field(); ?>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="fw-bold text-primary mb-3">Data Pribadi</h6>
                                    <div class="mb-3">
                                        <label class="form-label small fw-bold">Nama Lengkap</label>
                                        <input type="text" name="nama_anak" class="form-control" value="<?= $siswa['nama_anak']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label small fw-bold">Nama Panggilan</label>
                                        <input type="text" name="nama_panggilan" class="form-control" value="<?= $siswa['nama_panggilan']; ?>">
                                    </div>
                                    <div class="row">
                                        <div class="col-6 mb-3">
                                            <label class="form-label small fw-bold">NIS</label>
                                            <input type="text" name="nis" class="form-control" value="<?= $siswa['nis']; ?>">
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label class="form-label small fw-bold">NISN</label>
                                            <input type="text" name="nisn" class="form-control" value="<?= $siswa['nisn']; ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 mb-3">
                                            <label class="form-label small fw-bold">Tempat Lahir</label>
                                            <input type="text" name="tempat_lahir" class="form-control" value="<?= $siswa['tempat_lahir']; ?>">
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label class="form-label small fw-bold">Tanggal Lahir</label>
                                            <input type="date" name="tanggal_lahir" class="form-control" value="<?= $siswa['tanggal_lahir']; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <h6 class="fw-bold text-primary mb-3">Keluarga & Alamat</h6>
                                    <div class="mb-3">
                                        <label class="form-label small fw-bold">Nama Orang Tua/Wali</label>
                                        <input type="text" name="nama_orang_tua" class="form-control" value="<?= $siswa['nama_orang_tua']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label small fw-bold">Kelas</label>
                                        <input type="text" name="kelas" class="form-control" value="<?= $siswa['kelas']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label small fw-bold">Alamat Lengkap</label>
                                        <textarea name="alamat_jalan" class="form-control" rows="3"><?= $siswa['alamat_jalan']; ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="d-flex justify-content-between">
                                <a href="<?= base_url('siswa'); ?>" class="btn btn-outline-secondary px-4">Batal</a>
                                <button type="submit" class="btn btn-warning px-5 fw-bold">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>