<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        $session = session();
        if ($session->get('logged_in')) {
            return redirect()->to('/dashboard');
        }
        $this->data['title'] = "Login";

        helper(['form']);
        echo view('login', $this->data);
    }

    public function auth()
    {
        $session = session();
        $model = new UserModel($this->request);
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->where('username', $username)->first();
        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id'       => $data['id'],
                    'name'     => $data['name'],
                    'username'    => $data['username'],
                    'role'  => $data['user_role'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/dashboard')->with('success', 'Login Success!');
            } else {
                $session->setFlashdata('msg', 'Password salah!');
                return redirect()->to('/');
            }
        } else {
            $session->setFlashdata('msg', 'Pengguna tidak ditemukan!');
            return redirect()->to('/');
        }
    }

    public function register()
    {
        return view('register');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
