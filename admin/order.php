<?php
include_once 'header.php';
?>
<div class="container mt-5 pt-2">
    <div class="row mt-5 mb-4 align-items-center">
        <!-- Title -->
        <div class="col-12 col-md-4 d-flex justify-content-center justify-content-md-start mb-2 mb-md-0">
            <h2 class="text-center text-md-left">Manage Orders</h2>
        </div>

        <!-- Search form -->
        <div class="col-12 col-md-4 d-flex justify-content-center mb-2 mb-md-0">
            <form method="GET" action="" class="d-flex w-100">
                <div class="input-group w-100">
                    <input type="text" name="search" class="form-control" placeholder="Search here"
                        value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                    <div class="input-group-append">
                        <button class="btn btn-dark" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Button -->
        <div class="col-12 col-md-4 d-flex justify-content-center justify-content-md-end">
            <button id="toggleFormBtnI" class="btn btn-success">Insert Order</button>
        </div>
    </div>

    <!-- Form Insert -->
    <div id="formBlockInsert" class="row formBlock" style="display: none;">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="form-block p-4">
                <form action="order.php" method="post" id="insert" onsubmit="return orderInsertValidation();"
                    enctype="multipart/form-data">

                    <!-- Product Id -->
                    <div class="form-group mb-3">
                        <label for="productId">Product Id</label>
                        <input type="text" class="form-control" id="productId" name="productId"
                            placeholder="Enter Full Name">
                        <span id="productIdMsg"></span>
                    </div>

                    <!-- Full Name -->
                    <div class="form-group mb-3">
                        <label for="fullName">Full Name</label>
                        <input type="text" class="form-control" id="fullName" name="full_name"
                            placeholder="Enter Full Name">
                        <span id="fullNameMsg"></span>
                    </div>

                    <!-- Email -->
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                        <span id="emailMsg"></span>
                    </div>

                    <!-- Mobile -->
                    <div class="form-group mb-3">
                        <label for="mobile">Mobile</label>
                        <input type="tel" class="form-control" id="mobile" name="mobile"
                            placeholder="Enter Mobile Number">
                        <span id="mobileMsg"></span>
                    </div>

                    <!-- Address -->
                    <div class="form-group mb-3">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" name="address"
                            placeholder="Enter Address"></textarea>
                        <span id="addressMsg"></span>
                    </div>

                    <!-- City -->
                    <div class="form-group mb-3">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="Enter City">
                        <span id="cityMsg"></span>
                    </div>

                    <!-- State -->
                    <div class="form-group mb-3">
                        <label for="state">State</label>
                        <input type="text" class="form-control" id="state" name="state" placeholder="Enter State">
                        <span id="stateMsg"></span>
                    </div>

                    <!-- Pincode -->
                    <div class="form-group mb-3">
                        <label for="pincode">Pincode</label>
                        <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Enter Pincode">
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
                            <th scope="col">Order Username</th>
                            <th scope="col">Order Id</th>
                            <th scope="col">Product Id</th>
                            <th scope="col">Order Total Amount</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Order Status</th>
                            <th scope="col">Show</th>
                            <!-- <th scope="col">Update</th>
                            <th scope="col">Delete</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Get search keyword if available
                        $search = isset($_GET['search']) ? $_GET['search'] : '';

                        // SQL query to fetch cart records with search condition
                        $search_query = "";
                        if (!empty($search)) {
                            $search_query = "WHERE o_order_id LIKE '%$search%' OR o_username LIKE '%$search%' OR o_p_code LIKE '%$search%' OR o_total_amount LIKE '%$search%'";
                        }

                        // Count total records for pagination
                        $q_count = "SELECT COUNT(*) AS total FROM order_tbl $search_query";
                        $result_count = mysqli_query($con, $q_count);
                        $row_count = mysqli_fetch_assoc($result_count);
                        $total_records = $row_count['total'];

                        // Set number of records per page
                        $records_per_page = 3;

                        // Calculate the total number of pages
                        $total_pages = ceil($total_records / $records_per_page);

                        // Get the current page number
                        $page = isset($_GET['page']) ? $_GET['page'] : 1;

                        // Calculate the start record for the current page
                        $start_from = ($page - 1) * $records_per_page;

                        // Fetch cart records with pagination and search query
                        $q = "SELECT * FROM order_tbl $search_query LIMIT $start_from, $records_per_page";
                        $result = mysqli_query($con, $q);

                        // Loop through cart records and display in table
                        if (mysqli_num_rows($result) > 0) {
                            $sr_no = $start_from + 1; // Row serial number
                            while ($r = mysqli_fetch_assoc($result)) {
                                ?>
                                                <tr>
                                                    <td><?php echo $sr_no++; ?></td>
                                                    <td><?php echo $r['o_username']; ?></td>
                                                    <td><?php echo $r['o_order_id']; ?></td>
                                                    <td><?php echo $r['o_p_code']; ?></td>
                                                    <td>₹ <?php echo $r['o_total_amount']; ?></td>
                                                    <td><?php echo $r['o_date'] ?></td>
                                                    <td><span class="status-text 
                                    <?php
                                    echo ($r['o_delivery_status'] === 'Cancelled') ? 'text-danger' :
                                        (($r['o_delivery_status'] === 'Not Deliver') ? 'text-primary' : 'text-success');
                                    ?>">
                                                            <?php echo $r['o_delivery_status']; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <button class="btn btn-info btn-sm show-btn"
                                            data-target="#detailRow<?php echo $r['o_id'] ?>"><i
                                                class="fas fa-eye"></i></button>
                                        </td>
                                        <!--<td>
                                             <button class="btn btn-primary btn-sm update-btn"
                                            data-target-update="#updateRow<?php echo $r['o_id'] ?>"><i
                                                class="fas fa-arrow-down "></i></button>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                        </td> -->
                                        </tr>
                                <tr id="detailRow<?php echo $r['o_id'] ?>" class="detail-row" style="display:none;">
                                    <td colspan="10">
                                        <div class="row">
                                            <div class="col-6 p-3 border-right">
                                                <div class="col-12 d-flex justify-content-center mb-2">
                                                    <h3 class="text-center">Order Information</h3>
                                                </div>
                                                <p><strong>Order Id:</strong> <?php echo $r['o_order_id'] ?></p>
                                                <p><strong>Order Date:</strong> <?php echo $r['o_date'] ?></p>
                                                <p><strong>Order Amount :</strong> ₹ <?php echo $r['o_total_amount'] ?></p>
                                                <p><strong>Delivery Status :</strong> <?php echo $r['o_delivery_status'] ?></p>
                                                <p><strong>Payment Status :</strong> <?php echo $r['o_payment_status'] ?></p>
                                                </div>
                                                <div class="col-6 p-3">
                                                    <div class="col-12 d-flex justify-content-center mb-2">
                                                        <h3 class="text-center">Product Information</h3>
                                                    </div>
                                                    <?php
                                                    $pcode = $r['o_p_code'];
                                                    $qp = "select * from product_tbl where p_code = '$pcode' ";
                                                    $resultp = mysqli_query($con, $qp);
                                                    while ($rp = mysqli_fetch_assoc($resultp)) {
                                                        ?>
                                                    <p><strong>Product Id :</strong> <?php echo $rp['p_code']; ?></p>
                                                    <p><strong>Product Name :</strong> <?php echo $rp['p_name']; ?></p>
                                                    <p><strong>Product Gross Weight :</strong> <?php echo $rp['p_gross_weight']; ?></p>
                                                    <p><strong>Product Total Amount :</strong> ₹ <?php echo $rp['p_total_price']; ?></p>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6 p-3 border-right">
                                                        <div class="col-12 d-flex justify-content-center mb-2">
                                                            <h3 class="text-center">Customer Information</h3>
                                                        </div>
                                                        <?php 
                                                        $username = $r['o_username'];
                                                        $qu = "select * from user_tbl where u_email = '$username' ";
                                                        $resultu = mysqli_query($con, $qu);
                                                        while ($ru = mysqli_fetch_assoc($resultu)) {
                                                            ?>
                                                        <p><strong>User Id:</strong> <?php echo $ru['u_code']; ?></p>
                                                        <p><strong>Full Name:</strong> <?php echo $ru['u_fullname']; ?></p>
                                                        <p><strong>Email :</strong> <?php echo $ru['u_email']; ?></p>
                                                        <p><strong>Mobile :</strong> <?php echo $ru['u_mobile']; ?></p>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="col-6 p-3">
                                                        <div class="col-12 d-flex justify-content-center mb-2">
                                                            <h3 class="text-centert">Shipping Address</h3>
                                                        </div>
                                                        <p><strong>Address :</strong> <?php echo $r['o_address']; ?></p>
                                                        <p><strong>City :</strong> <?php echo $r['o_city']; ?></p>
                                                        <p><strong>State :</strong> <?php echo $r['o_state']; ?></p>
                                                        <p><strong>Pincode :</strong> <?php echo $r['o_pincode']; ?></p>
                                                    </div>
                                                    <!-- <div class="col-4 p-3">
                                                        <div class="col-12 d-flex justify-content-center mb-2">
                                                            <h3 class="text-center">Billing Address</h3>
                                                        </div>
                                                        <p><strong>Address :</strong> 456 Oak Avenue</p>
                                                        <p><strong>City :</strong> Townsville</p>
                                                        <p><strong>State :</strong> Stateville</p>
                                                        <p><strong>Pincode :</strong> 654321</p>
                                                    </div> -->
                                                    </div>
                                                    </td>
                                                    </tr>
                                <tr id="updateRow<?php echo $r['o_id'] ?>" class="update-row" style="display:none;">
                                    <td colspan="10">
                                        <div id="formBlockUpdate" class="row formBlock mb-5">
                                            <div class="col-lg-8 col-md-10 mx-auto">
                                                <div class="form-block p-4">
                                                    <form action="order.php" id="update" method="post" onsubmit="return orderUpdateValidation(this);"
                                                        enctype="multipart/form-data">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <!-- Product Id -->
                                                                <div class="form-group mb-3">
                                                                    <label for="productId">Product Id</label>
                                                                    <input type="text" class="form-control" id="productIdU" name="productId"
                                                                        placeholder="Enter Full Name">
                                                                    <span id="productIdMsgU"></span>
                                                                </div>

                                                                <!-- Email -->
                                                                <div class="form-group mb-3">
                                                                    <label for="email">Email</label>
                                                                    <input type="email" class="form-control" id="emailU"
                                                                        name="email" placeholder="Enter Email">
                                                                    <span id="emailMsgU"></span>
                                                                </div>

                                                                <!-- Address -->
                                                                <div class="form-group mb-3">
                                                                    <label for="address">Address</label>
                                                                    <textarea class="form-control" id="addressU" name="address"
                                                                        placeholder="Enter Address"></textarea>
                                                                    <span id="addressMsgU"></span>
                                                                </div>

                                                                <!-- State -->
                                                                <div class="form-group mb-3">
                                                                    <label for="state">State</label>
                                                                    <input type="text" class="form-control" id="stateU"
                                                                        name="state" placeholder="Enter State">
                                                                    <span id="stateMsgU"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <!-- Full Name -->
                                                                <div class="form-group mb-3">
                                                                    <label for="fullName">Full Name</label>
                                                                    <input type="text" class="form-control" id="fullNameU"
                                                                        name="full_name" placeholder="Enter Full Name">
                                                                    <span id="fullNameMsgU"></span>
                                                                </div>

                                                                <!-- Mobile -->
                                                                <div class="form-group mb-3">
                                                                    <label for="mobile">Mobile</label>
                                                                    <input type="tel" class="form-control" id="mobileU"
                                                                        name="mobile" placeholder="Enter Mobile Number">
                                                                    <span id="mobileMsgU"></span>
                                                                </div>

                                                                <!-- City -->
                                                                <div class="form-group mb-3">
                                                                    <label for="city">City</label>
                                                                    <input type="text" class="form-control" id="cityU"
                                                                        name="city" placeholder="Enter City">
                                                                    <span id="cityMsgU"></span>
                                                                </div>

                                                                <!-- Pincode -->
                                                                <div class="form-group mb-3">
                                                                    <label for="pincodeU">Pincode</label>
                                                                    <input type="text" class="form-control" id="pincodeU"
                                                                        name="pincode" placeholder="Enter Pincode">
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
                                <?php
                            }
                        } else {
                            echo "<tr><td colspan='5'>No records found.</td></tr>";
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </body>

    </html>