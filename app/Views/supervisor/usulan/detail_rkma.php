<?= $this->extend('supervisor/template') ?>
<?= $this->section('content') ?>
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
    <div class="d-flex flex-column justify-content-center">
    <h4 class="mb-1">Detail Usulan</h4>
    <p class="mb-0">Orders placed across your store</p>
    </div>
    <div class="d-flex align-content-center flex-wrap gap-4">
    <div class="d-flex gap-4">
        <a href="<?= site_url('supervisor/usulan') ?>" class="btn btn-label-secondary waves-effect">Kembali</a>
    </div>
    <?php if($usulan->status == 4): ?>
    <a href="<?= site_url('supervisor/usulan/penilaianasesor/'.encrypt($usulan->id))?>" type="button" class="btn btn-success waves-effect waves-light" onclick="return confirm('Apakah Anda yakin ingin mengirim ke Penilai?')">Kirim ke Penilai</a>
    <?php endif; ?>
    <?php if($usulan->status == 41): ?>
    <a href="<?= site_url('supervisor/usulan/proseskma/'.encrypt($usulan->id))?>" type="button" class="btn btn-success waves-effect waves-light" onclick="return confirm('Apakah KMA telah ditandatangani?')">Proses KMA</a>
    <?php endif; ?>
    </div>
</div>

<div class="card shadow-none bg-label-success mb-3">
    <div class="card-body">
        <div class="row g-6">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Nama Yayasan</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $detail->yayasan_nama?></div>
                </div>
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Alamat Yayasan</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $detail->yayasan_alamat?></div>
                </div>
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>No. SK</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $detail->yayasan_nosk?></div>
                </div>
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Tanggal SK</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $detail->yayasan_tglsk?></div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Jenis Layanan</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $usulan->layanan_nama?></div>
                </div>
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Status Usulan</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= usul_status($usulan->status)?></div>
                </div>
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Keterangan BTS/TMS</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $usulan->keterangan?></div>
                </div>
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Verifikator</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $usulan->verifikator?></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="nav-align-top">
    <ul class="nav nav-pills flex-column flex-md-row mb-6 row-gap-2">
        <li class="nav-item">
        <a class="nav-link waves-effect waves-light" href="<?= site_url('supervisor/usulan/detail/'.encrypt($usulan->id))?>"><i class="icon-base ti tabler-user-check me-1_5 icon-sm"></i>Info Usulan</a>
        </li>
        <li class="nav-item">
        <a class="nav-link waves-effect waves-light" href="<?= site_url('supervisor/usulan/detail/verifikasi/'.encrypt($usulan->id))?>"><i class="icon-base ti tabler-user-check me-1_5 icon-sm"></i>Verifikasi Dokumen</a>
        </li>
        <li class="nav-item">
        <a class="nav-link waves-effect waves-light" href="<?= site_url('supervisor/usulan/detail/penilaian/'.encrypt($usulan->id))?>"><i class="icon-base ti tabler-lock me-1_5 icon-sm"></i>Penilaian</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active waves-effect waves-light" href="#"><i class="icon-base ti tabler-bell me-1_5 icon-sm"></i>RKMA</a>
        </li>
        <li class="nav-item">
        <a class="nav-link waves-effect waves-light" href="<?= site_url('supervisor/usulan/detail/kma/'.encrypt($usulan->id))?>"><i class="icon-base ti tabler-link me-1_5 icon-sm"></i>KMA</a>
        </li>
    </ul>
</div>
<div class="row g-6">
    <div class="col-sm-12">
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title m-0 me-2">Buat Draft RKMA</h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kecukupan">Generate</button>
            </div>
            <div class="card-body">
            <form class="card-body">
                      <h6>1. Perguruan Tinggi</h6>
                      <div class="row mb-6">
                        <label class="col-sm-3 col-form-label" for="multicol-username">Jenis PT</label>
                        <div class="col-sm-9">
                          <select name="jenis" id="jenis" class="form-select">
                            <option value="Sekolah Tinggi">Sekolah Tinggi</option>
                            <option value="Institut">Institut</option>
                            <option value="Universitas">Universitas</option>
                          </select>
                        </div>
                      </div>
                      <div class="row mb-6">
                        <label class="col-sm-3 col-form-label" for="multicol-email">Nama PT</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="namapt" value="<?= $usulan->nama_lembaga?>">
                        </div>
                      </div>
                      <div class="row mb-6">
                        <label class="col-sm-3 col-form-label" for="multicol-email">Alamat PT</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="alamatpt" value="">
                            <p>Contoh: </p>
                        </div>
                      </div>
                      
                      <hr class="my-6 mx-n6" />
                      <h6>2. Info Yayasan</h6>
                      <div class="row mb-6">
                        <label class="col-sm-3 col-form-label" for="multicol-full-name">Nama Yayasan</label>
                        <div class="col-sm-9">
                          <input type="text" id="multicol-full-name" class="form-control" value="<?= $detail->yayasan_nama?>" />
                        </div>
                      </div>
                      <div class="row mb-6">
                        <label class="col-sm-3 col-form-label" for="multicol-full-name">Nomor Akta</label>
                        <div class="col-sm-9">
                          <input type="text" id="" class="form-control" value="<?= $detail->yayasan_nosk?>" />
                        </div>
                      </div>
                      <div class="row mb-6">
                        <label class="col-sm-3 col-form-label" for="multicol-full-name">Tanggal Akta</label>
                        <div class="col-sm-9">
                          <input type="text" id="" class="form-control" value="<?= $detail->yayasan_tglsk?>" />
                        </div>
                      </div>
                      <div class="row mb-6">
                        <label class="col-sm-3 col-form-label" for="multicol-full-name">Nama Notaris</label>
                        <div class="col-sm-9">
                          <input type="text" id="" class="form-control" placeholder="John Doe" />
                        </div>
                      </div>
                      <div class="row mb-6">
                        <label class="col-sm-3 col-form-label" for="multicol-full-name">Kedudukan Akta</label>
                        <div class="col-sm-9">
                          <input type="text" id="" class="form-control" placeholder="John Doe" />
                          <p>Contoh: Kabupaten Magelang</p>
                        </div>
                      </div>
                      <div class="row mb-6">
                        <label class="col-sm-3 col-form-label" for="multicol-full-name">Nomor Pengesahan</label>
                        <div class="col-sm-9">
                          <input type="text" id="" class="form-control" placeholder="John Doe" />
                        </div>
                      </div>
                      <div class="row mb-6">
                        <label class="col-sm-3 col-form-label" for="multicol-full-name">Tahun Pengesahan</label>
                        <div class="col-sm-9">
                          <input type="text" id="" class="form-control" placeholder="John Doe" />
                        </div>
                      </div>
                      <div class="row mb-6">
                        <label class="col-sm-3 col-form-label" for="multicol-full-name">Tanggal Pengesahan</label>
                        <div class="col-sm-9">
                          <input type="date" id="" class="form-control" placeholder="John Doe" />
                        </div>
                      </div>
                      <div class="pt-6">
                        <div class="row justify-content-end">
                          <div class="col-sm-9">
                            <button type="submit" class="btn btn-primary me-4">Simpan</button>
                          </div>
                        </div>
                      </div>
                    </form>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title m-0 me-2">Daftar Program Studi</h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kecukupan">Tambah Prodi</button>
            </div>
            <div class="card-body">
            Form Generate Draft
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