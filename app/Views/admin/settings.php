<?= $this->extend('admin/template') ?>
<?= $this->section('content') ?>
<div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Pengaturan Umum</h5>
                      <small class="text-body-secondary float-end">-</small>
                    </div>
                    <div class="card-body">
                      <form action="<?= site_url('admin/settings/update')?>" method="post">
                        <div class="row mb-6">
                          <label class="col-sm-2 col-form-label" for="app-name">Nama Aplikasi</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="app-name" name="app_name" value="<?= setting('App.siteName')?>"/>
                          </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
<?= $this->endSection() ?>