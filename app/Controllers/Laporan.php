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
        // Memuat helper agar fungsi get_deskripsi bisa digunakan di seluruh fungsi
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
        // Menyimpan semua field sesuai form buat.php dan standar dokumen Word
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
            'sakit'          => $this->request->getPost('sakit'),
            'izin'           => $this->request->getPost('izin'),
            'alfa'           => $this->request->getPost('alfa'),
            'catatan_guru'   => $this->request->getPost('catatan_guru'),
            'status_validasi'=> 'pending'
        ]);

        return redirect()->to('/laporan/detail/' . $this->request->getPost('id_siswa'))->with('pesan', 'Laporan berhasil disimpan dan menunggu validasi.');
    }

    public function edit($id_laporan)
    {
        $laporan = $this->laporanModel->find($id_laporan);
        if (!$laporan) {
            return redirect()->to('/siswa')->with('error', 'Laporan tidak ditemukan');
        }

        $data = [
            'title'   => 'Edit Rapor',
            'laporan' => $laporan,
            'siswa'   => $this->siswaModel->find($laporan['id_siswa'])
        ];

        return view('laporan/edit', $data);
    }

    public function update($id_laporan)
    {
        // Saat update, status dikembalikan ke 'pending' agar Kepsek bisa cek ulang hasil revisi
        $this->laporanModel->update($id_laporan, [
            'tanggal_lap'    => $this->request->getPost('tanggal_lap'),
            'nilai_aik'      => $this->request->getPost('nilai_aik'),
            'nilai_cpabp'    => $this->request->getPost('nilai_cpabp'),
            'nilai_cpjd'     => $this->request->getPost('nilai_cpjd'),
            'nilai_cpdl'     => $this->request->getPost('nilai_cpdl'),
            'nilai_p5'       => $this->request->getPost('nilai_p5'),
            'berat_badan'    => $this->request->getPost('berat_badan'),
            'tinggi_badan'   => $this->request->getPost('tinggi_badan'),
            'sakit'          => $this->request->getPost('sakit'),
            'izin'           => $this->request->getPost('izin'),
            'alfa'           => $this->request->getPost('alfa'),
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
    helper('rapor_helper');

    $laporan = $this->laporanModel->find($id_laporan);
    if (!$laporan) {
        return redirect()->to('/siswa')->with('error', 'Laporan tidak ditemukan');
    }

    $siswa = $this->siswaModel->find($laporan['id_siswa']);

    $data = [
        'title'   => 'Rapor_' . $siswa['nama_anak'],
        'siswa'   => $siswa,
        'laporan' => $laporan,
        // Konversi nilai A/B/C/D menjadi narasi menggunakan helper
        'desk_aik'   => get_deskripsi('nilai_aik', $laporan['nilai_aik'], $siswa['nama_anak']),
        'desk_cpabp' => get_deskripsi('nilai_cpabp', $laporan['nilai_cpabp'], $siswa['nama_anak']),
        'desk_cpjd'  => get_deskripsi('nilai_cpjd', $laporan['nilai_cpjd'], $siswa['nama_anak']),
        'desk_cpdl'  => get_deskripsi('nilai_cpdl', $laporan['nilai_cpdl'], $siswa['nama_anak']),
        'desk_p5'    => get_deskripsi('nilai_p5', $laporan['nilai_p5'], $siswa['nama_anak']),
    ];

    // Menghasilkan PDF
    $html = view('laporan/pdf_view', $data);
    $dompdf = new \Dompdf\Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    
    return $dompdf->stream($data['title'] . ".pdf", ["Attachment" => false]);
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