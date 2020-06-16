<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url('resources/img/favicon.ico');?>">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url('resources/css/bootstrap.min.css');?>">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url('resources/css/font-awesome.min.css');?>">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url('resources/css/owl.carousel.css');?>">
    <link rel="stylesheet" href="<?=base_url('resources/css/owl.theme.css');?>">
    <link rel="stylesheet" href="<?=base_url('resources/css/owl.transitions.css');?>">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url('resources/css/animate.css');?>">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url('resources/css/normalize.css');?>">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url('resources/css/main.css');?>">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url('resources/css/morrisjs/morris.css');?>">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url('resources/css/scrollbar/jquery.mCustomScrollbar.min.css');?>">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url('resources/css/metisMenu/metisMenu.min.css');?>">
    <link rel="stylesheet" href="<?=base_url('resources/css/metisMenu/metisMenu-vertical.css');?>">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url('resources/css/calendar/fullcalendar.min.css');?>">
    <link rel="stylesheet" href="<?=base_url('resources/css/calendar/fullcalendar.print.min.css');?>">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url('resources/css/form/all-type-forms.css');?>">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url('resources/style.css');?>">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url('resources/css/responsive.css');?>">
    <!-- modernizr JS
		============================================ -->
    <script src="<?=base_url('resources/js/vendor/modernizr-2.8.3.min.js');?>"></script>
</head>

<body>
 
    <div class="color-line"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="back-link back-backend">
                    <!--<a href="index.html" class="btn btn-primary">Back to Dashboard</a>-->
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
      <!--Shit-->
        <!--Error message Start-->
        <div class="row">
            <div class="col-lg-6">
                <?php if ($this->session->flashdata('error_msg')) { ?>
                <div class="text-center">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><?=@$this->session->flashdata('error_msg');?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <!--Error message End-->
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-md-4 col-md-4 col-sm-4 col-xs-12">
                <div class="text-center m-b-md custom-login">
                    <h3>PLEASE LOGIN</h3>
                </div>
                <div class="hpanel">
                    <div class="panel-body">
                        <?=form_open('login/auth', array('class'=>'user'));?>
                        <div class="form-group">
                            <label class="control-label" for="username">Username</label>
                            <input type="text" placeholder="example@gmail.com" title="Please enter you username"
                                required="" value="" name="pEmail" id="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">Password</label>
                            <input type="password" title="Please enter your password" placeholder="******" required=""
                                value="" name="pPassword" id="password" class="form-control">
                        </div>
                        <div class="checkbox login-checkbox">
                            <label>
                                <input type="checkbox" class="i-checks"> Remember me </label>
                        </div>
                        <button type="submit" class="btn btn-success btn-block loginbtn">Login</button>
                        <a class="btn btn-default btn-block" href="#">Register</a>
                        <?=form_close();?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
        </div>
    </div>

    <!-- jquery
		============================================ -->
    <script src="<?=base_url('resources/js/vendor/jquery-1.11.3.min.js');?>"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="<?=base_url('resources/js/bootstrap.min.js');?>"></script>
    <!-- wow JS
		============================================ -->
    <script src="<?=base_url('resources/js/wow.min.js');?>"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="<?=base_url('resources/js/jquery-price-slider.js');?>"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="<?=base_url('resources/js/jquery.meanmenu.js');?>"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="<?=base_url('resources/js/owl.carousel.min.js');?>"></script>
    <!-- sticky JS
		============================================ -->
    <script src="<?=base_url('resources/js/jquery.sticky.js');?>"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="<?=base_url('resources/js/jquery.scrollUp.min.js');?>"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="<?=base_url('resources/js/scrollbar/jquery.mCustomScrollbar.concat.min.js');?>"></script>
    <script src="<?=base_url('resources/js/scrollbar/mCustomScrollbar-active.js');?>"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="<?=base_url('resources/js/metisMenu/metisMenu.min.js');?>"></script>
    <script src="<?=base_url('resources/js/metisMenu/metisMenu-active.js');?>"></script>
    <!-- tab JS
		============================================ -->
    <script src="<?=base_url('resources/js/tab.js');?>"></script>
    <!-- icheck JS
		============================================ -->
    <script src="<?=base_url('resources/js/icheck/icheck.min.js');?>"></script>
    <script src="<?=base_url('resources/js/icheck/icheck-active.js');?>"></script>
    <!-- plugins JS
		============================================ -->
    <script src="<?=base_url('resources/js/plugins.js');?>"></script>
    <!-- main JS
		============================================ -->
    <script src="<?=base_url('resources/js/main.js');?>"></script>
</body>

</html>