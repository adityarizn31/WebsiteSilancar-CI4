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

  <!-- Form Pendaftaran Pelayanan Data -->
  <div class="container" style="padding: 10px;">
    <div class="card shadow mb-4" style="padding: 20px;">
      <div class="container">
        <h4 class="text-center fw-bold"> Pendaftaran Pelayanan Pemanfaatan Data & Inovasi & Pengaduan Antar Lembaga </h4>

        <?php if (session()->getFlashdata('pesan')) : ?>

          <div id="myModal" class="modal" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title"> Pendaftaran Pelayanan Pemanfaatan Data & Inovasi & Pengaduan Antar Lembaga </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Selamat Pendaftaran Permohonan Pelayanan Pemanfaatan Data & Inovasi & Pengaduan Antar Lembaga Anda Telah Berhasil !!</p>
                  <p>Mohon untuk menunggu, Pemrosesan selama 1x24 Jam dan akan dikirim melalui Email / Whatsapp yang telah dicantumkan</p>
                  <p>Untuk Info lebih lanjut Si Lancar 3: </p>
                  <p><i class="fa fa-whatsapp"> 0811 1112 3372 </i></p>
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

        <form action="/PelayananSilancar/savePelayananData" method="post" enctype="multipart/form-data">

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

          <!-- Form Berkas Pelayanan 1 -->
          <div class="row">
            <div class="mb-3">
              <label for="berkaspelayanan1" class="form-label fw-semibold"> Berkas Pelayanan 1 </label>
              <input type="file" class="form-control <?= ($validation->hasError('berkaspelayanan1')) ? 'is-invalid' : ''; ?>" name="berkaspelayanan1" id="berkaspelayanan1" value="<?= old('berkaspelayanan1'); ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('berkaspelayanan1'); ?>
              </div>
            </div>
          </div>

          <!-- Form Berkas Pelayanan 2 -->
          <div class="row">
            <div class="mb-3">
              <label for="berkaspelayanan2" class="form-label fw-semibold"> Berkas Pelayanan 2 </label>
              <input type="file" class="form-control <?= ($validation->hasError('berkaspelayanan2')) ? 'is-invalid' : ''; ?>" name="berkaspelayanan2" id="berkaspelayanan2" value="<?= old('berkaspelayanan2'); ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('berkaspelayanan2'); ?>
              </div>
            </div>
          </div>

          <!-- Form Berkas Pelayanan 3 -->
          <div class="row">
            <div class="mb-3">
              <label for="berkaspelayanan3" class="form-label fw-semibold"> Berkas Pelayanan 3 </label>
              <input type="file" class="form-control <?= ($validation->hasError('berkaspelayanan3')) ? 'is-invalid' : ''; ?>" name="berkaspelayanan3" id="berkaspelayanan3" value="<?= old('berkaspelayanan3'); ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('berkaspelayanan3'); ?>
              </div>
            </div>
          </div>

          <!-- Form Berkas Pelayanan 4 -->
          <div class="row">
            <div class="mb-3">
              <label for="berkaspelayanan4" class="form-label fw-semibold"> Berkas Pelayanan 4 </label>
              <input type="file" class="form-control <?= ($validation->hasError('berkaspelayanan4')) ? 'is-invalid' : ''; ?>" name="berkaspelayanan4" id="berkaspelayanan4" value="<?= old('berkaspelayanan4'); ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('berkaspelayanan4'); ?>
              </div>
            </div>
          </div>

          <!-- Form Berkas Pelayanan 5 -->
          <div class="row">
            <div class="mb-3">
              <label for="berkaspelayanan5" class="form-label fw-semibold"> Berkas Pelayanan 5 </label>
              <input type="file" class="form-control <?= ($validation->hasError('berkaspelayanan5')) ? 'is-invalid' : ''; ?>" name="berkaspelayanan5" id="berkaspelayanan5" value="<?= old('berkaspelayanan5'); ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('berkaspelayanan5'); ?>
              </div>
            </div>
          </div>

          <!-- Form Berkas Pelayanan 6 -->
          <div class="row">
            <div class="mb-3">
              <label for="berkaspelayanan6" class="form-label fw-semibold"> Berkas Pelayanan 6 </label>
              <input type="file" class="form-control <?= ($validation->hasError('berkaspelayanan6')) ? 'is-invalid' : ''; ?>" name="berkaspelayanan6" id="berkaspelayanan6" value="<?= old('berkaspelayanan6'); ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('berkaspelayanan6'); ?>
              </div>
            </div>
          </div>

          <!-- Form Berkas Pelayanan 7 -->
          <div class="row">
            <div class="mb-3">
              <label for="berkaspelayanan7" class="form-label fw-semibold"> Berkas Pelayanan 7 </label>
              <input type="file" class="form-control <?= ($validation->hasError('berkaspelayanan7')) ? 'is-invalid' : ''; ?>" name="berkaspelayanan7" id="berkaspelayanan7" value="<?= old('berkaspelayanan7'); ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('berkaspelayanan7'); ?>
              </div>
            </div>
          </div>

          <!-- Form Berkas Pelayanan 8 -->
          <div class="row">
            <div class="mb-3">
              <label for="berkaspelayanan8" class="form-label fw-semibold"> Berkas Pelayanan 8 </label>
              <input type="file" class="form-control <?= ($validation->hasError('berkaspelayanan8')) ? 'is-invalid' : ''; ?>" name="berkaspelayanan8" id="berkaspelayanan8" value="<?= old('berkaspelayanan8'); ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('berkaspelayanan8'); ?>
              </div>
            </div>
          </div>

          <!-- Form Berkas Pelayanan 9 -->
          <div class="row">
            <div class="mb-3">
              <label for="berkaspelayanan9" class="form-label fw-semibold"> Berkas Pelayanan 9 </label>
              <input type="file" class="form-control <?= ($validation->hasError('berkaspelayanan9')) ? 'is-invalid' : ''; ?>" name="berkaspelayanan9" id="berkaspelayanan9" value="<?= old('berkaspelayanan9'); ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('berkaspelayanan9'); ?>
              </div>
            </div>
          </div>

          <!-- Form Berkas Pelayanan 10 -->
          <div class="row">
            <div class="mb-3">
              <label for="berkaspelayanan10" class="form-label fw-semibold"> Berkas Pelayanan 10 </label>
              <input type="file" class="form-control <?= ($validation->hasError('berkaspelayanan10')) ? 'is-invalid' : ''; ?>" name="berkaspelayanan10" id="berkaspelayanan10" value="<?= old('berkaspelayanan10'); ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('berkaspelayanan10'); ?>
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
