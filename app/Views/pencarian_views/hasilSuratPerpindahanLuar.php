<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container text-black">
  <div class="row">

    <h3 class="text-center fw-semibold">Cek Hasil Surat Perpindahan Domisili Luar Kabupaten menuju Majalengka</h3>

    <table class="table text-center table-fixed table-responsive-sm" style="margin-top: 5%;">

      <?php foreach ($pendaftaran_suratperpindahanluar as $suratperpindahanluar) : ?>

        <thead class="">

        </thead>

        <tbody class="">
          <tr>
            <th>NIK :</th>
            <td><?= $suratperpindahanluar['nik'] ?></td>
          </tr>

          <tr>
            <th>Nama Pemohon :</th>
            <td><?= $suratperpindahanluar['namapemohon'] ?></td>
          </tr>

          <tr>
            <th>Email Pemohon :</th>
            <td><?= $suratperpindahanluar['emailpemohon'] ?></td>
          </tr>

          <tr>
            <th>Nomor Pemohon :</th>
            <td><?= $suratperpindahanluar['nomorpemohon'] ?></td>
          </tr>

          <tr>
            <th>Alamat Pemohon :</th>
            <td><?= $suratperpindahanluar['alamatpemohon'] ?></td>
          </tr>

          <tr>
            <th>Status :</th>
            <td>
              <?php
              switch ($suratperpindahanluar['status']) {
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
            <td><?= $suratperpindahanluar['updated_at'] ?></td>
          </tr>

        </tbody>

      <?php endforeach; ?>

    </table>

  </div>
</div>

<?= $this->endSection('content'); ?>