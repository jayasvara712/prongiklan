<?= $this->extend('auth/templates/index'); ?>
<?= $this->section('content'); ?>

  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="<?=base_url() ?>/stisla/assets/img/icons.png" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Reset Password</h4></div>

              <div class="card-body">
              <?php if (session()->getFlashdata('error')): ?>

<div class="alert alert-danger alert-dismissible show fade">
    <div class="alert-body">
        <button class="close" data-dismiss="alert">x</button>
        <b>Failed !</b>
        <?=session()->getFlashdata('error') ?>
    </div>
</div>

<?php endif; ?>
                <p class="text-muted">We will send a link to reset your password</p>
                <form method="POST" action="resetProses">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Reset Password
                    </button>
                  </div>
                </form>

                <div class="form-group">
                    <div class="float-left">
                        <a  href="login" class="text-small">
                            ← Back To Login
                        </a>
                    </div>
                  </div>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; Prongiklan 2021
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?= $this->endSection(); ?>