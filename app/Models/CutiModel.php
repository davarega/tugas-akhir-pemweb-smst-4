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
        $builder->select('cuti.*, pegawai.nama_lengkap as nama_pegawai, DATEDIFF(cuti.tanggal_selesai, cuti.tanggal_mulai) + 1 as jumlah_hari');
        $builder->join('pegawai', 'pegawai.id_pegawai = cuti.id_pegawai', 'left');

        if ($id !== false) {
            $builder->where('cuti.id_cuti', $id); // id_cuti
        }

        return $builder->get()->getRowArray();
    }

    // CutiModel.php
    public function getCutiByPegawai($id_pegawai = false)
    {
        $builder = $this->db->table($this->table);
        $builder->select('cuti.*, pegawai.nama_lengkap as nama_pegawai, DATEDIFF(cuti.tanggal_selesai, cuti.tanggal_mulai) + 1 as jumlah_hari');
        $builder->join('pegawai', 'pegawai.id_pegawai = cuti.id_pegawai', 'left');

        if ($id_pegawai !== false) {
            $builder->where('cuti.id_pegawai', $id_pegawai); // bukan id_cuti
        }

        return $builder->get()->getResultArray(); // ← array of arrays
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

    public function getApprovedCutiStatsByJenis($jenis = false)
    {
        $builder = $this->db->table($this->table);
        $builder->select('cuti.jenis, COUNT(*) as total');
        // Only include approved leaves
        $builder->where('cuti.status', 'disetujui');
        $builder->groupBy('cuti.jenis');

        if ($jenis === false) {
            return $builder->get()->getResultArray();
        }

        $builder->where('cuti.jenis', $jenis);
        return $builder->get()->getRowArray();
    }

    public function getActiveCutiCount()
    {
        $today = date('Y-m-d');
        $builder = $this->db->table($this->table);
        $builder->select('COUNT(DISTINCT id_pegawai) as total');
        $builder->where('tanggal_mulai <=', $today);
        $builder->where('tanggal_selesai >=', $today);
        // Optional: include only approved leave
        $builder->where('status', 'disetujui');
        $result = $builder->get()->getRowArray();
        return isset($result['total']) ? (int)$result['total'] : 0;
    }
}
