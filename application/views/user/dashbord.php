<?php

$result = $info[0];
$examsSummary = $info[0]->accessInfo->examsSummary;
$usersInfo = $info[0]->accessInfo->usersInfo;

//echo '<pre>';print_r($result);exit();

$this->load->view('confignew/header');
?>
<?php echo $this->session->flashdata('success'); ?>
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    <?php if($result->code == 0){ ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title" style="color: red">No data avaible right now!</h4>
                                </div>
                            </div>
                        </div>
                    <?php }else{ ?>
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Dashboard</h4>
                                </div>
                                <div class="quiz_now">
                                    <a class="btn btn-danger" href="<?=site_url('user/subject');?>">Play quiz now</a>
                                </div>
                            </div>
                        </div>
                        <div class="dashboard_top_content">
                            
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="card cta-box bg-info text-white">
                                        <div class="card-body">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                    <div class="avatar-md bg-soft-light rounded-circle text-center mb-2">
                                                        <i class="mdi mdi-file font-22 avatar-title text-white"></i>
                                                    </div>
                                                    <div class="media_body_content">
                                                        <h1><?=$usersInfo->earnPoints;?></h1>
                                                        <p>Quiz Point</p>
                                                    </div>
                                                   
                                                </div>
                                                <img class="ml-3" src="<?=base_url();?>assets/images/update.svg" width="120" alt="Generic placeholder image">
                                            </div>
                                        </div>
                                        <!-- end card-body -->
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="card cta-box bg-info text-white bg-warning">
                                        <div class="card-body">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                    <div class="avatar-md bg-soft-light rounded-circle text-center mb-2">
                                                        <i class="mdi mdi-store font-22 avatar-title text-white"></i>
                                                    </div>
                                                    <div class="media_body_content">
                                                        <h1>
                                                            <?php 
                                                                if($usersInfo->earnPoints == 0){
                                                                    echo "0";
                                                                }else{
                                                                    echo $usersInfo->positions;
                                                                }
                                                            ?>
                                                                th
                                                        </h1>
                                                        <p>Leaderboard</p>
                                                    </div>
                                                </div>
                                                <img class="ml-3" src="<?=base_url();?>assets/images/update.svg" width="120" alt="Generic placeholder image">
                                            </div>
                                        </div>
                                        <!-- end card-body -->
                                    </div>
                                </div>
                                
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <div class="recent_result">
                            <h4>Recent Result</h4>
                            <!-- <a class="btn btn-outline-info waves-effect waves-light" href="<?=site_url('user/all_exam_list');?>">View All</a> -->
                            <div class="clearfix"></div>
                        </div> 
                        <div class="row">

                            <?php 
                                $i=1;
                                foreach ($examsSummary as $key => $exam_val) {
                            ?>

                            <div class="col-xl-3 col-md-6">
                                <div class="card-box" style="background-color: #442E98;">
                                    <h4 class="header-title mt-0 mb-2"><?=$exam_val->ExamName;?></h4>
                                    <div class="mt-1">
                                        <div class="float-left" dir="ltr">

                                            <?php if($i == 1){ ?>

                                            <input data-plugin="knob" data-width="60" data-height="60" data-fgColor="#21c2aa "
                                                data-bgColor="#48525e" value="<?php
                                                $correctAvg =  ($exam_val->correct * 100) / $exam_val->questions; 
                                                echo $correctAvg;
                                                ?>%"
                                                data-skin="tron" data-angleOffset="180" data-readOnly=true
                                                data-thickness=".15"/>
                                            <?php }elseif($i == 2){ ?>
                                            <input data-plugin="knob" data-width="60" data-height="60" data-fgColor="#f3bf5e "
                                            data-bgColor="#48525e" value="<?php
                                                $correctAvg =  ($exam_val->correct * 100) / $exam_val->questions; 
                                                echo $correctAvg;
                                                ?>%"
                                            data-skin="tron" data-angleOffset="180" data-readOnly=true
                                            data-thickness=".15"/>
                                            <?php }elseif($i == 3){ ?>
                                            <input data-plugin="knob" data-width="60" data-height="60" data-fgColor="#ed6162 "
                                            data-bgColor="#48525e" value="<?php
                                                $correctAvg =  ($exam_val->correct * 100) / $exam_val->questions; 
                                                echo $correctAvg;
                                                ?>%"
                                            data-skin="tron" data-angleOffset="180" data-readOnly=true
                                            data-thickness=".15"/>
                                            <?php }elseif($i == 4){ ?>
                                            <input data-plugin="knob" data-width="60" data-height="60" data-fgColor="#3b9eea "
                                            data-bgColor="#48525e" value="<?php
                                                $correctAvg =  ($exam_val->correct * 100) / $exam_val->questions; 
                                                echo $correctAvg;
                                                ?>%"
                                            data-skin="tron" data-angleOffset="180" data-readOnly=true
                                            data-thickness=".15"/>
                                            <?php }elseif($i == 5){ ?>
                                            <input data-plugin="knob" data-width="60" data-height="60" data-fgColor="#887bed "
                                            data-bgColor="#48525e" value="<?php
                                                $correctAvg =  ($exam_val->correct * 100) / $exam_val->questions; 
                                                echo $correctAvg;
                                                ?>%"
                                            data-skin="tron" data-angleOffset="180" data-readOnly=true
                                            data-thickness=".15"/>
                                            <?php }elseif($i == 6){ ?>
                                            <input data-plugin="knob" data-width="60" data-height="60" data-fgColor="#ee62a6 "
                                            data-bgColor="#48525e" value="<?php
                                                $correctAvg =  ($exam_val->correct * 100) / $exam_val->questions; 
                                                echo $correctAvg;
                                                ?>%"
                                            data-skin="tron" data-angleOffset="180" data-readOnly=true
                                            data-thickness=".15"/>
                                            <?php }else{?>
                                            <input data-plugin="knob" data-width="60" data-height="60" data-fgColor="#21c2aa "
                                                data-bgColor="#48525e" value="<?php
                                                $correctAvg =  ($exam_val->correct * 100) / $exam_val->questions; 
                                                echo $correctAvg;
                                                ?>%"
                                                data-skin="tron" data-angleOffset="180" data-readOnly=true
                                                data-thickness=".15"/>
                                            <?php }?>
                                        </div>
                                        <div class="text-right">
                                            <h2 class="mt-3 pt-1 mb-1"> <?=$exam_val->correct;?>/<?=$exam_val->questions;?> </h2>
                                            <p class="text-muted mb-0">Result Status</p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <?php $i++; } ?>


                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container -->

                <?php } ?>

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