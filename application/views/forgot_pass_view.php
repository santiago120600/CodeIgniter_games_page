<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Forgot Password</title>
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
    <!-- forgot password  -->
    <!-- ============================================================== -->
    <div class="splash-container">
         <!--Error Message Start-->
         <?php if($this->session->flashdata('error_msg_forgot')){ ?>
            <div class="alert alert-danger alert-mg-b" role="alert">
                <?=@$this->session->flashdata('error_msg_forgot');?>
            </div>
        <?php } ?>
        <!--Error Message End-->
        <div class="card">
            <div class="card-header text-center"><span class="splash-description">Please enter your user information.</span></div>
            <div class="card-body">
                <?=form_open('Forgot_pass/reset_password');?>
                    <p>Don't worry, we'll send you an email to reset your password.</p>
                    <div class="form-group">
                        <input class="form-control form-control-lg" type="email" name="user_email" placeholder="Your Email" autocomplete="off">
                    </div>
                    <div class="form-group pt-2">
                        <button class="btn btn-block btn-primary btn-xl" type="submit">Reset Password</button>
                    </div>
                <?=form_close();?>
            </div>
            <div class="card-footer text-center">
                <span>Don't have an account? <a href="<?=base_url("Register");?>">Sign Up</a></span>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end forgot password  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>

 
</html>