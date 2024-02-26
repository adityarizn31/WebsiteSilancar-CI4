<?= $this->extend('layout/templateadmin'); ?>

<?= $this->section('contentadmin'); ?>

<section class="p-4" id="main-content">

  <button class="btn btn-primary" id="button-toggle">
    <i class="bi bi-list"></i>
  </button>


  <div class="card mt-3 shadow border-2">

    <div class="d-sm-flex align-items-center justify-content-between" style="padding-top: 10px;">
      <h4 class=" m-2 font-weight-bold text-primary">Pelayanan Persyaratan Disdukcapil Majalengka</h4>
    </div>


    <div class="pelayananrow row">

      <!-- Pendaftaran Kartu Keluarga -->
      <div class="card shadow border-2" style="width: 19rem; padding: 3%; margin: 3%;">
        <a href="/Admin/pelayananKK">
          <img src="/img/silancar/Kartu Keluarga.png" class="card-img-top">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
              <h5 class="card-title text-black text-center font-weight-bold">Data Pendaftaran Kartu Keluarga</h5>
            </div>
          </div>
        </a>
        <div class="d-flex justify-content-center">
          <!-- Edit Button -->
          <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#Modal"> Edit</button>
        </div>
      </div>


      <!-- Pendaftaran Kartu Identitas Anak-->
      <div class="card shadow border-2" style="width: 19rem; padding: 3%; margin: 3%;">
        <a href="/Admin/pendaftaran_ktp_admin">
          <img src="/img/silancar/Kartu Identitas Anak.png" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title text-black text-center font-weight-bold"> Data Pendaftaran Kartu Identitas Anak</h5>
          </div>
        </a>
        <div class="d-flex justify-content-center">
          <!-- Edit Button -->
          <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#Modal"> Edit</button>
        </div>
      </div>

      <!-- Pendaftaran Surat Perpindahan Domisili -->
      <div class="card shadow border-2" style="width: 19rem; padding: 3%; margin: 3%;">
        <a href="/admin/pendaftaran_kia_admin">
          <img src="/img/silancar/Kartu Surat Perpindahan.png" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title text-black text-center font-weight-bold">Data Pendaftaran Surat Perpindahan Domisili</h5>
          </div>
        </a>
        <div class="d-flex justify-content-center">
          <!-- Edit Button -->
          <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#Modal"> Edit</button>
        </div>
      </div>

      <!-- Pendaftaran Akta Kelahiran -->
      <div class="card shadow border-2" style="width: 19rem; padding: 3%; margin: 3%;">
        <a href="/admin/pendaftaran_aktakelahiran_admin">
          <img src="/img/silancar/Kartu Akta Kelahiran.png" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title text-black text-center font-weight-bold"> Data Pendaftaran Akta Kelahiran</h5>
          </div>
        </a>
        <div class="d-flex justify-content-center">
          <!-- Edit Button -->
          <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#Modal"> Edit</button>
        </div>
      </div>

      <!-- Pendaftaran Akta Kematian -->
      <div class="card shadow border-2" style="width: 19rem; padding: 3%; margin: 3%;">
        <a href="/admin/pendaftaran_aktakematian_admin">
          <img src="/img/silancar/Kartu Akta Kematian.png" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title text-black text-center font-weight-bold"> Data Pendaftaran Akta Kematian</h5>
          </div>
        </a>
        <div class="d-flex justify-content-center">
          <!-- Edit Button -->
          <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#Modal"> Edit</button>
        </div>
      </div>

      <!-- Pendaftaran Keabsahan Akta Kelahiran -->
      <div class="card shadow border-2" style="width: 19rem; padding: 3%; margin: 3%;">
        <a href="/admin/pendaftaran_aktakelahiran_admin">
          <img src="/img/silancar/Keabsahan Akta Kelahiran.png" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title text-black text-center font-weight-bold"> Data Pendaftaran Keabsahan Akta Kelahiran</h5>
          </div>
        </a>
        <div class="d-flex justify-content-center">
          <!-- Edit Button -->
          <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#Modal"> Edit</button>
        </div>
      </div>

      <!-- Pelayanan Pemanfaatan Data dan Inovasi -->
      <div class="card shadow border-2" style="width: 19rem; padding: 3%; margin: 3%;">
        <a href="/admin/pendaftaran_perbaikannik_admin">
          <img src="/img/silancar/kartu Pelayanan Pemanfaatan Data.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title text-black text-center font-weight-bold"> Data Pendaftaran Pelayanan Pemanfaatan Data dan Inovasi</h5>
          </div>
        </a>
        <div class="d-flex justify-content-center">
          <!-- Edit Button -->
          <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#Modal"> Edit</button>
        </div>
      </div>

      <!-- Perbaikan Data -->
      <div class="card shadow border-2" style="width: 19rem; padding: 3%; margin: 3%;">
        <a href="/admin/perbaikan_data_admin">
          <img src="/img/silancar/Kartu Perbaikan Data.png" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title text-black text-center font-weight-bold"> Data Pendaftaran Perbaikan Data</h5>
          </div>
        </a>
        <div class="d-flex justify-content-center">
          <!-- Edit Button -->
          <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#Modal"> Edit</button>
        </div>
      </div>

      <!-- Pengaduan Update -->
      <div class="card shadow border-2" style="width: 19rem; padding: 3%; margin: 3%;">
        <a href="/admin/pendaftaran_pengaduanupdate_admin">
          <img src="/img/silancar/Kartu Pengaduan Update.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title text-black text-center font-weight-bold"> Data Pendaftaran Pengaduan Update</h5>
          </div>
        </a>
        <div class="d-flex justify-content-center">
          <!-- Edit Button -->
          <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#Modal"> Edit</button>
        </div>
      </div>

    </div>
  </div>

  <div class="row">
    <div class="col-lg-6 mb-4">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"> Si Lancar </h6>
        </div>
      </div>
    </div>

    <div class="col-lg-6 mb-4">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"> Si Lancar </h6>
        </div>
      </div>

    </div>
  </div>

</section>

<?= $this->endSection('contentadmin'); ?>