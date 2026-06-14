<?= $this->extend('supervisor/template') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
    <div class="d-flex flex-column justify-content-center">
        <div class="d-flex align-items-center gap-2 mb-1">
            <div style="width: 4px; height: 28px; background: linear-gradient(180deg, #696cff, #a3acff); border-radius: 4px;"></div>
            <h4 class="mb-0 fw-bold" style="letter-spacing: -0.02em;">Detail Usulan</h4>
        </div>
        <p class="text-muted mb-0 ms-3" style="font-size: 0.875rem;">Pembentukan FAI — <?= $detail->nama_lembaga ?></p>
    </div>
    <div class="d-flex align-content-center flex-wrap gap-3">
        <button onclick="history.back()" class="btn btn-label-secondary waves-effect" style="border-radius: 10px; padding: 8px 20px;">
            <i class="ti tabler-arrow-left me-1"></i>Kembali
        </button>
        <button type="button" class="btn btn-success waves-effect waves-light" onclick="disposisi()" style="border-radius: 10px; padding: 8px 20px; box-shadow: 0 4px 12px rgba(113,221,55,0.3);">
            <i class="ti tabler-send me-1"></i>Disposisi
        </button>
    </div>
</div>

<!-- Info Usulan Card -->
<div class="card mb-5" style="border: none; border-radius: 14px; overflow: hidden;">
    <div class="card-header py-3 px-4" style="background: linear-gradient(135deg, #696cff 0%, #8592ff 100%); border: none;">
        <h6 class="mb-0 text-white fw-semibold">
            <i class="ti tabler-file-info me-2"></i>Informasi Usulan & Status
        </h6>
    </div>
    <div class="card-body p-4">
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="info-row d-flex mb-3 pb-3" style="border-bottom: 1px dashed #e9ecef;">
                    <div class="flex-shrink-0" style="width: 150px;">
                        <small class="text-muted fw-semibold text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.06em;">No. Surat Pengantar</small>
                    </div>
                    <div class="flex-grow-1 fw-semibold text-dark"><?= $usulan->nomor_surat ?></div>
                </div>
                <div class="info-row d-flex mb-3 pb-3" style="border-bottom: 1px dashed #e9ecef;">
                    <div class="flex-shrink-0" style="width: 150px;">
                        <small class="text-muted fw-semibold text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.06em;">Perihal</small>
                    </div>
                    <div class="flex-grow-1 fw-semibold text-dark"><?= $usulan->perihal ?></div>
                </div>
                <div class="info-row d-flex mb-3 pb-3" style="border-bottom: 1px dashed #e9ecef;">
                    <div class="flex-shrink-0" style="width: 150px;">
                        <small class="text-muted fw-semibold text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.06em;">Nama Lembaga</small>
                    </div>
                    <div class="flex-grow-1 fw-semibold text-dark"><?= $detail->nama_lembaga ?></div>
                </div>
                <div class="info-row d-flex">
                    <div class="flex-shrink-0" style="width: 150px;">
                        <small class="text-muted fw-semibold text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.06em;">Alamat Lembaga</small>
                    </div>
                    <div class="flex-grow-1 fw-semibold text-dark"><?= $detail->alamat_lembaga ?></div>
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
                        <small class="text-muted fw-semibold text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.06em;">Verifikator</small>
                    </div>
                    <div class="flex-grow-1 fw-bold text-dark"><?= $usulan->verifikator ?? '<span class="text-muted fst-italic">Belum ditentukan</span>' ?></div>
                </div>
                <div class="info-row d-flex mb-3 pb-3" style="border-bottom: 1px dashed #e9ecef;">
                    <div class="flex-shrink-0" style="width: 140px;">
                        <small class="text-muted fw-semibold text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.06em;">Status Usulan</small>
                    </div>
                    <div class="flex-grow-1 fw-semibold text-dark"><?= usul_status($usulan->status) ?></div>
                </div>
                <div class="info-row d-flex">
                    <div class="flex-shrink-0" style="width: 140px;">
                        <small class="text-muted fw-semibold text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.06em;">Keterangan</small>
                    </div>
                    <div class="flex-grow-1 fw-semibold text-dark"><?= $usulan->keterangan ?: '<span class="text-muted fst-italic">-</span>' ?></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-6">
    <div class="col-lg-7">
        <!-- Dokumen -->
        <div class="card mb-5" style="border: none; border-radius: 14px;">
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
                                    <?php if($dokumen->dok_status == 1): ?>
                                        <span class="badge bg-label-success d-inline-flex align-items-center" style="border-radius: 8px; padding: 5px 12px; font-size: 0.75rem;">
                                            <i class="ti tabler-check me-1"></i>Ya
                                        </span>
                                    <?php else: ?>
                                        <span class="badge bg-label-danger d-inline-flex align-items-center" style="border-radius: 8px; padding: 5px 12px; font-size: 0.75rem;">
                                            <i class="ti tabler-x me-1"></i>Tidak
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td style="padding: 12px 20px; border-bottom: 1px solid #f0f2f5; vertical-align: middle; color: #8c97a7; font-size: 0.85rem;"><?= $dokumen->keterangan ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-5">
        <!-- Unggah KMA -->
        <div class="card mb-5 position-sticky" style="border: none; border-radius: 14px; top: 100px; box-shadow: 0 4px 24px 0 rgba(34, 41, 47, 0.1);">
            <div class="card-header py-3 px-4 d-flex justify-content-between align-items-center" style="background: linear-gradient(135deg, #71dd37 0%, #a0e87a 100%); border: none;">
                <h6 class="card-title m-0 text-white fw-bold"><i class="ti tabler-certificate me-2"></i>Unggah KMA</h6>
            </div>
            <div class="card-body p-4">
                <form action="<?= site_url('supervisor/usulan/detail/kma/save/'.encrypt($usulan->id)) ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-4">
                        <label class="form-label fw-semibold" for="no_kma" style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.06em; color: #566a7f;">
                            <i class="ti tabler-hash me-1" style="color: #696cff;"></i>No Keputusan
                        </label>
                        <input type="text" id="no_kma" name="no_kma" class="form-control form-control-lg" style="border-radius: 10px; font-size: 1rem;" value="<?= $usulan->no_kma ?>" placeholder="Masukkan nomor keputusan" />
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label fw-semibold" for="tgl_kma" style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.06em; color: #566a7f;">
                            <i class="ti tabler-calendar me-1" style="color: #696cff;"></i>Tanggal Keputusan
                        </label>
                        <input type="date" id="tgl_kma" name="tgl_kma" class="form-control form-control-lg" style="border-radius: 10px; font-size: 1rem;" value="<?= $usulan->tgl_kma ?>" />
                    </div>

                    <div class="mb-5">
                        <label class="form-label fw-semibold" for="lampiran" style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.06em; color: #566a7f;">
                            <i class="ti tabler-upload me-1" style="color: #696cff;"></i>File Keputusan (PDF)
                        </label>
                        
                        <?php if($usulan->file_kma): ?>
                            <div class="d-flex align-items-center mb-3 p-3" style="background-color: #f8f9fb; border-radius: 10px; border-left: 4px solid #696cff;">
                                <div style="width: 40px; height: 40px; background: #eff1ff; border-radius: 8px; display: flex; align-items: center; justify-content: center; margin-right: 12px; flex-shrink: 0;">
                                    <i class="ti tabler-file-check text-primary" style="font-size: 1.25rem;"></i>
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <h6 class="mb-0 text-truncate" style="font-size: 0.85rem; font-weight: 600;"><?= $usulan->file_kma ?></h6>
                                    <small class="text-muted">Dokumen terunggah</small>
                                </div>
                                <a href="<?= base_url('uploads/kma/'.$usulan->file_kma) ?>" target="_blank" class="btn btn-sm btn-outline-primary" style="border-radius: 8px;">
                                    <i class="ti tabler-external-link"></i>
                                </a>
                            </div>
                            <div class="text-center text-muted mb-2" style="font-size: 0.8rem;">atau unggah file baru</div>
                        <?php endif; ?>
                        
                        <div class="position-relative">
                            <input type="file" class="form-control form-control-lg" id="lampiran" name="lampiran" aria-describedby="groupLampiran" aria-label="Upload" accept=".pdf" style="border-radius: 10px;" />
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-lg w-100 waves-effect waves-light" style="border-radius: 10px; box-shadow: 0 4px 12px rgba(105,108,255,0.3);">
                        <i class="ti tabler-device-floppy me-2"></i>Simpan Data
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Preview Modal -->
<div id="preview" class="modal fade" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" style="border: none; border-radius: 16px; overflow: hidden;">
            <div class="modal-header py-3 px-4" style="background: linear-gradient(135deg, #696cff 0%, #8592ff 100%); border: none;">
                <h6 class="modal-title text-white fw-semibold"><i class="ti tabler-eye me-2"></i>Preview Dokumen</h6>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0" id="object"></div>
            <div class="modal-footer" style="border-top: 1px solid #f0f2f5;">
                <button type="button" class="btn btn-label-secondary waves-effect" data-bs-dismiss="modal" style="border-radius: 8px;">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Disposisi Modal -->
<div id="disposisi" class="modal fade" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="border: none; border-radius: 16px; overflow: hidden;">
            <div class="modal-header py-3 px-4" style="background: linear-gradient(135deg, #71dd37 0%, #a0e87a 100%); border: none;">
                <h5 class="modal-title text-white fw-semibold" id="myModalLabel"><i class="ti tabler-send me-2"></i>Disposisi Usulan</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="<?= site_url('supervisor/usulan/pembentukanfai/disposisi/'.encrypt($usulan->id)) ?>">
                <div class="modal-body p-4">
                    <div class="mb-4">
                        <label class="form-label fw-semibold" for="verifikator" style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.06em; color: #566a7f;">
                            <i class="ti tabler-user-check me-1" style="color: #696cff;"></i>Verifikator
                        </label>
                        <select name="verifikator" id="verifikator" class="form-select" style="border-radius: 10px; border-color: #e9ecef;">
                            <?php foreach($users as $user): ?>
                                <option value="<?= $user->id ?>"><?= $user->full_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold" for="catatan" style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.06em; color: #566a7f;">
                            <i class="ti tabler-note me-1" style="color: #696cff;"></i>Catatan
                        </label>
                        <textarea id="catatan" name="catatan" class="form-control" rows="3" style="border-radius: 10px; border-color: #e9ecef;" placeholder="Masukkan catatan disposisi..."></textarea>
                    </div>
                </div>
                <div class="modal-footer" style="border-top: 1px solid #f0f2f5;">
                    <button type="button" class="btn btn-label-secondary waves-effect" data-bs-dismiss="modal" style="border-radius: 8px;">Tutup</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light" style="border-radius: 8px; box-shadow: 0 4px 12px rgba(105,108,255,0.3);">
                        <i class="ti tabler-check me-1"></i>Simpan
                    </button>
                </div>
            </form>
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