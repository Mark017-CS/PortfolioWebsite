<?php
require('../include/db.php');

// Retrieve data from the admin table
$query = "SELECT id, fullname, admin_profile FROM admin";
$result = mysqli_query($db, $query);

// Fetch data from the home table
$queryHome = "SELECT subtitle FROM home";
$resultHome = mysqli_query($db, $queryHome);
$rowHome = mysqli_fetch_assoc($resultHome);
$subtitle = $rowHome['subtitle'];
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
  <style>
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
      <a href="../register.php" class="btn1"><b>Register</b></a>
      <a>|</a>
      <a href="../login.php" class="btn1"><b style="color: green; opacity: 0;">ii</b><b>Login</b><b
          style="color: green; opacity: 0;">ii</b></a>
    </nav>
  </header>

  <!-- home section design -->
  <section  class="home" id="home">
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
      <img src="images/about.png" alt="" />
    </div>

    <div class="about-content">
      <h2 class="heading">About <span>Us</span></h2>
      <p>
        Welcome to our team of talented undergraduate developers! We are a
        group of passionate individuals who share a love for software
        development and programming. Our team is made up of experienced
        developers with a diverse set of skills, ranging from front-end
        development to data science. We strive to create innovative and
        user-friendly applications that make a difference in the world.
      </p>
      <p>
        Our team believes that collaboration is the key to success. We work
        closely together to develop new ideas, solve complex problems, and
        create solutions that meet the needs of our clients. We are always
        looking for new challenges and opportunities to learn and grow.
      </p>
      <p>
        We are proud of our commitment to delivering high-quality work that
        exceeds our clients' expectations. Our dedication to detail and
        quality ensures that our applications are reliable, efficient, and
        easy to use. We are committed to delivering exceptional service and
        support to our clients, and we take pride in the relationships we have
        built with them.
      </p>
      <p>
        Thank you for taking the time to learn more about us. We look forward
        to working with you and creating exceptional solutions together.
      </p>
    </div>
  </section>

  <!-- services section design -->
  <section class="services" id="services">
    <h2 class="heading">Our <span>Services</span></h2>

    <div class="services-container">
      <div class="services-box">
        <i class="bx bxs-paint"></i>
        <h3>Graphic Design</h3>
        <p>
          We believe that great graphic design is all about the details - let
          us bring your vision to life.
        </p>
        <a href="https://www.youtube.com/watch?v=INMuAYZDums" class="btn" target="_blank">Watch</a>
      </div>

      <div class="services-box">
        <i class="bx bx-code-alt"></i>
        <h3>Web Development</h3>
        <p>
          Our web development is focused on delivering fast, reliable, and
          secure websites that exceed your expectations.
        </p>
        <a href="https://www.youtube.com/watch?v=HGSR3FDVkkQ" class="btn" target="_blank">Watch</a>
      </div>

      <div class="services-box">
        <i class="bx bx-bar-chart-alt"></i>
        <h3>Digital Marketing</h3>
        <p>
          Our digital marketing strategy is designed to deliver results, with
          a focus on data-driven insights and optimization.
        </p>
        <a href="https://www.youtube.com/watch?v=tT2puL7IZOE" class="btn" target="_blank">Watch</a>
      </div>
    </div>
  </section>

<!-- portfolio section design -->
<section class="portfolio" id="portfolio">
  <h2 class="heading">Port<span>folios</span></h2>

  <div class="portfolio-container">
    <?php
    $itemsPerPage = 5; // Number of items to display per page
    $page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number
    $startFrom = ($page - 1) * $itemsPerPage; // Calculate the starting point for the query
    
    // Retrieve data with pagination
    $query = "SELECT a.id, a.fullname, a.admin_profile, h.subtitle
              FROM admin AS a
              JOIN home AS h ON a.id = h.admin_id
              LIMIT $startFrom, $itemsPerPage";
    $result = mysqli_query($db, $query);

    while ($row = mysqli_fetch_assoc($result)) {
      ?>
      <div class="portfolio-box">
        <img src="../images/<?php echo $row['admin_profile']; ?>" alt="" />
        <div class="portfolio-layer">
          <h4>
            <?php echo $row['fullname']; ?>
          </h4>
          <p>
            <?php echo $row['subtitle']; ?>!<br><br>
            Know more about me. Click here ↓ 
          </p>
          <a href="portfolio.php?id=<?php echo $row['id']; ?>" target="_blank"><i class="bx bx-link-external"></i></a>
        </div>
      </div>
    <?php } ?>
  </div>

  <!-- Pagination -->
  <div class="pagination" style="cursor: pointer">
    <?php
    // Calculate total number of pages
    $query = "SELECT COUNT(*) AS total FROM admin";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    $totalPages = ceil($row['total'] / $itemsPerPage);

    // Display pagination links
    if ($totalPages > 1) {
      if ($page > 1) {
        echo '<a href="?page=1" class="arrow">&lt;&lt;</a>';
        echo '<a href="?page=' . ($page - 1) . '" class="arrow">&lt;</a>';
      }
      for ($i = 1; $i <= $totalPages; $i++) {
        echo '<a href="?page=' . $i . '" class="page-number';
        if ($i == $page) {
          echo ' active';
        }
        echo '">' . $i . '</a>';
      }
      if ($page < $totalPages) {
        echo '<a href="?page=' . ($page + 1) . '" class="arrow">&gt;</a>';
        echo '<a href="?page=' . $totalPages . '" class="arrow">&gt;&gt;</a>';
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
</body>

</html>