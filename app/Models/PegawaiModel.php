<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table            = 'pegawai';
    protected $primaryKey       = 'id_pegawai';
    protected $useAutoIncrement = false;

    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'id_pegawai',
        'nama_lengkap',
        'email',
        'password',
        'id_jabatan',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'nomor_hp',
        'foto',
        'role'
    ];

    protected $useTimestamps = false; // ubah ke true jika ada kolom created_at/updated_at

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
