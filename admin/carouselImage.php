<?php
include_once 'header.php';
?>
<div class="container mt-5 pt-2">
    <div class="row mt-5 mb-4 align-items-center">
        <!-- Title -->
        <div class="col-12 col-md-4 d-flex justify-content-center justify-content-md-start mb-2 mb-md-0">
            <h2 class="text-center text-md-left">Manage Slider</h2>
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
            <button id="toggleFormBtnI" class="btn btn-success">Insert Slider</button>
        </div>
    </div>


    <!-- Form Insert -->
    <div id="formBlockInsert" class="row formBlock" style="display: none;">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="form-block p-4">
                <form action="carouselImage.php" method="post" id="insert" onsubmit="return carouselValidation();"
                    enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label for="categoryName">Image Name</label>
                        <input type="text" class="form-control" id="imageName" name="name"
                            placeholder="Enter Category Name">
                        <span id="imageNameMsg"></span>
                    </div>
                    <div class="form-group mb-3">
                        <label for="categoryImage">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                        <span id="imageMsg"></span>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" name="btn_save" class="btn btn-success">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Table for Categories -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle">
                    <!-- Update the thead class to 'thead-dark' -->
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Sr No</th>
                            <th scope="col">Image Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Update</th>
                            <!-- <th scope="col">Status</th> -->
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $q = "select * from slider_tbl";
                        $result = mysqli_query($con, $q);
                        $search = isset($_GET['search']) ? $_GET['search'] : '';

                        // SQL query to include the search condition
                        $search_query = '';
                        if (!empty($search)) {
                            $search_query = "WHERE Name LIKE '%$search%' ";
                        }
                        // Adding search_query into SQL query
                        $q = "Select * from slider_tbl $search_query";
                        $result = mysqli_query($con, $q);

                        // Determine the total number of records
                        $q = "SELECT * FROM slider_tbl $search_query";
                        $result = mysqli_query($con, $q);
                        $total_records = mysqli_num_rows($result);

                        // Set the number of records per page
                        $records_per_page = 3;

                        // Calculate the total number of pages
                        $total_pages = ceil($total_records / $records_per_page);

                        // Get the current page number
                        $page = isset($_GET['page']) ? $_GET['page'] : 1;

                        // Calculate the start record for the current page
                        $start_from = ($page - 1) * $records_per_page;

                        // Fetch the records for the current page
                        $q = "SELECT * FROM slider_tbl $search_query LIMIT $start_from, $records_per_page";
                        $result = mysqli_query($con, $q);

                        while ($r = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo $r['Id']; ?></td>
                                <td><?php echo $r['Name']; ?></td>
                                <td><img src="<?php echo
                                    "../images/slider_image/" . $r['Image']; ?>" alt="<?php echo $r['Name']; ?>"
                                        width="300" height="150">
                                </td>
                                <td><button class="btn btn-primary btn-sm update-btn"
                                        data-target-update="#updateRow<?php echo $r['Id']; ?>"><i
                                            class="fas fa-arrow-down "></button></td>
                                <td>
                                    <form method="POST" action="">
                                        <input type="hidden" name="delete_id" value="<?php echo $r['Id']; ?>">
                                        <button type="submit" name="delete" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this record?');">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <tr id="updateRow<?php echo $r['Id']; ?>" class="update-row" style="display:none;">
                                <td colspan="8">
                                    <div id="formBlockUpdate" class="row formBlock mb-3">
                                        <div class="col-lg-8 col-md-10 mx-auto">
                                            <div class="form-block p-2">
                                                <form id="update" method="post" enctype="multipart/form-data"
                                                    onsubmit="return carouselValidation(this);">
                                                    <input type="hidden" name="id" value="<?php echo $r['Id']; ?>">
                                                    <div class="row">
                                                        <div class="col-md-4 product-image">
                                                            <img src="<?php echo
                                                                "../images/slider_image/" . $r['Image']; ?>"
                                                                alt="<?php echo $r['Name']; ?>" class="img-fluid"
                                                                style="max-width: 100%; height: auto;">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <!-- Image Name -->
                                                            <div class="form-group mb-3">
                                                                <label for="categoryNameU2">Name</label>
                                                                <input type="text" class="form-control" id="imageName"
                                                                    name="name" value="<?php echo $r['Name']; ?>">
                                                                <span id="imageNameMsg"></span>
                                                            </div>

                                                            <!-- Category Image -->
                                                            <div class="form-group mb-3">
                                                                <label for="categoryImageU2">Category Image</label>
                                                                <input type="file" class="form-control" id="image"
                                                                    name="image">
                                                                <span id="imageMsg"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-end">
                                                        <input type="submit" value="Update Slider" name="update"
                                                            class="btn btn-success">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5"></div>
            <nav class="col-md-2">
                <ul class="pagination">
                    <?php
                    if ($page > 1) {
                        echo "<li class='page-item'><a class='page-link btn-dark' href='?page=" . ($page - 1) . "&search=" . $search . "'><i class='fa fa-chevron-left'></i></a></li>";
                    }
                    for ($i = 1; $i <= $total_pages; $i++) {
                        echo "<li class='page-item " . ($i == $page ? 'active' : '') . "'><a class='page-link' href='?page=" . $i . "&search=" . $search . "'>" . $i . "</a></li>";
                    }
                    if ($page < $total_pages) {
                        echo "<li class='page-item'><a class='page-link' href='?page=" . ($page + 1) . "&search=" . $search . "'><i class='fa fa-chevron-right'></i></a></li>";
                    }
                    ?>
                </ul>
            </nav>
            <div class="col-md-5"></div>
        </div>
    </div>
</div>
</body>

</html>
<?php
// insert new slider
if (isset($_POST['btn_save'])) {
    $name = $_POST['name'];
    $image = $_FILES['image'];

    $countQuery = "SELECT COUNT(*) as total FROM slider_tbl";
    $result = mysqli_query($con, $countQuery);
    $data = mysqli_fetch_assoc($result);
    $recordCount = $data['total'];

    if ($recordCount < 3) {
        $image_name = $image['name'];
        $image_type = $image['type'];
        $image_tmp_name = $image['tmp_name'];
        $image_size = $image['size'];

        if ($image_type == "image/jpeg" || $image_type == "image/jpg" || $image_type == "image/png" || $image_type == "image/gif") {
            if ($image_size <= 50000000) {
                $new_image_name = time() . "_" . $image_name;

                $q = "INSERT INTO slider_tbl (`Name`, `Image`) VALUES ('$name', '$new_image_name')";
                if (mysqli_query($con, $q)) {
                    if (!is_dir("../images/slider_image")) {
                        mkdir("../images/slider_image");
                    }
                    move_uploaded_file($image_tmp_name, "../images/slider_image/" . $new_image_name);
                    ?>
                    <script>
                        alert("Slider inserted !!");
                        window.location.href = "carouselImage.php";
                    </script>
                    <?php
                } else {
                    ?>
                    <script>
                        alert("Slider not inserted");
                        window.location.href = "carouselImage.php";
                    </script>
                    <?php
                }
            } else {
                ?>
                <script>
                    alert("Image size is too large");
                </script>
                <?php
            }
        } else {
            ?>
            <script>
                alert("Invalid image format");
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            alert("You can only add up to 3 images");
            window.location.href = "carouselImage.php";
        </script>
        <?php
    }
}

// update slider
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $image = $_FILES['image'];

    $image_name = $image['name'];
    $image_type = $image['type'];
    $image_tmp_name = $image['tmp_name'];
    $image_size = $image['size'];

    if ($image_name) {
        if ($image_type == "image/jpeg" || $image_type == "image/jpg" || $image_type == "image/png" || $image_type == "image/gif") {
            if ($image_size <= 50000000) {
                $new_image_name = time() . "_" . $image_name;

                $q = "UPDATE slider_tbl SET `Name` = '$name', `Image` = '$new_image_name' WHERE `Id` = '$id'";
                if (mysqli_query($con, $q)) {
                    move_uploaded_file($image_tmp_name, "../images/slider_image/" . $new_image_name);
                    ?>
                    <script>
                        alert("Slider updated with new image!");
                        window.location.href = "carouselImage.php";
                    </script>
                    <?php
                } else {
                    ?>
                    <script>
                        alert("Slider not updated");
                        window.location.href = "carouselImage.php";
                    </script>
                    <?php
                }
            } else {
                ?>
                <script>
                    alert("Image size is too large");
                </script>
                <?php
            }
        } else {
            ?>
            <script>
                alert("Invalid image format");
            </script>
            <?php
        }
    } else {
        $q = "UPDATE slider_tbl SET `Name` = '$name' WHERE `Id` = '$id'";

        if (mysqli_query($con, $q)) {
            ?>
            <script>
                alert("Slider updated without changing image!");
                window.location.href = "carouselImage.php";
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("Slider not updated");
                window.location.href = "carouselImage.php";
            </script>
            <?php
        }
    }
}

// delete slider
if (isset($_POST['delete'])) {
    $delete_id = $_POST['delete_id'];
    $delete_query = "DELETE FROM slider_tbl WHERE Id = '$delete_id'";
    if (mysqli_query($con, $delete_query)) {
        echo "<script>confirm('Record deleted successfully');</script>";
    } else {
        echo "<script>confirm('Error deleting record');</script>";
    }
    echo "<script>window.location.href = 'carouselImage.php';</script>";
}
?>