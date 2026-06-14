<?= $this->extend('supervisor/template') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
  <div class="d-flex flex-column justify-content-center">
    <div class="d-flex align-items-center gap-2 mb-1">
      <div style="width: 4px; height: 28px; background: linear-gradient(180deg, #696cff, #a3acff); border-radius: 4px;"></div>
      <h4 class="mb-0 fw-bold" style="letter-spacing: -0.02em;">Data Usulan</h4>
    </div>
    <p class="text-muted mb-0 ms-3" style="font-size: 0.875rem;">Kelola seluruh usulan layanan kelembagaan</p>
  </div>
  <div class="d-flex align-content-center flex-wrap gap-3">
    <a href="<?= site_url('supervisor/usulan/download')?>" class="btn btn-primary waves-effect waves-light" style="border-radius: 10px; padding: 8px 20px; box-shadow: 0 4px 12px rgba(105,108,255,0.3);">
      <i class="icon-base ti tabler-file-type-xls me-1"></i>Download Excel
    </a>
  </div>
</div>

<!-- Filter Card -->
<div class="card mb-5" style="border: none; border-radius: 14px;">
  <div class="card-body p-4">
    <div class="row align-items-end g-4">
      <div class="col-md-4">
        <label for="layanan" class="form-label fw-semibold" style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.06em; color: #566a7f;">
          <i class="ti tabler-filter me-1" style="color: #696cff;"></i>Jenis Layanan
        </label>
        <select id="layanan" name="layanan" class="form-select" style="border-radius: 10px; border-color: #e9ecef; padding: 0.55rem 1rem;">
          <option value="">Semua Layanan</option>
          <?php foreach($layanan as $row): ?>
            <option value="<?= $row->id?>"><?= $row->layanan?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="col-md-4">
        <label for="statuslayanan" class="form-label fw-semibold" style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.06em; color: #566a7f;">
          <i class="ti tabler-status-change me-1" style="color: #696cff;"></i>Status
        </label>
        <select id="statuslayanan" name="statuslayanan" class="form-select" style="border-radius: 10px; border-color: #e9ecef; padding: 0.55rem 1rem;">
          <option value="">Semua</option>
          <option value="1">Dikirim</option>
          <option value="2">Disposisi ke Verifikator</option>
          <option value="3">Proses Verifikasi</option>
          <option value="31">Proses Verifikasi Ulang</option>
          <option value="4">Verifikasi Selesai</option>
          <option value="5">Penilaian Asesor</option>
          <option value="7">Proses RKMA</option>
          <option value="8">KMA Telah Terbit</option>
          <option value="9">Selesai</option>
          <option value="20">Selesai</option>
          <option value="21">Dikembalikan Ke Pengusul</option>
        </select>
      </div>
    </div>
  </div>
</div>

<!-- Data Table Card -->
<div class="card" style="border: none; border-radius: 14px; overflow: hidden;">
  <div class="card-header py-3 px-4 d-flex align-items-center justify-content-between" style="background: transparent; border-bottom: 1px solid #f0f2f5;">
    <h6 class="mb-0 fw-semibold" style="color: #566a7f;">
      <i class="ti tabler-list-details me-2" style="color: #696cff;"></i>Daftar Usulan
    </h6>
  </div>
  <div class="table-responsive">
    <table class="table table-hover mb-0" id="datatables" style="border-collapse: separate; border-spacing: 0;">
      <thead>
        <tr style="background: #f8f9fb;">
          <th style="padding: 14px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">Tanggal Usul</th>
          <th style="padding: 14px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">Nomor Surat</th>
          <th style="padding: 14px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">Nama Lembaga</th>
          <th style="padding: 14px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">Layanan</th>
          <th style="padding: 14px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">Status</th>
          <th style="padding: 14px 20px; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">Aksi</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
</div>

<style>
  #datatables tbody tr {
    transition: all 0.2s ease;
  }
  #datatables tbody tr:hover {
    background-color: #f4f5fa !important;
  }
  #datatables tbody td {
    padding: 14px 20px;
    vertical-align: middle;
    border-bottom: 1px solid #f0f2f5;
    font-size: 0.875rem;
    color: #566a7f;
  }
</style>

<?= $this->endSection() ?>
<?= $this->section('scripts') ?>
<script>
    var table = $('#datatables').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: '<?= site_url('supervisor/usulan/getdata')?>',
            data: function (d) {
                d.layanan = $('#layanan').val(),
                d.status = $('#statuslayanan').val();
            }
        },
        columns: [
            {data: 'submit_at'},
            {data: 'nomor_surat'},
            {data: 'nama_lembaga'},
            {data: 'layanan_nama'},
            {data: 'status'},
            {data: 'action', orderable: false}
        ],
        language: {
            processing: '<div class="d-flex justify-content-center"><div class="spinner-border text-primary spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div></div>',
            emptyTable: '<div class="text-center py-4 text-muted"><i class="ti tabler-folder-off" style="font-size: 2rem;"></i><p class="mt-2 mb-0">Belum ada data</p></div>',
        },
        dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
    });

    $('#layanan').change(function(event) {
        table.ajax.reload();
    });

    $('#statuslayanan').change(function(event) {
        table.ajax.reload();
    });
</script>
<?= $this->endSection() ?>