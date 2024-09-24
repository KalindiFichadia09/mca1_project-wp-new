<?php
include_once 'header.php';
include_once '../conn.php';
?>

<!-- product-start -->
<section class="new-arrivals">
  <h2>Product</h2>
  <div class="arrivals-container">
    <?php
    $c_code = $_GET['c_code'];
    $q = "select * from product_tbl where p_status='Active' and p_c_code='$c_code' ";
    $result = mysqli_query($con, $q);
    if (mysqli_num_rows($result)) {
      while ($r = mysqli_fetch_assoc($result)) {
        ?>
        <div class="arrival-item">
          <img src="<?php echo
            $r['p_image']; ?>" alt="<?php echo $r['p_name']; ?>">
          <h3><?php echo $r['p_name']; ?></h3>
          <p class="price">₹ <?php echo $r['p_total_price']; ?></p>
          <!-- <button class="buy-now">Buy Now</button> -->
          <a href="single-product.php?p_code=<?php echo $r['p_code']; ?>"><input type='submit' name='buy' value='Buy Now'
              class='buy-now'></a>
        </div>
        <?php
      }
    }
    else
      echo '<h4>No products yes</h4>';
    ?>

    <!-- <div class="arrival-item">
                    <img src="../images/newArrivalImg4.jpg" alt="New Arrival 4">
                    <h3>Product 4</h3>
                    <p class="price">₹ 79.99</p>
                    <a href="single-product.php"><input type='submit' name='buy' value='Buy Now' class='buy-now'></a>
      </div> -->
  </div>
</section>
<!-- product-end -->

<?php
include('footer.php');
?>