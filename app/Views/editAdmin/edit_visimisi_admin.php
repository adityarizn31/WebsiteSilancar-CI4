<!-- Halaman Ubah Berita Admin -->

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

      <!-- Diarahkan ke Method baru yang terdapat dalam Controller EditUpdateAdmin -->
      <form action="/EditUpdateAdmin/updateVisiMisi/<?= $visimisi['id']; ?>" method="post" enctype="multipart/form-data">

        <!-- Keamanan -->
        <?= csrf_field(); ?>

        <input type="hidden" name="fotolama" value="<?= $visimisi['fotovisimisi']; ?>">

        <!-- Form Upload File -->
        <div class="row">
          <div class="mb-3">
            <label for="fotovisimisi" class="form-label fw-semibold">Foto Visi Misi</label>
            <input type="file" class="form-control <?= ($validation->hasError('fotovisimisi')) ? 'is-invalid' : '';  ?>" name="fotovisimisi" id="fotovisimisi" value="<?= old('fotovisimisi'); ?>" onchange="previewImgVisiMisi()">
            <div class="invalid-feedback">
              <?= $validation->getError('fotovisimisi'); ?>
            </div>
            <div class="col-xxl-4 my-4">
              <img src="/img/visimisi/<?= $visimisi['fotovisimisi']; ?>" class="img-thumbnail img-preview" srcset="">
            </div>
          </div>
        </div>

        <div class="d-grid gap-2 col-6 mx-auto">
          <button type="submit" value="submit" name="submit" id="submit" class="btn btn-primary">Ubah Foto Visi Misi</button>
        </div>

      </form>

    </div>
  </div>

</section>

<?= $this->endSection('contentadmin'); ?>