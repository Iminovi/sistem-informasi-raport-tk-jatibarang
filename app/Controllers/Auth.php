<?php

namespace App\Controllers;

use App\Models\UserModel; // Jika kamu membuat model, atau gunakan query manual

class Auth extends BaseController
{
    public function index()
    {
        // Jika sudah login, langsung lempar ke dashboard
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/dashboard');
        }
        return view('auth/login');
    }

    public function proses_login()
    {
        $db = \Config\Database::connect();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Mencari user di database
        $user = $db->table('users')->where('username', $username)->get()->getRowArray();

        if ($user) {
            // Cek password (karena di database tadi kita input '123' secara polos)
            if ($password == $user['password']) {
                session()->set([
                    'isLoggedIn' => true,
                    'username'   => $user['username'],
                    'role'       => $user['role'],
                    'nama'       => $user['nama'],
                    'id_user'    => $user['id_user']
                ]);
                return redirect()->to('/dashboard');
            } else {
                return redirect()->back()->with('error', 'Password salah!');
            }
        } else {
            return redirect()->back()->with('error', 'Username tidak terdaftar!');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
