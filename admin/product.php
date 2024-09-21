<?php
    include_once 'header.php';
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
                <form action="product.php" method="post" id="insert" onsubmit="return productInsertValidation();" enctype="multipart/form-data">
                    <!-- Product Name -->
                    <div class="form-group mb-3">
                        <label for="productName">Product Name</label>
                        <input type="text" class="form-control" id="productName" name="product_name" placeholder="Enter Product Name" >
                        <span id="productNameMsg"></span>
                    </div>

                    <!-- Product Type -->
                    <div class="form-group mb-3">
                        <label for="productType">Product Type</label>
                        <select name="type" id="productType" class="form-select">
                            <option value="none">--Select product type--</option>
                            <option value="Yellow Gold">Yellow Gold</option>
                            <option value="Rose Gold">Rose Gold</option>
                            <option value="Platinum">Platinum</option>
                            <option value="Silver">Silver</option>
                        </select>
                        <span id="productTypeMsg"></span>
                    </div>
    
                    <!-- Product Category Code -->
                    <div class="form-group mb-3">
                        <label for="productCategoryCode">Product Category Code</label>
                        <input type="text" class="form-control" id="productCategoryCode" name="product_category_code" placeholder="Enter Product Category Code" >
                        <span id="productCategoryCodeMsg"></span>
                    </div>
                    
                    <!-- Gross Weight -->
                    <div class="form-group mb-3">
                        <label for="grossWeight">Gross Weight (in grams)</label>
                        <input type="text" class="form-control" id="grossWeight" name="gross_weight" placeholder="Enter Gross Weight" >
                        <span id="grossWeightMsg"></span>
                    </div>

                    <!-- Diamond Weight -->
                    <div class="form-group mb-3">
                        <label for="grossWeight">Diamond Weight (in grams)</label>
                        <input type="text" class="form-control" id="diamondWeight" name="gross_weight" placeholder="Enter Gross Weight" >
                        <span id="diamondWeightMsg"></span>
                    </div>

                    <!-- Overhead charges -->
                    <div class="form-group mb-3">
                        <label for="grossWeight">Overhead charges</label>
                        <input type="text" class="form-control" id="overheadCharges" name="gross_weight" placeholder="Enter Gross Weight" >
                        <span id="overheadChargesMsg"></span>
                    </div>
                    
                    <!-- Diamond Pieces -->
                    <div class="form-group mb-3">
                        <label for="diamondPieces">Diamond Pieces</label>
                        <input type="number" class="form-control" id="diamondPieces" name="diamond_pieces" placeholder="Enter Number of Diamond Pieces" >
                        <span id="diamondPiecesMsg"></span>
                    </div>
                    
                    <!-- Purity -->
                    <div class="form-group mb-3">
                        <label for="purity">Purity</label>
                        <select name="purity" id="purity" class="form-select">
                            <option value="none">-- Select product purity --</option>
                            <option value="22K">22 Karat (91.67% gold)</option>
                            <option value="20K">20 Karat (83.33% gold)</option>
                            <option value="18K">18 Karat (75% gold)</option>
                            <option value="16K">16 Karat (66.70% gold)</option>
                            <option value="14K">14 Karat (58.30% gold)</option>
                        </select>
                        <span id="purityMsg"></span>
                    </div>
                    
                    <!-- Diamond Color -->
                    <div class="form-group mb-3">
                        <label for="diamondColor">Diamond Color</label>
                        <input type="text" class="form-control" id="diamondColor" name="diamond_color" placeholder="Enter Diamond Color" >
                        <span id="diamondColorMsg"></span>
                    </div>
                    
                    <!-- Stock -->
                    <div class="form-group mb-3">
                        <label for="stock">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock" placeholder="Enter Stock" >
                        <span id="stockMsg"></span>
                    </div>
                    
                    <!-- Product Image -->
                    <div class="form-group mb-3">
                        <label for="productImage">Product Image</label>
                        <input type="file" class="form-control" id="productImage" name="product_image" >
                        <span id="productImageMsg"></span>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">Insert</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

     <!-- Product Table -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="table-responsive">
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
                        <tr>
                            <td>1</td>
                            <td>GN001</td>
                            <td>Gold Necklace</td>
                            <td>$1500</td>
                            <td>Active</td>
                            <td>
                                <button class="btn btn-info btn-sm show-btn" data-target="#detailRow1"><i class="fas fa-eye"></i></button>
                            </td>
                            <td>
                                <button class="btn btn-primary btn-sm update-btn" data-target-update="#updateRow1"><i class="fas fa-arrow-down "></i></button>
                            </td>
                            <td>
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr id="detailRow1" class="detail-row" style="display:none;">
                            <td colspan="9">
                                <div class="d-flex">
                                    <div class="col-4 product-image" style="width: 35%;">
                                        <img src="../images/product1.jpeg" alt="Product Image" class="img-fluid" style="max-width: 100%; height: auto;">
                                    </div>
                                    <div class="col-8 product-description" style="width: 65%;">
                                        <p><strong>Product Code:</strong> PC001</p>
                                        <p><strong>Product Name:</strong> Gold Necklace</p>
                                        <p><strong>Diamond Weight:</strong> 0.5 carat</p>
                                        <p><strong>Overhead Charges:</strong> $100</p>
                                        <p><strong>Size:</strong> Medium</p>
                                        <p><strong>Stock:</strong> Available</p>
                                        <p><strong>Product Category Code:</strong> C001</p>
                                        <p><strong>Gross Weight:</strong> 20 grams</p>
                                        <p><strong>Diamond Pieces:</strong> 10</p>
                                        <p><strong>Purity:</strong> 22 Karat</p>
                                        <p><strong>Diamond Color:</strong> D</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr id="updateRow1" class="update-row" style="display:none;">
                            <td colspan="9">
                                <div id="formBlockUpdate" class="row formBlock mb-5">
                                    <div class="col-lg-8 col-md-10 mx-auto">
                                        <div class="form-block p-4">
                                            <form id="update" action="product.php" method="post" onsubmit="return productUpdateValidation(this);" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <!-- Product Name -->
                                                        <div class="form-group mb-3">
                                                            <label for="productName">Product Name</label>
                                                            <input type="text" class="form-control" id="productNameU" name="product_name" placeholder="Enter Product Name" >
                                                            <span id="productNameMsgU"></span>
                                                        </div>

                                                        <!-- Product Category Code -->
                                                        <div class="form-group mb-3">
                                                            <label for="productCategoryCode">Product Category Code</label>
                                                            <input type="text" class="form-control" id="productCategoryCodeU" name="product_category_code" placeholder="Enter Product Category Code" >
                                                            <span id="productCategoryCodeMsgU"></span>
                                                        </div>

                                                        <!-- Diamond Weight -->
                                                        <div class="form-group mb-3">
                                                            <label for="grossWeight">Diamond Weight (in grams)</label>
                                                            <input type="text" class="form-control" id="diamondWeightU" name="gross_weight" placeholder="Enter Gross Weight" >
                                                            <span id="diamondWeightMsgU"></span>
                                                        </div>

                                                        <!-- Diamond Pieces -->
                                                        <div class="form-group mb-3">
                                                            <label for="diamondPieces">Diamond Pieces</label>
                                                            <input type="number" class="form-control" id="diamondPiecesU" name="diamond_pieces" placeholder="Enter Number of Diamond Pieces" >
                                                            <span id="diamondPiecesMsgU"></span>
                                                        </div>

                                                        <!-- Diamond Color -->
                                                        <div class="form-group mb-3">
                                                            <label for="diamondColor">Diamond Color</label>
                                                            <input type="text" class="form-control" id="diamondColorU" name="diamond_color" placeholder="Enter Diamond Color" >
                                                            <span id="diamondColorMsgU"></span>
                                                        </div>

                                                        <!-- Product Image -->
                                                        <div class="form-group mb-3">
                                                            <label for="productImage">Product Image</label>
                                                            <input type="file" class="form-control" id="productImageU" name="product_image" >
                                                            <span id="productImageMsgU"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <!-- Product Type -->
                                                        <div class="form-group mb-3">
                                                            <label for="productType">Product Type</label>
                                                            <select name="type" id="productTypeU" class="form-select">
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
                                                            <input type="text" class="form-control" id="grossWeightU" name="gross_weight" placeholder="Enter Gross Weight" >
                                                            <span id="grossWeightMsgU"></span>
                                                        </div>

                                                        <!-- Overhead charges -->
                                                        <div class="form-group mb-3">
                                                            <label for="grossWeight">Overhead charges</label>
                                                            <input type="text" class="form-control" id="overheadChargesU" name="gross_weight" placeholder="Enter Gross Weight" >
                                                            <span id="overheadChargesMsgU"></span>
                                                        </div>

                                                        <!-- Purity -->
                                                        <div class="form-group mb-3">
                                                            <label for="purity">Purity</label>
                                                            <select name="purity" id="purityU" class="form-select">
                                                                <option value="none">-- Select product purity --</option>
                                                                <option value="22K">22 Karat (91.67% gold)</option>
                                                                <option value="20K">20 Karat (83.33% gold)</option>
                                                                <option value="18K">18 Karat (75% gold)</option>
                                                                <option value="16K">16 Karat (66.70% gold)</option>
                                                                <option value="14K">14 Karat (58.30% gold)</option>
                                                            </select>
                                                            <span id="purityMsgU"></span>
                                                        </div>

                                                        <!-- Stock -->
                                                        <div class="form-group mb-3">
                                                            <label for="stock">Stock</label>
                                                            <input type="number" class="form-control" id="stockU" name="stock" placeholder="Enter Stock" >
                                                            <span id="stockMsgU"></span>
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
                        <!-- Repeat for other products -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>