<?= $this->extend('supervisor/template') ?>
<?= $this->section('content') ?>
<div class="row g-6">
  <div class="col-xl-4">
    <div class="card">
      <div class="d-flex align-items-end row">
        <div class="col-7">
          <div class="card-body text-nowrap">
            <h5 class="card-title mb-0">Selamat datang Supervisor!</h5>
            <p class="mb-2">Jumlah usulan</p>
            <h4 class="text-primary mb-1"><?= $jumlahUsul->jumlah ?></h4>
            <a href="<?= base_url('supervisor/usulan') ?>" class="btn btn-primary">Lihat Usulan</a>
          </div>
        </div>
        <div class="col-5 text-center text-sm-left">
          <div class="card-body pb-0 px-0 px-md-4">
            <img
              src="../../assets/img/illustrations/card-advance-sale.png"
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
                <div class="badge rounded bg-label-primary me-4 p-2">
                  <i class="icon-base ti tabler-chart-pie-2 icon-lg"></i>
                </div>
                <div class="card-info">
                  <h5 class="mb-0"><?= $jumlahUsulKirim->jumlah ?></h5>
                  <small>Menunggu</small>
                </div>
              </div>
            </div>
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
                <div class="badge rounded bg-label-danger me-4 p-2">
                  <i class="icon-base ti tabler-shopping-cart icon-lg"></i>
                </div>
                <div class="card-info">
                  <h5 class="mb-0"><?= $jumlahUsulPenilaian->jumlah ?></h5>
                  <small>Penilaian</small>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-6">
              <div class="d-flex align-items-center">
                <div class="badge rounded bg-label-danger me-4 p-2">
                  <i class="icon-base ti tabler-shopping-cart icon-lg"></i>
                </div>
                <div class="card-info">
                  <h5 class="mb-0"><?= $jumlahUsulRkma->jumlah ?></h5>
                  <small>RKMA</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row g-6 mt-3">
  <div class="col-12">
    <div class="card">
      <div class="">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Layanan</th>
              <th>Menunggu</th>
              <th>Verifikasi</th>
              <th>Penilaian</th>
              <th>RKMA/KMA</th>
              <th>Dikembalikan</th>
              <th>Selesai</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; foreach($jumlahLayananStatus as $row): ?>
            <tr>
              <td><?= $no ?></td>
              <td><?= $row->layanan_nama ?></td>
              <td><?= $row->masuk ?></td>
              <td><?= $row->verifikasi ?></td>
              <td><?= $row->penilaian ?></td>
              <td><?= $row->rkma ?></td>
              <td><?= $row->kembali ?></td>
              <td><?= $row->selesai ?></td>
            </tr>
            <?php $no++; endforeach; ?>
          </tbody>
        </table>  
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>