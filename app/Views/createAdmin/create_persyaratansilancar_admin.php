<!-- Halaman Tambah Inovasi Admin -->

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

        <!-- Keamanan -->
        <?= csrf_field(); ?>

        <!-- Form Judul Persyaratan Si Lancar -->
        <div class="row">
          <div class="mb-3">
            <label for="judulpersyaratan" class="form-label fw-semibold">Judul Persyaratan Si Lancar</label>
            <input type="text" class="form-control <?= ($validation->hasError('judulpersyaratan')) ? 'is-invalid' : ''; ?>" name="judulpersyaratan" id="judulpersyaratan" autofocus value="<?= old('judulpersyaratan'); ?>">
            <div class="invalid-feedback">
              <?= $validation->getError('judulpersyaratan'); ?>
            </div>
          </div>
        </div>

        <!-- Form Foto Persyaratan Si Lancar -->
        <div class="row">
          <div class="mb-3">
            <label for="fotopersyaratan" class="form-label fw-semibold">Foto Persyaratan Si Lancar</label>
            <input type="file" class="form-control <?= ($validation->hasError('fotopersyaratan')) ? 'is-invalid' : ''; ?>" name="fotopersyaratan" id="fotopersyaratan" value="<?= old('fotopersyaratan'); ?>" onchange="previewImgPersyaratan()">
            <div class="invalid-feedback">
              <?= $validation->getError('fotopersyaratan'); ?>
            </div>
            <div class="col-sm-2 my-4">
              <img src="/img/inovasi/inovasidef.PNG" class="img-thumbnail img-preview" srcset="">
            </div>
          </div>
        </div>

        <!-- Form Keterangan Inovasi -->
        <div class="row">
          <div class="mb-3">
            <label for="keteranganpersyaratan" class="form-label fw-semibold">Keterangan Persyaratan Si Lancar</label>
            <br>
            <textarea class=" form-control text-area <?= ($validation->hasError('keteranganpersyaratan')) ? 'is-invalid' : '' ?>" name="keteranganpersyaratan" id="keteranganpersyaratan" value="<?= old('keteranganpersyaratan'); ?>"></textarea>
            <div class="invalid-feedback">
              <?= $validation->getError('keteranganpersyaratan'); ?>
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