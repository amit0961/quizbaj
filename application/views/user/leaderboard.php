<?php
error_reporting(0);
$result = $leaderboard[0];

$toppoint = $leaderboard[0]->accessInfo->topPoints;
$topPointArray = $leaderboard[0]->accessInfo->topPointArray;
$myPosition = $leaderboard[0]->accessInfo->myPosition;
//echo '<pre>';print_r($leaderboard);exit();

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
                                    <h4 class="page-title">Leaderboard</h4>
                                </div>
                                
                            </div>
                        </div>
                        <div class="dashboard_top_content">
                            
                            <div class="row">
                                <?php 
                                    if(!empty($toppoint)){
                                        $i=1;
                                        foreach ($toppoint as $val_toppoint) {
                                ?>
                                <div class="col-sm-4 col-md-4">
                                    <div class="card text-white bg-info text-xs-center">
                                        <div class="card-body">
                                            <div class=" align-items-center">
                                                <div class="lederboard_lead">
                                                    <span><?=$i;?></span>
                                                    <img style="width: 153px; height: 153px;" class="ml-3"  src="<?=$val_toppoint->image;?>"  alt="Generic placeholder image">
                                                    <h2><?=$val_toppoint->fullName;?></h2>
                                                    <button type="button" class="btn btn-dark waves-effect waves-light"><?=$val_toppoint->point;?> Points</button>
                                                </div>
                                             
                                            </div>
                                        </div>
                                        <!-- end card-body -->
                                    </div>
                                </div>
                                <?php $i++;}} ?>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        
                        <div class="card-box">
                                <ul class="nav nav-tabs nav-bordered nav-justified">
                                    <li class="nav-item">
                                        <a href="#home-b2" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                            Monthly
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#profile-b2" data-toggle="tab" aria-expanded="true" class="nav-link">
                                            All Time
                                        </a>
                                    </li>
                                   
                                </ul>
                                <div class="tab-content monthly_lead">
                                    <div class="tab-pane active" id="home-b2">
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <tbody>
                                                    <?php 
                                                        if(!empty($topPointArray)){
                                                        $j=1;
                                                        $myshowid = 0;
                                                        foreach ($topPointArray as $val_topList) 
                                                        {

                                                        if($j == 1){
                                                            $class="first_lead";
                                                        }elseif ($j == 2) {
                                                            $class="second_lead";
                                                        }elseif ($j == 3) {
                                                            $class="third_lead";
                                                        }else{
                                                             $class="";
                                                        }
                                                    ?>

                                                    <?php
                                                        if($val_topList->userID == $myPosition[0]->userID AND !empty($myPosition)){
                                                        $myshowid = 1;
                                                    ?>

                                                    <tr class="your_position" style="background: #1c2751 !important;">
                                                        <td class="position">Your Position <span><?=$j;?></span></td>
                                                        <td>
                                                            <img style="width: 50px; height: 50px;" class="ml-3" src="<?=$val_topList->image;?>"  alt="Generic placeholder image">
                                                        </td>
                                                        <td><?=$val_topList->fullName;?></td>
                                                       <td>
                                                            <i class="fa fa-crown <?=$class;?>"></i></td>
                                                        <td>
                                                            <button type="button" class="btn btn-info waves-effect waves-light"><?=$val_topList->point;?> Points</button>
                                                        </td>
                                                    </tr>

                                                    <?php }else{ ?>
                                                    <tr>
                                                        <td><?=$j;?></td>
                                                        <td>
                                                            <img style="width: 50px; height: 50px;" class="ml-3" src="<?=$val_topList->image;?>"  alt="Generic placeholder image">
                                                        </td>
                                                        <td><?=$val_topList->fullName;?></td>
                                                        <td>
                                                            <i class="fa fa-crown <?=$class;?>"></i></td>
                                                        <td>
                                                            <button type="button" class="btn btn-info waves-effect waves-light"><?=$val_topList->point;?> Points</button>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>

                                                    <?php 
                                                        if($j == 10){
                                                            break;
                                                        }
                                                    ?>
                                                    

                                                    <?php $j++; }} ?>
                                                    
                                                    <!-- <tr class="your_position">
                                                        <td class="position">Your Position <span>45</span></td>
                                                        <td>
                                                            <img class="ml-3" src="<?=base_url();?>assets/images/leaderboard/1.jpg"  alt="Generic placeholder image">
                                                        </td>
                                                        <td>Foyez Ahmend</td>
                                                        <td><i class="fa fa-crown  third_lead"></i></td>
                                                        <td>
                                                            <button type="button" class="btn btn-info waves-effect waves-light">78 Points</button>
                                                        </td>
                                                    </tr> -->

                                                    <?php if($myshowid == 0 AND !empty($myPosition)){ ?>
                                                    <tr class="your_position" style="background: #1c2751 !important;">
                                                        <td class="position">Your Position <span><?php 
                                                            $myPositionNo = 1 + $myPosition[0]->position;
                                                            echo $myPositionNo;
                                                        ?>
                                                            
                                                        </span></td>
                                                        <td>
                                                            <img style="width: 50px; height: 50px;" class="ml-3" src="<?=$myPosition[0]->image;?>"  alt="Generic placeholder image">
                                                        </td>
                                                        <td><?=$myPosition[0]->fullName;?></td>
                                                        <td><i class="fa fa-crown  third_lead"></i></td>
                                                        <td>
                                                            <button type="button" class="btn btn-info waves-effect waves-light"><?=$myPosition[0]->point;?> Points</button>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="profile-b2">
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <tbody>
                                                    <?php 
                                                        if(!empty($topPointArray)){
                                                        $j=1;
                                                        $myshowid = 0;
                                                        foreach ($topPointArray as $val_topList) 
                                                        {

                                                        if($j == 1){
                                                            $class="first_lead";
                                                        }elseif ($j == 2) {
                                                            $class="second_lead";
                                                        }elseif ($j == 3) {
                                                            $class="third_lead";
                                                        }else{
                                                             $class="";
                                                        }
                                                    ?>

                                                    <?php
                                                        if($val_topList->userID == $myPosition[0]->userID AND !empty($myPosition)){
                                                        $myshowid = 1;
                                                    ?>

                                                    <tr class="your_position" style="background: #1c2751 !important;">
                                                        <td class="position">Your Position <span><?=$j;?></span></td>
                                                        <td>
                                                            <img style="width: 50px; height: 50px;" class="ml-3" src="<?=$val_topList->image;?>"  alt="Generic placeholder image">
                                                        </td>
                                                        <td><?=$val_topList->fullName;?></td>
                                                       <td>
                                                            <i class="fa fa-crown <?=$class;?>"></i></td>
                                                        <td>
                                                            <button type="button" class="btn btn-info waves-effect waves-light"><?=$val_topList->point;?> Points</button>
                                                        </td>
                                                    </tr>

                                                    <?php }else{ ?>
                                                    <tr>
                                                        <td><?=$j;?></td>
                                                        <td>
                                                            <img style="width: 50px; height: 50px;" class="ml-3" src="<?=$val_topList->image;?>"  alt="Generic placeholder image">
                                                        </td>
                                                        <td><?=$val_topList->fullName;?></td>
                                                        <td>
                                                            <i class="fa fa-crown <?=$class;?>"></i></td>
                                                        <td>
                                                            <button type="button" class="btn btn-info waves-effect waves-light"><?=$val_topList->point;?> Points</button>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>

                                                    <?php 
                                                        if($j == 10){
                                                            break;
                                                        }
                                                    ?>
                                                    

                                                    <?php $j++; }} ?>
                                                    
                                                    <!-- <tr class="your_position">
                                                        <td class="position">Your Position <span>45</span></td>
                                                        <td>
                                                            <img class="ml-3" src="<?=base_url();?>assets/images/leaderboard/1.jpg"  alt="Generic placeholder image">
                                                        </td>
                                                        <td>Foyez Ahmend</td>
                                                        <td><i class="fa fa-crown  third_lead"></i></td>
                                                        <td>
                                                            <button type="button" class="btn btn-info waves-effect waves-light">78 Points</button>
                                                        </td>
                                                    </tr> -->

                                                    <?php if($myshowid == 0 AND !empty($myPosition)){ ?>
                                                    <tr class="your_position" style="background: #1c2751 !important;">
                                                        <td class="position">Your Position <span><?php 
                                                            $myPositionNo = 1 + $myPosition[0]->position;
                                                            echo $myPositionNo;
                                                        ?>
                                                            
                                                        </span></td>
                                                        <td>
                                                            <img style="width: 50px; height: 50px;" class="ml-3" src="<?=$myPosition[0]->image;?>"  alt="Generic placeholder image">
                                                        </td>
                                                        <td><?=$myPosition[0]->fullName;?></td>
                                                        <td><i class="fa fa-crown  third_lead"></i></td>
                                                        <td>
                                                            <button type="button" class="btn btn-info waves-effect waves-light"><?=$myPosition[0]->point;?> Points</button>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
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