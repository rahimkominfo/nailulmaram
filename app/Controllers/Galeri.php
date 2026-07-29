<?php

namespace App\Controllers;

use App\Models\GaleriModel;
use App\Models\GaleriGambarModel;
use App\Models\ProfilMasjidModel;

class Galeri extends BaseController
{
    public function index()
    {
        $galeriModel = new GaleriModel();
        $galeriGambarModel = new GaleriGambarModel();
        $profilModel = new ProfilMasjidModel();
        
        $galeri = $galeriModel->orderBy('created_at', 'DESC')->findAll();
        
        foreach ($galeri as &$album) {
            $album['images'] = $galeriGambarModel->where('galeri_id', $album['galeri_id'])->findAll();
        }

        $data = [
            'title'         => 'Galeri Kegiatan | Masjid Jami Nailul Maram',
            'meta_keywords' => ['nailul', 'maram', 'nailul maram', 'masjid nailul maram', 'galeri nailul maram', 'foto kegiatan nailul maram', 'album foto masjid', 'dokumentasi nailul maram'],
            'profil'        => $profilModel->first(),
            'galeri'        => $galeri
        ];
        return view('frontend/galeri', $data);
    }

    public function album($id)
    {
        $galeriModel = new GaleriModel();
        $galeriGambarModel = new GaleriGambarModel();
        $profilModel = new ProfilMasjidModel();
        
        $album = $galeriModel->find($id);
        if (!$album) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title'         => $album['judul'] . ' | Galeri Masjid Jami Nailul Maram',
            'meta_description' => $album['deskripsi'] ?? ('Album Dokumentasi Kegiatan ' . $album['judul'] . ' - Masjid Jami Nailul Maram'),
            'meta_keywords' => ['nailul', 'maram', 'nailul maram', 'masjid nailul maram', strtolower($album['judul']), 'album galeri nailul maram', 'foto kegiatan nailul maram'],
            'profil'        => $profilModel->first(),
            'album'         => $album,
            'gambar'        => $galeriGambarModel->where('galeri_id', $id)->findAll()
        ];
        return view('frontend/album', $data);
    }
}
