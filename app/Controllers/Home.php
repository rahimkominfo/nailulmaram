<?php

namespace App\Controllers;

use App\Models\ProfilMasjidModel;
use App\Models\ArtikelModel;
use App\Models\GaleriModel;
use App\Models\GaleriGambarModel;
use App\Models\JadwalSholatCacheModel;
use App\Models\FlayerModel;

class Home extends BaseController
{
    public function index(): string
    {
        $profilModel = new ProfilMasjidModel();
        $artikelModel = new ArtikelModel();
        $galeriModel = new GaleriModel();
        $galeriGambarModel = new GaleriGambarModel();
        $jadwalModel = new JadwalSholatCacheModel();
        $flayerModel = new FlayerModel();

        $profil = $profilModel->first() ?: [];
        
        // Ensure timezone is correct even if server default is different
        date_default_timezone_set('Asia/Makassar');
        
        // Today's prayer times
        $today = date('Y-m-d');
        $jadwalToday = $jadwalModel->find($today);
        
        // Tomorrow's prayer times (for countdown after Isha)
        $tomorrow = date('Y-m-d', strtotime('+1 day'));
        $jadwalTomorrow = $jadwalModel->find($tomorrow);

        // Latest 5 Articles
        $beritaTerbaru = $artikelModel->select('artikel.*')
                                      ->select('(SELECT nama FROM kategori 
                                                 JOIN artikel_kategori ON artikel_kategori.kategori_id = kategori.kategori_id 
                                                 WHERE artikel_kategori.artikel_id = artikel.artikel_id LIMIT 1) as nama_kategori')
                                      ->where('status', 'Ditayangkan')
                                      ->orderBy('tanggal_publikasi', 'DESC')
                                      ->limit(5)
                                      ->findAll();

        // Latest 2 Albums with their images
        $galeriTerbaru = $galeriModel->orderBy('created_at', 'DESC')
                                    ->limit(2)
                                    ->findAll();
        
        foreach ($galeriTerbaru as &$album) {
            $album['images'] = $galeriGambarModel->where('galeri_id', $album['galeri_id'])->findAll();
        }

        // Active Flayers
        $flayers = $flayerModel->where('status', 'Aktif')
                               ->orderBy('urutan', 'ASC')
                               ->findAll();

        return view('frontend/home', [
            'title'         => 'Beranda | ' . ($profil['nama_masjid'] ?? 'Masjid Jami Nailul Maram'),
            'profil'        => $profil,
            'jadwal'        => $jadwalToday,
            'jadwalBesok'   => $jadwalTomorrow,
            'berita'        => $beritaTerbaru,
            'galeri'        => $galeriTerbaru,
            'flayers'       => $flayers,
            'hijriah'       => $this->getHijriah($jadwalToday)
        ]);
    }

    public function qurban(): string
    {
        $profilModel = new ProfilMasjidModel();
        $profil = $profilModel->first() ?: [];

        return view('frontend/qurban', [
            'title'  => 'Daftar Peserta Qurban | ' . ($profil['nama_masjid'] ?? 'Masjid Jami Nailul Maram'),
            'profil' => $profil
        ]);
    }

    private function getHijriah($jadwalToday)
    {
        if ($jadwalToday && isset($jadwalToday['h_hari'])) {
            $months = [
                'Muharram' => 'Muharram',
                'Safar' => 'Safar',
                'Rabi\' al-awwal' => 'Rabiul Awal',
                'Rabi\' al-thani' => 'Rabiul Akhir',
                'Jumada al-ula' => 'Jumadil Awal',
                'Jumada al-akhira' => 'Jumadil Akhir',
                'Rajab' => 'Rajab',
                'Sha\'ban' => 'Sya\'ban',
                'Ramadan' => 'Ramadhan',
                'Shawwal' => 'Syawal',
                'Dhu al-Qi\'dah' => 'Dzulqa\'dah',
                'Dhu al-Hijjah' => 'Dzulhijjah'
            ];
            
            $monthName = $jadwalToday['h_bulan'];
            if (isset($months[$monthName])) {
                $monthName = $months[$monthName];
            }

            return $jadwalToday['h_hari'] . ' ' . $monthName . ' ' . $jadwalToday['h_tahun'] . ' H';
        }
        return date('d M Y'); 
    }
}
