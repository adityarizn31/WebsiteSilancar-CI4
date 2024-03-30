<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="sampul">

  <div class="container">
    <div class="row">

      <div class="col" style="padding: 20px;">

        <div class="row">

          <div class="col-sm-6 mb-3 mb-sm-0 text-black">
            <div class="card" style="border: none; border: 0; outline: none; box-shadow: none;">
              <div class="card-body">
                <h5 class="card-title text-black fw-semibold">Selamat Datang</h5>
                <p class="text-justify">Si Lancar (Sistem Layanan Administrasi Cepat dari Rumah) Situs ini digunakan untuk melayani masyarakat yang bertujuan untuk mempercepat pelayanan, memudahkan pelayanan dan mewujudkan pelayanan Administrasi Kependudukan yang membahagiakan masyarakat.</p>
                <a href="/PelayananSilancar/" class="btn btn-primary">Pelayanan Si Lancar</a>
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

<?= $this->endSection(); ?>