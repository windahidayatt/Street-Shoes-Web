<html>
<head>
    <style>
        table#t03{
            margin-top : 0;
            margin-bottom :0;
        }
        table#t03 tr:nth-child(even) {
            background-color: #343a40;
        }
        table#t03 tr:nth-child(odd) {
            background-color: #343a40;
        }
        .img-barang{
            height : 120px;
            width : 120px;
            border-radius: 8px;
        }
        .tfooter-custom{
            background-color : #F6B5AC !important;
            color : #343a40 !important;
            font-weight : bold;
        }
        .th-color{
            background-color : #343a40 !important;
            color : #F6B5AC !important;
        }
        .td-color{
            color : #F6B5AC !important;
            padding-top : 60px !important;
        }
        .th-detail{
            background-color : #F6B5AC !important;
            color : #343a40 !important;
            text-align : center;
        }
        .td-cust{
            color : #F6B5AC !important;
        }
    </style>
</head>
<body>
    <?php
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        $customer['name'] = $_POST['name'];
        $customer['address'] = $_POST['address'];
        $customer['phone'] = $_POST['phone'];
        $customer['postal'] = $_POST['postal'];

        $_SESSION['customer'] = $customer;
    ?>
    <table class="table table-dark mt-3" id="t03">
        <tr>
            <th colspan="7" class="th-detail">Your Biodata</th>
        </tr>
        <tr>
            <th scope="col" class="th-color">Name</th>
            <td class="td-cust"><?php echo $_SESSION['customer']['name']?></td>
        </tr>
        <tr>
            <th scope="col" class="th-color">Address</th>
            <td class="td-cust"><?php echo $_SESSION['customer']['address']?></td>
        </tr>
        <tr>
            <th scope="col" class="th-color">Phone Number</th>
            <td class="td-cust"><?php echo $_SESSION['customer']['phone']?></td>
        </tr>
        <tr>
            <th scope="col" class="th-color">Postal Code</th>
            <td class="td-cust"><?php echo $_SESSION['customer']['postal']?></td>
        </tr>
    </table>
    <table class="table table-dark mb-3" id="t03">
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
            foreach($_SESSION['cart'] as $result) {
                $gambar=$result['gambar'];
                $id=$result['id'];
                echo "<tr>";
                echo "<td style='width:10%'>". "<img src='img/$gambar' class='img-barang' alt='gambar'>" . "</td>";
                echo "<td class='td-color'>". $result['nama'] . "</td>";
                echo "<td class='td-color'>" . "Rp. " . $result['harga'] . "</td>";
                echo "<td class='td-color' style='width:13%'>". $result['berat'] . " kg". "</td>";
                echo "<td class='td-color' style='width:10%'>". $result['jumlah'] . "</td>";
                echo "<td class='td-color'>". "Rp. " . $result['harga']*$result['jumlah'] . "</td>";
                echo "<td class='td-color'>". $result['berat']*$result['jumlah'] . " kg". "</td>";
                $tempTotalPrice = $tempTotalPrice + $result['harga']*$result['jumlah'];
                $tempTotalWeight = $tempTotalWeight + $result['berat']*$result['jumlah'];
                // echo "<td class='td-delete td-color'>" . "<a class='btn btn-secondary' href='delete_cart_item.php?id=$id' role='button'>Delete</a>";
                echo "</tr>";
            }
            include 'check_shipping_charges.php'
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" class="tfooter-custom" style="text-align :right;">Total Product Price   : </td>
                <td class="tfooter-custom">Rp. <?php echo $tempTotalPrice ?></td>
                <td colspan="2" class="tfooter-custom"><?php echo $_SESSION['totalweight'] ?> kg</td>
            </tr>
            <tr>
                <td colspan="5" class="tfooter-custom" style="text-align :right;">Shipping Charges   : </td>
                <td class="tfooter-custom">Rp. <?php echo $_SESSION['shipping_charges'] ?></td>
                <td colspan="2" class="tfooter-custom">(<?php echo $_SESSION['shipping_charges_per_kg']?> per kg)</td>
            </tr>
            <tr>
                <td colspan="5" class="tfooter-custom" style="text-align :right;">TOTAL   : </td>
                <td class="tfooter-custom">Rp. <?php echo $_SESSION['shipping_charges'] + $tempTotalPrice ?></td>
                <td colspan="2" class="tfooter-custom"></td>
            </tr>
            <tr>
                <td colspan="5"></td>
                <td colspan="2" style="padding-right: 0 !important; padding-left: 0 !important;">
                    <a class="btn btn-secondary btn-lg btn-block" href="template.php?content=<?php echo 'save_checkout.php'?>" role="button">Create Order</a>
                </td>
            </tr>
        </tfoot>
    </table>
</body>
</html>