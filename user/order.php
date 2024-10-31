<?php
include_once 'header.php';
include_once '../conn.php';
session_start();

if (!isset($_SESSION['user_username'])) {
    echo "<script>window.location.href = '../signin.php';</script>";
    exit();
}

$email = $_SESSION['user_username'];
$q = "SELECT * FROM user_tbl WHERE u_email='$email'";
$result = mysqli_query($con, $q);
if (mysqli_num_rows($result)) {
    $r = mysqli_fetch_assoc($result);

    // Retrieve p_code and qty from URL
    $P_Code = isset($_GET['p_code']) ? $_GET['p_code'] : '';
    $qty = isset($_GET['qty']) ? (int) $_GET['qty'] : 1; // Default to 1 if not set

    // Fetch product details
    $sql = "SELECT * FROM product_tbl WHERE p_code='$P_Code'";
    $data = mysqli_query($con, $sql);
    if (mysqli_num_rows($data) > 0) {
        $product = mysqli_fetch_assoc($data);
        $totalPrice = $product['p_total_price'] * $qty; // Calculate total price

        // Process the form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fullName = $_POST['full_name'];
            $phone = $_POST['phone'];
            $shippingAddress = $_POST['shipping_address'];
            $shippingCity = $_POST['shipping_city'];
            $shippingState = $_POST['shipping_state'];
            $shippingZip = $_POST['shipping_zip'];
            $billingAddress = $_POST['billing_address'];
            $billingCity = $_POST['billing_city'];
            $billingState = $_POST['billing_state'];
            $billingZip = $_POST['billing_zip'];
            $paymentMethod = $_POST['payment_method'];

            // Prepare to insert the order
            $orderCode = uniqid('ORD'); // Generate unique order code
            $orderDate = date('Y-m-d H:i:s');
            $deliveryDate = date('Y-m-d H:i:s', strtotime('+7 days')); // Assuming 7 days delivery

            // Insert the order
            $insertOrder = "INSERT INTO order_tbl (o_code, o_username, o_total_price, o_status, o_date, o_delivery_date, o_shipping_address, o_payment_method)
                            VALUES ('$orderCode', '$email', '$totalPrice', 'Pending', '$orderDate', '$deliveryDate', '$shippingAddress, $shippingCity, $shippingState, $shippingZip', '$paymentMethod')";

            if (mysqli_query($con, $insertOrder)) {
                echo "<script>alert('Order placed successfully!');</script>";
            } else {
                echo "<script>alert('Failed to place order.');</script>";
            }
        }
        ?>

        <!-- Order Now Section -->
        <section class="order-now py-5 bg-light">
            <div class="container">
                <h2 class="mb-4 text-center">Order Now</h2>
                <form action="" method="post">
                    <div class="row mb-3">
                        <!-- Customer Information -->
                        <div class="col-md-6">
                            <fieldset>
                                <legend>Customer Information</legend>
                                <div class="form-group mb-3">
                                    <label for="full-name">Full Name</label>
                                    <input type="text" value="<?php echo $r['u_fullname']; ?>" id="fullName" name="full_name"
                                        class="form-control" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email">Email Address</label>
                                    <input type="email" value="<?php echo $r['u_email']; ?>" id="email" name="email"
                                        class="form-control" readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="phone">Phone Number</label>
                                    <input type="tel" value="<?php echo $r['u_mobile']; ?>" id="mobile" name="phone"
                                        class="form-control" required>
                                </div>
                            </fieldset>
                        </div>

                        <!-- Shipping Address -->
                        <div class="col-md-6">
                            <fieldset>
                                <legend>Shipping Address</legend>
                                <div class="form-group mb-3">
                                    <label for="address">Address</label>
                                    <input type="text" value="<?php echo $r['u_address']; ?>" id="address"
                                        name="shipping_address" class="form-control" required>
                                </div>
                                <div class="row form-group mb-3">
                                    <div class="col-6">
                                        <label for="city">City</label>
                                        <input type="text" value="<?php echo $r['u_city']; ?>" id="city" name="shipping_city"
                                            class="form-control" required>
                                    </div>
                                    <div class="col-6">
                                        <label for="state">State</label>
                                        <input type="text" value="<?php echo $r['u_state']; ?>" id="state" name="shipping_state"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="zip">Pin Code</label>
                                    <input type="text" value="<?php echo $r['u_pincode']; ?>" id="pincode" name="shipping_zip"
                                        class="form-control" required>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <!-- Billing Address -->
                        <div class="col-md-6">
                            <fieldset>
                                <legend>Billing Address</legend>
                                <div class="form-group mb-3">
                                    <label for="billing-address">Address</label>
                                    <input type="text" value="<?php echo $r['u_address']; ?>" id="billingAddress"
                                        name="billing_address" class="form-control" required>
                                </div>
                                <div class="row form-group mb-3">
                                    <div class="col-6">
                                        <label for="billing-city">City</label>
                                        <input type="text" value="<?php echo $r['u_city']; ?>" id="billingCity"
                                            name="billing_city" class="form-control" required>
                                    </div>
                                    <div class="col-6">
                                        <label for="billing-state">State</label>
                                        <input type="text" value="<?php echo $r['u_state']; ?>" id="billingState"
                                            name="billing_state" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="billing-zip">Pin Code</label>
                                    <input type="text" value="<?php echo $r['u_pincode']; ?>" id="billingPincode"
                                        name="billing_zip" class="form-control" required>
                                </div>
                            </fieldset>
                        </div>

                        <!-- Order Summary -->
                        <div class="col-md-6">
                            <fieldset>
                                <legend>Order Summary</legend>
                                <div class="media">
                                    <img src="<?php echo $product['p_image']; ?>" class="mr-3" style="width:140px;height:100px;"
                                        alt="Product Image">
                                    <div class="media-body">
                                        <h5 class="mt-0"><?php echo $product['p_name']; ?></h5>
                                        <p><strong>Quantity:</strong> <?php echo $qty; ?></p>
                                        <p><strong>Price:</strong> ₹<?php echo number_format($totalPrice, 2); ?></p>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <!-- Payment Method -->
                    <fieldset>
                        <legend>Payment Method</legend>
                        <div class="form-group">
                            <input type="radio" name="payment_method" value="Credit Card" required> Credit Card
                            <input type="radio" name="payment_method" value="Debit Card"> Debit Card
                            <input type="radio" name="payment_method" value="Cash on Delivery"> Cash on Delivery
                            <input type="radio" name="payment_method" value="Net Banking"> Net Banking
                            <input type="radio" name="payment_method" value="UPI"> UPI
                        </div>
                    </fieldset>

                    <!-- Submit Button -->
                    <div class="text-center mt-4">
                        <input type="submit" name="order" value="Place Order" class="btn buy-now">
                    </div>
                </form>
            </div>
        </section>
        <?php
    } else {
        echo "<div class='alert alert-danger'>Product not found.</div>";
    }
}
?>