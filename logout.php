<?php

include_once 'conn.php';
session_start();
if (isset($_SESSION['user_username'])) {
    // session_destroy();
    unset($_SESSION['user_username']);
    ?>
    <script>
        window.location.href = "signin.php";
    </script>
    <?php
} else if (isset($_SESSION['admin_username'])) {
    // session_destroy();
    unset($_SESSION['admin_username']);
    ?>
        <script>
            window.location.href = "signin.php";
        </script>
    <?php
}
?>