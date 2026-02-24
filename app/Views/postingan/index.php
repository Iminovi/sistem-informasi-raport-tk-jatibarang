<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kegiatan Sekolah - TK Monitor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <?= $this->include('layout/navbar'); ?>

    <main class="main-content mt-4">
        <div class="container">
            <div class="page-header mb-4">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h1><i class="fas fa-calendar-alt text-primary me-2"></i>Kegiatan Sekolah</h1>
                        <p class="text-muted">Dokumentasi kegiatan dan aktivitas pembelajaran anak-anak</p>
                    </div>
                    <div class="col-md-4 text-md-end">
                        <?php if(session()->get('role') == 'guru'): ?>
                            <a href="<?= base_url('postingan/tambah'); ?>" class="btn btn-primary">
                                <i class="fas fa-plus-circle me-2"></i>Buat Postingan
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-body">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0"><i class="fas fa-search"></i></span>
                        <input type="text" class="form-control border-start-0" placeholder="Cari kegiatan..." id="searchKegiatan">
                    </div>
                </div>
            </div>

            <div class="row" id="kegiatanContainer">
                <?php if(empty($postingan)): ?>
                    <div class="col-12 text-center py-5">
                        <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                        <h3>Belum ada kegiatan</h3>
                    </div>
                <?php else: ?>
                    <?php foreach ($postingan as $p) : ?>  
                    <div class="col-md-4 mb-4 kegiatan-card">
                        <div class="card h-100 shadow-sm border-0">
                            <?php if($p['gambar']): ?>
                                <img src="<?= base_url('uploads/kegiatan/'.$p['gambar']); ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title fw-bold"><?= $p['judul']; ?></h5> 
                                <p class="card-text text-muted"><?= substr(strip_tags($p['isi_konten']), 0, 100); ?>...</p>
                                
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <a href="<?= base_url('postingan/detail/' . $p['id_post']); ?>" class="btn btn-sm btn-primary">Baca</a>
                                    
                                    <?php if (session()->get('role') == 'guru') : ?>
                                        <div class="btn-group">
                                            <a href="<?= base_url('postingan/edit/' . $p['id_post']); ?>" class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></a>
                                            <form action="<?= base_url('postingan/hapus/' . $p['id_post']); ?>" method="post" onsubmit="return confirm('Yakin ingin menghapus?')">
                                                <?= csrf_field(); ?>
                                                <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <footer class="py-4 bg-white mt-5">
        <div class="container text-center text-muted">
            <p>&copy; <?= date('Y'); ?> TK Monitor.</p>
        </div>
    </footer>

    <script>
        document.getElementById('searchKegiatan')?.addEventListener('input', function(e) {
            const term = e.target.value.toLowerCase();
            document.querySelectorAll('.kegiatan-card').forEach(card => {
                const text = card.textContent.toLowerCase();
                card.style.display = text.includes(term) ? 'block' : 'none';
            });
        });
    </script>
</body>
</html>