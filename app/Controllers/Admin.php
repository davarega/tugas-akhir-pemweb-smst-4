<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
	public function index()
	{
		$user = session()->get('user');

		if (!$user) {
			return redirect()->to('/login');
		}

		if ($user['role'] !== 'admin') {
			return redirect()->to('/dashboard');
		}

		$data = [
			'title' => 'Dashboard',
			'active' => 'Dashboard',
			'user' => $user,
			'pegawai' => new \App\Models\PegawaiModel()->findAll(),
		];

		return view('admin/dashboard/dashboard', $data);
	}
}
