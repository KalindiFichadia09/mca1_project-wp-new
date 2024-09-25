<?php
include_once 'header.php';
include_once '../conn.php';
?>

<!-- Cart Section -->
<section class="cart-section py-5 bg-light">
    <div class="container">
        <h2 class="mb-4 text-center">Your Cart</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Product Item 1 -->
                    <tr>
                        <td><img src="../images/product1.jpeg" class="img-fluid" alt="Product 1" width="100"></td>
                        <td>Product Name</td>
                        <td>Product Category</td>
                        <td>₹499.99</td>
                        <td><input type="number" class="form-control" style="width: 60px;" value="1" min="1"></td>
                        <td>₹499.99</td>
                        <td>
                            <a href="single-product.php" class="btn btn-primary btn-sm">View Product</a>
                            <button class="btn btn-danger btn-sm mt-2">Remove</button>
                        </td>
                    </tr>
                    <!-- Product Item 2 -->
                    <tr>
                        <td><img src="../images/product2.jpeg" class="img-fluid" alt="Product 2" width="100"></td>
                        <td>Product Name</td>
                        <td>Product Category</td>
                        <td>₹399.99</td>
                        <td><input type="number" class="form-control" style="width: 60px;" value="1" min="1"></td>
                        <td>₹399.99</td>
                        <td>
                            <a href="single-product.php" class="btn btn-primary btn-sm">View Product</a>
                            <button class="btn btn-danger btn-sm mt-2">Remove</button>
                        </td>
                    </tr>
                    <!-- Product Item 3 -->
                    <tr>
                        <td><img src="../images/product2(1).jpeg" class="img-fluid" alt="Product 3" width="100"></td>
                        <td>Product Name</td>
                        <td>Product Category</td>
                        <td>₹399.99</td>
                        <td><input type="number" class="form-control" style="width: 60px;" value="1" min="1"></td>
                        <td>₹399.99</td>
                        <td>
                            <a href="single-product.php" class="btn btn-primary btn-sm">View Product</a>
                            <button class="btn btn-danger btn-sm mt-2">Remove</button>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5" class="text-right"><strong>Total</strong></td>
                        <td><strong>₹1299.97</strong></td>
                        <td><a href="order.php"><button class="buy-now">Order Now</button></a></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</section>

<?php
    include_once('footer.php');
?>
