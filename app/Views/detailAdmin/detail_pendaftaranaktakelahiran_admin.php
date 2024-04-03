<?= $this->extend('layout/templateadmin'); ?>

<?= $this->section('contentadmin'); ?>

<section class="p-4" id="main-content">

  <button class="btn btn-primary" id="button-toggle">
    <i class="bi bi-list"></i>
  </button>

  <div class="card shadow mb-4" style="margin-top: 25px;">

    <div class="card-header py-3" style="border: none; border: 0; outline: none; box-shadow: none;">
      <h4 class="m-0 font-weight-bold text-primary text-center">Detail Data Pendaftaran Akta Kelahiran</h4>
    </div>

    <div class="container">
      <div class="row">
        <?php if (session()->getFlashdata('pesan')) : ?>

          <?php
          $pesan = session()->getFlashdata('pesan');

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

    <div class="col-sm-12 col-md-12" style="padding: 20px;">
      <div class="card card-outline card-primary">

        <div class="card-header py-3">

          <div class="d-sm-inline align-items-center justify-content-between mb-2">
            <div class="card-title fw-semibold"> Data Pemohon </div>
          </div>

          <div class="d-grip gap-2 d-md-flex justify-content-md-end">

            <?php if ($pendaftaran_aktakelahiran['status'] === 'Belum di Proses') : ?>
              <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalUbahStatus">
                Verifikasi Pendaftaran
              </button>
            <?php elseif ($pendaftaran_aktakelahiran['status'] === 'Selesai Verifikasi' || $pendaftaran_aktakelahiran['status'] === 'Gagal Verifikasi') : ?>
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

                    <p>Mohon untuk memverifikasi status Pendaftaran atas nama <b><?= $pendaftaran_aktakelahiran['namapemohon']; ?></b> terlebih dahulu </p>

                    <div class="align-items-center justify-content-center">

                      <a href="<?= base_url('/DetailAdmin/selesaiAktaKelahiran/' . $pendaftaran_aktakelahiran['namapemohon']) ?>" class="btn btn-outline-success" data-popup="tooltip" data-placement="top" title="Selesai Verifikasi"><i class="bi bi-check-square" aria-hidden="true"></i> Selesai Verifikasi </a>

                      <a href="<?= base_url('/DetailAdmin/belumSelesaiAktaKelahiran/' . $pendaftaran_aktakelahiran['namapemohon']) ?>" class="btn btn-outline-danger" data-popup="tooltip" data-placement="top" title="Gagal Verifikasi"><i class="bi bi-x-square" aria-hidden="true"></i> Gagal Verifikasi </a>

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
                  <p>Pendaftaran atas nama <b><?= $pendaftaran_aktakelahiran['namapemohon']; ?></b> Apakah sudah Selesai ?? </p>
                </div>

                <div class="modal-footer">

                  <div class="d-sm-flex align-items-center justify-content-end">

                    <button type="button" class="btn btn-secondary btn-sm mx-2" data-bs-dismiss="modal">Batal</button>

                    <form action="<?= base_url('DeleteAdmin/tandaiSelesaiAktaKelahiran/' . $pendaftaran_aktakelahiran['id']); ?>" method="post" class="d-inline">
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
              <td><?= $pendaftaran_aktakelahiran['nik']; ?></td>
            </tr>

            <tr>
              <th width="150px">Nama</th>
              <th width="20px">:</th>
              <td><?= $pendaftaran_aktakelahiran['namapemohon']; ?></td>
            </tr>

            <tr>
              <th width="">Email</th>
              <th width="">:</th>
              <td><?= $pendaftaran_aktakelahiran['emailpemohon']; ?></td>
            </tr>

            <tr>
              <th width="">Nomor Pemohon</th>
              <th width="">:</th>
              <td><?= $pendaftaran_aktakelahiran['nomorpemohon']; ?></td>
            </tr>

            <tr>
              <th width="">Alamat Pemohon</th>
              <th width="">:</th>
              <td><?= $pendaftaran_aktakelahiran['alamatpemohon']; ?></td>
            </tr>

            <tr>
              <th width="">Status</th>
              <th width="">:</th>
              <td>
                <?php
                switch ($pendaftaran_aktakelahiran['status']) {
                  case 'Selesai Verifikasi':
                    echo '<span class="badge bg-success"> Selesai Verifikasi </span>';
                    break;
                  case 'Belum di Proses':
                    echo '<span class="badge bg-warning"> Belum di Proses </span>';
                    break;
                  case 'Gagal Verifikasi':
                    echo '<span class="badge bg-danger"> Gagal Verifikasi </span>';
                    break;
                }
                ?>
              </td>
            </tr>

          </table>

          <div class="grid-container align-items-center justify-content-center">

            <form action="<?= base_url('/DetailAdmin/selesaiAktaKelahiran/' . $pendaftaran_aktakelahiran['namapemohon']) ?>" method="post">
              <?= csrf_field(); ?>
              <button class="btn btn-success btn-sm" data-popup="tooltip" data-placement="top" title="Selesai Verifikasi" style="margin-right: 3px;">
                <i class="bi bi-check-square" aria-hidden="true"></i> Selesai Verifikasi
              </button>
            </form>

            <form action="<?= base_url('/DetailAdmin/belumSelesaiAktaKelahiran/' . $pendaftaran_aktakelahiran['namapemohon']) ?>" method="post">
              <?= csrf_field(); ?>
              <button class="btn btn-danger btn-sm" data-popup="tooltip" data-placement="top" title="Selesai Verifikasi" style="margin-left: 3px;">
                <i class="bi bi-x-square" aria-hidden="true"></i> Gagal Verifikasi
              </button>
            </form>

          </div>

        </div>

        <div class="col-sm-12 col-md-12" style="padding: 20px;">
          <div class="card card-outline card-primary">

            <div class="card-header">
              <div class="card-title text-black fw-semibold"> Berkas Formulir F201 Akta Kelahiran </div>
            </div>

            <div class="col-sm-12">
              <iframe src="<?= base_url('/pelayanan/aktakelahiran/' . $pendaftaran_aktakelahiran['formulirf201akta']) ?>" frameborder="0" height="500" width="100%"></iframe>
            </div>

          </div>
        </div>

        <div class="col-sm-12 col-md-12" style="padding: 20px;">
          <div class="card card-outline card-primary">

            <div class="card-header">
              <div class="card-title text-black fw-semibold"> Berkas Surat Keterangan Lahir </div>
            </div>

            <div class="col-sm-12">
              <iframe src="<?= base_url('/pelayanan/aktakelahiran/' . $pendaftaran_aktakelahiran['suratketeranganlahir']) ?>" frameborder="0" height="500" width="100%"></iframe>
            </div>

          </div>
        </div>

        <div class="col-sm-12 col-md-12" style="padding: 20px;">
          <div class="card card-outline card-primary">

            <div class="card-header">
              <div class="card-title text-black fw-semibold"> Berkas Kartu Keluarga </div>
            </div>

            <div class="col-sm-12">
              <iframe src="<?= base_url('/pelayanan/aktakelahiran/' . $pendaftaran_aktakelahiran['kartukeluarga']) ?>" frameborder="0" height="500" width="100%"></iframe>
            </div>

          </div>
        </div>

        <div class="col-sm-12 col-md-12" style="padding: 20px;">
          <div class="card card-outline card-primary">

            <div class="card-header">
              <div class="card-title text-black fw-semibold"> Berkas KTP Ayah </div>
            </div>

            <div class="col-sm-12">
              <iframe src="<?= base_url('/pelayanan/aktakelahiran/' . $pendaftaran_aktakelahiran['ktpayah']) ?>" frameborder="0" height="500" width="100%"></iframe>
            </div>

          </div>
        </div>

        <div class="col-sm-12 col-md-12" style="padding: 20px;">
          <div class="card card-outline card-primary">

            <div class="card-header">
              <div class="card-title text-black fw-semibold"> Berkas KTP Ibu </div>
            </div>

            <div class="col-sm-12">
              <iframe src="<?= base_url('/pelayanan/aktakelahiran/' . $pendaftaran_aktakelahiran['ktpibu']) ?>" frameborder="0" height="500" width="100%"></iframe>
            </div>

          </div>
        </div>


      </div>
    </div>
  </div>

</section>

<?= $this->endSection('contentadmin'); ?>