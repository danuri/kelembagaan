<?= $this->extend('user/template') ?>
<?= $this->section('content') ?>

<h4 class="mb-1">
  Daftar Prodi
</h4>
<div class="card shadow-none bg-label-success mb-3">
    <div class="card-body">
        <div class="row g-6">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Nama Yayasan</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $detail->yayasan_nama?></div>
                </div>
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Alamat Yayasan</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $detail->yayasan_alamat?></div>
                </div>
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>No. SK</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $detail->yayasan_nosk?></div>
                </div>
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Tanggal SK</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $detail->yayasan_tglsk?></div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Jenis Layanan</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $usulan->layanan_nama?></div>
                </div>
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Status Usulan</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= usul_status($usulan->status)?></div>
                </div>
                <div style="display: table-row;">
                    <div style="display: table-cell; padding-right: 0.5rem;">
                        <h6>Keterangan BTS/TMS</h6>
                    </div>
                    <div style="display: table-cell; padding-right: 0.5rem;">:</div>
                    <div style="display: table-cell; padding-right: 0.5rem;"><?= $usulan->keterangan?></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card border border-primary">
  <div class="card-header border-bottom d-flex align-items-center justify-content-between">
    <h5 class="mb-0">Daftar Program Studi</h5>
    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambahProdiModal">
      <i class="bx bx-plus me-1"></i> Tambah Prodi
    </button>
    </div>
    <div class="justify-content-between dt-layout-table">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Nama Program Studi</th>
                <th>Jenjang</th>
                <th width="30%">Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php if (empty($prodi)): ?>
                <tr>
                <td colspan="5" class="text-center">Tidak ada data program studi</td>
                </tr>
            <?php else: ?>
                <?php foreach ($prodi as $p): ?>
                <tr>
                    <td><?= $p->nama_prodi ?></td>
                    <td><?= $p->jenjang ?></td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="javascript:void(0);" onclick="showdoc(6,'<?= encrypt($p->id) ?>')"><i class="icon-base ti tabler-checklist me-1"></i> Dokumen</a>
                    <button class="btn btn-sm btn-danger" onclick="deleteProdi('<?= encrypt($p->id) ?>')"><i class="icon-base ti tabler-trash me-1"></i> Hapus</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<!-- Modal Tambah Prodi -->
<div class="modal fade" id="tambahProdiModal" tabindex="-1" aria-labelledby="tambahProdiModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahProdiModalLabel">Tambah Program Studi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="tambahProdiForm" method="post" action="<?= site_url('layanan/pendirianptkis/saveprodi') ?>">
          <div class="mb-3">
            <label for="namaProdi" class="form-label">Nama Program Studi</label>
            <input type="text" class="form-control" id="namaProdi" name="nama_prodi" required>
          </div>
            <div class="mb-3">
                <label for="jenjangProdi" class="form-label">Jenjang</label>
                <select class="form-select" id="jenjangProdi" name="jenjang" required>
                    <option value="">Pilih Jenjang</option>
                    <!-- <option value="D3">D3</option> -->
                    <option value="S1">S1</option>
                    <!-- <option value="S2">S2</option>
                    <option value="S3">S3</option> -->
                </select>
            </div>
            <div class="mb-3">
                <label for="statusProdi" class="form-label">Status</label>
                <select class="form-select" id="statusProdi" name="status_prodi" required>
                    <option value="">Pilih Status</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
            </div>
            <input type="hidden" name="usul_id" value="<?= $usulan->id ?>">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div id="preview" class="modal fade" data-bs-backdrop="static" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body" id="object">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-end" tabindex="-1" id="canvasDoc" aria-labelledby="canvasDocLabel">
    <div class="offcanvas-header">
        <h5 id="canvasDocLabel" class="offcanvas-title">Dokumen Pendukung</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body my-auto mx-0 flex-grow-0">
        <div id="lisdoc"></div>
        <button
            type="button"
            class="btn btn-label-secondary d-grid w-100"
            data-bs-dismiss="offcanvas">
            Tutup
        </button>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('scripts');?>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://malsup.github.io/jquery.form.js" charset="utf-8"></script>
<script>
    
function preview(berkas) {
  $('#object').html('<object data="'+berkas+'" type="application/pdf" width="100%" style="height: 80vh;" id="object">'+
                      '<p>Browser tidak mendukung!</p>'+
                    '</object>');
  $('#preview').modal('show');
}

function showdoc(layanan, usulid) {
        $('#lisdoc').html('<div class="text-center"><i class="bx bx-loader bx-spin font-size-24"></i></div>');
        $('#lisdoc').load('<?= site_url('dokumen/embed/') ?>' + layanan + '/' + usulid, function() {
            $('#canvasDoc').offcanvas('show');
        });
    }

    function uploadfile(id) {
        $('#form' + id).ajaxSubmit({
            // target: '#output'+id,
            beforeSubmit: function(a, f, o) {
                alert('Mengunggah');
            },
            success: function(data) {
                if (data.status == 'error') {
                    alert(data.message);
                } else {
                    alert(data.message);

                    $('#output' + id).html(data.message);

                    if ($("table:contains('Belum Diunggah')").length == 0) {
                        $('#reviewbutton').removeAttr('disabled');
                    }
                }
            }
        });
    }
</script>
<?= $this->endSection() ?>