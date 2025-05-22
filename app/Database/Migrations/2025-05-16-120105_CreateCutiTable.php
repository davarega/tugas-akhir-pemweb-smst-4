<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCutiTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_cuti'         => ['type' => 'INT', 'auto_increment' => true],
            'id_pegawai'      => ['type' => 'CHAR', 'constraint' => 10],
            'tanggal_mulai'   => ['type' => 'DATE'],
            'tanggal_selesai' => ['type' => 'DATE'],
            'jenis'           => ['type' => 'ENUM', 'constraint' => ['tahunan', 'sakit', 'ijin', 'melahirkan', 'lainnya']],
            'keterangan'      => ['type' => 'TEXT', 'null' => true],
            'status'          => ['type' => 'ENUM', 'constraint' => ['diajukan', 'disetujui', 'ditolak'], 'default' => 'diajukan'],
        ]);
        $this->forge->addKey('id_cuti', true);
        $this->forge->addForeignKey('id_pegawai', 'pegawai', 'id_pegawai', 'CASCADE', 'RESTRICT');
        $this->forge->createTable('cuti');
    }

    public function down()
    {
        $this->forge->dropTable('cuti');
    }
}
