<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasSiswaModel extends Model
{
    protected $table            = 'kelas_siswa';
    protected $primaryKey       = 'id_relasi';
    protected $allowedFields    = ['id_kelas', 'id_siswa'];

    // Fungsi khusus untuk mengambil nama siswa di dalam kelas tertentu
    public function getSiswaByKelas($id_kelas)
    {
        return $this->db->table('kelas_siswa')
            ->join('siswa', 'siswa.id_siswa = kelas_siswa.id_siswa')
            ->where('id_kelas', $id_kelas)
            ->get()->getResultArray();
    }
}