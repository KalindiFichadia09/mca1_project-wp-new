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
        <img src="<?php echo "../images/slider_image/" . $r['Image']; ?>" class="d-block w-100" alt="<?php echo $r['Name']; ?>">
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
  <button class="carousel-control-prev carousel-button" type="button" data-bs-target="#jewelryCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next carousel-button" type="button" data-bs-target="#jewelryCarousel" data-bs-slide="next">
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
      <a href="single-product.php?p_code=<?php echo $r['p_code']; ?>">
        <div class="arrival-item">
          <img src="<?php echo $r['p_image']; ?>" alt="<?php echo $r['p_name']; ?>">
          <h3 class="card-title text-truncate"><?php echo $r['p_name']; ?></h3>
          <p class="price mb-auto">₹ <?php echo $r['p_total_price']; ?></p>
          <button class="buy-now">View</button>
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
?>