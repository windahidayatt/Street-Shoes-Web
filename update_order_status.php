<?php

    include 'connect_db_barang.php';
    $id = $_GET['id'];

    $result = mysqli_query($conn, "SELECT * from penjualan WHERE id_penjualan=$id");
    $row = mysqli_fetch_assoc($result);
    $tempStatus = $row["status_penjualan"];

    switch($tempStatus){
        case 0 : 
        case 1 : $tempStatus = $tempStatus + 1; break;
        case 2 : $tempStatus = $tempStatus; break;
    }

    $sql = "UPDATE penjualan SET status_penjualan = '$tempStatus' WHERE id_penjualan = '$id'";
    $conn->query($sql);

    header("location:page_admin.php?content=sales_list.php");
?>
