  <div class="main-section">
      <?php
        $user = $this->session->userdata('email');
        ?>
      <!--Start of Navigation Bar-->
      <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
          <div class="container">
              <a class="navbar-brand" href="<?= site_url('Home') ?>">
                  <img src="<?= site_url('public/pic/tree.png') ?>" alt="Food Ranger" width="40px;">
                  <b>
                      FOOD RANGER
                  </b>
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="oi oi-menu"></span> Menu
              </button>
              <div class="collapse navbar-collapse" id="ftco-nav">
                  <ul class="navbar-nav ml-auto">
                      <li class="nav-item"><a href="<?= site_url('Register') ?>" class="nav-link icon d-flex align-items-center"><i class="ion-ios-man mr-2"></i>Voulenter</a></li>
                      <?php if (!$user) : ?>
                          <li class="nav-item"><a href="<?= site_url('Tenant') ?>" class="nav-link icon d-flex align-items-center"><i class="ion-ios-people mr-2"></i>Sign Up</a></li>
                          <li class="nav-item"><a href="<?= site_url('User') ?>" class="nav-link icon d-flex align-items-center"><i class="ion-ios-power mr-2"></i>Sign In</a></li>
                      <?php else : ?>
                          <li class="nav-item"><a href="<?= site_url('Profile') ?>" class="nav-link icon d-flex align-items-center"><i class="ion-ios-contact mr-2"></i>Profile</a></li>
                      <?php endif; ?>
                      <li class="nav-item"><a href="#" class="nav-link icon d-flex align-items-center"><i class="ion-logo-facebook"></i></a></li>
                      <li class="nav-item"><a href="#" class="nav-link icon d-flex align-items-center"><i class="ion-logo-twitter"></i></a></li>
                      <li class="nav-item"><a href="#" class="nav-link icon d-flex align-items-center"><i class="ion-logo-instagram"></i></a></li>
                  </ul>
              </div>
          </div>
      </nav>
      <!-- END nav -->