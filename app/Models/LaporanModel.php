<?php
namespace App\Models;
use CodeIgniter\Model;

class LaporanModel extends Model {
    protected $table = 'laporan_perkembangan';
    protected $primaryKey = 'id_laporan';
    // Tambahkan semua kolom baru di sini agar bisa disimpan
   protected $allowedFields = [
    'id_siswa', 'tanggal_lap', 'nilai_aik', 'nilai_cpabp', 'nilai_cpjd', 
    'nilai_cpdl', 'nilai_p5', 'berat_badan', 'tinggi_badan', 'lingkar_kepala', 
    'sakit', 'izin', 'alfa', 'catatan_guru', 
    'guru_wali', 'foto_kegiatan' // TAMBAHKAN DUA KOLOM INI
];
}