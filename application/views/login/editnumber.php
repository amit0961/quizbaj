<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Quz Bazz</title>
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

    </head>

    <body class="authentication-bg authentication-bg-pattern"  style="background-color: #0c1c57;">

        <div class="account-pages mt-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="text-center m-auto login_logo">
                            <a href="index.html">
                                <span><img src="<?=base_url()?>assets/images/logo-light.png" alt="" ></span>
                            </a>
                        </div>
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="login_title">
                                    <h3>Sign In</h3>
                                    <p>Signup to access Unlimited Exam also Earn Money to play quiz, Enjoy QuizBazz!</p>
                                </div>
                                <?php 
                                   /* if(!empty($this->session->flashdata('error'))){
                                        echo '<h5 style="color:red">'.$this->session->flashdata('error').'</h5>';
                                    }*/
                                ?>
                                <form action="<?=site_url('login/verify');?>" method="POST">
                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Phone Number</label>
                                        <input class="form-control" name="phone_number" type="text" id="emailaddress" required placeholder="Enter your Number">
                                    </div>
                                    <div class="form-group mb-0 text-center">
                                        <button name="submit" class="btn btn-danger btn-block" type="submit"> Log In </button>
                                    </div>
                                </form>
                                <div class="text-center">
                                    <h5 class="mt-3 text-muted">Or</h5>
                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block popup-modal" type="submit"  href="#test-modal" >
                                            Facebook
                                        </button>
                                        <div id="test-modal" class="mfp-hide white-popup-block">
                                            <h3><i class="fab fa-facebook-f"></i></h3>
                                            <p>To Complete Your Facebook Signup Verify Your Phone Nnmber, Please?</p>
                                            <form action="#">
                                                <div class="form-group mb-3">
                                                    <input class="form-control" type="text" id="emailaddress" required="" placeholder="Phone Number">
                                                </div>
                                                <div class="form-group mb-0 text-center">
                                                    <button class="btn btn-danger btn-block" type="submit"> Submit </button>
                                                </div>
                                            </form>
                                            <p class="mb-0"><a class="popup-modal-dismiss btn btn-sm btn-danger" href="#"><i class="fa fa-times"></i></a></p>
                                        </div>
                                    </div>
                                </div>
                                
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