<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="sampul">

  <div class="container">
    <div class="row">

      <div class="col" style="padding: 20px;">

        <div class="row">

          <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card" style="border: none; border: 0; outline: none; box-shadow: none;">
              <div class="card-body">
                <h5 class="card-title">Selamat Datang</h5>
                <p class="text-justify">Si Lancar (Sistem Layanan Administrasi Cepat dari Rumah) Situs ini digunakan untuk melayani masyarakat yang bertujuan untuk mempercepat pelayanan, memudahkan pelayanan dan mewujudkan pelayanan Administrasi Kependudukan yang membahagiakan masyarakat.</p>
                <a href="/pages/about" class="btn btn-primary">Tentang Kami</a>
              </div>
            </div>
          </div>

          <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card" style="border: none; border: 0; outline: none; box-shadow: none;">
              <img src="/img/silancar/LogoSindangKasih.png" alt="" style="padding: 20px;">
            </div>
          </div>

        </div>

      </div>

    </div>
  </div>
</div>

<!-- Berita -->
<div class="berita">

  <div class="container mt-5 mb-3">
    <div class="row">

      <h3 class="text-center fw-bold">Berita</h3>
      <p class="fs-6 text-center">Berita Terbaru Disdukcapil Majalengka</p>

      <div class="card-group" style="border: none; border: 0; outline: none; box-shadow: none; padding: 10px;">

        <?php foreach ($berita as $b) : ?>
          <div class="card">
            <img src="/img/berita/<?= $b['fotoberita']; ?>" class="card-img-top" alt="Foto Berita">
            <div class="card-body">
              <h5 class="card-title"> <?= $b['judulberita']; ?> </h5>
              <p class="card-text"><?= $b['keteranganberita']; ?></p>
              <p class="card-text"><small class="text-body-secondary">Last updated <?= $b['created_at']; ?></small></p>
            </div>
          </div>
        <?php endforeach; ?>

      </div>

    </div>
  </div>

</div>

<!-- Inovasi -->
<div class="inovasi">

  <section class="pt-3 mt-3">
    <div class="container px-lg-5">
      <div class="row gx-lg-5">

        <h3 class="text-center fw-bold">Inovasi</h3>
        <p class="fs-6 text-center">Inovasi Terbaru Disdukcapil Majalengka</p>

        <?php foreach ($inovasi as $inov) : ?>
          <div class="col-lg-6 col-xxl-5 mb-3">

            <div class="card bg-dark border-0 h-65">
              <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">

                <img src="/img/inovasi/<?= $inov['fotoinovasi']; ?>" class="pt-4 pb-4" alt="" style="width: 65%; height: auto; border-radius: 8px;">
                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="bi bi-collection"></i></div>
                <h2 class="fs-4 fw-bold text-white"><?= $inov['judulinovasi']; ?></h2>
                <p class="mb-0 text-white text-justify"><?= $inov['keteranganinovasi']; ?></p>
                <br>
                <p class="card-text text-white text-justify"><small>Last Updated <?= $inov['created_at']; ?></small></p>

              </div>
            </div>

          </div>
        <?php endforeach; ?>

      </div>
    </div>
  </section>

</div>

<?= $this->endSection(); ?>