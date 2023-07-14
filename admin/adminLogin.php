<?php
require('../include/db.php');

// Check if the user clicked the login button
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Check if the email and password are valid
  $query = "SELECT * FROM admin WHERE email='$email' && password='$password'";
  $run = mysqli_query($db, $query);
  $row_count = mysqli_num_rows($run);

  if ($row_count > 0) {
    // Login successful
    session_start(); // Start the session
    $data = mysqli_fetch_array($run);
    $_SESSION['admin_id'] = $data['admin_id']; // Store the admin ID in the session
    $_SESSION['isAdminLoggedIn'] = true; // Set the session variable to indicate that the admin is logged in

    // Remove cookies for email and password
    setcookie('email', '', time() - 3600, '/');
    setcookie('password', '', time() - 3600, '/');

    header("Location: admin.php"); 
    exit();
  } else {
    echo "<script>alert('Incorrect email id or password!')</script>";
  }
}
?>



<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Art Abode | Log in</title>
  <link href="../images/logo.png" rel="icon">
  <link href="../images/logo.png" rel="apple-touch-icon">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../user/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../user/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../user/dist/css/user.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body style="background-image: url('../images/GGB.jpg'); background-size: cover; background-position: center;" class="hold-transition login-page">
  <div class="login-box" >
    <div class="login-logo">
      <a href="../Home/home.php"><b style="color: #1DB954;">Art</b><b style="color: #FFF;">Abode</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card" >
      <div class="card-body login-card-body">
        <p class="login-box-msg">Admin Login</p>

        <form method="post">
          <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email" required
              value="<?php echo isset($_COOKIE['email']) ? $_COOKIE['email'] : ''; ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password" required
              value="<?php echo isset($_COOKIE['password']) ? $_COOKIE['password'] : ''; ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="showPassword">
            <label class="form-check-label" for="showPassword">Show Password</label>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <!-- /.social-auth-links -->
        <p class="mb-1">
          <a href="../components/login.php">Back to<b> user login</b></a>
        </p>       
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="../user/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../user/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- user App -->
  <script src="../user/dist/js/userlte.min.js"></script>
  <script>
    var passwordInput = document.querySelector('input[name="password"]');
    var showPasswordCheckbox = document.getElementById('showPassword');

    showPasswordCheckbox.addEventListener('change', function () {
      if (this.checked) {
        passwordInput.type = 'text';
      } else {
        passwordInput.type = 'password';
      }
    });
  </script>
</body>

</html>