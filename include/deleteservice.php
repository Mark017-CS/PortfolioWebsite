<?php
require('db.php');

// Check if the user is logged in
if (!isset($_SESSION['isUserLoggedIn'])) {
  echo "<script>window.location.href='login.php';</script>";
  exit();
}

$userId = $_SESSION['user_id'];

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Add a condition to check if the user_id matches the logged-in user's user_id
  $query = "DELETE FROM services WHERE id=$id AND user_id=$userId";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../Home/account.php?servicesetting=true';</script>";
    exit();
  }
}
?>
