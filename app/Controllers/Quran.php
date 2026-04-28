<?php

namespace App\Controllers;

use App\Models\ProfilMasjidModel;
use App\Models\QuranSurahModel;
use App\Models\QuranAyatModel;

class Quran extends BaseController
{
    public function index($surahNumber = 1)
    {
        $profilModel = new ProfilMasjidModel();
        $surahModel = new QuranSurahModel();
        $ayatModel = new QuranAyatModel();
        
        $profil = $profilModel->first() ?: [];

        // 1. Get Surah List (Exclusively from DB)
        $surahList = $surahModel->orderBy('nomor', 'ASC')->findAll();

        // 2. Get Current Surah Details (Exclusively from DB)
        $currentSurah = $surahModel->find($surahNumber);
        
        // 3. Get Ayahs (Exclusively from DB)
        $ayahs = $ayatModel->where('surah_nomor', $surahNumber)
                           ->orderBy('nomor_ayat', 'ASC')
                           ->findAll();

        return view('frontend/quran', [
            'title'         => 'Al-Qur\'an Digital | ' . ($profil['nama_masjid'] ?? 'Masjid Jami Nailul Maram'),
            'profil'        => $profil,
            'surahList'     => $surahList,
            'currentSurah'  => $currentSurah,
            'ayahs'         => $ayahs,
            'selectedSurah' => $surahNumber
        ]);
    }

    public function surah($number)
    {
        return $this->index($number);
    }
}
