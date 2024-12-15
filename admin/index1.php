<?php
include_once 'header.php';
$recordCount = 100; // Ensure $recordCount is defined in header.php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqk1w2y+h8p/j5+mE+9D+ZiZj0yZ/wGH/wgXrx2b9MC/m+g/z37l0Kq1tWulTAKYfxPkzG+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            justify-content: center;
            background-color: white;
            align-items: center;

        }

        .container {
            width: auto;
            /* Ensure it fits within the center */
        }

        .card {

            margin-top: 10px;
            border: none;
            background-color: #edeef0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);

        }

        .card-body {
            padding: 15px;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .card-text {
            color: #666;
        }

        .icon {
            font-size: 3rem;
            color: #666a6e;
        }

        .bg-gray {
            background-color: #f5f5f5;
        }

        .nav-link {
            color: #304878;
        }

        .nav-link:hover {
            text-decoration: underline;
            color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container d-flex flex-column align-items-center mt-5 pt-5"">
        <div class="container mt-1 margin-left-150px">
            <!-- Row 1 -->
            <div class="row justify-content-center">
                <div class="col-md-2 mb-4 ">
                    <div class="card bg-gray">
                        <div class="card-body text-center">
                            <i class="fas fa-users icon"></i>
                            <?php
                            $countQuery = "SELECT COUNT(*) as total FROM user_tbl where u_role='User' ";
                            $result = mysqli_query($con, $countQuery);
                            $data = mysqli_fetch_assoc($result);
                            $recordCount = $data['total'];
                            ?>
                            <h5 class="card-title">Total Users</h5>
                            <p class="card-text"><?php echo $recordCount; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-4">
                    <div class="card bg-gray">
                        <div class="card-body text-center">
                            <i class="fas fa-th-list icon"></i>
                            <?php
                            $countQuery = "SELECT COUNT(*) as total FROM category_tbl";
                            $result = mysqli_query($con, $countQuery);
                            $data = mysqli_fetch_assoc($result);
                            $recordCount = $data['total'];
                            ?>
                            <h5 class="card-title">Total Categories</h5>
                            <p class="card-text"><?php echo $recordCount; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-4">
                    <div class="card bg-gray">
                        <div class="card-body text-center">
                            <i class="fas fa-box icon"></i>
                            <?php
                            $countQuery = "SELECT COUNT(*) as total FROM product_tbl";
                            $result = mysqli_query($con, $countQuery);
                            $data = mysqli_fetch_assoc($result);
                            $recordCount = $data['total'];
                            ?>
                            <h5 class="card-title">Total Products</h5>
                            <p class="card-text"><?php echo $recordCount; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-4">
                    <div class="card bg-gray">
                        <div class="card-body text-center">
                            <i class="fas fa-user-check icon"></i>
                            <?php
                            $countQuery = "SELECT COUNT(*) as total FROM user_tbl where u_role='User' AND u_status='Active' ";
                            $result = mysqli_query($con, $countQuery);
                            $data = mysqli_fetch_assoc($result);
                            $recordCount = $data['total'];
                            ?>
                            <h5 class="card-title">Active Users</h5>
                            <p class="card-text"><?php echo $recordCount; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-4">
                    <div class="card bg-gray">
                        <div class="card-body text-center">
                            <i class="fas fa-user-slash icon"></i>
                            <?php
                            $countQuery = "SELECT COUNT(*) as total FROM user_tbl where u_role='User' AND u_status='Inactive' ";
                            $result = mysqli_query($con, $countQuery);
                            $data = mysqli_fetch_assoc($result);
                            $recordCount = $data['total'];
                            ?>
                            <h5 class="card-title">Inactive Users</h5>
                            <p class="card-text"><?php echo $recordCount; ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Row 2 -->
            <div class="row justify-content-center">
                <div class="col-md-2 mb-4">
                    <div class="card bg-gray">
                        <div class="card-body text-center">
                            <i class="fas fa-tags icon"></i>
                            <?php
                            $countQuery = "SELECT COUNT(*) as total FROM category_tbl where c_status='Active' ";
                            $result = mysqli_query($con, $countQuery);
                            $data = mysqli_fetch_assoc($result);
                            $recordCount = $data['total'];
                            ?>
                            <h5 class="card-title">Active Categories</h5>
                            <p class="card-text"><?php echo $recordCount; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-4">
                    <div class="card bg-gray">
                        <div class="card-body text-center">
                            <i class="fas fa-tag icon"></i>
                            <?php
                            $countQuery = "SELECT COUNT(*) as total FROM category_tbl where c_status='Inactive' ";
                            $result = mysqli_query($con, $countQuery);
                            $data = mysqli_fetch_assoc($result);
                            $recordCount = $data['total'];
                            ?>
                            <h5 class="card-title">Inactive Categories</h5>
                            <p class="card-text"><?php echo $recordCount; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-4">
                    <div class="card bg-gray">
                        <div class="card-body text-center">
                            <i class="fas fa-shopping-cart icon"></i>
                            <?php
                            $countQuery = "SELECT COUNT(*) as total FROM product_tbl where p_status='Active'";
                            $result = mysqli_query($con, $countQuery);
                            $data = mysqli_fetch_assoc($result);
                            $recordCount = $data['total'];
                            ?>
                            <h5 class="card-title">Active Products</h5>
                            <p class="card-text"><?php echo $recordCount; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-4">
                    <div class="card bg-gray">
                        <div class="card-body text-center">
                            <i class="fas fa-box-open icon"></i>
                            <?php
                            $countQuery = "SELECT COUNT(*) as total FROM product_tbl where p_status='Inactive'";
                            $result = mysqli_query($con, $countQuery);
                            $data = mysqli_fetch_assoc($result);
                            $recordCount = $data['total'];
                            ?>
                            <h5 class="card-title">Inactive Products</h5>
                            <p class="card-text"><?php echo $recordCount; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-4">
                    <div class="card bg-gray">
                        <div class="card-body text-center">
                            <i class="fas fa-tasks icon"></i>
                            <h5 class="card-title">Other Data</h5>
                            <p class="card-text"><?php echo $recordCount; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navigation Links -->
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
                        <a href="product.php" class="nav-link">Product</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <a href="review.php" class="nav-link">Feedback</a>
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
                        <a href="CarouselImage.php" class="nav-link">Slider</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>