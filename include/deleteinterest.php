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
  
  // Add a condition to delete the data based on the user_id of the logged-in user
  $query = "DELETE FROM interests WHERE id=$id AND user_id=$userId";
  $run = mysqli_query($db, $query);
  
  if ($run) {
    echo "<script>window.location.href='../Home/account.php?aboutsetting=true';</script>";
    exit();
  }
}
?>
