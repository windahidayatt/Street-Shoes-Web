<?php
    //mengaktifkan session php
    session_start();
    include '../assets/conn_db/connect_db_sshoes.php';
    $username_pembeli = $_POST['username'];
    $password_pembeli = $_POST['password'];

    $data = mysqli_query($conn, "SELECT * FROM pembeli WHERE username_pembeli = '$username_pembeli' and password_pembeli ='$password_pembeli'");

    $cek = mysqli_num_rows($data);
    if($cek > 0){
        $_SESSION['username_pembeli'] = $username_pembeli;
        $_SESSION['status_pembeli'] = "login";
        // untuk menyimpan id pembeli yang dibutuhkan nanti saat disimpan ke tabel penjualan
        $row = mysqli_fetch_assoc($data);
        $_SESSION['id_pembeli'] = $row['id_pembeli'];
        header("location:../layout_main/layout_main.php");
    }else{
        header("location:../layout_main/layout_main.php?content=../pages_main/login_cust.php");
    }
?>