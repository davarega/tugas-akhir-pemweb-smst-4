<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JabatanModel;
use App\Models\PegawaiModel;

class Pegawai extends BaseController
{
    protected $user;
    protected $data = [];
    protected $validationRules = [];
    protected $validationMessages = [];

    public function __construct()
    {
        $this->user = session()->get('user');

        $this->data = [
            // 'sidebarMenu' => $this->adminSidebarMenu,
            'title' => 'Pegawai',
            'active' => 'Pegawai',
            'user' => $this->user,
            'pegawai' => (new PegawaiModel())->findAll(),
        ];

        $this->validationRules = [
            'id_pegawai' => 'required|numeric|exact_length[10]|is_unique[pegawai.id_pegawai]',
            'nama_lengkap' => 'required|min_length[3]|max_length[255]',
            'email' => 'required|valid_email|is_unique[pegawai.email]',
            'password' => 'required|min_length[6]',
            'id_jabatan' => 'required|integer|is_not_unique[jabatan.id_jabatan]', // asumsi tabel jabatan ada
            'tempat_lahir' => 'required|min_length[2]|max_length[255]',
            'tanggal_lahir' => 'required|valid_date',
            'jenis_kelamin' => 'required|in_list[L,P]',
            'alamat' => 'required|min_length[5]',
            'nomor_hp' => 'required|regex_match[/^[0-9+]{10,15}$/]',
            'foto' => 'uploaded[foto]|is_image[foto]|max_size[foto,1024]|mime_in[foto,image/jpg,image/jpeg,image/png]', // jika berupa URL string
            'role' => 'permit_empty|in_list[admin,pegawai]',
        ];

        $this->validationMessages = [
            'id_pegawai' => [
                'required' => 'ID Pegawai wajib diisi',
                'numeric' => 'ID Pegawai harus berupa angka',
                'exact_length' => 'ID Pegawai harus 10 digit',
                'is_unique' => 'ID Pegawai sudah terdaftar'
            ],
            'email' => [
                'is_unique' => 'Email sudah digunakan',
                'valid_email' => 'Email tidak valid',
            ],
            'nomor_hp' => [
                'regex_match' => 'Nomor HP harus berupa angka dan minimal 10 digit'
            ],
            'jenis_kelamin' => [
                'in_list' => 'Jenis kelamin harus L atau P'
            ]
        ];
    }

    public function index()
    {
        return view('admin/pegawai/pegawai', $this->data);
    }

    public function create()
    {
        $this->data['jabatans'] = (new JabatanModel())->getJabatan();

        // dd($this->data['jabatans']);
        // Logic to create a new employee
        return view('admin/pegawai/tambah_pegawai', $this->data);
    }

    public function store()
    {
        $pegawaiModel = new PegawaiModel();
        $validation = \Config\Services::validation();

        // Validate the input data
        if (!$this->validate($this->validationRules, $this->validationMessages)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Handle file upload
        $foto = $this->request->getFile('foto');
        if ($foto->isValid() && !$foto->hasMoved()) {
            $foto->move('img/usersProfile', $foto->getRandomName());
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal mengunggah foto');
        }

        $pegawaiModel->insert([
            'id_pegawai' => $this->request->getPost('id_pegawai'),
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'id_jabatan' => $this->request->getPost('id_jabatan'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'alamat' => $this->request->getPost('alamat'),
            'nomor_hp' => $this->request->getPost('nomor_hp'),
            'foto' => '/img/usersProfile/' . $foto->getName(),
            'role' => $this->request->getPost('role')
        ]);

        return redirect()->to('/admin/pegawai')->with('success', 'Pegawai berhasil ditambahkan');
    }

    public function edit($id)
    {
        $this->data['pegawai'] = (new PegawaiModel())->find($id);
        // Logic to edit an employee
        return view('admin/pegawai/edit_pegawai', $this->data);
    }
    public function delete($id)
    {
        // Logic to delete an employee
        // return view('admin/pegawai/pegawai', $this->data);
    }
    public function show($id)
    {
        $jabatanModel = new JabatanModel();

        $this->data['pegawai'] = (new PegawaiModel())->find($id);
        if (!$this->data['pegawai']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Pegawai tidak ditemukan');
        }

        $this->data['jabatan'] = $jabatanModel->getJabatan($this->data['pegawai']['id_jabatan']);
        // Logic to show employee details
        return view('admin/pegawai/detail_pegawai', $this->data);
    }
}
