<?= $this->extend('admin/template') ?>
<?= $this->section('content') ?>
<div class="card">
<div class="card-header d-flex align-items-center justify-content-between">
    <div class="card-title mb-0">
    <h5 class="m-0 me-2">Data Pengguna</h5>
    </div>
    <button class="btn btn-primary">Tambah Pengguna</button>
</div>
<div class="">
    <table class="table">
    <thead>
        <tr>
        <th>Username</th>
        <th>Email</th>
        <th>Identities</th>
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
            <?php if ($user->identities): ?>
                <?php foreach ($user->identities as $identity): ?>
                    <span class="badge bg-label-primary me-1"><?= esc($identity->provider) ?></span>
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
                            <li><a class="dropdown-item waves-effect" href="<?= site_url('admin/users/edit/'.$user->id)?>">Edit</a></li>
                            <?php if ($user->active): ?>
                            <li><a class="dropdown-item waves-effect" href="<?= site_url('admin/users/deactivate/'.$user->id)?>" onclick="return confirm('Pengguna akan dinonaktifkan?')">Non Aktif</a></li>
                            <?php else: ?>
                            <li><a class="dropdown-item waves-effect" href="<?= site_url('admin/users/activate/'.$user->id)?>" onclick="return confirm('Pengguna akan diaktifkan?')">Aktif</a></li>
                            <?php endif; ?>
                            <li>
                              <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item waves-effect text-danger" href="<?= site_url('admin/users/delete/' . $user->id) ?>" onclick="return confirm('Pengguna akan dihapus?')">Delete</a></li>
                          </ul>
                        </div>
        </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
</div>
</div>
<?= $this->endSection() ?>