<?= $this->extend('supervisor/template') ?>
<?= $this->section('content') ?>
<div class="card">
<div class="card-header border-bottom d-flex align-items-center justify-content-between">
    <div class="card-title mb-0">
    <h5 class="m-0 me-2">Data Lembaga</h5>
    </div>
    <button class="btn btn-primary">Tambah Lembaga</button>
</div>
<div class="card-body">
    <table class="table datatable">
    <thead>
        <tr>
        <th>NSPT</th>
        <th>Nama Lembaga</th>
        <th>Alamat Lembaga</th>
        <th>No. SK</th>
        <th>Jenis PT</th>
        </tr>
    </thead>
    <tbody class="table-border-bottom-0">
        <?php foreach ($lembaga as $lembaga): ?>
        <tr>
        <td><?= esc($lembaga->nss_baru) ?></td>
        <td><strong><?= esc($lembaga->nama_ptai) ?></strong></td>
        <td><?= esc($lembaga->alamat) ?></td>
        <td><?= esc($lembaga->no_sk) ?></td>
        <td><?= esc($lembaga->jenis_ptai) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</div>
<?= $this->endSection() ?>