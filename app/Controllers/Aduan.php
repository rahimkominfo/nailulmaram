<?php

namespace App\Controllers;

use App\Models\ProfilMasjidModel;
use App\Models\AduanTujuanModel;
use App\Models\AduanModel;

class Aduan extends BaseController
{
    public function index(): string
    {
        $profilModel = new ProfilMasjidModel();
        $aduanTujuanModel = new AduanTujuanModel();
        $aduanModel = new AduanModel();
        
        $profil = $profilModel->first() ?: [];
        $tujuan = $aduanTujuanModel->getWithPengurus();
        $stats = $aduanModel->getStats();

        return view('frontend/aduan/index', [
            'title'  => 'Sistem Aduan Jamaah | ' . ($profil['nama_masjid'] ?? 'Masjid Jami Nailul Maram'),
            'profil' => $profil,
            'tujuan' => $tujuan,
            'stats'  => $stats
        ]);
    }

    public function buat(): string
    {
        $profilModel = new ProfilMasjidModel();
        $aduanTujuanModel = new AduanTujuanModel();
        
        $profil = $profilModel->first() ?: [];
        $tujuan = $aduanTujuanModel->getWithPengurus();

        return view('frontend/aduan/buat', [
            'title'  => 'Sampaikan Aduan | ' . ($profil['nama_masjid'] ?? 'Masjid Jami Nailul Maram'),
            'profil' => $profil,
            'tujuan' => $tujuan
        ]);
    }

    public function simpan()
    {
        if (!$this->request->is('post')) {
            return $this->response->setStatusCode(405)->setJSON(['message' => 'Method Not Allowed']);
        }

        $validation = \Config\Services::validation();
        $rules = [
            'aduan_tujuan_id' => 'required|is_not_unique[aduan_tujuan.aduan_tujuan_id]',
            'judul_aduan'     => 'required|min_length[5]|max_length[255]',
            'isi_aduan'       => 'required|min_length[10]',
            'kontak_pengirim' => 'required|min_length[5]',
            'lampiran_file'   => 'permit_empty|uploaded[lampiran_file]|max_size[lampiran_file,2048]|is_image[lampiran_file]|mime_in[lampiran_file,image/jpg,image/jpeg,image/png]',
        ];

        // Jika tidak anonim, nama wajib diisi
        if ($this->request->getPost('privacy') !== 'anonymous') {
            $rules['nama_pengirim'] = 'required|min_length[3]|max_length[100]';
        }

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $validation->getErrors()
            ]);
        }

        $aduanModel = new AduanModel();
        
        // Generate Kode Tiket
        $date = date('Ymd');
        $lastTicket = $aduanModel->like('kode_tiket', "ADU-$date-")->orderBy('waktu_dibuat', 'DESC')->first();
        $lastNumber = 0;
        if ($lastTicket) {
            $parts = explode('-', $lastTicket['kode_tiket']);
            $lastNumber = (int) end($parts);
        }
        $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        $kodeTiket = "ADU-$date-$newNumber";

        $data = [
            'kode_tiket'      => $kodeTiket,
            'nama_pengirim'   => ($this->request->getPost('privacy') === 'anonymous') ? 'Anonim' : $this->request->getPost('nama_pengirim'),
            'kontak_pengirim' => $this->request->getPost('kontak_pengirim'),
            'aduan_tujuan_id' => $this->request->getPost('aduan_tujuan_id'),
            'judul_aduan'     => $this->request->getPost('judul_aduan'),
            'isi_aduan'       => $this->request->getPost('isi_aduan'),
            'status_aduan'    => 'Masuk'
        ];

        // Handle File Upload
        $file = $this->request->getFile('lampiran_file');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/aduan', $newName);
            $data['lampiran_file'] = $newName;
        }

        if ($aduanModel->save($data)) {
            session()->setFlashdata('kode_tiket', $kodeTiket);
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Aduan berhasil dikirim',
                'kode_tiket' => $kodeTiket,
                'redirect' => base_url('aduan/berhasil')
            ]);
        }

        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Gagal menyimpan aduan'
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
        $ticket = $this->request->getGet('ticket');
        if (!$ticket) {
            return redirect()->to(base_url('aduan/lacak'));
        }

        $profilModel = new ProfilMasjidModel();
        $aduanModel = new AduanModel();
        
        $profil = $profilModel->first() ?: [];
        $aduan = $aduanModel->getByTicket($ticket);

        if (!$aduan) {
            session()->setFlashdata('error', 'Kode tiket tidak ditemukan. Silakan periksa kembali.');
            return redirect()->to(base_url('aduan/lacak'));
        }

        return view('frontend/aduan/detail', [
            'title'  => 'Detail Aduan ' . $ticket . ' | ' . ($profil['nama_masjid'] ?? 'Masjid Jami Nailul Maram'),
            'profil' => $profil,
            'aduan'  => $aduan
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
