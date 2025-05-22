<?php

namespace App\Controllers;

class Pages extends BaseController
{
	public function index(): string
	{
		$data = [
			'title' => 'Home | SkyNara',
			'content' => 'Welcome to CodeIgniter 4',
		];
		return view('pages/home', $data);
	}

	public function about(): string
	{
		return view('pages/about');
	}
}
