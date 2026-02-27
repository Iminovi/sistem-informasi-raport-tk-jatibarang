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
        $fileFoto = $this->request->getFile('foto_kegiatan');
        $namaFoto = "";

        if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('uploads/rapor/', $namaFoto);
        }

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
            'lingkar_kepala' => $this->request->getPost('lingkar_kepala'), // DITAMBAHKAN
            'sakit'          => $this->request->getPost('sakit'),
            'izin'           => $this->request->getPost('izin'),
            'alfa'           => $this->request->getPost('alfa'),
            'aspek_motorik'  => $this->request->getPost('aspek_motorik'),  // DITAMBAHKAN
            'aspek_kognitif' => $this->request->getPost('aspek_kognitif'), // DITAMBAHKAN
            'catatan_guru'   => $this->request->getPost('catatan_guru'),
            'guru_wali'      => $this->request->getPost('guru_wali'),
            'foto_kegiatan'  => $namaFoto,
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
            'status_validasi' => 'pending'
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
        $nama = $siswa['nama_anak'];

        // Fungsi konversi nilai ke narasi panjang sesuai dokumen referensi
        $getDeskripsi = function ($bidang, $nilai, $nama) {
            $narasu = "";

            if ($bidang == 'nilai_aik') {
                if ($nilai == 'A') {
                    return "Perkembangan kemampuan Ananda $nama dalam pembelajaran Al-Islam pada semester ini menunjukkan kemajuan sangat pesat. Ananda sudah sangat terbiasa membaca doa sebelum dan sesudah kegiatan. Selain itu, Ananda mampu mengenal Lambang organisasi Muhammadiyah dan Aisyiyah, mengenal nama-nama pendiri melalui foto, serta mampu melafadzkan ikrar murid Aisyiyah dengan benar dan fasih.";
                } else {
                    return "Perkembangan kemampuan Ananda $nama dalam pembelajaran Al-Islam semester ini sudah berkembang sesuai harapan. Ananda mampu membaca doa sebelum dan sesudah kegiatan, mengenal lambang Muhammadiyah/Aisyiyah, dan mau melakukan praktek ibadah bersama teman sebayanya.";
                }
            }

            if ($bidang == 'nilai_cpabp') {
                if ($nilai == 'A') {
                    return "Alhamdulillah, nilai agama dan budi pekerti Ananda $nama menunjukkan kemajuan yang sangat baik. Ananda mampu mengenali berbagai benda ciptaan Allah SWT dan memahami kegiatan ibadah wajib seperti shalat dengan penuh perhatian. Dalam perilaku sehari-hari, Ananda sangat santun, terbiasa menggunakan kalimat thayibah seperti 'permisi', 'tolong', dan 'terima kasih' secara konsisten.";
                } else {
                    return "Perkembangan nilai agama dan budi pekerti Ananda $nama sudah sesuai harapan. Ananda mulai memahami kegiatan ibadah dan bersikap sopan kepada guru serta teman.";
                }
            }

            if ($bidang == 'nilai_cpjd') {
                return "Alhamdulillah Ananda $nama menunjukkan kemampuan menjaga kebersihan diri seperti mencuci tangan dan mengkonsumsi makanan sehat. Ananda dapat mengikuti aktifitas fisik dengan semangat, lincah dalam motorik kasar (lempar tangkap bola), serta trampil dalam motorik halus seperti mewarnai dan menggunting.";
            }

            if ($bidang == 'nilai_cpdl') {
                return "Dalam perkembangan literasi dan matematika, Ananda $nama sudah dapat mengurutkan angka, mengelompokkan benda, serta memahami konsep geometri. Ananda sangat antusias dalam kegiatan sains sederhana seperti mencampur warna dan menggunakan alat peraga edukatif seperti puzzle.";
            }

            if ($bidang == 'nilai_p5') {
                return "Dalam perkembangan P5, Ananda $nama sudah mampu berinteraksi saat bermain pasar-pasaran dan mengenal peran penjual-pembeli. Ananda juga dapat menyebutkan sila-sila Pancasila beserta lambangnya serta aktif dalam kegiatan gotong royong merapikan mainan.";
            }

            return "Ananda menunjukkan perkembangan yang baik.";
        };

        $data = [
            'title'      => 'Rapor ' . $nama,
            'laporan'    => $laporan,
            'siswa'      => $siswa,
            'desk_aik'   => $getDeskripsi('nilai_aik', $laporan['nilai_aik'], $nama),
            'desk_cpabp' => $getDeskripsi('nilai_cpabp', $laporan['nilai_cpabp'], $nama),
            'desk_cpjd'  => $getDeskripsi('nilai_cpjd', $laporan['nilai_cpjd'], $nama),
            'desk_cpdl'  => $getDeskripsi('nilai_cpdl', $laporan['nilai_cpdl'], $nama),
            'desk_p5'    => $getDeskripsi('nilai_p5', $laporan['nilai_p5'], $nama),
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
    public function edit($id_laporan)
    {
        // Ambil data laporan berdasarkan ID
        $laporan = $this->laporanModel->find($id_laporan);

        if (!$laporan) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Data rapor tidak ditemukan.");
        }

        // Ambil data siswa terkait untuk menampilkan nama di header
        $siswa = $this->siswaModel->find($laporan['id_siswa']);

        $data = [
            'title'   => 'Edit Rapor: ' . $siswa['nama_anak'],
            'laporan' => $laporan,
            'siswa'   => $siswa
        ];

        return view('laporan/edit', $data);
    }
}
