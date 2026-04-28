<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MediaModel;

class Media extends BaseController
{
    public function index()
    {
        $mediaModel = new MediaModel();
        
        $data = [
            'title' => 'Media Manager',
            'media' => $mediaModel->orderBy('created_at', 'DESC')->findAll()
        ];
        return view('admin/media/index', $data);
    }

    public function store()
    {
        $mediaModel = new MediaModel();
        $files = $this->request->getFiles();

        if (isset($files['files'])) {
            foreach ($files['files'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName();
                    $type = $file->getMimeType();
                    
                    $file->move('uploads/media', $newName);

                    $mediaModel->insert([
                        'nama_file'  => $file->getClientName(),
                        'url_file'   => $newName,
                        'tipe_file'  => $type,
                        'caption'    => $this->request->getPost('caption'),
                        'penulis_id' => session()->get('penulis_id')
                    ]);
                }
            }
            return redirect()->to('/admin/media')->with('success', 'File berhasil diunggah.');
        }

        return redirect()->back()->with('error', 'Tidak ada file yang dipilih.');
    }

    public function delete($id)
    {
        $mediaModel = new MediaModel();
        $media = $mediaModel->find($id);

        if ($media) {
            $filePath = 'uploads/media/' . $media['url_file'];
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $mediaModel->delete($id);
            return redirect()->to('/admin/media')->with('success', 'File berhasil dihapus.');
        }

        return redirect()->to('/admin/media')->with('error', 'File tidak ditemukan.');
    }
}
