<?php include('./include/db.php');
$query = "SELECT * FROM basic_setup,personal_setup,aboutus_setup,userinfo";
$runquery = mysqli_query($db, $query);
if (!$db) :
  header("location:index-2.html");
endif;
$Call = mysqli_fetch_array($runquery);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MyResume Bootstrap Template - Index</title>
  <meta content="<?= $Call['description'] ?>" name="descriptison">
  <meta content="<?= $Call['keyword'] ?>" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/<?= $Call['icon'] ?>" rel="icon">
  <link href="assets/img/<?= $Call['icon'] ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


  <style>
    #hero {
      background: url('assets/img/<?= $Call['homewallpaper'] ?>') center no-repeat;
      background-size: cover;
      background-position-y: center;
      width: 100%;
      height: 100vh;
      position: relative;
    }

    #card:hover {
      box-shadow: 0 0 12px 0 rgba(0, 0, 0, .25);
    }
  </style>
</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex flex-column justify-content-center">
    <nav class="nav-menu">
      <ul>
        <li class="active"><a href="#hero"><i class="bx bx-home"></i> <span>Home</span></a></li>
        <li><a href="#about"><i class="bx bx-user"></i> <span>About</span></a></li>
        <li><a href="#resume"><i class="bx bx-file-blank"></i> <span>Resume</span></a></li>
        <li><a href="#portfolio"><i class="bx bx-book-content"></i> <span>Portfolio</span></a></li>
        <!-- <li><a href="#services"><i class="bx bx-server"></i> <span>Services</span></a></li> -->
        <li><a href="#contact"><i class="bx bx-envelope"></i> <span>Contact</span></a></li>
      </ul>
    </nav><!-- .nav-menu -->

  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center">
    <div class="container" data-aos="zoom-in" data-aos-delay="100">
      <h1><?= $Call['name'] ?></h1>
      <p>I'm <span class="typed" data-typed-items="<?php $prof = explode(",", $Call['professions']);
                                                    foreach ($prof as $value) {
                                                      echo $value . ",";
                                                    } ?>"></span></p>
      <div class="social-links">
        <?php include('./social-media/social.php'); ?>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About</h2>
          <p><?= $Call['shortdesc'] ?>.</p>
        </div>

        <div class="row">

          <div class="col-lg-4">
            <img src="assets/img/<?= $Call['profilepic'] ?>" class="img-fluid" alt="">
          </div>

          <div class="col-lg-8 pt-4 pt-lg-0 content">
            <h3><?= $Call['heading'] ?></h3>
            <p class="font-italic">
              <?= $Call['subheading'] ?>
            </p>
            <div class="row">
              <div class="col-lg-12">
                <ul class="row">
                  <?php
                  $q_user = "SELECT * FROM userinfo";
                  $run_user = mysqli_query($db, $q_user);
                  while ($call_user = mysqli_fetch_array($run_user)) {
                  ?>
                    <li class="col-lg-6"><i class="icofont-rounded-right"></i> <strong><?= $call_user['userq'] ?>:</strong> <?= $call_user['userv'] ?></li>
                  <?php
                  }
                  ?>
                </ul>
              </div>
            </div>
            <p>
              <?= $Call['longdesc'] ?></p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Skills Section ======= -->
    <section id="skills" class="skills section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Skills</h2>
        </div>

        <div class="row skills-content">
          <div class="row col-lg-12">
            <?php
            $q_skills = "SELECT * FROM skills";
            $run_skills = mysqli_query($db, $q_skills);
            while ($Callupskills = mysqli_fetch_array($run_skills)) {
            ?>
              <div class="progress col-lg-6">
                <span class="skill"><?= $Callupskills['skill'] ?> <i class="val"><?= $Callupskills['score'] ?>%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="<?= $Callupskills['score'] ?>" aria-valuemin="0" aria-valuemax="100">
                  </div>
                </div>
              </div>
            <?php
            }
            ?>
          </div>

        </div>

      </div>
    </section><!-- End Skills Section -->

    <!-- ======= Resume Section ======= -->
    <section id="resume" class="resume">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Resume</h2>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <h3 class="resume-title">Education</h3>
            <?php
            $q_resume = "SELECT * FROM resume WHERE category='e'";
            $run_resume = mysqli_query($db, $q_resume);
            while ($call_resume = mysqli_fetch_array($run_resume)) {
            ?>
              <div class="resume-item">
                <h4><?= $call_resume['title'] ?></h4>
                <h5><?= $call_resume['year'] ?></h5>
                <p><em><?= $call_resume['ogname'] ?></em></p>
                <p><?= $call_resume['workdesc'] ?></p>
              </div>
            <?php
            }
            ?>
          </div>

          <div class="col-lg-6">
            <h3 class="resume-title">Professional Experience</h3>
            <?php
            $q_resume = "SELECT * FROM resume WHERE category='pe'";
            $run_resume = mysqli_query($db, $q_resume);
            while ($call_resume = mysqli_fetch_array($run_resume)) {
            ?>
              <div class="resume-item">
                <h4><?= $call_resume['title'] ?></h4>
                <h5><?= $call_resume['year'] ?></h5>
                <p><em><?= $call_resume['ogname'] ?></em></p>
                <p><?= $call_resume['workdesc'] ?></p>
              </div>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </section><!-- End Resume Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Portfolio</h2>
        </div>

        <div class="row col-lg-12">
          <div class="row row-cols-1 row-cols-md-3">
            <?php
            $query5 = "SELECT * FROM portfolio";
            $runquery5 = mysqli_query($db, $query5);
            while ($data5 = mysqli_fetch_array($runquery5)) {
            ?>
              <div class="col mb-4">
                <a href="#" data-toggle="modal" data-target="#Modal<?= $data5['id'] ?>" data-whatever="@mdo">
                  <div class="card h-100" id="card">
                    <img src="assets/img/<?= $data5['projectpic'] ?>" class="card-img-top" alt="img project">
                    <div class="card-body">
                      <div class="card-footer">
                        <a class="card-text lead p-2"><?= $data5['projectname'] ?></a>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            <?php
            }
            ?>
          </div>
          <?php
          $query5 = "SELECT * FROM portfolio";
          $runquery5 = mysqli_query($db, $query5);
          while ($data5 = mysqli_fetch_array($runquery5)) {
          ?>
            <div class="modal fade" id="Modal<?= $data5['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div>
                      <img src="assets/img/<?= $data5['projectpic'] ?>" class="card-img-top" alt="...">
                      <div>
                        <h5 class="modal-title"><?= $data5['projectname'] ?></h5>
                        <p class="modal-text">Some quick example text to build on the card title and
                          make
                          up the bulk of the card's content.</p>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="<?= $data5['projectlink'] ?>" class="btn btn-success ">Preview</a>
                    <a href="https://github.com/zakaria-batty" class="btn btn-primary">Download</a>
                  </div>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
    </section><!-- End Portfolio Section -->
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
        </div>

        <div class="row mt-1">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Location:</h4>
                <p><?= $Call['location'] ?></p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p><?= $Call['emailid'] ?></p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Call:</h4>
                <p><?= $Call['mobile'] ?></p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="include/message.php" method="post" role="form" class="php-email-form">
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3><?= $Call['name'] ?></h3>
      <div class="social-links">
        <?php include('./social-media/social.php'); ?>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>MyResume</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>