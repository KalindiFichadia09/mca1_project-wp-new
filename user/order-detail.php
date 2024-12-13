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
    $eml = $_SESSION['user_username'];
    $o_id=$_GET['o_id'];
    $q = "SELECT * FROM `order_tbl` o INNER JOIN product_tbl p INNER JOIN user_tbl u on o.o_p_code = p.p_code AND o.o_username = u.u_email WHERE o.o_username = '$eml' AND o.o_id='$o_id' ";
    $result = mysqli_query($con, $q);
    if (mysqli_num_rows($result)) {
        $r = mysqli_fetch_assoc($result)
            ?>

        <section class="order-details py-5 bg-light">
            <div class="container">
                <h2 class="mb-4 text-center">Order Details</h2>

                <div class="row">
                    <!-- Order Information -->
                    <div class="col-md-6">
                        <fieldset>
                            <legend>Order Information</legend>
                            <p><strong>Order ID:</strong> <?php echo $r['o_order_id']; ?></p>
                            <p><strong>Order Date:</strong> <?php echo $r['o_date']; ?></p>
                            <p><strong>Status:</strong> <?php echo $r['o_delivery_status']; ?></p>
                            <p><strong>Total Amount:</strong> ₹<?php echo $r['o_total_amount']; ?></p>
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
                                    <div class="row g-0 align-items-center">
                                        <div class="col-3">
                                            <!-- Set fixed size for the image -->
                                            <img src="<?php echo $r['p_main_image']; ?>" class="img-fluid"
                                                style="width: 125px; height: 130px; object-fit: cover;"
                                                alt="<?php echo $r['p_name']; ?>">
                                        </div>
                                        <div class="col-9">
                                            <div class="media-body">
                                                <h4><?php echo $r['p_name']; ?></h4>
                                                <p><strong>Quantity:</strong> <?php echo $r['o_quentity']; ?></p>
                                                <p><strong>Price:</strong> ₹<?php echo $r['o_total_amount']; ?></p>
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