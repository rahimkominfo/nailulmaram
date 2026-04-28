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
            'title'  => 'Galeri Kegiatan | Masjid Jami Nailul Maram',
            'profil' => $profilModel->first(),
            'galeri' => $galeri
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
            'title'  => $album['judul'] . ' | Galeri Masjid Jami',
            'profil' => $profilModel->first(),
            'album'  => $album,
            'gambar' => $galeriGambarModel->where('galeri_id', $id)->findAll()
        ];
        return view('frontend/album', $data);
    }
}
