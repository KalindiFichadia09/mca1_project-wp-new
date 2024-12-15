<?php
include_once 'header.php';
?>
<div class="container mt-5 pt-5">
    <div class="row">
        <!-- Total Users -->
        <div class="col-md-4 mb-4">
            <div class="card text-center bg-secondary shadow-lg rounded">
                <div class="row p-2 align-items-center">
                    <!-- Image Section -->
                    <div class="col-5 p-1 text-center">
                        <img src="../images/totalUser.png" alt="User Image" class="img-fluid"
                            style="max-width: 80px; height: 80px; border-radius: 50%; border: 3px solid white;">
                    </div>
                    <?php
                    $countQuery = "SELECT COUNT(*) as total FROM user_tbl where u_role='User' ";
                    $result = mysqli_query($con, $countQuery);
                    $data = mysqli_fetch_assoc($result);
                    $recordCount = $data['total'];
                    ?>
                    <!-- Text Section -->
                    <div class="col-7 p-1 text-start">
                        <h5 class="mb-0 text-white"><strong>Total Users</strong></h5>
                        <p class="mb-0 text-white"><strong><?php echo $recordCount; ?></strong></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Categories -->
        <div class="col-md-4 mb-4">
            <div class="card text-center bg-secondary shadow-lg rounded">
                <div class="row p-2 align-items-center">
                    <!-- Image Section -->
                    <div class="col-5 p-1 text-center">
                        <img src="../images/totalCategory.png" alt="User Image" class="img-fluid"
                            style="max-width: 80px; height: 80px; border-radius: 50%; border: 3px solid white;">
                    </div>
                    <?php
                    $countQuery = "SELECT COUNT(*) as total FROM category_tbl";
                    $result = mysqli_query($con, $countQuery);
                    $data = mysqli_fetch_assoc($result);
                    $recordCount = $data['total'];
                    ?>
                    <!-- Text Section -->
                    <div class="col-7 p-1 text-start">
                        <h5 class="mb-0 text-white"><strong>Total Categories</strong></h5>
                        <p class="mb-0 text-white"><strong><?php echo $recordCount; ?></strong></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Products -->
        <div class="col-md-4 mb-4">
            <div class="card text-center bg-secondary shadow-lg rounded">
                <div class="row p-2 align-items-center">
                    <!-- Image Section -->
                    <div class="col-5 p-1 text-center">
                        <img src="../images/totalProduct.png" alt="User Image" class="img-fluid"
                            style="max-width: 80px; height: 80px; border-radius: 50%; border: 3px solid white;">
                    </div>
                    <?php
                    $countQuery = "SELECT COUNT(*) as total FROM product_tbl";
                    $result = mysqli_query($con, $countQuery);
                    $data = mysqli_fetch_assoc($result);
                    $recordCount = $data['total'];
                    ?>
                    <!-- Text Section -->
                    <div class="col-7 p-1 text-start">
                        <h5 class="mb-0 text-white"><strong>Total Products</strong></h5>
                        <p class="mb-0 text-white"><strong><?php echo $recordCount; ?></strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Total Active Users -->
        <div class="col-md-4 mb-4">
            <div class="card text-center bg-secondary shadow-lg rounded">
                <div class="row p-2 align-items-center">
                    <!-- Image Section -->
                    <div class="col-5 p-1 text-center">
                        <img src="../images/totalUser.png" alt="User Image" class="img-fluid"
                            style="max-width: 80px; height: 80px; border-radius: 50%; border: 3px solid white;">
                    </div>
                    <?php
                    $countQuery = "SELECT COUNT(*) as total FROM user_tbl where u_role='User' AND u_status='Active' ";
                    $result = mysqli_query($con, $countQuery);
                    $data = mysqli_fetch_assoc($result);
                    $recordCount = $data['total'];
                    ?>
                    <!-- Text Section -->
                    <div class="col-7 p-1 text-start">
                        <h5 class="mb-0 text-white"><strong>Total Active Users</strong></h5>
                        <p class="mb-0 text-white"><strong><?php echo $recordCount; ?></strong></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Active Categories -->
        <div class="col-md-4 mb-4">
            <div class="card text-center bg-secondary shadow-lg rounded">
                <div class="row p-2 align-items-center">
                    <!-- Image Section -->
                    <div class="col-5 p-1 text-center">
                        <img src="../images/totalCategory.png" alt="User Image" class="img-fluid"
                            style="max-width: 80px; height: 80px; border-radius: 50%; border: 3px solid white;">
                    </div>
                    <?php
                    $countQuery = "SELECT COUNT(*) as total FROM category_tbl where c_status='Active' ";
                    $result = mysqli_query($con, $countQuery);
                    $data = mysqli_fetch_assoc($result);
                    $recordCount = $data['total'];
                    ?>
                    <!-- Text Section -->
                    <div class="col-7 p-1 text-start">
                        <h5 class="mb-0 text-white"><strong>Total Active Categories</strong></h5>
                        <p class="mb-0 text-white"><strong><?php echo $recordCount; ?></strong></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Active Products -->
        <div class="col-md-4 mb-4">
            <div class="card text-center bg-secondary shadow-lg rounded">
                <div class="row p-2 align-items-center">
                    <!-- Image Section -->
                    <div class="col-5 p-1 text-center">
                        <img src="../images/totalProduct.png" alt="User Image" class="img-fluid"
                            style="max-width: 80px; height: 80px; border-radius: 50%; border: 3px solid white;">
                    </div>
                    <?php
                    $countQuery = "SELECT COUNT(*) as total FROM product_tbl where p_status='Active'";
                    $result = mysqli_query($con, $countQuery);
                    $data = mysqli_fetch_assoc($result);
                    $recordCount = $data['total'];
                    ?>
                    <!-- Text Section -->
                    <div class="col-7 p-1 text-start">
                        <h5 class="mb-0 text-white"><strong>Total Active Products</strong></h5>
                        <p class="mb-0 text-white"><strong><?php echo $recordCount; ?></strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Total Inactive Users -->
        <div class="col-md-4 mb-4">
            <div class="card text-center bg-secondary shadow-lg rounded">
                <div class="row p-2 align-items-center">
                    <!-- Image Section -->
                    <div class="col-5 p-1 text-center">
                        <img src="../images/totalUser.png" alt="User Image" class="img-fluid"
                            style="max-width: 80px; height: 80px; border-radius: 50%; border: 3px solid white;">
                    </div>
                    <?php
                    $countQuery = "SELECT COUNT(*) as total FROM user_tbl where u_role='User' AND u_status='Inactive' ";
                    $result = mysqli_query($con, $countQuery);
                    $data = mysqli_fetch_assoc($result);
                    $recordCount = $data['total'];
                    ?>
                    <!-- Text Section -->
                    <div class="col-7 p-1 text-start">
                        <h5 class="mb-0 text-white"><strong>Total Inactive Users</strong></h5>
                        <p class="mb-0 text-white"><strong><?php echo $recordCount; ?></strong></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Inactive Categories -->
        <div class="col-md-4 mb-4">
            <div class="card text-center bg-secondary shadow-lg rounded">
                <div class="row p-2 align-items-center">
                    <!-- Image Section -->
                    <div class="col-5 p-1 text-center">
                        <img src="../images/totalCategory.png" alt="User Image" class="img-fluid"
                            style="max-width: 80px; height: 80px; border-radius: 50%; border: 3px solid white;">
                    </div>
                    <?php
                    $countQuery = "SELECT COUNT(*) as total FROM category_tbl where c_status='Inactive' ";
                    $result = mysqli_query($con, $countQuery);
                    $data = mysqli_fetch_assoc($result);
                    $recordCount = $data['total'];
                    ?>
                    <!-- Text Section -->
                    <div class="col-7 p-1 text-start">
                        <h5 class="mb-0 text-white"><strong>Total Inactive Categories</strong></h5>
                        <p class="mb-0 text-white"><strong><?php echo $recordCount; ?></strong></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Inactive Products -->
        <div class="col-md-4 mb-4">
            <div class="card text-center bg-secondary shadow-lg rounded">
                <div class="row p-2 align-items-center">
                    <!-- Image Section -->
                    <div class="col-5 p-1 text-center">
                        <img src="../images/totalProduct.png" alt="User Image" class="img-fluid"
                            style="max-width: 80px; height: 80px; border-radius: 50%; border: 3px solid white;">
                    </div>
                    <?php
                    $countQuery = "SELECT COUNT(*) as total FROM product_tbl where p_status='Inactive'";
                    $result = mysqli_query($con, $countQuery);
                    $data = mysqli_fetch_assoc($result);
                    $recordCount = $data['total'];
                    ?>
                    <!-- Text Section -->
                    <div class="col-7 p-1 text-start">
                        <h5 class="mb-0 text-white"><strong>Total Inactive Products</strong></h5>
                        <p class="mb-0 text-white"><strong><?php echo $recordCount; ?></strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- all diractions -->
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <a href="user.php" class="nav-link">User</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <a href="about_us.php" class="nav-link">About Us</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <a href="contact.php" class="nav-link">Contact Us</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <a href="category.php" class="nav-link">Category</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <a href="sub_category.php" class="nav-link">Sub Category</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <a href="product.php" class="nav-link">Product</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <a href="review.php" class="nav-link">Reviews</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <a href="cart.php" class="nav-link">Cart</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <a href="wishlist.php" class="nav-link">Wishlist</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <a href="order.php" class="nav-link">Order</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <a href="carouselImage.php" class="nav-link">Slider</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>