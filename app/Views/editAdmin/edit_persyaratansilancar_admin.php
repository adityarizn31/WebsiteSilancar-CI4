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
        <h6 class="m-0 font-weight-bold text-primary">Ubah Persyaratan Si Lancar <?= $persyaratansilancar['judulpersyaratan']; ?></h6>
      </div>

      <!-- Diarahkan ke Method baru yang terdapat dalam Controller EditUpdateAdmin -->
      <form action="/EditUpdateAdmin/updatePersyaratan/<?= $persyaratansilancar['id']; ?>" method="post" enctype="multipart/form-data">

        <!-- Keamanan -->
        <?= csrf_field(); ?>

        <input type="hidden" name="fotolama" value="<?= $persyaratansilancar['fotopersyaratan']; ?>">

        <!-- Form Judul Berita -->
        <div class="row">
          <div class="mb-3">
            <label for="judulpersyaratan" class="form-label fw-semibold">Judul Persyaratan</label>
            <input type="text" class="form-control <?= ($validation->hasError('judulpersyaratan')) ? 'is-invalid' : ''; ?>" name="judulpersyaratan" id="judulpersyaratan" autofocus value="<?= (old('judulpersyaratan')) ? old('judulpersyaratan') : $persyaratansilancar['judulpersyaratan'] ?>" ?>
            <div class="invalid-feedback">
              <?= $validation->getError('judulpersyaratan'); ?>
            </div>
          </div>
        </div>

        <!-- Form Upload File -->
        <div class="row">
          <div class="mb-3">
            <label for="fotopersyaratan" class="form-label fw-semibold">Foto Persyaratan</label>
            <input type="file" class="form-control <?= ($validation->hasError('fotopersyaratan')) ? 'is-invalid' : ''; ?>" name="fotopersyaratan" id="fotopersyaratan" value="<?= old('fotopersyaratan'); ?>" onchange="previewImgPersyaratan()">
            <div class="invalid-feedback">
              <?= $validation->getError('fotopersyaratan'); ?>
            </div>
            <div class="col-sm-2 my-4">
              <img src="/img/persyaratansilancar/<?= $persyaratansilancar['fotopersyaratan']; ?>" class="img-thumbnail img-preview" srcset="">
            </div>
          </div>
        </div>

        <!-- Form Keterangan Berita -->
        <div class="row">
          <div class="mb-3">
            <label for="keteranganpersyaratan" class="form-label fw-semibold">Keterangan Persyaratan</label>
            <br>
            <textarea name="keteranganpersyaratan" id="keteranganpersyaratan" class="form-control text-area <?= ($validation->hasError('keteranganpersyaratan')) ? 'is-invalid' : ''; ?>" value="<?= $persyaratansilancar['keteranganpersyaratan']; ?>"></textarea>
            <div class="invalid-feedback">
              <?= $validation->getError('keteranganpersyaratan'); ?>
            </div>
          </div>
        </div>

        <div class="d-grid gap-2 col-6 mx-auto">
          <button type="submit" value="submit" name="submit" id="submit" class="btn btn-primary">Ubah Persyaratan Si Lancar </button>
        </div>

      </form>

    </div>
  </div>

</section>

<?= $this->endSection('contentadmin'); ?>