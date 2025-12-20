<?= $this->extend('supervisor/template') ?>
<?= $this->section('content') ?>
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
    <div class="d-flex flex-column justify-content-center">
    <h4 class="mb-1">Detail Usulan</h4>
    </div>
    <div class="d-flex align-content-center flex-wrap gap-4">
    <div class="d-flex gap-4">
        <a href="<?= site_url('supervisor/usulan') ?>" class="btn btn-label-secondary waves-effect">Kembali</a>
    </div>
    <?php if($usulan->status == 4): ?>
    <a href="<?= site_url('supervisor/usulan/pendirianptkis/penilaianasesor/'.encrypt($usulan->id))?>" type="button" class="btn btn-success waves-effect waves-light" onclick="return confirm('Apakah Anda yakin ingin mengirim ke Penilai?')">Kirim ke Penilai</a>
    <?php endif; ?>
    <?php if($usulan->status == 5): ?>
    <a href="<?= site_url('supervisor/usulan/pendirianptkis/prosesrkma/'.encrypt($usulan->id))?>" type="button" class="btn btn-success waves-effect waves-light" onclick="return confirm('Apakah proses penilaian selesai?')">Proses RKMA</a>
    <?php endif; ?>
    </div>
</div>

<div class="card shadow-none bg-label-success mb-3">
    <div class="card-body">
        <div class="row g-6">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Nama Yayasan</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $detail->yayasan_nama?></div>
                </div>
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Alamat Yayasan</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $detail->yayasan_alamat?></div>
                </div>
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>No. SK</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $detail->yayasan_nosk?></div>
                </div>
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Tanggal SK</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $detail->yayasan_tglsk?></div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Jenis Layanan</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $usulan->layanan_nama?></div>
                </div>
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Status Usulan</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= usul_status($usulan->status)?></div>
                </div>
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Keterangan BTS/TMS</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $usulan->keterangan?></div>
                </div>
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Verifikator</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $usulan->verifikator?></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="nav-align-top">
    <ul class="nav nav-pills flex-column flex-md-row mb-6 row-gap-2">
        <li class="nav-item">
        <a class="nav-link waves-effect waves-light" href="<?= site_url('supervisor/usulan/pendirianptkis/detail/'.encrypt($usulan->id))?>"><i class="icon-base ti tabler-user-check me-1_5 icon-sm"></i>Info Usulan</a>
        </li>
        <li class="nav-item">
        <a class="nav-link waves-effect waves-light" href="<?= site_url('supervisor/usulan/pendirianptkis/detail/verifikasi/'.encrypt($usulan->id))?>"><i class="icon-base ti tabler-user-check me-1_5 icon-sm"></i>Verifikasi Dokumen</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active waves-effect waves-light" href="#"><i class="icon-base ti tabler-lock me-1_5 icon-sm"></i>Penilaian</a>
        </li>
        <li class="nav-item">
        <a class="nav-link waves-effect waves-light" href="<?= site_url('supervisor/usulan/pendirianptkis/detail/rkma/'.encrypt($usulan->id))?>"><i class="icon-base ti tabler-bell me-1_5 icon-sm"></i>RKMA</a>
        </li>
        <li class="nav-item">
        <a class="nav-link waves-effect waves-light" href="<?= site_url('supervisor/usulan/pendirianptkis/detail/kma/'.encrypt($usulan->id))?>"><i class="icon-base ti tabler-link me-1_5 icon-sm"></i>KMA</a>
        </li>
    </ul>
</div>
<div class="row g-6">
    <div class="col-sm-12">
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title m-0 me-2">Asesmen Kecukupan</h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kecukupan">Tambah Asesor</button>
            </div>
                <table class="table table-bordered">
                    <tr>
                        <th>Asesor</th>
                        <th>Tanggal Penilaian</th>
                        <th>Lampiran</th>
                        <th>Nilai</th>
                        <th>Aksi</th>
                    </tr>
                    <?php foreach($asesorkecukupan as $ak):?>
                    <tr>
                        <td><?= $ak->full_name?></td>
                        <td><?= $ak->mulai_tanggal.' - '.$ak->sampai_tanggal?></td>
                        <td><?= ($ak->file_hasil)?'<a href="'.base_url('uploads/nilai/'.$ak->file_hasil).'" target="_blank">Unduh</a>':'Belum Mengunggah'; ?></td>
                        <td><?= $ak->skor?></td>
                        <td>
                            <?php
                            if($ak->status == 2){
                            ?>
                            <a href="<?= site_url('supervisor/usulan/pendirianptkis/detail/penilaian/review/'.$ak->id)?>" class="btn btn-sm btn-warning" onclick="return confirm('Nilai akan dikembalikan ke Asesor untuk ditinjau ulang?')">Kembalikan</a>
                            <?php }else{?>
                            <a href="<?= site_url('supervisor/usulan/pendirianptkis/asesor/delete/'.$ak->id)?>" class="btn btn-sm btn-danger" onclick="return confirm('Asesor Kecukupan akan dihapus?')">Hapus</a>
                            <?php }?>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </table>
        </div>
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title m-0 me-2">Asesmen Lapangan</h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#lapangan">Tambah Asesor</button>
            </div>
                <table class="table table-bordered">
                    <tr>
                        <th>Asesor</th>
                        <th>Tanggal</th>
                        <th>Lampiran</th>
                        <th>Nilai</th>
                        <th>Aksi</th>
                    </tr>
                    <?php foreach($asesorlapangan as $al):?>
                    <tr>
                        <td><?= $al->full_name?></td>
                        <td><?= $al->mulai_tanggal.' - '.$al->sampai_tanggal?></td>
                        <td><?= $al->file_hasil?></td>
                        <td><?= $al->skor?></td>
                        <td><a href="<?= site_url('supervisor/usulan/pendirianptkis/asesor/delete/'.$al->id)?>" class="btn btn-sm btn-danger" onclick="return confirm('Asesor Lapangan akan dihapus?')">Hapus</a></td>
                    </tr>
                    <?php endforeach;?>
                </table>
        </div>
    </div>
</div>

<div class="modal-onboarding modal fade animate__animated" id="kecukupan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content text-center">
        <div class="modal-header border-0">
            <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"></button>
        </div>
        <div class="modal-body p-0">
            <div class="onboarding-content mb-0">
            <h4 class="onboarding-title text-body">Penugasan Asesmen Kecukupan</h4>
            <form action="<?= site_url('supervisor/usulan/pendirianptkis/asesor/add') ?>" method="post" id="usulform">
                <div class="row mb-6">
                <label class="col-sm-4 col-form-label" for="nomor_surat">Asesor</label>
                <div class="col-sm-8">
                    <select name="asesor" id="asesor" class="form-select">
                        <?php foreach($users as $user):?>
                        <option value="<?= esc($user->id) ?>"><?= esc($user->full_name) ?></option>
                        <?php endforeach;?>
                    </select>
                    <input type="hidden" name="usul_id" id="usul_id" value="<?= $usulan->id?>">
                    <input type="hidden" name="jenis" id="jenis" value="1">
                </div>
                </div>
                <div class="row mb-6">
                <label class="col-sm-4 col-form-label" for="perihal">Tanggal Penilaian</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control" id="mulai_tanggal" name="mulai_tanggal" required>
                </div>
                <div class="col-sm-4">
                    <input type="date" class="form-control" id="sampai_tanggal" name="sampai_tanggal" required>
                </div>
                </div>
                <div class="row mb-6">
                <label class="col-sm-4 col-form-label" for="nomor_surat">Keterangan</label>
                <div class="col-sm-8">
                    <textarea name="keterangan" class="form-control" id="keterangan" rows="3"></textarea>
                </div>
                </div>
            </form>
            </div>
        </div>
        <div class="modal-footer border-0">
            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
            Tutup
            </button>
            <button type="button" class="btn btn-primary" onclick="document.getElementById('usulform').submit();">Simpan</button>
        </div>
        </div>
    </div>
</div>

<div class="modal-onboarding modal fade animate__animated" id="lapangan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content text-center">
        <div class="modal-header border-0">
            <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"></button>
        </div>
        <div class="modal-body p-0">
            <div class="onboarding-content mb-0">
            <h4 class="onboarding-title text-body">Penugasan Asesmen Lapangan</h4>
            <form action="<?= site_url('supervisor/usulan/pendirianptkis/asesor/add') ?>" method="post" id="usulform2">
                <div class="row mb-6">
                <label class="col-sm-4 col-form-label" for="nomor_surat">Asesor</label>
                <div class="col-sm-8">
                    <select name="asesor" id="asesor" class="form-select">
                        <?php foreach($users as $user):?>
                        <option value="<?= esc($user->id) ?>"><?= esc($user->full_name) ?></option>
                        <?php endforeach;?>
                    </select>
                    <input type="hidden" name="usul_id" id="usul_id" value="<?= $usulan->id?>">
                    <input type="hidden" name="jenis" id="jenis" value="2">
                </div>
                </div>
                <div class="row mb-6">
                <label class="col-sm-4 col-form-label" for="perihal">Tanggal Penilaian</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control" id="mulai_tanggal" name="mulai_tanggal" required>
                </div>
                <div class="col-sm-4">
                    <input type="date" class="form-control" id="sampai_tanggal" name="sampai_tanggal" required>
                </div>
                </div>
                <div class="row mb-6">
                <label class="col-sm-4 col-form-label" for="nomor_surat">Keterangan</label>
                <div class="col-sm-8">
                    <textarea name="keterangan" class="form-control" id="keterangan" rows="3"></textarea>
                </div>
                </div>
            </form>
            </div>
        </div>
        <div class="modal-footer border-0">
            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
            Tutup
            </button>
            <button type="button" class="btn btn-primary" onclick="document.getElementById('usulform2').submit();">Simpan</button>
        </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('scripts');?>
<script>

function preview(berkas) {
  $('#object').html('<object data="'+berkas+'" type="application/pdf" width="100%" style="height: 80vh;" id="object">'+
                      '<p>Browser tidak mendukung!</p>'+
                    '</object>');
  $('#preview').modal('show');
}

</script>
<?= $this->endSection() ?>