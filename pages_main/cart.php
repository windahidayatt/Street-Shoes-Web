<html>
<head>
    <style>
        table#t02 tr:nth-child(even) {
            background-color: #343a40;
        }
        table#t02 tr:nth-child(odd) {
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
        .td-delete{
            padding-top:50px !important;
            width:7%;
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
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        if(isset($_SESSION['cart'])){
            if(count($_SESSION['cart']) > 0){
                ?>
                <table class="table table-dark mt-3 mb-3" id="t02">
                    <thead>
                        <tr>
                            <th scope="col" class="th-color">Product Picture</th>
                            <th scope="col" class="th-color">Name</th>
                            <th scope="col" class="th-color">Price per item</th>
                            <th scope="col" class="th-color">Weight per item</th>
                            <th scope="col" class="th-color">Quantity</th>
                            <th scope="col" class="th-color">Subtotal</th>
                            <th scope="col" class="th-color">Subweight</th>
                            <th scope="col" class="th-color">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tempTotalPrice = 0;
                        $tempTotalWeight = 0;
                        foreach($_SESSION['cart'] as $result) {
                            $gambar=$result['gambar'];
                            $id=$result['id'];
                            echo "<tr>";
                            echo "<td style='width:10%'>". "<img src='../assets/img/$gambar' class='img-barang' alt='gambar'>" . "</td>";
                            echo "<td class='td-color'>". $result['nama'] . "</td>";
                            echo "<td class='td-color'>" . "Rp. " . $result['harga'] . "</td>";
                            echo "<td class='td-color' style='width:13%'>". $result['berat'] . " kg". "</td>";
                            echo "<td class='td-color' style='width:10%'>". $result['jumlah'] . "</td>";
                            echo "<td class='td-color'>". "Rp. " . $result['harga']*$result['jumlah'] . "</td>";
                            echo "<td class='td-color'>". $result['berat']*$result['jumlah'] . " kg". "</td>";
                            $tempTotalPrice = $tempTotalPrice + $result['harga']*$result['jumlah'];
                            $tempTotalWeight = $tempTotalWeight + $result['berat']*$result['jumlah'];
                            ?>
                            <form action = '../action_main/delete_cart_item.php?id=<?php echo $id ?>' method="post">
                                <td class="td-delete td-color">
                                    <button class="btn btn-secondary" name='Delete' style='margin:auto; display:block;'>Delete</button>
                                </td>
                            </form>
                            <?php
                            // echo "<td class='td-delete td-color'>" . "<a class='btn btn-secondary' href='delete_cart_item.php?id=$id' role='button'>Delete</a>";
                            echo "</tr>";
                        }
                        // for checking shipping charges so it could be a session bcs it doesn't checked here
                        $_SESSION['totalweight'] = $tempTotalWeight;
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="tfooter-custom" style="text-align :right;">Total   : </td>
                            <td class="tfooter-custom">Rp. <?php echo $tempTotalPrice ?></td>
                            <td colspan="2" class="tfooter-custom"><?php echo $tempTotalWeight ?> kg</td>
                        </tr>
                        <tr>
                            <td colspan="6"></td>
                            <td colspan="2" style="padding-right: 0 !important; padding-left: 0 !important;">
                                <a class="btn btn-secondary btn-lg btn-block" href="../layout_main/layout_main.php?content=<?php echo '../pages_main/form_checkout.php'?>" role="button">Checkout</a>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                <?php
            }else{
                ?>
                <p style="color : #F6B5AC; text-align:center;">Cart is empty!</p>
                <?php
            }
        }else{
            ?>
            <p style="color : #F6B5AC; text-align:center;">Cart is empty!</p>
            <?php
        }
        
    ?>
    
</body>
</html>
