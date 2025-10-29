<?= $this->extend('user/template') ?>
<?= $this->section('content') ?>
<h4 class="text-center mb-1">
  Alih Bentuk PTKIS
</h4>
<p class="text-center mb-12">
  Lengkapi data usulan Alih Bentuk PTKIS berikut ini.
</p>
<?php if($usulan->status == 21): ?>
                <div class="alert alert-danger" role="alert">
                    <h5 class="alert-heading mb-2">Alasan Dikembalikan</h5>
                    <p class="mb-0"><?= $usulan->keterangan?></p>
                </div>
            <?php endif; ?>
<div id="wizard-validation" class="bs-stepper mt-2">
                    <div class="bs-stepper-header">
                      <div class="step" data-target="#account-details-validation">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">1</span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Informasi Lembaga</span>
                            <span class="bs-stepper-subtitle">Alih Bentuk Lembaga</span>
                          </span>
                        </button>
                      </div>
                      <div class="line">
                        <i class="icon-base ti tabler-chevron-right"></i>
                      </div>
                      <div class="step" data-target="#personal-info-validation">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">2</span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Informasi Kelembagaan</span>
                            <span class="bs-stepper-subtitle">Isi dengan data yang sesuai</span>
                          </span>
                        </button>
                      </div>
                      <div class="line">
                        <i class="icon-base ti tabler-chevron-right"></i>
                      </div>
                      <div class="step" data-target="#document-validation">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">3</span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Dokumen Persyaratan</span>
                            <span class="bs-stepper-subtitle">Dokumen Persyaratan Pendukung</span>
                          </span>
                        </button>
                      </div>
                    </div>
                    <div class="bs-stepper-content">
                      <!-- <form id="wizard-validation-form" onSubmit="return false"> -->
                        <div id="wizard-validation-form">
                        <input type="hidden" name="usul_id" id="usul_id" value="<?= $usulan->id?>">
                        <!-- Personal Info -->
                        <div id="account-details-validation" class="content">
                          <div class="content-header mb-4">
                            <h6 class="mb-0">Informasi Permohonan Alih Bentuk</h6>
                            <small>Lengkapi Informasi di bawah ini.</small>
                          </div>
                          <div class="row g-6">
                            <div class="col-sm-6">
                                <div class="mb-3 form-control-validation">
                                  <label class="form-label" for="nomor_surat">Nomor Surat Pengantar</label>
                                  <input type="text" id="nomor_surat" name="nomor_surat" class="form-control" value="<?= $usulan->nomor_surat?>" />
                                </div>
                                <div class="mb-3 form-control-validation">
                                  <label class="form-label" for="perihal">Perihal</label>
                                  <input type="text" id="perihal" name="perihal" class="form-control" value="<?= $usulan->perihal?>" />
                                </div>

                            </div>
                            <div class="col-sm-6">
                              <div class="mb-3 form-control-validation">
                                  <label class="form-label" for="nama_lembaga">Nama Lembaga Lama</label>
                                  <input type="text" id="nama_lembaga" name="nama_lembaga" class="form-control" value="<?= $detail->nama_lembaga?>" />
                                </div>
                              <div class="mb-3 form-control-validation">
                                  <label class="form-label" for="alamat_lembaga">Alamat Lembaga Lama</label>
                                  <input type="text" id="alamat_lembaga" name="alamat_lembaga" class="form-control" value="<?= $detail->alamat_lembaga?>" />
                                </div>
                              <div class="mb-3 form-control-validation">
                                  <label class="form-label" for="nama_lembaga_baru">Nama Lembaga Baru</label>
                                  <input type="text" id="nama_lembaga_baru" name="nama_lembaga_baru" class="form-control" value="<?= $detail->nama_lembaga_baru?>" />
                                </div>
                                <div class="mb-3 form-control-validation">
                                    <label class="form-label" for="kategori">Kategori Lembaga Baru</label>
                                    <select class="form-select select2" id="kategori" name="kategori">
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
                            </div>
                            
                            <div class="col-12 d-flex justify-content-between">
                              <button class="btn btn-label-secondary btn-prev">
                                <i class="icon-base ti tabler-arrow-left icon-xs me-sm-2 me-0"></i>
                                <span class="align-middle d-sm-inline-block d-none">Sebelumnya</span>
                              </button>
                              <button class="btn btn-primary btn-next">
                                <span class="align-middle d-sm-inline-block d-none me-sm-2">Simpan & Selanjutnya</span>
                                <i class="icon-base ti tabler-arrow-right icon-xs"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                        <div id="personal-info-validation" class="content">
                          <div class="content-header mb-4">
                            <h6 class="mb-0">Informasi Permohonan Alih Bentuk</h6>
                            <small>Lengkapi Informasi di bawah ini.</small>
                          </div>
                          <div class="row g-6">
                            <div class="col-sm-6">
                              <h5>Data Dosen</h5>
                                <div class="mb-3 form-control-validation">
                                  <label class="form-label" for="magister">Jumlah Magister</label>
                                  <input type="number" id="magister" name="magister" class="form-control" value="<?= $detail->magister?>" />
                                </div>
                                <div class="mb-3 form-control-validation">
                                  <label class="form-label" for="doktor">Jumlah Doktor</label>
                                  <input type="number" id="doktor" name="doktor" class="form-control" value="<?= $detail->doktor?>" />
                                </div>
                                <div class="mb-3 form-control-validation">
                                  <label class="form-label" for="asisten_ahli">Jumlah Asisten Ahli</label>
                                  <input type="number" id="asisten_ahli" name="asisten_ahli" class="form-control" value="<?= $detail->asisten_ahli?>" />
                                </div>
                                <div class="mb-3 form-control-validation">
                                  <label class="form-label" for="lektor">Jumlah Lektor</label>
                                  <input type="number" id="lektor" name="lektor" class="form-control" value="<?= $detail->lektor?>" />
                                </div>
                                <div class="mb-3 form-control-validation">
                                  <label class="form-label" for="lektor_kepala">Jumlah Lektor Kepala</label>
                                  <input type="number" id="lektor_kepala" name="lektor_kepala" class="form-control" value="<?= $detail->lektor_kepala?>" />
                                </div>
                                <div class="mb-3 form-control-validation">
                                  <label class="form-label" for="guru_besar">Jumlah Guru Besar</label>
                                  <input type="number" id="guru_besar" name="guru_besar" class="form-control" value="<?= $detail->guru_besar?>" />
                                </div>

                            </div>
                            <div class="col-sm-6">
                              <h5>Akreditasi</h5>
                              <div class="mb-3 form-control-validation">
                                  <label class="form-label" for="akreditasi_no">Tidak Terakreditasi</label>
                                  <input type="number" id="akreditasi_no" name="akreditasi_no" class="form-control" value="<?= $detail->akreditasi_no?>" />
                              </div>
                              <div class="mb-3 form-control-validation">
                                  <label class="form-label" for="akreditasi_unggul">Jumlah Prodi Terakreditasi Unggul/A</label>
                                  <input type="number" id="akreditasi_unggul" name="akreditasi_unggul" class="form-control" value="<?= $detail->akreditasi_unggul?>" />
                              </div>
                              <div class="mb-3 form-control-validation">
                                  <label class="form-label" for="akreditasi_baiksekali">Jumlah Prodi Terakreditasi Baik Sekali/B</label>
                                  <input type="number" id="akreditasi_baiksekali" name="akreditasi_baiksekali" class="form-control" value="<?= $detail->akreditasi_baiksekali?>" />
                              </div>
                              <div class="mb-3 form-control-validation">
                                  <label class="form-label" for="akreditasi_baik">Jumlah Prodi Terakreditasi Baik</label>
                                  <input type="number" id="akreditasi_baik" name="akreditasi_baik" class="form-control" value="<?= $detail->akreditasi_baik?>" />
                              </div>
                              <h5>Data Lainnya</h5>
                              <div class="mb-3 form-control-validation">
                                  <label class="form-label" for="mahasiswa">Jumlah Mahasiswa</label>
                                  <input type="number" id="mahasiswa" name="mahasiswa" class="form-control" value="<?= $detail->mahasiswa?>" />
                              </div>
                              <div class="mb-3 form-control-validation">
                                  <label class="form-label" for="rasio_dm">Jumlah Rasio Dosen:Mahasiswa (Contoh: 1:24)</label>
                                  <input type="text" id="rasio_dm" name="rasio_dm" class="form-control" value="<?= $detail->rasio_dm?>" />
                              </div>
                              <div class="mb-3 form-control-validation">
                                  <label class="form-label" for="fakultas">Jumlah Fakultas</label>
                                  <input type="number" id="fakultas" name="fakultas" class="form-control" value="<?= $detail->fakultas?>" />
                              </div>
                              <div class="mb-3 form-control-validation">
                                  <label class="form-label" for="prodi">Jumlah Prodi</label>
                                  <input type="number" id="prodi" name="prodi" class="form-control" value="<?= $detail->prodi?>" />
                              </div>
                              <div class="mb-3 form-control-validation">
                                  <label class="form-label" for="pelaporan">Pelaporan PD Dikti (Contoh: 1-100)</label>
                                  <input type="number" id="pelaporan" name="pelaporan" class="form-control" value="<?= $detail->pelaporan?>" />
                              </div>
                              <div class="mb-3 form-control-validation">
                                <label class="form-label" for="tanah">Luas Tanah</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" aria-describedby="basic-addon13" value="<?= $detail->tanah?>" name="tanah" id="tanah"/>
                                  <span class="input-group-text" id="tanah">M²</span>
                                </div>
                              </div>
                              <div class="mb-3 form-control-validation">
                                  <label class="form-label" for="kepemilikan_tanah">Kepemilikan Tanah</label>
                                  <select name="kepemilikan_tanah" id="kepemilikan_tanah" class="form-select">
                                    <option value="Perorangan">Perorangan</option>
                                    <option value="Yayasan">Yayasan</option>
                                  </select>
                              </div>
                            </div>
                            </div>
                            
                            <div class="col-12 d-flex justify-content-between">
                              <button class="btn btn-label-secondary btn-prev">
                                <i class="icon-base ti tabler-arrow-left icon-xs me-sm-2 me-0"></i>
                                <span class="align-middle d-sm-inline-block d-none">Sebelumnya</span>
                              </button>
                              <button class="btn btn-primary btn-next">
                                <span class="align-middle d-sm-inline-block d-none me-sm-2">Simpan & Selanjutnya</span>
                                <i class="icon-base ti tabler-arrow-right icon-xs"></i>
                              </button>
                            </div>
                          </div>
                        
                        <!-- Social Links -->
                        <div id="document-validation" class="content">
                          <div class="content-header mb-4">
                            <h6 class="mb-0">Dokumen Persyaratan</h6>
                            <small>Lengkapi Dokumen Persyaratan.</small>
                          </div>
                          <div class="row g-6">
                            <?php foreach($dokumens as $dokumen): ?>
                                <div class="col-sm-6">
                                <form method="POST" action="<?= site_url('dokumen/upload') ?>" id="form<?= $dokumen->id ?>" enctype="multipart/form-data">
                              <label class="form-label" for="dok<?= $dokumen->id?>"><strong><?= $dokumen->dokumen?></strong></label>
                              <div class="input-group">
                                    <input type="hidden" name="usul" value="<?= $usulan->id ?>">
                                    <input type="hidden" name="iddok" value="<?= $dokumen->id ?>">
                                    <input type="file" id="dok<?= $dokumen->id?>" name="dokumen" class="form-control" onchange="uploadfile('<?= $dokumen->id ?>')" accept=".pdf" />
                                    <?php if($dokumen->lampiran): ?>
                                    <button class="btn btn-outline-primary waves-effect" type="button" id="button-addon2" onclick="preview('<?= base_url('uploads/'.$dokumen->lampiran) ?>')">View</button>
                                    <?php else: ?>
                                    <button class="btn btn-outline-primary waves-effect" type="button" id="btn<?= $dokumen->id ?>" onclick="" disabled>View</button>
                                    <?php endif; ?>
                                </div>
                                <?php if($dokumen->dok_status == 0 && $dokumen->keterangan): ?>
                                <p class="text-danger"><?= $dokumen->keterangan ?></p>
                                <?php endif; ?>

                            </form>
                            </div>
                            <?php endforeach; ?>
                            <div class="col-12 d-flex justify-content-between">
                              <button class="btn btn-label-secondary btn-prev">
                                <i class="icon-base ti tabler-arrow-left icon-xs me-sm-2 me-0"></i>
                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                              </button>
                              <!-- <button class="btn btn-success btn-next btn-submit">Submit</button> -->
                              <a href="#" class="btn btn-success" onclick="confirmSubmit()">Submit</a>
                            </div>
                          </div>
                        </div>
                        </div>
                      <!-- </form> -->
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
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="<?= base_url()?>assets/vendor/libs/@form-validation/popular.js"></script>
<script src="<?= base_url()?>assets/vendor/libs/@form-validation/bootstrap5.js"></script>
<script src="<?= base_url()?>assets/vendor/libs/@form-validation/auto-focus.js"></script>
<script src="<?= base_url()?>assets/js/form-alihbentuk-ptkis.js?v=1.1"></script>
<script src="https://malsup.github.io/jquery.form.js" charset="utf-8"></script>
<script>
function uploadfile(id) {
  $('#form'+id).ajaxSubmit({
    // target: '#output'+id,
    beforeSubmit: function(a,f,o) {
      alert('Mengunggah');
    },
    success: function(responseText, statusText, xhr, $form) {

      if(responseText.status == 'error'){
        Swal.fire({title:"Ooppss...",text:responseText.message,icon:"error",confirmButtonColor:"#5b73e8"});
      }else{
        $('#output'+id).html(responseText.message);
        Swal.fire({html:"Dokumen telah diunggah",confirmButtonColor:"#5b73e8"});
        $('#btn'+id).removeAttr('disabled');
        $('#btn'+id).attr('onclick',"preview('<?= base_url()?>uploads/"+responseText.file+"')");

        if ($("table:contains('Belum Diunggah')").length == 0) {
        //   $('#v-pills-3-tab').removeAttr('disabled');
        }
      }
    }
  });
}

function preview(berkas) {
  $('#object').html('<object data="'+berkas+'" type="application/pdf" width="100%" style="height: 80vh;" id="object">'+
                      '<p>Browser tidak mendukung!</p>'+
                    '</object>');
  $('#preview').modal('show');
}
</script>
<?= $this->endSection() ?>