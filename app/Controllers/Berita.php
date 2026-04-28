<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\ProfilMasjidModel;

class Berita extends BaseController
{
    public function index()
    {
        $artikelModel = new ArtikelModel();
        $profilModel = new ProfilMasjidModel();
        $kategoriModel = new \App\Models\KategoriModel();
        
        $searchTerm = $this->request->getVar('q');
        $katSlug = $this->request->getVar('kategori');
        
        // Base Query - Ambil data artikel dan penulis (1:1)
        $query = $artikelModel->select('artikel.*, penulis.nama_publik')
                              ->join('penulis', 'penulis.penulis_id = artikel.penulis_id', 'left')
                              ->where('artikel.status', 'Ditayangkan');

        // Gunakan Subquery untuk mengambil 1 nama kategori saja (Menghindari duplikasi baris)
        $query->select('(SELECT nama FROM kategori 
                         JOIN artikel_kategori ON artikel_kategori.kategori_id = kategori.kategori_id 
                         WHERE artikel_kategori.artikel_id = artikel.artikel_id LIMIT 1) as nama_kategori');

        if ($searchTerm) {
            $query->like('artikel.judul', $searchTerm);
        }

        if ($katSlug) {
            $currentCat = $kategoriModel->where('slug', $katSlug)->first();
            if ($currentCat) {
                // Cari ID kategori sendiri dan semua sub-kategorinya
                $categoryIds = [$currentCat['kategori_id']];
                $subCategories = $kategoriModel->where('kategori_induk_id', $currentCat['kategori_id'])->findAll();
                
                if (!empty($subCategories)) {
                    foreach ($subCategories as $sub) {
                        $categoryIds[] = $sub['kategori_id'];
                    }
                }
                
                // Filter menggunakan WHERE IN (Subquery) agar baris artikel tetap unik
                $query->whereIn('artikel.artikel_id', function($builder) use ($categoryIds) {
                    return $builder->select('artikel_id')
                                   ->from('artikel_kategori')
                                   ->whereIn('kategori_id', $categoryIds);
                });
            }
        }

        $data = [
            'title'      => 'Berita Masjid | Masjid Jami Nailul Maram',
            'profil'     => $profilModel->first(),
            'berita'     => $query->orderBy('artikel.tanggal_publikasi', 'DESC')
                                 ->paginate(6),
            'pager'      => $artikelModel->pager,
            'categories' => $kategoriModel->findAll(),
            'searchTerm' => $searchTerm,
            'activeKat'  => $katSlug
        ];
        return view('frontend/berita', $data);
    }

    public function baca($slug)
    {
        $artikelModel = new ArtikelModel();
        $profilModel = new ProfilMasjidModel();
        
        $artikel = $artikelModel->select('artikel.*, penulis.nama_publik, kategori.nama as nama_kategori')
                                ->join('penulis', 'penulis.penulis_id = artikel.penulis_id', 'left')
                                ->join('artikel_kategori', 'artikel_kategori.artikel_id = artikel.artikel_id', 'left')
                                ->join('kategori', 'kategori.kategori_id = artikel_kategori.kategori_id', 'left')
                                ->where('artikel.slug', $slug)->first();

        if (!$artikel) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Increment view count
        $artikelModel->update($artikel['artikel_id'], ['jumlah_tayang' => $artikel['jumlah_tayang'] + 1]);

        // Latest News (excluding current)
        $beritaTerbaru = $artikelModel->select('artikel.*, kategori.nama as nama_kategori')
                                      ->join('artikel_kategori', 'artikel_kategori.artikel_id = artikel.artikel_id', 'left')
                                      ->join('kategori', 'kategori.kategori_id = artikel_kategori.kategori_id', 'left')
                                      ->where('status', 'Ditayangkan')
                                      ->where('artikel.artikel_id !=', $artikel['artikel_id'])
                                      ->orderBy('tanggal_publikasi', 'DESC')
                                      ->limit(5)
                                      ->findAll();

        // Popular News
        $beritaTerpopuler = $artikelModel->select('artikel.*, kategori.nama as nama_kategori')
                                         ->join('artikel_kategori', 'artikel_kategori.artikel_id = artikel.artikel_id', 'left')
                                         ->join('kategori', 'kategori.kategori_id = artikel_kategori.kategori_id', 'left')
                                         ->where('status', 'Ditayangkan')
                                         ->orderBy('jumlah_tayang', 'DESC')
                                         ->limit(5)
                                         ->findAll();

        $data = [
            'title'            => $artikel['judul'] . ' | Masjid Jami',
            'meta_description' => $artikel['abstrak'] ?? substr(strip_tags($artikel['konten']), 0, 160),
            'meta_image'       => $artikel['gambar_utama'] ? base_url('uploads/artikel/' . $artikel['gambar_utama']) : base_url('images/logo_masjid.jpeg'),
            'profil'           => $profilModel->first(),
            'artikel'          => $artikel,
            'beritaTerbaru'    => $beritaTerbaru,
            'beritaTerpopuler' => $beritaTerpopuler
        ];
        return view('frontend/baca', $data);
    }
}
