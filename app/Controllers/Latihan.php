<?php

namespace App\Controllers;

class Latihan extends BaseController {
    public function index() {
        echo "Saat ini kita sedang berada pada Controllers Latihan";
    }

    public function codeigniter() {
        echo "Saat ini kita sedang berada pada Controllers Latihan dan Function codeigniter";
    }

    public function menampilkan_view() {
        return view('halaman_latihan');
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