<?= $this->extend('supervisor/template') ?>
<?= $this->section('content') ?>
<div class="card">
  <div class="card-header header-elements d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center">
      <a href="<?= site_url('supervisor/master/layanan') ?>" class="btn btn-icon btn-outline-secondary me-2 waves-effect" title="Kembali ke Data Layanan">
        <i class="ti tabler-arrow-left"></i>
      </a>
      <h5 class="mb-0">Dokumen Layanan <?= esc($layanan->layanan) ?></h5>
    </div>

    <div class="card-header-elements">
      <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#dokumenModal" onclick="resetForm()">
        <i class="ti tabler-plus me-1"></i> Tambah Dokumen
      </button>
    </div>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="tableDokumen" class="datatable display table table-bordered table-striped dt-responsive fonttab" style="width:100%">
        <thead>
          <tr>
            <th style="width: 5%;">No</th>
            <th>Nama Dokumen</th>
            <th>Keterangan</th>
            <th style="width: 12%;">Wajib</th>
            <th style="width: 18%;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach ($dokumens as $row): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td class="fw-semibold"><?= esc($row->dokumen) ?></td>
              <td><?= !empty($row->keterangan ?? $row->deskripsi) ? esc($row->keterangan ?? $row->deskripsi) : '<span class="text-muted fst-italic">-</span>' ?></td>
              <td>
                <?php if ($row->is_wajib == 1): ?>
                  <span class="badge bg-label-danger"><i class="ti tabler-alert-circle me-1"></i>Wajib</span>
                <?php else: ?>
                  <span class="badge bg-label-secondary"><i class="ti tabler-info-circle me-1"></i>Opsional</span>
                <?php endif; ?>
              </td>
              <td>
                <div class="d-flex gap-1">
                  <button type="button" 
                    class="btn btn-sm btn-warning waves-effect btn-edit" 
                    data-id="<?= $row->id ?>" 
                    data-dokumen="<?= esc($row->dokumen) ?>" 
                    data-keterangan="<?= esc($row->keterangan ?? $row->deskripsi ?? '') ?>" 
                    data-is_wajib="<?= $row->is_wajib ?>">
                    <i class="ti tabler-pencil me-1"></i> Edit
                  </button>
                  <a href="<?= site_url('supervisor/master/layanan/dokumen/delete/' . $row->id) ?>"
                    class="btn btn-sm btn-danger waves-effect" 
                    onclick="return confirm('Apakah Anda yakin ingin menghapus dokumen ini?')">
                    <i class="ti tabler-trash me-1"></i> Delete
                  </a>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Nama Dokumen</th>
            <th>Keterangan</th>
            <th>Wajib</th>
            <th>Aksi</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>

<div class="modal fade" id="dokumenModal" data-bs-backdrop="static" tabindex="-1">
  <div class="modal-dialog">
    <form class="modal-content" method="POST" action="<?= site_url('supervisor/master/layanan/dokumen/save') ?>">
      <input type="hidden" name="id" id="dokumen_id" value="">
      <input type="hidden" name="layanan_id" value="<?= $layanan->id ?>">

      <div class="modal-header">
        <h5 class="modal-title" id="dokumenModalTitle">Form Dokumen</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col mb-3">
            <label for="dokumen" class="form-label">Nama Dokumen <span class="text-danger">*</span></label>
            <input type="text" id="dokumen" name="dokumen" class="form-control" placeholder="Masukkan Nama Dokumen" required />
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control" rows="3" placeholder="Masukkan Keterangan"></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="is_wajib" class="form-label">Sifat Dokumen <span class="text-danger">*</span></label>
            <select name="is_wajib" id="is_wajib" class="form-select" required>
              <option value="1">Wajib</option>
              <option value="0">Opsional / Tidak Wajib</option>
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-label-secondary waves-effect" data-bs-dismiss="modal">
          Tutup
        </button>
        <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
      </div>
    </form>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script type="text/javascript">
  function resetForm() {
    $('#dokumenModalTitle').text('Tambah Dokumen');
    $('#dokumen_id').val('');
    $('#dokumen').val('');
    $('#keterangan').val('');
    $('#is_wajib').val('1');
  }

  $(document).ready(function () {
    $(document).on('click', '.btn-edit', function () {
      var id = $(this).data('id');
      var dokumen = $(this).data('dokumen');
      var keterangan = $(this).data('keterangan');
      var is_wajib = $(this).data('is_wajib');

      $('#dokumenModalTitle').text('Edit Dokumen');
      $('#dokumen_id').val(id);
      $('#dokumen').val(dokumen);
      $('#keterangan').val(keterangan);
      $('#is_wajib').val(is_wajib);

      var modalEl = document.getElementById('dokumenModal');
      var modalInstance = bootstrap.Modal.getInstance(modalEl);
      if (!modalInstance) {
        modalInstance = new bootstrap.Modal(modalEl);
      }
      modalInstance.show();
    });
  });
</script>
<?= $this->endSection() ?>