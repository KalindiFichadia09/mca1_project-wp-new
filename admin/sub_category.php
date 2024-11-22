<?php
include_once 'header.php';
include_once '../conn.php';
?>
<div class="container mt-5 pt-2">
    <div class="row mt-5 mb-4 align-items-center">
        <!-- Title -->
        <div class="col-12 col-md-4 d-flex justify-content-center justify-content-md-start mb-2 mb-md-0">
            <h2 class="text-center text-md-left">Manage Category</h2>
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
            <button id="toggleFormBtnI" class="btn btn-success">Insert Category</button>
        </div>
    </div>

    <!-- Form Insert -->
    <div id="formBlockInsert" class="row formBlock" style="display: none;">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="form-block p-4">
                <form method="post" id="insert" onsubmit="return categoryInsertValidation();"
                    enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label for="categoryName">Sub Category Name</label>
                        <input type="text" class="form-control" id="categoryName" name="sc_name"
                            placeholder="Enter Category Name">
                        <span id="categoryNameMsg"></span>
                    </div>
                    <!-- Product Category Code -->
                    <div class="form-group mb-3">
                        <label for="productCategoryCode">Category</label>
                        <select name="c_code" id="productCategoryCode" class="form-select">
                            <option value="none">--Select category--</option>
                            <?php
                            $q = "select c_code, c_name, c_gender from category_tbl where c_status='Active' ";
                            $result = mysqli_query($con, $q);
                            while ($r = mysqli_fetch_assoc($result)) {
                                ?>
                                <option value="<?php echo $r['c_code']; ?>"><?php echo $r['c_name'] . "(" . $r['c_gender'] . ")"; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <span id="productCategoryCodeMsg"></span>
                    </div>
                    <div class="form-group mb-3">
                        <label for="categoryImage">Sub Category Image</label>
                        <input type="file" class="form-control" id="categoryImage" name="sc_image">
                        <span id="categoryImageMsg"></span>
                    </div>
                    <div class="form-group mb-3">
                        <label>Sub Category Status</label>
                        <div class="form-control">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_status" id="active"
                                    value="Active">
                                <label class="form-check-label" for="active">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_status" id="inactive"
                                    value="Inactive">
                                <label class="form-check-label" for="inactive">Inactive</label>
                            </div>
                        </div>
                        <span id="categoryStatusMsg"></span>
                    </div>
                    <div class="d-flex justify-content-end">
                        <input type="submit" value="Add Sub Category" name="add" class="btn btn-success">
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
                            <th scope="col">Sub Category Code</th>
                            <th scope="col">Sub Category Name</th>
                            <th scope="col">Category Code</th>
                            <th scope="col">Sub Category Image</th>
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
                        $search_query = "WHERE sc_name LIKE '%$search%' OR sc_status LIKE '%$search%'";
                    }
                    // Adding search_query into SQL query
                    $q = "Select * from sub_category_tbl $search_query";
                    $result = mysqli_query($con, $q);

                    // Determine the total number of records
                    $q = "SELECT * FROM sub_category_tbl $search_query";
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
                    $q = "SELECT * FROM sub_category_tbl $search_query LIMIT $start_from, $records_per_page";
                    $result = mysqli_query($con, $q);

                    while ($r = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $r['sc_id']; ?></td>
                            <td><?php echo $r['sc_code']; ?></td>
                            <td><?php echo $r['sc_name']; ?></td>
                            <td><?php echo $r['c_code']; ?></td>
                            <td><img src="<?php echo
                                $r['sc_image']; ?>" alt="<?php echo $r['sc_name']; ?>" width="50"></td>
                            <td><span class="status-text 
                                <?php
                                echo ($r['sc_status'] === 'Deleted') ? 'text-danger' :
                                    (($r['sc_status'] === 'Inactive') ? 'text-primary' : 'text-success');
                                ?>">
                                    <?php echo $r['sc_status']; ?>
                                </span>
                            </td>
                            <td><button class="btn btn-primary btn-sm update-btn"
                                    data-target-update="#updateRow<?php echo $r['sc_id']; ?>"><i
                                        class="fas fa-arrow-down "></button></td>
                            <td>
                                <form method="POST" action="">
                                    <input type="hidden" name="delete_id" value="<?php echo $r['sc_id']; ?>">
                                    <button type="submit" name="delete" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this record?');">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <tr id="updateRow<?php echo $r['sc_id']; ?>" class="update-row" style="display:none;">
                            <td colspan="8">
                                <div id="formBlockUpdate" class="row formBlock mb-3">
                                    <div class="col-lg-8 col-md-10 mx-auto">
                                        <div class="form-block p-2">
                                            <form id="update" method="post" action="sub_category.php"
                                                enctype="multipart/form-data"
                                                onsubmit="return categoryUpdateValidation(this);">
                                                <input type="hidden" name="sc_codeU" value="<?php echo $r['sc_code']; ?>">
                                                <div class="row">
                                                    <div class="col-md-4 product-image">
                                                        <img src="<?php echo
                                                            $r['sc_image']; ?>" alt="<?php echo $r['sc_name']; ?>"
                                                            class="img-fluid" style="max-width: 100%; height: auto;">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <!-- Category Name -->
                                                        <div class="form-group mb-3">
                                                            <label for="categoryNameU2">Sub Category Name</label>
                                                            <input type="text" class="form-control" id="categoryNameU"
                                                                name="sc_nameU" value="<?php echo $r['sc_name']; ?>">
                                                            <span id="categoryNameMsgU"></span>
                                                        </div>

                                                        <!-- Category Image -->
                                                        <div class="form-group mb-3">
                                                            <label for="categoryImageU2">Sub Category Image</label>
                                                            <input type="file" class="form-control" id="categoryImageU"
                                                                name="sc_imageU">
                                                            <!-- <span id="categoryImageMsgU"></span> -->
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <!-- Product Category Code -->
                                                        <div class="form-group mb-3">
                                                            <label for="productCategoryCode">Category</label>
                                                            <select name="c_codeU" id="productCategoryCode"
                                                                class="form-select">
                                                                <option value="none">--Select category--</option>
                                                                <?php
                                                                $q1 = "select c_code, c_name, c_gender from category_tbl where c_status='Active' ";
                                                                $result1 = mysqli_query($con, $q1);
                                                                while ($r1 = mysqli_fetch_assoc($result1)) {
                                                                    ?>
                                                                    <option value="<?php echo $r1['c_code']; ?>" <?php echo ($r['c_code'] == $r1['c_code']) ? 'selected' : ''; ?>>
                                                                        <?php echo $r1['c_name']."(".$r1['c_gender'].")"; ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                            <span id="productCategoryCodeMsg"></span>
                                                        </div>
                                                        <!-- Category Status -->
                                                        <div class="form-group mb-3">
                                                            <label>Sub Category Status</label>
                                                            <div class="form-control">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="sc_statusU" id="activeU"
                                                                        value="Active" <?php if($r['sc_status']=="Active") echo "checked";?>>
                                                                    <label class="form-check-label" for="activeU">Active</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="sc_statusU" id="inactiveU"
                                                                        value="Inactive" <?php if($r['sc_status']=="Inactive") echo "checked";?>>
                                                                    <label class="form-check-label" for="inactiveU">Inactive</label>
                                                                </div>
                                                            </div>
                                                            <span id="categoryStatusMsgU"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    <input type="submit" value="Update Category" name="update"
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
// insert category
if (isset($_POST['add'])) {
    $sc_name = $_POST['sc_name'];
    $c_code = $_POST['c_code'];
    $sc_status = $_POST['sc_status'];
    $sc_image = "../images/subcategory_image/" . $_FILES['sc_image']['name'];

    $q = "INSERT INTO `sub_category_tbl`(`sc_name`, `c_code`, `sc_image`,`sc_status`) VALUES ('$sc_name','$c_code','$sc_image','$sc_status')";

    if (mysqli_query($con, $q)) {
        if (!is_dir("../images/subcategory_image")) {
            mkdir("../images/subcategory_image");
        }
        move_uploaded_file($_FILES['sc_image']['tmp_name'], $sc_image);
        ?>
        <script>
            alert("Sub Category inserted !!");
            window.location.href = "sub_category.php";
        </script>
        <?php
    } else {
        ?>

        <script>
            alert("Sub Category not inserted");
            window.location.href = "sub_category.php";
        </script>
        <?php
    }
}

// update category
if (isset($_POST['update'])) {
    // Extract form data
    $sc_code = $_POST['sc_codeU'];
    $sc_name = $_POST['sc_nameU'];
    $c_code = $_POST['c_codeU'];
    $sc_status = $_POST['sc_statusU'];

    $select = "SELECT * FROM sub_category_tbl WHERE sc_code = '$sc_code' ";
    $results = mysqli_query($con, $select);
    $rs = mysqli_fetch_assoc($results);

    if ($_FILES['sc_imageU']['name'] != "") {
        $image = $_FILES['sc_imageU']['name'];
        $temp = $_FILES['sc_imageU']['tmp_name'];
        $image = "../images/subcategory_image/" . uniqid() . $image;
        move_uploaded_file($temp, $image);
    } else {
        $image = $rs['sc_image'];
    }
    $update_query = "UPDATE `sub_category_tbl` SET `sc_name`='$sc_name', `c_code`='$c_code', `sc_image`='$image', `sc_status`='$sc_status' WHERE `sc_code`='$sc_code' AND `sc_status`='Active' ";

    if (mysqli_query($con, $update_query)) {
        if ($image != $rs['sc_image']) {
            $old_image = $rs['sc_image'];
            if (file_exists($old_image)) {
                unlink($old_image);
            }
        }
        echo "<script>alert('Category Updated !!'); window.location.href = 'sub_category.php';</script>";
    } else {
        echo "<script>alert('Category not Updated'); window.location.href = 'sub_category.php';</script>";
    }
}

// delete category
if (isset($_POST['delete'])) {
    $delete_id = $_POST['delete_id'];
    $delete_query = "update sub_category_tbl set sc_status='Deleted' where sc_id = '$delete_id'";
    // $delete_query = "DELETE FROM category_tbl WHERE c_id = '$delete_id'";
    if (mysqli_query($con, $delete_query)) {
        echo "<script>confirm('Record deleted successfully');</script>";
    } else {
        echo "<script>confirm('Error deleting record');</script>";
    }
    echo "<script>window.location.href = 'sub_category.php';</script>";
}
?>