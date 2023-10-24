<?php $this->extend('template/template'); ?>
<?php $this->section('isi'); ?>

<div class="container">
    <br><br>
    <div class="card mt-3">
        <div class="card-header">
            <b><?= $title ?></b>
        </div>
        <div class="card-body">
            <a href="matakuliah/tambah" class="btn btn-info">Tambah</a>
            <br><br>
            <table class="table table-bordered">
                <tr>
                    <td>No</td>
                    <td>Kode Mata Kuliah</td>
                    <td>Nama Mata Kuliah</td>
                    <td>SKS</td>
                    <td>Ruangan</td>
                    <td>Aksi</td>
                </tr>
                <?php 
                $no = 1;
                foreach ($matakuliah as $key) : ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $key['kode_mk']; ?></td>
                    <td><?php echo $key['nama_mk']; ?></td>
                    <td><?php echo $key['sks']; ?></td>
                    <td><?php echo $key['ruangan']; ?></td>
                    <td>
                        <a href="/matakuliah/edit/<?php echo $key['id']; ?>">Edit</a>
                        <a href="/matakuliah/delete/<?php echo $key['id']; ?>">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
<?php $this->endsection(); ?>