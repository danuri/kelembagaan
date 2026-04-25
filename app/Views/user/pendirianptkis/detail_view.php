<?= $this->extend('user/template2') ?>
<?= $this->section('content') ?>

<h4 class="mb-1">
  Detail Usulan Pendirian PTKIS
</h4>
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
            </div>
        </div>
    </div>
</div>
<div class="nav-align-top nav-tabs-shadow">
                    <ul class="nav nav-tabs" role="tablist">
                      <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link active"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#navs-top-data"
                          aria-controls="navs-top-data"
                          aria-selected="true">
                          Data Usulan
                        </button>
                      </li>
                      <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#navs-top-prodi"
                          aria-controls="navs-top-prodi"
                          aria-selected="false">
                          Program Studi
                        </button>
                      </li>
                      <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#navs-top-dokumen"
                          aria-controls="navs-top-dokumen"
                          aria-selected="false">
                          Dokumen
                        </button>
                      </li>
                    </ul>
                    <div class="tab-content">
                      <div class="tab-pane fade show active" id="navs-top-data" role="tabpanel">
                        
                        <div class="row g-6">
                            <div class="col-sm-6">
                                <div class="mb-3 form-control-validation">
                                  <label class="form-label" for="nama_lembaga">Nama Lembaga</label>
                                  <input type="text" id="nama_lembaga" name="nama_lembaga" class="form-control" value="<?= $detail->nama_lembaga?>" disabled />
                                </div>

                                <div class="mb-3 form-control-validation">
                                    <label class="form-label" for="kategori">Kategori</label>
                                    <select class="form-select select2" id="kategori" name="kategori" disabled>
                                        <?php if ($detail->kategori): ?>
                                        <option value="<?= $detail->kategori ?>" selected><?= $detail->kategori ?></option>
                                        <?php endif; ?>
                                        <option label=" "></option>
                                        <option value="SEKOLAH TINGGI" <?= $detail->kategori === 'SEKOLAH TINGGI' ? 'selected' : '' ?>>SEKOLAH TINGGI</option>
                                        <option value="INSTITUT" <?= $detail->kategori === 'INSTITUT' ? 'selected' : '' ?>>INSTITUT</option>
                                        <option value="UNIVERSITAS" <?= $detail->kategori === 'UNIVERSITAS' ? 'selected' : '' ?>>UNIVERSITAS</option>
                                        <option value="FAKULTAS AGAMA ISLAM" <?= $detail->kategori === 'FAKULTAS AGAMA ISLAM' ? 'selected' : '' ?>>FAKULTAS AGAMA ISLAM</option>
                                    </select>
                                </div>

                                <div class="mb-3 form-control-validation">
                                <label class="form-label" for="jenjang">Jenjang</label>
                                <select class="form-select select2" id="jenjang" name="jenjang" disabled>
                                    <option label=" "></option>
                                    <option value="S1" <?= $detail->jenjang === 'S1' ? 'selected' : '' ?>>S1</option>
                                    <option value="S2" <?= $detail->jenjang === 'S2' ? 'selected' : '' ?>>S2</option>
                                    <option value="S3" <?= $detail->jenjang === 'S3' ? 'selected' : '' ?>>S3</option>
                                </select>
                                </div>
                                <div class="mb-3 form-control-validation">
                                <label class="form-label" for="kopertais">Kopertais</label>
                                <select class="form-select select2" id="kopertais" name="kopertais" disabled>
                                    <?php for($i=1; $i<=15; $i++): ?>
                                    <option value="KOPERTAIS <?= $i ?>" <?= $detail->kopertais === "KOPERTAIS $i" ? 'selected' : '' ?>>KOPERTAIS <?= $i ?></option>
                                    <?php endfor; ?>
                                </select>
                                </div>
                                <div class="mb-3 form-control-validation">
                                <label class="form-label" for="telepon">No. Telepon</label>
                                <input type="text" id="telepon" name="telepon" class="form-control" value="<?= $detail->telepon?>" disabled />
                                </div>
                                <div class="mb-3 form-control-validation">
                                <label class="form-label" for="no_hp">No. HP</label>
                                <input type="text" id="no_hp" name="no_hp" class="form-control" value="<?= $detail->no_hp?>" disabled />
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3 form-control-validation">
                                <label class="form-label" for="provinsi">Provinsi</label>
                                <select class="form-select select2" id="provinsi" name="provinsi" disabled>
                                    <option label=" "></option>
                                    <?php foreach($provinces as $province): ?>
                                    <option value="<?= $province->id ?>" <?= $detail->provinsi === $province->id ? 'selected' : '' ?>><?= $province->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                                </div>        
                                <div class="mb-3 form-control-validation">
                                <label class="form-label" for="kabupaten">Kabupaten</label>
                                <select class="form-select select2" id="kabupaten" name="kabupaten" disabled>
                                    <?php if ($detail->kab_kota): ?>
                                    <option value="<?= $detail->kab_kota ?>" selected><?= $detail->kab_kota ?></option>
                                    <?php else: ?>
                                    <option label=" "></option>
                                    <?php endif; ?>
                                </select>
                                </div>
                                <div class="mb-3 form-control-validation">
                                <label class="form-label" for="kecamatan">Kecamatan</label>
                                <select class="form-select select2" id="kecamatan" name="kecamatan" disabled>
                                    <?php if ($detail->kecamatan): ?>
                                    <option value="<?= $detail->kecamatan ?>" selected><?= $detail->kecamatan ?></option>
                                    <?php else: ?>
                                        <option label=" "></option>
                                    <?php endif; ?>
                                </select>
                                </div>
                                <div class="mb-3 form-control-validation">
                                <label class="form-label" for="kelurahan">Kelurahan</label>
                                <select class="form-select select2" id="kelurahan" name="kelurahan" disabled>
                                    <?php if ($detail->kelurahan): ?>
                                    <option value="<?= $detail->kelurahan ?>" selected><?= $detail->kelurahan ?></option>
                                    <?php else: ?>
                                    <option label=" "></option>
                                    <?php endif; ?>
                                </select>
                                </div>
                                <div class="mb-3 form-control-validation">
                                <label class="form-label" for="kode_pos">Kode POS</label>
                                <input type="text" id="kode_pos" name="kode_pos" class="form-control" value="<?= $detail->kode_pos?>" disabled />
                                </div>
                                <div class="mb-3 form-control-validation">
                                <label class="form-label" for="jalan">Jalan, No.</label>
                                <input type="text" id="jalan" name="jalan" class="form-control" value="<?= $detail->alamat?>" disabled />
                                </div>
                            </div>
                          </div>
                      </div>
                      <div class="tab-pane fade show active" id="navs-top-prodi" role="tabpanel">
                        <div class="row">
                            <!-- table prodi -->
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Nama Program Studi</th>
                                    <th>Jenjang</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if (empty($prodi)): ?>
                                    <tr>
                                    <td colspan="2" class="text-center">Tidak ada data program studi</td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($prodi as $p): ?>
                                    <tr>
                                        <td><?= $p->nama_prodi ?></td>
                                        <td><?= $p->jenjang ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="navs-top-dokumen" role="tabpanel">
                        <div class="row g-6">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Dokumen</th>
                                        <th>Lampiran</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($dokumens as $dokumen): ?>
                                    <tr>
                                        <td><?= $dokumen->dokumen ?></td>
                                        <td>
                                            <?php if($dokumen->lampiran): ?>
                                            <button class="btn btn-outline-primary waves-effect" type="button" id="button-addon2" onclick="preview('<?= base_url('uploads/'.$dokumen->lampiran) ?>')">View</button>
                                            <?php else: ?>
                                            <button class="btn btn-outline-primary waves-effect" type="button" id="btn<?= $dokumen->id ?>" onclick="" disabled>View</button>
                                            <?php endif; ?>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            
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
                <a href="" target="_blank" class="btn btn-primary" id="previewfile">Buka Tab Baru</a>
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
  $('#previewfile').attr('href', berkas);
  $('#preview').modal('show');
}
</script>
<?= $this->endSection() ?>