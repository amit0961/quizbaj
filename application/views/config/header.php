<?php
$actionURL = uri_string();
$controllerName = $this->uri->segment(1);
$functionName = $this->uri->segment(2);
$fullName = $this->session->userdata('fullName');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title><?=SITE_TITLE?></title>

    <meta name="description" content="blank page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="<?=base_url()?>assets/img/<?=FAVICON?>" type="image/x-icon">

    <!--Basic Styles-->
    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <link id="bootstrap-rtl-link" href="#" rel="stylesheet" />
    <link href="<?=base_url()?>assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/css/weather-icons.min.css" rel="stylesheet" />

    <!--Fonts-->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300"
          rel="stylesheet" type="text/css">

    <!--Beyond styles-->
    <link href="<?=base_url()?>assets/css/beyond.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/css/typicons.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/css/animate.min.css" rel="stylesheet" />
    <link id="skin-link" href="#" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>assets/css/ra.css" rel="stylesheet" />

    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="<?=base_url()?>assets/js/skins.min.js"></script>
</head>
<!-- /Head -->
<!-- Body -->
<body>
    <!-- Loading Container -->
    <div class="loading-container">
        <div class="loader"></div>
    </div>
    <!--  /Loading Container -->
    <!-- Navbar -->
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="navbar-container">
                <!-- Navbar Barnd -->
                <div class="navbar-header pull-left">
                    <a href="#" class="navbar-brand">
                        <small>
                            <img src="<?=base_url()?>assets/img/<?=LOGO_WHITE?>" alt="" />
                        </small>
                    </a>
                </div>
                <!-- /Navbar Barnd -->
                <!-- Sidebar Collapse -->
                <div class="sidebar-collapse" id="sidebar-collapse">
                    <i class="collapse-icon fa fa-bars"></i>
                </div>
                <!-- /Sidebar Collapse -->
                <!-- Account Area and Settings !-->
                <div class="navbar-header pull-right">
                    <div class="navbar-account">
                        <ul class="account-area">

                            <li>
                                <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                    <div class="avatar" title="View your public profile">
                                        <img src="<?=base_url()?>assets/img/avatars/adam-jansen.jpg">
                                    </div>
                                    <section>
                                        <h2><span class="profile"><span> <?=$fullName?></span></span></h2>
                                    </section>
                                </a>
                                <!--Login Area Dropdown-->
                                <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                    <li class="dropdown-footer">
                                        <a href="<?=site_url('login/logout')?>">
                                            Sign out
                                        </a>
                                    </li>
                                </ul>
                                <!--/Login Area Dropdown-->
                            </li>
                            <!-- /Account Area -->
                        </ul>
                    </div>
                </div>
                <!-- /Account Area and Settings -->
            </div>
        </div>
    </div>
    <!-- /Navbar -->
    
    <!-- Main Container -->
    <div class="main-container container-fluid">
        <!-- Page Container -->
        <div class="page-container">
            <!-- Page Sidebar -->
            <div class="page-sidebar" id="sidebar">
                <!-- Sidebar Menu -->

                
                <ul class="nav sidebar-menu">
                    <!--Dashboard-->
                    <li>
                        <a href="<?=site_url('dashboard/index')?>">
                            <i class="menu-icon glyphicon glyphicon-home"></i>
                            <span class="menu-text"> Dashboard</span>
                        </a>
                    </li>

                    <!--Examination-->
                    <?php
                    if($openTag == 'quiz')
                    {
                        echo "<li class='active open'>";
                    }
                    else
                    {
                        echo "<li>";
                    }          
                    ?>                     
                    <!-- <li> -->
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-ticket"></i>
                            <span class="menu-text"> Examination </span>

                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li class="<?=($activeTag == 'subject-list') ? 'active' : '';?>">
                                <a href="<?=site_url('apps/subjects/0')?>">
                                    <span class="menu-text"> Quiz Subject List</span>
                                </a>
                            </li>                            
                            <li class="<?=($activeTag == 'question-list') ? 'active' : '';?>">
                                <a href="<?=site_url('apps/questionBanks/0/0/0')?>">
                                    <span class="menu-text"> Question Bank</span>
                                </a>
                            </li>
                            <li class="<?=($activeTag == 'quiz-result') ? 'active' : '';?>">
                                 <a href="<?=site_url('apps/quizResult')?>">
                                    <span class="menu-text"> Quizs Result</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <!--End Examination-->



                </ul>








                <!-- /Sidebar Menu -->
            </div>
            <!-- /Page Sidebar -->