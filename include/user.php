

<?php
require('db.php');

// Check if the user is logged in
if (!isset($_SESSION['isUserLoggedIn'])) {
  echo "<script>window.location.href='login.php';</script>";
  exit();
}

$userId = $_SESSION['user_id'];

if (isset($_POST['add-section'])) {
  $home = $_POST['home'] ?? 0;
  $about = $_POST['about'] ?? 0;
  $portfolio = $_POST['portfolio'] ?? 0;
  $resume = $_POST['resume'] ?? 0;
  $contact = $_POST['contact'] ?? 0;
  $services = $_POST['services'] ?? 0;

  $query = "INSERT INTO section_control (user_id, home_section, about_section, resume_section, portfolio_section, services_section, contact_section) ";
  $query .= "VALUES ($userId, '$home', '$about', '$resume', '$portfolio', '$services', '$contact') ";
  $query .= "ON DUPLICATE KEY UPDATE home_section='$home', about_section='$about', resume_section='$resume', portfolio_section='$portfolio', services_section='$services', contact_section='$contact'";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../Home/account.php';</script>";
    exit();
  }
}

if (isset($_POST['add-home'])) {
  $title = $_POST['title'];
  $subtitle = $_POST['subtitle'];
  $showicons = $_POST['showicons'] ?? 0;

  $query = "INSERT INTO home (user_id, title, subtitle, showicons) ";
  $query .= "VALUES (?, ?, ?, ?) ";
  $query .= "ON DUPLICATE KEY UPDATE title = VALUES(title), subtitle = VALUES(subtitle), showicons = VALUES(showicons)";

  $statement = mysqli_prepare($db, $query);
  mysqli_stmt_bind_param($statement, "isss", $userId, $title, $subtitle, $showicons);

  $run = mysqli_stmt_execute($statement);
  if ($run) {
    echo "<script>window.location.href='../Home/account.php?homesetting=true';</script>";
    exit();
  }
}


if (isset($_POST['add-about'])) {
  $title = mysqli_real_escape_string($db, $_POST['abouttitle']);
  $subtitle = mysqli_real_escape_string($db, $_POST['aboutsubtitle']);
  $desc = mysqli_real_escape_string($db, $_POST['aboutdesc']);
  $imagename = time() . $_FILES['profile']['name'];
  $imgtemp = $_FILES['profile']['tmp_name'];

  if ($imgtemp == '') {
    $q = "SELECT * FROM about WHERE user_id=$userId";
    $r = mysqli_query($db, $q);
    $d = mysqli_fetch_array($r);
    $imagename = $d['profile_pic'];
  } else {
    move_uploaded_file($imgtemp, "../images/$imagename");
  }

  $query = "INSERT INTO about (user_id, about_title, about_subtitle, profile_pic, about_desc) ";
  $query .= "VALUES ($userId, '$title', '$subtitle', '$imagename', '$desc') ";
  $query .= "ON DUPLICATE KEY UPDATE about_title='$title', about_subtitle='$subtitle', profile_pic='$imagename', about_desc='$desc'";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../Home/account.php?aboutsetting=true';</script>";
    exit();
  }
}

if (isset($_POST['add-testimonial'])) {
  $testimonial = mysqli_real_escape_string($db, $_POST['testimonial']);
  $test_name = mysqli_real_escape_string($db, $_POST['test_name']);
  $position = mysqli_real_escape_string($db, $_POST['position']);
  $imagename = time() . $_FILES['profile']['name'];
  $imgtemp = $_FILES['profile']['tmp_name'];

  if ($imgtemp == '') {
    $q = "SELECT * FROM testimonials WHERE user_id=$userId";
    $r = mysqli_query($db, $q);
    $d = mysqli_fetch_array($r);
    $imagename = $d['profile'];
  } else {
    move_uploaded_file($imgtemp, "../images/$imagename");
  }

  $query = "INSERT INTO testimonials (user_id, testimonial, test_name, position, profile) ";
  $query .= "VALUES ($userId, '$testimonial', '$test_name', '$position', '$imagename') ";
  $query .= "ON DUPLICATE KEY UPDATE testimonial='$testimonial', test_name='$test_name', position='$position', profile='$imagename'";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../Home/account.php?aboutsetting=true';</script>";
    exit();
  }
}


if (isset($_POST['add-interest'])) {
  $inter_name = $_POST['inter_name'];
  $query = "INSERT INTO interests (inter_name, user_id) VALUES ('$inter_name',  $userId)";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../Home/account.php?aboutsetting=true';</script>";
    exit();
  }
}

if (isset($_POST['add-skill'])) {
  $skillname = $_POST['skillname'];
  $skilllevel = $_POST['skilllevel'];
  $query = "INSERT INTO skills (skill_name, skill_level, user_id) VALUES ('$skillname', '$skilllevel', $userId)";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../Home/account.php?aboutsetting=true';</script>";
    exit();
  }
}

if (isset($_POST['add-pi'])) {
  $label = $_POST['label'];
  $value = $_POST['value'];
  $query = "INSERT INTO personal_info (label, value, user_id) VALUES ('$label', '$value', $userId)";

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

  $query = "INSERT INTO portfolio (project_type, project_pic, project_name, project_link, user_id) ";
  $query .= "VALUES ('$type', '$project_image', '$project_name', '$project_link', $userId) ";
  $query .= "ON DUPLICATE KEY UPDATE project_type='$type', project_pic='$project_image', project_name='$project_name', project_link='$project_link'";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../Home/account.php?portfoliosetting=true';</script>";
    exit();
  }
}

if (isset($_POST['add-service'])) {
  $service_name = $_POST['service_name'];
  $service_desc = $_POST['service_desc'];
  $service_link = $_POST['service_link'];

  $query = "INSERT INTO services (service_name, service_desc, service_link, user_id) ";
  $query .= "VALUES ('$service_name', '$service_desc', '$service_link', $userId) ";
  $query .= "ON DUPLICATE KEY UPDATE service_name='$service_name', service_desc='$service_desc', service_link='$service_link'";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../Home/account.php?servicesetting=true';</script>";
    exit();
  }
}

if (isset($_POST['add-counts'])) {
  $happy_clients = $_POST['happy_clients'];
  $projects = $_POST['projects'];
  $hours = $_POST['hours'];
  $awards = $_POST['awards'];

  $query = "INSERT INTO counts (user_id, happy_clients, projects, hours, awards) ";
  $query .= "VALUES ($userId, '$happy_clients', '$projects', '$hours', '$awards') ";
  $query .= "ON DUPLICATE KEY UPDATE happy_clients='$happy_clients', projects='$projects', hours='$hours', awards='$awards'";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../Home/account.php?aboutsetting=true';</script>";
    exit();
  }
}

if (isset($_POST['add-contact'])) {
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];

  $query = "INSERT INTO contact (user_id, address, email, mobile) ";
  $query .= "VALUES ($userId, '$address', '$email', '$mobile') ";
  $query .= "ON DUPLICATE KEY UPDATE address='$address', email='$email', mobile='$mobile'";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../Home/account.php?contactsetting=true';</script>";
    exit();
  }
}

if (isset($_POST['add-socialmedia'])) {
  $twitter = $_POST['twitter'];
  $facebook = $_POST['facebook'];
  $instagram = $_POST['instagram'];
  $skype = $_POST['skype'];
  $youtube = $_POST['youtube'];
  $linkedin = $_POST['linkedin'];

  $query = "INSERT INTO social_media (user_id, twitter, facebook, instagram, skype, youtube,linkedin) ";
  $query .= "VALUES ($userId, '$twitter', '$facebook', '$instagram', '$skype','$youtube', '$linkedin') ";
  $query .= "ON DUPLICATE KEY UPDATE twitter='$twitter', facebook='$facebook', instagram='$instagram', skype='$skype', youtube='$youtube', linkedin='$linkedin'";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../Home/account.php?contactsetting=true';</script>";
    exit();
  }
}

if (isset($_POST['add-background'])) {
  $imagename = time() . $_FILES['background']['name'];
  $imgtemp = $_FILES['background']['tmp_name'];

  move_uploaded_file($imgtemp, "../assets/img/$imagename");

  $query = "INSERT INTO site_background (user_id, background_img) ";
  $query .= "VALUES ($userId, '$imagename') ";
  $query .= "ON DUPLICATE KEY UPDATE background_img='$imagename'";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../Home/account.php?changebackground=true';</script>";
    exit();
  }
}

if (isset($_POST['add-seo'])) {
  $title = mysqli_real_escape_string($db, $_POST['page_title']);
  $keyword = mysqli_real_escape_string($db, $_POST['keyword']);
  $desc = mysqli_real_escape_string($db, $_POST['description']);
  $imagename = time() . $_FILES['siteicon']['name'];
  $imgtemp = $_FILES['siteicon']['tmp_name'];

  if ($imgtemp == '') {
    $q = "SELECT * FROM seo WHERE user_id=$userId";
    $r = mysqli_query($db, $q);
    $d = mysqli_fetch_array($r);
    $imagename = $d['siteicon'];
  }

  move_uploaded_file($imgtemp, "../images/$imagename");

  $query = "INSERT INTO seo (user_id, page_title, keywords, description, siteicon) ";
  $query .= "VALUES ($userId, '$title', '$keyword', '$desc', '$imagename') ";
  $query .= "ON DUPLICATE KEY UPDATE page_title='$title', keywords='$keyword', description='$desc', siteicon='$imagename'";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../Home/account.php?seosetting=true';</script>";
    exit();
  }
}

if (isset($_POST['add-account'])) {
  $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $imagename = time() . $_FILES['profilepic']['name'];
  $imgtemp = $_FILES['profilepic']['tmp_name'];

  if ($imgtemp == '') {
    $q = "SELECT * FROM user WHERE user_id=$userId";
    $r = mysqli_query($db, $q);
    $d = mysqli_fetch_array($r);
    $imagename = $d['user_profile'];
  }

  move_uploaded_file($imgtemp, "../images/$imagename");

  $query = "INSERT INTO user (user_id, fullname, email, password, user_profile) ";
  $query .= "VALUES ($userId, '$fullname', '$email', '$password', '$imagename') ";
  $query .= "ON DUPLICATE KEY UPDATE fullname='$fullname', email='$email', password='$password', user_profile='$imagename'";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../Home/account.php?accountsetting=true';</script>";
    exit();
  }
}


if (isset($_POST['update-section'])) {
  $home = $_POST['home'] ?? 0;
  $about = $_POST['about'] ?? 0;
  $portfolio = $_POST['portfolio'] ?? 0;
  $resume = $_POST['resume'] ?? 0;
  $contact = $_POST['contact'] ?? 0;
  $services = $_POST['services'] ?? 0;

  $query = "UPDATE section_control SET home_section='$home', about_section='$about', resume_section='$resume', portfolio_section='$portfolio', services_section='$services', contact_section='$contact' WHERE user_id = $userId";

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

  $query = "UPDATE home SET title='$title', subtitle='$subtitle', showicons='$showicons' WHERE user_id = $userId";

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
    $q = "SELECT * FROM about WHERE user_id=$userId";
    $r = mysqli_query($db, $q);
    $d = mysqli_fetch_array($r);
    $imagename = $d['profile_pic'];
  } else {
    move_uploaded_file($imgtemp, "../images/$imagename");
  }

  $query = "UPDATE about SET about_title='$title', about_subtitle='$subtitle', profile_pic='$imagename', about_desc='$desc' WHERE user_id = $userId";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../Home/account.php?aboutsetting=true';</script>";
    exit();
  }
}
if (isset($_POST['update-counts'])) {
  $happy_clients = $_POST['happy_clients'];
  $projects = $_POST['projects'];
  $hours = $_POST['hours'];
  $awards = $_POST['awards'];

  $query = "UPDATE counts SET happy_clients='$happy_clients', projects='$projects', hours='$hours', awards='$awards' WHERE user_id = $userId";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../Home/account.php?aboutsetting=true';</script>";
    exit();
  }
}
if (isset($_POST['update-contact'])) {
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];

  $query = "UPDATE contact SET address='$address', email='$email', mobile='$mobile' WHERE user_id = $userId";

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
  $youtube = $_POST['youtube'];
  $linkedin = $_POST['linkedin'];

  $query = "UPDATE social_media SET twitter='$twitter', facebook='$facebook', instagram='$instagram', skype='$skype', youtube='$youtube', linkedin='$linkedin' WHERE user_id = $userId";

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

  $query = "UPDATE site_background SET background_img='$imagename' WHERE user_id = $userId";

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
    $q = "SELECT * FROM seo WHERE user_id=$userId";
    $r = mysqli_query($db, $q);
    $d = mysqli_fetch_array($r);
    $imagename = $d['siteicon'];
  }

  move_uploaded_file($imgtemp, "../images/$imagename");

  $query = "UPDATE seo SET page_title='$title', keywords='$keyword', description='$desc', siteicon='$imagename' WHERE user_id = $userId";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../Home/account.php?seosetting=true';</script>";
    exit();
  }
}
if (isset($_POST['update-account'])) {
  $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $imagename = time() . $_FILES['profilepic']['name'];
  $imgtemp = $_FILES['profilepic']['tmp_name'];

  if ($imgtemp == '') {
    $q = "SELECT * FROM user WHERE user_id=$userId";
    $r = mysqli_query($db, $q);
    $d = mysqli_fetch_array($r);
    $imagename = $d['user_profile'];
  }

  move_uploaded_file($imgtemp, "../images/$imagename");

  $query = "UPDATE user SET fullname='$fullname', email='$email', password='$password', user_profile='$imagename' WHERE user_id = $userId";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../Home/account.php?accountsetting=true';</script>";
    exit();
  }
}

?>