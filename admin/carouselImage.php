<?php
    include_once 'header.php';
?>
<div class="container mt-5 pt-2">
    <!-- Title and Button Row -->
    <div class="row mt-5 mb-4">
        <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-start mb-2 mb-md-0">
            <h2 class="text-center text-md-left">Carousel Manage</h2>
        </div>
        <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end">
            <button id="toggleFormBtnI" class="btn btn-success">Add Image</button>
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

<?php
include("conn.php");

if (isset($_POST['btn_save'])) {
    $name = $_POST['name'];
    $image = $_FILES['image'];

    // Picture uploading
    $image_name = $image['name'];
    $image_type = $image['type'];
    $image_tmp_name = $image['tmp_name'];
    $image_size = $image['size'];

    if ($image_type == "image/jpeg" || $image_type == "image/jpg" || $image_type == "image/png" || $image_type == "image/gif") {
        if ($image_size <= 50000000) {
            $new_image_name = time() . "_" . $image_name;
            move_uploaded_file($image_tmp_name, "images/" . $new_image_name);
            
            // Insert into slider_img table
            mysqli_query($con, "INSERT INTO slider_tbl (`Name`, `Image`) VALUES ('$name', '$new_image_name')");
            echo "Image successfully uploaded and data inserted.";
        } else {
            echo "File size should be less than 50MB.";
        }
    } else {
        echo "Invalid file type. Only JPG, PNG, and GIF are allowed.";
    }

    mysqli_close($con);
}
?>

    <!-- Form Insert -->
    <div id="formBlockInsert" class="row formBlock" style="display: none;">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="form-block p-4">
                <form action="carouselImage.php" method="post" id="insert" onsubmit="return carouselValidation();" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label for="categoryName">Image Name</label>
                        <input type="text" class="form-control" id="imageName" name="name" placeholder="Enter Category Name">
                        <span id="imageNameMsg"></span>
                    </div>
                    <!-- <div class="form-group mb-3">
                        <label>Status</label>
                        <div class="form-control">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="imagestatus" id="active" value="Male">
                                <label class="form-check-label" for="active">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="imagestatus" id="inactive" value="Female">
                                <label class="form-check-label" for="inactive">Inactive</label>
                            </div>
                        </div>
                        <span id="statusMsg"></span>
                    </div> -->
                    <div class="form-group mb-3">
                        <label for="categoryImage">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                        <span id="imageMsg"></span>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" name = "btn_save" class="btn btn-success">Add</button>
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
                        <tr>
                            <td>1</td>
                            <td>Image 1</td>
                            <td><img src="../images/carouselImg1.png" alt="image 2" width="400"></td>
                            <td><button class="btn btn-primary btn-sm update-btn" data-target-update="#updateRow<?php echo $r['c_id']; ?>"><i
                                        class="fas fa-arrow-down "></button></td>
                            <!-- <td><form method="POST" action=""> -->
                            <!-- <td><span class="status-text text-success">Active</span></td> -->
                            <td><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Image 2</td>
                            <td><img src="../images/carouselImg2.png" alt="Rings" width="400"></td>
                            <td><button class="btn btn-primary btn-sm update-btn" data-target-update="#updateRow<?php echo $r['c_id']; ?>"><i
                                        class="fas fa-arrow-down "></button></td>
                            <!-- <td><span class="status-text text-success">Active</span></td> -->
                            <td><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Image 3</td>
                            <td><img src="../images/carouselImg3.png" alt="Rings" width="400"></td>
                            <td><button class="btn btn-primary btn-sm update-btn" data-target-update="#updateRow<?php echo $r['c_id']; ?>"><i
                                        class="fas fa-arrow-down "></button></td>
                            <!-- <td><span class="status-text text-danger">Inactive</span></td> -->
                            <td><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></td>
                        </tr>

                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>

