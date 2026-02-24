<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\SiswaModel;

class Users extends BaseController
{
    public function index()
    {
        // Proteksi: Hanya Admin yang boleh mengelola data user
        if (session()->get('role') != 'admin') {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak!');
        }

        $userModel = new UserModel();
        $siswaModel = new SiswaModel();

        $data = [
            'title' => 'Kelola User & Hubungkan Orang Tua',
            'users' => $userModel->findAll(),
            // Mengambil siswa yang belum memiliki akun orang tua
            'siswa_tersedia' => $siswaModel->where('id_user_ortu', null)->findAll()
        ];

        return view('users/index', $data);
    }

    public function simpan()
    {
        $userModel = new UserModel();
        $siswaModel = new SiswaModel();

        // 1. Menyiapkan data user baru
        $userData = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'), 
            'nama'     => $this->request->getPost('nama'),
            'role'     => $this->request->getPost('role'),
        ];
        
        // Simpan user ke database
        $userModel->save($userData);
        $newUserId = $userModel->insertID(); // Mendapatkan ID user yang baru dibuat

        // 2. Hubungkan ke data siswa jika role adalah 'orangtua'
        $id_siswa = $this->request->getPost('id_siswa');
        if ($userData['role'] === 'orangtua' && !empty($id_siswa)) {
            // Update kolom id_user_ortu di tabel siswa agar terhubung
            $siswaModel->update($id_siswa, ['id_user_ortu' => $newUserId]);
        }

        return redirect()->to('/users')->with('pesan', 'User dan koneksi anak berhasil disimpan!');
    }

    public function hapus($id)
    {
        $userModel = new UserModel();
        // Sebelum hapus user, sebaiknya cek apakah dia ortu dan putuskan koneksi di tabel siswa jika perlu
        $userModel->delete($id);
        return redirect()->to('/users')->with('pesan', 'User berhasil dihapus');
    }
}