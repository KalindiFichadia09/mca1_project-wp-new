<?php
    include_once('header.php');
?>

<!-- Wishlisted Products Section -->
<section class="wishlisted-products py-5 bg-light">
    <div class="container">
        <h2 class="mb-4 text-center">Your Wishlist</h2>
        <div class="row">
            <!-- Product Item -->
            <div class="col-md-4">
                <div class="product-item card mb-4">
                    <img src="../images/product1.jpeg" class="card-img-top img-fluid" alt="Wishlisted Product 1">
                    <div class="card-body">
                        <h5 class="card-title">Product Name</h5>
                        <p class="text-muted">Product Category</p>
                        <h4 class="text-danger">₹499.99</h4>
                        <a href="single-product.php" class="btn btn-primary btn-sm">View Product</a>
                        <button class="btn btn-danger btn-sm mt-2">Remove from Wishlist</button>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="product-item card mb-4">
                    <img src="../images/product2.jpeg" class="card-img-top img-fluid" alt="Wishlisted Product 2">
                    <div class="card-body">
                        <h5 class="card-title">Product Name</h5>
                        <p class="text-muted">Product Category</p>
                        <h4 class="text-danger">₹399.99</h4>
                        <a href="single-product.php" class="btn btn-primary btn-sm">View Product</a>
                        <button class="btn btn-danger btn-sm mt-2">Remove from Wishlist</button>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="product-item card mb-4">
                    <img src="../images/product1.jpeg" class="card-img-top img-fluid" alt="Wishlisted Product 3">
                    <div class="card-body">
                        <h5 class="card-title">Product Name</h5>
                        <p class="text-muted">Product Category</p>
                        <h4 class="text-danger">₹399.99</h4>
                        <a href="single-product.php" class="btn btn-primary btn-sm">View Product</a>
                        <button class="btn btn-danger btn-sm mt-2">Remove from Wishlist</button>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>

<?php
    include_once('footer.php');
?>
