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
  
  // Modify the query to include the admin_id condition
  $query = "DELETE FROM resume WHERE id=$id AND admin_id=$adminId";
  
  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../Home/account.php?resumesetting=true';</script>";
  }
}
?>
