<!-- Halaman Tampilan Visi Admin  -->

<?= $this->extend('layout/templateadmin'); ?>

<?= $this->section('contentadmin'); ?>

<section class="p-4" id="main-content">

  <button class="btn btn-primary" id="button-toggle">
    <i class="bi bi-list"></i>
  </button>

  <div class="card shadow mb-4 border-2" style="margin-top: 25px;">

    <div class="card-header py-3 border-0">
      <div class="m-0 font-weight-bold text-primary"> Visi Misi Disdukcapil </div>
    </div>

    <div class="container mt-4">
      <div class="row">
        <div class="col">

          <?php if (session()->getFlashdata('pesan')) : ?>

            <div class="alert alert-success" role="alert">
              <?= session()->getFlashdata('pesan'); ?>
            </div>

          <?php endif; ?>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card mb-3" style="border: none; border: 0; outline: none; box-shadow: none;">

            <div class="card-body">

              <div class="row">

                <?php foreach ($visimisi as $v) : ?>

                  <tr>
                    <td><img src="/img/visimisi/<?= $v['fotovisimisi']; ?>" class="fotovisimisi" alt="Foto Visi Misi" srcset=""></td>
                  </tr>

                <?php endforeach; ?>

              </div>

            </div>

            <!-- Diarahkan ke halaman Form Ganti Foto Visi Misi -->
            <a href="/EditUpdateAdmin/editVisiMisi/<?= $v['fotovisimisi'] ?>" class="btn btn-warning">Edit</a>

          </div>
        </div>
      </div>
    </div>

  </div>

</section>

<?= $this->endSection('contentadmin'); ?>