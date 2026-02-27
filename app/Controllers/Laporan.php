<?php

namespace App\Controllers;

use App\Models\LaporanModel;
use App\Models\SiswaModel;

class Laporan extends BaseController
{
    protected $laporanModel;
    protected $siswaModel;

    public function __construct()
    {
        $this->laporanModel = new LaporanModel();
        $this->siswaModel = new SiswaModel();
        helper('rapor_helper');
    }

    public function buat($id_siswa)
    {
        $siswa = $this->siswaModel->find($id_siswa);
        if (!$siswa) {
            return redirect()->to('/siswa')->with('error', 'Siswa tidak ditemukan');
        }

        $data = [
            'title' => 'Input Rapor: ' . $siswa['nama_anak'],
            'siswa' => $siswa
        ];

        return view('laporan/buat', $data);
    }

    public function simpan()
    {
        // 1. Ambil File Foto
        $fileFoto = $this->request->getFile('foto_kegiatan');
        $namaFoto = "";

        // 2. Logika Upload Gambar
        if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
            $namaFoto = $fileFoto->getRandomName(); 
            $fileFoto->move('uploads/rapor/', $namaFoto); 
        }

        // 3. Simpan ke Database (Lengkap dengan data yang sebelumnya hilang)
        $this->laporanModel->save([
            'id_siswa'       => $this->request->getPost('id_siswa'),
            'tanggal_lap'    => $this->request->getPost('tanggal_lap'),
            'nilai_aik'      => $this->request->getPost('nilai_aik'),
            'nilai_cpabp'    => $this->request->getPost('nilai_cpabp'),
            'nilai_cpjd'     => $this->request->getPost('nilai_cpjd'),
            'nilai_cpdl'     => $this->request->getPost('nilai_cpdl'),
            'nilai_p5'       => $this->request->getPost('nilai_p5'),
            'berat_badan'    => $this->request->getPost('berat_badan'),
            'tinggi_badan'   => $this->request->getPost('tinggi_badan'),
            'lingkar_kepala' => $this->request->getPost('lingkar_kepala'), // TAMBAHKAN INI
            'sakit'          => $this->request->getPost('sakit'),          // TAMBAHKAN INI
            'izin'           => $this->request->getPost('izin'),           // TAMBAHKAN INI
            'alfa'           => $this->request->getPost('alfa'),           // TAMBAHKAN INI
            'aspek_motorik'  => $this->request->getPost('aspek_motorik'),  // TAMBAHKAN INI
            'aspek_kognitif' => $this->request->getPost('aspek_kognitif'), // TAMBAHKAN INI
            'catatan_guru'   => $this->request->getPost('catatan_guru'),
            'guru_wali'      => $this->request->getPost('guru_wali'),
            'foto_kegiatan'  => $namaFoto,
            'status_validasi'=> 'pending'
        ]);

        return redirect()->to('/siswa')->with('pesan', 'Laporan Berhasil Disimpan!');
    }

    public function update($id_laporan)
    {
        // Pastikan update juga menangkap data yang lengkap
        $this->laporanModel->update($id_laporan, [
            'tanggal_lap'    => $this->request->getPost('tanggal_lap'),
            'nilai_aik'      => $this->request->getPost('nilai_aik'),
            'nilai_cpabp'    => $this->request->getPost('nilai_cpabp'),
            'nilai_cpjd'     => $this->request->getPost('nilai_cpjd'),
            'nilai_cpdl'     => $this->request->getPost('nilai_cpdl'),
            'nilai_p5'       => $this->request->getPost('nilai_p5'),
            'berat_badan'    => $this->request->getPost('berat_badan'),
            'tinggi_badan'   => $this->request->getPost('tinggi_badan'),
            'lingkar_kepala' => $this->request->getPost('lingkar_kepala'), // TAMBAHKAN INI
            'sakit'          => $this->request->getPost('sakit'),
            'izin'           => $this->request->getPost('izin'),
            'alfa'           => $this->request->getPost('alfa'),
            'aspek_motorik'  => $this->request->getPost('aspek_motorik'),
            'aspek_kognitif' => $this->request->getPost('aspek_kognitif'),
            'catatan_guru'   => $this->request->getPost('catatan_guru'),
            'status_validasi'=> 'pending' 
        ]);

        return redirect()->to('/laporan/detail/' . $this->request->getPost('id_siswa'))->with('pesan', 'Laporan berhasil diperbarui.');
    }

    public function validasi($id_laporan)
    {
        // Hanya Kepala Sekolah yang bisa mengakses ini
        if (session()->get('role') !== 'kepsek') {
            return redirect()->to('/dashboard');
        }

        $aksi = $this->request->getPost('aksi'); // 'disetujui' atau 'revisi'
        $pesan = $this->request->getPost('pesan_kepsek');

        $this->laporanModel->update($id_laporan, [
            'pesan_kepsek'    => $pesan,
            'status_validasi' => ($aksi === 'disetujui') ? 'disetujui' : 'pending'
        ]);

        return redirect()->back()->with('pesan', 'Status validasi berhasil diperbarui.');
    }
public function cetak($id_laporan)
{
    $laporan = $this->laporanModel->find($id_laporan);
    $siswa = $this->siswaModel->find($laporan['id_siswa']);

    // Fungsi sederhana untuk konversi nilai ke deskripsi
    $getDeskripsi = function($nilai, $bidang) {
        $teks = [
            'A' => "Ananda menunjukkan capaian yang sangat baik dalam $bidang.",
            'B' => "Ananda menunjukkan perkembangan yang sesuai harapan pada $bidang.",
            'C' => "Ananda mulai berkembang dalam $bidang, perlu stimulasi lebih lanjut.",
            'D' => "Ananda memerlukan bimbingan khusus untuk mencapai kompetensi $bidang."
        ];
        return $teks[$nilai] ?? "-";
    };

    $data = [
        'title'     => 'Rapor ' . $siswa['nama_anak'],
        'laporan'   => $laporan,
        'siswa'     => $siswa,
        // Definisikan variabel yang dicari oleh View
        'desk_aik'   => $getDeskripsi($laporan['nilai_aik'], "Pendidikan AIK"),
        'desk_cpabp' => $getDeskripsi($laporan['nilai_cpabp'], "Agama dan Budi Pekerti"),
        'desk_cpjd'  => $getDeskripsi($laporan['nilai_cpjd'], "Jati Diri"),
        'desk_cpdl'  => $getDeskripsi($laporan['nilai_cpdl'], "Literasi dan STEAM"),
        'desk_p5'    => $getDeskripsi($laporan['nilai_p5'], "Projek P5"),
    ];

    return view('laporan/pdf_view', $data);
}
public function detail($id_siswa)
{
    $role = session()->get('role');
    $siswa = $this->siswaModel->find($id_siswa);

    if ($role == 'orangtua') {
        // Hanya ambil yang sudah divalidasi
        $laporan = $this->laporanModel->where(['id_siswa' => $id_siswa, 'status_validasi' => 'disetujui'])
                                      ->orderBy('tanggal_lap', 'DESC')
                                      ->findAll();
    } else {
        $laporan = $this->laporanModel->where('id_siswa', $id_siswa)
                                      ->orderBy('tanggal_lap', 'DESC')
                                      ->findAll();
    }

    return view('laporan/detail', [
        'title' => 'Riwayat: ' . $siswa['nama_anak'],
        'siswa' => $siswa,
        'laporan' => $laporan
    ]);
}

}