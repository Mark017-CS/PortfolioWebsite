<?php
require('../../include/db.php');

// Check if the user is logged in
if (!isset($_SESSION['isAdminLoggedIn'])) {
  echo "<script>window.location.href='adminLogin.php';</script>";
  exit();
}

$admin_id = $_SESSION['admin_id'];


if (isset($_POST['add-about'])) {
  $desc = mysqli_real_escape_string($db, $_POST['about_desc']);
  $imagename = time() . $_FILES['profile']['name'];
  $imgtemp = $_FILES['profile']['tmp_name'];

  if ($imgtemp == '') {
    $q = "SELECT * FROM admin_about WHERE  admin_id=$admin_id";
    $r = mysqli_query($db, $q);
    $d = mysqli_fetch_array($r);
    $imagename = $d['about_img'];
  } else {
    move_uploaded_file($imgtemp, "../../images/$imagename");
  }

  $query = "INSERT INTO admin_about (admin_id, about_desc, about_img) ";
  $query .= "VALUES ($admin_id, '$imagename', '$desc') ";
  $query .= "ON DUPLICATE KEY UPDATE about_img='$imagename', about_desc='$desc'";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../admin.php?aboutsetting=true';</script>";
    exit();
  }
}

if (isset($_POST['add-developer'])) {
  $name = mysqli_real_escape_string($db, $_POST['Name']);
  $desc = mysqli_real_escape_string($db, $_POST['Description']);
  $social = mysqli_real_escape_string($db, $_POST['social']);
  $imagename = time() . $_FILES['profile']['name'];
  $imgtemp = $_FILES['profile']['tmp_name'];

  if ($imgtemp == '') {
    $q = "SELECT * FROM admin_developers WHERE  admin_id=$admin_id";
    $r = mysqli_query($db, $q);
    $d = mysqli_fetch_array($r);
    $imagename = $d['deve_profile'];
  } else {
    move_uploaded_file($imgtemp, "../../images/$imagename");
  }

  $query = "INSERT INTO admin_developers (admin_id, Name, Description, deve_profile, social) ";
  $query .= "VALUES ($admin_id, '$name', '$desc', '$imagename', '$social') ";
  $query .= "ON DUPLICATE KEY UPDATE Name='$name', Description='$desc',  deve_profile='$imagename', social='$social'";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../admin.php?aboutsetting=true';</script>";
    exit();
  }
}


if (isset($_POST['add-service'])) {
  $service_title = $_POST['service_title'];
  $service_des = $_POST['service_des'];
  $service_link = $_POST['service_link'];

  $query = "INSERT INTO admin_services (service_title, service_des, service_link, admin_id) ";
  $query .= "VALUES ('$service_title', '$service_des', '$service_link', $admin_id) ";
  $query .= "ON DUPLICATE KEY UPDATE service_title='$service_title', service_des='$service_des', service_link='$service_link'";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../admin.php?servicesetting=true';</script>";
    exit();
  }
}

if (isset($_POST['add-background'])) {
  $imagename = time() . $_FILES['background']['name'];
  $imgtemp = $_FILES['background']['tmp_name'];

  move_uploaded_file($imgtemp, "../../images/$imagename");

  $query = "INSERT INTO admin_homebg (admin_id, background_img) ";
  $query .= "VALUES ($admin_id, '$imagename') ";
  $query .= "ON DUPLICATE KEY UPDATE background_img='$imagename'";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../admin.php?changebackground=true';</script>";
    exit();
  }
}

if (isset($_POST['add-user'])) {
  $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $imagename = time() . $_FILES['profile']['name'];
  $imgtemp = $_FILES['profile']['tmp_name'];

  if ($imgtemp == '') {
    $imagename = 'default.jpg';
  } else {
    move_uploaded_file($imgtemp, "../../images/$imagename");
  }

  $query = "INSERT INTO user (fullname, email, password, user_profile) VALUES ('$fullname', '$email', '$password', '$imagename')";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../admin.php?accountsetting=true';</script>";
    exit();
  }
}

if (isset($_POST['add-socialmedia'])) {
  $twitter = $_POST['twitter'];
  $facebook = $_POST['facebook'];
  $instagram = $_POST['instagram'];
  $skype = $_POST['skype'];
  $linkedin = $_POST['linkedin'];

  $query = "INSERT INTO admin_social (user_id, twitter, facebook, instagram, skype, linkedin) ";
  $query .= "VALUES ($admin_id, '$twitter', '$facebook', '$instagram', '$skype', '$linkedin') ";
  $query .= "ON DUPLICATE KEY UPDATE twitter='$twitter', facebook='$facebook', instagram='$instagram', skype='$skype', linkedin='$linkedin'";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../admin.php?homesetting=true';</script>";
    exit();
  }
}
if (isset($_POST['update-socialmedia'])) {
  $twitter = $_POST['twitter'];
  $facebook = $_POST['facebook'];
  $instagram = $_POST['instagram'];
  $skype = $_POST['skype'];
  $youtube = $_POST['youtube'];
  $linkedin = $_POST['linkedin'];

  $query = "UPDATE admin_social SET twitter='$twitter', facebook='$facebook', instagram='$instagram', skype='$skype', youtube='$youtube', linkedin='$linkedin' WHERE admin_id = $admin_id";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../admin.php?homesetting=true';</script>";
    exit();
  }
}

if (isset($_POST['update-home'])) {
  $home_title = $_POST['home_title'];
  $home_title2 = $_POST['home_title2'];
  $home_desc = $_POST['home_desc'];

  $query = "UPDATE admin_home SET home_title='$home_title', home_title2='$home_title2', home_desc='$home_desc' WHERE admin_id = $admin_id";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../admin.php?homesetting=true';</script>";
    exit();
  }
}

if (isset($_POST['update-admin'])) {
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $imagename = time() . $_FILES['profile']['name'];
  $imgtemp = $_FILES['profile']['tmp_name'];

  if ($imgtemp == '') {
    $q = "SELECT * FROM admin";
    $r = mysqli_query($db, $q);
    $d = mysqli_fetch_array($r);
    $imagename = $d['admin_prof'];
  } else {
    move_uploaded_file($imgtemp, "../../images/$imagename");
  }

  $query = "UPDATE admin SET name='$name', email='$email', password='$password', admin_prof='$imagename'";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../admin.php?adminsetting=true';</script>";
    exit();
  }
}


if (isset($_POST['update-user'])) {
  $userId = mysqli_real_escape_string($db, $_POST['user_id']);
  $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $imagename = time() . $_FILES['profile']['name'];
  $imgtemp = $_FILES['profile']['tmp_name'];

  if ($imgtemp == '') {
    $q = "SELECT * FROM user";
    $r = mysqli_query($db, $q);
    $d = mysqli_fetch_array($r);
    $imagename = $d['user_profile'];
  } else {
    move_uploaded_file($imgtemp, "../../images/$imagename");
  }

  $query = "UPDATE user SET fullname='$fullname', email='$email', password='$password', user_profile='$imagename' WHERE user_id='$userId'";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../admin.php?accountsetting=true';</script>";
    exit();
  }
}


if (isset($_POST['update-about'])) {
  $desc = mysqli_real_escape_string($db, $_POST['about_desc']);
  $mission = mysqli_real_escape_string($db, $_POST['mission']);
  $vision = mysqli_real_escape_string($db, $_POST['vision']);
  $imagename = time() . $_FILES['profile']['name'];
  $imgtemp = $_FILES['profile']['tmp_name'];

  if ($imgtemp == '') {
    $q = "SELECT * FROM admin_about WHERE admin_id=$admin_id";
    $r = mysqli_query($db, $q);
    $d = mysqli_fetch_array($r);
    $imagename = $d['profile_pic'];
  } else {
    move_uploaded_file($imgtemp, "../../images/$imagename");
  }

  $query = "UPDATE admin_about SET about_img='$imagename',mission='$mission', vision='$vision',  about_desc='$desc' WHERE  admin_id = $admin_id";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../admin.php?aboutsetting=true';</script>";
    exit();
  }
}

if (isset($_POST['update-developer'])) {
  $Id = mysqli_real_escape_string($db, $_POST['id']);
  $name = mysqli_real_escape_string($db, $_POST['Name']);
  $desc = mysqli_real_escape_string($db, $_POST['Description']);
  $social = mysqli_real_escape_string($db, $_POST['social']);
  $imagename = time() . $_FILES['profile']['name'];
  $imgtemp = $_FILES['profile']['tmp_name'];

  if ($imgtemp == '') {
    $q = "SELECT * FROM admin_developers";
    $r = mysqli_query($db, $q);
    $d = mysqli_fetch_array($r);
    $imagename = $d['deve_profile'];
  } else {
    move_uploaded_file($imgtemp, "../../images/$imagename");
  }

  $query = "UPDATE admin_developers SET Name='$name', Description='$desc', deve_profile='$imagename', social='$social' WHERE id='$Id'";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../admin.php?aboutsetting=true';</script>";
    exit();
  }
}


if (isset($_POST['update-background'])) {
  $imagename = time() . $_FILES['background']['name'];
  $imgtemp = $_FILES['background']['tmp_name'];

  move_uploaded_file($imgtemp, "../../images/$imagename");

  $query = "UPDATE admin_homebg SET background_img='$imagename' WHERE admin_id = $admin_id";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../admin.php?changebackground=true';</script>";
    exit();
  }
}