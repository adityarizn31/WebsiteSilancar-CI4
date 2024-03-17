<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="/css/style.css">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

  <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <link rel="stylesheet" href="/css/style.css">

  <link href="<?= base_url(); ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <title> <?= $title; ?> </title>

</head>

<body>

  <?= $this->include('layout/sidebar'); ?>

  <?= $this->renderSection('contentadmin'); ?>

  <section class="p-4" id="main-content">
    <footer class="sticky-footer bg-white">
      <div class="container my-auto">
        <div class="copyright text-center my-auto">
          <span>Copyright &copy; Dinas Kependudukan dan Pencatatan Sipil Majalengka 2023</span>
        </div>
      </div>
    </footer>
  </section>

  <script>
    document.getElementById("button-toggle").addEventListener("click", () => {
      document.getElementById("sidebar").classList.toggle("active-sidebar");
      document.getElementById("main-content").classList.toggle("active-main-content");
    });

    function previewImgBerita() {
      const fotoberita = document.querySelector('#fotoberita');
      const imgPreviewBerita = document.querySelector('.img-preview');

      const fileFotoBerita = new FileReader();
      fileFotoBerita.readAsDataURL(fotoberita.files[0]);

      fileFotoBerita.onload = function(e) {
        imgPreviewBerita.src = e.target.result;
      }
    }

    function previewImgInovasi() {
      const fotoinovasi = document.querySelector('#fotoinovasi');
      const imgPreviewInovasi = document.querySelector('.img-preview');

      const fileFotoInovasi = new FileReader();
      fileFotoInovasi.readAsDataURL(fotoinovasi.files[0]);

      fileFotoInovasi.onload = function(e) {
        imgPreviewInovasi.src = e.target.result;
      }
    }

    function previewImgVisiMisi() {
      const fotovisimisi = document.querySelector('#fotovisimisi');
      const imgPreviewVisiMisi = document.querySelector('.img-preview');

      const filefotovisimisi = new FileReader();
      filefotovisimisi.readAsDataURL(fotovisimisi.files[0]);

      filefotovisimisi.onload = function(e) {
        imgPreviewVisiMisi.src = e.target.result;
      }
    }

    function previewImgPersyaratan() {
      const fotopersyaratan = document.querySelector('#fotopersyaratan');
      const imgPreviewPersyaratan = document.querySelector('.img-preview');

      const fileFotoPersyaratan = new FileReader();
      fileFotoPersyaratan.readAsDataURL(fotopersyaratan.files[0]);

      fileFotoPersyaratan.onload = function(e) {
        imgPreviewPersyaratan.src = e.target.result;
      }
    }

    function previewImgPendaftaranKIA() {
      const pasfoto = document.querySelector('#pasfoto');
      const imgPreviewPasFoto = document.querySelector('.img-preview');

      const filePasFoto = new FileReader();
      filePasFoto.readAsDataURL(pasfoto.files[0]);

      filePasFoto.onload = function(e) {
        imgPreviewPasFoto.src = e.target.result;
      }
    }
  </script>

  <script src="<?= base_url(); ?>/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url(); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?= base_url(); ?>/js/sb-admin-2.min.js"></script>

</body>

</html>