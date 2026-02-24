<?php

namespace App\Controllers;

use App\Models\SiswaModel;

class Siswa extends BaseController
{
    protected $siswaModel;

    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Siswa TK',
            'siswa' => $this->siswaModel->findAll()
        ];
        return view('siswa/index', $data);
    }

    public function simpan()
    {
        $this->siswaModel->save([
            'nama_anak' => $this->request->getPost('nama_anak'),
            'nisn'      => $this->request->getPost('nisn'),
            'kelas'     => $this->request->getPost('kelas'),
        ]);

        return redirect()->to('/siswa');
    }
    public function edit($id)
{
    $data = [
        'title' => 'Edit Data Siswa',
        'siswa' => $this->siswaModel->find($id)
    ];
    return view('siswa/edit', $data);
}

public function update($id)
{
    $this->siswaModel->update($id, [
        'nama_anak'      => $this->request->getPost('nama_anak'),
        'nama_panggilan' => $this->request->getPost('nama_panggilan'),
        'nis'            => $this->request->getPost('nis'),
        'nisn'           => $this->request->getPost('nisn'),
        'kelas'          => $this->request->getPost('kelas'),
        // ... tambahkan field lainnya sesuai model
    ]);

    return redirect()->to('/siswa')->with('pesan', 'Data siswa berhasil diubah.');
}

public function hapus($id)
{
    $this->siswaModel->delete($id);
    return redirect()->to('/siswa')->with('pesan', 'Siswa berhasil dihapus.');
}
}
