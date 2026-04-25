<?= $this->extend('supervisor/template') ?>
<?= $this->section('content') ?>
<div class="card">
<div class="card-header d-flex align-items-center justify-content-between">
    <div class="card-title mb-0">
    <h5 class="m-0 me-2">Data Pengguna</h5>
    </div>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#onboardImageModal">Tambah Pengguna</button>
</div>
<?php if (session('error') !== null) : ?>
                    <div class="alert alert-danger" role="alert"><?= esc(session('error')) ?></div>
                <?php elseif (session('errors') !== null) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php if (is_array(session('errors'))) : ?>
                            <?php foreach (session('errors') as $error) : ?>
                                <?= esc($error) ?>
                                <br>
                            <?php endforeach ?>
                        <?php else : ?>
                            <?= esc(session('errors')) ?>
                        <?php endif ?>
                    </div>
                <?php endif ?>
<div class="">
    <table class="table datatable">
    <thead>
        <tr>
        <th>Username</th>
        <th>Email</th>
        <th>Grup</th>
        <th>Status</th>
        <th>Actions</th>
        </tr>
    </thead>
    <tbody class="table-border-bottom-0">
        <?php foreach ($users as $user): ?>
        <tr>
        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?= esc($user->username) ?></strong></td>
        <td><?= esc($user->email) ?></td>
        <td>
            <?php if ($user->getGroups()): ?>
                <?php foreach ($user->getGroups() as $group): ?>
                    <span class="badge bg-label-info me-1"><?= esc(ucfirst($group)) ?></span>
                <?php endforeach; ?>
            <?php endif; ?>
        </td>
        <td>
            <?php if ($user->active): ?>
                <span class="badge bg-label-success me-1">Active</span>
            <?php else: ?>
                <span class="badge bg-label-danger me-1">Inactive</span>
            <?php endif; ?>
        </td>
        <td>
        <div class="btn-group">
                          <button type="button" class="btn btn-primary btn-icon rounded-pill dropdown-toggle hide-arrow waves-effect waves-light text-light" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="icon-base ti tabler-dots-vertical"></i>
                          </button>
                          <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item waves-effect" href="<?= site_url('supervisor/users/edit/'.$user->id)?>">Edit</a></li>
                            <?php if ($user->active): ?>
                            <li><a class="dropdown-item waves-effect" href="<?= site_url('supervisor/users/deactivate/'.$user->id)?>" onclick="return confirm('Pengguna akan dinonaktifkan?')">Non Aktif</a></li>
                            <?php else: ?>
                            <li><a class="dropdown-item waves-effect" href="<?= site_url('supervisor/users/activate/'.$user->id)?>" onclick="return confirm('Pengguna akan diaktifkan?')">Aktif</a></li>
                            <?php endif; ?>
                            <li>
                              <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item waves-effect text-danger" href="<?= site_url('supervisor/users/delete/' . $user->id) ?>" onclick="return confirm('Pengguna akan dihapus?')">Delete</a></li>
                          </ul>
                        </div>
        </td>
        </tr>
        <?php endforeach; ?>
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
          <h4 class="onboarding-title text-body">Tambah Pengguna Baru</h4>
          <form action="<?= site_url('supervisor/users/create') ?>" method="post" id="usulform">
            <div class="row mb-6">
              <label class="col-sm-4 col-form-label" for="email">Email</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="email" name="email" required>
              </div>
            </div>
            <div class="row mb-6">
              <label class="col-sm-4 col-form-label" for="username">Username</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="username" name="username" required>
              </div>
            </div>
            <div class="row mb-6">
              <label class="col-sm-4 col-form-label" for="full_name">Nama</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="full_name" name="full_name" required>
              </div>
            </div>
            <div class="row mb-6">
              <label class="col-sm-4 col-form-label" for="phone">Nomor HP</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="phone" name="phone" required>
              </div>
            </div>
            <div class="row mb-6">
              <label class="col-sm-4 col-form-label" for="password">Password</label>
              <div class="col-sm-8">
                <input type="password" class="form-control" id="password" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required>
              </div>
            </div>
            <div class="row mb-6">
              <label class="col-sm-4 col-form-label" for="password_confirm">Ulangi Password</label>
              <div class="col-sm-8">
                <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required>
              </div>
            </div>
            <div class="row mb-6">
              <label class="col-sm-4 col-form-label" for="groups">Role</label>
              <div class="col-sm-8 text-start">
                <select name="groups[]" id="groups" class="form-select select2" multiple="multiple" data-placeholder="Pilih Role" required>
                  <?php foreach ($groups as $key => $group): ?>
                    <option value="<?= $key ?>"><?= $group['title'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
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