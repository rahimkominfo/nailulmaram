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

        $pengurusModel = new \App\Models\PengurusModel();
        $pengurus = $pengurusModel->select('pengurus.*, pengurus_bidang.nama_bidang, pengurus_bidang.ikon, pengurus_sub_bidang.nama_sub_bidang')
            ->join('pengurus_bidang', 'pengurus_bidang.bidang_id = pengurus.bidang_id', 'left')
            ->join('pengurus_sub_bidang', 'pengurus_sub_bidang.sub_bidang_id = pengurus.sub_bidang_id', 'left')
            ->orderBy('pengurus_bidang.urutan', 'ASC')
            ->findAll();

        return view('frontend/pengurus', [
            'title'    => 'Pengurus | ' . ($profil['nama_masjid'] ?? 'Masjid Jami Nailul Maram'),
            'profil'   => $profil,
            'pengurus' => $pengurus
        ]);
    }
}
