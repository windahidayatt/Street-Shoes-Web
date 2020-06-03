<html>
<head>
    <style>
        .row-custom{
            background-color : #41484f;
            border-radius:8px;
        }
        .h5-custom{
            font-size:16pt;
            color : #F6B5AC;
        }
        .p-custom {
            font-size:14pt;
            color : #e5e5e5;
        }
        /* .card-text-2 {
            font-size:20pt;
            color : #F6B5AC;
            margin-top : 95px;
        }
        form {
            margin-block-end: 0 !important;
        } */
        table#t04{
            margin-top : 0;
            margin-bottom :0;
        }
        table#t04 tr:nth-child(even) {
            background-color: #41484f;
        }
        table#t04 tr:nth-child(odd) {
            background-color: #41484f;
        }
        .img-barang{
            height : 120px;
            width : 120px;
            border-radius: 8px;
        }
        .tfooter-custom{
            color : #e5e5e5 !important;
            font-weight : bold;
        }
        .th-color{
            background-color : #41484f !important;
            color : #e5e5e5 !important;
        }
        .td-color{
            color : #e5e5e5 !important;
            padding-top : 60px !important;
        }
        .th-detail{
            background-color : #343a40 !important;
            color : #e5e5e5 !important;
            text-align : center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row row-custom">
            <?php
                include '../assets/conn_db/connect_db_sshoes.php';
                $id = $_GET['id'];
                // $id = 7;

                // db for select customer biodata
                $result = mysqli_query($conn, "SELECT * from penjualan WHERE id_penjualan=$id");
                $row = mysqli_fetch_assoc($result);
                $id_penjualan = $row["id_penjualan"];
                $nama = $row["nama_pembeli"];
                $alamat = $row["alamat_pembeli"];
                $phone = $row["no_hp_pembeli"];
                $postal_code = $row["kodepos_pembeli"];
                $waktu = $row["tanggal_penjualan"];

                // db for check product weight and price
                $result = mysqli_query($conn, "SELECT * from jual WHERE id_penjualan=$id");
                $tempJumlah = 0;
                $tempBerat = 0;
                while($row = mysqli_fetch_assoc($result)){
                    // get info berat barang dari tabel barang
                    $temp_id_barang = $row["id_barang"];
                    $result_barang = mysqli_query($conn, "SELECT * from barang WHERE id_barang=$temp_id_barang");
                    $row_barang = mysqli_fetch_assoc($result_barang);
                    $tempBerat = $tempBerat + ($row_barang["berat_barang"] * $row["jumlah_barang"]) ;

                    // fot total all product price
                    $tempJumlah = $tempJumlah + $row["harga_barang"];
                }
                
                // db for check shipping charges
                $result_postal = mysqli_query($conn, "SELECT * from ongkir WHERE kodepos_tujuan=$postal_code");
                $row_postal = mysqli_fetch_assoc($result_postal);
                if($row_postal != null){
                    $shipping_charges = $row_postal["ongkir_per_kg"];
                }
                // belum ada action kalo misal postalcode gada di db

                // check pembulatan
                $whole = floor($tempBerat);      // whole = 5
                $fraction = $tempBerat - $whole; // fraction = .7

                if($fraction <= 0.3){
                    $tempBerat = $whole;
                }else{
                    $tempBerat = $whole + 1;
                }

                $total_shipping_charges = $shipping_charges * $tempBerat;

            ?>

            <div class="container">
                <!-- ORDER ID -->
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <h5 class="h5-custom"><b>Order ID : <?php echo $id_penjualan; ?></b></h5>
                    </div>
                </div>
                <!-- CUSTOMER DETAILS -->
                <div class="row mt-3">
                    <div class="col-lg-12">
                        <p class="p-custom"><b>Customer Details</b></p>    
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <p class="p-custom">Name</p>
                        <p class="p-custom">Address</p>
                        <p class="p-custom">Phone Number</p>
                        <p class="p-custom">Postal Code</p>
                    </div>
                    <div class="col-lg-8">
                        <p class="p-custom"><?php echo $nama; ?></p>
                        <p class="p-custom"><?php echo $alamat; ?></p>
                        <p class="p-custom"><?php echo $phone; ?></p>
                        <p class="p-custom"><?php echo $postal_code; ?></p>
                    </div>
                </div>
                <!-- ORDER DETAILS -->
                <div class="row mt-3">
                    <div class="col-lg-3">
                        <p class="p-custom"><b>Order Time</b></p>
                    </div>
                    <div class="col-lg-3">
                        <p class="p-custom"><b>Total Product Price</b></p>
                    </div>
                    <div class="col-lg-3">
                        <p class="p-custom"><b>Shipping Charges</b></p>
                        </div>
                    <div class="col-lg-3">
                        <p class="p-custom"><b>Total Payment</b></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <p class="p-custom"><?php echo $waktu; ?></p>
                    </div>
                    <div class="col-lg-3">
                        <p class="p-custom"><?php echo $tempJumlah; ?></p>
                    </div>
                    <div class="col-lg-3">
                        <p class="p-custom"><?php echo $total_shipping_charges; ?></p>
                        </div>
                    <div class="col-lg-3">
                        <p class="p-custom"><?php echo $total_shipping_charges + $tempJumlah; ?></p>
                    </div>
                </div>

                <table class="table table-dark mb-3" id="t04">
                    <thead>
                        <tr>
                            <th colspan="7" class="th-detail">Order Details</th>
                        </tr>
                        <tr>
                            <th scope="col" class="th-color">Product Picture</th>
                            <th scope="col" class="th-color">Name</th>
                            <th scope="col" class="th-color">Price per item</th>
                            <th scope="col" class="th-color">Weight per item</th>
                            <th scope="col" class="th-color">Quantity</th>
                            <th scope="col" class="th-color">Subtotal</th>
                            <th scope="col" class="th-color">Subweight</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tempTotalPrice = 0;
                        $tempTotalWeight = 0;
                        $result_jual = mysqli_query($conn, "SELECT * from jual WHERE id_penjualan=$id");
                        while($row = mysqli_fetch_assoc($result_jual)){
                            $temp_id_barang = $row["id_barang"];
                            $result_barang = mysqli_query($conn, "SELECT * from barang WHERE id_barang=$temp_id_barang");
                            $row_barang = mysqli_fetch_assoc($result_barang);
                            $gambar_barang = $row_barang["gambar_barang"];

                            echo "<tr>";
                            echo "<td style='width:10%'>". "<img src='../assets/img/$gambar_barang' class='img-barang' alt='gambar'>" . "</td>";
                            echo "<td class='td-color'>". $row_barang["nama_barang"] . "</td>";
                            echo "<td class='td-color'>" . "Rp. " . $row["harga_barang"] . "</td>";
                            echo "<td class='td-color' style='width:15%'>". $row_barang["berat_barang"] . " kg". "</td>";
                            echo "<td class='td-color' style='width:10%'>". $row["jumlah_barang"] . "</td>";
                            echo "<td class='td-color'>". "Rp. " . $row["harga_barang"]*$row["jumlah_barang"] . "</td>";
                            echo "<td class='td-color'>". $row_barang["berat_barang"]*$row["jumlah_barang"] . " kg". "</td>";
                            echo "</tr>";
                        }
                        mysqli_close($conn);
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="tfooter-custom" style="text-align :right;">Total Product Price   : </td>
                            <td class="tfooter-custom">Rp. <?php echo $tempJumlah ?></td>
                            <td colspan="2" class="tfooter-custom"><?php echo $tempBerat ?> kg</td>
                        </tr>
                        <tr>
                            <td colspan="5" class="tfooter-custom" style="text-align :right;">Shipping Charges   : </td>
                            <td class="tfooter-custom">Rp. <?php echo $total_shipping_charges ?></td>
                            <td colspan="2" class="tfooter-custom">(<?php echo $shipping_charges?> per kg)</td>
                        </tr>
                        <tr>
                            <td colspan="5" class="tfooter-custom" style="text-align :right;">TOTAL   : </td>
                            <td class="tfooter-custom">Rp. <?php echo $total_shipping_charges + $tempJumlah ?></td>
                            <td colspan="2" class="tfooter-custom"></td>
                        </tr>
                    </tfoot>
                </table>
                
        </div>
    </div>
</body>
</html>