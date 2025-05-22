<?php

namespace App\Models;

use CodeIgniter\Model;

class CutiModel extends Model
{
    protected $table      = 'cuti';
    protected $primaryKey = 'id_cuti';

    public function getCuti($id = false)
    {
        $builder = $this->db->table($this->table);
        // Join with the pegawai table to get the employee's name.
        $builder->select('cuti.*, pegawai.nama_lengkap');
        $builder->join('pegawai', 'pegawai.id_pegawai = cuti.id_pegawai', 'left');

        if ($id === false) {
            return $builder->get()->getResultArray();
        }

        $builder->where('cuti.id_cuti', $id);
        return $builder->get()->getRowArray();
    }
}
