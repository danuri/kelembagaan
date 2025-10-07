<?= $this->extend('supervisor/template') ?>
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
                <div class="col-md-4">
                    <label for="statuslayanan" class="form-label">Status</label>
                    <select id="statuslayanan" name="statuslayanan" class="form-select">
                        <option value="">Semua</option>
                          <option value="11">Dikirim ke Ditjen Pendis</option>
                          <option value="12">Diterima Ditjen Pendis</option>
                          <option value="13">Disetujui & Proses Surat Rekomendasi</option>
                          <option value="14">Proses TTE Surat Rekomendasi</option>
                          <option value="20">Selesai</option>
                          <option value="21">Dikembalikan</option>
                    </select>
                </div>
            </form>
          </div>
        </div>

<div class="card">
    <div class="card-body">
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
</script>
<?= $this->endSection() ?>