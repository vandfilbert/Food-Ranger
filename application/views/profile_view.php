<section class="hero-wrap">
    <div class="jumbotron" style="background-color: #799c55;">
        <h1 class="display-4" style="color: White;"><b>Hello, <?= $tenant['fullname'] ?></b></h1>
        <h4 class="lead" style="color: White;">Congratulation, now you part of us.</h4>
        <h5 class="my-4"></h5>
        <h5 style="color: White;">It is nice to know you join with us, hopefully we can work together.</h5>
        <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors() ?>
            </div>
        <?php endif; ?>
        <?= $this->session->flashdata('message'); ?>
    </div>
</section>

<section class="ftco-section" style="margin-top:-30px;">
    <div class="container">
        <div class="row">
            <div class="container text-center col-md-4">
                <div class="card" style="height:400px;">
                    <div class="card-body">
                        <h5>
                            <img src="<?= site_url('public/profile/') . $tenant['picture'] ?>" class="rounded" alt="Food Ranger" height="auto;" width="150px">
                        </h5>
                        <h3 class="card-title">Welcome to the club rangers !</h3>
                        </h5>
                        <q class="card-text">
                            If we have no peace, it is because we have forgotten that we belong to each other.
                        </q>
                        <p>—Mother Teresa</p>
                        <p>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#signoutmodal">
                                Sign Out
                            </button>
                        </p>
                    </div>
                </div>
            </div>
            <div class="container text-center col-md-8">
                <div class="card">
                    <div class="card-header">
                        <blockquote>
                            <h5 style="font-size:20pt;"><?= $tenant['fullname'] ?></h5>
                            <small><cite title="Source Title"><i class="icon-map-marker" style="font-size:16pt;"> <?= $tenant['address'] ?> </i></cite></small>
                        </blockquote>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">My Profile</h4>
                        <p style="font-size:13pt;">
                            Email : <br>
                            <?= $tenant['email'] ?> <br>
                        </p>
                        <p style="font-size:13pt;">
                            City : <br>
                            <?= $tenant['city'] ?> <br>
                        </p>
                        <p style="font-size:13pt;">
                            Role : <br>
                            <?= $tenant['role'] ?> <br>
                        </p>
                        <p style="font-size:13pt;">
                            Type : <br>
                            <?= $tenant['type'] ?> <br>
                        </p>
                        <p style="font-size:13pt;">
                            Motto : <br>
                            <?= $tenant['motto'] ?> <br>
                        </p>
                    </div>
                    <p class="lead text-center">
                        <a href="" data-id="<?= $tenant['id'] ?>" id="editUser" data-name="<?= $tenant['fullname'] ?>" data-mail="<?= $tenant['email'] ?>" class=" btn btn-primary editUser" data-toggle="modal" data-target=".edit-modal-lg">Edit Profile</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="heading-section mb-4 pb-md-3">
                    My Event
                </h2>
            </div>
        </div>

        <div class="row" style="margin-bottom: 30px;">
            <div class="col-md-12">
                <a class=" btn btn-primary" data-toggle="modal" data-target=".add-modal-lg">
                    <font color='white'>Add Event</font>
                </a>
            </div>
        </div>

        <div class="row">
            <?php
            $user_id = $this->session->userdata('id');
            $query = "SELECT * FROM `event` INNER JOIN `user`
                      ON `event`.`user_id` = `user`.id 
                      WHERE `user`.`id` = $user_id";
            $event = $this->db->query($query)->result_array();
            ?>
            <?php $today = date("Y-m-d"); ?>
            <?php foreach ($event as $_event) : ?>
                <?php $time = date_create($_event['time_start']); ?>
                <?php $time2 = date_create($_event['time_end']); ?>
                <?php $timeStart = date_format($time, 'H:i A'); ?>
                <?php $timeEnd = date_format($time2, 'H:i A'); ?>
                <div class="col-md-4">
                    <div class="card" style="height:500px;">
                        <h5 class="card-header py-4" style="background-color: #799c55"><?= $_event['name_event'] ?></h5>
                        <div class="card-body">
                            <h5 class="card-title">Date Event: <?= $_event['date_event'] ?></h5>
                            <h5 class="card-title">End Event: <?= $_event['end_event'] ?></h5>
                            <p class="card-text"><?= $_event['description_event'] ?></p>
                            <p class="card-text">
                                Open Regis: <?= $_event['open_start'] ?><br>
                                Close Regis: <?= $_event['open_end'] ?>
                            </p>
                            <p class="card-text">
                                Time: <?= $timeStart ?> - <?= $timeEnd ?>
                            </p>
                            <p class="card-text"><i>Contact Person: <?= $_event['pic'] ?> / <?= $_event['phone'] ?></i></p>
                            <?php if ($today > $_event['end_event']) : ?>
                                <p class="card-text"><i>
                                        <font color="red">*Expired</font>
                                    </i>
                                </p>
                            <?php else : ?>
                                <p class="card-text"><i>
                                        <font color="green">*Open</font>
                                    </i>
                                </p>
                            <?php endif; ?>
                        </div>
                        <div class="card-footer bg-white">
                            <a href="<?= site_url('Profile/deleteEvent/') . $_event['event_id'] ?>" class="badge badge-pill badge-danger float-right" onclick="return confirm('Are you sure?');">
                                <font color='white'>Delete</font>
                            </a>
                            <a href="<?= site_url('Profile/editview/') . $_event['event_id'] ?>" class="badge badge-pill badge-warning float-right">
                                <font color='white'>Edit</font>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Sign out Modal -->
<div class="modal fade" id="signoutmodal" tabindex="-1" role="dialog" aria-labelledby="signoutmodalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signoutmodalLabel">Sign Out</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure want to sign out ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, not yet</button>
                <a href="<?= site_url('User/signOut') ?>" class="btn btn-primary">Yes, sure !</a>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal Profile-->
<div class="modal fade edit-modal-lg" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Edit Profile</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="<?= site_url('Profile/editProfile') ?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" id="iduser" name="iduser">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="<?= $tenant['email'] ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Username</label>
                        <input type="text" value="<?= $tenant['username'] ?>" class="form-control" id="usernmae" name="username" readonly>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Fullname</label>
                        <input type="text" value="<?= $tenant['fullname'] ?>" class="form-control" id="name" name="name">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">City</label>
                        <input type="text" value="<?= $tenant['city'] ?>" class="form-control" id="city" name="city">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Address</label>
                        <input type="text" value="<?= $tenant['address'] ?>" class="form-control" id="address" name="address">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Motto</label>
                        <input type="text" value="<?= $tenant['motto'] ?>" class="form-control" id="motto" name="motto">
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= site_url('public/profile/') . $tenant['picture'] ?>" class="img-thumbnail">
                        </div>

                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Modal Event-->
<div class="modal fade add-modal-lg" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add Event</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="<?= site_url('Profile/addEvent') ?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" id="userid" name="userid" value="<?= $tenant['id'] ?>">
                    <div class="form-group">
                        <label for="event">Event Name</label>
                        <input type="text" class="form-control" id="text" name="event">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="textarea" class="form-control" id="description" name="description" placeholder="Max 20 Words">
                    </div>

                    <div class="form-group">
                        <label for="startdate">Start Event : </label>
                        <input type="date" class="form-control" id="startdate" name="startdate">
                    </div>

                    <div class="form-group">
                        <label for="enddate">End Event : </label>
                        <input type="date" class="form-control" id="enddate" name="enddate">
                    </div>

                    <div class="form-group">
                        <label for="openregis">Open Regis : </label>
                        <input type="date" class="form-control" id="openregis" name="openregis">
                    </div>

                    <div class="form-group">
                        <label for="closeregis">Close Regis : </label>
                        <input type="date" class="form-control" id="closeregis" name="closeregis">
                    </div>

                    <div class="form-group">
                        <label for="timestart">Time Start : </label>
                        <input type="time" class="form-control" name="timestart">
                    </div>

                    <div class="form-group">
                        <label for="timeend">Time End : </label>
                        <input type="time" class="form-control" name="timeend">
                    </div>

                    <div class="form-group">
                        <label for="picname">PIC Name : </label>
                        <input type="text" class="form-control" name="picname">
                    </div>

                    <div class="form-group">
                        <label for="picnumber">PIC Number : </label>
                        <input type="tel" class="form-control" name="picnumber">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Event</button>
                </div>
            </form>
        </div>
    </div>
</div>