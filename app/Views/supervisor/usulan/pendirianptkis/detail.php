<?= $this->extend('supervisor/template') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
    <div class="d-flex flex-column justify-content-center">
        <div class="d-flex align-items-center gap-2 mb-1">
            <div style="width: 4px; height: 28px; background: linear-gradient(180deg, #696cff, #a3acff); border-radius: 4px;"></div>
            <h4 class="mb-0 fw-bold" style="letter-spacing: -0.02em;">Detail Usulan</h4>
        </div>
        <p class="text-muted mb-0 ms-3" style="font-size: 0.875rem;">Pendirian PTKIS — <?= $detail->nama_lembaga ?></p>
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
                    <div class="flex-grow-1 fw-semibold text-dark"><?= $usulan->verifikator_nama ?? '<span class="text-muted fst-italic">Belum ditentukan</span>' ?></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tabs Navigation -->
<div class="nav-align-top mb-5">
    <ul class="nav nav-pills flex-column flex-md-row row-gap-2" style="background: white; border-radius: 12px; padding: 6px;">
        <li class="nav-item">
            <a href="<?= site_url('supervisor/usulan/pendirianptkis/detail/' . encrypt($usulan->id)) ?>" class="nav-link active waves-effect waves-light" style="border-radius: 8px;">
                <i class="icon-base ti tabler-info-circle me-1_5 icon-sm"></i>Info Usulan
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= site_url('supervisor/usulan/pendirianptkis/detail/verifikasi/' . encrypt($usulan->id)) ?>" class="nav-link waves-effect waves-light" style="border-radius: 8px;">
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

<!-- Content Columns -->
<div class="row g-6">
    <!-- Left Column -->
    <div class="col-lg-5">
        <!-- Data Lembaga -->
        <div class="card mb-5" style="border: none; border-radius: 14px;">
            <div class="card-header py-3 px-4 d-flex align-items-center" style="border-bottom: 1px solid #f0f2f5;">
                <div style="width: 36px; height: 36px; background: linear-gradient(135deg, #696cff, #8592ff); border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 12px;">
                    <i class="ti tabler-building-bank text-white" style="font-size: 1.1rem;"></i>
                </div>
                <h6 class="mb-0 fw-bold" style="color: #566a7f;">Data Lembaga</h6>
            </div>
            <div class="card-body p-4">
                <h6 class="text-uppercase fw-bold mb-3" style="font-size: 0.7rem; letter-spacing: 0.1em; color: #696cff;">
                    <i class="ti tabler-info-circle me-1"></i>Informasi Utama
                </h6>
                <div class="d-flex flex-column gap-3 mb-4">
                    <div class="d-flex justify-content-between align-items-start py-2" style="border-bottom: 1px solid #f5f5f9;">
                        <span class="text-muted" style="font-size: 0.82rem;">Nama Lembaga</span>
                        <span class="fw-semibold text-dark text-end" style="font-size: 0.82rem; max-width: 55%;"><?= $detail->nama_lembaga ?></span>
                    </div>
                    <div class="d-flex justify-content-between py-2" style="border-bottom: 1px solid #f5f5f9;">
                        <span class="text-muted" style="font-size: 0.82rem;">Kategori</span>
                        <span class="fw-semibold text-dark" style="font-size: 0.82rem;"><?= $detail->kategori ?></span>
                    </div>
                    <div class="d-flex justify-content-between py-2" style="border-bottom: 1px solid #f5f5f9;">
                        <span class="text-muted" style="font-size: 0.82rem;">Jenjang</span>
                        <span class="fw-semibold text-dark" style="font-size: 0.82rem;"><?= $detail->jenjang ?></span>
                    </div>
                    <div class="d-flex justify-content-between py-2" style="border-bottom: 1px solid #f5f5f9;">
                        <span class="text-muted" style="font-size: 0.82rem;">Kopertais</span>
                        <span class="fw-semibold text-dark" style="font-size: 0.82rem;"><?= $detail->kopertais ?></span>
                    </div>
                    <div class="d-flex justify-content-between py-2" style="border-bottom: 1px solid #f5f5f9;">
                        <span class="text-muted" style="font-size: 0.82rem;">No. Telepon</span>
                        <span class="fw-semibold text-dark" style="font-size: 0.82rem;"><?= $detail->telepon ?></span>
                    </div>
                    <div class="d-flex justify-content-between py-2">
                        <span class="text-muted" style="font-size: 0.82rem;">No. HP</span>
                        <span class="fw-semibold text-dark" style="font-size: 0.82rem;"><?= $detail->no_hp ?></span>
                    </div>
                </div>

                <h6 class="text-uppercase fw-bold mb-3" style="font-size: 0.7rem; letter-spacing: 0.1em; color: #696cff;">
                    <i class="ti tabler-map-pin me-1"></i>Alamat Lembaga
                </h6>
                <div class="d-flex flex-column gap-3">
                    <div class="d-flex justify-content-between py-2" style="border-bottom: 1px solid #f5f5f9;">
                        <span class="text-muted" style="font-size: 0.82rem;">Provinsi</span>
                        <span class="fw-semibold text-dark text-end" style="font-size: 0.82rem; max-width: 55%;"><?= $provinsi ?></span>
                    </div>
                    <div class="d-flex justify-content-between py-2" style="border-bottom: 1px solid #f5f5f9;">
                        <span class="text-muted" style="font-size: 0.82rem;">Kab/Kota</span>
                        <span class="fw-semibold text-dark text-end" style="font-size: 0.82rem; max-width: 55%;"><?= $kabupaten ?></span>
                    </div>
                    <div class="d-flex justify-content-between py-2" style="border-bottom: 1px solid #f5f5f9;">
                        <span class="text-muted" style="font-size: 0.82rem;">Kecamatan</span>
                        <span class="fw-semibold text-dark text-end" style="font-size: 0.82rem; max-width: 55%;"><?= $kecamatan ?></span>
                    </div>
                    <div class="d-flex justify-content-between py-2" style="border-bottom: 1px solid #f5f5f9;">
                        <span class="text-muted" style="font-size: 0.82rem;">Kelurahan</span>
                        <span class="fw-semibold text-dark text-end" style="font-size: 0.82rem; max-width: 55%;"><?= $kelurahan ?></span>
                    </div>
                    <div class="d-flex justify-content-between py-2" style="border-bottom: 1px solid #f5f5f9;">
                        <span class="text-muted" style="font-size: 0.82rem;">Kode Pos</span>
                        <span class="fw-semibold text-dark" style="font-size: 0.82rem;"><?= $detail->kode_pos ?></span>
                    </div>
                    <div class="d-flex justify-content-between py-2">
                        <span class="text-muted" style="font-size: 0.82rem;">Alamat</span>
                        <span class="fw-semibold text-dark text-end" style="font-size: 0.82rem; max-width: 55%;"><?= $detail->alamat ?></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Program Studi -->
        <div class="card mb-5" style="border: none; border-radius: 14px;">
            <div class="card-header py-3 px-4 d-flex align-items-center" style="border-bottom: 1px solid #f0f2f5;">
                <div style="width: 36px; height: 36px; background: linear-gradient(135deg, #71dd37, #a0e87a); border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 12px;">
                    <i class="ti tabler-school text-white" style="font-size: 1.1rem;"></i>
                </div>
                <h6 class="mb-0 fw-bold" style="color: #566a7f;">Program Studi</h6>
            </div>
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr style="background: #f8f9fb;">
                            <th style="padding: 12px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">Nama Prodi</th>
                            <th style="padding: 12px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">Jenjang</th>
                            <th style="padding: 12px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">Dokumen</th>
                            <th style="padding: 12px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">SIPPRO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($prodi)): ?>
                            <tr>
                                <td colspan="4" class="text-center py-4" style="border: none;">
                                    <div class="text-muted">
                                        <i class="ti tabler-folder-off" style="font-size: 1.5rem;"></i>
                                        <p class="mb-0 mt-2" style="font-size: 0.82rem;">Tidak ada data program studi</p>
                                    </div>
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($prodi as $p): ?>
                                <tr class="doc-row">
                                    <td style="padding: 12px 20px; border-bottom: 1px solid #f0f2f5; vertical-align: middle; font-weight: 600; color: #566a7f;"><?= $p->nama_prodi ?></td>
                                    <td style="padding: 12px 20px; border-bottom: 1px solid #f0f2f5; vertical-align: middle;">
                                        <span class="badge bg-label-info" style="border-radius: 8px; padding: 4px 10px; font-size: 0.72rem;"><?= $p->jenjang ?></span>
                                    </td>
                                    <td style="padding: 12px 20px; border-bottom: 1px solid #f0f2f5; vertical-align: middle;">
                                        <a class="btn btn-sm btn-outline-primary" style="border-radius: 8px;" href="javascript:void(0);" onclick="showdoc(6,'<?= encrypt($p->id) ?>')">
                                            <i class="icon-base ti tabler-checklist me-1"></i>Dokumen
                                        </a>
                                    </td>
                                    <td style="padding: 12px 20px; border-bottom: 1px solid #f0f2f5; vertical-align: middle;">
                                        <div class="d-flex gap-2">
                                            <button type="button" class="btn btn-sm btn-primary" style="border-radius: 8px;"
                                                onclick="kirimProdiSippro(<?= $p->id ?>, this)">
                                                <i class="ti tabler-send me-1"></i>Kirim
                                            </button>
                                            <button type="button" class="btn btn-sm btn-outline-info" style="border-radius: 8px;"
                                                onclick="logProdiSippro(<?= $p->id ?>)">
                                                <i class="ti tabler-history me-1"></i>Log
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Right Column -->
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
                            <th style="padding: 12px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;" width="50%">Dokumen</th>
                            <th style="padding: 12px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">Sesuai</th>
                            <th style="padding: 12px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dokumens as $dokumen): ?>
                            <tr class="doc-row">
                                <td style="padding: 12px 20px; border-bottom: 1px solid #f0f2f5; vertical-align: middle;">
                                    <?php if ($dokumen->lampiran): ?>
                                        <a href="javascript:;" onclick="preview('<?= base_url('uploads/' . $dokumen->lampiran) ?>')" class="d-flex align-items-center gap-2 text-primary fw-medium text-decoration-none">
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

        <!-- Log Integrasi SIPPRO -->
        <div class="card mb-5" style="border: none; border-radius: 14px;">
            <div class="card-header py-3 px-4 d-flex align-items-center" style="border-bottom: 1px solid #f0f2f5;">
                <div style="width: 36px; height: 36px; background: linear-gradient(135deg, #ffab00, #ffd666); border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 12px;">
                    <i class="ti tabler-plug-connected text-white" style="font-size: 1.1rem;"></i>
                </div>
                <h6 class="mb-0 fw-bold" style="color: #566a7f;">Log Integrasi SIPPRO</h6>
            </div>
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr style="background: #f8f9fb;">
                            <th style="padding: 12px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">Waktu</th>
                            <th style="padding: 12px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">Endpoint</th>
                            <th style="padding: 12px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">Status</th>
                            <th style="padding: 12px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($sippro_logs)): ?>
                            <tr>
                                <td colspan="4" class="text-center py-4" style="border: none;">
                                    <div class="text-muted">
                                        <i class="ti tabler-plug-connected-x" style="font-size: 1.5rem;"></i>
                                        <p class="mb-0 mt-2" style="font-size: 0.82rem;">Belum ada riwayat pengiriman data ke SIPPRO</p>
                                    </div>
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($sippro_logs as $log): ?>
                                <tr class="doc-row">
                                    <td style="padding: 12px 20px; border-bottom: 1px solid #f0f2f5; vertical-align: middle; font-size: 0.82rem; color: #566a7f;">
                                        <?= date('d/m/Y H:i', strtotime($log->created_at)) ?>
                                    </td>
                                    <td style="padding: 12px 20px; border-bottom: 1px solid #f0f2f5; vertical-align: middle;">
                                        <code style="font-size: 0.75rem; background: #f0f2f5; padding: 3px 8px; border-radius: 6px;"><?= $log->endpoint ?></code>
                                    </td>
                                    <td style="padding: 12px 20px; border-bottom: 1px solid #f0f2f5; vertical-align: middle;">
                                        <?php if ($log->is_success): ?>
                                            <span class="badge bg-label-success d-inline-flex align-items-center" style="border-radius: 8px; padding: 5px 10px; font-size: 0.72rem;">
                                                <i class="ti tabler-check me-1"></i>Sukses (<?= $log->status_code ?>)
                                            </span>
                                        <?php else: ?>
                                            <span class="badge bg-label-danger d-inline-flex align-items-center" style="border-radius: 8px; padding: 5px 10px; font-size: 0.72rem;">
                                                <i class="ti tabler-x me-1"></i>Gagal (<?= $log->status_code ?>)
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td style="padding: 12px 20px; border-bottom: 1px solid #f0f2f5; vertical-align: middle;">
                                        <button type="button" class="btn btn-sm btn-outline-info" style="border-radius: 8px;"
                                            onclick="showSipproDetail('<?= htmlspecialchars($log->request_data ?? '', ENT_QUOTES) ?>', '<?= htmlspecialchars($log->response_data ?? '', ENT_QUOTES) ?>')">
                                            <i class="ti tabler-eye me-1"></i>Detail
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
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
                <a href="" target="_blank" class="btn btn-primary waves-effect" id="previewfile" style="border-radius: 8px;"><i class="ti tabler-external-link me-1"></i>Buka Tab Baru</a>
                <button type="button" class="btn btn-label-secondary waves-effect" data-bs-dismiss="modal" style="border-radius: 8px;">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- SIPPRO Detail Modal -->
<div id="modalSippro" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="border: none; border-radius: 16px; overflow: hidden;">
            <div class="modal-header py-3 px-4" style="background: linear-gradient(135deg, #ffab00 0%, #ffd666 100%); border: none;">
                <h6 class="modal-title text-white fw-semibold"><i class="ti tabler-code me-2"></i>Detail Log SIPPRO</h6>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <h6 class="fw-bold mb-2" style="font-size: 0.8rem; color: #696cff;"><i class="ti tabler-arrow-up-right me-1"></i>Request Payload</h6>
                <pre id="sipproReq" class="p-3 rounded mb-4" style="background: #f8f9fb; max-height: 250px; overflow-y: auto; font-size: 0.75rem; border: 1px solid #f0f2f5; border-radius: 10px !important;"></pre>
                <h6 class="fw-bold mb-2" style="font-size: 0.8rem; color: #71dd37;"><i class="ti tabler-arrow-down-left me-1"></i>Response API</h6>
                <pre id="sipproRes" class="p-3 rounded" style="background: #f8f9fb; max-height: 250px; overflow-y: auto; font-size: 0.75rem; border: 1px solid #f0f2f5; border-radius: 10px !important;"></pre>
            </div>
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
                <h6 class="modal-title text-white fw-semibold"><i class="ti tabler-send me-2"></i>Disposisi Usulan</h6>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="<?= site_url('supervisor/usulan/pendirianptkis/disposisi/' . encrypt($usulan->id)) ?>">
                <div class="modal-body p-4">
                    <div class="mb-4">
                        <label class="form-label fw-semibold" style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.06em; color: #566a7f;">
                            <i class="ti tabler-user-check me-1" style="color: #696cff;"></i>Verifikator
                        </label>
                        <select name="verifikator" id="verifikator" class="form-select" style="border-radius: 10px; border-color: #e9ecef;">
                            <?php foreach ($users as $user): ?>
                                <option value="<?= $user->id ?>"><?= $user->full_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold" style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.06em; color: #566a7f;">
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

<!-- Offcanvas Dokumen -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="canvasDoc" aria-labelledby="canvasDocLabel" style="border-radius: 16px 0 0 16px;">
    <div class="offcanvas-header" style="background: linear-gradient(135deg, #696cff 0%, #8592ff 100%); border: none;">
        <h5 id="canvasDocLabel" class="offcanvas-title text-white fw-semibold"><i class="ti tabler-file-stack me-2"></i>Dokumen Pendukung</h5>
        <button type="button" class="btn-close btn-close-white text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body my-auto mx-0 flex-grow-0">
        <div id="lisdoc"></div>
        <button type="button" class="btn btn-label-secondary d-grid w-100 mt-3" data-bs-dismiss="offcanvas" style="border-radius: 10px;">
            Tutup
        </button>
    </div>
</div>

<style>
    .doc-row { transition: background-color 0.2s ease; }
    .doc-row:hover { background-color: #f8f9fb !important; }
</style>

<?= $this->endSection() ?>
<?= $this->section('scripts'); ?>
<script>
    $(document).ready(function () {
        $('.formcheck').change(function (event) {
            if (this.checked) {
                $.get('<?= site_url('verifikator/usulan/validasidokumen'); ?>/' + this.id + '/1/0', function () {
                    alert('Berkas divalidasi');
                });
            } else {
                $.get('<?= site_url('verifikator/usulan/validasidokumen'); ?>/' + this.id + '/0/' + $('#keterangan_dokumen' + this.id).val(), function () {
                    alert('Berkas belum divalidasi');
                });
            }
        });
        $('.keterangancheck').change(function (event) {
            if (this.value) {
                $.get('<?= site_url('verifikator/usulan/validasidokumen'); ?>/' + this.dataset.dok + '/0/' + this.value, function () {
                    alert('Update keterangan berhasil');
                });
                $('#' + this.dataset.dok).prop('checked', false);
            }
        });
    });

    function preview(berkas) {
        $('#object').html('<object data="' + berkas + '" type="application/pdf" width="100%" style="height: 80vh;" id="object">' +
            '<p>Browser tidak mendukung!</p>' +
            '</object>');
        $('#previewfile').attr('href', berkas);
        $('#preview').modal('show');
    }

    function disposisi() {
        $('#disposisi').modal('show');
    }

    function showSipproDetail(req, res) {
        try {
            $('#sipproReq').text(JSON.stringify(JSON.parse(req), null, 2));
        } catch (e) {
            $('#sipproReq').text(req);
        }
        try {
            $('#sipproRes').text(JSON.stringify(JSON.parse(res), null, 2));
        } catch (e) {
            $('#sipproRes').text(res);
        }
        $('#modalSippro').modal('show');
    }

    function kirimProdiSippro(prodiId, el) {
        if (!confirm('Kirim data prodi ini ke SIPPRO?')) return;
        var btn = $(el);
        var btnHtml = btn.html();
        btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span> Mengirim...');
        $.post('<?= site_url('supervisor/usulan/pendirianptkis/kirimDataProdi') ?>/' + prodiId)
        .done(function (res) {
            Swal.fire({
                title: 'Berhasil',
                text: res.message,
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(function () {
                location.reload();
            });
        })
        .fail(function (xhr) {
            var errMsg = 'Gagal mengirim data';
            try {
                var res = xhr.responseJSON;
                if (res && res.message) errMsg = res.message;
            } catch (e) {}
            Swal.fire({ title: 'Gagal', text: errMsg, icon: 'error' });
        })
        .always(function () {
            btn.prop('disabled', false).html(btnHtml);
        });
    }

    function logProdiSippro(prodiId) {
        var logs = <?= json_encode($sippro_logs ?? []) ?>;
        var prodiLogs = logs.filter(function (l) { return l.prodi_id == prodiId; });
        if (prodiLogs.length === 0) {
            Swal.fire({ title: 'Log', text: 'Belum ada riwayat pengiriman untuk prodi ini.', icon: 'info' });
            return;
        }
        var latest = prodiLogs[prodiLogs.length - 1];
        var req = latest.request_data || '';
        var res = latest.response_data || '';
        try { $('#sipproReq').text(JSON.stringify(JSON.parse(req), null, 2)); } catch (e) { $('#sipproReq').text(req); }
        try { $('#sipproRes').text(JSON.stringify(JSON.parse(res), null, 2)); } catch (e) { $('#sipproRes').text(res); }
        $('#modalSippro').modal('show');
    }

    function declined() {
        Swal.fire({
            text: 'Masukan informasi Penolakan!',
            input: 'text',
            inputAttributes: { autocapitalize: 'off' },
            showCancelButton: true,
            confirmButtonText: 'Kembalikan Berkas',
            showLoaderOnConfirm: true,
            preConfirm: (data) => {
                return fetch('<?= site_url('verifikator/usulan/decline/' . encrypt($usulan->id)) ?>', {
                    method: "POST",
                    body: JSON.stringify({ keterangan: data }),
                    headers: { "Content-type": "application/json; charset=UTF-8" }
                })
                .then(response => {
                    if (!response.ok) throw new Error(response.statusText);
                    return response.json();
                })
                .catch(error => {
                    Swal.showValidationMessage(`Request failed: ${error}`);
                });
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?= site_url('verifikator/usulan') ?>';
            }
        });
    }

    function accept() {
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data yang sudah diverifikasi tidak dapat diubah kembali!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Terima Usulan!',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?= site_url('verifikator/usulan/accept/' . encrypt($usulan->id)) ?>';
            }
        });
    }

    function showdoc(layanan, usulid) {
        $('#lisdoc').html('<div class="text-center py-4"><div class="spinner-border text-primary" role="status"></div><p class="text-muted mt-2">Memuat dokumen...</p></div>');
        $('#lisdoc').load('<?= site_url('dokumen/verifikasi/') ?>' + layanan + '/' + usulid, function () {
            $('#canvasDoc').offcanvas('show');
        });
    }
</script>
<?= $this->endSection() ?>