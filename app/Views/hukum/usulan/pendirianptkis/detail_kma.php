<?= $this->extend('hukum/template') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
    <div class="d-flex flex-column justify-content-center">
        <div class="d-flex align-items-center gap-2 mb-1">
            <div style="width: 4px; height: 28px; background: linear-gradient(180deg, #696cff, #a3acff); border-radius: 4px;"></div>
            <h4 class="mb-0 fw-bold" style="letter-spacing: -0.02em;">Keputusan Menteri Agama (KMA)</h4>
        </div>
        <p class="text-muted mb-0 ms-3" style="font-size: 0.875rem;">Pendirian PTKIS — <?= esc($detail->nama_lembaga) ?></p>
    </div>
    <div class="d-flex align-content-center flex-wrap gap-3">
        <a href="<?= site_url('hukum/usulan') ?>" class="btn btn-label-secondary waves-effect" style="border-radius: 10px; padding: 8px 20px;">
            <i class="ti tabler-arrow-left me-1"></i>Kembali ke Daftar
        </a>
    </div>
</div>

<!-- Tab Navigation -->
<div class="nav-align-top mb-6">
    <ul class="nav nav-pills flex-column flex-md-row row-gap-2 shadow-sm" style="background: white; border-radius: 12px; padding: 6px;">
        <li class="nav-item">
            <a class="nav-link waves-effect waves-light" href="<?= site_url('hukum/usulan/pendirianptkis/detail/' . $encrypted_id) ?>" style="border-radius: 8px;">
                <i class="icon-base ti tabler-info-circle me-1_5 icon-sm"></i>Info Usulan
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link waves-effect waves-light" href="<?= site_url('hukum/usulan/pendirianptkis/detail/verifikasi/' . $encrypted_id) ?>" style="border-radius: 8px;">
                <i class="icon-base ti tabler-user-check me-1_5 icon-sm"></i>Verifikasi Dokumen
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link waves-effect waves-light" href="<?= site_url('hukum/usulan/pendirianptkis/detail/penilaian/' . $encrypted_id) ?>" style="border-radius: 8px;">
                <i class="icon-base ti tabler-clipboard-check me-1_5 icon-sm"></i>Penilaian Asesor
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link waves-effect waves-light" href="<?= site_url('hukum/usulan/pendirianptkis/detail/rkma/' . $encrypted_id) ?>" style="border-radius: 8px;">
                <i class="icon-base ti tabler-file-certificate me-1_5 icon-sm"></i>RKMA
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link active waves-effect waves-light" href="<?= site_url('hukum/usulan/pendirianptkis/detail/kma/' . $encrypted_id) ?>" style="border-radius: 8px;">
                <i class="icon-base ti tabler-certificate me-1_5 icon-sm"></i>KMA (Keputusan)
            </a>
        </li>
    </ul>
</div>

<div class="row g-6">
    <div class="col-sm-12">
        <div class="card border-0 shadow-sm" style="border-radius: 14px;">
            <div class="card-header py-3 px-4 d-flex align-items-center" style="border-bottom: 1px solid #f0f2f5;">
                <div style="width: 36px; height: 36px; background: linear-gradient(135deg, #696cff, #8592ff); border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 12px;">
                    <i class="ti tabler-certificate text-white" style="font-size: 1.1rem;"></i>
                </div>
                <h5 class="mb-0 fw-bold" style="color: #566a7f;">Informasi Keputusan Menteri Agama (KMA)</h5>
            </div>
            <div class="card-body p-4">
                <div class="row mb-4 pb-3" style="border-bottom: 1px dashed #e9ecef;">
                    <div class="col-sm-3">
                        <span class="text-muted fw-semibold" style="font-size: 0.85rem;">Nomor Keputusan</span>
                    </div>
                    <div class="col-sm-9">
                        <span class="fw-bold text-dark fs-6"><?= esc($usulan->no_kma ?: '-') ?></span>
                    </div>
                </div>

                <div class="row mb-4 pb-3" style="border-bottom: 1px dashed #e9ecef;">
                    <div class="col-sm-3">
                        <span class="text-muted fw-semibold" style="font-size: 0.85rem;">Tanggal Keputusan</span>
                    </div>
                    <div class="col-sm-9">
                        <span class="fw-semibold text-dark"><?= esc($usulan->tgl_kma ? date('d F Y', strtotime($usulan->tgl_kma)) : '-') ?></span>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-sm-3">
                        <span class="text-muted fw-semibold" style="font-size: 0.85rem;">Berkas Keputusan (KMA)</span>
                    </div>
                    <div class="col-sm-9">
                        <?php if (!empty($usulan->file_kma)): ?>
                            <div class="d-flex align-items-center gap-3">
                                <a class="btn btn-primary waves-effect waves-light" href="<?= base_url('uploads/kma/' . $usulan->file_kma) ?>" target="_blank" style="border-radius: 10px; padding: 8px 20px; box-shadow: 0 4px 12px rgba(105,108,255,0.3);">
                                    <i class="ti tabler-eye me-1"></i> Buka / Unduh File KMA (PDF)
                                </a>
                                <span class="text-muted" style="font-size: 0.85rem;"><?= esc($usulan->file_kma) ?></span>
                            </div>
                        <?php else: ?>
                            <span class="badge bg-label-secondary rounded-pill px-3 py-2">Belum ada file KMA diunggah</span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
