<?php
include_once 'header.php';
include_once '../conn.php';
session_start();
if (!isset($_SESSION['user_username'])) {
    ?>
    <script>
        window.location.href = "../index.php";
    </script>
    <?php
    exit();
}
?>

<!-- Change Password Section -->
<section class="change-password bg-light py-5">
    <div class="container">
        <h2 class="mb-4 text-center">Change Password</h2>
        <form action="change-password.php" method="post" onsubmit="return changePassword_validation()">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <fieldset>

                        <!-- Old Password -->
                        <div class="form-group mb-3">
                            <label for="old-password">Old Password</label>
                            <input type="password" id="oldPassword" name="old_password" class="form-control">
                            <span id="oldPasswordMsg"></span>
                        </div>

                        <!-- New Password -->
                        <div class="form-group mb-3">
                            <label for="new-password">New Password</label>
                            <input type="password" id="newPassword" name="new_password" class="form-control">
                            <span id="newPasswordMsg"></span>
                        </div>

                        <!-- Confirm New Password -->
                        <div class="form-group mb-3">
                            <label for="confirm-new-password">Confirm New Password</label>
                            <input type="password" id="confirmNewPassword" name="confirm_new_password"
                                class="form-control">
                            <span id="confirmNewPasswordMsg"></span>
                        </div>
                    </fieldset>
                </div>
            </div>

            <!-- Submit Button -->
            <br />
            <div style="text-align: center;">
                <input type='submit' name='change_password' value='Change Password' class="buy-now">
            </div>
        </form>
    </div>
</section>
<?php
//     }
// }
?>
<br /><br />
<?php
include_once 'footer.php';

if (isset($_POST['change_password'])) {
    $old_pwd = $_POST['old_password'];
    $new_pwd = $_POST['new_password'];
    $em = $_SESSION['user_username'];

    $q = "select * from user_tbl where `u_email`='$em'";
    $result = mysqli_query($con, $q);
    while ($r = mysqli_fetch_assoc($result)) {
        if ($r['u_password'] == $old_pwd) {
            $q = "UPDATE user_tbl SET u_password='$new_pwd' WHERE u_email='$em'";
            if (mysqli_query($con, $q)) {
                setcookie('success', 'Password changed successfully', time() + 5, "/");
                ?>
                <script>
                    // alert("password is updated !!");
                    window.location.href = "profile.php";
                </script>
                <?php
            } else {
                setcookie('error', 'Failed to change password', time() + 5, "/");
                ?>
                <script>
                    // alert("password is not updated !!");
                    window.location.href = "profile.php";
                </script>
                <?php
            }
        } else {
            setcookie('error', 'Incorrect Old Password', time() + 5, "/");
            ?>
            <script>
                // alert("Incorrect old password !!");
                window.location.href = "change-password.php";
            </script>
            <?php
        }
    }
}
?>