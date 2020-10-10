<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=base_url("resources/assets/vendor/bootstrap/css/bootstrap.min.css");?>">
    <link href="<?=base_url("resources/assets/vendor/fonts/circular-std/style.css");?>" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url("resources/assets/libs/css/style.css");?>">
    <link rel="stylesheet" href="<?=base_url("resources/assets/vendor/fonts/fontawesome/css/fontawesome-all.css");?>">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
      <!--Error Message Start-->
        <?php if($this->session->flashdata('error_msg')){ ?>
            <div class="alert alert-danger alert-mg-b" role="alert">
                <?=@$this->session->flashdata('error_msg');?>
            </div>
        <?php } ?>
        <!--Error Message End-->
        <div class="card ">
            <div class="card-header text-center"><span class="splash-description">Please enter your user information.</span></div>
            <div class="card-body">
                <?=form_open('login/auth', array('class'=>'user'));?>
                    <div class="form-group">
                        <input class="form-control form-control-lg" type="text" placeholder="Username" name="pEmail" id="username">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="password" type="password" placeholder="Password" name="pPassword">
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                <?=form_close();?>
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Create An Account</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Forgot Password</a>
                </div>
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>