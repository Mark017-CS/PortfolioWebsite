<?php
require('../../include/db.php');

// Check if the user is logged in
if (!isset($_SESSION['isAdminLoggedIn'])) {
  echo "<script>window.location.href='adminLogin.php';</script>";
  exit();
}

$admin_id = $_SESSION['admin_id'];

if (isset($_GET['user_id'])) {
  $user_id = $_GET['user_id'];

  // Add a condition to check if the user_id matches the logged-in user's user_id
  $query = "DELETE FROM user WHERE user_id=$user_id";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../admin.php?accountsetting=true';</script>";
    exit();
  }
}
?>
