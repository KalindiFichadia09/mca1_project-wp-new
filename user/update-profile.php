<?php
    include_once 'header.php';
?>

<!-- Update Profile Section -->
<section class="update-profile bg-light py-5">
    <div class="container">
        <h2 class="mb-4 text-center">Update Profile</h2>
        <form action="" method="post" onsubmit="return updateProfileValidation()">
            <div class="row">
                <!-- Personal Information -->
                <div class="col-md-6">
                    <fieldset>
                        <legend>Personal Information</legend>
                        <div class="form-group mb-3">
                            <label for="full-name">Full Name</label>
                            <input type="text" id="fullName" name="full_name" class="form-control">
                            <span id="fullNameMsg"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="full-name">Gender</label>
                            <div class="form-control">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="genderMale" value="Male">
                                    <label class="form-check-label" for="genderMale">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="Female">
                                    <label class="form-check-label" for="genderFemale">Female</label>
                                </div>
                            </div>
                            <span id="genderMsg"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" class="form-control">
                            <span id="emailMsg"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone">Mobile</label>
                            <input type="tel" id="mobile" name="phone" class="form-control">
                            <span id="mobileMsg"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone">Profile Photo</label>
                            <input type="file" id="profilePhoto" name="profilePhoto" class="form-control">
                            <span id="profilePhotoMsg"></span>
                        </div>
                    </fieldset>
                </div>

                <!-- Address Information -->
                <div class="col-md-6">
                    <fieldset>
                        <legend>Address Information</legend>
                        <div class="form-group mb-3">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" class="form-control">
                            <span id="addressMsg"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="city">City</label>
                            <input type="text" id="city" name="city" class="form-control">
                            <span id="cityMsg"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="state">State</label>
                            <input type="text" id="state" name="state" class="form-control">
                            <span id="stateMsg"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="zip">Pin Code</label>
                            <input type="text" id="pincode" name="pincode" class="form-control">
                            <span id="pincodeMsg"></span>
                        </div>
                    </fieldset>
                </div>
            </div>

            <!-- <div class="row">
                <div class="col-md-6">
                    <fieldset>
                        <legend>Update Password</legend>
                        <div class="form-group mb-3">
                            <label for="current-password">Current Password</label>
                            <input type="password" id="currentPassword" name="current_password" class="form-control">
                            <span id="currentPasswordMsg"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="new-password">New Password</label>
                            <input type="password" id="newPassword" name="new_password" class="form-control">
                            <span id="newPassword"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="confirm-password">Confirm New Password</label>
                            <input type="password" id="confirmPassword" name="confirm_password" class="form-control">
                            <span id="confirmPassword"></span>
                        </div>
                    </fieldset>
                </div>
            </div> -->

            <br/>
            <!-- Submit Button -->
            <div style="text-align: center;">
                <a href="profile.php" style="padding: 10px 20px; font-size: 16px;"><input type='submit' name='update' value='Update Profile' class="buy-now"></a>
            </div>
        </form>
    </div>
</section>
<br/><br/>
<?php
    include_once 'footer.php';
?>