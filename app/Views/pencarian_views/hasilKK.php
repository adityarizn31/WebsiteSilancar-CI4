<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
  <div class="row">

    <div class="card-body">

      <p><strong>NIK:</strong> <?= $pendaftaran_kk->nik ?></p>
      <p><strong>Nama Pemohon:</strong> <?= $pendaftaran_kk->namapemohon ?></p>
      <p><strong>Email Pemohon:</strong> <?= $pendaftaran_kk->emailpemohon ?></p>
      <p><strong>Nomor Pemohon:</strong> <?= $pendaftaran_kk->nomorpemohon ?></p>
      <p><strong>Alamat Pemohon:</strong> <?= $pendaftaran_kk->alamatpemohon ?></p>
      <p><strong>Status:</strong> <?= $pendaftaran_kk->status ?></p>
      <p><strong>Formulir Desa:</strong> <?= $pendaftaran_kk->formurlirdesa ?></p>
      <p><strong>Kartu Keluarga Suami:</strong> <?= $pendaftaran_kk->kartukeluargasuami ?></p>
      <p><strong>Kartu Keluarga Istri:</strong> <?= $pendaftaran_kk->kartukeluargaistri ?></p>
      <p><strong>Surat Nikah:</strong> <?= $pendaftaran_kk->suratnikah ?></p>
      <p><strong>Surat Pindah:</strong> <?= $pendaftaran_kk->suratpindah ?></p>
    </div>

  </div>
</div>

<?= $this->endSection('content'); ?>