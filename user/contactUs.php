<?php
include_once('header.php');

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<section class="bg-light py-5">
    <main class="container mt-1">
        <h1 class="mb-5 text-center">Contact Us</h1>

        <!-- Contact Form -->
        <section class="mb-5">
            <h2 class="mb-4">Get in Touch</h2>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <img src="../images/contactUsImg.jpg" alt="Contact Us" class="img-fluid rounded">
                </div>
                <div class="col-md-6">
                    <form action="index.php" onsubmit="return contactValidation()" method="post">
                        <div class="mb-3">
                            <label for="contactName" class="form-label">Name</label>
                            <input type="text" id="contactName" name="fname" class="form-control" required>
                            <span id="contactNameMsg"></span>
                        </div>
                        <div class="mb-3">
                            <label for="contactEmail" class="form-label">Email</label>
                            <input type="email" id="contactEmail" name="email" class="form-control" required>
                            <span id="contactEmailMsg"></span>
                        </div>
                        <div class="mb-3">
                            <label for="contactMessage" class="form-label">Message</label>
                            <textarea id="contactMessage" name="msg" class="form-control" rows="4" required></textarea>
                        </div>
                        <input type='submit' name='contactSub' value='Send Message' class="buy-now">
                    </form>
                </div>
            </div>
        </section>
    </main>
</section>
<br/><br/>

<?php 
include_once('footer.php');

if (isset($_POST['contactSub'])) {
    $name = $_POST['fname'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];

    // Ensure database connection is active
    if ($con === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    // Prepared statement to insert the data
    $stmt = $con->prepare("INSERT INTO contact_tbl (Co_Name, Co_Email, Co_Msg) VALUES (?, ?, ?)");

    // Check if the statement was prepared successfully
    if ($stmt === false) {
        die('Prepare() failed: ' . htmlspecialchars($con->error));
    }

    // Bind parameters (name, email, msg)
    $bind = $stmt->bind_param("sss", $name, $email, $msg);

    // Check if the binding was successful
    if ($bind === false) {
        die('bind_param() failed: ' . htmlspecialchars($stmt->error));
    }

    // Execute the statement and check for errors
    if ($stmt->execute()) {
        // Query successful
        setcookie('success', 'Query sent successfully.', time() + 5, "/");
    } else {
        // Display the actual error message for debugging
        setcookie('error', 'Error in sending query: ' . htmlspecialchars($stmt->error), time() + 5, "/");
    }

    // Close the statement
    $stmt->close();
}
?>
