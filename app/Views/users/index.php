<!DOCTYPE html>
<html>

<head>
    <title><?= $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <?= $this->include('layout/navbar'); ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white">Tambah User Baru</div>
                    <div class="card-body">
                        <form action="<?= base_url('users/simpan'); ?>" method="post">
                            <div class="mb-3">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Peran (Role)</label>
                                <select name="role" id="roleSelect" class="form-select" onchange="toggleSiswa()">
                                    <option value="guru">Guru</option>
                                    <option value="kepsek">Kepala Sekolah</option>
                                    <option value="orangtua">Orang Tua</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>

                            <div class="mb-3" id="pilihAnak" style="display:none;">
                                <label>Pilih Anak (Siswa)</label>
                                <select name="id_siswa" class="form-select">
                                    <option value="">-- Pilih Siswa --</option>
                                    <?php foreach ($siswa_tersedia as $s) : ?>
                                        <option value="<?= $s['id_siswa']; ?>"><?= $s['nama_anak']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="text-muted">*Hanya siswa yang belum punya akun ortu yang muncul</small>
                            </div>

                            <script>
                                function toggleSiswa() {
                                    var role = document.getElementById("roleSelect").value;
                                    var divAnak = document.getElementById("pilihAnak");
                                    divAnak.style.display = (role === "orangtua") ? "block" : "none";
                                }
                            </script>
                            <button type="submit" class="btn btn-dark w-100">Simpan User</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $u) : ?>
                                    <tr>
                                        <td><?= $u['nama']; ?></td>
                                        <td><?= $u['username']; ?></td>
                                        <td><span class="badge bg-secondary"><?= $u['role']; ?></span></td>
                                        <td>
                                            <a href="<?= base_url('users/hapus/' . $u['id_user']); ?>"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Hapus user ini?')">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>