<?= $this->extend('verifikator/template') ?>
<?= $this->section('content') ?>
<h5 class="card-title mb-0">Selamat Datang, <?= auth()->user()->full_name; ?></h5>
<?= $this->endSection() ?>