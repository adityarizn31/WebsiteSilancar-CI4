<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container text-black">
  <div class="row">

    <h3 class="text-center fw-semibold">Cek Hasil KK</h3>

    <table class="table text-center table-fixed table-responsive-sm" style="margin-top: 5%;">

      <?php foreach ($pendaftaran_kk as $kk) : ?>

        <thead class="">

        </thead>

        <tbody class="">
          <tr>
            <th>NIK :</th>
            <td><?= $kk['nik'] ?></td>
          </tr>

          <tr>
            <th>Nama Pemohon :</th>
            <td><?= $kk['namapemohon'] ?></td>
          </tr>

          <tr>
            <th>Email Pemohon :</th>
            <td><?= $kk['emailpemohon'] ?></td>
          </tr>

          <tr>
            <th>Nomor Pemohon :</th>
            <td><?= $kk['nomorpemohon'] ?></td>
          </tr>

          <tr>
            <th>Alamat Pemohon :</th>
            <td><?= $kk['alamatpemohon'] ?></td>
          </tr>

          <tr>
            <th>Status :</th>
            <td>
              <?php
              switch ($kk['status']) {
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
          </tr>

          <tr>
            <th>Tanggal di Proses :</th>
            <td><?= $kk['updated_at'] ?></td>
          </tr>

        </tbody>

        <!-- <tr>
          <?php if (isset($pendaftaran_kk['formurlirdesa'])) : ?>
            <p><strong>Formulir Desa:</strong> <?= $pendaftaran_kk['formurlirdesa'] ?></p>
          <?php endif; ?>

          <?php if (isset($pendaftaran_kk['kartukeluargasuami'])) : ?>
            <p><strong>Kartu Keluarga Suami:</strong> <?= $pendaftaran_kk['kartukeluargasuami'] ?></p>
          <?php endif; ?>

          <?php if (isset($pendaftaran_kk['kartukeluargaistri'])) : ?>
            <p><strong>Kartu Keluarga Istri:</strong> <?= $pendaftaran_kk['kartukeluargaistri'] ?></p>
          <?php endif; ?>

          <?php if (isset($pendaftaran_kk['suratnikah'])) : ?>
            <p><strong>Surat Nikah:</strong> <?= $pendaftaran_kk['suratnikah'] ?></p>
          <?php endif; ?>

          <?php if (isset($pendaftaran_kk['suratpindah'])) : ?>
            <p><strong>Surat Pindah:</strong> <?= $pendaftaran_kk['suratpindah'] ?></p>
          <?php endif; ?>
        </tr> -->

      <?php endforeach; ?>

    </table>

  </div>
</div>

<?= $this->endSection('content'); ?>