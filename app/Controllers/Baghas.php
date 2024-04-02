<?php

namespace App\Controllers;

class Baghas extends BaseController
{
    public function index()
    {
        $this->data['title'] = 'Rekap Estimasi Bagi Hasil';
        $this->data['produk'] = $this->produk_m->findAll();
        echo view('baghas/list', $this->data);
    }

    public function create()
    {
        $this->data['title'] = 'Registrasi Bagi Hasil';
        $this->data['produk'] = $this->produk_m->findAll();
        echo view('baghas/create', $this->data);
    }

    public function list()
    {
        if ($this->request->getMethod(true) === 'POST') {
            $lists = $this->baghas_m->getDatatables();
            $data = [];
            $no = $this->request->getVar('start');

            foreach ($lists as $key => $list) {
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->nm_produk;
                $row[] = number_format($list->nisbah_bank) . "%";
                $row[] = number_format($list->nisbah_nsb) . "%";
                $row[] = $list->eq_rate . "%";
                $row[] = date("Y-m-d", strtotime($list->periode));
                $row[] = '<div class="btn-group" role="group" aria-label="Basic example">
                            <a href="javascript:void(0);" class="btn btn-sm btn-primary btn-edit" data="' . $list->id . '"><i class="fas fa-pencil-alt"></i></a>
                            <a href="javascript:void(0);" class="btn btn-sm btn-danger btn-hapus" data="' . $list->id . '"><i class="fas fa-trash"></i></i></a>
                        </div>';
                $data[] = $row;
            }
            $output = [
                'draw' => $this->request->getPost('draw'),
                'recordsTotal' => $this->baghas_m->countAll(),
                'recordsFiltered' => $this->baghas_m->countFiltered(),
                'data' => $data
            ];

            echo json_encode($output);
        }
    }

    public function detail()
    {
        $id = $this->request->getVar('id');
        $data = $this->baghas_m->find($id);

        if (!$data) {
            $response = ['status' => false, 'desc' => 'Data user tidak ditemukan!', 'icon' => 'warning', 'title' => 'Warning'];
        } else {
            $response = ['status' => true, 'data' => $data];
        }
        echo json_encode($response);
    }

    public function save()
    {
        $builder = $this->baghas_m->builder();
        $this->validation->setRules([
            'produk' => 'required',
            'nisbah_bank' => 'required',
            'nisbah_nsb' => 'required',
            'eq_rate' => 'required',
            'periode' => 'required',
        ]);

        if ($this->validation->withRequest($this->request)->run()) {
            $post = $this->request->getVar();
            $produk = $post['produk'];
            $nisbah_bank = $post['nisbah_bank'];
            $nisbah_nsb = $post['nisbah_nsb'];
            $eq_rate = $post['eq_rate'];
            $periode = $post['periode'];
            if ($produk && $nisbah_bank && $nisbah_nsb && $eq_rate) {
                for ($i = 0; $i < count($produk); $i++) {
                    $baghas[] = [
                        'produk' => $produk[$i],
                        'nisbah_bank' => $nisbah_bank[$i],
                        'nisbah_nsb' => $nisbah_nsb[$i],
                        'eq_rate' => $eq_rate[$i],
                        'periode' => $periode[$i]
                    ];
                }
                $exec = $builder->insertBatch($baghas);
                if ($exec) {
                    return redirect()->to('/baghas')->with('success', 'Insert baghas berhasil!');
                }
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
        $data = $this->baghas_m->find($id);

        if ($data) {
            $this->baghas_m->delete($id);
            $response = ['icon' => 'success', 'title' => 'Success', 'desc' => 'Hapus Data Baghas berhasil!'];
        } else {
            $response = ['icon' => 'error', 'title' => 'Error', 'desc' => 'Data Baghas tidak ditemukan!'];
        }
        echo json_encode($response);
    }

    public function update()
    {
        $this->validation->setRules([
            'produk' => 'required',
            'nisbah_bank' => 'required',
            'nisbah_nsb' => 'required',
            'eq_rate' => 'required',
            'periode' => 'required',
        ]);
        if ($this->validation->withRequest($this->request)->run()) {
            $post = $this->request->getVar();

            $object = [
                'produk' => $post['produk'],
                'nisbah_bank' => $post['nisbah_bank'],
                'nisbah_nsb' => $post['nisbah_nsb'],
                'eq_rate' => $post['eq_rate'],
                'periode' => date("Y-m-d", strtotime($post['periode']))
            ];

            $insert = $this->baghas_m->update($post['id'], $object);
            if ($insert) {
                return redirect()->to('/baghas')->with('success', 'Update data baghas berhasil!');
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
