<?php

$waktuSekarang = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
$hariSekarang = $waktuSekarang->format('N'); // Mendapatkan nomor hari dalam seminggu (1 untuk Senin, 2 untuk Selasa, dst)
$jamSekarang = $waktuSekarang->format('G');

// Check if the access time is within the allowed range (8 AM to 11 AM) on Monday to Friday
if ($hariSekarang >= 1 && $hariSekarang <= 5 && $jamSekarang >= 8 && $jamSekarang < 22) {
  // Allow access to the form
?>

  <?= $this->extend('layout/template'); ?>

  <?= $this->section('content'); ?>

  <!-- Form Pendaftaran Akta Kelahiran -->
  <div class="container" style="padding: 10px;">
    <div class="card shadow mb-4" style="padding: 20px;">
      <div class="container">
        <h4 class="text-center fw-bold"> Pendaftaran Akta Kelahiran </h4>

        <?php if (session()->getFlashdata('pesan')) : ?>

          <div id="myModal" class="modal" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title"> Pendaftaran Akta Kelahiran </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Selamat Pendaftaran Permohonan Akta Kelahiran Anda Telah Berhasil !!</p>
                  <p>Mohon untuk menunggu, Pemrosesan selama 1x24 Jam dan akan dikirim melalui Email / Whatsapp yang telah dicantumkan</p>
                  <p>Untuk Info lebih lanjut Si Lancar 2: </p>
                  <p><i class="fa fa-whatsapp"> 0811 1112 3371 </i></p>
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

        <form action="/PelayananSilancar/saveAktakelahiran" method="post" enctype="multipart/form-data">

          <!-- Keamanan -->
          <?= csrf_field(); ?>

          <!-- Form Nama Pemohon -->
          <div class="row">
            <div class="mb-3">
              <label for="namapemohon" class="form-label fw-semibold"> Nama Pemohon </label>
              <input type="text" class="form-control <?= ($validation->hasError('namapemohon')) ? 'is-invalid' : ''; ?>" name="namapemohon" id="namapemohon" autofocus value="<?= old('namapemohon'); ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('namapemohon') ?>
              </div>
            </div>
          </div>

          <!-- Form Email Pemohon  -->
          <div class="row">
            <div class="mb-3">
              <label for="emailpemohon" class="form-label fw-semibold"> Email Pemohon </label>
              <input type="text" class="form-control <?= ($validation->hasError('emailpemohon')) ? 'is-invalid' : ''; ?>" name="emailpemohon" id="emailpemohon" value="<?= old('emailpemohon'); ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('emailpemohon'); ?>
              </div>
            </div>
          </div>

          <!-- Form Nomor Pemohon -->
          <div class="row">
            <div class="mb-3">
              <label for="nomorpemohon" class="form-label fw-semibold"> Nomor Whatsapp </label>
              <input type="text" class="form-control <?= ($validation->hasError('nomorpemohon')) ? 'is-invalid' : ''; ?>" name="nomorpemohon" id="nomorpemohon" value="<?= old('nomorpemohon'); ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('nomorpemohon'); ?>
              </div>
            </div>
          </div>

          <!-- Form Alamat Pemohon -->
          <div class="row">
            <div class="mb-3">
              <label for="alamatpemohon" class="form-label fw-semibold"> Alamat Pemohon </label>
              <br>
              <textarea class=" form-control text-area <?= ($validation->hasError('alamatpemohon')) ? 'is-invalid' : ''; ?>" name="alamatpemohon" id="alamatpemohon" value="<?= old('alamatpemohon'); ?>"></textarea>
              <div class="invalid-feedback">
                <?= $validation->getError('alamatpemohon'); ?>
              </div>
            </div>
          </div>

          <hr>

          <!-- Berkas Formulir F201 Akta Kelahiran -->
          <div class="row">
            <div class="mb-3">
              <label for="formulirf201akta" class="form-label fw-semibold"> Berkas Formulir F201 Akta </label>
              <input type="file" class="form-control <?= ($validation->hasError('formulirf201akta')) ? 'is-invalid' : ''; ?>" name="formulirf201akta" id="formulirf201akta" value="<?= old('formulirf201akta'); ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('formulirf201akta'); ?>
              </div>
            </div>
          </div>

          <!-- Berkas Surat Keterangan Lahir -->
          <div class="row">
            <div class="mb-3">
              <label for="suratketeranganlahir" class="form-label fw-semibold"> Berkas Surat Keterangan Lahir </label>
              <input type="file" class="form-control <?= ($validation->hasError('suratketeranganlahir')) ? 'is-invalid' : ''; ?>" name="suratketeranganlahir" id="suratketeranganlahir" value="<?= old('suratketeranganlahir'); ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('suratketeranganlahir'); ?>
              </div>
            </div>
          </div>

          <!-- Berkas Kartu Keluarga -->
          <div class="row">
            <div class="mb-3">
              <label for="kartukeluarga" class="form-label fw-semibold"> Berkas Kartu Keluarga </label>
              <input type="file" class="form-control <?= ($validation->hasError('kartukeluarga')) ? 'is-invalid' : ''; ?>" name="kartukeluarga" id="kartukeluarga" value="<?= old('kartukeluarga'); ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('kartukeluarga'); ?>
              </div>
            </div>
          </div>

          <!-- Berkas Buku Nikah -->
          <div class="row">
            <div class="mb-3">
              <label for="bukunikah" class="form-label fw-semibold"> Berkas Buku Nikah </label>
              <input type="file" class="form-control <?= ($validation->hasError('bukunikah')) ? 'is-invalid' : ''; ?>" name="bukunikah" id="bukunikah" value="<?= old('bukunikah'); ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('bukunikah'); ?>
              </div>
            </div>
          </div>

          <!-- Berkas KTP Ayah -->
          <div class="row">
            <div class="mb-3">
              <label for="ktpayah" class="form-label fw-semibold"> Berkas KTP Ayah </label>
              <input type="file" class="form-control <?= ($validation->hasError('ktpayah')) ? 'is-invalid' : ''; ?>" name="ktpayah" id="ktpayah" value="<?= old('ktpayah'); ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('ktpayah'); ?>
              </div>
            </div>
          </div>

          <!-- Berkas KTP Ibu -->
          <div class="row">
            <div class="mb-3">
              <label for="ktpibu" class="form-label fw-semibold"> Berkas KTP Ibu </label>
              <input type="file" class="form-control <?= ($validation->hasError('ktpibu')) ? 'is-invalid' : ''; ?>" name="ktpibu" id="ktpibu" value="<?= old('ktpibu'); ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('ktpibu'); ?>
              </div>
            </div>
          </div>

          <hr>

          <div class="d-grid gap-2 col-6 mx-auto">
            <button type="submit" value="submit" name="submit" id="submit" class="btn btn-primary"> Daftar </button>
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
