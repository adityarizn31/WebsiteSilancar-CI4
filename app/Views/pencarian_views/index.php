<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<center>

  <div class="sampulsilancar">
    <div class="mt-4 mb-4">
      <div class="card">
        <img src="/img/silancar/SiLancar.png">
      </div>
    </div>
  </div>

</center>

<div class="container">
  <h4 class="text-center fw-bold">Pengecekan Status Pendaftaran</h4>
  <div class="pelayanan">
    <div class="row">

      <!-- Pendaftaran Kartu Keluarga Si Lancar 1-->
      <div class="card kartupelayanan">
        <a href="/Searching/cekKK">
          <img src="/img/silancar/Kartu Keluarga.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title text-black text-center fw-bold">Cek Pendaftaran Kartu Keluarga</h5>
          </div>
        </a>
      </div>

      <!-- Pendaftaran Kartu Identitas Anak Si Lancar 1-->
      <div class="card kartupelayanan">
        <a href="/Searching/cekKIA">
          <img src="/img/silancar/Kartu Identitas Anak.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title text-black text-center fw-bold">Cek Pendaftaran Kartu Identitas Anak</h5>
          </div>
        </a>
      </div>

      <div class="card kartupelayanan">
        <a href="/Searching/cekKKPerceraian">
          <img src="/img/silancar/Kartu Keluarga Perceraian.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title text-black text-center fw-bold">Cek Pendaftaran Kartu Keluarga Perceraian</h5>
          </div>
        </a>
      </div>

      <!-- Pendaftaran Surat Perpindahan dari Majalengka Menuju Luar Si Lancar 1-->
      <div class="card kartupelayanan">
        <a href="/Searching/cekSuratPerpindahan">
          <img src="/img/silancar/Kartu Surat Perpindahan.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title text-black text-center fw-bold">Cek Pendaftaran Surat Perpindahan dari Majalengka Menuju Luar</h5>
          </div>
        </a>
      </div>

      <!-- Pendaftaran Surat Perpindahan dari Luar Menuju Majalengka Si Lancar 1-->
      <div class="card kartupelayanan">
        <a href="/Searching/cekSuratPerpindahanLuar">
          <img src="/img/silancar/Kartu Surat Perpindahan.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title text-black text-center fw-bold">Cek Pendaftaran Surat Perpindahan dari Luar Menuju Majalengka</h5>
          </div>
        </a>
      </div>

      <!-- Pendaftaran Akta Kelahiran 2-->
      <div class="card kartupelayanan">
        <a href="/Searching/cekAktaKelahiran">
          <img src="/img/silancar/Kartu Akta Kelahiran.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title text-black text-center fw-bold">Cek Pendaftaran Akta Kelahiran</h5>

          </div>
        </a>
      </div>

      <!-- Pendaftaran Akta Kematian Si Lancar 2-->
      <div class="card kartupelayanan">
        <a href="/Searching/cekAktaKematian">
          <img src="/img/silancar/Kartu Akta Kematian.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title text-black text-center fw-bold">Cek Pendaftaran Akta Kematian</h5>
          </div>
        </a>
      </div>

      <!-- Pendaftaran Keabsahan Akta Kelahiran Si Lancar 2-->
      <div class="card kartupelayanan">
        <a href="/Searching/cekKeabsahanAkla">
          <img src="/img/silancar/Keabsahan Akta Kelahiran.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title text-black text-center fw-bold">Cek Pendaftaran Keabsahan Akta Kelahiran</h5>
          </div>
        </a>
      </div>

      <!-- Pendaftaran Pelayanan Data Si Lancar 3-->
      <div class="card kartupelayanan">
        <a href="/Searching/cekPelayananData">
          <img src="/img/silancar/Kartu Pelayanan Pemanfaatan Data.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title text-black text-center fw-bold">Cek Pendaftaran Pelayanan Pemanfaatan Data & Inovasi dan Pengaduan Antar Lembaga</h5>
          </div>
        </a>
      </div>

      <!-- Pendaftaran Perbaikan Data Si Lancar 4-->
      <div class="card kartupelayanan">
        <a href="/Searching/cekPerbaikanData">
          <img src="/img/silancar/Kartu Perbaikan data.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title text-black text-center fw-bold">Cek Pendaftaran Perbaikan Data</h5>
          </div>
        </a>
      </div>


      <!-- Pendaftaran Pengaduan Update Si Lancar 4-->
      <div class="card kartupelayanan">
        <a href="/Searching/cekPengaduanUpdate">
          <img src="/img/silancar/Kartu Pengaduan Update.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title text-black text-center fw-bold">Cek Pendaftaran Pengaduan Update</h5>
          </div>
        </a>
      </div>

    </div>
  </div>

</div>



<?= $this->endSection('content'); ?>