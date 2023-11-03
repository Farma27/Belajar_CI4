<?php

namespace App\Controllers;

use App\Models\MatakuliahModel;

class Matakuliah extends BaseController {
    protected $matakuliahmodel;
    protected $session;
    protected $validator;

    public function __construct() {
        $this->matakuliahmodel = new MatakuliahModel();
        $this->session = \Config\Services::session();
        $this->validator = \Config\Services::validation();
    }

    public function index() {
        $matakuliah = $this->matakuliahmodel->findAll();
        $data = [
            'title'         => 'Data Mata Kuliah',
            'matakuliah'    => $matakuliah
        ];

        echo view('matakuliah/data_matakuliah', $data);
    }

    public function tambah() {
        $data = [
            'title' => 'Tambah Data Matakuliah'
        ];

        echo view('matakuliah/form_tambah', $data);
    }

    public function simpan() {
        if (!$this->validate([
            'kode_mk' => [
                'rules' => 'required|min_length[3]|max_length[9]|is_unique[tbl_matakuliah.kode_mk]',
                'label' => 'Kode Mata Kuliah',
                'errors' => [
                    'required' => '{field} harus diisi!',
                    'min_length' => '{field} harus terdiri dari 3~9 karakter!',
                    'max_length' => '{field} harus terdiri dari 3~9 karakter!',
                    'is_unique' => '{field} {value} sudah terdaftar!'
                ]
            ],
            'nama_mk' => [
                'rules' => 'required',
                'label' => 'Nama Mata Kuliah',
                'errors' => [
                    'required' => '{field} harus diisi!'
                ]
            ],
            'sks' => [
                'rules' => 'required|min_length[1]|max_length[2]',
                'label' => 'SKS',
                'errors' => [
                    'required' => '{field} harus diisi!',
                    'min_length' => '{field} harus terdiri dari 1~2 karakter!',
                    'max_length' => '{field} harus terdiri dari 1~2 karakter!'
                ]
            ],
            'ruangan' => [
                'rules' => 'required',
                'label' => 'Ruangan',
                'errors' => [
                    'required' => '{field} harus diisi!'
                ]
            ]
        ])) {
            $this->session->setFlashdata('err', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
            $this->matakuliahmodel->save([
                'id'        => $this->request->getVar('id'),
                'kode_mk'   => $this->request->getVar('kode_mk'),
                'nama_mk'   => $this->request->getVar('nama_mk'),
                'sks'       => $this->request->getVar('sks'),
                'ruangan'   => $this->request->getVar('ruangan')
            ]);
        }

        $this->session->setFlashdata('success', 'Data berhasil disimpan!');
        return redirect()->to('matakuliah');
    }

    public function edit($id_mk) {
        $matakuliah = $this->matakuliahmodel->data_mk($id_mk);
        $data = [
            'title'         => 'Edit Data Mata Kuliah',
            'matakuliah'    => $matakuliah
        ];

        echo view('matakuliah/form_edit', $data);
    }

    public function update() {
        $id_mk = $this->request->getVar('id');
        $data = [
            'kode_mk'   => $this->request->getVar('kode_mk'),
            'nama_mk'   => $this->request->getVar('nama_mk'),
            'sks'       => $this->request->getVar('sks'),
            'ruangan'   => $this->request->getVar('ruangan')
        ];

        if (!$this->validate([
            'id' => [
                'rules' => 'is_natural_no_zero'
            ],
            'kode_mk' => [
                'rules' => 'required|min_length[3]|max_length[9]|is_unique[tbl_matakuliah.kode_mk,id,{id}]',
                'label' => 'Kode Mata Kuliah',
                'errors' => [
                    'required' => '{field} harus diisi!',
                    'min_length' => '{field} harus terdiri dari 3~9 karakter!',
                    'max_length' => '{field} harus terdiri dari 3~9 karakter!',
                    'is_unique' => '{field} {value} sudah terdaftar!'
                ]
            ],
            'nama_mk' => [
                'rules' => 'required',
                'label' => 'Nama Mata Kuliah',
                'errors' => [
                    'required' => '{field} harus diisi!'
                ]
            ],
            'sks' => [
                'rules' => 'required|min_length[1]|max_length[2]',
                'label' => 'SKS',
                'errors' => [
                    'required' => '{field} harus diisi!',
                    'min_length' => '{field} harus terdiri dari 1~2 karakter!',
                    'max_length' => '{field} harus terdiri dari 1~2 karakter!'
                ]
            ],
            'ruangan' => [
                'rules' => 'required',
                'label' => 'Ruangan',
                'errors' => [
                    'required' => '{field} harus diisi!'
                ]
            ]
        ])) {
            $this->session->setFlashdata('err', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
            $this->matakuliahmodel->update_data($data, $id_mk);
        }

        $this->session->setFlashdata('success', 'Data berhasil disimpan!');
        return redirect()->to('matakuliah');
    }

    public function delete($id_mk) {
        $this->session->setFlashdata('success', 'Data berhasil dihapus!');
        $this->matakuliahmodel->delete_data($id_mk);
        return redirect()->to('matakuliah');
    }
}