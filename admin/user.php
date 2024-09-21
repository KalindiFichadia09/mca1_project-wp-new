<?php
    include_once 'header.php';
?>
<div class="container mt-5 pt-2">
    <!-- Title and Button Row -->
    <div class="row mt-5 mb-4">
        <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-start mb-2 mb-md-0">
            <h2 class="text-center text-md-left">Manage User</h2>
        </div>
        <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end">
            <button id="toggleFormBtnI" class="btn btn-success">Insert User</button>
            <!-- <button id="toggleFormBtnU" class="btn btn-primary ms-2">Update User</button> -->
        </div>
    </div>

    <!-- Form Insert -->
    <div id="formBlockInsert" class="row formBlock" style="display: none;">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="form-block p-4">
                <form action="user.php" method="post" id="insert" onsubmit="return userInsertValidation();" enctype="multipart/form-data">
                    <!-- Full Name -->
                    <div class="form-group mb-3">
                        <label for="fullName">Full Name</label>
                        <input type="text" class="form-control" id="fullName" name="full_name" placeholder="Enter Full Name" >
                        <span id="fullNameMsg"></span>
                    </div>

                    <!-- Gender -->
                    <div class="form-group mb-3">
                        <label>Gender</label>
                        <div class="form-control">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="genderMale" value="Male" >
                                <label class="form-check-label" for="genderMale">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="Female" >
                                <label class="form-check-label" for="genderFemale">Female</label>
                            </div>
                        </div>
                        <span id="genderMsg"></span>
                    </div>

                    <!-- Email -->
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" >
                        <span id="emailMsg"></span>
                    </div>

                    <!-- Mobile -->
                    <div class="form-group mb-3">
                        <label for="mobile">Mobile</label>
                        <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile Number" >
                        <span id="mobileMsg"></span>
                    </div>

                    <!-- Address -->
                    <div class="form-group mb-3">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" name="address" placeholder="Enter Address" ></textarea>
                        <span id="addressMsg"></span>
                    </div>

                    <!-- City -->
                    <div class="form-group mb-3">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" >
                        <span id="cityMsg"></span>
                    </div>

                    <!-- State -->
                    <div class="form-group mb-3">
                        <label for="state">State</label>
                        <input type="text" class="form-control" id="state" name="state" placeholder="Enter State" >
                        <span id="stateMsg"></span>
                    </div>

                    <!-- Pincode -->
                    <div class="form-group mb-3">
                        <label for="pincode">Pincode</label>
                        <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Enter Pincode" >
                        <span id="pincodeMsg"></span>
                    </div>

                    <!-- Profile Photo -->
                    <div class="form-group mb-3">
                        <label for="pincode">Profile Photo</label>
                        <input type="file" class="form-control" id="profilePhoto" name="profilePhoto">
                        <span id="profilePhotoMsg"></span>
                    </div>

                    <!-- Password -->
                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" >
                        <span id="passwordMsg"></span>
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group mb-3">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirm_password" placeholder="Confirm Password" >
                        <span id="confirmPasswordMsg"></span>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">Insert</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Table for Users -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Sr No</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            <th scope="col">Show</th>
                            <th scope="col">Update</th>
                            <th scope="col">Delete</th>
                            <th scope="col">Cart</th>
                            <th scope="col">Wishlist</th>
                            <th scope="col">Order</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>john.doe@example.com</td>
                            <td><span class="status-text text-success">Active</span></td>
                            <td>
                                <button class="btn btn-info btn-sm show-btn" data-target="#detailRow1"><i class="fas fa-eye"></i></button>
                            </td>
                            <td>
                                <button class="btn btn-primary btn-sm update-btn" data-target-update="#updateRow1"><i class="fas fa-arrow-down "></i></button>
                            </td>
                            <td>
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </td>
                            <td>
                                <button class="btn btn-success btn-sm"><i class="fas fa-shopping-cart"></i></button>
                            </td>
                            <td>
                                <button class="btn btn-secondary btn-sm"><i class="fas fa-heart"></i></button>
                            </td>
                            <td>
                                <button class="btn btn-warning btn-sm"><i class="fas fa-shopping-bag"></i></button>
                            </td>
                        </tr>
                        <tr id="detailRow1" class="detail-row" style="display:none;">
                            <td colspan="10">
                                <div class="row">
                                    <div class="col-3 p-3">
                                        <img src="../images/profile.jpg" alt="User Image" class="img-fluid" style="max-width: 100%; height: 200px;border-radius: 50%;">
                                    </div>
                                    <div class="col-4 p-3">
                                        <p><strong>Full Name:</strong> Jane Smith</p>
                                        <p><strong>Gender:</strong> Female</p>
                                        <p><strong>Email :</strong> jane.smith@example.com</p>
                                        <p><strong>Mobile :</strong> 0987654321</p>
                                    </div>
                                    <div class="col-5 p-3">    
                                        <p><strong>Address :</strong> 456 Oak Avenue</p>
                                        <p><strong>City :</strong> Townsville</p>
                                        <p><strong>State :</strong> Stateville</p>
                                        <p><strong>Pincode :</strong> 654321</p>
                                        <p><strong>Password:</strong> *****</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr id="updateRow1" class="update-row" style="display:none;">
                            <td colspan="10">
                                <div id="formBlockUpdate" class="row formBlock mb-5">
                                <div class="col-lg-8 col-md-10 mx-auto">
                                    <div class="form-block p-4">
                                    <form action="user.php" id="update" method="post" onsubmit="return userUpdateValidation(this);" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Full Name -->
                                                <div class="form-group mb-3">
                                                    <label for="fullNameU">Full Name</label>
                                                    <input type="text" class="form-control fullNameU" id="fullNameU" name="full_name" placeholder="Enter Full Name">
                                                    <span class="fullNameMsgU"></span>
                                                </div>

                                                <!-- Mobile -->
                                                <div class="form-group mb-3">
                                                    <label for="mobileU">Mobile</label>
                                                    <input type="tel" class="form-control mobileU" id="mobileU" name="mobile" placeholder="Enter Mobile Number">
                                                    <span class="mobileMsgU"></span>
                                                </div>
                                                
                                                <!-- Address -->
                                                <div class="form-group mb-3">
                                                    <label for="addressU">Address</label>
                                                    <textarea class="form-control addressU" id="addressU" name="address" placeholder="Enter Address"></textarea>
                                                    <span class="addressMsgU"></span>
                                                </div>
                                                
                                                <!-- State -->
                                                <div class="form-group mb-3">
                                                    <label for="stateU">State</label>
                                                    <input type="text" class="form-control stateU" id="stateU" name="state" placeholder="Enter State">
                                                    <span class="stateMsgU"></span>
                                                </div>

                                                <!-- Profile photo -->
                                                <div class="form-group mb-3">
                                                    <label for="stateU">State</label>
                                                    <input type="file" class="form-control profilePhotoU" id="profilePhotoU" name="profilePhotoU">
                                                    <span class="profilePhotoUMsg"></span>
                                                </div>
                                                
                                                <!-- Confirm Password -->
                                                <div class="form-group mb-3">
                                                    <label for="confirmPasswordU">Confirm Password</label>
                                                    <input type="password" class="form-control confirmPasswordU" id="confirmPasswordU" name="confirm_password" placeholder="Confirm Password">
                                                    <span class="confirmPasswordMsgU "></span>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <!-- Gender -->
                                                <div class="form-group mb-3">
                                                    <label>Gender</label>
                                                    <div class="form-control">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input genderU" type="radio" name="genderU" id="genderMaleU" value="Male">
                                                            <label class="form-check-label" for="genderMaleU">Male</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input genderU" type="radio" name="genderU" id="genderFemaleU" value="Female">
                                                            <label class="form-check-label" for="genderFemaleU">Female</label>
                                                        </div>
                                                    </div>
                                                    <span class="genderMsgU"></span>
                                                </div>
                                                
                                                <!-- Email -->
                                                <div class="form-group mb-3">
                                                    <label for="emailU">Email</label>
                                                    <input type="email" class="form-control emailU" id="emailU" name="email" placeholder="Enter Email">
                                                    <span class="emailMsgU "></span>
                                                </div>
                                                
                                                <!-- City -->
                                                <div class="form-group mb-3">
                                                    <label for="cityU">City</label>
                                                    <input type="text" class="form-control cityU" id="cityU" name="city" placeholder="Enter City">
                                                    <span class="cityMsgU "></span>
                                                </div>
                                                
                                                <!-- Pincode -->
                                                <div class="form-group mb-3">
                                                    <label for="pincodeU">Pincode</label>
                                                    <input type="text" class="form-control pincodeU" id="pincodeU" name="pincode" placeholder="Enter Pincode">
                                                    <span class="pincodeMsgU "></span>
                                                </div>
                                                
                                                <!-- Password -->
                                                <div class="form-group mb-3">
                                                    <label for="passwordU">Password</label>
                                                    <input type="password" class="form-control passwordU" id="passwordU" name="password" placeholder="Enter Password">
                                                    <span class="passwordMsgU"></span>
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

                        <tr>
                            <td>2</td>
                            <td>Jane Smith</td>
                            <td>jane.smith@example.com</td>
                            <td><span class="status-text text-dang">Inactive</span></td>
                            <td>
                                <button class="btn btn-info btn-sm show-btn" data-target="#detailRow2"><i class="fas fa-eye"></i></button>
                            </td>
                            <td>
                                <button class="btn btn-primary btn-sm update-btn" data-target-update="#updateRow2"><i class="fas fa-arrow-down"></i></button>
                            </td>
                            <td>
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </td>
                            <td>
                                <button class="btn btn-success btn-sm"><i class="fas fa-shopping-cart"></i></button>
                            </td>
                            <td>
                                <button class="btn btn-secondary btn-sm"><i class="fas fa-heart"></i></button>
                            </td>
                            <td>
                                <button class="btn btn-warning btn-sm"><i class="fas fa-shopping-bag"></i></button>
                            </td>
                        </tr>
                        <tr id="detailRow2" class="detail-row" style="display:none;">
                            <td colspan="10">
                                <div class="row">
                                    <div class="col-3 p-3">
                                        <img src="../images/profile.jpg" alt="User Image" class="img-fluid" style="max-width: 100%; height: 200px;border-radius: 50%;">
                                    </div>
                                    <div class="col-4 p-3">
                                        <p><strong>Full Name:</strong> Jane Smith</p>
                                        <p><strong>Gender:</strong> Female</p>
                                        <p><strong>Email :</strong> jane.smith@example.com</p>
                                        <p><strong>Mobile :</strong> 0987654321</p>
                                    </div>
                                    <div class="col-5 p-3">    
                                        <p><strong>Address :</strong> 456 Oak Avenue</p>
                                        <p><strong>City :</strong> Townsville</p>
                                        <p><strong>State :</strong> Stateville</p>
                                        <p><strong>Pincode :</strong> 654321</p>
                                        <p><strong>Password:</strong> *****</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr id="updateRow2" class="update-row" style="display:none;">
                            <td colspan="10">
                                <div id="formBlockUpdate" class="row formBlock mb-5">
                                <div class="col-lg-8 col-md-10 mx-auto">
                                    <div class="form-block p-4">
                                    <form action="user.php" id="update" method="post" onsubmit="return userUpdateValidation(this);" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Full Name -->
                                                <div class="form-group mb-3">
                                                    <label for="fullNameU">Full Name</label>
                                                    <input type="text" class="form-control fullNameU" id="fullNameU" name="full_name" placeholder="Enter Full Name">
                                                    <span class="fullNameMsgU"></span>
                                                </div>

                                                <!-- Mobile -->
                                                <div class="form-group mb-3">
                                                    <label for="mobileU">Mobile</label>
                                                    <input type="tel" class="form-control mobileU" id="mobileU" name="mobile" placeholder="Enter Mobile Number">
                                                    <span class="mobileMsgU"></span>
                                                </div>
                                                
                                                <!-- Address -->
                                                <div class="form-group mb-3">
                                                    <label for="addressU">Address</label>
                                                    <textarea class="form-control addressU" id="addressU" name="address" placeholder="Enter Address"></textarea>
                                                    <span class="addressMsgU"></span>
                                                </div>
                                                
                                                <!-- State -->
                                                <div class="form-group mb-3">
                                                    <label for="stateU">State</label>
                                                    <input type="text" class="form-control stateU" id="stateU" name="state" placeholder="Enter State">
                                                    <span class="stateMsgU"></span>
                                                </div>

                                                <!-- Profile photo -->
                                                <div class="form-group mb-3">
                                                    <label for="stateU">State</label>
                                                    <input type="file" class="form-control profilePhotoU" id="profilePhotoU" name="profilePhotoU">
                                                    <span class="profilePhotoUMsg"></span>
                                                </div>
                                                
                                                <!-- Confirm Password -->
                                                <div class="form-group mb-3">
                                                    <label for="confirmPasswordU">Confirm Password</label>
                                                    <input type="password" class="form-control confirmPasswordU" id="confirmPasswordU" name="confirm_password" placeholder="Confirm Password">
                                                    <span class="confirmPasswordMsgU "></span>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <!-- Gender -->
                                                <div class="form-group mb-3">
                                                    <label>Gender</label>
                                                    <div class="form-control">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input genderU" type="radio" name="genderU" id="genderMaleU" value="Male">
                                                            <label class="form-check-label" for="genderMaleU">Male</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input genderU" type="radio" name="genderU" id="genderFemaleU" value="Female">
                                                            <label class="form-check-label" for="genderFemaleU">Female</label>
                                                        </div>
                                                    </div>
                                                    <span class="genderMsgU"></span>
                                                </div>
                                                
                                                <!-- Email -->
                                                <div class="form-group mb-3">
                                                    <label for="emailU">Email</label>
                                                    <input type="email" class="form-control emailU" id="emailU" name="email" placeholder="Enter Email">
                                                    <span class="emailMsgU "></span>
                                                </div>
                                                
                                                <!-- City -->
                                                <div class="form-group mb-3">
                                                    <label for="cityU">City</label>
                                                    <input type="text" class="form-control cityU" id="cityU" name="city" placeholder="Enter City">
                                                    <span class="cityMsgU "></span>
                                                </div>
                                                
                                                <!-- Pincode -->
                                                <div class="form-group mb-3">
                                                    <label for="pincodeU">Pincode</label>
                                                    <input type="text" class="form-control pincodeU" id="pincodeU" name="pincode" placeholder="Enter Pincode">
                                                    <span class="pincodeMsgU "></span>
                                                </div>
                                                
                                                <!-- Password -->
                                                <div class="form-group mb-3">
                                                    <label for="passwordU">Password</label>
                                                    <input type="password" class="form-control passwordU" id="passwordU" name="password" placeholder="Enter Password">
                                                    <span class="passwordMsgU"></span>
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
                        <!-- Additional rows go here -->
                    </tbody>
                </table>
            </div>
        </div>

    
</div>
</body>
</html>