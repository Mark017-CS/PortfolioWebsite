<?php
require('../include/db.php');
if (!isset($_SESSION['isUserLoggedIn'])) {
  echo "<script>window.location.href='login.php';</script>";
  exit;
}

$user_id = $_SESSION['user_id']; // Assuming the user_id is stored in the session

// Retrieve data for the specific user based on user_id
$query = "SELECT * FROM user 
          LEFT JOIN home ON user.user_id = home.user_id 
          LEFT JOIN section_control ON user.user_id = section_control.user_id 
          LEFT JOIN social_media ON user.user_id = social_media.user_id 
          LEFT JOIN about ON user.user_id = about.user_id 
          LEFT JOIN contact ON user.user_id = contact.user_id 
          LEFT JOIN site_background ON user.user_id = site_background.user_id 
          LEFT JOIN seo ON user.user_id = seo.user_id 
          LEFT JOIN resume ON user.user_id = resume.user_id
          LEFT JOIN testimonials ON user.user_id = testimonials.user_id
          LEFT JOIN interests ON user.user_id = interests.user_id
          LEFT JOIN portfolio ON user.user_id = portfolio.user_id
          WHERE user.user_id = $user_id";

$run = mysqli_query($db, $query);
if (!$run) {
  echo "Error executing query: " . mysqli_error($db);
  exit;
}

$user_data = mysqli_fetch_array($run);
if (!$user_data) {
  echo "Error fetching user data: " . mysqli_error($db);
  exit;
}
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>User Account | Dashboard</title>
  <!-- Favicons -->
  <link href="../images/logo.png" rel="icon">
  <link href="../images/logo.png" rel="apple-touch-icon">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../user/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../user/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../user/dist/css/user.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../user/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../user/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../user/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item">
          <a class="nav-link" href="home.php">
            Return Home
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="account.php" class="brand-link">
        <img src="../images/logo.png" alt="userLTE Logo" class="brand-image"
          >
        <span class="brand-text font-weight: bold;">ACCOUNT PANEL</span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../images/<?= $user_data['user_profile'] ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="../Home/portfolio.php?user_id=<?= $user_id ?>" class="d-block">
              <?= $user_data['fullname'] ?>
            </a>
          </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item menu-open">
              <a href="account.php" class="nav-link">
                <i class="fa fa-th-large" aria-hidden="true"></i>
                <p>
                  Section Control
                </p>
              </a>
            </li>
            <li class="nav-item menu-open">
              <a href="account.php?homesetting=true" class="nav-link">
                <i class="fa fa-home" aria-hidden="true"></i>
               <p>
                  Home Setting
                </p>
              </a>
            </li>
            <li class="nav-item menu-open">
              <a href="account.php?aboutsetting=true" class="nav-link">
                <i class="fa fa-question-circle" aria-hidden="true"></i>
                <p>
                  About Setting
                </p>
              </a>
            </li>
            <li class="nav-item menu-open">
              <a href="account.php?resumesetting=true" class="nav-link">
                <i class="fa fa-briefcase" aria-hidden="true"></i>
                <p>
                  Resume Setting
                </p>
             </a>
            </li>
            <li class="nav-item menu-open">
              <a href="account.php?portfoliosetting=true" class="nav-link">
                <i class="fa fa-desktop" aria-hidden="true"></i>
                <p>
                  Artworks Setting
                </p>
              </a>
            </li>
            <li class="nav-item menu-open">
              <a href="account.php?servicesetting=true" class="nav-link">
                <i class="fa fa-th-large" aria-hidden="true"></i>
                <p>
                  Service Setting
                </p>
              </a>
            </li>
            <li class="nav-item menu-open">
              <a href="account.php?contactsetting=true" class="nav-link">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <p>
                  Contact Setting
                </p>
              </a>
            </li>
            <li class="nav-item menu-open">
              <a href="account.php?changebackground=true" class="nav-link">
                <i class="fa fa-cog" aria-hidden="true"></i>
                <p>
                  Change Background
                </p>
              </a>
            </li>
            <li class="nav-item menu-open">
              <a href="account.php?seosetting=true" class="nav-link">
                <i class="fa fa-search" aria-hidden="true"></i>
                <p>
                  SEO Setting
                </p>
              </a>
            </li>
            <li class="nav-item menu-open">
              <a href="account.php?accountsetting=true" class="nav-link">
                <i class="fa fa-user" aria-hidden="true"></i>
                <p>
                  Account Setting
                </p>
              </a>

            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <br>
      <!-- /.content-header -->
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
         <!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <?php
            if (isset($_GET['homesetting'])) { ?>
              <div class="card card-primary col-lg-12">
                <div class="card-header">
                  <h3 class="card-title">Manage Home</h3>
                </div>
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Home</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <table class="table">
                        <thead>
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th>Showicons</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $q = "SELECT * from home WHERE user_id=$user_id";
                          $r = mysqli_query($db, $q);
                          $c = 1;
                          while ($home = mysqli_fetch_array($r)) {
                            ?>
                            <tr>
                              <td>
                              <?= $c ?>
                              </td>
                              <td>
                              <?= $home['title'] ?>
                              </td>
                              <td>
                              <?= $home['subtitle'] ?>
                              </td>
                              <td>
                              <?= $home['showicons'] ?>
                              </td>
                            </tr>
                            <?php
                            $c++;
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                    </div>
                    <!-- /.card-body -->
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="../include/user.php" method="post">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Headline</label>
                      <input type="text" class="form-control" name="title" 
                        id="exampleInputEmail1" placeholder="Enter headline">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Subtitle</label>
                      <input type="text" class="form-control" name="subtitle" 
                        id="exampleInputPassword1" placeholder="Enter Subtile">
                    </div>

                    <div class="form-check">
                      <input type="checkbox" name="showicons" class="form-check-input" id="exampleCheck1" <?php
                      if ($user_data['showicons']) {
                        echo "checked";
                      }
                      ?>>
                      <label class="form-check-label" for="exampleCheck1">Show Social Icons</label>
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                        <?php
                        $query = "SELECT * FROM home WHERE user_id = $user_id";
                        $result = mysqli_query($db, $query);
                        $row_count = mysqli_num_rows($result);
                        
                        if ($row_count == 0) {
                          // Display Add button
                          echo '<button type="submit" name="add-home" class="btn btn-primary">Add Home Details</button>';
                        } else {
                          // Display Save Changes button
                          echo '<button type="submit" name="update-home" class="btn btn-primary">Save Changes</button>';
                        }
                        ?>
                      </div>
                </form>
              </div>
              <?php
            } else if (isset($_GET['aboutsetting'])) {
              ?>
                <div class="card card-primary col-lg-12">
                  <div class="card-header">
                    <h3 class="card-title">Manage About</h3>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">About</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <table class="table">
                        <thead>
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>About Title</th>
                            <th>About Subtitle</th>
                            <th>Profile Picture</th>
                            <th>About Description</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $q = "SELECT * from about WHERE user_id=$user_id";
                          $r = mysqli_query($db, $q);
                          $c = 1;
                          while ($about = mysqli_fetch_array($r)) {
                            ?>
                            <tr>
                              <td>
                              <?= $c ?>
                              </td>
                              <td>
                              <?= $about['about_title'] ?>
                              </td>
                              <td>
                              <?= $about['about_subtitle'] ?>
                              </td>
                              <td>
                              <img src="../images/<?= $about['profile_pic'] ?>" style="height: 70px; width: 100px;">
                              </td>
                              <td>
                              <?= $about['about_desc'] ?>
                              </td>
                            </tr>
                            <?php
                            $c++;
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                    </div>
                    <!-- /.card-body -->
                  <!-- /.card-header -->
                  <!-- form start -->
                  
                  <form role="form" action="../include/user.php" method="post" enctype="multipart/form-data">
                  <img src="../images/<?= $user_data['profile_pic'] ?>" class="col-2">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">About Profile Pic</label>
                        <input type="file" class="form-control" name="profile">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">About Headline</label>
                        <input type="text" class="form-control" name="abouttitle" 
                          id="exampleInputEmail1" placeholder="Enter headline">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">About Subtitle</label>
                        <input type="text" class="form-control" name="aboutsubtitle"
                          id="exampleInputPassword1"
                          placeholder="Enter Subtitle">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">About Description</label><br>
                        <textarea cols="50" name="aboutdesc"></textarea>
                      </div>
                    </div>
                    <div class="card-footer">
                        <?php
                        $query = "SELECT * FROM about WHERE user_id = $user_id";
                        $result = mysqli_query($db, $query);
                        $row_count = mysqli_num_rows($result);
                        
                        if ($row_count == 0) {
                          // Display Add SEO button
                          echo '<button type="submit" name="add-about" class="btn btn-primary">Add About Details</button>';
                        } else {
                          // Display Save Changes button
                          echo '<button type="submit" name="update-about" class="btn btn-primary">Save Changes</button>';
                        }
                        ?>
                      </div>
                  </form>
                </div>
                <div class="card card-primary col-lg-12">
                  <div class="card-header">
                    <h3 class="card-title">Manage Skills</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Skills</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <table class="table">
                        <thead>
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>Skill Name</th>
                            <th>Skill Level</th>
                            <th style="width: 40px">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $q = "SELECT * from skills WHERE user_id=$user_id";
                          $r = mysqli_query($db, $q);
                          $c = 1;
                          while ($skill = mysqli_fetch_array($r)) {
                            ?>
                            <tr>
                              <td>
                              <?= $c ?>
                              </td>
                              <td>
                              <?= $skill['skill_name'] ?>
                              </td>
                              <td>
                                <div class="progress progress-xs">
                                  <div class="progress-bar progress-bar-danger" style="width: <?= $skill['skill_level'] ?>%">
                                  </div>
                                </div>
                                <span class="badge bg-danger">
                                <?= $skill['skill_level'] ?>%
                                </span>
                              </td>
                              <td>
                                <a href="../include/deleteskill.php?id=<?= $skill['id'] ?>">Delete</a>
                              </td>
                            </tr>
                            <?php
                            $c++;
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <form role="form" action="../include/user.php" method="post">
                    <div class="card-body">
                      <div class="form-group col-6">
                        <label for="exampleInputEmail1">Skill Name</label>
                        <input type="text" class="form-control" name="skillname">
                      </div>
                      <div class="form-group col-6">
                        <label for="exampleInputEmail1">Skill Level</label>
                        <input type="range" min="1" max="100" class="form-control" name="skilllevel"
                          id="exampleInputEmail1">
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" name="add-skill" class="btn btn-primary">Add Skill</button>
                    </div>
                  </form>
                </div>
                <div class="card card-primary col-lg-12">
                <div class="card-header">
                    <h3 class="card-title">Manage Interests</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Interests</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <table class="table">
                        <thead>
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>Interest Name</th>
                            <th style="width: 40px">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $q = "SELECT * from interests WHERE user_id=$user_id";
                          $r = mysqli_query($db, $q);
                          $c = 1;
                          while ($interest = mysqli_fetch_array($r)) {
                            ?>
                            <tr>
                              <td>
                              <?= $c ?>
                              </td>
                              <td>
                              <?= $interest['inter_name'] ?>
                              </td>                             
                              <td>
                                <a href="../include/deleteinterest.php?id=<?= $interest['id'] ?>">Delete</a>
                              </td>
                            </tr>
                            <?php
                            $c++;
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <form role="form" action="../include/user.php" method="post">
                    <div class="card-body">
                      <div class="form-group col-6">
                        <label for="exampleInputEmail1">Interest Name</label>
                        <input type="text" class="form-control" name="inter_name">
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" name="add-interest" class="btn btn-primary">Add Interest</button>
                    </div>
                  </form>
                </div>
                <div class="card card-primary col-lg-12">
                  <div class="card-header">
                    <h3 class="card-title">Manage Counts</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Counts</h3>
                    </div>
                  <div class="card-body p-0">
                      <table class="table">
                        <thead>
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>Happy Clients</th>
                            <th>Projects</th>
                            <th>Hours of Support</th>
                            <th>Awards</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $q = "SELECT * from counts WHERE user_id=$user_id";
                          $r = mysqli_query($db, $q);
                          $c = 1;
                          while ($pi = mysqli_fetch_array($r)) {
                            ?>
                            <tr>
                              <td>
                              <?= $c ?>
                              </td>
                              <td>
                              <?= $pi['happy_clients'] ?>
                              </td>
                              <td>
                              <?= $pi['projects'] ?>
                              </td>
                              <td>
                              <?= $pi['hours'] ?>
                              </td>
                              <td>
                              <?= $pi['awards'] ?>
                              </td>                              
                            </tr>
                            <?php
                            $c++;
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                    </div>
                  <!-- form start -->
                  <form role="form" action="../include/user.php" method="post">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Happy Clients</label>
                        <input type="number" class="form-control" name="happy_clients" value="<?= $user_data['happy_clients'] ?>"
                          id="exampleInputEmail1" placeholder="Enter Happy Cleints">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Projects</label>
                        <input type="number" class="form-control" name="projects" value="<?= $user_data['projects'] ?>"
                          id="exampleInputPassword1" placeholder="Enter Projects">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Hours of support</label>
                        <input type="number" class="form-control" name="hours" value="<?= $user_data['hours'] ?>"
                          id="exampleInputPassword1" placeholder="Enter Hours of Support">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Awards</label>
                        <input type="number" class="form-control" name="awards" value="<?= $user_data['awards'] ?>"
                          id="exampleInputPassword1" placeholder="Enter Awards">
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <?php
                        $query = "SELECT * FROM counts WHERE user_id = $user_id";
                        $result = mysqli_query($db, $query);
                        $row_count = mysqli_num_rows($result);
                        
                        if ($row_count == 0) {
                          // Display Add button
                          echo '<button type="submit" name="add-counts" class="btn btn-primary">Add Counts Details</button>';
                        } else {
                          // Display Save Changes button
                          echo '<button type="submit" name="update-counts" class="btn btn-primary">Save Changes</button>';
                        }
                        ?>
                      </div>
                  </form>
                </div>
                <!-- /.card-header -->
                <div class="card card-primary col-lg-12">
                  <div class="card-header">
                    <h3 class="card-title">Manage Personal Info</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Personal Info</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <table class="table">
                        <thead>
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>Label</th>
                            <th>Value</th>
                            <th style="width: 40px">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $q = "SELECT * from personal_info WHERE user_id=$user_id";
                          $r = mysqli_query($db, $q);
                          $c = 1;
                          while ($pi = mysqli_fetch_array($r)) {
                            ?>
                            <tr>
                              <td>
                              <?= $c ?>
                              </td>
                              <td>
                              <?= $pi['label'] ?>
                              </td>
                              <td>
                              <?= $pi['value'] ?>
                              </td>
                              <td>
                                <a href="../include/deletepi.php?id=<?= $pi['id'] ?>">Delete</a>
                              </td>
                            </tr>
                            <?php
                            $c++;
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <form role="form" action="../include/user.php" method="post">
                    <div class="card-body">
                      <div class="form-group col-6">
                        <label for="exampleInputEmail1">Label Name</label>
                        <input type="text" class="form-control" name="label">
                      </div>
                      <div class="form-group col-6">
                        <label for="exampleInputEmail1">Label Value</label>
                        <input type="text" class="form-control" name="value" id="exampleInputEmail1">
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" name="add-pi" class="btn btn-primary">Add Personal Info</button>
                    </div>
                  </form>
                </div>
                <div class="card card-primary col-lg-12">
                  <div class="card-header">
                    <h3 class="card-title">Manage Testimonials</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Testimonials</h3>
                    </div>
                <div class="card-body p-0">
                      <table class="table">
                        <thead>
                          <tr>
                            <th style="width: 10px">#</th>                         
                            <th>Name</th>
                            <th>Position</th>
                            <th>Profile Picture</th>
                            <th>Testimonial</th>
                            <th style="width: 40px">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $q = "SELECT * from testimonials WHERE user_id=$user_id";
                          $r = mysqli_query($db, $q);
                          $c = 1;
                          while ($pi = mysqli_fetch_array($r)) {
                            ?>
                            <tr>
                              <td>
                              <?= $c ?>
                              </td>
                              
                              <td>
                              <?= $pi['test_name'] ?>
                              </td>
                              <td>
                              <?= $pi['position'] ?>
                              </td>
                              <td>
                              <?= $pi['testimonial'] ?>
                              </td>
                              <td>
                              <img src="../images/<?= $pi['profile'] ?>" style="height: 30px; width: 50px;">
                              </td>
                              <td>
                                <a href="../include/deletetestimonial.php?id=<?= $pi['id'] ?>">Delete</a>
                              </td>
                            </tr>
                            <?php
                            $c++;
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                
                  <!-- /.card-header -->
                  <!-- form start -->     
                  </div>       
                  <form role="form" action="../include/user.php" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">User Profile</label>
                        <input type="file" class="form-control" name="profile">
                      </div>                     
                      <div class="form-group">
                        <label for="exampleInputPassword1">Name</label>
                        <input type="text" class="form-control" name="test_name"
                          id="exampleInputPassword1"
                          placeholder="Enter Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Position</label>
                        <input type="text" class="form-control" name="position"
                          id="exampleInputPassword1"
                          placeholder="Enter Position">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">User Testimonial</label><br>
                        <textarea cols="50" name="testimonial"></textarea>
                      </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit" name="add-testimonial" class="btn btn-primary">Add Testimonial</button>
                    </div>
                    
                  </form>
                </div>
                <?php
            } elseif (isset($_GET['resumesetting'])) {
              ?>
               <div class="card card-primary col-lg-12">
                  <div class="card-header">
                    <h3 class="card-title">Manage Resume</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Education & Work</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <table class="table">
                        <thead>
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>Type</th>
                            <th>Title</th>
                            <th>Time</th>
                            <th>Institute/Company</th>
                            <th>About</th>
                            <th style="width: 40px">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $q = "SELECT * from resume WHERE user_id = $user_id";
                          $r = mysqli_query($db, $q);
                          $c = 1;
                          while ($pi = mysqli_fetch_array($r)) {
                            ?>
                            <tr>
                              <td>
                              <?= $c ?>
                              </td>
                              <td>
                              <?= $pi['type'] ?>
                              </td>
                              <td>
                              <?= $pi['title'] ?>
                              </td>
                              <td>
                              <?= $pi['time'] ?>
                              </td>
                              <td>
                              <?= $pi['org'] ?>
                              </td>
                              <td>
                              <?= $pi['about_exp'] ?>
                              </td>
                              <td>
                                <a href="../include/deleteresume.php?id=<?= $pi['id'] ?>">Delete</a>

                              </td>
                            </tr>
                            <?php
                            $c++;
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                <form role="form" action="../include/user.php" method="post">
                    <div class="card-body">
                      <div class="form-group col-6">
                        <label for="exampleInputEmail1">Select Type</label><br>
                        <select name="type" class="form-control">
                          <option value="e">Education</option>
                          <option value="p">Professional</option>
                        </select>
                      </div>
                      <div class="form-group col-6">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" class="form-control" name="title">
                      </div>
                      <div class="form-group col-6">
                        <label for="exampleInputEmail1">Institute/Company</label>
                        <input type="text" class="form-control" name="org" id="exampleInputEmail1">
                      </div>
                      <div class="form-group col-6">
                        <label for="exampleInputEmail1">Time</label>
                        <input type="text" class="form-control" name="time" id="exampleInputEmail1">
                      </div>

                      <div class="form-group col-6">
                        <label for="exampleInputEmail1">About</label>
                        <input type="text" class="form-control" name="about" id="exampleInputEmail1">
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" name="add-resume" class="btn btn-primary">Add Details</button>
                    </div>
                  </form>
                </div>

                <?php
            } elseif (isset($_GET['portfoliosetting'])) {
              ?>
                <div class="card card-primary col-lg-12">
                  <div class="card-header">
                    <h3 class="card-title">Manage Artworks</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Your Projects</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <table class="table">
                        <thead>
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>Project Type</th>
                            <th>Project Image</th>
                            <th>Project Name</th>
                            <th>Project Link</th>
                            <th style="width: 40px">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $q = "SELECT * from portfolio WHERE user_id = $user_id";
                          $r = mysqli_query($db, $q);
                          $c = 1;
                          while ($pi = mysqli_fetch_array($r)) {
                            ?>
                            <tr>
                              <td>
                              <?= $c ?>
                              </td>
                              <td>
                              <?= $pi['project_type'] ?>
                              </td>
                              <td><img src="../images/<?= $pi['project_pic'] ?>" style="width:150px" /></td>
                              <td>
                              <?= $pi['project_name'] ?>
                              </td>
                              <td><a href="<?= $pi['project_link'] ?>" target="_blank">Open Link</a></td>
                              <td>
                                <a href="../include/deleteportfolio.php?id=<?= $pi['id'] ?>">Delete</a>
                              </td>
                            </tr>
                            <?php
                            $c++;
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <form role="form" action="../include/user.php" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="form-group col-6">
                        <label for="exampleInputEmail1">Select Type</label><br>
                        <select name="type" class="form-control">
                          <option value="SOFTWARE">PAINTING</option>
                          <option value="APP">PHOTOGRAPHY</option>
                          <option value="WEBSITE">DRAWING</option>
                          <option value="IDEA">SCULPTURE</option>
                          <option value="PRODUCT">GRAPHIC DESIGN</option>
                          <option value="VIDEO">LINE ART</option>
                          <option value="ANIMATION">MIXED MEDIA</option>
                        </select>
                      </div>
                      <div class="form-group col-6">
                        <label for="exampleInputEmail1">Project Image</label>
                        <input type="file" class="form-control" name="project_pic">
                      </div>
                      <div class="form-group col-6">
                        <label for="exampleInputEmail1">Project Name</label>
                        <input type="text" class="form-control" name="project_name" id="exampleInputEmail1">
                      </div>
                      <div class="form-group col-6">
                        <label for="exampleInputEmail1">Project Link</label>
                        <input type="text" class="form-control" name="project_link" id="exampleInputEmail1">
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" name="add-project" class="btn btn-primary">Add Project</button>
                    </div>
                  </form>
                </div>
                <?php
            } elseif (isset($_GET['servicesetting'])) {
              ?>
                <div class="card card-primary col-lg-12">
                  <div class="card-header">
                    <h3 class="card-title">Manage Services</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Your Service</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <table class="table">
                        <thead>
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>Service Name</th>
                            <th>Service Description</th>
                            <th>Service Link</th>
                            <th style="width: 40px">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $qq = "SELECT * from services WHERE user_id = $user_id";
                          $rr = mysqli_query($db, $qq);
                          $cc = 1;
                          while ($pii = mysqli_fetch_array($rr)) {
                            ?>
                            <tr>
                              <td>
                              <?= $cc ?>
                              </td>                           
                              <td>
                              <?= $pii['service_name'] ?>
                              </td>
                              <td>
                              <?= $pii['service_desc'] ?>
                              </td>
                              <td><a href="<?= $pii['service_link'] ?>" target="_blank">Open Link</a></td>
                              <td>
                                <a href="../include/deleteservice.php?id=<?= $pii['id'] ?>">Delete</a>
                              </td>
                            </tr>
                            <?php
                            $cc++;
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <form role="form" action="../include/user.php" method="post" enctype="multipart/form-data">
                    <div class="card-body">                      
                      <div class="form-group col-6">
                        <label for="exampleInputEmail1">Service Name</label>
                        <input type="text" class="form-control" name="service_name">
                      </div>
                      <div class="form-group col-6">
                        <label for="exampleInputEmail1">Service Description</label>
                        <input type="text" class="form-control" name="service_desc" id="exampleInputEmail1">
                      </div>
                      <div class="form-group col-6">
                        <label for="exampleInputEmail1">Service Link</label>
                        <input type="text" class="form-control" name="service_link" id="exampleInputEmail1">
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" name="add-service" class="btn btn-primary">Add Service</button>
                    </div>
                  </form>
                </div>
                <?php
            } elseif (isset($_GET['contactsetting'])) {
              ?>
                <div class="card card-primary col-lg-12">
                  <div class="card-header">
                    <h3 class="card-title">Manage Contact Details</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Contact Details</h3>
                    </div>
                  <div class="card-body p-0">
                      <table class="table">
                        <thead>
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Mobile Number</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $q = "SELECT * from contact WHERE user_id=$user_id";
                          $r = mysqli_query($db, $q);
                          $c = 1;
                          while ($pi = mysqli_fetch_array($r)) {
                            ?>
                            <tr>
                              <td>
                              <?= $c ?>
                              </td>
                              <td>
                              <?= $pi['address'] ?>
                              </td>
                              <td>
                              <?= $pi['email'] ?>
                              </td>
                              <td>
                              <?= $pi['mobile'] ?>
                              </td>                             
                            </tr>
                            <?php
                            $c++;
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                    </div>
                  <!-- form start -->
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form" action="../include/user.php" method="post">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <input type="text" class="form-control" name="address" 
                          id="exampleInputEmail1" placeholder="Enter address">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Email Id</label>
                        <input type="text" class="form-control" name="email" 
                          id="exampleInputPassword1" placeholder="Enter Email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Mobile No</label>
                        <input type="text" class="form-control" name="mobile" 
                          id="exampleInputPassword1" placeholder="Enter mobile no">
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <?php
                        $query = "SELECT * FROM contact WHERE user_id = $user_id";
                        $result = mysqli_query($db, $query);
                        $row_count = mysqli_num_rows($result);
                        
                        if ($row_count == 0) {
                          // Display Add button
                          echo '<button type="submit" name="add-contact" class="btn btn-primary">Add Contact Details</button>';
                        } else {
                          // Display Save Changes button
                          echo '<button type="submit" name="update-contact" class="btn btn-primary">Save Changes</button>';
                        }
                        ?>
                      </div>
                  </form>
                </div>
                <div class="card card-primary col-lg-12">
                  <div class="card-header">
                    <h3 class="card-title">Manage Social Media Details</h3>
                  </div>
                   <!-- /.card-header -->
                   <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Social Media</h3>
                    </div>
                  <div class="card-body p-0">
                      <table class="table">
                        <thead>
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>Twitter</th>
                            <th>Facebook</th>
                            <th>Instagram</th>
                            <th>Skype</th>
                            <th>Youtube</th>
                            <th>Linkedin</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $q = "SELECT * from social_media WHERE user_id=$user_id";
                          $r = mysqli_query($db, $q);
                          $c = 1;
                          while ($pi = mysqli_fetch_array($r)) {
                            ?>
                            <tr>
                              <td>
                              <?= $c ?>
                              </td>
                              <td>
                              <?= $pi['twitter'] ?>
                              </td>
                              <td>
                              <?= $pi['facebook'] ?>
                              </td>
                              <td>
                              <?= $pi['instagram'] ?>
                              </td> 
                              <td>
                              <?= $pi['skype'] ?>
                              </td>
                              <td>
                              <?= $pi['youtube'] ?>
                              </td>
                              <td>
                              <?= $pi['linkedin'] ?>
                              </td>                             
                            </tr>
                            <?php
                            $c++;
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                    </div>
                  <!-- form start -->
                  <form role="form" action="../include/user.php" method="post">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Twitter</label>
                        <input type="text" class="form-control" name="twitter" 
                          id="exampleInputEmail1" placeholder="Enter username">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Facebook</label>
                        <input type="text" class="form-control" name="facebook" 
                          id="exampleInputPassword1" placeholder="Enter Username">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Instagram</label>
                        <input type="text" class="form-control" name="instagram" 
                          id="exampleInputPassword1" placeholder="Enter username">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Skype</label>
                        <input type="text" class="form-control" name="skype" 
                          id="exampleInputPassword1" placeholder="Enter username">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Linkedin</label>
                        <input type="text" class="form-control" name="linkedin" 
                          id="exampleInputPassword1" placeholder="Enter username">
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <?php
                        $query = "SELECT * FROM social_media WHERE user_id = $user_id";
                        $result = mysqli_query($db, $query);
                        $row_count = mysqli_num_rows($result);
                        
                        if ($row_count == 0) {
                          // Display Add button
                          echo '<button type="submit" name="add-socialmedia" class="btn btn-primary">Add Social Media</button>';
                        } else {
                          // Display Save Changes button
                          echo '<button type="submit" name="update-socialmedia" class="btn btn-primary">Save Changes</button>';
                        }
                        ?>
                      </div>
                  </form>
                </div>
                <?php
            } elseif (isset($_GET['changebackground'])) {
              ?>
                <div class="card card-primary col-lg-12">
                  <div class="card-header">
                    <h3 class="card-title">Manage Site Background</h3>
                  </div>
                   <!-- /.card-header -->
                   <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Account</h3>
                    </div>
                  <div class="card-body p-0">
                      <table class="table">
                        <thead>
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>Background Image</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $q = "SELECT * from site_background WHERE user_id=$user_id";
                          $r = mysqli_query($db, $q);
                          $c = 1;
                          while ($pi = mysqli_fetch_array($r)) {
                            ?>
                            <tr>
                              <td>
                              <?= $c ?>
                              </td>                             
                              <td>
                              <img src="../assets/img/<?= $pi['background_img'] ?>" style="height: 70px; width: 100px;">
                              </td>                                                      
                            </tr>
                            <?php
                            $c++;
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                    </div>
                  <!-- form start -->
                  <img src="../assets/img/<?= $user_data['background_img'] ?>" class="col-6">
                  <form role="form" action="../include/user.php" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Choose Background Image</label>
                        <input type="file" class="form-control" name="background">
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <?php
                        $query = "SELECT * FROM site_background WHERE user_id = $user_id";
                        $result = mysqli_query($db, $query);
                        $row_count = mysqli_num_rows($result);
                        
                        if ($row_count == 0) {
                          // Display Add button
                          echo '<button type="submit" name="add-background" class="btn btn-primary">Add Background</button>';
                        } else {
                          // Display Save Changes button
                          echo '<button type="submit" name="update-background" class="btn btn-primary">Save Changes</button>';
                        }
                        ?>
                      </div>
                  </form>
                </div>
                <?php
            } elseif (isset($_GET['seosetting'])) {
              ?>
                <div class="card card-primary col-lg-12">
                  <div class="card-header">
                    <h3 class="card-title">Manage SEO</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">SEO</h3>
                    </div>
                  <div class="card-body p-0">
                      <table class="table">
                        <thead>
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>Page Title</th>
                            <th>Keywords</th>
                            <th>Description</th>
                            <th>Site Icon</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $q = "SELECT * from seo WHERE user_id=$user_id";
                          $r = mysqli_query($db, $q);
                          $c = 1;
                          while ($pi = mysqli_fetch_array($r)) {
                            ?>
                            <tr>
                              <td>
                              <?= $c ?>
                              </td>
                              <td>
                              <?= $pi['page_title'] ?>
                              </td>
                              <td>
                              <?= $pi['keywords'] ?>
                              </td>
                              <td>
                              <?= $pi['description'] ?>
                              </td> 
                              <td>
                              <img src="../images/<?= $pi['siteicon'] ?>" style="height: 70px; width: 100px;">
                              </td>                         
                            </tr>
                            <?php
                            $c++;
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                    </div>
                  <!-- form start -->
                  <img src="../images/<?= $user_data['siteicon'] ?>" class="col-2">
                  <form role="form" action="../include/user.php" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Siteicon</label>
                        <input type="file" class="form-control" name="siteicon">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Page Title</label>
                        <input type="text" class="form-control" name="page_title" >
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Enter Keywords (separte with ,)</label>
                        <input type="text" class="form-control" name="keyword">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <input type="text" class="form-control" name="description">
                      </div>
                   </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <?php
                        $query = "SELECT * FROM seo WHERE user_id = $user_id";
                        $result = mysqli_query($db, $query);
                        $row_count = mysqli_num_rows($result);
                        
                        if ($row_count == 0) {
                          // Display Add button
                          echo '<button type="submit" name="add-seo" class="btn btn-primary">Add SEO</button>';
                        } else {
                          // Display Save Changes button
                          echo '<button type="submit" name="update-seo" class="btn btn-primary">Save Changes</button>';
                        }
                        ?>
                      </div>
                  </form>
                </div>
                <?php
            } elseif (isset($_GET['accountsetting'])) {
              ?>
                <div class="card card-primary col-lg-12">
                  <div class="card-header">
                    <h3 class="card-title">Manage Account</h3>
                  </div>
                   <!-- /.card-header -->
                   <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Account</h3>
                    </div>
                  <div class="card-body p-0">
                      <table class="table">
                        <thead>
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>Fullname</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>User Profile</th>
                            <th>Code</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $q = "SELECT * from user WHERE user_id=$user_id";
                          $r = mysqli_query($db, $q);
                          $c = 1;
                          while ($pi = mysqli_fetch_array($r)) {
                            ?>
                            <tr>
                              <td>
                              <?= $c ?>
                              </td>
                              <td>
                              <?= $pi['fullname'] ?>
                              </td>
                              <td>
                              <?= $pi['email'] ?>
                              </td>
                              <td>
                              <?= $pi['password'] ?>
                              </td> 
                              <td>
                              <img src="../images/<?= $pi['user_profile'] ?>" style="height: 70px; width: 100px;">
                              </td>    
                              <td>
                              <?= $pi['code'] ?>
                              </td>                      
                            </tr>
                            <?php
                            $c++;
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                    </div>
                  <!-- form start -->
                  <img src="../images/<?= $user_data['user_profile'] ?>" class="col-2">
                  <form role="form" action="../include/user.php" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Profile Pic</label>
                        <input type="file" class="form-control" name="profilepic">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Full Name</label>
                        <input type="text" class="form-control" name="fullname">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" name="email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="text" class="form-control" name="password">
                      </div>
                   </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <?php
                        $query = "SELECT * FROM user WHERE user_id = $user_id";
                        $result = mysqli_query($db, $query);
                        $row_count = mysqli_num_rows($result);
                        
                        if ($row_count == 0) {
                          // Display Add button
                          echo '<button type="submit" name="add-account" class="btn btn-primary">Add User Details</button>';
                        } else {
                          // Display Save Changes button
                          echo '<button type="submit" name="update-account" class="btn btn-primary">Save Changes</button>';
                        }
                        ?>
                      </div>
                  </form>
                </div>
               <?php
            } else {
              ?>
              <div class="card card-primary col-lg-12">
                  <div class="card-header">
                    <h3 class="card-title">Manage Section Control</h3>
                  </div>
                  <!-- form start -->
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Section Control</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <table class="table">
                        <thead>
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>Home Section</th>
                            <th>About Section</th>
                            <th>Resume Section</th>
                            <th>Services Section</th>
                            <th>Portfolio Section</th>
                            <th>contact Section</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $qq = "SELECT * from section_control WHERE user_id = $user_id";
                          $rr = mysqli_query($db, $qq);
                          $cc = 1;
                          while ($pii = mysqli_fetch_array($rr)) {
                            ?>
                            <tr>
                              <td>
                              <?= $cc ?>
                              </td>                           
                              <td>
                              <?= $pii['home_section'] ?>
                              </td>
                              <td>
                              <?= $pii['about_section'] ?>
                              </td>
                              <td>
                              <?= $pii['resume_section'] ?>
                              </td>
                              <td>
                              <?= $pii['services_section'] ?>
                              </td>
                              <td>
                              <?= $pii['portfolio_section'] ?>
                              </td>
                              <td>
                              <?= $pii['contact_section'] ?>
                              </td>
                            </tr>
                            <?php
                            $cc++;
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                <form method="post" action="../include/user.php">
                <div class="card-body">
                  <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" name="home" class="custom-control-input" id="customSwitch1" <?php
                    if ($user_data['home_section']) {
                      echo "checked";
                    }
                    ?>>
                    <label class="custom-control-label" for="customSwitch1">Home Section</label>
                  </div>
                  </div>
                  <div class="card-body">
                  <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" name="about" class="custom-control-input" id="customSwitch2" <?php
                    if ($user_data['about_section']) {
                      echo "checked";
                    }
                    ?>>
                    <label class="custom-control-label" for="customSwitch2">About Section</label>
                  </div>
                  </div>
                  <div class="card-body">
                  <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" name="resume" class="custom-control-input" id="customSwitch3" <?php
                    if ($user_data['resume_section']) {
                      echo "checked";
                    }
                   ?>>
                    <label class="custom-control-label" for="customSwitch3">Resume Section</label>
                  </div>
                  </div>
                  <div class="card-body">
                  <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" name="portfolio" class="custom-control-input" id="customSwitch4" <?php
                    if ($user_data['portfolio_section']) {
                      echo "checked";
                    }
                    ?>>
                    <label class="custom-control-label" for="customSwitch4">Portfolio Section</label>
                  </div>
                  </div>
                  <div class="card-body">
                  <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" name="services" class="custom-control-input" id="customSwitch6" <?php
                    if ($user_data['services_section']) {
                      echo "checked";
                    }
                    ?>>
                    <label class="custom-control-label" for="customSwitch6">Service Section</label>
                  </div>
                  </div>
                  <div class="card-body">
                  <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" name="contact" class="custom-control-input" id="customSwitch5" <?php
                    if ($user_data['contact_section']) {
                      echo "checked";
                    }
                    ?>>
                    <label class="custom-control-label" for="customSwitch5">Contact Section</label>
                  </div>
                  </div>
                  <div class="card-footer">
                        <?php
                        $query = "SELECT * FROM section_control WHERE user_id = $user_id";
                        $result = mysqli_query($db, $query);
                        $row_count = mysqli_num_rows($result);
                        
                        if ($row_count == 0) {
                          // Display Add SEO button
                          echo '<button type="submit" name="add-section" class="btn btn-primary">Add Section</button>';
                        } else {
                          // Display Save Changes button
                          echo '<button type="submit" name="update-section" class="btn btn-primary">Save Changes</button>';
                        }
                        ?>
                      </div>
                </form>
                </div>
                <?php
            }
            ?>
          </div>
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2023 <a href="#">Group 4</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b>1.0
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../user/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="../user/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="../user/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="../user/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="../user/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="../user/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="../user/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="../user/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="../user/plugins/moment/moment.min.js"></script>
  <script src="../user/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="../user/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="../user/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="../user/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- userLTE App -->
  <script src="../user/dist/js/userlte.js"></script>
  <!-- userLTE dashboard demo (This is only for demo purposes) -->
  <script src="../user/dist/js/pages/dashboard.js"></script>
  <!-- userLTE for demo purposes -->
  <script src="../user/dist/js/demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>