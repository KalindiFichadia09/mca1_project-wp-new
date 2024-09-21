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
                    <form action="signin.php" onsubmit="return forgotPassword_validation()" method="get">
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" class="form-control" id="email" placeholder="Enter your email">
                            <span id="emailMsg"></span>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Send Mail</button>
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
