<?php

namespace App\Models;

use CodeIgniter\Model;

class JabatanModel extends Model
{
    protected $table            = 'jabatan';
    protected $primaryKey       = 'id_jabatan';
    protected $allowedFields = [
        'id_jabatan',
        'nama_jabatan',
    ];

    public function getJabatan($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->where(['id_jabatan' => $id])->first();
    }
}
