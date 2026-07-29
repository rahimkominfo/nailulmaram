<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MobilJenazahModel;
use App\Models\ProfilMasjidModel;

class MobilJenazah extends BaseController
{
    public function index()
    {
        $profilModel = new ProfilMasjidModel();
        $profil = $profilModel->first() ?: [];

        $data = [
            'title'         => 'Form Layanan Mobil Jenazah | ' . ($profil['nama_masjid'] ?? 'Masjid Jami Nailul Maram'),
            'meta_description' => 'Layanan Mobil Jenazah Masjid Jami Nailul Maram - Pengantaran ke Pemakaman dan Pelayanan Kemanusiaan Jamaah',
            'meta_keywords' => ['nailul', 'maram', 'nailul maram', 'masjid nailul maram', 'mobil jenazah nailul maram', 'layanan ambulans nailul maram', 'layanan jenazah masjid'],
            'profil'        => $profil
        ];
        return view('frontend/mobil_jenazah_form', $data);
    }

    public function simpan()
    {
        $model = new MobilJenazahModel();

        // Validasi input dasar
        $rules = [
            'tanggal'            => 'required|valid_date',
            'jenis_layanan'      => 'required',
            'nama_almarhum'      => 'required|min_length[3]',
            'lokasi_tujuan'      => 'required',
        ];

        // Validasi foto hanya jika ada file yang diunggah
        $fileFoto = $this->request->getFile('foto_dokumentasi');
        if ($fileFoto && $fileFoto->isValid()) {
            $rules['foto_dokumentasi'] = 'max_size[foto_dokumentasi,8192]|is_image[foto_dokumentasi]';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Handle Upload Foto jika ada
        $fotoUrl = null;
        if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('uploads/mobil_jenazah', $namaFoto);
            $fotoUrl = base_url('uploads/mobil_jenazah/' . $namaFoto);
        }

        $data = [
            'tanggal'            => $this->request->getPost('tanggal'),
            'jenis_layanan'      => $this->request->getPost('jenis_layanan'),
            'nama_almarhum'      => $this->request->getPost('nama_almarhum'),
            'lokasi_penjemputan' => $this->request->getPost('lokasi_penjemputan'),
            'lokasi_disalatkan'  => $this->request->getPost('lokasi_disalatkan'),
            'lokasi_tujuan'      => $this->request->getPost('lokasi_tujuan'),
            'keterangan'         => $this->request->getPost('keterangan'),
            'foto_dokumentasi'   => $fotoUrl,
            'status'             => 'draft' // Default draft untuk verifikasi admin
        ];

        if ($model->insert($data)) {
            return redirect()->to('/mobil-jenazah/berhasil')->with('success', 'Data berhasil dikirim.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data.');
        }
    }

    public function berhasil()
    {
        $profilModel = new ProfilMasjidModel();
        $profil = $profilModel->first() ?: [];

        $data = [
            'title'         => 'Laporan Mobil Jenazah Berhasil | ' . ($profil['nama_masjid'] ?? 'Masjid Jami Nailul Maram'),
            'meta_keywords' => ['nailul', 'maram', 'nailul maram', 'masjid nailul maram', 'mobil jenazah nailul maram'],
            'profil'        => $profil
        ];
        return view('frontend/mobil_jenazah_berhasil', $data);
    }
}
