<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password - Jaysheree Jewels</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="../js/all_validation.js"></script>
    <script src="../js/user_script.js"></script>

    <style>
        body {
            background: url('../images/temp5.jpg') no-repeat center center fixed;
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
                    <form action="" onsubmit="return changePassword_validation()" method="post">
                        <div class="form-group">
                            <label for="current-password">Current Password</label>
                            <div class="input-group">
                                <input type="password" name="password" class="form-control" id="currentPassword" placeholder="Enter current password">
                                <button type="button" class="view-button" onclick="showPassword('currentPassword')">👁️</button>
                            </div>
                            <span id="currentPasswordMsg"></span>
                        </div>
                        <div class="form-group">
                            <label for="new-password">New Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="newPassword" name="new-password" placeholder="Enter new password">
                                <button type="button" class="view-button" onclick="showPassword('newPassword')">👁️</button>
                            </div>
                            <span id="newPasswordMsg"></span>
                        </div>
                        <div class="form-group">
                            <label for="confirm-password">Confirm New Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="confirmPassword" name="confirm-password" placeholder="Confirm new password">
                                <button type="button" class="view-button" onclick="showPassword('confirmPassword')">👁️</button>
                            </div>
                            <span id="confirmPasswordMsg"></span>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Change</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
