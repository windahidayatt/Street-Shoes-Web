<?php
    session_start();
    unset($_SESSION['username_pembeli']);
    unset($_SESSION['status_pembeli']);
    unset($_SESSION['id_pembeli']);


    echo $_SESSION['status_pembeli'];
    header("location:../layout_main/layout_main.php?content=../pages_main/login_cust.php");

?>