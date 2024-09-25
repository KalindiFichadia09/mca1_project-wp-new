<?php
include_once 'header.php';
include_once '../conn.php';
$p_code = $_GET['p_code'];
// $q = "select * from product_tbl where p_code='$p_code' ";
$q = "select * from product_tbl P INNER JOIN category_tbl C on P.p_c_code=C.c_code where p_code='$p_code' ";
$result = mysqli_query($con, $q);
?>

<!-- Product Page Structure -->
<section class="product-page py-5 bg-light">
    <div class="container">
        <?php
        while ($r = mysqli_fetch_assoc($result)) {
            ?>
            <div class="row">
                <!-- Left Sidebar with Thumbnails and Main Product Image -->
                <div class="col-md-4 d-flex">
                    <!-- Thumbnails -->
                    <!-- <div class="col-md-3">
                    <div class="product-thumbnails d-flex flex-column">
                        <img src="../images/product1(1).jpeg" class="img-fluid mb-2 thumbnail-img" alt="Product Thumbnail 1" onclick="changeImage('../images/product1(1).jpeg')">
                        <img src="../images/product1(2).jpeg" class="img-fluid mb-2 thumbnail-img" alt="Product Thumbnail 2" onclick="changeImage('../images/product1(2).jpeg')">
                        <img src="../images/product1(3).jpeg" class="img-fluid mb-2 thumbnail-img" alt="Product Thumbnail 3" onclick="changeImage('../images/product1(3).jpeg')">
                    </div>
                </div> -->
                    <!-- Main Product Image -->
                    <div class="col-md-12">
                        <div class="product-main-image">
                            <img id="mainProductImage" src="<?php echo $r['p_image']; ?>" class="img-fluid main-img"
                                alt="Main Product Image">
                        </div>
                    </div>
                </div>

                <!-- Product Information -->
                <div class="col-md-8">
                    <div class="product-details">
                        <h2><?php echo $r['p_name']; ?></h2>
                        <p class="text-muted"><?php echo $r['c_name']; ?></p>
                        <h3 class="text-danger">&#8377; <?php echo $r['p_total_price']; ?></h3>

                        <div class="mt-4">
                            <h6>Weight Details</h6>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Gold weight</th>
                                        <th>Diamond weight</th>
                                        <th>Gross weight</th>
                                    </tr>
                                    <tr>
                                        <td><?php echo $r['p_gold_weight']; ?>Gram</td>
                                        <td><?php echo $r['p_diamond_weight']; ?> Gram</td>
                                        <td><?php echo $r['p_gross_weight']; ?> Gram</td>
                                    </tr>
                                </table>
                            </div>
                            <h6>Price Details</h6>
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
                                <!-- <li>Dimensions: 2cm x 2cm</li> -->
                            </ul>
                        </div>
                        <div class="product-options mt-4">
                            <div class="form-group">
                                <label for="quantity">Quantity:</label>
                                <input type="number" id="quantity" name="quantity" value="1" class="form-control w-25">
                            </div>
                            <div class="form-group mt-3">
                                <a href="cart.php"><input type='submit' name='cart' value='Add to Cart' class='buy-now'></a>
                                <a href="wishlist.php"><input type='submit' name='wishlist' value='Add to Wishlist'
                                        class='buy-now'></a>
                                <a href="order.php"><input type='submit' name='order' value='Order Now' class='buy-now'></a>
                            </div>
                            <div class="form-group mt-3">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</section>
<br /><br />
<?php
include_once('footer.php');
?>