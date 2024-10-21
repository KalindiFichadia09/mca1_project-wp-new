<?php
include_once("header.php");
//include_once("admin_authentication.php");
?>
<br><br><br><br>

<div class="container">
    <div class="row text-center">
        <!-- No background for About Jaysheree Jewels -->
        <div class="col-12 p-2">
            <h1 style="font-size: calc(1.325rem + 0.9vw);">About Jaysheree Jewels</h1>
        </div>
    </div>
    <br>

    <!-- Section to Display Updated Content -->
    <div class="row">
        <?php
        // Display content from the about_us_tbl
        $query = "SELECT * FROM about_us_tbl LIMIT 1";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            echo "<div class='col-12 p-2'>" . $row['content'] . "</div>"; // Display updated content here
        } else {
            echo "<div class='col-12 p-2'>No content available.</div>";
        }
        ?>
    </div>
</div>

<div class="container">
    <div class="row text-center">
        <!-- Change Content with Black Font and No Background -->
        <div class="col-12 p-2">
            <h1 style="background-color: #343a40; color: white; padding: 0.5rem">Change Content</h1>
        </div>
    </div>
    <br>

    <!-- Form for Editing Content -->
    <div class="row">
        <form action="about_us.php" method="post">
            <div id="toolbar-container"></div>

            <div id="editor">
                <?php
                // Load the current content into the editor
                $query = "SELECT * FROM about_us_tbl LIMIT 1";
                $result = mysqli_query($con, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    echo $row['content'];
                } else {
                    echo "<p>No content available.</p>";
                }
                ?>
            </div>

            <!-- Hidden textarea to store the HTML content -->
            <textarea id="editor-content" name="editor_content" style="display:none "></textarea>
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
                            { model: "heading3", view: "h3", title: "Heading 3", class: "ck-heading_heading3" }
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

<?php
//include_once("admin_footer.php");

// Handle form submission
if (isset($_POST['updt_about'])) {
    $about_content = $_POST['editor_content'];

    // Check if there's any existing content in about_us_tbl
    $q1 = "SELECT * FROM about_us_tbl";
    $res1 = mysqli_query($con, $q1);
    $count = mysqli_num_rows($res1);

    // Update if content exists, else insert new content
    if ($count == 0) {
        $q2 = "INSERT INTO about_us_tbl (content) VALUES ('$about_content')";
        if (mysqli_query($con, $q2)) {
            setcookie("success", 'Page Content Added', time() + 5, "/");
        } else {
            setcookie("error", 'Failed to add page content', time() + 5, "/");
        }
    } else {
        $q = "UPDATE about_us_tbl SET content='$about_content'";
        if (mysqli_query($con, $q)) {
            setcookie("success", 'Page Content Updated', time() + 5, "/");
        } else {
            setcookie("error", 'Failed to update page content', time() + 5, "/");
        }
    }
    ?>
    <script>
        window.location.href = "about_us.php";
    </script>
    <?php
}
?>