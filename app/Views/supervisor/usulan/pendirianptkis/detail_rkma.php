<?= $this->extend('supervisor/template') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
    <div class="d-flex flex-column justify-content-center">
        <div class="d-flex align-items-center gap-2 mb-1">
            <div style="width: 4px; height: 28px; background: linear-gradient(180deg, #696cff, #a3acff); border-radius: 4px;"></div>
            <h4 class="mb-0 fw-bold" style="letter-spacing: -0.02em;">Detail Usulan</h4>
        </div>
        <p class="text-muted mb-0 ms-3" style="font-size: 0.875rem;">Pendirian PTKIS — <?= $detail->yayasan_nama ?></p>
    </div>
    <div class="d-flex align-content-center flex-wrap gap-3">
        <a href="<?= site_url('supervisor/usulan') ?>" class="btn btn-label-secondary waves-effect" style="border-radius: 10px; padding: 8px 20px;">
            <i class="ti tabler-arrow-left me-1"></i>Kembali
        </a>
        <?php if ($usulan->status == 4): ?>
        <a href="<?= site_url('supervisor/usulan/pendirianptkis/penilaianasesor/' . encrypt($usulan->id)) ?>" type="button"
            class="btn btn-success waves-effect waves-light" style="border-radius: 10px; padding: 8px 20px; box-shadow: 0 4px 12px rgba(113,221,55,0.3);"
            onclick="return confirm('Apakah Anda yakin ingin mengirim ke Penilai?')">
            <i class="ti tabler-send me-1"></i>Kirim ke Penilai
        </a>
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
                    <div class="flex-grow-1 fw-semibold text-dark"><?= $usulan->verifikator ?? '<span class="text-muted fst-italic">Belum ditentukan</span>' ?></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tabs Navigation -->
<div class="nav-align-top mb-5">
    <ul class="nav nav-pills flex-column flex-md-row row-gap-2" style="background: white; border-radius: 12px; padding: 6px;">
        <li class="nav-item">
            <a href="<?= site_url('supervisor/usulan/pendirianptkis/detail/' . encrypt($usulan->id)) ?>" class="nav-link waves-effect waves-light" style="border-radius: 8px;">
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
            <a href="<?= site_url('supervisor/usulan/pendirianptkis/detail/rkma/' . encrypt($usulan->id)) ?>" class="nav-link active waves-effect waves-light" style="border-radius: 8px;">
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

<div class="row g-6">
    <div class="col-sm-12">
        <div class="card" style="border: none; border-radius: 14px;">
            <div class="card-header py-3 px-4 d-flex justify-content-between align-items-center" style="border-bottom: 1px solid #f0f2f5;">
                <div class="d-flex align-items-center">
                    <div style="width: 36px; height: 36px; background: linear-gradient(135deg, #ffab00, #ffd666); border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 12px;">
                        <i class="ti tabler-bell text-white" style="font-size: 1.1rem;"></i>
                    </div>
                    <h5 class="card-title m-0 fw-bold" style="color: #566a7f;">Buat Draft RKMA</h5>
                </div>
                <a href="<?= site_url('supervisor/usulan/pendirianptkis/draft/rkma/'.encrypt($usulan->id))?>" class="btn btn-sm btn-primary" style="border-radius: 8px;">
                    <i class="ti tabler-reload me-1"></i>Generate
                </a>
            </div>
            <div class="card-body p-4">
                <form action="<?= site_url('supervisor/usulan/pendirianptkis/rkmadetail')?>" method="POST">
                    
                    <h6 class="text-uppercase fw-bold mb-4" style="font-size: 0.7rem; letter-spacing: 0.1em; color: #ffab00;">
                        <i class="ti tabler-school me-1"></i>1. Perguruan Tinggi
                    </h6>
                    
                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label fw-medium" for="kategori" style="color: #566a7f;">Jenis PT</label>
                        <div class="col-sm-9">
                            <select name="kategori" id="kategori" class="form-select" style="border-radius: 10px;">
                                <option value="Sekolah Tinggi">Sekolah Tinggi</option>
                                <option value="Institut">Institut</option>
                                <option value="Universitas">Universitas</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label fw-medium" for="nama_lembaga" style="color: #566a7f;">Nama PT</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama_lembaga" id="nama_lembaga" value="<?= $detail->nama_lembaga?>" style="border-radius: 10px;">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label fw-medium" for="alamat" style="color: #566a7f;">Alamat PT</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="alamat" id="alamat" rows="2" style="border-radius: 10px;"><?= $detail->alamat?></textarea>
                        </div>
                    </div>
                    
                    <hr class="my-5" style="border-top: 1px dashed #e9ecef;" />
                    
                    <h6 class="text-uppercase fw-bold mb-4" style="font-size: 0.7rem; letter-spacing: 0.1em; color: #ffab00;">
                        <i class="ti tabler-building me-1"></i>2. Info Yayasan
                    </h6>
                    
                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label fw-medium" for="yayasan_nama" style="color: #566a7f;">Nama Yayasan</label>
                        <div class="col-sm-9">
                            <input type="text" id="yayasan_nama" name="yayasan_nama" class="form-control" value="<?= $detail->yayasan_nama?>" style="border-radius: 10px;" />
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label fw-medium" for="yayasan_nosk" style="color: #566a7f;">Nomor Akta</label>
                        <div class="col-sm-9">
                            <input type="text" id="yayasan_nosk" name="yayasan_nosk" class="form-control" value="<?= $detail->yayasan_nosk?>" style="border-radius: 10px;" />
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label fw-medium" for="yayasan_tglsk" style="color: #566a7f;">Tanggal Akta</label>
                        <div class="col-sm-9">
                            <input type="date" id="yayasan_tglsk" name="yayasan_tglsk" class="form-control" value="<?= $detail->yayasan_tglsk?>" style="border-radius: 10px;" />
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label fw-medium" for="yayasan_notaris" style="color: #566a7f;">Nama Notaris</label>
                        <div class="col-sm-9">
                            <input type="text" id="yayasan_notaris" name="yayasan_notaris" class="form-control" value="<?= $detail->yayasan_notaris?>" style="border-radius: 10px;" />
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label fw-medium" for="yayasan_kedudukan" style="color: #566a7f;">Kedudukan Akta</label>
                        <div class="col-sm-9">
                            <input type="text" id="yayasan_kedudukan" name="yayasan_kedudukan" class="form-control" value="<?= $detail->yayasan_kedudukan?>" style="border-radius: 10px;" placeholder="Contoh: Kabupaten Magelang" />
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label fw-medium" for="yayasan_kumham_nomor" style="color: #566a7f;">Nomor Pengesahan</label>
                        <div class="col-sm-9">
                            <input type="text" id="yayasan_kumham_nomor" name="yayasan_kumham_nomor" class="form-control" value="<?= $detail->yayasan_kumham_nomor?>" style="border-radius: 10px;" />
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label fw-medium" for="yayasan_kumham_tahun" style="color: #566a7f;">Tahun Pengesahan</label>
                        <div class="col-sm-9">
                            <input type="text" id="yayasan_kumham_tahun" name="yayasan_kumham_tahun" class="form-control" value="<?= $detail->yayasan_kumham_tahun?>" style="border-radius: 10px;" />
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label fw-medium" for="yayasan_kumham_tanggal" style="color: #566a7f;">Tanggal Pengesahan</label>
                        <div class="col-sm-9">
                            <input type="date" id="yayasan_kumham_tanggal" name="yayasan_kumham_tanggal" class="form-control" value="<?= $detail->yayasan_kumham_tanggal?>" style="border-radius: 10px;" />
                        </div>
                    </div>
                    
                    <div class="pt-4 border-top">
                        <div class="d-flex justify-content-end">
                            <input type="hidden" name="detailid" id="detailid" value="<?= $detail->id?>">
                            <button type="submit" class="btn btn-primary" style="border-radius: 10px; padding: 10px 24px; box-shadow: 0 4px 12px rgba(105,108,255,0.3);">
                                <i class="ti tabler-device-floppy me-2"></i>Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>        
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->section('scripts');?>
<script>
    function preview(berkas) {
        $('#object').html('<object data="'+berkas+'" type="application/pdf" width="100%" style="height: 80vh;" id="object">'+
                            '<p>Browser tidak mendukung!</p>'+
                        '</object>');
        $('#preview').modal('show');
    }
</script>
<?= $this->endSection() ?>