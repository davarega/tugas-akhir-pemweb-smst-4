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
}
