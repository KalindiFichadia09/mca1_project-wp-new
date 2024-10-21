<?php
include_once("header.php");

?>

<div class="container">
    <div class="row text-center">
        <div class="col-12  text-black p-4 align-center">
            <h1>About Jayshree Jewels</h1>
        </div>
    </div>
    <br>
    <div class="row p-4">
        <div class="col-12">
            <?php
            $q = "select * from about_us_tbl";
            $result = mysqli_query($con, $q);
            while ($r = mysqli_fetch_assoc($result)) {
                echo $r['Content'];
            }
            ?>
        </div>
    </div>
</div>

<?php
include_once("footer.php");