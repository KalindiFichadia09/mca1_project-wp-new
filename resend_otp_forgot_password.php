<?php

//include_once("header.php");
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();
include 'conn.php';
// Check if the email is set in the session
if (isset($_SESSION['forgot_email'])) {
    $email = $_SESSION['forgot_email'];
    

    // Check if the email is registered in the user_tbl
    $check_query = "SELECT * FROM user_tbl WHERE u_email = '$email'";
    $check_result = mysqli_query($con, $check_query);

    if ($check_result && mysqli_num_rows($check_result) == 0) {
        // Email is not registered, display error message
        setcookie('error', "This email is not registered.", time() + 5, "/");
        ?>
        <script>
            window.location.href = "forgot-password.php";
        </script>
        <?php
        exit; // Stop further execution
    }

    // Check if the email exists in the password_token_tbl
    $query = "SELECT * FROM password_token_tbl WHERE Email = '$email'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Check if the OTP has expired
        $row = mysqli_fetch_assoc($result);
        if (strtotime($row['Expires_at']) < time()) {
            // OTP has expired, generate a new one
            $otp = rand(100000, 999999);
            $email_time = date("Y-m-d H:i:s");
            $expiry_time = date("Y-m-d H:i:s", strtotime('+1 minutes'));

            // Update the existing record with new OTP
            $update_query = "UPDATE password_token_tbl SET Otp = '$otp', Created_at = '$email_time', Expires_at = '$expiry_time' WHERE Email = '$email'";
            if (mysqli_query($con, $update_query)) {
                // Send the OTP email
                sendOtpEmail($email, $otp);
            } else {
                echo "Failed to update OTP: " . mysqli_error($con);
            }
        } else {
            // OTP is still valid, notify the user
            setcookie('error', "An OTP has already been sent and is still valid. Please wait for it to expire.", time() + 5, "/");
            ?>
            <script>
                window.location.href = "forgot-password.php";
            </script>
            <?php
            exit;
        }
    } else {
        // No existing OTP record, generate and insert a new OTP
        $otp = rand(100000, 999999);
        $email_time = date("Y-m-d H:i:s");
        $expiry_time = date("Y-m-d H:i:s", strtotime('+1 minutes'));

        $insert_query = "INSERT INTO password_token_tbl (Email, Otp, Created_at, Expires_at) VALUES ('$email', '$otp', '$email_time', '$expiry_time')";
        if (mysqli_query($con, $insert_query)) {
            // Send the OTP email
            sendOtpEmail($email, $otp);
        } else {
            echo "Failed to insert OTP: " . mysqli_error($con);
        }
    }
}

// Function to send OTP via PHPMailer
function sendOtpEmail($email, $otp) {
    $mail = new PHPMailer();
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
        $mail->SMTPAuth = true;
        $mail->Username = 'veloraa1920@gmail.com'; // SMTP username
        $mail->Password = 'rtep efdy gepi yrqj'; // SMTP password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('veloraa1920@gmail.com', 'Jayshree');
        $mail->addAddress($email, 'Password reset');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Your OTP for Password Reset';
        $mail->Body = "
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 5px; }
                h1 { color: black; }
                .otp { font-size: 24px; font-weight: bold; color: #007bff; }
                .footer { margin-top: 20px; font-size: 0.8em; color: #777; }
            </style>
        </head>
        <body>
            <div class='container'>
                <h1>Forgot Your Password?</h1>
                <p>We received a request to reset your password. Here is your One-Time Password (OTP):</p>
                <p class='otp'>$otp</p>
                <p>Please enter this OTP on the website to proceed with resetting your password.</p>
                <p>If you did not request a password reset, please ignore this email.</p>
                <div class='footer'>
                    <p>This is an automated message, please do not reply to this email.</p>
                </div>
            </div>
        </body>
        </html>
        ";

        if ($mail->send()) {
            // Set success message and redirect to OTP form
            setcookie('success', "OTP for resetting your password is sent to the registered mail address", time() + 2, "/");
            ?>
            <script>
                window.location.href = "forgot_password_otp_form.php";
            </script>
            <?php
        } else {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } catch (Exception $e) {
        echo "Message could not be sent. PHPMailer Error: {$mail->ErrorInfo}";
    }
}
?>
