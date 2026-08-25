<?= $this->extend('hukum/template') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
  <div class="d-flex flex-column justify-content-center">
    <div class="d-flex align-items-center gap-2 mb-1">
      <div style="width: 4px; height: 28px; background: linear-gradient(180deg, #696cff, #a3acff); border-radius: 4px;"></div>
      <h4 class="mb-0 fw-bold" style="letter-spacing: -0.02em;">Profil Pengguna</h4>
    </div>
    <p class="text-muted mb-0 ms-3" style="font-size: 0.875rem;">Kelola informasi profil akun Biro Hukum dan kata sandi</p>
  </div>
</div>

<?php if (session('message')) : ?>
  <div class="alert alert-success alert-dismissible d-flex align-items-center" role="alert">
    <i class="ti tabler-check me-2"></i>
    <div><?= esc(session('message')) ?></div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>

<?php if (session('error')) : ?>
  <div class="alert alert-danger alert-dismissible d-flex align-items-center" role="alert">
    <i class="ti tabler-alert-circle me-2"></i>
    <div><?= esc(session('error')) ?></div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>

<div class="row g-6">
  <!-- Update Profile Card -->
  <div class="col-lg-6">
    <div class="card border-0 shadow-sm" style="border-radius: 16px;">
      <div class="card-header py-3 px-4 d-flex align-items-center" style="border-bottom: 1px solid #f0f2f5;">
        <div style="width: 36px; height: 36px; background: linear-gradient(135deg, #696cff, #8592ff); border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 12px;">
          <i class="ti tabler-user text-white" style="font-size: 1.1rem;"></i>
        </div>
        <h5 class="mb-0 fw-bold" style="color: #435971;">Informasi Profil</h5>
      </div>
      <div class="card-body p-4">
        <form method="POST" action="<?= site_url('hukum/profile/update') ?>">
          <div class="mb-4">
            <label class="form-label fw-semibold" for="username">Username</label>
            <div class="input-group">
              <span class="input-group-text"><i class="ti tabler-user"></i></span>
              <input type="text" class="form-control" id="username" value="<?= esc(auth()->user()->username); ?>" readonly style="background-color: #f8f9fa;">
            </div>
          </div>
          <div class="mb-4">
            <label class="form-label fw-semibold" for="full_name">Nama Lengkap</label>
            <div class="input-group">
              <span class="input-group-text"><i class="ti tabler-signature"></i></span>
              <input type="text" class="form-control" id="full_name" name="full_name" value="<?= esc(auth()->user()->full_name); ?>" required>
            </div>
          </div>
          <div class="mb-4">
            <label class="form-label fw-semibold" for="email">Email</label>
            <div class="input-group">
              <span class="input-group-text"><i class="ti tabler-mail"></i></span>
              <input type="email" id="email" class="form-control" value="<?= esc(auth()->user()->email); ?>" readonly style="background-color: #f8f9fa;">
            </div>
          </div>
          <div class="mb-4">
            <label class="form-label fw-semibold" for="phone">Nomor Telepon/HP</label>
            <div class="input-group">
              <span class="input-group-text"><i class="ti tabler-phone"></i></span>
              <input type="text" id="phone" name="phone" class="form-control" placeholder="08123456789" value="<?= esc(auth()->user()->phone); ?>">
            </div>
          </div>
          <button type="submit" class="btn btn-primary waves-effect waves-light" style="border-radius: 10px; padding: 8px 24px; box-shadow: 0 4px 12px rgba(105,108,255,0.3);">
            <i class="ti tabler-device-floppy me-1"></i> Simpan Perubahan
          </button>
        </form>
      </div>
    </div>
  </div>

  <!-- Change Password Card -->
  <div class="col-lg-6">
    <div class="card border-0 shadow-sm" style="border-radius: 16px;">
      <div class="card-header py-3 px-4 d-flex align-items-center" style="border-bottom: 1px solid #f0f2f5;">
        <div style="width: 36px; height: 36px; background: linear-gradient(135deg, #ffab00, #ffc753); border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 12px;">
          <i class="ti tabler-key text-white" style="font-size: 1.1rem;"></i>
        </div>
        <h5 class="mb-0 fw-bold" style="color: #435971;">Ubah Kata Sandi</h5>
      </div>
      <div class="card-body p-4">
        <form method="POST" action="<?= site_url('hukum/changepassword') ?>">
          <div class="mb-4">
            <label class="form-label fw-semibold" for="old_password">Password Lama</label>
            <div class="input-group">
              <span class="input-group-text"><i class="ti tabler-lock"></i></span>
              <input class="form-control" type="password" id="old_password" name="old_password" placeholder="············" required>
            </div>
          </div>
          <div class="mb-4">
            <label class="form-label fw-semibold" for="new_password">Password Baru</label>
            <div class="input-group">
              <span class="input-group-text"><i class="ti tabler-lock-check"></i></span>
              <input class="form-control" type="password" id="new_password" name="new_password" placeholder="············" required>
            </div>
            <small class="text-muted">Minimal 8 karakter.</small>
          </div>
          <div class="mb-4">
            <label class="form-label fw-semibold" for="confirm_password">Ulangi Password Baru</label>
            <div class="input-group">
              <span class="input-group-text"><i class="ti tabler-lock-check"></i></span>
              <input class="form-control" type="password" id="confirm_password" name="confirm_password" placeholder="············" required>
            </div>
          </div>
          <button type="submit" class="btn btn-warning waves-effect waves-light" style="border-radius: 10px; padding: 8px 24px; box-shadow: 0 4px 12px rgba(255,171,0,0.3);">
            <i class="ti tabler-key me-1"></i> Perbarui Password
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
