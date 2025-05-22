<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJabatanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jabatan'    => ['type' => 'INT', 'auto_increment' => true],
            'nama_jabatan'  => ['type' => 'VARCHAR', 'constraint' => 255],
        ]);
        $this->forge->addKey('id_jabatan', true);
        $this->forge->createTable('jabatan');
    }

    public function down()
    {
        $this->forge->dropTable('jabatan');
    }
}
