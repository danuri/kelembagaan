<!doctype html>
<html
  lang="en"
  class="layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-skin="default"
  data-assets-path="<?= base_url()?>assets/"
  data-template="vertical-menu-template-no-customizer-starter"
  data-bs-theme="light">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title><?= setting('App.siteName')?></title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://kemenag.go.id/assets/imgs/theme/favicon.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="<?= base_url()?>assets/vendor/fonts/iconify-icons.css" />

    <link rel="stylesheet" href="<?= base_url()?>assets/vendor/libs/node-waves/node-waves.css" />

    <link rel="stylesheet" href="<?= base_url()?>assets/vendor/css/core.css" />
    <link rel="stylesheet" href="<?= base_url()?>assets/css/demo.css" />
    <link rel="stylesheet" href="<?= base_url()?>assets/css/custom.css" />

    <link rel="stylesheet" href="<?= base_url()?>assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="<?= base_url()?>assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="<?= base_url()?>assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    <link rel="stylesheet" href="<?= base_url()?>assets/vendor/libs/sweetalert2/sweetalert2.css" />
    <link rel="stylesheet" href="<?= base_url()?>assets/vendor/libs/pickr/pickr-themes.css" />
    <link rel="stylesheet" href="<?= base_url()?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="<?= base_url()?>assets/vendor/js/helpers.js"></script>

    <script src="<?= base_url()?>assets/vendor/js/template-customizer.js"></script>
    <script src="<?= base_url()?>assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
                <span class="text-primary">
                  <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                      fill="currentColor" />
                    <path
                      opacity="0.06"
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
                      fill="#161616" />
                    <path
                      opacity="0.06"
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
                      fill="#161616" />
                    <path
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                      fill="currentColor" />
                  </svg>
                </span>
              </span>
              <span class="app-brand-text demo menu-text fw-bold ms-3">Kelembagaan</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
              <i class="icon-base ti menu-toggle-icon d-none d-xl-block"></i>
              <i class="icon-base ti tabler-x d-block d-xl-none"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Page -->
            <li class="menu-item active">
              <a href="<?= site_url('verifikator')?>" class="menu-link">
                <i class="menu-icon icon-base ti tabler-smart-home"></i>
                <div data-i18n="Dashboard">Dashboard</div>
              </a>
            </li>
            <li class="menu-header small">
              <span class="menu-header-text" data-i18n="Master">Usulan</span>
            </li>
            <li class="menu-item">
              <a href="<?= site_url('verifikator/usulan')?>" class="menu-link">
                <i class="menu-icon icon-base ti tabler-table"></i>
                <div data-i18n="Usulan">Verifikasi</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="<?= site_url('verifikator/penilaian')?>" class="menu-link">
                <i class="menu-icon icon-base ti tabler-pencil-pin"></i>
                <div data-i18n="Pengguna">Penilaian</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="<?= site_url('verifikator/visitasi')?>" class="menu-link">
                <i class="menu-icon icon-base ti tabler-map-pin-check"></i>
                <div data-i18n="Pengguna">Visitasi</div>
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
            <div class="d-none d-sm-block">
              <strong>Verifikator</strong>
            </div>
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
                <i class="icon-base ti tabler-menu-2 icon-md"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center justify-content-end" id="navbar-collapse">
              <ul class="navbar-nav flex-row align-items-center ms-md-auto">
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a
                    class="nav-link dropdown-toggle hide-arrow p-0"
                    href="javascript:void(0);"
                    data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="<?= base_url()?>assets/img/avatars/1.png" alt class="rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="<?= base_url()?>assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-0">John Doe</h6>
                            <small class="text-body-secondary">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider my-1 mx-n2"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="<?= site_url('logout')?>">
                        <i class="icon-base ti tabler-power icon-md me-3"></i><span>Log Out</span>
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

            <div id="log" class="modal fade" data-bs-backdrop="static" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="myModalLabel">Progres Usulan</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body" id="bodylog">
                      
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
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
                    ©
                    <script>
                      document.write(new Date().getFullYear());
                    </script>
                    , made with ❤️ by <a href="https://pixinvent.com" target="_blank" class="footer-link">Pixinvent</a>
                  </div>
                  <div class="d-none d-lg-inline-block">
                    <a
                      href="https://demos.pixinvent.com/vuexy-html-admin-template/documentation/"
                      target="_blank"
                      class="footer-link me-4"
                      >Documentation</a
                    >
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
    <!-- build:js assets/vendor/js/theme.js -->

    <script src="<?= base_url()?>assets/vendor/libs/jquery/jquery.js"></script>

    <script src="<?= base_url()?>assets/vendor/libs/popper/popper.js"></script>
    <script src="<?= base_url()?>assets/vendor/js/bootstrap.js"></script>
    <script src="<?= base_url()?>assets/vendor/libs/node-waves/node-waves.js"></script>

    <script src="<?= base_url()?>assets/vendor/libs/@algolia/autocomplete-js.js"></script>
    <script src="<?= base_url()?>assets/vendor/libs/pickr/pickr.js"></script>

    <script src="<?= base_url()?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="<?= base_url()?>assets/vendor/libs/hammer/hammer.js"></script>
    <script src="<?= base_url()?>assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="<?= base_url()?>assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
    <script src="<?= base_url()?>assets/vendor/js/menu.js"></script>
    <script src="<?= base_url()?>assets/vendor/libs/notyf/notyf.js"></script>

    <script src="<?= base_url()?>assets/js/main.js"></script>
    <script type="text/javascript">
    function alert($text) {
      var notyf = new Notyf();
      notyf.success($text);
    }

    $(document).ready(function() {
        $('.datatable').DataTable();

        $('[data-toggle="tooltip"]').tooltip();

        var notyf = new Notyf();
        <?php if(session()->getFlashdata('message')){?>
        notyf.success("<?= session()->getFlashdata('message')?>");
        <?php } ?>

        <?php
        $errors = session()->getFlashdata('error');
        if($errors){
          
          if(is_array($errors)){
            foreach ($errors as $key => $value) {
              echo 'notyf.error("'.$key.': '.$value.'");';
            }
          }else{
            echo 'notyf.error("'.$errors.'");';
          }
        ?>
        
        <?php } ?>
    });


    function log(id) {
        $('#bodylog').load('<?= site_url('ajax/log')?>/'+id);
        $('#log').modal('show');
    }
    </script>

    <?= $this->renderSection('scripts') ?>
  </body>
</html>
