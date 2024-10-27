<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Password - Jaysheree Jewels</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/user_script.js"></script>
    <script src="js/all_validation.js"></script>

    <style>
        body {
            background: url('images/temp5.jpg') no-repeat center center fixed;
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
            background: rgba(255, 255, 255, 1);
            padding: 30px;
        }

        .btn-primary {
            background-color: #D4AF37;
            border: none;
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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm">
                    <h2 class="text-center mb-4">Change Password</h2>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="new-password">New Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="newPassword" name="password"
                                    placeholder="Enter new password">
                                <button type="button" class="view-button"
                                    onclick="showPassword('newPassword')">👁️</button>
                            </div>
                            <span id="newPasswordMsg"></span>
                        </div>
                        <div class="form-group">
                            <label for="confirm-password">Confirm New Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="confirmPassword" name="confirm_password"
                                    placeholder="Confirm new password">
                                <button type="button" class="view-button"
                                    onclick="showPassword('confirmPassword')">👁️</button>
                            </div>
                            <span id="confirmPasswordMsg"></span>
                        </div>
                        <input type="submit" value="Submit" name="reset_pwd_btn" class="btn btn-primary btn-block">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
include 'conn.php';
if (isset($_POST['reset_pwd_btn'])) {
    if (isset($_SESSION['forgot_email'])) {
        $email = $_SESSION['forgot_email'];
        $password = $_POST['password'];

        $update_query = "UPDATE user_tbl SET u_password = '$password' WHERE u_email = '$email'";
        if (mysqli_query($con, $update_query)) {
            $delete_query = "DELETE FROM password_token_tbl WHERE Email = '$email'";
            mysqli_query($con, $delete_query);
            unset($_SESSION['forgot_email']);

            setcookie('success', 'Password has been reset successfully.', time() + 5, '/');
            ?>

            <script>
                window.location.href = 'signin.php';
            </script>
            <?php

        } else {
            setcookie('error', 'Error in resetting Password.', time() + 5, '/');
            ?>

            <script>
                window.location.href = 'Forgot_password.php';
            </script>
            <?php
        }
    }
}