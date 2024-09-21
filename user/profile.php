<?php
    include_once 'header.php';
?>

<!-- User Profile Details Section -->
<section class="user-profile-details bg-light py-5">
    <div class="container">
        <h2 class="mb-4 text-center">Profile Details</h2>
        <div class="row">
            <!-- Profile Picture and Basic Info -->
            <div class="col-md-4 text-center">
                <div class="profile-picture mb-3">
                    <img src="../images/profile.jpg" alt="Profile Picture" class="img-fluid rounded-circle" style="max-width: 350px;">
                </div>
                <h4 class="user-name">John Doe</h4>
                <p class="text-muted">john.doe@example.com</p>
                <a href="update-profile.php"><input type='submit' name='update' value='Update Profile' class='buy-now'></a><br><br>
                <a href="change-password.php"><input type='submit' name='changePassword' value='Change Password' class='buy-now'></a>
            </div>

            <!-- Profile Information -->
            <div class="col-md-8">
                <fieldset>
                    <legend>Personal Information</legend>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="full-name">Full Name</label>
                            <p id="full-name" class="form-control-static">John Doe</p>
                        </div>
                        <div class="col-md-6">
                            <label for="email">Email Address</label>
                            <p id="email" class="form-control-static">john.doe@example.com</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="phone">Phone Number</label>
                            <p id="phone" class="form-control-static">+1 123-456-7890</p>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="mt-4">
                    <legend>Address Information</legend>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="address">Address</label>
                            <p id="address" class="form-control-static">1234 Elm Street</p>
                        </div>
                        <div class="col-md-6">
                            <label for="city">City</label>
                            <p id="city" class="form-control-static">Anytown</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="state">State</label>
                            <p id="state" class="form-control-static">CA</p>
                        </div>
                        <div class="col-md-6">
                            <label for="zip">ZIP Code</label>
                            <p id="zip" class="form-control-static">90210</p>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="mt-4">
                    <legend>Password Information</legend>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="password">Password</label>
                            <p id="password" class="form-control-static">********</p>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</section>
<br/><br/>
<?php
    include_once 'footer.php';
?>