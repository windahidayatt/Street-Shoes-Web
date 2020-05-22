<html>
<head>
    <style>
        table#t02 tr:nth-child(even) {
            background-color: #343a40;
        }
        table#t02 tr:nth-child(odd) {
            background-color: #343a40;
        }
        table#t02 th {
            background-color: #F6B5AC;
            color: black;
        }
        .img-barang{
            height : 120px;
            width : 120px;
            border-radius: 8px;
        }
        .th-color{
            color : #343a40 !important;
            text-align:center;
        }
        .td-color{
            color : #F6B5AC !important;
            padding-top : 60px !important;
        }
        .td-delete{
            padding-top:50px !important;
            width:7%;
        }
    </style>
</head>
<body>
    <?php
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        if(count($_SESSION['cart']) > 0){
            ?>
            <table class="table table-dark" id="t02">
                    <thead>
                        <tr>
                            <th scope="col" class="th-color">Product Picture</th>
                            <th scope="col" class="th-color">Name</th>
                            <th scope="col" class="th-color">Price</th>
                            <th scope="col" class="th-color">Quantity</th>
                            <th scope="col" class="th-color">Subtotal</th>
                            <th scope="col" class="th-color">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($_SESSION['cart'] as $result) {
                            $gambar=$result['gambar'];
                            $id=$result['id'];
                            echo "<tr>";
                            echo "<td style='width:10%'>". "<img src='img/$gambar' class='img-barang' alt='gambar'>" . "</td>";
                            echo "<td class='td-color'>". $result['nama'] . "</td>";
                            echo "<td class='td-color' style='width:19%'>". $result['harga'] . "</td>";
                            echo "<td class='td-color' style='width:13%; text-align:center;'>". $result['jumlah'] . "</td>";
                            echo "<td class='td-color'>". $result['harga']*$result['jumlah'] . "</td>";
                            ?>
                            <form action = 'delete_cart_item.php?id=<?php echo $id ?>' method="post">
                                <td class="td-delete td-color">
                                    <button class="btn btn-secondary" name='Delete' style='margin:auto; display:block;'>Delete</button>
                                </td>
                            </form>
                            <?php
                            // echo "<td class='td-delete td-color'>" . "<a class='btn btn-secondary' href='delete_cart_item.php?id=$id' role='button'>Delete</a>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
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
