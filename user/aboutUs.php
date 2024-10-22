<?php
include_once("header.php");
?>

<div class="container">
    <div class="row">
        <div class="col-12 text-center p-4">
            <h1>About Jayshree Jewels</h1>
        </div>
    </div>

    <br>

    <div class="row p-4 align-items-center">
        <div class="col-md-6">
            <?php
            // Query to fetch content and image from the about_us_tbl
            $q = "SELECT * FROM about_us_tbl LIMIT 1"; // Adjust LIMIT if needed
            $result = mysqli_query($con, $q);
            while ($r = mysqli_fetch_assoc($result)) {
                // Display the image if it exists
                if (!empty($r['image'])) {
                    echo "<img src='../images/about_img/" . $r['image'] . "' alt='About Image' style='max-width:100%; height:auto; border-radius:8px;'>";
                }
            }
            ?>
        </div>

        <div class="col-md-6">
            <h2>About us</h2><br>
            <?php
            // Fetch and display content
            $result = mysqli_query($con, $q);
            while ($r = mysqli_fetch_assoc($result)) {
                echo "<p>" . $r['Content'] . "</p>";
            }
            ?>
        </div>
    </div>
</div>

<?php
include_once("footer.php");
?>
