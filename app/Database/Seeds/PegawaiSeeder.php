<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_pegawai' => 2303040098,
                'nama_lengkap' => 'Mochamad Faishal Rafi',
                'email' => 'namarafi123@gmail.com',
                'password' => password_hash('admin', PASSWORD_BCRYPT),
                'id_jabatan' => 1,
                'tempat_lahir' => 'Banyumas',
                'tanggal_lahir' => '2005-09-29',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Raya No. 123',
                'nomor_hp' => '081234567890',
                'foto' => '/img/usersProfile/default.jpg',
                'role' => 'admin',
            ],
            [
                'id_pegawai' => 2303040099,
                'nama_lengkap' => 'Mochamad Faishal Rafi',
                'email' => 'a@gmail.com',
                'password' => password_hash('pegawai', PASSWORD_BCRYPT),
                'id_jabatan' => 1,
                'tempat_lahir' => 'Banyumas',
                'tanggal_lahir' => '2005-09-29',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Raya No. 123',
                'nomor_hp' => '08123456789',
                'foto' => '/img/usersProfile/default.jpg',
                'role' => 'pegawai',
            ]
        ];

        // Using Query Builder
        $this->db->table('pegawai')->insertBatch($data);
    }
}
