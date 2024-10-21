<?php
include("conn.php");

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Jaysheree Jewels</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all_validation.js"></script>
    <style>
        body {
            background: url('user/../images/temp3.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Arial', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            border: none;
            border-radius: 15px;
            background: rgba(255, 255, 255, 0.9);
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .btn-primary {
            background-color: #D4AF37;
            border: none;
        }

        .btn-outline-secondary {
            border-color: #D4AF37;
            color: #D4AF37;
        }

        .btn-outline-secondary:hover {
            background-color: #D4AF37;
            color: #fff;
        }

        .form-text a {
            color: #D4AF37;
        }

        .form-text a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Forgot Password Form -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm p-4">
                    <h2 class="text-center mb-4">Forgot Password</h2>
                    <form method="post">
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="femail" class="form-control" placeholder="Enter your email">
                            <span id="emailMsg"></span>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block" name="frgt_pwd_btn">Send OTP</button>
                        <div class="text-center mt-3">
                            <p>Remembered your password? <a href="signin.php">Sign In</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
<?php
if (isset($_POST['frgt_pwd_btn'])) {
  $email = $_POST['femail'];
  $check_query = "SELECT * FROM user_tbl WHERE u_email = '$email'";
  echo $check_query;
  $check_result = mysqli_query($con, $check_query);
  if (mysqli_num_rows($check_result) > 0) {
    $query = "SELECT * FROM password_token_tbl WHERE Email = '$email'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
      setcookie('error', "OTP is already sent to email address. new otp will be generated after old OTP expires.", time() + 5, "/");
      ?>
      <script>
        window.location.href = "forgot_password_otp_form.php";
      </script>
      <?php
      exit;
    }
     else 
     {
      $otp = rand(100000, 999999);

      // Use PHPMailer to send the OTP
      $mail = new PHPMailer(true);
      try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
        $mail->SMTPAuth = true;
        $mail->Username = 'veloraa1920@gmail.com'; // SMTP username
        $mail->Password = 'rtep efdy gepi yrqj'; // SMTP password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('veloraa1920@gmail.com', 'Jayshree');
        $mail->addAddress($email, 'Password reset');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'OTP for Password Reset';
        $mail->Body = "<p>Your OTP for password reset is: $otp</p>";

        $mail->send();

        // Store the email, OTP, and timestamps in the database
        $email_time = date("Y-m-d H:i:s");
        $expiry_time = date("Y-m-d H:i:s", strtotime('+1 minutes')); // OTP valid for 10 minutes
        $query = "INSERT INTO  password_token_tbl  (Email, Otp, Created_at, Expires_at) VALUES ('$email', '$otp', '$email_time', '$expiry_time')";
        mysqli_query($con, $query);

        $_SESSION['forgot_email'] = $email;
        setcookie('success', "OTP for resetting your password is sent to the registered mail address", time() + 2, "/")
          ?>
        <script>
          window.location.href = "forgot_password_otp_form.php";
        </script>
        <?php
        exit;
      } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        setcookie('error', $mail->ErrorInfo, time() + 2, "/");
        ?>
        <script>
          window.location.href = "Forgot_password.php ";
        </script>
        <?php
      }
    }
  } else {
    setcookie('error', "Email is not registered", time() + 5, "/");
    ?>
    <script>
      window.location.href = "Forgot_password.php";
    </script>
    <?php
  }
}
?>