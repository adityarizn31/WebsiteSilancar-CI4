<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<center>

  <div class="sampulsilancar">
    <div class="mt-4 mb-4">
      <div class="card">
        <img src="/img/silancar/SiLancar.png">
      </div>
    </div>
  </div>

</center>

<div class="container mb-3">
  <div class="row">
    <div class="col">

      <form action="/Searching/cariPelayananData" method="post">

        <?= csrf_field(); ?>

        <div class="row g-2">

          <div class="col-md">
            <div class="form-floating">
              <input type="text" name="keyword" class="form-control text-black" id="floatingInputGrid" autofocus>
              <label for="floatingInputGrid" class="fw-semibold text-black"> Nama Pemohon / NIK </label>
            </div>
          </div>

          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInputDisabled" placeholder="Pendaftaran Kartu Keluarga" disabled>
            <label for="floatingInputDisabled" class="fw-semibold text-black">Pendaftaran Pelayanan Data</label>
          </div>

          <div class="d-grid gap-2 col-6 mx-auto">
            <button type="submit" value="submit" name="submit" id="submit" class="btn btn-primary"> Cek Pendaftaran </button>
          </div>

      </form>

    </div>
  </div>
</div>

<?= $this->endSection('content'); ?>