<?= $this->extend('verifikator/template') ?>
<?= $this->section('content') ?>
<div class="row g-6">
  <div class="col-xl-4">
    <div class="card">
      <div class="d-flex align-items-end row">
        <div class="col-7">
          <div class="card-body text-nowrap">
            <h5 class="card-title mb-0">Selamat datang Verifikator!</h5>
            <p class="mb-2">Jumlah usulan</p>
            <h4 class="text-primary mb-1"><?= $jumlahUsul->jumlah ?></h4>
            <a href="<?= base_url('verifikator/usulan') ?>" class="btn btn-primary">Lihat Usulan</a>
          </div>
        </div>
        <div class="col-5 text-center text-sm-left">
          <div class="card-body pb-0 px-0 px-md-4">
            <img
              src="<?= base_url() ?>assets/img/illustrations/card-advance-sale.png"
              height="140"
              alt="view sales" />
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- View sales -->

  <!-- Statistics -->
  <div class="col-xl-8 col-md-12">
    <div class="card h-100">
      <div class="card-header d-flex justify-content-between">
        <h5 class="card-title mb-0">Statistik</h5>
        <small class="text-body-secondary">Updated real time</small>
      </div>
      <div class="card-body d-flex align-items-end">
        <div class="w-100">
          <div class="row gy-3">
            <div class="col-md-3 col-6">
              <div class="d-flex align-items-center">
                <div class="badge rounded bg-label-info me-4 p-2">
                  <i class="icon-base ti tabler-users icon-lg"></i>
                </div>
                <div class="card-info">
                  <h5 class="mb-0"><?= $jumlahUsulVerif->jumlah ?></h5>
                  <small>Verifikasi</small>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-6">
              <div class="d-flex align-items-center">
                <div class="badge rounded bg-label-success me-4 p-2">
                  <i class="icon-base ti tabler-pencil-check icon-lg"></i>
                </div>
                <div class="card-info">
                  <h5 class="mb-0"><?= $jumlahUsulPenilaian->jumlah ?></h5>
                  <small>Penilaian</small>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-6">
              <div class="d-flex align-items-center">
                <div class="badge rounded bg-label-warning me-4 p-2">
                  <i class="icon-base ti tabler-pencil icon-lg"></i>
                </div>
                <div class="card-info">
                  <h5 class="mb-0"><?= $jumlahUsulDikembalikan->jumlah ?></h5>
                  <small>Dikembalikan</small>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-6">
              <div class="d-flex align-items-center">
                <div class="badge rounded bg-label-success me-4 p-2">
                  <i class="icon-base ti tabler-pencil-check icon-lg"></i>
                </div>
                <div class="card-info">
                  <h5 class="mb-0"><?= $jumlahUsulSelesai->jumlah ?></h5>
                  <small>Selesai</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>