<?= $this->extend('layout/templateadmin'); ?>

<?= $this->section('contentadmin'); ?>

<section class="p-4" id="main-content">

  <button class="btn btn-primary" id="button-toggle">
    <i class="bi bi-list"></i>
  </button>

  <div class="card shadow mb-4" style="margin-top: 25px;">

    <div class="card-header py-3">
      <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h4 class="m-0 font-weight-bold text-primary">Data Pendaftaran KTP</h4>
        <a href="<?= base_url('ExportExcel/export_pendaftaranktp') ?>" method="POST" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mt-2"><i class="fas fa-download fa-sm text-white-50"></i> Downloads Data</a>
      </div>
    </div>

    <form action="" method="post">
      <div class="col-6">
        <div class="input-group mb-3 mt-3 ms-3">
          <input type="text" class="form-control" placeholder="Masukan Nama ..." name="keyword">
          <div class="input-group-append">
            <button type="submit" class="btn btn-outline-secondary" name="submit">Cari</button>
          </div>
        </div>
      </div>
    </form>

    <div class="card-body">

      <table class="table table-fixed table-hover table-responsive">

        <thead class="table-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Pemohon</th>
            <th scope="col">Email Pemohon</th>
            <th scope="col">No Whatsapp</th>
            <th scope="col">Permohonan</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>

        <tbody>
          <?php $i = 1 + (10 * ($currentPage - 1)); ?>
          <?php foreach ($pendaftaran_ktp as $ktp) :  ?>
            <tr>
              <th scope="row"><?= $i++; ?></th>
              <td><?= $ktp['namapemohon']; ?></td>
              <td><?= $ktp['emailpemohon']; ?></td>
              <td><?= $ktp['nomorpemohon']; ?></td>
              <td>Pendaftaran KTP</td>
              <td>
                <a href="/DetailAdmin/detail_pendaftaranktp_admin/<?= $ktp['namapemohon']; ?>" class="btn btn-success">Detail</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>

      </table>
      <?= $pager->links('pendaftaran_ktp', 'ktp_pagination'); ?>
    </div>
  </div>

</section>

<?= $this->endSection('contentadmin'); ?>