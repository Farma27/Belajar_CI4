<?php

namespace App\Controllers;

use App\Models\MatakuliahModel;

class Matakuliah extends BaseController {
    protected $matakuliahmodel;
    protected $session;

    public function __construct() {
        $this->matakuliahmodel = new MatakuliahModel();
        $this->session = \Config\Services::session();
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
        $this->matakuliahmodel->save([
            'id'        => $this->request->getVar('id'),
            'kode_mk'   => $this->request->getVar('kode_mk'),
            'nama_mk'   => $this->request->getVar('nama_mk'),
            'sks'       => $this->request->getVar('sks'),
            'ruangan'   => $this->request->getVar('ruangan')
    ]);

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

        $this->session->setFlashdata('success', 'Data berhasil disimpan!');
        $this->matakuliahmodel->update_data($data, $id_mk);
        return redirect()->to('matakuliah');
    }

    public function delete($id_mk) {
        $this->session->setFlashdata('success', 'Data berhasil dihapus!');
        $this->matakuliahmodel->delete_data($id_mk);
        return redirect()->to('matakuliah');
    }
}