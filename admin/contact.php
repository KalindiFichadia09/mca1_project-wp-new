<?php
    include_once 'header.php';
?>
<div class="container mt-5 pt-2">
    <!-- Title and Button Row -->
    <div class="row mt-5 mb-4">
        <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-start mb-2 mb-md-0">
            <h2 class="text-center text-md-left">Manage Feedback</h2>
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
                            <th scope="col">Inqiery Id</th>
                            <th scope="col">User Id</th>
                            <th scope="col">User Email</th>
                            <th scope="col">Inqiery Message</th>
                            <th scope="col">Replied Message</th>
                            <th scope="col">Reply</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>12</td>
                            <td>vchavda908@gmail.com</td>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic numquam est rem distinctio ducimus assumenda ipsa ea sequi eius in maxime, voluptatibus at debitis quos similique! Quisquam debitis praesentium deserunt!</td>
                            <td>-</td>
                            <td><button class="btn btn-primary btn-sm update-btn" data-target-update="#updateRow1">Reply</button></td>
                            <td><button class="btn btn-danger btn-sm">Delete</button></td>
                        </tr>
                        <tr id="updateRow1" class="update-row" style="display:none;">
                            <td colspan="7">
                                <div id="formBlockUpdate" class="row formBlock mb-5">
                                    <div class="col-lg-8 col-md-10 mx-auto">
                                        <div class="form-block p-4">
                                            <form id="update" action="feedback.php" method="post" onsubmit="return categoryValidation();" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <!-- Reply -->
                                                        <div class="form-group mb-3">
                                                            <label for="addressU">Reply</label>
                                                            <textarea class="form-control" id="addressU" name="address" placeholder="Enter Address"></textarea>
                                                            <span id="addressMsgU"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Submit Button -->
                                                <div class="d-flex justify-content-end mt-3">
                                                    <button type="submit" class="btn btn-success">Reply</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>10</td>
                            <td>khapaliya982@gmail.com</td>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic numquam est rem distinctio ducimus assumenda ipsa ea sequi eius in maxime, voluptatibus at debitis quos similique! Quisquam debitis praesentium deserunt!</td>
                            <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</td>
                            <td><button class="btn btn-primary btn-sm update-btn" data-target-update="#updateRow2">Reply</button></td>
                            <td><button class="btn btn-danger btn-sm">Delete</button></td>
                        </tr>
                        <tr id="updateRow2" class="update-row" style="display:none;">
                            <td colspan="7">
                                <div id="formBlockUpdate" class="row formBlock mb-5">
                                    <div class="col-lg-8 col-md-10 mx-auto">
                                        <div class="form-block p-4">
                                            <form id="update" action="feedback.php" method="post" onsubmit="return categoryValidation();" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <!-- Reply -->
                                                        <div class="form-group mb-3">
                                                            <label for="addressU">Reply</label>
                                                            <textarea class="form-control" id="addressU" name="address" placeholder="Enter Address"></textarea>
                                                            <span id="addressMsgU"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Submit Button -->
                                                <div class="d-flex justify-content-end mt-3">
                                                    <button type="submit" class="btn btn-success">Reply</button>
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
