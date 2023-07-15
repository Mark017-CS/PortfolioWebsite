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
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Art Abode</title>

  <link href="../images/logo.png" rel="icon" />
  <link href="../images/logo.png" rel="apple-touch-icon" />

  <!-- box icons -->
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

  <!-- custom css -->
  <link rel="stylesheet" href="home.css" />

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <style>

.home {
  background: url('../images/<?= $pi['background_img'] ?>');
}
    .navbar {
      display: none;
    }

    .show {
      display: block;
    }

    /* CSS styles for the responsive menu */
    #menu-icon {
      display: none;
    }

    .credits {
      position: fixed;
      right: 0;
      left: 0;
      bottom: 0;
      padding: 15px;
      text-align: right;
      font-size: 13px;
      color: #fff;
      z-index: 999999;
    }

    @media (max-width: 992px) {
      .credits {
        text-align: center;
        padding: 10px;
        background: rgba(0, 0, 0, 0.8);
      }
    }

    .pagination {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 50px;
    }

    .pagination-link {
      padding: 10px 15px;
      margin: 0 5px;
      border-radius: 4px;
      color: black;
      text-decoration: none;
      background-color: gray;
      transition: 0.3s;
    }

    .pagination-link:hover {
      background-color: green;
    }

    .credits a {
      color: #18d26e;
      transition: 0.3s;
    }

    .credits a:hover {
      color: #fff;
    }

    @media (max-width: 952px) {

      .navbar.responsive,
      .navbar2.responsive {
        display: block;
        justify-content: center;
        align-items: center;
        text-align: center;
      }

      .show {
        display: none;
      }

      #menu-icon {
        display: block;
      }
    }
  </style>
  <script>
    window.onload = function () {
      if (performance.navigation.type === 1) {
        // Page is reloaded
        location.href = "#home";
      }
    };
  </script>
</head>

<body>
  <!-- header design -->
  <header class="header">
    <a href="home.php" class="logo"><b style="color: #1db954; font-style: italic; cursor: pointer;">Art </b><b
        style="color: #fff; cursor: pointer;"> Abode</b></a>

    <i class="bx bx-menu" id="menu-icon"></i>

    <nav class="navbar show">
      <a href="#home" id="home-link" class="active">Home</a>
      <a href="#about" id="about-link">About</a>
      <a href="#services" id="services-link">Services</a>
      <a href="#portfolio" id="portfolio-link">Portfolios</a>
      <a href="#contact" id="contact-link">Contact</a>
    </nav>

    <nav class="navbar2 show">
      <?php
      session_start(); // Start the session
      if (isset($_SESSION['user_id'])) {
        // User is logged in
        echo '<a href="account.php" target="_blank"><b>ACCOUNT  </b></a>';
        echo '<a>|</a>';
        echo '<a href="../components/logout.php" ><b>  Logout</b></a>';
      } else {
        // User is not logged in
        echo '<a href="../components/register.php" ><b>REGISTER</b></a>';
        echo '<a>|</a>';
        echo '<a href="../components/login.php" ><b style="color: green; opacity: 0;"></b><b>LOGIN</b><b style="color: green; opacity: 0;"></b></a>';
      }
      ?>
    </nav>
  </header>

  <!-- home section design -->
  <section class="home" id="home">
    <div class="home-content">
      <h3>Step into our</h3>
      <h1>WORLD OF DESIGN</h1>
      <h3>where <span>IMAGINATION</span><br> meets <span>REALITY</span></h3>
      <p>
        Greetings! Allow us, Group 4, to proudly present our exceptional<br>
        Portfolio Website as a testament to our team's capabilities.
      </p>
      <div class="social-media">
        <a href="https://www.facebook.com/" target="_blank"><i class="bx bxl-facebook"></i></a>
        <a href="https://www.twitter.com/" target="_blank"><i class="bx bxl-twitter"></i></a>
        <a href="https://www.instagram.com/" target="_blank"><i class="bx bxl-instagram-alt"></i></a>
        <a href="https://www.linkedin.com/" target="_blank"><i class="bx bxl-linkedin"></i></a>
        <a href="https://www.youtube.com/" target="_blank"><i class="bx bxl-youtube"></i></a>
        <a href="skype:your_skype_username?chat"><i class="bx bxl-skype"></i></a>
      </div>
      <a href="https://www.artworkarchive.com/blog/building-the-best-online-portfolio-for-your-art" class="btn"
        target="_blank">More Info</a>
    </div>


  </section>

  <!-- about section design -->
  <section class="about" id="about">
    <div class="about-img">
      <img src="../images/<?= $pii['about_img'] ?>" alt="" />
    </div>

    <div class="about-content">
      <h2 class="heading">About <span>Us</span></h2>
      <p>
      <?= $pii['about_desc'] ?>
      </p>
    </div>
  </section>

  <!-- services section design -->
  <section class="services" id="services">
  <h2 class="heading">Our <span>Services</span></h2>
  <div class="services-container">
  <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper">
          <?php
          $query333 = "SELECT * FROM admin_services";
          $run333 = mysqli_query($db, $query333);
          while ($service = mysqli_fetch_array($run333)) {
            ?>
            <div class="swiper-slide">
            <div class="services-box">
              <i class="bx bxs-briefcase"></i>
              <h3><?= $service['service_title'] ?></h3>
              <p><?= $service['service_des'] ?></p>
              <a href="<?= $service['service_link'] ?>" class="btn" target="_blank">Watch</a>
            </div>
            </div><!-- End testimonial item -->
            <?php
          }
          ?>
        </div>
        <div class="swiper-pagination"></div>
      </div>
      </div>
      <div class="owl-carousel testimonials-carousel"></div>

</section>


<!-- portfolio section design -->
<section class="portfolio" id="portfolio">
  <h2 class="heading">Port<span>folios</span></h2>

  <div class="portfolio-slider">
    <div class="portfolio-container">
      <?php
      $itemsPerPage = 5; // Number of items to display per page
      $page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number
      $startFrom = ($page - 1) * $itemsPerPage; // Calculate the starting point for the query
      
      // Retrieve data with pagination, ordered by registration date in descending order
      $query = "SELECT a.user_id, a.fullname, a.user_profile, h.subtitle
                FROM user AS a
                LEFT JOIN home AS h ON a.user_id = h.user_id
                ORDER BY a.user_id DESC
                LIMIT $startFrom, $itemsPerPage";
      $result = mysqli_query($db, $query);

      if (!$result) {
        die('Error executing the query: ' . mysqli_error($db));
      }

      while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="portfolio-box">
          <img src="../images/<?php echo $row['user_profile']; ?>" alt="" />
          <div class="portfolio-layer">
            <h4>
              <?php echo $row['fullname']; ?>
            </h4>
            <p>
              <?php echo $row['subtitle']; ?>!<br><br>
              Know more about me. Click here ↓
            </p>
            <a href="portfolio.php?user_id=<?php echo $row['user_id']; ?>" target="_blank"><i
                class="bx bx-link-external"></i></a>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>

    <!-- Pagination -->
    <div class="pagination">
      <?php
      // Calculate total number of pages
      $query = "SELECT COUNT(*) AS total FROM user";
      $result = mysqli_query($db, $query);

      if (!$result) {
        die('Error executing the query: ' . mysqli_error($db));
      }

      $row = mysqli_fetch_assoc($result);
      $totalPages = ceil($row['total'] / $itemsPerPage);

      // Display pagination links
      if ($totalPages > 1) {
        if ($page > 1) {
          echo '<a href="#portfolio" onclick="navigateToPage(1)" class="pagination-link">&lt;&lt;</a>';
          echo '<a href="#portfolio" onclick="navigateToPage(' . ($page - 1) . ')" class="pagination-link">&lt;</a>';
        }
        for ($i = 1; $i <= $totalPages; $i++) {
          echo '<a href="#portfolio" onclick="navigateToPage(' . $i . ')" class="pagination-link';
          if ($i == $page) {
            echo ' active';
          }
          echo '">' . $i . '</a>';
        }
        if ($page < $totalPages) {
          echo '<a href="#portfolio" onclick="navigateToPage(' . ($page + 1) . ')" class="pagination-link">&gt;</a>';
          echo '<a href="#portfolio" onclick="navigateToPage(' . $totalPages . ')" class="pagination-link">&gt;&gt;</a>';
        }
      }
      ?>
    </div>

  </section>

  <!-- contact section design -->
  <section class="contact" id="contact">
    <h2 class="heading">Contact <span>Us</span></h2>

    <form action="contact.php" method="POST">
      <div class="input-box">
        <input type="text" name="fullName" placeholder="Full Name" required />
        <input type="email" name="email" placeholder="Email Address" required />
      </div>
      <div class="input-box">
        <input type="number" name="mobileNumber" placeholder="Mobile Number" required />
        <input type="text" name="subject" placeholder="Email Subject" required />
      </div>
      <textarea name="message" cols="30" rows="10" placeholder="Your Message" required></textarea>
      <input type="submit" value="Send Message" class="btn" />
    </form>
  </section>

  <!-- footer design -->
  <footer class="footer">
    <div class="footer-text">
      <p>Copyright &copy; 2023 by Group 4 | All Rights Reserved.</p>
    </div>

    <div class="footer-iconTop">
      <a href="#home"><i class="bx bx-up-arrow-alt"></i></a>
    </div>
    <div class="credits">
      <a href="#"> Made by Group 4 | Version 1.0</a>
    </div>
  </footer>

  <!-- Script-->
  <script>
    // Get all the navigation links
    const links = document.querySelectorAll(".navbar a");

    // Add event listeners to each link
    links.forEach((link) => {
      link.addEventListener("click", function (event) {
        // Remove the "active" class from all links
        links.forEach((link) => {
          link.classList.remove("active");
        });

        // Add the "active" class to the clicked link
        this.classList.add("active");
      });
    });
  </script>
  <script>
    const menuIcon = document.getElementById("menu-icon");
    const navbar = document.querySelector(".navbar");
    const navbar2 = document.querySelector(".navbar2");

    menuIcon.addEventListener("click", function () {
      navbar.classList.toggle("responsive");
      navbar2.classList.toggle("responsive");
    });

    function checkScreenWidth() {
      if (window.innerWidth > 768) {
        // Adjust the breakpoint as needed
        navbar.classList.remove("responsive");
        navbar2.classList.remove("responsive");
      }
    }

    window.addEventListener("resize", checkScreenWidth);
  </script>
  <script>
    // Get all the page numbers
    const pageNumbers = document.querySelectorAll(".page-number");

    // Add click event listeners to each page number
    pageNumbers.forEach((pageNumber) => {
      pageNumber.addEventListener("click", () => {
        // Remove active class from all page numbers
        pageNumbers.forEach((number) => {
          number.classList.remove("active");
        });

        // Add active class to the clicked page number
        pageNumber.classList.add("active");
      });
    });
  </script>
  <script>
    function navigateToPage(pageNumber) {
      // Update the URL with the page number
      const url = new URL(window.location.href);
      url.searchParams.set('page', pageNumber);
      window.location.href = url;

      // Prevent the default link behavior
      return false;
    }
  </script>
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