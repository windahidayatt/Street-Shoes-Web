<?php
    session_start();
    unset($_SESSION['username_admin']);
    unset($_SESSION['status_admin']);

    header("location:../pages_admin/login_admin.php");

?>