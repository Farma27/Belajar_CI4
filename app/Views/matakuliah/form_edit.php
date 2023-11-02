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
            <form action="<?php echo base_url('matakuliah/update') ?>" class="row g-3" method="post">
                <?= csrf_field(); ?>
                <div class="col-6">
                    <input type="hidden" name="id" value="<?= $matakuliah['id']; ?>">
                    <label class="form-label">Kode Mata Kuliah</label>
                    <input type="text" name="kode_mk" class="form-control" value="<?= $matakuliah['kode_mk']; ?>">
                </div>
                <div class="col-6">
                    <label class="form-label">Nama Mata Kuliah</label>
                    <input type="text" name="nama_mk" class="form-control" value="<?= $matakuliah['nama_mk']; ?>">
                </div>
                <div class="col-6">
                    <label class="form-label">SKS</label>
                    <input type="text" name="sks" class="form-control" value="<?= $matakuliah['sks']; ?>">
                </div>
                <div class="col-6">
                    <label class="form-label">Ruangan</label>
                    <input type="text" name="ruangan" class="form-control" value="<?= $matakuliah['ruangan']; ?>">
                </div>
                <div class="col-12 d-flex flex-row justify-content-end">
                    <button type="submit" class="btn btn-primary mx-2">Update</button>
                    <a type="button" class="btn btn-secondary flex-end" href="<?= base_url('matakuliah') ?>">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>