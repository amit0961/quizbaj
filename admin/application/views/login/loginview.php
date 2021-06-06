
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title><?=LOGIN_TITLE?></title>

    <meta name="description" content="login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="<?=base_url()?>assets/img/<?=FAVICON?>" type="image/x-icon">

    <!--Basic Styles-->
    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <link id="bootstrap-rtl-link" href="#" rel="stylesheet" />
    <link href="<?=base_url()?>assets/css/font-awesome.min.css" rel="stylesheet" />

    <!--Fonts-->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300" rel="stylesheet" type="text/css">

    <!--Beyond styles-->
    <link href="<?=base_url()?>assets/css/beyond.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/css/demo.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/css/animate.min.css" rel="stylesheet" />
    <link id="skin-link" href="#" rel="stylesheet" type="text/css" />

    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="<?=base_url()?>assets/js/skins.min.js"></script>
</head>
<!--Head Ends-->
<!--Body-->
<body>
  <form id="container" action="<?= site_url('login/processlogin');?>" method="post">
    <div class="login-container animated fadeInDown">
        <div class="loginbox bg-white">
            <div class="loginbox-title">Administrator Panel</div>
            <div class="loginbox-social">
                <div class="social-title "><?=LOGIN_TITLE?></div>
                <div class="social-buttons">
                    <img src="<?=base_url()?>assets/img/<?=LOGO_IMG?>" alt="Logo">
                </div>
            </div>
            <div class="loginbox-or">
                <div class="or-line"></div>
            </div>
            <div class="loginbox-textbox">
                <input type="text" class="form-control" name="username" placeholder="User name" />
            </div>
            <div class="loginbox-textbox">
                <input type="password" class="form-control" name = "password" placeholder="Password" />
            </div>
            <div class="loginbox-forgot">
                <a href="#">Forgot Password?</a>
            </div>
            <div class="loginbox-submit">
                <input type="submit" class="btn btn-primary btn-block" value="Login">
            </div>
        </div>
    </div>
  </form>

    <!--Basic Scripts-->
    <script src="<?=base_url()?>assets/js/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/js/slimscroll/jquery.slimscroll.min.js"></script>

    <!--Beyond Scripts-->
    <script src="<?=base_url()?>assets/js/beyond.js"></script>

    
</body>
<!--Body Ends-->
</html>
