<?= $this->extend('verifikator/template') ?>
<?= $this->section('content') ?>
<h4 class="mb-1">Data Usulan</h4>

<div class="card mb-3">
          <div class="card-body">
            <form action="javascript:void(0);" class="row g-3">
                <div class="col-md-4">
                    <label for="layanan" class="form-label">Jenis Layanan</label>
                    <select id="layanan" name="layanan" class="form-select">
                      <option value="">Semua Layanan</option>
                        <?php foreach($layanan as $row): ?>
                            <option value="<?= $row->id?>"><?= $row->layanan?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </form>
          </div>
        </div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-bordered" id="datatables">
            <thead>
                <tr>
                    <th>Nama Lembaga</th>
                    <th>Tanggal Asesmen</th>
                    <th>Skor Akhir</th>
                    <th>Lampiran</th>
                    <th>Status</th>
                    <th>Jenis</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>

        </table>
    </div>
</div>

<div class="modal fade" id="detailModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div id="loader">
        <div class="sk-swing sk-primary">
          <div class="sk-swing-dot"></div>
          <div class="sk-swing-dot"></div>
        </div>
      </div>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Detail Lembaga</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"></button>
      </div>
      <!-- <div class="modal-body"> -->
      <div class="modal-body" id="detailusulan">
        sss
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="inputModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">


    <div class="modal-content">
      <div id="loader">
        <div class="sk-swing sk-primary">
          <div class="sk-swing-dot"></div>
          <div class="sk-swing-dot"></div>
        </div>
      </div>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Input Nilai</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"></button>
      </div>
      <!-- <div class="modal-body"> -->
      <div class="modal-body">
        <form action="">
          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Skor</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="basic-default-name" placeholder="John Doe">
            </div>
          </div>
          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="basic-default-name">File Lampiran Penilaian</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" id="basic-default-name">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('scripts') ?>
<script>
    var table = $('#datatables').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: '<?= site_url('verifikator/penilaian/getdata')?>',
            data: function (d) {
                d.layanan = $('#layanan').val()
            }
        },
        columns: [
            {data: 'nama_lembaga'},
            {data: 'mulai_tanggal'},
            {data: 'skor'},
            {data: 'file_hasil'},
            {data: 'status'},
            {data: 'jenis'},
            {data: 'action', orderable: false}
        ]
    });

    $('#layanan').change(function(event) {
        table.ajax.reload();
    });

    function detail(id)
    {
        $('#detailusulan').html('Memuat data...');
        $('#detailusulan').load('penilaian/preview/'+id);
        $('#detailModal').modal('show');
    }
    
    function input()
    {
        $('#inputModal').modal('show');
    }
</script>
<?= $this->endSection() ?>