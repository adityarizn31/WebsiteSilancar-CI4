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
        <h6 class="m-0 font-weight-bold text-primary">Tambah Inovasi Admin</h6>
      </div>

      <form action="/createadmin/saveInovasi" method="post" enctype="multipart/form-data">

        <!-- Keamanan -->
        <?= csrf_field(); ?>

        <!-- Form Judul Inovasi -->
        <div class="row">
          <div class="mb-3">
            <label for="judulinovasi" class="form-label fw-semibold">Judul Inovasi</label>
            <input type="text" class="form-control <?= ($validation->hasError('judulinovasi')) ? 'is-invalid' : ''; ?>" name="judulinovasi" id="judulinovasi" autofocus value="<?= old('judulinovasi'); ?>">
            <div class="invalid-feedback">
              <?= $validation->getError('judulinovasi'); ?>
            </div>
          </div>
        </div>

        <!-- Form Foto Inovasi -->
        <div class="row">
          <div class="mb-3">
            <label for="fotoinovasi" class="form-label fw-semibold">Foto Inovasi</label>
            <input type="file" class="form-control <?= ($validation->hasError('fotoinovasi')) ? 'is-invalid' : ''; ?>" name="fotoinovasi" id="fotoinovasi" value="<?= old('fotoinovasi'); ?>" onchange="previewImgInovasi()">
            <div class="invalid-feedback">
              <?= $validation->getError('fotoinovasi'); ?>
            </div>
            <div class="col-sm-2 my-4">
              <img src="/img/inovasi/inovasidef.PNG" class="img-thumbnail img-preview" srcset="">
            </div>
          </div>
        </div>

        <!-- Form Keterangan Inovasi -->
        <div class="row">
          <div class="mb-3">
            <label for="keteranganinovasi" class="form-label fw-semibold">Keterangan Inovasi</label>
            <br>
            <textarea class=" form-control text-area <?= ($validation->hasError('keteranganinovasi')) ? 'is-invalid' : '' ?>" name="keteranganinovasi" id="keteranganinovasi" value="<?= old('keteranganinovasi'); ?>"></textarea>
            <div class="invalid-feedback">
              <?= $validation->getError('keteranganinovasi'); ?>
            </div>
          </div>
        </div>

        <div class="d-grid gap-2 col-6 mx-auto">
          <button type="submit" class="btn btn-primary">Tambah Inovasi</button>
        </div>

      </form>

    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col">

        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Preview Inovasi</h6>
        </div>

        <img src="/img/default/v_Inovasi.jpg" alt="Preview Berita" srcset="" style="width: 100%; height: 100%;">
      </div>
    </div>
  </div>

</section>

<?= $this->endSection('contentadmin'); ?>