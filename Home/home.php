<?php
require('../include/db.php');

// Retrieve data from the user table
$query = "SELECT user_id, user_profile FROM user";
$result = mysqli_query($db, $query);

// Fetch data from the home table
$queryHome = "SELECT subtitle, title FROM home";
$resultHome = mysqli_query($db, $queryHome);
$rowHome = mysqli_fetch_assoc($resultHome);
$subtitle = $rowHome['subtitle'];
$title = $rowHome['title'];

// Fetch data from the homebg table
$queryHomebg = "SELECT * FROM admin_homebg";
$resultHomebg = mysqli_query($db, $queryHomebg);
$pi = mysqli_fetch_array($resultHomebg);

// Fetch data from the admin about table
$queryHomeAbout = "SELECT * FROM admin_about";
$resultHomeAbout = mysqli_query($db, $queryHomeAbout);
$pii = mysqli_fetch_array($resultHomeAbout);

// Fetch data from the admin services table
$queryService = "SELECT * FROM admin_services";
$resultService = mysqli_query($db, $queryService);
$piii = mysqli_fetch_array($resultService);
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>
    Art Abode
  </title>

  <!-- Favicons -->
  <link href="../images/logo.png" rel="icon">
  <link href="../images/logo.png" rel="apple-touch-icon">

  <!-- box icons -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
  <script>
    window.onload = function () {
      if (performance.navigation.type === 1) {
        // Page is reloaded
        location.href = "#home";
      }
    };
  </script>
</head>
<style>
  body {
    font-family: "Open Sans", sans-serif;
    background-color: #040404;
    color: #fff;
    overflow-y: scroll;
    /* Enable vertical scrolling */
  }

  .navbar-link {
    font-weight: bold;
    color: #FFF !important;
    text-shadow: lightgreen;
  }

  .background-image {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: -1;
    background: url('../images/<?= $pi['background_img'] ?>') top right no-repeat;
    background-size: cover;
  }
</style>


<body>
  <div class="background-image"></div>
  <!-- ======= Header ======= -->
  <header class="header " id="header">
    <div class="container">


      <h1><a href="home.php">
          <b style="color: #1DB954; font-style: italic; ">Art</b><b style="color: #FFF;">Abode</b></a>
        </a></h1>
        <h2>
      Step into our <span>WORLD OF DESIGN</span> where <span>IMAGINATION</span><br> meets <span>REALITY!</span>
        Greetings! Welcome to our Portfolio Website!
      </h2>
      <!-- navbar -->
      <nav id="navbar" class="navbar">
        <ul>

          <li><a class="nav-link active" href="#header">Home</a></li>
          <li><a class="nav-link" href="#about">About Us</a></li>
          <li><a class="nav-link" href="#services">Services</a></li>
          <li><a class="nav-link" href="#portfolio">Portfolios</a></li>
          <li><a class="nav-link" href="#contact">Contact</a></li>

          <?php
          session_start(); // Start the session
          if (isset($_SESSION['user_id'])) {
            // User is logged in
            echo '<li><a href="account.php" target="_blank"><b class="navbar-link">ACCOUNT</b></a></li>';
            echo '<li><a href="../components/logout.php"><b class="navbar-link">Logout</b></a></li>';
          } else {
            // User is not logged in
            echo '<li><a href="../components/register.php"><b class="navbar-link">Register</b></a></li>';
            echo '<li><a href="../components/login.php"><b class="navbar-link">Login</b></a></li>';
          }
          ?>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div class="social-links">
        <a href="https://twitter.com/" class="twitter" target="_blank"><i class="bi bi-twitter"></i></a>
        <a href="https://facebook.com/" class="facebook" target="_blank"><i class="bi bi-facebook"></i></a>
        <a href="https://instagram.com/" class="instagram" target="_blank"><i class="bi bi-instagram"></i></a>
        <a href="https://skype.com/" class="google-plus" target="_blank"><i class="bi bi-skype"></i></a>
        <a href="https://youtube.com/" class="youtube" target="_blank"><i class="bi bi-youtube"></i></a>
        <a href="https://linkedin.com/" class="linkedin" target="_blank"><i class="bi bi-linkedin"></i></a>
      </div>
    </div>
  </header><!-- End Header -->

  <!-- ======= About Section ======= -->
  <section id="about" class="about">

    <!-- ======= About Me ======= -->
    <div class="about-me container">

      <div class="section-title">
        <h2>About Us</h2>
        <p>Learn more about us</p>
      </div>

      <div class="row">
        <div class="col-lg-4" data-aos="fade-right">
          <img src="../images/<?= $pii['about_img'] ?>" class="img-fluid" alt="">
        </div>
        <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
          <p style="text-align: justify;">
            <?= $pii['about_desc'] ?>
          </p>
        </div>
      </div>

    </div><!-- End About Me -->

  </section><!-- End About Section -->

  <!-- ======= Services Section ======= -->
  <!-- ======= Services Section ======= -->
  <section id="services" class="services">
    <div class="container">

      <div class="section-title">
        <h2>Services</h2>
        <p>Our Services</p>
      </div>

      <div class="row">
        <?php
        $query55 = "SELECT * FROM admin_services";
        $run55 = mysqli_query($db, $query55);
        while ($services = mysqli_fetch_array($run55)) {
          ?>
          <div class="col-lg-4 col-md-6" style="margin-top: 30px;">
            <div class="icon-box">
              <div class="icon"><i class="bx"></i></div>
              <h4><a href="<?= $services['service_link'] ?>" target="_blank"><?= $services['service_title'] ?></a></h4>
              <p>
                <?= $services['service_des'] ?>
              </p>
            </div>
          </div>
          <?php
        }
        ?>
      </div>

    </div>
  </section>
  <!-- End Services Section -->


  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio">
    <div class="container">
      <div class="section-title">
        <h2>Portfolios</h2>
        <p>Users</p>
      </div>
      <div class="row portfolio-container">
        <?php
        $query = "SELECT a.user_id, a.fullname, a.user_profile, h.subtitle
                FROM user AS a
                LEFT JOIN home AS h ON a.user_id = h.user_id";
        $result = mysqli_query($db, $query);
        while ($portfolio = mysqli_fetch_array($result)) {
          ?>
          <div class="col-lg-4 col-md-6 portfolio-item">
            <div class="portfolio-wrap">
              <img src="../images/<?= $portfolio['user_profile'] ?>" class="img-fluid portfolio-image" alt="">
              <div class="portfolio-info">
                <h4>
                  <?= $portfolio['fullname'] ?>
                </h4>
                <p>
                  <?= $portfolio['subtitle'] ?>
                </p>
                <div class="portfolio-links">
                  <a href="../images/<?= $portfolio['user_profile'] ?>" data-gallery="portfolioGallery"
                    class="portfolio-lightbox" title="<?= $portfolio['fullname'] ?>" target="_blank">
                    <i class="bx bx-plus"></i>
                  </a>
                  <a href="portfolio.php?user_id=<?= $portfolio['user_id'] ?>" target="_blank"
                    data-gallery="portfolioGallery">
                    <i class="bx bx-link"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <?php
        }
        ?>
      </div>
    </div>
  </section>
  <!-- End Portfolio Section -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container">

      <div class="section-title">
        <h2>Contact</h2>
        <p>Contact Us</p>
      </div>
      <form action="forms/contact.php?user_id=<?= $_GET['user_id'] ?>" method="POST" class="mt-4">
        <div class="row">
          <div class="col-md-6 form-group mt-3">
            <input type="text" name="fullName" class="form-control gray-background" placeholder="Your Name" required>
          </div>
          <div class="col-md-6 form-group mt-3">
            <input type="email" class="form-control gray-background" name="email" placeholder="Your Email" required />
          </div>
          <div class="col-md-6 form-group mt-3">
            <input type="number" class="form-control gray-background" name="mobileNumber" placeholder="Mobile Number"
              required>
          </div>
          <div class="col-md-6 form-group mt-3">
            <input type="text" class="form-control gray-background" name="subject" placeholder="Email Subject" required>
          </div>
        </div>
        <div class="form-group mt-3">
          <textarea class="form-control gray-background" name="message" rows="5" placeholder="Your Message"
            required></textarea>
        </div>
        <div class="text-center">
          <input type="submit" value="Send Message" class="btn btn-green" />
        </div>
      </form>
  </section><!-- End Contact Section -->

  <div class="credits">
    Copyright &copy; 2023 <a href="#">by Group 4 | All Rights Reserved.</a>
  </div>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>


  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>