<?= $this->extend('user/template') ?>
<?= $this->section('content') ?>

<h4 class="mb-1">
  Detail Usulan Alih Bentuk PTKIS
</h4>
<div class="card shadow-none bg-label-success mb-3">
    <div class="card-body">
        <div class="row g-6">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Nomor Surat</h6>
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
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $usulan->nama_lembaga?></div>
                </div>
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Tanggal Usul</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $usulan->submit_at?></div>
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
                          Data Pengusul
                        </button>
                      </li>
                      <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#navs-top-lembaga"
                          aria-controls="navs-top-data"
                          aria-selected="true">
                          Data Lembaga
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
                                
                            </div>
                          </div>
                      </div>
                      <div class="tab-pane fade" id="navs-top-lembaga" role="tabpanel">
                        
                        <div class="row g-6">
                            <div class="col-sm-6">
                              <h5>Data Dosen</h5>
                                <div class="mb-3 form-control-validation">
                                  <label class="form-label" for="magister">Jumlah Magister</label>
                                  <input type="number" id="magister" name="magister" class="form-control" value="<?= $detail->magister?>" disabled />
                                </div>
                                <div class="mb-3 form-control-validation">
                                  <label class="form-label" for="doktor">Jumlah Doktor</label>
                                  <input type="number" id="doktor" name="doktor" class="form-control" value="<?= $detail->doktor?>" disabled />
                                </div>
                                <div class="mb-3 form-control-validation">
                                  <label class="form-label" for="asisten_ahli">Jumlah Asisten Ahli</label>
                                  <input type="number" id="asisten_ahli" name="asisten_ahli" class="form-control" value="<?= $detail->asisten_ahli?>" disabled />
                                </div>
                                <div class="mb-3 form-control-validation">
                                  <label class="form-label" for="lektor">Jumlah Lektor</label>
                                  <input type="number" id="lektor" name="lektor" class="form-control" value="<?= $detail->lektor?>" disabled />
                                </div>
                                <div class="mb-3 form-control-validation">
                                  <label class="form-label" for="lektor_kepala">Jumlah Lektor Kepala</label>
                                  <input type="number" id="lektor_kepala" name="lektor_kepala" class="form-control" value="<?= $detail->lektor_kepala?>" disabled />
                                </div>
                                <div class="mb-3 form-control-validation">
                                  <label class="form-label" for="guru_besar">Jumlah Guru Besar</label>
                                  <input type="number" id="guru_besar" name="guru_besar" class="form-control" value="<?= $detail->guru_besar?>" disabled />
                                </div>

                            </div>
                            <div class="col-sm-6">
                              <h5>Akreditasi</h5>
                              <div class="mb-3 form-control-validation">
                                  <label class="form-label" for="akreditasi_no">Tidak Terakreditasi</label>
                                  <input type="number" id="akreditasi_no" name="akreditasi_no" class="form-control" value="<?= $detail->akreditasi_no?>" disabled />
                              </div>
                              <div class="mb-3 form-control-validation">
                                  <label class="form-label" for="akreditasi_unggul">Jumlah Prodi Terakreditasi Unggul/A</label>
                                  <input type="number" id="akreditasi_unggul" name="akreditasi_unggul" class="form-control" value="<?= $detail->akreditasi_unggul?>" disabled />
                              </div>
                              <div class="mb-3 form-control-validation">
                                  <label class="form-label" for="akreditasi_baiksekali">Jumlah Prodi Terakreditasi Baik Sekali/B</label>
                                  <input type="number" id="akreditasi_baiksekali" name="akreditasi_baiksekali" class="form-control" value="<?= $detail->akreditasi_baiksekali?>" disabled />
                              </div>
                              <div class="mb-3 form-control-validation">
                                  <label class="form-label" for="akreditasi_baik">Jumlah Prodi Terakreditasi Baik</label>
                                  <input type="number" id="akreditasi_baik" name="akreditasi_baik" class="form-control" value="<?= $detail->akreditasi_baik?>" disabled />
                              </div>
                              <h5>Data Lainnya</h5>
                              <div class="mb-3 form-control-validation">
                                  <label class="form-label" for="mahasiswa">Jumlah Mahasiswa</label>
                                  <input type="number" id="mahasiswa" name="mahasiswa" class="form-control" value="<?= $detail->mahasiswa?>" disabled />
                              </div>
                              <div class="mb-3 form-control-validation">
                                  <label class="form-label" for="rasio_dm">Jumlah Rasio Dosen:Mahasiswa (Contoh: 1:24)</label>
                                  <input type="text" id="rasio_dm" name="rasio_dm" class="form-control" value="<?= $detail->rasio_dm?>" disabled />
                              </div>
                              <div class="mb-3 form-control-validation">
                                  <label class="form-label" for="fakultas">Jumlah Fakultas</label>
                                  <input type="number" id="fakultas" name="fakultas" class="form-control" value="<?= $detail->fakultas?>" disabled />
                              </div>
                              <div class="mb-3 form-control-validation">
                                  <label class="form-label" for="prodi">Jumlah Prodi</label>
                                  <input type="number" id="prodi" name="prodi" class="form-control" value="<?= $detail->prodi?>" disabled />
                              </div>
                              <div class="mb-3 form-control-validation">
                                  <label class="form-label" for="pelaporan">Pelaporan PD Dikti (Contoh: 1-100)</label>
                                  <input type="number" id="pelaporan" name="pelaporan" class="form-control" value="<?= $detail->pelaporan?>" disabled />
                              </div>
                              <div class="mb-3 form-control-validation">
                                <label class="form-label" for="tanah">Luas Tanah</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" aria-describedby="basic-addon13" value="<?= $detail->tanah?>" name="tanah" id="tanah" disabled />
                                  <span class="input-group-text" id="tanah">M²</span>
                                </div>
                              </div>
                              <div class="mb-3 form-control-validation">
                                  <label class="form-label" for="kepemilikan_tanah">Kepemilikan Tanah</label>
                                  <select name="kepemilikan_tanah" id="kepemilikan_tanah" class="form-select" disabled>
                                    <option value="<?= $detail->kepemilikan_tanah?>" selected><?= $detail->kepemilikan_tanah?></option>
                                  </select>
                              </div>
                            </div>
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