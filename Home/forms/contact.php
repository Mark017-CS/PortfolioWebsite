<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $fullName = $_POST["fullName"];
  $email = $_POST["email"];
  $mobileNumber = $_POST["mobileNumber"];
  $subject = $_POST["subject"];
  $message = $_POST["message"];
  
  // Retrieve admin ID from query parameter
  $admin_id = $_GET["user_id"];

  
  require '../../vendor/autoload.php';

  $mail = new PHPMailer\PHPMailer\PHPMailer();
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 587;
  $mail->SMTPSecure = 'tls';
  $mail->SMTPAuth = true;
  $mail->Username = 'portfoliowebsite617@gmail.com'; 
  $mail->Password = 'taozuurruhkkgqzp'; 

  // Set the sender and recipient
  $mail->setFrom($email, $fullName);
  $mail->addAddress('portfoliowebsite617@gmail.com'); 

  // Set email subject and body
  $mail->Subject = $subject;
  $mail->Body = "Name: $fullName\nEmail: $email\nMobile Number: $mobileNumber\n\n$message";

  if ($mail->send()) {
    echo '<script>alert("Your message has been sent. Thank you!"); window.location.href = "../portfolio.php?user_id=' . $_GET['user_id'] . '";</script>';
  } else {
    echo '<script>alert("Message could not be sent. Please try again later."); window.location.href = "../portfolio.php?user_id=' . $_GET['user_id'] . '";</script>';
  }
}  
?>