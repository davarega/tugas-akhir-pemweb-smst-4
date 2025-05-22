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

    public function index()
    {
        return view('admin/cuti/cuti', $this->data);
    }

    public function show($id)
    {
        // Use getCuti() with the given id.
        $this->data['cuti'] = (new CutiModel())->getCuti($id);
        if (!$this->data['cuti']) {
            // throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Pegawai tidak ditemukan');
            return redirect()->to('/admin/cuti')->with('error', 'Data cuti tidak ditemukan');
        }
        return view('admin/cuti/detail_cuti', $this->data);
    }
}
