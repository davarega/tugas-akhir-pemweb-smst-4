<?php

namespace App\Controllers;

use App\Models\PegawaiModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function index()
    {
        return view('auth/login');
    }

    public function login()
    {
        try {
            //code...

            $session = session();
            $model = new PegawaiModel();
            $idPegawai = $this->request->getPost('id_pegawai');
            $password = $this->request->getPost('password');

            $pegawai = $model->where('id_pegawai', $idPegawai)->first();

            if ($pegawai) {
                if (password_verify($password, $pegawai['password'])) {
                    $session->set('user', $pegawai);

                    // Redirect sesuai role
                    if ($pegawai['role'] === 'admin') {
                        return redirect()->to('/admin/dashboard');
                    } else {
                        return redirect()->to('/dashboard');
                    }
                } else {
                    return redirect()->back()->with('error', 'Password salah.');
                }
            } else {
                return redirect()->back()->with('error', 'ID Pegawai tidak ditemukan.');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan, silakan coba lagi Nanti.');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
