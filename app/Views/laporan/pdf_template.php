<html>
<head>
    <style>
        body { font-family: sans-serif; line-height: 1.6; }
        .header { text-align: center; border-bottom: 2px solid #000; padding-bottom: 10px; }
        .info { margin-top: 20px; }
        .content { margin-top: 30px; }
        .footer { margin-top: 50px; text-align: right; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <div class="header">
        <h2>LAPORAN PERKEMBANGAN ANAK DIDIK</h2>
        <h3>TK NEGERI CONTOH</h3>
    </div>

    <div class="info">
        <p><strong>Nama Siswa:</strong> <?= $siswa['nama_anak']; ?><br>
        <strong>NISN:</strong> <?= $siswa['nisn']; ?><br>
        <strong>Tanggal Laporan:</strong> <?= date('d/m/Y', strtotime($laporan['tanggal_lap'])); ?></p>
    </div>

    <div class="content">
        <table>
            <thead>
                <tr>
                    <th width="30%">Aspek Perkembangan</th>
                    <th>Uraian / Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Motorik</strong></td>
                    <td><?= nl2br($laporan['aspek_motorik']); ?></td>
                </tr>
                <tr>
                    <td><strong>Kognitif</strong></td>
                    <td><?= nl2br($laporan['aspek_kognitif']); ?></td>
                </tr>
                <tr>
                    <td><strong>Catatan Guru</strong></td>
                    <td><?= nl2br($laporan['catatan_guru']); ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="footer">
        <p>Dicetak pada: <?= date('d/m/Y'); ?></p>
        <br><br>
        <p>( ____________________ )<br>Guru Wali Kelas</p>
    </div>
</body>
</html>