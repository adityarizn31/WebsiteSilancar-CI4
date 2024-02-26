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

  <!-- Form Pendaftaran Perbaikan Data -->
  <div class="container" style="padding: 10px;">
    <div class="card shadow mb-4" style="padding: 20px;">
      <div class="container">
        <h4 class="text-center mt-2 mb-2 fw-bold"> Pendaftaran Perbaikan Data </h4>
      </div>

      <?php if (session()->getFlashdata('pesan')) : ?>

        <div id="myModal" class="modal" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title"> Pendaftaran Perbaikan Data </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p>Selamat Pendaftaran Permohonan Perbaikan Data Anda Telah Berhasil !!</p>
                <p>Mohon untuk menunggu, Pemrosesan selama 1x24 Jam dan akan dikirim melalui Email / Whatsapp yang telah dicantumkan</p>
                <p>Untuk Info lebih lanjut Si Lancar 4: </p>
                <p><i class="fa fa-whatsapp"> 0811 1112 3373 </i></p>
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

      <form action="/PelayananSilancar/savePerbaikanData" method="post" enctype="multipart/form-data">

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

        <!-- Form Judul Perbaikan -->
        <div class="row">
          <div class="mb-3">
            <label for="judulperbaikan" class="form-label fw-semibold"> Judul Perbaikan </label>
            <br>
            <textarea class=" form-control text-area <?= ($validation->hasError('judulperbaikan')) ? 'is-invalid' : ''; ?>" name="judulperbaikan" id="judulperbaikan" value="<?= old('judulperbaikan'); ?>"></textarea>
            <div class="invalid-feedback">
              <?= $validation->getError('judulperbaikan'); ?>
            </div>
          </div>
        </div>

        <!-- Form Berkas Perbaikan 1 -->
        <div class="row">
          <div class="mb-3">
            <label for="berkasperbaikan1" class="form-label fw-semibold"> Berkas Perbaikan 1 </label>
            <input type="file" class="form-control <?= ($validation->hasError('berkasperbaikan1')) ? 'is-invalid' : ''; ?>" name="berkasperbaikan1" id="berkasperbaikan1" value="<?= old('berkasperbaikan1'); ?>">
            <div class="invalid-feedback">
              <?= $validation->getError('berkasperbaikan1'); ?>
            </div>
          </div>
        </div>

        <!-- Form Berkas Perbaikan 2 -->
        <div class="row">
          <div class="mb-3">
            <label for="berkasperbaikan2" class="form-label fw-semibold"> Berkas Perbaikan 2 </label>
            <input type="file" class="form-control <?= ($validation->hasError('berkasperbaikan2')) ? 'is-invalid' : ''; ?>" name="berkasperbaikan2" id="berkasperbaikan2" value="<?= old('berkasperbaikan2'); ?>">
            <div class="invalid-feedback">
              <?= $validation->getError('berkasperbaikan2'); ?>
            </div>
          </div>
        </div>

        <!-- Form Berkas Perbaikan 3 -->
        <div class="row">
          <div class="mb-3">
            <label for="berkasperbaikan3" class="form-label fw-semibold"> Berkas Perbaikan 3 </label>
            <input type="file" class="form-control <?= ($validation->hasError('berkasperbaikan3')) ? 'is-invalid' : ''; ?>" name="berkasperbaikan3" id="berkasperbaikan3" value="<?= old('berkasperbaikan3'); ?>">
            <div class="invalid-feedback">
              <?= $validation->getError('berkasperbaikan3'); ?>
            </div>
          </div>
        </div>

        <!-- Form Berkas Perbaikan 4 -->
        <div class="row">
          <div class="mb-3">
            <label for="berkasperbaikan4" class="form-label fw-semibold"> Berkas Perbaikan 4 </label>
            <input type="file" class="form-control <?= ($validation->hasError('berkasperbaikan4')) ? 'is-invalid' : ''; ?>" name="berkasperbaikan4" id="berkasperbaikan4" value="<?= old('berkasperbaikan4'); ?>">
            <div class="invalid-feedback">
              <?= $validation->getError('berkasperbaikan4'); ?>
            </div>
          </div>
        </div>

        <!-- Form Berkas Perbaikan 5 -->
        <div class="row">
          <div class="mb-3">
            <label for="berkasperbaikan5" class="form-label fw-semibold"> Berkas Perbaikan 5 </label>
            <input type="file" class="form-control <?= ($validation->hasError('berkasperbaikan5')) ? 'is-invalid' : ''; ?>" name="berkasperbaikan5" id="berkasperbaikan5" value="<?= old('berkasperbaikan5'); ?>">
            <div class="invalid-feedback">
              <?= $validation->getError('berkasperbaikan5'); ?>
            </div>
          </div>
        </div>

        <!-- Form Berkas Perbaikan 6 -->
        <div class="row">
          <div class="mb-3">
            <label for="berkasperbaikan6" class="form-label fw-semibold"> Berkas Perbaikan 6 </label>
            <input type="file" class="form-control <?= ($validation->hasError('berkasperbaikan6')) ? 'is-invalid' : ''; ?>" name="berkasperbaikan6" id="berkasperbaikan6" value="<?= old('berkasperbaikan6'); ?>">
            <div class="invalid-feedback">
              <?= $validation->getError('berkasperbaikan6'); ?>
            </div>
          </div>
        </div>

        <!-- Form Penjelasan Perbaikan -->
        <div class="row">
          <div class="mb-3">
            <label for="penjelasanperbaikan" class="form-label fw-semibold"> Penjelasan Perbaikan </label>
            <br>
            <textarea class=" form-control text-area <?= ($validation->hasError('penjelasanperbaikan')) ? 'is-invalid' : ''; ?>" name="penjelasanperbaikan" id="penjelasanperbaikan" value="<?= old('penjelasanperbaikan'); ?>"></textarea>
            <div class="invalid-feedback">
              <?= $validation->getError('penjelasanperbaikan'); ?>
            </div>
          </div>
        </div>

        <hr>

        <div class="d-grid gap-2 col-6 mx-auto">
          <button type="submit" value="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
        </div>

      </form>

    </div>
  </div>

  <?= $this->endSection('content'); ?>

<?php
} else {
  // Redirect to a message page or display a message
  header('Location: /PelayananSilancar/errorPage');
  exit;
}
