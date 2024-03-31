<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container text-black">
  <div class="row">

    <h1>Search Results</h1>

    <table>
      <thead>
        <tr>
          <th>NIK</th>
          <th>Nama Pemohon</th>
          <th>Email Pemohon</th>
          <th>Nomor Pemohon</th>
          <th>Alamat Pemohon</th>
          <th>Status</th>
          <th>Formulir Desa</th>
          <th>Kartu Keluarga Suami</th>
          <th>Kartu Keluarga Istri</th>
          <th>Surat Nikah</th>
          <th>Surat Pindah</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($pendaftaran_kk as $row) : ?>
          <tr>
            <td><?= $row['nik'] ?></td>
            <td><?= $row['namapemohon'] ?></td>
            <td><?= $row['emailpemohon'] ?></td>
            <td><?= $row['nomorpemohon'] ?></td>
            <td><?= $row['alamatpemohon'] ?></td>
            <td><?= $row['status'] ?></td>

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
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

  </div>
</div>

<?= $this->endSection('content'); ?>