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
                    <div class="d-flex justify-content-end">
                        <input type="submit" value="Add Category" name="add" class="btn btn-success">
                        <!-- <button type="submit" class="">Insert</button> -->
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
                            <th scope="col">Category Image</th>
                            <th scope="col">Status</th>
                            <th scope="col">Update</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <>
                        <?php
                        while ($r = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $r['c_id']; ?></td>
                            <td><?php echo $r['c_code']; ?></td>
                            <td><?php echo $r['c_name']; ?></td>
                            <td><img src="<?php echo
                                                        $r['c_image']; ?>" alt="<?php echo $r['c_name']; ?>" width="50"></td>
                            <td><span class="status-text text-success">Active</span></td>
                            <td><button class="btn btn-primary btn-sm update-btn" data-target-update="#updateRow1"><i
                                        class="fas fa-arrow-down "></button></td>
                            <td><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></button></td>
                        </tr>
                        <?php
                        }
                        ?>
                        <tr id="updateRow1" class="update-row" style="display:none;">
                            <td colspan="7">
                                <div id="formBlockUpdate" class="row formBlock mb-5">
                                    <div class="col-lg-8 col-md-10 mx-auto">
                                        <div class="form-block p-4">
                                            <form id="update" action="user.php" method="post"
                                                onsubmit="return categoryUpdateValidation(this);"
                                                enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <!-- Category Name -->
                                                        <div class="form-group mb-3">
                                                            <label for="categoryNameU2">Category Name</label>
                                                            <input type="text" class="form-control" id="categoryNameU"
                                                                name="category_name" placeholder="Enter Category Name">
                                                            <span id="categoryNameMsgU"></span>
                                                        </div>

                                                        <!-- Category Image -->
                                                        <div class="form-group mb-3">
                                                            <label for="categoryImageU2">Category Image</label>
                                                            <input type="file" class="form-control" id="categoryImageU"
                                                                name="category_image">
                                                            <span id="categoryImageMsgU"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <!-- Category Gender -->
                                                        <div class="form-group mb-3">
                                                            <label>Category Gender</label>
                                                            <div class="form-control">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="category_genderU" id="genderMale"
                                                                        value="Male">
                                                                    <label class="form-check-label"
                                                                        for="genderMale">Male</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="category_genderU" id="genderFemale"
                                                                        value="Female">
                                                                    <label class="form-check-label"
                                                                        for="genderFemale">Female</label>
                                                                </div>
                                                            </div>
                                                            <span id="categoryGenderMsgU"></span>
                                                        </div>
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
</div>
</body>

</html>

<?php

if (isset($_POST['add'])) {

    //Form data extraction
    $c_name = $_POST['c_name'];
    $c_gender = $_POST['c_gender'];
    // $c_image = $_POST['c_image'];

    $c_image = "../images/category_image/" . $_FILES['c_image']['name'];

    $pic = uniqid() . $_FILES['pic']['name'];

    $q = "INSERT INTO `category_tbl`(`c_name`, `c_gender`, `c_image`) VALUES ('$c_name','$c_gender','$c_image')";

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
?>