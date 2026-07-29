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

        $surahLatin = $currentSurah['nama_latin'] ?? '';
        $surahArti  = $currentSurah['arti'] ?? '';

        return view('frontend/quran', [
            'title'         => 'Al-Qur\'an Digital - Surah ' . ($surahLatin ? $surahLatin : '1') . ' | ' . ($profil['nama_masjid'] ?? 'Masjid Jami Nailul Maram'),
            'meta_description' => 'Al-Qur\'an Digital Online Masjid Jami Nailul Maram - Surah ' . $surahLatin . ' (' . $surahArti . ') lengkap dengan teks Arab dan terjemahan Indonesia.',
            'meta_keywords' => ['nailul', 'maram', 'nailul maram', 'masjid nailul maram', 'al quran nailul maram', 'quran digital nailul maram', strtolower($surahLatin), 'surah ' . strtolower($surahLatin), 'baca quran online'],
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
