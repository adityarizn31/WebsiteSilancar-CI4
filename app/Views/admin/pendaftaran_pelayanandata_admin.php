  <?= $this->extend('layout/templateadmin'); ?>

  <?= $this->section('contentadmin'); ?>

  <section class="p-4" id="main-content">

    <button class="btn btn-primary" id="button-toggle">
      <i class="bi bi-list"></i>
    </button>

    <div class="card shadow mb-4" style="margin-top: 25px;">

      <div class="card-header py-3">

        <div class="d-sm-flex align-items-center justify-content-between mb-2">
          <h4 class="m-0 font-weight-bold text-primary">Data Pendaftaran Pelayanan Data Inovasi Antar Lembaga</h4>
          <a href="<?= base_url('/DeleteAdmin/dataSelesaiPelayananData'); ?>" method="POST" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mt-2"><i></i> Data Selesai Proses </a>
        </div>

        <?php if (session()->getFlashdata('pesan')) : ?>

          <?php
          $pesan = session()->getFlashdata('pesan');

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
      usort($pendaftaran_pelayanandata, function ($a, $b) {
        return strtotime($b['created_at']) - strtotime($a['created_at']);
      });
      ?>

        <table class="table table-fixed table-hover">
          <thead class="table-dark">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Pemohon</th>
              <th scope="col">Email Pemohon</th>
              <th scope="col">Permohonan</th>
              <th scope="col">Waktu</th>
              <th scope="col">Status</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>

          <tbody>
            <?php $i = 1 + (10 * ($currentPage - 1)); ?>
            <?php foreach ($pendaftaran_pelayanandata as $peldat) : ?>
              <tr>
                <th scope="row"><?= $i++; ?></th>
                <td><?= $peldat['namapemohon']; ?></td>
                <td><?= $peldat['emailpemohon']; ?></td>
                <td>Pelayanan Data</td>
                <td><?= $peldat['created_at']; ?></td>
                <td>
                  <?php
                  switch ($peldat['status']) {
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

                  <form action="<?= base_url('/DetailAdmin/detail_pendaftaranpelayananpemanfaatandata_admin/' . $peldat['namapemohon']); ?>" method="post" class="d-inline">
                    <?= csrf_field(); ?>
                    <button class="btn btn-primary btn-sm" data-placement="top" title="Tandai Selesai">
                      <span class="bi bi-folder2-open me-2"></span>Detail
                    </button>
                  </form>

                  <button class="btn btn-success btn-sm">
                    <a href="https://api.whatsapp.com/send/?phone=<?= $peldat['nomorpemohon'] ?>&text=Assalamu%27alaikum%2C+perkenalkan+nama+saya.....&type=phone_number&app_absent=0" class="bi bi-whatsapp text-white" data-placement="top" title="Kirim Whatsapp"> Kirim WA</a>
                  </button>

                  <form action="<?= base_url('DeleteAdmin/tandaiSelesaiPelayananData/' . $peldat['id']); ?>" method="post" class="d-inline">
                    <?= csrf_field(); ?>
                    <?php if ($peldat['status'] === 'Belum di Proses') : ?>
                      <button type="button" class="btn btn-danger btn-sm" data-placement="top" title="Tandai Selesai" disabled>
                        <span class="bi bi-check-square-fill me-2"></span>Tandai Selesai
                      </button>
                    <?php elseif ($peldat['status'] === 'Gagal Verifikasi' || $peldat['status'] === 'Selesai Verifikasi') : ?>
                      <button class="btn btn-danger btn-sm" data-placement="top" title="Tandai Selesai">
                        <span class="bi bi-check-square-fill me-2"></span>Tandai Selesai
                      </button>
                    <?php endif; ?>
                  </form>

                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>

        </table>
        <?= $pager->links('pendaftaran_pelayanandata', 'pelayanandata_pagination'); ?>
      </div>
    </div>

  </section>

  <?= $this->endSection('contentadmin'); ?>