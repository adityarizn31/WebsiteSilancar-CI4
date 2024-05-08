<?= $this->extend('layout/templateadmin'); ?>

<?= $this->section('contentadmin'); ?>

<section class="p-4" id="main-content">

  <button class="btn btn-primary" id="button-toggle">
    <i class="bi bi-list"></i>
  </button>

  <div class="card shadow mb-4 border-2" style="margin-top: 25px; padding: 20px;">

    <div class="card-header py-3">
      <div class="d-sm-flex align-items-center justify-content-between" style="padding-top:10px;"></div>
      <h4 class="m-0 font-weight-bold text-primary">Buat Akun Admin</h4>
    </div>

    <?= view('Myth\Auth\Views\_message_block') ?>

    <form class="user" action="<?= url_to('register') ?>" method="post">
      <?= csrf_field() ?>

      <!-- Keamanan -->
      <?= csrf_field(); ?>

      <div class="card-body">
        <div class="row">

          <!-- Nama -->
          <div class="col-sm-6">
            <div class="form-group">
              <label for="nama" class="form-label fw-semibold">Username</label>
              <input type="text" class="form-control form-control-user <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('nama'); ?>
              </div>
            </div>
          </div>

          <!-- Email -->
          <div class="col-sm-6">
            <div class="form-group">
              <label for="nama" class="form-label fw-semibold">Email</label>
              <input type="email" class="form-control form-control-user <?php if (session('errors.email')) : ?>is-invalid<?php endif ?> " name="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
              <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
              <div class="invalid-feedback">
                <?= $validation->getError('email'); ?>
              </div>
            </div>
          </div>

          <!-- Password -->
          <div class="col-sm-6">
            <div class="form-group">
              <label for="email" class="form-label fw-semibold">Password</label>
              <input type="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?> " name="password" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
              <div class="invalid-feedback">
                <?= $validation->getError('password'); ?>
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="mb-3">
              <label for="email" class="form-label fw-semibold">Confirm Password</label>
              <input type="password" class="form-control form-control-user <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?> " name="pass_confirm" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
              <div class="invalid-feedback">
                <?= $validation->getError('password'); ?>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-12">
              <button type="submit" class="btn btn-primary btn-user btn-block">
                <?= lang('Auth.register') ?>
              </button>
            </div>
          </div>

        </div>
      </div>

    </form>

  </div>

</section>

<?= $this->endSection('contentadmin'); ?>