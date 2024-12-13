<?php
// session_start(); // Start the session at the very top
include_once 'header.php';
include_once '../conn.php';
$p_code = $_GET['p_code'];
$q = "SELECT * FROM product_tbl P INNER JOIN sub_category_tbl SC on P.p_sc_code=SC.sc_code WHERE p_code='$p_code' AND p_status='Active' ";
$result = mysqli_query($con, $q);
$qRating = "SELECT SUM(r_rating) / COUNT(r_rating) as avg FROM review_tbl WHERE r_p_code = '$p_code'";
$avgResult = mysqli_query($con, $qRating);
$avg = mysqli_fetch_assoc($avgResult);

// If there are no reviews, set average rating to 0
$rating = isset($avg['avg']) ? $avg['avg'] : 0;
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
                        <h6 style="color:#5c6874">include all taxes</h6>
                        <div class="stars">
                            <?php
                                $rating = intval($avg['avg']); // Assuming $avg['avg'] contains the average rating.
                                for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $rating) {
                                        echo '<span class="fa fa-star" style="color: #ffcc00;"></span>'; // Filled star
                                    } else {
                                        echo '<span class="fa fa-star" style="color: gray;"></span>'; // Empty star
                                    }
                                }
                                ?>
                        </div>

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

    <!-- Add a Review Section -->
<?php
if (isset($_SESSION['user_username']) && !empty($_SESSION['user_username'])) {
    $eml = $_SESSION['user_username'];
    $checkReview = "SELECT * FROM review_tbl WHERE r_p_code='$p_code' AND r_email='$eml' ";
    $checkReviewData = mysqli_num_rows(mysqli_query($con, $checkReview));

    if ($checkReviewData > 0) {
        // echo 'chipcip';
        // setcookie('success', "You've already reviewed this product once.", time() + 5, "/");
    } else {
        $checkOrderStat = "SELECT * FROM order_tbl WHERE o_username='$eml' AND o_p_code='$p_code' AND o_delivery_status='Delivered'
                       AND o_payment_status='Completed' ";
        $checkOrderStatData = mysqli_query($con, $checkOrderStat);

        // Fetch the first row of the result as an associative array
        $orderData = mysqli_fetch_assoc($checkOrderStatData);

        if ($orderData == false) {
            setcookie('success', "You can review this product after confirmed order.", time() + 5, "/");
        } else {
            // Fetch the order ID from the associative array
            // $o_id = $orderData['O_Order_Id'];
            // echo $o_id;

            // Continue with your review form
            ?>
            <div class="container mt-5">
                <div class="row">
                    <div class="col">
                        <h2>Add a review</h2>
                        <form method="post">
                            <!-- <input type="hidden" value="<?php echo $o_id; ?>" name="O_id"> -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Name :</label>
                                    <input type="text" class="form-control" id="name" name="nm" placeholder="First Name Last Name">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Email :</label>
                                    <input type="text" class="form-control" id="email"
                                        value="<?php echo $_SESSION['user_username']; ?>" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="review" class="form-label">Review</label>
                                    <textarea class="form-control" id="review" name="reviewText" rows="3"></textarea>
                                </div>

                                <!-- Ratings -->
                                <div class="col-md-6">
                                    <label for="rating" class="form-label">Rating</label>
                                    <div class="star-rating">

                                        <input type="radio" name="rating" id="r5" value="5" class="star-input" required>
                                        <label for="r5" class="star-label">&#9733;</label>

                                        <input type="radio" name="rating" id="r4" value="4" class="star-input" required>
                                        <label for="r4" class="star-label">&#9733;</label>

                                        <input type="radio" name="rating" id="r3" value="3" class="star-input" required>
                                        <label for="r3" class="star-label">&#9733;</label>

                                        <input type="radio" name="rating" id="r2" value="2" class="star-input" required>
                                        <label for="r2" class="star-label">&#9733;</label>

                                        <input type="radio" name="rating" id="r1" value="1" class="star-input" required>
                                        <label for="r1" class="star-label">&#9733;</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-dark" name="SubmitReview">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <?php
        }
    }
} else {
    // echo 'dsdsds';
}
?>
</section>

<div class="container mt-5 mb-5 bg-light p-5">
        <section class="featured" id="latest">
            <h2>Reviews</h2>
            <div class="row mt-5">
                <div class="row" id="product">
                    <table>
                        <!-- <tr>
                            <th>img</th>
                            <th>nm</th>
                            <th>text</th>
                            <th>stars</th>
                        </tr> -->
                       <?php
                    $q = "SELECT r.*,u.* FROM review_tbl r JOIN user_tbl u ON r.r_email=u.u_email where r.r_p_code='$p_code' ORDER BY r.r_id DESC LIMIT 3";
                    $resultreview = mysqli_query($con, $q);

                    if (mysqli_num_rows($resultreview) > 0) {
                        while ($review = mysqli_fetch_assoc($resultreview)) {
                            ?>
                            <tr>
                                <td><img src="<?php echo $review['u_image']; ?>" alt="User Image"
                                        class="user-image"></td>
                                <td><?php echo $review['r_username'] ?><br>
                                    <p style="text-size:2px"><?php echo $review['r_email'] ?></p>
                                </td>
                                <td><?php echo $review['r_review'] ?></td>
                                <td>
                                    <div class="stars-review">
                                        <?php
                                        $rating = $review['r_rating']; // Assuming the column name for rating is R_Rating
                                        for ($i = 1; $i <= 5; $i++) {
                                            if ($i <= $rating) {
                                                echo '<span class="fa fa-star" style="color: #ffcc00;"></span>'; // Filled star
                                            } else {
                                                echo '<span class="fa fa-star" style="color: gray;"></span>'; // Empty star
                                            }
                                        }
                                        ?>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        // No reviews
                        echo '<tr><td colspan="4">No reviews available.</td></tr>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </section>
</div>

<br /><br />

<?php
include_once 'footer.php';

if (isset($_POST['cart'])) {
    $Ct_Quantity = 1;
    $username = $_SESSION['user_username'];
    $ct_p_code = $_POST['P_Code'];
    $ct_p_tot_price = $_POST['p_tot_price'];
    $check_product = "SELECT * FROM cart_tbl WHERE ct_p_code='$ct_p_code' AND ct_username='$username'";
    $result = mysqli_query($con, $check_product);

    if (mysqli_num_rows($result) == 0) {
        // Insert product into cart
        $sql = "INSERT INTO cart_tbl (ct_username, ct_p_code, ct_quentity, ct_p_tot_price) VALUES ('$username', '$ct_p_code', '$Ct_Quantity', '$ct_p_tot_price')";
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

if (isset($_POST['SubmitReview'])) {
    $userEmail = $_SESSION['user_username'];
    $userName = $_POST['nm'];
    $reviewText = $_POST['reviewText'];
    // $orderId = $_POST['O_id'];
    $rating = $_POST['rating'];  // Fetch the rating directly

    $query = "INSERT INTO `review_tbl`(`r_username`, `r_email`, `r_p_code`, `r_rating`, `r_review`, `r_date`)
                  VALUES ('$userName', '$userEmail', '$p_code', '$rating', '$reviewText', NOW())";

    echo $query;

    if (mysqli_query($con, $query)) {
        setcookie('success', 'Review Added', time() + 5, "/");
        ?>
                <script>
                    window.location.href = "single-product.php?p_code=<?php echo $p_code; ?>";
                </script>
                <?php
    } else {
        setcookie('error', 'Error in adding Review', time() + 5, "/");
        ?>
                <script>
                    window.location.href = "single-product.php?p_code=<?php echo $p_code; ?>";
                </script>
                <?php
    }
}

?>