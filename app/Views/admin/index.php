<?= $this->extend('layout/templateadmin'); ?>

<?= $this->section('contentadmin'); ?>

<section class="p-4" id="main-content">

  <button class="btn btn-primary" id="button-toggle">
    <i class="bi bi-list"></i>
  </button>

  <div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4" style="padding-top: 20px;">
      <h1 class="h3 text-black fw-bold">Dashboard</h1>
      <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <div class="card mt-3 shadow border-2">

      <div class="pelayananadmin row">





        <div class="card shadow border-2" style="width: 19rem; padding: 3%; margin: 3%; border-color: #007BFF;">
          <a href="/Admin/pendaftaran_kk_admin">
            <img src="/img/silancar/Kartu Keluarga.png" class="card-img-top">

            <div class="card-body">
              <h5 class="card-title text-black text-center font-weight-bold">Data Pendaftaran Kartu Keluarga Baru</h5>
            </div>

            <?php
            $belumDiProsesCountKK = array_filter($pendaftaran_kk, function ($data) {
              return $data['status'] == 'Belum di Proses';
            });

            $selesaiDiProsesCountKK = array_filter($pendaftaran_kk, function ($data) {
              return $data['status'] == 'Selesai Verifikasi';
            });

            $belumselesaiDiProsesCountKK = array_filter($pendaftaran_kk, function ($data) {
              return $data['status'] == 'Gagal Verifikasi';
            });

            $totalSelesaiCountKK = $selesaiDiProsesCountKK + $belumselesaiDiProsesCountKK;

            ?>

            <p class="justify-content-end text-black badge bg-warning"> Belum di Proses = <?= count($belumDiProsesCountKK); ?></p>
            <p class="justify-content-end text-black badge bg-success"> Selesai di Proses = <?= count($totalSelesaiCountKK); ?></p>

          </a>
        </div>





        <div class="card shadow border-2" style="width: 19rem; padding: 3%; margin: 3%; border-color: #007BFF;">
          <a href="/Admin/pendaftaran_kkpemisahan_admin">
            <img src="/img/silancar/Kartu Keluarga Pemisah.png" class="card-img-top">

            <div class="card-body">
              <h5 class="card-title text-black text-center font-weight-bold">Data Pendaftaran Kartu Keluarga Pemisahan Anggota</h5>
            </div>

            <?php
            $belumDiProsesCountKKPemisahan = array_filter($pendaftaran_kk_pemisahan, function ($data) {
              return $data['status'] == 'Belum di Proses';
            });

            $selesaiDiProsesCountKKPemisahan = array_filter($pendaftaran_kk_pemisahan, function ($data) {
              return $data['status'] == 'Selesai Verifikasi';
            });

            $belumselesaiDiProsesCountKKPemisahan = array_filter($pendaftaran_kk_pemisahan, function ($data) {
              return $data['status'] == 'Gagal Verifikasi';
            });

            $totalSelesaiCountKKPemisahan = $selesaiDiProsesCountKKPemisahan + $belumselesaiDiProsesCountKKPemisahan;

            ?>

            <p class="justify-content-end text-black badge bg-warning"> Belum di Proses = <?= count($belumDiProsesCountKKPemisahan); ?></p>
            <p class="justify-content-end text-black badge bg-success"> Selesai di Proses = <?= count($totalSelesaiCountKKPemisahan); ?></p>

          </a>
        </div>





        <div class="card shadow border-2" style="width: 19rem; padding: 3%; margin: 3%; border-color: #007BFF;">
          <a href="/Admin/pendaftaran_kkpenambahan_admin">
            <img src="/img/silancar/Kartu Keluarga Tambah.png" class="card-img-top">

            <div class="card-body">
              <h5 class="card-title text-black text-center font-weight-bold">Data Pendaftaran Kartu Keluarga Penambahan Anggota</h5>
            </div>

            <?php
            $belumDiProsesCountKKPenambahan = array_filter($pendaftaran_kk_penambahan, function ($data) {
              return $data['status'] == 'Belum di Proses';
            });

            $selesaiDiProsesCountKKPenambahan = array_filter($pendaftaran_kk_penambahan, function ($data) {
              return $data['status'] == 'Selesai Verifikasi';
            });

            $belumselesaiDiProsesCountKKPenambahan = array_filter($pendaftaran_kk_penambahan, function ($data) {
              return $data['status'] == 'Gagal Verifikasi';
            });

            $totalSelesaiCountKKPenambahan = $selesaiDiProsesCountKKPenambahan + $belumselesaiDiProsesCountKKPenambahan;

            ?>

            <p class="justify-content-end text-black badge bg-warning"> Belum di Proses = <?= count($belumDiProsesCountKKPenambahan); ?></p>
            <p class="justify-content-end text-black badge bg-success"> Selesai di Proses = <?= count($totalSelesaiCountKKPenambahan); ?></p>

          </a>
        </div>





        <div class="card shadow border-2" style="width: 19rem; padding: 3%; margin: 3%; border-color: #007BFF;">
          <a href="/Admin/pendaftaran_kkpengurangan_admin">
            <img src="/img/silancar/Kartu Keluarga Kurang.png" class="card-img-top">

            <div class="card-body">
              <h5 class="card-title text-black text-center font-weight-bold">Data Pendaftaran Kartu Keluarga Pengurangan Anggota</h5>
            </div>

            <?php
            $belumDiProsesCountKKPengurangan = array_filter($pendaftaran_kk_pengurangan, function ($data) {
              return $data['status'] == 'Belum di Proses';
            });

            $selesaiDiProsesCountKKPengurangan = array_filter($pendaftaran_kk_pengurangan, function ($data) {
              return $data['status'] == 'Selesai Verifikasi';
            });

            $belumselesaiDiProsesCountKKPengurangan = array_filter($pendaftaran_kk_pengurangan, function ($data) {
              return $data['status'] == 'Gagal Verifikasi';
            });

            $totalSelesaiCountKKPengurangan = $selesaiDiProsesCountKKPengurangan + $belumselesaiDiProsesCountKKPengurangan;

            ?>

            <p class="justify-content-end text-black badge bg-warning"> Belum di Proses = <?= count($belumDiProsesCountKKPengurangan); ?></p>
            <p class="justify-content-end text-black badge bg-success"> Selesai di Proses = <?= count($totalSelesaiCountKKPengurangan); ?></p>

          </a>
        </div>





        <div class="card shadow border-2" style="width: 19rem; padding: 3%; margin: 3%; border-color: #007BFF;">
          <a href="/Admin/pendaftaran_kkperubahan_admin">
            <img src="/img/silancar/Kartu Keluarga Ubah.png" class="card-img-top">

            <div class="card-body">
              <h5 class="card-title text-black text-center font-weight-bold">Data Pendaftaran Kartu Keluarga Perubahan Anggota</h5>
            </div>

            <?php
            $belumDiProsesCountKKPerubahan = array_filter($pendaftaran_kk_perubahan, function ($data) {
              return $data['status'] == 'Belum di Proses';
            });

            $selesaiDiProsesCountKKPerubahan = array_filter($pendaftaran_kk_perubahan, function ($data) {
              return $data['status'] == 'Selesai Verifikasi';
            });

            $belumselesaiDiProsesCountKKPerubahan = array_filter($pendaftaran_kk_perubahan, function ($data) {
              return $data['status'] == 'Gagal Verifikasi';
            });

            $totalSelesaiCountKKPerubahan = $selesaiDiProsesCountKKPerubahan + $belumselesaiDiProsesCountKKPerubahan;

            ?>

            <p class="justify-content-end text-black badge bg-warning"> Belum di Proses = <?= count($belumDiProsesCountKKPerubahan); ?></p>
            <p class="justify-content-end text-black badge bg-success"> Selesai di Proses = <?= count($totalSelesaiCountKKPerubahan); ?></p>

          </a>
        </div>





        <div class="card shadow border-2" style="width: 19rem; padding: 3%; margin: 3%; border-color: #007BFF;">
          <a href="/Admin/pendaftaran_kkperceraian_admin">
            <img src="/img/silancar/Kartu Keluarga Perceraian.png" class="card-img-top">

            <div class="card-body">
              <h5 class="card-title text-black text-center font-weight-bold">Data Pendaftaran Kartu Keluarga Perceraian</h5>
            </div>


            <?php
            $belumDiProsesCountKKPerceraian = array_filter($pendaftaran_kk_perceraian, function ($data) {
              return $data['status'] == 'Belum di Proses';
            });

            $selesaiDiProsesCountKKPerceraian = array_filter($pendaftaran_kk_perceraian, function ($data) {
              return $data['status'] == 'Selesai Verifikasi';
            });

            $belumselesaiDiProsesCountKKPerceraian = array_filter($pendaftaran_kk_perceraian, function ($data) {
              return $data['status'] == 'Gagal Verifikasi';
            });

            $totalSelesaiCountKKPerceraian = $selesaiDiProsesCountKKPerceraian + $belumselesaiDiProsesCountKKPerceraian;

            ?>

            <p class="justify-content-end text-black badge bg-warning"> Belum di Proses = <?= count($belumDiProsesCountKKPerceraian); ?></p>
            <p class="justify-content-end text-black badge bg-success"> Selesai di Proses = <?= count($totalSelesaiCountKKPerceraian); ?></p>

          </a>
        </div>




        <div class="card shadow border-2" style="width: 19rem; padding: 3%; margin: 3%; border-color: #007BFF;">
          <a href="/Admin/pendaftaran_kia_admin">
            <img src="/img/silancar/Kartu Identitas Anak.png" class="card-img-top">

            <div class="card-body">
              <h5 class="card-title text-black text-center font-weight-bold"> Data Pendaftaran Kartu Identitas Anak</h5>
            </div>

            <?php
            $belumDiProsesCountKIA = array_filter($pendaftaran_kia, function ($data) {
              return $data['status'] == 'Belum di Proses';
            });

            $selesaiDiProsesCountKIA = array_filter($pendaftaran_kia, function ($data) {
              return $data['status'] == 'Selesai Verifikasi';
            });

            $belumselesaiDiProsesCountKIA = array_filter($pendaftaran_kia, function ($data) {
              return $data['status'] == 'Gagal Verifikasi';
            });

            $totalSelesaiCountKIA = $selesaiDiProsesCountKIA + $belumselesaiDiProsesCountKIA;

            ?>

            <p class="justify-content-end text-black badge bg-warning"> Belum di Proses = <?= count($belumDiProsesCountKIA); ?></p>
            <p class="justify-content-end text-black badge bg-success"> Selesai di Proses = <?= count($totalSelesaiCountKIA); ?></p>

          </a>
        </div>






        <div class="card shadow border-2" style="width: 19rem; padding: 3%; margin: 3%; border-color: #007BFF;">
          <a href="/Admin/pendaftaran_suratperpindahan_admin">
            <img src="/img/silancar/Kartu Surat Perpindahan.png" class="card-img-top">

            <div class="card-body">
              <h5 class="card-title text-black text-center font-weight-bold">Data Pendaftaran Surat Perpindahan Dari Majalengka Menuju Luar Kabupaten</h5>
            </div>


            <?php
            $belumDiProsesCountSuratPerpindahan = array_filter($pendaftaran_suratperpindahan, function ($data) {
              return $data['status'] == 'Belum di Proses';
            });

            $selesaiDiProsesCountSuratPerpindahan = array_filter($pendaftaran_suratperpindahan, function ($data) {
              return $data['status'] == 'Selesai Verifikasi';
            });

            $belumselesaiDiProsesCountSuratPerpindahan = array_filter($pendaftaran_suratperpindahan, function ($data) {
              return $data['status'] == 'Gagal Verifikasi';
            });

            $totalSelesaiCountSuratPerpindahan = $selesaiDiProsesCountSuratPerpindahan + $belumselesaiDiProsesCountSuratPerpindahan;

            ?>

            <p class="justify-content-end text-black badge bg-warning"> Belum di Proses = <?= count($belumDiProsesCountSuratPerpindahan); ?></p>
            <p class="justify-content-end text-black badge bg-success"> Selesai di Proses = <?= count($totalSelesaiCountSuratPerpindahan); ?></p>

        </div>





        <div class="card shadow border-2" style="width: 19rem; padding: 3%; margin: 3%; border-color: #007BFF;">
          <a href="/Admin/pendaftaran_suratperpindahanluar_admin">
            <img src="/img/silancar/Kartu Surat Perpindahan.png" class="card-img-top">

            <div class="card-body">
              <h5 class="card-title text-black text-center font-weight-bold">Data Pendaftaran Surat Perpindahan Dari Luar Kabupaten Menuju Majalengka</h5>
            </div>

            <?php
            $belumDiProsesCountSuratPerpindahanLuar = array_filter($pendaftaran_suratperpindahanluar, function ($data) {
              return $data['status'] == 'Belum di Proses';
            });

            $selesaiDiProsesCountSuratPerpindahanLuar = array_filter($pendaftaran_suratperpindahanluar, function ($data) {
              return $data['status'] == 'Selesai Verifikasi';
            });

            $belumselesaiDiProsesCountSuratPerpindahanLuar = array_filter($pendaftaran_suratperpindahanluar, function ($data) {
              return $data['status'] == 'Gagal Verifikasi';
            });

            $totalSelesaiCountSuratPerpindahanLuar = $selesaiDiProsesCountSuratPerpindahanLuar + $belumselesaiDiProsesCountSuratPerpindahanLuar;

            ?>

            <p class="justify-content-end text-black badge bg-warning"> Belum di Proses = <?= count($belumDiProsesCountSuratPerpindahanLuar); ?></p>
            <p class="justify-content-end text-black badge bg-success"> Selesai di Proses = <?= count($totalSelesaiCountSuratPerpindahanLuar); ?></p>

          </a>
        </div>





        <div class="card shadow border-2" style="width: 19rem; padding: 3%; margin: 3%; border-color: #007BFF;">
          <a href="/Admin/pendaftaran_aktakelahiran_admin">
            <img src="/img/silancar/Kartu Akta Kelahiran.png" class="card-img-top">

            <div class="card-body">
              <h5 class="card-title text-black text-center font-weight-bold">Data Pendaftaran Akta Kelahiran</h5>
            </div>

            <?php
            $belumDiProsesCountAktaKelahiran = array_filter($pendaftaran_aktakelahiran, function ($data) {
              return $data['status'] == 'Belum di Proses';
            });

            $selesaiDiProsesCountAktaKelahiran = array_filter($pendaftaran_aktakelahiran, function ($data) {
              return $data['status'] == 'Selesai Verifikasi';
            });

            $belumselesaiDiProsesCountAktaKelahiran = array_filter($pendaftaran_aktakelahiran, function ($data) {
              return $data['status'] == 'Gagal Verifikasi';
            });

            $totalSelesaiCountAktaKelahiran = $selesaiDiProsesCountAktaKelahiran + $belumselesaiDiProsesCountAktaKelahiran;

            ?>

            <p class="justify-content-end text-black badge bg-warning"> Belum di Proses = <?= count($belumDiProsesCountAktaKelahiran); ?></p>
            <p class="justify-content-end text-black badge bg-success"> Selesai di Proses = <?= count($totalSelesaiCountAktaKelahiran); ?></p>

          </a>
        </div>





        <div class="card shadow border-2" style="width: 19rem; padding: 3%; margin: 3%; border-color: #007BFF;">
          <a href="/Admin/pendaftaran_aktakematian_admin">
            <img src="/img/silancar/Kartu Akta Kematian.png" class="card-img-top">

            <div class="card-body">
              <h5 class="card-title text-black text-center font-weight-bold">Data Pendaftaran Akta Kematian</h5>
            </div>

            <?php
            $belumDiProsesCountAktaKematian = array_filter($pendaftaran_aktakematian, function ($data) {
              return $data['status'] == 'Belum di Proses';
            });

            $selesaiDiProsesCountAktaKematian = array_filter($pendaftaran_aktakematian, function ($data) {
              return $data['status'] == 'Selesai Verifikasi';
            });

            $belumselesaiDiProsesCountAktaKematian = array_filter($pendaftaran_aktakematian, function ($data) {
              return $data['status'] == 'Gagal Verifikasi';
            });

            $totalSelesaiCountAktaKematian = $selesaiDiProsesCountAktaKematian + $belumselesaiDiProsesCountAktaKematian;

            ?>

            <p class="justify-content-end text-black badge bg-warning"> Belum di Proses = <?= count($belumDiProsesCountAktaKematian); ?></p>
            <p class="justify-content-end text-black badge bg-success"> Selesai di Proses = <?= count($totalSelesaiCountAktaKematian); ?></p>

          </a>
        </div>





        <div class="card shadow border-2" style="width: 19rem; padding: 3%; margin: 3%; border-color: #007BFF;">
          <a href="/Admin/pendaftaran_keabsahanakla_admin">
            <img src="/img/silancar/Keabsahan Akta Kelahiran.png" class="card-img-top">

            <div class="card-body">
              <h5 class="card-title text-black text-center font-weight-bold">Data Pendaftaran Keabsahan Akta Kelahiran</h5>
            </div>

            <?php
            $belumDiProsesCountKeabsahanAkla = array_filter($pendaftaran_keabsahanakla, function ($data) {
              return $data['status'] == 'Belum di Proses';
            });

            $selesaiDiProsesCountKeabsahanAkla = array_filter($pendaftaran_keabsahanakla, function ($data) {
              return $data['status'] == 'Selesai Verifikasi';
            });

            $belumselesaiDiProsesCountKeabsahanAkla = array_filter($pendaftaran_keabsahanakla, function ($data) {
              return $data['status'] == 'Gagal Verifikasi';
            });

            $totalSelesaiCountKeabsahanAkla = $selesaiDiProsesCountKeabsahanAkla + $belumselesaiDiProsesCountKeabsahanAkla;

            ?>

            <p class="justify-content-end text-black badge bg-warning"> Belum di Proses = <?= count($belumDiProsesCountKeabsahanAkla); ?></p>
            <p class="justify-content-end text-black badge bg-success"> Selesai di Proses = <?= count($totalSelesaiCountKeabsahanAkla); ?></p>

          </a>
        </div>





        <div class="card shadow border-2" style="width: 19rem; padding: 3%; margin: 3%; border-color: #007BFF;">
          <a href="/Admin/pendaftaran_pelayanandata_admin">
            <img src="/img/silancar/kartu Pelayanan Pemanfaatan Data.png" class="card-img-top">

            <div class="card-body">
              <h5 class="card-title text-black text-center font-weight-bold">Data Pendaftaran Pelayanan Pemanfaatan Data</h5>
            </div>

            <?php
            $belumDiProsesCountPelayananData = array_filter($pendaftaran_pelayanandata, function ($data) {
              return $data['status'] == 'Belum di Proses';
            });

            $selesaiDiProsesCountPelayananData = array_filter($pendaftaran_pelayanandata, function ($data) {
              return $data['status'] == 'Selesai Verifikasi';
            });

            $belumselesaiDiProsesCountPelayananData = array_filter($pendaftaran_pelayanandata, function ($data) {
              return $data['status'] == 'Gagal Verifikasi';
            });

            $totalSelesaiCountPelayananData = $selesaiDiProsesCountPelayananData + $belumselesaiDiProsesCountPelayananData;

            ?>

            <p class="justify-content-end text-black badge bg-warning"> Belum di Proses = <?= count($belumDiProsesCountPelayananData); ?></p>
            <p class="justify-content-end text-black badge bg-success"> Selesai di Proses = <?= count($totalSelesaiCountPelayananData); ?></p>

          </a>
        </div>





        <div class="card shadow border-2" style="width: 19rem; padding: 3%; margin: 3%; border-color: #007BFF;">
          <a href="/Admin/perbaikan_data_admin">
            <img src="/img/silancar/Kartu Perbaikan Data.png" class="card-img-top">

            <div class="card-body">
              <h5 class="card-title text-black text-center font-weight-bold">Data Pendaftaran Perbaikan Data</h5>
            </div>

            <?php
            $belumDiProsesCountPerbaikanData = array_filter($pendaftaran_perbaikandata, function ($data) {
              return $data['status'] == 'Belum di Proses';
            });

            $selesaiDiProsesCountPerbaikanData = array_filter($pendaftaran_perbaikandata, function ($data) {
              return $data['status'] == 'Selesai Verifikasi';
            });

            $belumselesaiDiProsesCountPerbaikanData = array_filter($pendaftaran_perbaikandata, function ($data) {
              return $data['status'] == 'Gagal Verifikasi';
            });

            $totalSelesaiCountPerbaikanData = $selesaiDiProsesCountPerbaikanData + $belumselesaiDiProsesCountPerbaikanData;

            ?>

            <p class="justify-content-end text-black badge bg-warning"> Belum di Proses = <?= count($belumDiProsesCountPerbaikanData); ?></p>
            <p class="justify-content-end text-black badge bg-success"> Selesai di Proses = <?= count($totalSelesaiCountPerbaikanData); ?></p>

          </a>
        </div>





        <div class="card shadow border-2" style="width: 19rem; padding: 3%; margin: 3%; border-color: #007BFF;">
          <a href="/Admin/pendaftaran_pengaduanupdate_admin">
            <img src="/img/silancar/Kartu Pengaduan Update.png" class="card-img-top">

            <div class="card-body">
              <h5 class="card-title text-black text-center font-weight-bold">Data Pendaftaran Pengaduan Update</h5>
            </div>

            <?php
            $belumDiProsesCountPengaduanUpdate = array_filter($pendaftaran_pengaduanupdate, function ($data) {
              return $data['status'] == 'Belum di Proses';
            });

            $selesaiDiProsesCountPengaduanUpdate = array_filter($pendaftaran_pengaduanupdate, function ($data) {
              return $data['status'] == 'Selesai Verifikasi';
            });

            $belumselesaiDiProsesCountPengaduanUpdate = array_filter($pendaftaran_pengaduanupdate, function ($data) {
              return $data['status'] == 'Gagal Verifikasi';
            });

            $totalSelesaiCountPengaduanUpdate = $selesaiDiProsesCountPengaduanUpdate + $belumselesaiDiProsesCountPengaduanUpdate;

            ?>

            <p class="justify-content-end text-black badge bg-warning"> Belum di Proses = <?= count($belumDiProsesCountPengaduanUpdate); ?></p>
            <p class="justify-content-end text-black badge bg-success"> Selesai di Proses = <?= count($totalSelesaiCountPengaduanUpdate); ?></p>

          </a>
        </div>

      </div>
    </div>





    <div class="container">
      <div class="row">
        <div class="col">

          <div class="card text-white bg-primary mb-3">

            <div class="card-header">
              Grafik Pelayanan Si Lancar
            </div>
            <div class="card-body bg-white viewTampilGrafik">
              <canvas id="myChart" width="200" height="200"></canvas>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    var pendaftaranKKData = <?php echo json_encode($pendaftaran_kk); ?>;
    var pendaftaranKKPemisahanData = <?php echo json_encode($pendaftaran_kk_pemisahan); ?>;
    var pendaftaranKKPenambahanData = <?php echo json_encode($pendaftaran_kk_penambahan); ?>;
    var pendaftaranKKPenguranganData = <?php echo json_encode($pendaftaran_kk_pengurangan); ?>;
    var pendaftaranKKPerubahanData = <?php echo json_encode($pendaftaran_kk_perubahan); ?>;
    var pendaftaranKKPerceraianData = <?php echo json_encode($pendaftaran_kk_perceraian); ?>;
    var pendaftaranKIAData = <?php echo json_encode($pendaftaran_kia); ?>;
    var pendaftaranSuratPerpindahanData = <?php echo json_encode($pendaftaran_suratperpindahan); ?>;
    var pendaftaranSuratPerpindahanLuarData = <?php echo json_encode($pendaftaran_suratperpindahanluar); ?>;
    var pendaftaranAktaKelahiranData = <?php echo json_encode($pendaftaran_aktakelahiran); ?>;
    var pendaftaranAktaKematianData = <?php echo json_encode($pendaftaran_aktakematian); ?>;
    var pendaftaranKeabsahanAklaData = <?php echo json_encode($pendaftaran_keabsahanakla); ?>;
    var pendaftaranPelayananData = <?php echo json_encode($pendaftaran_pelayanandata); ?>;
    var pendaftaranPerbaikanData = <?php echo json_encode($pendaftaran_perbaikandata); ?>;
    var pendaftaranPengaduanUpdateData = <?php echo json_encode($pendaftaran_pengaduanupdate); ?>;

    var countKKData = pendaftaranKKData.length
    var countKKPemisahanData = pendaftaranKKPemisahanData.length
    var countKKPenambahanData = pendaftaranKKPenambahanData.length
    var countKKPenguranganData = pendaftaranKKPenguranganData.length
    var countKKPerubahanData = pendaftaranKKPerubahanData.length
    var countKKPerceraianData = pendaftaranKKPerceraianData.length
    var countKIAData = pendaftaranKIAData.length
    var countSuratPerpindahanData = pendaftaranSuratPerpindahanData.length
    var countSuratPerpindahanLuarData = pendaftaranSuratPerpindahanLuarData.length
    var countAktaKelahiranData = pendaftaranAktaKelahiranData.length
    var countAktaKematianData = pendaftaranAktaKematianData.length
    var countKeabsahanAklaData = pendaftaranKeabsahanAklaData.length
    var countPelayananData = pendaftaranPelayananData.length
    var countPerbaikanData = pendaftaranPerbaikanData.length
    var countPengaduanUpdateData = pendaftaranPengaduanUpdateData.length

    var total = countKKData + countKKPemisahanData + countKKPenambahanData + countKKPenguranganData + countKKPerubahanData + countKKPerceraianData + countKIAData + countSuratPerpindahanData + countSuratPerpindahanLuarData + countAktaKelahiranData + countAktaKematianData + countKeabsahanAklaData + countPelayananData + countPerbaikanData + countPengaduanUpdateData;

    var percentKK = parseFloat((countKKData / total) * 100, 2).toFixed(2)
    var percentKKPemisahan = parseFloat((countKKPemisahanData / total) * 100, 2).toFixed(2)
    var percentKKPenambahan = parseFloat((countKKPenambahanData / total) * 100, 2).toFixed(2)
    var percentKKPengurangan = parseFloat((countKKPenguranganData / total) * 100, 2).toFixed(2)
    var percentKKPerubahan = parseFloat((countKKPerubahanData / total) * 100, 2).toFixed(2)
    var percentKKPerceraian = parseFloat((countKKPerceraianData / total) * 100, 2).toFixed(2)
    var percentKIA = parseFloat((countKIAData / total) * 100, 2).toFixed(2)
    var percentSuratPerpindahan = parseFloat((countSuratPerpindahanData / total) * 100, 2).toFixed(2)
    var percentSuratPerpindahanLuar = parseFloat((countSuratPerpindahanLuarData / total) * 100, 2).toFixed(2)
    var percentAktaKelahiran = parseFloat((countAktaKelahiranData / total) * 100, 2).toFixed(2)
    var percentAktaKematian = parseFloat((countAktaKematianData / total) * 100, 2).toFixed(2)
    var percentKeabsahanAkla = parseFloat((countKeabsahanAklaData / total) * 100, 2).toFixed(2)
    var percentPelayananData = parseFloat((countPelayananData / total) * 100, 2).toFixed(2)
    var percentPerbaikanData = parseFloat((countPerbaikanData / total) * 100, 2).toFixed(2)
    var percentPengaduanUpdateData = parseFloat((countPengaduanUpdateData / total) * 100, 2).toFixed(2)

    var labelKK = `Pendaftaran KK Baru (${percentKK}%)`
    var labelKKPemisahan = `Pendaftaran KK Pemisahan Anggota (${percentKKPemisahan}%)`
    var labelKKPenambahan = `Pendaftaran KK Penambahan Anggota (${percentKKPenambahan}%)`
    var labelKKPengurangan = `Pendaftaran KK Pengurangan Anggota (${percentKKPengurangan}%)`
    var labelKKPerubahan = `Pendaftaran KK Perubahan Anggota (${percentKKPerubahan}%)`
    var labelKKPerceraian = `Pendaftaran KK Perceraian (${percentKKPerceraian}%)`
    var labelKIA = `Pendaftaran KIA (${percentKIA}%)`
    var labelSuratPerpindahan = `Pendaftaran Surat Perpindahan dari Majalengka Menuju Luar (${percentSuratPerpindahan}%)`
    var labelSuratPerpindahanLuar = `Pendaftaran Surat Perpindahan dari Luar Menuju Majalengka (${percentSuratPerpindahanLuar}%)`
    var labelAktaKelahiran = `Pendaftaran Akta Kelahiran (${percentAktaKelahiran}%)`
    var labelAktaKematian = `Pendaftaran Akta Kematian (${percentAktaKematian}%)`
    var labelKeabsahanAktaKelahiran = `Pendaftaran Keabsahan Akta Kelahiran (${percentAktaKelahiran}%)`
    var labelPelayananData = `Pendaftaran Pelayanan Data (${percentPelayananData}%)`
    var labelPerbaikanData = `Pendaftaran Perbaikan Data (${percentPerbaikanData}%)`
    var labelPengaduanUpdateData = `Pendaftaran Pengaduan Update Data (${percentPengaduanUpdateData}%)`


    const ctx = document.getElementById('myChart');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: [labelKK, labelKKPemisahan, labelKKPenambahan, labelKKPengurangan, labelKKPerubahan, labelKKPerceraian, labelKIA, labelSuratPerpindahan, labelSuratPerpindahanLuar, labelAktaKelahiran, labelAktaKematian, labelKeabsahanAktaKelahiran, labelPelayananData, labelPerbaikanData, labelPengaduanUpdateData],
        datasets: [{
          label: 'Pendaftar Pelayanan Si Lancar',
          data: [countKKData, countKKPemisahanData, countKKPenambahanData, countKKPenguranganData, countKKPerubahanData, countKKPerceraianData, countKIAData, countSuratPerpindahanData, countSuratPerpindahanLuarData, countAktaKelahiranData, countAktaKematianData, countKeabsahanAklaData, countPelayananData, countPerbaikanData, countPengaduanUpdateData],
          borderWidth: 3
        }]
      }
    });
  </script>

</section>

<?= $this->endSection('contentadmin'); ?>