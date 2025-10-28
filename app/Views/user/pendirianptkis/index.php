<?= $this->extend('user/template') ?>
<?= $this->section('content') ?>
<h4 class="text-center mb-1">
  Pendirian PTKIS
</h4>
<p class="text-center mb-12">
  Pengajuan usulan Pendirian PTKIS. Silahkan klik tombol "Buat Usulan" untuk memulai.
</p>
<div class="card border border-primary">
  <div class="card-header border-bottom d-flex justify-content-between align-items-center">
  <h5 class="card-title m-0 me-2">Data Usulan</h5>
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#onboardImageModal">Buat Usulan</button>
</div>
  <div class="justify-content-between dt-layout-table">
    <table class="table table-bordered">
      <thead class="text-bg-warning">
        <tr>
          <th>No Surat</th>
          <th>Tanggal Usul</th>
          <th>Perihal</th>
          <th>Nama PTKIS</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($usulans)): ?>
          <tr>
            <td colspan="6" class="text-center">Tidak ada data usulan</td>
          </tr>
        <?php else: ?>
          <?php foreach ($usulans as $usulan): ?>
            <tr>
              <td><?= $usulan->nomor_surat ?></td>
              <td><?= $usulan->created_at ?></td>
              <td><?= $usulan->perihal ?></td>
              <td><?= $usulan->nama_lembaga ?></td>
              <td><?= usul_status($usulan->status) ?></td>
              <td>
                <?php if($usulan->status == 0): ?>
                  <a href="<?= site_url('layanan/pendirianptkis/prodi/'.encrypt($usulan->id)) ?>" class="btn btn-sm btn-warning">Prodi</a>
                  <a href="<?= site_url('layanan/pendirianptkis/detail/'.encrypt($usulan->id)) ?>" class="btn btn-sm btn-info">Detail</a>
                  <a href="javascript:void(0)" class="btn btn-sm btn-danger" onclick="deleteUsulan('<?= encrypt($usulan->id) ?>')">Delete</a>
                  <?php else:?>
                    <a href="<?= site_url('layanan/pendirianptkis/detail/'.encrypt($usulan->id)) ?>" class="btn btn-sm btn-info">Detail</a>
                    <a href="javascript:void(0)" class="btn btn-sm btn-warning" onclick="log('<?= encrypt($usulan->id) ?>')">Log</a>
                <?php endif;?>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>

    </table>
  </div>

</div>

<div class="modal-onboarding modal fade animate__animated" id="onboardImageModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content text-center">
                                <div class="modal-header border-0">
                                  <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-0">
                                  <div class="onboarding-content mb-0">
                                    <h4 class="onboarding-title text-body">Buat Usulan</h4>
                                    <div class="onboarding-info">
                                      In this example you can see a form where you can request some additional
                                      information from the customer when they land on the app page.
                                    </div>
                                    <form action="<?= site_url('layanan/pendirianptkis/create') ?>" method="post" enctype="multipart/form-data" id="usulform">
                                      <div class="row mb-6">
                                        <label class="col-sm-4 col-form-label" for="nomor_surat">Nomor Surat</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" id="nomor_surat" name="nomor_surat">
                                        </div>
                                      </div>
                                      <div class="row mb-6">
                                        <label class="col-sm-4 col-form-label" for="perihal">Perihal</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" id="perihal" name="perihal">
                                        </div>
                                      </div>
                                      <div class="row mb-6">
                                        <label class="col-sm-4 col-form-label" for="nama_lembaga">Nama Lembaga</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" id="nama_lembaga" name="nama_lembaga">
                                        </div>
                                      </div>
                                      <!-- <div class="row mb-6">
                                        <label class="col-sm-4 col-form-label" for="surat_pengantar">Surat Pengantar</label>
                                        <div class="col-sm-8">
                                          <input type="file" class="form-control" id="surat_pengantar" name="surat_pengantar">
                                          <p>Lampiran surat pengantar dalam bentuk pdf</p>
                                        </div>
                                      </div> -->
                                    </form>
                                  </div>
                                </div>
                                <div class="modal-footer border-0">
                                  <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                    Tutup
                                  </button>
                                  <button type="button" class="btn btn-primary" onclick="document.getElementById('usulform').submit();">Simpan</button>
                                </div>
                              </div>
                            </div>
                          </div>
<?= $this->endSection() ?>