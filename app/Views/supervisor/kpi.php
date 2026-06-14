<?= $this->extend('supervisor/template') ?>
<?= $this->section('content') ?>

<div class="d-flex align-items-center justify-content-between mb-6">
  <div>
    <h4 class="fw-bold mb-1"><i class="ti tabler-chart-bar me-2 text-primary"></i>Statistik KPI</h4>
    <p class="text-muted mb-0">Kinerja pengelolaan usulan oleh Verifikator &amp; Asesor</p>
  </div>
  <small class="text-muted"><i class="ti tabler-refresh me-1"></i>Data real time</small>
</div>

<!-- ═══════════════════════════════════════════════════════════════
     SECTION: VERIFIKATOR
═══════════════════════════════════════════════════════════════ -->
<div class="card mb-6">
  <div class="card-header d-flex align-items-center">
    <span class="badge bg-label-info me-3 p-2"><i class="ti tabler-user-check icon-md"></i></span>
    <h5 class="card-title mb-0">KPI Verifikator</h5>
  </div>
  <div class="table-responsive">
    <table class="table table-hover table-bordered align-middle mb-0">
      <thead class="table-dark">
        <tr>
          <th class="text-center" style="width:40px;">No</th>
          <th>Nama Verifikator</th>
          <th class="text-center">Total Ditangani</th>
          <th class="text-center">Proses Verifikasi</th>
          <th class="text-center">Lolos Verifikasi</th>
          <th class="text-center">Selesai</th>
          <th class="text-center">Dikembalikan</th>
          <th class="text-center" style="width:180px;">% Lolos</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($kpiVerifikator)): ?>
          <tr>
            <td colspan="8" class="text-center text-muted py-4">Belum ada data verifikator.</td>
          </tr>
        <?php else: ?>
          <?php $no = 1;
          foreach ($kpiVerifikator as $row): ?>
            <?php
            $pct = (float) $row->pct_lolos;
            $barColor = $pct >= 80 ? 'success' : ($pct >= 50 ? 'warning' : 'danger');
            ?>
            <tr>
              <td class="text-center text-muted"><?= $no++ ?></td>
              <td>
                <div class="d-flex align-items-center gap-2">
                  <div class="avatar avatar-sm me-2">
                    <span
                      class="avatar-initial rounded-circle bg-label-primary"><?= strtoupper(substr($row->full_name, 0, 1)) ?></span>
                  </div>
                  <span class="fw-semibold"><?= esc($row->full_name) ?></span>
                </div>
              </td>
              <td class="text-center">
                <span class="badge bg-label-secondary fs-6"><?= $row->total ?></span>
              </td>
              <td class="text-center">
                <span class="badge bg-label-info"><?= $row->proses_verifikasi ?></span>
              </td>
              <td class="text-center">
                <span class="badge bg-label-primary"><?= $row->lolos_verifikasi ?></span>
              </td>
              <td class="text-center">
                <span class="badge bg-label-success"><?= $row->selesai ?></span>
              </td>
              <td class="text-center">
                <span class="badge bg-label-danger"><?= $row->dikembalikan ?></span>
              </td>
              <td>
                <div class="d-flex align-items-center gap-2">
                  <div class="progress flex-grow-1" style="height:8px;">
                    <div class="progress-bar bg-<?= $barColor ?>" role="progressbar" style="width:<?= $pct ?>%"
                      aria-valuenow="<?= $pct ?>" aria-valuemin="0" aria-valuemax="100">
                    </div>
                  </div>
                  <small class="fw-semibold text-<?= $barColor ?>"><?= $pct ?>%</small>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<!-- ═══════════════════════════════════════════════════════════════
     SECTION: ASESOR
═══════════════════════════════════════════════════════════════ -->
<div class="card">
  <div class="card-header d-flex align-items-center">
    <span class="badge bg-label-warning me-3 p-2"><i class="ti tabler-award icon-md"></i></span>
    <h5 class="card-title mb-0">KPI Asesor</h5>
  </div>
  <div class="table-responsive">
    <table class="table table-hover table-bordered align-middle mb-0">
      <thead class="table-dark">
        <tr>
          <th class="text-center" style="width:40px;">No</th>
          <th>Nama Asesor</th>
          <th class="text-center">Total Penugasan</th>
          <th class="text-center">Total Usulan</th>
          <th class="text-center">Kecukupan</th>
          <th class="text-center">Lapangan</th>
          <th class="text-center">Sudah Dinilai</th>
          <th class="text-center">Belum Dinilai</th>
          <th class="text-center" style="width:180px;">% Selesai</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($kpiAsesor)): ?>
          <tr>
            <td colspan="9" class="text-center text-muted py-4">Belum ada data asesor.</td>
          </tr>
        <?php else: ?>
          <?php $no = 1;
          foreach ($kpiAsesor as $row): ?>
            <?php
            $total = (int) $row->total_penugasan;
            $selesai = (int) $row->sudah_dinilai;
            $pct = $total > 0 ? round($selesai / $total * 100, 1) : 0;
            $barColor = $pct >= 80 ? 'success' : ($pct >= 50 ? 'warning' : 'danger');
            ?>
            <tr>
              <td class="text-center text-muted"><?= $no++ ?></td>
              <td>
                <div class="d-flex align-items-center gap-2">
                  <div class="avatar avatar-sm me-2">
                    <span
                      class="avatar-initial rounded-circle bg-label-warning"><?= strtoupper(substr($row->full_name, 0, 1)) ?></span>
                  </div>
                  <span class="fw-semibold"><?= esc($row->full_name) ?></span>
                </div>
              </td>
              <td class="text-center">
                <span class="badge bg-label-secondary fs-6"><?= $row->total_penugasan ?></span>
              </td>
              <td class="text-center">
                <span class="badge bg-label-secondary"><?= $row->total_usulan ?></span>
              </td>
              <td class="text-center">
                <span class="badge bg-label-info"><?= $row->asesor_kecukupan ?></span>
              </td>
              <td class="text-center">
                <span class="badge bg-label-primary"><?= $row->asesor_lapangan ?></span>
              </td>
              <td class="text-center">
                <span class="badge bg-label-success"><?= $row->sudah_dinilai ?></span>
              </td>
              <td class="text-center">
                <?php if ($row->belum_dinilai > 0): ?>
                  <span class="badge bg-danger"><?= $row->belum_dinilai ?></span>
                <?php else: ?>
                  <span class="badge bg-label-success">0</span>
                <?php endif; ?>
              </td>
              <td>
                <div class="d-flex align-items-center gap-2">
                  <div class="progress flex-grow-1" style="height:8px;">
                    <div class="progress-bar bg-<?= $barColor ?>" role="progressbar" style="width:<?= $pct ?>%"
                      aria-valuenow="<?= $pct ?>" aria-valuemin="0" aria-valuemax="100">
                    </div>
                  </div>
                  <small class="fw-semibold text-<?= $barColor ?>"><?= $pct ?>%</small>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<?= $this->endSection() ?>