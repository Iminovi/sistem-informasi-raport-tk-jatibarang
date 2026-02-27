<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Perkembangan Anak - <?= $siswa['nama_anak']; ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/pdf_laporan.css'); ?>">
</head>
<body>

    <!-- ============================================
         HALAMAN 1: KETERANGAN DIRI ANAK DIDIK
         ============================================ -->
    <div class="page">
        <!-- Header -->
        <div class="header-laporan">
            <div class="line1">LAPORAN</div>
            <div class="line2">PERKEMBANGAN ANAK DIDIK</div>
            <div class="line3">TAMAN KANAK-KANAK 'AISYIYAH BUSTANUL ATHFAL</div>
        </div>

        <!-- Info Sekolah -->
        <table class="table-info">
            <tr><td class="label">Nama TK</td><td class="sep">:</td><td class="val">TK AISYIYAH BUSTANUL ATHFAL</td></tr>
            <tr><td class="label">NSS</td><td class="sep">:</td><td class="val">002032916043</td></tr>
            <tr><td class="label">NPSN</td><td class="sep">:</td><td class="val">20360517</td></tr>
            <tr><td class="label">Alamat</td><td class="sep">:</td><td class="val">JL. TEGALWULUNG RT 09 RW 01</td></tr>
            <tr><td class="label">Desa/Kelurahan</td><td class="sep">:</td><td class="val">JATIBARANG LOR</td></tr>
            <tr><td class="label">Kecamatan</td><td class="sep">:</td><td class="val">JATIBARANG</td></tr>
            <tr><td class="label">Kabupaten</td><td class="sep">:</td><td class="val">BREBES</td></tr>
            <tr><td class="label">Propinsi</td><td class="sep">:</td><td class="val">JAWA TENGAH</td></tr>
        </table>

        <!-- Nama Anak -->
        <div class="nama-section">
            <div class="label-nama">Nama Anak Didik :</div>
            <div class="val-nama"><?= strtoupper($siswa['nama_anak']); ?></div>
        </div>

        <!-- Pimpinan -->
        <div class="pimpinan">
            PIMPINAN PUSAT 'AISYIYAH<br>
            MAJELIS PAUD DASAR DAN MENENGAH
        </div>

        <!-- Tabel Keterangan -->
        <table class="table-keterangan">
            <tr>
                <td class="no">1</td>
                <td class="label" colspan="3">Nama Anak Didik</td>
            </tr>
            <tr class="sub">
                <td></td>
                <td class="sub-label">a. Nama lengkap</td>
                <td class="sep">:</td>
                <td class="val bold upper"><?= strtoupper($siswa['nama_anak']); ?></td>
            </tr>
            <tr class="sub">
                <td></td>
                <td class="sub-label">b. Nama panggilan</td>
                <td class="sep">:</td>
                <td class="val upper"><?= strtoupper($siswa['nama_panggilan'] ?? '-'); ?></td>
            </tr>
            <tr>
                <td class="no">2</td>
                <td class="label">Nomor Induk Sekolah (NIS)</td>
                <td class="sep">:</td>
                <td class="val"><?= $siswa['nis'] ?? '-'; ?></td>
            </tr>
            <tr>
                <td class="no">3</td>
                <td class="label">Nomor Induk Siswa Nasional (NISN)</td>
                <td class="sep">:</td>
                <td class="val"><?= $siswa['nisn'] ?? '-'; ?></td>
            </tr>
            <tr>
                <td class="no">4</td>
                <td class="label">Jenis Kelamin</td>
                <td class="sep">:</td>
                <td class="val"><?= $siswa['jenis_kelamin'] ?? '-'; ?></td>
            </tr>
            <tr>
                <td class="no">5</td>
                <td class="label">Tempat dan tanggal lahir</td>
                <td class="sep">:</td>
                <td class="val"><?= $siswa['tempat_lahir']; ?>, <?= date('d F Y', strtotime($siswa['tanggal_lahir'])); ?></td>
            </tr>
            <tr>
                <td class="no">6</td>
                <td class="label">Agama</td>
                <td class="sep">:</td>
                <td class="val upper"><?= strtoupper($siswa['agama'] ?? 'ISLAM'); ?></td>
            </tr>
            <tr>
                <td class="no">7</td>
                <td class="label">Anak ke</td>
                <td class="sep">:</td>
                <td class="val"><?= $siswa['anak_ke'] ?? '-'; ?></td>
            </tr>
            <tr>
                <td class="no">8</td>
                <td class="label">Nama Orang Tua/Wali</td>
                <td class="sep">:</td>
                <td class="val upper"><?= strtoupper($siswa['nama_orang_tua'] ?? '-'); ?></td>
            </tr>
            <tr>
                <td class="no">9</td>
                <td class="label">Pekerjaan Orang Tua/Wali</td>
                <td class="sep">:</td>
                <td class="val upper"><?= strtoupper($siswa['pekerjaan_orang_tua'] ?? '-'); ?></td>
            </tr>
            <tr>
                <td class="no" rowspan="5">10</td>
                <td class="label" colspan="3">Alamat Orang Tua/Wali</td>
            </tr>
            <tr class="sub"><td class="sub-label">a. Jalan</td><td class="sep">:</td><td class="val upper"><?= strtoupper($siswa['alamat_jalan'] ?? '-'); ?></td></tr>
            <tr class="sub"><td class="sub-label">b. Desa/Kelurahan</td><td class="sep">:</td><td class="val upper"><?= strtoupper($siswa['desa_kelurahan'] ?? '-'); ?></td></tr>
            <tr class="sub"><td class="sub-label">c. Kecamatan</td><td class="sep">:</td><td class="val">JATIBARANG</td></tr>
            <tr class="sub"><td class="sub-label">d. Kabupaten/Kota</td><td class="sep">:</td><td class="val">BREBES</td></tr>
            <tr class="sub"><td class="sub-label">e. Propinsi</td><td class="sep">:</td><td class="val">JAWA TENGAH</td></tr>
        </table>

        <!-- TTD -->
        <div class="ttd-hal1">
            <div class="foto-box">FOTO<br>3 x 4</div>
            <div class="ttd-kanan">
                <div class="tempat">Jatibarang, <?= date('F Y'); ?></div>
                <div class="jabatan">Kepala<br>Taman Kanak-Kanak 'Aisyiyah Bustanul Athfal</div>
                <div class="nama"><?= strtoupper($kepsek ?? 'RIRIN RISNIAWATI, S.Pd AUD'); ?></div>
                <div class="nbm">NBM. <?= $nbm_kepsek ?? 'KTAA.0319 8312 58516'; ?></div>
            </div>
        </div>
    </div>

    <!-- ============================================
         HALAMAN 2: PERKEMBANGAN ANAK
         ============================================ -->
    <div class="page">
        <div class="header-perkembangan">PERKEMBANGAN ANAK DIDIK</div>

        <!-- Info -->
        <table class="table-data">
            <tr>
                <td class="label">NAMA ANAK</td><td class="sep">:</td><td class="val bold upper"><?= strtoupper($siswa['nama_anak']); ?></td>
                <td class="label">USIA</td><td class="sep">:</td><td class="val"><?= $usia ?? '-'; ?> TAHUN</td>
            </tr>
            <tr>
                <td class="label">NIS</td><td class="sep">:</td><td class="val"><?= $siswa['nis'] ?? '-'; ?></td>
                <td class="label">SEMESTER</td><td class="sep">:</td><td class="val"><?= $semester ?? 'I (Satu)'; ?></td>
            </tr>
            <tr>
                <td class="label">KELOMPOK</td><td class="sep">:</td><td class="val bold upper"><?= strtoupper($siswa['kelompok'] ?? 'A'); ?></td>
                <td></td><td></td><td></td>
            </tr>
        </table>

        <!-- Capaian -->
        <table class="table-capaian">
            <thead><tr><th colspan="2">CAPAIAN PEMBELAJARAN</th></tr></thead>
            <tbody>
                <tr><td class="aspek">Al-Islam (AIK)</td><td class="deskripsi"><?= nl2br($desk_aik ?? '-'); ?></td></tr>
                <tr><td class="aspek">Agama & Budi Pekerti</td><td class="deskripsi"><?= nl2br($desk_cpabp ?? '-'); ?></td></tr>
                <tr><td class="aspek">Jati Diri</td><td class="deskripsi"><?= nl2br($desk_cpjd ?? '-'); ?></td></tr>
                <tr><td class="aspek">Literasi & STEAM</td><td class="deskripsi"><?= nl2br($desk_cpdl ?? '-'); ?></td></tr>
                <tr><td class="aspek">Projek P5</td><td class="deskripsi"><?= nl2br($desk_p5 ?? '-'); ?></td></tr>
            </tbody>
        </table>

        <!-- Pertumbuhan -->
        <table class="table-pertumbuhan">
            <thead><tr><th colspan="2">PERTUMBUHAN DAN KEHADIRAN ANAK</th></tr></thead>
            <tbody>
                <tr>
                    <td class="kiri">
                        <div class="title">PERTUMBUHAN</div>
                        <div class="item">Berat Badan : <?= $laporan['berat_badan'] ?? '-'; ?> kg</div>
                        <div class="item">Tinggi Badan : <?= $laporan['tinggi_badan'] ?? '-'; ?> cm</div>
                        <div class="item">Lingkar Kepala : <?= $laporan['lingkar_kepala'] ?? '-'; ?> cm</div>
                        <div class="item">Lingkar Lengan : <?= $laporan['lingkar_lengan'] ?? '-'; ?> cm</div>
                    </td>
                    <td class="kanan">
                        <div class="title">KEHADIRAN ANAK</div>
                        <div class="item">Sakit : <?= $laporan['sakit'] ?? '-'; ?> hari</div>
                        <div class="item">Izin : <?= $laporan['izin'] ?? '-'; ?> hari</div>
                        <div class="item">Tanpa Keterangan : <?= $laporan['alfa'] ?? '-'; ?> hari</div>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Uraian -->
        <table class="table-uraian">
            <thead><tr><th colspan="2">URAIAN PERKEMBANGAN KHUSUS</th></tr></thead>
            <tbody>
                <tr><td class="aspek">Aspek Motorik</td><td class="deskripsi"><?= $laporan['aspek_motorik'] ?? '-'; ?></td></tr>
                <tr><td class="aspek">Aspek Kognitif</td><td class="deskripsi"><?= $laporan['aspek_kognitif'] ?? '-'; ?></td></tr>
            </tbody>
        </table>

        <!-- Refleksi -->
        <div class="refleksi">
            <div class="title">Refleksi Orang Tua</div>
            <div class="content"><?= $refleksi_ortu ?? ''; ?></div>
        </div>

        <!-- TTD -->
        <div class="ttd-tanggal">Jatibarang, <?= date('d F Y', strtotime($laporan['tanggal_lap'] ?? 'now')); ?></div>
        <table class="ttd-hal2">
            <tr>
                <td>
                    <div class="jabatan">Mengetahui,<br>Kepala TK 'Aisyiyah Bustanul Athfal</div>
                    <div class="nama"><?= strtoupper($kepsek ?? 'RIRIN RISNIAWATI, S.Pd AUD'); ?></div>
                    <div class="nbm"><?= $nbm_kepsek ?? 'KTAA.0319 8312 58516'; ?></div>
                </td>
                <td>
                    <div class="jabatan">Guru Kelas</div>
                    <div class="nama"><?= strtoupper($laporan['guru_wali'] ?? 'RIRIN RISNIAWATI, S.Pd AUD'); ?></div>
                    <div class="nbm"><?= $nbm_guru ?? 'KTAA.0319 8312 58516'; ?></div>
                </td>
            </tr>
        </table>
    </div>

    <!-- ============================================
         HALAMAN 3: DOKUMENTASI
         ============================================ -->
    <div class="page last-page">
        <div class="header-dokumentasi">
            <div class="title">DOKUMENTASI FOTO-FOTO KEGIATAN ANAK</div>
            <div class="subtitle">Dengan keterangan gambar sesuai narasi</div>
        </div>

        <!-- Foto -->
        <?php if (!empty($laporan['foto_kegiatan'])) : ?>
            <div class="foto-wrap">
                <img src="<?= "data:image/png;base64," . base64_encode(file_get_contents(FCPATH . 'uploads/rapor/' . $laporan['foto_kegiatan'])); ?>" alt="Dokumentasi">
                <div class="keterangan"><strong>Keterangan:</strong> <?= $laporan['catatan_guru'] ?? '-'; ?></div>
            </div>
        <?php else : ?>
            <div class="foto-grid">
                <div class="placeholder">Foto 1</div>
                <div class="placeholder">Foto 2</div>
                <div class="placeholder">Foto 3</div>
            </div>
        <?php endif; ?>

        <!-- TTD -->
        <table class="ttd-hal3">
            <tr>
                <td>
                    <div class="jabatan">Mengetahui,<br>Orang Tua/Wali</div>
                    <div class="garis"></div>
                    <div class="nama">(................................)</div>
                </td>
                <td>
                    <div class="tempat">Jatibarang, <?= date('d F Y', strtotime($laporan['tanggal_lap'] ?? 'now')); ?></div>
                    <div class="jabatan">Guru Kelas</div>
                    <div class="garis"></div>
                    <div class="nama"><?= strtoupper($laporan['guru_wali'] ?? 'RIRIN RISNIAWATI, S.Pd AUD'); ?></div>
                </td>
            </tr>
        </table>
    </div>

</body>
</html>