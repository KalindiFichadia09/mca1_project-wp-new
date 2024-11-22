<?php
// session_start(); // Start the session at the very top
include_once 'header.php';
include_once '../conn.php';
$p_code = $_GET['p_code'];
$q = "SELECT * FROM product_tbl P INNER JOIN sub_category_tbl SC on P.p_sc_code=SC.sc_code WHERE p_code='$p_code' AND p_status='Active' ";
$result = mysqli_query($con, $q);
?>

<!-- Product Page Structure -->
<section class="product-page py-5 bg-light">
    <div class="container">
        <?php while ($r = mysqli_fetch_assoc($result)) { ?>
            <div class="row">
                <!-- Left Sidebar with Thumbnails and Main Product Image -->
                <div class="col-md-4 d-flex">
                    <div class="container p-3">
                        <!-- Main Product Image -->
                        <div class="row justify-content-center mb-3">
                            <div class="col-12 text-center">
                                <img id="mainProductImage" src="<?php echo $r['p_main_image']; ?>"
                                    class="img-fluid main-img" alt="Main Product Image"
                                    style="width: 450px; height: 300px; object-fit: cover; border: 2px solid #ddd; border-radius: 10px;">
                            </div>
                        </div>

                        <!-- Other Product Images -->
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="d-flex justify-content-center gap-3">
                                    <?php
                                    $other_images = explode(",", $r['p_other_image']);
                                    foreach ($other_images as $image) {
                                        ?>
                                        <div class="other-img-wrapper">
                                            <img src="<?php echo trim($image); ?>" alt="Other Product Image"
                                                class="img-fluid other-img"
                                                style="width: 150px; height: 100px; object-fit: cover; border: 1px solid #ccc; border-radius: 5px; cursor: pointer;"
                                                onclick="document.getElementById('mainProductImage').src='<?php echo trim($image); ?>'">
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>

                <!-- Product Information -->
                <div class="col-md-8">
                    <div class="product-details">
                        <h3><?php echo $r['p_name']; ?></h3>
                        <p class="text-muted"><?php echo $r['c_name']; ?></p>
                        <div class="d-flex align-items-center">
                            <h5 class="text-decoration-line-through me-2" style="color:#9e9e9d">
                                &#8377;<?php echo $r['p_total_price']; ?>
                            </h5>
                            <h5 class="text-danger me-2">
                                &#8377;<?php echo $r['p_discount_price']; ?>
                            </h5>
                            <span class="border-start mx-2"
                                style="height: 1.5rem; display: inline-block; border-color: #495057;"></span>
                            <h6 style="color:#609c60">
                                <?php echo $r['p_discount']; ?>% off
                            </h6>
                        </div>
                        <h6 style="color:#5c6874">inclusive of all taxes</h6>

                        <div class="mt-4">
                            <h6 style="color:#41566E">Weight Details</h6>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Gold weight</th>
                                        <th>Diamond weight</th>
                                        <th>Gross weight</th>
                                    </tr>
                                    <tr>
                                        <td><?php echo $r['p_gold_weight']; ?> Gram</td>
                                        <td><?php echo $r['p_diamond_weight']; ?> Gram</td>
                                        <td><?php echo $r['p_gross_weight']; ?> Gram</td>
                                    </tr>
                                </table>
                            </div>
                            <h6 style="color:#41566E">Price Details</h6>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Gold price</th>
                                        <th>Diamond price</th>
                                        <th>Making charges</th>
                                        <th>Overhead charges</th>
                                        <th>Base price</th>
                                        <th>Tax</th>
                                        <th>Total price</th>
                                    </tr>
                                    <tr>
                                        <td>₹<?php echo $r['p_gold_price']; ?></td>
                                        <td>₹<?php echo $r['p_diamond_price']; ?></td>
                                        <td>₹<?php echo $r['p_making_charge']; ?></td>
                                        <td>₹<?php echo $r['p_overhead_charges']; ?></td>
                                        <td>₹<?php echo $r['p_base_price']; ?></td>
                                        <td>₹<?php echo $r['p_tax']; ?></td>
                                        <td>₹<?php echo $r['p_total_price']; ?></td>
                                    </tr>
                                </table>
                            </div>
                            <ul>
                                <li>Product type : <?php echo $r['p_type']; ?></li>
                                <li>Product purity : <?php echo $r['p_purity']; ?></li>
                                <li>Diamond color : <?php echo $r['p_diamond_color']; ?></li>
                                <li>Diamond pieces : <?php echo $r['p_diamond_pices']; ?></li>
                                <li>Stock : <?php echo $r['p_stock']; ?></li>
                            </ul>
                        </div>

                        <!-- Product Options and Form for Cart, Wishlist, Order -->
                        <div class="product-options mt-4">
                            <form action="" method="post"> <!-- Corrected form method here -->
                                <div class="form-group">
                                    <label for="quantity">Quantity:</label>
                                    <input type="number" id="quantity" name="quantity" value="1" class="form-control w-25">
                                </div>
                                <input type="hidden" name="P_Code" value="<?php echo $r['p_code']; ?>">
                                <input type="hidden" name="p_tot_price" value="<?php echo $r['p_total_price']; ?>">

                                <div class="form-group mt-3">
                                    <input type="submit" name="cart" value="Add to Cart" class="buy-now">
                                    <input type="submit" name="wishlist" value="Add to Wishlist" class="buy-now">
                                    <input type="submit" name="order" value="Order Now" class="buy-now">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<br /><br />

<?php
include_once 'footer.php';

if (isset($_POST['cart'])) {
    $username = $_SESSION['user_username'];
    $ct_p_code = $_POST['P_Code'];
    $ct_p_tot_price = $_POST['p_tot_price'];
    $check_product = "SELECT * FROM cart_tbl WHERE ct_p_code='$ct_p_code' AND ct_username='$username'";
    $result = mysqli_query($con, $check_product);

    if (mysqli_num_rows($result) == 0) {
        // Insert product into cart
        $sql = "INSERT INTO cart_tbl (ct_username, ct_p_code, ct_p_tot_price) VALUES ('$username', '$ct_p_code', '$ct_p_tot_price')";
        if (mysqli_query($con, $sql)) {
            echo "<script>alert('Product added to cart!');
      window.location.href = 'cart.php';</script>";
        } else {
            echo "<script>alert('Error adding product to cart.');</script>";
        }
    } else {
        echo "<script>alert('Product already added to cart!');
      window.location.href = 'cart.php';</script>";
    }
}
if (isset($_POST['wishlist'])) {
    $username = $_SESSION['user_username'];
    $w_p_code = $_POST['P_Code'];
    $w_p_tot_price = $_POST['p_tot_price'];
    $check_product = "SELECT * FROM wishlist_tbl WHERE w_p_code='$w_p_code' AND w_username='$username'";
    $result = mysqli_query($con, $check_product);
    if (mysqli_num_rows($result) == 0) {
        // Insert product into cart
        $sql = "INSERT INTO `wishlist_tbl`(`w_username`, `w_p_code`, `w_p_tot_price`) VALUES ('$username', '$w_p_code', '$w_p_tot_price')";
        if (mysqli_query($con, $sql)) {
            echo "<script>alert('Product added to wishlist!');
      window.location.href = 'wishlist.php';</script>";
        } else {
            echo "<script>alert('Error adding product to wishlist.');</script>";
        }
    } else {
        echo "<script>alert('Product already added to wishlist!');
      window.location.href = 'wishlist.php';</script>";
    }
}
if (isset($_POST['order'])) {
    $username = $_SESSION['user_username'];
    $o_p_code = $_POST['P_Code'];
    $qty = $_POST['quantity'];

    header("location:order.php?p_code=$o_p_code&qty=$qty");
} else {
    // echo "Error in submit";
}


?>