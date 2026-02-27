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

                <form action="<?= base_url('laporan/update/' . $laporan['id_laporan']); ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id_siswa" value="<?= $siswa['id_siswa']; ?>">

                    <div class="mb-4">
                        <label class="fw-bold">Tanggal Laporan</label>
                        <input type="date" name="tanggal_lap" class="form-control" value="<?= $laporan['tanggal_lap']; ?>" required>
                    </div>

                    <h5 class="text-primary border-bottom pb-2">1. Capaian Pembelajaran (Opsi A-D)</h5>
                    <div class="row g-3 mb-4">
                        <?php
                        $fields = [
                            'nilai_aik' => 'Pendidikan AIK',
                            'nilai_cpabp' => 'Agama & Budi Pekerti',
                            'nilai_cpjd' => 'Jati Diri',
                            'nilai_cpdl' => 'Literasi & STEAM',
                            'nilai_p5' => 'Projek P5'
                        ];
                        foreach ($fields as $field => $label) : ?>
                            <div class="col-md-4">
                                <label><?= $label; ?></label>
                                <select name="<?= $field; ?>" class="form-select">
                                    <?php foreach (['A', 'B', 'C', 'D'] as $opt) : ?>
                                        <option value="<?= $opt; ?>" <?= ($laporan[$field] == $opt) ? 'selected' : ''; ?>><?= $opt; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <h5 class="text-primary border-bottom pb-2">2. Pertumbuhan & Kehadiran</h5>
                    <div class="row g-3 mb-4">
                        <div class="col-md-2">
                            <label>Berat (kg)</label>
                            <input type="number" step="0.1" name="berat_badan" class="form-control" value="<?= $laporan['berat_badan']; ?>">
                        </div>
                        <div class="col-md-2">
                            <label>Tinggi (cm)</label>
                            <input type="number" step="0.1" name="tinggi_badan" class="form-control" value="<?= $laporan['tinggi_badan']; ?>">
                        </div>
                        <div class="col-md-2">
                            <label>L. Kepala (cm)</label>
                            <input type="number" step="0.1" name="lingkar_kepala" class="form-control" value="<?= $laporan['lingkar_kepala'] ?? ''; ?>">
                        </div>
                        <div class="col-md-2">
                            <label>Sakit</label>
                            <input type="number" name="sakit" class="form-control" value="<?= $laporan['sakit']; ?>">
                        </div>
                        <div class="col-md-2">
                            <label>Izin</label>
                            <input type="number" name="izin" class="form-control" value="<?= $laporan['izin']; ?>">
                        </div>
                        <div class="col-md-2">
                            <label>Alfa</label>
                            <input type="number" name="alfa" class="form-control" value="<?= $laporan['alfa']; ?>">
                        </div>
                    </div>

                    <h5 class="text-primary border-bottom pb-2">3. Narasi Perkembangan Khusus</h5>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="fw-bold">Aspek Motorik</label>
                            <textarea name="aspek_motorik" class="form-control" rows="3"><?= esc($laporan['aspek_motorik'] ?? ''); ?></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="fw-bold">Aspek Kognitif</label>
                            <textarea name="aspek_kognitif" class="form-control" rows="3"><?= esc($laporan['aspek_kognitif'] ?? ''); ?></textarea>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="fw-bold">Catatan Guru (Tambahan)</label>
                        <textarea name="catatan_guru" class="form-control" rows="3"><?= esc($laporan['catatan_guru']); ?></textarea>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="fw-bold">Guru Wali Kelas</label>
                            <input type="text" name="guru_wali" class="form-control" value="<?= esc($laporan['guru_wali']); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="fw-bold">Ganti Foto Kegiatan (Opsional)</label>
                            <input type="file" name="foto_kegiatan" class="form-control" accept="image/*">
                            <?php if ($laporan['foto_kegiatan']): ?>
                                <small class="text-muted">File saat ini: <?= $laporan['foto_kegiatan']; ?></small>
                            <?php endif; ?>
                        </div>
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