<html>
<body>
    <?php
        $kodepos_pembeli = $_SESSION['customer']['postal'];
                
        include '../assets/conn_db/connect_db_sshoes.php';

        $result = mysqli_query($conn, "SELECT * from ongkir WHERE kodepos_tujuan=$kodepos_pembeli");
        $row = mysqli_fetch_assoc($result);
        if($row != null){
            $shipping_charges = $row["ongkir_per_kg"];
            // $_SESSION['customer']['shipping_charges'] = $row["ongkir_per_kg"];
        }
        // belum ada action kalo misal postalcode gada di db
        mysqli_close($conn);

        $tempTotalWeight = $_SESSION['totalweight']; // e.g. total weight = 5.7
        $n = 1.25;
        $whole = floor($tempTotalWeight);      // whole = 5
        $fraction = $tempTotalWeight - $whole; // fraction = .7

        if($fraction <= 0.3){
            $tempTotalWeight = $whole;
        }else{
            $tempTotalWeight = $whole + 1;
        }

        $_SESSION['shipping_charges_per_kg'] = $shipping_charges;
        $_SESSION['shipping_charges'] = $tempTotalWeight * $shipping_charges;
    ?>
</body>
</html>