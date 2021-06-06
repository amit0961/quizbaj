<?php
error_reporting(0);
$maessage = $massage[0];

//echo "<pre>";print_r($massage);exit();

$this->load->view('confignew/header');
?>
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Get Quiz Help</h4>
                                </div>
                                
                            </div>
                        </div>
                        <div class="dashboard_top_content">
                            
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="card-box">
                                        <div class="card-body p-4 verify quiz_help">
                                            <div class="login_title">
                                                <h3>Tell us what you think about the Quiz Bazz WEB. Also if you have any quesition, Please let us know here.</h3>
                                                <p style="color: cyan; font-size: 22px;"><?php 
                                                    if(!empty($maessage)){
                                                        echo "Your message has been successfully sent!";
                                                    }
                                                ?></p>
                                            </div>
                                            <form method="POST" action="<?=site_url('user/help');?>">
                                                <div class="form-group mb-3">
                                                    <input class="form-control" name="email" type="email" id="emailaddress" required="" placeholder="Email">
                                                    <textarea required name="maessage" class="form-control" placeholder="Message"></textarea>
                                                </div>
                                                <div class="form-group mb-0 text-center">
                                                    <button class="btn btn-danger btn-block" type="submit"> Submit </button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                              
                                
                            </div>
                        </div>     
                        <!-- end page title --> 
                   
                        
                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                2020 &copy; <a href="">Quiz Buzz</a> 
                            </div>
                            
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

<?php
$this->load->view('confignew/footer');
?>