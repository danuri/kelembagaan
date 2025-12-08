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
                    <select class="form-control" id="layanan">
                        <option value=""> Filter Layanan </option>
                        <option value="PS">Pendirian Swasta</option>
                        <option value="PN">Pendirian Negeri</option>
                        <option value="GN">Penegerian</option>
                        <option value="ALS">Perubahan Nama</option>
                        <option value="ABS">Alih Bentuk Swasta</option>
                        <option value="ABN">Alih Bentuk Negeri</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="statuslayanan" class="form-label">Status</label>
                    <select class="form-control" id="statuslayanan">
                        <option value="">= Pilih Status =</option>
                        <option value="0" selected=""><span class="badge badge-warning"> Belum Aktif</span></option>
                        <option value="1"><span class="badge badge-success"> Aktif</span></option>
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
                    <th>Layanan</th>
                    <th>Tanggal Usul</th>
                    <th>Nomor Surat</th>
                    <th>Nama Lembaga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>

        </table>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title" id="">Detail</h4>
        <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="loadform">
            <p>Loading...</p>
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
          url: '<?= site_url('supervisor/arsip/getdata')?>',
            data: function (d) {
                d.layanan = $('#layanan').val(),
                d.status = $('#statuslayanan').val();
            }
        },
        columns: [
            {data: 'jenis_layanan'},
            {data: 'nama_lembaga_lama'},
            {data: 'kategori'},
            {data: 'jenjang'},
            {data: 'is_active'},
            {data: 'action', orderable: false}
        ]
    });

    $('#layanan').change(function(event) {
        table.ajax.reload();
    });

    $('#statuslayanan').change(function(event) {
        table.ajax.reload();
    });

    function detail(email,layanan){
        $('#loadform').html('<p>Loading...</p>');
        $('.bd-example-modal-lg').modal('show');
        $.ajax({
            url: '<?= site_url('supervisor/arsip/detail') ?>',
            type: 'POST',
            data: {email:email, layanan:layanan},
            dataType: 'html',
        })
        .done(function(data) {
            $('#loadform').html(data);
        })
        .fail(function() {
            $('#loadform').html('<p>Error loading form</p>');
        });
    }
</script>
<?= $this->endSection() ?>