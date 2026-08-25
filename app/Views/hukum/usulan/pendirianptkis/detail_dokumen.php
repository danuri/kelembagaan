<?= $this->extend('hukum/template') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
    <div class="d-flex flex-column justify-content-center">
        <div class="d-flex align-items-center gap-2 mb-1">
            <div style="width: 4px; height: 28px; background: linear-gradient(180deg, #696cff, #a3acff); border-radius: 4px;"></div>
            <h4 class="mb-0 fw-bold" style="letter-spacing: -0.02em;">Dokumen Persyaratan</h4>
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
            <a class="nav-link active waves-effect waves-light" href="<?= site_url('hukum/usulan/pendirianptkis/detail/verifikasi/' . $encrypted_id) ?>" style="border-radius: 8px;">
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

<!-- Dokumen Card -->
<div class="card border-0 shadow-sm" style="border-radius: 14px; overflow: hidden;">
    <div class="card-header py-3 px-4 d-flex align-items-center justify-content-between" style="border-bottom: 1px solid #f0f2f5;">
        <div class="d-flex align-items-center gap-2">
            <div style="width: 36px; height: 36px; background: linear-gradient(135deg, #03c3ec, #71d8f7); border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 8px;">
                <i class="ti tabler-files text-white" style="font-size: 1.1rem;"></i>
            </div>
            <h6 class="mb-0 fw-bold" style="color: #566a7f;">Daftar Dokumen Lampiran & Verifikasi</h6>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover mb-0" style="border-collapse: separate; border-spacing: 0;">
            <thead style="background: #f8f9fb;">
                <tr>
                    <th style="padding: 14px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none; width: 60px;">No</th>
                    <th style="padding: 14px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">Nama Dokumen Persyaratan</th>
                    <th style="padding: 14px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">Status Verifikasi</th>
                    <th style="padding: 14px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none; text-align: center; width: 140px;">Berkas File</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($dokumens)): ?>
                    <?php $no = 1; foreach ($dokumens as $dok): ?>
                        <tr>
                            <td style="padding: 14px 20px; vertical-align: middle; border-bottom: 1px solid #f0f2f5;"><?= $no++ ?></td>
                            <td style="padding: 14px 20px; vertical-align: middle; border-bottom: 1px solid #f0f2f5;">
                                <div class="fw-semibold text-dark"><?= esc($dok->dokumen) ?></div>
                                <?php if (!empty($dok->keterangan)): ?>
                                    <small class="text-muted"><?= esc($dok->keterangan) ?></small>
                                <?php endif; ?>
                            </td>
                            <td style="padding: 14px 20px; vertical-align: middle; border-bottom: 1px solid #f0f2f5;">
                                <?php if ($dok->dok_status === '1' || $dok->dok_status === 1): ?>
                                    <span class="badge bg-label-success rounded-pill px-3"><i class="ti tabler-check me-1"></i> Valid</span>
                                <?php elseif ($dok->dok_status === '0' || $dok->dok_status === 0): ?>
                                    <span class="badge bg-label-warning rounded-pill px-3"><i class="ti tabler-clock me-1"></i> Menunggu</span>
                                <?php else: ?>
                                    <span class="badge bg-label-secondary rounded-pill px-3">-</span>
                                <?php endif; ?>
                            </td>
                            <td style="padding: 14px 20px; vertical-align: middle; border-bottom: 1px solid #f0f2f5; text-align: center;">
                                <?php if (!empty($dok->lampiran)): ?>
                                    <a href="<?= base_url('uploads/' . $dok->lampiran) ?>" target="_blank" class="btn btn-sm btn-outline-primary waves-effect" style="border-radius: 8px;">
                                        <i class="ti tabler-file-text me-1"></i>Lihat PDF
                                    </a>
                                <?php else: ?>
                                    <span class="text-muted fst-italic" style="font-size: 0.8rem;">Tidak Ada File</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center py-4 text-muted">Tidak ada data dokumen.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
