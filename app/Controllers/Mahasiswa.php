<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController {
    protected $mahasiswamodel;
    protected $session;

    public function __construct() {
        $this->mahasiswamodel = new MahasiswaModel();
        $this->session = \Config\Services::session();
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
        $this->mahasiswamodel->save([
            'nim'       => $this->request->getVar('nim'),
            'nama'      => $this->request->getVar('nama'),
            'alamat'    => $this->request->getVar('alamat'),
            'no_hp'     => $this->request->getVar('no_hp')
        ]);

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

        $this->session->setFlashdata('success', 'Data berhasil disimpan!');
        $this->mahasiswamodel->update_data($data, $id_mhs);
        return redirect()->to('mahasiswa');
    }

    public function delete($id_mhs) {
        $this->session->setFlashdata('success', 'Data berhasil dihapus!');
        $this->mahasiswamodel->delete_data($id_mhs);
        return redirect()->to('mahasiswa');
    }
}