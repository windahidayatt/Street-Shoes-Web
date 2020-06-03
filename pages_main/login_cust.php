<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
    .title-custom{
        color : #F6B5AC;
        text-align:center;
    }
    .form-custom{
        background-color : #F6B5AC;
        border-radius:8px;
        padding :40px 40px 0px 40px;
    }
    .p-custom{
        padding-top : 10px;
        padding-bottom : 40px;
        margin-bottom: 0;
        float : right;
    }
    .p-custom a{
        font-size : 12pt;
    }
    .p-custom a:link{
        color: #555e67;
        background-color: transparent;
    }
    .p-custom a:visited{
        color: #555e67;
        background-color: transparent;
    }
    .p-custom a:hover{
        color: #343a40 !important;
        background-color: transparent;
    }
    .p-custom a:active{
        color: #343a40;
        background-color: transparent;
        text-decoration: underline;
    }
    </style>
</head>
<body>

    <?php
        // session_start();
        if(isset($_SESSION['status_pembeli'])){
            if($_SESSION['status_pembeli'] == "login"){
                echo "You are already login, " . $_SESSION['username_pembeli'];    
            }
        }else{
            ?>
            <h3 class="title-custom mt-3">Login as Customer</h3>
            <div class="container">
                <div class="row justify-content-center mb-4 mt-3">
                    <div class="col-lg-6 form-custom">
                        <form action="../action_main/select_login_cust.php" method="post" style="margin-block-end: 0">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Username</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" placeholder="Enter your username" name="username">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Password</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="password" placeholder="Enter your password" name="password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-secondary btn-block mt-4">Login</button>
                        </form>
                        <p class="p-custom"><a href="layout_main.php?content=<?php echo '../pages_main/register_cust.php'?>">Don't have an account? Register now</a></p>
                    </div>
                </div>
            </div>
            <?php
        }
    ?>
    
</body>
</html>