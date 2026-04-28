<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\FlayerModel;

class Flayer extends BaseController
{
    public function index()
    {
        $flayerModel = new FlayerModel();
        $data = [
            'title'   => 'Manajemen Flayer',
            'flayers' => $flayerModel->orderBy('urutan', 'ASC')->findAll()
        ];
        return view('admin/flayer/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Flayer Baru'
        ];
        return view('admin/flayer/tambah', $data);
    }

    public function store()
    {
        $flayerModel = new FlayerModel();

        $validation = $this->validate([
            'judul'      => 'required|min_length[3]|max_length[255]',
            'label'      => 'permit_empty|max_length[100]',
            'status'     => 'required|in_list[Aktif,Tidak Aktif]',
            'urutan'     => 'required|numeric',
            'gambar_url' => 'required|valid_url'
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('error', 'Validasi gagal. Pastikan URL gambar valid.');
        }

        $data = [
            'judul'      => $this->request->getPost('judul'),
            'label'      => $this->request->getPost('label'),
            'status'     => $this->request->getPost('status'),
            'urutan'     => $this->request->getPost('urutan'),
            'gambar_url' => $this->request->getPost('gambar_url')
        ];

        if ($flayerModel->insert($data)) {
            return redirect()->to('/admin/flayer')->with('success', 'Flayer berhasil ditambahkan.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan flayer.');
        }
    }

    public function edit($id)
    {
        $flayerModel = new FlayerModel();
        $flayer = $flayerModel->find($id);

        if (!$flayer) {
            return redirect()->to('/admin/flayer')->with('error', 'Flayer tidak ditemukan.');
        }

        $data = [
            'title'  => 'Edit Flayer',
            'flayer' => $flayer
        ];
        return view('admin/flayer/edit', $data);
    }

    public function update($id)
    {
        $flayerModel = new FlayerModel();
        $flayerLama = $flayerModel->find($id);

        if (!$flayerLama) {
            return redirect()->to('/admin/flayer')->with('error', 'Flayer tidak ditemukan.');
        }

        $validation = $this->validate([
            'judul'      => 'required|min_length[3]|max_length[255]',
            'label'      => 'permit_empty|max_length[100]',
            'status'     => 'required|in_list[Aktif,Tidak Aktif]',
            'urutan'     => 'required|numeric',
            'gambar_url' => 'required|valid_url'
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('error', 'Validasi gagal. Pastikan URL gambar valid.');
        }

        $data = [
            'judul'      => $this->request->getPost('judul'),
            'label'      => $this->request->getPost('label'),
            'status'     => $this->request->getPost('status'),
            'urutan'     => $this->request->getPost('urutan'),
            'gambar_url' => $this->request->getPost('gambar_url')
        ];

        if ($flayerModel->update($id, $data)) {
            return redirect()->to('/admin/flayer')->with('success', 'Flayer berhasil diperbarui.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui flayer.');
        }
    }

    public function delete($id)
    {
        $flayerModel = new FlayerModel();
        $flayer = $flayerModel->find($id);

        if ($flayer) {
            // Kita gunakan soft delete sesuai model, tapi gambar fisik mungkin ingin dihapus jika benar-benar dihapus dari DB.
            // Namun Model menggunakan $useSoftDeletes = true, jadi kita biarkan saja gambarnya.
            // Jika ingin hard delete: $flayerModel->delete($id, true);
            
            if ($flayerModel->delete($id)) {
                return redirect()->to('/admin/flayer')->with('success', 'Flayer berhasil dihapus.');
            }
        }

        return redirect()->to('/admin/flayer')->with('error', 'Gagal menghapus flayer.');
    }
}
