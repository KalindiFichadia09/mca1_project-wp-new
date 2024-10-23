<?php
include_once 'header.php';

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
?>
<div class="container mt-5 pt-2">
    <!-- Title and Button Row -->
    <div class="row mt-5 mb-4">
        <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-start mb-2 mb-md-0">
            <h2 class="text-center text-md-left">Manage Contact</h2>
        </div>
    </div>

    <!-- Table for Categories -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle">
                    <!-- Update the thead class to 'thead-dark' -->
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Inqiery Id</th>
                            <th scope="col">User Name</th>
                            <th scope="col">User Email</th>
                            <th scope="col">Inqiery Message</th>
                            <th scope="col">Replied Message</th>
                            <th scope="col">Reply</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $q = "select * from contact_us_tbl";
                        $result = mysqli_query($con, $q);
                        $search = isset($_GET['search']) ? $_GET['search'] : '';

                        // SQL query to include the search condition
                        $search_query = '';
                        if (!empty($search)) {
                            $search_query = "WHERE c_name LIKE '%$search%'";
                        }
                        // Adding search_query into SQL query
                        $q = "Select * from contact_us_tbl $search_query";
                        $result = mysqli_query($con, $q);

                        // Determine the total number of records
                        $q = "SELECT * FROM contact_us_tbl $search_query";
                        $result = mysqli_query($con, $q);
                        $total_records = mysqli_num_rows($result);

                        // Set the number of records per page
                        $records_per_page = 3;

                        // Calculate the total number of pages
                        $total_pages = ceil($total_records / $records_per_page);

                        // Get the current page number
                        $page = isset($_GET['page']) ? $_GET['page'] : 1;

                        // Calculate the start record for the current page
                        $start_from = ($page - 1) * $records_per_page;

                        // Fetch the records for the current page
                        $q = "SELECT * FROM contact_us_tbl $search_query LIMIT $start_from, $records_per_page";
                        $result = mysqli_query($con, $q);

                        while ($r = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo $r['c_id']; ?></td>
                                <td><?php echo $r['c_name']; ?></td>
                                <td><?php echo $r['c_email']; ?></td>
                                <td><?php echo $r['c_msg']; ?></td>
                                <td><?php echo $r['c_reply_msg']; ?></td>
                                <td><button class="btn btn-primary btn-sm update-btn"
                                        data-target-update="#updateRow<?php echo $r['c_id']; ?>">Reply</button></td>
                                <td><form method="POST" action="">
                                    <input type="hidden" name="delete_id" value="<?php echo $r['c_id']; ?>">
                                        <button type="submit" name="delete" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this record?');">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <tr id="updateRow<?php echo $r['c_id']; ?>" class="update-row" style="display:none;">
                                <td colspan="7">
                                    <div id="formBlockUpdate" class="row formBlock mb-5">
                                        <div class="col-lg-8 col-md-10 mx-auto">
                                            <div class="form-block p-4">
                                                <form id="update" method="post" onsubmit="return categoryValidation();"
                                                    enctype="multipart/form-data">
                                                    <div class="row">
                                                        <input type="hidden" name="id" value="<?php echo $r['c_id']; ?>">
                                                        <input type="hidden" name="email"
                                                            value="<?php echo $r['c_email']; ?>">
                                                        <input type="hidden" name="name"
                                                            value="<?php echo $r['c_name']; ?>">
                                                        <div class="col-md-12">
                                                            <!-- Reply -->
                                                            <div class="form-group mb-3">
                                                                <label for="addressU">Reply</label>
                                                                <textarea class="form-control" id="addressU"
                                                                    name="reply_msg"placeholder="Enter Reply"></textarea>
                                                                <span id="addressMsgU"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Submit Button -->
                                                    <div class="d-flex justify-content-end mt-3">
                                                        <input type="submit" value="Reply" name="reply"
                                                            class="btn btn-success">
                                                        <!-- <button type="submit" class="btn btn-success">Reply</button> -->
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>

</html>
<?php
if (isset($_POST['reply'])) {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $reply_msg = $_POST['reply_msg'];

    $q = "UPDATE `contact_us_tbl` set `c_reply_msg`='$reply_msg' where `c_id` = '$id' ";

    if (mysqli_query($con, $q)) {
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'veloraa1920@gmail.com';
            $mail->Password = 'rtep efdy gepi yrqj ';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('veloraa1920@gmail.com', 'Veloraa');
            $mail->addAddress($email, $name);

            $mail->isHTML(true);
            $mail->Subject = 'Contact Us';
            $mail->Body = "Hello, $name</br>
                    Thank you for reaching us...</br>
                    $reply_msg";

            $mail->send();
        } catch (Exception $e) {
            setcookie('error', "Error in sending email: " . $mail->ErrorInfo, time() + 5);
        }
        setcookie('success', 'Reply sended.', time() + 5, "/");
        ?>

        <script>
            window.location.href = "contact.php";
        </script>
        <?php
    } else {
        // $_SESSION['error'] = "Error in Registration. Try again."
        setcookie('error', 'Error in sending reply. Try again.', time() + 5, "/");
        ?>

        <script>
            window.location.href = "contact.php";
        </script>
        <?php
    }
}
if (isset($_POST['delete'])) {
    $delete_id = $_POST['delete_id']; // Get the id of the row to delete

    // SQL query to delete the specific record
    $delete_query = "DELETE FROM contact_us_tbl WHERE c_id = '$delete_id'";

    // Execute the query and check if it was successful
    if (mysqli_query($con, $delete_query)) {
        echo "<script>confirm('Record deleted successfully');</script>";
    } else {
        echo "<script>confirm('Error deleting record');</script>";
    }

    // Redirect to refresh the page after deletion
    echo "<script>window.location.href = 'contact.php';</script>";
}
?>