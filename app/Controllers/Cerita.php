<?php

namespace App\Controllers;

use App\Models\ProfilMasjidModel;

class Cerita extends BaseController
{
    public function index(): string
    {
        $profilModel = new ProfilMasjidModel();
        $profil = $profilModel->first() ?: [];

        return view('frontend/cerita-inspiratif', [
            'title'  => 'Panglima Masjid: Langkah Cahaya Abduh | ' . ($profil['nama_masjid'] ?? 'Masjid Jami Nailul Maram'),
            'profil' => $profil
        ]);
    }
}
