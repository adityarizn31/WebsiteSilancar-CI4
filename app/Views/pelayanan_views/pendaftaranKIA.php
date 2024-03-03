<?php

$waktuSekarang = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
$hariSekarang = $waktuSekarang->format('N'); // Mendapatkan nomor hari dalam seminggu (1 untuk Senin, 2 untuk Selasa, dst)
$jamSekarang = $waktuSekarang->format('G');

// Check if the access time is within the allowed range (8 AM to 11 AM) on Monday to Friday
if ($hariSekarang >= 1 && $hariSekarang <= 7 && $jamSekarang >= 8 && $jamSekarang < 22) {
  // Allow access to the form
?>

  <?= $this->extend('layout/template'); ?>

  <?= $this->section('content'); ?>

  <!-- Form Pendaftaran KIA -->
  <div class="container" style="padding: 10px;">
    <div class="card shadow mb-4" style="padding: 20px;">
      <div class="container">
        <h4 class="text-center fw-semibold"> Pendaftaran Kartu Identitas Anak </h4>

        <?php if (session()->getFlashdata('pesan')) : ?>

          <div id="myModal" class="modal" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Pendaftaran Kartu Identitas Anak</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Selamat Pendaftaran Permohonan Kartu Identitas Anak Anda Telah Berhasil !!</p>
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
            // Tampilkan modal secara otomatis saat halaman dimuat
            var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
              keyboard: false
            });
            myModal.show();
          </script>

        <?php endif; ?>


        <form action="/PelayananSilancar/saveKIA" method="post" enctype="multipart/form-data">

          <!-- Keamanan -->
          <?= csrf_field(); ?>

          <?php $validation = \Config\Services::validation(); ?>
          <?php if (session()->has('validation')) : ?>
            <?php $validation = session('validation'); ?>
          <?php endif; ?>

          <!-- Form Nama Pemohon -->
          <div class="row">
            <div class="mb-3">
              <label for="namapemohon" class="form-label fw-semibold"> Nama Pemohon </label>
              <input type="text" name="namapemohon" id="namapemohon" class="form-control <?= (session('errors.namapemohon')) ? 'is-invalid' : null ?>" autofocus value="<?= old('namapemohon'); ?>">
              <div class="invalid-feedback">
                <?= session('errors.namapemohon') ?>
              </div>
            </div>
          </div>

          <!-- Form Email Pemohon  -->
          <div class="row">
            <div class="mb-3">
              <label for="emailpemohon" class="form-label fw-semibold"> Email Pemohon </label>
              <input type="text" name="emailpemohon" id="emailpemohon" class="form-control <?= (session('errors.emailpemohon')) ? 'is-invalid' : null ?>" autofocus value="<?= old('emailpemohon'); ?>">
              <div class="invalid-feedback">
                <?= session('errors.emailpemohon') ?>
              </div>
            </div>
          </div>

          <!-- Form Nomor Pemohon -->
          <div class="row">
            <div class="mb-3">
              <label for="nomorpemohon" class="form-label fw-semibold"> Nomor Pemohon </label>
              <input type="text" name="nomorpemohon" id="nomorpemohon" class="form-control <?= (session('errors.nomorpemohon')) ? 'is-invalid' : null ?>" autofocus value="<?= old('nomorpemohon'); ?>">
              <div class="invalid-feedback">
                <?= session('errors.nomorpemohon') ?>
              </div>
            </div>
          </div>

          <!-- Form Alamat Pemohon -->
          <div class="row">
            <div class="mb-3">
              <label for="alamatpemohon" class="form-label fw-semibold"> Alamat Pemohon </label>
              <textarea type="text" name="alamatpemohon" id="alamatpemohon" class=" form-control text-area <?= (session('errors.alamatpemohon')) ? 'is-invalid' : null ?>" value="<?= old('alamatpemohon'); ?>"></textarea>
              <div class="invalid-feedback">
                <?= session('errors.alamatpemohon') ?>
              </div>
            </div>
          </div>

          <hr>

          <!-- Berkas Akta Kelahiran -->
          <div class="row">
            <div class="mb-3">
              <label for="aktakelahiran" class="form-label fw-semibold"> Berkas Akta Kelahiran </label>
              <input type="file" name="aktakelahiran" id="aktakelahiran" class="form-control <?= (session('errors.aktakelahiran')) ? 'is-invalid' : ''; ?>" value="<?= old('aktakelahiran'); ?>">
              <div class="invalid-feedback">
                <?= session('errors.aktakelahiran') ?>
              </div>
            </div>
          </div>

          <!-- Berkas Kartu Keluarga -->
          <div class="row">
            <div class="mb-3">
              <label for="kartukeluarga" class="form-label fw-semibold"> Berkas Kartu Keluarga </label>
              <input type="file" name="kartukeluarga" id="kartukeluarga" class="form-control <?= (session('errors.kartukeluarga')) ? 'is-invalid' : ''; ?>" value="<?= old('kartukeluarga'); ?>">
              <div class="invalid-feedback">
                <?= session('errors.kartukeluarga') ?>
              </div>
            </div>
          </div>

          <!-- Berkas Pas Foto 3x4 -->
          <div class="row">
            <div class="mb-3">
              <label for="pasfoto" class="form-label fw-semibold"> Berkas Pas Foto 3x4 </label>
              <input type="file" name="pasfoto" id="pasfoto" class="form-control <?= (session('errors.pasfoto')) ? 'is-invalid' : ''; ?>" value="<?= old('pasfoto'); ?>" onchange="previewImgPendaftaranKIA()">
              <div class="invalid-feedback">
                <?= session('errors.pasfoto'); ?>
              </div>
              <div class="col-sm-2 my-4">
                <img src="/pelayanan/user.png" class="img-thumbnail img-preview">
              </div>
            </div>
          </div>

          <hr>

          <div class="d-grid gap-2 col-6 mx-auto">
            <button type="submit" value="submit" name="submit" id="submit" class="btn btn-primary">Daftar</button>
          </div>

        </form>

      </div>
    </div>
  </div>

  <?= $this->endSection('content'); ?>

<?php
} else {
  // Redirect to a message page or display a message
  header('Location: /PelayananSilancar/errorPage');
  exit;
}
