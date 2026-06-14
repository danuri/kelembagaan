<?= $this->extend('asesor/template') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
  <div class="d-flex flex-column justify-content-center">
    <div class="d-flex align-items-center gap-2 mb-1">
      <div style="width: 4px; height: 28px; background: linear-gradient(180deg, #696cff, #a3acff); border-radius: 4px;"></div>
      <h4 class="mb-0 fw-bold" style="letter-spacing: -0.02em;">Data Penilaian</h4>
    </div>
    <p class="text-muted mb-0 ms-3" style="font-size: 0.875rem;">Kelola dan lakukan penilaian usulan layanan</p>
  </div>
</div>

<!-- Filter Card -->
<div class="card mb-5" style="border: none; border-radius: 14px; overflow: hidden;">
  <div class="card-body p-4">
    <div class="row align-items-end g-4">
      <div class="col-md-4">
        <label for="layanan" class="form-label fw-semibold" style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.06em; color: #566a7f;">
          <i class="ti tabler-filter me-1" style="color: #696cff;"></i>Jenis Layanan
        </label>
        <select id="layanan" name="layanan" class="form-select" style="border-radius: 10px; border-color: #e9ecef; padding: 0.55rem 1rem;">
          <option value="">Semua Layanan</option>
          <?php foreach ($layanan as $row): ?>
            <option value="<?= $row->id ?>"><?= $row->layanan ?></option>
          <?php endforeach; ?>
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
          <th style="padding: 14px 20px; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">Nama Lembaga</th>
          <th style="padding: 14px 20px; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">Tanggal Asesmen</th>
          <th style="padding: 14px 20px; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">Skor Akhir</th>
          <th style="padding: 14px 20px; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">Lampiran</th>
          <th style="padding: 14px 20px; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">Status</th>
          <th style="padding: 14px 20px; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">Jenis</th>
          <th style="padding: 14px 20px; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; color: #8c97a7; border: none;">Aksi</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
</div>

<!-- Detail Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="border: none; border-radius: 16px; overflow: hidden;">
      <div id="loader">
        <div class="sk-swing sk-primary">
          <div class="sk-swing-dot"></div>
          <div class="sk-swing-dot"></div>
        </div>
      </div>
      <div class="modal-header py-3 px-4" style="background: linear-gradient(135deg, #696cff 0%, #8592ff 100%); border: none;">
        <h5 class="modal-title text-white fw-semibold" id="exampleModalLabel1">
          <i class="ti tabler-building-bank me-2"></i>Detail Lembaga
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-4" id="detailusulan">
      </div>
    </div>
  </div>
</div>

<!-- Input Modal -->
<div class="modal fade" id="inputModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="border: none; border-radius: 16px; overflow: hidden;">
      <div id="loader">
        <div class="sk-swing sk-primary">
          <div class="sk-swing-dot"></div>
          <div class="sk-swing-dot"></div>
        </div>
      </div>
      <div class="modal-header py-3 px-4" style="background: linear-gradient(135deg, #696cff 0%, #8592ff 100%); border: none;">
        <h5 class="modal-title text-white fw-semibold" id="exampleModalLabel1">
          <i class="ti tabler-pencil me-2"></i>Input Nilai
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-4">
        <form action="">
          <div class="mb-4">
            <label class="form-label fw-semibold" style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.06em; color: #566a7f;">Skor</label>
            <input type="text" class="form-control" style="border-radius: 10px; border-color: #e9ecef;" placeholder="Masukkan skor penilaian">
          </div>
          <div class="mb-4">
            <label class="form-label fw-semibold" style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.06em; color: #566a7f;">File Lampiran Penilaian</label>
            <input type="file" class="form-control" style="border-radius: 10px; border-color: #e9ecef;">
          </div>
        </form>
      </div>
    </div>
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
      url: '<?= site_url('asesor/penilaian/getdata') ?>',
      data: function (d) {
        d.layanan = $('#layanan').val()
      }
    },
    columns: [
      { data: 'nama_lembaga' },
      { data: 'mulai_tanggal' },
      { data: 'skor' },
      { data: 'file_hasil' },
      { data: 'status' },
      { data: 'jenis' },
      { data: 'action', orderable: false }
    ],
    language: {
      processing: '<div class="d-flex justify-content-center"><div class="spinner-border text-primary spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div></div>',
      emptyTable: '<div class="text-center py-4 text-muted"><i class="ti tabler-folder-off" style="font-size: 2rem;"></i><p class="mt-2 mb-0">Belum ada data</p></div>',
    },
    dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
  });

  $('#layanan').change(function (event) {
    table.ajax.reload();
  });

  function detail(id) {
    $('#detailusulan').html('<div class="text-center py-5"><div class="spinner-border text-primary" role="status"></div><p class="text-muted mt-3">Memuat data...</p></div>');
    $('#detailusulan').load('<?= site_url('asesor/penilaian/preview') ?>/' + id);
    $('#detailModal').modal('show');
  }

  function input() {
    $('#inputModal').modal('show');
  }
</script>
<?= $this->endSection() ?>