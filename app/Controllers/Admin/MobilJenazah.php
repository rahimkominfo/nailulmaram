<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MobilJenazahModel;

class MobilJenazah extends BaseController
{
    public function index()
    {
        $model = new MobilJenazahModel();
        $data = [
            'title' => 'Layanan Mobil Jenazah',
            'layanan' => $model->orderBy('tanggal', 'DESC')->findAll()
        ];
        return view('admin/mobil_jenazah/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Layanan Mobil Jenazah'
        ];
        return view('admin/mobil_jenazah/form', $data);
    }

    public function store()
    {
        $model = new MobilJenazahModel();

        $rules = [
            'tanggal'       => 'required|valid_date',
            'jenis_layanan' => 'required|max_length[100]',
            'nama_almarhum' => 'permit_empty|max_length[150]',
            'lokasi_penjemputan' => 'permit_empty|max_length[255]',
            'lokasi_disalatkan'  => 'permit_empty|max_length[255]',
            'lokasi_tujuan'      => 'required|max_length[255]',
            'keterangan'         => 'permit_empty',
            'status'             => 'required|in_list[draft,published,archived]',
            'foto_dokumentasi'   => 'permit_empty|max_length[255]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'tanggal'            => $this->request->getPost('tanggal'),
            'jenis_layanan'      => $this->request->getPost('jenis_layanan'),
            'nama_almarhum'      => $this->request->getPost('nama_almarhum'),
            'lokasi_penjemputan' => $this->request->getPost('lokasi_penjemputan'),
            'lokasi_disalatkan'  => $this->request->getPost('lokasi_disalatkan'),
            'lokasi_tujuan'      => $this->request->getPost('lokasi_tujuan'),
            'keterangan'         => $this->request->getPost('keterangan'),
            'status'             => $this->request->getPost('status'),
            'foto_dokumentasi'   => $this->request->getPost('foto_dokumentasi')
        ];

        if ($model->insert($data)) {
            return redirect()->to('/admin/mobil-jenazah')->with('success', 'Data layanan mobil jenazah berhasil disimpan.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data.');
        }
    }

    public function edit($id)
    {
        $model = new MobilJenazahModel();
        $layanan = $model->find($id);

        if (!$layanan) {
            return redirect()->to('/admin/mobil-jenazah')->with('error', 'Data tidak ditemukan.');
        }

        $data = [
            'title'   => 'Edit Layanan Mobil Jenazah',
            'layanan' => $layanan
        ];
        return view('admin/mobil_jenazah/form', $data);
    }

    public function update($id)
    {
        $model = new MobilJenazahModel();
        
        $rules = [
            'tanggal'       => 'required|valid_date',
            'jenis_layanan' => 'required|max_length[100]',
            'nama_almarhum' => 'permit_empty|max_length[150]',
            'lokasi_penjemputan' => 'permit_empty|max_length[255]',
            'lokasi_disalatkan'  => 'permit_empty|max_length[255]',
            'lokasi_tujuan'      => 'required|max_length[255]',
            'keterangan'         => 'permit_empty',
            'status'             => 'required|in_list[draft,published,archived]',
            'foto_dokumentasi'   => 'permit_empty|max_length[255]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'tanggal'            => $this->request->getPost('tanggal'),
            'jenis_layanan'      => $this->request->getPost('jenis_layanan'),
            'nama_almarhum'      => $this->request->getPost('nama_almarhum'),
            'lokasi_penjemputan' => $this->request->getPost('lokasi_penjemputan'),
            'lokasi_disalatkan'  => $this->request->getPost('lokasi_disalatkan'),
            'lokasi_tujuan'      => $this->request->getPost('lokasi_tujuan'),
            'keterangan'         => $this->request->getPost('keterangan'),
            'status'             => $this->request->getPost('status'),
            'foto_dokumentasi'   => $this->request->getPost('foto_dokumentasi')
        ];

        if ($model->update($id, $data)) {
            return redirect()->to('/admin/mobil-jenazah')->with('success', 'Data layanan mobil jenazah berhasil diperbarui.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data.');
        }
    }

    public function delete($id)
    {
        $model = new MobilJenazahModel();
        if ($model->delete($id)) {
            return redirect()->to('/admin/mobil-jenazah')->with('success', 'Data layanan mobil jenazah berhasil dihapus.');
        }
        return redirect()->to('/admin/mobil-jenazah')->with('error', 'Gagal menghapus data.');
    }
}
