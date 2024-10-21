<?php
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
                    <h2 class="text-center mb-4">Send OTP</h2>
                    <form onsubmit="" method="post">
                        <div class="form-group">
                            <label for="email">Enter OTP</label>
                            <input type="text" id="otptxt" name="otptxt" class="form-control" placeholder="Enter otp">
                            <span id="emailMsg"></span>
                        </div>
                        <div id="timer" class="text-danger"></div>
                        <div class="text-center mt-3">
                            <input type="submit" value="Resend OTP" id="resend_otp" name="resend"
                                class="btn btn-primary btn-block" style="display:none;">
                            <script>
                                let timeLeft = 60; // 1 minute timer
                                const timerDisplay = document.getElementById('timer');
                                const resendButton = document.getElementById('resend_otp');

                                // Function to start the countdown
                                function startCountdown() {
                                    const countdown = setInterval(() => {
                                        if (timeLeft <= 0) {
                                            clearInterval(countdown);
                                            timerDisplay.innerHTML = "You can now resend the OTP.";
                                            resendButton.style.display = "inline";
                                            timeLeft = 60;
                                        } else {
                                            timerDisplay.innerHTML = `Resend OTP in ${timeLeft} seconds`;
                                        }
                                        timeLeft -= 1;
                                    }, 1000);
                                }

                                // Check if there's a remaining time in sessionStorage
                                if (sessionStorage.getItem('otpTimer')) {
                                    timeLeft = parseInt(sessionStorage.getItem('otpTimer'));
                                    startCountdown();
                                } else {
                                    startCountdown();
                                }

                                // Update sessionStorage every second
                                setInterval(() => {
                                    sessionStorage.setItem('otpTimer', timeLeft);
                                }, 1000);

                                // resendButton.onclick = function (event) {
                                //     event.preventDefault(); // Prevent the default form submission
                                //     window.location.href = 'resend_otp_forgot_password.php';
                                // };
                            </script><br>
                            <input type="submit" name="otp_btn" id="otp_btn" value="Submit" class="btn btn-primary btn-block">
                        <!-- <button type="submit" class="btn btn-primary btn-block">Submit</button> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<?php
include 'conn.php';
if (isset($_POST['otp_btn'])) {
    if (isset($_SESSION['forgot_email'])) {
        $email = $_SESSION['forgot_email'];
        $otp = $_POST['otptxt'];
        // echo $otp;
        // Fetch the OTP from the database for the given email
        $query = "SELECT Otp FROM password_token_tbl WHERE Email = '$email' ";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $db_otp = $row['Otp'];
            echo $row['Otp'];

            // Compare the OTPs
            if ($otp == $db_otp) {
                // Redirect to new password page
                ?>
                <script>
                    window.location.href = 'new_password_form.php';
                </script>
                <?php

            } else {
                setcookie('error', 'Incorrect OTP', time() + 5, '/');
                ?>
                <script>
                    window.location.href = 'otp_form.php';
                </script>
                <?php
            }
        } else {
            setcookie('error', 'OTP has expired. Regenerate New OTP', time() + 2, '/');
            ?>
            <script>
                window.location.href = 'Forgot_password.php';
            </script>
            <?php
        }
    }
}


?>