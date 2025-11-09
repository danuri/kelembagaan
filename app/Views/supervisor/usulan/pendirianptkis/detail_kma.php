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
        <a class="nav-link waves-effect waves-light" href="<?= site_url('supervisor/usulan/pendirianptkis/detail/penilaian/'.encrypt($usulan->id))?>"><i class="icon-base ti tabler-lock me-1_5 icon-sm"></i>Penilaian</a>
        </li>
        <li class="nav-item">
        <a class="nav-link waves-effect waves-light" href="<?= site_url('supervisor/usulan/pendirianptkis/detail/rkma/'.encrypt($usulan->id))?>"><i class="icon-base ti tabler-bell me-1_5 icon-sm"></i>RKMA</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active waves-effect waves-light" href="#"><i class="icon-base ti tabler-link me-1_5 icon-sm"></i>KMA</a>
        </li>
    </ul>
</div>
<div class="row g-6">
    <div class="col-sm-12">
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title m-0 me-2">Unggah KMA</h5>
            </div>
            <div class="card-body">
            <form action="">
                <div class="row mb-6">
                    <label class="col-sm-3 col-form-label" for="no_kma">No Keputusan</label>
                    <div class="col-sm-9">
                        <input type="date" id="no_kma" name="no_kma" class="form-control" value="" />
                    </div>
                </div>
                <div class="row mb-6">
                    <label class="col-sm-3 col-form-label" for="tanggal_kma">Tanggal Keputusan</label>
                    <div class="col-sm-9">
                        <input type="date" id="tanggal_kma" name="tanggal_kma" class="form-control" value="" />
                    </div>
                </div>
                <div class="row mb-6">
                    <label class="col-sm-3 col-form-label" for="lampiran">File Keputusan</label>
                    <div class="col-sm-9">
                        <input type="file" id="lampiran" name="lampiran" class="form-control" value="" />
                    </div>
                </div>
            </form>
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