<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
    table, th, td , tr{
    border: 1px solid #D4A594;
    border-collapse: collapse;
    }
    th,td,tr{
        padding : 15px;
    }
    table#t01 tr:nth-child(even) {
        background-color: #F6B5AC;
    }
    table#t01 tr:nth-child(odd) {
        background-color: #343a40;
    }
    table#t01 th {
    background-color: #D4A594;
    color: black;
    }
    .pad-menu{
        padding-right : 15px;
        font-size : 14pt;
    }
    .pad-menu:link{
        color: #555e67;
        background-color: transparent;
    }
    .pad-menu:visited{
        color: #555e67;
        background-color: transparent;
    }
    .pad-menu:hover{
        color: #343a40 !important;
        background-color: transparent;
    }
    .pad-menu:active{
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
            $vcontent='home.php';
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
                <img src="img/logo_sepatu2.png" alt="Street Shoes Logo" height="100" style="padding-left:33%">
                </td>
            </tr>
            <tr
                height="50" align = "center">
                <td>
                <a href="template.php?content=<?php echo 'home.php'?>" class="pad-menu">Home</a>
                <a href="template.php?content=<?php echo 'berita.php'?>" class="pad-menu">Keranjang</a>
                </td>
            </tr>
            <tr
                height="200">
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