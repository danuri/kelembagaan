<!doctype html>

<html lang="en" class="layout-wide customizer-hide" dir="ltr" data-skin="default"
    data-assets-path="<?= base_url() ?>assets/" data-template="vertical-menu-template" data-bs-theme="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title><?= $this->renderSection('title') ?></title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/fonts/iconify-icons.css" />

    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->

    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/libs/node-waves/node-waves.css" />

    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/libs/pickr/pickr-themes.css" />

    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/css/core.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/demo.css" />

    <!-- Vendors CSS -->

    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- endbuild -->

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/css/pages/page-auth.css" />

    <!-- Helpers -->
    <script src="<?= base_url() ?>assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="<?= base_url() ?>assets/vendor/js/template-customizer.js"></script>

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->

    <script src="<?= base_url() ?>assets/js/config.js"></script>
    <?= $this->renderSection('pageStyles') ?>
</head>

<body>
    <!-- Content -->

    <div class="authentication-wrapper authentication-basic px-6">
        <?= $this->renderSection('main') ?>


    </div>


    <script src="<?= base_url() ?>assets/vendor/libs/jquery/jquery.js"></script>

    <script src="<?= base_url() ?>assets/vendor/libs/popper/popper.js"></script>
    <script src="<?= base_url() ?>assets/vendor/js/bootstrap.js"></script>
    <script src="<?= base_url() ?>assets/vendor/libs/node-waves/node-waves.js"></script>

    <script src="<?= base_url() ?>assets/vendor/libs/@algolia/autocomplete-js.js"></script>

    <script src="<?= base_url() ?>assets/vendor/libs/pickr/pickr.js"></script>

    <script src="<?= base_url() ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="<?= base_url() ?>assets/vendor/libs/hammer/hammer.js"></script>

    <script src="<?= base_url() ?>assets/vendor/libs/i18n/i18n.js"></script>

    <script src="<?= base_url() ?>assets/vendor/js/menu.js"></script>

    <script src="<?= base_url() ?>assets/js/main.js"></script>

    <?= $this->renderSection('pageScripts') ?>
</body>

</html>