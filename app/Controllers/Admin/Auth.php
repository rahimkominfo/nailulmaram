<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PenulisModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('logged_in')) {
            return redirect()->to('/admin/dashboard');
        }
        return view('admin/login');
        // echo password_hash('admin123', PASSWORD_DEFAULT);
    }

    public function attemptLogin()
    {
        $penulisModel = new PenulisModel();
        
        $login = $this->request->getPost('login');
        $password = $this->request->getPost('password');

        $user = $penulisModel->where('username', $login)
                             ->orWhere('email', $login)
                             ->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $sessionData = [
                    'penulis_id' => $user['penulis_id'],
                    'username'   => $user['username'],
                    'nama'       => $user['nama_publik'],
                    'peran'      => $user['peran'],
                    'logged_in'  => true,
                ];
                session()->set($sessionData);
                return redirect()->to('/admin/dashboard');
            } else {
                return redirect()->back()->withInput()->with('error', 'Password salah.');
            }
        } else {
            return redirect()->back()->withInput()->with('error', 'Username atau Email tidak ditemukan.');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/admin/login');
    }
}
