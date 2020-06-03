<html>
<head>
    <style>
        table#t04 tr:nth-child(even) {
            background-color: #343a40;
        }
        table#t04 tr:nth-child(odd) {
            background-color: #343a40;
        }
        .img-barang{
            height : 120px;
            width : 120px;
            border-radius: 8px;
        }
        .th-color{
            color : #343a40 !important;
        }
        .td-color{
            color : #F6B5AC !important;
            padding-top : 60px !important;
        }
        .td-update{
            padding-top : 5px !important;
            width:10%;
        }
        .td-detail{
            padding-top : 5px !important;
            padding-left : 25px !important;
            width:10%;
        }
        .tfooter-custom{
            background-color : #F6B5AC !important;
            color : #343a40 !important;
            font-weight : bold;
        }
    </style>
</head>
<body>
    <?php
        include '../assets/conn_db/connect_db_sshoes.php';

        $data = mysqli_query($conn, "SELECT * FROM penjualan");
    
        $cek = mysqli_num_rows($data);
        if($cek > 0)
        if($cek > 0){
        ?>
            <table class="table table-dark mt-3 mb-3" id="t04">
                <thead>
                    <tr>
                        <th scope="col" class="th-color">Order ID</th>
                        <th scope="col" class="th-color">Order Time</th>
                        <th scope="col" class="th-color">Customer Name</th>
                        <th scope="col" class="th-color">Customer Address</th>
                        <th scope="col" class="th-color">Customer Phone</th>
                        <!-- <th scope="col" class="th-color">Customer Postal Code</th> -->
                        <th scope="col" class="th-color">Order Status</th>
                        <th scope="col" class="th-color">Order Action</th>
                        <th scope="col" class="th-color">Order Detail</th>


                    </tr>
                </thead>
                <tbody>
                    <?php
                        $result = mysqli_query($conn, "SELECT * from penjualan");
                    
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            echo "<td>" . $row['id_penjualan'] . "</td>";
                            $id = $row['id_penjualan'];
                            echo "<td>" . $row['tanggal_penjualan'] . "</td>";
                            echo "<td>" . $row['nama_pembeli'] . "</td>";
                            echo "<td>" . $row['alamat_pembeli'] . "</td>";
                            echo "<td>" . $row['no_hp_pembeli'] . "</td>";
                            // echo "<td>" . $row['kodepos_pembeli'] . "</td>";
                            switch($row ['status_penjualan']){
                                case 0 : $tempStatus = "Not Yet Paid"; break;
                                case 1 : $tempStatus = "Already Paid"; break;
                                case 2 : $tempStatus = "Sent"; break;
                            }
                            echo "<td>" . $tempStatus . "</td>";
                            ?>
                                <form action = '../action_admin/update_order_status.php?id=<?php echo $id ?>' method="post">
                                    <td class="td-update td-color">
                                        <button class="btn btn-secondary" name='Update' style='margin:auto; display:block;'>Update</button>
                                    </td>
                                </form>
                                <td class="td-detail">
                                    <a class="btn btn-secondary" href="../layout_admin/layout_admin.php?content=<?php echo '../pages_main/invoice.php&id='. $id?>">Detail</a>
                                </td>
                            <?php
                            echo "</tr>";
                        }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <!-- <td colspan="5" class="tfooter-custom" style="text-align :right;">Total   : </td>
                        <td class="tfooter-custom">Rp. <?php echo $tempTotalPrice ?></td>
                        <td colspan="2" class="tfooter-custom"><?php echo $tempTotalWeight ?> kg</td> -->
                    </tr>
                    <tr>
                        <!-- <td colspan="6"></td>
                        <td colspan="2" style="padding-right: 0 !important; padding-left: 0 !important;">
                            <a class="btn btn-secondary btn-lg btn-block" href="template.php?content=<?php echo 'form_checkout.php'?>" role="button">Checkout</a>
                        </td> -->
                    </tr>
                </tfoot>
            </table>
        <?php
        }else{
            ?>
            <p style="color : #F6B5AC; text-align:center;">Cart is empty!</p>
            <?php
        }
        
    ?>
    
</body>
</html>
