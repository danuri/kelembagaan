<!doctype html>
<html lang="en" class="layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-skin="default"
  data-assets-path="<?= base_url() ?>assets/" data-template="vertical-menu-template-no-customizer-starter"
  data-bs-theme="light">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title><?= setting('App.siteName') ?> - Biro Hukum</title>

  <meta name="description" content="SIPTIKA - Modul Biro Hukum" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="https://kemenag.go.id/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap"
    rel="stylesheet" />

  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/fonts/iconify-icons.css" />

  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/libs/node-waves/node-waves.css" />

  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/css/core.css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/demo.css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/custom.css" />

  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
  <link rel="stylesheet"
    href="<?= base_url() ?>assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/libs/sweetalert2/sweetalert2.css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/libs/pickr/pickr-themes.css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/libs/select2/select2.css" />
  <script src="<?= base_url() ?>assets/vendor/js/helpers.js"></script>

  <script src="<?= base_url() ?>assets/vendor/js/template-customizer.js"></script>
  <script src="<?= base_url() ?>assets/js/config.js"></script>
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <aside id="layout-menu" class="layout-menu menu-vertical menu">
        <div class="app-brand demo">
          <a href="<?= site_url('hukum') ?>" class="app-brand-link">
            <span class="app-brand-logo demo">
              <span class="text-primary">
                <img src="<?= base_url() ?>assets/img/siptika.png" width="120px" alt="SIPTIKA">
              </span>
            </span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="icon-base ti menu-toggle-icon d-none d-xl-block"></i>
            <i class="icon-base ti tabler-x d-block d-xl-none"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
          <!-- Dashboard -->
          <li class="menu-item <?= (uri_string() == 'hukum' || uri_string() == 'hukum/dashboard') ? 'active' : '' ?>">
            <a href="<?= site_url('hukum') ?>" class="menu-link">
              <i class="menu-icon icon-base ti tabler-smart-home"></i>
              <div data-i18n="Dashboard">Dashboard</div>
            </a>
          </li>

          <!-- Usulan Selesai Section -->
          <li class="menu-header small">
            <span class="menu-header-text" data-i18n="Layanan">Monitoring Usulan</span>
          </li>
          <li class="menu-item <?= (str_starts_with(uri_string(), 'hukum/usulan')) ? 'active' : '' ?>">
            <a href="<?= site_url('hukum/usulan') ?>" class="menu-link">
              <i class="menu-icon icon-base ti tabler-circle-check"></i>
              <div data-i18n="UsulanSelesai">Usulan Selesai</div>
            </a>
          </li>

          <!-- Profile -->
          <li class="menu-header small">
            <span class="menu-header-text" data-i18n="Akun">Akun</span>
          </li>
          <li class="menu-item <?= (uri_string() == 'hukum/profile') ? 'active' : '' ?>">
            <a href="<?= site_url('hukum/profile') ?>" class="menu-link">
              <i class="menu-icon icon-base ti tabler-user"></i>
              <div data-i18n="Profile">Profil Saya</div>
            </a>
          </li>
        </ul>
      </aside>

      <div class="menu-mobile-toggler d-xl-none rounded-1">
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large text-bg-secondary p-2 rounded-1">
          <i class="ti tabler-menu icon-base"></i>
          <i class="ti tabler-chevron-right icon-base"></i>
        </a>
      </div>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->

        <nav
          class="layout-navbar container-xxl navbar-detached navbar navbar-expand-xl align-items-center bg-navbar-theme"
          id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
              <i class="icon-base ti tabler-menu-2 icon-md"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center justify-content-end" id="navbar-collapse">
            <ul class="navbar-nav flex-row align-items-center ms-md-auto">
              <!-- Role Badge -->
              <li class="nav-item me-3 d-none d-sm-block">
                <span class="badge bg-label-info rounded-pill px-3 py-2">
                  <i class="ti tabler-scale me-1"></i> Biro Hukum
                </span>
              </li>

              <!-- User -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="<?= base_url() ?>assets/img/avatars/1.png" alt class="rounded-circle" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="<?= base_url() ?>assets/img/avatars/1.png" alt
                              class="w-px-40 h-auto rounded-circle" />
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <h6 class="mb-0"><?= auth()->user() ? auth()->user()->full_name : 'Biro Hukum'; ?></h6>
                          <small class="text-body-secondary">Biro Hukum</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider my-1 mx-n2"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="<?= site_url('hukum/profile') ?>">
                      <i class="icon-base ti tabler-user icon-md me-3"></i><span>Profil Saya</span>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider my-1 mx-n2"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="<?= site_url('logout') ?>">
                      <i class="icon-base ti tabler-power icon-md me-3"></i><span>Keluar</span>
                    </a>
                  </li>
                </ul>
              </li>
              <!--/ User -->
            </ul>
          </div>
        </nav>

        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y">
            <?= $this->renderSection('content') ?>
          </div>
          <!-- / Content -->

          <!-- Modal Log -->
          <div id="log" class="modal fade" data-bs-backdrop="static" tabindex="-1" aria-labelledby="myModalLabel"
            aria-hidden="true" data-bs-scroll="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content" style="border-radius: 14px; border: none; overflow: hidden;">
                <div class="modal-header py-3 px-4" style="background: linear-gradient(135deg, #696cff 0%, #8592ff 100%);">
                  <h5 class="modal-title text-white fw-semibold" id="myModalLabel">
                    <i class="ti tabler-history me-2"></i>Riwayat & Progres Usulan
                  </h5>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4" id="bodylog">
                  <div class="text-center py-4">
                    <div class="spinner-border text-primary" role="status"></div>
                    <p class="text-muted mt-2 mb-0">Memuat riwayat...</p>
                  </div>
                </div>
                <div class="modal-footer border-0">
                  <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal" style="border-radius: 8px;">Tutup</button>
                </div>
              </div>
            </div>
          </div>

          <!-- Footer -->
          <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">
              <div
                class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                <div class="text-body">
                  © <?= date('Y') ?>, Subdit Kelembagaan — Biro Hukum View
                </div>
              </div>
            </div>
          </footer>
          <!-- / Footer -->

          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
  </div>
  <!-- / Layout wrapper -->

  <!-- Core JS -->
  <script src="<?= base_url() ?>assets/vendor/libs/jquery/jquery.js"></script>
  <script src="<?= base_url() ?>assets/vendor/libs/popper/popper.js"></script>
  <script src="<?= base_url() ?>assets/vendor/js/bootstrap.js"></script>
  <script src="<?= base_url() ?>assets/vendor/libs/node-waves/node-waves.js"></script>
  <script src="<?= base_url() ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="<?= base_url() ?>assets/vendor/libs/select2/select2.js"></script>
  <script src="<?= base_url() ?>assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
  <script src="<?= base_url() ?>assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
  <script src="<?= base_url() ?>assets/vendor/js/menu.js"></script>
  <script src="<?= base_url() ?>assets/js/main.js"></script>

  <script>
    function log(id) {
      $('#log').modal('show');
      $('#bodylog').html('<div class="text-center py-4"><div class="spinner-border text-primary" role="status"></div><p class="text-muted mt-2 mb-0">Memuat riwayat...</p></div>');
      $.ajax({
        url: '<?= site_url('ajax/log/') ?>' + id,
        type: 'GET',
        dataType: 'html',
        success: function(data) {
          $('#bodylog').html(data);
        },
        error: function() {
          $('#bodylog').html('<div class="alert alert-danger mb-0">Gagal memuat riwayat usulan.</div>');
        }
      });
    }
  </script>

  <?= $this->renderSection('scripts') ?>
</body>

</html>
