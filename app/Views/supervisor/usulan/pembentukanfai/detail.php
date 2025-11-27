<?= $this->extend('supervisor/template') ?>
<?= $this->section('content') ?>
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
    <div class="d-flex flex-column justify-content-center">
    <h4 class="mb-1">Detail Usulan</h4>
    <!-- <p class="mb-0">Orders placed across your store</p> -->
    </div>
    <div class="d-flex align-content-center flex-wrap gap-4">
    <div class="d-flex gap-4">
        <button class="btn btn-label-secondary waves-effect">Kembali</button>
    </div>
    <button type="button" class="btn btn-success waves-effect waves-light" onclick="disposisi()">Disposisi</button>
    </div>
</div>

<div class="card bg-label-warning mb-3">
    <div class="card-body">
        <div class="row g-6">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Nomor Surat Pengantar</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $usulan->nomor_surat?></div>
                </div>
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Perihal</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $usulan->perihal?></div>
                </div>
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Nama Lembaga</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $detail->nama_lembaga?></div>
                </div>
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Alamat Lembaga</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $detail->alamat_lembaga?></div>
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
                        <h6>Verifikator</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $usulan->verifikator?></div>
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
            </div>
        </div>
    </div>
</div>
<div class="row">
                            <div class="col-sm-12">
        <div class="card mb-3">
    <div class="card-body">
        <h5 class="mb-4">Dokumen</h5>
        <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="60%">Dokumen</th>
                                        <th>Sesuai</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($dokumens as $dokumen): ?>
                                    <tr>
                                        <td>
                                            <?php if($dokumen->lampiran): ?>
                                                <a href="javascript:;" onclick="preview('<?= base_url('uploads/'.$dokumen->lampiran) ?>')"><?= $dokumen->dokumen ?></a>
                                            <?php else: ?>
                                                <?= $dokumen->dokumen ?>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?= ($dokumen->dok_status == 1)?'<span class="badge bg-label-success">Ya</span>':'<span class="badge bg-label-danger">Tidak</span>' ?>
                                        </td>
                                        <td><?= $dokumen->keterangan?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
        </div>
    </div>

    <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title m-0 me-2">Unggah KMA</h5>
            </div>
            <div class="card-body">
            <form action="<?= site_url('supervisor/usulan/detail/kma/save/'.encrypt($usulan->id)) ?>" method="post" enctype="multipart/form-data">
                <div class="row mb-6">
                    <label class="col-sm-3 col-form-label" for="no_kma">No Keputusan</label>
                    <div class="col-sm-9">
                        <input type="text" id="no_kma" name="no_kma" class="form-control" value="<?= $usulan->no_kma ?>" />
                    </div>
                </div>
                <div class="row mb-6">
                    <label class="col-sm-3 col-form-label" for="tanggal_kma">Tanggal Keputusan</label>
                    <div class="col-sm-9">
                        <input type="date" id="tgl_kma" name="tgl_kma" class="form-control" value="<?= $usulan->tgl_kma ?>" />
                    </div>
                </div>
                <div class="row mb-6">
                    <label class="col-sm-3 col-form-label" for="lampiran">File Keputusan</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                        <input type="file" class="form-control" id="lampiran" name="lampiran" aria-describedby="groupLampiran" aria-label="Upload" accept=".pdf" />
                        <?php if($usulan->file_kma): ?>
                        <a class="btn btn-outline-primary" type="button" id="groupLampiran" href="<?= base_url('uploads/kma/'.$usulan->file_kma) ?>" target="_blank">Lihat</a>
                        <?php endif; ?>
                      </div>
                    </div>
                </div>
                <div class="row mb-6">
                    <label class="col-sm-3 col-form-label" for="save"></label>
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
</div>
</div>

<div id="preview" class="modal fade" data-bs-backdrop="static" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body" id="object">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<div id="disposisi" class="modal fade" data-bs-backdrop="static" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Disposisi Usulan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="<?= site_url('supervisor/usulan/pembentukanfai/disposisi/'.encrypt($usulan->id)) ?>">
            <div class="modal-body">
                        <div class="mb-6">
                          <label class="form-label" for="basic-default-fullname">Verifikator</label>
                          <select name="verifikator" id="verifikator" class="form-select">
                            <?php foreach($users as $user): ?>
                            <option value="<?= $user->id ?>"><?= $user->full_name ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="basic-default-message">Catatan</label>
                          <textarea id="catatan" name="catatan" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                    </div>
                </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('scripts');?>
<script>
$(document).ready(function() {
});

function preview(berkas) {
  $('#object').html('<object data="'+berkas+'" type="application/pdf" width="100%" style="height: 80vh;" id="object">'+
                      '<p>Browser tidak mendukung!</p>'+
                    '</object>');
  $('#preview').modal('show');
}

function disposisi() {
  $('#disposisi').modal('show');
}

</script>
<?= $this->endSection() ?>