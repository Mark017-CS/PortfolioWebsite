<?php
require('../include/db.php');

// Check if the user_id parameter is provided
if (isset($_GET['user_id'])) {
  // Retrieve the user_id from the URL parameter
  $user_id = $_GET['user_id'];

  $portfolio_query = "SELECT * FROM portfolio WHERE user_id = $user_id";
  $portfolio_run = mysqli_query($db, $portfolio_query);
  $user_data['portfolio'] = mysqli_fetch_assoc($portfolio_run);

  $services_query = "SELECT * FROM services WHERE user_id = $user_id";
  $services_run = mysqli_query($db, $services_query);
  $user_data['services'] = mysqli_fetch_assoc($services_run);

  $user_query = "SELECT * FROM user WHERE user_id = $user_id";
  $user_run = mysqli_query($db, $user_query);
  $user_data['user'] = mysqli_fetch_assoc($user_run);

  $home_query = "SELECT * FROM home WHERE user_id = $user_id";
  $home_run = mysqli_query($db, $home_query);
  $user_data['home'] = mysqli_fetch_assoc($home_run);

  $section_control_query = "SELECT * FROM section_control WHERE user_id = $user_id";
  $section_control_run = mysqli_query($db, $section_control_query);
  $user_data['section_control'] = mysqli_fetch_assoc($section_control_run);

  $social_media_query = "SELECT * FROM social_media WHERE user_id = $user_id";
  $social_media_run = mysqli_query($db, $social_media_query);
  $user_data['social_media'] = mysqli_fetch_assoc($social_media_run);

  $about_query = "SELECT * FROM about WHERE user_id = $user_id";
  $about_run = mysqli_query($db, $about_query);
  $user_data['about'] = mysqli_fetch_assoc($about_run);

  $contact_query = "SELECT * FROM contact WHERE user_id = $user_id";
  $contact_run = mysqli_query($db, $contact_query);
  $user_data['contact'] = mysqli_fetch_assoc($contact_run);

  $site_background_query = "SELECT * FROM site_background WHERE user_id = $user_id";
  $site_background_run = mysqli_query($db, $site_background_query);
  $user_data['site_background'] = mysqli_fetch_assoc($site_background_run);

  $seo_query = "SELECT * FROM seo WHERE user_id = $user_id";
  $seo_run = mysqli_query($db, $seo_query);
  $user_data['seo'] = mysqli_fetch_assoc($seo_run);

  $resume_query = "SELECT * FROM resume WHERE user_id = $user_id";
  $resume_run = mysqli_query($db, $resume_query);
  $user_data['resume'] = mysqli_fetch_assoc($resume_run);
}

// Check if $user_data is set and not empty
if (isset($user_data) && !empty($user_data)) {
  // Extract individual data arrays from $user_data for easier access in HTML
  extract($user_data);
} else {
  // Set default values if $user_data is not set or empty
  $portfolio = $user = $home = $section_control = $social_media = $about = $contact = $site_background = $seo = $resume = [];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>
    <?= $home['title'] ?>
  </title>
  <meta content="<?= $seo['description'] ?>" name="description">
  <meta content="<?= $seo['keywords'] ?>" name="keywords">
  <!-- Favicons -->
  <link href="../images/<?= $seo['siteicon'] ?>" rel="icon">
  <link href="../images/<?= $seo['siteicon'] ?>" rel="apple-touch-icon">
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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

</head>
<style>
  body {
    font-family: "Open Sans", sans-serif;
    background-color: #040404;
    color: #fff;
    overflow-y: scroll;
  }

  .navbar-link {
    font-weight: bold;
    color: #FFF !important;
    text-shadow: lightgreen;
  }

  .gray-background::placeholder {
    color: black;
  }

  .gray-background {
    color: black;
  }

  .gray-background {
    background-color: gray;
    color: white;
  }

  .gray-background:focus {
    background-color: gray;
    color: white;
  }

  .background-image {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    opacity: 0.3;
    z-index: -1;
    background: url('../assets/img/<?= $site_background['background_img'] ?>') top right no-repeat;
    background-size: cover;
  }
</style>

<body>
  <div class="background-image"></div>
  <!-- ======= Header ======= -->
  <header class="header " id="header">
    <div class="container">

      <a href="../index.php" class="logo"
        style=" display: flex; align-items: center; text-decoration: none; font-size: 1.5rem; color: var(--text-color);margin-bottom: 20px; margin-top: -100px; margin-left: -40px; font-weight: 600; cursor: pointer;"><b
          style="color: #1DB954; font-style: italic; ">Art </b><b style="color: #FFF;">Abode</b></a>
      <h1><a href="portfolio.php?user_id=<?= $portfolio['user_id'] ?>">
          <?= isset($home['title']) ? $home['title'] : '' ?>
        </a></h1>
      <h2>
        <?= isset($home['subtitle']) ? $home['subtitle'] : '' ?>
      </h2>
      <!-- navbar -->
      <nav id="navbar" class="navbar">
        <ul>
          <?php if (isset($section_control['home_section']) && $section_control['home_section']) { ?>
            <li><a class="nav-link active" href="#header">Home</a></li>
          <?php } ?>
          <?php if (isset($section_control['about_section']) && $section_control['about_section']) { ?>
            <li><a class="nav-link" href="#about">About</a></li>
          <?php } ?>
          <?php if (isset($section_control['resume_section']) && $section_control['resume_section']) { ?>
            <li><a class="nav-link" href="#resume">Resume</a></li>
          <?php } ?>
          <?php if (isset($section_control['services_section']) && $section_control['services_section']) { ?>
            <li><a class="nav-link" href="#services">Services</a></li>
          <?php } ?>
          <?php if (isset($section_control['portfolio_section']) && $section_control['portfolio_section']) { ?>
            <li><a class="nav-link" href="#portfolio">Artworks</a></li>
          <?php } ?>
          <?php if (isset($section_control['contact_section']) && $section_control['contact_section']) { ?>
            <li><a class="nav-link" href="#contact">Contact</a></li>
          <?php } ?>
          <li><a class="nav-link" href="../index.php"><b class="navbar-link">Go Back
                →</b></a>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->

      <?php if (isset($home['showicons']) && $home['showicons']) { ?>
        <div class="social-links">

          <?php if (isset($social_media['twitter']) && $social_media['twitter'] != '') { ?>
            <a href="https://twitter.com/<?= $social_media['twitter'] ?>" class="twitter" target="_blank"><i class="bi bi-twitter"></i></a>
          <?php } ?>

          <?php if (isset($social_media['facebook']) && $social_media['facebook'] != '') { ?>
            <a href="https://facebook.com/<?= $social_media['facebook'] ?>" class="facebook" target="_blank"><i
                class="bi bi-facebook"></i></a>
          <?php } ?>

          <?php if (isset($social_media['instagram']) && $social_media['instagram'] != '') { ?>
            <a href="https://instagram.com/<?= $social_media['instagram'] ?>" class="instagram" target="_blank"><i
                class="bi bi-instagram"></i></a>
          <?php } ?>

          <?php if (isset($social_media['skype']) && $social_media['skype'] != '') { ?>
            <a href="https://join.skype.com/<?= $social_media['skype'] ?>" class="google-plus" target="_blank"><i
                class="bi bi-skype"></i></a>
          <?php } ?>

          <?php if (isset($social_media['youtube']) && $social_media['youtube'] != '') { ?>
            <a href="https://youtube.com/<?= $social_media['youtube'] ?>" class="youtube" target="_blank"><i class="bi bi-youtube"></i></a>
          <?php } ?>

          <?php if (isset($social_media['linkedin']) && $social_media['linkedin'] != '') { ?>
            <a href="https://linkedin.com/<?= $social_media['linkedin'] ?>" class="linkedin" ><i
                class="bi bi-linkedin"></i></a>
          <?php } ?>
        </div>
      <?php } ?>
    </div>
  </header>
  <!-- End Header -->

  <!-- ======= About Section ======= -->
  <section id="about" class="about">

    <!-- ======= About Me ======= -->
    <div class="about-me container">
      <div class="section-title">
        <h2>About</h2>
        <p>Learn more about me</p>
      </div>
      <div class="row">
        <div class="col-lg-4" data-aos="fade-right">
          <img src="../images/<?= $about['profile_pic'] ?>" class="img-fluid" alt="">
        </div>
        <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
          <h3>
            <?= $about['about_title'] ?>
          </h3>
          <p class="fst-italic">
            <?= $about['about_subtitle'] ?>
          </p>
          <div class="row">
            <div class="col-lg-6">
              <ul>
                <?php
                $query2 = "SELECT * FROM personal_info WHERE user_id = $user_id LIMIT 5";
                $run2 = mysqli_query($db, $query2);
                while ($personal_info = mysqli_fetch_array($run2)) {
                  ?>
                  <li><i class="bi bi-chevron-right"></i> <strong>
                      <?= $personal_info['label'] ?>:
                    </strong> <span>
                      <?= $personal_info['value'] ?>
                    </span></li>
                  <?php
                }
                ?>
              </ul>
            </div>
            <div class="col-lg-6">
              <ul>
                <?php
                $query2 = "SELECT * FROM personal_info WHERE user_id = $user_id LIMIT 5, 5";
                $run2 = mysqli_query($db, $query2);
                while ($personal_info = mysqli_fetch_array($run2)) {
                  ?>
                  <li><i class="bi bi-chevron-right"></i> <strong>
                      <?= $personal_info['label'] ?>:
                    </strong> <span>
                      <?= $personal_info['value'] ?>
                    </span></li>
                  <?php
                }
                ?>
              </ul>
            </div>
          </div>
          <p style="text-align: justify;">
            <?= $about['about_desc'] ?>
          </p>
        </div>
      </div>
    </div>
    <!-- End About Me -->

    <!-- ======= Counts ======= -->
    <div class="counts container">
      <div class="row">
        <?php
        $query22 = "SELECT * FROM counts WHERE user_id = $user_id";
        $run22 = mysqli_query($db, $query22);
        while ($counts = mysqli_fetch_array($run22)) {
          ?>
          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-emoji-smile"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?= $counts['happy_clients'] ?>"
                data-purecounter-duration="1" class="purecounter"></span>
              <p>Happy Clients</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
            <div class="count-box">
              <i class="bi bi-journal-richtext"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?= $counts['projects'] ?>"
                data-purecounter-duration="1" class="purecounter"></span>
              <p>Projects</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="bi bi-headset"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?= $counts['hours'] ?>"
                data-purecounter-duration="1" class="purecounter"></span>
              <p>Hours Of Support</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="bi bi-award"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?= $counts['awards'] ?>"
                data-purecounter-duration="1" class="purecounter"></span>
              <p>Awards</p>
            </div>
          </div>
        <?php } ?>
      </div>
    </div><!-- End Counts -->

    <!-- ======= Skills  ======= -->
    <div class="skills container">
      <div class="section-title">
        <h2>Skills</h2>
      </div>
      <div class="row skills-content">
        <div class="col-lg-12">
          <?php
          $query3 = "SELECT * FROM skills WHERE user_id = $user_id";
          $run3 = mysqli_query($db, $query3);
          while ($skills = mysqli_fetch_array($run3)) { ?>
            <div class="progress">
              <span class="skill">
                <?= $skills['skill_name'] ?><i class="val">
                  <?= $skills['skill_level'] ?>%
                </i>
              </span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="<?= $skills['skill_level'] ?>"
                  aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div><!-- End Skills -->

    <!-- ======= Interests ======= -->
    <div class="interests container">
      <div class="section-title">
        <h2>Interests</h2>
      </div>
      <div class="row">
        <?php
        $query33 = "SELECT * FROM interests WHERE user_id = $user_id";
        $run33 = mysqli_query($db, $query33);
        while ($interests = mysqli_fetch_array($run33)) {
          ?>
          <div class="col-lg-3 col-md-4">
            <div class="icon-box">
              <i class="bx bx-star" style="color: #ffbb2c;"></i>
              <h3>
                <?= $interests['inter_name'] ?>
              </h3>
            </div>
          </div>
        <?php } ?>
      </div>
    </div><!-- End Interests -->

    <!-- ======= Testimonials ======= -->
    <div class="testimonials container">
      <div class="section-title">
        <h2>Testimonials of Workmates</h2>
      </div>
      <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper">
          <?php
          $query333 = "SELECT * FROM testimonials WHERE user_id = $user_id";
          $run333 = mysqli_query($db, $query333);
          while ($testimonials = mysqli_fetch_array($run333)) {
            ?>
            <div class="swiper-slide">
              <div class="testimonial-item">
                <p style="text-align: justify;">
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  <?= $testimonials['testimonial'] ?>
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="../images/<?= $testimonials['profile'] ?>" class="testimonial-img" alt="">
                <h3>
                  <?= $testimonials['test_name'] ?>
                </h3>
                <h4>
                  <?= $testimonials['position'] ?>
                </h4>
              </div>
            </div>
          <?php } ?>
        </div>
        <div class="swiper-pagination"></div>
      </div>
      <div class="owl-carousel testimonials-carousel"></div>
    </div><!-- End Testimonials -->
  </section>
  <!-- End About Section -->

  <!-- ======= Resume Section ======= -->
  <section id="resume" class="resume">
    <div class="container">
      <div class="section-title">
        <h2>Resume</h2>
        <p>Check My Resume</p>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <h3 class="resume-title">Education</h3>
          <?php
          $query4 = "SELECT * FROM resume WHERE user_id = $user_id AND (type = 'e' OR type = 'E' OR type = 'Education' OR type = 'education')";
          $run4 = mysqli_query($db, $query4);
          while ($resume = mysqli_fetch_array($run4)) {
            ?>
            <div class="resume-item">
              <h4>
                <?= $resume['title'] ?>
              </h4>
              <h5>
                <?= $resume['time'] ?>
              </h5>
              <p><em>
                  <?= $resume['org'] ?>
                </em></p>
              <p>
                <?= $resume['about_exp'] ?>
              </p>
            </div>
          <?php } ?>
        </div>
        <div class="col-lg-6">
          <h3 class="resume-title">Professional Experience</h3>
          <?php
          $query4 = "SELECT * FROM resume WHERE user_id = $user_id AND (type = 'p' OR type = 'P' OR type = 'Professional' OR type = 'professional')";
          $run4 = mysqli_query($db, $query4);
          while ($resume = mysqli_fetch_array($run4)) {
            ?>
            <div class="resume-item">
              <h4>
                <?= $resume['title'] ?>
              </h4>
              <h5>
                <?= $resume['time'] ?>
              </h5>
              <p><em>
                  <?= $resume['org'] ?>
                </em></p>
              <p>
                <?= $resume['about_exp'] ?>
              </p>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>
  <!-- End Resume Section -->

  <!-- ======= Services Section ======= -->
  <section id="services" class="services">
    <div class="container">
      <div class="section-title">
        <h2>Services</h2>
        <p>My Services</p>
      </div>
      <div class="row">
        <?php
        $query55 = "SELECT * FROM services WHERE user_id = $user_id";
        $run55 = mysqli_query($db, $query55);
        while ($services = mysqli_fetch_array($run55)) {
          ?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-briefcase"></i></div>
              <h4><a href="<?= $services['service_link'] ?>" target="_blank"><?= $services['service_name'] ?></a></h4>
              <p class="service-description">
                <?= $services['service_desc'] ?>
              </p>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <!-- End Services Section -->

  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio">
    <div class="container">
      <div class="section-title">
        <h2>Artworks</h2>
        <p>My Works</p>
      </div>

      <!-- Filter Icon -->
      <div class="filter-icon" onclick="toggleFilterOptions()">
        <i class="fas fa-filter"></i> Filter <i class="arrow-icon fas fa-angle-down"></i>
      </div>

      <!-- Filter Options -->
      <div class="filter-options" style="display: none;">
        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-visual-art">Visual Art</li>
              <li data-filter=".filter-photography">Photography</li>
              <li data-filter=".filter-drawing">Drawing</li>
              <li data-filter=".filter-graphic-design">Graphic Design</li>
              <li data-filter=".filter-mixed-media">Mixed Media</li>
              <li data-filter=".filter-line-art">Line Art</li>
              <li data-filter=".filter-sculpture">Sculpture</li>
              <li data-filter=".filter-painting">Painting</li>
              <li data-filter=".filter-printmaking">Printmaking</li>
              <li data-filter=".filter-collage">Collage</li>
              <li data-filter=".filter-ceramics">Ceramics</li>
              <li data-filter=".filter-illustration">Illustration</li>
              <li data-filter=".filter-digital-art">Digital Art</li>
              <li data-filter=".filter-mosaic">Mosaic</li>
              <li data-filter=".filter-calligraphy">Calligraphy</li>
              <li data-filter=".filter-installation-art">Installation Art</li>
              <li data-filter=".filter-textile-art">Textile Art</li>
              <li data-filter=".filter-carpentry">Carpentry</li>
              <li data-filter=".filter-pottery">Pottery</li>
              <li data-filter=".filter-mural">Mural</li>
              <li data-filter=".filter-fashion-design">Fashion Design</li>
              <li data-filter=".filter-tapestry">Tapestry</li>
              <li data-filter=".filter-quilting">Quilting</li>
              <li data-filter=".filter-landscaping">Landscaping</li>
              <li data-filter=".filter-portrait">Portrait</li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Portfolio Items -->
      <div class="row portfolio-container">
        <?php
        $query5 = "SELECT * FROM portfolio WHERE user_id = $user_id";
        $run5 = mysqli_query($db, $query5);
        while ($portfolio = mysqli_fetch_array($run5)) {
          ?>
          <div
            class="col-lg-4 col-md-6 portfolio-item <?= 'filter-' . strtolower(str_replace(' ', '-', $portfolio['project_type'])) ?>">
            <div class="portfolio-wrap">
              <img src="../images/<?= $portfolio['project_pic'] ?>" class="img-fluid portfolio-image" alt="">
              <div class="portfolio-info">
                <h4>
                  <?= $portfolio['project_name'] ?>
                </h4>
                <p>
                  <?= $portfolio['project_type'] ?>
                </p>
                <div class="portfolio-links">
                  <a href="../images/<?= $portfolio['project_pic'] ?>" data-gallery="portfolioGallery"
                    class="portfolio-lightbox" title="<?= $portfolio['project_name'] ?>">
                    <i class="bx bx-plus"></i>
                  </a>
                  <a href="<?= $portfolio['project_link'] ?>" data-gallery="portfolioGallery"
                    class="portfolio-details-lightbox">
                    <i class="bx bx-link"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <!-- End Portfolio Section -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container">
      <div class="section-title">
        <h2>Contact</h2>
        <p>Contact Me</p>
      </div>
      <div class="row mt-2">
        <div class="col-md-6 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-map"></i>
            <h3>My Address</h3>
            <p>
              <?= $contact['address'] ?>
            </p>
          </div>
        </div>
        <div class="col-md-6 mt-4 mt-md-0 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-share-alt"></i>
            <h3>Social Profiles</h3>
            <div class="social-links">
              <?php if ($social_media['twitter'] != '') { ?>
                <a href="https://twitter.com/<?= $social_media['twitter'] ?>" class="twitter"><i
                    class="bi bi-twitter"></i></a>
              <?php } ?>
              <?php if ($social_media['facebook'] != '') { ?>
                <a href="https://facebook.com/<?= $social_media['facebook'] ?>" class="facebook"><i
                    class="bi bi-facebook"></i></a>
              <?php }
              if ($social_media['instagram'] != '') { ?>
                <a href="https://instagram.com/<?= $social_media['instagram'] ?>" class="instagram"><i
                    class="bi bi-instagram"></i></a>
              <?php }
              if ($social_media['skype'] != '') { ?>
                <a href="https://skype.com/<?= $social_media['skype'] ?>" class="google-plus"><i
                    class="bi bi-skype"></i></a>
              <?php }
              if ($social_media['skype'] != '') { ?>
                <a href="https:/youtube.com/<?= $social_media['youtube'] ?>" class="youtube"><i
                    class="bi bi-youtube"></i></a>
              <?php }
              if ($social_media['linkedin'] != '') { ?>
                <a href="https://linkedin.com/<?= $social_media['linkedin'] ?>" class="linkedin"><i
                    class="bi bi-linkedin"></i></a>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="col-md-6 mt-4 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-envelope"></i>
            <h3>Email Me</h3>
            <p>
              <a href="mailto:<?= $contact['email'] ?>?subject=Subject%20Here&body=Your%20message%20goes%20here"
                class="email-link"><?= $contact['email'] ?></a>
            </p>
          </div>
        </div>
        <div class="col-md-6 mt-4 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-phone-call"></i>
            <h3>Call Me</h3>
            <p>
              <?= $contact['mobile'] ?>
            </p>
          </div>
        </div>
      </div>
      <div class="section-title" style="margin-top: 30px;">
        <h2>Feedback</h2>
        <p>Feedback Form</p>
      </div>
      <form action="" method="POST" class="mt-4">
        <div class="row">
          <div class="col-md-6 form-group mt-3">
            <input type="text" name="fullName" class="form-control gray-background" placeholder="Your Name" required>
          </div>
          <div class="col-md-6 form-group mt-3">
            <input type="email" class="form-control gray-background" name="email" placeholder="Your Email" required>
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
          <a href="mailto:<?= $contact['email'] ?>?subject=Contact%20Form%20Submission&body=Name%3A%20%0DEmail%3A%20%0DMobile%20Number%3A%20%0DSubject%3A%20%0D%0DYour%20Message%3A%20%0D"
            class="btn btn-primary mt-3">
            Send Email
          </a>
        </div>
      </form>
  </section>
  <!-- End Contact Section -->

  <div class="credits">
    For concerns Email Us @ <a
      href="mailto:portfoliowebsite617@gmail.com?subject=Subject%20Here&body=Your%20message%20goes%20here">portfoliowebsite617@gmail.com</a>
    |
    Copyright &copy; 2023 <a href="#">by Group 4 | All Rights Reserved.</a>
  </div>

  <!-- SCRIPTS -->
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
  <script>
    function toggleFilterOptions() {
      var filterOptions = document.querySelector(".filter-options");
      var arrowIcon = document.querySelector(".arrow-icon");
      if (filterOptions.style.display === "none") {
        filterOptions.style.display = "block";
        arrowIcon.classList.remove("fa-angle-down");
        arrowIcon.classList.add("fa-angle-up");
      } else {
        filterOptions.style.display = "none";
        arrowIcon.classList.remove("fa-angle-up");
        arrowIcon.classList.add("fa-angle-down");
      }
    }
  </script>
  <script>
    // JavaScript function to generate the email link with form data and clear placeholders
    function generateEmailLinkAndClearPlaceholders() {
      const fullName = document.getElementsByName('fullName')[0];
      const email = document.getElementsByName('email')[0];
      const mobileNumber = document.getElementsByName('mobileNumber')[0];
      const subject = document.getElementsByName('subject')[0];
      const message = document.getElementsByName('message')[0];

      const emailBody = `Name: ${fullName.value}\nEmail: ${email.value}\nMobile Number: ${mobileNumber.value}\nSubject: ${subject.value}\n\nYour Message: ${message.value}`;
      const encodedEmailBody = encodeURIComponent(emailBody);

      const mailtoLink = `mailto:<?= $contact['email'] ?>?subject=Contact%20Form%20Submission&body=${encodedEmailBody}`;

      // Clear input field values after generating the email link
      fullName.value = '';
      email.value = '';
      mobileNumber.value = '';
      subject.value = '';
      message.value = '';

      return mailtoLink;
    }

    // Attach the JavaScript function to the "Send Email" button's click event
    document.querySelector('.btn-primary').addEventListener('click', function () {
      const mailtoLink = generateEmailLinkAndClearPlaceholders();
      this.href = mailtoLink;
    });
  </script>
</body>

</html>