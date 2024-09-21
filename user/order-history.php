<?php
    include_once('header.php');
?>
<section class="cart-section py-5 bg-light">
    <div class="container">
        <h2 class="mb-4 text-center">Your Cart</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
        <h2 class="mb-4 text-center">Order History</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Order Date</th>
                        <th>Order Number</th>
                        <th>Status</th>
                        <th>Total Amount</th>
                        <th>Product Image</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>2024-08-10</td>
                        <td>#ORD12345</td>
                        <td>Completed</td>
                        <td>₹1,499.99</td>
                        <td><img src="../images/product1(1).jpeg" alt="Product Image" class="img-thumbnail" style="width: 100px;"></td>
                        <td><a href="order-detail.php" class="btn btn-info btn-sm">View Details</a></td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>2024-07-15</td>
                        <td>#ORD12344</td>
                        <td>Pending</td>
                        <td>₹799.99</td>
                        <td><img src="../images/product2(1).jpeg" alt="Product Image" class="img-thumbnail" style="width: 100px;"></td>
                        <td><a href="order-detail.php" class="btn btn-info btn-sm">View Details</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php
    include_once('footer.php');
?>
