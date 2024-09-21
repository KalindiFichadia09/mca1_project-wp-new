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

    <!-- Form Insert -->
    <div id="formBlockInsert" class="row formBlock" style="display: none;">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="form-block p-4">
                <form action="carouselImage.php" method="post" id="insert" onsubmit="return carouselValidation();" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label for="categoryName">Image Name</label>
                        <input type="text" class="form-control" id="imageName" name="image_name" placeholder="Enter Category Name">
                        <span id="imageNameMsg"></span>
                    </div>
                    <div class="form-group mb-3">
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
                    </div>
                    <div class="form-group mb-3">
                        <label for="categoryImage">Image</label>
                        <input type="file" class="form-control" id="image" name="category_image">
                        <span id="imageMsg"></span>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">Add</button>
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
                            <th scope="col">Status</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Image 1</td>
                            <td><img src="../images/carouselImg1.png" alt="image 2" width="400"></td>
                            <td><span class="status-text text-success">Active</span></td>
                            <td><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Image 2</td>
                            <td><img src="../images/carouselImg2.png" alt="Rings" width="400"></td>
                            <td><span class="status-text text-success">Active</span></td>
                            <td><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Image 3</td>
                            <td><img src="../images/carouselImg3.png" alt="Rings" width="400"></td>
                            <td><span class="status-text text-danger">Inactive</span></td>
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
