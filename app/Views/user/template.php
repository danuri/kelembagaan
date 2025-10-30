
<!doctype html>

<html
  lang="en"
  class="layout-navbar-fixed layout-wide"
  dir="ltr"
  data-skin="default"
  data-assets-path="<?= base_url()?>assets/"
  data-template="front-pages"
  data-bs-theme="light">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title><?= setting('App.siteName')?> - Kementerian Agama RI</title>

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

    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->

    <link rel="stylesheet" href="<?= base_url()?>assets/vendor/libs/node-waves/node-waves.css" />

    <link rel="stylesheet" href="<?= base_url()?>assets/vendor/libs/pickr/pickr-themes.css" />

    <link rel="stylesheet" href="<?= base_url()?>assets/vendor/css/core.css" />
    <link rel="stylesheet" href="<?= base_url()?>assets/css/demo.css" />

    <link rel="stylesheet" href="<?= base_url()?>assets/vendor/css/pages/front-page.css" />

    <!-- Vendors CSS -->

    <!-- endbuild -->
    <link rel="stylesheet" href="<?= base_url()?>assets/vendor/libs/nouislider/nouislider.css" />
    <link rel="stylesheet" href="<?= base_url()?>assets/vendor/libs/swiper/swiper.css" />
    <link rel="stylesheet" href="<?= base_url()?>assets/vendor/libs/bs-stepper/bs-stepper.css" />
    <link rel="stylesheet" href="<?= base_url()?>assets/vendor/libs/@form-validation/form-validation.css" />
    <link rel="stylesheet" href="<?= base_url()?>assets/vendor/libs/sweetalert2/sweetalert2.css" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="<?= base_url()?>assets/vendor/css/pages/front-page-help-center.css" />

    <!-- Helpers -->
    <script src="<?= base_url()?>assets/vendor/js/helpers.js"></script>
    <script src="<?= base_url()?>assets/vendor/js/template-customizer.js"></script>

    <script src="<?= base_url()?>assets/js/front-config.js"></script>
    <script src="<?= base_url()?>assets/js/config.js"></script>
  </head>

  <body>
    <script src="<?= base_url()?>assets/vendor/js/dropdown-hover.js"></script>
    <script src="<?= base_url()?>assets/vendor/js/mega-dropdown.js"></script>
    <!-- Navbar: Start -->
    <nav class="layout-navbar shadow-none py-0">
      <div class="container">
        <div class="navbar navbar-expand-lg landing-navbar px-3 px-md-8">
          <!-- Menu logo wrapper: Start -->
          <div class="navbar-brand app-brand demo d-flex py-0 me-4 me-xl-8 ms-0">
            <!-- Mobile menu toggle: Start-->
            <button
              class="navbar-toggler border-0 px-0 me-4"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation">
              <i class="icon-base ti tabler-menu-2 icon-lg align-middle text-heading fw-medium"></i>
            </button>
            <!-- Mobile menu toggle: End-->
            <a href="landing-page.html" class="app-brand-link">
              <span class="app-brand-logo demo">
                <span class="text-primary">
                  <img src="<?= base_url()?>assets/img/siptika.png" width="120px" alt="">
                </span>
              </span>
            </a>
          </div>
          <!-- Menu logo wrapper: End -->
          <!-- Menu wrapper: Start -->
          <div class="collapse navbar-collapse landing-nav-menu" id="navbarSupportedContent">
            <button
              class="navbar-toggler border-0 text-heading position-absolute end-0 top-0 scaleX-n1-rtl p-2"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation">
              <i class="icon-base ti tabler-x icon-lg"></i>
            </button>
          </div>
          <div class="landing-menu-overlay d-lg-none"></div>
          <!-- Menu wrapper: End -->
          <!-- Toolbar: Start -->
          <ul class="navbar-nav flex-row align-items-center ms-auto">
            <li>
              <a href="<?= site_url('logout')?>" class="btn btn-primary"><span class="tf-icons icon-base ti tabler-logout scaleX-n1-rtl me-md-1"></span
                ><span class="d-none d-md-block">Logout</span></a
              >
            </li>
            <!-- navbar button: End -->
          </ul>
          <!-- Toolbar: End -->
        </div>
      </div>
    </nav>
    <!-- Navbar: End -->

    <!-- Sections:Start -->

    <!-- Help Center Header: Start -->
    <section class="first-section-pt pb-8 help-center-header position-relative overflow-hidden">
      <img class="banner-bg-img z-n1" src="<?= base_url()?>assets/img/pages/header.png" alt="Help center header" />
      <div class="row">
          <div class="col-lg-10 mx-auto">
            <div class="row g-6">
              <div class="col-xl-3 col-md-6">
                <div class="card border shadow-none">
                  <div class="card-body text-center">
                    <svg width="58" height="58" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g opacity="0.2">
                        <path d="M50.6367 12.6875H7.36328C6.2997 12.6875 5.4375 13.5497 5.4375 14.6133V43.3867C5.4375 44.4503 6.2997 45.3125 7.36328 45.3125H50.6367C51.7003 45.3125 52.5625 44.4503 52.5625 43.3867V14.6133C52.5625 13.5497 51.7003 12.6875 50.6367 12.6875Z" fill="currentColor"></path>
                        <path d="M50.6367 12.6875H7.36328C6.2997 12.6875 5.4375 13.5497 5.4375 14.6133V43.3867C5.4375 44.4503 6.2997 45.3125 7.36328 45.3125H50.6367C51.7003 45.3125 52.5625 44.4503 52.5625 43.3867V14.6133C52.5625 13.5497 51.7003 12.6875 50.6367 12.6875Z" fill="white" fill-opacity="0.2"></path>
                      </g>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M6.6875 14.6133C6.6875 14.2401 6.99006 13.9375 7.36328 13.9375H50.6367C51.0099 13.9375 51.3125 14.2401 51.3125 14.6133V43.3867C51.3125 43.7599 51.0099 44.0625 50.6367 44.0625H7.36328C6.99006 44.0625 6.6875 43.7599 6.6875 43.3867V14.6133ZM7.36328 11.4375C5.60935 11.4375 4.1875 12.8593 4.1875 14.6133V43.3867C4.1875 45.1407 5.60935 46.5625 7.36328 46.5625H50.6367C52.3907 46.5625 53.8125 45.1407 53.8125 43.3867V14.6133C53.8125 12.8593 52.3907 11.4375 50.6367 11.4375H7.36328ZM12.6875 20.75C12.1352 20.75 11.6875 21.1977 11.6875 21.75C11.6875 22.3023 12.1352 22.75 12.6875 22.75H45.3125C45.8648 22.75 46.3125 22.3023 46.3125 21.75C46.3125 21.1977 45.8648 20.75 45.3125 20.75H12.6875ZM12.6875 28C12.1352 28 11.6875 28.4477 11.6875 29C11.6875 29.5523 12.1352 30 12.6875 30H45.3125C45.8648 30 46.3125 29.5523 46.3125 29C46.3125 28.4477 45.8648 28 45.3125 28H12.6875ZM11.6875 36.25C11.6875 35.6977 12.1352 35.25 12.6875 35.25H14.5C15.0523 35.25 15.5 35.6977 15.5 36.25C15.5 36.8023 15.0523 37.25 14.5 37.25H12.6875C12.1352 37.25 11.6875 36.8023 11.6875 36.25ZM21.75 35.25C21.1977 35.25 20.75 35.6977 20.75 36.25C20.75 36.8023 21.1977 37.25 21.75 37.25H36.25C36.8023 37.25 37.25 36.8023 37.25 36.25C37.25 35.6977 36.8023 35.25 36.25 35.25H21.75ZM42.5 36.25C42.5 35.6977 42.9477 35.25 43.5 35.25H45.3125C45.8648 35.25 46.3125 35.6977 46.3125 36.25C46.3125 36.8023 45.8648 37.25 45.3125 37.25H43.5C42.9477 37.25 42.5 36.8023 42.5 36.25Z" fill="currentColor"></path>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M6.6875 14.6133C6.6875 14.2401 6.99006 13.9375 7.36328 13.9375H50.6367C51.0099 13.9375 51.3125 14.2401 51.3125 14.6133V43.3867C51.3125 43.7599 51.0099 44.0625 50.6367 44.0625H7.36328C6.99006 44.0625 6.6875 43.7599 6.6875 43.3867V14.6133ZM7.36328 11.4375C5.60935 11.4375 4.1875 12.8593 4.1875 14.6133V43.3867C4.1875 45.1407 5.60935 46.5625 7.36328 46.5625H50.6367C52.3907 46.5625 53.8125 45.1407 53.8125 43.3867V14.6133C53.8125 12.8593 52.3907 11.4375 50.6367 11.4375H7.36328ZM12.6875 20.75C12.1352 20.75 11.6875 21.1977 11.6875 21.75C11.6875 22.3023 12.1352 22.75 12.6875 22.75H45.3125C45.8648 22.75 46.3125 22.3023 46.3125 21.75C46.3125 21.1977 45.8648 20.75 45.3125 20.75H12.6875ZM12.6875 28C12.1352 28 11.6875 28.4477 11.6875 29C11.6875 29.5523 12.1352 30 12.6875 30H45.3125C45.8648 30 46.3125 29.5523 46.3125 29C46.3125 28.4477 45.8648 28 45.3125 28H12.6875ZM11.6875 36.25C11.6875 35.6977 12.1352 35.25 12.6875 35.25H14.5C15.0523 35.25 15.5 35.6977 15.5 36.25C15.5 36.8023 15.0523 37.25 14.5 37.25H12.6875C12.1352 37.25 11.6875 36.8023 11.6875 36.25ZM21.75 35.25C21.1977 35.25 20.75 35.6977 20.75 36.25C20.75 36.8023 21.1977 37.25 21.75 37.25H36.25C36.8023 37.25 37.25 36.8023 37.25 36.25C37.25 35.6977 36.8023 35.25 36.25 35.25H21.75ZM42.5 36.25C42.5 35.6977 42.9477 35.25 43.5 35.25H45.3125C45.8648 35.25 46.3125 35.6977 46.3125 36.25C46.3125 36.8023 45.8648 37.25 45.3125 37.25H43.5C42.9477 37.25 42.5 36.8023 42.5 36.25Z" fill="white" fill-opacity="0.2"></path>
                    </svg>
                    <h6 class="my-3"><a href="<?= site_url('layanan/pendirianptkis')?>" class="">PENDIRIAN PTKIS</a></h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-md-6">
                <div class="card border shadow-none">
                  <div class="card-body text-center">
                    <svg width="58" height="58" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g opacity="0.2">
                        <path d="M50.6367 12.6875H7.36328C6.2997 12.6875 5.4375 13.5497 5.4375 14.6133V43.3867C5.4375 44.4503 6.2997 45.3125 7.36328 45.3125H50.6367C51.7003 45.3125 52.5625 44.4503 52.5625 43.3867V14.6133C52.5625 13.5497 51.7003 12.6875 50.6367 12.6875Z" fill="currentColor"></path>
                        <path d="M50.6367 12.6875H7.36328C6.2997 12.6875 5.4375 13.5497 5.4375 14.6133V43.3867C5.4375 44.4503 6.2997 45.3125 7.36328 45.3125H50.6367C51.7003 45.3125 52.5625 44.4503 52.5625 43.3867V14.6133C52.5625 13.5497 51.7003 12.6875 50.6367 12.6875Z" fill="white" fill-opacity="0.2"></path>
                      </g>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M6.6875 14.6133C6.6875 14.2401 6.99006 13.9375 7.36328 13.9375H50.6367C51.0099 13.9375 51.3125 14.2401 51.3125 14.6133V43.3867C51.3125 43.7599 51.0099 44.0625 50.6367 44.0625H7.36328C6.99006 44.0625 6.6875 43.7599 6.6875 43.3867V14.6133ZM7.36328 11.4375C5.60935 11.4375 4.1875 12.8593 4.1875 14.6133V43.3867C4.1875 45.1407 5.60935 46.5625 7.36328 46.5625H50.6367C52.3907 46.5625 53.8125 45.1407 53.8125 43.3867V14.6133C53.8125 12.8593 52.3907 11.4375 50.6367 11.4375H7.36328ZM12.6875 20.75C12.1352 20.75 11.6875 21.1977 11.6875 21.75C11.6875 22.3023 12.1352 22.75 12.6875 22.75H45.3125C45.8648 22.75 46.3125 22.3023 46.3125 21.75C46.3125 21.1977 45.8648 20.75 45.3125 20.75H12.6875ZM12.6875 28C12.1352 28 11.6875 28.4477 11.6875 29C11.6875 29.5523 12.1352 30 12.6875 30H45.3125C45.8648 30 46.3125 29.5523 46.3125 29C46.3125 28.4477 45.8648 28 45.3125 28H12.6875ZM11.6875 36.25C11.6875 35.6977 12.1352 35.25 12.6875 35.25H14.5C15.0523 35.25 15.5 35.6977 15.5 36.25C15.5 36.8023 15.0523 37.25 14.5 37.25H12.6875C12.1352 37.25 11.6875 36.8023 11.6875 36.25ZM21.75 35.25C21.1977 35.25 20.75 35.6977 20.75 36.25C20.75 36.8023 21.1977 37.25 21.75 37.25H36.25C36.8023 37.25 37.25 36.8023 37.25 36.25C37.25 35.6977 36.8023 35.25 36.25 35.25H21.75ZM42.5 36.25C42.5 35.6977 42.9477 35.25 43.5 35.25H45.3125C45.8648 35.25 46.3125 35.6977 46.3125 36.25C46.3125 36.8023 45.8648 37.25 45.3125 37.25H43.5C42.9477 37.25 42.5 36.8023 42.5 36.25Z" fill="currentColor"></path>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M6.6875 14.6133C6.6875 14.2401 6.99006 13.9375 7.36328 13.9375H50.6367C51.0099 13.9375 51.3125 14.2401 51.3125 14.6133V43.3867C51.3125 43.7599 51.0099 44.0625 50.6367 44.0625H7.36328C6.99006 44.0625 6.6875 43.7599 6.6875 43.3867V14.6133ZM7.36328 11.4375C5.60935 11.4375 4.1875 12.8593 4.1875 14.6133V43.3867C4.1875 45.1407 5.60935 46.5625 7.36328 46.5625H50.6367C52.3907 46.5625 53.8125 45.1407 53.8125 43.3867V14.6133C53.8125 12.8593 52.3907 11.4375 50.6367 11.4375H7.36328ZM12.6875 20.75C12.1352 20.75 11.6875 21.1977 11.6875 21.75C11.6875 22.3023 12.1352 22.75 12.6875 22.75H45.3125C45.8648 22.75 46.3125 22.3023 46.3125 21.75C46.3125 21.1977 45.8648 20.75 45.3125 20.75H12.6875ZM12.6875 28C12.1352 28 11.6875 28.4477 11.6875 29C11.6875 29.5523 12.1352 30 12.6875 30H45.3125C45.8648 30 46.3125 29.5523 46.3125 29C46.3125 28.4477 45.8648 28 45.3125 28H12.6875ZM11.6875 36.25C11.6875 35.6977 12.1352 35.25 12.6875 35.25H14.5C15.0523 35.25 15.5 35.6977 15.5 36.25C15.5 36.8023 15.0523 37.25 14.5 37.25H12.6875C12.1352 37.25 11.6875 36.8023 11.6875 36.25ZM21.75 35.25C21.1977 35.25 20.75 35.6977 20.75 36.25C20.75 36.8023 21.1977 37.25 21.75 37.25H36.25C36.8023 37.25 37.25 36.8023 37.25 36.25C37.25 35.6977 36.8023 35.25 36.25 35.25H21.75ZM42.5 36.25C42.5 35.6977 42.9477 35.25 43.5 35.25H45.3125C45.8648 35.25 46.3125 35.6977 46.3125 36.25C46.3125 36.8023 45.8648 37.25 45.3125 37.25H43.5C42.9477 37.25 42.5 36.8023 42.5 36.25Z" fill="white" fill-opacity="0.2"></path>
                    </svg>
                    <h6 class="my-3"><a href="<?= site_url('layanan/alihbentukptkis')?>" class="">ALIH BENTUK PTKIS</a></h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-md-6">
                <div class="card border shadow-none">
                  <div class="card-body text-center">
                    <svg width="58" height="58" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g opacity="0.2">
                        <path d="M50.6367 12.6875H7.36328C6.2997 12.6875 5.4375 13.5497 5.4375 14.6133V43.3867C5.4375 44.4503 6.2997 45.3125 7.36328 45.3125H50.6367C51.7003 45.3125 52.5625 44.4503 52.5625 43.3867V14.6133C52.5625 13.5497 51.7003 12.6875 50.6367 12.6875Z" fill="currentColor"></path>
                        <path d="M50.6367 12.6875H7.36328C6.2997 12.6875 5.4375 13.5497 5.4375 14.6133V43.3867C5.4375 44.4503 6.2997 45.3125 7.36328 45.3125H50.6367C51.7003 45.3125 52.5625 44.4503 52.5625 43.3867V14.6133C52.5625 13.5497 51.7003 12.6875 50.6367 12.6875Z" fill="white" fill-opacity="0.2"></path>
                      </g>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M6.6875 14.6133C6.6875 14.2401 6.99006 13.9375 7.36328 13.9375H50.6367C51.0099 13.9375 51.3125 14.2401 51.3125 14.6133V43.3867C51.3125 43.7599 51.0099 44.0625 50.6367 44.0625H7.36328C6.99006 44.0625 6.6875 43.7599 6.6875 43.3867V14.6133ZM7.36328 11.4375C5.60935 11.4375 4.1875 12.8593 4.1875 14.6133V43.3867C4.1875 45.1407 5.60935 46.5625 7.36328 46.5625H50.6367C52.3907 46.5625 53.8125 45.1407 53.8125 43.3867V14.6133C53.8125 12.8593 52.3907 11.4375 50.6367 11.4375H7.36328ZM12.6875 20.75C12.1352 20.75 11.6875 21.1977 11.6875 21.75C11.6875 22.3023 12.1352 22.75 12.6875 22.75H45.3125C45.8648 22.75 46.3125 22.3023 46.3125 21.75C46.3125 21.1977 45.8648 20.75 45.3125 20.75H12.6875ZM12.6875 28C12.1352 28 11.6875 28.4477 11.6875 29C11.6875 29.5523 12.1352 30 12.6875 30H45.3125C45.8648 30 46.3125 29.5523 46.3125 29C46.3125 28.4477 45.8648 28 45.3125 28H12.6875ZM11.6875 36.25C11.6875 35.6977 12.1352 35.25 12.6875 35.25H14.5C15.0523 35.25 15.5 35.6977 15.5 36.25C15.5 36.8023 15.0523 37.25 14.5 37.25H12.6875C12.1352 37.25 11.6875 36.8023 11.6875 36.25ZM21.75 35.25C21.1977 35.25 20.75 35.6977 20.75 36.25C20.75 36.8023 21.1977 37.25 21.75 37.25H36.25C36.8023 37.25 37.25 36.8023 37.25 36.25C37.25 35.6977 36.8023 35.25 36.25 35.25H21.75ZM42.5 36.25C42.5 35.6977 42.9477 35.25 43.5 35.25H45.3125C45.8648 35.25 46.3125 35.6977 46.3125 36.25C46.3125 36.8023 45.8648 37.25 45.3125 37.25H43.5C42.9477 37.25 42.5 36.8023 42.5 36.25Z" fill="currentColor"></path>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M6.6875 14.6133C6.6875 14.2401 6.99006 13.9375 7.36328 13.9375H50.6367C51.0099 13.9375 51.3125 14.2401 51.3125 14.6133V43.3867C51.3125 43.7599 51.0099 44.0625 50.6367 44.0625H7.36328C6.99006 44.0625 6.6875 43.7599 6.6875 43.3867V14.6133ZM7.36328 11.4375C5.60935 11.4375 4.1875 12.8593 4.1875 14.6133V43.3867C4.1875 45.1407 5.60935 46.5625 7.36328 46.5625H50.6367C52.3907 46.5625 53.8125 45.1407 53.8125 43.3867V14.6133C53.8125 12.8593 52.3907 11.4375 50.6367 11.4375H7.36328ZM12.6875 20.75C12.1352 20.75 11.6875 21.1977 11.6875 21.75C11.6875 22.3023 12.1352 22.75 12.6875 22.75H45.3125C45.8648 22.75 46.3125 22.3023 46.3125 21.75C46.3125 21.1977 45.8648 20.75 45.3125 20.75H12.6875ZM12.6875 28C12.1352 28 11.6875 28.4477 11.6875 29C11.6875 29.5523 12.1352 30 12.6875 30H45.3125C45.8648 30 46.3125 29.5523 46.3125 29C46.3125 28.4477 45.8648 28 45.3125 28H12.6875ZM11.6875 36.25C11.6875 35.6977 12.1352 35.25 12.6875 35.25H14.5C15.0523 35.25 15.5 35.6977 15.5 36.25C15.5 36.8023 15.0523 37.25 14.5 37.25H12.6875C12.1352 37.25 11.6875 36.8023 11.6875 36.25ZM21.75 35.25C21.1977 35.25 20.75 35.6977 20.75 36.25C20.75 36.8023 21.1977 37.25 21.75 37.25H36.25C36.8023 37.25 37.25 36.8023 37.25 36.25C37.25 35.6977 36.8023 35.25 36.25 35.25H21.75ZM42.5 36.25C42.5 35.6977 42.9477 35.25 43.5 35.25H45.3125C45.8648 35.25 46.3125 35.6977 46.3125 36.25C46.3125 36.8023 45.8648 37.25 45.3125 37.25H43.5C42.9477 37.25 42.5 36.8023 42.5 36.25Z" fill="white" fill-opacity="0.2"></path>
                    </svg>
                    <h6 class="my-3"><a href="#" class="">ALIH KELOLA PTKIS</a></h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-md-6">
                <div class="card border shadow-none">
                  <div class="card-body text-center">
                    <svg width="58" height="58" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g opacity="0.2">
                        <path d="M50.6367 12.6875H7.36328C6.2997 12.6875 5.4375 13.5497 5.4375 14.6133V43.3867C5.4375 44.4503 6.2997 45.3125 7.36328 45.3125H50.6367C51.7003 45.3125 52.5625 44.4503 52.5625 43.3867V14.6133C52.5625 13.5497 51.7003 12.6875 50.6367 12.6875Z" fill="currentColor"></path>
                        <path d="M50.6367 12.6875H7.36328C6.2997 12.6875 5.4375 13.5497 5.4375 14.6133V43.3867C5.4375 44.4503 6.2997 45.3125 7.36328 45.3125H50.6367C51.7003 45.3125 52.5625 44.4503 52.5625 43.3867V14.6133C52.5625 13.5497 51.7003 12.6875 50.6367 12.6875Z" fill="white" fill-opacity="0.2"></path>
                      </g>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M6.6875 14.6133C6.6875 14.2401 6.99006 13.9375 7.36328 13.9375H50.6367C51.0099 13.9375 51.3125 14.2401 51.3125 14.6133V43.3867C51.3125 43.7599 51.0099 44.0625 50.6367 44.0625H7.36328C6.99006 44.0625 6.6875 43.7599 6.6875 43.3867V14.6133ZM7.36328 11.4375C5.60935 11.4375 4.1875 12.8593 4.1875 14.6133V43.3867C4.1875 45.1407 5.60935 46.5625 7.36328 46.5625H50.6367C52.3907 46.5625 53.8125 45.1407 53.8125 43.3867V14.6133C53.8125 12.8593 52.3907 11.4375 50.6367 11.4375H7.36328ZM12.6875 20.75C12.1352 20.75 11.6875 21.1977 11.6875 21.75C11.6875 22.3023 12.1352 22.75 12.6875 22.75H45.3125C45.8648 22.75 46.3125 22.3023 46.3125 21.75C46.3125 21.1977 45.8648 20.75 45.3125 20.75H12.6875ZM12.6875 28C12.1352 28 11.6875 28.4477 11.6875 29C11.6875 29.5523 12.1352 30 12.6875 30H45.3125C45.8648 30 46.3125 29.5523 46.3125 29C46.3125 28.4477 45.8648 28 45.3125 28H12.6875ZM11.6875 36.25C11.6875 35.6977 12.1352 35.25 12.6875 35.25H14.5C15.0523 35.25 15.5 35.6977 15.5 36.25C15.5 36.8023 15.0523 37.25 14.5 37.25H12.6875C12.1352 37.25 11.6875 36.8023 11.6875 36.25ZM21.75 35.25C21.1977 35.25 20.75 35.6977 20.75 36.25C20.75 36.8023 21.1977 37.25 21.75 37.25H36.25C36.8023 37.25 37.25 36.8023 37.25 36.25C37.25 35.6977 36.8023 35.25 36.25 35.25H21.75ZM42.5 36.25C42.5 35.6977 42.9477 35.25 43.5 35.25H45.3125C45.8648 35.25 46.3125 35.6977 46.3125 36.25C46.3125 36.8023 45.8648 37.25 45.3125 37.25H43.5C42.9477 37.25 42.5 36.8023 42.5 36.25Z" fill="currentColor"></path>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M6.6875 14.6133C6.6875 14.2401 6.99006 13.9375 7.36328 13.9375H50.6367C51.0099 13.9375 51.3125 14.2401 51.3125 14.6133V43.3867C51.3125 43.7599 51.0099 44.0625 50.6367 44.0625H7.36328C6.99006 44.0625 6.6875 43.7599 6.6875 43.3867V14.6133ZM7.36328 11.4375C5.60935 11.4375 4.1875 12.8593 4.1875 14.6133V43.3867C4.1875 45.1407 5.60935 46.5625 7.36328 46.5625H50.6367C52.3907 46.5625 53.8125 45.1407 53.8125 43.3867V14.6133C53.8125 12.8593 52.3907 11.4375 50.6367 11.4375H7.36328ZM12.6875 20.75C12.1352 20.75 11.6875 21.1977 11.6875 21.75C11.6875 22.3023 12.1352 22.75 12.6875 22.75H45.3125C45.8648 22.75 46.3125 22.3023 46.3125 21.75C46.3125 21.1977 45.8648 20.75 45.3125 20.75H12.6875ZM12.6875 28C12.1352 28 11.6875 28.4477 11.6875 29C11.6875 29.5523 12.1352 30 12.6875 30H45.3125C45.8648 30 46.3125 29.5523 46.3125 29C46.3125 28.4477 45.8648 28 45.3125 28H12.6875ZM11.6875 36.25C11.6875 35.6977 12.1352 35.25 12.6875 35.25H14.5C15.0523 35.25 15.5 35.6977 15.5 36.25C15.5 36.8023 15.0523 37.25 14.5 37.25H12.6875C12.1352 37.25 11.6875 36.8023 11.6875 36.25ZM21.75 35.25C21.1977 35.25 20.75 35.6977 20.75 36.25C20.75 36.8023 21.1977 37.25 21.75 37.25H36.25C36.8023 37.25 37.25 36.8023 37.25 36.25C37.25 35.6977 36.8023 35.25 36.25 35.25H21.75ZM42.5 36.25C42.5 35.6977 42.9477 35.25 43.5 35.25H45.3125C45.8648 35.25 46.3125 35.6977 46.3125 36.25C46.3125 36.8023 45.8648 37.25 45.3125 37.25H43.5C42.9477 37.25 42.5 36.8023 42.5 36.25Z" fill="white" fill-opacity="0.2"></path>
                    </svg>
                    <h6 class="my-3"><a href="#" class="">PEMBENTUKAN FAI</a></h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
    <!-- Help Center Header: End -->

    <!-- Popular Articles: Start -->
    <section class="p-5">
      <div class="container">
        <?= $this->renderSection('content') ?>
      </div>
    </section>
    <!-- Popular Articles: End -->

    <!-- Help Area: Start -->
    <section class="section-py bg-body">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8 col-lg-6 text-center">
            <h4>Still need help?</h4>
            <p>
              Our specialists are always happy to help.<br />Contact us during standard business hours or email us 24/7
              and we'll get back to you.
            </p>
            <div class="d-flex justify-content-center flex-wrap gap-4">
              <a href="javascript:void(0);" class="btn btn-primary">Visit our community</a>
              <a href="javascript:void(0);" class="btn btn-primary">Contact us</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Help Area: End -->

    <!-- / Sections:End -->

    <!-- Footer: Start -->
    <footer class="landing-footer bg-body footer-text">
      <div class="footer-bottom py-3 py-md-5">
        <div
          class="container d-flex flex-wrap justify-content-between flex-md-row flex-column text-center text-md-start">
          <div class="mb-2 mb-md-0">
            <span class="footer-bottom-text"
              >©2025 <span class="fw-medium">SIPTIKA</span>
            </span>
          </div>
          <div class="text-white">
            <?= setting('App.siteFooter')?><br />
          </div>
        </div>
      </div>
    </footer>
    <!-- Footer: End -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/theme.js -->

    <script src="<?= base_url()?>assets/vendor/libs/jquery/jquery.js"></script>
    <script src="<?= base_url()?>assets/vendor/libs/popper/popper.js"></script>
    <script src="<?= base_url()?>assets/vendor/js/bootstrap.js"></script>
    <script src="<?= base_url()?>assets/vendor/libs/node-waves/node-waves.js"></script>

    <script src="<?= base_url()?>assets/vendor/libs/@algolia/autocomplete-js.js"></script>

    <script src="<?= base_url()?>assets/vendor/libs/pickr/pickr.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="<?= base_url()?>assets/vendor/libs/nouislider/nouislider.js"></script>
    <script src="<?= base_url()?>assets/vendor/libs/bs-stepper/bs-stepper.js"></script>
    <script src="<?= base_url()?>assets/vendor/libs/swiper/swiper.js"></script>
    <script src="<?= base_url()?>assets/vendor/libs/notyf/notyf.js"></script>
    <script src="<?= base_url()?>assets/vendor/libs/sweetalert2/sweetalert2.js"></script>

    <script type="text/javascript">
      var siteurl = '<?= site_url()?>';
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

    $(document).ready(function() {
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
