<?= $this->extend('verifikator/template') ?>
<?= $this->section('content') ?>
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
    <div class="d-flex flex-column justify-content-center">
    <h4 class="mb-1">Detail Usulan</h4>
    <!-- <p class="mb-0">Orders placed across your store</p> -->
    </div>
    <div class="d-flex align-content-center flex-wrap gap-4">
    <div class="d-flex gap-4">
        <a href="<?= site_url('verifikator/usulan') ?>" class="btn btn-label-secondary waves-effect">Kembali</a>
    </div>
    </div>
</div>

<div class="card mb-3">
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
            </div>
        </div>
    </div>
</div>
<div class="row g-6">
    <div class="col-sm-6">
        <div class="accordion accordion-custom-button accordion-header-primary" id="accordionCustom">
                    <div class="accordion-item active">
                      <h2 class="accordion-header" id="headingCustomOne">
                        <button
                          type="button"
                          class="accordion-button"
                          data-bs-toggle="collapse"
                          data-bs-target="#accordionCustomOne"
                          aria-expanded="true"
                          aria-controls="accordionCustomOne">
                          Data Lembata
                        </button>
                      </h2>

                      <div
                        id="accordionCustomOne"
                        class="accordion-collapse collapse show"
                        aria-labelledby="headingCustomOne"
                        data-bs-parent="#accordionCustom">
                        <div class="accordion-body">
                            <h5 class="mb-4">Data Lembaga</h5>
        <table class="table table-bordered table-striped mb-3">
            <tbody>
                <tr>
                    <td>Nama Lembaga</td>
                    <td>: <?= $detail->nama_lembaga ?></td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td>: <?= $detail->kategori ?></td>
                </tr>
                <tr>
                    <td>Jenjang</td>
                    <td>: <?= $detail->jenjang ?></td>
                </tr>
                <tr>
                    <td>Kopertais</td>
                    <td>: <?= $detail->kopertais ?></td>
                </tr>
                <tr>
                    <td>No. Telepon</td>
                    <td>: <?= $detail->telepon ?></td>
                </tr>
                <tr>
                    <td>No. HP</td>
                    <td>: <?= $detail->no_hp ?></td>
                </tr>
            </tbody>
        </table>
        <h5 class="mb-4">Alamat Lembaga</h5>
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <td>Provinsi</td>
                    <td>: <?= $detail->provinsi ?></td>
                </tr>
                <tr>
                    <td>Kabupaten/Kota</td>
                    <td>: <?= $detail->kab_kota ?></td>
                </tr>
                <tr>
                    <td>Kecamatan</td>
                    <td>: <?= $detail->kecamatan ?></td>
                </tr>
                <tr>
                    <td>Kelurahan</td>
                    <td>: <?= $detail->kelurahan ?></td>
                </tr>
                <tr>
                    <td>Kode Pos</td>
                    <td>: <?= $detail->kode_pos ?></td>
                </tr>
                <tr>
                    <td>Alamat Lengkap</td>
                    <td>: <?= $detail->alamat ?></td>
                </tr>
            </tbody>
        </table>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingCustomTwo">
                        <button
                          type="button"
                          class="accordion-button collapsed"
                          data-bs-toggle="collapse"
                          data-bs-target="#accordionCustomTwo"
                          aria-expanded="false"
                          aria-controls="accordionCustomTwo">
                          Dokumen Pendukung
                        </button>
                      </h2>
                      <div
                        id="accordionCustomTwo"
                        class="accordion-collapse collapse"
                        aria-labelledby="headingCustomTwo"
                        data-bs-parent="#accordionCustom">
                        <div class="accordion-body">
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
                    </div>
                  </div>
</div>
    <div class="col-sm-6">
        <div class="card mb-3">
    <div class="card-body">
        <h5 class="mb-4">Penilaian</h5>
        <form action="">
          <div class="mb-6">
            <label class="form-label" for="basic-default-fullname">Skor</label>
            <input type="text" class="form-control" id="skor" name="skor" value="<?= $asesmen->skor?>" disabled>
          </div>
          <div class="mb-6">
            <label class="form-label" for="basic-default-fullname">Lampiran Penilaian</label>
            <?= ($asesmen->file_hasil)?'<a href="'.base_url('uploads/nilai/'.$asesmen->file_hasil).'" target="_blank">'.$asesmen->file_hasil.'</a>':'Belum unggah';?>
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