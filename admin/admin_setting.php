<?php
include_once 'header.php';
?>
<div class="container mt-5 pt-2">

    <div class="row mt-5 mb-4 align-items-center">
        <!-- Title -->
        <div class="col-12 col-md-4 d-flex justify-content-center justify-content-md-start mb-2 mb-md-0">
            <h2 class="text-center text-md-left">Admin settings</h2>
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
            <button id="toggleFormBtnI" class="btn btn-success">Insert Admin</button>
        </div>
    </div>

    <!-- Form Insert -->
    <div id="formBlockInsert" class="row formBlock" style="display: none;">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="form-block p-4">
                <form method="post" id="insert" onsubmit="return userInsertValidation();" enctype="multipart/form-data">
                    <!-- Full Name -->
                    <div class="form-group mb-3">
                        <label for="fullName">Full Name</label>
                        <input type="text" class="form-control" id="fullName" name="u_fullName"
                            placeholder="Enter Full Name">
                        <span id="fullNameMsg"></span>
                    </div>

                    <!-- Gender -->
                    <div class="form-group mb-3">
                        <label>Gender</label>
                        <div class="form-control">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="u_gender" id="genderMale"
                                    value="Male">
                                <label class="form-check-label" for="genderMale">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="u_gender" id="genderFemale"
                                    value="Female">
                                <label class="form-check-label" for="genderFemale">Female</label>
                            </div>
                        </div>
                        <span id="genderMsg"></span>
                    </div>

                    <!-- Email -->
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="u_email" placeholder="Enter Email">
                        <span id="emailMsg"></span>
                    </div>

                    <!-- Mobile -->
                    <div class="form-group mb-3">
                        <label for="mobile">Mobile</label>
                        <input type="tel" class="form-control" id="mobile" name="u_mobile"
                            placeholder="Enter Mobile Number">
                        <span id="mobileMsg"></span>
                    </div>

                    <!-- Address -->
                    <div class="form-group mb-3">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" name="u_address"
                            placeholder="Enter Address"></textarea>
                        <span id="addressMsg"></span>
                    </div>

                    <!-- City -->
                    <div class="form-group mb-3">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="u_city" placeholder="Enter City">
                        <span id="cityMsg"></span>
                    </div>

                    <!-- State -->
                    <div class="form-group mb-3">
                        <label for="state">State</label>
                        <input type="text" class="form-control" id="state" name="u_state" placeholder="Enter State">
                        <span id="stateMsg"></span>
                    </div>

                    <!-- Pincode -->
                    <div class="form-group mb-3">
                        <label for="pincode">Pincode</label>
                        <input type="text" class="form-control" id="pincode" name="u_pincode"
                            placeholder="Enter Pincode">
                        <span id="pincodeMsg"></span>
                    </div>

                    <!-- Profile Photo -->
                    <div class="form-group mb-3">
                        <label for="pincode">Profile Photo</label>
                        <input type="file" class="form-control" id="profilePhoto" name="u_image">
                        <span id="profilePhotoMsg"></span>
                    </div>

                    <!-- Password -->
                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="u_password"
                            placeholder="Enter Password">
                        <span id="passwordMsg"></span>
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group mb-3">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirm_password"
                            placeholder="Confirm Password">
                        <span id="confirmPasswordMsg"></span>
                    </div>

                    <div class="d-flex justify-content-end">
                        <input type="submit" value="Insert" name="insert" class="btn btn-success">
                        <!-- <button type="submit" class="btn btn-success">Insert</button> -->
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $search = isset($_GET['search']) ? $_GET['search'] : '';

                        // SQL query to include the search condition
                        $search_query = "WHERE u_role = 'Admin' ";
                        if (!empty($search)) {
                            $search_query .= " 
          AND (u_fullname LIKE '%$search%' 
          OR u_status LIKE '%$search%' 
          OR u_email LIKE '%$search%')";
                        }
                        // Adding search_query into SQL query
                        $q = "Select * from user_tbl $search_query";
                        $result = mysqli_query($con, $q);

                        // Determine the total number of records
                        $q = "SELECT * FROM user_tbl $search_query";
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
                        $q = "SELECT * FROM user_tbl $search_query LIMIT $start_from, $records_per_page";
                        $result = mysqli_query($con, $q);

                        //  $result = mysqli_query($con, $q);
                        while ($r = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo $r['u_id']; ?></td>
                                <td><?php echo $r['u_fullname']; ?></td>
                                <td><?php echo $r['u_email']; ?></td>
                                <td><span class="status-text text-success"><?php echo $r['u_status']; ?></span></td>
                                <td>
                                    <button class="btn btn-info btn-sm show-btn"
                                        data-target="#detailRow<?php echo $r['u_id']; ?>"><i
                                            class="fas fa-eye"></i></button>
                                </td>
                                <td>
                                    <button class="btn btn-primary btn-sm update-btn"
                                        data-target-update="#updateRow<?php echo $r['u_id']; ?>">
                                        <i class="fas fa-arrow-down "></i></button>
                                </td>
                                <td>
                                    <form method="POST" action="">
                                        <input type="hidden" name="delete_id" value="<?php echo $r['u_id']; ?>">
                                        <button type="submit" name="delete" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this record?');">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <tr id="detailRow<?php echo $r['u_id']; ?>" class="detail-row" style="display:none;">
                                <td colspan="10">
                                    <div class="row">
                                        <div class="col-3 p-3">
                                            <img src="<?php echo $r['u_image']; ?>" alt="User Image" class="img-fluid"
                                                style="max-width: 200px; height: 200px;border-radius: 50%;">
                                        </div>
                                        <div class="col-4 p-3">
                                            <p><strong>Full Name:</strong> <?php echo $r['u_fullname']; ?></p>
                                            <p><strong>Gender:</strong> <?php echo $r['u_gender']; ?></p>
                                            <p><strong>Email :</strong> <?php echo $r['u_email']; ?></p>
                                            <p><strong>Mobile :</strong> <?php echo $r['u_mobile']; ?></p>
                                        </div>
                                        <div class="col-5 p-3">
                                            <p><strong>Address :</strong> <?php echo $r['u_address']; ?></p>
                                            <p><strong>City :</strong> <?php echo $r['u_city']; ?></p>
                                            <p><strong>State :</strong> <?php echo $r['u_state']; ?></p>
                                            <p><strong>Pincode :</strong> <?php echo $r['u_pincode']; ?></p>
                                            <p><strong>Password:</strong> <?php echo $r['u_password']; ?></p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr id="updateRow<?php echo $r['u_id']; ?>" class="update-row" style="display:none;">
                                <td colspan="10">
                                    <div id="formBlockUpdate" class="row formBlock mb-5">
                                        <div class="col-lg-8 col-md-10 mx-auto">
                                            <div class="form-block p-4">
                                                <?php
                                                $id = $r['u_id'];
                                                $q1 = "select * from user_tbl where u_id=$id";
                                                $resultselect = mysqli_query($con, $q1);
                                                $row = mysqli_fetch_assoc($resultselect);
                                                ?>
                                                <form action="" id="update" method="post"
                                                    onsubmit="return userUpdateValidation(this);"
                                                    enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <input type="hidden" name="u_id"
                                                                value="<?php echo $row['u_id']; ?>">
                                                            <!-- Full Name -->
                                                            <div class="form-group mb-3">
                                                                <label for="fullNameU">Full Name</label>
                                                                <input type="text" class="form-control fullNameU"
                                                                    id="fullNameU" name="u_fullname"
                                                                    value="<?php echo $row['u_fullname']; ?>"
                                                                    placeholder="Enter Full Name">
                                                                <span class="fullNameMsgU"></span>
                                                            </div>

                                                            <!-- Mobile -->
                                                            <div class="form-group mb-3">
                                                                <label for="mobileU">Mobile</label>
                                                                <input type="tel" class="form-control mobileU" id="mobileU"
                                                                    name="u_mobile" value="<?php echo $row['u_mobile']; ?>"
                                                                    placeholder="Enter Mobile Number">
                                                                <span class="mobileMsgU"></span>
                                                            </div>

                                                            <!-- Address -->
                                                            <div class="form-group mb-3">
                                                                <label for="addressU">Address</label>
                                                                <input type="text" class="form-control stateU" id="addressU"
                                                                    name="u_address"
                                                                    value="<?php echo $row['u_address']; ?>"
                                                                    placeholder="Enter Address">
                                                                <!-- <textarea class="form-control addressU" id="addressU"
                                                                                                                                                                                                                                                                    name="address" value="<?php echo $r['u_address']; ?>" placeholder="Enter Address"></textarea> -->
                                                                <span class="addressMsgU"></span>
                                                            </div>

                                                            <!-- State -->
                                                            <div class="form-group mb-3">
                                                                <label for="stateU">State</label>
                                                                <input type="text" class="form-control stateU" id="stateU"
                                                                    name="u_state" value="<?php echo $row['u_state']; ?>"
                                                                    placeholder="Enter State">
                                                                <span class="stateMsgU"></span>
                                                            </div>

                                                            <!-- Profile photo -->
                                                            <div class="form-group mb-3">
                                                                <label for="stateU">Profile Photo</label>
                                                                <input type="file" class="form-control profilePhotoU"
                                                                    id="profilePhotoU" name="u_image">
                                                                <span class="profilePhotoUMsg"></span>
                                                            </div>

                                                        </div>

                                                        <div class="col-md-6">
                                                            <!-- Gender -->
                                                            <div class="form-group mb-3">
                                                                <label>Gender</label>
                                                                <div class="form-control">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input genderU" type="radio"
                                                                            name="u_genderU" id="genderMaleU" value="male"
                                                                            <?php if ($row['u_gender'] == "male")
                                                                                echo "checked"; ?>>
                                                                        <label class="form-check-label"
                                                                            for="genderMaleU">Male</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input genderU" type="radio"
                                                                            name="u_genderU" id="genderFemaleU"
                                                                            value="female" <?php if ($row['u_gender'] == "female")
                                                                                echo "checked"; ?>>
                                                                        <label class="form-check-label"
                                                                            for="genderFemaleU">Female</label>
                                                                    </div>
                                                                </div>
                                                                <span class="genderMsgU"></span>
                                                            </div>

                                                            <!-- Email -->
                                                            <div class="form-group mb-3">
                                                                <label for="emailU">Email</label>
                                                                <input type="email" class="form-control emailU" id="emailU"
                                                                    name="u_email" value="<?php echo $row['u_email']; ?>"
                                                                    placeholder="Enter Email">
                                                                <span class="emailMsgU "></span>
                                                            </div>

                                                            <!-- City -->
                                                            <div class="form-group mb-3">
                                                                <label for="cityU">City</label>
                                                                <input type="text" class="form-control cityU" id="cityU"
                                                                    name="u_city" value="<?php echo $row['u_city']; ?>"
                                                                    placeholder="Enter City">
                                                                <span class="cityMsgU "></span>
                                                            </div>

                                                            <!-- Pincode -->
                                                            <div class="form-group mb-3">
                                                                <label for="pincodeU">Pincode</label>
                                                                <input type="text" class="form-control pincodeU"
                                                                    id="pincodeU" value="<?php echo $row['u_pincode']; ?>"
                                                                    name="u_pincode" placeholder="Enter Pincode">
                                                                <span class="pincodeMsgU "></span>
                                                            </div>

                                                            <!-- Password -->
                                                            <div class="form-group mb-3">
                                                                <label for="passwordU">Password</label>
                                                                <input type="password" class="form-control passwordU"
                                                                    id="passwordU" name="u_password"
                                                                    value="<?php echo $row['u_password']; ?>"
                                                                    placeholder="Enter Password">
                                                                <span class="passwordMsgU"></span>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <!-- Submit Button -->
                                                    <div class="d-flex justify-content-end mt-3">
                                                        <input type="submit" name="update" value="Update"
                                                            class="btn btn-success">
                                                        <!-- <button type="submit" class="btn btn-success">Update</button> -->
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
    // insert new admin
    if (isset($_POST['insert'])) {
        $u_fullName = $_POST['u_fullName'];
        $u_gender = $_POST['u_gender'];
        $u_email = $_POST['u_email'];
        $u_mobile = $_POST['u_mobile'];
        $u_address = $_POST['u_address'];
        $u_city = $_POST['u_city'];
        $u_state = $_POST['u_state'];
        $u_pincode = $_POST['u_pincode'];
        $u_password = $_POST['u_password'];
        $u_status = "Inactive";
        $u_role = "Admin";
        $u_image = $_FILES['u_image']['name'];
        $profile_picture = "../images/profile_image/" . uniqid() . $u_image;

        $q = "INSERT INTO `user_tbl`(`u_fullname`, `u_gender`, `u_email`, `u_mobile`, `u_address`, `u_city`, `u_state`, `u_pincode`, `u_password`, `u_image`, `u_status`,`u_role`) 
                        VALUES ('$u_fullName','$u_gender','$u_email','$u_mobile','$u_address','$u_city','$u_state','$u_pincode','$u_password','$profile_picture','$u_status','$u_role')";
        // echo $q;
        if (mysqli_query($con, $q)) {
            if (!is_dir("../images/profile_image")) {
                mkdir("../images/profile_image");
            }
            $temp = $_FILES['u_image']['tmp_name'];
            move_uploaded_file($temp, $profile_picture);
            // Send verification email
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'veloraa1920@gmail.com';
                $mail->Password = 'rtep efdy gepi yrqj';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                $mail->setFrom('veloraa1920@gmail.com', 'Jayshree');
                $mail->addAddress($u_email, $u_fullName);

                $mail->isHTML(true);
                $mail->Subject = 'Email Verification';
                $activation_link = "http://localhost/mca1_project(wp)new/verify_email.php?em=" . $u_email;
                $mail->Body = "<html>
            <head>
                <style>
                    body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                    .container { max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f9f9f9; }
                    h1 { color: black; }
                    .button { display: inline-block; padding: 10px 20px; background-color: gray; color: black; text-decoration: none; border-radius: 5px; }
                    .footer { margin-top: 20px; font-size: 0.8em; color: #777; }
                    a { text-decoration: none; color: white; }
                </style>
            </head>
            <body>
                <div class='container'>
                    <h1>Welcome, $u_fullName!</h1>
                    <p>Thank you for registering. Please click the button below to activate your account:</p>
                    <p><a href='$activation_link' class='button'>Activate Your Account</a></p>
                    <p>If you didn't register on our website, please ignore this email.</p>
                    <div class='footer'>
                        <p>This is an automated message, please do not reply to this email.</p>
                    </div>
                </div>
            </body>
            </html>";

                $mail->send();
            } catch (Exception $e) {
                setcookie('error', "Error in sending email: " . $mail->ErrorInfo, time() + 5);
            }

            setcookie('success', 'New Admin inserted', time() + 5, "/");
            ?>
                    <script>
                        confirm("Inserted !!");
                        window.location.href = "admin_setting.php";
                    </script>
                    <?php
        } else {
            ?>

                    <script>
                        confirm("Not Inserted");
                        window.location.href = "admin_setting.php";
                    </script>
                    <?php
        }
    }

    // update admin
    if (isset($_POST['update'])) {
        $profile_picture;
        $u_id = $_POST['u_id'];
        $u_fullName = $_POST['u_fullname'];
        $u_gender = $_POST['u_genderU'];
        $u_email = $_POST['u_email'];
        $u_mobile = $_POST['u_mobile'];
        $u_address = $_POST['u_address'];
        $u_city = $_POST['u_city'];
        $u_state = $_POST['u_state'];
        $u_pincode = $_POST['u_pincode'];
        $u_password = $_POST['u_password'];
        $u_status = $_POST['u_statusU'];
        $u_role = "Admin";

        $select = "SELECT * FROM user_tbl WHERE u_id = '$u_id'";
        $results = mysqli_query($con, $select);
        $rs = mysqli_fetch_assoc($results);

        if ($_FILES['u_image']['name'] != "") {
            $profile_picture = $_FILES['u_image']['name'];
            $temp = $_FILES['u_image']['tmp_name'];
            $profile_picture = "../images/profile_image/admin/" . uniqid() . $profile_picture;
            move_uploaded_file($temp, $profile_picture);
        } else {
            $profile_picture = $rs['u_image'];
        }

        $update_query = "UPDATE user_tbl SET 
                        u_fullname='$u_fullName', 
                        u_gender='$u_gender', 
                        u_email='$u_email', 
                        u_mobile='$u_mobile', 
                        u_address='$u_address', 
                        u_city='$u_city', 
                        u_state='$u_state', 
                        u_pincode='$u_pincode',
                        u_password='$u_password', 
                        u_status='$u_status', 
                        u_image='$profile_picture' 
                    WHERE u_id='$u_id' AND u_role='$u_role'";

        echo $update_query;

        if (mysqli_query($con, $update_query)) {
            if ($profile_picture != $rs['u_image']) {
                $old_profile_picture = $rs['u_image'];
                if (file_exists($old_profile_picture)) {
                    unlink($old_profile_picture);
                }
            }

            setcookie("success", "Profile updated successfully", time() + 5, "/");
            ?>
            <script>
                alert("Profile updated succesfully !!");
                window.location.href = 'admin_setting.php';
            </script>
            <?php
        } else {
            setcookie("error", "Error in updating profile", time() + 5, "/");
            ?>
            <script>
                alert("Profile not updated !!");
                window.location.href = 'admin_setting.php';
            </script>
            <?php
        }
    }

    //delete admin
    if (isset($_POST['delete'])) {
        $delete_id = $_POST['delete_id'];

        $delete_query = "DELETE FROM user_tbl WHERE u_id = '$delete_id'";

        if (mysqli_query($con, $delete_query)) {
            echo "<script>confirm('Record deleted successfully');</script>";
        } else {
            echo "<script>confirm('Error deleting record');</script>";
        }

        echo "<script>window.location.href = 'admin_setting.php';</script>";
    }
    ?>