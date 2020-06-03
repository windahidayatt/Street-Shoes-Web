<?php
    //mengaktifkan session php
    session_start();
    include 'connect_db_barang.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    $data = mysqli_query($conn, "SELECT * FROM admin WHERE username_admin = '$username' and password_admin ='$password'");

    $cek = mysqli_num_rows($data);
    if($cek > 0){
        $_SESSION['username_admin'] = $username;
        $_SESSION['status_admin'] = "login";
        header("location:page_admin.php");
    }else{
        header("location:login_admin.php");
    }
?>