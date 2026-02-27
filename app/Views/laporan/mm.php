<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Perkembangan Anak - <?= $siswa['nama_anak']; ?></title>
    <style>
        @page { 
            margin: 1.5cm 2cm; 
            size: A4;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body { 
            font-family: "Times New Roman", Times, serif; 
            font-size: 11pt; 
            line-height: 1.4; 
            color: #000;
        }
        
        .page { 
            page-break-after: always; 
            position: relative;
            min-height: 100%;
        }
        
        .last-page { 
            page-break-after: never; 
        }
        
        /* ============================================
           HALAMAN 1 - KETERANGAN DIRI
           ============================================ */
        
        /* Header Laporan */
        .laporan-header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 3px double #000;
            padding-bottom: 15px;
        }
        
        .laporan-title {
            font-size: 14pt;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 5px;
        }
        
        .laporan-subtitle {
            font-size: 16pt;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        /* Info Sekolah Box */
        .info-sekolah {
            width: 100%;
            margin: 20px 0;
            border: 1px solid #000;
        }
        
        .info-sekolah td {
            padding: 4px 8px;
            vertical-align: top;
            font-size: 10pt;
        }
        
        .info-sekolah td:first-child {
            width: 25%;
        }
        
        .info-sekolah td:nth-child(2) {
            width: 5%;
            text-align: center;
        }
        
        /* Nama Anak Highlight */
        .nama-anak-box {
            margin: 25px 0;
            text-align: center;
        }
        
        .nama-anak-label {
            font-size: 12pt;
            margin-bottom: 10px;
        }
        
        .nama-anak-value {
            font-size: 14pt;
            font-weight: bold;
            text-decoration: underline;
            text-transform: uppercase;
        }
        
        /* Pimpinan */
        .pimpinan-text {
            text-align: center;
            font-size: 11pt;
            font-weight: bold;
            margin: 20px 0;
            line-height: 1.6;
        }
        
        /* Tabel Keterangan Diri */
        .tabel-keterangan {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }
        
        .tabel-keterangan td {
            padding: 6px 8px;
            vertical-align: top;
            border: 1px solid #000;
        }
        
        .tabel-keterangan .nomor {
            width: 5%;
            text-align: center;
            font-weight: bold;
        }
        
        .tabel-keterangan .label {
            width: 35%;
            font-weight: normal;
        }
        
        .tabel-keterangan .titik {
            width: 3%;
            text-align: center;
        }
        
        .tabel-keterangan .nilai {
            width: 57%;
        }
        
        .tabel-keterangan .sub-label {
            padding-left: 20px;
        }
        
        /* Foto Box */
        .foto-container {
            float: left;
            width: 30%;
            margin-top: 30px;
        }
        
        .foto-box { 
            border: 1px solid #000; 
            width: 3cm; 
            height: 4cm; 
            margin: 0 auto;
            display: flex; 
            align-items: center; 
            justify-content: center; 
            text-align: center;
            font-size: 9pt;
        }
        
        /* Tanda Tangan */
        .ttd-container {
            float: right;
            width: 50%;
            margin-top: 30px;
            text-align: center;
        }
        
        .ttd-jabatan {
            font-size: 11pt;
            margin-bottom: 60px;
        }
        
        .ttd-nama {
            font-size: 11pt;
            font-weight: bold;
            text-decoration: underline;
        }
        
        .ttd-nbm {
            font-size: 10pt;
        }
        
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }
        
        /* ============================================
           HALAMAN 2 - PERKEMBANGAN ANAK
           ============================================ */
        
        .header-perkembangan {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .header-perkembangan h2 {
            font-size: 14pt;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 5px;
        }
        
        .header-perkembangan h3 {
            font-size: 12pt;
            font-weight: bold;
            text-transform: uppercase;
        }
        
        /* Info Box Atas */
        .info-atas {
            width: 100%;
            margin: 15px 0;
            border: 1px solid #000;
        }
        
        .info-atas td {
            padding: 6px 10px;
            border: 1px solid #000;
            font-size: 10pt;
        }
        
        .info-atas .label {
            font-weight: bold;
            width: 15%;
        }
        
        .info-atas .separator {
            width: 3%;
            text-align: center;
        }
        
        .info-atas .value {
            width: 32%;
        }
        
        /* Tabel Perkembangan */
        .tabel-perkembangan {
            width: 100%;
            margin: 15px 0;
            border-collapse: collapse;
        }
        
        .tabel-perkembangan th,
        .tabel-perkembangan td {
            border: 1px solid #000;
            padding: 8px;
            vertical-align: top;
        }
        
        .tabel-perkembangan th {
            background-color: #f5f5f5;
            font-weight: bold;
            text-align: center;
            font-size: 11pt;
        }
        
        .tabel-perkembangan .aspek {
            font-weight: bold;
            width: 25%;
            background-color: #fafafa;
        }
        
        .tabel-perkembangan .deskripsi {
            width: 75%;
            text-align: justify;
        }
        
        /* Tabel Pertumbuhan */
        .tabel-pertumbuhan {
            width: 100%;
            margin: 15px 0;
            border-collapse: collapse;
        }
        
        .tabel-pertumbuhan th {
            background-color: #f5f5f5;
            border: 1px solid #000;
            padding: 8px;
            font-weight: bold;
            text-align: center;
        }
        
        .tabel-pertumbuhan td {
            border: 1px solid #000;
            padding: 8px;
        }
        
        .tabel-pertumbuhan .kiri {
            width: 50%;
        }
        
        .tabel-pertumbuhan .kanan {
            width: 50%;
        }
        
        /* Refleksi Orang Tua */
        .refleksi-box {
            border: 1px solid #000;
            margin: 20px 0;
            min-height: 100px;
        }
        
        .refleksi-title {
            background-color: #f5f5f5;
            border-bottom: 1px solid #000;
            padding: 8px;
            font-weight: bold;
            text-align: center;
        }
        
        .refleksi-content {
            padding: 15px;
            min-height: 80px;
        }
        
        /* Tanda Tangan Halaman 2 */
        .ttd-hal2 {
            width: 100%;
            margin-top: 30px;
        }
        
        .ttd-hal2 td {
            width: 50%;
            text-align: center;
            vertical-align: top;
            padding: 10px;
        }
        
        .ttd-hal2 .jabatan {
            margin-bottom: 60px;
            font-size: 11pt;
        }
        
        .ttd-hal2 .nama {
            font-weight: bold;
            text-decoration: underline;
            font-size: 11pt;
        }
        
        .ttd-hal2 .nbm {
            font-size: 10pt;
        }
        
        /* ============================================
           HALAMAN 3 - DOKUMENTASI
           ============================================ */
        
        .header-dokumentasi {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .header-dokumentasi h2 {
            font-size: 14pt;
            font-weight: bold;
            text-transform: uppercase;
        }
        
        .dokumentasi-subtitle {
            text-align: center;
            font-size: 11pt;
            font-style: italic;
            margin-bottom: 20px;
        }
        
        /* Grid Foto */
        .foto-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
            margin: 20px 0;
        }
        
        .foto-item {
            width: 30%;
            text-align: center;
        }
        
        .foto-item img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border: 1px solid #000;
        }
        
        .foto-keterangan {
            font-size: 9pt;
            margin-top: 5px;
            font-style: italic;
        }
        
        /* Foto Besar */
        .foto-besar {
            text-align: center;
            margin: 20px 0;
        }
        
        .foto-besar img {
            max-width: 80%;
            max-height: 300px;
            border: 1px solid #000;
        }
        
        /* Tanda Tangan Halaman 3 */
        .ttd-hal3 {
            width: 100%;
            margin-top: 40px;
            position: absolute;
            bottom: 50px;
        }
        
        .ttd-hal3 td {
            width: 50%;
            text-align: center;
            vertical-align: top;
            padding: 10px;
        }
        
        .ttd-hal3 .jabatan {
            margin-bottom: 60px;
        }
        
        .ttd-hal3 .nama {
            font-weight: bold;
            text-decoration: underline;
        }
        
        /* Utilities */
        .text-center { text-align: center; }
        .text-uppercase { text-transform: uppercase; }
        .fw-bold { font-weight: bold; }
        .fst-italic { font-style: italic; }
        
        /* Page break utilities */
        .page-break {
            page-break-before: always;
        }
    </style>
</head>
<body>

    <!-- ============================================
         HALAMAN 1: KETERANGAN DIRI ANAK DIDIK
         ============================================ -->
    <div class="page">
        <!-- Header -->
        <div class="laporan-header">
            <div class="laporan-title">Laporan</div>
            <div class="laporan-subtitle">Perkembangan Anak Didik</div>
            <div class="laporan-title" style="margin-top: 5px;">Taman Kanak-Kanak 'Aisyiyah Bustanul Athfal</div>
        </div>
        
        <!-- Info Sekolah -->
        <table class="info-sekolah">
            <tr>
                <td>Nama TK</td>
                <td>:</td>
                <td>TK AISYIYAH BUSTANUL ATHFAL</td>
            </tr>
            <tr>
                <td>NSS</td>
                <td>:</td>
                <td>002032916043</td>
            </tr>
            <tr>
                <td>NPSN</td>
                <td>:</td>
                <td>20360517</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>JL. TEGALWULUNG RT 09 RW 01</td>
            </tr>
            <tr>
                <td>Desa/Kelurahan</td>
                <td>:</td>
                <td>JATIBARANG LOR</td>
            </tr>
            <tr>
                <td>Kecamatan</td>
                <td>:</td>
                <td>JATIBARANG</td>
            </tr>
            <tr>
                <td>Kabupaten</td>
                <td>:</td>
                <td>BREBES</td>
            </tr>
            <tr>
                <td>Propinsi</td>
                <td>:</td>
                <td>JAWA TENGAH</td>
            </tr>
        </table>
        
        <!-- Nama Anak -->
        <div class="nama-anak-box">
            <div class="nama-anak-label">Nama Anak Didik :</div>
            <div class="nama-anak-value"><?= strtoupper($siswa['nama_anak']); ?></div>
        </div>
        
        <!-- Pimpinan -->
        <div class="pimpinan-text">
            PIMPINAN PUSAT 'AISYIYAH<br>
            MAJELIS PAUD DASAR DAN MENENGAH
        </div>
        
        <!-- Tabel Keterangan Diri -->
        <table class="tabel-keterangan">
            <tr>
                <td class="nomor">1</td>
                <td class="label" colspan="3">Nama Anak Didik</td>
            </tr>
            <tr>
                <td></td>
                <td class="label sub-label">a. Nama lengkap</td>
                <td class="titik">:</td>
                <td class="nilai fw-bold text-uppercase"><?= strtoupper($siswa['nama_anak']); ?></td>
            </tr>
            <tr>
                <td></td>
                <td class="label sub-label">b. Nama panggilan</td>
                <td class="titik">:</td>
                <td class="nilai text-uppercase"><?= strtoupper($siswa['nama_panggilan'] ?? '-'); ?></td>
            </tr>
            <tr>
                <td class="nomor">2</td>
                <td class="label">Nomor Induk Sekolah (NIS)</td>
                <td class="titik">:</td>
                <td class="nilai"><?= $siswa['nis'] ?? '-'; ?></td>
            </tr>
            <tr>
                <td class="nomor">3</td>
                <td class="label">Nomor Induk Siswa Nasional (NISN)</td>
                <td class="titik">:</td>
                <td class="nilai"><?= $siswa['nisn'] ?? '-'; ?></td>
            </tr>
            <tr>
                <td class="nomor">4</td>
                <td class="label">Jenis Kelamin</td>
                <td class="titik">:</td>
                <td class="nilai"><?= $siswa['jenis_kelamin'] ?? '-'; ?></td>
            </tr>
            <tr>
                <td class="nomor">5</td>
                <td class="label">Tempat dan tanggal lahir</td>
                <td class="titik">:</td>
                <td class="nilai"><?= $siswa['tempat_lahir']; ?>, <?= date('d F Y', strtotime($siswa['tanggal_lahir'])); ?></td>
            </tr>
            <tr>
                <td class="nomor">6</td>
                <td class="label">Agama</td>
                <td class="titik">:</td>
                <td class="nilai"><?= strtoupper($siswa['agama'] ?? 'ISLAM'); ?></td>
            </tr>
            <tr>
                <td class="nomor">7</td>
                <td class="label">Anak ke</td>
                <td class="titik">:</td>
                <td class="nilai"><?= $siswa['anak_ke'] ?? '-'; ?></td>
            </tr>
            <tr>
                <td class="nomor">8</td>
                <td class="label">Nama Orang Tua/Wali</td>
                <td class="titik">:</td>
                <td class="nilai"><?= strtoupper($siswa['nama_orang_tua'] ?? '-'); ?></td>
            </tr>
            <tr>
                <td class="nomor">9</td>
                <td class="label">Pekerjaan Orang Tua/Wali</td>
                <td class="titik">:</td>
                <td class="nilai"><?= strtoupper($siswa['pekerjaan_orang_tua'] ?? '-'); ?></td>
            </tr>
            <tr>
                <td class="nomor" rowspan="5">10</td>
                <td class="label" colspan="3">Alamat Orang Tua/Wali</td>
            </tr>
            <tr>
                <td class="label sub-label">a. Jalan</td>
                <td class="titik">:</td>
                <td class="nilai"><?= strtoupper($siswa['alamat_jalan'] ?? '-'); ?></td>
            </tr>
            <tr>
                <td class="label sub-label">b. Desa/Kelurahan</td>
                <td class="titik">:</td>
                <td class="nilai"><?= strtoupper($siswa['desa_kelurahan'] ?? '-'); ?></td>
            </tr>
            <tr>
                <td class="label sub-label">c. Kecamatan</td>
                <td class="titik">:</td>
                <td class="nilai">JATIBARANG</td>
            </tr>
            <tr>
                <td class="label sub-label">d. Kabupaten/Kota</td>
                <td class="titik">:</td>
                <td class="nilai">BREBES</td>
            </tr>
            <tr>
                <td></td>
                <td class="label sub-label">e. Propinsi</td>
                <td class="titik">:</td>
                <td class="nilai">JAWA TENGAH</td>
            </tr>
        </table>
        
        <!-- Tanda Tangan -->
        <div class="clearfix" style="margin-top: 40px;">
            <div class="foto-container">
                <div class="foto-box">FOTO<br>3 x 4</div>
            </div>
            <div class="ttd-container">
                <div style="margin-bottom: 80px;">
                    Jatibarang, <?= date('F Y'); ?>
                </div>
                <div class="ttd-jabatan">
                    Kepala<br>
                    Taman Kanak-Kanak 'Aisyiyah Bustanul Athfal
                </div>
                <div class="ttd-nama">
                    <?= strtoupper($kepsek ?? 'RIRIN RISNIAWATI, S.Pd AUD'); ?>
                </div>
                <div class="ttd-nbm">
                    NBM. <?= $nbm_kepsek ?? 'KTAA.0319 8312 58516'; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================
         HALAMAN 2: PERKEMBANGAN ANAK DIDIK
         ============================================ -->
    <div class="page">
        <!-- Header -->
        <div class="header-perkembangan">
            <h2>Perkembangan Anak Didik</h2>
        </div>
        
        <!-- Info Atas -->
        <table class="info-atas">
            <tr>
                <td class="label">NAMA ANAK</td>
                <td class="separator">:</td>
                <td class="value fw-bold text-uppercase"><?= strtoupper($siswa['nama_anak']); ?></td>
                <td class="label">USIA</td>
                <td class="separator">:</td>
                <td class="value"><?= $usia ?? '-'; ?> TAHUN</td>
            </tr>
            <tr>
                <td class="label">NIS</td>
                <td class="separator">:</td>
                <td class="value"><?= $siswa['nis'] ?? '-'; ?></td>
                <td class="label">SEMESTER</td>
                <td class="separator">:</td>
                <td class="value"><?= $semester ?? 'I (Satu)'; ?></td>
            </tr>
            <tr>
                <td class="label">KELOMPOK</td>
                <td class="separator">:</td>
                <td class="value fw-bold"><?= strtoupper($siswa['kelompok'] ?? 'A'); ?></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
        
        <!-- Tabel Capaian Pembelajaran -->
        <table class="tabel-perkembangan">
            <tr>
                <th colspan="2">CAPAIAN PEMBELAJARAN</th>
            </tr>
            <tr>
                <td class="aspek">Al-Islam (AIK)</td>
                <td class="deskripsi"><?= nl2br($desk_aik ?? 'Anak mampu mengenal dan membaca huruf hijaiyah, menghafal doa-doa harian, serta memahami kisah-kisah teladan dalam Islam.'); ?></td>
            </tr>
            <tr>
                <td class="aspek">Agama & Budi Pekerti</td>
                <td class="deskripsi"><?= nl2br($desk_cpabp ?? 'Anak menunjukkan perkembangan dalam mengenal agama, berdoa, dan membaca Al-Quran. Anak juga mulai memahami nilai-nilai kebaikan dan budi pekerti luhur.'); ?></td>
            </tr>
            <tr>
                <td class="aspek">Jati Diri</td>
                <td class="deskripsi"><?= nl2br($desk_cpjd ?? 'Anak mampu mengenali dirinya sendiri, mengenal anggota tubuh, serta menunjukkan kemandirian dalam aktivitas sehari-hari.'); ?></td>
            </tr>
            <tr>
                <td class="aspek">Literasi & STEAM</td>
                <td class="deskripsi"><?= nl2br($desk_cpdl ?? 'Anak menunjukkan kemampuan dalam mengenal huruf, angka, warna, dan bentuk. Anak juga aktif dalam kegiatan eksplorasi dan eksperimen sederhana.'); ?></td>
            </tr>
            <tr>
                <td class="aspek">Projek P5</td>
                <td class="deskripsi"><?= nl2br($desk_p5 ?? 'Anak berpartisipasi aktif dalam proyek-proyek pembelajaran yang mengintegrasikan berbagai aspek perkembangan.'); ?></td>
            </tr>
        </table>
        
        <!-- Tabel Pertumbuhan & Kehadiran -->
        <table class="tabel-pertumbuhan">
            <tr>
                <th colspan="2">PERTUMBUHAN DAN KEHADIRAN ANAK</th>
            </tr>
            <tr>
                <td class="kiri">
                    <strong>PERTUMBUHAN</strong><br><br>
                    Berat Badan : <?= $laporan['berat_badan'] ?? '23'; ?> kg<br>
                    Tinggi Badan : <?= $laporan['tinggi_badan'] ?? '-'; ?> cm<br>
                    Lingkar Kepala : <?= $laporan['lingkar_kepala'] ?? '53'; ?> cm<br>
                    Lingkar Lengan : <?= $laporan['lingkar_lengan'] ?? '-'; ?> cm
                </td>
                <td class="kanan">
                    <strong>KEHADIRAN ANAK</strong><br><br>
                    Sakit : <?= $laporan['sakit'] ?? '-'; ?> hari<br>
                    Izin : <?= $laporan['izin'] ?? '-'; ?> hari<br>
                    Tanpa Keterangan : <?= $laporan['alfa'] ?? '-'; ?> hari
                </td>
            </tr>
        </table>
        
        <!-- Refleksi Orang Tua -->
        <div class="refleksi-box">
            <div class="refleksi-title">Refleksi Orang Tua</div>
            <div class="refleksi-content">
                <?= $refleksi_ortu ?? ''; ?>
            </div>
        </div>
        
        <!-- Tanda Tangan -->
        <div style="margin-top: 20px; font-style: italic; font-size: 10pt;">
            Jatibarang, <?= date('d F Y', strtotime($laporan['tanggal_lap'] ?? 'now')); ?>
        </div>
        
        <table class="ttd-hal2">
            <tr>
                <td>
                    <div class="jabatan">
                        Mengetahui,<br>
                        Kepala TK 'Aisyiyah Bustanul Athfal
                    </div>
                    <div class="nama">
                        <?= strtoupper($kepsek ?? 'RIRIN RISNIAWATI, S.Pd AUD'); ?>
                    </div>
                    <div class="nbm">
                        <?= $nbm_kepsek ?? 'KTAA.0319 8312 58516'; ?>
                    </div>
                </td>
                <td>
                    <div class="jabatan">
                        Guru Kelas
                    </div>
                    <div class="nama">
                        <?= strtoupper($laporan['guru_wali'] ?? 'RIRIN RISNIAWATI, S.Pd AUD'); ?>
                    </div>
                    <div class="nbm">
                        <?= $nbm_guru ?? 'KTAA.0319 8312 58516'; ?>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- ============================================
         HALAMAN 3: DOKUMENTASI KEGIATAN
         ============================================ -->
    <div class="page last-page">
        <!-- Header -->
        <div class="header-dokumentasi">
            <h2>Dokumentasi Foto-Foto Kegiatan Anak</h2>
        </div>
        
      
        
        <!-- Dokumentasi Foto -->
        <?php if (!empty($laporan['foto_kegiatan'])) : ?>
            <div class="foto-besar">
                <img src="<?= "data:image/png;base64," . base64_encode(file_get_contents(FCPATH . 'uploads/rapor/' . $laporan['foto_kegiatan'])); ?>" 
                     alt="Dokumentasi Kegiatan">
                <div class="foto-keterangan">
                    <strong>Keterangan:</strong> <?= $laporan['catatan_guru'] ?? 'Kegiatan pembelajaran anak di TK'; ?>
                </div>
            </div>
        <?php else : ?>
            <!-- Placeholder jika tidak ada foto -->
            <div class="foto-grid">
                <div class="foto-item">
                    <div style="border: 1px solid #000; height: 150px; display: flex; align-items: center; justify-content: center;">
                        <span style="font-size: 10pt; color: #666;">Foto Kegiatan 1</span>
                    </div>
                </div>
                <div class="foto-item">
                    <div style="border: 1px solid #000; height: 150px; display: flex; align-items: center; justify-content: center;">
                        <span style="font-size: 10pt; color: #666;">Foto Kegiatan 2</span>
                    </div>
                </div>
                <div class="foto-item">
                    <div style="border: 1px solid #000; height: 150px; display: flex; align-items: center; justify-content: center;">
                        <span style="font-size: 10pt; color: #666;">Foto Kegiatan 3</span>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        
        
    </div>

</body>
</html>