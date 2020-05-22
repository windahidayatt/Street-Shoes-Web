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
    header("location:template.php?content=show_cart.php");
?>
