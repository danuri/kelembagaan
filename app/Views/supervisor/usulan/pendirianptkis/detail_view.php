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
        <a href="<?= site_url('verifikator/usulan') ?>" class="btn btn-label-secondary waves-effect" style="border-radius: 10px; padding: 8px 20px;">
            <i class="ti tabler-arrow-left me-1"></i>Kembali
        </a>
        <?php if ($usulan->status == 4): ?>
            <button type="button" class="btn btn-primary waves-effect waves-light" onclick="recheck()" style="border-radius: 10px; padding: 8px 20px; box-shadow: 0 4px 12px rgba(105,108,255,0.3);">
                <i class="ti tabler-refresh me-1"></i>Verifikasi Ulang
            </button>
        <?php endif; ?>
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
                    <div class="flex-grow-1 fw-bold text-dark"><?= $verifikator->full_name ?></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tab Navigation -->
<div class="nav-align-top mb-6">
    <ul class="nav nav-pills flex-column flex-md-row row-gap-2" style="background: white; border-radius: 12px; padding: 6px;">
        <li class="nav-item">
            <a class="nav-link active waves-effect waves-light" href="#" style="border-radius: 8px;">
                <i class="icon-base ti tabler-info-circle me-1_5 icon-sm"></i>Info Usulan
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link waves-effect waves-light" href="<?= site_url('supervisor/usulan/pendirianptkis/detail/verifikasi/' . encrypt($usulan->id)) ?>" style="border-radius: 8px;">
                <i class="icon-base ti tabler-user-check me-1_5 icon-sm"></i>Verifikasi Dokumen
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link waves-effect waves-light" href="<?= site_url('supervisor/usulan/pendirianptkis/detail/penilaian/' . encrypt($usulan->id)) ?>" style="border-radius: 8px;">
                <i class="icon-base ti tabler-clipboard-check me-1_5 icon-sm"></i>Penilaian
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link waves-effect waves-light" href="<?= site_url('supervisor/usulan/pendirianptkis/detail/rkma/' . encrypt($usulan->id)) ?>" style="border-radius: 8px;">
                <i class="icon-base ti tabler-file-certificate me-1_5 icon-sm"></i>RKMA
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link waves-effect waves-light" href="<?= site_url('supervisor/usulan/pendirianptkis/detail/kma/' . encrypt($usulan->id)) ?>" style="border-radius: 8px;">
                <i class="icon-base ti tabler-certificate me-1_5 icon-sm"></i>KMA
            </a>
        </li>
    </ul>
</div>

<!-- Content Columns -->
<div class="row g-6">
    <!-- Left: Main Content -->
    <div class="col-lg-8">
        <!-- Data Lembaga -->
        <div class="card mb-5" style="border: none; border-radius: 14px;">
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
                    </div>
                    <div class="col-md-6">
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($prodi)): ?>
                            <tr><td colspan="3" class="text-center py-4 text-muted" style="border: none;"><i class="ti tabler-folder-off" style="font-size: 1.5rem;"></i><p class="mb-0 mt-2" style="font-size: 0.82rem;">Tidak ada data program studi</p></td></tr>
                        <?php else: ?>
                            <?php foreach ($prodi as $p): ?>
                                <tr class="doc-row">
                                    <td style="padding: 12px 20px; border-bottom: 1px solid #f0f2f5; font-weight: 600; color: #566a7f;"><?= $p->nama_prodi ?></td>
                                    <td style="padding: 12px 20px; border-bottom: 1px solid #f0f2f5;"><span class="badge bg-label-info" style="border-radius: 8px; padding: 4px 10px; font-size: 0.72rem;"><?= $p->jenjang ?></span></td>
                                    <td style="padding: 12px 20px; border-bottom: 1px solid #f0f2f5;">
                                        <a class="btn btn-sm btn-outline-primary" style="border-radius: 8px;" href="javascript:void(0);" onclick="showdoc(6,'<?= encrypt($p->id) ?>')">
                                            <i class="icon-base ti tabler-checklist me-1"></i>Dokumen
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- SIPPRO Logs -->
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
                            <tr><td colspan="4" class="text-center py-4 text-muted" style="border: none;"><i class="ti tabler-plug-connected-x" style="font-size: 1.5rem;"></i><p class="mb-0 mt-2" style="font-size: 0.82rem;">Belum ada riwayat</p></td></tr>
                        <?php else: ?>
                            <?php foreach ($sippro_logs as $log): ?>
                                <tr class="doc-row">
                                    <td style="padding: 12px 20px; border-bottom: 1px solid #f0f2f5; font-size: 0.82rem; color: #566a7f;"><?= date('d/m/Y H:i', strtotime($log->created_at)) ?></td>
                                    <td style="padding: 12px 20px; border-bottom: 1px solid #f0f2f5;"><code style="font-size: 0.75rem; background: #f0f2f5; padding: 3px 8px; border-radius: 6px;"><?= $log->endpoint ?></code></td>
                                    <td style="padding: 12px 20px; border-bottom: 1px solid #f0f2f5;">
                                        <?php if ($log->is_success): ?>
                                            <span class="badge bg-label-success" style="border-radius: 8px; padding: 5px 10px; font-size: 0.72rem;"><i class="ti tabler-check me-1"></i>Sukses (<?= $log->status_code ?>)</span>
                                        <?php else: ?>
                                            <span class="badge bg-label-danger" style="border-radius: 8px; padding: 5px 10px; font-size: 0.72rem;"><i class="ti tabler-x me-1"></i>Gagal (<?= $log->status_code ?>)</span>
                                        <?php endif; ?>
                                    </td>
                                    <td style="padding: 12px 20px; border-bottom: 1px solid #f0f2f5;">
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

    <!-- Right: Progress Timeline -->
    <div class="col-lg-4">
        <div class="card position-sticky" style="border: none; border-radius: 14px; top: 100px; overflow: hidden;">
            <div class="card-header py-3 px-4 d-flex align-items-center" style="background: linear-gradient(135deg, #696cff 0%, #8592ff 100%); border: none;">
                <i class="ti tabler-timeline-event text-white me-2" style="font-size: 1.25rem;"></i>
                <h6 class="mb-0 text-white fw-semibold">Progress Usulan</h6>
            </div>
            <div class="card-body p-4">
                <ul class="timeline timeline-outline mb-0">
                    <?php foreach ($logs as $row): ?>
                        <li class="timeline-item timeline-item-transparent border-dashed">
                            <span class="timeline-point timeline-point-success"></span>
                            <div class="timeline-event">
                                <div class="timeline-header mb-3">
                                    <h6 class="mb-0 fw-bold" style="font-size: 0.85rem;"><?= usul_status($row->status_usulan) ?></h6>
                                    <small class="text-muted" style="font-size: 0.72rem;"><?= $row->created_at ?></small>
                                </div>
                                <p class="mb-2 text-muted" style="font-size: 0.8rem;"><?= $row->keterangan ?></p>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
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

<!-- Offcanvas Dokumen -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="canvasDoc" aria-labelledby="canvasDocLabel" style="border-radius: 16px 0 0 16px;">
    <div class="offcanvas-header" style="background: linear-gradient(135deg, #696cff 0%, #8592ff 100%); border: none;">
        <h5 id="canvasDocLabel" class="offcanvas-title text-white fw-semibold"><i class="ti tabler-file-stack me-2"></i>Dokumen Pendukung</h5>
        <button type="button" class="btn-close btn-close-white text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body my-auto mx-0 flex-grow-0">
        <div id="lisdoc"></div>
        <button type="button" class="btn btn-label-secondary d-grid w-100 mt-3" data-bs-dismiss="offcanvas" style="border-radius: 10px;">Tutup</button>
    </div>
</div>

<style>
    .doc-row { transition: background-color 0.2s ease; }
    .doc-row:hover { background-color: #f8f9fb !important; }
</style>

<?= $this->endSection() ?>
<?= $this->section('scripts'); ?>
<script>
    function preview(berkas) {
        $('#object').html('<object data="' + berkas + '" type="application/pdf" width="100%" style="height: 80vh;" id="object">' +
            '<p>Browser tidak mendukung!</p>' +
            '</object>');
        $('#preview').modal('show');
    }

    function recheck() {
        Swal.fire({
            text: 'Masukan informasi Pengembalian!',
            input: 'text',
            inputAttributes: { autocapitalize: 'off' },
            showCancelButton: true,
            confirmButtonText: 'Verifikasi Ulang',
            showLoaderOnConfirm: true,
            preConfirm: (data) => {
                return fetch('<?= site_url('supervisor/usulan/pendirianptkis/recheck/' . encrypt($usulan->id)) ?>', {
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
                window.location.reload();
            }
        });
    }

    function showdoc(layanan, usulid) {
        $('#lisdoc').html('<div class="text-center py-4"><div class="spinner-border text-primary" role="status"></div><p class="text-muted mt-2">Memuat dokumen...</p></div>');
        $('#lisdoc').load('<?= site_url('dokumen/verifikasi/') ?>' + layanan + '/' + usulid, function () {
            $('#canvasDoc').offcanvas('show');
        });
    }

    function showSipproDetail(req, res) {
        try { var reqParsed = JSON.stringify(JSON.parse(req), null, 2); } catch (e) { var reqParsed = req; }
        try { var resParsed = JSON.stringify(JSON.parse(res), null, 2); } catch (e) { var resParsed = res; }
        Swal.fire({
            title: 'Detail Log SIPPRO',
            html: '<div class="text-start"><h6 class="fw-bold mb-2" style="font-size:0.8rem;color:#696cff;"><i class="ti tabler-arrow-up-right me-1"></i>Request</h6><pre class="p-3 rounded mb-3" style="background:#f8f9fb;max-height:200px;overflow-y:auto;font-size:0.75rem;border:1px solid #f0f2f5;text-align:left;">' + reqParsed + '</pre><h6 class="fw-bold mb-2" style="font-size:0.8rem;color:#71dd37;"><i class="ti tabler-arrow-down-left me-1"></i>Response</h6><pre class="p-3 rounded" style="background:#f8f9fb;max-height:200px;overflow-y:auto;font-size:0.75rem;border:1px solid #f0f2f5;text-align:left;">' + resParsed + '</pre></div>',
            width: '700px',
            showCloseButton: true,
            showConfirmButton: false,
        });
    }
</script>
<?= $this->endSection() ?>