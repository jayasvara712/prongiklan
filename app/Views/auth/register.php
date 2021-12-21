<?= $this->extend('auth/templates/index'); ?>
<?= $this->section('content'); ?>

  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="<?=base_url() ?>/stisla/assets/img/icons.png" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header justify-content-center"><h4>Register</h4></div>

                <div class="card-body">

                  <?php if (session()->getFlashdata('success')): ?>

                  <div class="alert alert-success alert-dismissible show fade">
                      <div class="alert-body">
                          <button class="close" data-dismiss="alert">x</button>
                          <b>Success !</b>
                          <?=session()->getFlashdata('success') ?>
                      </div>
                  </div>
                  <?php endif; ?>

                  <?php if (session()->getFlashdata('error')): ?>

                  <div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                          <button class="close" data-dismiss="alert">x</button>
                          <b>Failed !</b>
                          <?=session()->getFlashdata('error') ?>
                      </div>
                  </div>

                  <?php endif; ?>

                  <form method="POST" action="registerProcess" class="was-validated" >
                    <div class="form-group">
                        <label for="nama">Name</label>
                        <input id="nama" type="text" class="form-control" name="nama" placeholder="Nama Anda" required>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="username">Username</label>
                            <input id="username" type="text" class="form-control" name="username" placeholder="Username Anda" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="hp">No Handphone</label>
                            <input id="hp" type="tel" class="form-control" name="hp" placeholder="Nomor Handphone Anda" pattern="[0-9]{10}|[0-9]{11}" minlength="10" maxlength="11" required>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input id="email" type="email" class="form-control" name="email" placeholder="Alamat Email Anda" required>
                      <div class="invalid-feedback">
                      </div>
                  </div>
                    <div class="row">
                      <div class="form-group col-lg-6">
                          <label for="password" class="d-block">Password</label>
                          <input id="password" type="password" onkeydown="check()" onkeyup="check()" class="form-control pwstrength" data-indicator="pwindicator" name="password" placeholder="Masukkan Password Anda" minlength="8" required>
                          <div id="pwindicator" class="pwindicator">
                              <div class="bar"></div>
                              <div class="label"></div>
                          </div>
                          <div class="invalid-feedback">
                            Minimal 8 huruf
                          </div>
                      </div>
                      <div class="form-group col-lg-6">
                          <label for="password2" class="d-block">Password Confirmation</label>
                          <input id="password2" type="password" onkeydown="check()" onkeyup="check()" class="form-control" name="password2" placeholder="Masukkan Kembali Password Anda" minlength="8"  required>
                          <span id='message'></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Address</label>
                        <textarea name="alamat" class="form-control" placeholder="Masukkan Alamat Anda" required></textarea>
                        <div class="invalid-feedback">
                        </div>
                    </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree" class="custom-control-input" id="agree" required>
                      <label class="custom-control-label" for="agree">I agree with the <a href="#" data-toggle="modal" data-target="#exampleModal">terms and conditions</a></label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>

                  <div class="form-group">
                    <div class="float-left">
                        <a  href="login" class="text-small">
                            ← Back To Login
                        </a>
                    </div>
                  </div>

                  </form>
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

  <!-- modal -->
  <?= $this->include('auth/modal-terms.php'); ?>

<?= $this->endSection(); ?>