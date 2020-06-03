<?php
    session_start();
    unset($_SESSION['username_admin']);
    unset($_SESSION['status_admin']);

    header("location:login_admin.php");

?>