<?= $this->extend('layout/templateadmin'); ?>

<?= $this->section('contentadmin'); ?>

<section class="p-4" id="main-content">

  <button class="btn btn-primary" id="button-toggle">
    <i class="bi bi-list"></i>
  </button>

  <div class="card shadow mb-4" style="margin-top: 25px;">

    <div class="card-header py-3">

      <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h4 class="m-0 font-weight-bold text-primary">Data Pendaftaran Selesai Permohonan Kartu Keluarga Pemisahan</h4>
        <a href="<?= base_url('ExportExcel/exportKKPemisahan'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mt-2"><i class="bi bi-download text-white"></i> Export Excel </a>
      </div>

      <div class="d-sm-flex align-items-center justify-content-end mb-2">
        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalHapusSeluruh"> Hapus Seluruh Data </button>
      </div>

      <div class="modal fade" id="modalHapusSeluruh" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title fw-semibold" id="modalHapusLabel">Hapus Keseluruhan Data Kartu Keluarga Penambahan</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Apakah Anda yakin ingin menghapus Keseluruhan data Kartu Keluarga ?
              <br>
              Dan apakah sudah mengirimkan email kepada setiap Pendaftar ??
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <form action="<?= base_url('DeleteAdmin/DeletePermanentKKPemisahan/'); ?>" method="post">
                <?= csrf_field(); ?>
                <button type="submit" class="btn btn-danger">Hapus</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <?php if (session()->getFlashdata('pesan')) : ?>

        <?php
        $pesan = session()->getFlashdata('pesan');

        if ($pesan == 'Pendaftaran Permohonan Kartu keluarga Pemisahan telah dihapus !!') {
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
      usort($pendaftaran_kk_pemisahan, function ($a, $b) {
        return strtotime($b['deleted_at']) - strtotime($a['deleted_at']);
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
          <?php foreach ($pendaftaran_kk_pemisahan as $kkpemisahan) : ?>
            <tr>
              <th scope="row"><?= $i++; ?></th>
              <td><?= $kkpemisahan['namapemohon']; ?></td>
              <td><?= $kkpemisahan['emailpemohon']; ?></td>
              <td><?= $kkpemisahan['nomorpemohon']; ?></td>
              <td>Pendaftaran KK Pemisahan</td>
              <td><?= $kkpemisahan['created_at']; ?></td>
              <td>
                <?php
                switch ($kkpemisahan['status']) {
                  case 'Selesai Verifikasi':
                    echo '<span class="badge bg-success"> Selesai Verifikasi </span>';
                    break;
                  case 'Belum di Proses':
                    echo '<span class="badge bg-warning"> Belum di Proses </span>';
                    break;
                  case 'Gagal Verifikasi':
                    echo '<span class="badge bg-danger"> Gagal Verifikasi </span>';
                    break;
                }
                ?>
              </td>
              <td>
                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $kkpemisahan['id']; ?>">
                  Hapus
                </button>

                <div class="modal fade" id="modalHapus<?= $kkpemisahan['id']; ?>" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalHapusLabel">Hapus Data KK Pemisahan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Apakah Anda yakin ingin menghapus data KK Pemisahan dengan nama pemohon <strong><?= $kkpemisahan['namapemohon']; ?></strong>?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <form action="<?= base_url('DeleteAdmin/deletePermanentKKPemisahan/' . $kkpemisahan['id']); ?>" method="post">
                          <?= csrf_field(); ?>
                          <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </td>

            </tr>
          <?php endforeach; ?>
        </tbody>

      </table>

    </div>
  </div>

</section>

<?= $this->endSection('contentadmin'); ?>