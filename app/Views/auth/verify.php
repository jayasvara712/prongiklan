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
              <div class="card-header"><h4>Verify Email Anda</h4></div>

              <div class="card-body">
              <?php if(session()->getFlashdata('success')) : ?>

                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">x</button>
                        <b>Success !</b>
                        <?=session()->getFlashdata('success')?>
                    </div>
                </div>
                
                <?php endif; ?>

                <?php if(session()->getFlashdata('error')) : ?>

<div class="alert alert-danger alert-dismissible show fade">
    <div class="alert-body">
        <button class="close" data-dismiss="alert">x</button>
        <b>Error !</b>
        <?=session()->getFlashdata('error')?>
    </div>
</div>

<?php endif; ?>
                <p class="text-muted">Masukkan kode yang terdapat pada email anda!</p>
                <form method="POST" action="verifyProses">
                    
                <div class="row">
                    <input type="hidden" name="mode" value="<?=$asd['mode']?>">
                    <input type="hidden" name="email" value="<?=$asd['email'] ?>">
                      <div class="form-group col-3">
                          <input id="v1" type="text" class="form-control text-center" name="code1" placeholder="0" maxlength="1" pattern="[0-9]{1}">
                      </div>
                      <div class="form-group col-3">
                          <input id="v2" type="text" class="form-control text-center" name="code2" placeholder="0" maxlength="1" pattern="[0-9]{1}">
                      </div>
                      <div class="form-group col-3">
                          <input id="v3" type="text" class="form-control text-center" name="code3" placeholder="0" maxlength="1" pattern="[0-9]{1}">
                      </div>
                      <div class="form-group col-3">
                          <input id="v4" type="text" class="form-control text-center" name="code4" placeholder="0" maxlength="1" pattern="[0-9]{1}">
                      </div>
                    </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Verify
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