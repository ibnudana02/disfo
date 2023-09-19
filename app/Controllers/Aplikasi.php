<?php

namespace App\Controllers;

class Aplikasi extends BaseController
{
    public function index()
    {
        $this->data['title'] = 'Konfigurasi Aplikasi';
        echo view('aplikasi', $this->data);
    }

    public function update()
    {
        $id = $this->request->getVar('id_app');
        $rules = [
            'nama_pt' => 'required',
            'email' => 'required',
            'nm_aplikasi' => 'required',
            'fnama_aplikasi' => 'required',
            'alamat_pt' => 'required'
        ];
        if ($this->validate($rules)) {
            $fileImage_name = $this->request->getVar('old_image');
            if (isset($_FILES) && @$_FILES['image']['error'] != '4') {
                if ($fileImage = $this->request->getFile('image')) {
                    if (!$fileImage->isValid()) {
                        throw new \RuntimeException($fileImage->getErrorString() . '(' . $fileImage->getError() . ')');
                    } else {
                        $fileImage_name = $fileImage->getRandomName();
                        $fileImage->move('uploads/aplikasi', $fileImage_name);
                    }
                }
            }
            $data = [
                'nama_pt' => strtoupper($this->request->getVar('nama_pt')),
                'email_pt'  => strtolower($this->request->getVar('email')),
                'nm_aplikasi'  => strtoupper($this->request->getVar('nm_aplikasi')),
                'fnama_aplikasi'  => strtoupper($this->request->getVar('fnama_aplikasi')),
                'logo' => $fileImage_name,
                'telp_pt' => $this->request->getVar('telp'),
                'alamat_pt' => $this->request->getVar('alamat_pt')
            ];
            $update = $this->App_m->update($id, $data);
            if ($update) {
                return redirect()->to(base_url('/aplikasi'))->with('success', 'Perubahan konfigurasi aplikasi berhasil!');
            } else {
                return redirect()->to(base_url('/aplikasi'))->with('error', 'Perubahan konfigurasi aplikasi gagal!');
            }
        } else {
            $errors = array_values($this->validation->getErrors());
            $error = '';
            for ($i = 0; $i < count($errors); $i++) {
                $error .= $errors[$i] . "</br>";
            }
            return redirect()->to(base_url('/aplikasi'))->with('error', $error);
        }
    }
}
