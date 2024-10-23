<?php
include_once('header.php');

// Enable error reporting for debugging
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
?>

<section class="bg-light py-5">
    <main class="container mt-1">
        <h1 class="mb-5 text-center">Contact Us</h1>

        <!-- Contact Form -->
        <section class="mb-5">
            <!-- <h2 class="mb-4">Get in Touch</h2> -->
            <div class="row">
                <div class="col-md-6 mb-3">
                    <img src="../images/contactUsImg.jpg" alt="Contact Us" class="img-fluid rounded">
                </div>
                <?php
                $email = $_SESSION['user_username'];
                $q = "select * from user_tbl where u_email='$email' ";
                $result = mysqli_query($con, $q);
                $r = mysqli_fetch_assoc($result)
                    ?>
                <div class="col-md-6">
                    <form onsubmit="return contactValidation()" method="post">
                        <div class="mb-3">
                            <label for="contactName" class="form-label">Name</label>
                            <input type="text" id="contactName" value="<?php echo $r['u_fullname']; ?>" name="fname"
                                class="form-control" required>
                            <span id="contactNameMsg"></span>
                        </div>
                        <div class="mb-3">
                            <label for="contactEmail" class="form-label">Email</label>
                            <input type="email" id="contactEmail" value="<?php echo $r['u_email']; ?>" name="email"
                                class="form-control" required>
                            <span id="contactEmailMsg"></span>
                        </div>

                        <div class="mb-3">
                            <label for="contactMessage" class="form-label">Message</label>
                            <textarea id="contactMessage" name="msg" class="form-control" rows="4" required></textarea>
                        </div>
                        <input type='submit' name='contact' value='Send Message' class="buy-now">
                    </form>
                </div>
            </div>
        </section>
    </main>
</section>
<br /><br />

<?php
include_once('footer.php');

if (isset($_POST['contact'])) {
    $name = $_POST['fname'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];

    $q = "INSERT INTO `contact_us_tbl`(`c_name`, `c_email`, `c_msg`) VALUES ('$name','$email','$msg')";

    if (mysqli_query($con, $q)) {
        ?>
        <script>
            alert("Message sent successfully !!");
            window.location.href = "index.php";
        </script>
        <?php
    } else {
        ?>

        <script>
            alert("Message not sent !!");
            window.location.href = "index.php";
        </script>
        <?php
    }
}
?>