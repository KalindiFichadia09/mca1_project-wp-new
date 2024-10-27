<?php
include_once 'header.php';
if (isset($_SESSION['admin_username'])) {
    $email = $_SESSION['admin_username'];
    $q = "select * from user_tbl where u_email='$email'";
    $result = mysqli_query($con, $q);
    if (mysqli_num_rows($result)) {
        $r = mysqli_fetch_assoc($result)
            ?>

        <div class="container mt-5 pt-4">
            <h2 class="mb-3 text-center">Profile Details</h2>
            <div class="row">
                <!-- Profile Picture and Basic Info -->
                <div class="col-md-4 text-center col-md mb-3">
                    <div class="profile-picture mb-3">
                        <img src="<?php echo $r['u_image']; ?>" alt="<?php echo $r['u_fullname']; ?>"
                            class="img-fluid rounded-circle">
                    </div>
                    <h4 class="user-name"><?php echo $r['u_fullname']; ?></h4>
                    <p class="text-muted"><?php echo $r['u_email']; ?></p>
                    <a href="update-profile.php"><input type='submit' name='update' value='Update Profile'
                            class='btn btn-secondary'></a><br><br>
                    <a href="change-password.php"><input type='submit' name='changePassword' value='Change Password'
                            class='btn btn-secondary border rounded'></a>
                </div>

                <!-- Profile Information -->
                <div class="col-md-8">
                    <!-- Personal Information Section -->
                    <fieldset class="border border-dark rounded p-3 mb-3">
                        <legend class="w-auto">Personal Information</legend>
                        <div class="row mb-0">
                            <div class="col-md-6">
                                <label for="full-name">Full Name</label>
                                <p id="full-name" class="form-control-static"><?php echo $r['u_fullname']; ?></p>
                            </div>
                            <div class="col-md-6">
                                <label for="gender">Gender</label>
                                <p id="gender" class="form-control-static"><?php echo $r['u_gender']; ?></p>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6">
                                <label for="email">Email Address</label>
                                <p id="email" class="form-control-static"><?php echo $r['u_email']; ?></p>
                            </div>
                            <div class="col-md-6">
                                <label for="phone">Phone Number</label>
                                <p id="phone" class="form-control-static"><?php echo $r['u_mobile']; ?></p>
                            </div>
                        </div>
                    </fieldset>

                    <!-- Address Information Section -->
                    <fieldset class="border border-dark rounded p-3 mb-3">
                        <legend class="w-auto">Address Information</legend>
                        <div class="row mb-0">
                            <div class="col-md-6">
                                <label for="address">Address</label>
                                <p id="address" class="form-control-static"><?php echo $r['u_address']; ?></p>
                            </div>
                            <div class="col-md-6">
                                <label for="city">City</label>
                                <p id="city" class="form-control-static"><?php echo $r['u_city']; ?></p>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6">
                                <label for="state">State</label>
                                <p id="state" class="form-control-static"><?php echo $r['u_state']; ?></p>
                            </div>
                            <div class="col-md-6">
                                <label for="zip">ZIP Code</label>
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