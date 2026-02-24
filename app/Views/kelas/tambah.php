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
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow border-0">
                    <div class="card-header bg-primary text-white py-3">
                        <h5 class="mb-0"><i class="fas fa-plus-circle me-2"></i> Buat Kelas Baru</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="<?= base_url('kelas/simpan'); ?>" method="post">
                            <?= csrf_field(); ?>
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nama Kelas</label>
                                <input type="text" name="nama_kelas" class="form-control" placeholder="Contoh: TK A - Merpati" required>
                                <div class="form-text">Gunakan nama yang spesifik untuk memudahkan identifikasi.</div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold">Nama Wali Kelas</label>
                                <input type="text" name="wali_kelas" class="form-control" placeholder="Masukkan nama lengkap guru" required>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i> Simpan Kelas
                                </button>
                                <a href="<?= base_url('kelas'); ?>" class="btn btn-outline-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>