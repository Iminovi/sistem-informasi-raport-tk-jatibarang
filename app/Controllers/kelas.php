<?php

namespace App\Controllers;
use App\Models\KelasModel;
use App\Models\KelasSiswaModel;
use App\Models\SiswaModel;

class Kelas extends BaseController
{
    protected $kelasModel;
    protected $kelasSiswaModel;
    protected $siswaModel;

    public function __construct() {
        $this->kelasModel = new KelasModel();
        $this->kelasSiswaModel = new KelasSiswaModel();
        $this->siswaModel = new SiswaModel();
    }

    public function index()
    {
        return view('kelas/index', [
            'title' => 'Daftar Kelas',
            'kelas' => $this->kelasModel->findAll()
        ]);
    }

    // Fungsi untuk menampilkan daftar siswa yang bisa dipilih
    public function pilih_siswa($id_kelas)
    {
        return view('kelas/pilih_siswa', [
            'title'       => 'Pilih Siswa ke Kelas',
            'kelas'       => $this->kelasModel->find($id_kelas),
            'semua_siswa' => $this->siswaModel->findAll()
        ]);
    }

    // Fungsi simpan relasi siswa ke kelas
    public function simpan_siswa_ke_kelas()
    {
        $id_kelas = $this->request->getPost('id_kelas');
        $siswa_ids = $this->request->getPost('siswa_ids');

        if (!empty($siswa_ids)) {
            foreach ($siswa_ids as $id_siswa) {
                // Gunakan model relasi yang sudah Anda buat
                $this->kelasSiswaModel->insert([
                    'id_kelas' => $id_kelas,
                    'id_siswa' => $id_siswa
                ]);
            }
        }

        return redirect()->to('/kelas')->with('pesan', 'Siswa berhasil dimasukkan ke kelas.');
    }
   // Halaman form tambah kelas (Hanya untuk Guru)
public function tambah()
{
    // Proteksi Role
    if (session()->get('role') !== 'guru') {
        return redirect()->to('/dashboard')->with('error', 'Hanya Guru yang boleh menambah kelas.');
    }

    $data = [
        'title' => 'Tambah Kelas Baru'
    ];

    return view('kelas/tambah', $data);
}

// Proses simpan data ke database
public function simpan()
{
    if (session()->get('role') !== 'guru') {
        return redirect()->to('/dashboard')->with('error', 'Akses ditolak.');
    }

    $this->kelasModel->save([
        'nama_kelas' => $this->request->getPost('nama_kelas'),
        'wali_kelas' => $this->request->getPost('wali_kelas'),
    ]);

    return redirect()->to('/kelas')->with('pesan', 'Kelas baru berhasil dibuat!');
}
public function detail($id_kelas)
{
    // Ambil data kelas
    $kelas = $this->kelasModel->find($id_kelas);
    
    if (!$kelas) {
        return redirect()->to('/kelas')->with('error', 'Kelas tidak ditemukan.');
    }

    // Ambil daftar siswa di kelas ini menggunakan method di KelasSiswaModel
    // Method getSiswaByKelas() sudah Anda buat di model tersebut
    $siswa_di_kelas = $this->kelasSiswaModel->getSiswaByKelas($id_kelas);

    $data = [
        'title' => 'Detail Kelas ' . $kelas['nama_kelas'],
        'kelas' => $kelas,
        'siswa' => $siswa_di_kelas
    ];

    return view('kelas/detail', $data);
}

}