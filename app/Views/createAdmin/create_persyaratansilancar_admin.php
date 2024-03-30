<?= $this->extend('layout/templateadmin'); ?>

<?= $this->section('contentadmin'); ?>

<section class="p-4" id="main-content">

  <button class="btn btn-primary" id="button-toggle">
    <i class="bi bi-list"></i>
  </button>

  <div class="card shadow mb-4 border-2 outline hover:outline-dashed" style="margin-top: 25px; padding: 20px;">
    <div class="container">

      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Persyaratan Si Lancar Admin</h6>
      </div>

      <form action="/CreateAdmin/savePersyaratanSilancar" method="post" enctype="multipart/form-data">

        <?= csrf_field(); ?>

        <?php $validation = \Config\Services::validation(); ?>
        <?php if (session()->has('validation')) : ?>
          <?php $validation = session('validation'); ?>
        <?php endif; ?>

        <div class="row">
          <div class="mb-3">
            <label for="judulpersyaratan" class="form-label fw-semibold">Judul Persyaratan Si Lancar</label>
            <input type="text" name="judulpersyaratan" id="judulpersyaratan" class="form-control text-black <?= (session('errors.judulpersyaratan')) ? 'is-invalid' : null ?>" autofocus value="<?= old('judulpersyaratan'); ?>">
            <div class="invalid-feedback">
              <?= session('errors.judulpersyaratan'); ?>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="mb-3">
            <label for="fotopersyaratan" class="form-label fw-semibold">Foto Persyaratan Si Lancar</label>
            <input type="file" name="fotopersyaratan" id="fotopersyaratan" class="form-control text-black <?= (session('errors.fotopersyaratan')) ? 'is-invalid' : null ?>" value="<?= old('fotopersyaratan'); ?>" onchange="previewImgPersyaratan()">
            <div class="invalid-feedback">
              <?= session('errors.fotopersyaratan'); ?>
            </div>
            <div class="col-sm-2 my-4">
              <img src="/img/inovasi/inovasidef.PNG" class="img-thumbnail img-preview" srcset="">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="mb-3">
            <label for="keteranganpersyaratan" class="form-label fw-semibold">Keterangan Persyaratan Si Lancar</label>
            <br>
            <textarea name="keteranganpersyaratan" id="keteranganpersyaratan" class="form-control text-area text-black <?= (session('errors.keteranganpersyaratan')) ? 'is-invalid' : null ?>" value="<?= old('keteranganpersyaratan'); ?>"></textarea>
            <div class="invalid-feedback">
              <?= session('errors.keteranganpersyaratan'); ?>
            </div>
          </div>
        </div>

        <div class="d-grid gap-2 col-6 mx-auto">
          <button type="submit" class="btn btn-primary">Tambah Persyaratan Si Lancar</button>
        </div>

      </form>

    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col">

        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Preview Persyaratan Si Lancar</h6>
        </div>

        <img src="/img/default/v_Persyaratan.jpg" alt="Preview Persyaratan" srcset="" style="width: 100%; height: 100%;">

      </div>
    </div>
  </div>

</section>

<?= $this->endSection('contentadmin'); ?>