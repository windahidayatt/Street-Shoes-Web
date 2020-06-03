<html>
<body>
    <?php
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        $name = $_SESSION['customer']['name'];
        $address = $_SESSION['customer']['address'];
        $phone = $_SESSION['customer']['phone'];
        $postal = $_SESSION['customer']['postal'];
                
        include 'connect_db_barang.php';

        $sql = "INSERT INTO penjualan(nama_pembeli, alamat_pembeli, no_hp_pembeli, kodepos_pembeli) VALUES ('$name', '$address', '$phone', '$postal')";
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
        echo "Checkout succes!" . "<br>";

        $conn->close();
    ?>
</body>
</html>