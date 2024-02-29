<?= $this->extend('layout/templateadmin'); ?>

<?= $this->section('contentadmin'); ?>

<section class="p-4" id="main-content">

  <button class="btn btn-primary" id="button-toggle">
    <i class="bi bi-list"></i>
  </button>

  <div class="card shadow mb-4" style="margin-top: 25px;">

    <div class="card-header py-3">

      <div class="d-sm-flex aslign-items-center justify-content-between mb-2">
        <h4 class="m-0 font-weight-bold text-primary">Data Pendaftaran Permohonan Kartu Keluarga Baru</h4>
        <a href="<?= base_url('/DeleteAdmin/dataSelesaiKK'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mt-2"><i></i> Data Selesai Proses </a>
      </div>

      <div class="d-sm-flex align-items justify-content-end mb-2">

      </div>

      <?php if (session()->getFlashdata('pesan')) : ?>

        <?php
        $pesan = session()->getFlashdata('pesan');

        // Jika status = Selesai
        if ($pesan == 'Pendaftaran Telah Selesai di Verifikasi !!') {
          $class = 'alert-success';
        } else {
          $class = 'alert-danger';
        }
        ?>

        <div class="alert <?= $class ?>" role="alert">
          <?= $pesan; ?>
        </div>

      <?php endif; ?>

    </div>

    <div class="card-body">

      <?php
      // Custom sorting function based on the 'created_at' field
      usort($pendaftaran_kk, function ($a, $b) {
        return strtotime($b['created_at']) - strtotime($a['created_at']);
      });
      ?>

      <table class="table table-fixed table-hover">

        <thead class="table-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Pemohon</th>
            <th scope="col">Email Pemohon</th>
            <th scope="col">No Whatsapp</th>
            <th scope="col">Permohonan</th>
            <th scope="col">Waktu</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>

        <tbody>
          <?php $i = 1 + (10 * ($currentPage - 1)); ?>
          <?php foreach ($pendaftaran_kk as $kk) : ?>
            <tr>
              <th scope="row"><?= $i++; ?></th>
              <td><?= $kk['namapemohon']; ?></td>
              <td><?= $kk['emailpemohon']; ?></td>
              <td><?= $kk['nomorpemohon']; ?></td>
              <td>Pendaftaran KK</td>
              <td><?= $kk['created_at']; ?></td>
              <td>
                <?php
                switch ($kk['status']) {
                  case 'Selesai':
                    echo '<span class="badge rounded-pill bg-success">Terverifikasi</span>';
                    break;
                  case 'Belum di Proses':
                    echo '<span class="badge rounded-pill bg-warning">Belum di Proses</span>';
                    break;
                  case 'Belum Selesai':
                    echo '<span class="badge rounded-pill bg-danger">Ditolak</span>';
                    break;
                }
                ?>
              </td>
              <td>
                <a href="/DetailAdmin/detail_pendaftarankk_admin/<?= $kk['namapemohon']; ?>" class="btn btn-success btn-sm">Detail</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>

      </table>
      <?= $pager->links('pendaftaran_kk', 'kk_pagination'); ?>
    </div>
  </div>

</section>

<?= $this->endSection('contentadmin'); ?>