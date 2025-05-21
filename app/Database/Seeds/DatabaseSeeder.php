<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Call the PegawaiSeeder
        $this->call('JabatanSeeder');
        // Call other seeders if needed
        $this->call('PegawaiSeeder');
    }
}
