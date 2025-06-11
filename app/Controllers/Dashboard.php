<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CutiModel;
use App\Models\JabatanModel;
use App\Models\PegawaiModel;

class Dashboard extends BaseController
{
	protected $user;
	protected $data = [];

	public function __construct()
	{
		$this->user = session()->get('user');

		$this->data = [
			'title' => 'Dashboard',
			'active' => 'Dashboard',
			'user' => $this->user,
		];
	}

	public function admin()
	{
		$this->data['pegawai'] = new PegawaiModel()->findAll();
		$cutiStats = new CutiModel()->getCutiStatsByJenis();

		$this->data['cutiLabels'] = json_encode(array_column($cutiStats, 'jenis'));
		$this->data['cutiData']   = json_encode(array_column($cutiStats, 'total'));

		if (!$this->user) {
			return redirect()->to('/login');
		}

		if ($this->user['role'] !== 'admin') {
			return redirect()->to('/dashboard');
		}

		return view('admin/dashboard/dashboard', $this->data);
	}

	public function user()
	{
		$this->data['jabatan'] = (new JabatanModel())->getJabatan($this->user['id_jabatan']);

		return view('user/dashboard/dashboard', $this->data);
	}
}
