<?php $this->extend('template');?>
<?php $this->section('isi');?>

<div class="container">
    <div class="card mt-3">
        <b><?= $title ?></b>
    </div>
    <div class="card-body"><?= $content ?></div>
</div>

<?php $this->endSection();?>