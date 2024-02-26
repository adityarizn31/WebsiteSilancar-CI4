<?= $this->extend('layout/templateadmin'); ?>

<?= $this->section('contentadmin'); ?>

<section class="p-4" id="main-content">

  <button class="btn btn-primary" id="button-toggle">
    <i class="bi bi-list"></i>
  </button>

  <div class="card shadow mb-4 border-2" style="margin-top: 25px; padding: 20px;">

    <div class="card-header py-3">
      <div class="d-sm-flex align-items-center justify-content-between" style="padding-top:10px;"></div>
      <h6 class="m-0 font-weight-bold text-primary">Buat Akun Admin</h6>
    </div>

    <form action="/createadmin/saveAkun" method="post" enctype="multipart/form-data">

      <!-- Keamanan -->
      <?= csrf_field(); ?>

      <div class="card-body">
        <div class="row">

          <!-- Nama -->
          <div class="col-sm-6">
            <div class="form-group">
              <label for="nama" class="form-label fw-semibold">Nama</label>
              <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : '';  ?>" name="naama" id="nama" autofocus value="<?= old('nama');  ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('nama'); ?>
              </div>
            </div>
          </div>

          <!-- Email -->
          <div class="col-sm-6">
            <div class="form-group">
              <label for="email" class="form-label fw-semibold">Email</label>
              <input type="email" class="form-control" <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?> name="email" id="email" value="<?= old('email'); ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('email'); ?>
              </div>
            </div>
          </div>

          <!-- Password -->
          <div class="col-sm-6">
            <div class="form-group">
              <label for="email" class="form-label fw-semibold">Password</label>
              <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" name="password" id="password">
              <div class="invalid-feedback">
                <?= $validation->getError('password'); ?>
              </div>
            </div>
          </div>

          <!-- Semester  -->
          <div class="col-sm-6">
            <div class="mb-3">
              <label for="level" class="form-label fw-semibold">Level</label>
              <select class="form-control <?= ($validation->hasError('level')) ? 'is-invalid' : ''; ?>" name="level" id="level">
                <option value="Pilih Level"> -- Pilih Level --</option>
                <option value="Admin">Admin</option>
                <option value="SuperAdmin">Super Admin</option>
                <div class="invalid-feedback">
                  <?= $validation->getError('level'); ?>
                </div>
              </select>
            </div>
          </div>

          <!-- Form Upload File -->
          <div class="col-sm-6">
            <div class="mb-3">
              <label for="foto_admin" class="form-label fw-semibold">Foto Berita</label>
              <input type="file" class="form-control <?= ($validation->hasError('foto_admin')) ? 'is-invalid' : ''; ?>" name="foto_admin" id="foto_admin" value="<?= old('foto_admin'); ?>" onchange="previewImgBerita()">
              <div class="invalid-feedback">
                <?= $validation->getError('foto_admin'); ?>
              </div>
              <div class="col-sm-2 my-4">
                <img src="/img/berita/beritadef.PNG" class="img-thumbnail img-preview" srcset="">
              </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Tambah Akun</button>
            </div>
          </div>

        </div>
      </div>

    </form>

  </div>

</section>

<?= $this->endSection('contentadmin'); ?>