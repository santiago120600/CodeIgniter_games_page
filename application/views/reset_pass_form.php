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

    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><span class="splash-description">Change password</span></div>
               <!--Error Message Start-->
                <?php if($this->session->flashdata('error_msg_update')){ ?>
                    <div class="alert alert-danger alert-mg-b" role="alert">
                        <?=@$this->session->flashdata('error_msg_update');?>
                    </div>
                <?php } ?>
                <!--Error Message End-->
            <div class="card-body">
                <div class="splash-description mb-2">
                    Hello <?=$email?>, Please enter a new password below to change it.
                </div>
                <?=form_open('Forgot_pass/update_password');?>
                    <?php if (isset($email_hash, $email_code)) {
                        ?>
                            <input type="hidden" value="<?=$email_hash?>" name="email_hash">
                            <input type="hidden" value="<?=$email_code?>" name="email_code">
                            <input type="hidden" value="<?=$email?>" name="email">
                        <?php 
                    }

                    ?>
                    <div class="form-group">
                        <input class="form-control form-control-lg" type="password" placeholder="New Password" name="pass">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg"  type="password" placeholder="Confirm New Password" name="Cpass">
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Update My Password</button>
                <?=form_close();?>
            </div>
        </div>
    </div>
  

</body>
 
</html>