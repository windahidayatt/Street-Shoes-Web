<html>
<head>
    <style>
    .card-title{
        font-size:14pt;
    }
    .card-text {
        font-size:12pt;
    }  
    </style>
</head>
<body>
<div class="container">
    <div class="row" id="load_data">
      <?php
        include '../assets/conn_db/connect_db_sshoes.php';
        $result = mysqli_query($conn, "SELECT * from barang");
    
        while($row = mysqli_fetch_assoc($result)){
          $id = $row["id_barang"];
          $nama = $row["nama_barang"];
          $harga = $row["harga_barang"];
          $gambar = $row["gambar_barang"];
          ?>
        <div class="col-sm-3 mb-3">
          <div class="card">
            <img src="../assets/img/<?php echo $gambar; ?>" class="card-img-top" alt="gambar">
            <div class="card-body">
              <h5 class="card-title"><?php echo $nama; ?></h5>
              <p class="card-text"><?php echo "Rp. " . $harga; ?></p>
            </div>
            <div class="card-footer">
                <a class="btn btn-secondary" href="../layout_main/layout_main.php?content=<?php echo '../pages_main/product_detail.php&id='. $id?>">Detail</a>
                <a class="btn btn-dark" href="../layout_main/layout_main.php?content=<?php echo '../action_main/add_to_cart.php&id='. $id?>" role="button" style="float: right;">Add to cart</a>
            </div>
          </div>
        </div>
      <?php 
      }
      mysqli_close($conn); ?>
 
    </div>
</div>
</body>
</html>