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
                    <form onsubmit="return userInsertValidation()" method="POST">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" name="fullName" id="fullName" placeholder="Enter your full name">
                            <span id="fullNameMsg"></span>
                        </div>
                        <div class="form-group">
                            <label>Gender</label><br>
                            <div class="form-control">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                            </div>
                           <span id="genderMsg"></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email">
                            <span id="emailMsg"></span>
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile Number</label>
                            <input type="tel" class="form-control" name="mobile" id="mobile" placeholder="Enter your mobile number">
                            <span id="mobileMsg"></span>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" id="address" placeholder="Enter your address">
                            <span id="addressMsg"></span>
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" name="city" id="city" placeholder="Enter your city">
                            <span id="cityMsg"></span>
                        </div>
                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" class="form-control" name="state" id="state" placeholder="Enter your state">
                            <span id="stateMsg"></span>
                        </div>
                        <div class="form-group">
                            <label for="pincode">Pincode</label>
                            <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Enter your pincode">
                            <span id="pincodeMsg"></span>
                        </div>
                        <div class="form-group">
                            <label for="country">Profile Photo</label>
                            <input type="file" class="form-control" id="profilePhoto" name="profilePhoto" id="file">
                            <span id="profilePhotoMsg"></span> 
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
                                <button type="button" class="view-button" onclick="showPassword('password')">👁️</button>
                            </div>
                            <span id="passwordMsg"></span>
                        </div>
                        <div class="form-group">
                            <label for="confirm-password">Confirm Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="confirmpassword" id="confirmPassword" placeholder="Confirm your password">
                                <button type="button" class="view-button" onclick="showPassword('confirmPassword')">👁️</button>
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
