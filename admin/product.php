<?php
include_once 'header.php';
include_once '../conn.php';
?>
<div class="container mt-5 pt-2">
    <!-- Title and Button Row -->
    <div class="row mt-5 mb-4">
        <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-start mb-2 mb-md-0">
            <h2 class="text-center text-md-left">Manage Products</h2>
        </div>
        <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end">
            <button id="toggleFormBtnI" class="btn btn-success">Insert Product</button>
        </div>
    </div>

    <!-- Form Insert -->
    <div id="formBlockInsert" class="row formBlock" style="display: none;">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="form-block p-4">
                <form method="post" id="insert" onsubmit="return productInsertValidation();"
                    enctype="multipart/form-data">
                    <!-- Product Name -->
                    <div class="form-group mb-3">
                        <label for="productName">Product Name</label>
                        <input type="text" class="form-control" id="productName" name="p_name"
                            placeholder="Enter Product Name">
                        <span id="productNameMsg"></span>
                    </div>

                    <!-- Product Category Code -->
                    <div class="form-group mb-3">
                        <label for="productCategoryCode">Product Category Code</label>
                        <select name="p_c_code" id="productCategoryCode" class="form-select">
                            <option value="none">--Select product category code--</option>
                            <?php
                            $q = "select c_code,c_name from category_tbl where c_status='Active' ";
                            $result = mysqli_query($con, $q);
                            while ($r = mysqli_fetch_assoc($result)) {
                                ?>
                                <option value="<?php echo $r['c_code']; ?>"><?php echo $r['c_name']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <span id="productCategoryCodeMsg"></span>
                    </div>

                    <!-- Product Type -->
                    <div class="form-group mb-3">
                        <label for="productType">Product Type</label>
                        <select name="p_type" id="productType" class="form-select">
                            <option value="none">--Select product type--</option>
                            <option value="Yellow Gold">Yellow Gold</option>
                            <option value="Rose Gold">Rose Gold</option>
                            <option value="Platinum">Platinum</option>
                            <option value="Silver">Silver</option>
                        </select>
                        <span id="productTypeMsg"></span>
                    </div>

                    <!-- Purity -->
                    <div class="form-group mb-3">
                        <label for="purity">Purity</label>
                        <select name="p_purity" id="purity" class="form-select">
                            <option value="none">-- Select product purity --</option>
                            <option value="22K">22 Karat (91.67% gold)</option>
                            <option value="20K">20 Karat (83.33% gold)</option>
                            <option value="18K">18 Karat (75% gold)</option>
                            <option value="16K">16 Karat (66.67% gold)</option>
                            <option value="14K">14 Karat (58.33% gold)</option>
                        </select>
                        <span id="purityMsg"></span>
                    </div>

                    <!-- Gross Weight -->
                    <div class="form-group mb-3">
                        <label for="grossWeight">Gross Weight (in grams)</label>
                        <input type="text" class="form-control" id="grossWeight" name="p_gross_weight"
                            placeholder="Enter Gross Weight">
                        <span id="grossWeightMsg"></span>
                    </div>

                    <!-- Diamond Weight -->
                    <div class="form-group mb-3">
                        <label for="grossWeight">Diamond Weight (in grams)</label>
                        <input type="text" class="form-control" id="diamondWeight" name="p_diamond_weight"
                            placeholder="Enter Gross Weight">
                        <span id="diamondWeightMsg"></span>
                    </div>

                    <!-- Overhead charges -->
                    <div class="form-group mb-3">
                        <label for="grossWeight">Overhead charges</label>
                        <input type="text" class="form-control" id="overheadCharges" name="p_overhead_charges"
                            placeholder="Enter Gross Weight">
                        <span id="overheadChargesMsg"></span>
                    </div>

                    <!-- Diamond Pieces -->
                    <div class="form-group mb-3">
                        <label for="diamondPieces">Diamond Pieces</label>
                        <input type="number" class="form-control" id="diamondPieces" name="p_diamond_pieces"
                            placeholder="Enter Number of Diamond Pieces">
                        <span id="diamondPiecesMsg"></span>
                    </div>

                    <!-- Diamond Color -->
                    <div class="form-group mb-3">
                        <label for="diamondColor">Diamond Color</label>
                        <input type="text" class="form-control" id="diamondColor" name="p_diamond_color"
                            placeholder="Enter Diamond Color">
                        <span id="diamondColorMsg"></span>
                    </div>

                    <!-- Stock -->
                    <div class="form-group mb-3">
                        <label for="stock">Stock</label>
                        <input type="number" class="form-control" id="stock" name="p_stock" placeholder="Enter Stock">
                        <span id="stockMsg"></span>
                    </div>

                    <!-- Product Image -->
                    <div class="form-group mb-3">
                        <label for="productImage">Product Image</label>
                        <input type="file" class="form-control" id="productImage" name="p_image">
                        <span id="productImageMsg"></span>
                    </div>

                    <!-- product status -->
                    <div class="form-group mb-3">
                        <label>Product Status</label>
                        <div class="form-control">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="p_status" id="active" value="Active">
                                <label class="form-check-label" for="active">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="p_status" id="inactive"
                                    value="Inactive">
                                <label class="form-check-label" for="inactive">Inactive</label>
                            </div>
                        </div>
                        <span id="productStatusMsg"></span>
                    </div>

                    <div class="d-flex justify-content-end">
                        <input type="submit" value="Add Product" name="add" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Product Table -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="table-responsive">
                <?php
                // error_reporting((0));
                $q = "select * from product_tbl";
                $result = mysqli_query($con, $q);
                ?>
                <table class="table table-bordered text-center align-middle">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Sr No</th>
                            <th scope="col">Product Code</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Status</th>
                            <th scope="col">Show</th>
                            <th scope="col">Update</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($r = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo $r['p_id']; ?></td>
                                <td><?php echo $r['p_code']; ?></td>
                                <td><?php echo $r['p_name']; ?></td>
                                <td>₹ <?php echo $r['p_total_price']; ?></td>
                                <td><?php echo $r['p_status']; ?></td>
                                <td>
                                    <button class="btn btn-info btn-sm show-btn"
                                        data-target="#detailRow<?php echo $r['p_id']; ?>"><i
                                            class="fas fa-eye"></i></button>
                                </td>
                                <td><button class="btn btn-primary btn-sm update-btn"
                                        data-target-update="#updateRow<?php echo $r['p_id']; ?>"><i
                                            class="fas fa-arrow-down "></button></td>
                                </td>
                                <td>
                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr id="detailRow<?php echo $r['p_id']; ?>" class="detail-row" style="display:none;">
                                <td colspan="9">
                                    <div class="d-flex">
                                        <div class="col-4 product-image" style="width: 35%;">
                                            <img src="<?php echo $r['p_image']; ?>" alt="<?php echo $r['p_name']; ?>"
                                                class="img-fluid" style="max-width: 100%; height: auto;">
                                        </div>
                                        <div class="col-4 product-description" style="width: 65%;">
                                            <p><strong>Product Id:</strong> <?php echo $r['p_id']; ?></p>
                                            <p><strong>Product Code:</strong> <?php echo $r['p_code']; ?></p>
                                            <p><strong>Product Name:</strong> <?php echo $r['p_name']; ?></p>
                                            <p><strong>Product Category Code:</strong> <?php echo $r['p_c_code']; ?></p>
                                            <p><strong>Type:</strong> <?php echo $r['p_type']; ?></p>
                                            <p><strong>Purity:</strong> <?php echo $r['p_purity']; ?></p>
                                            <p><strong>Gross Weight:</strong> <?php echo $r['p_gross_weight']; ?> Grams</p>
                                            <p><strong>Gold Weight:</strong> <?php echo $r['p_gold_weight']; ?></p>
                                            <p><strong>Gold Price:</strong> ₹ <?php echo $r['p_gold_price']; ?></p>
                                            </p>
                                        </div>
                                        <div class="col-4 product-description" style="width: 65%;">
                                            <p><strong>Diamond Weight:</strong> <?php echo $r['p_diamond_weight']; ?> Grams
                                            <p><strong>Diamond Pieces:</strong> ₹ <?php echo $r['p_diamond_pices']; ?></p>
                                            <p><strong>Diamond Color:</strong> <?php echo $r['p_diamond_color']; ?></p>
                                            <p><strong>Overhead Charges:</strong> ₹ <?php echo $r['p_making_charge']; ?></p>
                                            <p><strong>Overhead Charges:</strong> ₹ <?php echo $r['p_overhead_charges']; ?>
                                            </p>
                                            <p><strong>Base Price:</strong> ₹ <?php echo $r['p_base_price']; ?></p>
                                            <p><strong>Tax:</strong> ₹ <?php echo $r['p_tax']; ?></p>
                                            <p><strong>Total Price:</strong> ₹ <?php echo $r['p_total_price']; ?></p>
                                            <p><strong>Stock:</strong> <?php echo $r['p_stock']; ?></p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr id="updateRow<?php echo $r['p_id']; ?>" class="update-row" style="display:none;">
                                <td colspan="9">
                                    <div id="formBlockUpdate" class="row formBlock mb-5">
                                        <div class="col-lg-8 col-md-10 mx-auto">
                                            <div class="form-block p-4">
                                                <form id="update" action="product.php" method="post"
                                                    onsubmit="return productUpdateValidation(this);"
                                                    enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-md-4 product-image">
                                                            <img src="<?php echo
                                                                $r['p_image']; ?>" alt="<?php echo $r['p_name']; ?>"
                                                                class="img-fluid" style="max-width: 100%; height: auto;">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <!-- Product Name -->
                                                            <div class="form-group mb-3">
                                                                <label for="productName">Product Name</label>
                                                                <input type="text" class="form-control" id="productNameU"
                                                                    name="p_nameU" value="<?php echo $r['p_name']; ?>">
                                                                <span id="productNameMsgU"></span>
                                                            </div>

                                                            <!-- Product Type -->
                                                            <div class="form-group mb-3">
                                                                <label for="productType">Product Type</label>
                                                                <select name="p_typeU" id="productTypeU"
                                                                    class="form-select">
                                                                    <option value="none">--Select product type--</option>
                                                                    <option value="Yellow Gold">Yellow Gold</option>
                                                                    <option value="Rose Gold">Rose Gold</option>
                                                                    <option value="Platinum">Platinum</option>
                                                                    <option value="Silver">Silver</option>
                                                                </select>
                                                                <span id="productTypeMsgU"></span>
                                                            </div>

                                                            <!-- Gross Weight -->
                                                            <div class="form-group mb-3">
                                                                <label for="grossWeight">Gross Weight (in grams)</label>
                                                                <input type="text" class="form-control" id="grossWeightU"
                                                                    name="p_gross_weight"
                                                                    value="<?php echo $r['p_gross_weight']; ?>">
                                                                <span id="grossWeightMsgU"></span>
                                                            </div>

                                                            <!-- Overhead charges -->
                                                            <div class="form-group mb-3">
                                                                <label for="grossWeight">Overhead charges</label>
                                                                <input type="text" class="form-control"
                                                                    id="overheadChargesU" name="p_overhead_charges"
                                                                    value="<?php echo $r['p_overhead_charges']; ?>">
                                                                <span id="overheadChargesMsgU"></span>
                                                            </div>

                                                            <!-- Diamond Color -->
                                                            <div class="form-group mb-3">
                                                                <label for="diamondColor">Diamond Color</label>
                                                                <input type="text" class="form-control" id="diamondColorU"
                                                                    name="p_diamond_color"
                                                                    value="<?php echo $r['p_diamond_color']; ?>">
                                                                <span id="diamondColorMsgU"></span>
                                                            </div>

                                                            <!-- Product Image -->
                                                            <div class="form-group mb-3">
                                                                <label for="productImage">Product Image</label>
                                                                <input type="file" class="form-control" id="productImageU"
                                                                    name="product_image">
                                                                <!-- <span id="productImageMsgU"></span> -->
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <!-- Product Category Code -->
                                                            <div class="form-group mb-3">
                                                                <label for="productCategoryCode">Product Category
                                                                    Code</label>
                                                                <select name="p_c_codeU" id="productCategoryCode"
                                                                    class="form-select">
                                                                    <option value="none">--Select product category code--
                                                                    </option>
                                                                    <?php
                                                                    $q = "select c_code,c_name from category_tbl where c_status='Active' ";
                                                                    $result = mysqli_query($con, $q);
                                                                    while ($r = mysqli_fetch_assoc($result)) {
                                                                        ?>
                                                                        <option value="<?php echo $r['c_code']; ?>">
                                                                            <?php echo $r['c_name']; ?>
                                                                        </option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                                <span id="productCategoryCodeMsgU"></span>
                                                            </div>

                                                            <!-- Purity -->
                                                            <div class="form-group mb-3">
                                                                <label for="purity">Purity</label>
                                                                <select name="p_purityU" id="purityU" class="form-select">
                                                                    <option value="none">-- Select product purity --
                                                                    </option>
                                                                    <option value="22K">22 Karat (91.67% gold)</option>
                                                                    <option value="20K">20 Karat (83.33% gold)</option>
                                                                    <option value="18K">18 Karat (75% gold)</option>
                                                                    <option value="16K">16 Karat (66.70% gold)</option>
                                                                    <option value="14K">14 Karat (58.30% gold)</option>
                                                                </select>
                                                                <span id="purityMsgU"></span>
                                                            </div>

                                                            <!-- Diamond Weight -->
                                                            <div class="form-group mb-3">
                                                                <label for="grossWeight">Diamond Weight (in grams)</label>
                                                                <input type="text" class="form-control" id="diamondWeightU"
                                                                    name="p_diamond_weightU"
                                                                    value="<?php echo $r['p_diamond_weight']; ?>">
                                                                <span id="diamondWeightMsgU"></span>
                                                            </div>

                                                            <!-- Diamond Pieces -->
                                                            <div class="form-group mb-3">
                                                                <label for="diamondPieces">Diamond Pieces</label>
                                                                <input type="number" class="form-control"
                                                                    id="diamondPiecesU" name="p_diamond_pieces"
                                                                    value="<?php echo $r['p_diamond_pieces']; ?>">
                                                                <span id="diamondPiecesMsgU"></span>
                                                            </div>

                                                            <!-- Stock -->
                                                            <div class="form-group mb-3">
                                                                <label for="stock">Stock</label>
                                                                <input type="text" class="form-control" id="stockU"
                                                                    name="p_stockU" value="<?php echo $r['p_stock']; ?>">
                                                                <span id="stockMsgU"></span>
                                                            </div>

                                                            <!-- product status -->
                                                            <div class="form-group mb-3">
                                                                <label>Product Status</label>
                                                                <div class="form-control">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="p_statusU" id="active" value="Active"
                                                                            <?php if ($r['p_status'] == "Active")
                                                                                echo "checked"; ?>>
                                                                        <label class="form-check-label"
                                                                            for="active">Active</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="p_statusU" id="inactive" value="Inactive"
                                                                            <?php if ($r['p_status'] == "Inactive")
                                                                                echo "checked"; ?>>
                                                                        <label class="form-check-label"
                                                                            for="inactive">Inactive</label>
                                                                    </div>
                                                                </div>
                                                                <span id="productStatusMsgU"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Submit Button -->
                                                    <div class="d-flex justify-content-end mt-3">
                                                        <input type="submit" value="Update Product" name="update"
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
    </div>
    </body>

    </html>
    <?php

    if (isset($_POST['add'])) {


        $Gold_Price = 6000;
        $Diamond_Price = 20;//per pices
        $Making_Charge = 500;//per gram
        $P_T_Gold_Price;

        $P_Name = $_POST['p_name'];
        // $P_Size=$_POST['P_Size'];
        $P_Purity = $_POST['p_purity'];

        if ($P_Purity == '22K') {
            $P_T_Gold_Price = (($Gold_Price * 91.67) / 100);
        } elseif ($P_Purity == '20K') {
            $P_T_Gold_Price = (($Gold_Price * 83.33) / 100);
        } elseif ($P_Purity == '18K') {
            $P_T_Gold_Price = (($Gold_Price * 75) / 100);
        } elseif ($P_Purity == '16K') {
            $P_T_Gold_Price = (($Gold_Price * 66.67) / 100);
        } elseif ($P_Purity == '14K') {
            $P_T_Gold_Price = (($Gold_Price * 58.33) / 100);
        }

        $P_C_Code = $_POST['p_c_code'];
        // $P_Category_Type=$_POST['P_Category_Type'];
        $P_Type = $_POST['p_type'];
        $P_Gross_Weight = $_POST['p_gross_weight'];
        $P_Diamond_Weight = $_POST['p_diamond_weight'];
        $P_Diamond_Pices = $_POST['p_diamond_pieces'];
        $P_Diamond_Color = $_POST['p_diamond_color'];
        $P_Stock = $_POST['p_stock'];
        $p_overhead_charges = $_POST['p_overhead_charges'];

        $P_Gold_Weight = ($P_Gross_Weight - $P_Diamond_Weight);
        $P_Gold_Price = ($P_T_Gold_Price * $P_Gold_Weight);
        $P_Diamond_Price = ($Diamond_Price * $P_Diamond_Pices);
        $P_Making_Charge = ($Making_Charge * $P_Gross_Weight);
        $P_Base_Price = ($P_Gold_Price + $P_Diamond_Price + $P_Making_Charge + $p_overhead_charges);
        $P_Tax = (($P_Base_Price * 3) / 100);
        $P_Total_Price = ($P_Base_Price + $P_Tax);

        $P_Image = "../images/product_image/" . $_FILES['p_image']['name'];
        $P_Status = $_POST['p_status'];
        $q = "INSERT INTO `product_tbl`(`p_name`, `p_c_code`, `p_type`, `p_gross_weight`, `p_diamond_weight`, `p_diamond_pices`, `p_purity`, `p_gold_weight`, `p_gold_price`, `p_diamond_price`, `p_making_charge`, `p_overhead_charges`, `p_base_price`, `p_tax`, `p_total_price`, `p_diamond_color`, `p_stock`, `p_image`, `p_status`) 
                                VALUES ('$P_Name','$P_C_Code','$P_Type','$P_Gross_Weight','$P_Diamond_Weight','$P_Diamond_Pices','$P_Purity','$P_Gold_Weight','$P_Gold_Price','$P_Diamond_Price','$P_Making_Charge','$p_overhead_charges','$P_Base_Price','$P_Tax','$P_Total_Price','$P_Diamond_Color','$P_Stock','$P_Image','$P_Status')";

        if (mysqli_query($con, $q)) {
            if (!is_dir("../images/product_image")) {
                mkdir("../images/product_image");
            }
            move_uploaded_file($_FILES['p_image']['tmp_name'], $P_Image);
            ?>
            <script>
                alert("Product inserted !!");
                window.location.href = "product.php";
            </script>
            <?php
        } else {
            ?>

            <script>
                alert("Product not inserted");
                window.location.href = "product.php";
            </script>
            <?php
        }
    }

    // if (isset($_POST['update'])) {
//     // Extract form data
//     $c_code = $_POST['c_codeU'];
//     $c_name = $_POST['c_nameU'];
//     $c_gender = $_POST['c_genderU'];
//     $c_status = $_POST['c_statusU'];
    
    //     // Check if a new image is uploaded
//     if ($_FILES['c_imageU']['name']) {
//         // Image upload
//         $c_image = "../images/category_image/" . $_FILES['c_imageU']['name'];
//         move_uploaded_file($_FILES['c_imageU']['tmp_name'], $c_image);  // Upload the new image
    
    //         // Update query with the new image
//         $q = "UPDATE `category_tbl` SET `c_name`='$c_name', `c_gender`='$c_gender', `c_image`='$c_image', `c_status`='$c_status' WHERE `c_code`='$c_code'";
//     } else {
//         // Update without changing the image
//         $q = "UPDATE `category_tbl` SET `c_name`='$c_name', `c_gender`='$c_gender', `c_status`='$c_status' WHERE `c_code`='$c_code'";
//     }
    
    //     // Execute the query
//     if (mysqli_query($con, $q)) {
//         echo "<script>alert('Category Updated !!'); window.location.href = 'category.php';</script>";
//     } else {
//         echo "<script>alert('Category not Updated'); window.location.href = 'category.php';</script>";
//     }
// }
    ?>