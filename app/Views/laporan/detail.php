<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>
<body class="bg-light">
    <?= $this->include('layout/navbar'); ?>

    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="mb-0">Riwayat Rapor: <?= $siswa['nama_anak']; ?></h2>
                <span class="text-muted">Kelas: <?= $siswa['kelas']; ?> | NISN: <?= $siswa['nisn'] ?? '-'; ?></span>
            </div>
            <?php if (session()->get('role') != 'orangtua') : ?>
                <a href="<?= base_url('siswa'); ?>" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
            <?php endif; ?>
        </div>

        <?php if (empty($laporan)) : ?>
            <div class="alert alert-info shadow-sm">
                <i class="bi bi-info-circle me-2"></i> 
                <?= session()->get('role') == 'orangtua' ? 'Rapor belum tersedia atau sedang dalam proses validasi.' : 'Belum ada catatan perkembangan untuk siswa ini.'; ?>
            </div>
        <?php else : ?>
            <div class="accordion" id="accordionLaporan">
                <?php foreach ($laporan as $key => $lap) : ?>
                    <div class="accordion-item shadow-sm mb-3 border-0">
                        <h2 class="accordion-header">
                            <button class="accordion-button <?= $key == 0 ? '' : 'collapsed'; ?> bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $lap['id_laporan']; ?>">
                                <div class="d-flex justify-content-between w-100 align-items-center me-3">
                                    <span><strong><i class="bi bi-calendar3 me-2"></i> Laporan Tanggal: <?= date('d F Y', strtotime($lap['tanggal_lap'])); ?></strong></span>
                                    <span class="badge <?= $lap['status_validasi'] == 'disetujui' ? 'bg-success' : 'bg-warning text-dark'; ?>">
                                        <?= $lap['status_validasi'] == 'disetujui' ? 'Sudah Divalidasi' : 'Menunggu Validasi'; ?>
                                    </span>
                                </div>
                            </button>
                        </h2>
                        <div id="collapse<?= $lap['id_laporan']; ?>" class="accordion-collapse collapse <?= $key == 0 ? 'show' : ''; ?>" data-bs-parent="#accordionLaporan">
                            <div class="accordion-body bg-white">
                                
                                <?php if (!empty($lap['pesan_kepsek'])) : ?>
                                    <div class="alert alert-warning border-start border-4 border-warning mb-4">
                                        <strong><i class="bi bi-exclamation-triangle"></i> Catatan Revisi Kepala Sekolah:</strong>
                                        <p class="mb-0 mt-1"><?= esc($lap['pesan_kepsek']); ?></p>
                                    </div>
                                <?php endif; ?>

                                <?php if (session()->get('role') == 'kepsek' && $lap['status_validasi'] == 'pending') : ?>
                                    <div class="card mb-4 border-primary">
                                        <div class="card-body bg-light">
                                            <h6 class="fw-bold"><i class="bi bi-pencil-square"></i> Validasi Laporan Ini:</h6>
                                            <form action="<?= base_url('laporan/validasi/' . $lap['id_laporan']); ?>" method="post">
                                                <textarea name="pesan_kepsek" class="form-control mb-2" rows="2" placeholder="Tulis catatan jika butuh revisi..."></textarea>
                                                <div class="d-flex gap-2">
                                                    <button type="submit" name="aksi" value="disetujui" class="btn btn-success btn-sm">Setujui & Tandatangani</button>
                                                    <button type="submit" name="aksi" value="revisi" class="btn btn-warning btn-sm">Kirim untuk Revisi</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="p-3 border rounded-3 h-100 shadow-sm">
                                            <h6 class="text-primary fw-bold border-bottom pb-2">Nilai Agama & AIK</h6>
                                            <p class="small mb-3"><strong>AIK:</strong> <?= get_deskripsi('nilai_aik', $lap['nilai_aik'], $siswa['nama_anak']); ?></p>
                                            <p class="small mb-0"><strong>Agama & Budi Pekerti:</strong> <?= get_deskripsi('nilai_cpabp', $lap['nilai_cpabp'], $siswa['nama_anak']); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="p-3 border rounded-3 h-100 shadow-sm">
                                            <h6 class="text-success fw-bold border-bottom pb-2">Jati Diri & Literasi</h6>
                                            <p class="small mb-3"><strong>Jati Diri:</strong> <?= get_deskripsi('nilai_cpjd', $lap['nilai_cpjd'], $siswa['nama_anak']); ?></p>
                                            <p class="small mb-0"><strong>Literasi & STEAM:</strong> <?= get_deskripsi('nilai_cpdl', $lap['nilai_cpdl'], $siswa['nama_anak']); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="p-3 border rounded-3 shadow-sm">
                                            <h6 class="text-dark fw-bold border-bottom pb-2">Projek P5 & Pertumbuhan</h6>
                                            <p class="small"><strong>Projek P5:</strong> <?= get_deskripsi('nilai_p5', $lap['nilai_p5'], $siswa['nama_anak']); ?></p>
                                            <hr>
                                            <div class="d-flex gap-4 text-center">
                                                <div><small class="text-muted d-block">Berat Badan</small> <strong><?= $lap['berat_badan']; ?> kg</strong></div>
                                                <div><small class="text-muted d-block">Tinggi Badan</small> <strong><?= $lap['tinggi_badan']; ?> cm</strong></div>
                                                <div><small class="text-muted d-block">Absensi (S/I/A)</small> <strong><?= $lap['sakit']; ?> / <?= $lap['izin']; ?> / <?= $lap['alfa']; ?></strong></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
    <div class="col-md-7">
        <h6 class="text-dark fw-bold border-bottom pb-2">Dokumentasi Kegiatan</h6>
        <?php if (!empty($lap['foto_kegiatan'])) : ?>
            <img src="<?= base_url('uploads/rapor/' . $lap['foto_kegiatan']); ?>" class="img-fluid rounded shadow-sm" style="max-height: 250px;">
        <?php else : ?>
            <p class="text-muted small italic">Tidak ada dokumentasi foto.</p>
        <?php endif; ?>
    </div>

    <div class="col-md-5 text-end">
        <p class="mb-5">Jatibarang, <?= date('d F Y', strtotime($lap['tanggal_lap'])); ?><br>Guru Wali Kelas,</p>
        <br>
        <p><strong><u><?= $lap['guru_wali'] ?? 'Belum Diisi'; ?></u></strong></p>
    </div>
</div>
                                </div>

                                <div class="mt-4 pt-3 border-top d-flex justify-content-between align-items-center">
                                    <span class="text-muted fst-italic small">"<?= esc($lap['catatan_guru']); ?>"</span>
                                    <div class="btn-group">
                                        <?php if (session()->get('role') != 'orangtua') : ?>
                                            <a href="<?= base_url('laporan/edit/' . $lap['id_laporan']); ?>" class="btn btn-outline-warning btn-sm">Edit Data</a>
                                        <?php endif; ?>
                                        <a href="<?= base_url('laporan/cetak/' . $lap['id_laporan']); ?>" class="btn btn-danger btn-sm" target="_blank">
                                            <i class="bi bi-file-earmark-pdf"></i> Download PDF
                                        </a>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>