<section class="ftco-section ftco-section-2 js-fullheight" style="background-color: #799c55;">
    <div class="container bg-light" style="width: 600px;">
        <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors() ?>
            </div>
        <?php endif; ?>
        <?= $this->session->flashdata('message'); ?>
        <div class="row">
            <div class="col-md-12">
                <h3 class="heading-section mb-4 pb-md-3">
                    Register here!
                </h3>
            </div>
        </div>
        <?php echo form_open_multipart('Tenant/registenant') ?>
        <div class="row">
            <div class="form-group col-md-6 ">
                <label for="email" class="col-md-6 col-form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
                <?= form_error('email', '<small class="text-danger pl3">', '</small>'); ?>
            </div>

            <div class="form-group col-md-6 ">
                <label for="username" class="col-md-6 col-form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
                <?= form_error('username', '<small class="text-danger pl3">', '</small>'); ?>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6 ">
                <label for="fullname" class="col-md-6 col-form-label">Full Name</label>
                <input type="text" class="form-control" id="fulname" name="fullname" required>
                <?= form_error('fullname', '<small class="text-danger pl3">', '</small>'); ?>
            </div>

            <div class="form-group col-md-6">
                <label for="role" class="col-md-6 col-form-label">Role</label>
                <select name="role" id="role" class='form-control' required>
                    <option value=""></option>
                    <option value='1'>Recipient</option>
                    <option value='2'>Donatur</option>
                </select>
                <?= form_error('role', '<small class="text-danger pl3">', '</small>'); ?>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6 ">
                <label for="city" class="col-md-6 col-form-label">City</label>
                <input type="city" class="form-control" id="city" name="city" required>
                <?= form_error('city', '<small class="text-danger pl3">', '</small>'); ?>
            </div>

            <div class="form-group col-md-6 ">
                <label for="address" class="col-md-6 col-form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
                <?= form_error('address', '<small class="text-danger pl3">', '</small>'); ?>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6 ">
                <label for="password" class="col-md-6 col-form-label">Personal Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
                <?= form_error('password', '<small class="text-danger pl3">', '</small>'); ?>
            </div>

            <div class="form-group col-md-6 ">
                <label for="copassword" class="col-md-6 col-form-label">Confirm Password</label>
                <input type="password" class="form-control" id="copassword" name="copassword" required>
                <?= form_error('copassword', '<small class="text-danger pl3">', '</small>'); ?>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="type" class="col-md-6 col-form-label">Type</label>
                <select name="type" id="type" class='form-control' required>
                    <option value=""></option>
                    <option value='1'>Organization</option>
                    <option value='2'>Personal</option>
                    <option value='3'>Goverment</option>
                </select>
                <?= form_error('type', '<small class="text-danger pl3">', '</small>'); ?>
            </div>
            <div class="form-group col-md-6" style="margin-top: 20px;">
                <button type="submit" class="btn btn-primary">Register</button><br>
            </div>
        </div>
        </form>
    </div>
</section>