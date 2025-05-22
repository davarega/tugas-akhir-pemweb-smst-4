<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class User extends BaseController
{
    public function index()
    {
        $user = session()->get('user');

        if (!$user) {
            return redirect()->to('/login');
        }

        $data = [
            'title' => 'Dashboard',
            'active' => 'Dashboard',
            'user' => $user,
        ];
        return view('user/dashboard/dashboard', $data);
    }

    public function jadwal()
    {
        return view('user/jadwal/jadwal', [
            'title' => 'Jadwal',
            'active' => 'Jadwal',
            'user' => session()->get('user'),
        ]);
    }
}
