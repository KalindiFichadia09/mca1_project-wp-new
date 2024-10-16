<?php
include_once 'header.php';
include_once '../conn.php';
?>
<div class="container mt-5 pt-2">
    <!-- Title and Button Row -->
    <div class="row mt-5 mb-4">
        <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-start mb-2 mb-md-0">
            <h2 class="text-center text-md-left">Manage Category</h2>
        </div>
        <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end">
            <button id="toggleFormBtnI" class="btn btn-success">Category Insert</button>
        </div>
    </div>
    
     <!-- search form -->
     <div class="d-flex justify-content-between align-items-center mb-3">
    <!-- Search Form -->
    <form method="GET" action="" class="d-flex align-items-center">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search here" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
            <div class="input-group-append">
                <button class="btn btn-dark" type="submit">Search</button>
            </div>
        </div>
    </form>
</div>

    <!-- Form Insert -->
    <div id="formBlockInsert" class="row formBlock" style="display: none;">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="form-block p-4">
                <form method="post" id="insert" onsubmit="return categoryInsertValidation();"
                    enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label for="categoryName">Category Name</label>
                        <input type="text" class="form-control" id="categoryName" name="c_name"
                            placeholder="Enter Category Name">
                        <span id="categoryNameMsg"></span>
                    </div>
                    <div class="form-group mb-3">
                        <label>Category Gender</label>
                        <div class="form-control">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="c_gender" id="genderMale"
                                    value="Male">
                                <label class="form-check-label" for="genderMale">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="c_gender" id="genderFemale"
                                    value="Female">
                                <label class="form-check-label" for="genderFemale">Female</label>
                            </div>
                        </div>
                        <span id="categoryGenderMsg"></span>
                    </div>
                    <div class="form-group mb-3">
                        <label for="categoryImage">Category Image</label>
                        <input type="file" class="form-control" id="categoryImage" name="c_image">
                        <span id="categoryImageMsg"></span>
                    </div>
                    <div class="form-group mb-3">
                        <label>Category Status</label>
                        <div class="form-control">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="c_status" id="active"
                                    value="Active">
                                <label class="form-check-label" for="active">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="c_status" id="inactive"
                                    value="Inactive">
                                <label class="form-check-label" for="inactive">Inactive</label>
                            </div>
                        </div>
                        <span id="categoryStatusMsg"></span>
                    </div>
                    <div class="d-flex justify-content-end">
                        <input type="submit" value="Add Category" name="add" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Table for Categories -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="table-responsive">
                <?php
                $q = "select * from category_tbl";
                $result = mysqli_query($con, $q);
                ?>
                <table class="table table-bordered text-center align-middle">
                    <!-- Update the thead class to 'thead-dark' -->
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Sr No</th>
                            <th scope="col">Category Code</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Category Gender</th>
                            <th scope="col">Category Image</th>
                            <th scope="col">Status</th>
                            <th scope="col">Update</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                        <?php
                        $search = isset($_GET['search']) ? $_GET['search'] : '';

                        // SQL query to include the search condition
                        $search_query = '';
                        if (!empty($search)) {
                            $search_query = "WHERE c_name LIKE '%$search%' OR c_status LIKE '%$search%'";
                        }
                        // Adding search_query into SQL query
                        $q = "Select * from category_tbl $search_query";
                        $result = mysqli_query($con, $q);

                        // Determine the total number of records
                        $q = "SELECT * FROM category_tbl $search_query";
                        $result = mysqli_query($con, $q);
                        $total_records = mysqli_num_rows($result);

                        // Set the number of records per page
                        $records_per_page = 2;

                        // Calculate the total number of pages
                        $total_pages = ceil($total_records / $records_per_page);

                        // Get the current page number
                        $page = isset($_GET['page']) ? $_GET['page'] : 1;

                        // Calculate the start record for the current page
                        $start_from = ($page - 1) * $records_per_page;

                        // Fetch the records for the current page
                        $q = "SELECT * FROM category_tbl $search_query LIMIT $start_from, $records_per_page";
                        $result = mysqli_query($con, $q);

                        while ($r = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $r['c_id']; ?></td>
                            <td><?php echo $r['c_code']; ?></td>
                            <td><?php echo $r['c_name']; ?></td>
                            <td><?php echo $r['c_gender']; ?></td>
                            <td><img src="<?php echo
                                                        $r['c_image']; ?>" alt="<?php echo $r['c_name']; ?>" width="50"></td>
                            <td><span class="status-text <?php echo ($r['c_status'] == 'Inactive') ? 'text-danger' : 'text-success'; ?>"><?php echo $r['c_status']; ?></span>
                            </td>
                            <td><button class="btn btn-primary btn-sm update-btn" data-target-update="#updateRow<?php echo $r['c_id']; ?>"><i
                                        class="fas fa-arrow-down "></button></td>
                            <td><form method="POST" action="">
                                    <input type="hidden" name="delete_id" value="<?php echo $r['c_id']; ?>">
                                    <button type="submit" name="delete" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this record?');">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form></td>
                        </tr>
                
                        <tr id="updateRow<?php echo $r['c_id']; ?>" class="update-row" style="display:none;">
                            <td colspan="8">
                                <div id="formBlockUpdate" class="row formBlock mb-3">
                                    <div class="col-lg-8 col-md-10 mx-auto">
                                        <div class="form-block p-2">
                                            <form id="update" method="post" action="category.php" enctype="multipart/form-data" onsubmit="return categoryUpdateValidation(this);">
                                                <input type="hidden" name="c_codeU" value="<?php echo $r['c_code']; ?>">
                                                <div class="row">
                                                    <div class="col-md-4 product-image">
                                                        <img src="<?php echo
                                                            $r['c_image']; ?>" alt="<?php echo $r['c_name']; ?>"
                                                            class="img-fluid" style="max-width: 100%; height: auto;">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <!-- Category Name -->
                                                        <div class="form-group mb-3">
                                                            <label for="categoryNameU2">Category Name</label>
                                                            <input type="text" class="form-control" id="categoryNameU"
                                                                name="c_nameU" value="<?php echo $r['c_name']; ?>">
                                                            <span id="categoryNameMsgU"></span>
                                                        </div>

                                                        <!-- Category Image -->
                                                        <div class="form-group mb-3">
                                                            <label for="categoryImageU2">Category Image</label>
                                                            <input type="file" class="form-control" id="categoryImageU"
                                                                name="c_imageU">
                                                            <!-- <span id="categoryImageMsgU"></span> -->
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <!-- Category Gender -->
                                                        <div class="form-group mb-3">
                                                            <label>Category Gender</label>
                                                            <div class="form-control">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="c_genderU" id="genderMaleU"
                                                                        value="Male" <?php if ($r['c_gender'] == "Male")
                                                                            echo "checked"; ?>>
                                                                    <label class="form-check-label"
                                                                        for="genderMaleU">Male</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="c_genderU" id="genderFemaleU"
                                                                        value="Female" <?php if ($r['c_gender'] == "Female")
                                                                            echo "checked"; ?>>
                                                                    <label class="form-check-label"
                                                                        for="genderFemaleU">Female</label>
                                                                </div>
                                                            </div>
                                                            <span id="categoryGenderMsgU"></span>
                                                        </div>
                                                        <!-- Category Status -->
                                                        <div class="form-group mb-3">
                                                            <label>Category Status</label>
                                                            <div class="form-control">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="c_statusU" id="activeU"
                                                                        value="Active" <?php if($r['c_status']=="Active") echo "checked";?>>
                                                                    <label class="form-check-label" for="activeU">Active</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="c_statusU" id="inactiveU"
                                                                        value="Inactive" <?php if($r['c_status']=="Inactive") echo "checked";?>>
                                                                    <label class="form-check-label" for="inactiveU">Inactive</label>
                                                                </div>
                                                            </div>
                                                            <span id="categoryStatusMsgU"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    <input type="submit" value="Update Category" name="update" class="btn btn-success">
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
        <div class="row" >
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

if (isset($_POST['add'])) {
    $c_name = $_POST['c_name'];
    $c_gender = $_POST['c_gender'];
    $c_status = $_POST['c_status'];
    $c_image = "../images/category_image/" . $_FILES['c_image']['name'];

    $q = "INSERT INTO `category_tbl`(`c_name`, `c_gender`, `c_image`,`c_status`) VALUES ('$c_name','$c_gender','$c_image','$c_status')";

    if (mysqli_query($con, $q)) {
        if (!is_dir("../images/category_image")) {
            mkdir("../images/category_image");
        }
        move_uploaded_file($_FILES['c_image']['tmp_name'], $c_image);
        ?>
                                <script>
                                    alert("Category inserted !!");
                                    window.location.href = "category.php";
                                </script>
                        <?php
    } else {
        ?>

                <script>
                    alert("Category not inserted");
                    window.location.href = "category.php";
                </script>
                <?php
    }
}

if (isset($_POST['update'])) {
    // Extract form data
    $c_code = $_POST['c_codeU'];
    $c_name = $_POST['c_nameU'];
    $c_gender = $_POST['c_genderU'];
    $c_status = $_POST['c_statusU'];

    // Check if a new image is uploaded
    if ($_FILES['c_imageU']['name']) {
        // Image upload
        $c_image = "../images/category_image/" . $_FILES['c_imageU']['name'];
        move_uploaded_file($_FILES['c_imageU']['tmp_name'], $c_image);  // Upload the new image

        // Update query with the new image
        $q = "UPDATE `category_tbl` SET `c_name`='$c_name', `c_gender`='$c_gender', `c_image`='$c_image', `c_status`='$c_status' WHERE `c_code`='$c_code'";
    } else {
        // Update without changing the image
        $q = "UPDATE `category_tbl` SET `c_name`='$c_name', `c_gender`='$c_gender', `c_status`='$c_status' WHERE `c_code`='$c_code'";
    }

    // Execute the query
    if (mysqli_query($con, $q)) {
        echo "<script>alert('Category Updated !!'); window.location.href = 'category.php';</script>";
    } else {
        echo "<script>alert('Category not Updated'); window.location.href = 'category.php';</script>";
    }
}
if (isset($_POST['delete'])) {
    $delete_id = $_POST['delete_id']; // Get the id of the row to delete

    // SQL query to delete the specific record
    $delete_query = "DELETE FROM category_tbl WHERE c_id = '$delete_id'";

    // Execute the query and check if it was successful
    if (mysqli_query($con, $delete_query)) {
        echo "<script>confirm('Record deleted successfully');</script>";
    } else {
        echo "<script>confirm('Error deleting record');</script>";
    }

    // Redirect to refresh the page after deletion
    echo "<script>window.location.href = 'category.php';</script>";
}
?>
