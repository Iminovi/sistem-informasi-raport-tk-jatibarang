<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table            = 'siswa';
    protected $primaryKey       = 'id_siswa';
    protected $useAutoIncrement = true;
    
    // Disatukan agar mencakup semua kolom dari LAPORAN.docx
    protected $allowedFields = [
        'nama_anak', 'nama_panggilan', 'nis', 'nisn', 'jenis_kelamin', 
        'tempat_lahir', 'tanggal_lahir', 'agama', 'anak_ke', 
        'nama_orang_tua', 'pekerjaan_orang_tua', 'alamat_jalan', 
        'desa_kelurahan', 'kecamatan', 'id_user_ortu'
    ];
    
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}