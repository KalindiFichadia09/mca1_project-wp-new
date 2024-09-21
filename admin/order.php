<?php
    include_once 'header.php';
?>
<div class="container mt-5 pt-2">
    <!-- Title and Button Row -->
    <div class="row mt-5 mb-4">
        <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-start mb-2 mb-md-0">
            <h2 class="text-center text-md-left">Manage Order</h2>
        </div>
        <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end">
            <button id="toggleFormBtnI" class="btn btn-success">Insert Order</button>
        </div>
    </div>

    <!-- Form Insert -->
    <div id="formBlockInsert" class="row formBlock" style="display: none;">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="form-block p-4">
                <form action="order.php" method="post" id="insert" onsubmit="return orderInsertValidation();" enctype="multipart/form-data">
                    
                    <!-- Product Id -->
                    <div class="form-group mb-3">
                        <label for="productId">Product Id</label>
                        <input type="text" class="form-control" id="productId" name="productId" placeholder="Enter Full Name" >
                        <span id="productIdMsg"></span>
                    </div>

                    <!-- Full Name -->
                    <div class="form-group mb-3">
                        <label for="fullName">Full Name</label>
                        <input type="text" class="form-control" id="fullName" name="full_name" placeholder="Enter Full Name" >
                        <span id="fullNameMsg"></span>
                    </div>

                    <!-- Email -->
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" >
                        <span id="emailMsg"></span>
                    </div>

                    <!-- Mobile -->
                    <div class="form-group mb-3">
                        <label for="mobile">Mobile</label>
                        <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile Number" >
                        <span id="mobileMsg"></span>
                    </div>

                    <!-- Address -->
                    <div class="form-group mb-3">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" name="address" placeholder="Enter Address" ></textarea>
                        <span id="addressMsg"></span>
                    </div>

                    <!-- City -->
                    <div class="form-group mb-3">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" >
                        <span id="cityMsg"></span>
                    </div>

                    <!-- State -->
                    <div class="form-group mb-3">
                        <label for="state">State</label>
                        <input type="text" class="form-control" id="state" name="state" placeholder="Enter State" >
                        <span id="stateMsg"></span>
                    </div>

                    <!-- Pincode -->
                    <div class="form-group mb-3">
                        <label for="pincode">Pincode</label>
                        <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Enter Pincode" >
                        <span id="pincodeMsg"></span>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">Insert</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Table for Users -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Sr No</th>
                            <th scope="col">Order Id</th>
                            <th scope="col">Order User Id</th>
                            <th scope="col">Order Product Id</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Order Total Amount</th>
                            <th scope="col">Order Status</th>
                            <th scope="col">Show</th>
                            <th scope="col">Update</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>ORD101</td>
                            <td>USR101</td>
                            <td>PRD111</td>
                            <td>31/08/2024</td>
                            <td>₹ 50000</td>
                            <td><span class="status-text text-success">Completed</span></td>
                            <td>
                                <button class="btn btn-info btn-sm show-btn" data-target="#detailRow1"><i class="fas fa-eye"></i></button>
                            </td>
                            <td>
                                <button class="btn btn-primary btn-sm update-btn" data-target-update="#updateRow1"><i class="fas fa-arrow-down "></i></button>
                            </td>
                            <td>
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr id="detailRow1" class="detail-row" style="display:none;">
                            <td colspan="10">
                                <div class="row">
                                    <div class="col-6 p-3 border-right">
                                        <div class="col-12 d-flex justify-content-center mb-2">
                                            <h3 class="text-center">Order Information</h3>
                                        </div>
                                        <p><strong>Order Id:</strong> ORD101</p>
                                        <p><strong>Order Date:</strong> 31/08/2024</p>
                                        <p><strong>Order Amount :</strong> ₹ 50000</p>
                                        <p><strong>Order Status :</strong> Completed</p>
                                    </div>
                                    <div class="col-6 p-3">
                                        <div class="col-12 d-flex justify-content-center mb-2">
                                            <h3 class="text-center">Product Information</h3>
                                        </div>
                                        <p><strong>Product Id :</strong> PRD105</p>
                                        <p><strong>Product Name :</strong> Earring</p>
                                        <p><strong>Product Gross Weight :</strong> 7.5 gram</p>
                                        <p><strong>Product Total Amount :</strong> ₹ 50000</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 p-3 border-right">
                                        <div class="col-12 d-flex justify-content-center mb-2">
                                            <h3 class="text-center">Customer Information</h3>
                                        </div>
                                        <p><strong>User Id:</strong> USR101</p>
                                        <p><strong>Full Name:</strong> Jane Smith</p>
                                        <p><strong>Email :</strong> jane.smith@example.com</p>
                                        <p><strong>Mobile :</strong> 0987654321</p>
                                    </div>
                                    <div class="col-4 p-3 border-right">
                                        <div class="col-12 d-flex justify-content-center mb-2">
                                            <h3 class="text-centert">Shipping Address</h3>
                                        </div>
                                        <p><strong>Address :</strong> 456 Oak Avenue</p>
                                        <p><strong>City :</strong> Townsville</p>
                                        <p><strong>State :</strong> Stateville</p>
                                        <p><strong>Pincode :</strong> 654321</p>
                                    </div>
                                    <div class="col-4 p-3">
                                        <div class="col-12 d-flex justify-content-center mb-2">
                                            <h3 class="text-center">Billing Address</h3>
                                        </div>
                                        <p><strong>Address :</strong> 456 Oak Avenue</p>
                                        <p><strong>City :</strong> Townsville</p>
                                        <p><strong>State :</strong> Stateville</p>
                                        <p><strong>Pincode :</strong> 654321</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr id="updateRow1" class="update-row" style="display:none;">
                            <td colspan="10">
                                <div id="formBlockUpdate" class="row formBlock mb-5">
                                    <div class="col-lg-8 col-md-10 mx-auto">
                                        <div class="form-block p-4">
                                            <form action="order.php" id="update" method="post" onsubmit="return orderUpdateValidation(this);" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <!-- Product Id -->
                                                        <div class="form-group mb-3">
                                                            <label for="productId">Product Id</label>
                                                            <input type="text" class="form-control" id="productIdU" name="productId" placeholder="Enter Full Name" >
                                                            <span id="productIdMsgU"></span>
                                                        </div>

                                                        <!-- Email -->
                                                        <div class="form-group mb-3">
                                                            <label for="email">Email</label>
                                                            <input type="email" class="form-control" id="emailU" name="email" placeholder="Enter Email" >
                                                            <span id="emailMsgU"></span>
                                                        </div>

                                                        <!-- Address -->
                                                        <div class="form-group mb-3">
                                                            <label for="address">Address</label>
                                                            <textarea class="form-control" id="addressU" name="address" placeholder="Enter Address" ></textarea>
                                                            <span id="addressMsgU"></span>
                                                        </div>

                                                        <!-- State -->
                                                        <div class="form-group mb-3">
                                                            <label for="state">State</label>
                                                            <input type="text" class="form-control" id="stateU" name="state" placeholder="Enter State" >
                                                            <span id="stateMsgU"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <!-- Full Name -->
                                                        <div class="form-group mb-3">
                                                            <label for="fullName">Full Name</label>
                                                            <input type="text" class="form-control" id="fullNameU" name="full_name" placeholder="Enter Full Name" >
                                                            <span id="fullNameMsgU"></span>
                                                        </div>

                                                        <!-- Mobile -->
                                                        <div class="form-group mb-3">
                                                            <label for="mobile">Mobile</label>
                                                            <input type="tel" class="form-control" id="mobileU" name="mobile" placeholder="Enter Mobile Number" >
                                                            <span id="mobileMsgU"></span>
                                                        </div>

                                                        <!-- City -->
                                                        <div class="form-group mb-3">
                                                            <label for="city">City</label>
                                                            <input type="text" class="form-control" id="cityU" name="city" placeholder="Enter City" >
                                                            <span id="cityMsgU"></span>
                                                        </div>

                                                        <!-- Pincode -->
                                                        <div class="form-group mb-3">
                                                            <label for="pincodeU">Pincode</label>
                                                            <input type="text" class="form-control" id="pincodeU" name="pincode" placeholder="Enter Pincode">
                                                            <span id="pincodeMsgU"></span>
                                                        </div>
                                                    </div>
                                                    

                                                <!-- Submit Button -->
                                                <div class="d-flex justify-content-end mt-3">
                                                    <button type="submit" class="btn btn-success">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>ORD101</td>
                            <td>USR101</td>
                            <td>PRD111</td>
                            <td>31/08/2024</td>
                            <td>₹ 50000</td>
                            <td><span class="status-text text-success">Completed</span></td>
                            <td>
                                <button class="btn btn-info btn-sm show-btn" data-target="#detailRow2"><i class="fas fa-eye"></i></button>
                            </td>
                            <td>
                                <button class="btn btn-primary btn-sm update-btn" data-target-update="#updateRow2"><i class="fas fa-arrow-down "></i></button>
                            </td>
                            <td>
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr id="detailRow2" class="detail-row" style="display:none;">
                            <td colspan="10">
                                <div class="row">
                                    <div class="col-6 p-3 border-right">
                                        <div class="col-12 d-flex justify-content-center mb-2">
                                            <h3 class="text-center">Order Information</h3>
                                        </div>
                                        <p><strong>Order Id:</strong> ORD101</p>
                                        <p><strong>Order Date:</strong> 31/08/2024</p>
                                        <p><strong>Order Amount :</strong> ₹ 50000</p>
                                        <p><strong>Order Status :</strong> Completed</p>
                                    </div>
                                    <div class="col-6 p-3">
                                        <div class="col-12 d-flex justify-content-center mb-2">
                                            <h3 class="text-center">Product Information</h3>
                                        </div>
                                        <p><strong>Product Id :</strong> PRD105</p>
                                        <p><strong>Product Name :</strong> Earring</p>
                                        <p><strong>Product Gross Weight :</strong> 7.5 gram</p>
                                        <p><strong>Product Total Amount :</strong> ₹ 50000</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 p-3 border-right">
                                        <div class="col-12 d-flex justify-content-center mb-2">
                                            <h3 class="text-center">Customer Information</h3>
                                        </div>
                                        <p><strong>User Id:</strong> USR101</p>
                                        <p><strong>Full Name:</strong> Jane Smith</p>
                                        <p><strong>Email :</strong> jane.smith@example.com</p>
                                        <p><strong>Mobile :</strong> 0987654321</p>
                                    </div>
                                    <div class="col-4 p-3 border-right">
                                        <div class="col-12 d-flex justify-content-center mb-2">
                                            <h3 class="text-centert">Shipping Address</h3>
                                        </div>
                                        <p><strong>Address :</strong> 456 Oak Avenue</p>
                                        <p><strong>City :</strong> Townsville</p>
                                        <p><strong>State :</strong> Stateville</p>
                                        <p><strong>Pincode :</strong> 654321</p>
                                    </div>
                                    <div class="col-4 p-3">
                                        <div class="col-12 d-flex justify-content-center mb-2">
                                            <h3 class="text-center">Billing Address</h3>
                                        </div>
                                        <p><strong>Address :</strong> 456 Oak Avenue</p>
                                        <p><strong>City :</strong> Townsville</p>
                                        <p><strong>State :</strong> Stateville</p>
                                        <p><strong>Pincode :</strong> 654321</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr id="updateRow2" class="update-row" style="display:none;">
                            <td colspan="10">
                                <div id="formBlockUpdate" class="row formBlock mb-5">
                                    <div class="col-lg-8 col-md-10 mx-auto">
                                        <div class="form-block p-4">
                                            <form action="order.php" id="update" method="post" onsubmit="return orderUpdateValidation(this);" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <!-- Product Id -->
                                                        <div class="form-group mb-3">
                                                            <label for="productId">Product Id</label>
                                                            <input type="text" class="form-control" id="productIdU" name="productId" placeholder="Enter Full Name" >
                                                            <span id="productIdMsgU"></span>
                                                        </div>

                                                        <!-- Email -->
                                                        <div class="form-group mb-3">
                                                            <label for="email">Email</label>
                                                            <input type="email" class="form-control" id="emailU" name="email" placeholder="Enter Email" >
                                                            <span id="emailMsgU"></span>
                                                        </div>

                                                        <!-- Address -->
                                                        <div class="form-group mb-3">
                                                            <label for="address">Address</label>
                                                            <textarea class="form-control" id="addressU" name="address" placeholder="Enter Address" ></textarea>
                                                            <span id="addressMsgU"></span>
                                                        </div>

                                                        <!-- State -->
                                                        <div class="form-group mb-3">
                                                            <label for="state">State</label>
                                                            <input type="text" class="form-control" id="stateU" name="state" placeholder="Enter State" >
                                                            <span id="stateMsgU"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <!-- Full Name -->
                                                        <div class="form-group mb-3">
                                                            <label for="fullName">Full Name</label>
                                                            <input type="text" class="form-control" id="fullNameU" name="full_name" placeholder="Enter Full Name" >
                                                            <span id="fullNameMsgU"></span>
                                                        </div>

                                                        <!-- Mobile -->
                                                        <div class="form-group mb-3">
                                                            <label for="mobile">Mobile</label>
                                                            <input type="tel" class="form-control" id="mobileU" name="mobile" placeholder="Enter Mobile Number" >
                                                            <span id="mobileMsgU"></span>
                                                        </div>

                                                        <!-- City -->
                                                        <div class="form-group mb-3">
                                                            <label for="city">City</label>
                                                            <input type="text" class="form-control" id="cityU" name="city" placeholder="Enter City" >
                                                            <span id="cityMsgU"></span>
                                                        </div>

                                                        <!-- Pincode -->
                                                        <div class="form-group mb-3">
                                                            <label for="pincodeU">Pincode</label>
                                                            <input type="text" class="form-control" id="pincodeU" name="pincode" placeholder="Enter Pincode">
                                                            <span id="pincodeMsgU"></span>
                                                        </div>
                                                    </div>
                                                    

                                                <!-- Submit Button -->
                                                <div class="d-flex justify-content-end mt-3">
                                                    <button type="submit" class="btn btn-success">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</div>
</body>
</html>