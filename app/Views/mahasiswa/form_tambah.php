<?php $this->extend('template/template'); ?>
<?php $this->section('isi'); ?>

<div class="container">
    <br><br>
    <div class="card mt-3">
        <div class="card-header">
            <b><?= $title ?></b>
        </div>
        <div class="card-body">
            <form action="<?php echo base_url('mahasiswa/simpan') ?>" class="row g-3" method="post">
                <div class="col-6">
                    <label class="form-label">NPM</label>
                    <input type="text" name="nim" class="form-control" required>
                </div>
                <div class="col-6">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="col-6">
                    <label class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control" required>
                </div>
                <div class="col-6">
                    <label class="form-label">No Handphone</label>
                    <input type="text" name="no_hp" class="form-control" required>
                </div>
                <div class="col-12 d-flex flex-row justify-content-end">
                    <button type="submit" class="btn btn-primary mx-2">Simpan</button>
                    <a type="button" class="btn btn-secondary flex-end" href="javascript: window.history.back()">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->endsection('isi'); ?>