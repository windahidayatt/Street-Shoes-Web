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
            include 'connect_db_barang.php';
            $id = $_GET['id'];
            $result = mysqli_query($conn, "SELECT * from barang WHERE id_barang=$id");
            $row = mysqli_fetch_assoc($result);
            $nama = $row["nama_barang"];
            $harga = $row["harga_barang"];
            $gambar = $row["gambar_barang"];
            $stok = $row["stok_barang"];
            $berat = $row["berat_barang"];
            $deskripsi = $row["deskripsi_barang"];
        ?>

        <div class="container">
            <div class="row mt-4">
                <div class="col-4">
                    <img src="img/<?php echo $gambar; ?>" class="card-img-top" alt="gambar" style="border-radius: 8px;">
                </div>
                <div class="col-8">
                    <h5 class="card-title"><?php echo $nama; ?></h5>
                    <p class="card-text"><?php echo $deskripsi; ?></p>
                    <p class="card-text"><?php echo "Stok   : " . $stok; ?></p>
                    <p class="card-text"><?php echo "Berat  : " . $berat; ?></p>
                    <p class="card-text-2"><?php echo "Rp. " . $harga; ?></p>
                    <form class="form-inline">
                        <div class="form-group mx-sm-3 mb-2" style="margin-left: 0 !important;">
                            <input type='text' name='qty' size='3' value='1' style='text-align:right' class="form-control">
                        </div>
                        <button type="submit" class="btn btn-light mb-2">Add to cart</button>
                    </form>
                    <a class="btn btn-secondary" href="template.php?content=<?php echo 'home.php'?>" role="button" style="float: right;">Back</a>
                    <!-- <p>
                        <a class="btn btn-light" href="#" role="button">Add to cart</a>
                        
                    </p> -->
                </div>
            </div>
        </div>
        
        <!-- <div class="col-sm-3 mb-3">
          <div class="card">
            <img src="img/<?php echo $gambar; ?>" class="card-img-top" alt="gambar">
            <div class="card-body">
              <h5 class="card-title"><?php echo $nama; ?></h5>
              <p class="card-text"><?php echo $harga; ?></p>
            </div>
            <div class="card-footer">
                <a class="btn btn-secondary" href="template.php?content=<?php echo 'product_detail.php'?>">Detail</a>
                <a class="btn btn-dark" href="#" role="button" style="float: right;">Add to cart</a>
            </div>
          </div>
        </div> -->
 
    </div>
</div>
</body>
</html>