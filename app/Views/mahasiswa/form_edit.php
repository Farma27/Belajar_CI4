<?php $this->extend('template/template'); ?>
<?php $this->section('isi'); ?>

<div class="container">
    <br><br>
    <div class="card mt-3">
        <div class="card-header">
            <b><?= $title ?></b>
        </div>
        <div class="card-body">
            <?php if (!empty(session()->getFlashdata('err'))) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h4>Error!</h4>
                    </hr />
                    <?php echo session()->getFlashdata('err'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <form action="<?php echo base_url('mahasiswa/update') ?>" class="row g-3" method="post">
                <?= csrf_field(); ?>
                <div class="col-6">
                    <input type="hidden" name="id" value="<?= $mahasiswa['id']; ?>">
                    <label class="form-label">NPM</label>
                    <input type="text" name="nim" class="form-control" value="<?= $mahasiswa['nim']; ?>" required>
                </div>
                <div class="col-6">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" value="<?= $mahasiswa['nama']; ?>" required>
                </div>
                <div class="col-6">
                    <label class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="<?= $mahasiswa['alamat']; ?>" required>
                </div>
                <div class="col-6">
                    <label class="form-label">Handphone</label>
                    <input type="text" name="no_hp" class="form-control" value="<?= $mahasiswa['no_hp']; ?>" required>
                </div>
                <div class="col-12 d-flex flex-row justify-content-end">
                    <button type="submit" class="btn btn-primary mx-2">Update</button>
                    <a type="button" class="btn btn-secondary flex-end" href="<?= base_url('mahasiswa') ?>">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>