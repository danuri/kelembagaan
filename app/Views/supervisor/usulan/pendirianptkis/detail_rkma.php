<?= $this->extend('supervisor/template') ?>
<?= $this->section('content') ?>
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
    <div class="d-flex flex-column justify-content-center">
    <h4 class="mb-1">Detail Usulan</h4>
    </div>
    <div class="d-flex align-content-center flex-wrap gap-4">
    <div class="d-flex gap-4">
        <a href="<?= site_url('supervisor/usulan') ?>" class="btn btn-label-secondary waves-effect">Kembali</a>
    </div>
    <?php if($usulan->status == 4): ?>
    <a href="<?= site_url('supervisor/usulan/pendirianptkis/penilaianasesor/'.encrypt($usulan->id))?>" type="button" class="btn btn-success waves-effect waves-light" onclick="return confirm('Apakah Anda yakin ingin mengirim ke Penilai?')">Kirim ke Penilai</a>
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
        <a class="nav-link waves-effect waves-light" href="<?= site_url('supervisor/usulan/pendirianptkis/detail/'.encrypt($usulan->id))?>"><i class="icon-base ti tabler-user-check me-1_5 icon-sm"></i>Info Usulan</a>
        </li>
        <li class="nav-item">
        <a class="nav-link waves-effect waves-light" href="<?= site_url('supervisor/usulan/pendirianptkis/detail/verifikasi/'.encrypt($usulan->id))?>"><i class="icon-base ti tabler-user-check me-1_5 icon-sm"></i>Verifikasi Dokumen</a>
        </li>
        <li class="nav-item">
        <a class="nav-link waves-effect waves-light" href="<?= site_url('supervisor/usulan/pendirianptkis/detail/penilaian/'.encrypt($usulan->id))?>"><i class="icon-base ti tabler-lock me-1_5 icon-sm"></i>Penilaian</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active waves-effect waves-light" href="#"><i class="icon-base ti tabler-bell me-1_5 icon-sm"></i>RKMA</a>
        </li>
        <li class="nav-item">
        <a class="nav-link waves-effect waves-light" href="<?= site_url('supervisor/usulan/pendirianptkis/detail/kma/'.encrypt($usulan->id))?>"><i class="icon-base ti tabler-link me-1_5 icon-sm"></i>KMA</a>
        </li>
    </ul>
</div>
<div class="row g-6">
    <div class="col-sm-12">
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title m-0 me-2">Buat Draft RKMA</h5>
                <a href="<?= site_url('supervisor/usulan/pendirianptkis/draft/rkma/'.encrypt($usulan->id))?>" class="btn btn-primary">Generate</a>
            </div>
            <div class="card-body">
            <form class="" action="<?= site_url('supervisor/usulan/pendirianptkis/rkmadetail')?>" method="POST">
                      <h6>1. Perguruan Tinggi</h6>
                      <div class="row mb-6">
                        <label class="col-sm-3 col-form-label" for="kategori">Jenis PT</label>
                        <div class="col-sm-9">
                          <select name="kategori" id="kategori" class="form-select">
                            <option value="Sekolah Tinggi">Sekolah Tinggi</option>
                            <option value="Institut">Institut</option>
                            <option value="Universitas">Universitas</option>
                          </select>
                        </div>
                      </div>
                      <div class="row mb-6">
                        <label class="col-sm-3 col-form-label" for="nama_lembaga">Nama PT</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama_lembaga" id="nama_lembaga" value="<?= $detail->nama_lembaga?>">
                        </div>
                      </div>
                      <div class="row mb-6">
                        <label class="col-sm-3 col-form-label" for="alamat">Alamat PT</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $detail->alamat?>">
                            <p>Contoh: </p>
                        </div>
                      </div>
                      
                      <hr class="my-6 mx-n6" />
                      <h6>2. Info Yayasan</h6>
                      <div class="row mb-6">
                        <label class="col-sm-3 col-form-label" for="yayasan_nama">Nama Yayasan</label>
                        <div class="col-sm-9">
                          <input type="text" id="yayasan_nama" name="yayasan_nama" class="form-control" value="<?= $detail->yayasan_nama?>" />
                        </div>
                      </div>
                      <div class="row mb-6">
                        <label class="col-sm-3 col-form-label" for="yayasan_nosk">Nomor Akta</label>
                        <div class="col-sm-9">
                          <input type="text" id="yayasan_nosk" name="yayasan_nosk" class="form-control" value="<?= $detail->yayasan_nosk?>" />
                        </div>
                      </div>
                      <div class="row mb-6">
                        <label class="col-sm-3 col-form-label" for="yayasan_tglsk">Tanggal Akta</label>
                        <div class="col-sm-9">
                          <input type="text" id="yayasan_tglsk" name="yayasan_tglsk" class="form-control" value="<?= $detail->yayasan_tglsk?>" />
                        </div>
                      </div>
                      <div class="row mb-6">
                        <label class="col-sm-3 col-form-label" for="yayasan_notaris">Nama Notaris</label>
                        <div class="col-sm-9">
                          <input type="text" id="yayasan_notaris" name="yayasan_notaris" class="form-control" value="<?= $detail->yayasan_notaris?>" />
                        </div>
                      </div>
                      <div class="row mb-6">
                        <label class="col-sm-3 col-form-label" for="yayasan_kedudukan">Kedudukan Akta</label>
                        <div class="col-sm-9">
                          <input type="text" id="yayasan_kedudukan" name="yayasan_kedudukan" class="form-control" value="<?= $detail->yayasan_kedudukan?>" />
                          <p>Contoh: Kabupaten Magelang</p>
                        </div>
                      </div>
                      <div class="row mb-6">
                        <label class="col-sm-3 col-form-label" for="yayasan_kumham_nomor">Nomor Pengesahan</label>
                        <div class="col-sm-9">
                          <input type="text" id="yayasan_kumham_nomor" name="yayasan_kumham_nomor" class="form-control" value="<?= $detail->yayasan_kumham_nomor?>" />
                        </div>
                      </div>
                      <div class="row mb-6">
                        <label class="col-sm-3 col-form-label" for="yayasan_kumham_tahun">Tahun Pengesahan</label>
                        <div class="col-sm-9">
                          <input type="text" id="yayasan_kumham_tahun" name="yayasan_kumham_tahun" class="form-control" value="<?= $detail->yayasan_kumham_tahun?>" />
                        </div>
                      </div>
                      <div class="row mb-6">
                        <label class="col-sm-3 col-form-label" for="yayasan_kumham_tanggal">Tanggal Pengesahan</label>
                        <div class="col-sm-9">
                          <input type="date" id="yayasan_kumham_tanggal" name="yayasan_kumham_tanggal" class="form-control" value="<?= $detail->yayasan_kumham_tanggal?>" />
                        </div>
                      </div>
                      <div class="pt-6">
                        <div class="row justify-content-end">
                          <div class="col-sm-9">
                            <input type="hidden" name="detailid" id="detailid" value="<?= $detail->id?>">
                            <button type="submit" class="btn btn-primary me-4">Simpan</button>
                          </div>
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