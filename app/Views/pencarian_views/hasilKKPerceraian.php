<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container text-black">
  <div class="row">

    <h3 class="text-center fw-semibold">Cek Hasil KK Perceraian Anggota</h3>

    <table class="table text-center table-fixed table-responsive-sm" style="margin-top: 5%;">

      <?php foreach ($pendaftaran_kk_perceraian as $kkperceraian) : ?>

        <thead class="">

        </thead>

        <tbody class="">
          <tr>
            <th>NIK :</th>
            <td><?= $kkperceraian['nik'] ?></td>
          </tr>

          <tr>
            <th>Nama Pemohon :</th>
            <td><?= $kkperceraian['namapemohon'] ?></td>
          </tr>

          <tr>
            <th>Email Pemohon :</th>
            <td><?= $kkperceraian['emailpemohon'] ?></td>
          </tr>

          <tr>
            <th>Nomor Pemohon :</th>
            <td><?= $kkperceraian['nomorpemohon'] ?></td>
          </tr>

          <tr>
            <th>Alamat Pemohon :</th>
            <td><?= $kkperceraian['alamatpemohon'] ?></td>
          </tr>

          <tr>
            <th>Status :</th>
            <td>
              <?php
              switch ($kkperceraian['status']) {
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
            <td><?= $kkperceraian['updated_at'] ?></td>
          </tr>

        </tbody>

      <?php endforeach; ?>

    </table>

  </div>
</div>

<?= $this->endSection('content'); ?>