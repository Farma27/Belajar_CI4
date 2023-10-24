<?php

namespace App\Controllers;
use App\Models\LatihanModel;

class Latihan extends BaseController {
    protected $latihanmodel;
    
    public function __construct() {
        $this->latihanmodel = new LatihanModel();
    }

    public function index() {
        echo "Saat ini kita sedang berada pada Controllers Latihan";
    }

    public function codeigniter() {
        echo "Saat ini kita sedang berada pada Controllers Latihan dan Function codeigniter";
    }

    public function menampilkan_view() {
        // return view('halaman_latihan');

        echo 'Daftar Mahasiswa';
        echo '<br><br>';
        $data['mahasiswa'] = $this->latihanmodel->findall();
        echo view('halaman_view', $data);
    }

    public function tampil_view() {
        $data = [
            'title' => 'Data Mahasiswa',
            'content' => 'Isi Data mahasiswa'
        ];

        echo view('tampil_data', $data);
    }
}
?>