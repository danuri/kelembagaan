<?= $this->extend('user/template2') ?>
<?= $this->section('content') ?>
<h4 class="text-center mb-1">
  Pendirian PTKIS
</h4>
<p class="text-center mb-12">
  Not just a set of tools, the package includes ready-to-deploy conceptual application.
</p>
<?php if ($usulan->status == 21): ?>
  <div class="alert alert-danger" role="alert">
    <h5 class="alert-heading mb-2">Alasan Dikembalikan</h5>
    <p class="mb-0"><?= $usulan->keterangan ?></p>
  </div>
<?php endif; ?>
<div id="wizard-validation" class="bs-stepper mt-2">
  <div class="bs-stepper-header">
    <div class="step" data-target="#account-details-validation">
      <button type="button" class="step-trigger">
        <span class="bs-stepper-circle">1</span>
        <span class="bs-stepper-label mt-1">
          <span class="bs-stepper-title">Informasi Pemohon</span>
          <span class="bs-stepper-subtitle">Data Yayasan</span>
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
          <span class="bs-stepper-title">Informasi Lembaga</span>
          <span class="bs-stepper-subtitle">Pendirian Lembaga</span>
        </span>
      </button>
    </div>
    <div class="line">
      <i class="icon-base ti tabler-chevron-right"></i>
    </div>
    <div class="step" data-target="#social-links-validation">
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
      <input type="hidden" name="usul_id" id="usul_id" value="<?= $usulan->id ?>">
      <!-- Account Details -->
      <div id="account-details-validation" class="content">
        <div class="content-header mb-4">
          <h6 class="mb-0">Data Pemohon</h6>
          <small>Lengkapi Data Pemohon.</small>
        </div>
        <div class="row g-6">
          <div class="col-sm-6 form-control-validation">
            <label class="form-label" for="username">Nama Yayasan</label>
            <input type="text" id="yayasan_nama" name="yayasan_nama" class="form-control"
              value="<?= $detail->yayasan_nama ?>" />
          </div>
          <div class="col-sm-6 form-control-validation">
            <label class="form-label" for="username">Alamat Yayasan</label>
            <input type="text" id="yayasan_alamat" name="yayasan_alamat" class="form-control"
              value="<?= $detail->yayasan_alamat ?>" />
          </div>
          <div class="col-sm-6 form-control-validation">
            <label class="form-label" for="username">No. SK</label>
            <input type="text" id="yayasan_nosk" name="yayasan_nosk" class="form-control"
              value="<?= $detail->yayasan_nosk ?>" />
          </div>
          <div class="col-sm-6 form-control-validation">
            <label class="form-label" for="username">Tanggal SK</label>
            <input type="date" id="yayasan_tglsk" name="yayasan_tglsk" class="form-control"
              value="<?= $detail->yayasan_tglsk ?>" />
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
      <div id="personal-info-validation" class="content">
        <div class="content-header mb-4">
          <h6 class="mb-0">Informasi Lembaga</h6>
          <small>Lengkapi Informasi Lembaga.</small>
        </div>
        <div class="row g-6">
          <div class="col-sm-6">
            <div class="mb-3 form-control-validation">
              <label class="form-label" for="nama_lembaga">Nama Lembaga</label>
              <input type="text" id="nama_lembaga" name="nama_lembaga" class="form-control"
                value="<?= $detail->nama_lembaga ?>" />
            </div>

            <div class="mb-3 form-control-validation">
              <label class="form-label" for="kategori">Kategori</label>
              <select class="form-select select2" id="kategori" name="kategori">
                <?php if ($detail->kategori): ?>
                  <option value="<?= $detail->kategori ?>" selected><?= $detail->kategori ?></option>
                <?php endif; ?>
                <option label=" "></option>
                <option value="SEKOLAH TINGGI" <?= $detail->kategori === 'SEKOLAH TINGGI' ? 'selected' : '' ?>>SEKOLAH
                  TINGGI</option>
                <option value="INSTITUT" <?= $detail->kategori === 'INSTITUT' ? 'selected' : '' ?>>INSTITUT</option>
                <option value="UNIVERSITAS" <?= $detail->kategori === 'UNIVERSITAS' ? 'selected' : '' ?>>UNIVERSITAS
                </option>
                <option value="FAKULTAS AGAMA ISLAM" <?= $detail->kategori === 'FAKULTAS AGAMA ISLAM' ? 'selected' : '' ?>>
                  FAKULTAS AGAMA ISLAM</option>
              </select>
            </div>

            <div class="mb-3 form-control-validation">
              <label class="form-label" for="jenjang">Jenjang</label>
              <select class="form-select select2" id="jenjang" name="jenjang">
                <option label=" "></option>
                <option value="S1" <?= $detail->jenjang === 'S1' ? 'selected' : '' ?>>S1</option>
                <option value="S2" <?= $detail->jenjang === 'S2' ? 'selected' : '' ?>>S2</option>
                <option value="S3" <?= $detail->jenjang === 'S3' ? 'selected' : '' ?>>S3</option>
              </select>
            </div>
            <div class="mb-3 form-control-validation">
              <label class="form-label" for="kopertais">Kopertais</label>
              <select class="form-select select2" id="kopertais" name="kopertais">
                <?php for ($i = 1; $i <= 15; $i++): ?>
                  <option value="KOPERTAIS <?= $i ?>" <?= $detail->kopertais === "KOPERTAIS $i" ? 'selected' : '' ?>>
                    KOPERTAIS <?= $i ?></option>
                <?php endfor; ?>
              </select>
            </div>
            <div class="mb-3 form-control-validation">
              <label class="form-label" for="telepon">No. Telepon</label>
              <input type="text" id="telepon" name="telepon" class="form-control" value="<?= $detail->telepon ?>" />
            </div>
            <div class="mb-3 form-control-validation">
              <label class="form-label" for="no_hp">No. HP</label>
              <input type="text" id="no_hp" name="no_hp" class="form-control" value="<?= $detail->no_hp ?>" />
            </div>

          </div>
          <div class="col-sm-6">
            <div class="mb-3 form-control-validation">
              <label class="form-label" for="provinsi">Provinsi</label>
              <select class="form-select select2" id="provinsi" name="provinsi">
                <option label=" "></option>
                <?php foreach ($provinces as $province): ?>
                  <option value="<?= $province->id ?>" <?= $detail->provinsi === $province->id ? 'selected' : '' ?>>
                    <?= $province->name ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="mb-3 form-control-validation">
              <label class="form-label" for="kabupaten">Kabupaten</label>
              <select class="form-select select2" id="kabupaten" name="kabupaten">
                <?php if ($detail->kab_kota): ?>
                  <option value="<?= $detail->kab_kota ?>" selected><?= $detail->kab_kota ?></option>
                <?php else: ?>
                  <option label=" "></option>
                <?php endif; ?>
              </select>
            </div>
            <div class="mb-3 form-control-validation">
              <label class="form-label" for="kecamatan">Kecamatan</label>
              <select class="form-select select2" id="kecamatan" name="kecamatan">
                <?php if ($detail->kecamatan): ?>
                  <option value="<?= $detail->kecamatan ?>" selected><?= $detail->kecamatan ?></option>
                <?php else: ?>
                  <option label=" "></option>
                <?php endif; ?>
              </select>
            </div>
            <div class="mb-3 form-control-validation">
              <label class="form-label" for="kelurahan">Kelurahan</label>
              <select class="form-select select2" id="kelurahan" name="kelurahan">
                <?php if ($detail->kelurahan): ?>
                  <option value="<?= $detail->kelurahan ?>" selected><?= $detail->kelurahan ?></option>
                <?php else: ?>
                  <option label=" "></option>
                <?php endif; ?>
              </select>
            </div>
            <div class="mb-3 form-control-validation">
              <label class="form-label" for="kode_pos">Kode POS</label>
              <input type="text" id="kode_pos" name="kode_pos" class="form-control" value="<?= $detail->kode_pos ?>" />
            </div>
            <div class="mb-3 form-control-validation">
              <label class="form-label" for="jalan">Jalan, No.</label>
              <input type="text" id="jalan" name="jalan" class="form-control" value="<?= $detail->alamat ?>" />
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
      <!-- Social Links -->
      <div id="social-links-validation" class="content">
        <div class="content-header mb-4">
          <h6 class="mb-0">Dokumen Persyaratan</h6>
          <small>Lengkapi Dokumen Persyaratan.</small>
        </div>
        <div class="row g-6">
          <?php foreach ($dokumens as $dokumen): ?>
            <div class="col-sm-6">
              <form method="POST" action="<?= site_url('dokumen/upload') ?>" id="form<?= $dokumen->id ?>"
                enctype="multipart/form-data">
                <label class="form-label" for="dok<?= $dokumen->id ?>"><strong><?= $dokumen->dokumen ?></strong></label>
                <div class="input-group">
                  <input type="hidden" name="usul" value="<?= $usulan->id ?>">
                  <input type="hidden" name="iddok" value="<?= $dokumen->id ?>">
                  <input type="file" id="dok<?= $dokumen->id ?>" name="dokumen" class="form-control"
                    onchange="uploadfile('<?= $dokumen->id ?>')" />
                  <?php if ($dokumen->lampiran): ?>
                    <button class="btn btn-outline-primary waves-effect" type="button" id="button-addon2"
                      onclick="preview('<?= base_url('uploads/' . $dokumen->lampiran . '?' . time()) ?>')">View</button>
                  <?php else: ?>
                    <button class="btn btn-outline-primary waves-effect" type="button" id="btn<?= $dokumen->id ?>"
                      onclick="" disabled>View</button>
                  <?php endif; ?>
                </div>
                <?php if ($dokumen->dok_status == 0 && $dokumen->keterangan): ?>
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
      <!-- </form> -->
    </div>
  </div>
</div>

<div id="preview" class="modal fade" data-bs-backdrop="static" tabindex="-1" aria-labelledby="myModalLabel"
  aria-hidden="true" data-bs-scroll="true">
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
<?= $this->section('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/libs/@form-validation/popular.js"></script>
<script src="<?= base_url() ?>assets/vendor/libs/@form-validation/bootstrap5.js"></script>
<script src="<?= base_url() ?>assets/vendor/libs/@form-validation/auto-focus.js"></script>
<script src="<?= base_url() ?>assets/js/form-pendirian-ptkis.js"></script>
<script src="https://malsup.github.io/jquery.form.js" charset="utf-8"></script>
<script>
  function uploadfile(id) {
    $('#form' + id).ajaxSubmit({
      // target: '#output'+id,
      beforeSubmit: function (a, f, o) {
        alert('Mengunggah');
      },
      success: function (responseText, statusText, xhr, $form) {

        if (responseText.status == 'error') {
          Swal.fire({ title: "Ooppss...", text: responseText.message, icon: "error", confirmButtonColor: "#5b73e8" });
        } else {
          $('#output' + id).html(responseText.message);
          Swal.fire({ html: "Dokumen telah diunggah", confirmButtonColor: "#5b73e8" });
          $('#btn' + id).removeAttr('disabled');
          $('#btn' + id).attr('onclick', "preview('<?= base_url() ?>uploads/" + responseText.file + "')");

          if ($("table:contains('Belum Diunggah')").length == 0) {
            //   $('#v-pills-3-tab').removeAttr('disabled');
          }
        }
      }
    });
  }

  function preview(berkas) {
    $('#object').html('<object data="' + berkas + '" type="application/pdf" width="100%" style="height: 80vh;" id="object">' +
      '<p>Browser tidak mendukung!</p>' +
      '</object>');
    $('#previewfile').attr('href', berkas);
    $('#preview').modal('show');
  }
</script>
<?= $this->endSection() ?>