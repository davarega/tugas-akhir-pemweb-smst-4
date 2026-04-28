<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JabatanModel;
use CodeIgniter\HTTP\ResponseInterface;

class Jabatan extends BaseController
{
    protected $user;
    protected $data = [];

    public function __construct()
    {
        $this->user = session()->get('user');

        $this->data = [
            'title' => 'Jabatan',
            'active' => 'Jabatan',
            'user' => $this->user,
        ];
    }
    public function index()
    {
        $this->data['jabatans'] = (new JabatanModel())->findAll();
        return view('admin/jabatan/jabatan', $this->data);
    }

    public function create()
    {
        return view('admin/jabatan/tambah_jabatan', $this->data);
    }

    public function show($id)
    {
        $jabatanModel = new JabatanModel();
        $pegawaiModel = new \App\Models\PegawaiModel();

        $jabatan = $jabatanModel->find($id);

        if (!$jabatan) {
            return redirect()->back()->with('error', 'Jabatan tidak ditemukan');
        }

        // Get count of employees with this position
        $jumlah_pegawai = $pegawaiModel->where('id_jabatan', $id)->countAllResults();

        // Get list of employees with this position
        $pegawai_list = $pegawaiModel->where('id_jabatan', $id)->findAll();

        $this->data['jabatan'] = $jabatan;
        $this->data['jumlah_pegawai'] = $jumlah_pegawai;
        $this->data['pegawai_list'] = $pegawai_list;

        return view('admin/jabatan/detail_jabatan', $this->data);
    }

    public function delete($id)
    {
        $jabatanModel = new JabatanModel();
        $pegawaiModel = new \App\Models\PegawaiModel();
        $jabatan = $jabatanModel->find($id);

        if (!$jabatan) {
            return redirect()->back()->with('error', 'Jabatan tidak ditemukan');
        }

        // Check if there are any employees referencing this jabatan
        $existingPegawai = $pegawaiModel->where('id_jabatan', $id)->first();
        if ($existingPegawai) {
            return redirect()->back()->with('error', 'Jabatan tidak dapat dihapus karena masih terdapat data pegawai yang terkait.');
        }

        if ($jabatanModel->delete($id)) {
            return redirect()->to('/admin/jabatan')->with('success', 'Jabatan berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus jabatan');
        }
    }

    public function store()
    {
        $jabatanModel = new JabatanModel();

        $data = [
            'nama_jabatan' => $this->request->getPost('nama_jabatan'),
        ];

        if ($jabatanModel->insert($data)) {
            return redirect()->to('/admin/jabatan')->with('success', 'Jabatan berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Gagal menambahkan jabatan');
        }
    }

    public function update($id)
    {
        $jabatanModel = new JabatanModel();
        $jabatan = $jabatanModel->find($id);

        if (!$jabatan) {
            return redirect()->back()->with('error', 'Jabatan tidak ditemukan');
        }

        $data = [
            'nama_jabatan' => $this->request->getPost('nama_jabatan'),
        ];

        if ($jabatanModel->update($id, $data)) {
            return redirect()->to('/admin/jabatan')->with('success', 'Jabatan berhasil diperbarui');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui jabatan');
        }
    }
}
