<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\RunningTextModel;

class RunningText extends BaseController
{
    protected $runningTextModel;

    public function __construct()
    {
        $this->runningTextModel = new RunningTextModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Kelola Running Text',
            'texts' => $this->runningTextModel->orderBy('urutan', 'ASC')->findAll()
        ];
        return view('admin/running_text/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Running Text'
        ];
        return view('admin/running_text/tambah', $data);
    }

    public function store()
    {
        $rules = [
            'teks' => 'required',
            'tautan' => 'permit_empty|valid_url',
            'status' => 'required|in_list[Aktif,Tidak Aktif]',
            'urutan' => 'permit_empty|integer'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->runningTextModel->save([
            'teks' => $this->request->getPost('teks'),
            'tautan' => $this->request->getPost('tautan') ?: null,
            'status' => $this->request->getPost('status'),
            'urutan' => $this->request->getPost('urutan') ?: 0,
        ]);

        return redirect()->to('admin/running-text')->with('success', 'Running text berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $text = $this->runningTextModel->find($id);
        if (!$text) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title' => 'Edit Running Text',
            'text'  => $text
        ];
        return view('admin/running_text/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'teks' => 'required',
            'tautan' => 'permit_empty|valid_url',
            'status' => 'required|in_list[Aktif,Tidak Aktif]',
            'urutan' => 'permit_empty|integer'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->runningTextModel->update($id, [
            'teks' => $this->request->getPost('teks'),
            'tautan' => $this->request->getPost('tautan') ?: null,
            'status' => $this->request->getPost('status'),
            'urutan' => $this->request->getPost('urutan') ?: 0,
        ]);

        return redirect()->to('admin/running-text')->with('success', 'Running text berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->runningTextModel->delete($id);
        return redirect()->to('admin/running-text')->with('success', 'Running text berhasil dihapus.');
    }
}
