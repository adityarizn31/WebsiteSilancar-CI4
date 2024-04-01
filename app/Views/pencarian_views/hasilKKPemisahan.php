<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container text-black">
  <div class="row">

    <h3 class="text-center fw-semibold">Cek Hasil KK Pemisahan Anggota</h3>

    <table class="table text-center table-fixed table-responsive-sm" style="margin-top: 5%;">

      <?php foreach ($pendaftaran_kk_pemisahan as $kkpemisahan) : ?>

        <thead class="">

        </thead>

        <tbody class="">
          <tr>
            <th>NIK :</th>
            <td><?= $kkpemisahan['nik'] ?></td>
          </tr>

          <tr>
            <th>Nama Pemohon :</th>
            <td><?= $kkpemisahan['namapemohon'] ?></td>
          </tr>

          <tr>
            <th>Email Pemohon :</th>
            <td><?= $kkpemisahan['emailpemohon'] ?></td>
          </tr>

          <tr>
            <th>Nomor Pemohon :</th>
            <td><?= $kkpemisahan['nomorpemohon'] ?></td>
          </tr>

          <tr>
            <th>Alamat Pemohon :</th>
            <td><?= $kkpemisahan['alamatpemohon'] ?></td>
          </tr>

          <tr>
            <th>Status :</th>
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
          </tr>

          <tr>
            <th>Tanggal di Proses :</th>
            <td><?= $kkpemisahan['updated_at'] ?></td>
          </tr>

        </tbody>

      <?php endforeach; ?>

    </table>

  </div>
</div>

<?= $this->endSection('content'); ?>