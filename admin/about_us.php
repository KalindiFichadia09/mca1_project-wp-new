<?php
include_once("header.php");
?>

<br><br><br><br>

<div class="container">
    <div class="row text-center">
        <div class="col-12 p-2">
            <h1 style="font-size: calc(1.325rem + 0.9vw);">About Jayshree Jewels</h1>
        </div>
    </div>
    <br>

    <!-- Section to Display Updated Content and Image -->
    <div class="row">
        <?php
        // Display content and image from the about_us_tbl
        $query = "SELECT * FROM about_us_tbl LIMIT 1";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            // Display the content
            echo "<div class='col-md-6 p-2'>" . $row['Content'] . "</div>";

            // Display the image if it exists
            if (!empty($row['image'])) {
                echo "<div class='col-md-6 p-2 text-center'>";
                echo "<img src='../images/about_img/" . $row['image'] . "' alt='About Image' style='max-width:100%; height:auto; max-height:400px;'>";
                echo "</div>";
            }
        } else {
            echo "<div class='col-12 p-2'>No Content available.</div>";
        }
        ?>
    </div>
</div>

<div class="container">
    <h1 style="background-color: ; color: #343a40; font-size: 30px; padding: 0rem">Edit About Us</h1>
    <div class="row text-center">
        <div class="col-12 p-2">
            <h1 style="background-color: #343a40; color: white; font-size: 25px; padding: 0rem">Change Content</h1>
        </div>
    </div>
    <br>

    <!-- Form for Editing Content -->
    <div class="row ">
        <form action="about_us.php" method="post" enctype="multipart/form-data">
            <div id="toolbar-container"></div>

            <div id="editor">
                <?php
                // Load the current content into the editor
                $query = "SELECT * FROM about_us_tbl LIMIT 1";
                $result = mysqli_query($con, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    echo $row['Content'];
                } else {
                    echo "<p>No content available.</p>";
                }
                ?>
            </div>

            <!-- Hidden textarea to store the HTML content -->
            <textarea id="editor-content" name="editor_content" style="display:none;"></textarea>

            <br>
            <input type="submit" value="Update Content" class="btn btn-dark" name="updt_about">
        </form>

        <!-- CKEditor setup -->
        <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/decoupled-document/ckeditor.js"></script>
        <script>
            DecoupledEditor.create(document.querySelector("#editor"), {
                toolbar: [
                    "heading", "bold", "italic", "link",
                    "bulletedList", "numberedList", "blockQuote",
                    "fontColor", "fontBackgroundColor", "undo", "redo"
                ],
                heading: {
                    options: [
                        { model: "paragraph", title: "Paragraph", class: "ck-heading_paragraph" },
                        { model: "heading1", view: "h1", title: "Heading 1", class: "ck-heading_heading1" },
                        { model: "heading2", view: "h2", title: "Heading 2", class: "ck-heading_heading2" },
                        { model: "heading3 ", view: "h3", title: "Heading 3", class: "ck-heading_heading3" }
                    ]
                }
            })
                .then((editor) => {
                    const toolbarContainer = document.querySelector("#toolbar-container");
                    toolbarContainer.appendChild(editor.ui.view.toolbar.element);

                    // Update the hidden textarea with the editor content
                    document.querySelector("#editor-content").value = editor.getData();

                    editor.model.document.on("change:data", () => {
                        document.querySelector("#editor-content").value = editor.getData();
                    });
                })
                .catch((error) => {
                    console.error(error);
                });
        </script>
    </div>
</div>

<div class="container">
    <div class="row text-center">
        <div class="col-12 p-2">
            <h1 style="background-color: #343a40; color: white; font-size: 25px; padding: 0rem">Update Image</h1>
        </div>
    </div>
    <br>

    <!-- Image Upload Section -->
    <div class="row">
        <form action="about_us.php" method="post" enctype="multipart/form-data">
            <div class="col-12 text-center">
                <?php
                // Display the current image preview if it exists
                $query = "SELECT image FROM about_us_tbl LIMIT 1";
                $result = mysqli_query($con, $query);
                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    if (!empty($row['image'])) {
                        echo "<img src='../images/about_img/" . $row['image'] . "' alt='Current Image' style='max-width:300px; height:auto;'>";
                        echo "<br><br>";
                    }
                }
                ?>
                <label for="about_image" class="form-label">Upload New Image:</label>
                <input type="file" name="about_image" accept="image/*" class="form-control"
                    style="width: 30%; margin: 0 auto;">
                <br>

                <input type="submit" value="Update Image" class="btn btn-dark" name="updt_image">
            </div>
        </form>
    </div>
</div>

<?php
// Handle form submission for content update
if (isset($_POST['updt_about'])) {
    $about_content = $_POST['editor_content'];

    $q = "UPDATE about_us_tbl SET Content='$about_content'";
    if (mysqli_query($con, $q)) {
        setcookie("success", 'Page Content Updated', time() + 5, "/");
    } else {
        setcookie("error", 'Failed to update page content', time() + 5, "/");
    }

    echo '<script>window.location.href = "about_us.php";</script>';
}

// Handle form submission for image update
if (isset($_POST['updt_image'])) {
    $image = $_FILES['about_image']['name'];
    $target_dir = "../images/about_img/";
    $target_file = $target_dir . basename($image);
    $uploadError = $_FILES['about_image']['error'];

    // Debugging: Check upload directory
    if (!is_writable($target_dir)) {
        echo "<script>alert('Upload directory is not writable: " . $target_dir . "');</script>";
    } else {
        if ($uploadError === UPLOAD_ERR_OK) {
            // Check if the file type is allowed
            $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
            if (!in_array($fileType, $allowedTypes)) {
                echo "<script>alert('Invalid file type. Only JPG, JPEG, PNG & GIF files are allowed.');</script>";
            } else {
                // Try to move the file
                if (move_uploaded_file($_FILES['about_image']['tmp_name'], $target_file)) {
                    $stmt = $con->prepare("UPDATE about_us_tbl SET image=?");
                    $stmt->bind_param("s", $image);
                    if ($stmt->execute()) {
                        setcookie("success", 'Image Updated', time() + 5, "/");
                    } else {
                        setcookie("error", 'Failed to update image in database', time() + 5, "/");
                    }
                } else {
                    echo "<script>alert('Failed to move uploaded file to: " . $target_file . "');</script>";
                }
            }
        } else {
            echo "<script>alert('Error uploading file: " . $uploadError . "');</script>";
        }
    }
}
?>