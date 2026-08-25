<?= $this->extend('hukum/template') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
    <div class="d-flex flex-column justify-content-center">
        <div class="d-flex align-items-center gap-2 mb-1">
            <div style="width: 4px; height: 28px; background: linear-gradient(180deg, #696cff, #a3acff); border-radius: 4px;"></div>
            <h4 class="mb-0 fw-bold" style="letter-spacing: -0.02em;">Data RKMA Usulan</h4>
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
            <a class="nav-link active waves-effect waves-light" href="<?= site_url('hukum/usulan/pendirianptkis/detail/rkma/' . $encrypted_id) ?>" style="border-radius: 8px;">
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

<div class="row g-6">
    <div class="col-sm-12">
        <div class="card border-0 shadow-sm" style="border-radius: 14px;">
            <div class="card-header py-3 px-4 d-flex align-items-center" style="border-bottom: 1px solid #f0f2f5;">
                <div style="width: 36px; height: 36px; background: linear-gradient(135deg, #ffab00, #ffd666); border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 12px;">
                    <i class="ti tabler-file-certificate text-white" style="font-size: 1.1rem;"></i>
                </div>
                <h5 class="card-title m-0 fw-bold" style="color: #566a7f;">Data Draft RKMA (Rancangan KMA)</h5>
            </div>
            <div class="card-body p-4">
                <h6 class="text-uppercase fw-bold mb-4" style="font-size: 0.75rem; letter-spacing: 0.1em; color: #ffab00;">
                    <i class="ti tabler-school me-1"></i>1. Perguruan Tinggi
                </h6>
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <div class="p-3 rounded-3" style="background: #f8f9fb;">
                            <small class="text-muted d-block mb-1">Jenis Perguruan Tinggi</small>
                            <span class="fw-semibold text-dark"><?= esc($detail->kategori ?? '-') ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 rounded-3" style="background: #f8f9fb;">
                            <small class="text-muted d-block mb-1">Nama Perguruan Tinggi</small>
                            <span class="fw-semibold text-dark"><?= esc($detail->nama_lembaga ?? '-') ?></span>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="p-3 rounded-3" style="background: #f8f9fb;">
                            <small class="text-muted d-block mb-1">Alamat Perguruan Tinggi</small>
                            <span class="fw-semibold text-dark"><?= esc($detail->alamat ?? '-') ?></span>
                        </div>
                    </div>
                </div>

                <hr class="my-5" style="border-top: 1px dashed #e9ecef;" />

                <h6 class="text-uppercase fw-bold mb-4" style="font-size: 0.75rem; letter-spacing: 0.1em; color: #ffab00;">
                    <i class="ti tabler-building me-1"></i>2. Informasi Yayasan & Legalitas
                </h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="p-3 rounded-3" style="background: #f8f9fb;">
                            <small class="text-muted d-block mb-1">Nama Yayasan</small>
                            <span class="fw-semibold text-dark"><?= esc($detail->yayasan_nama ?? '-') ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 rounded-3" style="background: #f8f9fb;">
                            <small class="text-muted d-block mb-1">Nomor Akta</small>
                            <span class="fw-semibold text-dark"><?= esc($detail->yayasan_nosk ?? '-') ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 rounded-3" style="background: #f8f9fb;">
                            <small class="text-muted d-block mb-1">Tanggal Akta</small>
                            <span class="fw-semibold text-dark"><?= esc($detail->yayasan_tglsk ?? '-') ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 rounded-3" style="background: #f8f9fb;">
                            <small class="text-muted d-block mb-1">Nama Notaris</small>
                            <span class="fw-semibold text-dark"><?= esc($detail->yayasan_notaris ?? '-') ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 rounded-3" style="background: #f8f9fb;">
                            <small class="text-muted d-block mb-1">Kedudukan Akta</small>
                            <span class="fw-semibold text-dark"><?= esc($detail->yayasan_kedudukan ?? '-') ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 rounded-3" style="background: #f8f9fb;">
                            <small class="text-muted d-block mb-1">Nomor Pengesahan Kemenkumham</small>
                            <span class="fw-semibold text-dark"><?= esc($detail->yayasan_kumham_nomor ?? '-') ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 rounded-3" style="background: #f8f9fb;">
                            <small class="text-muted d-block mb-1">Tahun Pengesahan Kemenkumham</small>
                            <span class="fw-semibold text-dark"><?= esc($detail->yayasan_kumham_tahun ?? '-') ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 rounded-3" style="background: #f8f9fb;">
                            <small class="text-muted d-block mb-1">Tanggal Pengesahan Kemenkumham</small>
                            <span class="fw-semibold text-dark"><?= esc($detail->yayasan_kumham_tanggal ?? '-') ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
