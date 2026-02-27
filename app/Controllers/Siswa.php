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
    // Tangkap semua data yang dikirim dari form index.php
    $this->siswaModel->save([
        'nama_anak'           => $this->request->getPost('nama_anak'),
        'nama_panggilan'      => $this->request->getPost('nama_panggilan'),
        'nis'                 => $this->request->getPost('nis'),
        'nisn'                => $this->request->getPost('nisn'),
        'jenis_kelamin'       => $this->request->getPost('jenis_kelamin'),
        'tempat_lahir'        => $this->request->getPost('tempat_lahir'),
        'tanggal_lahir'       => $this->request->getPost('tanggal_lahir'),
        'agama'               => $this->request->getPost('agama'),
        'anak_ke'             => $this->request->getPost('anak_ke'),
        'nama_orang_tua'      => $this->request->getPost('nama_orang_tua'),
        'pekerjaan_orang_tua' => $this->request->getPost('pekerjaan_orang_tua'),
        'alamat_jalan'        => $this->request->getPost('alamat_jalan'),
        'desa_kelurahan'      => $this->request->getPost('desa_kelurahan'),
        'kecamatan'           => $this->request->getPost('kecamatan'),
        'kabupaten'           => $this->request->getPost('kabupaten'),
        'provinsi'            => $this->request->getPost('provinsi'),
        'kelas'               => $this->request->getPost('kelas'),
    ]);

    return redirect()->to('/siswa')->with('pesan', 'Data siswa berhasil ditambahkan.');
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
