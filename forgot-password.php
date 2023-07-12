<?php

if (isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: login.php");
    die();
}

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
require 'include/db.php';

$msg = "";

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $code = mysqli_real_escape_string($db, md5(rand()));

    if (mysqli_num_rows(mysqli_query($db, "SELECT * FROM admin WHERE email='{$email}'")) > 0) {
        $query = mysqli_query($db, "UPDATE admin SET code='{$code}' WHERE email='{$email}'");

        if ($query) {
            echo "<div style='display: none;'>";
            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
                $mail->isSMTP(); //Send using SMTP
                $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
                $mail->SMTPAuth = true; //Enable SMTP authentication
                $mail->Username = 'portfoliowebsite617@gmail.com'; //SMTP username
                $mail->Password = 'taozuurruhkkgqzp'; //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
                $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('portfoliowebsite617@gmail.com', 'Art Abode');
                $mail->addAddress($email);

                //Content
                $mail->isHTML(true); //Set email format to HTML
                $mail->Subject = 'no reply';
                $mail->Body = 'You have requested to reset your password. Please click the link below to proceed: <br><br> <b><a href="http://localhost/portfoliowebsite/recover-password.php?reset=' . $code . '"> http://localhost/E3/change-password.php?reset=' . $code . ' </a></b> <br><br> If you did not request a password reset, please ignore this email.<br><br> Best regards,<br> Art Abode';

                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            echo "</div>";
            $msg = "<div class='alert alert-info'>We've send a verification link on your email address.</div>";
        }
    } else {
        $msg = "<div class='alert alert-danger'>$email - This email address do not found.</div>";
    }
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Art Abode | Forgot Password</title>
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
    <!--/Style-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <!--//Style-CSS -->


    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>

</head>

<body style="background-image: url('images/GGB.jpg'); background-size: cover; background-position: center;" class="hold-transition login-page">

    <!-- form section start -->
    <div class="login-box">
        <div class="login-logo">
            <a href="Home/home.php"><b style="color: #1DB954;">Art</b><b style="color: #FFF;">Abode</b></a>
        </div>
        <!-- /form -->
        <<div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password. </p>


                <?php echo $msg; ?>
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Enter Your Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <button name="submit" class="btn btn-primary btn-block" type="submit">Send Reset Link</button>
                </form>
                <div class="social-icons">
                    <p><br><br>Back to <a href="login.php">Login</a>.</p>
                </div>
            </div>
    </div>
    </div>
    <!-- //form -->
    </div>
    </div>
    </div>
    <!-- //form section start -->

    <script src="js/jquery.min.js"></script>
    <!-- jQuery -->
    <script src="./admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="./admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Admin App -->
    <script src="./admin/dist/js/adminlte.min.js"></script>
</body>

</html>