<?= $this->extend('layout/templateadmin'); ?>

<?= $this->section('contentadmin'); ?>

<div class="container">

  <div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <div class="row">
            <div class="col-lg-6 d-none d-lg-block bg-login-image">
              <center>
                <img src="/img/admin/LogoSindangKasih.png" alt="" style="padding: 20px;" width="100%">
              </center>
            </div>
            <div class="col-lg-6">
              <div class="p-5">

                <div class="text-center">
                  <div class="h4 text-gray-900 mb-4">Selamat Datang</div>
                </div>

                <form class="user">

                  <div class="form-group">
                    <input type="email" class="form-control form-control-user" id="inputEmail" aria-describedby="email" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="password" placeholder="Password">
                  </div>

                  <a href="/admin/index" class="btn btn-primary btn-user btn-block">Login</a>
                  <hr>

                </form>

                <div class="text-center">
                  <a href="" class="small">Forgot Password?</a>
                </div>
                <div class="text-center">
                  <a href="" class="small">Create an Account</a>
                </div>


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<?= $this->endSection('contentadmin'); ?>