<?php
include_once 'header.php';
include_once '../conn.php';
?>

<!-- Image Carousel-start -->
<div id="jewelryCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <?php
    $q = "select * from slider_tbl";
    $result = mysqli_query($con, $q);
    $isFirst = true; // Variable to track the first item
    
    while ($r = mysqli_fetch_assoc($result)) {
      ?>
      <div class="carousel-item <?php echo $isFirst ? 'active' : ''; ?>">
        <img src="<?php echo "../images/slider_image/" . $r['Image']; ?>" class="d-block w-100"
          alt="<?php echo $r['Name']; ?>">
        <!-- <div class="carousel-caption d-none d-md-block">
          <h5>Try Something New</h5>
          <p>Explore our latest pieces</p>
        </div> -->
      </div>
      <?php
      $isFirst = false; // Set $isFirst to false after the first iteration
    }
    ?>
  </div>
  <button class="carousel-control-prev carousel-button" type="button" data-bs-target="#jewelryCarousel"
    data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next carousel-button" type="button" data-bs-target="#jewelryCarousel"
    data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!-- Image Carousel-end -->
<br />
<!-- categories-start -->
<section class="popular-categories">
  <h2>Popular Categories</h2>
  <div class="categories-container">
    <?php
    $q = "select * from category_tbl where c_status='Active' ORDER BY c_id DESC LIMIT 5";
    $result = mysqli_query($con, $q);
    while ($r = mysqli_fetch_assoc($result)) {
      ?>
      <a href="product.php?c_code=<?php echo $r['c_code']; ?>">
        <div class="category">
          <img src="<?php echo
            $r['c_image']; ?>" alt="<?php echo $r['c_name']; ?>">
          <h3><?php echo $r['c_name']; ?></h3>
        </div>
      </a>
      <?php
    }
    ?>
  </div>
</section>
<!-- categories-end -->

<!-- new arrival - start -->
<section class="new-arrivals">
  <h2>New Arrivals</h2>
  <div class="arrivals-container">
    <?php
    $q = "select * from product_tbl where p_status='Active' ORDER BY p_id DESC LIMIT 4";
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
<!-- <a href="single-product.php">
    <div class="arrival-item">
      <img src="../images/newArrivalImg4.jpg" alt="New Arrival 1">
      <h3>Product 4</h3>
      <p class="price">₹ 49.99</p>
      <button class="buy-now">Buy Now</button>
    </div>
  </a> -->
<!-- new arrival - end -->

<!-- featured product - start -->
<section class="new-arrivals">
  <h2>Featured Product</h2>
  <div class="arrivals-container">
    <a href="single-product.php">
      <div class="arrival-item">
        <img src="../images/newArrivalImg1.jpg" alt="New Arrival 1">
        <h3>Product 1</h3>
        <p class="price">₹ 49.99</p>
        <button class="buy-now">Buy Now</button>
      </div>
    </a>
    <a href="single-product.php">
      <div class="arrival-item">
        <img src="../images/newArrivalImg2.jpg" alt="New Arrival 1">
        <h3>Product 2</h3>
        <p class="price">₹ 49.99</p>
        <button class="buy-now">Buy Now</button>
      </div>
    </a>
    <a href="single-product.php">
      <div class="arrival-item">
        <img src="../images/newArrivalImg3.jpg" alt="New Arrival 1">
        <h3>Product 3</h3>
        <p class="price">₹ 49.99</p>
        <button class="buy-now">Buy Now</button>
      </div>
    </a>
    <a href="single-product.php">
      <div class="arrival-item">
        <img src="../images/newArrivalImg4.jpg" alt="New Arrival 1">
        <h3>Product 4</h3>
        <p class="price">₹ 49.99</p>
        <button class="buy-now">Buy Now</button>
      </div>
    </a>
  </div>
</section>
<!-- featured product - end -->

<?php
include_once 'footer.php';

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