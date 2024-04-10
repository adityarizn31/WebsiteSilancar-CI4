<?php

$waktuSekarang = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
$hariSekarang = $waktuSekarang->format('N');
$jamSekarang = $waktuSekarang->format('G');

if ($hariSekarang >= 1 && $hariSekarang <= 5 && $jamSekarang >= 8 && $jamSekarang < 11) {

?>

  <?= $this->extend('layout/template'); ?>

  <?= $this->section('content'); ?>

  <div class="container" style="padding: 10px;">
    <div class="card shadow mb-4" style="padding: 20px;">
      <div class="container">
        <h4 class="text-center fw-bold"> Pendaftaran Kartu Keluarga Perceraian </h4>

        <?php if (session()->getFlashdata('pesan')) : ?>

          <div id="myModal" class="modal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title fw-semibold">Pendaftaran Kartu Keluarga Perceraian</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Selamat Pendaftaran Permohonan Kartu Keluarga Perceraian Anda Telah Berhasil !!</p>
                  <p>Mohon untuk menunggu, Pemrosesan selama 1x24 Jam dan akan dikirim melalui Email / Whatsapp yang telah dicantumkan</p>
                  <p>Untuk Info lebih lanjut Si Lancar 1: </p>
                  <p><i class="fa fa-whatsapp"> 0811 1112 3370 </i></p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
              </div>
            </div>
          </div>

          <script>
            var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
              keyboard: false
            });
            myModal.show();
          </script>

        <?php endif; ?>

        <form action="/PelayananSilancar/saveKKPerceraian" method="post" enctype="multipart/form-data">

          <?= csrf_field(); ?>

          <?php $validation = \Config\Services::validation(); ?>
          <?php if (session()->has('validation')) : ?>
            <?php $validation = session('validation'); ?>
          <?php endif; ?>

          <div class="row">
            <div class="mb-3">
              <label for="nik" class="form-label fw-semibold"> NIK Pemohon </label>
              <input type="text" name="nik" id="nik" class="form-control text-black <?= (session('errors.nik')) ? 'is-invalid' : null ?>" autofocus value="<?= old('nik'); ?>">
              <div class="invalid-feedback">
                <?= session('errors.nik') ?>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="mb-3">
              <label for="namapemohon" class="form-label fw-semibold"> Nama Pemohon </label>
              <input type="text" name="namapemohon" id="namapemohon" class="form-control text-black <?= (session('errors.namapemohon')) ? 'is-invalid' : null ?>" autofocus value="<?= old('namapemohon'); ?>">
              <div class="invalid-feedback">
                <?= session('errors.namapemohon') ?>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="mb-3">
              <label for="emailpemohon" class="form-label fw-semibold"> Email Pemohon </label>
              <input type="text" name="emailpemohon" id="emailpemohon" class="form-control text-black <?= (session('errors.emailpemohon')) ? 'is-invalid' : null ?>" autofocus value="<?= old('emailpemohon'); ?>">
              <div class="invalid-feedback">
                <?= session('errors.emailpemohon') ?>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="mb-3">
              <label for="nomorpemohon" class="form-label fw-semibold"> Nomor WA Pemohon </label>
              <input type="text" name="nomorpemohon" id="nomorpemohon" placeholder="+628" class="form-control text-black <?= (session('errors.nomorpemohon')) ? 'is-invalid' : null ?>" autofocus value="<?= old('nomorpemohon'); ?>">
              <div class="invalid-feedback">
                <?= session('errors.nomorpemohon') ?>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="mb-3">
              <label for="alamatpemohon" class="form-label fw-semibold">Alamat Pemohon</label>
              <textarea name="alamatpemohon" id="alamatpemohon" class="form-control text-black text-area <?= (session('errors.alamatpemohon')) ? 'is-invalid' : null ?>"><?= old('alamatpemohon'); ?></textarea>
              <div class="invalid-feedback">
                <?= session('errors.alamatpemohon') ?>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="mb-3">
              <label for="fotoktp" class="form-label fw-semibold">Foto KTP</label>
              <input type="file" name="fotoktp" id="fotoktp" aria-describedby="fotoktp" class="form-control text-black <?= (session('errors.fotoktp')) ? 'is-invalid' : ''; ?>" value="<?= old('fotoktp'); ?>" onchange="previewImgPendaftaranKK()">
              <div class="invalid-feedback">
                <?= session('errors.fotoktp'); ?>
              </div>
              <div class="col-sm-2 my-4">
                <img src="/pelayanan/user.png" class="img-thumbnail img-preview">
              </div>
            </div>
          </div>

          <hr>

          <div class="row">
            <div class="mb-3">
              <label for="kartukeluargalama" class="form-label fw-semibold"> Berkas Kartu Keluarga Lama </label>
              <input type="file" name="kartukeluargalama" id="kartukeluargalama" class="form-control text-black <?= (session('errors.kartukeluargalama')) ? 'is-invalid' : ''; ?>" value="<?= old('kartukeluargalama'); ?>">
              <div class="invalid-feedback">
                <?= session('errors.kartukeluargalama') ?>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="mb-3">
              <label for="aktaperceraian" class="form-label fw-semibold"> Berkas Akta Perceraian </label>
              <input type="file" name="aktaperceraian" id="aktaperceraian" class="form-control text-black <?= (session('errors.aktaperceraian')) ? 'is-invalid' : ''; ?>" value="<?= old('aktaperceraian'); ?>">
              <div class="invalid-feedback">
                <?= session('errors.aktaperceraian') ?>
              </div>
            </div>
          </div>

          <hr>

          <div class="d-grid gap-2 col-6 mx-auto">
            <button type="submit" value="submit" name="submit" id="submit" class="btn btn-primary"> D A F T A R </button>
          </div>

        </form>

      </div>
    </div>
  </div>

  <?= $this->endSection('content'); ?>

<?php
} else {
  header('Location: /PelayananSilancar/errorPage');
  exit;
}
