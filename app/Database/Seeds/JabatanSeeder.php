<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JabatanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_jabatan' => 'Manager',
            ],
            [
                'nama_jabatan' => 'Staff',
            ],
            [
                'nama_jabatan' => 'Intern',
            ],
        ];

        // Using Query Builder
        $this->db->table('jabatan')->insertBatch($data);
    }
}
