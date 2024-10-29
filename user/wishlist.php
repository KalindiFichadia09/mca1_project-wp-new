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
    $deleteQuery = "DELETE FROM wishlist_tbl WHERE w_p_code = '$removeId' AND w_username = '$email'";
    mysqli_query($con, $deleteQuery);
    header("Location: wishlist.php"); // Refresh the page after removal
    exit();
}
?>

<!-- Wishlisted Products Section -->
<section class="wishlisted-products py-5 bg-light">
    <div class="container">
        <h2 class="mb-4 text-center">Your Wishlist</h2>
        <div class="row">
            <?php
            $grandTotal = 0;
            if (isset($_SESSION['user_username'])) {
                $email = $_SESSION['user_username'];
                $q = "SELECT * FROM product_tbl P 
                              INNER JOIN category_tbl C ON P.p_c_code = C.c_code 
                              WHERE p_code IN (SELECT w_p_code FROM wishlist_tbl WHERE w_username = '$email')";
                $result = mysqli_query($con, $q);

                while ($r = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="col-md-4">
                        <div class="product-item card mb-4">
                            <img src="<?php echo $r['p_image']; ?>" class="card-img-top img-fluid" alt="<?php echo $r['p_name']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $r['p_name']; ?></h5>
                                <p class="text-muted"><?php echo $r['c_name']; ?></p>
                                <h4 class="text-danger">₹<?php echo $r['p_total_price']; ?></h4>
                                <form method="GET">
                                    <a href="single-product.php?p_code=<?php echo $r['p_code']; ?>"
                                        class="btn btn-primary btn-sm">View Product</a>
                                    <!-- Remove from Wishlist Form -->
                                    <input type="hidden" name="remove_id" value="<?php echo $r['p_code']; ?>">
                                    <button type="submit" class="btn btn-danger btn-sm mt-2">Remove from Wishlist</button>
                                    <!-- <input type="submit" name="remove_id" value="Remove from Wishlist" class="btn btn-danger btn-sm mt-2"> -->
                                </form>
                            </div>
                        </div>
                    </div>
                <?php }
            } ?>
        </div>
    </div>
</section>

<?php
include_once 'footer.php';
?>