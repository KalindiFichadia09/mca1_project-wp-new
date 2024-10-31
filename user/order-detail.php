<?php
include_once 'header.php';
include_once '../conn.php';
session_start();
if (!isset($_SESSION['user_username'])) {
    ?>
    <script>
        window.location.href = "../signin.php";
    </script>
    <?php
    exit();
}
if (isset($_SESSION['user_username'])) {
    $email = $_SESSION['user_username'];
    $q = "select * from user_tbl where u_email='$email'";
    $result = mysqli_query($con, $q);
    if (mysqli_num_rows($result)) {
        $r = mysqli_fetch_assoc($result)
            ?>

        <section class="order-details py-5">
            <div class="container">
                <h2 class="mb-4 text-center">Order Details</h2>

                <div class="row">
                    <!-- Order Information -->
                    <div class="col-md-6">
                        <fieldset>
                            <legend>Order Information</legend>
                            <p><strong>Order ID:</strong> #ORD12345</p>
                            <p><strong>Order Date:</strong> 2024-08-10</p>
                            <p><strong>Status:</strong> Completed</p>
                            <p><strong>Total Amount:</strong> ₹1,499.99</p>
                        </fieldset>
                    </div>

                    <!-- Customer Information -->
                    <div class="col-md-6">
                        <fieldset>
                            <legend>Customer Information</legend>
                            <p><strong>Name:</strong> <?php echo $r['u_fullname']; ?></p>
                            <p><strong>Email:</strong> <?php echo $r['u_email']; ?></p>
                            <p><strong>Phone:</strong> <?php echo $r['u_mobile']; ?></p>
                        </fieldset>
                    </div>
                </div>

                <div class="row">
                    <!-- Shipping Address -->
                    <div class="col-md-6">
                        <fieldset>
                            <legend>Shipping Address</legend>
                            <p><strong>Address:</strong> <?php echo $r['u_address']; ?></p>
                            <p><strong>City:</strong> <?php echo $r['u_city']; ?></p>
                            <p><strong>State:</strong> <?php echo $r['u_state']; ?></p>
                            <p><strong>Pin Code:</strong> <?php echo $r['u_pincode']; ?></p>
                        </fieldset>
                    </div>

                    <!-- Ordered Items -->
                    <div class="col-md-6">
                        <fieldset>
                            <legend>Ordered Items</legend>
                            <ul class="list-unstyled">
                                <li class="media mb-3">
                                    <div class="row">
                                        <div class="col-6">
                                            <img src="../images/product1(1).jpeg" class="mr-3" alt="Gold Necklace">
                                        </div>
                                        <div class="col-6">
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-1">Gold Necklace</h5>
                                                <p><strong>Quantity:</strong> 1</p>
                                                <p><strong>Price:</strong> ₹999.99</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </fieldset>
                    </div>
                </div>
            </div>
        </section>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <?php
    }
}
include_once('footer.php');
?>