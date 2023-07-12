<?php
require('include/db.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get the form inputs
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirm_password'];

  // Validate the inputs
  $errors = [];
  if (empty($password)) {
    $errors[] = "Password is required.";
  }
  if ($password !== $confirmPassword) {
    $errors[] = "Passwords do not match.";
  }
  if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $password)) {
    $errors[] = "Password must be at least 8 characters long and include at least one lowercase letter, one uppercase letter, and one number.";
  }

  // If there are no errors, update the password in the database
  if (empty($errors)) {
    // Retrieve the email from the form
    $email = $_POST['email'];

    // Update the password in the database
    $updateQuery = "UPDATE admin SET password = '$password' WHERE email = '$email'";
    if (mysqli_query($conn, $updateQuery)) {
      // Password updated successfully
      header("Location: login.php");
      exit();
    } else {
      // Failed to update the password
      $errors[] = "Failed to update the password. Please try again.";
    }
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Art Abode | Recover Password</title>
  <link href="images/logo.png" rel="icon">
  <link href="images/logo.png" rel="apple-touch-icon">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="./admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="./admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./admin/dist/css/admin.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body style="background-image: url('images/GGB.jpg'); background-size: cover; background-position: center;" class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="./Home/home.php"><b style="color: #1db954">Art</b><b style="color: #fff">Abode</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">
          You are only one step away from your new password, recover your password now.
        </p>

        <form action="" method="post">
          <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Change password</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <?php if (!empty($errors)) { ?>
          <div class="alert alert-danger mt-3">
            <?php foreach ($errors as $error) {
              echo $error . "<br>";
            } ?>
          </div>
        <?php } ?>

        <p class="mt-3 mb-1">
          <a href="login.php">Login</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="./admin/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="./admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Admin App -->
  <script src="./admin/dist/js/admin.min.js"></script>
</body>

</html>