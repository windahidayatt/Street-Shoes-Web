<html>
<head>
    <style>
        .card-title{
            font-size:22pt;
            color : #F6B5AC;
        }
        .card-text {
            font-size:14pt;
            color : #b2b2b2;
        }  
        .card-text-2 {
            font-size:20pt;
            color : #F6B5AC;
            margin-top : 95px;
        }
        form {
            margin-block-end: 0 !important;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row" id="load_data">
        <?php
            include '../assets/conn_db/connect_db_sshoes.php';
            $id = $_GET['id'];
            $result = mysqli_query($conn, "SELECT * from barang WHERE id_barang=$id");
            $row = mysqli_fetch_assoc($result);
            $nama = $row["nama_barang"];
            $harga = $row["harga_barang"];
            $gambar = $row["gambar_barang"];
            $stok = $row["stok_barang"];
            $berat = $row["berat_barang"];
            $deskripsi = $row["deskripsi_barang"];
            mysqli_close($conn);

            // for information of stock
            $_SESSION['stok'] = $stok;
        ?>

        <div class="container">
            <div class="row mt-4">
                <div class="col-4">
                    <img src="../assets/img/<?php echo $gambar; ?>" class="card-img-top" alt="gambar" style="border-radius: 8px;">
                </div>
                <div class="col-8">
                    <h5 class="card-title"><?php echo $nama; ?></h5>
                    <p class="card-text"><?php echo $deskripsi; ?></p>
                    <p class="card-text"><?php echo "Stok   : " . $stok; ?></p>
                    <p class="card-text"><?php echo "Berat  : " . $berat; ?></p>
                    <p class="card-text-2"><?php echo "Rp. " . $harga; ?></p>
                    <form class="form-inline" action="../layout_main/layout_main.php?content=<?php echo '../action_main/add_to_cart.php&id='. $id?>" method="post">
                        <div class="form-group mx-sm-3 mb-2" style="margin-left: 0 !important;">
                            <input type='text' name='qty' size='3' value='1' style='text-align:right' class="form-control">
                        </div>
                        <button type="submit" class="btn btn-light mb-2">Add to cart</button>
                    </form>
                    <a class="btn btn-secondary" href="../layout_main/layout_main.php?content=<?php echo 'home.php'?>" role="button" style="float: right;">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>