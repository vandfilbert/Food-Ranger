<section class="hero-wrap js-fullheight" style="background-image: url('<?= base_url() ?>/public/pic/market.jpg'); background-size:auto; width:100%;">
    <div class="container">
        <div class="row description js-fullheight align-items-center justify-content-center">
            <div class="col-md-8 text-center">
                <div class="text">
                    <h1>Food Ranger</h1>
                    <h4 class="mb-5">Don't waste the food</h4>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="jumbotron jumbotron-fluid" style="background-color: #799c55">
        <div class="container">
            <h1 class="display-4">Our Vision</h1>
            <p class="lead" style="text-align: justify; color: white;">
                Strat from the care, end with action, and finish it well.
            </p>
        </div>
    </div>
</section>

<section class="ftco-section" style="margin-top:-50px;">
    <div class="col-md-12 text-center">
        <img src="<?= site_url('public/pic/tree.png') ?>" class="rounded" alt="Food Ranger" height="auto;" width="260px"><br>
        <h2 class="heading-section mb-4">
            <large>Fun fact from FOOD RANGER</large>
        </h2>
    </div>
</section>

<section class="ftco-section ftco-section-2" style="margin-top:-100px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <h2 class="heading-section mb-4 pb-md-3">
                    <b>Did you know?</b>
                </h2>
                <h5>
                    1.3 billion tons of food are wasted every year.
                </h5>
                <h5>
                    If wasted food was a country, it would be the third largest producer of carbon dioxide in the world, after the United States and China.
                </h5>
                <h5>
                    Food waste generates 3.3 billions tons of carbon dioxide, which accelerates global climate change.
                </h5>
                <h5>
                    According to the Economics Intelligence Unit (EIU) in 2016 Indonesia ranked the second largest food waste.
                </h5>
            </div>
            <div class="col-md-5">
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/1aH7RwOD0RE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-section-2 bg-light" id="cards">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="heading-section mb-4 pb-md-3">
                    Event on FOOD RANGER
                </h2>
            </div>
        </div>
        <div class="row">
            <?php
            $query = "SELECT * FROM `event` WHERE CURRENT_DATE() <= `end_event`";
            $event = $this->db->query($query)->result_array();
            ?>
            <?php foreach ($event as $_event) : ?>
                <?php $time = date_create($_event['time_start']); ?>
                <?php $time2 = date_create($_event['time_end']); ?>
                <?php $timeStart = date_format($time, 'H:i A'); ?>
                <?php $timeEnd = date_format($time2, 'H:i A'); ?>
                <div class="col-md-4">
                    <div class="card" style="margin-bottom: 20px; height: 500px;">
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
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>