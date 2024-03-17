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

<div class="container mb-3">
  <div class="row">
    <div class="col">

      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel">Detail Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <p><strong>NIK:</strong> <?= $pendaftaran_kk->nik ?></p>
              <p><strong>Nama Pemohon:</strong> <?= $pendaftaran_kk->namapemohon ?></p>
              <p><strong>Email Pemohon:</strong> <?= $pendaftaran_kk->emailpemohon ?></p>
              <p><strong>Nomor Pemohon:</strong> <?= $pendaftaran_kk->nomorpemohon ?></p>
              <p><strong>Alamat Pemohon:</strong> <?= $pendaftaran_kk->alamatpemohon ?></p>
              <p><strong>Status:</strong> <?= $pendaftaran_kk->status ?></p>
              <p><strong>Formulir Desa:</strong> <?= $pendaftaran_kk->formurlirdesa ?></p>
              <p><strong>Kartu Keluarga Suami:</strong> <?= $pendaftaran_kk->kartukeluargasuami ?></p>
              <p><strong>Kartu Keluarga Istri:</strong> <?= $pendaftaran_kk->kartukeluargaistri ?></p>
              <p><strong>Surat Nikah:</strong> <?= $pendaftaran_kk->suratnikah ?></p>
              <p><strong>Surat Pindah:</strong> <?= $pendaftaran_kk->suratpindah ?></p>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

          </div>
        </div>
      </div>

      <script>
        $(document).ready(function() {
          $('#myModal').modal('show');
        });
      </script>

      <form action="/Searching/cariKK/<?= $pendaftaran_kk->nik ?>" method="post">

        <?= csrf_field(); ?>

        <div class="row g-2">

          <div class="col-md">
            <div class="form-floating">
              <input type="text" name="keyword" class="form-control" id="floatingInputGrid" autofocus>
              <label for="floatingInputGrid" class="fw-semibold text-black">NIK </label>
            </div>
          </div>

          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInputDisabled" placeholder="Pendaftaran Kartu Keluarga" disabled>
            <label for="floatingInputDisabled" class="fw-semibold text-black">Pendaftaran Kartu Keluarga</label>
          </div>

          <div class="d-grid gap-2 col-6 mx-auto">
            <button type="submit" value="submit" name="submit" id="submit" class="btn btn-primary"> Cek Pendaftaran </button>
          </div>

      </form>

    </div>
  </div>
</div>

<?= $this->endSection('content'); ?>