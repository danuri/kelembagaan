<?= $this->extend('user/template') ?>
<?= $this->section('content') ?>
<h4 class="text-center mb-1">
  Pendirian PTKIS
</h4>
<p class="text-center mb-12">
  Not just a set of tools, the package includes ready-to-deploy conceptual application.
</p>
<div class="bs-stepper wizard-numbered mt-2">
                    <div class="bs-stepper-header">
                      <div class="step" data-target="#account-details">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">1</span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Data Pemohon</span>
                            <span class="bs-stepper-subtitle">Kelengkapan data pemohon</span>
                          </span>
                        </button>
                      </div>
                      <div class="line">
                        <i class="icon-base ti tabler-chevron-right"></i>
                      </div>
                      <div class="step" data-target="#personal-info">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">2</span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Data Lembaga</span>
                            <span class="bs-stepper-subtitle">Data Lembaga yang diusulkan</span>
                          </span>
                        </button>
                      </div>
                      <div class="line">
                        <i class="icon-base ti tabler-chevron-right"></i>
                      </div>
                      <div class="step" data-target="#social-links">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">3</span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Dokumen Pendukung</span>
                            <span class="bs-stepper-subtitle">Dokumen Persyaratan Pendirian</span>
                          </span>
                        </button>
                      </div>
                    </div>
                    <div class="bs-stepper-content">
                      <form onSubmit="return false">
                        
                        <!-- Account Details -->
                        <div id="account-details" class="content">
                          <div class="content-header mb-4">
                            <h6 class="mb-0">Data Pemohon</h6>
                          </div>
                          <div class="row g-6">
                            <div class="col-sm-6">
                              <label class="form-label" for="username">Nama Yayasan</label>
                              <input type="text" id="yayasan_nama" name="yayasan_nama" class="form-control" />
                            </div>
                            <div class="col-sm-6">
                              <label class="form-label" for="username">Alamat Yayasan</label>
                              <input type="text" id="yayasan_alamat" name="yayasan_alamat" class="form-control" />
                            </div>
                            <div class="col-sm-6">
                              <label class="form-label" for="username">No. SK</label>
                              <input type="text" id="yayasan_nosk" name="yayasan_nosk" class="form-control" />
                            </div>
                            <div class="col-sm-6">
                              <label class="form-label" for="username">Tanggal SK</label>
                              <input type="date" id="yayasan_tglsk" name="yayasan_tglsk" class="form-control" />
                            </div>
                            <div class="col-sm-6">
                              <label class="form-label" for="username">File SK</label>
                              <input type="file" id="yayasan_sk" name="yayasan_sk" class="form-control" />
                            </div>
                            
                            <div class="col-12 d-flex justify-content-between">
                              <button class="btn btn-label-secondary btn-prev" disabled>
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
                        <!-- Personal Info -->
                        <div id="personal-info" class="content">
                          <div class="content-header mb-4">
                            <h6 class="mb-0">Informasi Lembaga</h6>
                            <small>Lengkapi data lembaga.</small>
                          </div>
                          <div class="row g-6">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                  <label class="form-label" for="first-name">Nama Lembaga</label>
                                  <input type="text" id="first-name" class="form-control" />
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="country">Kategori</label>
                                    <select class="form-select select2" id="kategori" name="kategori">
                                        <option label=" "></option>
                                        <option value="SEKOLAH TINGGI">SEKOLAH TINGGI</option>
                                        <option value="INSTITUT">INSTITUT</option>
                                        <option value="UNIVERSITAS">UNIVERSITAS</option>
                                        <option value="FAKULTAS AGAMA ISLAM">FAKULTAS AGAMA ISLAM</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                <label class="form-label" for="country">Jenjang</label>
                                <select class="form-select select2" id="jenjang" name="jenjang">
                                    <option label=" "></option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
                                </div>
                                <div class="mb-3">
                                <label class="form-label" for="country">Kopertais</label>
                                <select class="form-select select2" id="kopertais" name="kopertais">
                                    <?php for($i=1; $i<=15; $i++): ?>
                                    <option value="KOPERTAIS <?= $i ?>">KOPERTAIS <?= $i ?></option>
                                    <?php endfor; ?>
                                </select>
                                </div>
                                <div class="mb-3">
                                <label class="form-label" for="country">No. Telepon</label>
                                <input type="text" id="no_telepon" name="no_telepon" class="form-control" />
                                </div>
                                <div class="mb-3">
                                <label class="form-label" for="country">No. HP</label>
                                <input type="text" id="no_hp" name="no_hp" class="form-control" />
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                <label class="form-label" for="country">Provinsi</label>
                                <select class="form-select select2" id="provinsi" name="provinsi">
                                    <option label=" "></option>
                                    <?php foreach($provinces as $province): ?>
                                    <option value="<?= $province->id ?>"><?= $province->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                                </div>        
                                <div class="mb-3">
                                <label class="form-label" for="country">Kabupaten</label>
                                <select class="form-select select2" id="kabupaten" name="kabupaten">
                                    <option label=" "></option>
                                </select>
                                </div>
                                <div class="mb-3">
                                <label class="form-label" for="country">Kecamatan</label>
                                <select class="form-select select2" id="kecamatan" name="kecamatan">
                                    <option label=" "></option>
                                </select>
                                </div>
                                <div class="mb-3">
                                <label class="form-label" for="country">Kelurahan</label>
                                <select class="form-select select2" id="kecamatan" name="kecamatan">
                                    <option label=" "></option>
                                </select>
                                </div>
                                <div class="mb-3">
                                <label class="form-label" for="country">Kode POS</label>
                                <input type="text" id="kode_pos" name="kode_pos" class="form-control" />
                                </div>
                                <div class="mb-3">
                                <label class="form-label" for="country">Jalan, No.</label>
                                <input type="text" id="jalan" name="jalan" class="form-control" />
                                </div>
                            </div>
                            
                            <div class="col-12 d-flex justify-content-between">
                              <button class="btn btn-label-secondary btn-prev">
                                <i class="icon-base ti tabler-arrow-left icon-xs me-sm-2 me-0"></i>
                                <span class="align-middle d-sm-inline-block d-none">Sebelumnya</span>
                              </button>
                              <button class="btn btn-primary btn-next">
                                <span class="align-middle d-sm-inline-block d-none me-sm-2">Selanjutnya</span>
                                <i class="icon-base ti tabler-arrow-right icon-xs"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                        <!-- Social Links -->
                        <div id="social-links" class="content">
                          <div class="content-header mb-4">
                            <h6 class="mb-0">Dokumen Persyaratan</h6>
                            <small>Pastikan semua dokumen telah diunggah.</small>
                          </div>
                          <div class="row g-6">
                            <?php foreach($dokumens as $dokumen): ?>
                            <div class="col-sm-6">
                              <label class="form-label" for="dok<?= $dokumen->id?>"><strong><?= $dokumen->dokumen?></strong></label>
                              <div class="input-group">
                                    <input type="file" id="dok<?= $dokumen->id?>" name="dok<?= $dokumen->id?>" class="form-control" />
                                    <button class="btn btn-outline-primary waves-effect" type="button" id="button-addon2">View</button>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            
                            <div class="col-12 d-flex justify-content-between">
                              <button class="btn btn-label-secondary btn-prev">
                                <i class="icon-base ti tabler-arrow-left icon-xs me-sm-2 me-0"></i>
                                <span class="align-middle d-sm-inline-block d-none">Sebelumnya</span>
                              </button>
                              <button class="btn btn-success btn-submit">Simpan</button>
                              <button class="btn btn-primary btn-submit">Kirim Usulan</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>


<?= $this->endSection() ?>
<?= $this->section('scripts');?>
<script src="<?= base_url()?>assets/js/form-pendirian-ptkis.js"></script>
<script>
</script>
<?= $this->endSection() ?>