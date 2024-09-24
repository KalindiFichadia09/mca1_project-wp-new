<?php
include_once 'header.php';
include_once '../conn.php';
?>

<!-- categories-start -->
<section class="popular-categories">
  <h2>Categories</h2>
  <div class="categories-container">
    <?php
    $q = "select * from category_tbl where c_status='Active' ";
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
  
<?php
    include('footer.php');
?>