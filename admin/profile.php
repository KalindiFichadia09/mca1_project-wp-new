<?php
include_once 'header.php';
if (isset($_SESSION['admin_username'])) {
    $email = $_SESSION['admin_username'];
    $q = "SELECT * FROM user_tbl WHERE u_email='$email'";
    $result = mysqli_query($con, $q);
    if (mysqli_num_rows($result)) {
        $r = mysqli_fetch_assoc($result);
        ?>

        <div class="container mt-5 pt-4">
            <h2 class="mb-4 text-center">Profile Details</h2>
            <div class="row">
                <!-- Profile Picture and Basic Info -->
                <div class="col-md-4 text-center mb-4">
                    <div class="profile-picture mb-3">
                        <!-- Ensure proper responsiveness and circular profile picture -->
                        <img src="<?php echo $r['u_image']; ?>" alt="<?php echo $r['u_fullname']; ?>"
                            class="img-fluid rounded-circle border mr-2"
                            style="width: 230px; height: 250px; object-fit: cover;">
                    </div>
                    <h4 class="user-name"><?php echo $r['u_fullname']; ?></h4>
                    <p class="text-muted"><?php echo $r['u_email']; ?></p>
                    <a href="update-profile.php" class="btn btn-secondary btn-sm mb-2">Update Profile</a><br>
                    <a href="change-password.php" class="btn btn-secondary btn-sm">Change Password</a>
                </div>

                <!-- Profile Information -->
                <div class="col-md-8">
                    <!-- Personal Information Section -->
                    <fieldset class="border border-dark rounded p-2 mb-3">
                        <legend class="w-auto font-weight-bold">Personal Information</legend>
                        <div class="row">
                            <div class="col-md-6 col-12 ">
                                <label for="full-name" class="form-label">Full Name</label>
                                <p id="full-name" class="form-control-static"><?php echo $r['u_fullname']; ?></p>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="gender" class="form-label">Gender</label>
                                <p id="gender" class="form-control-static"><?php echo $r['u_gender']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <label for="email" class="form-label">Email Address</label>
                                <p id="email" class="form-control-static"><?php echo $r['u_email']; ?></p>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="phone" class="form-label">Phone Number</label>
                                <p id="phone" class="form-control-static"><?php echo $r['u_mobile']; ?></p>
                            </div>
                        </div>
                    </fieldset>

                    <!-- Address Information Section -->
                    <fieldset class="border border-dark rounded p-2">
                        <legend class="w-auto font-weight-bold">Address Information</legend>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <label for="address" class="form-label">Address</label>
                                <p id="address" class="form-control-static"><?php echo $r['u_address']; ?></p>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="city" class="form-label">City</label>
                                <p id="city" class="form-control-static"><?php echo $r['u_city']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <label for="state" class="form-label">State</label>
                                <p id="state" class="form-control-static"><?php echo $r['u_state']; ?></p>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="zip" class="form-label">ZIP Code</label>
                                <p id="zip" class="form-control-static"><?php echo $r['u_pincode']; ?></p>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
        <?php
    }
}
?>