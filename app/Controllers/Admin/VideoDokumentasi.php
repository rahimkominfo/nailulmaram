<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\VideoDokumentasiModel;
use CodeIgniter\HTTP\ResponseInterface;

class VideoDokumentasi extends BaseController
{
    protected $videoModel;

    public function __construct()
    {
        $this->videoModel = new VideoDokumentasiModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Kelola Video Dokumentasi',
            'videos' => $this->videoModel->orderBy('urutan', 'ASC')->orderBy('created_at', 'DESC')->findAll(),
        ];
        return view('admin/video_dokumentasi/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Video Dokumentasi'
        ];
        return view('admin/video_dokumentasi/tambah', $data);
    }

    public function store()
    {
        $rules = [
            'judul' => 'required',
            'url_youtube' => 'required',
            'status' => 'required|in_list[Aktif,Tidak Aktif]',
            'urutan' => 'permit_empty|integer'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->videoModel->save([
            'judul' => $this->request->getPost('judul'),
            'url_youtube' => $this->request->getPost('url_youtube'),
            'status' => $this->request->getPost('status'),
            'urutan' => $this->request->getPost('urutan') ?: 0,
        ]);

        return redirect()->to('/admin/video-dokumentasi')->with('success', 'Video berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $video = $this->videoModel->find($id);
        if (!$video) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title' => 'Edit Video Dokumentasi',
            'video' => $video
        ];
        return view('admin/video_dokumentasi/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'judul' => 'required',
            'url_youtube' => 'required',
            'status' => 'required|in_list[Aktif,Tidak Aktif]',
            'urutan' => 'permit_empty|integer'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->videoModel->update($id, [
            'judul' => $this->request->getPost('judul'),
            'url_youtube' => $this->request->getPost('url_youtube'),
            'status' => $this->request->getPost('status'),
            'urutan' => $this->request->getPost('urutan') ?: 0,
        ]);

        return redirect()->to('/admin/video-dokumentasi')->with('success', 'Video berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->videoModel->delete($id);
        return redirect()->to('/admin/video-dokumentasi')->with('success', 'Video berhasil dihapus.');
    }
}
