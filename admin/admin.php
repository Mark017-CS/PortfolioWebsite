<?php
require('../include/db.php');

if (!isset($_SESSION['isAdminLoggedIn'])) {
  echo "<script>window.location.href='adminLogin.php';</script>";
  exit;
}

$admin_id = $_SESSION['admin_id']; // Assuming the admin_id is stored in the session

$query = "SELECT * FROM admin 
          LEFT JOIN admin_about ON admin.admin_id = admin_about.admin_id 
          LEFT JOIN admin_homebg ON admin.admin_id = admin_homebg.admin_id 
          LEFT JOIN admin_services ON admin.admin_id = admin_services.admin_id 
          LEFT JOIN admin_home ON admin.admin_id = admin_home.admin_id 
          LEFT JOIN admin_social ON admin.admin_id = admin_social.admin_id 
          WHERE admin.admin_id = $admin_id";

$run = mysqli_query($db, $query);
if (!$run) {
  echo "Error executing query: " . mysqli_error($db);
  exit;
}

$admin_data = mysqli_fetch_array($run);
if (!$admin_data) {
  echo "Error fetching admin data: " . mysqli_error($db);
  exit;
}
?>



<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Panel | Dashboard</title>
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
          <a class="nav-link" href="../components/logout.php">
            Logout
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="admin.php?changebackground=true" class="brand-link">
        <img src="../images/logo.png" alt="userLTE Logo" class="brand-image">
        <span class="brand-text font-weight-bold">ADMIN PANEL</span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../images/<?= $admin_data['admin_prof'] ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">
              <?= $admin_data['name'] ?>
            </a>
          </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item menu-open">
              <a href="admin.php?homesetting=true"
                class="nav-link <?php echo isset($_GET['homesetting']) ? 'active' : ''; ?>">
                <i class="fa fa-home" aria-hidden="true"></i>
                <p>
                  Home Section
                </p>
              </a>
            </li>
            <li class="nav-item menu-open">
              <a href="admin.php?changebackground=true"
                class="nav-link <?php echo isset($_GET['changebackground']) ? 'active' : ''; ?>">
                <i class="fa fa-cog" aria-hidden="true"></i>
                <p>
                  Change Background
                </p>
              </a>
            </li>
            <li class="nav-item menu-open">
              <a href="admin.php?aboutsetting=true"
                class="nav-link <?php echo isset($_GET['aboutsetting']) ? 'active' : ''; ?>">
                <i class="fa fa-question-circle" aria-hidden="true"></i>
                <p>
                  About Section
                </p>
              </a>
            </li>
            <li class="nav-item menu-open">
              <a href="admin.php?servicesetting=true"
                class="nav-link <?php echo isset($_GET['servicesetting']) ? 'active' : ''; ?>">
                <i class="fa fa-briefcase" aria-hidden="true"></i>
                <p>
                  Services Section
                </p>
              </a>
            </li>
            <li class="nav-item menu-open">
              <a href="admin.php?accountsetting=true"
                class="nav-link <?php echo isset($_GET['accountsetting']) ? 'active' : ''; ?>">
                <i class="fa fa-users" aria-hidden="true"></i>
                <p>
                  Users Section
                </p>
              </a>
            </li>
            <li class="nav-item menu-open">
              <a href="admin.php?adminsetting=true"
                class="nav-link <?php echo isset($_GET['adminsetting']) ? 'active' : ''; ?>">
                <i class="fa fa-user-secret" aria-hidden="true"></i>
                <p>
                  Admin Section
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
      <br>
      <section class="content">
        <div class="container-fluid">
          <!-- Main row -->
          <div class="row">
            <?php
            if (isset($_GET['changebackground'])) {
              ?>
              <div class="card card-primary col-lg-12">
                <div class="card-header">
                  <h3 class="card-title">Manage Home Background</h3>
                </div>
                <!-- /.card-header -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Background</h3>
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
                        $q = "SELECT * from admin_homebg WHERE admin_id=$admin_id";
                        $r = mysqli_query($db, $q);
                        $c = 1;
                        while ($pi = mysqli_fetch_array($r)) {
                          ?>
                          <tr>
                            <td>
                              <?= $c ?>
                            </td>
                            <td>
                              <img src="../images/<?= $pi['background_img'] ?>" style="height: 170px; width: 200px;">
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
                <form role="form" action="include/adminConfig.php" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Choose Background Image</label>
                      <input type="file" class="form-control" name="background">
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <?php
                    $query = "SELECT * FROM admin_homebg WHERE admin_id = $admin_id";
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
            } elseif (isset($_GET['homesetting'])) {
              ?>
              <div class="card card-primary col-lg-12">
                <div class="card-header">
                  <h3 class="card-title">Manage Home Details</h3>
                </div>
                <!-- /.card-header -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Home</h3>
                  </div>
                  <div class="card-body p-0">
                    <table class="table">
                      <thead>
                        <tr>
                          <th style="width: 10px">#</th>
                          <th>Home Title 1</th>
                          <th>Home Title 2</th>
                          <th>Home Description</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $q = "SELECT * from admin_home WHERE admin_id=$admin_id";
                        $r = mysqli_query($db, $q);
                        $c = 1;
                        while ($pi = mysqli_fetch_array($r)) {
                          ?>
                          <tr>
                            <td>
                              <?= $c ?>
                            </td>
                            <td>
                              <?= $pi['home_title'] ?>
                            </td>
                            <td>
                              <?= $pi['home_title2'] ?>
                            </td>
                            <td>
                              <?= $pi['home_desc'] ?>
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
                <form role="form" action="include/adminConfig.php" method="post">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Title 1</label>
                      <input type="text" class="form-control" name="home_title" id="exampleInputEmail1"
                        placeholder="Enter Title 1">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Title 2</label>
                      <input type="text" class="form-control" name="home_title2" id="exampleInputPassword1"
                        placeholder="Enter Title 2">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Description</label>
                      <input type="text" class="form-control" name="home_desc" id="exampleInputPassword1"
                        placeholder="Enter Description">
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" name="update-home" class="btn btn-primary">Save Changes</button>';
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
                        $q = "SELECT * from admin_social WHERE admin_id=$admin_id";
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
                <form role="form" action="include/adminConfig.php" method="post">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Twitter</label>
                      <input type="text" class="form-control" name="twitter" id="exampleInputEmail1"
                        placeholder="Enter username">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Facebook</label>
                      <input type="text" class="form-control" name="facebook" id="exampleInputPassword1"
                        placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Instagram</label>
                      <input type="text" class="form-control" name="instagram" id="exampleInputPassword1"
                        placeholder="Enter username">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Skype</label>
                      <input type="text" class="form-control" name="skype" id="exampleInputPassword1"
                        placeholder="Enter username">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Youtube</label>
                      <input type="text" class="form-control" name="youtube" id="exampleInputPassword1"
                        placeholder="Enter username">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Linkedin</label>
                      <input type="text" class="form-control" name="linkedin" id="exampleInputPassword1"
                        placeholder="Enter username">
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <?php
                    $query = "SELECT * FROM admin_social WHERE admin_id = $admin_id";
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
                            <th>About Description</th>
                            <th>MIssion</th>
                            <th>Vision</th>
                            <th>About Image</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $q = "SELECT * from admin_about WHERE admin_id=$admin_id";
                          $r = mysqli_query($db, $q);
                          $c = 1;
                          while ($about = mysqli_fetch_array($r)) {
                            ?>
                            <tr>
                              <td>
                              <?= $c ?>
                              </td>
                              <td>
                              <?= $about['about_desc'] ?>
                              </td>
                              <td>
                              <?= $about['mission'] ?>
                              </td>
                              <td>
                              <?= $about['vision'] ?>
                              </td>
                              <td>
                                <img src="../images/<?= $about['about_img'] ?>" style="height: 70px; width: 100px;">
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

                  <form role="form" action="include/adminConfig.php" method="post" enctype="multipart/form-data">
                    <!-- <img src="../images/<?= $user_data['profile_pic'] ?>" class="col-2"> -->
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">About Image</label>
                        <input type="file" class="form-control" name="profile">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">About Description</label><br>
                        <textarea cols="50" name="about_desc"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Mision</label><br>
                        <textarea cols="50" name="mission"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Vision</label><br>
                        <textarea cols="50" name="vision"></textarea>
                      </div>
                    </div>
                    <div class="card-footer">
                      <?php
                      $query = "SELECT * FROM admin_about WHERE admin_id = $admin_id";
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
                    <h3 class="card-title">Manage Developers</h3>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Developers</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <table class="table">
                        <thead>
                          <tr>
                            <th style="width: 10px">Developer's ID</th>
                            <th>Developer's Name</th>
                            <th>Developer's Description</th>
                            <th>Profile</th>
                            <th>Faccebook Username</th>
                            <th style="width: 40px">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $q = "SELECT * from admin_developers WHERE admin_id=$admin_id";
                          $r = mysqli_query($db, $q);
                          while ($developers = mysqli_fetch_array($r)) {
                            ?>
                            <tr>
                              <td>
                              <?= $developers['id'] ?>
                              </td>
                              <td>
                              <?= $developers['Name'] ?>
                              </td>
                              <td>
                              <?= $developers['Description'] ?>
                              </td>
                              <td>
                                <img src="../images/<?= $developers['deve_profile'] ?>" style="height: 70px; width: 100px;">
                              </td>
                              <td>
                              <?= $developers['social'] ?>
                              </td>
                              <td>
                                <a href="include/deletedeveloper.php?id=<?= $developers['id'] ?>">Delete</a>
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
                </div>
                <!-- /.card-body -->
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card card-primary col-lg-12">
                  <div class="card-header">
                    <h3 class="card-title">Add a Developer</h3>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Developers</h3>
                    </div>
                    <form role="form" action="include/adminConfig.php" method="post" enctype="multipart/form-data">
                      <!-- <img src="../images/<?= $user_data['profile_pic'] ?>" class="col-2"> -->
                      <div class="card-body">
                        <div class="form-group col-6">
                          <label for="exampleInputEmail1">Name</label>
                          <input type="text" class="form-control" name="Name">
                        </div>
                        <div class="form-group col-6">
                          <label for="exampleInputEmail1">Description</label><br>
                          <textarea cols="50" name="Description"></textarea>
                        </div>
                        <div class="form-group col-6">
                          <label for="exampleInputEmail1">Developer's Image</label>
                          <input type="file" class="form-control" name="profile">
                        </div>
                        <div class="form-group col-6">
                          <label for="exampleInputPassword1">Facebook Username</label>
                          <input type="text" class="form-control" name="social">
                        </div>
                      </div>
                      <div class="card-footer">
                        <button type="submit" name="add-developer" class="btn btn-primary">Add Developer</button>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="card card-primary col-lg-12">
                  <div class="card-header">
                    <h3 class="card-title">Update Developer Information</h3>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Developers</h3>
                    </div>
                    <form role="form" action="include/adminConfig.php" method="post" enctype="multipart/form-data">
                      <div class="card-body">
                        <div class="form-group col-6">
                          <label for="exampleInputEmail1">Developer's ID</label>
                          <input type="text" class="form-control" name="id">
                        </div>
                        <div class="form-group col-6">
                          <label for="exampleInputEmail1">Name</label>
                          <input type="text" class="form-control" name="Name">
                        </div>
                        <div class="form-group col-6">
                          <label for="exampleInputEmail1">Description</label><br>
                          <textarea cols="50" name="Description"></textarea>
                        </div>
                        <div class="form-group col-6">
                          <label for="exampleInputEmail1">Developer's Image</label>
                          <input type="file" class="form-control" name="profile">
                        </div>
                        <div class="form-group col-6">
                          <label for="exampleInputPassword1">Facebook Username</label>
                          <input type="text" class="form-control" name="social">
                        </div>
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer">
                        <button type="submit" name="update-developer" class="btn btn-primary">Update Developer</button>
                      </div>
                    </form>
                  </div>
                </div>
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
                    <h3 class="card-title">Services</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <table class="table">
                      <thead>
                        <tr>
                          <th style="width: 10px">#</th>
                          <th>Service Title</th>
                          <th>Service Description</th>
                          <th>Service Link</th>
                          <th style="width: 40px">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $qq = "SELECT * from admin_services WHERE admin_id = $admin_id";
                        $rr = mysqli_query($db, $qq);
                        $cc = 1;
                        while ($pii = mysqli_fetch_array($rr)) {
                          ?>
                          <tr>
                            <td>
                            <?= $cc ?>
                            </td>
                            <td>
                            <?= $pii['service_title'] ?>
                            </td>
                            <td>
                            <?= $pii['service_des'] ?>
                            </td>
                            <td><a href="<?= $pii['service_link'] ?>" target="_blank">Open Link</a></td>
                            <td>
                              <a href="include/deleteservice.php?id=<?= $pii['id'] ?>">Delete</a>
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
                <form role="form" action="include/adminConfig.php" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group col-6">
                      <label for="exampleInputEmail1">Service Title</label>
                      <input type="text" class="form-control" name="service_title">
                    </div>
                    <div class="form-group col-6">
                      <label for="exampleInputEmail1">Service Description</label>
                      <input type="text" class="form-control" name="service_des" id="exampleInputEmail1">
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
            } elseif (isset($_GET['accountsetting'])) {
              ?>
              <div class="card card-primary col-lg-12">
                <div class="card-header">
                  <h3 class="card-title">Manage User Accounts</h3>
                </div>
                <!-- /.card-header -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">User Accounts</h3>
                  </div>
                  <div class="card-body p-0">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>User ID</th>
                          <th>Fullname</th>
                          <th>Email</th>
                          <th>Password</th>
                          <th>User Profile</th>
                          <th>Code</th>
                          <th style="width: 40px">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $q = "SELECT * from user";
                        $r = mysqli_query($db, $q);
                        $c = 1;
                        while ($pi = mysqli_fetch_array($r)) {
                          ?>
                          <tr>
                            <td>
                            <?= $pi['user_id'] ?>
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
                              <img src="../images/<?= $pi['user_profile'] ?>" style="height: 150px; width: 130px;">
                            </td>
                            <td>
                            <?= $pi['code'] ?>
                            </td>
                            <td>
                              <a href="include/deleteuser.php?user_id=<?= $pi['user_id'] ?>">Delete</a>
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
              </div>

              <div class="card card-primary col-lg-12">
                <div class="card-header">
                  <h3 class="card-title">Update User</h3>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">User Information</h3>
                  </div>
                  <form role="form" action="include/adminConfig.php" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="form-group col-6">
                        <label for="exampleInputEmail1">User ID</label>
                        <input type="text" class="form-control" name="user_id">
                      </div>
                      <div class="form-group col-6">
                        <label for="exampleInputEmail1">Fullname</label>
                        <input type="text" class="form-control" name="fullname" id="exampleInputEmail1">
                      </div>
                      <div class="form-group col-6">
                        <label for="exampleInputEmail1">Profile</label>
                        <input type="file" class="form-control" name="profile" id="exampleInputEmail1">
                      </div>
                      <div class="form-group col-6">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control" name="email" id="exampleInputEmail1">
                      </div>
                      <div class="form-group col-6">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="text" class="form-control" name="password" id="exampleInputEmail1">
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" name="update-user" class="btn btn-primary">Update User</button>
                    </div>
                  </form>
                </div>
                <div class="card-header">
                  <h3 class="card-title">Add User</h3>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">User Information</h3>
                  </div>
                  <form role="form" action="include/adminConfig.php" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                      <!-- User ID field is removed for adding a new user -->
                      <div class="form-group col-6">
                        <label for="exampleInputEmail1">Fullname</label>
                        <input type="text" class="form-control" name="fullname" id="exampleInputEmail1">
                      </div>
                      <div class="form-group col-6">
                        <label for="exampleInputEmail1">Profile</label>
                        <input type="file" class="form-control" name="profile" id="exampleInputEmail1">
                      </div>
                      <div class="form-group col-6">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control" name="email" id="exampleInputEmail1">
                      </div>
                      <div class="form-group col-6">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="text" class="form-control" name="password" id="exampleInputEmail1">
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" name="add-user" class="btn btn-primary">Add User</button>
                    </div>
                  </form>
                </div>
              </div>

              <!-- /.row (main row) -->
          </section>
          <?php
            } elseif (isset($_GET['adminsetting'])) {
              ?>
          <div class="card card-primary col-lg-12">
            <div class="card-header">
              <h3 class="card-title">Manage Admin Information</h3>
            </div>
            <!-- /.card-header -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Admin Account</h3>
              </div>
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Admin ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Password</th>
                      <th>Admin Profile</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $q = "SELECT * from admin";
                    $r = mysqli_query($db, $q);
                    $c = 1;
                    while ($pi = mysqli_fetch_array($r)) {
                      ?>
                      <tr>
                        <td>
                        <?= $pi['admin_id'] ?>
                        </td>
                        <td>
                        <?= $pi['name'] ?>
                        </td>
                        <td>
                        <?= $pi['email'] ?>
                        </td>
                        <td>
                        <?= $pi['password'] ?>
                        </td>
                        <td>
                          <img src="../images/<?= $pi['admin_prof'] ?>" style="height: 150px; width: 130px;">
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
          </div>

          <div class="card card-primary col-lg-12">
            <div class="card-header">
              <h3 class="card-title">Update Admin</h3>
            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Admin Information</h3>
              </div>
              <form role="form" action="include/adminConfig.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group col-6">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1">
                  </div>
                  <div class="form-group col-6">
                    <label for="exampleInputEmail1">Profile</label>
                    <input type="file" class="form-control" name="profile" id="exampleInputEmail1">
                  </div>
                  <div class="form-group col-6">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" class="form-control" name="email" id="exampleInputEmail1">
                  </div>
                  <div class="form-group col-6">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="text" class="form-control" name="password" id="exampleInputEmail1">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="update-admin" class="btn btn-primary">Save Changes</button>
                </div>
              </form>

            </div>
          </div>
          </section>
        <?php } ?>

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