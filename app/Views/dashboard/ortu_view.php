<div class="container mt-4">
    <div class="alert alert-info">
        Selamat Datang, Bapak/Ibu <strong><?= session()->get('nama'); ?></strong>. Berikut adalah laporan perkembangan Ananda.
    </div>
    
    <?php if (isset($anak)) : ?>
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h5 class="card-title"><?= $anak['nama_anak']; ?></h5>
                <p class="card-text text-muted">NISN: <?= $anak['nisn']; ?> | Kelas: <?= $anak['kelas']; ?></p>
                <a href="<?= base_url('laporan/detail/' . $anak['id_siswa']); ?>" class="btn btn-primary">
                    Lihat Rapor Lengkap
                </a>
            </div>
        </div>
    <?php else : ?>
        <div class="alert alert-danger">Data anak belum ditemukan. Silakan hubungi Admin Sekolah.</div>
    <?php endif; ?>
</div>