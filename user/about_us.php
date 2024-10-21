<?php
include_once("header.php");

?>

<div class="container">
    <div class="row text-center">
        <div class="col-12 text-black p-4 align-center">
            <h1>About Jayshree Jewels</h1>
        </div>
    </div>
    <br>
    <div class="row p-4">
        <div class="col-12">
            <?php
            // Query to fetch content and image from the about_us_tbl
            $q = "SELECT * FROM about_us_tbl LIMIT 1"; // Adjust LIMIT if needed
            $result = mysqli_query($con, $q);
            while ($r = mysqli_fetch_assoc($result)) {
                // Display the content
                echo "<p>" . $r['Content'] . "</p>";

                // Display the image if it exists
                if (!empty($r['image'])) {
                    echo "<img src='uploads/" . $r['image'] . "' alt='About Image' style='max-width:100%; height:auto;'>";
                }
            }
            ?>
        </div>
    </div>
</div>

<?php
include_once("footer.php");
?>
