<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\JadwalSholatCacheModel;
use App\Models\ProfilMasjidModel;

class Jadwal extends BaseController
{
    public function index()
    {
        $jadwalModel = new JadwalSholatCacheModel();
        
        // Ambil data untuk bulan ini
        $bulanIni = date('m');
        $tahunIni = date('Y');
        
        $data = [
            'title'  => 'Jadwal Sholat',
            'jadwal' => $jadwalModel->where('MONTH(tanggal)', $bulanIni)
                                   ->where('YEAR(tanggal)', $tahunIni)
                                   ->orderBy('tanggal', 'ASC')
                                   ->findAll()
        ];
        return view('admin/jadwal/index', $data);
    }

    public function sync()
    {
        $jadwalModel = new JadwalSholatCacheModel();
        $profilModel = new ProfilMasjidModel();
        $profil = $profilModel->first() ?: [];

        // Gunakan koordinat dari profil masjid, default ke Bone jika tidak ada
        $lat = $profil['latitude'] ?? '-5.1246';
        $lng = $profil['longitude'] ?? '120.2530';
        $tahun = date('Y');
        $bulan = date('m');

        // Menggunakan API Aladhan Calendar (sebulan penuh)
        // Format: https://api.aladhan.com/v1/calendar/YYYY/MM?latitude=...&longitude=...&method=11
        $url = "https://api.aladhan.com/v1/calendar/{$tahun}/{$bulan}?latitude={$lat}&longitude={$lng}&method=11";
        
        try {
            $client = \Config\Services::curlrequest();
            $response = $client->get($url);
            $result = json_decode($response->getBody(), true);

            if (isset($result['status']) && $result['status'] === 'OK') {
                foreach ($result['data'] as $day) {
                    $tanggal = $day['date']['gregorian']['date']; // format dd-mm-yyyy
                    // Ubah ke format yyyy-mm-dd untuk DB
                    $dbDate = date('Y-m-d', strtotime($tanggal));
                    
                    $timings = $day['timings'];
                    
                    // Bersihkan string waktu (hilangkan timezone (WITA), misal "18:21 (WITA)" -> "18:21")
                    $cleanTime = function($time) {
                        return explode(' ', $time)[0];
                    };

                    $dataJadwal = [
                        'tanggal' => $dbDate,
                        'imsak'   => $cleanTime($timings['Imsak']),
                        'subuh'   => $cleanTime($timings['Fajr']),
                        'terbit'  => $cleanTime($timings['Sunrise']),
                        'dzuhur'  => $cleanTime($timings['Dhuhr']),
                        'ashar'   => $cleanTime($timings['Asr']),
                        'maghrib' => $cleanTime($timings['Maghrib']),
                        'isya'    => $cleanTime($timings['Isha']),
                        'h_hari'  => $day['date']['hijri']['day'],
                        'h_bulan' => $day['date']['hijri']['month']['en'],
                        'h_tahun' => $day['date']['hijri']['year'],
                    ];

                    // Simpan atau Update
                    if ($jadwalModel->find($dbDate)) {
                        $jadwalModel->update($dbDate, $dataJadwal);
                    } else {
                        $jadwalModel->insert($dataJadwal);
                    }
                }
                return redirect()->to('/admin/jadwal')->with('success', 'Jadwal sholat berhasil disinkronkan dari Aladhan API.');
            } else {
                return redirect()->to('/admin/jadwal')->with('error', 'Gagal mengambil data dari API: ' . ($result['data'] ?? 'Unknown Error'));
            }
        } catch (\Exception $e) {
            return redirect()->to('/admin/jadwal')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit($tanggal)
    {
        $jadwalModel = new JadwalSholatCacheModel();
        $jadwal = $jadwalModel->find($tanggal);

        if (!$jadwal) {
            return redirect()->to('/admin/jadwal')->with('error', 'Data tidak ditemukan.');
        }

        $data = [
            'title'  => 'Edit Jadwal Sholat',
            'jadwal' => $jadwal
        ];
        return view('admin/jadwal/edit', $data);
    }

    public function update($tanggal)
    {
        $jadwalModel = new JadwalSholatCacheModel();
        
        $data = [
            'imsak'   => $this->request->getPost('imsak'),
            'subuh'   => $this->request->getPost('subuh'),
            'terbit'  => $this->request->getPost('terbit'),
            'dzuhur'  => $this->request->getPost('dzuhur'),
            'ashar'   => $this->request->getPost('ashar'),
            'maghrib' => $this->request->getPost('maghrib'),
            'isya'    => $this->request->getPost('isya'),
        ];

        if ($jadwalModel->update($tanggal, $data)) {
            return redirect()->to('/admin/jadwal')->with('success', 'Jadwal sholat berhasil diperbarui.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui jadwal sholat.');
        }
    }
}
