<?php

$examsSummary = $exam_history[0]->accessInfo;

//echo "<pre>";print_r($examsSummary);exit();

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
                                    <h4 class="page-title">Check Answar</h4>
                                </div>
                            </div>
                        </div>
                            
                        <!-- end page title --> 

                        <div class="row history_content">

                            <?php 
                                if(!empty($examsSummary)){
                                $i=1;
                                foreach ($examsSummary as $key => $val) {

                            ?>

                            <?php if($val->answer == $val->submitAnswer){ ?>

                            <div class="col-xl-6 col-md-6">
                                <div class="card-box">
                                    <h4>Questions: <?=$i;?></h4>
                                    <p><?=$val->question;?>?</p>
                                    <p class="right_ans">Your have selected Right Answer</p>
                                    <div class="alert alert-success  bg-success text-white border-0 fade show" role="alert">

                                        <button type="button" class="close">
                                            <span><i class="fa fa-check-circle"></i></span>
                                        </button>
                                         <?php 
                                            
                                            $rr = 1;
                                            foreach ($val->questionOptions as $rrightval) {
                                                if($rr == $val->answer){
                                                    echo $rrightval->option;
                                                    break;
                                                }
                                                $rr++;
                                            }
                                           
                                        ?>
                                    </div>
                                </div>
                            </div>
                            
                            <?php }else{ ?>

                            <div class="col-xl-6 col-md-6">
                                <div class="card-box">
                                    <h4>Questions: <?=$i;?></h4>
                                    <p><?=$val->question;?>?</p>
                                    <p class="wrong_ans">Your have selected wrong Answer</p>
                                    <div class="alert alert-danger  bg-danger text-white border-0 fade show" role="alert">

                                        <button type="button" class="close">
                                            <span><i class="fa fa-times-circle"></i></span>
                                        </button>
                                        <?php 
                                            
                                            $w = 1;
                                            foreach ($val->questionOptions as $worngval) {
                                                if($w == $val->submitAnswer){
                                                    echo $worngval->option;
                                                    break;
                                                }
                                                $w++;
                                            }
                                            
                                        ?>
                                    </div>
                                    <div class="alert alert-success  bg-success text-white border-0 fade show" role="alert">

                                        <button type="button" class="close">
                                            <span><i class="fa fa-check-circle"></i></span>
                                        </button>
                                        <?php 
                                            
                                            $r = 1;
                                            foreach ($val->questionOptions as $rightval) {
                                                if($r == $val->answer){
                                                    echo $rightval->option;
                                                    break;
                                                }
                                                $r++;
                                            }
                                           
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>


                            <?php $i++; }} ?>


                        </div>
                        <!-- end row -->


                      
                        
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

  
<?php
$this->load->view('confignew/footer');
?>