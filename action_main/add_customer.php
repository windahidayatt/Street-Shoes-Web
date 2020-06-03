<html>
<head>
<style>
    .title-custom{
        color : #F6B5AC;
        text-align:center;
    }
    .btn-custom{
        text-align:center;
        margin-left:565px;
    }
</style>
</head>
<body>
    <?php
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $postal = $_POST['postal'];
        $username_pembeli = $_POST['username'];
        $password_pembeli = $_POST['password'];
        
        include '../assets/conn_db/connect_db_sshoes.php';

        $sql = "INSERT INTO pembeli(username_pembeli, password_pembeli, nama_pembeli, alamat_pembeli, no_hp_pembeli, kodepos_pembeli) VALUES ('$username_pembeli', '$password_pembeli', '$name', '$address', '$phone', '$postal')";
        $conn->query($sql);

        $conn->close();
    ?>
    
    <h3 class="title-custom">Register Succes!</h3>
    
    <a class="btn btn-secondary btn-lg btn-custom" href="../layout_main/layout_main.php?content=<?php echo '../pages_main/login_cust.php'?>" role="button">Login</a>

</body>
</html>