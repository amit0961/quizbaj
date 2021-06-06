<?php
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
                                    <h4 class="page-title">Final Result</h4>
                                </div>
                                
                            </div>
                        </div>
                        <div class="dashboard_top_content">
                            
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="card cta-box bg-info text-white">
                                        <div class="card-body final_result">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <img class="ml-3" src="assets/images/leaderboard/1.jpg"  alt="Generic placeholder image">
                                                </div>
                                                <div class="col-sm-4">
                                                    <h1>Ekramul Karim</h1>
                                                </div>
                                                <div class="col-sm-5 you_have">
                                                    <p>You have got</p>
                                                    <h2>986</h2>
                                                    <p>Points!</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end card-body -->
                                    </div>
                                </div>
                              
                                
                            </div>
                        </div>     
                        <!-- end page title --> 
                        
                        <div class="row">
                            <div class="col-xl-4 col-md-6">
                                <div class="card-box">
                                    <div class="text-center right_answar">
                                        <h2 class="pt-1 mb-1"> 07 </h2>
                                        <p class="text-muted mb-0">Right Answar</p>
                                    </div>
                                </div>
                            </div><!-- end col -->
                            <div class="col-xl-4 col-md-6">
                                <div class="card-box">
                                    <div class="text-center wrong_answar">
                                        <h2 class="pt-1 mb-1"> 03 </h2>
                                        <p class="text-muted mb-0">Wrong Answar</p>
                                    </div>
                                </div>
                            </div><!-- end col -->
                            <div class="col-xl-4 col-md-6">
                                <div class="card-box">
                                    <div class="text-center  total_question">
                                        <h2 class="pt-1 mb-1"> 10 </h2>
                                        <p class="text-muted mb-0">Total Questions</p>
                                    </div>
                                </div>
                            </div><!-- end col -->
                            <div class="col-xl-4 col-md-6">
                                <div class="card-box">
                                    <div class="text-center total_time">
                                        <h2 class="pt-1 mb-1"> 215 </h2>
                                        <p class="text-muted mb-0">Total Time (sec)</p>
                                    </div>
                                </div>
                            </div><!-- end col -->
                            
                            <div class="col-xl-8 col-md-6">
                                <div class="card-box parcentage_box">
                                    <div class="float-left parcen_prog" dir="ltr">
                                        <input data-plugin="knob" data-width="60" data-height="60" data-fgColor="#21ce25 "
                                            data-bgColor="#48525e" value="70%"
                                            data-skin="tron" data-angleOffset="180" data-readOnly=true
                                            data-thickness=".15"/>
                                    </div>
                                    <div class="parcentage float-left">
                                        <h2 class="pt-1 mb-1"> 74.30 </h2>
                                        <p class="text-muted mb-0">Parcentage</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div><!-- end col -->

                        </div>
                        <!-- end row -->

                        <div class="result_button">
                            <button type="button" class="btn btn-info waves-effect waves-light">Take A New Quiz</button>
                            <button type="button" class="btn btn-purple waves-effect waves-light">View Quiz Answer</button>
                        </div>

                      
                        
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