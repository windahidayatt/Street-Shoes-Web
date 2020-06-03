<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    foreach($_SESSION['cart'] as $key => $value) {
        if($value['id'] == $_GET['id']){
            unset($_SESSION['cart'][$key]);
        }
    }
    header("location:../layout_main/layout_main.php?content=../pages_main/cart.php");
?>
