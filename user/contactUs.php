<?php 
include_once('header.php');
include_once('db_connection.php'); // Ensure you include your database connection file

// Enable error reporting
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

    // Use prepared statements to prevent SQL injection
    $stmt = $con->prepare("INSERT INTO contact_tbl (Co_Name, Co_Email, Co_Msg, Co_Reply) VALUES (?, ?, ?, '')");
    $stmt->bind_param("sss", $name, $email, $msg);

    if ($stmt->execute()) {
        setcookie('success', 'Query sent successfully.', time() + 5, "/");
    } else {
        setcookie('error', 'Error in sending query: ' . $stmt->error, time() + 5, "/");
    }

    $stmt->close(); // Close the statement
}
?>