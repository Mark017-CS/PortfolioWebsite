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
  
  // Modify the query to include the user_id condition
  $query = "DELETE FROM resume WHERE id=$id AND user_id=$userId";
  
  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../Home/account.php?resumesetting=true';</script>";
  }
}
?>
