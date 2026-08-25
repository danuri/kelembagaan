<?= $this->extend('hukum/template') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
    <div class="d-flex flex-column justify-content-center">
        <div class="d-flex align-items-center gap-2 mb-1">
            <div style="width: 4px; height: 28px; background: linear-gradient(180deg, #696cff, #a3acff); border-radius: 4px;"></div>
            <h4 class="mb-0 fw-bold" style="letter-spacing: -0.02em;">Hasil Penilaian Asesor</h4>
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
            <a class="nav-link active waves-effect waves-light" href="<?= site_url('hukum/usulan/pendirianptkis/detail/penilaian/' . $encrypted_id) ?>" style="border-radius: 8px;">
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

<div class="row g-6">
    <div class="col-sm-12">
        <!-- Asesmen Kecukupan -->
        <div class="card mb-4 border-0 shadow-sm" style="border-radius: 14px; overflow: hidden;">
            <div class="card-header py-3 px-4 d-flex align-items-center" style="border-bottom: 1px solid #f0f2f5;">
                <div style="width: 36px; height: 36px; background: linear-gradient(135deg, #03c3ec, #71d8f7); border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 12px;">
                    <i class="ti tabler-file-analytics text-white" style="font-size: 1.1rem;"></i>
                </div>
                <h6 class="mb-0 fw-bold" style="color: #566a7f;">Asesmen Kecukupan</h6>
            </div>
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead style="background: #f8f9fb;">
                        <tr>
                            <th style="padding: 12px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">Nama Asesor</th>
                            <th style="padding: 12px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">Tanggal Penilaian</th>
                            <th style="padding: 12px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">Nilai / Skor</th>
                            <th style="padding: 12px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none; text-align: center;">Berkas Hasil Penilaian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($asesorkecukupan)): ?>
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted">Belum ada data asesor kecukupan.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($asesorkecukupan as $ak): ?>
                                <tr>
                                    <td style="padding: 12px 20px; border-bottom: 1px solid #f0f2f5; vertical-align: middle; font-weight: 600; color: #566a7f;">
                                        <?= esc($ak->full_name) ?>
                                    </td>
                                    <td style="padding: 12px 20px; border-bottom: 1px solid #f0f2f5; vertical-align: middle; color: #8c97a7; font-size: 0.85rem;">
                                        <?= esc($ak->mulai_tanggal . ' s.d ' . $ak->sampai_tanggal) ?>
                                    </td>
                                    <td style="padding: 12px 20px; border-bottom: 1px solid #f0f2f5; vertical-align: middle;">
                                        <span class="badge bg-label-primary rounded-pill px-3"><?= esc($ak->skor ?: '-') ?></span>
                                    </td>
                                    <td style="padding: 12px 20px; border-bottom: 1px solid #f0f2f5; vertical-align: middle; text-align: center;">
                                        <?php if (!empty($ak->file_hasil)): ?>
                                            <a href="<?= base_url('uploads/nilai/' . $ak->file_hasil) ?>" target="_blank" class="btn btn-sm btn-outline-info waves-effect" style="border-radius: 8px;">
                                                <i class="ti tabler-download me-1"></i>Unduh Berkas Nilai
                                            </a>
                                        <?php else: ?>
                                            <span class="badge bg-label-secondary">Belum Mengunggah</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Asesmen Lapangan -->
        <div class="card mb-4 border-0 shadow-sm" style="border-radius: 14px; overflow: hidden;">
            <div class="card-header py-3 px-4 d-flex align-items-center" style="border-bottom: 1px solid #f0f2f5;">
                <div style="width: 36px; height: 36px; background: linear-gradient(135deg, #71dd37, #a0e87a); border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 12px;">
                    <i class="ti tabler-map-pin text-white" style="font-size: 1.1rem;"></i>
                </div>
                <h6 class="mb-0 fw-bold" style="color: #566a7f;">Asesmen Lapangan</h6>
            </div>
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead style="background: #f8f9fb;">
                        <tr>
                            <th style="padding: 12px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">Nama Asesor</th>
                            <th style="padding: 12px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">Tanggal Asesmen</th>
                            <th style="padding: 12px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">Nilai / Skor</th>
                            <th style="padding: 12px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none; text-align: center;">Berkas Hasil Lapangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($asesorlapangan)): ?>
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted">Belum ada data asesor lapangan.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($asesorlapangan as $al): ?>
                                <tr>
                                    <td style="padding: 12px 20px; border-bottom: 1px solid #f0f2f5; vertical-align: middle; font-weight: 600; color: #566a7f;">
                                        <?= esc($al->full_name) ?>
                                    </td>
                                    <td style="padding: 12px 20px; border-bottom: 1px solid #f0f2f5; vertical-align: middle; color: #8c97a7; font-size: 0.85rem;">
                                        <?= esc($al->mulai_tanggal . ' s.d ' . $al->sampai_tanggal) ?>
                                    </td>
                                    <td style="padding: 12px 20px; border-bottom: 1px solid #f0f2f5; vertical-align: middle;">
                                        <span class="badge bg-label-primary rounded-pill px-3"><?= esc($al->skor ?: '-') ?></span>
                                    </td>
                                    <td style="padding: 12px 20px; border-bottom: 1px solid #f0f2f5; vertical-align: middle; text-align: center;">
                                        <?php if (!empty($al->file_hasil)): ?>
                                            <a href="<?= base_url('uploads/nilai/' . $al->file_hasil) ?>" target="_blank" class="btn btn-sm btn-outline-success waves-effect" style="border-radius: 8px;">
                                                <i class="ti tabler-download me-1"></i>Unduh Berkas Nilai
                                            </a>
                                        <?php else: ?>
                                            <span class="badge bg-label-secondary">Belum Mengunggah</span>
                                        <?php endif; ?>
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

<?= $this->endSection() ?>
