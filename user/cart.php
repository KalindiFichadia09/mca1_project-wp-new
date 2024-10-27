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
                              INNER JOIN category_tbl C ON P.p_c_code = C.c_code 
                              WHERE p_code IN (SELECT ct_p_code FROM cart_tbl WHERE ct_username = '$email')";
                        $result = mysqli_query($con, $q);

                        while ($r = mysqli_fetch_assoc($result)) {
                            $price = $r['p_total_price'];
                            $quantity = 1; // Default quantity
                            $rowTotal = $price * $quantity;
                            $grandTotal += $rowTotal;
                            ?>
                            <tr>
                                <td><img src="<?php echo $r['p_image']; ?>" class="img-fluid" alt="<?php echo $r['p_name']; ?>"
                                        width="100"></td>
                                <td><?php echo $r['p_name']; ?></td>
                                <td><?php echo $r['c_name']; ?></td>
                                <td>₹ <?php echo number_format($price, 2); ?></td>
                                <td><input type="number" class="form-control quantity" style="width: 60px;" value="1" min="1"
                                        data-price="<?php echo $price; ?>" /></td>
                                <td class="row-total">₹ <?php echo number_format($rowTotal, 2); ?></td>
                                <td>
                                    <a href="single-product.php?p_code=<?php echo $r['p_code']; ?>"
                                        class="btn btn-primary btn-sm">View Product</a>
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
                        <td><a href="order.php"><button class="buy-now">Order Now</button></a></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</section>

<script>
    // JavaScript to update row total and grand total
    document.querySelectorAll('.quantity').forEach(item => {
        item.addEventListener('input', function () {
            const price = parseFloat(this.getAttribute('data-price'));
            const quantity = parseInt(this.value);
            const rowTotal = price * quantity;

            // Update row total
            const row = this.closest('tr');
            row.querySelector('.row-total').textContent = '₹ ' + rowTotal.toFixed(2);

            // Update grand total
            let grandTotal = 0;
            document.querySelectorAll('.row-total').forEach(totalCell => {
                grandTotal += parseFloat(totalCell.textContent.replace('₹', '').trim());
            });
            document.getElementById('grand-total').innerHTML = '<strong>₹ ' + grandTotal.toFixed(2) + '</strong>';
        });
    });
</script>

<?php include_once('footer.php'); ?>