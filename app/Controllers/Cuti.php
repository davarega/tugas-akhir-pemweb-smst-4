<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Cuti extends BaseController
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
        $this->data['title'] = 'Cuti';
        $this->data['active'] = 'Cuti';
        return view('admin/cuti/cuti', $this->data);
    }
}
