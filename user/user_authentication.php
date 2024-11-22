<?php
include_once("header.php");
if (!isset($_SESSION['user'])) {
    ?>
    <script>
        window.location.href = "../signin.php";
    </script>
    <?php
}
?>