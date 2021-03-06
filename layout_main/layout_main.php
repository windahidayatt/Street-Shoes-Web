<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
    body{
        overflow-y: scroll;
    }
    body::-webkit-scrollbar {
        display: none;
    }
    table, th, td , tr{
        border-collapse: collapse;
    }
    th,td,tr{
        padding : 15px 30px;
    }
    table#t01 tr:nth-child(even) {
        background-color: #F6B5AC;
    }
    table#t01 tr:nth-child(odd) {
        background-color: #343a40;
    }
    table#t01 th {
    background-color: #F6B5AC;
    color: black;
    }
    .navigation a{
        padding-right : 15px;
        font-size : 14pt;
    }
    .navigation a:link{
        color: #555e67;
        background-color: transparent;
    }
    .navigation a:visited{
        color: #555e67;
        background-color: transparent;
    }
    .navigation a:hover{
        color: #343a40 !important;
        background-color: transparent;
    }
    .navigation a:active{
        color: #343a40;
        background-color: transparent;
        text-decoration: underline;
    }
</style>
</head>
    <body style="margin:0">
        <?php
        if(!isset($_GET['content']))
        {
            $vcontent='../pages_main/home.php';
        }
        else
        {
            $vcontent=$_GET['content'];
        }
        ?>
        
        <table width=100% id="t01" align = "center">
            <tr
                height="100">
                <td>
                <!-- <img src="logo_polban.png" alt="Logo Polban" height="100"> -->
                <img src="../assets/img/logo_sepatu2.png" alt="Street Shoes Logo" height="100" style="padding-left:33%">
                </td>
            </tr>
            <tr
                height="50" align = "center">
                <td class="navigation">
                    <a href="layout_main.php?content=<?php echo '../pages_main/home.php'?>" class="active" role="button">Home</a>
                    <a href="layout_main.php?content=<?php echo '../pages_main/cart.php'?>">Cart</a>

                    <?php
                        session_start();
                        if(isset($_SESSION['status_pembeli'])){
                            if($_SESSION['status_pembeli'] == "login"){
                            ?>
                                <a href="../action_main/logout_cust.php">Logout</a>
                            <?php   
                            }
                        }else{
                            ?>
                                <a href="layout_main.php?content=<?php echo '../pages_main/login_cust.php'?>">Login</a>
                            <?php
                        }
                    ?>
                </td>
            </tr>
            <tr
                height="390">
                <td><h1><?php include $vcontent; ?></h1></td>
            </tr>
            <tr
                height="100">
                <td align = "center">
                    <p style="margin-bottom : 0"> © Copyright Win 2020</p>
                </td>
            </tr>
        </table>
    </body>
</html>