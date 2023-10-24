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
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $key['nim']; ?></td>
                    <td><?php echo $key['nama']; ?></td>
                    <td><?php echo $key['alamat']; ?></td>
                    <td><?php echo $key['no_hp']; ?></td>
                    <td>
                        <a href="/mahasiswa/edit/<?php echo $key['id']; ?>">Edit</a>
                        <a href="/mahasiswa/delete/<?php echo $key['id']; ?>">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
<?php $this->endsection(); ?>