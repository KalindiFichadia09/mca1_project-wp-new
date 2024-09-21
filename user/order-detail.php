<?php
    include_once('header.php');
?>

<section class="order-details py-5">
    <div class="container">
        <h2 class="mb-4 text-center">Order Details</h2>

        <div class="row">
            <!-- Order Information -->
            <div class="col-md-6">
                <fieldset>
                    <legend>Order Information</legend>
                    <p><strong>Order ID:</strong> #ORD12345</p>
                    <p><strong>Order Date:</strong> 2024-08-10</p>
                    <p><strong>Status:</strong> Completed</p>
                    <p><strong>Total Amount:</strong> ₹1,499.99</p>
                </fieldset>
            </div>

            <!-- Customer Information -->
            <div class="col-md-6">
                <fieldset>
                    <legend>Customer Information</legend>
                    <p><strong>Name:</strong> John Doe</p>
                    <p><strong>Email:</strong> john.doe@example.com</p>
                    <p><strong>Phone:</strong> +1234567890</p>
                </fieldset>
            </div>
        </div>

        <div class="row">
            <!-- Shipping Address -->
            <div class="col-md-6">
                <fieldset>
                    <legend>Shipping Address</legend>
                    <p><strong>Address:</strong> 123 Main Street, Apt 4B</p>
                    <p><strong>City:</strong> Springfield</p>
                    <p><strong>State:</strong> IL</p>
                    <p><strong>ZIP Code:</strong> 62704</p>
                </fieldset>
            </div>

            <!-- Ordered Items -->
            <div class="col-md-6">
                <fieldset>
                    <legend>Ordered Items</legend>
                    <ul class="list-unstyled">
                        <li class="media mb-3">
                            <div class="row">
                                <div class="col-6">
                                    <img src="../images/product1(1).jpeg" class="mr-3" alt="Gold Necklace">
                                </div>
                                <div class="col-6">
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-1">Gold Necklace</h5>
                                        <p><strong>Quantity:</strong> 1</p>
                                        <p><strong>Price:</strong> ₹999.99</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </fieldset>
            </div>
        </div>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php
    include_once('footer.php');
?>