<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AduanModel;
use App\Models\AduanTujuanModel;

class Aduan extends BaseController
{
    protected $aduanModel;
    protected $aduanTujuanModel;

    public function __construct()
    {
        $this->aduanModel = new AduanModel();
        $this->aduanTujuanModel = new AduanTujuanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Aduan',
            'aduan' => $this->aduanModel->getAduanWithPengurus(),
            'tujuan_list' => $this->aduanTujuanModel->findAll()
        ];
        return view('admin/aduan/index', $data);
    }

    public function detail($id = null)
    {
        if ($id === null) {
            return redirect()->to('admin/aduan');
        }

        $aduan = $this->aduanModel->getAduanWithPengurus($id);

        if (!$aduan) {
            return redirect()->to('admin/aduan')->with('error', 'Aduan tidak ditemukan');
        }

        $data = [
            'title' => 'Detail Aduan',
            'aduan' => $aduan,
            'tujuan_list' => $this->aduanTujuanModel->getWithPengurus()
        ];
        return view('admin/aduan/detail', $data);
    }

    /**
     * Update aduan response and status
     */
    public function updateResponse()
    {
        $aduanId = $this->request->getPost('aduan_id');
        $status = $this->request->getPost('status_aduan');
        $tanggapan = $this->request->getPost('tanggapan_pengurus');

        if (!$aduanId) {
            return redirect()->back()->with('error', 'ID Aduan tidak valid');
        }

        $data = [
            'status_aduan' => $status,
            'tanggapan_pengurus' => $tanggapan
        ];

        if ($this->aduanModel->update($aduanId, $data)) {
            return redirect()->to('admin/aduan')->with('success', 'Aduan berhasil diperbarui');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui aduan');
        }
    }

    /**
     * Forward aduan to another department
     */
    public function forward()
    {
        $aduanId = $this->request->getPost('aduan_id');
        $tujuanId = $this->request->getPost('aduan_tujuan_id');

        if (!$aduanId || !$tujuanId) {
            return redirect()->back()->with('error', 'Data tidak lengkap');
        }

        $data = [
            'aduan_tujuan_id' => $tujuanId,
            'status_aduan' => 'Diteruskan' // Otomatis ubah status saat diteruskan
        ];

        if ($this->aduanModel->update($aduanId, $data)) {
            return redirect()->to('admin/aduan')->with('success', 'Aduan berhasil diteruskan ke bidang terkait');
        } else {
            return redirect()->back()->with('error', 'Gagal meneruskan aduan');
        }
    }

    /**
     * Real-time search and filter using AJAX/Fetch API
     */
    public function search()
    {
        if (!$this->request->isAJAX()) {
            return redirect()->to('admin/aduan');
        }

        $keyword = $this->request->getGet('keyword') ?? '';
        $status = $this->request->getGet('status') ?? '';
        $bidang = $this->request->getGet('bidang') ?? '';

        $results = $this->aduanModel->searchAduan($keyword, $status, $bidang);

        // Format dates and ensure clean output
        foreach ($results as &$item) {
            $item['waktu_dibuat_formatted'] = date('d M Y', strtotime($item['waktu_dibuat']));
            $item['initials'] = $item['nama_pengirim'] ? strtoupper(substr($item['nama_pengirim'], 0, 2)) : 'AN';
            $item['detail_url'] = base_url('admin/aduan/detail/' . $item['aduan_id']);
        }

        return $this->response->setJSON([
            'status' => 'success',
            'data' => $results,
            'count' => count($results)
        ]);
    }
}
