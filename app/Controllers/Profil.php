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
            'title'         => 'Profil & Sejarah | ' . ($profil['nama_masjid'] ?? 'Masjid Jami Nailul Maram'),
            'meta_description' => 'Profil dan Sejarah Singkat Masjid Jami Nailul Maram - Pusat Kegiatan Keagamaan dan Dakwah Jamaah',
            'meta_keywords' => ['nailul', 'maram', 'nailul maram', 'masjid nailul maram', 'profil nailul maram', 'sejarah nailul maram', 'visi misi nailul maram', 'profil masjid'],
            'profil'        => $profil
        ]);
    }

    public function pengurus(): string
    {
        $profilModel = new ProfilMasjidModel();
        $profil = $profilModel->first() ?: [];

        $pengurusModel = new \App\Models\PengurusModel();
        $pengurus = $pengurusModel->select('pengurus.*, pengurus_bidang.nama_bidang, pengurus_bidang.ikon, pengurus_sub_bidang.nama_sub_bidang')
            ->join('pengurus_bidang', 'pengurus_bidang.bidang_id = pengurus.bidang_id', 'left')
            ->join('pengurus_sub_bidang', 'pengurus_sub_bidang.sub_bidang_id = pengurus.sub_bidang_id', 'left')
            ->orderBy('pengurus_bidang.urutan', 'ASC')
            ->findAll();

        return view('frontend/pengurus', [
            'title'         => 'Pengurus Masjid | ' . ($profil['nama_masjid'] ?? 'Masjid Jami Nailul Maram'),
            'meta_description' => 'Struktur Pengurus & Takmir Masjid Jami Nailul Maram',
            'meta_keywords' => ['nailul', 'maram', 'nailul maram', 'masjid nailul maram', 'pengurus nailul maram', 'takmir nailul maram', 'pengurus masjid nailul maram', 'struktur pengurus'],
            'profil'        => $profil,
            'pengurus'      => $pengurus
        ]);
    }
}
