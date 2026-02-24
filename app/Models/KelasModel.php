<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{
    protected $table            = 'kelas';
    protected $primaryKey       = 'id_kelas';
    protected $allowedFields    = ['nama_kelas', 'wali_kelas'];
    protected $useTimestamps    = false; // Opsional, jika ada kolom created_at
}