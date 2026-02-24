<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLaporanTable extends Migration
{
    public function up()
{
    $this->forge->addField([
        'id_laporan'     => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
        'id_siswa'       => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true],
        'tanggal_lap'    => ['type' => 'DATE'],
        'aspek_motorik'  => ['type' => 'TEXT'],
        'aspek_kognitif' => ['type' => 'TEXT'],
        'catatan_guru'   => ['type' => 'TEXT'],
    ]);
    $this->forge->addKey('id_laporan', true);
    $this->forge->addForeignKey('id_siswa', 'siswa', 'id_siswa', 'CASCADE', 'CASCADE');
    $this->forge->createTable('laporan_perkembangan');
}

    public function down()
    {
        //
    }
}
