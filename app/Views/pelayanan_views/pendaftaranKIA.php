<?php

$waktuSekarang = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
$hariSekarang = $waktuSekarang->format('N');
$jamSekarang = $waktuSekarang->format('G');

if ($hariSekarang >= 1 && $hariSekarang <= 5 && $jamSekarang >= 8 && $jamSekarang < 24) {

?>

  <?= $this->extend('layout/template'); ?>

  <?= $this->section('content'); ?>

  <div class="container" style="padding: 10px;">
    <div class="card shadow mb-4" style="padding: 20px;">
      <div class="container">
        <h4 class="text-center mt-2 mb-2 fw-semibold"> Pendaftaran Kartu Identitas Anak </h4>
      </div>

      <?php if (session()->getFlashdata('pesan')) : ?>

        <div id="myModal" class="modal" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title fw-semibold">Pendaftaran Kartu Identitas Anak</h5>
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
          var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
            keyboard: false
          });
          myModal.show();
        </script>

      <?php endif; ?>


      <form action="/PelayananSilancar/saveKIA" method="POST" enctype="multipart/form-data">

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
            <input type="file" name="fotoktp" id="fotoktp" aria-describedby="fotoktp" class="form-control text-black <?= (session('errors.fotoktp')) ? 'is-invalid' : ''; ?>" value="<?= old('fotoktp'); ?>" onchange="previewImgPendaftaranKIA()">
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
            <label for="aktakelahiran" class="form-label fw-semibold"> Berkas Akta Kelahiran </label>
            <input type="file" name="aktakelahiran" id="aktakelahiran" class="form-control text-black <?= (session('errors.aktakelahiran')) ? 'is-invalid' : ''; ?>" value="<?= old('aktakelahiran'); ?>">
            <div class="invalid-feedback">
              <?= session('errors.aktakelahiran') ?>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="mb-3">
            <label for="kartukeluarga" class="form-label fw-semibold"> Berkas Kartu Keluarga </label>
            <input type="file" name="kartukeluarga" id="kartukeluarga" class="form-control text-black <?= (session('errors.kartukeluarga')) ? 'is-invalid' : ''; ?>" value="<?= old('kartukeluarga'); ?>">
            <div class="invalid-feedback">
              <?= session('errors.kartukeluarga') ?>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="mb-3">
            <label for="pasfoto" class="form-label fw-semibold"> Berkas Pas Foto Berwarna 3x4 </label>
            <input type="file" name="pasfoto" id="pasfoto" aria-describedby="pasfoto" class="form-control text-black <?= (session('errors.pasfoto')) ? 'is-invalid' : ''; ?>" value="<?= old('pasfoto'); ?>" onchange="previewImgPendaftaranKIAPasFoto()">
            <div id="pasfoto" class="form-text">Anak dibawah 5 Tahun tidak perlu mengunggah Foto</div>
            <div class="invalid-feedback">
              <?= session('errors.pasfoto'); ?>
            </div>
            <div class="col-sm-2 my-4">
              <img src="/pelayanan/user.png" class="img-thumbnail img-previewpasfoto">
            </div>
          </div>
        </div>

        <hr>

        <div class="d-grid gap-2 col-6 mx-auto">
          <button type="button" value="submit" name="submit" id="submit" class="btn btn-primary" onclick="validasiData()"> D A F T A R </button>
        </div>

        <div class="modal fade" id="modalPendaftaran" tabindex="-1" aria-labelledby="modalPendaftaranLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title fw-semibold" id="modalPendaftaranLabel">Data Pendaftaran Kartu Identitas Anak</h5>
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <div id="dataPendaftaranSementara"></div>

              </div>
              <div class="modal-footer">
                <p>Mohon cek kembali data Pendaftaran Kartu Identitas Anak Anda. <b>Apakah Anda sudah yakin dengan data di atas ??</b></p>
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" value="submit" name="submit" id="submitModal" class="btn btn-primary btn-sm">Daftar</button>
              </div>
            </div>
          </div>
        </div>

        <script>
          function validasiData() {
            var nik = document.getElementById('nik').value;
            var namaPemohon = document.getElementById('namapemohon').value;
            var emailPemohon = document.getElementById('emailpemohon').value;
            var nomorPemohon = document.getElementById('nomorpemohon').value;
            var alamatPemohon = document.getElementById('alamatpemohon').value;
            var fotoktp = document.getElementById('fotoktp').value;
            var aktakelahiran = document.getElementById('aktakelahiran').value;
            var kartukeluarga = document.getElementById('kartukeluarga').value;

            if (nik === '' || namaPemohon === '' || emailPemohon === '' || nomorPemohon === '' || alamatPemohon === '' || fotoktp === '' || aktakelahiran === '' || kartukeluarga === '') {
              alert('Mohon untuk melengkapi semua persyaratan pendaftaran !');
            } else {
              tampilkanDataPendaftaran();
              $('#modalPendaftaran').modal('show');
            }
          }

          function tampilkanDataPendaftaran() {
            var nik = document.getElementById('nik').value;
            var namaPemohon = document.getElementById('namapemohon').value;
            var emailPemohon = document.getElementById('emailpemohon').value;
            var nomorPemohon = document.getElementById('nomorpemohon').value;
            var alamatPemohon = document.getElementById('alamatpemohon').value;

            var html = '<p><b>NIK Pemohon:</b> ' + nik + '</p>' +
              '<p><b>Nama Pemohon:</b> ' + namaPemohon + '</p>' +
              '<p><b>Email Pemohon</b>: ' + emailPemohon + '</p>' +
              '<p><b>Nomor WA Pemohon:</b> ' + nomorPemohon + '</p>' +
              '<p><b>Alamat Pemohon:</b> ' + alamatPemohon + '</p>';

            document.getElementById('dataPendaftaranSementara').innerHTML = html;
          }
        </script>

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
