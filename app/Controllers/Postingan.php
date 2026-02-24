<?php

namespace App\Controllers;

use App\Models\PostinganModel;

class Postingan extends BaseController
{
    protected $postModel;

    public function __construct()
    {
        $this->postModel = new PostinganModel();
    }

    public function index()
    {
        $data = [
            'title'     => 'Kegiatan Anak-Anak',
            'postingan' => $this->postModel->orderBy('created_at', 'DESC')->findAll()
        ];
        return view('postingan/index', $data);
    }

    public function detail($id)
    {
        $post = $this->postModel->find($id);
        if (!$post) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Postingan tidak ditemukan");
        }
        $data = ['title' => $post['judul'], 'post'  => $post];
        return view('postingan/detail_postingan', $data);
    }

    public function tambah()
    {
        if (session()->get('role') !== 'guru') {
            return redirect()->to('/postingan')->with('error', 'Hanya Guru yang bisa membuat postingan.');
        }
        return view('postingan/tambah', ['title' => 'Buat Cerita Kegiatan']);
    }

    public function simpan()
    {
        $fileGambar = $this->request->getFile('gambar');
        $namaGambar = "";
        if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('uploads/kegiatan/', $namaGambar);
        }

        $this->postModel->save([
            'judul'      => $this->request->getPost('judul'),
            'isi_konten' => $this->request->getPost('isi_konten'),
            'gambar'     => $namaGambar,
            'id_guru'    => session()->get('id_user')
        ]);
        return redirect()->to('/postingan')->with('pesan', 'Kegiatan berhasil diposting!');
    }

    public function edit($id)
    {
        if (session()->get('role') !== 'guru') {
            return redirect()->to('/postingan')->with('error', 'Akses ditolak.');
        }
        $data = ['title' => 'Edit Postingan', 'post'  => $this->postModel->find($id)];
        return view('postingan/edit', $data);
    }

    public function update($id)
    {
        $fileGambar = $this->request->getFile('gambar');
        $postLama = $this->postModel->find($id);
        $namaGambar = $postLama['gambar'];

        if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('uploads/kegiatan/', $namaGambar);
            if ($postLama['gambar'] != "" && file_exists('uploads/kegiatan/' . $postLama['gambar'])) {
                unlink('uploads/kegiatan/' . $postLama['gambar']);
            }
        }

        $this->postModel->save([
            'id_post'    => $id,
            'judul'      => $this->request->getPost('judul'),
            'isi_konten' => $this->request->getPost('isi_konten'),
            'gambar'     => $namaGambar
        ]);
        return redirect()->to('/postingan')->with('pesan', 'Postingan diperbarui!');
    }

    public function hapus($id)
    {
        $post = $this->postModel->find($id);
        if ($post['gambar'] && file_exists('uploads/kegiatan/' . $post['gambar'])) {
            unlink('uploads/kegiatan/' . $post['gambar']);
        }
        $this->postModel->delete($id);
        return redirect()->to('/postingan')->with('pesan', 'Postingan dihapus!');
    }
}