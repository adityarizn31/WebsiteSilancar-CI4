<?= $this->extend('layout/templateadmin'); ?>

<?= $this->section('contentadmin'); ?>

<section class="p-4" id="main-content">

  <button class="btn btn-primary" id="button-toggle">
    <i class="bi bi-list"></i>
  </button>

  <div class="card shadow mb-4 border-2" style="margin-top: 25px; padding: 20px;">
    <div class="container">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ubah Visi Misi admin</h6>
      </div>

      <form action="/EditUpdateAdmin/updateVisiMisi/<?= $visimisi['id']; ?>" method="post" enctype="multipart/form-data">

        <?= csrf_field(); ?>

        <?php $validation = \Config\Services::validation(); ?>
        <?php if (session()->has('validation')) : ?>
          <?php $validation = session('validation'); ?>
        <?php endif; ?>

        <input type="hidden" name="fotolama" value="<?= $visimisi['fotovisimisi']; ?>">

        <div class="row">
          <div class="mb-3">
            <label for="fotovisimisi" class="form-label fw-semibold">Foto Visi Misi</label>
            <input type="file" name="fotovisimisi" id="fotovisimisi" class="form-control text-black <?= (session('errors.fotovisimisi')) ? 'is-invalid' : null  ?>" autofocus value="<?= old('fotovisimisi'); ?>" onchange="previewImgVisiMisi()">
            <div class="invalid-feedback">
              <?= session('errors.fotovisimisi'); ?>
            </div>
            <div class="col-xxl-4 my-4">
              <img src="/img/visimisi/<?= $visimisi['fotovisimisi']; ?>" class="img-thumbnail img-preview" srcset="">
            </div>
          </div>
        </div>

        <div class="d-grid gap-2 col-6 mx-auto">
          <button type="submit" value="submit" name="submit" id="submit" class="btn btn-primary btn-sm">Ubah Foto Visi Misi</button>
        </div>

      </form>

    </div>
  </div>

</section>

<?= $this->endSection('contentadmin'); ?>