<?php foreach ($event as $Event); ?>
<section class="hero-wrap">
    <div class="jumbotron" style="background-color: #799c55;">
        <h1 class="display-4" style="color: White;"><b>Hello, <?= $Event['fullname'] ?></b></h1>
        <h4 class="lead" style="color: White;">Congratulation, now you part of us.</h4>
        <h5 class="my-4"></h5>
        <h5 style="color: White;">It is nice to know you join with us, hopefully we can work together. | Let's edit your event</h5>
    </div>
</section>

<section class="ftco-section bg-light" style="margin-top:-30px;">
    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors() ?>
        </div>
    <?php endif; ?>
    <?= $this->session->flashdata('message'); ?>
    
    <div class="container">
        <form method="POST" action="<?= site_url('Profile/editEvent') ?>" enctype="multipart/form-data">
            <input type="hidden" name='idevent' value="<?= $Event['event_id'] ?>">
            <div class="form-group">
                <label for="editevent">Event Name</label>
                <input type="text" class="form-control" id="editevent" name="editevent" value="<?= $Event['name_event'] ?>">
            </div>

            <div class="form-group">
                <label for="editdescription">Description</label>
                <input type="textarea" class="form-control" id="editdescription" name="editdescription" placeholder="Max 20 Words" value="<?= $Event['description_event'] ?>">
            </div>

            <div class="form-group">
                <label for="editstartdate">Start Event : </label>
                <input type="date" class="form-control" id="editstartdate" name="editstartdate" value="<?= $Event['date_event'] ?>">
            </div>

            <div class="form-group">
                <label for="editenddate">End Event : </label>
                <input type="date" class="form-control" id="editenddate" name="editenddate" value="<?= $Event['end_event'] ?>">
            </div>

            <div class="form-group">
                <label for="editopenregis">Open Regis : </label>
                <input type="date" class="form-control" id="editopenregis" name="editopenregis" value="<?= $Event['open_start'] ?>">
            </div>

            <div class="form-group">
                <label for="editcloseregis">Close Regis : </label>
                <input type="date" class="form-control" id="editcloseregis" name="editcloseregis" value="<?= $Event['open_end'] ?>">
            </div>

            <div class="form-group">
                <label for="edittimestart">Time Start : </label>
                <input type="time" class="form-control" id="edittimestart" name="edittimestart" value="<?= $Event['time_start'] ?>">
            </div>

            <div class="form-group">
                <label for="edittimeend">Time End : </label>
                <input type="time" class="form-control" id="edittimeend" name="edittimeend" value="<?= $Event['time_end'] ?>">
            </div>

            <div class="form-group">
                <label for="editpicname">PIC Name : </label>
                <input type="text" class="form-control" id="editpicname" name="editpicname" value="<?= $Event['pic'] ?>">
            </div>

            <div class="form-group">
                <label for="editpicnumber">PIC Number : </label>
                <input type="tel" class="form-control" id="editpicnumber" name="editpicnumber" value="<?= $Event['phone'] ?>">
            </div>

            <div class="row float-right">
                <div class=" form-group col-12">
                    <button type="button" class="btn btn-secondary" id='closebtn'>Cancel</button>
                    <button type="submit" class="btn btn-primary">Edit Event</button>
                </div>
            </div>
        </form>
    </div>
</section>