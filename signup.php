<?php
include("conn.php");

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Jaysheree Jewels</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/user_script.js"></script>
    <script src="js/all_validation.js"></script>
    <style>
        body {
            background: url('user/../images/temp3.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Arial', sans-serif;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .logo {
            width: 100px;
            height: 100px;
        }

        .card {
            border: none;
            border-radius: 15px;
            background: rgba(255, 255, 255, 1);
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

        .input-group {
            position: relative;
        }

        .input-group .view-button {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            color: #D4AF37;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <!-- Signup Form -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm p-4">
                    <h2 class="text-center mb-4">Sign Up</h2>
                    <form onsubmit="return userInsertValidation()" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" name="u_fullName" id="fullName"
                                placeholder="Enter your full name">
                            <span id="fullNameMsg"></span>
                        </div>
                        <div class="form-group">
                            <label>Gender</label><br>
                            <div class="form-control">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="u_gender" id="male" value="male">
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="u_gender" id="female"
                                        value="female">
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                            </div>
                            <span id="genderMsg"></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" name="u_email" id="u_email"
                                placeholder="Enter your email">
                            <span id="emailMsg"></span>
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile Number</label>
                            <input type="tel" class="form-control" name="u_mobile" id="u_mobile"
                                placeholder="Enter your mobile number">
                            <span id="mobileMsg"></span>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="u_address" id="u_address"
                                placeholder="Enter your address">
                            <span id="addressMsg"></span>
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" name="u_city" id="u_city"
                                placeholder="Enter your city">
                            <span id="cityMsg"></span>
                        </div>
                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" class="form-control" name="u_state" id="u_state"
                                placeholder="Enter your state">
                            <span id="stateMsg"></span>
                        </div>
                        <div class="form-group">
                            <label for="pincode">Pincode</label>
                            <input type="text" class="form-control" name="u_pincode" id="u_pincode"
                                placeholder="Enter your pincode">
                            <span id="pincodeMsg"></span>
                        </div>
                        <div class="form-group">
                            <label for="country">Profile Photo</label>
                            <input type="file" class="form-control" id="profilePhoto" name="u_image" id="file">
                            <span id="profilePhotoMsg"></span>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="u_password" id="password"
                                    placeholder="Enter your password">
                                <button type="button" class="view-button"
                                    onclick="showPassword('password')">👁️</button>
                            </div>
                            <span id="passwordMsg"></span>
                        </div>
                        <div class="form-group">
                            <label for="confirm-password">Confirm Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="u_confirmpassword"
                                    id="confirmPassword" placeholder="Confirm your password">
                                <button type="button" class="view-button"
                                    onclick="showPassword('confirmPassword')">👁️</button>
                            </div>
                            <span id="confirmPasswordMsg"></span>
                        </div>
                        <input type="submit" class="btn btn-primary btn-block" value="Sign Up" name="signup">
                        <!-- <button type="submit" class="btn btn-primary btn-block">Sign Up</button> -->
                        <div class="text-center mt-3">
                            <p>Already have an account? <a href="signin.php">Sign In</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
if (isset($_POST['signup'])) {
    $u_fullName = $_POST['u_fullName'];
    $u_gender = $_POST['u_gender'];
    $u_email = $_POST['u_email'];
    $u_mobile = $_POST['u_mobile'];
    $u_address = $_POST['u_address'];
    $u_city = $_POST['u_city'];
    $u_state = $_POST['u_state'];
    $u_pincode = $_POST['u_pincode'];
    $u_password = $_POST['u_password'];
    $u_status = "Inactive";
    $u_role = "User";
    $u_image = "images/profile_image/" . $_FILES['u_image']['name'];

    $q = "INSERT INTO `user_tbl`(`u_fullname`, `u_gender`, `u_email`, `u_mobile`, `u_address`, `u_city`, `u_state`, `u_pincode`, `u_password`, `u_image`, `u_status`,`u_role`) 
                        VALUES ('$u_fullName','$u_gender','$u_email','$u_mobile','$u_address','$u_city','$u_state','$u_pincode','$u_password','$u_image','$u_status','$u_role')";
    // echo $q;
    if (mysqli_query($con, $q)) {
        if (!is_dir("images/profile_image")) {
            mkdir("images/profile_image");
        }
        move_uploaded_file($_FILES['u_profilePhoto']['tmp_name'], $u_image);

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'veloraa1920@gmail.com';
            $mail->Password = 'rtep efdy gepi yrqj';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('veloraa1920@gmail.com', 'Jayshree');
            $mail->addAddress($u_email, $fn);

            $mail->isHTML(true);
            $mail->Subject = 'Email Verification';
            $activation_link = "http://localhost/mca1_project(wp)new/verify_email.php?em=" . $u_email;
            $mail->Body = "<html>
            <head>
                <style>
                    body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                    .container { max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f9f9f9; }
                    h1 { color: black; }
                    .button { display: inline-block; padding: 10px 20px; background-color: gray; color: black; text-decoration: none; border-radius: 5px; }
                    .footer { margin-top: 20px; font-size: 0.8em; color: #777; }
                    a { text-decoration: none; color: white; }
                </style>
            </head>
            <body>
                <div class='container'>
                    <h1>Welcome, $fn!</h1>
                    <p>Thank you for registering. Please click the button below to activate your account:</p>
                    <p><a href='$activation_link' class='button'>Activate Your Account</a></p>
                    <p>If you didn't register on our website, please ignore this email.</p>
                    <div class='footer'>
                        <p>This is an automated message, please do not reply to this email.</p>
                    </div>
                </div>
            </body>
            </html>";

            $mail->send();
        } catch (Exception $e) {
            setcookie('error', "Error in sending email: " . $mail->ErrorInfo, time() + 5);
        }

        setcookie('success', 'Registration Successfull. Verify your Email using verification link sent to registered Email Address', time() + 5, "/");
        ?>
        <script>
            alert("Registered !!");
            window.location.href = "signin.php";
        </script>
        <?php
    } else {
        ?>

        <script>
            alert("Not Registered");
            window.location.href = "signup.php";
        </script>
        <?php
    }
}
?>