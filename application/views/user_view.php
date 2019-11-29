<section class="ftco-section ftco-section-2 section-signup page-header img js-fullheight" style="background-image: url('<?= base_url() ?>public/pic/login.jpg');">
    <div class="container text-center">
        <h2 class="display-4" style="color: white;"><b>Hello, Welcome Back !</b></h2>
        <?= $this->session->flashdata('message'); ?>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                <div class="card card-login py-4">
                    <form class="form-login" method="POST" action="<?= site_url('User') ?>">
                        <div class="card-header card-header-primary text-center">
                            <h4 class="card-title">Food Ranger</h4>
                        </div>
                        <div class="card-body p-4">
                            <label for="email" class="col-md-6 col-form-label">Email</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="ion-ios-paper-plane"></i>
                                    </span>
                                </div>
                                <input type="email" class="form-control" placeholder="Email..." name="email">
                            </div>
                            <?= form_error('email', '<small class="text-danger pl3">', '</small>'); ?>
                            <label for="email" class="col-md-6 col-form-label">Password</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="ion-ios-lock"></i>
                                    </span>
                                </div>
                                <input type="password" class="form-control" placeholder="Password..." name="password">
                            </div>
                        </div>
                        <?= form_error('password', '<small class="text-danger pl3">', '</small>'); ?>
                        <div class="footer text-center">
                            <button type="submit" class="btn btn-primary">Sign In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>