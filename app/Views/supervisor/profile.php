<?= $this->extend('supervisor/template') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Update Profil</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="<?= site_url('supervisor/profile/update')?>">
                <div class="mb-6">
                    <label class="form-label" for="basic-icon-default-fullname">Username</label>
                    <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="icon-base ti tabler-user"></i></span>
                    <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="John Doe" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" value="<?= auth()->user()->username; ?>" readonly>
                    </div>
                </div>
                <div class="mb-6">
                    <label class="form-label" for="full_name">Full Name</label>
                    <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="icon-base ti tabler-user"></i></span>
                    <input type="text" class="form-control" id="full_name" name="full_name" placeholder="John Doe" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" value="<?= auth()->user()->full_name; ?>">
                    </div>
                </div>
                <div class="mb-6">
                    <label class="form-label" for="basic-icon-default-email">Email</label>
                    <div class="input-group input-group-merge">
                    <span class="input-group-text"><i class="icon-base ti tabler-mail"></i></span>
                    <input type="email" id="basic-icon-default-email" class="form-control" placeholder="john.doe" aria-label="john.doe" aria-describedby="basic-icon-default-email2" value="<?= auth()->user()->email; ?>" readonly>
                    </div>
                    <div class="form-text">You can use letters, numbers &amp; periods</div>
                </div>
                <div class="mb-6">
                    <label class="form-label" for="phone">Phone No</label>
                    <div class="input-group input-group-merge">
                    <span id="basic-icon-default-phone2" class="input-group-text"><i class="icon-base ti tabler-phone"></i></span>
                    <input type="text" id="phone" name="phone" class="form-control phone-mask" placeholder="081310002000" aria-label="081310002000" aria-describedby="basic-icon-default-phone2" value="<?= auth()->user()->phone; ?>">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                </form>
            </div>
            </div>
    </div>
    <div class="col-6">
        <div class="card mb-6">
                    <h5 class="card-header">Change Password</h5>
                    <div class="card-body">
                      <form id="formChangePassword" method="GET" action="<?= site_url('supervisor/changepassword')?>" class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                        <div class="row gx-6">
                            <div class="mb-4 col-12 col-sm-12 form-password-toggle form-control-validation fv-plugins-icon-container">
                              <label class="form-label" for="old_password">Password Lama</label>
                              <div class="input-group input-group-merge has-validation">
                                <input class="form-control" type="password" id="old_password" name="old_password" placeholder="············">
                                <span class="input-group-text cursor-pointer"><i class="icon-base ti tabler-eye-off"></i></span>
                              </div><div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row gx-6">
                          <div class="mb-4 col-12 col-sm-6 form-password-toggle form-control-validation fv-plugins-icon-container">
                            <label class="form-label" for="new_password">Password Baru</label>
                            <div class="input-group input-group-merge has-validation">
                              <input class="form-control" type="password" id="new_password" name="new_password" placeholder="············">
                              <span class="input-group-text cursor-pointer"><i class="icon-base ti tabler-eye-off"></i></span>
                            </div><div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                          </div>

                          <div class="mb-4 col-12 col-sm-6 form-password-toggle form-control-validation fv-plugins-icon-container">
                            <label class="form-label" for="confirm_password">Ulangi Password Baru</label>
                            <div class="input-group input-group-merge has-validation">
                              <input class="form-control" type="password" name="confirm_password" id="confirm_password" placeholder="············">
                              <span class="input-group-text cursor-pointer"><i class="icon-base ti tabler-eye-off"></i></span>
                            </div><div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                          </div>
                          <div>
                            <button type="submit" class="btn btn-primary me-2 waves-effect waves-light">Ubah Password</button>
                          </div>
                        </div>
                      <input type="hidden"></form>
                    </div>
                  </div>
    </div>
</div>
<?= $this->endSection() ?>