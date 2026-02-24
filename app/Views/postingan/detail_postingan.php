<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $post['judul']; ?> - TK Monitor</title>
    
    <!-- External CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/postingan.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/detail_postingan.css'); ?>">
</head>
<body>
    <!-- Navbar -->
    <?= $this->include('layout/navbar'); ?>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <!-- Back Button -->
            <a href="<?= base_url('postingan'); ?>" class="btn-back">
                <i class="fas fa-arrow-left"></i> Kembali ke Semua Kegiatan
            </a>

            <!-- Article Card -->
            <article class="article-card">
                <!-- Article Header -->
                <div class="article-header">
                    <div class="article-meta-top">
                        <span class="meta-badge">
                            <i class="fas fa-calendar-alt"></i>
                            <?= date('d M Y', strtotime($post['created_at'])); ?>
                        </span>
                        <span class="meta-badge">
                            <i class="fas fa-user"></i>
                            Guru
                        </span>
                        <span class="meta-badge">
                            <i class="fas fa-clock"></i>
                            <?= ceil(str_word_count($post['isi_konten']) / 200); ?> menit baca
                        </span>
                    </div>
                    <h1 class="article-title"><?= $post['judul']; ?></h1>
                </div>

                <!-- Featured Image -->
                <?php if ($post['gambar']) : ?>
                <div class="article-image">
                    <img src="<?= base_url('uploads/kegiatan/' . $post['gambar']); ?>" alt="<?= $post['judul']; ?>">
                    <div class="image-overlay"></div>
                </div>
                <?php endif; ?>

                <!-- Article Content -->
                <div class="article-body">
                    <div class="post-content">
                        <?= nl2br($post['isi_konten']); ?>
                    </div>
                </div>

                <!-- Article Footer -->
                <div class="article-footer">
                    <div class="share-section">
                        <span>Bagikan:</span>
                        <a href="#" class="share-btn facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="share-btn twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="share-btn whatsapp"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </article>

            <!-- Comments Section -->
            <div class="comments-section">
                <div class="comments-header">
                    <div class="comments-icon">
                        <i class="fas fa-comments"></i>
                    </div>
                    <div class="comments-title">
                        <h3>Diskusi Orang Tua & Guru</h3>
                        <p>Berikan tanggapan atau pertanyaan tentang kegiatan ini</p>
                    </div>
                </div>
                
                <div class="comments-body">
                    <div id="disqus_thread"></div>
                    <script>
                        var disqus_config = function () {
                            this.page.url = "<?= current_url(); ?>"; 
                            this.page.identifier = "post-<?= $post['id_post']; ?>"; 
                        };
                        (function() { 
                            var d = document, s = d.createElement('script');
                            s.src = 'https://tk-monitor.disqus.com/embed.js'; 
                            s.setAttribute('data-timestamp', +new Date());
                            (d.head || d.body).appendChild(s);
                        })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                </div>
            </div>

            <!-- Related Posts (Optional) -->
            <div class="related-section">
                <h4 class="section-title">
                    <i class="fas fa-th-large"></i> Kegiatan Lainnya
                </h4>
                <div class="related-grid">
                    <!-- Bisa diisi dengan PHP loop untuk postingan terkait -->
                    <div class="related-card">
                        <div class="related-image">
                            <i class="fas fa-image"></i>
                        </div>
                        <h5>Kegiatan Seru Lainnya</h5>
                        <a href="<?= base_url('postingan'); ?>">Lihat Semua <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="page-footer">
        <div class="container">
            <p>&copy; <?= date('Y'); ?> TK Monitor. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if(target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });

        // Add reading progress indicator
        window.addEventListener('scroll', () => {
            const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = (winScroll / height) * 100;
            
            // Could add progress bar here if needed
        });
    </script>
</body>
</html>