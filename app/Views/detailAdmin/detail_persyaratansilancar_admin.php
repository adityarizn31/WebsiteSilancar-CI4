<!-- Halaman Detail Berita Admin -->
<?= $this->extend('layout/templateadmin'); ?>

<?= $this->section('contentadmin'); ?>

<section class="p-4" id="main-content">

  <button class="btn btn-primary" id="button-toggle">
    <i class="bi bi-list"></i>
  </button>

  <div class="card shadow mb-4 border-2" style="margin-top: 25px;">

    <div class="card-header py-3 border-0">
      <h6 class="m-0 font-weight-bold text-primary">Detail Persyaratan Si Lancar</h6>
    </div>

    <div class="container">
      <div class="row">
        <div class="col">

          <div class="card mb-3">
            <center>
              <img src="/img/persyaratansilancar/<?= $persyaratansilancar['fotopersyaratan']; ?>" style="width: 50%;" class="detail_berita mt-3" alt="Foto Persyaratan">
            </center>
            <div class="card-body mt-2">

              <h5 class="card-title"><?= $persyaratansilancar['judulpersyaratan']; ?></h5>
              <p class="card-text"><?= $persyaratansilancar['keteranganpersyaratan']; ?></p>
              <p class="card-text"><small class="text-body-secondary"><?= $persyaratansilancar['created_at']; ?></small></p>

              <a href="/EditUpdateAdmin/editPersyaratan/<?= $persyaratansilancar['judulpersyaratan']; ?>" class="btn btn-warning">Edit</a>

              <form action="/DeleteAdmin/deletePersyaratan/<?= $persyaratansilancar['id']; ?>" method="post" class="d-inline">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin ingin dihapus ?? ');">Delete</button>
              </form>

              <!-- Kodingan Sukses Dihapus -->
              <!-- <a href="/admin/deleteBerita/<?= $persyaratansilancar['id']; ?>" class="btn btn-danger">Delete</a> -->

              <br><br><a class="" href="/Admin/persyaratansilancar_admin">kembali ke Daftar Persyaratan Si Lancar</a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

</section>

<?= $this->endSection('contentadmin'); ?>