<?php
    include_once('header.php');
?>

<!-- Order Now Section -->
<section class="order-now py-5 bg-light">
    <div class="container">
        <h2 class="mb-4 text-center">Order Now</h2>
        <form action="" method="post" onsubmit="return orderValidation()">
            <div class="row mb-3">
                <!-- Customer Information -->
                <div class="col-md-6">
                    <fieldset>
                        <legend>Customer Information</legend>
                        <div class="form-group mb-3">
                            <label for="full-name">Full Name</label>
                            <input type="text" id="fullName" name="full_name" class="form-control">
                            <span id="fullNameMsg"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" class="form-control">
                            <span id="emailMsg"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="mobile" name="phone" class="form-control">
                            <span id="mobileMsg"></span>
                        </div>
                    </fieldset>
                </div>

                <!-- Shipping Address -->
                <div class="col-md-6">
                    <fieldset>
                        <legend>Shipping Address</legend>
                        <div class="form-group mb-3">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" class="form-control">
                            <span id="addressMsg"></span>
                        </div>
                        <div class="row form-group mb-3">
                            <div class="col-6">
                                <label for="city">City</label>
                                <input type="text" id="city" name="city" class="form-control">
                                <span id="cityMsg"></span>
                            </div>
                            <div class="col-6">
                                <label for="state">State</label>
                                <input type="text" id="state" name="state" class="form-control">
                                <span id="stateMsg"></span>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="zip">Pin Code</label>
                            <input type="text" id="pincode" name="zip" class="form-control">
                            <span id="pincodeMsg"></span>
                        </div>
                    </fieldset>
                </div>
            </div>

            <div class="row">
                </div>

                <div class="col-md-6">
                    <fieldset>
                        <legend>Order Summary</legend>
                        <ul class="list-unstyled" id="order-summary">
                            <div class="col-md-6">
                                <fieldset>
                                    <legend>Ordered Items</legend>
                                    <ul class="list-unstyled">
                                        <li class="media mb-3">
                                            <div class="row">
                                                <div class="col-6">
                                                    <img src="../images/product1(1).jpeg" class="mr-3" style="width:140px;height:100px;" alt="Gold Necklace">
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
                        </ul>
                    </fieldset>
                </div>
            </div>
            <br/>
            <div style="text-align: center;">
                <a href="order-history.php" style="padding: 10px 20px; font-size: 16px;"><input type='submit' name='order' value='Place Order' class="buy-now"></a>
            </div>
        </form>
    </div>
</section>
<br/><br/>
<?php
    include_once('footer.php');
?>
