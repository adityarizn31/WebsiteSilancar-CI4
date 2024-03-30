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
        <h4 class="text-center fw-bold"> Pendaftaran Kartu Keluarga Baru </h4>

        <?php if (session()->getFlashdata('pesan')) : ?>

          <div id="myModal" class="modal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title fw-semibold"> Pendaftaran Kartu Keluarga Baru </h5>
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
            var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
              keyboard: false
            });
            myModal.show();
          </script>

        <?php endif; ?>

        <form action="/PelayananSilancar/saveKK" method="post" enctype="multipart/form-data">

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
              <input type="text" name="nomorpemohon" id="nomorpemohon" class="form-control text-black <?= (session('errors.nomorpemohon')) ? 'is-invalid' : null ?>" autofocus value="<?= old('nomorpemohon'); ?>">
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

          <hr>

          <div class="row">
            <div class="mb-3">
              <label for="formulirdesa" class="form-label fw-semibold"> Berkas Formulir Desa </label>
              <input type="file" name="formulirdesa" id="formulirdesa" class="form-control text-black <?= (session('errors.formulirdesa')) ? 'is-invalid' : ''; ?>" value="<?= old('formulirdesa'); ?>">
              <div class="invalid-feedback">
                <?= session('errors.formulirdesa') ?>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="mb-3">
              <label for="kartukeluargasuami" class="form-label fw-semibold"> Berkas Kartu Keluarga Suami </label>
              <input type="file" name="kartukeluargasuami" id="kartukeluargasuami" class="form-control text-black <?= (session('errors.kartukeluargasuami')) ? 'is-invalid' : ''; ?>" value="<?= old('kartukeluargasuami'); ?>">
              <div class="invalid-feedback">
                <?= session('errors.kartukeluargasuami') ?>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="mb-3">
              <label for="kartukeluargaistri" class="form-label fw-semibold"> Berkas Kartu Keluarga Istri </label>
              <input type="file" name="kartukeluargaistri" id="kartukeluargaistri" class="form-control text-black <?= (session('errors.kartukeluargaistri')) ? 'is-invalid' : ''; ?>" value="<?= old('kartukeluargaistri'); ?>">
              <div class="invalid-feedback">
                <?= session('errors.kartukeluargaistri') ?>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="mb-3">
              <label for="suratnikah" class="form-label fw-semibold"> Berkas Surat Nikah </label>
              <input type="file" name="suratnikah" id="suratnikah" class="form-control text-black <?= (session('errors.suratnikah')) ? 'is-invalid' : ''; ?>" value="<?= old('suratnikah'); ?>">
              <div class="invalid-feedback">
                <?= session('errors.suratnikah') ?>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="mb-3">
              <label for="suratpindah" class="form-label fw-semibold"> Berkas Surat Pindah (Jika Alamat Berbeda) </label>
              <input type="file" name="suratpindah" id="suratpindah" class="form-control text-black <?= (session('errors.suratpindah')) ? 'is-invalid' : ''; ?>" value="<?= old('suratpindah'); ?>">
              <div id="suratpindah" class="form-text">Jika alamat sama, bisa di isi dengan File lain</div>
              <div class="invalid-feedback">
                <?= session('errors.suratpindah') ?>
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
// 