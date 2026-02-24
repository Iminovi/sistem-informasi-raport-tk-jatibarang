<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <?= $this->include('layout/navbar'); ?>

    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Tambah Siswa ke Kelas: <?= $kelas['nama_kelas']; ?></h4>
                <a href="<?= base_url('kelas'); ?>" class="btn btn-light btn-sm">Kembali</a>
            </div>
            <div class="card-body">
                <form action="<?= base_url('kelas/simpan_siswa_ke_kelas'); ?>" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id_kelas" value="<?= $kelas['id_kelas']; ?>">
                    
                    <div class="table-responsive">
                        <table class="table table-hover mt-3">
                            <thead class="table-dark">
                                <tr>
                                    <th width="50">Pilih</th>
                                    <th>Nama Siswa</th>
                                    <th>NISN</th>
                                    <th>Kelas Saat Ini</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($semua_siswa as $s) : ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="siswa_ids[]" value="<?= $s['id_siswa']; ?>">
                                    </td>
                                    <td><?= $s['nama_anak']; ?></td>
                                    <td><?= $s['nisn']; ?></td>
                                    <td><?= $s['kelas']; ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-primary btn-lg">Masukkan Siswa Terpilih ke Kelas</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>