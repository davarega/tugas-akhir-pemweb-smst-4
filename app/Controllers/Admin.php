<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PegawaiModel;

class Admin extends BaseController
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
		$user = session()->get('user');

		if (!$user) {
			return redirect()->to('/login');
		}

		if ($user['role'] !== 'admin') {
			return redirect()->to('/dashboard');
		}

		$this->data['title'] = 'Dashboard';
		$this->data['active'] = 'Dashboard';
		$this->data['pegawai'] = (new PegawaiModel())->findAll();

		return view('admin/dashboard/dashboard', $this->data);
	}
}
