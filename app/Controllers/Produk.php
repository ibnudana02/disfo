<?php

namespace App\Controllers;

class Produk extends BaseController
{
    public function index()
    {
        $this->data['title'] = 'Daftar Produk';
        echo view('produk/list', $this->data);
    }

    public function create()
    {
        $this->data['title'] = 'Registrasi Produk';
        echo view('produk/create', $this->data);
    }

    public function list()
    {
        if ($this->request->getMethod(true) === 'POST') {
            $lists = $this->produk_m->getDatatables();

            $data = [];
            $no = $this->request->getVar('start');

            foreach ($lists as $key => $list) {
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->kdprd;
                $row[] = $list->produk;
                $row[] = ($list->bagihasil) ? "Ya" : "Tidak";
                $row[] = '<div class="btn-group" role="group" aria-label="Basic example">
                            <a href="javascript:void(0);" class="btn btn-sm btn-primary btn-edit" data="' . $list->id . '"><i class="fas fa-pencil-alt"></i></a>
                            <a href="javascript:void(0);" class="btn btn-sm btn-danger btn-hapus" data="' . $list->id . '"><i class="fas fa-trash"></i></i></a>
                        </div>';
                $data[] = $row;
            }
            $output = [
                'draw' => $this->request->getPost('draw'),
                'recordsTotal' => $this->produk_m->countAll(),
                'recordsFiltered' => $this->produk_m->countFiltered(),
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
}
