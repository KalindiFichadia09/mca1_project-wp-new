<?php
    include_once('header.php');
?>

<!-- Product Page Structure -->
<section class="product-page py-5 bg-light">
    <div class="container">
        <div class="row">
            <!-- Left Sidebar with Thumbnails and Main Product Image -->
            <div class="col-md-6 d-flex">
                <!-- Thumbnails -->
                <div class="col-md-3">
                    <div class="product-thumbnails d-flex flex-column">
                        <img src="../images/product1(1).jpeg" class="img-fluid mb-2 thumbnail-img" alt="Product Thumbnail 1" onclick="changeImage('../images/product1(1).jpeg')">
                        <img src="../images/product1(2).jpeg" class="img-fluid mb-2 thumbnail-img" alt="Product Thumbnail 2" onclick="changeImage('../images/product1(2).jpeg')">
                        <img src="../images/product1(3).jpeg" class="img-fluid mb-2 thumbnail-img" alt="Product Thumbnail 3" onclick="changeImage('../images/product1(3).jpeg')">
                    </div>
                </div>
                <!-- Main Product Image -->
                <div class="col-md-9">
                    <div class="product-main-image">
                        <img id="mainProductImage" src="../images/product1.jpeg" class="img-fluid main-img" alt="Main Product Image">
                    </div>
                </div>
            </div>

            <!-- Product Information -->
            <div class="col-md-6">
                <div class="product-details">
                    <h2>Product Name</h2>
                    <p class="text-muted">Product Category</p>
                    <h3 class="text-danger">&#8377; 499.99</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce at lorem vel nisi faucibus commodo.</p>
                    
                    <div class="mt-4">
                        <h4>Product Details</h4>
                        <ul>
                            <li>Material: Gold</li>
                            <li>Weight: 20g</li>
                            <li>Stone: Diamond</li>
                            <li>Dimensions: 2cm x 2cm</li>
                        </ul>
                    </div>
                    <div class="product-options mt-4">
                        <div class="form-group">
                            <label for="quantity">Quantity:</label>
                            <input type="number" id="quantity" name="quantity" value="1" class="form-control w-25">
                        </div>
                        <div class="form-group mt-3">
                            <a href="cart.php"><input type='submit' name='cart' value='Add to Cart' class='buy-now'></a>
                            <a href="wishlist.php"><input type='submit' name='wishlist' value='Add to Wishlist' class='buy-now'></a>
                            <a href="order.php"><input type='submit' name='order' value='Order Now' class='buy-now'></a>
                        </div>
                        <div class="form-group mt-3">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br/><br/>
<?php
    include_once('footer.php');
?>
