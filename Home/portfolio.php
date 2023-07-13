<?php
require('../include/db.php');

// Check if the admin_id parameter is provided
if (isset($_GET['admin_id'])) {
  // Retrieve the admin_id from the URL parameter
  $admin_id = $_GET['admin_id'];

  // Retrieve the portfolio data from the 'portfolio' table
  $portfolio_query = "SELECT * FROM portfolio WHERE admin_id = $admin_id";
  $portfolio_run = mysqli_query($db, $portfolio_query);
  $user_data['portfolio'] = mysqli_fetch_assoc($portfolio_run);

  // Retrieve data from other tables
  $admin_query = "SELECT * FROM admin WHERE admin_id = $admin_id";
  $admin_run = mysqli_query($db, $admin_query);
  $user_data['admin'] = mysqli_fetch_assoc($admin_run);

  $home_query = "SELECT * FROM home WHERE admin_id = $admin_id";
  $home_run = mysqli_query($db, $home_query);
  $user_data['home'] = mysqli_fetch_assoc($home_run);

  $section_control_query = "SELECT * FROM section_control WHERE admin_id = $admin_id";
  $section_control_run = mysqli_query($db, $section_control_query);
  $user_data['section_control'] = mysqli_fetch_assoc($section_control_run);

  $social_media_query = "SELECT * FROM social_media WHERE admin_id = $admin_id";
  $social_media_run = mysqli_query($db, $social_media_query);
  $user_data['social_media'] = mysqli_fetch_assoc($social_media_run);

  $about_query = "SELECT * FROM about WHERE admin_id = $admin_id";
  $about_run = mysqli_query($db, $about_query);
  $user_data['about'] = mysqli_fetch_assoc($about_run);

  $contact_query = "SELECT * FROM contact WHERE admin_id = $admin_id";
  $contact_run = mysqli_query($db, $contact_query);
  $user_data['contact'] = mysqli_fetch_assoc($contact_run);

  $site_background_query = "SELECT * FROM site_background WHERE admin_id = $admin_id";
  $site_background_run = mysqli_query($db, $site_background_query);
  $user_data['site_background'] = mysqli_fetch_assoc($site_background_run);

  $seo_query = "SELECT * FROM seo WHERE admin_id = $admin_id";
  $seo_run = mysqli_query($db, $seo_query);
  $user_data['seo'] = mysqli_fetch_assoc($seo_run);

  // Retrieve the resume data from the 'resume' table
  $resume_query = "SELECT * FROM resume WHERE admin_id = $admin_id";
  $resume_run = mysqli_query($db, $resume_query);
  $user_data['resume'] = mysqli_fetch_assoc($resume_run);
}

// Check if $user_data is set and not empty
if (isset($user_data) && !empty($user_data)) {
  // Extract individual data arrays from $user_data for easier access in HTML
  extract($user_data);
} else {
  // Set default values if $user_data is not set or empty
  $portfolio = $admin = $home = $section_control = $social_media = $about = $contact = $site_background = $seo = $resume = [];
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

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

</head>
<style>
  body {
    font-family: "Open Sans", sans-serif;
    background-color: #040404;
    color: #fff;
    overflow-y: scroll;
    /* Enable vertical scrolling */
  }

  .background-image {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
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
      <!-- <img src="../images/logo.png" class="img-fluid logos" alt=""
        style="width: 4vw; cursor: pointer; font-style: italic; margin-top: -190px;margin-bottom: 150px; margin-left: -100px; "> -->
      <a href="./home.php" class="logo"
        style=" display: flex; align-items: center; text-decoration: none; font-size: 1.5rem; color: var(--text-color); margin-top: -200px;margin-bottom: 160px; margin-left: -40px; font-style: italic; font-weight: 600; cursor: pointer;"><b
          style="color: #1DB954;">Art </b><b style="color: #FFF;">Abode</b></a>
      <h1><a href="portfolio.php">
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

          <li><a class="nav-link" href="home.php"
              style="display: inline-block; padding: 0.5rem .5rem; background: #1db954;
                    border-radius: 2rem; box-shadow: 0 0 .5rem #1db954; font-size: .5rem;  color: var(--second-bg-color); transition: 0.5s ease;">Go Back
              →</a>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <?php if (isset($home['showicons']) && $home['showicons']) { ?>
        <div class="social-links">

          <?php if (isset($social_media['twitter']) && $social_media['twitter'] != '') { ?>
            <a href="https://twitter.com/<?= $social_media['twitter'] ?>" class="twitter"><i class="bi bi-twitter"></i></a>
          <?php } ?>

          <?php if (isset($social_media['facebook']) && $social_media['facebook'] != '') { ?>
            <a href="https://facebook.com/<?= $social_media['facebook'] ?>" class="facebook"><i
                class="bi bi-facebook"></i></a>
          <?php } ?>

          <?php if (isset($social_media['instagram']) && $social_media['instagram'] != '') { ?>
            <a href="https://instagram.com/<?= $social_media['instagram'] ?>" class="instagram"><i
                class="bi bi-instagram"></i></a>
          <?php } ?>

          <?php if (isset($social_media['skype']) && $social_media['skype'] != '') { ?>
            <a href="https://skype.com/<?= $social_media['skype'] ?>" class="google-plus"><i class="bi bi-skype"></i></a>
          <?php } ?>

          <?php if (isset($social_media['youtube']) && $social_media['youtube'] != '') { ?>
            <a href="https://youtube.com/<?= $social_media['youtube'] ?>" class="youtube"><i class="bi bi-youtube"></i></a>
          <?php } ?>

          <?php if (isset($social_media['linkedin']) && $social_media['linkedin'] != '') { ?>
            <a href="https://linkedin.com/<?= $social_media['linkedin'] ?>" class="linkedin"><i
                class="bi bi-linkedin"></i></a>
          <?php } ?>

        </div>
      <?php } ?>

    </div>
  </header><!-- End Header -->

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
                $query2 = "SELECT * FROM personal_info WHERE admin_id = $admin_id LIMIT 5";
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
                $query2 = "SELECT * FROM personal_info WHERE admin_id = $admin_id LIMIT 5, 5";
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

    </div><!-- End About Me -->

    <!-- ======= Counts ======= -->
    <div class="counts container">

      <div class="row">

        <div class="col-lg-3 col-md-6">
          <div class="count-box">
            <i class="bi bi-emoji-smile"></i>
            <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1"
              class="purecounter"></span>
            <p>Happy Clients</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
          <div class="count-box">
            <i class="bi bi-journal-richtext"></i>
            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1"
              class="purecounter"></span>
            <p>Projects</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
          <div class="count-box">
            <i class="bi bi-headset"></i>
            <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1"
              class="purecounter"></span>
            <p>Hours Of Support</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
          <div class="count-box">
            <i class="bi bi-award"></i>
            <span data-purecounter-start="0" data-purecounter-end="24" data-purecounter-duration="1"
              class="purecounter"></span>
            <p>Awards</p>
          </div>
        </div>

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
          $query3 = "SELECT * FROM skills WHERE admin_id = $admin_id";
          $run3 = mysqli_query($db, $query3);
          while ($skills = mysqli_fetch_array($run3)) {
            ?>

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
            <?php
          }
          ?>

        </div>

      </div>

    </div><!-- End Skills -->

    <!-- ======= Interests ======= -->
    <div class="interests container">

      <div class="section-title">
        <h2>Interests</h2>
      </div>

      <div class="row">
        <div class="col-lg-3 col-md-4">
          <div class="icon-box">
            <i class="ri-store-line" style="color: #ffbb2c;"></i>
            <h3>Playing</h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
          <div class="icon-box">
            <i class="ri-bar-chart-box-line" style="color: #5578ff;"></i>
            <h3>Coding</h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
          <div class="icon-box">
            <i class="ri-calendar-todo-line" style="color: #e80368;"></i>
            <h3>Hiking</h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4 mt-lg-0">
          <div class="icon-box">
            <i class="ri-paint-brush-line" style="color: #e361ff;"></i>
            <h3>Cosplaying</h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-database-2-line" style="color: #47aeff;"></i>
            <h3>Studying</h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-gradienter-line" style="color: #ffa76e;"></i>
            <h3>Pets</h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-file-list-3-line" style="color: #11dbcf;"></i>
            <h3>Basketball</h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-price-tag-2-line" style="color: #4233ff;"></i>
            <h3>Javascript</h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-anchor-line" style="color: #b2904f;"></i>
            <h3>PHP</h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-disc-line" style="color: #b20969;"></i>
            <h3>CSS</h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-base-station-line" style="color: #ff5828;"></i>
            <h3>Python</h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-fingerprint-line" style="color: #29cc61;"></i>
            <h3>Her</h3>
          </div>
        </div>
      </div>

    </div><!-- End Interests -->

    <!-- ======= Testimonials ======= -->
    <div class="testimonials container">

      <div class="section-title">
        <h2>Testimonials of Workmates</h2>
      </div>

      <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper">

          <div class="swiper-slide">
            <div class="testimonial-item">
              <p style="text-align: justify;">
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Working with Cedric was an absolute pleasure. Their attention to detail and design skills are
                exceptional. They took our vision and transformed it into a stunning and user-friendly website. The
                frontend code they delivered was clean, well-structured, and optimized for performance. Our users love
                the intuitive interface and seamless navigation. I highly recommend Cedric Vico for any frontend
                development project.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <img src="../assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
              <h3>Saul Goodman</h3>
              <h4>Ceo &amp; Founder</h4>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <p style="text-align: justify;">
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Working with Cedric was an absolute pleasure. Their attention to detail and design skills are
                exceptional. They took our vision and transformed it into a stunning and user-friendly website. The
                frontend code they delivered was clean, well-structured, and optimized for performance. Our users love
                the intuitive interface and seamless navigation. I highly recommend Cedric Vico for any frontend
                development project.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <img src="../assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
              <h3>Sara Wilsson</h3>
              <h4>Designer</h4>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <p style="text-align: justify;">
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Working with Cedric was an absolute pleasure. Their attention to detail and design skills are
                exceptional. They took our vision and transformed it into a stunning and user-friendly website. The
                frontend code they delivered was clean, well-structured, and optimized for performance. Our users love
                the intuitive interface and seamless navigation. I highly recommend Cedric Vico for any frontend
                development project.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <img src="../assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
              <h3>Jena Karlis</h3>
              <h4>Store Owner</h4>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <p style="text-align: justify;">
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Working with Cedric was an absolute pleasure. Their attention to detail and design skills are
                exceptional. They took our vision and transformed it into a stunning and user-friendly website. The
                frontend code they delivered was clean, well-structured, and optimized for performance. Our users love
                the intuitive interface and seamless navigation. I highly recommend Cedric Vico for any frontend
                development project.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <img src="../assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
              <h3>Matt Brandon</h3>
              <h4>Freelancer</h4>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <p style="text-align: justify;">
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Working with Cedric was an absolute pleasure. Their attention to detail and design skills are
                exceptional. They took our vision and transformed it into a stunning and user-friendly website. The
                frontend code they delivered was clean, well-structured, and optimized for performance. Our users love
                the intuitive interface and seamless navigation. I highly recommend Cedric Vico for any frontend
                development project.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <img src="../assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
              <h3>John Larson</h3>
              <h4>Entrepreneur</h4>
            </div>
          </div><!-- End testimonial item -->

        </div>
        <div class="swiper-pagination"></div>
      </div>

      <div class="owl-carousel testimonials-carousel">

      </div>

    </div><!-- End Testimonials  -->

  </section><!-- End About Section -->

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
          $query4 = "SELECT * FROM resume WHERE admin_id = $admin_id AND (type = 'e' OR type = 'E' OR type = 'Education' OR type = 'education')";
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
            <?php
          }
          ?>
        </div>
        <div class="col-lg-6">
          <h3 class="resume-title">Professional Experience</h3>
          <?php
          $query4 = "SELECT * FROM resume WHERE admin_id = $admin_id AND (type = 'p' OR type = 'P' OR type = 'Professional' OR type = 'professional')";
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
            <?php
          }
          ?>
        </div>
      </div>
    </div>
  </section><!-- End Resume Section -->

  <!-- ======= Services Section ======= -->
  <section id="services" class="services">
    <div class="container">

      <div class="section-title">
        <h2>Services</h2>
        <p>My Services</p>
      </div>

      <div class="row">
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
          <div class="icon-box">
            <div class="icon"><i class="bx bxl-dribbble"></i></div>
            <h4><a href="">Digital Art</a></h4>
            <p>Utilizing digital tools, software, and techniques to create artwork, including digital painting, graphic
              design, and illustration.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-file"></i></div>
            <h4><a href="">Drawing</a></h4>
            <p>The ability to accurately represent objects, people, or scenes using lines, shapes, and shading.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-tachometer"></i></div>
            <h4><a href="">Composition</a></h4>
            <p>The arrangement and organization of visual elements within a piece to create a harmonious and visually
              pleasing result.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-world"></i></div>
            <h4><a href="">Color theory</a></h4>
            <p>Understanding the principles of color mixing, color harmony, and color psychology to effectively use and
              manipulate colors in artwork.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-slideshow"></i></div>
            <h4><a href="">Sculpting</a></h4>
            <p>Working with various materials like clay, stone, or metal to create three-dimensional forms or
              sculptures.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-arch"></i></div>
            <h4><a href="">Printmaking</a></h4>
            <p>Techniques like relief printing, intaglio, lithography, and screen printing, which involve creating
              images by transferring ink onto paper or other surfaces.</p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Services Section -->

  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio">
    <div class="container">

      <div class="section-title">
        <h2>Artworks</h2>
        <p>My Works</p>
      </div>
      <div class="row">
        <div class="col-lg-12 d-flex justify-content-center">
          <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-photography">Photography</li>
            <li data-filter=".filter-drawing">Drawing</li>
            <li data-filter=".filter-graphic-design">Graphic Design</li>
            <li data-filter=".filter-mixed-media">Mixed Media</li>
            <li data-filter=".filter-line-art">Line Art</li>
            <li data-filter=".filter-sculpture">Sculpture</li>
            <li data-filter=".filter-painting">Painting</li>
          </ul>
        </div>
      </div>
      <div class="row portfolio-container">
        <?php
        $query5 = "SELECT * FROM portfolio WHERE admin_id = $admin_id";
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
                    class="portfolio-lightbox" title="<?= $portfolio['project_name'] ?>"><i class="bx bx-plus"></i></a>
                  <a href="<?= $portfolio['project_link'] ?>" data-gallery="portfolioGallery"
                    class="portfolio-details-lightbox"><i class="bx bx-link"></i></a>
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
                <?php
              }
              ?>

              <?php if ($social_media['facebook'] != '') { ?>
                <a href="https://facebook.com/<?= $social_media['facebook'] ?>" class="facebook"><i
                    class="bi bi-facebook"></i></a>

                <?php
              }
              if ($social_media['instagram'] != '') {
                ?>
                <a href="https://instagram.com/<?= $social_media['instagram'] ?>" class="instagram"><i
                    class="bi bi-instagram"></i></a>
                <?php
              }
              if ($social_media['skype'] != '') {
                ?>
                <a href="https://skype.com/<?= $social_media['skype'] ?>" class="google-plus"><i
                    class="bi bi-skype"></i></a>
                <?php
              }
              if ($social_media['skype'] != '') {
                ?>
                <a href="https:/youtube.com/<?= $social_media['youtube'] ?>" class="youtube"><i
                    class="bi bi-youtube"></i></a>
                <?php
              }
              if ($social_media['linkedin'] != '') {
                ?>
                <a href="https://linkedin.com/<?= $social_media['linkedin'] ?>" class="linkedin"><i
                    class="bi bi-linkedin"></i></a>
                <?php
              }
              ?>
            </div>
          </div>
        </div>

        <div class="col-md-6 mt-4 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-envelope"></i>
            <h3>Email Me</h3>
            <p>
              <?= $contact['email'] ?>
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
      <form action="forms/contact.php?admin_id=<?= $_GET['admin_id'] ?>" method="POST" class="mt-4">
        <div class="row">
          <div class="info-boxx">
            <h2 style="text-align: center; margin-bottom: 20px; font-weight: bold;">Feedback Form</h2>
          </div>
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