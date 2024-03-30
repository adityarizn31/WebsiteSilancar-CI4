<?= $this->extend('layout/templateadmin'); ?>

<?= $this->section('contentadmin'); ?>

<section class="p-4" id="main-content">

  <button class="btn btn-primary" id="button-toggle">
    <i class="bi bi-list"></i>
  </button>

  <div class="card shadow mb-4 border-2" style="margin-top: 25px; padding: 20px;">
    <div class="container">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ubah Persyaratan Si Lancar <?= $persyaratansilancar['judulpersyaratan']; ?> </h6>
      </div>

      <form action="/EditUpdateAdmin/updatePersyaratan/<?= $persyaratansilancar['id']; ?>" method="post" enctype="multipart/form-data">

        <?= csrf_field(); ?>

        <?php $validation = \Config\Services::validation(); ?>
        <?php if (session()->has('validation')) : ?>
          <?php $validation = session('validation'); ?>
        <?php endif; ?>

        <input type="hidden" name="fotolama" value="<?= $persyaratansilancar['fotopersyaratan']; ?>">

        <div class="row">
          <div class="mb-3">
            <label for="judulpersyaratan" class="form-label fw-semibold">Judul Persyaratan</label>
            <input type="text" name="judulpersyaratan" id="judulpersyaratan" class="form-control text-black <?= (session('errors.judulpersyaratan')) ? 'is-invalid' : null ?>" autofocus value="<?= (old('judulpersyaratan')) ? old('judulpersyaratan') : $persyaratansilancar['judulpersyaratan'] ?>" ?>
            <div class="invalid-feedback">
              <?= session('errors.judulpersyaratan'); ?>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="mb-3">
            <label for="fotopersyaratan" class="form-label fw-semibold">Foto Persyaratan</label>
            <input type="file" name="fotopersyaratan" id="fotopersyaratan" class="form-control text-black <?= (session('errors.fotopersyaratan')) ? 'is-invalid' : null ?>" value="<?= old('fotopersyaratan'); ?>" onchange="previewImgPersyaratan()">
            <div class="invalid-feedback">
              <?= session('errors.fotopersyaratan'); ?>
            </div>
            <div class="col-sm-2 my-4">
              <img src="/img/persyaratansilancar/<?= $persyaratansilancar['fotopersyaratan']; ?>" class="img-thumbnail img-preview" srcset="">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="mb-3">
            <label for="keteranganpersyaratan" class="form-label fw-semibold">Keterangan Persyaratan</label>
            <br>
            <textarea name="keteranganpersyaratan" id="keteranganpersyaratan" class="form-control text-black text-area <?= (session('errors.keteranganpersyaratan')) ? 'is-invalid' : null ?>"><?= $persyaratansilancar['keteranganpersyaratan']; ?></textarea>
            <div class="invalid-feedback">
              <?= session('errors.keteranganpersyaratan'); ?>
            </div>
          </div>
        </div>


        <div class="d-grid gap-2 col-6 mx-auto">
          <button type="submit" value="submit" name="submit" id="submit" class="btn btn-primary btn-sm">Ubah Persyaratan Si Lancar </button>
        </div>

      </form>

    </div>
  </div>

</section>

<?= $this->endSection('contentadmin'); ?>