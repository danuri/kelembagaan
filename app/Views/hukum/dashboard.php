<?= $this->extend('hukum/template') ?>
<?= $this->section('content') ?>

<!-- Welcome Card & Stats -->
<div class="row g-6 mb-6">
  <!-- Welcome Banner -->
  <div class="col-xl-5">
    <div class="card h-100 shadow-sm border-0" style="background: linear-gradient(135deg, #696cff 0%, #3f42b4 100%); border-radius: 16px; overflow: hidden;">
      <div class="card-body p-4 text-white d-flex flex-column justify-content-between">
        <div>
          <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-3" style="background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(8px);">
            <i class="ti tabler-scale text-white fs-6"></i>
            <span class="fs-7 fw-medium">Portal Biro Hukum</span>
          </div>
          <h4 class="text-white fw-bold mb-2">Selamat Datang, <?= esc(auth()->user()->full_name ?? 'Biro Hukum') ?>!</h4>
          <p class="mb-4 text-white-50" style="font-size: 0.9rem; line-height: 1.5;">
            Anda memiliki hak akses untuk memantau dan meninjau seluruh dokumen usulan kelembagaan yang statusnya telah <strong>Selesai</strong>.
          </p>
        </div>
        <div class="d-flex align-items-center justify-content-between pt-3 border-top border-white-50">
          <div>
            <span class="text-white-50 fs-7 d-block">Total Usulan Selesai</span>
            <span class="fs-3 fw-bold text-white"><?= $jumlahUsulSelesai->jumlah ?? 0 ?></span>
          </div>
          <a href="<?= site_url('hukum/usulan') ?>" class="btn btn-light text-primary fw-semibold px-4" style="border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.15);">
            <i class="ti tabler-list-search me-1"></i> Lihat Usulan Selesai
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Summary Stats -->
  <div class="col-xl-7">
    <div class="row g-4">
      <div class="col-sm-6">
        <div class="card h-100 border-0 shadow-sm" style="border-radius: 16px;">
          <div class="card-body p-4">
            <div class="d-flex align-items-center justify-content-between mb-3">
              <div class="avatar rounded-3 bg-label-success p-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                <i class="icon-base ti tabler-circle-check fs-3"></i>
              </div>
              <span class="badge bg-label-success rounded-pill">Status 20</span>
            </div>
            <h6 class="text-muted fw-normal mb-1">Usulan Selesai</h6>
            <h3 class="fw-bold mb-0 text-success"><?= $jumlahUsulSelesai->jumlah ?? 0 ?></h3>
            <small class="text-muted">Siap ditinjau & diunduh SK/KMA</small>
          </div>
        </div>
      </div>

      <div class="col-sm-6">
        <div class="card h-100 border-0 shadow-sm" style="border-radius: 16px;">
          <div class="card-body p-4">
            <div class="d-flex align-items-center justify-content-between mb-3">
              <div class="avatar rounded-3 bg-label-primary p-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                <i class="icon-base ti tabler-folders fs-3"></i>
              </div>
              <span class="badge bg-label-primary rounded-pill">Seluruh Usulan</span>
            </div>
            <h6 class="text-muted fw-normal mb-1">Total Usulan Masuk</h6>
            <h3 class="fw-bold mb-0 text-primary"><?= $jumlahUsul->jumlah ?? 0 ?></h3>
            <small class="text-muted">Dari seluruh jenis layanan</small>
          </div>
        </div>
      </div>

      <div class="col-12">
        <div class="card border-0 shadow-sm" style="border-radius: 16px; background: #f8f9fc;">
          <div class="card-body p-4 d-flex align-items-center gap-3">
            <div class="flex-shrink-0">
              <div class="avatar rounded-circle bg-label-info p-3 d-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                <i class="ti tabler-info-circle fs-4"></i>
              </div>
            </div>
            <div class="flex-grow-1">
              <h6 class="fw-semibold mb-1" style="color: #435971;">Akses View-Only Biro Hukum</h6>
              <p class="text-muted mb-0" style="font-size: 0.85rem;">
                Sebagai Biro Hukum, Anda dapat mengakses data lembaga, dokumen permohonan, riwayat verifikasi, berkas RKMA, dan Keputusan Menteri Agama (KMA) tanpa izin modifikasi data.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Breakdown Layanan Table Card -->
<div class="card border-0 shadow-sm mb-6" style="border-radius: 16px; overflow: hidden;">
  <div class="card-header py-3 px-4 d-flex align-items-center justify-content-between" style="border-bottom: 1px solid #f0f2f5;">
    <div class="d-flex align-items-center gap-2">
      <div style="width: 4px; height: 24px; background: linear-gradient(180deg, #696cff, #a3acff); border-radius: 4px;"></div>
      <h5 class="mb-0 fw-bold" style="color: #435971;">Rekapitulasi Usulan Selesai per Layanan</h5>
    </div>
    <a href="<?= site_url('hukum/usulan/download') ?>" class="btn btn-sm btn-outline-primary" style="border-radius: 8px;">
      <i class="ti tabler-download me-1"></i> Unduh Excel
    </a>
  </div>
  <div class="table-responsive">
    <table class="table table-hover mb-0" style="border-collapse: separate; border-spacing: 0;">
      <thead style="background: #f8f9fb;">
        <tr>
          <th style="padding: 14px 20px; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">No</th>
          <th style="padding: 14px 20px; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">Jenis Layanan</th>
          <th style="padding: 14px 20px; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none; text-align: center;">Total Usul</th>
          <th style="padding: 14px 20px; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none; text-align: center;">Selesai (KMA)</th>
          <th style="padding: 14px 20px; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none; text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($jumlahLayananStatus)): ?>
          <?php $no = 1; foreach ($jumlahLayananStatus as $row): ?>
            <tr>
              <td style="padding: 14px 20px; vertical-align: middle; border-bottom: 1px solid #f0f2f5;"><?= $no++ ?></td>
              <td style="padding: 14px 20px; vertical-align: middle; border-bottom: 1px solid #f0f2f5;">
                <span class="fw-semibold text-dark"><?= esc($row->layanan_nama) ?></span>
              </td>
              <td style="padding: 14px 20px; vertical-align: middle; border-bottom: 1px solid #f0f2f5; text-align: center;">
                <span class="badge bg-label-secondary rounded-pill px-3"><?= $row->jumlah ?></span>
              </td>
              <td style="padding: 14px 20px; vertical-align: middle; border-bottom: 1px solid #f0f2f5; text-align: center;">
                <span class="badge bg-label-success rounded-pill px-3 fw-bold"><?= $row->selesai ?> Selesai</span>
              </td>
              <td style="padding: 14px 20px; vertical-align: middle; border-bottom: 1px solid #f0f2f5; text-align: center;">
                <a href="<?= site_url('hukum/usulan?layanan=' . $row->layanan_id) ?>" class="btn btn-sm btn-label-primary waves-effect" style="border-radius: 8px;">
                  <i class="ti tabler-eye me-1"></i> Buka
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="5" class="text-center py-4 text-muted">Belum ada data statistik layanan.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Usulan Selesai Terkini -->
<div class="card border-0 shadow-sm" style="border-radius: 16px; overflow: hidden;">
  <div class="card-header py-3 px-4 d-flex align-items-center justify-content-between" style="border-bottom: 1px solid #f0f2f5;">
    <div class="d-flex align-items-center gap-2">
      <div style="width: 4px; height: 24px; background: linear-gradient(180deg, #28c76f, #81ebb0); border-radius: 4px;"></div>
      <h5 class="mb-0 fw-bold" style="color: #435971;">5 Usulan Selesai Terkini</h5>
    </div>
    <a href="<?= site_url('hukum/usulan') ?>" class="btn btn-sm btn-primary waves-effect waves-light" style="border-radius: 8px;">
      Lihat Semua <i class="ti tabler-arrow-right ms-1"></i>
    </a>
  </div>
  <div class="table-responsive">
    <table class="table table-hover mb-0" style="border-collapse: separate; border-spacing: 0;">
      <thead style="background: #f8f9fb;">
        <tr>
          <th style="padding: 14px 20px; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">Tanggal Usul</th>
          <th style="padding: 14px 20px; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">Nomor Surat</th>
          <th style="padding: 14px 20px; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">Nama Lembaga</th>
          <th style="padding: 14px 20px; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">Layanan</th>
          <th style="padding: 14px 20px; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">No. KMA</th>
          <th style="padding: 14px 20px; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($recentSelesai)): ?>
          <?php foreach ($recentSelesai as $usul): ?>
            <tr>
              <td style="padding: 14px 20px; vertical-align: middle; border-bottom: 1px solid #f0f2f5;">
                <span class="text-muted" style="font-size: 0.85rem;"><?= $usul->submit_at ? date('d M Y', strtotime($usul->submit_at)) : '-' ?></span>
              </td>
              <td style="padding: 14px 20px; vertical-align: middle; border-bottom: 1px solid #f0f2f5;">
                <span class="fw-semibold text-dark" style="font-size: 0.85rem;"><?= esc($usul->nomor_surat) ?></span>
              </td>
              <td style="padding: 14px 20px; vertical-align: middle; border-bottom: 1px solid #f0f2f5;">
                <span class="fw-semibold text-dark" style="font-size: 0.85rem;"><?= esc($usul->nama_lembaga) ?></span>
              </td>
              <td style="padding: 14px 20px; vertical-align: middle; border-bottom: 1px solid #f0f2f5;">
                <span class="badge bg-label-primary rounded-pill px-3"><?= esc($usul->layanan_nama) ?></span>
              </td>
              <td style="padding: 14px 20px; vertical-align: middle; border-bottom: 1px solid #f0f2f5;">
                <span class="text-dark" style="font-size: 0.85rem;"><?= esc($usul->no_kma ?? '-') ?></span>
              </td>
              <td style="padding: 14px 20px; vertical-align: middle; border-bottom: 1px solid #f0f2f5;">
                <a href="<?= site_url('hukum/usulan/' . layananurl($usul->layanan_id) . '/detail/' . encrypt($usul->id)) ?>" class="btn btn-sm btn-primary waves-effect waves-light" style="border-radius: 8px;">
                  <i class="ti tabler-eye me-1"></i> Detail
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="6" class="text-center py-4 text-muted">Belum ada data usulan yang selesai.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<?= $this->endSection() ?>
