<?php
require('db.php');

// Check if the user is logged in
if (!isset($_SESSION['isUserLoggedIn'])) {
  echo "<script>window.location.href='login.php';</script>";
  exit();
}

$adminId = $_SESSION['admin_id'];

if (isset($_POST['update-section'])) {
  $home = $_POST['home'] ?? 0;
  $about = $_POST['about'] ?? 0;
  $portfolio = $_POST['portfolio'] ?? 0;
  $resume = $_POST['resume'] ?? 0;
  $contact = $_POST['contact'] ?? 0;
  $services = $_POST['services'] ?? 0;

  $query = "UPDATE section_control SET ";
  $query .= "home_section='$home',";
  $query .= "about_section='$about',";
  $query .= "resume_section='$resume',";
  $query .= "portfolio_section='$portfolio',";
  $query .= "services_section='$services',";
  $query .= "contact_section='$contact' WHERE admin_id=$adminId";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../Home/account.php';</script>";
    exit();
  }
}

if (isset($_POST['update-home'])) {
  $title = mysqli_real_escape_string($db, $_POST['title']);
  $subtitle = mysqli_real_escape_string($db, $_POST['subtitle']);
  $showicons = $_POST['showicons'] ?? 0;

  $query = "UPDATE home SET ";
  $query .= "title='$title',";
  $query .= "subtitle='$subtitle',";
  $query .= "showicons='$showicons' WHERE admin_id=$adminId";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../Home/account.php?homesetting=true';</script>";
    exit();
  }
}

if (isset($_POST['update-about'])) {
  $title = mysqli_real_escape_string($db, $_POST['abouttitle']);
  $subtitle = mysqli_real_escape_string($db, $_POST['aboutsubtitle']);
  $desc = mysqli_real_escape_string($db, $_POST['aboutdesc']);
  $imagename = time() . $_FILES['profile']['name'];
  $imgtemp = $_FILES['profile']['tmp_name'];

  if ($imgtemp == '') {
    $q = "SELECT * FROM about WHERE admin_id=$adminId";
    $r = mysqli_query($db, $q);
    $d = mysqli_fetch_array($r);
    $imagename = $d['profile_pic'];
  }

  move_uploaded_file($imgtemp, "../images/$imagename");

  $query = "UPDATE about SET ";
  $query .= "about_title='$title',";
  $query .= "about_subtitle='$subtitle',";
  $query .= "profile_pic='$imagename',";
  $query .= "about_desc='$desc' WHERE admin_id=$adminId";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../Home/account.php?aboutsetting=true';</script>";
    exit();
  }
}

if (isset($_POST['add-skill'])) {
  $skillname = $_POST['skillname'];
  $skilllevel = $_POST['skilllevel'];
  $query = "INSERT INTO skills (skill_name, skill_level, admin_id) VALUES ('$skillname', '$skilllevel', $adminId)";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../Home/account.php?aboutsetting=true';</script>";
    exit();
  }
}

if (isset($_POST['add-pi'])) {
  $label = $_POST['label'];
  $value = $_POST['value'];
  $query = "INSERT INTO personal_info (label, value, admin_id) VALUES ('$label', '$value', $adminId)";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../Home/account.php?aboutsetting=true';</script>";
    exit();
  }
}

if (isset($_POST['add-project'])) {
  $type = $_POST['type'];
  $project_name = $_POST['project_name'];
  $project_link = $_POST['project_link'];
  $project_image = time() . $_FILES['project_pic']['name'];

  move_uploaded_file($_FILES['project_pic']['tmp_name'], "../images/$project_image");

  $query = "INSERT INTO portfolio (project_type, project_pic, project_name, project_link, admin_id) VALUES ('$type', '$project_image', '$project_name', '$project_link', $adminId)";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../Home/account.php?portfoliosetting=true';</script>";
    exit();
  }
}

if (isset($_POST['update-contact'])) {
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];

  $query = "UPDATE contact SET ";
  $query .= "address='$address',";
  $query .= "email='$email',";
  $query .= "mobile='$mobile' WHERE admin_id=$adminId";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../Home/account.php?contactsetting=true';</script>";
    exit();
  }
}

if (isset($_POST['update-socialmedia'])) {
  $twitter = $_POST['twitter'];
  $facebook = $_POST['facebook'];
  $instagram = $_POST['instagram'];
  $skype = $_POST['skype'];
  $linkedin = $_POST['linkedin'];

  $query = "UPDATE social_media SET ";
  $query .= "twitter='$twitter',";
  $query .= "facebook='$facebook',";
  $query .= "instagram='$instagram',";
  $query .= "skype='$skype',";
  $query .= "linkedin='$linkedin' WHERE admin_id=$adminId";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../Home/account.php?contactsetting=true';</script>";
    exit();
  }
}

if (isset($_POST['update-background'])) {
  $imagename = time() . $_FILES['background']['name'];
  $imgtemp = $_FILES['background']['tmp_name'];

  move_uploaded_file($imgtemp, "../assets/img/$imagename");

  $query = "UPDATE site_background SET ";
  $query .= "background_img='$imagename' WHERE admin_id=$adminId";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../Home/account.php?changebackground=true';</script>";
    exit();
  }
}

if (isset($_POST['update-seo'])) {
  $title = mysqli_real_escape_string($db, $_POST['page_title']);
  $keyword = mysqli_real_escape_string($db, $_POST['keyword']);
  $desc = mysqli_real_escape_string($db, $_POST['description']);
  $imagename = time() . $_FILES['siteicon']['name'];
  $imgtemp = $_FILES['siteicon']['tmp_name'];

  if ($imgtemp == '') {
    $q = "SELECT * FROM seo WHERE admin_id=$adminId";
    $r = mysqli_query($db, $q);
    $d = mysqli_fetch_array($r);
    $imagename = $d['siteicon'];
  }

  move_uploaded_file($imgtemp, "../images/$imagename");

  $query = "UPDATE seo SET ";
  $query .= "page_title='$title',";
  $query .= "keywords='$keyword',";
  $query .= "description='$desc',";
  $query .= "siteicon='$imagename' WHERE admin_id=$adminId";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../Home/account.php?seosetting=true';</script>";
    exit();
  }
}

if (isset($_POST['update-account'])) {
  $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
  $email = mysqli_real_escape_string($db, $_POST['Email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $imagename = time() . $_FILES['profilepic']['name'];
  $imgtemp = $_FILES['profilepic']['tmp_name'];

  if ($imgtemp == '') {
    $q = "SELECT * FROM admin WHERE admin_id=$adminId";
    $r = mysqli_query($db, $q);
    $d = mysqli_fetch_array($r);
    $imagename = $d['admin_profile'];
  }

  move_uploaded_file($imgtemp, "../images/$imagename");

  $query = "UPDATE admin SET ";
  $query .= "fullname='$fullname',";
  $query .= "email='$email',";
  $query .= "password='$password',";
  $query .= "admin_profile='$imagename' WHERE admin_id=$adminId";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../Home/account.php?accountsetting=true';</script>";
    exit();
  }
}
?>
