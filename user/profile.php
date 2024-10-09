<?php
include_once 'header.php';
include_once '../conn.php';
session_start();
if (isset($_SESSION['user_username'])) {
    $email = $_SESSION['user_username'];
    $q = "select * from user_tbl where u_email='$email'";
    $result = mysqli_query($con, $q);
    if (mysqli_num_rows($result)) {
        $r = mysqli_fetch_assoc($result)
            ?>

        <!-- User Profile Details Section -->
        <section class="user-profile-details bg-light py-5">
            <div class="container">
                <h2 class="mb-4 text-center">Profile Details</h2>
                <div class="row">
                    <!-- Profile Picture and Basic Info -->
                    <div class="col-md-4 text-center">
                        <div class="profile-picture mb-3">
                            <img src="<?php echo
                                $r['u_image']; ?>" alt="<?php echo $r['u_fullname']; ?>"
                                class="img-fluid rounded-circle" style="max-width: 300px; max-height: 250px;">
                        </div>
                        <h4 class="user-name"><?php echo $r['u_fullname']; ?></h4>
                        <p class="text-muted"><?php echo $r['u_email']; ?></p>
                        <a href="update-profile.php"><input type='submit' name='update' value='Update Profile'
                                class='buy-now'></a><br><br>
                        <a href="change-password.php"><input type='submit' name='changePassword' value='Change Password'
                                class='buy-now'></a>
                    </div>

                    <!-- Profile Information -->
                    <div class="col-md-8">
                        <fieldset>
                            <legend>Personal Information</legend>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="full-name">Full Name</label>
                                    <p id="full-name" class="form-control-static"><?php echo $r['u_fullname']; ?></p>
                                </div>
                                <div class="col-md-6">
                                    <label for="phone">Gender</label>
                                    <p id="phone" class="form-control-static"><?php echo $r['u_gender']; ?></p>
                                </div>
                            </div>
                            <div class="row mb-3">
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

                        <fieldset class="mt-4">
                            <legend>Address Information</legend>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="address">Address</label>
                                    <p id="address" class="form-control-static"><?php echo $r['u_address']; ?></p>
                                </div>
                                <div class="col-md-6">
                                    <label for="city">City</label>
                                    <p id="city" class="form-control-static"><?php echo $r['u_city']; ?></p>
                                </div>
                            </div>
                            <div class="row mb-3">
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

                        <!-- <fieldset class="mt-4">
                            <legend>Password Information</legend>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="password">Password</label>
                                    <p id="password" class="form-control-static">********</p>
                                </div>
                            </div>
                        </fieldset> -->
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