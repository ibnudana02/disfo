<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index()
    {
        $this->data['title'] = 'Daftar User';
        $this->data['role'] = $this->role_m->findAll();

        echo view('users/list', $this->data);
    }

    public function create()
    {
        $this->data['title'] = 'Registrasi User';
        $this->data['role'] = $this->role_m->findAll();

        echo view('users/create', $this->data);
    }

    public function list()
    {
        if ($this->request->getMethod(true) === 'POST') {
            $lists = $this->user_m->getDatatables();

            $data = [];
            $no = $this->request->getVar('start');

            foreach ($lists as $key => $list) {
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->name;
                $row[] = $list->username;
                $row[] = $list->email;
                $row[] = $list->role;
                $row[] = '<div class="btn-group" role="group" aria-label="Basic example">
                            <a href="javascript:void(0);" class="btn btn-sm btn-primary btn-edit" data="' . $list->id . '"><i class="fas fa-pencil-alt"></i></a>
                            <a href="javascript:void(0);" class="btn btn-sm btn-danger btn-hapus" data="' . $list->id . '"><i class="fas fa-trash"></i></i></a>
                        </div>';
                $data[] = $row;
            }
            $output = [
                'draw' => $this->request->getPost('draw'),
                'recordsTotal' => $this->user_m->countAll(),
                'recordsFiltered' => $this->user_m->countFiltered(),
                'data' => $data
            ];

            echo json_encode($output);
        }
    }

    public function detail()
    {
        $id = $this->request->getVar('id');
        $data = $this->user_m->find($id);

        if (!$data) {
            $response = ['status' => false, 'desc' => 'Data user tidak ditemukan!', 'icon' => 'warning', 'title' => 'Warning'];
        } else {
            $response = ['status' => true, 'data' => $data];
        }

        echo json_encode($response);
    }

    public function save()
    {
        $this->validation->setRules([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|valid_email',
            'user_role' => 'required',
        ]);

        if ($this->validation->withRequest($this->request)->run()) {
            $post = $this->request->getVar();
            $object = [
                'name' => strtoupper($post['name']),
                'username' => $post['username'],
                'user_role' => $post['user_role'],
                'email' => $post['email'],
                'password' => password_hash(strtolower($post['username']), PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s')
            ];
            $insert = $this->user_m->insert($object, false);
            if ($insert) {
                return redirect()->to('/users')->with('success', 'Registrasi user berhasil!');
            }
        } else {
            $errors = array_values($this->validation->getErrors());
            $error = '';
            for ($i = 0; $i < count($errors); $i++) {
                $error .= $errors[$i] . "</br>";
            }
            return redirect()->back()->withInput()->with('error', $error);
        }
    }

    public function delete()
    {
        $id = $this->request->getVar('id');
        $data = $this->user_m->find($id);

        if ($data) {
            $this->user_m->delete($id);
            $response = ['icon' => 'success', 'title' => 'Success', 'desc' => 'Hapus Data User berhasil!'];
        } else {
            $response = ['icon' => 'error', 'title' => 'Error', 'desc' => 'Data User tidak ditemukan!'];
        }
        echo json_encode($response);
    }

    public function update()
    {
        $this->validation->setRules([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|valid_email',
            'user_role' => 'required',
        ]);
        if ($this->validation->withRequest($this->request)->run()) {
            $post = $this->request->getVar();

            $object = [
                'name' => strtoupper($post['name']),
                'username' => $post['username'],
                'user_role' => $post['user_role'],
                'email' => $post['email'],
                'created_at' => date('Y-m-d H:i:s')
            ];

            $insert = $this->user_m->update($post['id'], $object);
            if ($insert) {
                return redirect()->to('/users')->with('success', 'Update data user berhasil!');
            }
        } else {
            $errors = array_values($this->validation->getErrors());
            $error = '';
            for ($i = 0; $i < count($errors); $i++) {
                $error .= $errors[$i] . "</br>";
            }
            return redirect()->back()->withInput()->with('error', $error);
        }
    }

    public function profil()
    {
        $this->data['title'] = 'My Profil';
        $username = $this->session->username;
        $this->data['role'] = $this->role_m->findAll();
        // $this->data['myProfil'] = (object) $this->user_m->join('kategori_user r', 'users.user_role=r.id')->where('username', $username)->first();
        $builder = $this->user_m->builder();
        $this->data['myProfil'] = $builder->select('users.id, name, username, email, r.role, image, no_hp, nik, tp_lahir, tgl_lahir, alamat, created_at')->join('kategori_user r', 'users.user_role=r.id')->where('username', $username)->get()->getRow();
        echo view('users/profil', $this->data);
    }

    public function profilUpdate()
    {
        $id = $this->request->getVar('id');
        $this->validation->setRules([
            'name' => 'required',
            'nik' => 'trim',
            'tp_lahir' => 'trim',
            'tgl_lahir' => 'trim',
            'email' => 'required|valid_email',
            'alamat' => 'trim',
        ]);
        if ($this->validation->withRequest($this->request)->run()) {
            $fileImage_name = $this->request->getVar('old_image');
            if (isset($_FILES) && @$_FILES['image']['error'] != '4') {
                if ($fileImage = $this->request->getFile('image')) {
                    if (!$fileImage->isValid()) {
                        throw new \RuntimeException($fileImage->getErrorString() . '(' . $fileImage->getError() . ')');
                    } else {
                        $fileImage_name = $fileImage->getRandomName();
                        $fileImage->move('uploads/user', $fileImage_name);
                    }
                }
            }
            $post = $this->request->getVar();

            $data = [
                'email'  => strtolower($post['email']),
                'name'  => strtoupper($post['name']),
                'nik' => $post['nik'],
                'no_hp' => $post['no_hp'],
                'tp_lahir' => strtoupper($post['tp_lahir']),
                'tgl_lahir' => $post['tgl_lahir'],
                'alamat' => strtoupper($post['alamat']),
                'image' => $fileImage_name,
            ];

            $update = $this->user_m->update($id, $data);
            if ($update) {
                return redirect()->to(base_url('profil'))->with('success', 'Update profil berhasil!');
            } else {
                return redirect()->to(base_url('profil'))->with('error', 'Update profil gagal!');
            }
        } else {
            $errors = array_values($this->validation->getErrors());
            $error = '';
            for ($i = 0; $i < count($errors); $i++) {
                $error .= $errors[$i] . "</br>";
            }
            return redirect()->to(base_url('/profil'))->with('error', $error);
        }
    }
}
