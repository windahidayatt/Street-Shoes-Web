<?php
    //mengaktifkan session php
    session_start();
    include '../assets/conn_db/connect_db_sshoes.php';
    $username_admin = $_POST['username'];
    $password_admin = $_POST['password'];

    $data = mysqli_query($conn, "SELECT * FROM admin WHERE username_admin = '$username_admin' and password_admin ='$password_admin'");

    $cek = mysqli_num_rows($data);
    if($cek > 0){
        $_SESSION['username_admin'] = $username_admin;
        $_SESSION['status_admin'] = "login";
        header("location:../layout_admin/layout_admin.php");
    }else{
        header("location:../pages_admin/login_admin.php");
    }
?>