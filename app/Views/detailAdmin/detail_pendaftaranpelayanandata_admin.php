v<?= $this->extend('layout/templateadmin'); ?>

<?= $this->section('contentadmin'); ?>

<section class="p-4" id="main-content">

  <button class="btn btn-primary" id="button-toggle">
    <i class="bi bi-list"></i>
  </button>

  <div class="card shadow mb-4" style="margin-top: 25px;">

    <div class="card-header py-3" style="border: none; border: 0; outline: none; box-shadow: none;">
      <h4 class="m-0 font-weight-bold text-primary text-center">Detail Data Pendaftaran Pelayanan Pemanfaatan Data & Inovasi dan Pengaduan Antar Lembaga</h4>
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

            <?php if ($pendaftaran_pelayanandata['status'] === 'Belum di Proses') : ?>
              <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalUbahStatus">
                Verifikasi Pendaftaran
              </button>
            <?php elseif ($pendaftaran_pelayanandata['status'] === 'Selesai' || $pendaftaran_pelayanandata['status'] === 'Belum Selesai') : ?>
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

                    <p>Mohon untuk memverifikasi status Pendaftaran atas nama <b><?= $pendaftaran_pelayanandata['namapemohon']; ?></b> terlebih dahulu </p>

                    <div class="align-items-center justify-content-center">

                      <a href="<?= base_url('/DetailAdmin/selesaiPelayananData/' . $pendaftaran_pelayanandata['namapemohon']) ?>" class="btn btn-outline-success" data-popup="tooltip" data-placement="top" title="Selesai"><i class="bi bi-check-square" aria-hidden="true"></i> Verifikasi </a>

                      <a href="<?= base_url('/DetailAdmin/belumSelesaiPelayananData/' . $pendaftaran_pelayanandata['namapemohon']) ?>" class="btn btn-outline-danger" data-popup="tooltip" data-placement="top" title="Tidak Selesai"><i class="bi bi-x-square" aria-hidden="true"></i> Gagal Verifikasi </a>

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
                  <p>Pendaftaran atas nama <b><?= $pendaftaran_pelayanandata['namapemohon']; ?></b> Apakah sudah Selesai ?? </p>
                </div>

                <div class="modal-footer">

                  <div class="d-sm-flex align-items-center justify-content-end">

                    <button type="button" class="btn btn-secondary btn-sm mx-2" data-bs-dismiss="modal">Batal</button>

                    <form action="<?= base_url('DeleteAdmin/tandaiSelesaiPelayananData/' . $pendaftaran_pelayanandata['id']); ?>" method="post" class="d-inline">
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
              <th width="150px">Nama</th>
              <th width="20px">:</th>
              <td><?= $pendaftaran_pelayanandata['namapemohon']; ?></td>
            </tr>

            <tr>
              <th width="">Email</th>
              <th width="">:</th>
              <td><?= $pendaftaran_pelayanandata['emailpemohon']; ?></td>
            </tr>

            <tr>
              <th width="">Nomor Pemohon</th>
              <th width="">:</th>
              <td><?= $pendaftaran_pelayanandata['nomorpemohon']; ?></td>
            </tr>

            <tr>
              <th width="">Alamat Pemohon</th>
              <th width="">:</th>
              <td><?= $pendaftaran_pelayanandata['alamatpemohon']; ?></td>
            </tr>

            <tr>
              <th width="">Status</th>
              <th width="">:</th>
              <td><?= $pendaftaran_pelayanandata['status']; ?></td>
            </tr>

          </table>

          <div class="grid-container2 align-items-center justify-content-center">
            <div class="div">
              <a href="<?= base_url('/DetailAdmin/selesaiPelayananPemanfaatanData/' . $pendaftaran_pelayanandata['namapemohon']) ?>" class="btn btn-success" data-popup="tooltip" data-placement="top" title="Selesai"><i class="bi bi-check-square" aria-hidden="true"></i></a>
            </div>

            <div class="div">
              <a href="<?= base_url('/DetailAdmin/belumSelesaiPelayananPemanfaatanData/' . $pendaftaran_pelayanandata['namapemohon']) ?>" class="btn btn-danger" data-popup="tooltip" data-placement="top" title="Tidak Selesai"><i class="bi bi-x-square" aria-hidden="true"></i></a>
            </div>
          </div>

        </div>

        <div class="col-sm-12 col-md-12" style="padding: 20px;">
          <div class="card card-outline card-primary">

            <div class="card-header">
              <div class="card-title fw-semibold"> Berkas Pelayanan 1 </div>
            </div>

            <div class="card-body">
              <?php if (!empty($pendaftaran_pelayanandata['berkaspelayanan1'])) : ?>
                <iframe src="<?= base_url('/pelayanan/pelayanan_data/' . $pendaftaran_pelayanandata['berkaspelayanan1']) ?>" frameborder="0" height="500" width="100%"></iframe>
              <?php else : ?>
                <div class="alert alert-danger mt-0 mb-0" role="alert">
                  Berkas Pelayanan 1 tidak diinputkan !!
                </div>
              <?php endif; ?>
            </div>

          </div>
        </div>

        <div class="col-sm-12 col-md-12" style="padding: 20px;">
          <div class="card card-outline card-primary">

            <div class="card-header">
              <div class="card-title fw-semibold"> Berkas Pelayanan 2 </div>
            </div>

            <div class="card-body">
              <?php if (!empty($pendaftaran_pelayanandata['berkaspelayanan2'])) : ?>
                <iframe src="<?= base_url('/pelayanan/pelayanan_data/' . $pendaftaran_pelayanandata['berkaspelayanan2']) ?>" frameborder="0" height="500" width="100%"></iframe>
              <?php else : ?>
                <div class="alert alert-danger mt-0 mb-0" role="alert">
                  Berkas Pelayanan 2 tidak diinputkan !!
                </div>
              <?php endif; ?>
            </div>

          </div>
        </div>

        <div class="col-sm-12 col-md-12" style="padding: 20px;">
          <div class="card card-outline card-primary">

            <div class="card-header">
              <div class="card-title fw-semibold"> Berkas Pelayanan 3 </div>
            </div>

            <div class="card-body">
              <?php if (!empty($pendaftaran_pelayanandata['berkaspelayanan3'])) : ?>
                <iframe src="<?= base_url('/pelayanan/pelayanan_data/' . $pendaftaran_pelayanandata['berkaspelayanan3']) ?>" frameborder="0" height="500" width="100%"></iframe>
              <?php else : ?>
                <div class="alert alert-danger mt-0 mb-0" role="alert">
                  Berkas Pelayanan 3 tidak diinputkan !!
                </div>
              <?php endif; ?>
            </div>

          </div>
        </div>

        <div class="col-sm-12 col-md-12" style="padding: 20px;">
          <div class="card card-outline card-primary">

            <div class="card-header">
              <div class="card-title fw-semibold"> Berkas Pelayanan 4 </div>
            </div>

            <div class="card-body">
              <?php if (!empty($pendaftaran_pelayanandata['berkaspelayanan4'])) : ?>
                <iframe src="<?= base_url('/pelayanan/pelayanan_data/' . $pendaftaran_pelayanandata['berkaspelayanan4']) ?>" frameborder="0" height="500" width="100%"></iframe>
              <?php else : ?>
                <div class="alert alert-danger mt-0 mb-0" role="alert">
                  Berkas Pelayanan 4 tidak diinputkan !!
                </div>
              <?php endif; ?>
            </div>

          </div>
        </div>

        <div class="col-sm-12 col-md-12" style="padding: 20px;">
          <div class="card card-outline card-primary">

            <div class="card-header">
              <div class="card-title fw-semibold"> Berkas Pelayanan 5 </div>
            </div>

            <div class="card-body">
              <?php if (!empty($pendaftaran_pelayanandata['berkaspelayanan5'])) : ?>
                <iframe src="<?= base_url('/pelayanan/pelayanan_data/' . $pendaftaran_pelayanandata['berkaspelayanan5']) ?>" frameborder="0" height="500" width="100%"></iframe>
              <?php else : ?>
                <div class="alert alert-danger mt-0 mb-0" role="alert">
                  Berkas Pelayanan 5 tidak diinputkan !!
                </div>
              <?php endif; ?>
            </div>

          </div>
        </div>

        <div class="col-sm-12 col-md-12" style="padding: 20px;">
          <div class="card card-outline card-primary">

            <div class="card-header">
              <div class="card-title fw-semibold"> Berkas Pelayanan 6 </div>
            </div>

            <div class="card-body">
              <?php if (!empty($pendaftaran_pelayanandata['berkaspelayanan6'])) : ?>
                <iframe src="<?= base_url('/pelayanan/pelayanan_data/' . $pendaftaran_pelayanandata['berkaspelayanan6']) ?>" frameborder="0" height="500" width="100%"></iframe>
              <?php else : ?>
                <div class="alert alert-danger mt-0 mb-0" role="alert">
                  Berkas Pelayanan 6 tidak diinputkan !!
                </div>
              <?php endif; ?>
            </div>

          </div>
        </div>

        <div class="col-sm-12 col-md-12" style="padding: 20px;">
          <div class="card card-outline card-primary">

            <div class="card-header">
              <div class="card-title fw-semibold"> Berkas Pelayanan 7 </div>
            </div>

            <div class="card-body">
              <?php if (!empty($pendaftaran_pelayanandata['berkaspelayanan7'])) : ?>
                <iframe src="<?= base_url('/pelayanan/pelayanan_data/' . $pendaftaran_pelayanandata['berkaspelayanan7']) ?>" frameborder="0" height="500" width="100%"></iframe>
              <?php else : ?>
                <div class="alert alert-danger mt-0 mb-0" role="alert">
                  Berkas Pelayanan 7 tidak diinputkan !!
                </div>
              <?php endif; ?>
            </div>

          </div>
        </div>

        <div class="col-sm-12 col-md-12" style="padding: 20px;">
          <div class="card card-outline card-primary">

            <div class="card-header">
              <div class="card-title fw-semibold"> Berkas Pelayanan 8 </div>
            </div>

            <div class="card-body">
              <?php if (!empty($pendaftaran_pelayanandata['berkaspelayanan8'])) : ?>
                <iframe src="<?= base_url('/pelayanan/pelayanan_data/' . $pendaftaran_pelayanandata['berkaspelayanan8']) ?>" frameborder="0" height="500" width="100%"></iframe>
              <?php else : ?>
                <div class="alert alert-danger mt-0 mb-0" role="alert">
                  Berkas Pelayanan 8 tidak diinputkan !!
                </div>
              <?php endif; ?>
            </div>

          </div>
        </div>

        <div class="col-sm-12 col-md-12" style="padding: 20px;">
          <div class="card card-outline card-primary">

            <div class="card-header">
              <div class="card-title fw-semibold"> Berkas Pelayanan 9 </div>
            </div>

            <div class="card-body">
              <?php if (!empty($pendaftaran_pelayanandata['berkaspelayanan9'])) : ?>
                <iframe src="<?= base_url('/pelayanan/pelayanan_data/' . $pendaftaran_pelayanandata['berkaspelayanan9']) ?>" frameborder="0" height="500" width="100%"></iframe>
              <?php else : ?>
                <div class="alert alert-danger mt-0 mb-0" role="alert">
                  Berkas Pelayanan 9 tidak diinputkan !!
                </div>
              <?php endif; ?>
            </div>

          </div>
        </div>

        <div class="col-sm-12 col-md-12" style="padding: 20px;">
          <div class="card card-outline card-primary">

            <div class="card-header">
              <div class="card-title fw-semibold"> Berkas Pelayanan 10 </div>
            </div>

            <div class="card-body">
              <?php if (!empty($pendaftaran_pelayanandata['berkaspelayanan10'])) : ?>
                <iframe src="<?= base_url('/pelayanan/pelayanan_data/' . $pendaftaran_pelayanandata['berkaspelayanan10']) ?>" frameborder="0" height="500" width="100%"></iframe>
              <?php else : ?>
                <div class="alert alert-danger mt-0 mb-0" role="alert">
                  Berkas Pelayanan 10 tidak diinputkan !!
                </div>
              <?php endif; ?>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>

</section>

<?= $this->endSection('contentadmin'); ?>