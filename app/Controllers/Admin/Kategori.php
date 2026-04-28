<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KategoriModel;

class Kategori extends BaseController
{
    public function index()
    {
        $kategoriModel = new KategoriModel();
        
        // Fetch categories with parent name
        $kategori = $kategoriModel->select('kategori.*, parent.nama as nama_induk')
                                  ->join('kategori as parent', 'parent.kategori_id = kategori.kategori_induk_id', 'left')
                                  ->findAll();

        $data = [
            'title'    => 'Kategori Berita',
            'kategori' => $kategori,
            'induk'    => $kategoriModel->where('kategori_induk_id', null)->findAll()
        ];
        return view('admin/kategori/index', $data);
    }

    public function store()
    {
        $kategoriModel = new KategoriModel();
        $nama = $this->request->getPost('nama');
        $induk = $this->request->getPost('kategori_induk_id');
        
        $data = [
            'nama' => $nama,
            'slug' => url_title($nama, '-', true),
            'kategori_induk_id' => !empty($induk) ? $induk : null
        ];

        if ($kategoriModel->insert($data)) {
            return redirect()->to('/admin/kategori')->with('success', 'Kategori berhasil ditambahkan.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan kategori.');
        }
    }

    public function update()
    {
        $kategoriModel = new KategoriModel();
        $id = $this->request->getPost('kategori_id');
        $nama = $this->request->getPost('nama');
        $induk = $this->request->getPost('kategori_induk_id');

        $data = [
            'nama' => $nama,
            'slug' => url_title($nama, '-', true),
            'kategori_induk_id' => !empty($induk) ? $induk : null
        ];

        if ($kategoriModel->update($id, $data)) {
            return redirect()->to('/admin/kategori')->with('success', 'Kategori berhasil diperbarui.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui kategori.');
        }
    }

    public function delete($id)
    {
        $kategoriModel = new KategoriModel();
        if ($kategoriModel->delete($id)) {
            return redirect()->to('/admin/kategori')->with('success', 'Kategori berhasil dihapus.');
        } else {
            return redirect()->to('/admin/kategori')->with('error', 'Gagal menghapus kategori.');
        }
    }
}
