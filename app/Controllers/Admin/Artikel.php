<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ArtikelModel;
use App\Models\KategoriModel;

class Artikel extends BaseController
{
    public function index()
    {
        $artikelModel = new ArtikelModel();
        $searchTerm = $this->request->getVar('q');

        $query = $artikelModel->select('artikel.*, penulis.nama_publik')
                              ->join('penulis', 'penulis.penulis_id = artikel.penulis_id');

        if ($searchTerm) {
            $query->like('artikel.judul', $searchTerm);
        }

        $data = [
            'title'      => 'Daftar Berita',
            'artikel'    => $query->orderBy('tanggal_publikasi', 'DESC')->findAll(),
            'searchTerm' => $searchTerm
        ];
        return view('admin/artikel/index', $data);
    }

    public function tambah()
    {
        $kategoriModel = new KategoriModel();
        $data = [
            'title'    => 'Tambah Berita',
            'kategori' => $kategoriModel->findAll()
        ];
        return view('admin/artikel/tambah', $data);
    }

    public function store()
    {
        $artikelModel = new ArtikelModel();

        // Validasi input
        if (!$this->validate([
            'judul'       => 'required|min_length[5]|max_length[255]',
            'konten'      => 'required',
            'kategori_id' => 'required',
            'status'      => 'required'
        ])) {
            return redirect()->back()->withInput()->with('error', 'Semua field wajib diisi dengan benar.');
        }

        $fileGambar = $this->request->getFile('gambar_utama');
        
        $namaGambar = null;
        if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('uploads/artikel', $namaGambar);
        }

        $judul = $this->request->getPost('judul');
        $konten = $this->request->getPost('konten');
        
        $data = [
            'judul'        => $judul,
            'slug'         => url_title($judul, '-', true) . '-' . rand(100, 999),
            'konten'       => $konten,
            'abstrak'      => strip_tags(substr($konten, 0, 200)),
            'gambar_utama' => $namaGambar,
            'penulis_id'   => session()->get('penulis_id'),
            'status'       => $this->request->getPost('status'),
        ];

        if ($artikelModel->insert($data)) {
            // Handle artikel_kategori
            $db = \Config\Database::connect();
            $artikelId = $artikelModel->insertID();
            $kategoriId = $this->request->getPost('kategori_id');
            if ($kategoriId) {
                $db->table('artikel_kategori')->insert([
                    'artikel_id' => $artikelId,
                    'kategori_id' => $kategoriId
                ]);
            }

            return redirect()->to('/admin/artikel')->with('success', 'Berita berhasil diterbitkan.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menerbitkan berita.');
        }
    }

    public function edit($id)
    {
        $artikelModel = new ArtikelModel();
        $kategoriModel = new KategoriModel();
        $db = \Config\Database::connect();

        $artikel = $artikelModel->find($id);
        if (!$artikel) {
            return redirect()->to('/admin/artikel')->with('error', 'Berita tidak ditemukan.');
        }

        $currentKategori = $db->table('artikel_kategori')->where('artikel_id', $id)->get()->getRowArray();

        $data = [
            'title'           => 'Edit Berita',
            'artikel'         => $artikel,
            'kategori'        => $kategoriModel->findAll(),
            'currentKategori' => $currentKategori ? $currentKategori['kategori_id'] : null
        ];
        return view('admin/artikel/edit', $data);
    }

    public function update($id)
    {
        $artikelModel = new ArtikelModel();
        $artikelLama = $artikelModel->find($id);

        if (!$artikelLama) {
            return redirect()->to('/admin/artikel')->with('error', 'Berita tidak ditemukan.');
        }

        // Validasi input
        if (!$this->validate([
            'judul'       => 'required|min_length[5]|max_length[255]',
            'konten'      => 'required',
            'kategori_id' => 'required',
            'status'      => 'required'
        ])) {
            return redirect()->back()->withInput()->with('error', 'Semua field wajib diisi dengan benar.');
        }
        
        $fileGambar = $this->request->getFile('gambar_utama');
        $namaGambar = $artikelLama['gambar_utama'];

        if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('uploads/artikel', $namaGambar);
            // Delete old image if exists
            if ($artikelLama['gambar_utama'] && file_exists('uploads/artikel/' . $artikelLama['gambar_utama'])) {
                unlink('uploads/artikel/' . $artikelLama['gambar_utama']);
            }
        }

        $judul = $this->request->getPost('judul');
        $konten = $this->request->getPost('konten');

        $data = [
            'judul'        => $judul,
            'slug'         => url_title($judul, '-', true) . '-' . rand(100, 999),
            'konten'       => $konten,
            'abstrak'      => strip_tags(substr($konten, 0, 200)),
            'gambar_utama' => $namaGambar,
            'status'       => $this->request->getPost('status'),
        ];

        if ($artikelModel->update($id, $data)) {
            $db = \Config\Database::connect();
            $kategoriId = $this->request->getPost('kategori_id');
            
            // Simple sync: delete old and insert new
            $db->table('artikel_kategori')->where('artikel_id', $id)->delete();
            if ($kategoriId) {
                $db->table('artikel_kategori')->insert([
                    'artikel_id' => $id,
                    'kategori_id' => $kategoriId
                ]);
            }

            return redirect()->to('/admin/artikel')->with('success', 'Berita berhasil diperbarui.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui berita.');
        }
    }

    public function delete($id)
    {
        $artikelModel = new ArtikelModel();
        $artikel = $artikelModel->find($id);
        
        if ($artikelModel->delete($id)) {
            // Note: with soft delete, we might not want to unlink file immediately
            // But if it's hard delete or clean up:
            // if ($artikel['gambar_utama'] && file_exists('uploads/artikel/'.$artikel['gambar_utama'])) { unlink(...) }
            return redirect()->to('/admin/artikel')->with('success', 'Berita berhasil dihapus.');
        } else {
            return redirect()->to('/admin/artikel')->with('error', 'Gagal menghapus berita.');
        }
    }
}
