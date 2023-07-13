<?php
require('db.php');

// Check if the user is logged in
if (!isset($_SESSION['isUserLoggedIn'])) {
  echo "<script>window.location.href='login.php';</script>";
  exit();
}

$adminId = $_SESSION['admin_id'];

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Add a condition to check if the admin_id matches the logged-in user's admin_id
  $query = "DELETE FROM portfolio WHERE id=$id AND admin_id=$adminId";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../Home/account.php?portfoliosetting=true';</script>";
    exit();
  }
}
?>
