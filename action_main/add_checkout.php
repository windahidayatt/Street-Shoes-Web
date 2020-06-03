<html>
<head>
<style>
    .title-custom{
        color : #F6B5AC;
        text-align:center;
    }
    .btn-custom{
        text-align:center;
        margin-left:535px;
    }
</style>
</head>
<body>
    <?php
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        include '../assets/conn_db/connect_db_sshoes.php';

        // insert versi pertama belum ada tabel pembeli
        $name = $_SESSION['customer']['name'];
        $address = $_SESSION['customer']['address'];
        $phone = $_SESSION['customer']['phone'];
        $postal = $_SESSION['customer']['postal'];
        // $sql = "INSERT INTO penjualan(nama_pembeli, alamat_pembeli, no_hp_pembeli, kodepos_pembeli) VALUES ('$name', '$address', '$phone', '$postal')";
        // $conn->query($sql);

        // insert ver 2 udah ada tabel pembeli
        $id_pembeli = $_SESSION['id_pembeli'];
        $sql = "INSERT INTO penjualan (id_pembeli) VALUES ('$id_pembeli')";
        $conn->query($sql);


        $last_id = $conn->insert_id;

        foreach($_SESSION['cart'] as $result) {
            $id_barang = $result['id'];
            $harga_barang = $result['harga'];
            $jumlah_barang = $result['jumlah'];
            $sql = "INSERT INTO jual VALUES ('$last_id', '$id_barang', '$harga_barang', '$jumlah_barang')";
            $conn->query($sql);

            $result = mysqli_query($conn, "SELECT * from barang WHERE id_barang=$id_barang");
            $row = mysqli_fetch_assoc($result);
            $tempStok = $row["stok_barang"];
            $tempStok = $tempStok - $jumlah_barang;

            $sql = "UPDATE barang SET stok_barang = '$tempStok' WHERE id_barang = '$id_barang'";
            $conn->query($sql);

        }
        unset($_SESSION['cart']);

        // $conn->close();
    ?>
    
    <h3 class="title-custom">Checkout Succes!</h3>
    
    <a class="btn btn-secondary btn-lg btn-custom" href="../layout_main/layout_main.php?content=<?php echo '../pages_main/invoice.php&id='.$last_id?>" role="button">Show Invoice</a>

</body>
</html>