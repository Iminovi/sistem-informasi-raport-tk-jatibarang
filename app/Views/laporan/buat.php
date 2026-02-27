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
            <div class="card-header bg-success text-white">
                <h4 class="mb-0">Input Rapor: <?= $siswa['nama_anak']; ?> (<?= $siswa['kelas']; ?>)</h4>
            </div>
            <div class="card-body">
                <form action="<?= base_url('laporan/simpan'); ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id_siswa" value="<?= $siswa['id_siswa']; ?>">
                    
                    <div class="mb-4">
                        <label class="fw-bold">Tanggal Laporan</label>
                        <input type="date" name="tanggal_lap" class="form-control" value="<?= date('Y-m-d'); ?>" required>
                    </div>

                    <h5 class="text-success border-bottom pb-2">1. Capaian Pembelajaran (Opsi A-D)</h5>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label>AIK (Al-Islam, Kemuhammadiyahan)</label>
                            <select name="nilai_aik" class="form-select" required>
                                <option value="A">A - Sangat Baik</option>
                                <option value="B">B - Sesuai Harapan</option>
                                <option value="C">C - Mulai Berkembang</option>
                                <option value="D">D - Perlu Bimbingan</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Nilai Agama & Budi Pekerti (CPABP)</label>
                            <select name="nilai_cpabp" class="form-select" required>
                                <option value="A">A - Sangat Baik</option>
                                <option value="B">B - Sesuai Harapan</option>
                                <option value="C">C - Mulai Berkembang</option>
                                <option value="D">D - Perlu Bimbingan</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Jati Diri (CPJD)</label>
                            <select name="nilai_cpjd" class="form-select" required>
                                <option value="A">A - Sangat Baik</option>
                                <option value="B">B - Sesuai Harapan</option>
                                <option value="C">C - Mulai Berkembang</option>
                                <option value="D">D - Perlu Bimbingan</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Dasar Literasi & STEAM (CPDL)</label>
                            <select name="nilai_cpdl" class="form-select" required>
                                <option value="A">A - Sangat Baik</option>
                                <option value="B">B - Sesuai Harapan</option>
                                <option value="C">C - Mulai Berkembang</option>
                                <option value="D">D - Perlu Bimbingan</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label>Projek Penguatan Profil Pelajar Pancasila (P5)</label>
                            <select name="nilai_p5" class="form-select" required>
                                <option value="A">A - Sangat Baik</option>
                                <option value="B">B - Sesuai Harapan</option>
                                <option value="C">C - Mulai Berkembang</option>
                                <option value="D">D - Perlu Bimbingan</option>
                            </select>
                        </div>
                    </div>

                    <h5 class="text-success border-bottom pb-2">2. Pertumbuhan & Kehadiran</h5>
                    <div class="row g-3 mb-4">
                        <div class="col-md-3">
                            <label>Berat Badan (kg)</label>
                            <input type="number" step="0.1" name="berat_badan" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label>Tinggi Badan (cm)</label>
                            <input type="number" step="0.1" name="tinggi_badan" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label>Sakit</label>
                            <input type="number" name="sakit" class="form-control" value="0">
                        </div>
                        <div class="col-md-2">
                            <label>Izin</label>
                            <input type="number" name="izin" class="form-control" value="0">
                        </div>
                        <div class="col-md-2">
                            <label>Alfa</label>
                            <input type="number" name="alfa" class="form-control" value="0">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="fw-bold">Catatan Guru (Tambahan)</label>
                        <textarea name="catatan_guru" class="form-control" rows="3" placeholder="Tuliskan catatan tambahan..."></textarea>
                    </div>

                    <h5 class="text-success border-bottom pb-2">3. Administrasi & Dokumentasi</h5>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="fw-bold">Guru Wali Kelas (Manual)</label>
                            <input type="text" name="guru_wali" class="form-control" value="<?= session()->get('nama'); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="fw-bold">Unggah Foto Kegiatan</label>
                            <input type="file" name="foto_kegiatan" class="form-control" accept="image/*">
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success btn-lg">Simpan Laporan Rapor</button>
                        <a href="<?= base_url('siswa'); ?>" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>