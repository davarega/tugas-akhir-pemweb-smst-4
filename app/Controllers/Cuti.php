<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CutiModel;
use CodeIgniter\HTTP\ResponseInterface;

class Cuti extends BaseController
{
    protected $user;
    protected $data = [];

    public function __construct()
    {
        $this->user = session()->get('user');

        $this->data = [
            'title'   => 'Cuti',
            'active'  => 'Cuti',
            'user'    => $this->user,
            'cuti'    => (new CutiModel())->getCuti(),
        ];
    }

    // untuk admin
    public function a_index()
    {
        return view('admin/cuti/cuti', $this->data);
    }

    public function a_show($id)
    {
        // Use getCuti() with the given id.
        $this->data['cuti'] = (new CutiModel())->getCuti($id);
        if (!$this->data['cuti']) {
            // throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Pegawai tidak ditemukan');
            return redirect()->to('/admin/cuti')->with('error', 'Data cuti tidak ditemukan');
        }
        return view('admin/cuti/detail_cuti', $this->data);
    }

    public function a_approve($id)
    {
        $cutiModel = new CutiModel();
        if ($cutiModel->approveCuti($id)) {
            return redirect()->to('/admin/cuti')->with('success', 'Cuti berhasil disetujui');
        }
        return redirect()->to('/admin/cuti')->with('error', 'Gagal menyetujui cuti');
    }

    public function a_reject($id)
    {
        $cutiModel = new CutiModel();
        if ($cutiModel->rejectCuti($id)) {
            return redirect()->to('/admin/cuti')->with('success', 'Cuti berhasil ditolak');
        }
        return redirect()->to('/admin/cuti')->with('error', 'Gagal menolak cuti');
    }

    // untuk user
    public function u_index()
    {
        $this->data['cuti'] = (new CutiModel())->getCuti($this->user['id_pegawai']);

        if ($this->data['cuti'] === null) {
            $this->data['cuti'] = [];
        }

        dd($this->data['cuti']);

        return view('user/cuti/cuti', $this->data);
    }
}
