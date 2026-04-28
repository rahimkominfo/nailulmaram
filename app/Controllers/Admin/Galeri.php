<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\GaleriModel;
use App\Models\GaleriGambarModel;

class Galeri extends BaseController
{
    public function index()
    {
        $galeriModel = new GaleriModel();
        $data = [
            'title'  => 'Galeri Kegiatan',
            'galeri' => $galeriModel->orderBy('created_at', 'DESC')->findAll()
        ];
        return view('admin/galeri/index', $data);
    }

    public function tambah()
    {
        return view('admin/galeri/tambah', ['title' => 'Tambah Album']);
    }

    public function store()
    {
        $galeriModel = new GaleriModel();
        $fileSampul = $this->request->getFile('sampul_url');
        
        $namaSampul = null;
        if ($fileSampul && $fileSampul->isValid() && !$fileSampul->hasMoved()) {
            $namaSampul = $fileSampul->getRandomName();
            $fileSampul->move('uploads/galeri', $namaSampul);
        }

        $data = [
            'judul'      => $this->request->getPost('judul'),
            'deskripsi'  => $this->request->getPost('deskripsi'),
            'sampul_url' => $namaSampul,
        ];

        if ($galeriModel->insert($data)) {
            return redirect()->to('/admin/galeri')->with('success', 'Album galeri berhasil dibuat.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal membuat album.');
        }
    }

    public function edit($id)
    {
        $galeriModel = new GaleriModel();
        $data = [
            'title'  => 'Edit Album',
            'galeri' => $galeriModel->find($id)
        ];
        return view('admin/galeri/edit', $data);
    }

    public function update($id)
    {
        $galeriModel = new GaleriModel();
        $galeriLama = $galeriModel->find($id);
        
        $fileSampul = $this->request->getFile('sampul_url');
        $namaSampul = $galeriLama['sampul_url'];

        if ($fileSampul && $fileSampul->isValid() && !$fileSampul->hasMoved()) {
            $namaSampul = $fileSampul->getRandomName();
            $fileSampul->move('uploads/galeri', $namaSampul);
            if ($galeriLama['sampul_url'] && file_exists('uploads/galeri/' . $galeriLama['sampul_url'])) {
                unlink('uploads/galeri/' . $galeriLama['sampul_url']);
            }
        }

        $data = [
            'judul'      => $this->request->getPost('judul'),
            'deskripsi'  => $this->request->getPost('deskripsi'),
            'sampul_url' => $namaSampul,
        ];

        if ($galeriModel->update($id, $data)) {
            return redirect()->to('/admin/galeri')->with('success', 'Album berhasil diperbarui.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui album.');
        }
    }

    public function delete($id)
    {
        $galeriModel = new GaleriModel();
        $galeriGambarModel = new GaleriGambarModel();
        
        // Delete images in album first
        $images = $galeriGambarModel->where('galeri_id', $id)->findAll();
        foreach($images as $img) {
            if (file_exists('uploads/galeri/'.$img['gambar_url'])) {
                unlink('uploads/galeri/'.$img['gambar_url']);
            }
        }
        
        $galeri = $galeriModel->find($id);
        if ($galeriModel->delete($id)) {
            if ($galeri['sampul_url'] && file_exists('uploads/galeri/'.$galeri['sampul_url'])) {
                unlink('uploads/galeri/'.$galeri['sampul_url']);
            }
            return redirect()->to('/admin/galeri')->with('success', 'Album berhasil dihapus.');
        } else {
            return redirect()->to('/admin/galeri')->with('error', 'Gagal menghapus album.');
        }
    }

    public function view($id)
    {
        $galeriModel = new GaleriModel();
        $galeriGambarModel = new GaleriGambarModel();
        
        $data = [
            'title'  => 'Isi Album Galeri',
            'galeri' => $galeriModel->find($id),
            'gambar' => $galeriGambarModel->where('galeri_id', $id)->findAll()
        ];
        return view('admin/galeri/view', $data);
    }

    public function uploadGambar()
    {
        $galeriGambarModel = new GaleriGambarModel();
        $galeriId = $this->request->getPost('galeri_id');
        $files = $this->request->getFileMultiple('gambar_url');

        if ($files) {
            foreach ($files as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName();
                    $file->move('uploads/galeri', $newName);
                    
                    $galeriGambarModel->insert([
                        'galeri_id'  => $galeriId,
                        'gambar_url' => $newName,
                        'caption'    => $this->request->getPost('caption')
                    ]);
                }
            }
            return redirect()->back()->with('success', 'Foto-foto berhasil ditambahkan ke album.');
        }
        return redirect()->back()->with('error', 'Gagal mengunggah foto.');
    }

    public function hapusGambar($id)
    {
        $galeriGambarModel = new GaleriGambarModel();
        $gambar = $galeriGambarModel->find($id);
        
        if ($galeriGambarModel->delete($id)) {
            if (file_exists('uploads/galeri/'.$gambar['gambar_url'])) {
                unlink('uploads/galeri/'.$gambar['gambar_url']);
            }
            return redirect()->back()->with('success', 'Foto berhasil dihapus.');
        }
        return redirect()->back()->with('error', 'Gagal menghapus foto.');
    }
}
