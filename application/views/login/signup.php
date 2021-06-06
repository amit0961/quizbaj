
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
        <link rel="shortcut icon" href="<?=base_url();?>assets/images/favicon.ico">

        <!-- App css -->
        <link href="<?=base_url();?>assets/libs/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/css/app.css" rel="stylesheet" type="text/css" />
         <link href="<?=base_url();?>assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/libs/clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/libs/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
 <script type="text/javascript">
            document.addEventListener('contextmenu', event => event.preventDefault());
        </script>
    </head>

    <body class="authentication-bg authentication-bg-pattern" style="background-color: #0c1c57;">

        <div class="account-pages mt-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">
                            <div class="card-body p-4 verify">
                                <div class="login_title">
                                    <h3>Profile info</h3>
                                    <p>Please provide your name, age, gender and an optional profile photo</p>
                                </div>
                                <form action="<?=site_url('login/signup/');?>" method="POST" enctype="multipart/form-data">
                                    <div class="form-group mb-3">
                                        <input class="form-control" type="text" name="full_name" id="emailaddress" required="" placeholder="Full Name">

                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="text" name="date_of_birth" class="form-control" data-provide="datepicker" data-date-autoclose="true" placeholder="Date Of Birth" required >
                                    </div>
                                    <div class="form-group mb-3 upload_profile">
                                       
                                        <input class="form-control" name="photo" type="file" required placeholder="Upload a profile picture">
                                       
                                    </div>
                                    <div class="form-group mb-3 gender_option">
                                        <p>Gender</p>
                                        <input type='radio' id='male' value="Male" checked='checked' name='gender'>
                                        <label for='male'>Male</label>
                                        <input type='radio' value="Female" id='female' name='gender'>
                                        <label for='female'>Female</label>
                                    </div>
                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-danger btn-block" type="submit"> Complete Signup </button>
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
        <script src="<?=base_url();?>assets/js/vendor.min.js"></script>
        <script src="<?=base_url();?>assets/libs/magnific-popup/jquery.magnific-popup.min.js"></script>
        <script src="<?=base_url();?>assets/js/pages/lightbox.init.js"></script>
        <script src="<?=base_url();?>assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
        <script src="<?=base_url();?>assets/libs/clockpicker/bootstrap-clockpicker.min.js"></script>
        <script src="<?=base_url();?>assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
       
    </body>
</html>