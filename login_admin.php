<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
    body{
        background-color : #343a40;
        padding-top : 110px;
    }
    .title-custom{
        color : #F6B5AC;
        text-align:center;
    }
    .form-custom{
        background-color : #F6B5AC;
        border-radius:8px;
        padding :40px;
    }
    </style>
</head>
<body>
    <h3 class="title-custom mt-3">Login Admin</h3>
    <div class="container">
        <div class="row justify-content-center mb-4 mt-3">
            <div class="col-lg-6 form-custom">
                <form action="login_admin_check.php" method="post" style="margin-block-end: 0">
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
            </div>
        </div>
    </div>
</body>
</html>