<?= $this->extend('hukum/template') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
    <div class="d-flex flex-column justify-content-center">
        <div class="d-flex align-items-center gap-2 mb-1">
            <div style="width: 4px; height: 28px; background: linear-gradient(180deg, #696cff, #a3acff); border-radius: 4px;"></div>
            <h4 class="mb-0 fw-bold" style="letter-spacing: -0.02em;">Detail Usulan Selesai</h4>
        </div>
        <p class="text-muted mb-0 ms-3" style="font-size: 0.875rem;">Pendirian PTKIS — <?= esc($detail->nama_lembaga) ?></p>
    </div>
    <div class="d-flex align-content-center flex-wrap gap-3">
        <a href="<?= site_url('hukum/usulan') ?>" class="btn btn-label-secondary waves-effect" style="border-radius: 10px; padding: 8px 20px;">
            <i class="ti tabler-arrow-left me-1"></i>Kembali ke Daftar
        </a>
    </div>
</div>

<!-- Info Yayasan Card -->
<div class="card mb-5 border-0 shadow-sm" style="border-radius: 14px; overflow: hidden;">
    <div class="card-header py-3 px-4" style="background: linear-gradient(135deg, #696cff 0%, #8592ff 100%); border: none;">
        <h6 class="mb-0 text-white fw-semibold">
            <i class="ti tabler-building me-2"></i>Informasi Yayasan & Status Usulan
        </h6>
    </div>
    <div class="card-body p-4">
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="info-row d-flex mb-3 pb-3" style="border-bottom: 1px dashed #e9ecef;">
                    <div class="flex-shrink-0" style="width: 140px;">
                        <small class="text-muted fw-semibold text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.06em;">Nama Yayasan</small>
                    </div>
                    <div class="flex-grow-1 fw-semibold text-dark"><?= esc($detail->yayasan_nama) ?></div>
                </div>
                <div class="info-row d-flex mb-3 pb-3" style="border-bottom: 1px dashed #e9ecef;">
                    <div class="flex-shrink-0" style="width: 140px;">
                        <small class="text-muted fw-semibold text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.06em;">Alamat Yayasan</small>
                    </div>
                    <div class="flex-grow-1 fw-semibold text-dark"><?= esc($detail->yayasan_alamat) ?></div>
                </div>
                <div class="info-row d-flex mb-3 pb-3" style="border-bottom: 1px dashed #e9ecef;">
                    <div class="flex-shrink-0" style="width: 140px;">
                        <small class="text-muted fw-semibold text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.06em;">No. SK Yayasan</small>
                    </div>
                    <div class="flex-grow-1 fw-semibold text-dark"><?= esc($detail->yayasan_nosk) ?></div>
                </div>
                <div class="info-row d-flex">
                    <div class="flex-shrink-0" style="width: 140px;">
                        <small class="text-muted fw-semibold text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.06em;">Tanggal SK</small>
                    </div>
                    <div class="flex-grow-1 fw-semibold text-dark"><?= esc($detail->yayasan_tglsk) ?></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="info-row d-flex mb-3 pb-3" style="border-bottom: 1px dashed #e9ecef;">
                    <div class="flex-shrink-0" style="width: 140px;">
                        <small class="text-muted fw-semibold text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.06em;">Jenis Layanan</small>
                    </div>
                    <div class="flex-grow-1">
                        <span class="badge bg-label-primary" style="border-radius: 8px; padding: 5px 14px;"><?= esc($usulan->layanan_nama) ?></span>
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
                        <small class="text-muted fw-semibold text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.06em;">No. / Tgl. KMA</small>
                    </div>
                    <div class="flex-grow-1 fw-bold text-success">
                        <?= esc($usulan->no_kma ?? '-') ?> (<?= esc($usulan->tgl_kma ?? '-') ?>)
                    </div>
                </div>
                <div class="info-row d-flex">
                    <div class="flex-shrink-0" style="width: 140px;">
                        <small class="text-muted fw-semibold text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.06em;">Verifikator</small>
                    </div>
                    <div class="flex-grow-1 fw-bold text-dark"><?= esc($verifikator ? $verifikator->full_name : '-') ?></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tab Navigation -->
<div class="nav-align-top mb-6">
    <ul class="nav nav-pills flex-column flex-md-row row-gap-2 shadow-sm" style="background: white; border-radius: 12px; padding: 6px;">
        <li class="nav-item">
            <a class="nav-link active waves-effect waves-light" href="<?= site_url('hukum/usulan/pendirianptkis/detail/' . $encrypted_id) ?>" style="border-radius: 8px;">
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
            <a class="nav-link waves-effect waves-light" href="<?= site_url('hukum/usulan/pendirianptkis/detail/kma/' . $encrypted_id) ?>" style="border-radius: 8px;">
                <i class="icon-base ti tabler-certificate me-1_5 icon-sm"></i>KMA (Keputusan)
            </a>
        </li>
    </ul>
</div>

<!-- Content Columns -->
<div class="row g-6">
    <!-- Left: Main Content -->
    <div class="col-lg-8">
        <!-- Data Lembaga -->
        <div class="card mb-5 border-0 shadow-sm" style="border-radius: 14px;">
            <div class="card-header py-3 px-4 d-flex align-items-center" style="border-bottom: 1px solid #f0f2f5;">
                <div style="width: 36px; height: 36px; background: linear-gradient(135deg, #696cff, #8592ff); border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 12px;">
                    <i class="ti tabler-building-bank text-white" style="font-size: 1.1rem;"></i>
                </div>
                <h6 class="mb-0 fw-bold" style="color: #566a7f;">Data Lembaga</h6>
            </div>
            <div class="card-body p-4">
                <div class="row g-4">
                    <div class="col-md-6">
                        <h6 class="text-uppercase fw-bold mb-3" style="font-size: 0.7rem; letter-spacing: 0.1em; color: #696cff;">
                            <i class="ti tabler-info-circle me-1"></i>Informasi Utama
                        </h6>
                        <div class="d-flex flex-column gap-3">
                            <div class="d-flex justify-content-between py-2" style="border-bottom: 1px solid #f5f5f9;">
                                <span class="text-muted" style="font-size: 0.82rem;">Nama Lembaga</span>
                                <span class="fw-semibold text-dark text-end" style="font-size: 0.82rem; max-width: 55%;"><?= esc($detail->nama_lembaga) ?></span>
                            </div>
                            <div class="d-flex justify-content-between py-2" style="border-bottom: 1px solid #f5f5f9;">
                                <span class="text-muted" style="font-size: 0.82rem;">Kategori</span>
                                <span class="fw-semibold text-dark" style="font-size: 0.82rem;"><?= esc($detail->kategori) ?></span>
                            </div>
                            <div class="d-flex justify-content-between py-2" style="border-bottom: 1px solid #f5f5f9;">
                                <span class="text-muted" style="font-size: 0.82rem;">Jenjang</span>
                                <span class="fw-semibold text-dark" style="font-size: 0.82rem;"><?= esc($detail->jenjang) ?></span>
                            </div>
                            <div class="d-flex justify-content-between py-2" style="border-bottom: 1px solid #f5f5f9;">
                                <span class="text-muted" style="font-size: 0.82rem;">Kopertais</span>
                                <span class="fw-semibold text-dark" style="font-size: 0.82rem;"><?= esc($detail->kopertais) ?></span>
                            </div>
                            <div class="d-flex justify-content-between py-2" style="border-bottom: 1px solid #f5f5f9;">
                                <span class="text-muted" style="font-size: 0.82rem;">No. Telepon</span>
                                <span class="fw-semibold text-dark" style="font-size: 0.82rem;"><?= esc($detail->telepon) ?></span>
                            </div>
                            <div class="d-flex justify-content-between py-2">
                                <span class="text-muted" style="font-size: 0.82rem;">No. HP</span>
                                <span class="fw-semibold text-dark" style="font-size: 0.82rem;"><?= esc($detail->no_hp) ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-uppercase fw-bold mb-3" style="font-size: 0.7rem; letter-spacing: 0.1em; color: #696cff;">
                            <i class="ti tabler-map-pin me-1"></i>Alamat Lembaga
                        </h6>
                        <div class="d-flex flex-column gap-3">
                            <div class="d-flex justify-content-between py-2" style="border-bottom: 1px solid #f5f5f9;">
                                <span class="text-muted" style="font-size: 0.82rem;">Provinsi</span>
                                <span class="fw-semibold text-dark text-end" style="font-size: 0.82rem; max-width: 55%;"><?= esc($provinsi) ?></span>
                            </div>
                            <div class="d-flex justify-content-between py-2" style="border-bottom: 1px solid #f5f5f9;">
                                <span class="text-muted" style="font-size: 0.82rem;">Kab/Kota</span>
                                <span class="fw-semibold text-dark text-end" style="font-size: 0.82rem; max-width: 55%;"><?= esc($kabupaten) ?></span>
                            </div>
                            <div class="d-flex justify-content-between py-2" style="border-bottom: 1px solid #f5f5f9;">
                                <span class="text-muted" style="font-size: 0.82rem;">Kecamatan</span>
                                <span class="fw-semibold text-dark text-end" style="font-size: 0.82rem; max-width: 55%;"><?= esc($kecamatan) ?></span>
                            </div>
                            <div class="d-flex justify-content-between py-2" style="border-bottom: 1px solid #f5f5f9;">
                                <span class="text-muted" style="font-size: 0.82rem;">Kelurahan</span>
                                <span class="fw-semibold text-dark text-end" style="font-size: 0.82rem; max-width: 55%;"><?= esc($kelurahan) ?></span>
                            </div>
                            <div class="d-flex justify-content-between py-2" style="border-bottom: 1px solid #f5f5f9;">
                                <span class="text-muted" style="font-size: 0.82rem;">Kode Pos</span>
                                <span class="fw-semibold text-dark" style="font-size: 0.82rem;"><?= esc($detail->kode_pos) ?></span>
                            </div>
                            <div class="d-flex justify-content-between py-2">
                                <span class="text-muted" style="font-size: 0.82rem;">Alamat</span>
                                <span class="fw-semibold text-dark text-end" style="font-size: 0.82rem; max-width: 55%;"><?= esc($detail->alamat) ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Program Studi -->
        <div class="card mb-5 border-0 shadow-sm" style="border-radius: 14px;">
            <div class="card-header py-3 px-4 d-flex align-items-center" style="border-bottom: 1px solid #f0f2f5;">
                <div style="width: 36px; height: 36px; background: linear-gradient(135deg, #28c76f, #81ebb0); border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 12px;">
                    <i class="ti tabler-school text-white" style="font-size: 1.1rem;"></i>
                </div>
                <h6 class="mb-0 fw-bold" style="color: #566a7f;">Program Studi Diusulkan</h6>
            </div>
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead style="background: #f8f9fb;">
                            <tr>
                                <th>No</th>
                                <th>Jenjang</th>
                                <th>Nama Program Studi</th>
                                <th>Akreditasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($prodi)): ?>
                                <?php $n = 1; foreach ($prodi as $p): ?>
                                    <tr>
                                        <td><?= $n++ ?></td>
                                        <td><?= esc($p->jenjang ?? '-') ?></td>
                                        <td class="fw-semibold"><?= esc($p->nama_prodi ?? $p->prodi ?? '-') ?></td>
                                        <td><?= esc($p->akreditasi ?? '-') ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-3">Tidak ada data program studi.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Right: Log Status Timeline -->
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm" style="border-radius: 14px;">
            <div class="card-header py-3 px-4 d-flex align-items-center" style="border-bottom: 1px solid #f0f2f5;">
                <div style="width: 36px; height: 36px; background: linear-gradient(135deg, #ff9f43, #ffc085); border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 12px;">
                    <i class="ti tabler-history text-white" style="font-size: 1.1rem;"></i>
                </div>
                <h6 class="mb-0 fw-bold" style="color: #566a7f;">Riwayat Usulan</h6>
            </div>
            <div class="card-body p-4">
                <ul class="timeline mb-0">
                    <?php if (!empty($logs)): ?>
                        <?php foreach ($logs as $log): ?>
                            <li class="timeline-item timeline-item-transparent pb-3">
                                <span class="timeline-point timeline-point-primary"></span>
                                <div class="timeline-event">
                                    <div class="timeline-header mb-1">
                                        <h6 class="mb-0 fw-semibold" style="font-size: 0.85rem;"><?= usul_status($log->status_usulan) ?></h6>
                                        <small class="text-muted" style="font-size: 0.75rem;"><?= date('d/m/y H:i', strtotime($log->created_at)) ?></small>
                                    </div>
                                    <p class="mb-0 text-muted" style="font-size: 0.8rem;"><?= esc($log->keterangan) ?></p>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li class="text-muted text-center py-3">Belum ada riwayat.</li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
