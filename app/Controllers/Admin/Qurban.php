<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\QurbanModel;

class Qurban extends BaseController
{
    public function index()
    {
        $qurbanModel = new QurbanModel();
        
        // Fetch all qurban times and index them by kelompok
        $qurbanData = $qurbanModel->findAll();
        $qurbanTimes = [];
        foreach ($qurbanData as $q) {
            $qurbanTimes[$q['kelompok']] = $q['waktu_pemotongan'];
        }

        $data = [
            'title'        => 'Manajemen Waktu Qurban',
            'qurbanTimes'  => $qurbanTimes,
            'max_kelompok' => 14 // Based on frontend hardcoded groups
        ];
        
        return view('admin/qurban/index', $data);
    }

    public function save()
    {
        $qurbanModel = new QurbanModel();
        $kelompok = $this->request->getPost('kelompok');
        $waktu = $this->request->getPost('waktu_pemotongan');

        if (!$kelompok || !$waktu) {
            return redirect()->back()->with('error', 'Kelompok dan Waktu harus diisi.');
        }

        $existing = $qurbanModel->where('kelompok', $kelompok)->first();

        if ($existing) {
            $qurbanModel->update($existing['qurban_id'], [
                'waktu_pemotongan' => $waktu
            ]);
        } else {
            $qurbanModel->insert([
                'kelompok' => $kelompok,
                'waktu_pemotongan' => $waktu
            ]);
        }

        return redirect()->to('/admin/qurban')->with('success', 'Waktu pemotongan Kelompok ' . $kelompok . ' berhasil disimpan.');
    }

    public function delete($kelompok)
    {
        $qurbanModel = new QurbanModel();
        $qurbanModel->where('kelompok', $kelompok)->delete();
        return redirect()->to('/admin/qurban')->with('success', 'Waktu pemotongan Kelompok ' . $kelompok . ' berhasil dihapus.');
    }
}
