<!-- Halaman Detail Inovasi Admin -->
<?= $this->extend('layout/templateadmin'); ?>

<?= $this->section('contentadmin'); ?>

<section class="p-4" id="main-content">

  <button class="btn btn-primary" id="button-toggle">
    <i class="bi bi-list"></i>
  </button>

  <div class="card show mb-4 border-2" style="margin-top: 25px;">

    <div class="card-header py-3 border-0">
      <h6 class="m-0 font-weight-bold text-primary">Detail Inovasi</h6>
    </div>

    <div class="container">
      <div class="row">
        <div class="col">

          <div class="card mb-3">
            <center>
              <img src="/img/inovasi/<?= $inovasi['fotoinovasi']; ?>" style="width: 50%;" class="detail_inovasi mt-3" alt="Foto Inovasi">
            </center>
            <div class="card-body mt-2">

              <h5 class="card-title"><?= $inovasi['judulinovasi']; ?></h5>
              <p class="card-text"><?= $inovasi['keteranganinovasi']; ?></p>
              <p class="card-text"><small class="text-body-secondary"><?= $inovasi['created_at']; ?></small></p>

              <a href="/EditUpdateAdmin/editInovasi/<?= $inovasi['judulinovasi']; ?>" class="btn btn-warning">Edit</a>

              <form action="/DeleteAdmin/deleteInovasi/<?= $inovasi['id']; ?>" method="post" class="d-inline">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin ingin dihapus ?? '); ">Delete</button>
              </form>

              <br><br><a class="" href="/admin/inovasi_admin">kembali ke Daftar Inovasi</a>

            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

</section>

<?= $this->endSection('contentadmin'); ?>