<?php
$result = $subject[0];
$subjectlist = $subject[0]->accessInfo->examsSummary;
//echo "<pre>";print_r($subjectlist);exit();
$this->load->view('confignew/header');
?>
<style type="text/css">
    .completed{
        cursor: pointer;
    }
    .card-box:hover{
        background-color:  #04B750;
    }
</style>
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
                                    <h4 class="page-title">Subject</h4>
                                </div>
                            </div>
                        </div>
                            
                        <!-- end page title --> 

                        <div class="row">
                            <?php 
                                if(!empty($subjectlist)){
                                    foreach ($subjectlist as $key => $val) {
                            ?>
                                <div class="col-xl-4 col-md-6">
                                    <div class="card-box" style="background-color: #442E98;">

                                        <?php 
                                            if($val->isComplete == 1){
                                        ?>

                                        <div class="row completed">
                                            <div class="col-2">
                                                <div class="avatar-sm bg-soft-purple rounded">
                                                    <i class="fe-check avatar-title font-22 text-purple"></i>
                                                </div>
                                            </div>
                                            <div class="col-10">
                                                <div class="text-left">
                                                    <h3 class="text-dark my-1">
                                                        <?=$val->ExamName ;?>  
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>

                                        <?php }else{ 

                                            $userexam = $val->examID . '/'. $val->userExamID .'/'. $val->round;

                                        ?>
                                           <!-- <a href="<?=site_url('user/exam_sheet/'. $userexam);?>"> -->   
					<form method="POST" action="<?=site_url('user/exam_sheet');?>">
                                            <input type="hidden" name="examID" value="<?=$val->examID;?>">
                                            <input type="hidden" name="userExamID" value="<?=$val->userExamID;?>">
                                            <input type="hidden" name="round" value="<?=$val->round;?>">                                     
						<div class="row">
                                            
                                            <div class="col-2">
                                                <div class="avatar-sm bg-soft-purple rounded">
                                                    <i class="fe-book avatar-title font-22 text-purple"></i>
                                                </div>
                                            </div>
                                            <div class="col-10">
                                                <div class="text-left">
                                                    <h3 class="text-dark my-1">
                                                         <button type="submit" style="background: none;border: none !important;text-align: left; color: white;">
                                                        <?=$val->ExamName ;?>
                                                        </button>  
                                                    </h3>
                                                </div>
                                            </div>
                                            
                                        </div>
					 </form>
                                        <!---</a>--->

                                        <?php } ?>


                                    </div>
                                </div><!-- end col -->
                            <?php }} ?>

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

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $(".completed").click(function(){
    alert("Sorry You have to finished all subject First");
  });
});
</script>


<?php
$this->load->view('confignew/footer');
?>