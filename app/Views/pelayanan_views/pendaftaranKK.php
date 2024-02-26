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

  <!-- Form Pendaftaran KK -->
  <div class="container" style="padding: 10px;">
    <div class="card shadow mb-4" style="padding: 20px;">
      <div class="container">
        <h4 class="text-center fw-bold"> Pendaftaran Kartu Keluarga Baru </h4>

        <?php if (session()->getFlashdata('pesan')) : ?>

          <div id="myModal" class="modal" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title"> Pendaftaran Kartu Keluarga Baru </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Selamat Pendaftaran Permohonan Kartu Keluarga Anda Telah Berhasil !!</p>
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

        <form action="/PelayananSilancar/saveKK" method="post" enctype="multipart/form-data">

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
              <textarea class="form-control text-area <?= ($validation->hasError('alamatpemohon')) ? 'is-invalid' : ''; ?>" name="alamatpemohon" id="alamatpemohon" value="<?= old('alamatpemohon'); ?>"></textarea>
              <div class="invalid-feedback">
                <?= $validation->getError('alamatpemohon'); ?>
              </div>
            </div>
          </div>

          <hr>

          <!-- Form Desa -->
          <div class="row">
            <div class="mb-3">
              <label for="formulirdesa" class="form-label fw-semibold"> Berkas Formulir Desa </label>
              <input type="file" class="form-control <?= ($validation->hasError('formulirdesa')) ? 'is-invalid' : ''; ?>" name="formulirdesa" id="formulirdesa" value="<?= old('formulirdesa'); ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('formulirdesa'); ?>
              </div>
            </div>
          </div>

          <!-- Form KK Suami -->
          <div class="row">
            <div class="mb-3">
              <label for="kartukeluargasuami" class="form-label fw-semibold"> Kartu Keluarga Suami(masing-masing) </label>
              <input type="file" class="form-control <?= ($validation->hasError('kartukeluargasuami')) ? 'is-invalid' : ''; ?>" name="kartukeluargasuami" id="kartukeluargasuami" value="<?= old('kartukeluargasuami'); ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('kartukeluargasuami'); ?>
              </div>
            </div>
          </div>

          <!-- Form KK Istri -->
          <div class="row">
            <div class="mb-3">
              <label for="kartukeluargaistri" class="form-label fw-semibold"> Kartu Keluarga Istri(masing-masing) </label>
              <input type="file" class="form-control <?= ($validation->hasError('kartukeluargaistri')) ? 'is-invalid' : ''; ?>" name="kartukeluargaistri" id="kartukeluargaistri" value="<?= old('kartukeluargaistri'); ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('kartukeluargaistri'); ?>
              </div>
            </div>
          </div>

          <!-- Form Surat Nikah -->
          <div class="row">
            <div class="mb-3">
              <label for="suratnikah" class="form-label fw-semibold"> Surat Nikah </label>
              <input type="file" class="form-control <?= ($validation->hasError('suratnikah')) ? 'is-invalid' : ''; ?>" name="suratnikah" id="suratnikah" value="<?= old('suratnikah'); ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('suratnikah'); ?>
              </div>
            </div>
          </div>

          <!-- Form Surat Pindah -->
          <div class="row">
            <div class="mb-3">
              <label for="suratpindah" class="form-label fw-semibold"> Surat Pindah (Jika alamat berbeda) </label>
              <input type="file" class="form-control <?= ($validation->hasError('suratpindah')) ? 'is-invalid' : ''; ?>" name="suratpindah" id="suratpindah" value="<?= old('suratpindah'); ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('suratpindah'); ?>
              </div>
            </div>
          </div>

          <hr>

          <div class="d-grid gap-2 col-6 mx-auto">
            <button type="submit" name="submit" id="submit" class="btn btn-primary"> Daftar </button>
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
