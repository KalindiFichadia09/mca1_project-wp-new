<?php
include_once 'header.php';
include_once '../conn.php';
?>

<!-- product-start -->
<section class="new-arrivals">
  <h2>New Arrivals</h2>
  <div class="arrivals-container">
    <?php
    $c_code = $_GET['c_code'];
    $q = "select * from product_tbl where p_status='Active' and p_c_code='$c_code' ";

    // $q = "select * from product_tbl where p_status='Active' ORDER BY p_id DESC LIMIT 4";
    $result = mysqli_query($con, $q);
    while ($r = mysqli_fetch_assoc($result)) {
      ?>
      <a href="">
        <div class="arrival-item">
          <img src="<?php echo $r['p_image']; ?>" alt="<?php echo $r['p_name']; ?>">
          <h3 class="card-title text-truncate"><?php echo $r['p_name']; ?></h3>
          <?php
          if ($r['p_discount'] != 0) {
            $disounted_price = $r['p_total_price'] - ($r['p_discount'] * $r['p_total_price'] / 100);
            ?>
            <span class="card-text" style="text-decoration: line-through;">Price: ₹
              <?php echo $r['p_total_price']; ?></span><br>
            <span class="cart-text"><?php echo $r['p_discount'] . "% Discount"; ?> </span><br>
            <span class="card-text">Price: ₹ <?php echo $disounted_price; ?></sp><br>
              <?php
          } else {
            ?>
              <span class="card-text">Price: ₹ <?php echo $r['p_total_price']; ?></span><br>
              <?php
          }
          ?>
            <form action="" method="post">
              <input type="hidden" name="P_Code" value="<?php echo $r['p_code']; ?>">
              <input type="hidden" name="p_tot_price" value="<?php echo $r['p_total_price']; ?>">
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
    ?>
  </div>
</section>
<!-- product-end -->

<?php
include('footer.php');
// cart
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

// show
if (isset(($_POST['show']))) {
  $p_code = $_POST['P_Code'];
  header("location:single-product.php?p_code=$p_code");
}

// wishlist
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
?>