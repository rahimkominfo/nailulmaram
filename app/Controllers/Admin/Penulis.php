<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PenulisModel;

class Penulis extends BaseController
{
    protected $penulisModel;

    public function __construct()
    {
        $this->penulisModel = new PenulisModel();
        
        // Authorization check
        if (session()->get('peran') !== 'Admin') {
            header('Location: ' . base_url('admin/dashboard'));
            exit;
        }
    }

    public function index()
    {
        return view('admin/penulis/index', [
            'title'   => 'Daftar Penulis',
            'penulis' => $this->penulisModel->findAll()
        ]);
    }

    public function tambah()
    {
        return view('admin/penulis/tambah', [
            'title' => 'Tambah Penulis'
        ]);
    }

    public function store()
    {
        $data = [
            'username'    => $this->request->getPost('username'),
            'email'       => $this->request->getPost('email'),
            'password'    => $this->request->getPost('password'),
            'nama_publik' => $this->request->getPost('nama_publik'),
            'peran'       => $this->request->getPost('peran'),
        ];

        if (!$this->penulisModel->insert($data)) {
            return redirect()->back()->withInput()->with('error', 'Gagal menambah penulis. Cek kembali isian.');
        }

        return redirect()->to('admin/penulis')->with('success', 'Penulis berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $penulis = $this->penulisModel->find($id);
        if (!$penulis) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('admin/penulis/edit', [
            'title'   => 'Edit Penulis',
            'penulis' => $penulis
        ]);
    }

    public function update($id)
    {
        $password = $this->request->getPost('password');
        
        $data = [
            'username'    => $this->request->getPost('username'),
            'email'       => $this->request->getPost('email'),
            'nama_publik' => $this->request->getPost('nama_publik'),
            'peran'       => $this->request->getPost('peran'),
        ];

        if (!empty($password)) {
            $data['password'] = $password;
        } else {
            // When password is empty, remove the password rule from validation
            $rules = $this->penulisModel->getValidationRules();
            unset($rules['password']);
            $this->penulisModel->setValidationRules($rules);
        }

        if (!$this->penulisModel->update($id, $data)) {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui penulis.');
        }

        return redirect()->to('admin/penulis')->with('success', 'Data penulis berhasil diperbarui.');
    }

    public function delete($id)
    {
        // Don't allow self-delete
        if (session()->get('penulis_id') == $id) {
            return redirect()->back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }

        $this->penulisModel->delete($id);
        return redirect()->to('admin/penulis')->with('success', 'Penulis berhasil dihapus.');
    }
}
