<?= $this->extend('supervisor/template') ?>
<?= $this->section('content') ?>
<div class="card mb-6">
  <h5 class="card-header">Edit Pengguna</h5>
  <form class="card-body" action="<?= site_url('supervisor/users/update/' . $user->id) ?>" method="POST">
    <h6>1. Account Details</h6>
    <div class="row g-6">
      <div class="col-md-6">
        <label class="form-label" for="multicol-username">Username</label>
        <input type="text" id="multicol-username" class="form-control" placeholder="" value="<?= $user->username; ?>"
          disabled />
      </div>
      <div class="col-md-6">
        <label class="form-label" for="multicol-email">Email</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="" value="<?= $user->email; ?>"
          disabled />
      </div>
      <div class="col-md-12 mt-4">
        <label class="form-label" for="multicol-groups">Grup Pengguna</label>
        <select id="multicol-groups" name="groups[]" class="form-select select2" multiple="multiple"
          data-placeholder="Pilih Grup Pengguna" required>
          <?php foreach ($groups as $key => $group): ?>
            <option value="<?= $key ?>" <?= $user->inGroup($key) ? 'selected' : '' ?>><?= $group['title'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    <hr class="my-6 mx-n6" />
    <h6>Ubah Password</h6>
    <div class="row g-6">

      <div class="col-md-6">
        <div class="form-password-toggle">
          <label class="form-label" for="multicol-password">Password</label>
          <div class="input-group input-group-merge">
            <input type="password" id="multicol-password" name="password" class="form-control"
              placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
              aria-describedby="multicol-password2" />
            <span class="input-group-text cursor-pointer" id="multicol-password2"><i
                class="icon-base ti tabler-eye-off"></i></span>
          </div>
        </div>
      </div>
    </div>

    <div class="pt-6">
      <button type="submit" class="btn btn-primary me-4">Simpan</button>
    </div>
  </form>
</div>
<?= $this->endSection() ?>
<?= $this->section('scripts') ?>
<script>
  $(document).ready(function () {
    $('#multicol-groups').select2({
      placeholder: 'Pilih Grup Pengguna',
      allowClear: true
    });
  });
</script>
<?= $this->endSection() ?>