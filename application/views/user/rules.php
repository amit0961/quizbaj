<?php

$rules = $rules[0]->accessInfo;
$result = $rules->examRules;
//echo "<pre>";print_r($rules);
$i=0;
foreach ($rules->examRules as $key => $val) {
   $i++;
}
$row = $i / 2;

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
                                    <h4 class="page-title">Quiz Rules</h4>
                                </div>
                                
                            </div>
                        </div>
                        <div class="dashboard_top_content">
                            
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="card-box">
                                        <div class="row pt-3 quiz_rules">
                                            <div class="col-lg-5 offset-lg-1">

                                                <?php 
                                                    if(!empty($result)){
                                                        $j=1;
                                                    foreach ($result as $key => $firstrow) {
                                                    if($j < $row+1){
                                                ?>

                                                <div>
                                                    <div class="faq-question-q-box"> <?=$j;?></div>
                                                    <h4 class="faq-question">
                                                        <?=$firstrow;?>
                                                    </h4>     
                                                </div>

                                                <?php $j++;}}} ?>
                                            </div>
                                            <div class="col-lg-5 offset-lg-1">
                                                <?php 
                                                    if(!empty($result)){
                                                        $k=$j;
                                                    foreach ($result as $key => $secendrow) {
                                                    if($k > $row AND $key > $row){
                                                ?>

                                                <div>
                                                    <div class="faq-question-q-box"> <?=$k;?></div>
                                                    <h4 class="faq-question">
                                                        <?=$secendrow;?>
                                                    </h4>     
                                                </div>

                                                <?php $k++;}}} ?>
                                                
                                            </div>
                                        </div>

                                        <!-- end card-body -->
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