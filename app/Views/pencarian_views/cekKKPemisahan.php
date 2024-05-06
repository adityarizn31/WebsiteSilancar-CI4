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

      <form action="/Searching/cariKKPemisahan" method="POST">

        <?= csrf_field(); ?>

        <?php $validation = \Config\Services::validation(); ?>
        <?php if (session()->has('validation')) : ?>
          <?php $validation = session('validation'); ?>
        <?php endif; ?>

        <div class="row g-2">

          <div class="col-md">
            <div class="form-floating">
              <input type="text" name="keyword" class="form-control text-black" id="floatingInputGrid" autofocus>
              <label for="floatingInputGrid" class="fw-semibold text-black"> NIK </label>
            </div>
            <div class="is-invalid">
              <?= session('errors.nik') ?>
            </div>
          </div>

          <?php if (isset($validation)) : ?>
            <?php if ($validation->getErrors()) : ?>
              <div class="alert alert-danger" role="alert">
                <ul>
                  <?php foreach ($validation->getErrors() as $error) : ?>
                    <li><?= esc($error) ?></li>
                  <?php endforeach ?>
                </ul>
              </div>
            <?php endif ?>
          <?php endif ?>

          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInputDisabled" placeholder="Pendaftaran Kartu Keluarga" disabled>
            <label for="floatingInputDisabled" class="fw-semibold text-black">Pendaftaran Kartu Keluarga Pemisahan</label>
          </div>

          <div class="d-grid gap-2 col-6 mx-auto">
            <button type="submit" value="submit" name="submit" id="submit" class="btn btn-primary"> C E K </button>
          </div>

      </form>

    </div>
  </div>
</div>

<?= $this->endSection('content'); ?>