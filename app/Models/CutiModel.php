<?php

namespace App\Models;

use CodeIgniter\Model;

class CutiModel extends Model
{
    protected $table      = 'cuti';
    protected $primaryKey = 'id_cuti';
    protected $allowedFields = [
        'id_pegawai',
        'jenis',
        'tanggal_mulai',
        'tanggal_selesai',
        'keterangan',
        'status',
    ];

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

    public function getCutiStatsByJenis($jenis = false)
    {
        $builder = $this->db->table($this->table);
        $builder->select('cuti.jenis, COUNT(*) as total');
        $builder->groupBy('jenis');

        if ($jenis === false) {
            return $builder->get()->getResultArray();
        }

        $builder->where('jenis', $jenis);
        return $builder->get()->getRowArray();
    }

    public function approveCuti($id)
    {
        $data = [
            'status' => 'disetujui',
        ];
        return $this->update($id, $data);
    }

    public function rejectCuti($id)
    {
        $data = [
            'status' => 'ditolak',
        ];
        return $this->update($id, $data);
    }
}
