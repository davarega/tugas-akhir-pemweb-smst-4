<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PegawaiModel;

class Pegawai extends BaseController
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
        $this->data['title'] = 'Pegawai';
        $this->data['active'] = 'Pegawai';
        $this->data['pegawai'] = (new PegawaiModel())->findAll();

        return view('admin/dashboard/pegawai', $this->data);
    }

    public function create()
    {
        // Logic to create a new employee
        return redirect()->to('/admin/dashboard/pegawai');
    }
    public function edit($id)
    {
        // Logic to edit an employee
        return redirect()->to('/admin/dashboard/pegawai');
    }
    public function delete($id)
    {
        // Logic to delete an employee
        return redirect()->to('/admin/dashboard/pegawai');
    }
    public function show($id)
    {
        $data = [
            'title' => 'Detail Pegawai',
            'active' => 'Pegawai',
            'user' => $this->user,
            'pegawai' => (new PegawaiModel())->find($id),
        ];
        if (!$data['pegawai']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Pegawai tidak ditemukan');
        }
        // Logic to show employee details
        return view('admin/dashboard/pegawai_detail', $data);
    }
}
