<?= $this->extend('asesor/template') ?>
<?= $this->section('content') ?>

<!-- Hero Welcome Card -->
<div class="row g-6 mb-6">
  <div class="col-12">
    <div class="card overflow-hidden"
      style="border: none; border-radius: 16px; background: linear-gradient(135deg, #696cff 0%, #8592ff 50%, #a3acff 100%); min-height: 200px;">
      <div class="card-body position-relative py-5 px-5">
        <div class="row align-items-center">
          <div class="col-md-7 col-12">
            <div class="text-white">
              <span class="badge bg-white bg-opacity-25 text-primary mb-3 px-3 py-2"
                style="font-size: 0.75rem; border-radius: 50px; backdrop-filter: blur(10px);">
                <i class="ti tabler-sparkles me-1" style="font-size: 0.85rem;"></i>Panel Asesor
              </span>
              <h3 class="text-white fw-bold mb-2" style="font-size: 1.75rem; letter-spacing: -0.02em;">
                Selamat datang, <?= auth()->user()->full_name ?? 'Asesor' ?>!
              </h3>
              <p class="text-white mb-4" style="opacity: 0.85; font-size: 0.95rem; line-height: 1.6;">
                Anda memiliki <strong class="text-white"><?= $jumlahBelumDinilai->jumlah ?> usulan</strong> yang
                menunggu untuk dinilai. Ayo selesaikan penilaian Anda hari ini.
              </p>
              <a href="<?= base_url('asesor/penilaian') ?>" class="btn bg-white waves-effect waves-light px-4 py-2"
                style="color: #696cff; border-radius: 10px; font-weight: 600; box-shadow: 0 4px 15px rgba(0,0,0,0.15); transition: all 0.3s ease;">
                <i class="ti tabler-clipboard-check me-2"></i>Mulai Menilai
              </a>
            </div>
          </div>
          <div class="col-md-5 col-12 text-center d-none d-md-block">
            <img src="<?= base_url() ?>assets/img/illustrations/card-advance-sale.png" height="180"
              alt="Welcome illustration"
              style="filter: drop-shadow(0 10px 30px rgba(0,0,0,0.2)); animation: float 3s ease-in-out infinite;" />
          </div>
        </div>
        <!-- Decorative circles -->
        <div
          style="position: absolute; top: -40px; right: -40px; width: 150px; height: 150px; background: rgba(255,255,255,0.08); border-radius: 50%;">
        </div>
        <div
          style="position: absolute; bottom: -60px; right: 100px; width: 200px; height: 200px; background: rgba(255,255,255,0.05); border-radius: 50%;">
        </div>
        <div
          style="position: absolute; top: 20px; right: 200px; width: 60px; height: 60px; background: rgba(255,255,255,0.06); border-radius: 50%;">
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Statistics Cards -->
<div class="row g-6 mb-6">
  <!-- Total Penugasan -->
  <div class="col-lg-4 col-md-6 col-12">
    <div class="card stat-card h-100" style="border: none; border-radius: 14px; overflow: hidden;">
      <div class="card-body p-4">
        <div class="d-flex align-items-start justify-content-between">
          <div>
            <p class="mb-1 text-muted"
              style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 600;">Total
              Penugasan</p>
            <h2 class="mb-2 fw-bold" style="font-size: 2.25rem; color: #566a7f; letter-spacing: -0.02em;">
              <?= $jumlahUsul->jumlah ?>
            </h2>
            <span class="badge bg-label-primary" style="border-radius: 8px; padding: 5px 12px; font-size: 0.75rem;">
              <i class="ti tabler-briefcase me-1"></i>Keseluruhan
            </span>
          </div>
          <div class="stat-icon"
            style="background: linear-gradient(135deg, #696cff, #8592ff); width: 52px; height: 52px; border-radius: 14px; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 12px rgba(105, 108, 255, 0.35);">
            <i class="ti tabler-file-description text-white" style="font-size: 1.5rem;"></i>
          </div>
        </div>
      </div>
      <div style="height: 4px; background: linear-gradient(90deg, #696cff, #a3acff);"></div>
    </div>
  </div>

  <!-- Kecukupan -->
  <div class="col-lg-2 col-md-6 col-12">
    <div class="card stat-card h-100" style="border: none; border-radius: 14px; overflow: hidden;">
      <div class="card-body p-4">
        <div class="d-flex align-items-start justify-content-between">
          <div>
            <p class="mb-1 text-muted"
              style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 600;">
              Asesmen Kecukupan</p>
            <h2 class="mb-2 fw-bold" style="font-size: 2.25rem; color: #566a7f; letter-spacing: -0.02em;">
              <?= $jumlahKecukupan->jumlah ?>
            </h2>
            <span class="badge bg-label-warning" style="border-radius: 8px; padding: 5px 12px; font-size: 0.75rem;">
              <i class="ti tabler-clock-hour-4 me-1"></i>Lembaga
            </span>
          </div>
          <div class="stat-icon"
            style="background: linear-gradient(135deg, #696cff, #8592ff); width: 52px; height: 52px; border-radius: 14px; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 12px rgba(105, 108, 255, 0.35);">
            <i class="ti tabler-file-description text-white" style="font-size: 1.5rem;"></i>
          </div>
        </div>
      </div>
      <div style="height: 4px; background: linear-gradient(90deg, #566a7f, #a3acff);"></div>
    </div>
  </div>
  <!-- Lapangan -->
  <div class="col-lg-2 col-md-6 col-12">
    <div class="card stat-card h-100" style="border: none; border-radius: 14px; overflow: hidden;">
      <div class="card-body p-4">
        <div class="d-flex align-items-start justify-content-between">
          <div>
            <p class="mb-1 text-muted"
              style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 600;">Asesmen
              Lapangan</p>
            <h2 class="mb-2 fw-bold" style="font-size: 2.25rem; color: #566a7f; letter-spacing: -0.02em;">
              <?= $jumlahLapangan->jumlah ?>
            </h2>
            <span class="badge bg-label-warning" style="border-radius: 8px; padding: 5px 12px; font-size: 0.75rem;">
              <i class="ti tabler-clock-hour-4 me-1"></i>Lembaga
            </span>
          </div>
          <div class="stat-icon"
            style="background: linear-gradient(135deg, #696cff, #8592ff); width: 52px; height: 52px; border-radius: 14px; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 12px rgba(105, 108, 255, 0.35);">
            <i class="ti tabler-file-description text-white" style="font-size: 1.5rem;"></i>
          </div>
        </div>
      </div>
      <div style="height: 4px; background: linear-gradient(90deg, #566a7f, #a3acff);"></div>
    </div>
  </div>
  <!-- Belum Dinilai -->
  <div class="col-lg-2 col-md-6 col-12">
    <div class="card stat-card h-100" style="border: none; border-radius: 14px; overflow: hidden;">
      <div class="card-body p-4">
        <div class="d-flex align-items-start justify-content-between">
          <div>
            <p class="mb-1 text-muted"
              style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 600;">Belum
              Dinilai</p>
            <h2 class="mb-2 fw-bold" style="font-size: 2.25rem; color: #ffab00; letter-spacing: -0.02em;">
              <?= $jumlahBelumDinilai->jumlah ?>
            </h2>
            <span class="badge bg-label-warning" style="border-radius: 8px; padding: 5px 12px; font-size: 0.75rem;">
              <i class="ti tabler-clock-hour-4 me-1"></i>Menunggu
            </span>
          </div>
          <div class="stat-icon"
            style="background: linear-gradient(135deg, #ffab00, #ffd666); width: 52px; height: 52px; border-radius: 14px; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 12px rgba(255, 171, 0, 0.35);">
            <i class="ti tabler-hourglass-low text-white" style="font-size: 1.5rem;"></i>
          </div>
        </div>
      </div>
      <div style="height: 4px; background: linear-gradient(90deg, #ffab00, #ffd666);"></div>
    </div>
  </div>

  <!-- Sudah Dinilai -->
  <div class="col-lg-2 col-md-6 col-12">
    <div class="card stat-card h-100" style="border: none; border-radius: 14px; overflow: hidden;">
      <div class="card-body p-4">
        <div class="d-flex align-items-start justify-content-between">
          <div>
            <p class="mb-1 text-muted"
              style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 600;">Sudah
              Dinilai</p>
            <h2 class="mb-2 fw-bold" style="font-size: 2.25rem; color: #71dd37; letter-spacing: -0.02em;">
              <?= $jumlahSudahDinilai->jumlah ?>
            </h2>
            <span class="badge bg-label-success" style="border-radius: 8px; padding: 5px 12px; font-size: 0.75rem;">
              <i class="ti tabler-circle-check me-1"></i>Selesai
            </span>
          </div>
          <div class="stat-icon"
            style="background: linear-gradient(135deg, #71dd37, #a0e87a); width: 52px; height: 52px; border-radius: 14px; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 12px rgba(113, 221, 55, 0.35);">
            <i class="ti tabler-checks text-white" style="font-size: 1.5rem;"></i>
          </div>
        </div>
      </div>
      <div style="height: 4px; background: linear-gradient(90deg, #71dd37, #a0e87a);"></div>
    </div>
  </div>
</div>

<!-- Progress Overview -->
<div class="row g-6">
  <div class="col-12">
    <div class="card" style="border: none; border-radius: 14px;">
      <div class="card-body p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
          <div>
            <h5 class="fw-bold mb-1" style="letter-spacing: -0.01em;">Progres Penilaian</h5>
            <small class="text-muted">Rasio penilaian selesai terhadap total penugasan</small>
          </div>
          <div class="badge bg-label-primary px-3 py-2" style="border-radius: 10px; font-size: 0.8rem;">
            <?php
            $total = (int) ($jumlahUsul->jumlah ?? 0);
            $selesai = (int) ($jumlahSudahDinilai->jumlah ?? 0);
            $pct = $total > 0 ? round(($selesai / $total) * 100) : 0;
            ?>
            <?= $pct ?>% Selesai
          </div>
        </div>
        <div class="progress" style="height: 12px; border-radius: 10px; background: #e9ecef;">
          <div class="progress-bar" role="progressbar"
            style="width: <?= $pct ?>%; background: linear-gradient(90deg, #696cff, #71dd37); border-radius: 10px; transition: width 1.5s cubic-bezier(0.4, 0, 0.2, 1);"
            aria-valuenow="<?= $pct ?>" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="d-flex justify-content-between mt-3">
          <small class="text-muted"><i class="ti tabler-hourglass-low me-1"></i><?= $jumlahBelumDinilai->jumlah ?>
            menunggu</small>
          <small class="text-muted"><i class="ti tabler-checks me-1"></i><?= $selesai ?> dari <?= $total ?>
            selesai</small>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  @keyframes float {

    0%,
    100% {
      transform: translateY(0px);
    }

    50% {
      transform: translateY(-12px);
    }
  }

  .stat-card {
    transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
  }

  .stat-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 32px rgba(0, 0, 0, 0.1);
  }

  .stat-card:hover .stat-icon {
    transform: scale(1.1) rotate(5deg);
    transition: transform 0.3s ease;
  }

  .stat-icon {
    transition: transform 0.3s ease;
  }
</style>

<?= $this->endSection() ?>