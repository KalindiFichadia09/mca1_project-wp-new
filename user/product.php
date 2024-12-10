<?php
include_once 'header.php';
include_once '../conn.php';
?>

<!-- product-start -->
<section class="new-arrivals">
  <h2>New Arrivals</h2>
  <div class="arrivals-container">
    <?php
    // Enable error reporting for debugging
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    // Check if the sc_code is passed in the URL
    if (isset($_GET['sc_code']) && !empty($_GET['sc_code'])) {
      $sc_code = $_GET['sc_code'];  // Get the sc_code from the URL

      // Debug: Check sc_code
      // echo "<p>Debug: Subcategory Code = $sc_code</p>";

      // Query to fetch products based on the selected subcategory code (sc_code)
      $productQuery = "SELECT * FROM product_tbl WHERE p_sc_code = '$sc_code' AND p_status = 'Active'";
      $resultp = mysqli_query($con, $productQuery);

      // Check if any products were found
      if ($resultp && mysqli_num_rows($resultp) > 0) {
        while ($rp = mysqli_fetch_assoc($resultp)) {
          ?>
          <a href="single-product.php?p_code=<?php echo $rp['p_code']; ?>">
            <div class="arrival-item">
              <img src="<?php echo $rp['p_main_image']; ?>" alt="<?php echo $rp['p_name']; ?>">
              <h3 class="card-title text-truncate"><?php echo $rp['p_name']; ?></h3>
              <?php
              if ($rp['p_discount'] != 0) {
                $discounted_price = $rp['p_total_price'] - ($rp['p_discount'] * $rp['p_total_price'] / 100);
                ?>
                <span class="card-text text-decoration-line-through">Price: ₹<?php echo $rp['p_total_price']; ?></span><br>
                <span class="cart-text"><?php echo $rp['p_discount'] . "% Discount"; ?></span><br>
                <span class="card-text">Price: ₹<?php echo $discounted_price; ?></span><br>
                <?php
              } else {
                ?>
                <span class="card-text">Price: ₹<?php echo $rp['p_total_price']; ?></span><br>
                <?php
              }
              ?>
              <form action="" method="post">
                <input type="hidden" name="P_Code" value="<?php echo $rp['p_code']; ?>">
                <input type="hidden" name="p_tot_price" value="<?php echo $rp['p_total_price']; ?>">
                <div class="form-group mt-3">
                  <button type="submit" name="cart" class="buy-now">
                    <i class="fa-solid fa-cart-plus"></i>
                  </button>
                  <button type="submit" name="show" class="buy-now">
                    <i class="fa-solid fa-eye"></i>
                  </button>
                  <button type="submit" name="wishlist" class="buy-now">
                    <i class="fa-solid fa-heart"></i>
                  </button>
                </div>
              </form>
            </div>
          </a>
          <?php
        }
      } else {
        echo "<p>No products found in this subcategory.</p>";
      }
    } else {
      echo "<p>Invalid or missing subcategory code.</p>";
    }
    ?>
  </div>
</section>
<!-- product-end -->

<?php
include('footer.php');

// Cart functionality
if (isset($_POST['cart'])) {
  $Ct_Quantity = 1;
  $username = $_SESSION['user_username'];
  $ct_p_code = $_POST['P_Code'];
  $ct_p_tot_price = $_POST['p_tot_price'];

  $check_product = "SELECT * FROM cart_tbl WHERE ct_p_code='$ct_p_code' AND ct_username='$username'";
  $result = mysqli_query($con, $check_product);

  if ($result && mysqli_num_rows($result) == 0) {
    $sql = "INSERT INTO cart_tbl (ct_username, ct_p_code, ct_quentity, ct_p_tot_price) VALUES ('$username', '$ct_p_code', '$Ct_Quantity', '$ct_p_tot_price')";
    if (mysqli_query($con, $sql)) {
      echo "<script>alert('Product added to cart!'); window.location.href = 'cart.php';</script>";
    } else {
      echo "<script>alert('Error adding product to cart.');</script>";
    }
  } else {
    echo "<script>alert('Product already added to cart!'); window.location.href = 'cart.php';</script>";
  }
}

// Show functionality
if (isset($_POST['show'])) {
  $p_code = $_POST['P_Code'];
  header("location:single-product.php?p_code=$p_code");
}

// Wishlist functionality
if (isset($_POST['wishlist'])) {
  $username = $_SESSION['user_username'];
  $w_p_code = $_POST['P_Code'];
  $w_p_tot_price = $_POST['p_tot_price'];

  $check_product = "SELECT * FROM wishlist_tbl WHERE w_p_code='$w_p_code' AND w_username='$username'";
  $result = mysqli_query($con, $check_product);

  if ($result && mysqli_num_rows($result) == 0) {
    $sql = "INSERT INTO wishlist_tbl (w_username, w_p_code, w_p_tot_price) VALUES ('$username', '$w_p_code', '$w_p_tot_price')";
    if (mysqli_query($con, $sql)) {
      echo "<script>alert('Product added to wishlist!'); window.location.href = 'wishlist.php';</script>";
    } else {
      echo "<script>alert('Error adding product to wishlist.');</script>";
    }
  } else {
    echo "<script>alert('Product already added to wishlist!'); window.location.href = 'wishlist.php';</script>";
  }
}
?>
