<?php

include_once 'conn.php';
session_start();
if (isset($_SESSION['user_username'])) {
    session_destroy();
    ?>
    <script>
        window.location.href = "signin.php";
    </script>
    <?php
} else if (isset($_SESSION['admin_username'])) {
    session_destroy();
    ?>
        <script>
            window.location.href = "signin.php";
        </script>
    <?php
}
?>