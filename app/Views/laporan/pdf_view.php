<!DOCTYPE html>
<html>
<head>
    <style>
        @page { margin: 1cm; }
        body { 
            font-family: "Times New Roman", Times, serif; 
            font-size: 12px; 
            line-height: 1.4; 
            color: #000;
        }
        .header { 
            text-align: center; 
            font-weight: bold; 
            margin-bottom: 20px; 
            text-transform: uppercase;
        }
        .header-title { font-size: 14px; margin-bottom: 5px; }
        
        /* Tabel Identitas Siswa */
        .info-table { width: 100%; margin-bottom: 15px; border: none; }
        .info-table td { padding: 2px 0; vertical-align: top; }

        /* Tabel Utama Capaian */
        table.main-table { width: 100%; border-collapse: collapse; margin-bottom: 15px; }
        table.main-table th, table.main-table td { 
            border: 1px solid black; 
            padding: 8px; 
            text-align: left; 
            vertical-align: top; 
        }
        .section-title { 
            background-color: #f0f0f0; 
            font-weight: bold; 
            text-align: center; 
            text-transform: uppercase;
        }

        /* Tabel Pertumbuhan & Kehadiran (Berdampingan) */
        .row-tables { width: 100%; margin-bottom: 20px; }
        .row-tables td { width: 50%; vertical-align: top; padding-right: 10px; }
        
        /* Footer Tanda Tangan */
        .footer-table { width: 100%; margin-top: 30px; }
        .footer-table td { text-align: center; width: 50%; border: none; }
        .sign-space { height: 70px; }
    </style>
</head>
<body>

    <div class="header">
        <div class="header-title">LAPORAN PERKEMBANGAN ANAK DIDIK</div>
        TK 'AISYIYAH BUSTANUL ATHFAL<br>
        SEMESTER I (SATU) TAHUN PELAJARAN 2024/2025
    </div>

    <table class="info-table">
        <tr>
            <td width="15%">Nama Anak</td>
            <td width="40%">: <strong><?= $siswa['nama_anak']; ?></strong></td>
            <td width="15%">Kelompok</td>
            <td width="30%">: <?= $siswa['kelas']; ?></td>
        </tr>
        <tr>
            <td>NISN</td>
            <td>: <?= $siswa['nisn']; ?></td>
            <td>Semester</td>
            <td>: I (Satu)</td>
        </tr>
    </table>

    <table class="main-table">
        <tr class="section-title">
            <th colspan="2">CAPAIAN PEMBELAJARAN</th>
        </tr>
        <tr>
            <td width="28%"><strong>Al-Islam (AIK)</strong></td>
            <td><?= $desk_aik; ?></td>
        </tr>
        <tr>
            <td><strong>Nilai Agama & Budi Pekerti</strong></td>
            <td><?= $desk_cpabp; ?></td>
        </tr>
        <tr>
            <td><strong>Jati Diri</strong></td>
            <td><?= $desk_cpjd; ?></td>
        </tr>
        <tr>
            <td><strong>Dasar Literasi & STEAM</strong></td>
            <td><?= $desk_cpdl; ?></td>
        </tr>
        <tr>
            <td><strong>Projek P5</strong></td>
            <td><?= $desk_p5; ?></td>
        </tr>
    </table>

    <div style="margin-bottom: 15px;">
        <strong>Catatan Guru:</strong><br>
        <div style="border: 1px solid #000; padding: 8px; min-height: 40px;">
            <?= $laporan['catatan_guru']; ?>
        </div>
    </div>

    <table class="row-tables">
        <tr>
            <td>
                <table class="main-table" style="margin-bottom: 0;">
                    <tr class="section-title"><th colspan="2">PERTUMBUHAN</th></tr>
                    <tr><td width="60%">Berat Badan</td><td><?= $laporan['berat_badan']; ?> kg</td></tr>
                    <tr><td>Tinggi Badan</td><td><?= $laporan['tinggi_badan']; ?> cm</td></tr>
                    <tr><td>Lingkar Kepala</td><td>53 cm</td></tr> </table>
            </td>
            <td>
                <table class="main-table" style="margin-bottom: 0;">
                    <tr class="section-title"><th colspan="2">KEHADIRAN</th></tr>
                    <tr><td width="60%">Sakit</td><td><?= $laporan['sakit']; ?> hari</td></tr>
                    <tr><td>Izin</td><td><?= $laporan['izin']; ?> hari</td></tr>
                    <tr><td>Tanpa Keterangan</td><td><?= $laporan['alfa']; ?> hari</td></tr>
                </table>
            </td>
        </tr>
    </table>

    <table class="footer-table">
        <tr>
            <td>
                Mengetahui,<br>Kepala Sekolah
                <div class="sign-space"></div>
                <strong>RIRIN RISNIAWATI, S.Pd AUD</strong><br>
                KTAA.0319 8312 58516
            </td>
            <td>
                Jatibarang, 21 Desember 2024<br>Guru Kelas
                <div class="sign-space"></div>
                <strong>RIRIN RISNIAWATI, S.Pd AUD</strong><br>
                KTAA.0319 8312 58516
            </td>
        </tr>
    </table>

</body>
</html>