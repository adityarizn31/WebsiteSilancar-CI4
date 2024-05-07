<!-- Halaman List Akun Admin  -->

<?= $this->extend('layout/templateadmin'); ?>

<?= $this->section('contentadmin'); ?>

<section class="p-4" id="main-content">

  <button class="btn btn-primary" id="button-toggle">
    <i class="bi bi-list"></i>
  </button>

  <div class="card shadow mb-4 border-2" style="margin-top: 25px;">
    <div class="card-header py-3">
      <div class="d-sm-flex align-items-center justify-content-between" style="padding-top: 10px;">
        <h6 class="m-0 font-weight-bold text-primary">Data Akun Disdukcapil Majalengka</h6>

        <a href="/createAdmin/create_akun_admin/" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Tambah Admin</a>
      </div>

      <div class="card-body">
        <table class="table table-fixed table-hover">

          <thead class="table-dark">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Email</th>
              <th scope="col">Tanggal Pembuatan</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>

          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($users as $adm) : ?>
              <tr>
                <th scope="row1"><?= $i++; ?></th>
                <td><?= $adm['username']; ?></td>
                <td><?= $adm['email']; ?></td>
                <td><?= $adm['created_at']; ?></td>
                <td>
                  <a href="/detailadmin/detail_akun_admin/<?= $adm['username']; ?>" class="btn btn-success btn-sm">Detail</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>

        </table>
      </div>
    </div>

</section>

<?= $this->endSection('contentadmin'); ?>