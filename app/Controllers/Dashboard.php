<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        // 1. Cek apakah user sudah login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        $role = session()->get('role');
        $id_user = session()->get('id_user');
        $db = \Config\Database::connect();

        // 2. Siapkan data standar untuk view
        $data = [
            'title' => 'Dashboard ' . ucfirst($role),
            'nama'  => session()->get('nama'),
            'role'  => $role
        ];

        // 3. Logika khusus sesuai Use Case diagram
        // Jika Orang Tua: Ambil data anak yang terhubung (Melihat Detail Rapor)
        if ($role == 'orangtua') {
            $id_user = session()->get('id_user'); // ID user orang tua yang sedang login
            $data['anak'] = $db->table('siswa')
                ->where('id_user_ortu', $id_user) // Mencocokkan dengan kolom di database
                ->get()
                ->getRowArray();
        }

        // Jika Kepala Sekolah: Bisa tambahkan info jumlah rapor yang butuh validasi
        if ($role == 'kepsek') {
            $data['total_pending'] = $db->table('laporan_perkembangan')
                ->where('status_validasi', 'pending')
                ->countAllResults();
        }

        return view('dashboard/index', $data);
    }
}
