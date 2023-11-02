<?php $this->extend('template/template'); ?>
<?php $this->section('isi'); ?>

<div class="container">
    <br><br>
    <div class="card mt-3">
        <div class="card-header">
            <b><?= $title ?></b>
        </div>
        <div class="card-body">
            <a href="mahasiswa/tambah" class="btn btn-info">Tambah</a>
            <br><br>
            <table class="table table-bordered">
                <tr>
                    <td>No</td>
                    <td>NPM</td>
                    <td>Nama</td>
                    <td>Alamat</td>
                    <td>Handphone</td>
                    <td>Aksi</td>
                </tr>
                <?php 
                $no = 1;
                foreach ($mahasiswa as $key) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $key['nim']; ?></td>
                    <td><?= $key['nama']; ?></td>
                    <td><?= $key['alamat']; ?></td>
                    <td><?= $key['no_hp']; ?></td>
                    <td>
                        <a href="/mahasiswa/edit/<?= $key['id']; ?>">Edit</a> | 
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $key['id'] ?>">Hapus</a>
                        <div class="modal fade" id="modalHapus<?= $key['id'] ?>" tabindex="-1" aria-labelledby="labelModalHapus" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="labelModalHapus">Konfirmasi</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah Anda yakin ingin menghapus data ini? <br>
                                            <span class="text-danger"><?= $key['nim']; ?> - <?= $key['nama']; ?></span>
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                        <a href="/mahasiswa/delete/<?= $key['id']; ?>" class="btn btn-danger">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    <div class="container mt-4">
        <?php if (session()->getFlashdata('success')) { ?>
            <div class="alert alert-success alert-dismissible fade show float-end" role="alert">
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
    </div>
</div>
<?php $this->endsection(); ?>