<!doctype html>
<html lang="en" class=" layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr" data-skin="default"
  data-bs-theme="light" data-assets-path="<?= base_url() ?>assets/" data-template="vertical-menu-template">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <meta name="robots" content="noindex, nofollow" />
  <title>
    <?= setting('App.siteName') ?> - Kementerian Agama RI
  </title>

  <meta name="description" content="<?= setting('App.description') ?>" />
  <!-- Canonical SEO -->
  <meta name="keywords" content="<?= setting('App.keywords') ?>" />
  <meta property="og:title" content="<?= setting('App.siteName') ?>" />
  <meta property="og:type" content="product" />
  <meta property="og:url"
    content="https://themeforest.net/item/vuexy-vuejs-html-laravel-admin-dashboard-template/23328599" />
  <meta property="og:image" content="https://pixinvent.com/wp-content/uploads/2023/06/vuexy-hero-image.png" />
  <meta property="og:description" content="<?= setting('App.description') ?>" />
  <meta property="og:site_name" content="<?= setting('App.siteName') ?>" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="https://kemenag.go.id/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
    rel="stylesheet" />

  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/fonts/iconify-icons.css" />

  <script src="<?= base_url() ?>assets/vendor/libs/@algolia/autocomplete-js.js"></script>

  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/libs/node-waves/node-waves.css" />


  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/libs/pickr/pickr-themes.css" />

  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/css/core.css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/demo.css" />


  <!-- Vendors CSS -->

  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <!-- endbuild -->

  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/libs/apex-charts/apex-charts.css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/libs/swiper/swiper.css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
  <link rel="stylesheet"
    href="<?= base_url() ?>assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/fonts/flag-icons.css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/libs/bs-stepper/bs-stepper.css" />
  <!-- Page CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/css/pages/cards-advance.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/libs/sweetalert2/sweetalert2.css" />
  <!-- Helpers -->
  <script src="<?= base_url() ?>assets/vendor/js/helpers.js"></script>
  <script src="<?= base_url() ?>assets/vendor/js/template-customizer.js"></script>
  <script src="<?= base_url() ?>assets/js/config.js"></script>

</head>

<body>

  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar  ">
    <div class="layout-container">

      <aside id="layout-menu" class="layout-menu menu-vertical menu">

        <div class="app-brand demo ">
          <a href="<?= site_url() ?>" class="app-brand-link">
            <img src="<?= base_url() ?>assets/img/siptika.png" width="120px" alt="">
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="icon-base ti menu-toggle-icon d-none d-xl-block"></i>
            <i class="icon-base ti tabler-x d-block d-xl-none"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>



        <ul class="menu-inner py-1">

          <li class="menu-header small">
            <span class="menu-header-text" data-i18n="Layanan">Layanan</span>
          </li>
          <li class="menu-item">
            <a href="<?= site_url('layanan/pendirianptkis') ?>" class="menu-link">
              <i class="menu-icon icon-base ti tabler-building-skyscraper"></i>
              <div data-i18n="Pendirian PTKIS">Pendirian PTKIS</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="<?= site_url('layanan/alihbentukptkis') ?>" class="menu-link">
              <i class="menu-icon icon-base ti tabler-building-cog"></i>
              <div data-i18n="Alih Bentuk PTKIS">Alih Bentuk PTKIS</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="<?= site_url('layanan/alihkelolaptkis') ?>" class="menu-link">
              <i class="menu-icon icon-base ti tabler-users"></i>
              <div data-i18n="Alih Kelola PTKIS">Alih Kelola PTKIS</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="<?= site_url('layanan/penggabunganptki') ?>" class="menu-link">
              <i class="menu-icon icon-base ti tabler-building-community"></i>
              <div data-i18n="Penggabungan PTKI">Penggabungan PTKI</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="<?= site_url('layanan/pembentukanfai') ?>" class="menu-link">
              <i class="menu-icon icon-base ti tabler-school"></i>
              <div data-i18n="Pembentukan FAI">Pembentukan FAI</div>
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

      <div class="layout-page">


        <nav
          class="layout-navbar container-xxl navbar-detached navbar navbar-expand-xl align-items-center bg-navbar-theme"
          id="layout-navbar">

          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
            <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
              <i class="icon-base ti tabler-menu-2 icon-md"></i>
            </a>
          </div>


          <div class="navbar-nav-right d-flex align-items-center justify-content-end" id="navbar-collapse">

            <div class="navbar-nav align-items-center">
              <!-- <div class="nav-item navbar-search-wrapper px-md-0 px-2 mb-0">
                <a class="nav-item nav-link search-toggler d-flex align-items-center px-0" href="javascript:void(0);">
                  <span class="d-inline-block text-body-secondary fw-normal" id="autocomplete"></span>
                </a>
              </div> -->
            </div>
            <ul class="navbar-nav flex-row align-items-center ms-md-auto">

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle hide-arrow btn btn-icon btn-text-secondary rounded-pill"
                  id="nav-theme" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <i class="icon-base ti tabler-sun icon-22px theme-icon-active text-heading"></i>
                  <span class="d-none ms-2" id="nav-theme-text">Toggle theme</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="nav-theme-text">
                  <li>
                    <button type="button" class="dropdown-item align-items-center active" data-bs-theme-value="light"
                      aria-pressed="false">
                      <span><i class="icon-base ti tabler-sun icon-22px me-3" data-icon="sun"></i>Light</span>
                    </button>
                  </li>
                  <li>
                    <button type="button" class="dropdown-item align-items-center" data-bs-theme-value="dark"
                      aria-pressed="true">
                      <span><i class="icon-base ti tabler-moon-stars icon-22px me-3"
                          data-icon="moon-stars"></i>Dark</span>
                    </button>
                  </li>
                  <li>
                    <button type="button" class="dropdown-item align-items-center" data-bs-theme-value="system"
                      aria-pressed="false">
                      <span><i class="icon-base ti tabler-device-desktop-analytics icon-22px me-3"
                          data-icon="device-desktop-analytics"></i>System</span>
                    </button>
                  </li>
                </ul>
              </li>
              <!-- / Style Switcher-->

              <!-- User -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="<?= base_url() ?>assets/img/avatars/1.png" alt class="rounded-circle" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item mt-0" href="pages-account-settings-account.html">
                      <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 me-2">
                          <div class="avatar avatar-online">
                            <img src="<?= base_url() ?>assets/img/avatars/1.png" alt class="rounded-circle" />
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <h6 class="mb-0"><?= auth()->user()->username ?></h6>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider my-1 mx-n2"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="<?= site_url('profile') ?>">
                      <i class=" icon-base ti tabler-user me-3 icon-md"></i><span class="align-middle">My
                        Profile</span>
                    </a>
                  </li>
                  <li>
                    <div class="d-grid px-2 pt-2 pb-1">
                      <a class="btn btn-sm btn-danger d-flex" href="<?= site_url('logout') ?>">
                        <small class="align-middle">Logout</small>
                        <i class="icon-base ti tabler-logout ms-2 icon-14px"></i>
                      </a>
                    </div>
                  </li>
                </ul>
              </li>

            </ul>
          </div>
        </nav>
        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">
            <?= $this->renderSection('content') ?>
          </div>

          <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">
              <div
                class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                <div class="text-body">
                  ©2026 SIPTIKA
                </div>
                <div class="d-none d-lg-inline-block"><?= setting('App.siteFooter') ?></div>
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

    <div class="drag-target"></div>

  </div>

  <script src="<?= base_url() ?>assets/vendor/libs/jquery/jquery.js"></script>

  <script src="<?= base_url() ?>assets/vendor/libs/popper/popper.js"></script>
  <script src="<?= base_url() ?>assets/vendor/js/bootstrap.js"></script>
  <script src="<?= base_url() ?>assets/vendor/libs/node-waves/node-waves.js"></script>



  <script src="<?= base_url() ?>assets/vendor/libs/pickr/pickr.js"></script>



  <script src="<?= base_url() ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>


  <script src="<?= base_url() ?>assets/vendor/libs/hammer/hammer.js"></script>

  <script src="<?= base_url() ?>assets/vendor/libs/i18n/i18n.js"></script>


  <script src="<?= base_url() ?>assets/vendor/js/menu.js"></script>

  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="<?= base_url() ?>assets/vendor/libs/apex-charts/apexcharts.js"></script>
  <script src="<?= base_url() ?>assets/vendor/libs/swiper/swiper.js"></script>
  <script src="<?= base_url() ?>assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
  <script src="<?= base_url() ?>assets/vendor/libs/bs-stepper/bs-stepper.js"></script>
  <script src="<?= base_url() ?>assets/vendor/libs/notyf/notyf.js"></script>
  <script src="<?= base_url() ?>assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
  <script src="<?= base_url() ?>assets/js/main.js"></script>


  <!-- Page JS -->
  <script src="<?= base_url() ?>assets/js/dashboards-analytics.js"></script>
  <script type="text/javascript">
    var siteurl = '<?= site_url() ?>';
    function alert($text) {
      var notyf = new Notyf();
      notyf.success({
        message: $text,
        duration: 5000,
        position: {
          x: 'right',
          y: 'top',
        },
      });
    }

    $(document).ready(function () {
      var notyf = new Notyf();
      <?php if (session()->getFlashdata('message')) { ?>
        notyf.success("<?= session()->getFlashdata('message') ?>");
      <?php } ?>

      <?php
      $errors = session()->getFlashdata('error');
      if ($errors) {

        if (is_array($errors)) {
          foreach ($errors as $key => $value) {
            echo 'notyf.error("' . $key . ': ' . $value . '");';
          }
        } else {
          echo 'notyf.error("' . $errors . '");';
        }
        ?>

      <?php } ?>
    });

    function log(id) {
      $('#bodylog').load('<?= site_url('ajax/log') ?>/' + id);
      $('#log').modal('show');
    }
  </script>
  <?= $this->renderSection('scripts') ?>
</body>

</html>