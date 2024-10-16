<?php
include_once '../conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jayshree Jewels</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/admin_style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="../js/admin_script.js" defer></script>
    <script src="../js/all_validation.js"></script>
</head>

<body>
    <div class="header">
        <button id="toggle-btn" class="toggle-btn">
            <i class="fas fa-bars"></i>
        </button>
        <div class="header-left ml-4">
            <a href="index.php" class="logo">
                <img src="../images/logo.png" alt="Jayshree Jewels Logo" class="logo-img">
            </a>
        </div>
        <div class="header-middle">
            <nav>
                <ul class="nav-links">
                    <li><a href="index.php">Dashboard</a></li>
                    <li><a href="user.php">User</a></li>
                    <li><a href="category.php">Category</a></li>
                    <li><a href="product.php">Product</a></li>
                    <li><a href="cart.php">Cart</a></li>
                    <li><a href="wishlist.php">Wishlist</a></li>
                    <li><a href="order.php">Order</a></li>
                    <li><a href="feedback.php">Feedback</a></li>
                    <li><a href="carouselimage.php">carouselImage</a></li>
                </ul>
            </nav>
        </div>
        <div class="header-right mr-4">
            <div class="dropdown">
                <a class="text-light dropdown-toggle" href="#" id="adminDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Admin
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="adminDropdown">
                    <li><a class="dropdown-item" href="admin_setting.php">Admin Settings</a></li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div id="sidebar" class="sidebar">
        <ul>
            <li><a href="index.php" class="nav-link"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="user.php" class="nav-link"><i class="fas fa-user"></i> User</a></li>
            <li><a href="category.php" class="nav-link"><i class="fas fa-list"></i> Category</a></li>
            <li><a href="product.php" class="nav-link"><i class="fas fa-box"></i> Product</a></li>
            <li><a href="cart.php" class="nav-link"><i class="fas fa-shopping-cart"></i> Cart</a></li>
            <li><a href="wishlist.php" class="nav-link"><i class="fas fa-heart"></i> Wishlist</a></li>
            <li><a href="order.php" class="nav-link"><i class="fas fa-receipt"></i> Order</a></li>
            <li><a href="feedback.php" class="nav-link"><i class="fas fa-comments"></i> Feedback</a></li>
            <li><a href="carouselImage.php" class="nav-link"><i class="fas fa-comments"></i> carouselImage</a></li>
        </ul>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php
                error_reporting(0);
                if (isset($_COOKIE['success'])) {
                    ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong></strong> <?php echo $_COOKIE['success']; ?>
                        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
    
                        </button>
                    </div>
                    <?php
                }
                if (isset($_COOKIE['error'])) {
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong></strong> <?php echo $_COOKIE['error']; ?>
                        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
    
                        </button>
                    </div>
                    <?php
                }

                setcookie('success', '', time() - 3600, '/');
                setcookie('error', '', time() - 3600, '/');
                ?>
            </div>
        </div>
    </div>