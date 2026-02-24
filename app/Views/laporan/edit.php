<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <?= $this->include('layout/navbar'); ?>

    <div class="container mt-5 mb-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Edit Rapor: <?= $siswa['nama_anak']; ?></h4>
            </div>
            <div class="card-body">
                <?php if (!empty($laporan['pesan_kepsek'])) : ?>
                    <div class="alert alert-warning border-start border-4 border-warning mb-4">
                        <strong>Catatan Revisi Kepala Sekolah:</strong>
                        <p class="mb-0"><?= esc($laporan['pesan_kepsek']); ?></p>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('laporan/update/' . $laporan['id_laporan']); ?>" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id_siswa" value="<?= $siswa['id_siswa']; ?>">
                    
                    <div class="mb-4">
                        <label class="fw-bold">Tanggal Laporan</label>
                        <input type="date" name="tanggal_lap" class="form-control" value="<?= $laporan['tanggal_lap']; ?>" required>
                    </div>

                    <h5 class="text-primary border-bottom pb-2">1. Capaian Pembelajaran</h5>
                    <div class="row g-3 mb-4">
                        <?php 
                        $fields = [
                            'nilai_aik' => 'AIK (Al-Islam, Kemuhammadiyahan)',
                            'nilai_cpabp' => 'Nilai Agama & Budi Pekerti (CPABP)',
                            'nilai_cpjd' => 'Jati Diri (CPJD)',
                            'nilai_cpdl' => 'Dasar Literasi & STEAM (CPDL)',
                            'nilai_p5' => 'Projek Profil Pelajar Pancasila (P5)'
                        ];
                        foreach ($fields as $name => $label) : ?>
                            <div class="col-md-6">
                                <label><?= $label; ?></label>
                                <select name="<?= $name; ?>" class="form-select" required>
                                    <option value="A" <?= ($laporan[$name] ?? '') == 'A' ? 'selected' : ''; ?>>A - Sangat Baik</option>
                                    <option value="B" <?= ($laporan[$name] ?? '') == 'B' ? 'selected' : ''; ?>>B - Sesuai Harapan</option>
                                    <option value="C" <?= ($laporan[$name] ?? '') == 'C' ? 'selected' : ''; ?>>C - Mulai Berkembang</option>
                                    <option value="D" <?= ($laporan[$name] ?? '') == 'D' ? 'selected' : ''; ?>>D - Perlu Bimbingan</option>
                                </select>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <h5 class="text-primary border-bottom pb-2">2. Pertumbuhan & Kehadiran</h5>
                    <div class="row g-3 mb-4">
                        <div class="col-md-3">
                            <label>Berat Badan (kg)</label>
                            <input type="number" step="0.1" name="berat_badan" class="form-control" value="<?= $laporan['berat_badan'] ?? ''; ?>">
                        </div>
                        <div class="col-md-3">
                            <label>Tinggi Badan (cm)</label>
                            <input type="number" step="0.1" name="tinggi_badan" class="form-control" value="<?= $laporan['tinggi_badan'] ?? ''; ?>">
                        </div>
                        <div class="col-md-2">
                            <label>Sakit</label>
                            <input type="number" name="sakit" class="form-control" value="<?= $laporan['sakit'] ?? 0; ?>">
                        </div>
                        <div class="col-md-2">
                            <label>Izin</label>
                            <input type="number" name="izin" class="form-control" value="<?= $laporan['izin'] ?? 0; ?>">
                        </div>
                        <div class="col-md-2">
                            <label>Alfa</label>
                            <input type="number" name="alfa" class="form-control" value="<?= $laporan['alfa'] ?? 0; ?>">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="fw-bold">Catatan Guru (Tambahan)</label>
                        <textarea name="catatan_guru" class="form-control" rows="3"><?= esc($laporan['catatan_guru']); ?></textarea>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg text-white">Simpan Perubahan Rapor</button>
                        <a href="<?= base_url('laporan/detail/' . $siswa['id_siswa']); ?>" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>