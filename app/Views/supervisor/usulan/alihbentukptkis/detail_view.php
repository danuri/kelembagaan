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
        <p class="text-muted mb-0 ms-3" style="font-size: 0.875rem;">Alih Bentuk PTKIS</p>
    </div>
    <div class="d-flex align-content-center flex-wrap gap-3">
        <a href="<?= site_url('verifikator/usulan') ?>" class="btn btn-label-secondary waves-effect"
            style="border-radius: 10px; padding: 8px 20px;">
            <i class="ti tabler-arrow-left me-1"></i>Kembali
        </a>
        <?php if ($usulan->status == 4): ?>
            <button type="button" class="btn btn-primary waves-effect waves-light" onclick="recheck()"
                style="border-radius: 10px; padding: 8px 20px; box-shadow: 0 4px 12px rgba(105,108,255,0.3);">
                <i class="ti tabler-refresh me-1"></i>Verifikasi Ulang
            </button>
            <a href="<?= site_url('supervisor/usulan/alihbentukptkis/done/' . encrypt($usulan->id)) ?>"
                class="btn btn-success waves-effect waves-light"
                style="border-radius: 10px; padding: 8px 20px; box-shadow: 0 4px 12px rgba(113,221,55,0.3);">
                <i class="ti tabler-check me-1"></i>Usulan Selesai
            </a>
        <?php endif; ?>
    </div>
</div>

<!-- Info Usulan Card -->
<div class="card mb-5" style="border: none; border-radius: 14px; overflow: hidden;">
    <div class="card-header py-3 px-4"
        style="background: linear-gradient(135deg, #696cff 0%, #8592ff 100%); border: none;">
        <h6 class="mb-0 text-white fw-semibold">
            <i class="ti tabler-file-info me-2"></i>Informasi Usulan & Status
        </h6>
    </div>
    <div class="card-body p-4">
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="info-row d-flex mb-3 pb-3" style="border-bottom: 1px dashed #e9ecef;">
                    <div class="flex-shrink-0" style="width: 150px;">
                        <small class="text-muted fw-semibold text-uppercase"
                            style="font-size: 0.72rem; letter-spacing: 0.06em;">No. Surat Pengantar</small>
                    </div>
                    <div class="flex-grow-1 fw-semibold text-dark"><?= $usulan->nomor_surat ?></div>
                </div>
                <div class="info-row d-flex mb-3 pb-3" style="border-bottom: 1px dashed #e9ecef;">
                    <div class="flex-shrink-0" style="width: 150px;">
                        <small class="text-muted fw-semibold text-uppercase"
                            style="font-size: 0.72rem; letter-spacing: 0.06em;">Perihal</small>
                    </div>
                    <div class="flex-grow-1 fw-semibold text-dark"><?= $usulan->perihal ?></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="info-row d-flex mb-3 pb-3" style="border-bottom: 1px dashed #e9ecef;">
                    <div class="flex-shrink-0" style="width: 140px;">
                        <small class="text-muted fw-semibold text-uppercase"
                            style="font-size: 0.72rem; letter-spacing: 0.06em;">Verifikator</small>
                    </div>
                    <div class="flex-grow-1 fw-bold text-dark">
                        <?= @$verifikator->full_name ?? '<span class="text-muted fst-italic">Belum ditentukan</span>' ?>
                    </div>
                </div>
                <div class="info-row d-flex mb-3 pb-3" style="border-bottom: 1px dashed #e9ecef;">
                    <div class="flex-shrink-0" style="width: 140px;">
                        <small class="text-muted fw-semibold text-uppercase"
                            style="font-size: 0.72rem; letter-spacing: 0.06em;">Status Usulan</small>
                    </div>
                    <div class="flex-grow-1 fw-semibold text-dark"><?= usul_status($usulan->status) ?></div>
                </div>
                <div class="info-row d-flex">
                    <div class="flex-shrink-0" style="width: 140px;">
                        <small class="text-muted fw-semibold text-uppercase"
                            style="font-size: 0.72rem; letter-spacing: 0.06em;">Keterangan</small>
                    </div>
                    <div class="flex-grow-1 fw-semibold text-dark">
                        <?= $usulan->keterangan ?: '<span class="text-muted fst-italic">-</span>' ?></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tabs Navigation -->
<div class="nav-align-top mb-5">
    <ul class="nav nav-pills flex-column flex-md-row row-gap-2"
        style="background: white; border-radius: 12px; padding: 6px;" role="tablist">
        <li class="nav-item">
            <button type="button" class="nav-link active waves-effect waves-light" style="border-radius: 8px;"
                role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-data"
                aria-controls="navs-pills-top-data" aria-selected="true">
                <i class="icon-base ti tabler-files me-1_5 icon-sm"></i>Data Lembaga
            </button>
        </li>
        <li class="nav-item">
            <button type="button" class="nav-link waves-effect waves-light" style="border-radius: 8px;" role="tab"
                data-bs-toggle="tab" data-bs-target="#navs-pills-top-kma" aria-controls="navs-pills-top-kma"
                aria-selected="false">
                <i class="icon-base ti tabler-certificate me-1_5 icon-sm"></i>Data KMA
            </button>
        </li>
    </ul>

    <div class="tab-content px-0 pb-0 bg-transparent shadow-none" style="border:none;">
        <div class="tab-pane fade show active" id="navs-pills-top-data" role="tabpanel">

            <div class="card mb-4" style="border: none; border-radius: 14px;">
                <div class="card-header py-3 px-4" style="border-bottom: 1px solid #f0f2f5;">
                    <h6 class="mb-0 fw-bold" style="color: #566a7f;"><i
                            class="ti tabler-building me-2 text-primary"></i>Informasi Perubahan Lembaga</h6>
                </div>
                <div class="card-body p-4">
                    <div class="row g-4">
                        <div class="col-md-6 border-end">
                            <h6 class="text-muted mb-3"><span class="badge bg-label-secondary me-2">Lama</span>Data
                                Lembaga Lama</h6>
                            <div class="d-flex flex-column gap-3">
                                <div>
                                    <small class="text-muted d-block"
                                        style="font-size: 0.75rem; text-transform: uppercase;">Nama Lembaga</small>
                                    <div class="fw-semibold text-dark"><?= $detail->nama_lembaga ?></div>
                                </div>
                                <div>
                                    <small class="text-muted d-block"
                                        style="font-size: 0.75rem; text-transform: uppercase;">Alamat Lembaga</small>
                                    <div class="fw-semibold text-dark"><?= $detail->alamat_lembaga ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ps-md-4">
                            <h6 class="text-primary mb-3"><span class="badge bg-label-primary me-2">Baru</span>Data
                                Lembaga Baru</h6>
                            <div class="d-flex flex-column gap-3">
                                <div>
                                    <small class="text-muted d-block"
                                        style="font-size: 0.75rem; text-transform: uppercase;">Nama Lembaga</small>
                                    <div class="fw-bold text-primary" style="font-size: 1.1rem;">
                                        <?= $detail->nama_lembaga_baru ?></div>
                                </div>
                                <div>
                                    <small class="text-muted d-block"
                                        style="font-size: 0.75rem; text-transform: uppercase;">Kategori</small>
                                    <span class="badge bg-label-info"><?= $detail->kategori ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4 mb-4">
                <div class="col-md-4">
                    <div class="card h-100" style="border: none; border-radius: 14px;">
                        <div class="card-header py-3 px-4" style="border-bottom: 1px solid #f0f2f5;">
                            <h6 class="mb-0 fw-bold" style="color: #566a7f;"><i
                                    class="ti tabler-users me-2 text-primary"></i>Data Dosen</h6>
                        </div>
                        <div class="card-body p-4">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    <span class="text-muted">Magister</span>
                                    <span class="badge bg-label-primary rounded-pill"><?= $detail->magister ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    <span class="text-muted">Doktor</span>
                                    <span class="badge bg-label-primary rounded-pill"><?= $detail->doktor ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    <span class="text-muted">Asisten Ahli</span>
                                    <span
                                        class="badge bg-label-primary rounded-pill"><?= $detail->asisten_ahli ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    <span class="text-muted">Lektor</span>
                                    <span class="badge bg-label-primary rounded-pill"><?= $detail->lektor ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    <span class="text-muted">Lektor Kepala</span>
                                    <span
                                        class="badge bg-label-primary rounded-pill"><?= $detail->lektor_kepala ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    <span class="text-muted">Guru Besar</span>
                                    <span class="badge bg-label-primary rounded-pill"><?= $detail->guru_besar ?></span>
                                </li>
                                <li class="list-group-item d-flex flex-column gap-1 px-0 mt-2 border-0">
                                    <span class="text-dark fw-semibold">Jumlah Mahasiswa</span>
                                    <div class="d-flex align-items-center">
                                        <i class="ti tabler-user-circle text-primary me-2"></i>
                                        <span class="fw-bold fs-5"><?= $detail->mahasiswa ?></span>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex flex-column gap-1 px-0 border-0">
                                    <span class="text-dark fw-semibold">Rasio Dosen:Mahasiswa</span>
                                    <span
                                        class="badge bg-label-info align-self-start fs-6"><?= $detail->rasio_dm ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100" style="border: none; border-radius: 14px;">
                        <div class="card-header py-3 px-4" style="border-bottom: 1px solid #f0f2f5;">
                            <h6 class="mb-0 fw-bold" style="color: #566a7f;"><i
                                    class="ti tabler-rosette me-2 text-warning"></i>Akreditasi</h6>
                        </div>
                        <div class="card-body p-4">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    <span class="text-muted">Tidak Terakreditasi</span>
                                    <span
                                        class="badge bg-label-secondary rounded-pill"><?= $detail->akreditasi_no ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    <span class="text-muted">Unggul / A</span>
                                    <span
                                        class="badge bg-label-success rounded-pill"><?= $detail->akreditasi_unggul ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    <span class="text-muted">Baik Sekali / B</span>
                                    <span
                                        class="badge bg-label-info rounded-pill"><?= $detail->akreditasi_baiksekali ?></span>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center px-0 border-0">
                                    <span class="text-muted">Baik</span>
                                    <span
                                        class="badge bg-label-primary rounded-pill"><?= $detail->akreditasi_baik ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100" style="border: none; border-radius: 14px;">
                        <div class="card-header py-3 px-4" style="border-bottom: 1px solid #f0f2f5;">
                            <h6 class="mb-0 fw-bold" style="color: #566a7f;"><i
                                    class="ti tabler-layout-dashboard me-2 text-info"></i>Data Lainnya</h6>
                        </div>
                        <div class="card-body p-4">
                            <div class="d-flex flex-column gap-3">
                                <div class="d-flex align-items-center p-3 bg-lighter rounded-3">
                                    <div class="avatar avatar-sm me-3">
                                        <span class="avatar-initial rounded bg-label-primary"><i
                                                class="ti tabler-building-arch"></i></span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0 text-dark"><?= $detail->fakultas ?> Fakultas</h6>
                                        <small class="text-muted">Jumlah Fakultas</small>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center p-3 bg-lighter rounded-3">
                                    <div class="avatar avatar-sm me-3">
                                        <span class="avatar-initial rounded bg-label-info"><i
                                                class="ti tabler-books"></i></span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0 text-dark"><?= $detail->prodi ?> Prodi</h6>
                                        <small class="text-muted">Jumlah Prodi</small>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center p-3 bg-lighter rounded-3">
                                    <div class="avatar avatar-sm me-3">
                                        <span class="avatar-initial rounded bg-label-success"><i
                                                class="ti tabler-chart-pie"></i></span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0 text-dark"><?= $detail->pelaporan ?>%</h6>
                                        <small class="text-muted">Pelaporan PD Dikti</small>
                                    </div>
                                </div>
                                <div class="p-3 bg-lighter rounded-3">
                                    <small class="text-muted d-block mb-1">Luas Tanah</small>
                                    <div class="fw-bold text-dark mb-2">
                                        <?= number_format($detail->tanah, 0, ',', '.') ?> m&sup2;</div>
                                    <small class="text-muted d-block mb-1">Kepemilikan Tanah</small>
                                    <div class="fw-bold text-dark"><?= $detail->kepemilikan_tanah ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4" style="border: none; border-radius: 14px;">
                <div class="card-header py-3 px-4 d-flex align-items-center" style="border-bottom: 1px solid #f0f2f5;">
                    <div
                        style="width: 36px; height: 36px; background: linear-gradient(135deg, #03c3ec, #71d8f7); border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 12px;">
                        <i class="ti tabler-files text-white" style="font-size: 1.1rem;"></i>
                    </div>
                    <h6 class="mb-0 fw-bold" style="color: #566a7f;">Dokumen Pendukung</h6>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr style="background: #f8f9fb;">
                                <th style="padding: 12px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;"
                                    width="60%">Dokumen</th>
                                <th
                                    style="padding: 12px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">
                                    Sesuai</th>
                                <th
                                    style="padding: 12px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">
                                    Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dokumens as $dokumen): ?>
                                <tr class="doc-row">
                                    <td
                                        style="padding: 12px 20px; border-bottom: 1px solid #f0f2f5; vertical-align: middle;">
                                        <?php if ($dokumen->lampiran): ?>
                                            <a href="javascript:;"
                                                onclick="preview('<?= base_url('uploads/' . $dokumen->lampiran) ?>')"
                                                class="d-flex align-items-center gap-2 text-primary fw-medium text-decoration-none">
                                                <div
                                                    style="width: 32px; height: 32px; background: #eff1ff; border-radius: 8px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                                    <i class="ti tabler-file-text" style="color: #696cff; font-size: 1rem;"></i>
                                                </div>
                                                <span style="font-size: 0.85rem;"><?= $dokumen->dokumen ?></span>
                                            </a>
                                        <?php else: ?>
                                            <div class="d-flex align-items-center gap-2 text-muted">
                                                <div
                                                    style="width: 32px; height: 32px; background: #f5f5f9; border-radius: 8px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                                    <i class="ti tabler-file-x" style="color: #a8aaae; font-size: 1rem;"></i>
                                                </div>
                                                <span style="font-size: 0.85rem;"><?= $dokumen->dokumen ?></span>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                    <td
                                        style="padding: 12px 20px; border-bottom: 1px solid #f0f2f5; vertical-align: middle;">
                                        <?php if ($dokumen->dok_status == 1): ?>
                                            <span class="badge bg-label-success d-inline-flex align-items-center"
                                                style="border-radius: 8px; padding: 5px 12px; font-size: 0.75rem;"><i
                                                    class="ti tabler-check me-1"></i>Ya</span>
                                        <?php else: ?>
                                            <span class="badge bg-label-danger d-inline-flex align-items-center"
                                                style="border-radius: 8px; padding: 5px 12px; font-size: 0.75rem;"><i
                                                    class="ti tabler-x me-1"></i>Tidak</span>
                                        <?php endif; ?>
                                    </td>
                                    <td
                                        style="padding: 12px 20px; border-bottom: 1px solid #f0f2f5; vertical-align: middle; color: #8c97a7; font-size: 0.85rem;">
                                        <?= $dokumen->keterangan ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row g-4 mb-4">
                <div class="col-md-12">
                    <div class="card h-100"
                        style="border: none; border-radius: 14px; background-color: #f8f9fb; border-left: 4px solid #696cff;">
                        <div class="card-body p-4 d-flex">
                            <div class="me-3 mt-1">
                                <i class="ti tabler-message-2 text-primary fs-3"></i>
                            </div>
                            <div class="w-100">
                                <h6 class="mb-2 fw-bold text-dark">Catatan Verifikator</h6>
                                <?php if ($detail->catatan): ?>
                                    <p class="mb-0 text-muted" style="font-size: 0.9rem; line-height: 1.6;">
                                        <?= $detail->catatan ?></p>
                                <?php else: ?>
                                    <span class="badge bg-label-danger" style="border-radius: 6px;">Belum ada catatan</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card h-100"
                        style="border: none; border-radius: 14px; background-color: #fff9e6; border-left: 4px solid #ffab00;">
                        <div class="card-body p-4 d-flex align-items-center">
                            <div class="me-3">
                                <i class="ti tabler-clipboard-check text-warning fs-3"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-1 fw-bold text-dark">Instrumen Penilaian Verifikator</h6>
                                <p class="mb-0 text-muted" style="font-size: 0.85rem;">Dokumen hasil penilaian dari tim
                                    verifikator lapangan.</p>
                            </div>
                            <div>
                                <?php if ($detail->nilai): ?>
                                    <a href="<?= base_url('uploads/nilai/' . $detail->nilai) ?>"
                                        class="btn btn-warning shadow-sm" target="_blank" style="border-radius: 8px;">
                                        <i class="ti tabler-download me-1"></i>Lihat Dokumen
                                    </a>
                                <?php else: ?>
                                    <span class="badge bg-label-danger px-3 py-2" style="border-radius: 6px;">Belum
                                        diunggah</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="tab-pane fade" id="navs-pills-top-kma" role="tabpanel">
            <div class="card col-lg-8 mx-auto"
                style="border: none; border-radius: 14px; box-shadow: 0 4px 24px 0 rgba(34, 41, 47, 0.1);">
                <div class="card-header py-3 px-4 d-flex justify-content-between align-items-center"
                    style="background: linear-gradient(135deg, #71dd37 0%, #a0e87a 100%); border: none; border-radius: 14px 14px 0 0;">
                    <h6 class="card-title m-0 text-white fw-bold"><i class="ti tabler-certificate me-2"></i>Data KMA
                    </h6>
                </div>
                <div class="card-body p-4">
                    <?php if ($usulan->status == 4): ?>
                        <form action="<?= site_url('supervisor/usulan/detail/kma/save/' . encrypt($usulan->id)) ?>"
                            method="post" enctype="multipart/form-data">
                            <div class="mb-4">
                                <label class="form-label fw-semibold" for="no_kma"
                                    style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.06em; color: #566a7f;">
                                    <i class="ti tabler-hash me-1" style="color: #696cff;"></i>No Keputusan
                                </label>
                                <input type="text" id="no_kma" name="no_kma" class="form-control form-control-lg"
                                    style="border-radius: 10px; font-size: 1rem;" value="<?= $usulan->no_kma ?>"
                                    placeholder="Masukkan nomor keputusan" />
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold" for="tgl_kma"
                                    style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.06em; color: #566a7f;">
                                    <i class="ti tabler-calendar me-1" style="color: #696cff;"></i>Tanggal Keputusan
                                </label>
                                <input type="date" id="tgl_kma" name="tgl_kma" class="form-control form-control-lg"
                                    style="border-radius: 10px; font-size: 1rem;" value="<?= $usulan->tgl_kma ?>" />
                            </div>

                            <div class="mb-5">
                                <label class="form-label fw-semibold" for="lampiran"
                                    style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.06em; color: #566a7f;">
                                    <i class="ti tabler-upload me-1" style="color: #696cff;"></i>File Keputusan (PDF)
                                </label>

                                <?php if ($usulan->file_kma): ?>
                                    <div class="d-flex align-items-center mb-3 p-3"
                                        style="background-color: #f8f9fb; border-radius: 10px; border-left: 4px solid #696cff;">
                                        <div
                                            style="width: 40px; height: 40px; background: #eff1ff; border-radius: 8px; display: flex; align-items: center; justify-content: center; margin-right: 12px; flex-shrink: 0;">
                                            <i class="ti tabler-file-check text-primary" style="font-size: 1.25rem;"></i>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h6 class="mb-0 text-truncate" style="font-size: 0.85rem; font-weight: 600;">
                                                <?= $usulan->file_kma ?></h6>
                                            <small class="text-muted">Dokumen terunggah</small>
                                        </div>
                                        <a href="<?= base_url('uploads/kma/' . $usulan->file_kma) ?>" target="_blank"
                                            class="btn btn-sm btn-outline-primary" style="border-radius: 8px;">
                                            <i class="ti tabler-external-link"></i>
                                        </a>
                                    </div>
                                <?php endif; ?>

                                <input type="file" class="form-control form-control-lg" id="lampiran" name="lampiran"
                                    aria-describedby="groupLampiran" aria-label="Upload" accept=".pdf"
                                    style="border-radius: 10px;" />
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg w-100 waves-effect waves-light"
                                style="border-radius: 10px; box-shadow: 0 4px 12px rgba(105,108,255,0.3);">
                                <i class="ti tabler-device-floppy me-2"></i>Simpan Data
                            </button>
                        </form>
                    <?php else: ?>
                        <div class="mb-4">
                            <label class="form-label fw-semibold" for="no_kma"
                                style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.06em; color: #566a7f;">
                                <i class="ti tabler-hash me-1" style="color: #696cff;"></i>No Keputusan
                            </label>
                            <input type="text" id="no_kma" name="no_kma" class="form-control form-control-lg bg-light"
                                style="border-radius: 10px; font-size: 1rem;" value="<?= $usulan->no_kma ?>" disabled />
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold" for="tgl_kma"
                                style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.06em; color: #566a7f;">
                                <i class="ti tabler-calendar me-1" style="color: #696cff;"></i>Tanggal Keputusan
                            </label>
                            <input type="date" id="tgl_kma" name="tgl_kma" class="form-control form-control-lg bg-light"
                                style="border-radius: 10px; font-size: 1rem;" value="<?= $usulan->tgl_kma ?>" disabled />
                        </div>

                        <div class="mb-2">
                            <label class="form-label fw-semibold" for="lampiran"
                                style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.06em; color: #566a7f;">
                                <i class="ti tabler-file-download me-1" style="color: #696cff;"></i>File Keputusan
                            </label>

                            <?php if ($usulan->file_kma): ?>
                                <div class="d-flex align-items-center p-3"
                                    style="background-color: #f8f9fb; border-radius: 10px; border-left: 4px solid #696cff;">
                                    <div
                                        style="width: 40px; height: 40px; background: #eff1ff; border-radius: 8px; display: flex; align-items: center; justify-content: center; margin-right: 12px; flex-shrink: 0;">
                                        <i class="ti tabler-file-check text-primary" style="font-size: 1.25rem;"></i>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h6 class="mb-0 text-truncate" style="font-size: 0.85rem; font-weight: 600;">
                                            <?= $usulan->file_kma ?></h6>
                                        <small class="text-muted">Dokumen terunggah</small>
                                    </div>
                                    <a href="<?= base_url('uploads/kma/' . $usulan->file_kma) ?>" target="_blank"
                                        class="btn btn-sm btn-outline-primary" style="border-radius: 8px;">
                                        <i class="ti tabler-external-link"></i>
                                    </a>
                                </div>
                            <?php else: ?>
                                <div class="text-muted p-3 text-center" style="background: #f8f9fb; border-radius: 10px;">Belum
                                    ada dokumen KMA</div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Preview Modal -->
<div id="preview" class="modal fade" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" style="border: none; border-radius: 16px; overflow: hidden;">
            <div class="modal-header py-3 px-4"
                style="background: linear-gradient(135deg, #696cff 0%, #8592ff 100%); border: none;">
                <h6 class="modal-title text-white fw-semibold"><i class="ti tabler-eye me-2"></i>Preview Dokumen</h6>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body p-0" id="object"></div>
            <div class="modal-footer" style="border-top: 1px solid #f0f2f5;">
                <a href="" target="_blank" class="btn btn-primary waves-effect" id="previewfile"
                    style="border-radius: 8px;"><i class="ti tabler-external-link me-1"></i>Buka Tab Baru</a>
                <button type="button" class="btn btn-label-secondary waves-effect" data-bs-dismiss="modal"
                    style="border-radius: 8px;">Tutup</button>
            </div>
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

    .bg-lighter {
        background-color: #f8f9fa;
    }
</style>

<?= $this->endSection() ?>
<?= $this->section('scripts'); ?>
<script>
    function preview(berkas) {
        $('#object').html('<object data="' + berkas + '" type="application/pdf" width="100%" style="height: 80vh;" id="object">' +
            '<p>Browser tidak mendukung!</p>' +
            '</object>');
        $('#previewfile').attr('href', berkas);
        $('#preview').modal('show');
    }

    function recheck() {
        Swal.fire({
            text: 'Masukan informasi Pengembalian!',
            input: 'text',
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Verifikasi Ulang',
            showLoaderOnConfirm: true,
            preConfirm: (data) => {
                return fetch('<?= site_url('supervisor/usulan/alihbentukptkis/recheck/' . encrypt($usulan->id)) ?>', {
                    method: "POST",
                    body: JSON.stringify({ keterangan: data }),
                    headers: { "Content-type": "application/json; charset=UTF-8" }
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(response.statusText)
                        }
                        return response.json()
                    })
                    .catch(error => {
                        Swal.showValidationMessage(
                            `Request failed: ${error}`
                        )
                    })
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.isConfirmed) {
                // reload page
                window.location.reload();
            }
        });
    }

</script>
<?= $this->endSection() ?>