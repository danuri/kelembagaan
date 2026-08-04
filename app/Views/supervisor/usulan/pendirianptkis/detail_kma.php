<?= $this->extend('supervisor/template') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div
    class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
    <div class="d-flex flex-column justify-content-center">
        <div class="d-flex align-items-center gap-2 mb-1">
            <div
                style="width: 4px; height: 28px; background: linear-gradient(180deg, #696cff, #a3acff); border-radius: 4px;">
            </div>
            <h4 class="mb-0 fw-bold" style="letter-spacing: -0.02em;">Detail Usulan</h4>
        </div>
        <p class="text-muted mb-0 ms-3" style="font-size: 0.875rem;">Pendirian PTKIS — <?= $detail->yayasan_nama ?></p>
    </div>
    <div class="d-flex align-content-center flex-wrap gap-3">
        <a href="<?= site_url('supervisor/usulan') ?>" class="btn btn-label-secondary waves-effect"
            style="border-radius: 10px; padding: 8px 20px;">
            <i class="ti tabler-arrow-left me-1"></i>Kembali
        </a>
        <?php if ($usulan->status == 4): ?>
            <a href="<?= site_url('supervisor/usulan/pendirianptkis/penilaianasesor/' . encrypt($usulan->id)) ?>"
                type="button" class="btn btn-success waves-effect waves-light"
                style="border-radius: 10px; padding: 8px 20px; box-shadow: 0 4px 12px rgba(113,221,55,0.3);"
                onclick="return confirm('Apakah Anda yakin ingin mengirim ke Penilai?')">
                <i class="ti tabler-send me-1"></i>Kirim ke Penilai
            </a>
        <?php endif; ?>
        <?php if ($usulan->status == 6 || $usulan->status == 8): ?>
            <a href="<?= site_url('supervisor/usulan/pendirianptkis/done/' . encrypt($usulan->id)) ?>" type="button"
                class="btn btn-success waves-effect waves-light"
                style="border-radius: 10px; padding: 8px 20px; box-shadow: 0 4px 12px rgba(113,221,55,0.3);"
                onclick="return confirm('Apakah Anda yakin ingin menyelesaikan usulan ini?')">
                <i class="ti tabler-send me-1"></i>Selesai
            </a>
        <?php endif; ?>
    </div>
</div>

<!-- Info Yayasan Card -->
<div class="card mb-5" style="border: none; border-radius: 14px; overflow: hidden;">
    <div class="card-header py-3 px-4"
        style="background: linear-gradient(135deg, #696cff 0%, #8592ff 100%); border: none;">
        <h6 class="mb-0 text-white fw-semibold">
            <i class="ti tabler-building me-2"></i>Informasi Yayasan & Status
        </h6>
    </div>
    <div class="card-body p-4">
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="info-row d-flex mb-3 pb-3" style="border-bottom: 1px dashed #e9ecef;">
                    <div class="flex-shrink-0" style="width: 140px;">
                        <small class="text-muted fw-semibold text-uppercase"
                            style="font-size: 0.72rem; letter-spacing: 0.06em;">Nama Yayasan</small>
                    </div>
                    <div class="flex-grow-1 fw-semibold text-dark"><?= $detail->yayasan_nama ?></div>
                </div>
                <div class="info-row d-flex mb-3 pb-3" style="border-bottom: 1px dashed #e9ecef;">
                    <div class="flex-shrink-0" style="width: 140px;">
                        <small class="text-muted fw-semibold text-uppercase"
                            style="font-size: 0.72rem; letter-spacing: 0.06em;">Alamat Yayasan</small>
                    </div>
                    <div class="flex-grow-1 fw-semibold text-dark"><?= $detail->yayasan_alamat ?></div>
                </div>
                <div class="info-row d-flex mb-3 pb-3" style="border-bottom: 1px dashed #e9ecef;">
                    <div class="flex-shrink-0" style="width: 140px;">
                        <small class="text-muted fw-semibold text-uppercase"
                            style="font-size: 0.72rem; letter-spacing: 0.06em;">No. SK</small>
                    </div>
                    <div class="flex-grow-1 fw-semibold text-dark"><?= $detail->yayasan_nosk ?></div>
                </div>
                <div class="info-row d-flex">
                    <div class="flex-shrink-0" style="width: 140px;">
                        <small class="text-muted fw-semibold text-uppercase"
                            style="font-size: 0.72rem; letter-spacing: 0.06em;">Tanggal SK</small>
                    </div>
                    <div class="flex-grow-1 fw-semibold text-dark"><?= $detail->yayasan_tglsk ?></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="info-row d-flex mb-3 pb-3" style="border-bottom: 1px dashed #e9ecef;">
                    <div class="flex-shrink-0" style="width: 140px;">
                        <small class="text-muted fw-semibold text-uppercase"
                            style="font-size: 0.72rem; letter-spacing: 0.06em;">Jenis Layanan</small>
                    </div>
                    <div class="flex-grow-1">
                        <span class="badge bg-label-primary"
                            style="border-radius: 8px; padding: 5px 14px;"><?= $usulan->layanan_nama ?></span>
                    </div>
                </div>
                <div class="info-row d-flex mb-3 pb-3" style="border-bottom: 1px dashed #e9ecef;">
                    <div class="flex-shrink-0" style="width: 140px;">
                        <small class="text-muted fw-semibold text-uppercase"
                            style="font-size: 0.72rem; letter-spacing: 0.06em;">Status Usulan</small>
                    </div>
                    <div class="flex-grow-1 fw-semibold text-dark"><?= usul_status($usulan->status) ?></div>
                </div>
                <div class="info-row d-flex mb-3 pb-3" style="border-bottom: 1px dashed #e9ecef;">
                    <div class="flex-shrink-0" style="width: 140px;">
                        <small class="text-muted fw-semibold text-uppercase"
                            style="font-size: 0.72rem; letter-spacing: 0.06em;">Keterangan</small>
                    </div>
                    <div class="flex-grow-1 fw-semibold text-dark">
                        <?= $usulan->keterangan ?: '<span class="text-muted fst-italic">-</span>' ?></div>
                </div>
                <div class="info-row d-flex">
                    <div class="flex-shrink-0" style="width: 140px;">
                        <small class="text-muted fw-semibold text-uppercase"
                            style="font-size: 0.72rem; letter-spacing: 0.06em;">Verifikator</small>
                    </div>
                    <div class="flex-grow-1 fw-semibold text-dark">
                        <?= $usulan->verifikator ?? '<span class="text-muted fst-italic">Belum ditentukan</span>' ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tabs Navigation -->
<div class="nav-align-top mb-5">
    <ul class="nav nav-pills flex-column flex-md-row row-gap-2"
        style="background: white; border-radius: 12px; padding: 6px;">
        <li class="nav-item">
            <a href="<?= site_url('supervisor/usulan/pendirianptkis/detail/' . encrypt($usulan->id)) ?>"
                class="nav-link waves-effect waves-light" style="border-radius: 8px;">
                <i class="icon-base ti tabler-info-circle me-1_5 icon-sm"></i>Info Usulan
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= site_url('supervisor/usulan/pendirianptkis/detail/verifikasi/' . encrypt($usulan->id)) ?>"
                class="nav-link waves-effect waves-light" style="border-radius: 8px;">
                <i class="icon-base ti tabler-files me-1_5 icon-sm"></i>Verifikasi Dokumen
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= site_url('supervisor/usulan/pendirianptkis/detail/penilaian/' . encrypt($usulan->id)) ?>"
                class="nav-link waves-effect waves-light" style="border-radius: 8px;">
                <i class="icon-base ti tabler-lock me-1_5 icon-sm"></i>Penilaian
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= site_url('supervisor/usulan/pendirianptkis/detail/rkma/' . encrypt($usulan->id)) ?>"
                class="nav-link waves-effect waves-light" style="border-radius: 8px;">
                <i class="icon-base ti tabler-bell me-1_5 icon-sm"></i>RKMA
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= site_url('supervisor/usulan/pendirianptkis/detail/kma/' . encrypt($usulan->id)) ?>"
                class="nav-link active waves-effect waves-light" style="border-radius: 8px;">
                <i class="icon-base ti tabler-certificate me-1_5 icon-sm"></i>KMA
            </a>
        </li>
    </ul>
</div>

<div class="row g-6">
    <div class="col-sm-12">
        <div class="card" style="border: none; border-radius: 14px;">
            <div class="card-header py-3 px-4 d-flex align-items-center" style="border-bottom: 1px solid #f0f2f5;">
                <div
                    style="width: 36px; height: 36px; background: linear-gradient(135deg, #696cff, #8592ff); border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 12px;">
                    <i class="ti tabler-certificate text-white" style="font-size: 1.1rem;"></i>
                </div>
                <h5 class="mb-0 fw-bold" style="color: #566a7f;">Unggah KMA</h5>
            </div>
            <div class="card-body p-4">
                <form action="<?= site_url('supervisor/usulan/detail/kma/save/' . encrypt($usulan->id)) ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label fw-medium" for="no_kma" style="color: #566a7f;">No
                            Keputusan</label>
                        <div class="col-sm-9">
                            <input type="text" id="no_kma" name="no_kma" class="form-control"
                                value="<?= $usulan->no_kma ?>" style="border-radius: 10px;" />
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label fw-medium" for="tgl_kma" style="color: #566a7f;">Tanggal
                            Keputusan</label>
                        <div class="col-sm-9">
                            <input type="date" id="tgl_kma" name="tgl_kma" class="form-control"
                                value="<?= $usulan->tgl_kma ?>" style="border-radius: 10px;" />
                        </div>
                    </div>
                    <div class="row mb-5">
                        <label class="col-sm-3 col-form-label fw-medium" for="lampiran" style="color: #566a7f;">File
                            Keputusan</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="file" class="form-control" id="lampiran" name="lampiran"
                                    aria-describedby="groupLampiran" aria-label="Upload" accept=".pdf"
                                    style="border-radius: 10px 0 0 10px;" />
                                <?php if ($usulan->file_kma): ?>
                                    <a class="btn btn-outline-primary" type="button" id="groupLampiran"
                                        href="<?= base_url('uploads/kma/' . $usulan->file_kma) ?>" target="_blank"
                                        style="border-radius: 0 10px 10px 0;">
                                        <i class="ti tabler-eye me-1"></i>Lihat
                                    </a>
                                <?php else: ?>
                                    <span class="input-group-text bg-label-secondary" id="groupLampiran"
                                        style="border-radius: 0 10px 10px 0;">Belum ada file</span>
                                <?php endif; ?>
                            </div>
                            <small class="text-muted mt-2 d-block"><i class="ti tabler-info-circle me-1"
                                    style="font-size: 0.9rem;"></i>Hanya format PDF yang diperbolehkan.</small>
                        </div>
                    </div>

                    <div class="pt-4 border-top">
                        <div class="row justify-content-end">
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary"
                                    style="border-radius: 10px; padding: 10px 24px; box-shadow: 0 4px 12px rgba(105,108,255,0.3);">
                                    <i class="ti tabler-device-floppy me-2"></i>Simpan
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection() ?>
<?= $this->section('scripts'); ?>
<script>
    function preview(berkas) {
        $('#object').html('<object data="' + berkas + '" type="application/pdf" width="100%" style="height: 80vh;" id="object">' +
            '<p>Browser tidak mendukung!</p>' +
            '</object>');
        $('#preview').modal('show');
    }
</script>
<?= $this->endSection() ?>