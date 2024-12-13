<?php
include_once 'header.php';
include_once '../conn.php';
session_start();
if (!isset($_SESSION['user_username'])) {
    $eml = $_SESSION['user_username'];
    ?>
    <script>
        window.location.href = "../signin.php";
    </script>
    <?php
    exit();
}

// Handle product removal
if (isset($_GET['remove_id'])) {
    $removeId = $_GET['remove_id'];
    $email = $_SESSION['user_username'];
    $deleteQuery = "DELETE FROM cart_tbl WHERE ct_p_code = '$removeId' AND ct_username = '$email'";
    mysqli_query($con, $deleteQuery);
    header("Location: cart.php"); // Refresh the page after removal
    exit();
}
?>

<!-- Cart Section -->
<section class="cart-section py-5 bg-light">
    <div class="container">
        <h2 class="mb-4 text-center">Your Cart</h2>
        <form action="order.php" method="post" id="order-form">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $grandTotal = 0;
                        if (isset($_SESSION['user_username'])) {
                            $email = $_SESSION['user_username'];
                            $q = "SELECT * FROM product_tbl P 
                                  INNER JOIN sub_category_tbl SC ON P.p_sc_code = SC.sc_code 
                                  WHERE p_code IN (SELECT ct_p_code FROM cart_tbl WHERE ct_username = '$email')";
                            $result = mysqli_query($con, $q);

                            while ($r = mysqli_fetch_assoc($result)) {
                                $price = $r['p_discount_price'];
                                $quantity = 1; // Default quantity
                                $rowTotal = $price * $quantity;
                                $grandTotal += $rowTotal;
                                ?>
                                <tr>
                                    <td><img src="<?php echo $r['p_main_image']; ?>" class="img-fluid" alt="<?php echo $r['p_name']; ?>" width="100"></td>
                                    <td><?php echo $r['p_name']; ?></td>
                                    <td><?php echo $r['sc_name']; ?></td>
                                    <td>₹ <?php echo number_format($price, 2); ?></td>
                                    <td>
                                        <input type="number" name="quantity[]" class="form-control quantity" style="width: 60px;" value="1" min="1"
                                               data-price="<?php echo $price; ?>" data-code="<?php echo $r['p_code']; ?>" />
                                        <input type="hidden" name="product_code[]" value="<?php echo $r['p_code']; ?>" />
                                        <input type="hidden" name="product_price[]" value="<?php echo $price; ?>" />
                                    </td>
                                    <td class="row-total">₹ <?php echo number_format($rowTotal, 2); ?></td>
                                    <td>
                                        <a href="single-product.php?p_code=<?php echo $r['p_code']; ?>" class="btn btn-primary btn-sm">View Product</a>
                                        <a href="cart.php?remove_id=<?php echo $r['p_code']; ?>" class="btn btn-danger btn-sm mt-2"
                                           onclick="return confirm('Are you sure you want to remove this item?');">Remove</a>
                                    </td>
                                </tr>
                            <?php }
                        } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="text-right"><strong>Total</strong></td>
                            <td id="grand-total"><strong>₹ <?php echo number_format($grandTotal, 2); ?></strong></td>
                            <input type="hidden" name="grand_total" id="hidden-grand-total" value="<?php
                            $_SESSION['gt'] = $grandTotal;
                            echo $grandTotal; ?>" />
                            <td><button type="submit" class="buy-now">Order Now</button></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </form>
    </div>
    <!-- checkout form -->
        <div class="container card bgcolor mt-5 p-6" id="checkOut_form">
            <div class="row p-5">
                <!-- Images Column -->
                <div class="col-md-4">
                    <div class="product-image">
                        <form method="post" action="cart.php#checkOut_form">
                            <label for="anm" class="form-label">Offer Code:</label>
                            <input type="text" class="form-control" name="offercode" id="offercode">
                            <span id="offercode_er"></span><br>
                            <button class="buy-now" type="submit" name="offerApply">Apply</button>
                        </form>
                        <hr />

                        <table style="border: none; border-collapse: collapse; width: 100%;">
                            <tr style="border: none; padding: 10px;">
                                <td style="border: none; padding: 10px;text-align:start">
                                    Discount:
                                </td>
                                <td style="border: none; padding: 10px;text-align:end">
                                    <span id="discount_percentage"></span>
                                </td>
                            </tr>
                            <tr style="border: none; padding: 10px;">
                                <td style="border: none; padding: 10px;text-align:start">
                                    Discounted Amount:
                                </td>
                                <td style="border: none; padding: 10px;text-align:end">
                                    <span id="discount_amount"></span>
                                </td>
                            </tr>
                            <tr style="border: none; padding: 10px;">
                                <td style="border: none; padding: 10px;text-align:start">
                                    Total:
                                </td>
                                <td style="border: none; padding: 10px;text-align:end">
                                    <span id="new_cart_total"></span>
                                </td>
                            </tr>
                        </table>
                    <?php if (isset($_POST['offerApply'])) {
                        $cart_total = $_SESSION['gt'];
                        $offer = $_POST['offercode'];
                        $_SESSION['offer-name'] = $offer;

                        $checkCode = "select * from offers where offer_name='$offer' AND status='Active'";
                        $result = mysqli_query($con, $checkCode);
                        if (mysqli_num_rows($result) > 0) {
                            ?>
                            <script>
                                document.getElementById('offercode_er').style.color = "white";
                                document.getElementById('offercode_er').innerHTML = "Offercode applied successfully";
                            </script>
                            <?php
                            $data = mysqli_fetch_assoc($result);
                            $discount_percentage = $data['discount_percentage'];
                            $discount_amount = ($cart_total * $discount_percentage) / 100;
                            $order_total = $data['cart_total'];
                            $max_discount = $data['max_discount'];
                            $offer = $data['offer_name'];

                            // echo $discount_amount;
                            // echo $max_discount;
                    
                            if ($cart_total > $order_total) {

                                if ($discount_amount > $max_discount) {
                                    $discount_amount = $max_discount;
                                } else {
                                    $discount_amount = ($cart_total * $discount_percentage / 100);
                                }
                                $new_cart_total = $cart_total - $discount_amount;
                                ?>
                                <script>
                                    // document.getElementById('offer_code').innerHTML = '<?php echo $offer; ?>';
                                    document.getElementById('discount_percentage').innerHTML = '<?php echo $discount_percentage; ?>%';
                                    document.getElementById('discount_amount').innerHTML = 'Rs. <?php echo number_format($discount_amount, 2); ?>';
                                    document.getElementById('new_cart_total').innerHTML = 'Rs. <?php echo number_format($new_cart_total, 2); ?>';
                                </script>
                                <?php
                                // After calculating new_cart_total
                                $_SESSION['gt'] = $new_cart_total;

                            } else {
                                ?>
                                <script>
                                    document.getElementById('offercode_er').style.color = "red";
                                    document.getElementById('offercode_er').innerHTML = "To avail this offer cart total must be greater than <?php echo $order_total; ?>.";
                                </script>
                                <?php
                            }
                            // cart total session
                            $_SESSION['gt'] = $new_cart_total;

                        } else {
                            ?>
                            <script>
                                document.getElementById('offercode_er').style.color = "red";
                                document.getElementById('offercode_er').innerHTML = "Invalid Code";
                            </script>
                            <?php
                        }
                    } ?>
                </div>
            </div>
            <!-- Right Column -->
            <div class="col-md-8">
                <div class="product-image-large">
                    <!-- update information -->
                    <?php
                    $email = $_SESSION['user_username'];
                    $fetchUsr = "select * from user_tbl where u_email='$email' ";
                    $result = mysqli_query($con, $fetchUsr);
                    $r = mysqli_fetch_assoc($result);
                    ?>
                    <form method="post" enctype="multipart/form-data">
                        <div class="row">
                            <input type="hidden" name="oftotal" value="<?php echo $_SESSION['gt'] ?>">
                            <!-- <input type="hidden" name="oldimg" value="<?php echo $r['Of_Img'] ?>"> -->
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Email :</label>
                                <input type="text" class="form-control" name="umail" id="umail"
                                    value="<?php echo $r['u_email'] ?>" readonly>
                                <span id="sadd_er"></span>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Phone Number :</label>
                                <input type="text" class="form-control" name="uphn" id="uphn"
                                    value="<?php echo $r['u_mobile'] ?>">
                                <span id="padd_er"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="name" class="form-label">Shipping Address :</label>
                                <textarea class="form-control" id="sadd" name="sadd"
                                    placeholder="Enter your shipping address"><?php echo $r['u_address'] ?></textarea>
                                <span id="sadd_er"></span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">State :</label>
                                <input type="text" class="form-control" name="state" id="state"
                                    value="<?php echo $r['u_state'] ?>">
                                <span id="sadd_er"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="name" class="form-label">City :</label>
                                <input type="text" class="form-control" name="city" id="city"
                                    value="<?php echo $r['u_city'] ?>">
                                <span id="padd_er"></span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Zip :</label>
                                <input type="text" class="form-control" name="zip" id="zip"
                                    value="<?php echo $r['u_pincode'] ?>">
                                <span id="padd_er"></span>
                            </div>
                            <div class="col-md-3"></div>
                            <div class="col-md-3" style="align-content: end;">
                                <button type="submit" class="buy-now" name="checkOut">Check Out</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    // } else {
    //     echo '
    //     <div class="container-fluid mt-5 mb-5 bgcolor">
    //     <center>Cart is Empty</center>
    //     </div>';
    // }
    ?>
</section>

<script>
    // JavaScript to update row total, hidden input fields, and grand total
    document.querySelectorAll('.quantity').forEach(item => {
        item.addEventListener('input', function () {
            const price = parseFloat(this.getAttribute('data-price'));
            const quantity = parseInt(this.value) || 1; // Default to 1 if invalid

            // Ensure valid quantity
            if (quantity < 1) {
                this.value = 1;
            }

            // Calculate and update the row total
            const rowTotal = price * quantity;
            const row = this.closest('tr');
            row.querySelector('.row-total').textContent = '₹ ' + rowTotal.toFixed(2);

            // Update the grand total and hidden input fields
            let grandTotal = 0;
            document.querySelectorAll('.quantity').forEach(qtyInput => {
                const qty = parseInt(qtyInput.value) || 1;
                const rowPrice = parseFloat(qtyInput.getAttribute('data-price'));
                grandTotal += rowPrice * qty;
            });
            document.getElementById('grand-total').innerHTML = '<strong>₹ ' + grandTotal.toFixed(2) + '</strong>';
            document.getElementById('hidden-grand-total').value = grandTotal.toFixed(2);
        });
    });
</script>

<?php include_once('footer.php');

if (isset($_POST['checkOut'])) {
    $_SESSION['user_address'] = $_POST['sadd'];
    $_SESSION['user_phone'] = $_POST['uphn'];
    $_SESSION['user_city'] = $_POST['city'];
    $_SESSION['user_zip'] = $_POST['zip'];
    $_SESSION['user_state'] = $_POST['state'];
    $_SESSION['gt'] = $_POST['oftotal'];
    ?>
    <script>
        window.location.href = "CheckOut.php";
    </script>
    <?php

}
?>
