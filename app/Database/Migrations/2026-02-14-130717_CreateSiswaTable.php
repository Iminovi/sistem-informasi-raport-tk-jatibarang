<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSiswaTable extends Migration
{
    public function up()
{
    $this->forge->addField([
        'id_siswa'   => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
        'nama_anak'  => ['type' => 'VARCHAR', 'constraint' => 100],
        'nisn'       => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
        'kelas'      => ['type' => 'VARCHAR', 'constraint' => 50],
        'created_at' => ['type' => 'DATETIME', 'null' => true],
    ]);
    $this->forge->addKey('id_siswa', true);
    $this->forge->createTable('siswa');
}

    public function down()
    {
        //
    }
}
