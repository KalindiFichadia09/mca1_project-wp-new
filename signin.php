<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - Jaysheree Jewels</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/user_script.js"></script>
    <script src="js/all_validation.js"></script>
    <style>
        body {
            background: url('user/../images/temp5.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Arial', sans-serif;
            display: flex;
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
    <!-- Sign-In Form -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm p-4">
                    <h2 class="text-center mb-4">Sign In</h2>
                    <form onsubmit="return signin_validation()" method="POST">
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" id="eml" class="form-control"
                                placeholder="Enter your email">
                            <span id="eml_msg"></span>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <input type="password" name="password" class="form-control" id="pwd"
                                    placeholder="Enter your password">
                                <button type="button" class="view-button" onclick="showPassword('pwd')">👁️</button>
                            </div>
                            <span id="pwd_msg"></span>
                        </div>
                        <div class="form-group text-right">
                            <a href="forgot-password.php" class="text-primary">Forgot Password?</a>
                        </div>
                        <input type='submit' name='signin' value='Sign In' class='btn btn-primary btn-block'>
                        <div class="text-center mt-3">
                            <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
include_once 'conn.php';

session_start();
if (isset($_POST['signin'])) {
    $em = $_POST['email'];
    $pwd = $_POST['password'];

    $q = "SELECT * FROM `user_tbl` WHERE `u_email`='$em'";
    $result = mysqli_query($con, $q);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        while ($r = mysqli_fetch_assoc($result)) {
            if ($r['u_password'] == $pwd) {
                if ($r['u_status'] == 'Active') {
                    if ($r['u_role'] == 'Admin') {
                        $_SESSION['username'] = $em;
                        setcookie('success', 'Login Successful', time() + 5, "/");
                        ?>
                        <script>
                            window.location.href = "admin/index.php";
                        </script>
                        <?php
                    } else {
                        $_SESSION['username'] = $em;
                        setcookie('success', 'Login Successful', time() + 5, "/");
                        ?>
                        <script>
                            window.location.href = "user/index.php";
                        </script>
                        <?php
                    }
                } else {
                    setcookie("error", "Email is not verified", time() + 5, "/");
                    ?>
                    <script>
                        window.location.href = "signin.php";
                    </script>
                    <?php
                }
            } else {
                setcookie("error", "Incorrect Password", time() + 5, "/");
                ?>
                <script>
                    window.location.href = "signin.php";
                </script>
                <?php
            }
        }
    } else {
        setcookie("error", "Email is not registered", time() + 5, "/");
        ?>
        <script>
            window.location.href = "signin.php";
        </script>

        <?php
    }
    $row = mysqli_fetch_array($result);
}
?>