<html>
<head>
    <style>
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
    <h3 class="title-custom mt-3">Register as Customer</h3>
    <div class="container">
        <div class="row justify-content-center mb-4 mt-3">
            <div class="col-lg-6 form-custom">
                <form action="../layout_main/layout_main.php?content=../action_main/add_customer.php" method="post" style="margin-block-end: 0">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Name</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" placeholder="Enter your name" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Address</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" placeholder="Enter your address" name="address">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Phone Number</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" placeholder="Enter your phone number" name="phone">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Postal Code</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" placeholder="Enter your postal code (e.g. 40177)" name="postal">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Username</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" placeholder="Username account (e.g. itsmewinda)" name="username">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="password" placeholder="Password account" name="password">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-secondary btn-block mt-4">Register</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>