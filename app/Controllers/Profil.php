<?php

namespace App\Controllers;

use App\Models\ProfilMasjidModel;

class Profil extends BaseController
{
    public function index(): string
    {
        $profilModel = new ProfilMasjidModel();
        $profil = $profilModel->first() ?: [];

        return view('frontend/profil', [
            'title'  => 'Profil | ' . ($profil['nama_masjid'] ?? 'Masjid Jami Nailul Maram'),
            'profil' => $profil
        ]);
    }

    public function pengurus(): string
    {
        $profilModel = new ProfilMasjidModel();
        $profil = $profilModel->first() ?: [];

        return view('frontend/pengurus', [
            'title'  => 'Pengurus | ' . ($profil['nama_masjid'] ?? 'Masjid Jami Nailul Maram'),
            'profil' => $profil
        ]);
    }
}
