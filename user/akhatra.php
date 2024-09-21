<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jaysheree Jewels-Home</title>
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <link rel="stylesheet" href="css/bootstrap.min.css"></link>
    <link rel="stylesheet" href="css/style.css"></link>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</head>
<body>
<header>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light pt-4">
                <div class="container-fluid">
                    <a href="index.php"><img src="../images/logo1.png" alt="Jayshree Jewels"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php" data-page="home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="category.php" data-page="categories">Categories</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="aboutUs.php" data-page="about">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contactUs.php" data-page="contact">Contact Us</a>
                            </li>
                        </ul>
                    <!-- Search Bar -->
                    <form class="d-flex ms-auto" action="search.php" method="GET">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query">
                        <button class="buy-now" type="submit">Search</button>
                    </form>
                    <!-- Sign In -->
                    <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Sign In</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>