<?= $this->extend('layout/templateadmin'); ?>

<?= $this->section('contentadmin'); ?>

<section class="p-4" id="main-content">

  <button class="btn btn-primary" id="button-toggle">
    <i class="bi bi-list"></i>
  </button>

  <div class="card shadow mb-4 border-2" style="margin-top: 25px;">

    <div class="card-header py-3">

      <div class="d-sm-flex align-items-center justify-content-between" style="padding-top: 10px;">
        <h4 class="m-0 font-weight-bold text-primary"> Persyaratan Si Lancar </h4>

        <a href="/CreateAdmin/create_persyaratansilancar_admin/" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Tambah Persyaratan Si Lancar</a>
      </div>

    </div>

    <div class="container mt-4">
      <div class="row">
        <div class="col">

          <?php if (session()->getFlashdata('pesan')) : ?>

            <div class="alert alert-success" role="alert">
              <?= session()->getFlashdata('pesan'); ?>
            </div>

          <?php endif; ?>

        </div>
      </div>
    </div>

    <div class="card-body">
      <table class="table table-fixed table-hover">

        <thead class="table-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Foto Persyaratan</th>
            <th scope="col">Judul Persyaratan</th>
            <th scope="col">Keterangan Persyaratan</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>

        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($persyaratansilancar as $silancar) : ?>
            <tr>
              <th scope="row"><?= $i++; ?></th>
              <td><img src="/img/persyaratansilancar/<?= $silancar['fotopersyaratan']; ?>" class="foto_persyaratan" alt="Foto Persyaratan" style="width: 70%; height: auto;"></td>
              <td><?= $silancar['judulpersyaratan']; ?></td>
              <td><?= $silancar['keteranganpersyaratan']; ?></td>
              <td>
                <a href="/DetailAdmin/detail_persyaratansilancar_admin/<?= $silancar['judulpersyaratan']; ?>" class="btn btn-success btn-sm">Detail</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>

      </table>

    </div>
  </div>

</section>

<?= $this->endSection('contentadmin'); ?>