<?= $this->extend('user/template2') ?>
<?= $this->section('content') ?>

<!-- Header Section -->
<div class="card mb-4 border-0 shadow-sm">
  <div class="card-body py-3 px-4 d-flex flex-wrap align-items-center justify-content-between gap-3">
    <div>
      <h4 class="mb-1 text-primary fw-bold">
        <i class="icon-base ti tabler-building-bank me-2"></i>Usulan Pendirian PTKIS
      </h4>
      <p class="text-muted mb-0 small">
        Nomor Surat: <strong><?= esc($usulan->nomor_surat) ?></strong> &bull; Perihal: <strong><?= esc($usulan->perihal) ?></strong>
      </p>
    </div>
    <div class="d-flex align-items-center gap-2">
      <span class="badge bg-label-info px-3 py-2 fs-6">
        Status: <?= usul_status($usulan->status) ?>
      </span>
      <a href="<?= site_url('layanan/pendirianptkis') ?>" class="btn btn-outline-secondary btn-sm">
        <i class="icon-base ti tabler-arrow-left me-1"></i> Kembali
      </a>
    </div>
  </div>
</div>

<?php if ($usulan->status == 21): ?>
  <div class="alert alert-danger alert-dismissible shadow-sm mb-4" role="alert">
    <div class="d-flex align-items-center gap-2 mb-1">
      <i class="icon-base ti tabler-alert-circle fs-4"></i>
      <h5 class="alert-heading mb-0 text-danger fw-bold">Alasan Dikembalikan untuk Perbaikan</h5>
    </div>
    <p class="mb-0 ms-4"><?= esc($usulan->keterangan) ?></p>
  </div>
<?php endif; ?>

<!-- Wizard Stepper Form -->
<div id="wizard-validation" class="bs-stepper shadow-sm rounded">
  <div class="bs-stepper-header">
    <div class="step" data-target="#account-details-validation">
      <button type="button" class="step-trigger">
        <span class="bs-stepper-circle"><i class="icon-base ti tabler-user-check fs-5"></i></span>
        <span class="bs-stepper-label mt-1">
          <span class="bs-stepper-title">1. Data Pemohon</span>
          <span class="bs-stepper-subtitle">Informasi Yayasan</span>
        </span>
      </button>
    </div>
    <div class="line">
      <i class="icon-base ti tabler-chevron-right"></i>
    </div>
    <div class="step" data-target="#personal-info-validation">
      <button type="button" class="step-trigger">
        <span class="bs-stepper-circle"><i class="icon-base ti tabler-building-community fs-5"></i></span>
        <span class="bs-stepper-label mt-1">
          <span class="bs-stepper-title">2. Informasi Lembaga</span>
          <span class="bs-stepper-subtitle">Data PTKIS & Prodi</span>
        </span>
      </button>
    </div>
    <div class="line">
      <i class="icon-base ti tabler-chevron-right"></i>
    </div>
    <div class="step" data-target="#social-links-validation">
      <button type="button" class="step-trigger">
        <span class="bs-stepper-circle"><i class="icon-base ti tabler-file-check fs-5"></i></span>
        <span class="bs-stepper-label mt-1">
          <span class="bs-stepper-title">3. Dokumen & Submit</span>
          <span class="bs-stepper-subtitle">Persyaratan Berkas</span>
        </span>
      </button>
    </div>
  </div>

  <div class="bs-stepper-content">
    <div id="wizard-validation-form">
      <input type="hidden" name="usul_id" id="usul_id" value="<?= $usulan->id ?>">

      <!-- STEP 1: Data Pemohon (Yayasan) -->
      <div id="account-details-validation" class="content">
        <div class="content-header mb-4 pb-2 border-bottom">
          <h6 class="mb-0 text-primary font-weight-bold"><i class="icon-base ti tabler-building me-1"></i> Data Pemohon (Yayasan Penyelenggara)</h6>
          <small class="text-muted">Isi data lengkap yayasan pengusul sesuai dengan SK Resmi Kemenkumham.</small>
        </div>
        <div class="row g-4">
          <div class="col-sm-6 form-control-validation">
            <label class="form-label fw-semibold" for="yayasan_nama">Nama Yayasan <span class="text-danger">*</span></label>
            <input type="text" id="yayasan_nama" name="yayasan_nama" class="form-control"
              placeholder="Contoh: Yayasan Pendidikan Islam Al-Hikmah" value="<?= esc($detail->yayasan_nama) ?>" required />
          </div>
          <div class="col-sm-6 form-control-validation">
            <label class="form-label fw-semibold" for="yayasan_nosk">No. SK Kemenkumham <span class="text-danger">*</span></label>
            <input type="text" id="yayasan_nosk" name="yayasan_nosk" class="form-control"
              placeholder="Contoh: AHU-0012345.AH.01.04.Tahun 2020" value="<?= esc($detail->yayasan_nosk) ?>" required />
          </div>
          <div class="col-sm-6 form-control-validation">
            <label class="form-label fw-semibold" for="yayasan_tglsk">Tanggal SK Kemenkumham <span class="text-danger">*</span></label>
            <input type="date" id="yayasan_tglsk" name="yayasan_tglsk" class="form-control"
              value="<?= esc($detail->yayasan_tglsk) ?>" required />
          </div>
          <div class="col-sm-6 form-control-validation">
            <label class="form-label fw-semibold" for="yayasan_alamat">Alamat Lengkap Yayasan <span class="text-danger">*</span></label>
            <input type="text" id="yayasan_alamat" name="yayasan_alamat" class="form-control"
              placeholder="Masukkan alamat lengkap yayasan" value="<?= esc($detail->yayasan_alamat) ?>" required />
          </div>

          <div class="col-12 d-flex justify-content-between pt-3 mt-4 border-top">
            <button class="btn btn-label-secondary btn-prev" disabled>
              <i class="icon-base ti tabler-arrow-left me-1"></i> Sebelumnya
            </button>
            <button class="btn btn-primary btn-next">
              <span>Simpan & Selanjutnya</span> <i class="icon-base ti tabler-arrow-right ms-1"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- STEP 2: Informasi Lembaga & Program Studi -->
      <div id="personal-info-validation" class="content">
        <div class="content-header mb-4 pb-2 border-bottom">
          <h6 class="mb-0 text-primary font-weight-bold"><i class="icon-base ti tabler-building-skyscraper me-1"></i> Informasi Lembaga PTKIS</h6>
          <small class="text-muted">Lengkapi profil perguruan tinggi keagamaan yang akan didirikan.</small>
        </div>
        <div class="row g-4">
          <div class="col-sm-6">
            <div class="mb-3 form-control-validation">
              <label class="form-label fw-semibold" for="nama_lembaga">Nama Lembaga PTKIS <span class="text-danger">*</span></label>
              <input type="text" id="nama_lembaga" name="nama_lembaga" class="form-control"
                placeholder="Contoh: STAI Al-Hikmah" value="<?= esc($detail->nama_lembaga) ?>" required />
            </div>

            <div class="mb-3 form-control-validation">
              <label class="form-label fw-semibold" for="kategori">Kategori Perguruan Tinggi <span class="text-danger">*</span></label>
              <select class="form-select select2" id="kategori" name="kategori" required>
                <option value="">Pilih Kategori</option>
                <option value="SEKOLAH TINGGI" <?= $detail->kategori === 'SEKOLAH TINGGI' ? 'selected' : '' ?>>SEKOLAH TINGGI</option>
                <option value="INSTITUT" <?= $detail->kategori === 'INSTITUT' ? 'selected' : '' ?>>INSTITUT</option>
                <option value="UNIVERSITAS" <?= $detail->kategori === 'UNIVERSITAS' ? 'selected' : '' ?>>UNIVERSITAS</option>
                <option value="FAKULTAS AGAMA ISLAM" <?= $detail->kategori === 'FAKULTAS AGAMA ISLAM' ? 'selected' : '' ?>>FAKULTAS AGAMA ISLAM</option>
              </select>
            </div>

            <div class="mb-3 form-control-validation">
              <label class="form-label fw-semibold" for="jenjang">Jenjang Utama <span class="text-danger">*</span></label>
              <select class="form-select select2" id="jenjang" name="jenjang" required>
                <option value="">Pilih Jenjang</option>
                <option value="S1" <?= $detail->jenjang === 'S1' ? 'selected' : '' ?>>S1 (Sarjana)</option>
                <option value="S2" <?= $detail->jenjang === 'S2' ? 'selected' : '' ?>>S2 (Magister)</option>
                <option value="S3" <?= $detail->jenjang === 'S3' ? 'selected' : '' ?>>S3 (Doktor)</option>
              </select>
            </div>

            <div class="mb-3 form-control-validation">
              <label class="form-label fw-semibold" for="kopertais">Wilayah Kopertais <span class="text-danger">*</span></label>
              <select class="form-select select2" id="kopertais" name="kopertais" required>
                <option value="">Pilih Kopertais</option>
                <?php for ($i = 1; $i <= 15; $i++): ?>
                  <option value="KOPERTAIS <?= $i ?>" <?= $detail->kopertais === "KOPERTAIS $i" ? 'selected' : '' ?>>
                    KOPERTAIS WILAYAH <?= $i ?>
                  </option>
                <?php endfor; ?>
              </select>
            </div>

            <div class="row g-2">
              <div class="col-6 form-control-validation">
                <label class="form-label fw-semibold" for="telepon">No. Telepon Kantor <span class="text-danger">*</span></label>
                <input type="text" id="telepon" name="telepon" class="form-control" value="<?= esc($detail->telepon) ?>" placeholder="021-xxxxxx" required />
              </div>
              <div class="col-6 form-control-validation">
                <label class="form-label fw-semibold" for="no_hp">No. HP / WhatsApp <span class="text-danger">*</span></label>
                <input type="text" id="no_hp" name="no_hp" class="form-control" value="<?= esc($detail->no_hp) ?>" placeholder="08xxxxxxxxxx" required />
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="mb-3 form-control-validation">
              <label class="form-label fw-semibold" for="provinsi">Provinsi <span class="text-danger">*</span></label>
              <select class="form-select select2" id="provinsi" name="provinsi" required>
                <option value="">Pilih Provinsi</option>
                <?php foreach ($provinces as $province): ?>
                  <option value="<?= $province->id ?>" <?= $detail->provinsi === $province->id ? 'selected' : '' ?>>
                    <?= esc($province->name) ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="mb-3 form-control-validation">
              <label class="form-label fw-semibold" for="kabupaten">Kabupaten / Kota <span class="text-danger">*</span></label>
              <select class="form-select select2" id="kabupaten" name="kabupaten" required>
                <?php if ($detail->kab_kota): ?>
                  <option value="<?= esc($detail->kab_kota) ?>" selected><?= esc($detail->kab_kota) ?></option>
                <?php else: ?>
                  <option value="">Pilih Kabupaten</option>
                <?php endif; ?>
              </select>
            </div>
            <div class="mb-3 form-control-validation">
              <label class="form-label fw-semibold" for="kecamatan">Kecamatan <span class="text-danger">*</span></label>
              <select class="form-select select2" id="kecamatan" name="kecamatan" required>
                <?php if ($detail->kecamatan): ?>
                  <option value="<?= esc($detail->kecamatan) ?>" selected><?= esc($detail->kecamatan) ?></option>
                <?php else: ?>
                  <option value="">Pilih Kecamatan</option>
                <?php endif; ?>
              </select>
            </div>
            <div class="mb-3 form-control-validation">
              <label class="form-label fw-semibold" for="kelurahan">Kelurahan / Desa <span class="text-danger">*</span></label>
              <select class="form-select select2" id="kelurahan" name="kelurahan" required>
                <?php if ($detail->kelurahan): ?>
                  <option value="<?= esc($detail->kelurahan) ?>" selected><?= esc($detail->kelurahan) ?></option>
                <?php else: ?>
                  <option value="">Pilih Kelurahan</option>
                <?php endif; ?>
              </select>
            </div>
            <div class="row g-2">
              <div class="col-4 form-control-validation">
                <label class="form-label fw-semibold" for="kode_pos">Kode Pos <span class="text-danger">*</span></label>
                <input type="text" id="kode_pos" name="kode_pos" class="form-control" value="<?= esc($detail->kode_pos) ?>" placeholder="12345" required />
              </div>
              <div class="col-8 form-control-validation">
                <label class="form-label fw-semibold" for="jalan">Alamat Jalan & No. <span class="text-danger">*</span></label>
                <input type="text" id="jalan" name="jalan" class="form-control" value="<?= esc($detail->alamat) ?>" placeholder="Jl. Raya No. 123" required />
              </div>
            </div>
          </div>

          <!-- Section Program Studi Checklist -->
          <div class="col-12">
            <div class="card border border-primary-subtle bg-light-subtle p-3 rounded">
              <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                <div>
                  <h6 class="mb-1 text-primary fw-bold"><i class="icon-base ti tabler-books me-1"></i> Program Studi Usulan</h6>
                  <p class="mb-0 small text-muted">
                    Setiap usulan Pendirian PTKIS wajib mendaftarkan minimal 1 (satu) Program Studi.
                  </p>
                </div>
                <div class="d-flex align-items-center gap-2">
                  <?php $prodiCount = count($prodi); ?>
                  <span id="prodi-count-badge" class="badge <?= $prodiCount > 0 ? 'bg-success' : 'bg-danger' ?> px-3 py-2">
                    <i class="icon-base ti <?= $prodiCount > 0 ? 'tabler-check' : 'tabler-alert-triangle' ?> me-1"></i>
                    <?= $prodiCount ?> Program Studi Ditambahkan
                  </span>
                  <a href="<?= site_url('layanan/pendirianptkis/prodi/' . encrypt($usulan->id)) ?>" target="_blank" class="btn btn-sm btn-primary">
                    <i class="icon-base ti tabler-plus me-1"></i> Kelola Prodi
                  </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 d-flex justify-content-between pt-3 mt-4 border-top">
            <button class="btn btn-label-secondary btn-prev">
              <i class="icon-base ti tabler-arrow-left me-1"></i> Sebelumnya
            </button>
            <button class="btn btn-primary btn-next">
              <span>Simpan & Selanjutnya</span> <i class="icon-base ti tabler-arrow-right ms-1"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- STEP 3: Dokumen Persyaratan & Submit -->
      <div id="social-links-validation" class="content">
        <div class="content-header mb-4 pb-2 border-bottom">
          <h6 class="mb-0 text-primary font-weight-bold"><i class="icon-base ti tabler-files me-1"></i> Unggah Dokumen Persyaratan</h6>
          <small class="text-muted">Seluruh berkas dokumen wajib diunggah dalam format PDF (Ukuran Maksimal: 2MB per file).</small>
        </div>

        <div class="row g-4">
          <?php 
            $uploadedCount = 0;
            $totalCount = count($dokumens);
          ?>
          <?php foreach ($dokumens as $dokumen): ?>
            <?php 
              $isUploaded = !empty($dokumen->lampiran);
              if ($isUploaded) $uploadedCount++;
            ?>
            <div class="col-md-6">
              <div class="card h-100 border p-3" id="card-dok-<?= $dokumen->id ?>">
                <form method="POST" action="<?= site_url('dokumen/upload') ?>" id="form<?= $dokumen->id ?>" enctype="multipart/form-data">
                  <input type="hidden" name="usul" value="<?= $usulan->id ?>">
                  <input type="hidden" name="iddok" value="<?= $dokumen->id ?>">
                  
                  <div class="d-flex justify-content-between align-items-start mb-2">
                    <label class="form-label fw-bold mb-0 text-dark" for="dok<?= $dokumen->id ?>">
                      <?= esc($dokumen->dokumen) ?> <span class="text-danger">*</span>
                    </label>
                    <span id="badge-status-<?= $dokumen->id ?>" class="badge <?= $isUploaded ? 'bg-success' : 'bg-danger' ?> badge-doc-status">
                      <?= $isUploaded ? 'Sudah Diunggah' : 'Wajib Diunggah' ?>
                    </span>
                  </div>

                  <div class="input-group">
                    <input type="file" id="dok<?= $dokumen->id ?>" name="dokumen" class="form-control doc-file-input" accept=".pdf"
                      onchange="uploadfile('<?= $dokumen->id ?>')" />
                    
                    <button class="btn btn-outline-primary waves-effect btn-view-doc" type="button" id="btn<?= $dokumen->id ?>"
                      onclick="<?= $isUploaded ? "preview('" . base_url('uploads/' . $dokumen->lampiran . '?' . time()) . "')" : "" ?>" 
                      <?= $isUploaded ? '' : 'disabled' ?>>
                      <i class="icon-base ti tabler-eye me-1"></i> View
                    </button>
                  </div>

                  <?php if ($dokumen->dok_status == 0 && !empty($dokumen->keterangan)): ?>
                    <div class="alert alert-warning py-1 px-2 mt-2 mb-0 small">
                      <i class="icon-base ti tabler-info-circle me-1"></i> Catatan: <?= esc($dokumen->keterangan) ?>
                    </div>
                  <?php endif; ?>
                </form>
              </div>
            </div>
          <?php endforeach; ?>

          <!-- Ringkasan Kelengkapan Usulan Box -->
          <div class="col-12 mt-4">
            <div class="card border-info bg-info-subtle p-3 rounded">
              <h6 class="fw-bold text-info-emphasis mb-2">
                <i class="icon-base ti tabler-clipboard-check me-1"></i> Ringkasan Kelengkapan Syarat Usulan
              </h6>
              <div class="row g-2 small">
                <div class="col-sm-6">
                  <div id="check-yayasan" class="d-flex align-items-center text-success fw-semibold">
                    <i class="icon-base ti tabler-circle-check me-2 fs-5"></i> Data Yayasan Pemohon
                  </div>
                </div>
                <div class="col-sm-6">
                  <div id="check-lembaga" class="d-flex align-items-center text-success fw-semibold">
                    <i class="icon-base ti tabler-circle-check me-2 fs-5"></i> Informasi Lembaga PTKIS
                  </div>
                </div>
                <div class="col-sm-6">
                  <div id="check-prodi" class="d-flex align-items-center <?= $prodiCount > 0 ? 'text-success' : 'text-danger' ?> fw-semibold">
                    <i class="icon-base ti <?= $prodiCount > 0 ? 'tabler-circle-check' : 'tabler-circle-x' ?> me-2 fs-5"></i> 
                    Program Studi (Minimal 1 Prodi): <span id="text-prodi-count" class="ms-1 fw-bold"><?= $prodiCount ?> Prodi</span>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div id="check-dokumen" class="d-flex align-items-center <?= $uploadedCount === $totalCount && $totalCount > 0 ? 'text-success' : 'text-danger' ?> fw-semibold">
                    <i class="icon-base ti <?= $uploadedCount === $totalCount && $totalCount > 0 ? 'tabler-circle-check' : 'tabler-circle-x' ?> me-2 fs-5"></i> 
                    Dokumen Persyaratan: <span id="text-doc-count" class="ms-1 fw-bold"><?= $uploadedCount ?> / <?= $totalCount ?> Diunggah</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 d-flex justify-content-between pt-3 mt-4 border-top">
            <button class="btn btn-label-secondary btn-prev">
              <i class="icon-base ti tabler-arrow-left me-1"></i> Sebelumnya
            </button>
            <button type="button" class="btn btn-success btn-submit-usul px-4" id="btnSubmitUsul" onclick="confirmSubmit()">
              <i class="icon-base ti tabler-send me-1"></i> Submit Usulan Ke Kemenag
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal PDF Preview -->
<div id="preview" class="modal fade" data-bs-backdrop="static" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header border-bottom">
        <h5 class="modal-header-title mb-0 fw-bold"><i class="icon-base ti tabler-file-text me-2"></i> Pratinjau Dokumen PDF</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-0" id="object">
        <!-- PDF Object Render -->
      </div>
      <div class="modal-footer border-top">
        <a href="" target="_blank" class="btn btn-primary" id="previewfile"><i class="icon-base ti tabler-external-link me-1"></i> Buka di Tab Baru</a>
        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="<?= base_url('assets/vendor/libs/@form-validation/popular.js') ?>"></script>
<script src="<?= base_url('assets/vendor/libs/@form-validation/bootstrap5.js') ?>"></script>
<script src="<?= base_url('assets/vendor/libs/@form-validation/auto-focus.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.form.js') ?>" charset="utf-8"></script>
<script src="<?= base_url('assets/js/form-pendirian-ptkis.js') ?>"></script>

<script>
  let totalDocsRequired = <?= count($dokumens) ?>;
  let totalDocsUploaded = <?= $uploadedCount ?>;
  let totalProdiAdded = <?= $prodiCount ?>;

  function uploadfile(id) {
    const fileInput = document.getElementById('dok' + id);
    if (!fileInput || !fileInput.files.length) return;

    $('#form' + id).ajaxSubmit({
      beforeSubmit: function () {
        if (typeof alert === 'function') {
          alert('Mengunggah dokumen...');
        }
      },
      success: function (responseText) {
        if (responseText.status === 'error') {
          Swal.fire({ 
            title: "Gagal Mengunggah", 
            text: responseText.message, 
            icon: "error", 
            confirmButtonColor: "#5b73e8" 
          });
        } else {
          Swal.fire({ 
            icon: "success",
            title: "Berhasil",
            text: "Dokumen berhasil diunggah!",
            timer: 2000,
            showConfirmButton: false 
          });

          const fileUrl = "<?= base_url('uploads/') ?>" + responseText.file + "?" + new Date().getTime();
          
          // Update View button
          const btnView = $('#btn' + id);
          btnView.removeAttr('disabled');
          btnView.attr('onclick', "preview('" + fileUrl + "')");

          // Update Status Badge
          const badge = $('#badge-status-' + id);
          if (badge.text().trim() !== 'Sudah Diunggah') {
            badge.removeClass('bg-danger').addClass('bg-success').text('Sudah Diunggah');
            totalDocsUploaded++;
            updateSummaryChecklist();
          }
        }
      },
      error: function () {
        Swal.fire({ 
          title: "Kesalahan Server", 
          text: "Terjadi kesalahan saat mengunggah berkas.", 
          icon: "error", 
          confirmButtonColor: "#5b73e8" 
        });
      }
    });
  }

  function updateSummaryChecklist() {
    $('#text-doc-count').text(totalDocsUploaded + ' / ' + totalDocsRequired + ' Diunggah');
    const docCheck = $('#check-dokumen');
    if (totalDocsUploaded === totalDocsRequired && totalDocsRequired > 0) {
      docCheck.removeClass('text-danger').addClass('text-success');
      docCheck.find('i').removeClass('tabler-circle-x').addClass('tabler-circle-check');
    } else {
      docCheck.removeClass('text-success').addClass('text-danger');
      docCheck.find('i').removeClass('tabler-circle-check').addClass('tabler-circle-x');
    }
  }

  function preview(berkas) {
    $('#object').html('<object data="' + berkas + '" type="application/pdf" width="100%" style="height: 75vh;" id="pdfObject">' +
      '<p class="p-4 text-center">Browser Anda tidak mendukung preview PDF secara langsung. Silahkan klik tombol Buka di Tab Baru.</p>' +
      '</object>');
    $('#previewfile').attr('href', berkas);
    $('#preview').modal('show');
  }
</script>
<?= $this->endSection() ?>