<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController {
    protected $mahasiswamodel;
    protected $session;
    protected $validator;

    public function __construct() {
        $this->mahasiswamodel = new MahasiswaModel();
        $this->session = \Config\Services::session();
        $this->validator = \Config\Services::validation();
    }

    public function index() {
        $mahasiswa = $this->mahasiswamodel->findAll();
        $data = [
            'title' => 'Data Mahasiswa',
            'mahasiswa' => $mahasiswa
        ];

        echo view('mahasiswa/data_mahasiswa', $data);
    }

    public function tambah() {
        $data = [
            'title' => 'Tambah Data Mahasiswa'
        ];

        echo view('mahasiswa/form_tambah', $data);
    }

    public function simpan() {
        if (!$this->validate([
            'nim' => [
                'rules' => 'required|exact_length[9]|is_unique[tbl_mahasiswa.nim]',
                'label' => 'NPM',
                'errors' => [
                    'require' => '{field} harus diisi!',
                    'exact_length'=> '{field} harus terdiri dari 9 karakter!',
                    'is_unique' => '{field} {value} sudah terdaftar!'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'label' => 'Nama Mahasiswa',
                'errors' => [
                    'required' => '{field} harus diisi!'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'label' => 'Alamat', 
                'errors' => [
                    'required' => '[field} harus diisi!'
                ]
            ],
            'no_hp' => [
                'rules' => 'required|min_length[6]',
                'label' => 'Nomor Telepon',
                'errors' => [
                    'required' => '{field} harus diisi!',
                    'min_length' => '{field} harus lebih dari 6 karakter!'
                ]
            ]
        ])) {
            $this->session->setFlashdata('err', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
            $this->mahasiswamodel->save([
                'nim'       => $this->request->getVar('nim'),
                'nama'      => $this->request->getVar('nama'),
                'alamat'    => $this->request->getVar('alamat'),
                'no_hp'     => $this->request->getVar('no_hp')
            ]);
        }

        $this->session->setFlashdata('success', 'Data berhasil disimpan!');
        return redirect()->to('mahasiswa');
    }

    public function edit($id_mhs) {
        $mahasiswa = $this->mahasiswamodel->data_mhs($id_mhs);
        $data = [
            'title'     => 'Edit Data Mahasiswa',
            'mahasiswa' => $mahasiswa
        ];

        echo view('mahasiswa/form_edit', $data);
    }

    public function update() {
        $id_mhs = $this->request->getVar('id');
        $data = [
            'nim'       => $this->request->getVar('nim'),
            'nama'      => $this->request->getVar('nama'),
            'alamat'    => $this->request->getVar('alamat'),
            'no_hp'     => $this->request->getVar('no_hp')
        ];

        if (!$this->validate([
            'id' => [
                'rules' => 'is_natural_no_zero'
            ],
            'nim' => [
                'rules' => 'required|exact_length[9]|is_unique[tbl_mahasiswa.nim,id,{id}]',
                'label' => 'NPM',
                'errors' => [
                    'require' => '{field} harus diisi!',
                    'exact_length'=> '{field} harus terdiri dari 9 karakter!',
                    'is_unique' => '{field} {value} sudah terdaftar!'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'label' => 'Nama Mahasiswa',
                'errors' => [
                    'required' => '{field} harus diisi!'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'label' => 'Alamat', 
                'errors' => [
                    'required' => '[field} harus diisi!'
                ]
            ],
            'no_hp' => [
                'rules' => 'required|min_length[6]',
                'label' => 'Nomor Telepon',
                'errors' => [
                    'required' => '{field} harus diisi!',
                    'min_length' => '{field} harus lebih dari 6 karakter!'
                ]
            ]
        ])) {
            $this->session->setFlashdata('err', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
        $this->mahasiswamodel->update_data($data, $id_mhs);
        }

        $this->session->setFlashdata('success', 'Data berhasil disimpan!');
        return redirect()->to('mahasiswa');
    }

    public function delete($id_mhs) {
        $this->session->setFlashdata('success', 'Data berhasil dihapus!');
        $this->mahasiswamodel->delete_data($id_mhs);
        return redirect()->to('mahasiswa');
    }
}