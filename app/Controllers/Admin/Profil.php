<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProfilMasjidModel;

class Profil extends BaseController
{
    public function index()
    {
        $profilModel = new ProfilMasjidModel();
        $profil = $profilModel->first() ?: [];

        return view('admin/profil', [
            'title'  => 'Profil Masjid',
            'profil' => $profil
        ]);
    }

    public function update()
    {
        $profilModel = new ProfilMasjidModel();
        $id = $this->request->getPost('profil_masjid_id');

        $data = [
            'nama_masjid'    => $this->request->getPost('nama_masjid'),
            'alamat_lengkap' => $this->request->getPost('alamat_lengkap'),
            'telepon'        => $this->request->getPost('telepon'),
            'whatsapp'       => $this->request->getPost('whatsapp'),
            'instagram'      => $this->request->getPost('instagram'),
            'youtube'        => $this->request->getPost('youtube'),
            'facebook'       => $this->request->getPost('facebook'),
            'latitude'       => $this->request->getPost('latitude'),
            'longitude'      => $this->request->getPost('longitude'),
        ];

        // If ID exists, set it for update, otherwise it will insert (save handles both)
        if (!empty($id)) {
            $data['profil_masjid_id'] = $id;
        }

        if ($profilModel->save($data)) {
            return redirect()->to('/admin/profil')->with('success', 'Profil masjid berhasil diperbarui!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui profil.');
        }
    }
}
