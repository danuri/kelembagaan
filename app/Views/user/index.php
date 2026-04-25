<?= $this->extend('user/template2') ?>
<?= $this->section('content') ?>
<div class="text-center mb-4">
  <span class="badge bg-label-primary">Layanan</span>
</div>
<h4 class="text-center mb-1">
  <span class="position-relative fw-extrabold z-1">Layanan
    <img src="<?= base_url() ?>assets/img/front-pages/icons/section-title-icon.png" alt="laptop charging"
      class="section-title-img position-absolute object-fit-contain bottom-0 z-n1" />
  </span>
  Kelembagaan dan Kerjasama
</h4>
<p class="text-center mb-12">
  Silahkan pilih layanan yang tersedia di atas untuk mengajukan permohonan.
</p>
<?= $this->endSection() ?>