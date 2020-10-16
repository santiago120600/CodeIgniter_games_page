<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sign Up</title>
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
<!-- ============================================================== -->
<!-- signup form  -->
<!-- ============================================================== -->

<body>
    <!-- ============================================================== -->
    <!-- signup form  -->
    <!-- ============================================================== -->
    <div class="splash-container">
          <!--Error Message Start-->
          <?php if($this->session->flashdata('error_msg_reg')){ ?>
            <div class="alert alert-danger alert-mg-b" role="alert">
                <?=@$this->session->flashdata('error_msg_reg');?>
            </div>
        <?php } ?>
        <!--Error Message End-->
        <div class="card">
            <div class="card-header">
                <h3 class="mb-1">Register</h3>
                <p>It's fast and easy.</p>
            </div>
            <div class="card-body">
                <?=form_open('Register/user_register');?>
                    <div class="form-group">
                        <input class="form-control form-control-lg" type="text" name="user_name" placeholder="Username" autocomplete="off" value="<?=@$current_data['user_name'];?>">
                        <small class="form-text text-danger float-right"><?php echo form_error('user_name'); ?></small>
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" type="email" name="user_email" placeholder="E-mail" autocomplete="off" value="<?=@$current_data['user_email'];?>">
                        <small class="form-text text-danger float-right"><?php echo form_error('user_email'); ?></small>
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="pass1" type="password" placeholder="Password" name="user_pass">
                        <small class="form-text text-danger float-right"><?php echo form_error('user_pass'); ?></small>
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="user_pass_conf" type="password" placeholder="Confirm Password">
                        <small class="form-text text-danger float-right"><?php echo form_error('user_pass_conf'); ?></small>
                    </div>
                    <div class="form-group pt-2">
                        <button class="btn btn-block btn-primary" type="submit">Register</button>
                    </div>
                <?=form_close();?>
            </div>
            <div class="card-footer bg-white">
                <p>Already member? <a href="<?=base_url("Login");?>" class="text-secondary">Login Here.</a></p>
            </div>
        </div>
    </div>
</body>

 
</html>