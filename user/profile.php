<?php
include_once 'header.php';
include_once '../conn.php';
session_start();
if (!isset($_SESSION['user_username'])) {
    echo "<script>window.location.href = '../signin.php';</script>";
    exit();
}
if (isset($_SESSION['user_username'])) {
    $email = $_SESSION['user_username'];
    $q = "SELECT * FROM user_tbl WHERE u_email='$email'";
    $result = mysqli_query($con, $q);
    if (mysqli_num_rows($result)) {
        $r = mysqli_fetch_assoc($result);
        ?>
        <section class="user-profile-details bg-light py-5">
            <div class="container">
                <h2 class="mb-4 text-center">Profile Details</h2>
                <div class="row">
                    <!-- Profile Picture and Basic Info -->
                    <div class="col-md-4 text-center mb-4">
                        <div class="profile-picture mb-3">
                            <!-- Fix profile picture size and responsiveness -->
                            <img src="<?php echo $r['u_image']; ?>" alt="<?php echo $r['u_fullname']; ?>"
                                class="img-fluid rounded-circle" style="width: 260px; height: 275px; object-fit: cover;">
                        </div>
                        <h4 class="user-name"><?php echo $r['u_fullname']; ?></h4>
                        <p class="text-muted"><?php echo $r['u_email']; ?></p>
                        <a href="update-profile.php" class="buy-now mb-5">Update Profile</a><br><br>
                        <a href="change-password.php" class="buy-now">Change Password</a>
                    </div>

                    <!-- Profile Information -->
                    <div class="col-md-8">
                        <!-- Personal Information Section -->
                        <fieldset class="border border-dark rounded p-3 mb-4">
                            <legend class="w-auto">Personal Information</legend>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="full-name">Full Name</label>
                                    <p id="full-name" class="form-control-static"><?php echo $r['u_fullname']; ?></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="gender">Gender</label>
                                    <p id="gender" class="form-control-static"><?php echo $r['u_gender']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="email">Email Address</label>
                                    <p id="email" class="form-control-static"><?php echo $r['u_email']; ?></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone">Phone Number</label>
                                    <p id="phone" class="form-control-static"><?php echo $r['u_mobile']; ?></p>
                                </div>
                            </div>
                        </fieldset>

                        <!-- Address Information Section -->
                        <fieldset class="border border-dark rounded p-3">
                            <legend class="w-auto">Address Information</legend>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="address">Address</label>
                                    <p id="address" class="form-control-static"><?php echo $r['u_address']; ?></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="city">City</label>
                                    <p id="city" class="form-control-static"><?php echo $r['u_city']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="state">State</label>
                                    <p id="state" class="form-control-static"><?php echo $r['u_state']; ?></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="zip">Pin Code</label>
                                    <p id="zip" class="form-control-static"><?php echo $r['u_pincode']; ?></p>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}
?>
<br /><br />
<?php
include_once 'footer.php';
?>