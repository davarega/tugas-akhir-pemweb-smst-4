<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CutiModel;
use CodeIgniter\HTTP\ResponseInterface;

class Cuti extends BaseController
{
    protected $user;
    protected $data = [];
    protected $validationRules = [];
    protected $validationMessages = [];

    public function __construct()
    {
        $this->user = session()->get('user');

        $this->data = [
            'title'   => 'Cuti',
            'active'  => 'Cuti',
            'user'    => $this->user,
        ];

        $this->validationRules = [
            'jenis'          => 'required|in_list[tahunan,sakit,melahirkan,ijin,lainnya]',
            'tanggal_mulai'  => 'required|valid_date',
            'tanggal_selesai' => 'required|valid_date',
            'keterangan'    => 'permit_empty|max_length[255]',
        ];

        $this->validationMessages = [
            'jenis' => [
                'required' => 'Jenis cuti wajib diisi',
                'min_length' => 'Jenis cuti minimal 3 karakter',
                'max_length' => 'Jenis cuti maksimal 50 karakter',
            ],
            'tanggal_mulai' => [
                'required' => 'Tanggal mulai wajib diisi',
                'valid_date' => 'Tanggal mulai tidak valid',
            ],
            'tanggal_selesai' => [
                'required' => 'Tanggal selesai wajib diisi',
                'valid_date' => 'Tanggal selesai tidak valid',
            ],
            'keterangan' => [
                'max_length' => 'Keterangan maksimal 255 karakter',
            ],
        ];
    }

    // untuk admin
    public function a_index()
    {
        $this->data['cuti'] = (new CutiModel())->getCutiByPegawai();
        return view('admin/cuti/cuti', $this->data);
    }

    // public function a_show($id)
    // {
    //     $this->data['cuti'] = (new CutiModel())->getCuti($id);

    //     if (!$this->data['cuti']) {
    //         throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Id cuti tidak ditemukan');
    //         // return redirect()->to('/admin/cuti')->with('error', 'Data cuti tidak ditemukan');
    //     }
    //     return view('admin/cuti/detail_cuti', $this->data);
    // }

    public function a_approve($id)
    {
        $cutiModel = new CutiModel();
        if ($cutiModel->approveCuti($id)) {
            return redirect()->to('/admin/cuti')->with('success', 'Cuti berhasil disetujui');
        }
        return redirect()->to('/admin/cuti')->with('error', 'Gagal menyetujui cuti');
    }

    public function a_reject($id)
    {
        $cutiModel = new CutiModel();
        if ($cutiModel->rejectCuti($id)) {
            return redirect()->to('/admin/cuti')->with('success', 'Cuti berhasil ditolak');
        }
        return redirect()->to('/admin/cuti')->with('error', 'Gagal menolak cuti');
    }

    // untuk user
    public function u_index()
    {
        $this->data['cuti'] = (new CutiModel())->getCutiByPegawai($this->user['id_pegawai']);

        if ($this->data['cuti'] === null) {
            $this->data['cuti'] = [];
        }

        return view('user/cuti/cuti', $this->data);
    }

    public function u_show($id)
    {
        $this->data['cuti'] = (new CutiModel())->getCuti($id);
        if (!$this->data['cuti']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Pegawai tidak ditemukan');
        }
        return view('user/cuti/detail_cuti', $this->data);
    }

    public function u_update($id)
    {
        $cutiModel = new CutiModel();

        if (!$cutiModel->find($id)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Cuti tidak ditemukan');
        }

        $data = [
            'jenis'          => $this->request->getPost('jenis'),
            'tanggal_mulai'  => $this->request->getPost('tanggal_mulai'),
            'tanggal_selesai' => $this->request->getPost('tanggal_selesai'),
            'keterangan'    => $this->request->getPost('keterangan'),
        ];

        if ($cutiModel->update($id, $data)) {
            return redirect()->to('/dashboard/cuti/')->with('success', 'Cuti berhasil diperbarui');
        }
        return redirect()->back()->withInput()->with('error', 'Gagal memperbarui cuti');
    }

    public function u_create()
    {
        return view('user/cuti/buat_cuti', $this->data);
    }

    public function u_store()
    {
        // dd($this->request->getPost());
        $cutiModel = new CutiModel();
        $validation = \Config\Services::validation();

        // Validate the input data
        if (!$this->validate($this->validationRules, $this->validationMessages)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        if ($cutiModel->insert([
            'id_pegawai'     => $this->user['id_pegawai'],
            'jenis'          => $this->request->getPost('jenis'),
            'tanggal_mulai'  => $this->request->getPost('tanggal_mulai'),
            'tanggal_selesai' => $this->request->getPost('tanggal_selesai'),
            'keterangan'    => $this->request->getPost('keterangan'),
            'status'         => 'diajukan',
        ])) {
            return redirect()->to('/dashboard/cuti')->with('success', 'Cuti berhasil diajukan');
        }

        return redirect()->back()->withInput()->with('error', 'Gagal mengajukan cuti');
    }

    public function u_delete($id)
    {
        $cutiModel = new CutiModel();

        if (!$cutiModel->find($id)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Cuti tidak ditemukan');
        }

        if ($cutiModel->delete($id)) {
            return redirect()->to('/dashboard/cuti')->with('success', 'Cuti berhasil dihapus');
        }

        return redirect()->back()->with('error', 'Gagal menghapus cuti');
    }
}
