<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container text-black">
  <div class="row">

    <h3 class="text-center fw-semibold">Cek Hasil Pelayanan Pemanfaatan Data Inovasi Antar Lembaga</h3>

    <table class="table text-center table-fixed table-responsive-sm" style="margin-top: 5%;">

      <?php foreach ($perbaikan_data as $perdat) : ?>

        <thead class="">

        </thead>

        <tbody class="">
          <tr>
            <th>NIK :</th>
            <td><?= $perdat['nik'] ?></td>
          </tr>

          <tr>
            <th>Nama Pemohon :</th>
            <td><?= $perdat['namapemohon'] ?></td>
          </tr>

          <tr>
            <th>Email Pemohon :</th>
            <td><?= $perdat['emailpemohon'] ?></td>
          </tr>

          <tr>
            <th>Nomor Pemohon :</th>
            <td><?= $perdat['nomorpemohon'] ?></td>
          </tr>

          <tr>
            <th>Alamat Pemohon :</th>
            <td><?= $perdat['alamatpemohon'] ?></td>
          </tr>

          <tr>
            <th>Status :</th>
            <td>
              <?php
              switch ($perdat['status']) {
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
            <td><?= $perdat['updated_at'] ?></td>
          </tr>

        </tbody>

      <?php endforeach; ?>

    </table>

  </div>
</div>

<?= $this->endSection('content'); ?>