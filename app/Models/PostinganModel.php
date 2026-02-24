<?php
namespace App\Models;
use CodeIgniter\Model;

class PostinganModel extends Model {
    protected $table            = 'postingan';
    protected $primaryKey       = 'id_post';
    protected $allowedFields    = ['judul', 'isi_konten', 'gambar', 'id_guru'];
    protected $useTimestamps    = false; // Sinkron dengan created_at & updated_at
}