<?php
require('../include/db.php');
$query = "SELECT * FROM home,section_control,social_media,about,contact,site_background,seo";
$run = mysqli_query($db, $query);
$user_data = mysqli_fetch_array($run);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>
    <?= $user_data['title'] ?>
  </title>
  <meta content="<?= $user_data['description'] ?>" name="description">
  <meta content="<?= $user_data['keywords'] ?>" name="keywords">

  <!-- Favicons -->
  <link href="../images/<?= $user_data['siteicon'] ?>" rel="icon">
  <link href="../images/<?= $user_data['siteicon'] ?>" rel="apple-touch-icon">

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
    background: url('../assets/img/<?= $user_data['background_img'] ?>') top right no-repeat;
    background-size: cover;
  }
</style>

<body>
  <div class="background-image"></div>
  <!-- ======= Header ======= -->
  <header class="header " id="header">


    <div class="container">
      <img src="../images/logo.png" class="img-fluid" alt=""
        style="width: 4vw; cursor: pointer; font-style: italic; margin-top: -190px;margin-bottom: 150px; margin-left: -100px; ">
      <a href="./home.html" class="logo"
        style=" display: flex; align-items: center; text-decoration: none; font-size: 1.5rem; color: var(--text-color); margin-top: -200px;margin-bottom: 160px; margin-left: -40px; font-style: italic; font-weight: 600; cursor: pointer;"><b
          style="color: #1DB954;">rt </b><b style="color: #FFF;">Abode</b></a>
      <h1><a href="portfolio.php">
          <?= $user_data['title'] ?>
        </a></h1>
      <h2>
        <?= $user_data['subtitle'] ?>
      </h2>
      <!-- navbar -->
      <nav id="navbar" class="navbar">
        <ul>
          <?php
          if ($user_data['home_section']) {
            ?>
            <li><a class="nav-link active" href="#header">Home</a></li>
            <?php
          }
          if ($user_data['about_section']) {
            ?>
            <li><a class="nav-link" href="#about">About</a></li>
            <?php
          }
          if ($user_data['resume_section']) {
            ?>
            <li><a class="nav-link" href="#resume">Resume</a></li>
            <?php
          }
          if ($user_data['services_section']) {
            ?>
            <li><a class="nav-link" href="#services">Services</a></li>
            <?php
          }
          if ($user_data['portfolio_section']) {
            ?>
            <li><a class="nav-link" href="#portfolio">Artworks</a></li>
            <?php
          }
          if ($user_data['contact_section']) {
            ?>
            <li><a class="nav-link" href="#contact">Contact</a></li>
            <?php
          }
          ?>
          <?php

          ?>

          <li><a class="nav-link" href="../login.php"
              style="display: inline-block; padding: 0.7rem 1rem; background: #1db954;
                    border-radius: 2rem; box-shadow: 0 0 .5rem #1db954; font-size: .5rem; margin-left: 10px; color: var(--second-bg-color); letter-spacing: 0.05rem;font-weight: 500; transition: 0.5s ease;">Login</a>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <?php if ($user_data['showicons']) { ?>
        <div class="social-links">

          <?php if ($user_data['twitter'] != '') { ?>
            <a href="https://twitter.com/<?= $user_data['twitter'] ?>" class="twitter"><i class="bi bi-twitter"></i></a>
            <?php
          }
          ?>
          <?php if ($user_data['facebook'] != '') { ?>
            <a href="https://facebook.com/<?= $user_data['facebook'] ?>" class="facebook"><i class="bi bi-facebook"></i></a>
            <?php
          }
          ?>
          <?php if ($user_data['instagram'] != '') { ?>
            <a href="https://instagram.com/<?= $user_data['instagram'] ?>" class="instagram"><i
                class="bi bi-instagram"></i></a>
            <?php
          }
          ?>
          <?php if ($user_data['skype'] != '') { ?>
            <a href="https://skype.com/<?= $user_data['skype'] ?>" class="google-plus"><i class="bi bi-skype"></i></a>
            <?php
          }
          ?>
          <?php if ($user_data['youtube'] != '') { ?>
            <a href="https://youtube.com/<?= $user_data['youtube'] ?>" class="youtube"><i class="bi bi-youtube"></i></a>
            <?php
          }
          ?>
          <?php if ($user_data['linkedin'] != '') { ?>
            <a href="https://linkedin.com/<?= $user_data['linkedin'] ?>" class="linkedin"><i class="bi bi-linkedin"></i></a>
            <?php
          }
          ?>

        </div>
        <?php
      }
      ?>

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
          <img src="../images/<?= $user_data['profile_pic'] ?>" class="img-fluid" alt="">
        </div>
        <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
          <h3>
            <?= $user_data['about_title'] ?>
          </h3>
          <p class="fst-italic">
            <?= $user_data['about_subtitle'] ?>
          </p>
          <div class="row">
            <div class="col-lg-6">
              <ul>
                <?php
                $query2 = "SELECT * FROM personal_info LIMIT 5";
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
                $query2 = "SELECT * FROM personal_info LIMIT 5, 5";
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
            <?= $user_data['about_desc'] ?>
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
          $query3 = "SELECT * FROM skills";
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
          $query4 = "SELECT * FROM resume";
          $run4 = mysqli_query($db, $query4);
          while ($resume = mysqli_fetch_array($run4)) {
            if ($resume['type'] == 'e' or $resume['type'] == 'E' or $resume['type'] == 'Education' or $resume['type'] == 'education') {
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
          }
          ?>
        </div>
        <div class="col-lg-6">

          <h3 class="resume-title">Professional Experience</h3>
          <?php
          $query4 = "SELECT * FROM resume";
          $run4 = mysqli_query($db, $query4);
          while ($resume = mysqli_fetch_array($run4)) {
            if ($resume['type'] == 'p' or $resume['type'] == 'P' or $resume['type'] == 'Professional' or $resume['type'] == 'professional') {
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
            <li data-filter=".filter-app">App</li>
            <li data-filter=".filter-card">Card</li>
            <li data-filter=".filter-web">Web</li>
          </ul>
        </div>
      </div>

      <div class="row portfolio-container">
        <?php
        $query5 = "SELECT * FROM portfolio";
        $run5 = mysqli_query($db, $query5);
        while ($portfolio = mysqli_fetch_array($run5)) {

          ?>
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
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
              <?= $user_data['address'] ?>
            </p>
          </div>
        </div>

        <div class="col-md-6 mt-4 mt-md-0 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-share-alt"></i>
            <h3>Social Profiles</h3>
            <div class="social-links">
              <?php if ($user_data['twitter'] != '') { ?>
                <a href="https://twitter.com/<?= $user_data['twitter'] ?>" class="twitter"><i
                    class="bi bi-twitter"></i></a>
                <?php
              }
              ?>

              <?php if ($user_data['facebook'] != '') { ?>
                <a href="https://facebook.com/<?= $user_data['facebook'] ?>" class="facebook"><i
                    class="bi bi-facebook"></i></a>

                <?php
              }
              if ($user_data['instagram'] != '') {
                ?>
                <a href="https://instagram.com/<?= $user_data['instagram'] ?>" class="instagram"><i
                    class="bi bi-instagram"></i></a>
                <?php
              }
              if ($user_data['skype'] != '') {
                ?>
                <a href="https://skype.com/<?= $user_data['skype'] ?>" class="google-plus"><i class="bi bi-skype"></i></a>
                <?php
              }
              if ($user_data['skype'] != '') {
                ?>
                <a href="https:/youtube.com/<?= $user_data['youtube'] ?>" class="youtube"><i
                    class="bi bi-youtube"></i></a>
                <?php
              }
              if ($user_data['linkedin'] != '') {
                ?>
                <a href="https://linkedin.com/<?= $user_data['linkedin'] ?>" class="linkedin"><i
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
              <?= $user_data['email'] ?>
            </p>
          </div>
        </div>
        <div class="col-md-6 mt-4 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-phone-call"></i>
            <h3>Call Me</h3>
            <p>
              <?= $user_data['mobile'] ?>
            </p>
          </div>
        </div>
      </div>


      <form action="forms/contact.php" method="post" role="form" class="php-email-form mt-4">
        <div class="row">
          <div class="info-boxx">
            <h2 style=" text-align: center; margin-bottom: 20px; font-weight: bold;">Feedback Form</h2>
          </div>
          <div class="col-md-6 form-group">
            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
          </div>
          <div class="col-md-6 form-group mt-3 mt-md-0">
            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
          </div>
        </div>
        <div class="form-group mt-3">
          <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
        </div>
        <div class="form-group mt-3">
          <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
        </div>
        <div class="my-3">
          <div class="loading">Loading</div>
          <div class="error-message"></div>
          <div class="sent-message">Your message has been sent. Thank you!</div>
        </div>
        <div class="text-center"><button type="submit">Send Message</button></div>
      </form>


    </div>
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