<!-- Halaman List Akun Admin  -->

<?= $this->extend('layout/templateadmin'); ?>

<?= $this->section('contentadmin'); ?>

<section class="p-4" id="main-content">

  <button class="btn btn-primary" id="button-toggle">
    <i class="bi bi-list"></i>
  </button>

  <div class="card shadow mb-4 border-2" style="margin-top: 25px;">
    <div class="card-header py-3">
      <div class="d-sm-flex align-items-center justify-content-between" style="padding-top: 10px; padding-bottom: 10px;">
        <h4 class="m-0 font-weight-bold text-primary">Data Akun Disdukcapil Majalengka</h4>

        <a href="/createAdmin/create_akun_admin/" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Tambah Admin</a>
      </div>

      <?php if (session('success')) : ?>
        <div class="alert alert-success">
          <?= session('success') ?>
        </div>
      <?php endif; ?>

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

                  <div class="modal fade" id="deleteModal<?= $adm['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?= $adm['id']; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="deleteModalLabel<?= $adm['id']; ?>">Konfirmasi Penghapusan</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Apakah Anda yakin ingin menghapus akun <strong><?= $adm['username']; ?></strong>?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                          <form action="<?= base_url('DeleteAdmin/deleteAkunAdmin/' . $adm['id']); ?>" method="post" class="d-inline">
                            <?= csrf_field(); ?>
                            <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                  <form action="<?= base_url('DeleteAdmin/deleteAkunAdmin/' . $adm['id']); ?>" method="post" class="d-inline">
                    <?= csrf_field(); ?>

                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $adm['id']; ?>">
                      <span class="bi bi-x-square me-2"></span> Hapus
                    </button>

                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>

        </table>
      </div>
    </div>

</section>

<?= $this->endSection('contentadmin'); ?>