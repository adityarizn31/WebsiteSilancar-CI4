<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container text-black">
  <div class="row">

    <h3 class="text-center fw-semibold">Cek Hasil Keabsahan Akta Kelahiran</h3>

    <table class="table text-center table-fixed table-responsive-sm" style="margin-top: 5%;">

      <?php foreach ($pendaftaran_keabsahanakla as $keabsahanakla) : ?>

        <thead class="">

        </thead>

        <tbody class="">
          <tr>
            <th>NIK :</th>
            <td><?= $keabsahanakla['nik'] ?></td>
          </tr>

          <tr>
            <th>Nama Pemohon :</th>
            <td><?= $keabsahanakla['namapemohon'] ?></td>
          </tr>

          <tr>
            <th>Email Pemohon :</th>
            <td><?= $keabsahanakla['emailpemohon'] ?></td>
          </tr>

          <tr>
            <th>Nomor Pemohon :</th>
            <td><?= $keabsahanakla['nomorpemohon'] ?></td>
          </tr>

          <tr>
            <th>Alamat Pemohon :</th>
            <td><?= $keabsahanakla['alamatpemohon'] ?></td>
          </tr>

          <tr>
            <th>Status :</th>
            <td>
              <?php
              switch ($keabsahanakla['status']) {
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
            <td><?= $keabsahanakla['updated_at'] ?></td>
          </tr>

        </tbody>

      <?php endforeach; ?>

    </table>

  </div>
</div>

<?= $this->endSection('content'); ?>