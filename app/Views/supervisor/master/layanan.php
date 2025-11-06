<?= $this->extend('supervisor/template') ?>
<?= $this->section('content') ?>
<div class="card">
            <div class="card-header header-elements">
                <h5 class="">Data Layanan</h5>

                <div class="card-header-elements ms-auto">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#layananModal">Tambah Layanan</button>
                </div>
          </div>
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
                <?php foreach($layanan as $row): ?>
                <tr>
                  <td><?= $row->layanan ?></td>
                  <td><?= $row->keterangan ?></td>
                  <td><?= $row->is_active == 1 ? 'Aktif' : 'Tidak Aktif' ?></td>
                  <td>
                    <a href="<?= site_url('supervisor/master/layanan/delete/'. $row->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Layanan akan dihapus?')">Delete</a>
                    <a href="<?= site_url('supervisor/master/layanan/dokumen/'. $row->id) ?>" class="btn btn-sm btn-success">Dokumen</a>
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

<div class="modal fade" id="layananModal" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
    <form class="modal-content" method="POST" action="<?= site_url('supervisor/master/layanan/save') ?>">
        <div class="modal-header">
        <h5 class="modal-title" id="backDropModalTitle">Form Layanan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col mb-4">
                <label for="layanan" class="form-label">Nama Layanan</label>
                <input type="text" id="layanan" name="layanan" class="form-control" placeholder="Masukkan Nama Layanan" required />
                </div>
            </div>
            <div class="row">
                <div class="col mb-4">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Masukkan Keterangan"></textarea>
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