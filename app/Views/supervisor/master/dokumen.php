<?= $this->extend('supervisor/template') ?>
<?= $this->section('content') ?>
<div class="card">
            <div class="card-header header-elements">
                <h5 class="">Dokumen Layanan <?= $layanan->layanan?></h5>

                <div class="card-header-elements ms-auto">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#dokumenModal">Tambah Dokumen</button>
                </div>
          </div>
          <div class="card-body">
            <table id="layanan" class="datatable display table table-bordered dt-responsive fonttab" style="width:100%">
              <thead>
                <tr>
                  <th>Layanan</th>
                  <th>Keterangan</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($dokumens as $row): ?>
                <tr>
                  <td><?= $row->dokumen ?></td>
                  <td><?= $row->deskripsi ?></td>
                  <td><?= $row->is_wajib == 1 ? 'Ya' : 'Tidak' ?></td>
                  <td>
                    <a href="<?= site_url('supervisor/master/layanan/dokumen/delete/'. $row->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Dokumen akan dihapus?')">Delete</a>
                    <!-- <a href="<?= site_url('admin/master/layanan/dokumen/'. $row->id) ?>" class="btn btn-sm btn-success">Dokumen</a> -->
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Layanan</th>
                  <th>Keterangan</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>

<div class="modal fade" id="dokumenModal" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
    <form class="modal-content" method="POST" action="<?= site_url('admin/master/layanan/dokumen/save') ?>">
        <div class="modal-header">
        <h5 class="modal-title" id="backDropModalTitle">Form Dokumen</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col mb-4">
                <label for="dokumen" class="form-label">Nama Dokumen</label>
                <input type="text" id="dokumen" name="dokumen" class="form-control" placeholder="Masukkan Nama Dokumen" required />
                <input type="hidden" name="layanan_id" value="<?= $layanan->id ?>">
                </div>
            </div>
            <div class="row">
                <div class="col mb-4">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Masukkan Keterangan"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col mb-4">
                <label for="is_wajib" class="form-label">Wajib</label>
                <select name="is_wajib" id="is_wajib" class="form-select" required>
                    <option value="1">Ya</option>
                    <option value="0">Tidak</option>
                </select>
                </div>
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
            Close
        </button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script type="text/javascript">
</script>
<?= $this->endSection() ?>