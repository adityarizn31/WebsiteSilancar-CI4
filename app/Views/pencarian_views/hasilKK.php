<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Detail Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <p><strong>NIK: </strong> <?= $pendaftaran_kk['nik'] ?></p>
        <p><strong>Nama Pemohon:</strong> <?= $pendaftaran_kk['namapemohon'] ?></p>
        <p><strong>Email Pemohon:</strong> <?= $pendaftaran_kk['emailpemohon'] ?></p>
        <p><strong>Nomor Pemohon:</strong> <?= $pendaftaran_kk['nomorpemohon'] ?></p>
        <p><strong>Alamat Pemohon:</strong> <?= $pendaftaran_kk['alamatpemohon'] ?></p>
        <p><strong>Status:</strong> <?= $pendaftaran_kk['status'] ?></p>
        <p><strong>Formulir Desa:</strong> <?= $pendaftaran_kk['formurlirdesa'] ?></p>
        <p><strong>Kartu Keluarga Suami:</strong> <?= $pendaftaran_kk['kartukeluargasuami'] ?></p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<?= $this->endSection('content'); ?>