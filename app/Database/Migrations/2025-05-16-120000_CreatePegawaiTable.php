<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePegawaiTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pegawai'     => ['type' => 'CHAR', 'constraint' => 10],
            'nama_lengkap'   => ['type' => 'VARCHAR', 'constraint' => 255],
            'email'          => ['type' => 'VARCHAR', 'constraint' => 255, 'unique' => true],
            'password'       => ['type' => 'VARCHAR', 'constraint' => 255],
            'id_jabatan'     => ['type' => 'INT'],
            'tempat_lahir'   => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'tanggal_lahir'  => ['type' => 'DATE', 'null' => true],
            'jenis_kelamin'  => ['type' => 'ENUM', 'constraint' => ['L', 'P'], 'null' => true],
            'alamat'         => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'nomor_hp'       => ['type' => 'VARCHAR', 'constraint' => 15, 'unique' => true, 'null' => true],
            'foto'           => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'role'           => ['type' => 'ENUM', 'constraint' => ['admin', 'pegawai'], 'default' => 'pegawai'],
        ]);
        $this->forge->addKey('id_pegawai', true);
        $this->forge->addForeignKey('id_jabatan', 'jabatan', 'id_jabatan', 'CASCADE', 'RESTRICT');
        $this->forge->createTable('pegawai');
    }

    public function down()
    {
        $this->forge->dropTable('pegawai');
    }
}
