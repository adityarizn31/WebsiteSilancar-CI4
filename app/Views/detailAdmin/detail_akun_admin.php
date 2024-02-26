<!-- Halaman Detail Akun Admin -->
<?= $this->extend('layout/templateadmin'); ?>

<?= $this->section('contentadmin'); ?>

<section class="p-4" id="main-content">

  <button class="btn btn-primary" id="button-toggle">
    <i class="bi bi-list"></i>
  </button>

  <div class="card shadow mb-4 border-2" style="margin-top: 25px;">

    <div class="card-header py-3 border-0">
      <h6 class="m-0 font-weight-bold text-primary">Detail Akun Admin</h6>
    </div>

    <div class="container">
      <div class="row g-0">

        <div class="col-6 col-md-4">
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">

              <div class="text-center">
                <img src="/img/adit.png" alt="Foto Admin" srcset="" class="foto_admin">
              </div>

              <div class="text-center">
                <h3 class="profile-username text-center">Aditya Rizkiawan N</h3>
                <p class="text-muted text-center">Sofware Engineering</p>
              </div>

            </div>
          </div>
        </div>

        <div class="col-sm-6 col-md-8">

          <div class="card card-outline card-primary">
            <div class="card-header">
              <h3 class="card-title"> Data Profile Admin </h3>
            </div>
            <div class="card-body">
              <table>
                <tr>
                  <th width="100px">Nama</th>
                  <th width="20px">:</th>
                  <td><?= $admin['nama']; ?></td>
                </tr>
                <tr>
                  <th>Email</th>
                  <th>:</th>
                  <td><?= $admin['email']; ?></td>
                </tr>
                <tr>
                  <th>Level</th>
                  <th>:</th>
                  <td><?= $admin['level']; ?></td>
                </tr>
              </table>
            </div>
          </div>

        </div>

      </div>

    </div>
  </div>

</section>

<?= $this->endSection('contentadmin'); ?>