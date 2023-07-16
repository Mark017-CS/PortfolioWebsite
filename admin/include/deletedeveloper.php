<?php
require('../../include/db.php');

// Check if the user is logged in
if (!isset($_SESSION['isAdminLoggedIn'])) {
  echo "<script>window.location.href='adminLogin.php';</script>";
  exit();
}

$admin_id = $_SESSION['admin_id'];

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Add a condition to check if the user_id matches the logged-in user's user_id
  $query = "DELETE FROM admin_developers WHERE id=$id AND admin_id=$admin_id";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../admin.php?aboutsetting=true';</script>";
    exit();
  }
}
?>
