<?php
include_once 'header.php';
include_once '../conn.php';
?>
<div class="container mt-5 pt-2">
    <div class="row mt-5 mb-4 align-items-center">
        <!-- Title -->
        <div class="col-12 col-md-4 d-flex justify-content-center justify-content-md-start mb-2 mb-md-0">
            <h2 class="text-center text-md-left">Manage Product</h2>
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
                        <select name="p_sc_code" id="productCategoryCode" class="form-select">
                            <option value="none">--Select product category code--</option>
                            <?php
                            $q = "select * from sub_category_tbl sc JOIN category_tbl c where sc.c_code = c.c_code AND sc_status='Active' ";
                            $result = mysqli_query($con, $q);
                            while ($r = mysqli_fetch_assoc($result)) {
                                ?>
                                    <option value="<?php echo $r['sc_code']; ?>"><?php echo $r['sc_name'] . "(" . $r['c_gender'] . ")"; ?></option>
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
                        <input type="number" class="form-control" id="stock" name="p_stock" placeholder="Enter Stock" min="0">
                        <span id="stockMsg"></span>
                    </div>

                    <!-- Discount -->
                    <div class="form-group mb-3">
                        <label for="discount">Discount Percentage</label>
                        <input type="number" class="form-control" id="discount" name="p_discount" placeholder="Enter Discount percentage" min="0" max="100">
                        <span id="discountMsg"></span>
                    </div>

                    <!-- Product Main Image -->
                    <div class="form-group mb-3">
                        <label for="productImage">Product Main Image</label>
                        <input type="file" class="form-control" id="productImage" name="p_main_image">
                        <span id="productImageMsg"></span>
                    </div>

                    <!-- Product Other Image -->
                    <div class="form-group mb-3">
                        <label for="productImage">Product Other Images</label>
                        <input type="file" class="form-control" id="productImage" name="p_other_image[]" multiple>
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
                         $search = isset($_GET['search']) ? $_GET['search'] : '';

                         // SQL query to include the search condition
                         $search_query = '';
                         if (!empty($search)) {
                             $search_query = "WHERE p_name LIKE '%$search%' OR p_status LIKE '%$search%' OR p_code LIKE '%$search%'";
                         }
                         // Adding search_query into SQL query
                         $q = "Select * from product_tbl $search_query";
                         $result = mysqli_query($con, $q);

                        
                        // Determine the total number of records
                        $q = "SELECT * FROM product_tbl $search_query";
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
                        $q = "SELECT * FROM product_tbl $search_query LIMIT $start_from, $records_per_page";
                        $result = mysqli_query($con, $q);

                        while ($r = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo $r['p_id']; ?></td>
                                <td><?php echo $r['p_code']; ?></td>
                                <td><?php echo $r['p_name']; ?></td>
                                <td>₹ <?php echo $r['p_total_price']; ?></td>
                                <td><span class="status-text 
                                    <?php
                                        echo ($r['p_status'] === 'Deleted') ? 'text-danger' :
                                            (($r['p_status'] === 'Inactive') ? 'text-primary' : 'text-success');
                                    ?>">
                                    <?php echo $r['p_status']; ?>
                                </span>
                                </td>
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
                                    <form method="POST" action="">
                                        <input type="hidden" name="delete_id" value="<?php echo $r['p_id']; ?>">
                                        <button type="submit" name="delete" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this record?');">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            
                            <tr id="detailRow<?php echo $r['p_id']; ?>" class="detail-row" style="display:none;">
                                <td colspan="9">
                                    <div class="d-flex">
                                        <div class="col-4 product-image p-3" style="">
                                            <!-- Main Product Image -->
                                            <img src="<?php echo $r['p_main_image']; ?>" alt="<?php echo $r['p_name']; ?>" class="img-fluid mb-3"
                                                style="width: 230px; height: 230px;">
                                            <div class="row">
                                                <?php
                                                    $other_images = explode(",", $r['p_other_image']);
                                                    foreach ($other_images as $image) {
                                                        ?>
                                                        <div class="col-4">
                                                            <img src="<?php echo $image; ?>" alt="Image 1" class="img-fluid" style="width: 100px; height: 100px;">
                                                        </div>
                                                        <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>

                                        <div class="col-4 product-description" style="width: 65%;">
                                            <p><strong>Product Id:</strong> <?php echo $r['p_id']; ?></p>
                                            <p><strong>Product Code:</strong> <?php echo $r['p_code']; ?></p>
                                            <p><strong>Product Name:</strong> <?php echo $r['p_name']; ?></p>
                                            <p><strong>Product Sub Category Code:</strong> <?php echo $r['p_sc_code']; ?></p>
                                            <p><strong>Type:</strong> <?php echo $r['p_type']; ?></p>
                                            <p><strong>Purity:</strong> <?php echo $r['p_purity']; ?></p>
                                            <p><strong>Gross Weight:</strong> <?php echo $r['p_gross_weight']; ?> Grams</p>
                                            <p><strong>Gold Weight:</strong> <?php echo $r['p_gold_weight']; ?></p>
                                            <p><strong>Gold Price:</strong> ₹ <?php echo $r['p_gold_price']; ?></p>
                                            <p><strong>Discount:</strong> <?php echo $r['p_discount']; ?>%</p>
                                            </p>
                                        </div>
                                        <div class="col-4 product-description" style="width: 65%;">
                                            <p><strong>Diamond Weight:</strong> <?php echo $r['p_diamond_weight']; ?> Grams
                                            <p><strong>Diamond Pieces:</strong> ₹ <?php echo $r['p_diamond_pices']; ?></p>
                                            <p><strong>Diamond Color:</strong> <?php echo $r['p_diamond_color']; ?></p>
                                            <p><strong>Making Charges:</strong> ₹ <?php echo $r['p_making_charge']; ?></p>
                                            <p><strong>Overhead Charges:</strong> ₹ <?php echo $r['p_overhead_charges']; ?>
                                            </p>
                                            <p><strong>Base Price:</strong> ₹ <?php echo $r['p_base_price']; ?></p>
                                            <p><strong>Tax:</strong> ₹ <?php echo $r['p_tax']; ?></p>
                                            <p><strong>Total Price:</strong> ₹ <?php echo $r['p_total_price']; ?></p>
                                            <p><strong>Stock:</strong> <?php echo $r['p_stock']; ?></p>
                                            <p><strong>Discount Price:</strong> ₹ <?php echo $r['p_discount_price']; ?></p>
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
                                                    <input type="hidden" name="p_codeU" value="<?php echo $r['p_code']; ?>">
                                                    <div class="row">
                                                        <div class="col-md-4 product-image">
                                                            <img src="<?php echo
                                                                $r['p_main_image']; ?>" alt="<?php echo $r['p_name']; ?>"
                                                                class="img-fluid mb-3" style="width: 200px; height: 200px;">
                                                                <?php
                                                                    $other_images = explode(",", $r['p_other_image']);
                                                                    foreach ($other_images as $image) {
                                                                        ?>
                                                                    <!-- <div class="col-4"> -->
                                                                        <img src="<?php echo $image; ?>" alt="Image 1" class="img-fluid mb-3" style="width: 150px; height: 150px;">
                                                                    <!-- </div> -->
                                                                    <?php
                                                                    }
                                                                ?>
                                                            
                                                        </div>
                                                        <div class="col-md-4">
                                                            <!-- Product Name -->
                                                            <div class="form-group mb-3">
                                                                <label for="productName">Product Name</label>
                                                                <input type="text" class="form-control" id="productNameU"
                                                                    name="p_nameU" value="<?php echo $r['p_name']; ?>">
                                                                <span id="productNameMsgU"></span>
                                                            </div>

                                                            <!-- Product Category Code -->
                                                            <div class="form-group mb-3">
                                                                <label for="productCategoryCode">Product Category
                                                                    Code</label>
                                                                <select name="p_sc_codeU" id="productCategoryCode"
                                                                    class="form-select">
                                                                    <option value="none">--Select product category code--
                                                                    </option>
                                                                    <?php
                                                                    $q1 = "select * from sub_category_tbl sc JOIN category_tbl c where sc.c_code = c.c_code AND sc_status='Active' ";
                                                                    $result1 = mysqli_query($con, query: $q1);
                                                                        while ($r1 = mysqli_fetch_assoc($result1)) {
                                                                            ?>
                                                                                <option value="<?php echo $r1['sc_code']; ?>" <?php echo ($r['p_sc_code'] == $r1['sc_code']) ? 'selected' : ''; ?>>
                                                                            <?php echo $r1['sc_name'] . "(" . $r1['c_gender'] . ")"; ?>
                                                                        </option>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                </select>
                                                                <span id="productCategoryCodeMsg"></span>
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
                                                                    id="diamondPiecesU" name="p_diamond_piecesU"
                                                                    value="<?php echo $r['p_diamond_pices']; ?>">
                                                                <span id="diamondPiecesMsgU"></span>
                                                            </div>

                                                            <!-- Diamond Color -->
                                                            <div class="form-group mb-3">
                                                                <label for="diamondColor">Diamond Color</label>
                                                                <input type="text" class="form-control" id="diamondColorU"
                                                                    name="p_diamond_colorU"
                                                                    value="<?php echo $r['p_diamond_color']; ?>">
                                                                <span id="diamondColorMsgU"></span>
                                                            </div>
    
                                                            <!-- Discount -->
                                                            <div class="form-group mb-3">
                                                                <label for="stock">Discount</label>
                                                                <input type="number" class="form-control" id="discountU"
                                                                    name="p_discountU" value="<?php echo $r['p_discount']; ?>">
                                                                    <span id="discountMsgU" min="0" max="100"></span>
                                                                </div>

                                                            <!-- product status -->
                                                            <div class="form-group mb-3">
                                                                <label>Product Status</label>
                                                                <div class="form-control">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="p_statusU" id="activeu" value="Active"
                                                                            <?php if ($r['p_status'] == "Active")
                                                                                echo "checked"; ?>>
                                                                        <label class="form-check-label"
                                                                            for="activeu">Active</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="p_statusU" id="inactiveu" value="Inactive"
                                                                            <?php if ($r['p_status'] == "Inactive")
                                                                                echo "checked"; ?>>
                                                                        <label class="form-check-label"
                                                                            for="inactiveu">Inactive</label>
                                                                    </div>
                                                                </div>
                                                                <span id="productStatusMsgU"></span>
                                                            </div>
                                                            <!-- Product Other Image 2 -->
                                                            <div class="form-group mb-3">
                                                                <label for="productImage">Product Other Image 2</label>
                                                                <input type="file" class="form-control" id="productImage" name="p_other_imageU[1]" multiple>
                                                                <span id="productImageMsg"></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <!-- Product Type -->
                                                            <div class="form-group mb-3">
                                                                <label for="productType">Product Type</label>
                                                                <select name="p_typeU" id="productTypeU" class="form-select">
                                                                    <option value="none">--Select product type--</option>
                                                                    <option value="Yellow Gold" <?php echo ($r['p_type'] == 'Yellow Gold') ? 'selected' : ''; ?>>
                                                                        Yellow Gold</option>
                                                                    <option value="Rose Gold" <?php echo ($r['p_type'] == 'Rose Gold') ? 'selected' : ''; ?>>
                                                                        Rose Gold</option>
                                                                    <option value="Platinum" <?php echo ($r['p_type'] == 'Platinum') ? 'selected' : ''; ?>>
                                                                        Platinum</option>
                                                                    <option value="Silver" <?php echo ($r['p_type'] == 'Silver') ? 'selected' : ''; ?>>
                                                                        Silver</option>
                                                                </select>
                                                                <span id="productTypeMsgU"></span>
                                                            </div>

                                                            <!-- Gross Weight -->
                                                            <div class="form-group mb-3">
                                                                <label for="grossWeight">Gross Weight (in grams)</label>
                                                                <input type="text" class="form-control" id="grossWeightU"
                                                                    name="p_gross_weightU"
                                                                    value="<?php echo $r['p_gross_weight']; ?>">
                                                                <span id="grossWeightMsgU"></span>
                                                            </div>

                                                            <!-- Overhead charges -->
                                                            <div class="form-group mb-3">
                                                                <label for="grossWeight">Overhead charges</label>
                                                                <input type="text" class="form-control" 
                                                                id="overheadChargesU" name="p_overhead_chargesU" 
                                                                value="<?php echo $r['p_overhead_charges']; ?>">
                                                                <span id="overheadChargesMsgU"></span>
                                                            </div>

                                                            <!-- Purity -->
                                                            <div class="form-group mb-3">
                                                                <label for="purity">Purity</label>
                                                                <select name="p_purityU" id="purityU" class="form-select">
                                                                    <option value="none">-- Select product purity --
                                                                    </option>
                                                                    <option value="22K" <?php echo ($r['p_purity'] == '22K') ? 'selected' : ''; ?>>22 Karat (91.67% gold)</option>
                                                                    <option value="20K" <?php echo ($r['p_purity'] == '20K') ? 'selected' : ''; ?>>20 Karat (83.33% gold)</option>
                                                                    <option value="18K" <?php echo ($r['p_purity'] == '18K') ? 'selected' : ''; ?>>18 Karat (75% gold)</option>
                                                                    <option value="16K" <?php echo ($r['p_purity'] == '16K') ? 'selected' : ''; ?>>16 Karat (66.70% gold)</option>
                                                                    <option value="14K" <?php echo ($r['p_purity'] == '14K') ? 'selected' : ''; ?>>14 Karat (58.30% gold)</option>
                                                                </select>
                                                                <span id="purityMsgU"></span>
                                                            </div>

                                                            <!-- Stock -->
                                                            <div class="form-group mb-3">
                                                                <label for="stock">Stock</label>
                                                                <input type="number" class="form-control" id="stockU"
                                                                    name="p_stockU" value="<?php echo $r['p_stock']; ?>">
                                                                <span id="stockMsgU"></span>
                                                            </div>
                                                            
                                                            <!-- Product Image -->
                                                            <div class="form-group mb-3">
                                                                <label for="productImage">Product Main Image</label>
                                                                <input type="file" class="form-control" id="productImageU"
                                                                    name="p_main_imageU">
                                                                <span id="productImageMsgU"></span>
                                                            </div>
                                                            
                                                            <!-- Product Other Image 1 -->
                                                            <div class="form-group mb-3">
                                                                <label for="productImage">Product Other Image 1</label>
                                                                <input type="file" class="form-control" id="productImage" name="p_other_imageU[0]" multiple>
                                                                <span id="productImageMsg"></span>
                                                            </div>

                                                            <!-- Product Other Image 3 -->
                                                            <div class="form-group mb-3">
                                                                <label for="productImage">Product Other Image 3</label>
                                                                <input type="file" class="form-control" id="productImage" name="p_other_imageU[2]" multiple>
                                                                <span id="productImageMsg"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Submit Button -->
                                                    <div class="d-flex justify-content-end">
                                                        <input type="submit" value="Update Product" name="update" class="btn btn-success">
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
    // insert product
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

        $P_Sc_Code = $_POST['p_sc_code'];
        $P_Type = $_POST['p_type'];
        $P_Gross_Weight = $_POST['p_gross_weight'];
        $P_Diamond_Weight = $_POST['p_diamond_weight'];
        $P_Diamond_Pices = $_POST['p_diamond_pieces'];
        $P_Diamond_Color = $_POST['p_diamond_color'];
        $P_Stock = $_POST['p_stock'];
        $P_Discount = $_POST['p_discount'];
        $p_overhead_charges = $_POST['p_overhead_charges'];

        $P_Gold_Weight = ($P_Gross_Weight - $P_Diamond_Weight);
        $P_Gold_Price = ($P_T_Gold_Price * $P_Gold_Weight);
        $P_Diamond_Price = ($Diamond_Price * $P_Diamond_Pices);
        $P_Making_Charge = ($Making_Charge * $P_Gross_Weight);
        $P_Base_Price = ($P_Gold_Price + $P_Diamond_Price + $P_Making_Charge + $p_overhead_charges);
        $P_Tax = (($P_Base_Price * 3) / 100);
        $P_Total_Price = ($P_Base_Price + $P_Tax);
        $P_Discount_Price = $P_Total_Price - ($P_Total_Price * ($P_Discount / 100));

        $target_dir = "../images/product_image/";
        $extra_images = [];
        $P_Image = $target_dir . uniqid() . $_FILES['p_main_image']['name'];
        // Process other images if they exist
        if (!empty($_FILES['p_other_image']['name'][0])) {
            foreach ($_FILES['p_other_image']['name'] as $key => $extra_image_name) {
                $extra_image_tmp = $_FILES['p_other_image']['tmp_name'][$key];
                $unique_image_name = $target_dir . uniqid() . '_' . basename($extra_image_name);
                $extra_images[] = $unique_image_name; // Add the unique image name to the array
            }
        }
        // Convert the array of image names to a comma-separated string
        $other_images = implode(",", $extra_images);

        $P_Status = $_POST['p_status'];
        $q = "INSERT INTO `product_tbl`(`p_name`, `p_sc_code`, `p_type`, `p_gross_weight`, `p_diamond_weight`, `p_diamond_pices`, `p_purity`, `p_gold_weight`, `p_gold_price`, `p_diamond_price`, `p_making_charge`, `p_overhead_charges`, `p_base_price`, `p_tax`, `p_total_price`, `p_diamond_color`, `p_stock`,`p_discount`,`p_discount_price`, `p_main_image`,`p_other_image`,`p_status`) 
                                VALUES ('$P_Name','$P_Sc_Code','$P_Type','$P_Gross_Weight','$P_Diamond_Weight','$P_Diamond_Pices','$P_Purity','$P_Gold_Weight','$P_Gold_Price','$P_Diamond_Price','$P_Making_Charge','$p_overhead_charges','$P_Base_Price','$P_Tax','$P_Total_Price','$P_Diamond_Color','$P_Stock','$P_Discount','$P_Discount_Price','$P_Image','$other_images','$P_Status')";

        if (mysqli_query($con, $q)) {
            // Move the main product image to the target directory
            if (move_uploaded_file($_FILES['p_main_image']['tmp_name'], $P_Image)) {
                // Move each extra image to the target directory
                foreach ($extra_images as $index => $extra_image_path) {
                    move_uploaded_file($_FILES['p_other_image']['tmp_name'][$index], $extra_image_path);
                }
                setcookie('success', 'Product added successfully.', time() + 5, '/');
                ?>
                <script>
                    alert("Product inserted!");
                    window.location.href = "product.php";
                </script>
                <?php
            } else {
                // Handle error if the main image fails to upload
                setcookie('error', 'Error uploading main product image.', time() + 5, '/');
                ?>
                <script>
                    alert("Product not inserted. Main image upload failed.");
                    window.location.href = "product.php";
                </script>
                <?php
            }
        } else {
            // Handle database insertion error
            setcookie('error', 'Error in adding product.', time() + 5, '/');
            ?>
        <script>
            alert("Product not inserted. Database error.");
            window.location.href = "product.php";
        </script>
        <?php
        }
    }

    // Update product
    if (isset($_POST['update'])) {
        $Gold_Price = 6000;
        $Diamond_Price = 20; // per piece
        $Making_Charge = 500; // per gram
    
        $P_Code = $_POST['p_codeU'];
        $P_Name = $_POST['p_nameU'];
        $P_Purity = $_POST['p_purityU'];
        $P_Sc_Code = $_POST['p_sc_codeU'];
        $P_Type = $_POST['p_typeU'];
        $P_Gross_Weight = $_POST['p_gross_weightU'];
        $P_Diamond_Weight = $_POST['p_diamond_weightU'];
        $P_Diamond_Pieces = $_POST['p_diamond_piecesU'];
        $P_Diamond_Color = $_POST['p_diamond_colorU'];
        $P_Stock = $_POST['p_stockU'];
        $P_Discount = $_POST['p_discountU'];
        $p_overhead_charges = $_POST['p_overhead_chargesU'];
        $P_Status = $_POST['p_statusU'];

        // Calculate total gold price based on purity
        $purity_rates = ['22K' => 91.67, '20K' => 83.33, '18K' => 75, '16K' => 66.67, '14K' => 58.33];
        $P_T_Gold_Price = ($Gold_Price * $purity_rates[$P_Purity]) / 100;

        // Calculations for price
        $P_Gold_Weight = ($P_Gross_Weight - $P_Diamond_Weight);
        $P_Gold_Price = ($P_T_Gold_Price * $P_Gold_Weight);
        $P_Diamond_Price = ($Diamond_Price * $P_Diamond_Pieces);
        $P_Making_Charge = ($Making_Charge * $P_Gross_Weight);
        $P_Base_Price = ($P_Gold_Price + $P_Diamond_Price + $P_Making_Charge + $p_overhead_charges);
        $P_Tax = (($P_Base_Price * 3) / 100);
        $P_Total_Price = ($P_Base_Price + $P_Tax);
        $P_Discount_Price = $P_Total_Price - ($P_Total_Price * ($P_Discount / 100));

        // Fetch existing product details
        $select = "SELECT * FROM product_tbl WHERE p_code = '$P_Code'";
        $results = mysqli_query($con, $select);
        $rs = mysqli_fetch_assoc($results);

        // Check if a new main image was uploaded
        $main_image = $rs['p_main_image']; // Default to existing main image
        if (!empty($_FILES['p_imageU']['name'])) {
            $temp = $_FILES['p_imageU']['tmp_name'];
            $main_image = "../images/product_image/" . uniqid() . $_FILES['p_imageU']['name'];
            move_uploaded_file($temp, $main_image);

            // Delete old main image if a new one was uploaded
            if (file_exists($rs['p_main_image'])) {
                unlink($rs['p_main_image']);
            }
        }

        // Handle other images dynamically using a loop
        $target_dir = "../images/product_image/";
        $existing_images = !empty($rs['p_other_image']) ? explode(',', $rs['p_other_image']) : [];
        $updated_images = [];

        for ($i = 0; $i < 3; $i++) {
            if (!empty($_FILES['p_other_imageU']['name'][$i])) {
                // If a new image is uploaded, process it
                $image_tmp = $_FILES['p_other_imageU']['tmp_name'][$i];
                $unique_image_name = $target_dir . uniqid() . '_' . basename($_FILES['p_other_imageU']['name'][$i]);
                move_uploaded_file($image_tmp, $unique_image_name);
                $updated_images[$i] = $unique_image_name;

                // Remove old image from the server if it exists
                if (!empty($existing_images[$i]) && file_exists($existing_images[$i])) {
                    unlink($existing_images[$i]);
                }
            } else {
                // If no new image is uploaded, keep the old one
                $updated_images[$i] = $existing_images[$i] ?? '';
            }
        }

        // Combine updated images into a single string
        $other_images = implode(',', $updated_images);

        // Update query
        $update_query = "UPDATE product_tbl SET 
                    p_name='$P_Name',
                    p_sc_code='$P_Sc_Code',
                    p_type='$P_Type',
                    p_gross_weight='$P_Gross_Weight',
                    p_diamond_weight='$P_Diamond_Weight',
                    p_diamond_pices='$P_Diamond_Pieces',
                    p_purity='$P_Purity',
                    p_gold_weight='$P_Gold_Weight',
                    p_gold_price='$P_Gold_Price',
                    p_diamond_price='$P_Diamond_Price',
                    p_making_charge='$P_Making_Charge',
                    p_overhead_charges='$p_overhead_charges',
                    p_base_price='$P_Base_Price',
                    p_tax='$P_Tax',
                    p_total_price='$P_Total_Price',
                    p_diamond_color='$P_Diamond_Color',
                    p_stock='$P_Stock',
                    p_discount='$P_Discount',
                    p_discount_price = '$P_Discount_Price',
                    p_main_image='$main_image',
                    p_other_image='$other_images',
                    p_status='$P_Status' 
                WHERE p_code='$P_Code'";

        if (mysqli_query($con, $update_query)) {
            echo "<script>alert('Product Updated !!'); window.location.href = 'product.php';</script>";
        } else {
            echo "<script>alert('Product not Updated'); window.location.href = 'product.php';</script>";
        }
    }

    // delete product
    if (isset($_POST['delete'])) {
        $delete_id = $_POST['delete_id'];
        $delete_query = "update product_tbl set p_status='Deleted' where p_id = '$delete_id'";
        // $delete_query = "DELETE FROM product_tbl WHERE p_id = '$delete_id'";
        if (mysqli_query($con, $delete_query)) {
            echo "<script>confirm('Record deleted successfully');</script>";
        } else {
            echo "<script>confirm('Error deleting record');</script>";
        }
        echo "<script>window.location.href = 'product.php';</script>";
    }
    ?>