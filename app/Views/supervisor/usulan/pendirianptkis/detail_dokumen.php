<?= $this->extend('supervisor/template') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
    <div class="d-flex flex-column justify-content-center">
        <div class="d-flex align-items-center gap-2 mb-1">
            <div style="width: 4px; height: 28px; background: linear-gradient(180deg, #696cff, #a3acff); border-radius: 4px;"></div>
            <h4 class="mb-0 fw-bold" style="letter-spacing: -0.02em;">Detail Usulan</h4>
        </div>
        <p class="text-muted mb-0 ms-3" style="font-size: 0.875rem;">Pendirian PTKIS — <?= $detail->yayasan_nama ?></p>
    </div>
    <div class="d-flex align-content-center flex-wrap gap-3">
        <a href="<?= site_url('supervisor/usulan') ?>" class="btn btn-label-secondary waves-effect" style="border-radius: 10px; padding: 8px 20px;">
            <i class="ti tabler-arrow-left me-1"></i>Kembali
        </a>
    </div>
</div>

<!-- Info Yayasan Card -->
<div class="card mb-5" style="border: none; border-radius: 14px; overflow: hidden;">
    <div class="card-header py-3 px-4" style="background: linear-gradient(135deg, #696cff 0%, #8592ff 100%); border: none;">
        <h6 class="mb-0 text-white fw-semibold">
            <i class="ti tabler-building me-2"></i>Informasi Yayasan & Status
        </h6>
    </div>
    <div class="card-body p-4">
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="info-row d-flex mb-3 pb-3" style="border-bottom: 1px dashed #e9ecef;">
                    <div class="flex-shrink-0" style="width: 140px;">
                        <small class="text-muted fw-semibold text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.06em;">Nama Yayasan</small>
                    </div>
                    <div class="flex-grow-1 fw-semibold text-dark"><?= $detail->yayasan_nama ?></div>
                </div>
                <div class="info-row d-flex mb-3 pb-3" style="border-bottom: 1px dashed #e9ecef;">
                    <div class="flex-shrink-0" style="width: 140px;">
                        <small class="text-muted fw-semibold text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.06em;">Alamat Yayasan</small>
                    </div>
                    <div class="flex-grow-1 fw-semibold text-dark"><?= $detail->yayasan_alamat ?></div>
                </div>
                <div class="info-row d-flex mb-3 pb-3" style="border-bottom: 1px dashed #e9ecef;">
                    <div class="flex-shrink-0" style="width: 140px;">
                        <small class="text-muted fw-semibold text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.06em;">No. SK</small>
                    </div>
                    <div class="flex-grow-1 fw-semibold text-dark"><?= $detail->yayasan_nosk ?></div>
                </div>
                <div class="info-row d-flex">
                    <div class="flex-shrink-0" style="width: 140px;">
                        <small class="text-muted fw-semibold text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.06em;">Tanggal SK</small>
                    </div>
                    <div class="flex-grow-1 fw-semibold text-dark"><?= $detail->yayasan_tglsk ?></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="info-row d-flex mb-3 pb-3" style="border-bottom: 1px dashed #e9ecef;">
                    <div class="flex-shrink-0" style="width: 140px;">
                        <small class="text-muted fw-semibold text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.06em;">Jenis Layanan</small>
                    </div>
                    <div class="flex-grow-1">
                        <span class="badge bg-label-primary" style="border-radius: 8px; padding: 5px 14px;"><?= $usulan->layanan_nama ?></span>
                    </div>
                </div>
                <div class="info-row d-flex mb-3 pb-3" style="border-bottom: 1px dashed #e9ecef;">
                    <div class="flex-shrink-0" style="width: 140px;">
                        <small class="text-muted fw-semibold text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.06em;">Status Usulan</small>
                    </div>
                    <div class="flex-grow-1 fw-semibold text-dark"><?= usul_status($usulan->status) ?></div>
                </div>
                <div class="info-row d-flex mb-3 pb-3" style="border-bottom: 1px dashed #e9ecef;">
                    <div class="flex-shrink-0" style="width: 140px;">
                        <small class="text-muted fw-semibold text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.06em;">Keterangan</small>
                    </div>
                    <div class="flex-grow-1 fw-semibold text-dark"><?= $usulan->keterangan ?: '<span class="text-muted fst-italic">-</span>' ?></div>
                </div>
                <div class="info-row d-flex">
                    <div class="flex-shrink-0" style="width: 140px;">
                        <small class="text-muted fw-semibold text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.06em;">Verifikator</small>
                    </div>
                    <div class="flex-grow-1 fw-semibold text-dark"><?= $usulan->verifikator ?? '<span class="text-muted fst-italic">Belum ditentukan</span>' ?></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tabs Navigation -->
<div class="nav-align-top mb-5">
    <ul class="nav nav-pills flex-column flex-md-row row-gap-2" style="background: white; border-radius: 12px; padding: 6px;">
        <li class="nav-item">
            <a href="<?= site_url('supervisor/usulan/pendirianptkis/detail/' . encrypt($usulan->id)) ?>" class="nav-link waves-effect waves-light" style="border-radius: 8px;">
                <i class="icon-base ti tabler-info-circle me-1_5 icon-sm"></i>Info Usulan
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= site_url('supervisor/usulan/pendirianptkis/detail/verifikasi/' . encrypt($usulan->id)) ?>" class="nav-link active waves-effect waves-light" style="border-radius: 8px;">
                <i class="icon-base ti tabler-files me-1_5 icon-sm"></i>Verifikasi Dokumen
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= site_url('supervisor/usulan/pendirianptkis/detail/penilaian/' . encrypt($usulan->id)) ?>" class="nav-link waves-effect waves-light" style="border-radius: 8px;">
                <i class="icon-base ti tabler-lock me-1_5 icon-sm"></i>Penilaian
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= site_url('supervisor/usulan/pendirianptkis/detail/rkma/' . encrypt($usulan->id)) ?>" class="nav-link waves-effect waves-light" style="border-radius: 8px;">
                <i class="icon-base ti tabler-bell me-1_5 icon-sm"></i>RKMA
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= site_url('supervisor/usulan/pendirianptkis/detail/kma/' . encrypt($usulan->id)) ?>" class="nav-link waves-effect waves-light" style="border-radius: 8px;">
                <i class="icon-base ti tabler-certificate me-1_5 icon-sm"></i>KMA
            </a>
        </li>
    </ul>
</div>

<div class="row g-6">
    <div class="col-sm-12">
        <div class="card" style="border: none; border-radius: 14px;">
            <div class="card-header py-3 px-4 d-flex align-items-center" style="border-bottom: 1px solid #f0f2f5;">
                <div style="width: 36px; height: 36px; background: linear-gradient(135deg, #03c3ec, #71d8f7); border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 12px;">
                    <i class="ti tabler-files text-white" style="font-size: 1.1rem;"></i>
                </div>
                <h6 class="mb-0 fw-bold" style="color: #566a7f;">Dokumen Pendukung</h6>
            </div>
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr style="background: #f8f9fb;">
                            <th style="padding: 12px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;" width="60%">Dokumen</th>
                            <th style="padding: 12px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">Sesuai</th>
                            <th style="padding: 12px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($dokumens as $dokumen): ?>
                        <tr class="doc-row">
                            <td style="padding: 12px 20px; border-bottom: 1px solid #f0f2f5; vertical-align: middle;">
                                <?php if($dokumen->lampiran): ?>
                                    <a href="javascript:;" onclick="preview('<?= base_url('uploads/'.$dokumen->lampiran) ?>')" class="d-flex align-items-center gap-2 text-primary fw-medium text-decoration-none">
                                        <div style="width: 32px; height: 32px; background: #eff1ff; border-radius: 8px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                            <i class="ti tabler-file-text" style="color: #696cff; font-size: 1rem;"></i>
                                        </div>
                                        <span style="font-size: 0.85rem;"><?= $dokumen->dokumen ?></span>
                                    </a>
                                <?php else: ?>
                                    <div class="d-flex align-items-center gap-2 text-muted">
                                        <div style="width: 32px; height: 32px; background: #f5f5f9; border-radius: 8px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                            <i class="ti tabler-file-x" style="color: #a8aaae; font-size: 1rem;"></i>
                                        </div>
                                        <span style="font-size: 0.85rem;"><?= $dokumen->dokumen ?></span>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td style="padding: 12px 20px; border-bottom: 1px solid #f0f2f5; vertical-align: middle;">
                                <?php if ($dokumen->dok_status == 1): ?>
                                    <span class="badge bg-label-success d-inline-flex align-items-center" style="border-radius: 8px; padding: 5px 12px; font-size: 0.75rem;"><i class="ti tabler-check me-1"></i>Ya</span>
                                <?php else: ?>
                                    <span class="badge bg-label-danger d-inline-flex align-items-center" style="border-radius: 8px; padding: 5px 12px; font-size: 0.75rem;"><i class="ti tabler-x me-1"></i>Tidak</span>
                                <?php endif; ?>
                            </td>
                            <td style="padding: 12px 20px; border-bottom: 1px solid #f0f2f5; vertical-align: middle; color: #8c97a7; font-size: 0.85rem;"><?= $dokumen->keterangan?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Preview Modal -->
<div id="preview" class="modal fade" data-bs-backdrop="static" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" style="border: none; border-radius: 16px; overflow: hidden;">
            <div class="modal-header py-3 px-4" style="background: linear-gradient(135deg, #696cff 0%, #8592ff 100%); border: none;">
                <h6 class="modal-title text-white fw-semibold"><i class="ti tabler-eye me-2"></i>Preview Dokumen</h6>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0" id="object"></div>
            <div class="modal-footer" style="border-top: 1px solid #f0f2f5;">
                <a href="" target="_blank" class="btn btn-primary waves-effect" id="previewfile" style="border-radius: 8px;"><i class="ti tabler-external-link me-1"></i>Buka Tab Baru</a>
                <button type="button" class="btn btn-label-secondary waves-effect" data-bs-dismiss="modal" style="border-radius: 8px;">Tutup</button>
            </div>
        </div>
    </div>
</div>

<style>
    .doc-row { transition: background-color 0.2s ease; }
    .doc-row:hover { background-color: #f8f9fb !important; }
</style>

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