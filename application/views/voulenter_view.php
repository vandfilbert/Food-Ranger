<section class="hero-wrap">
    <div class="jumbotron" style="background-image: url('<?= base_url() ?>public/pic/backgroundgreen.png'); width:100%;">
        <h1 class="display-4" style="color: White;"><b>Hello, Want Join as Volunteer !</b></h1>
        <h4 class="lead" style="color: White;">We are looking for volunteer who's capable to know area of Surabaya.</h4>
        <h5 class="my-4"></h5>
        <h5 style="color: White;">It is nice to know you, hopefully we can work together.</h5>
        <hr class="my-4">
        <p class="lead">
            <?= $this->session->flashdata('message'); ?>
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors() ?>
                </div>
            <?php endif; ?>
        </p>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="heading-section mb-4 pb-md-3">
                    How to Join Us ?
                </h2>
            </div>
        </div>
        <div class="row" style="padding-top: 40px; padding-left: 10px; padding-right: 10px;">
            <div class="container text-center col-md-4">
                <div class="card" style="height:400px;">
                    <div class="card-body">
                        <h5>
                            <img src="<?= base_url() ?>public/pic/register.png" class="rounded" alt="Food Ranger" height="auto;" width="150px">
                        </h5>
                        <h3 class="card-title">Register Yourself</h3>
                        </h5>
                        <q class="card-text">
                            Year’s end is neither an end nor a beginning but a going on, with all the wisdom that experience can install in us.
                        </q>
                        <p>—Hal Borland</p>
                    </div>
                </div>
            </div>

            <div class="container text-center col-md-4">
                <div class="card" style="height:400px;">
                    <div class="card-body">
                        <h5>
                            <img src="<?= base_url() ?>public/pic/database.png" class="rounded" alt="Food Ranger" height="auto;" width="150px">
                        </h5>
                        <h3 class="card-title">Fill Your Data</h3>
                        </h5>
                        <q class="card-text">
                            Whoever is careless with the truth in small matters, cannot be trusted with important and bigger matters.
                        </q>
                        <p>― Albert Einstein</p>
                    </div>
                </div>
            </div>

            <div class="container text-center col-md-4">
                <div class="card" style="height:400px;">
                    <div class="card-body">
                        <h5>
                            <img src="<?= base_url() ?>public/pic/tree.png" class="rounded" alt="Food Ranger" height="auto;" width="150px">
                        </h5>
                        <h3 class="card-title">Wait us to contact you !</h3>
                        </h5>
                        <q class="card-text">
                            We will open the book. Its pages are blank. We are going to put words on them ourselves. The book is called Opportunity and its first chapter is New Day.
                        </q>
                        <p>—Edith Lovejoy Pierce</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-section-2 bg-light">
    <div class="container text-center">
        <h2><b>Form Registration for Volunteer</b></h2>
    </div>

    <div class="container">
        <?php echo form_open_multipart('Register/addVolunteer'); ?>
        <div class="row">
            <div class="form-group col-md-6 ">
                <label for="fullname" class="col-md-6 col-form-label">Full Name</label>
                <input type="text" class="form-control" id="fulname" name="fullname" required>
                <?= form_error('fullname', '<small class="text-danger pl3">', '</small>'); ?>
            </div>

            <div class="form-group col-md-6">
                <label for="gender" class="col-md-6 col-form-label">Gender</label>
                <select name="gender" id="gender" class='form-control' required>
                    <option value=""></option>
                    <option value='Male'>Male</option>
                    <option value='Female'>Female</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6 ">
                <label for="city" class="col-md-6 col-form-label">City</label>
                <input type="text" class="form-control" id="city" name="city" required>
            </div>

            <div class="form-group col-md-6 ">
                <label for="address" class="col-md-6 col-form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6 ">
                <label for="phone" class="col-md-6 col-form-label">Phone</label>
                <input type="tel" class="form-control" id="phone" name="phone" required>
            </div>

            <div class="form-group col-md-6 ">
                <label for="mail" class="col-md-6 col-form-label">Email</label>
                <input type="email" class="form-control" id="mail" name="mail" required>
                <?= form_error('mail', '<small class="text-danger pl3">', '</small>'); ?>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-12">
                <label for="motivation">Motivation</label>
                <textarea class="form-control" id="motivation" rows="10" name="motivation" placeholder="Max 20 words"></textarea>
                <?= form_error('motivation', '<small class="text-danger pl3">', '</small>'); ?>
            </div>
        </div>

        <div class="row float-right">
            <div class="form-group col-6">
                <button type="submit" class="btn btn-primary">Submit</button><br>
            </div>
        </div>
        </form>
    </div>
</section>