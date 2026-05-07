<?php

namespace App\Controllers;

use App\Models\ProfilMasjidModel;

class Aduan extends BaseController
{
    public function index(): string
    {
        $profilModel = new ProfilMasjidModel();
        $profil = $profilModel->first() ?: [];

        return view('frontend/aduan/index', [
            'title'  => 'Sistem Aduan Jamaah | ' . ($profil['nama_masjid'] ?? 'Masjid Jami Nailul Maram'),
            'profil' => $profil
        ]);
    }

    public function buat(): string
    {
        $profilModel = new ProfilMasjidModel();
        $profil = $profilModel->first() ?: [];

        return view('frontend/aduan/buat', [
            'title'  => 'Sampaikan Aduan | ' . ($profil['nama_masjid'] ?? 'Masjid Jami Nailul Maram'),
            'profil' => $profil
        ]);
    }

    public function berhasil(): string
    {
        $profilModel = new ProfilMasjidModel();
        $profil = $profilModel->first() ?: [];

        return view('frontend/aduan/berhasil', [
            'title'  => 'Aduan Berhasil | ' . ($profil['nama_masjid'] ?? 'Masjid Jami Nailul Maram'),
            'profil' => $profil
        ]);
    }

    public function detail(): string
    {
        $profilModel = new ProfilMasjidModel();
        $profil = $profilModel->first() ?: [];

        return view('frontend/aduan/detail', [
            'title'  => 'Detail Aduan | ' . ($profil['nama_masjid'] ?? 'Masjid Jami Nailul Maram'),
            'profil' => $profil
        ]);
    }

    public function lacak(): string
    {
        $profilModel = new ProfilMasjidModel();
        $profil = $profilModel->first() ?: [];

        return view('frontend/aduan/lacak', [
            'title'  => 'Lacak Aduan | ' . ($profil['nama_masjid'] ?? 'Masjid Jami Nailul Maram'),
            'profil' => $profil
        ]);
    }
}
