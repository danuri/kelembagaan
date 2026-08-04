<?= $this->extend('supervisor/template') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div
    class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
    <div class="d-flex flex-column justify-content-center">
        <div class="d-flex align-items-center gap-2 mb-1">
            <div
                style="width: 4px; height: 28px; background: linear-gradient(180deg, #696cff, #a3acff); border-radius: 4px;">
            </div>
            <h4 class="mb-0 fw-bold" style="letter-spacing: -0.02em;">Detail Usulan</h4>
        </div>
        <p class="text-muted mb-0 ms-3" style="font-size: 0.875rem;">Pendirian PTKIS — <?= $detail->yayasan_nama ?></p>
    </div>
    <div class="d-flex align-content-center flex-wrap gap-3">
        <a href="<?= site_url('supervisor/usulan') ?>" class="btn btn-label-secondary waves-effect"
            style="border-radius: 10px; padding: 8px 20px;">
            <i class="ti tabler-arrow-left me-1"></i>Kembali
        </a>
        <?php if ($usulan->status == 4): ?>
            <a href="<?= site_url('supervisor/usulan/pendirianptkis/penilaianasesor/' . encrypt($usulan->id)) ?>"
                type="button" class="btn btn-success waves-effect waves-light"
                style="border-radius: 10px; padding: 8px 20px; box-shadow: 0 4px 12px rgba(113,221,55,0.3);"
                onclick="return confirm('Apakah Anda yakin ingin mengirim ke Penilai?')">
                <i class="ti tabler-send me-1"></i>Kirim ke Penilai
            </a>
        <?php endif; ?>
        <?php if ($usulan->status == 5): ?>
            <a href="<?= site_url('supervisor/usulan/pendirianptkis/prosesrkma/' . encrypt($usulan->id)) ?>" type="button"
                class="btn btn-success waves-effect waves-light"
                style="border-radius: 10px; padding: 8px 20px; box-shadow: 0 4px 12px rgba(113,221,55,0.3);"
                onclick="return confirm('Apakah proses penilaian selesai?')">
                <i class="ti tabler-player-play me-1"></i>Proses RKMA
            </a>
        <?php endif; ?>
    </div>
</div>

<!-- Info Yayasan Card -->
<div class="card mb-5" style="border: none; border-radius: 14px; overflow: hidden;">
    <div class="card-header py-3 px-4"
        style="background: linear-gradient(135deg, #696cff 0%, #8592ff 100%); border: none;">
        <h6 class="mb-0 text-white fw-semibold">
            <i class="ti tabler-building me-2"></i>Informasi Yayasan & Status
        </h6>
    </div>
    <div class="card-body p-4">
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="info-row d-flex mb-3 pb-3" style="border-bottom: 1px dashed #e9ecef;">
                    <div class="flex-shrink-0" style="width: 140px;">
                        <small class="text-muted fw-semibold text-uppercase"
                            style="font-size: 0.72rem; letter-spacing: 0.06em;">Nama Yayasan</small>
                    </div>
                    <div class="flex-grow-1 fw-semibold text-dark"><?= $detail->yayasan_nama ?></div>
                </div>
                <div class="info-row d-flex mb-3 pb-3" style="border-bottom: 1px dashed #e9ecef;">
                    <div class="flex-shrink-0" style="width: 140px;">
                        <small class="text-muted fw-semibold text-uppercase"
                            style="font-size: 0.72rem; letter-spacing: 0.06em;">Alamat Yayasan</small>
                    </div>
                    <div class="flex-grow-1 fw-semibold text-dark"><?= $detail->yayasan_alamat ?></div>
                </div>
                <div class="info-row d-flex mb-3 pb-3" style="border-bottom: 1px dashed #e9ecef;">
                    <div class="flex-shrink-0" style="width: 140px;">
                        <small class="text-muted fw-semibold text-uppercase"
                            style="font-size: 0.72rem; letter-spacing: 0.06em;">No. SK</small>
                    </div>
                    <div class="flex-grow-1 fw-semibold text-dark"><?= $detail->yayasan_nosk ?></div>
                </div>
                <div class="info-row d-flex">
                    <div class="flex-shrink-0" style="width: 140px;">
                        <small class="text-muted fw-semibold text-uppercase"
                            style="font-size: 0.72rem; letter-spacing: 0.06em;">Tanggal SK</small>
                    </div>
                    <div class="flex-grow-1 fw-semibold text-dark"><?= $detail->yayasan_tglsk ?></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="info-row d-flex mb-3 pb-3" style="border-bottom: 1px dashed #e9ecef;">
                    <div class="flex-shrink-0" style="width: 140px;">
                        <small class="text-muted fw-semibold text-uppercase"
                            style="font-size: 0.72rem; letter-spacing: 0.06em;">Jenis Layanan</small>
                    </div>
                    <div class="flex-grow-1">
                        <span class="badge bg-label-primary"
                            style="border-radius: 8px; padding: 5px 14px;"><?= $usulan->layanan_nama ?></span>
                    </div>
                </div>
                <div class="info-row d-flex mb-3 pb-3" style="border-bottom: 1px dashed #e9ecef;">
                    <div class="flex-shrink-0" style="width: 140px;">
                        <small class="text-muted fw-semibold text-uppercase"
                            style="font-size: 0.72rem; letter-spacing: 0.06em;">Status Usulan</small>
                    </div>
                    <div class="flex-grow-1 fw-semibold text-dark"><?= usul_status($usulan->status) ?></div>
                </div>
                <div class="info-row d-flex mb-3 pb-3" style="border-bottom: 1px dashed #e9ecef;">
                    <div class="flex-shrink-0" style="width: 140px;">
                        <small class="text-muted fw-semibold text-uppercase"
                            style="font-size: 0.72rem; letter-spacing: 0.06em;">Keterangan</small>
                    </div>
                    <div class="flex-grow-1 fw-semibold text-dark">
                        <?= $usulan->keterangan ?: '<span class="text-muted fst-italic">-</span>' ?>
                    </div>
                </div>
                <div class="info-row d-flex">
                    <div class="flex-shrink-0" style="width: 140px;">
                        <small class="text-muted fw-semibold text-uppercase"
                            style="font-size: 0.72rem; letter-spacing: 0.06em;">Verifikator</small>
                    </div>
                    <div class="flex-grow-1 fw-semibold text-dark">
                        <?= $usulan->verifikator ?? '<span class="text-muted fst-italic">Belum ditentukan</span>' ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tabs Navigation -->
<div class="nav-align-top mb-5">
    <ul class="nav nav-pills flex-column flex-md-row row-gap-2"
        style="background: white; border-radius: 12px; padding: 6px;">
        <li class="nav-item">
            <a href="<?= site_url('supervisor/usulan/pendirianptkis/detail/' . encrypt($usulan->id)) ?>"
                class="nav-link waves-effect waves-light" style="border-radius: 8px;">
                <i class="icon-base ti tabler-info-circle me-1_5 icon-sm"></i>Info Usulan
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= site_url('supervisor/usulan/pendirianptkis/detail/verifikasi/' . encrypt($usulan->id)) ?>"
                class="nav-link waves-effect waves-light" style="border-radius: 8px;">
                <i class="icon-base ti tabler-files me-1_5 icon-sm"></i>Verifikasi Dokumen
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= site_url('supervisor/usulan/pendirianptkis/detail/penilaian/' . encrypt($usulan->id)) ?>"
                class="nav-link active waves-effect waves-light" style="border-radius: 8px;">
                <i class="icon-base ti tabler-lock me-1_5 icon-sm"></i>Penilaian
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= site_url('supervisor/usulan/pendirianptkis/detail/rkma/' . encrypt($usulan->id)) ?>"
                class="nav-link waves-effect waves-light" style="border-radius: 8px;">
                <i class="icon-base ti tabler-bell me-1_5 icon-sm"></i>RKMA
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= site_url('supervisor/usulan/pendirianptkis/detail/kma/' . encrypt($usulan->id)) ?>"
                class="nav-link waves-effect waves-light" style="border-radius: 8px;">
                <i class="icon-base ti tabler-certificate me-1_5 icon-sm"></i>KMA
            </a>
        </li>
    </ul>
</div>

<div class="row g-6">
    <div class="col-sm-12">
        <div class="card mb-4" style="border: none; border-radius: 14px;">
            <div class="card-header py-3 px-4 d-flex justify-content-between align-items-center"
                style="border-bottom: 1px solid #f0f2f5;">
                <div class="d-flex align-items-center">
                    <div
                        style="width: 36px; height: 36px; background: linear-gradient(135deg, #03c3ec, #71d8f7); border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 12px;">
                        <i class="ti tabler-file-analytics text-white" style="font-size: 1.1rem;"></i>
                    </div>
                    <h6 class="mb-0 fw-bold" style="color: #566a7f;">Asesmen Kecukupan</h6>
                </div>
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kecukupan"
                    style="border-radius: 8px;">
                    <i class="ti tabler-plus me-1"></i>Tambah Asesor
                </button>
            </div>
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr style="background: #f8f9fb;">
                            <th
                                style="padding: 12px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">
                                Asesor</th>
                            <th
                                style="padding: 12px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">
                                Tanggal Penilaian</th>
                            <th
                                style="padding: 12px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">
                                Lampiran</th>
                            <th
                                style="padding: 12px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">
                                Nilai</th>
                            <th
                                style="padding: 12px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($asesorkecukupan)): ?>
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted" style="border: none;">Belum ada asesor
                                    kecukupan yang ditugaskan.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($asesorkecukupan as $ak): ?>
                                <tr class="doc-row">
                                    <td
                                        style="padding: 12px 20px; border-bottom: 1px solid #f0f2f5; vertical-align: middle; font-weight: 600; color: #566a7f;">
                                        <?= $ak->full_name ?>
                                    </td>
                                    <td
                                        style="padding: 12px 20px; border-bottom: 1px solid #f0f2f5; vertical-align: middle; color: #8c97a7; font-size: 0.85rem;">
                                        <?= $ak->mulai_tanggal . ' - ' . $ak->sampai_tanggal ?>
                                    </td>
                                    <td style="padding: 12px 20px; border-bottom: 1px solid #f0f2f5; vertical-align: middle;">
                                        <?= ($ak->file_hasil) ? '<a href="' . base_url('uploads/nilai/' . $ak->file_hasil) . '" target="_blank" class="badge bg-label-info text-decoration-none"><i class="ti tabler-download me-1"></i>Unduh</a>' : '<span class="badge bg-label-secondary">Belum Mengunggah</span>'; ?>
                                    </td>
                                    <td style="padding: 12px 20px; border-bottom: 1px solid #f0f2f5; vertical-align: middle;">
                                        <span class="badge bg-label-primary rounded-pill"><?= $ak->skor ?: '-' ?></span>
                                    </td>
                                    <td style="padding: 12px 20px; border-bottom: 1px solid #f0f2f5; vertical-align: middle;">
                                        <?php if ($ak->status == 2): ?>
                                            <a href="<?= site_url('supervisor/usulan/pendirianptkis/detail/penilaian/review/' . $ak->id) ?>"
                                                class="btn btn-sm btn-label-warning" style="border-radius: 8px;"
                                                onclick="return confirm('Nilai akan dikembalikan ke Asesor untuk ditinjau ulang?')">
                                                <i class="ti tabler-arrow-back-up me-1"></i>Kembalikan
                                            </a>
                                        <?php else: ?>
                                            <a href="<?= site_url('supervisor/usulan/pendirianptkis/asesor/delete/' . $ak->id) ?>"
                                                class="btn btn-sm btn-label-danger" style="border-radius: 8px;"
                                                onclick="return confirm('Asesor Kecukupan akan dihapus?')">
                                                <i class="ti tabler-trash me-1"></i>Hapus
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card mb-4" style="border: none; border-radius: 14px;">
            <div class="card-header py-3 px-4 d-flex justify-content-between align-items-center"
                style="border-bottom: 1px solid #f0f2f5;">
                <div class="d-flex align-items-center">
                    <div
                        style="width: 36px; height: 36px; background: linear-gradient(135deg, #71dd37, #a0e87a); border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 12px;">
                        <i class="ti tabler-map-pin text-white" style="font-size: 1.1rem;"></i>
                    </div>
                    <h5 class="card-title m-0 fw-bold" style="color: #566a7f;">Asesmen Lapangan</h5>
                </div>
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#lapangan"
                    style="border-radius: 8px;">
                    <i class="ti tabler-plus me-1"></i>Tambah Asesor
                </button>
            </div>
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr style="background: #f8f9fb;">
                            <th
                                style="padding: 12px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">
                                Asesor</th>
                            <th
                                style="padding: 12px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">
                                Tanggal Penilaian</th>
                            <th
                                style="padding: 12px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">
                                Lampiran</th>
                            <th
                                style="padding: 12px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">
                                Nilai</th>
                            <th
                                style="padding: 12px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($asesorlapangan)): ?>
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted" style="border: none;">Belum ada asesor
                                    lapangan yang ditugaskan.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($asesorlapangan as $al): ?>
                                <tr class="doc-row">
                                    <td
                                        style="padding: 12px 20px; border-bottom: 1px solid #f0f2f5; vertical-align: middle; font-weight: 600; color: #566a7f;">
                                        <?= $al->full_name ?>
                                    </td>
                                    <td
                                        style="padding: 12px 20px; border-bottom: 1px solid #f0f2f5; vertical-align: middle; color: #8c97a7; font-size: 0.85rem;">
                                        <?= $al->mulai_tanggal . ' - ' . $al->sampai_tanggal ?>
                                    </td>
                                    <td style="padding: 12px 20px; border-bottom: 1px solid #f0f2f5; vertical-align: middle;">
                                        <?= ($al->file_hasil) ? '<a href="' . base_url('uploads/nilai/' . $al->file_hasil) . '" target="_blank" class="badge bg-label-info text-decoration-none"><i class="ti tabler-download me-1"></i>Unduh</a>' : '<span class="badge bg-label-secondary">Belum Mengunggah</span>'; ?>
                                    </td>
                                    <td style="padding: 12px 20px; border-bottom: 1px solid #f0f2f5; vertical-align: middle;">
                                        <span class="badge bg-label-primary rounded-pill"><?= $al->skor ?: '-' ?></span>
                                    </td>
                                    <td style="padding: 12px 20px; border-bottom: 1px solid #f0f2f5; vertical-align: middle;">
                                        <?php if ($al->status == 2): ?>
                                            <a href="<?= site_url('supervisor/usulan/pendirianptkis/detail/penilaian/review/' . $al->id) ?>"
                                                class="btn btn-sm btn-label-warning" style="border-radius: 8px;"
                                                onclick="return confirm('Nilai akan dikembalikan ke Asesor untuk ditinjau ulang?')">
                                                <i class="ti tabler-arrow-back-up me-1"></i>Kembalikan
                                            </a>
                                        <?php else: ?>
                                            <a href="<?= site_url('supervisor/usulan/pendirianptkis/asesor/delete/' . $al->id) ?>"
                                                class="btn btn-sm btn-label-danger" style="border-radius: 8px;"
                                                onclick="return confirm('Asesor Lapangan akan dihapus?')">
                                                <i class="ti tabler-trash me-1"></i>Hapus
                                            </a>
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



<div class="modal fade" id="kecukupan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="border: none; border-radius: 16px; overflow: hidden;">
            <div class="modal-header py-3 px-4"
                style="background: linear-gradient(135deg, #03c3ec, #71d8f7); border: none;">
                <h5 class="modal-title text-white fw-semibold
                           "><i class="ti tabler-user-plus me-2"></i>Penugasan Asesmen Kecukupan</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form action="<?= site_url('supervisor/usulan/pendirianptkis/asesor/add') ?>" method="post" id="usulform">
                <div class="modal-body p-4">
                    <div class="mb-4">
                        <label class="form-label fw-semibold"
                            style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.06em; color: #566a7f;">Asesor</label>
                        <select name="asesor" id="asesor" class="form-select" style="border-radius: 10px;">
                            <?php foreach ($users as $user): ?>
                                <option value="<?= esc($user->user_id) ?>"><?= esc($user->full_name) ?></option>
                            <?php endforeach; ?>
                        </select>


                        <input type="hidden" name="usul_id" id="usul_id" value="<?= $usulan->id ?>">

                        <input type="hidden" name="jenis" id="jenis" value="1">
                    </div>
                    <div class="row mb-4 g-3">


                        <div class="col-sm-6">

                            <label class="form-label fw-semibold"
                                style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.06em; color: #566a7f;">Tgl
                                Mulai</label>
                            <input type="date" class="form-control" id="mulai_tanggal" name="mulai_tanggal"
                                style="border-radius: 10px;" required>
                        </div>
                        <div class="col-sm-6">

                            <label class="form-label fw-semibold" style="font-size: 0.8rem; text-
                           transform: uppercase; letter-spacing: 0.06em; color: #566a7f;">Tgl Selesai</label>
                            <input type="date" class="form-control" id="sampai_tanggal" name="sampai_tanggal"
                                style="border-radius: 10px;" required>
                        </div>
                    </div>
                    <div class="mb-2">

                        <label class="form-label fw-semibold" sty le="font-size: 0.8rem; text-transform: uppercase; letter
                       -spacing: 0.06em; color: #566a7f;">Keterangan</label>
                        <textarea name="keterangan" class="form-control" id="keterangan" rows="3"
                            style="border-radius: 10px;"></textarea>
                    </div>
                </div>
                <div class="modal-footer" style="border-top: 1px solid #f0f2f5;">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal"
                        style="border-radius: 8px;">Tutup</button>
                    <button type="button" class="btn btn-primary"
                        onclick="document.getElementById('usulform').submit();"
                        style="border-radius: 8px;">Simpan</button>
                </div>
            </form>
        </div>
    </div>

</div>



<div class="modal fade" id="lapangan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="border: none; border-radius: 16px; overflow: hidden;">
            <div class="modal-header py-3 px-4"
                style="background: linear-gradient(135deg, #71dd37, #a0e87a); border: none;">
                <h5 class="modal-title text-white fw-semibold
                           "><i class="ti tabler-user-plus me-2"></i>Penugasan Asesmen Lapangan</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form action="<?= site_url('supervisor/usulan/pendirianptkis/asesor/add') ?>" method="post" id="usulform2">
                <div class="modal-body p-4">
                    <div class="mb-4">
                        <label class="form-label fw-semibold"
                            style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.06em; color: #566a7f;">Asesor</label>
                        <select name="asesor" id="asesor" class="form-select" style="border-radius: 10px;">
                            <?php foreach ($users as $user): ?>
                                <option value="<?= esc($user->user_id) ?>"><?= esc($user->full_name) ?></option>
                            <?php endforeach; ?>
                        </select>


                        <input type="hidden" name="usul_id" id="usul_id" value="<?= $usulan->id ?>">

                        <input type="hidden" name="jenis" id="jenis" value="2">
                    </div>
                    <div class="row mb-4 g-3">


                        <div class="col-sm-6">

                            <label class="form-label fw-semibold"
                                style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.06em; color: #566a7f;">Tgl
                                Mulai</label>
                            <input type="date" class="form-control" id="mulai_tanggal" name="mulai_tanggal"
                                style="border-radius: 10px;" required>
                        </div>
                        <div class="col-sm-6">

                            <label class="form-label fw-semibold" style="font-size: 0.8rem; text-
                           transform: uppercase; letter-spacing: 0.06em; color: #566a7f;">Tgl Selesai</label>
                            <input type="date" class="form-control" id="sampai_tanggal" name="sampai_tanggal"
                                style="border-radius: 10px;" required>
                        </div>
                    </div>
                    <div class="mb-2">

                        <label class="form-label fw-semibold" sty le="font-size: 0.8rem; text-transform: uppercase; letter-
                       spacing: 0.06em; color: #566a7f;">Keterangan</label>
                        <textarea name="keterangan" class="form-control" id="keterangan" rows="3"
                            style="border-radius: 10px;"></textarea>
                    </div>
                </div>
                <div class="modal-footer" style="border-top: 1px solid #f0f2f5;">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal"
                        style="border-radius: 8px;">Tutup</button>
                    <button type="button" class="btn btn-primary"
                        onclick="document.getElementById('usulform2').submit();"
                        style="border-radius: 8px;">Simpan</button>
                </div>
                </ form>


        </div>


    </div>
</div>

<style>
    .doc-row {
        transition: background-color 0.2s ease;
    }

    .doc-row:hover {
        background-color: #f8f9fb !important;
    }
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
</script>
<?= $this->endSection() ?>