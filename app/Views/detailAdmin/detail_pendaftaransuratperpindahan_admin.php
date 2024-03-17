<?= $this->extend('layout/templateadmin'); ?>

<?= $this->section('contentadmin'); ?>

<section class="p-4" id="main-content">

  <button class="btn btn-primary" id="button-toggle">
    <i class="bi bi-list"></i>
  </button>

  <div class="card shadow mb-4" style="margin-top: 25px;">

    <div class="card-header py-3" style="border: none; border: 0; outline: none; box-shadow: none;">
      <h4 class="m-0 font-weight-bold text-primary text-center">Detail Data Pendaftaran Surat Perpindahan</h4>
    </div>

    <div class="container">
      <div class="row">
        <?php if (session()->getFlashdata('pesan')) : ?>

          <?php
          $pesan = session()->getFlashdata('pesan');

          // Jika status = Selesai
          if ($pesan == 'Pendaftaran Telah Selesai di Verifikasi !!') {
            $class = 'alert-success';
          } else {
            $class = 'alert-danger';
          }
          ?>

          <div class="alert <?= $class ?>" role="alert">
            <?= $pesan; ?>
          </div>

        <?php endif; ?>
      </div>
    </div>

    <div class="col-sm-12 col-md-12" style="padding: 10px;">
      <div class="card card-outline card-primary">

        <div class="card-header py-3">

          <div class="d-sm-inline align-items-center justify-content-between mb-2">
            <div class="card-title fw-semibold"> Data Pemohon </div>
          </div>

          <div class="d-grip gap-2 d-md-flex justify-content-md-end">

            <?php if ($pendaftaran_suratperpindahan['status'] === 'Belum di Proses') : ?>
              <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalUbahStatus">
                Verifikasi Pendaftaran
              </button>
            <?php elseif ($pendaftaran_suratperpindahan['status'] === 'Selesai' || $pendaftaran_suratperpindahan['status'] === 'Belum Selesai') : ?>
              <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalVerifikasiPendaftaran">
                Tandai Selesai
              </button>
            <?php endif; ?>

            <div class="modal fade" id="modalUbahStatus" tabindex="-1" aria-labelledby="modalUbahStatusLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                  <div class="modal-header">
                    <h5 class="modal-title" id="modalUbahStatusLabel"> Verifikasi Pendaftaran </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <div class="modal-body">

                    <p>Mohon untuk memverifikasi status Pendaftaran atas nama <b><?= $pendaftaran_suratperpindahan['namapemohon']; ?></b> terlebih dahulu </p>

                    <div class="align-items-center justify-content-center">

                      <a href="<?= base_url('/DetailAdmin/selesaiSuratPerpindahan/' . $pendaftaran_suratperpindahan['namapemohon']) ?>" class="btn btn-outline-success" data-popup="tooltip" data-placement="top" title="Selesai"><i class="bi bi-check-square" aria-hidden="true"></i> Verifikasi </a>

                      <a href="<?= base_url('/DetailAdmin/belumSelesaiSuratPerpindahan/' . $pendaftaran_suratperpindahan['namapemohon']) ?>" class="btn btn-outline-danger" data-popup="tooltip" data-placement="top" title="Tidak Selesai"><i class="bi bi-x-square" aria-hidden="true"></i> Gagal Verifikasi </a>

                    </div>
                  </div>

                </div>

              </div>
            </div>
          </div>

          <div class="modal fade" id="modalVerifikasiPendaftaran" tabindex="-1" aria-labelledby="modalVerifikasiPendaftaranLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">

                <div class="modal-header">
                  <h5 class="modal-title" id="modalVerifikasiPendaftaranLabel">Verifikasi Pendaftaran</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                  <p>Pendaftaran atas nama <b><?= $pendaftaran_suratperpindahan['namapemohon']; ?></b> Apakah sudah Selesai ?? </p>
                </div>

                <div class="modal-footer">

                  <div class="d-sm-flex align-items-center justify-content-end">

                    <button type="button" class="btn btn-secondary btn-sm mx-2" data-bs-dismiss="modal">Batal</button>

                    <form action="<?= base_url('DeleteAdmin/tandaiSelesaiSuratPerpindahan/' . $pendaftaran_suratperpindahan['id']); ?>" method="post" class="d-inline">
                      <?= csrf_field(); ?>
                      <button class="btn btn-danger btn-sm">Tandai Selesai</button>
                    </form>

                  </div>

                </div>

              </div>
            </div>
          </div>

        </div>

        <div class="card-body">
          <table>

            <tr>
              <th width="150px">NIK</th>
              <th width="20px">:</th>
              <td><?= $pendaftaran_suratperpindahan['nik']; ?></td>
            </tr>

            <tr>
              <th width="150px">Nama</th>
              <th width="20px">:</th>
              <td><?= $pendaftaran_suratperpindahan['namapemohon']; ?></td>
            </tr>

            <tr>
              <th width="">Email</th>
              <th width="">:</th>
              <td><?= $pendaftaran_suratperpindahan['emailpemohon']; ?></td>
            </tr>

            <tr>
              <th width="">Nomor Pemohon</th>
              <th width="">:</th>
              <td><?= $pendaftaran_suratperpindahan['nomorpemohon']; ?></td>
            </tr>

            <tr>
              <th width="">Alamat Pemohon</th>
              <th width="">:</th>
              <td><?= $pendaftaran_suratperpindahan['alamatpemohon']; ?></td>
            </tr>

            <tr>
              <th width="">Status</th>
              <th width="">:</th>
              <td><?= $pendaftaran_suratperpindahan['status']; ?></td>
            </tr>

          </table>

          <div class="grid-container2 align-items-center justify-content-center">

            <div class="div">
              <a href="<?= base_url('/DetailAdmin/selesaiSuratPerpindahan/' . $pendaftaran_suratperpindahan['namapemohon']) ?>" class="btn btn-success" data-popup="tooltip" data-placement="top" title="Selesai"><i class="bi bi-check-square" aria-hidden="true"></i></a>
            </div>

            <div class="div">
              <a href="<?= base_url('/DetailAdmin/belumSelesaiSuratPerpindahan/' . $pendaftaran_suratperpindahan['namapemohon']) ?>" class="btn btn-danger" data-popup="tooltip" data-placement="top" title="Tidak Selesai"><i class="bi bi-x-square" aria-hidden="true"></i></a>
            </div>

          </div>

        </div>

        <div class="col-sm-12 col-md-12" style="padding: 20px;">
          <div class="card card-outline card-primary">

            <div class="card-header">
              <div class="card-title fw-semibold"> Berkas Formulir Perpindahan </div>

            </div>

            <div class="col-sm-12">
              <iframe src="<?= base_url('/pelayanan/perpindahan/' . $pendaftaran_suratperpindahan['formperpindahan']) ?>" frameborder="0" height="500" width="100%"></iframe>
            </div>

          </div>
        </div>

        <div class="col-sm-12 col-md-12" style="padding: 20px;">
          <div class="card card-outline card-primary">

            <div class="card-header">
              <div class="card-title fw-semibold"> Berkas Kartu Keluarga </div>
            </div>

            <div class="col-sm-12">
              <iframe src="<?= base_url('/pelayanan/perpindahan/' . $pendaftaran_suratperpindahan['kartukeluarga']) ?>" frameborder="0" height="500" width="100%"></iframe>
            </div>

          </div>
        </div>

        <div class="col-sm-12 col-md-12" style="padding: 20px;">
          <div class="card card-outline card-primary">

            <div class="card-header">
              <div class="card-title fw-semibold"> Berkas Buku Nikah </div>
            </div>

            <div class="col-sm-12">
              <iframe src="<?= base_url('/pelayanan/perpindahan/' . $pendaftaran_suratperpindahan['bukunikah']) ?>" frameborder="0" height="500" width="100%"></iframe>
            </div>

          </div>
        </div>

        <div class="col-sm-12 col-md-12" style="padding: 20px;">
          <div class="card card-outline card-primary">

            <div class="card-header">
              <div class="card-title fw-semibold"> Berkas KTP Suami </div>
            </div>

            <div class="col-sm-12">
              <iframe src="<?= base_url('/pelayanan/perpindahan/' . $pendaftaran_suratperpindahan['ktpsuami']) ?>" frameborder="0" height="500" width="100%"></iframe>
            </div>

          </div>
        </div>

        <div class="col-sm-12 col-md-12" style="padding: 20px;">
          <div class="card card-outline card-primary">

            <div class="card-header">
              <div class="card-title fw-semibold"> Berkas KTP Istri </div>
            </div>

            <div class="col-sm-12">
              <iframe src="<?= base_url('/pelayanan/perpindahan/' . $pendaftaran_suratperpindahan['ktpistri']) ?>" frameborder="0" height="500" width="100%"></iframe>
            </div>

          </div>
        </div>


      </div>
    </div>
  </div>

</section>

<?= $this->endSection('contentadmin'); ?>