<?= $this->extend('supervisor/template') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col">
      <h4 class="mb-1">Data Usulan</h4>
    </div>
    <div class="col-md-auto">
      <a href="<?= site_url('supervisor/usulan/download')?>" class="btn btn-primary btn-sm"><i class="icon-base ti tabler-file-type-xls"></i>Download</a>
    </div>
  </div>
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
                <div class="col-md-4">
                    <label for="statuslayanan" class="form-label">Status</label>
                    <select id="statuslayanan" name="statuslayanan" class="form-select">
                        <option value="">Semua</option>
                          <option value="1">Dikirim</option>
                          <option value="2">Disposisi ke Verifikator</option>
                          <option value="3">Proses Verifikasi</option>
                          <option value="4">Proses Penilaian</option>
                          <option value="5">Proses Penilaian Asesor</option>
                          <option value="6">Penilaian Selesai</option>
                          <option value="7">Proses RKMA</option>
                          <option value="8">KMA Telah Terbit</option>
                          <option value="9">Selesai</option>
                          <option value="20">Selesai</option>
                          <option value="21">Dikembalikan Ke Pengusul</option>
                    </select>
                </div>
            </form>
          </div>
        </div>

<div class="card">
    <div class="card-body table-responsive">
        <table class="table table-bordered" id="datatables">
            <thead>
                <tr>
                    <th>Tanggal Usul</th>
                    <th>Nomor Surat</th>
                    <th>Nama Lembaga</th>
                    <th>Layanan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>

        </table>
    </div>
</div>
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
        ]
    });

    $('#layanan').change(function(event) {
        table.ajax.reload();
    });

    $('#statuslayanan').change(function(event) {
        table.ajax.reload();
    });
</script>
<?= $this->endSection() ?>