<?php 
$mobile = $info;
///echo "<pre>";print_r($info);exit();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Quiz Buzz</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?=base_url()?>assets/images/favicon.ico">

        <!-- App css -->
        <link href="<?=base_url()?>assets/libs/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/css/app.css" rel="stylesheet" type="text/css" />
 <script type="text/javascript">
            document.addEventListener('contextmenu', event => event.preventDefault());
        </script>
    </head>

    <body class="authentication-bg authentication-bg-pattern" style="background-color: #0c1c57;">

        <div class="account-pages mt-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="text-center m-auto login_logo">
                            <a href="index.html">
                                <span><img src="<?=base_url()?>newassets/img/logo.png" alt="" ></span>
                            </a>
                        </div>
                        <div class="card">
                            <div class="card-body p-4 verify">
                                <div class="login_title">
                                    <h3>Verify +<?=$mobile;?></h3>
                                    <p>Waiting to automatically detect an SMS sent to + <?=$mobile;?>. <a href="<?=site_url('login/index');?>">Edit Number ?</a></p>
                                </div>

                                <?php if(!empty($message)){?>
                                <div class="login_title">
                                    <p style="color: red;"><?=$message;?></p>
                                </div>
                                <?php } ?>

                                <form action="<?=site_url('login/processlogin');?>" method="POST">
                                    <div class="form-group mb-3">
                                        <input class="form-control" type="text" required name="verifyotp" placeholder="- - - - - - - - - - - - -">

                                        <span>Enter 6-digit code</span>
                                    </div>
                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-danger btn-block" type="submit"> Verify </button>
                                    </div>
                                </form>
                                <br>
                                <form action="<?=site_url('login/verify');?>" method="POST" >
                                    <div class="form-group mb-0 text-center">
                                        <input type="hidden" name="phone_number" value="<?=substr($mobile,3);?>">

                                        <button class="btn btn-danger btn-block" type="submit"> Resend SMS </button>
                                    </div>
                                </form>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <!-- Vendor js -->
        <script src="<?=base_url()?>assets/js/vendor.min.js"></script>
        <script src="<?=base_url()?>assets/libs/magnific-popup/jquery.magnific-popup.min.js"></script>
        <script src="<?=base_url()?>assets/js/pages/lightbox.init.js"></script>
        <!-- App js -->
        <script src="<?=base_url()?>assets/js/app.min.js"></script>

       
        
    </body>
</html>