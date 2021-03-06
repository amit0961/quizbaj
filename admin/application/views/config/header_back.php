<?php
$actionURL = uri_string();
$controllerName = $this->uri->segment(1);
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
                                        <h2><span class="profile"><span>David Stevenson</span></span></h2>
                                    </section>
                                </a>
                                <!--Login Area Dropdown-->
                                <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                    <li class="username"><a>David Stevenson</a></li>
                                    <li class="email"><a>David.Stevenson@live.com</a></li>
                                    <!--Avatar Area-->
                                    <li>
                                        <div class="avatar-area">
                                            <img src="<?=base_url()?>assets/img/avatars/adam-jansen.jpg" class="avatar">
                                            <span class="caption">Change Photo</span>
                                        </div>
                                    </li>
                                    <!--Avatar Area-->
                                    <li class="edit">
                                        <a href="profile.html" class="pull-left">Profile</a>
                                        <a href="#" class="pull-right">Setting</a>
                                    </li>
                                    <li class="dropdown-footer">
                                        <a href="login.html">
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
                        <a href="index-2.html">
                            <i class="menu-icon glyphicon glyphicon-home"></i>
                            <span class="menu-text"> Dashboard </span>
                        </a>
                    </li>
                    <!--Setting-->
                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-cog"></i>
                            <span class="menu-text"> Setting </span>

                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="#">
                                    <span class="menu-text"> Apps Setting </span>
                                </a>
                            </li>
                            <!-- <li>
                                <a href="t#">
                                    <span class="menu-text"> Division List</span>
                                </a>
                            </li>
                            <li>
                                <a href="t#">
                                    <span class="menu-text"> District List</span>
                                </a>
                            </li>
                            <li>
                                <a href="t#">
                                    <span class="menu-text"> Upazila List</span>
                                </a>
                            </li> -->
                            <li>
                                <a href="t#">
                                    <span class="menu-text"> Training Centers</span>
                                </a>
                            </li>

                            <!-- <li>
                                <a href="t#">
                                    <span class="menu-text"> Offer Courses</span>
                                </a>
                            </li>
                            <li>
                                <a href="t#">
                                    <span class="menu-text"> Students List</span>
                                </a>
                            </li> -->                                                                                   
                        </ul>
                    </li>
                    <!--End Setting-->

                    <!--Course-->
                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-book"></i>
                            <span class="menu-text"> Courses </span>

                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="#">
                                    <span class="menu-text"> New Course </span>
                                </a>
                            </li>
                            <li>
                                <a href="t#">
                                    <span class="menu-text"> All Courses</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!--End Setting-->

                    <!--Batch-->
                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-group"></i>
                            <span class="menu-text"> Batches </span>

                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="#">
                                    <span class="menu-text"> New Batch </span>
                                </a>
                            </li>
                            <li>
                                <a href="t#">
                                    <span class="menu-text"> All Batches</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!--End Batch-->

                    <!--Student-->
                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-graduation-cap"></i>
                            <span class="menu-text"> Students </span>

                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="#">
                                    <span class="menu-text"> New Student</span>
                                </a>
                            </li>
                            <li>
                                <a href="t#">
                                    <span class="menu-text"> All Students</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!--End Student-->

                    <!--Student-->
                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-train"></i>
                            <span class="menu-text"> Instructor </span>

                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="#">
                                    <span class="menu-text"> New Instructor</span>
                                </a>
                            </li>
                            <li>
                                <a href="t#">
                                    <span class="menu-text"> All Instructors</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!--End Student-->

                    <!--Student-->
                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-train"></i>
                            <span class="menu-text"> Routine </span>

                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="#">
                                    <span class="menu-text"> New Routine</span>
                                </a>
                            </li>
                            <li>
                                <a href="t#">
                                    <span class="menu-text"> All Routines</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!--End Student-->



                    <!--Reseller-->
                    <!-- <li class="active open"> -->
                    <?php
                    $actionURLSubstrReseller = substr($actionURL,0,8);
                    $actionURLSubstrResellerList = substr($actionURL,-1);
                    //if(($actionURL == 'reseller/resellerList/0/4') OR ($actionURL == 'reseller/resellerList/0/3') OR ($actionURL == 'reseller/resellerList/0/2') OR ($actionURL == 'reseller/resellerList/0/1'))
                    if($actionURLSubstrReseller == 'reseller')
                    {
                        echo "<li class='active open'>";
                    }
                    else
                    {
                        echo "<li>";
                    }          
                    ?>    

                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-users"></i>
                            <span class="menu-text">Resellers Section</span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">

                            <li class="<?=($actionURLSubstrResellerList == 4) ? 'active' : '';?>">
                                <a href="<?=site_url('reseller/resellerList/0/4')?>">
                                    <span class="menu-text">Resellers IV</span>
                                </a>
                            </li>
                            <li class="<?=($actionURLSubstrResellerList == 3) ? 'active' : '';?>">
                                <a href="<?=site_url('reseller/resellerList/0/3')?>">
                                    <span class="menu-text">Resellers III</span>
                                </a>
                            </li>
                            <li class="<?=($actionURLSubstrResellerList == 2) ? 'active' : '';?>">
                                <a href="<?=site_url('reseller/resellerList/0/2')?>">
                                    <span class="menu-text">Resellers II</span>
                                </a>
                            </li>
                            <li class="<?=($actionURLSubstrResellerList == 1) ? 'active' : '';?>">
                                <a href="<?=site_url('reseller/resellerList/0/1')?>">
                                    <span class="menu-text">Resellers I</span>
                                </a>
                            </li>                                                                                    
                        </ul>
                    </li>

                    <!--Clients-->
                    <?php
                    $actionURLSubstrClient = substr($actionURL,0,6);
                    $actionURLSubstrClientList = substr($actionURL,-2);
                    if($actionURLSubstrClient == 'client')
                    echo "<li class='active open'>";
                    else
                    echo "<li>"; 
                    ?>
                    <!-- <li> -->
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-user"></i>
                            <span class="menu-text">Client Section</span>
                            <i class="menu-expand"></i>
                        </a>

                        <ul class="submenu">
                            <li class="<?=($actionURLSubstrClientList == 'wc') ? 'active' : '';?>">
                                <a href="<?=site_url('client/clientList/0/wc')?>">
                                    <span class="menu-text">Wholesale Clients</span>
                                </a>
                            </li>
                            
                            <li class="<?=($actionURLSubstrClientList == 'rc') ? 'active' : '';?>">
                                <a href="<?=site_url('client/clientList/0/rc')?>">
                                    <span class="menu-text">Retail Clients</span>
                                </a>
                            </li>
                            
                            <li class="<?=($actionURLSubstrClientList == 'lt') ? 'active' : '';?>">
                                <a href="<?=site_url('client/lotsNameList/0/lt')?>">
                                    <span class="menu-text">Account Generation</span>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <span class="menu-text">Voucher Generation</span>
                                </a>
                            </li>
                            
                        </ul>
                    </li>

                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-venus"></i>
                            <span class="menu-text"> Tariffs Section</span>

                            <i class="menu-expand"></i>
                        </a>

                        <ul class="submenu">
                            <li>
                                <a href="#">
                                    <span class="menu-text"> Current Tariff Plan</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="menu-text"> Upcomong Tariff Plan</span>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <span class="menu-text"> Tariff Analysis</span>
                                </a>
                            </li>                            
                        </ul>
                    </li>


                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-random"></i>
                            <span class="menu-text"> Routing Section </span>

                            <i class="menu-expand"></i>
                        </a>

                        <ul class="submenu">
                            <li>
                                <a href="#">
                                    <span class="menu-text"> VoIP Gateway </span>
                                </a>
                            </li>

                            <li>
                                <a href="t#">
                                    <span class="menu-text"> Regular Dial Plan</span>
                                </a>
                            </li>
                            <li>
                                <a href="t#">
                                    <span class="menu-text"> Dial Plan Simulator</span>
                                </a>
                            </li>

                        </ul>
                    </li>


                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-bar-chart-o"></i>
                            <span class="menu-text"> Live Monitoring </span>

                            <i class="menu-expand"></i>
                        </a>

                        <ul class="submenu">
                            <li>
                                <a href="#">
                                    <span class="menu-text"> Current Calls </span>
                                </a>
                            </li>

                            <li>
                                <a href="t#">
                                    <span class="menu-text"> Success Calls</span>
                                </a>
                            </li>

                            <li>
                                <a href="t#">
                                    <span class="menu-text"> Failed Calls</span>
                                </a>
                            </li>

                            <li>
                                <a href="t#">
                                    <span class="menu-text"> Internal Error</span>
                                </a>
                            </li>

                            <li>
                                <a href="t#">
                                    <span class="menu-text"> Critical Alarm</span>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <!--Databoxes-->                                        
                    <li>
                        <a href="databoxes.html">
                            <i class="menu-icon glyphicon glyphicon-tasks"></i>
                            <span class="menu-text"> Data Boxes </span>
                        </a>
                    </li>
                    <!--Widgets-->
                    <li>
                        <a href="widgets.html">
                            <i class="menu-icon fa fa-th"></i>
                            <span class="menu-text"> Widgets </span>
                        </a>
                    </li>
                    <!--UI Elements-->
                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-desktop"></i>
                            <span class="menu-text"> Elements </span>

                            <i class="menu-expand"></i>
                        </a>

                        <ul class="submenu">
                            <li>
                                <a href="elements.html">
                                    <span class="menu-text">Basic Elements</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="menu-dropdown">
                                    <span class="menu-text">
                                        Icons
                                    </span>
                                    <i class="menu-expand"></i>
                                </a>

                                <ul class="submenu">
                                    <li>
                                        <a href="font-awesome.html">
                                            <i class="menu-icon fa fa-rocket"></i>
                                            <span class="menu-text">Font Awesome</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="glyph-icons.html">
                                            <i class="menu-icon glyphicon glyphicon-stats"></i>
                                            <span class="menu-text">Glyph Icons</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="typicon.html">
                                            <i class="menu-icon typcn typcn-location-outline"></i>
                                            <span class="menu-text"> Typicons</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="weather-icons.html">
                                            <i class="menu-icon wi wi-hot"></i>
                                            <span class="menu-text">Weather Icons</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="tabs.html">
                                    <span class="menu-text">Tabs & Accordions</span>
                                </a>
                            </li>
                            <li>
                                <a href="alerts.html">
                                    <span class="menu-text">Alerts & Tooltips</span>
                                </a>
                            </li>
                            <li>
                                <a href="modals.html">
                                    <span class="menu-text">Modals & Wells</span>
                                </a>
                            </li>
                            <li>
                                <a href="buttons.html">
                                    <span class="menu-text">Buttons</span>
                                </a>
                            </li>
                            <li>
                                <a href="nestable-list.html">
                                    <span class="menu-text"> Nestable List</span>
                                </a>
                            </li>
                            <li>
                                <a href="treeview.html">
                                    <span class="menu-text">Treeview</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!--Tables-->
                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-table"></i>
                            <span class="menu-text"> Tables </span>

                            <i class="menu-expand"></i>
                        </a>

                        <ul class="submenu">
                            <li>
                                <a href="tables-simple.html">
                                    <span class="menu-text">Simple & Responsive</span>
                                </a>
                            </li>
                            <li>
                                <a href="tables-data.html">
                                    <span class="menu-text">Data Tables</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!--Forms-->
                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-pencil-square-o"></i>
                            <span class="menu-text"> Forms </span>

                            <i class="menu-expand"></i>
                        </a>

                        <ul class="submenu">
                            <li>
                                <a href="form-layouts.html">
                                    <span class="menu-text">Form Layouts</span>
                                </a>
                            </li>

                            <li>
                                <a href="form-inputs.html">
                                    <span class="menu-text">Form Inputs</span>
                                </a>
                            </li>

                            <li>
                                <a href="form-pickers.html">
                                    <span class="menu-text">Data Pickers</span>
                                </a>
                            </li>
                            <li>
                                <a href="form-wizard.html">
                                    <span class="menu-text">Wizard</span>
                                </a>
                            </li>
                            <li>
                                <a href="form-validation.html">
                                    <span class="menu-text">Validation</span>
                                </a>
                            </li>
                            <li>
                                <a href="form-editors.html">
                                    <span class="menu-text">Editors</span>
                                </a>
                            </li>
                            <li>
                                <a href="form-inputmask.html">
                                    <span class="menu-text">Input Mask</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!--Charts-->
                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-bar-chart-o"></i>
                            <span class="menu-text"> Charts </span>

                            <i class="menu-expand"></i>
                        </a>

                        <ul class="submenu">
                            <li>
                                <a href="flot.html">
                                    <span class="menu-text">Flot Charts</span>
                                </a>
                            </li>

                            <li>
                                <a href="morris.html">
                                    <span class="menu-text"> Morris Charts</span>
                                </a>
                            </li>
                            <li>
                                <a href="sparkline.html">
                                    <span class="menu-text">Sparkline Charts</span>
                                </a>
                            </li>
                            <li>
                                <a href="easypiecharts.html">
                                    <span class="menu-text">Easy Pie Charts</span>
                                </a>
                            </li>
                            <li>
                                <a href="chartjs.html">
                                    <span class="menu-text"> ChartJS</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!--Profile-->
                    <li>
                        <a href="profile.html">
                            <i class="menu-icon fa fa-picture-o"></i>
                            <span class="menu-text">Profile</span>
                        </a>
                    </li>
                    <!--Mail-->
                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-envelope-o"></i>
                            <span class="menu-text"> Mail </span>

                            <i class="menu-expand"></i>
                        </a>

                        <ul class="submenu">
                            <li>
                                <a href="inbox.html">
                                    <span class="menu-text">Inbox</span>
                                </a>
                            </li>

                            <li>
                                <a href="message-view.html">
                                    <span class="menu-text">View Message</span>
                                </a>
                            </li>
                            <li>
                                <a href="message-compose.html">
                                    <span class="menu-text">Compose Message</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!--Calendar-->
                    <li>
                        <a href="calendar.html">
                            <i class="menu-icon fa fa-calendar"></i>
                            <span class="menu-text">
                                Calendar
                            </span>
                        </a>
                    </li>
                    <!--Pages-->
                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon glyphicon glyphicon-paperclip"></i>
                            <span class="menu-text"> Pages </span>

                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="timeline.html">
                                    <span class="menu-text">Timeline</span>
                                </a>
                            </li>
                            <li>
                                <a href="pricing.html">
                                    <span class="menu-text">Pricing Tables</span>
                                </a>
                            </li>

                            <li>
                                <a href="invoice.html">
                                    <span class="menu-text">Invoice</span>
                                </a>
                            </li>

                            <li>
                                <a href="login.html">
                                    <span class="menu-text">Login</span>
                                </a>
                            </li>
                            <li>
                                <a href="register.html">
                                    <span class="menu-text">Register</span>
                                </a>
                            </li>
                            <li>
                                <a href="lock.html">
                                    <span class="menu-text">Lock Screen</span>
                                </a>
                            </li>
                            <li>
                                <a href="typography.html">
                                    <span class="menu-text"> Typography </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!--More Pages-->
                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon glyphicon glyphicon-link"></i>

                            <span class="menu-text">
                                More Pages
                            </span>

                            <i class="menu-expand"></i>
                        </a>

                        <ul class="submenu">
                            <li>
                                <a href="error-404.html">
                                    <span class="menu-text">Error 404</span>
                                </a>
                            </li>

                            <li>
                                <a href="error-500.html">
                                    <span class="menu-text"> Error 500</span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="blank.html">
                                    <span class="menu-text">Blank Page</span>
                                </a>
                            </li>
                            <li>
                                <a href="grid.html">
                                    <span class="menu-text"> Grid</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="menu-dropdown">
                                    <span class="menu-text">
                                        Multi Level Menu
                                    </span>
                                    <i class="menu-expand"></i>
                                </a>

                                <ul class="submenu">
                                    <li>
                                        <a href="#">
                                            <i class="menu-icon fa fa-camera"></i>
                                            <span class="menu-text">Level 3</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="menu-dropdown">
                                            <i class="menu-icon fa fa-asterisk"></i>

                                            <span class="menu-text">
                                                Level 4
                                            </span>
                                            <i class="menu-expand"></i>
                                        </a>

                                        <ul class="submenu">
                                            <li>
                                                <a href="#">
                                                    <i class="menu-icon fa fa-bolt"></i>
                                                    <span class="menu-text">Some Item</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <i class="menu-icon fa fa-bug"></i>
                                                    <span class="menu-text">Another Item</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!--Right to Left-->
                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-align-right"></i>
                            <span class="menu-text"> Right to Left </span>

                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a>
                                    <span class="menu-text">RTL</span>
                                    <label class="pull-right margin-top-10">
                                        <input id="rtl-changer" class="checkbox-slider slider-icon colored-primary" type="checkbox">
                                        <span class="text"></span>
                                    </label>
                                </a>
                            </li>
                            <li>
                                <a href="index-rtl-ar.html">
                                    <span class="menu-text">Arabic Layout</span>
                                </a>
                            </li>

                            <li>
                                <a href="index-rtl-fa.html">
                                    <span class="menu-text">Persian Layout</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="versions.html">
                            <i class="menu-icon glyphicon glyphicon-fire themesecondary"></i>
                            <span class="menu-text">
                                BeyondAdmin Versions
                            </span>
                        </a>
                    </li>
                </ul>
                <!-- /Sidebar Menu -->
            </div>
            <!-- /Page Sidebar -->