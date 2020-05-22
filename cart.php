<html>
<head>
    <style>
        
    </style>
</head>
<body>
    <?php
        session_start();
        // session_destroy();
        include 'connect_db_barang.php';
        $id = $_GET['id'];
        if(isset($_POST['qty'])) 
        { 
            $qty = $_POST['qty'];
        }else{
            $qty = 1;
        }
        $result = mysqli_query($conn, "SELECT * FROM barang WHERE id_barang = '$id'");
        while($row = mysqli_fetch_assoc($result)){
            $cart['id'] = $row ['id_barang'];
            $cart['nama'] = $row ['nama_barang'];
            $cart['jumlah'] = $qty;
            $cart['harga'] = $row ['harga_barang'];
            $cart['gambar'] = $row ['gambar_barang'];
        }
        $_SESSION['cart'][] = $cart;
        mysqli_close($conn);

        include 'show_cart.php';
    ?>
    
</body>
</html>