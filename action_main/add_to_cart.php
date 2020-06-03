<html>
<head>
    <style>
        
    </style>
</head>
<body>
    <?php
        session_start();
        // session_destroy();
        include '../assets/conn_db/connect_db_sshoes.php';
        $id = $_GET['id'];
        if(isset($_POST['qty'])) 
        { 
            $qty = $_POST['qty'];
        }else{
            $qty = 1;
        }
        if(isset($_SESSION['cart'])){
            $tempSearch = "false";
            foreach($_SESSION['cart'] as $key => $result) {
                if($id == $result['id']){
                    // echo "ID=" . $id . "<br>";
                    // echo "KEY=" . $key . "<br>";
                    $tempSearch = "true";
                    $tempKey = $key;
                }
            }
            if($tempSearch == "true"){
                // echo $tempKey . "<br>" . $_SESSION['cart'][$tempKey]['id'] .  $_SESSION['cart'][$tempKey]['jumlah'];
                $_SESSION['cart'][$tempKey]['jumlah'] = $_SESSION['cart'][$tempKey]['jumlah'] + $qty;
            }else{
                $result = mysqli_query($conn, "SELECT * FROM barang WHERE id_barang = '$id'");
                while($row = mysqli_fetch_assoc($result)){
                    $cart['id'] = $row ['id_barang'];
                    $cart['nama'] = $row ['nama_barang'];
                    $cart['jumlah'] = $qty;
                    $cart['harga'] = $row ['harga_barang'];
                    $cart['berat'] = $row ['berat_barang'];
                    $cart['gambar'] = $row ['gambar_barang'];
                }
                $_SESSION['cart'][] = $cart;
                mysqli_close($conn);
            }
        }else{
            $result = mysqli_query($conn, "SELECT * FROM barang WHERE id_barang = '$id'");
            while($row = mysqli_fetch_assoc($result)){
                $cart['id'] = $row ['id_barang'];
                $cart['nama'] = $row ['nama_barang'];
                $cart['jumlah'] = $qty;
                $tempStok = $row['stok_barang'];
                $cart['harga'] = $row ['harga_barang'];
                $cart['berat'] = $row ['berat_barang'];
                $cart['gambar'] = $row ['gambar_barang'];
            }
            $_SESSION['cart'][] = $cart;
            mysqli_close($conn);
        }
        include '../pages_main/cart.php';
    ?>
    
</body>
</html>