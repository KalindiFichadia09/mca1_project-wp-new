<?php
include_once 'header.php';
include_once '../conn.php';
session_start();
if (isset($_SESSION['user_username'])) {
    $email = $_SESSION['user_username'];
    $q = "select * from user_tbl where u_email='$email'";
    $result = mysqli_query($con, $q);
    $r = mysqli_fetch_assoc($result);
    ?>

    <!-- Update Profile Section -->
    <section class="update-profile bg-light py-5">
        <div class="container">
            <h2 class="mb-4 text-center">Update Profile</h2>
            <form method="post" enctype="multipart/form-data" onsubmit="return updateProfileValidation()">
                <div class="row">
                    <!-- Personal Information -->
                    <div class="col-md-6">
                        <fieldset>
                            <legend>Personal Information</legend>
                            <input type="hidden" name="u_id" value="<?php echo $r['u_id']; ?>">
                            <div class="form-group mb-3">
                                <label for="full-name">Full Name</label>
                                <input type="text" id="fullName" name="u_fullname" value="<?php echo $r['u_fullname']; ?>"
                                    class="form-control">
                                <span id="fullNameMsg"></span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="full-name">Gender</label>
                                <div class="form-control">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="u_gender" id="genderMale"
                                            value="male" <?php if ($r['u_gender'] == "male")
                                                echo "checked"; ?>>
                                        <label class="form-check-label" for="genderMale">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="u_gender" id="genderFemale"
                                            value="female" <?php if ($r['u_gender'] == "female")
                                                echo "checked"; ?>>
                                        <label class="form-check-label" for="genderFemale">Female</label>
                                    </div>
                                </div>
                                <span id="genderMsg"></span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="u_email" value="<?php echo $r['u_email']; ?>"
                                    class="form-control" readonly>
                                <span id="emailMsg"></span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="phone">Mobile</label>
                                <input type="tel" id="mobile" name="u_mobile" value="<?php echo $r['u_mobile']; ?>"
                                    class="form-control">
                                <span id="mobileMsg"></span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="phone">Profile Photo</label>
                                <input type="file" id="profilePhoto" name="u_image" class="form-control">
                                <!-- <span id="profilePhotoMsg"></span> -->
                            </div>
                        </fieldset>
                    </div>

                    <!-- Address Information -->
                    <div class="col-md-6">
                        <fieldset>
                            <legend>Address Information</legend>
                            <div class="form-group mb-3">
                                <label for="address">Address</label>
                                <input type="text" id="address" name="u_address" value="<?php echo $r['u_address']; ?>"
                                    class="form-control">
                                <span id="addressMsg"></span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="city">City</label>
                                <input type="text" id="city" name="u_city" value="<?php echo $r['u_city']; ?>"
                                    class="form-control">
                                <span id="cityMsg"></span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="state">State</label>
                                <input type="text" id="state" name="u_state" value="<?php echo $r['u_state']; ?>"
                                    class="form-control">
                                <span id="stateMsg"></span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="zip">Pin Code</label>
                                <input type="text" id="pincode" name="u_pincode" value="<?php echo $r['u_pincode']; ?>"
                                    class="form-control">
                                <span id="pincodeMsg"></span>
                            </div>
                        </fieldset>
                    </div>
                </div>

                <br />
                <!-- Submit Button -->
                <div style="text-align: center;">
                    <a href="profile.php" style="padding: 10px 20px; font-size: 16px;">
                        <input type='submit' name='update' value='Update Profile' class="buy-now">
                    </a>
                </div>
            </form>
        </div>
    </section>
    <br /><br />
    <?php
    include_once 'footer.php';
    if (isset($_POST['update'])) {
        $profile_picture;
        $u_id = $_POST['u_id']; 
        $u_fullName = $_POST['u_fullname'];
        $u_gender = $_POST['u_gender'];
        $u_email = $_POST['u_email'];
        $u_mobile = $_POST['u_mobile'];
        $u_address = $_POST['u_address'];
        $u_city = $_POST['u_city'];
        $u_state = $_POST['u_state'];
        $u_pincode = $_POST['u_pincode'];
        $u_status = "Active";
        $u_role = "User";

        if ($_FILES['u_image']['name'] != "") {
            $profile_picture = $_FILES['u_image']['name'];

            $temp = $_FILES['u_image']['tmp_name'];
            $profile_picture = "../images/profile_image/" . uniqid() . $profile_picture;
            move_uploaded_file($temp, $profile_picture);
        } else {
            $profile_picture = $r['u_image'];
        }
        
        $update_query = "UPDATE user_tbl SET u_fullname='$u_fullName', u_gender='$u_gender', u_email='$u_email', u_mobile='$u_mobile', u_address='$u_address', u_city='$u_city', u_state='$u_state', u_pincode='$u_pincode', u_image='$profile_picture' WHERE u_id='$u_id' AND u_role='$u_role'";
        echo $update_query;
        if (mysqli_query($con, $update_query)) {
            if ($profile_picture != $r['u_image']) {
                $old_profile_picture = $r['u_image'];
                if (file_exists($old_profile_picture)) {
                    unlink($old_profile_picture);
                }
            }
            setcookie("success", "Profile updated successfully", time() + 5, "/");
            ?>
                <script>
                    window.location.href = 'profile.php';
                </script>";
                <?php
        } else {
            setcookie("error", "Error in updating profie", time() + 5, "/");
            ?>
                <script>
                    window.location.href = 'profile.php';
                </script>
                <?php
        }

    }
}
?>