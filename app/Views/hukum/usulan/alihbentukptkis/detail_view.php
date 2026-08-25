<?= $this->extend('hukum/template') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
    <div class="d-flex flex-column justify-content-center">
        <div class="d-flex align-items-center gap-2 mb-1">
            <div style="width: 4px; height: 28px; background: linear-gradient(180deg, #696cff, #a3acff); border-radius: 4px;"></div>
            <h4 class="mb-0 fw-bold" style="letter-spacing: -0.02em;">Detail Usulan Selesai</h4>
        </div>
        <p class="text-muted mb-0 ms-3" style="font-size: 0.875rem;">Alih Bentuk PTKIS — <?= esc($detail->nama_lembaga_baru ?? $detail->nama_lembaga) ?></p>
    </div>
    <div class="d-flex align-content-center flex-wrap gap-3">
        <a href="<?= site_url('hukum/usulan') ?>" class="btn btn-label-secondary waves-effect" style="border-radius: 10px; padding: 8px 20px;">
            <i class="ti tabler-arrow-left me-1"></i>Kembali ke Daftar
        </a>
    </div>
</div>

<!-- Info Usulan Card -->
<div class="card mb-5 border-0 shadow-sm" style="border-radius: 14px; overflow: hidden;">
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
                    <div class="flex-grow-1 fw-semibold text-dark"><?= esc($usulan->nomor_surat) ?></div>
                </div>
                <div class="info-row d-flex mb-3 pb-3" style="border-bottom: 1px dashed #e9ecef;">
                    <div class="flex-shrink-0" style="width: 150px;">
                        <small class="text-muted fw-semibold text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.06em;">Perihal</small>
                    </div>
                    <div class="flex-grow-1 fw-semibold text-dark"><?= esc($usulan->perihal) ?></div>
                </div>
                <div class="info-row d-flex">
                    <div class="flex-shrink-0" style="width: 150px;">
                        <small class="text-muted fw-semibold text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.06em;">Verifikator</small>
                    </div>
                    <div class="flex-grow-1 fw-bold text-dark">
                        <?= esc($verifikator->full_name ?? '-') ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="info-row d-flex mb-3 pb-3" style="border-bottom: 1px dashed #e9ecef;">
                    <div class="flex-shrink-0" style="width: 140px;">
                        <small class="text-muted fw-semibold text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.06em;">Status Usulan</small>
                    </div>
                    <div class="flex-grow-1 fw-semibold text-dark"><?= usul_status($usulan->status) ?></div>
                </div>
                <div class="info-row d-flex mb-3 pb-3" style="border-bottom: 1px dashed #e9ecef;">
                    <div class="flex-shrink-0" style="width: 140px;">
                        <small class="text-muted fw-semibold text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.06em;">No. / Tgl. KMA</small>
                    </div>
                    <div class="flex-grow-1 fw-bold text-success">
                        <?= esc($usulan->no_kma ?? '-') ?> (<?= esc($usulan->tgl_kma ?? '-') ?>)
                    </div>
                </div>
                <div class="info-row d-flex">
                    <div class="flex-shrink-0" style="width: 140px;">
                        <small class="text-muted fw-semibold text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.06em;">Keterangan</small>
                    </div>
                    <div class="flex-grow-1 fw-semibold text-dark"><?= esc($usulan->keterangan ?: '-') ?></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tabs Navigation -->
<div class="nav-align-top mb-5">
    <ul class="nav nav-pills flex-column flex-md-row row-gap-2 shadow-sm" style="background: white; border-radius: 12px; padding: 6px;" role="tablist">
        <li class="nav-item">
            <button type="button" class="nav-link active waves-effect waves-light" style="border-radius: 8px;" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-data" aria-controls="navs-pills-top-data" aria-selected="true">
                <i class="icon-base ti tabler-files me-1_5 icon-sm"></i>Data Lembaga
            </button>
        </li>
        <li class="nav-item">
            <button type="button" class="nav-link waves-effect waves-light" style="border-radius: 8px;" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-dokumen" aria-controls="navs-pills-top-dokumen" aria-selected="false">
                <i class="icon-base ti tabler-folders me-1_5 icon-sm"></i>Dokumen Persyaratan
            </button>
        </li>
        <li class="nav-item">
            <button type="button" class="nav-link waves-effect waves-light" style="border-radius: 8px;" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-kma" aria-controls="navs-pills-top-kma" aria-selected="false">
                <i class="icon-base ti tabler-certificate me-1_5 icon-sm"></i>Data KMA
            </button>
        </li>
    </ul>

    <div class="tab-content px-0 pb-0 bg-transparent shadow-none" style="border:none;">
        <!-- Tab 1: Data Lembaga -->
        <div class="tab-pane fade show active" id="navs-pills-top-data" role="tabpanel">
            <div class="card mb-4 border-0 shadow-sm" style="border-radius: 14px;">
                <div class="card-header py-3 px-4" style="border-bottom: 1px solid #f0f2f5;">
                    <h6 class="mb-0 fw-bold" style="color: #566a7f;">
                        <i class="ti tabler-building me-2 text-primary"></i>Informasi Perubahan Lembaga
                    </h6>
                </div>
                <div class="card-body p-4">
                    <div class="row g-4">
                        <div class="col-md-6 border-end">
                            <h6 class="text-muted mb-3"><span class="badge bg-label-secondary me-2">Lama</span>Data Lembaga Lama</h6>
                            <div class="d-flex flex-column gap-3">
                                <div>
                                    <small class="text-muted d-block" style="font-size: 0.75rem; text-transform: uppercase;">Nama Lembaga</small>
                                    <div class="fw-semibold text-dark"><?= esc($detail->nama_lembaga) ?></div>
                                </div>
                                <div>
                                    <small class="text-muted d-block" style="font-size: 0.75rem; text-transform: uppercase;">Alamat Lembaga</small>
                                    <div class="fw-semibold text-dark"><?= esc($detail->alamat_lembaga) ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ps-md-4">
                            <h6 class="text-primary mb-3"><span class="badge bg-label-primary me-2">Baru</span>Data Lembaga Baru</h6>
                            <div class="d-flex flex-column gap-3">
                                <div>
                                    <small class="text-muted d-block" style="font-size: 0.75rem; text-transform: uppercase;">Nama Lembaga Baru</small>
                                    <div class="fw-bold text-primary" style="font-size: 1.1rem;"><?= esc($detail->nama_lembaga_baru) ?></div>
                                </div>
                                <div>
                                    <small class="text-muted d-block" style="font-size: 0.75rem; text-transform: uppercase;">Kategori</small>
                                    <span class="badge bg-label-info"><?= esc($detail->kategori) ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm" style="border-radius: 14px;">
                        <div class="card-header py-3 px-4" style="border-bottom: 1px solid #f0f2f5;">
                            <h6 class="mb-0 fw-bold" style="color: #566a7f;"><i class="ti tabler-users me-2 text-primary"></i>Data Ketenagaan Dosen</h6>
                        </div>
                        <div class="card-body p-4">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    <span class="text-muted">Magister (S2)</span>
                                    <span class="badge bg-label-primary rounded-pill"><?= esc($detail->magister) ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    <span class="text-muted">Doktor (S3)</span>
                                    <span class="badge bg-label-primary rounded-pill"><?= esc($detail->doktor) ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    <span class="text-muted">Asisten Ahli</span>
                                    <span class="badge bg-label-primary rounded-pill"><?= esc($detail->asisten_ahli) ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    <span class="text-muted">Lektor</span>
                                    <span class="badge bg-label-primary rounded-pill"><?= esc($detail->lektor) ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    <span class="text-muted">Lektor Kepala</span>
                                    <span class="badge bg-label-primary rounded-pill"><?= esc($detail->lektor_kepala) ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    <span class="text-muted">Guru Besar</span>
                                    <span class="badge bg-label-primary rounded-pill"><?= esc($detail->guru_besar) ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm" style="border-radius: 14px;">
                        <div class="card-header py-3 px-4" style="border-bottom: 1px solid #f0f2f5;">
                            <h6 class="mb-0 fw-bold" style="color: #566a7f;"><i class="ti tabler-message-2 me-2 text-primary"></i>Catatan & Penilaian</h6>
                        </div>
                        <div class="card-body p-4 d-flex flex-column gap-3">
                            <div class="p-3 rounded-3" style="background: #f8f9fb; border-left: 4px solid #696cff;">
                                <h6 class="mb-1 fw-bold text-dark">Catatan Verifikator</h6>
                                <p class="mb-0 text-muted" style="font-size: 0.85rem;"><?= esc($detail->catatan ?: 'Tidak ada catatan.') ?></p>
                            </div>
                            <div class="p-3 rounded-3" style="background: #fff9e6; border-left: 4px solid #ffab00;">
                                <h6 class="mb-1 fw-bold text-dark">Instrumen Penilaian Verifikator</h6>
                                <?php if (!empty($detail->nilai)): ?>
                                    <a href="<?= base_url('uploads/nilai/' . $detail->nilai) ?>" class="btn btn-sm btn-warning mt-2 shadow-sm" target="_blank" style="border-radius: 8px;">
                                        <i class="ti tabler-download me-1"></i>Unduh Berkas Nilai
                                    </a>
                                <?php else: ?>
                                    <small class="text-muted">Belum ada file penilaian.</small>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tab 2: Dokumen Persyaratan -->
        <div class="tab-pane fade" id="navs-pills-top-dokumen" role="tabpanel">
            <div class="card border-0 shadow-sm" style="border-radius: 14px; overflow: hidden;">
                <div class="card-header py-3 px-4" style="border-bottom: 1px solid #f0f2f5;">
                    <h6 class="mb-0 fw-bold" style="color: #566a7f;"><i class="ti tabler-files me-2 text-primary"></i>Daftar Dokumen Lampiran</h6>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead style="background: #f8f9fb;">
                            <tr>
                                <th style="padding: 12px 20px; font-size: 0.72rem; text-transform: uppercase; font-weight: 700; color: #8c97a7; border: none; width: 60px;">No</th>
                                <th style="padding: 12px 20px; font-size: 0.72rem; text-transform: uppercase; font-weight: 700; color: #8c97a7; border: none;">Nama Dokumen</th>
                                <th style="padding: 12px 20px; font-size: 0.72rem; text-transform: uppercase; font-weight: 700; color: #8c97a7; border: none; text-align: center;">Berkas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($dokumens)): ?>
                                <?php $n = 1; foreach ($dokumens as $dokumen): ?>
                                    <tr>
                                        <td style="padding: 12px 20px; vertical-align: middle; border-bottom: 1px solid #f0f2f5;"><?= $n++ ?></td>
                                        <td style="padding: 12px 20px; vertical-align: middle; border-bottom: 1px solid #f0f2f5;">
                                            <div class="fw-semibold text-dark"><?= esc($dokumen->dokumen) ?></div>
                                            <?php if (!empty($dokumen->keterangan)): ?>
                                                <small class="text-muted"><?= esc($dokumen->keterangan) ?></small>
                                            <?php endif; ?>
                                        </td>
                                        <td style="padding: 12px 20px; vertical-align: middle; border-bottom: 1px solid #f0f2f5; text-align: center;">
                                            <?php if (!empty($dokumen->lampiran)): ?>
                                                <a href="<?= base_url('uploads/' . $dokumen->lampiran) ?>" target="_blank" class="btn btn-sm btn-outline-primary" style="border-radius: 8px;">
                                                    <i class="ti tabler-file-text me-1"></i>Lihat PDF
                                                </a>
                                            <?php else: ?>
                                                <span class="text-muted fst-italic">Tidak Ada File</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="3" class="text-center py-4 text-muted">Tidak ada dokumen lampiran.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Tab 3: Data KMA -->
        <div class="tab-pane fade" id="navs-pills-top-kma" role="tabpanel">
            <div class="card col-lg-8 mx-auto border-0 shadow-sm" style="border-radius: 14px;">
                <div class="card-header py-3 px-4" style="background: linear-gradient(135deg, #696cff 0%, #8592ff 100%); border-radius: 14px 14px 0 0;">
                    <h6 class="card-title m-0 text-white fw-bold"><i class="ti tabler-certificate me-2"></i>Keputusan Menteri Agama (KMA)</h6>
                </div>
                <div class="card-body p-4">
                    <div class="mb-4 pb-3" style="border-bottom: 1px dashed #e9ecef;">
                        <span class="text-muted fw-semibold d-block mb-1" style="font-size: 0.8rem; text-transform: uppercase;">No Keputusan</span>
                        <span class="fw-bold text-dark fs-6"><?= esc($usulan->no_kma ?: '-') ?></span>
                    </div>
                    <div class="mb-4 pb-3" style="border-bottom: 1px dashed #e9ecef;">
                        <span class="text-muted fw-semibold d-block mb-1" style="font-size: 0.8rem; text-transform: uppercase;">Tanggal Keputusan</span>
                        <span class="fw-semibold text-dark"><?= esc($usulan->tgl_kma ? date('d F Y', strtotime($usulan->tgl_kma)) : '-') ?></span>
                    </div>
                    <div>
                        <span class="text-muted fw-semibold d-block mb-2" style="font-size: 0.8rem; text-transform: uppercase;">Berkas KMA (PDF)</span>
                        <?php if (!empty($usulan->file_kma)): ?>
                            <a class="btn btn-primary waves-effect waves-light" href="<?= base_url('uploads/kma/' . $usulan->file_kma) ?>" target="_blank" style="border-radius: 10px;">
                                <i class="ti tabler-eye me-1"></i> Buka / Unduh File KMA (PDF)
                            </a>
                        <?php else: ?>
                            <span class="badge bg-label-secondary">Belum ada file KMA</span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
