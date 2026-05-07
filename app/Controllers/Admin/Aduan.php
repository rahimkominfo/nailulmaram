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
}
