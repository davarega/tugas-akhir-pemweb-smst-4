<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Jabatan extends BaseController
{
    protected $user;
    protected $data = [];

    public function __construct()
    {
        $this->user = session()->get('user');

        $this->data = [
            // 'sidebarMenu' => $this->adminSidebarMenu,
            'user' => $this->user,
        ];
    }
    public function index()
    {
        $this->data['title'] = 'Jabatan';
        $this->data['active'] = 'Jabatan';
        return view('admin/jabatan/jabatan', $this->data);
    }
}
