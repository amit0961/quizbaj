<?php
$this->load->view('config/header');
?>

<div id = "loading" style="position:absolute;top:200px;left:530px;width;100px;height:100px; bgcolor:#f2f2f2; border:0px solid #99BBE8;zindex:250;display:none;">
<img src="<?=base_url()?>images/indicator2.gif?>" border="0" />
</div>

            <!-- Page Content -->
            <div class="page-content">
                <!-- Page Breadcrumb -->
                <!-- <div class="page-breadcrumbs titleMenuRight">
                    <ul class="breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="#">More Pages</a>
                        </li>
                        <li class="active">Blank Page</li>
                    </ul>
                </div> -->
                <!-- /Page Breadcrumb -->
                <!-- Page Header -->
                <div class="page-header position-relative">
                    <div class="header-title">
                        <h5> Question Bank Information</h5>
                    </div>

                    <div class="header-buttons">
                        <a class="sidebar-toggler" href="#">
                            <i class="fa fa-arrows-h"></i>
                        </a>
                        <a class="refresh" id="refresh-toggler" href="#">
                            <i class="glyphicon glyphicon-refresh"></i>
                        </a>
                        <a class="fullscreen" id="fullscreen-toggler" href="#">
                            <i class="glyphicon glyphicon-fullscreen"></i>
                        </a>
                    </div>
                </div> 
                <!-- /Page Header -->
                <!-- Page Body -->
                <div class="page-body ra_bodyHeader">
                    <form action="">
                        <div class="widget ra_widgetMarginBody">
                            <div class="widget-header ra_bodyHeaderTitleIcon">
                                <i class="widget-icon fa fa-sun-o blue"></i>
                                <span class="widget-caption"><strong>Advanced Search</strong></span>
                                <div class="widget-buttons">

                                    <div class="form-group ra_form-group">
                                        <a href="javascript:void(0);" onclick="javascript:searchResult();" class="btn btn-sm btn-primary shiny">
                                            <i class="fa fa-search"></i> Search Now
                                        </a>                                    
                                    </div>    
                                </div><!--Widget Buttons-->
                            </div><!--Widget Header-->

                        <div class="widget-body">
                            <table  width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td align="left" class="ra_SeachTDPaddingRight">
                                    <div class="form-group ra_form-group">
                                        <span class="input-icon">
                                            <input type="text" name="phoneNo" id="myInput"  class="form-control input-sm" placeholder="Search Anything"><i class="fa fa-book blue"></i>
                                          </span>
                                    </div>
                                </td>

                                <td align="left" class="ra_SeachTDPaddingRight">
                                    <div class="form-group ra_form-group">
                                        <select name="examID" id="examID" class="form-control input-sm">
                                            <?=$subjectList?>
                                        </select> 
                                    </div>
                                </td>

                                <td align="left" class="ra_SeachTDPaddingRight">
                                    <div class="form-group ra_form-group">
                                        <select name="campID" id="campID" class="form-control input-sm">
                                            <?=$campaignList?>
                                        </select> 
                                    </div>
                                </td>

                              </tr>  
                            </table>  
                        </div><!--Widget Body-->
                    </div>
                    </form>
                    
                    </div><!--Widget-->
                    <?=$titleErrorMessage?>
                    <div id = "pagination">
                    <?php
                    $start = $startoffset * $limit + 1;
                    $end = ($startoffset +1 )* $limit ;

                    if($total<$start)
                    $start = $total;

                    if($total<=$end)
                    $end = $total;
                    ?>                        
                        <div class="widget">
                            <div class="widget-header ra_bodyHeaderTitleIcon">
                                <i class="widget-icon fa fa-support blue"></i>
                                <span class="widget-caption">Quiz Result List Total : <?=$total?> Showing <?=$start?> to <?=$end?></span>
                                <div class="widget-buttons">
                                    <a href="#" data-toggle="maximize">
                                        <i class="fa fa-expand blue"></i>
                                    </a>
                                    <a href="#" data-toggle="collapse">
                                        <i class="fa fa-minus blue"></i>
                                    </a>
                                </div><!--Widget Buttons-->
                            </div><!--Widget Header-->
                            <div class="widget-body ra_widgetBodyTableData">
                                <table class="table table-bordered table-striped table-condensed flip-content">
                                    <thead class="flip-content bordered-blueberry bordered-raTableThead">
                                        <tr>
                                            <th width="2%"> NR</th>
                                            <th> Phone No</th>
                                            <th> Access Name</th>
                                            <th> Subject</th>
                                            <th> Campign</th>
                                            <th> Exam Date</th>
                                            <th> Times</th>
                                            <th> Result</th>
                                            <th> Points</th>
                                            <th> Round</th>
                                            <th width="2%" class="ratheadTableBodyCenter">?</th>
                                            <th width="8%" class="ratheadTableBodyCenter"> Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="raTabletbody" id="myTable">
                            <?php
                            $i=1;
                            //$queryList = 0;
                            if(is_array($queryList))
                            {
                                foreach($queryList as $row)
                                {
                                    
                                    
                                    $passid =$row->examLogID;
                                    if($row->isComplete == 1)
                                    $checkActive = "checked='checked'";
                                    else
                                    $checkActive = "";


                                    if($row->isComplete == 1)
                                    {
                                        $statusStr = '<i class="fa fa-check-square blue">';
                                    }
                                    else
                                    {
                                        $statusStr = '<i class="fa fa-square red">';
                                    }

                                    $examName = $this->generallib->getExamSubjectName($row->examID);
                                    $attemptTimeStr = strtotime($row->attemptTime);
                                    $submitTime = strtotime($row->submitTime);
                                    $duration = $submitTime - $attemptTimeStr;
                                    $duration = $this->generallib->sec_to_time($duration);


                            ?>
                                        <tr>
                                            <td class="raTableBodyNR"><i class="fa fa-square-o blue"></i></td>
                                            <td><?=$row->phoneNo?></td> 
                                            <td><?=$row->fullName?></td> 
                                            
                                            <td><?=$examName?></td>
                                            <td><?=$row->campID?></td>
                                            <td><?=$row->attemptTime?></td>
                                            <td><?=$duration?></td>
                                            <td><?=$row->questions?>/<?=$row->correct?></td>
                                            <td><?=$row->points?></td>
                                            <td><?=$row->rounds?></td>
                                            <td class="raTableBodyNR"><?=$statusStr?></td>
                                            <td class="raTableBodyNR">
                                                <a disabled="disabled" class="btn btn-info btn-xs shiny edit"><i class="fa fa-edit"></i> View Quiz</a>
                                            </td> 
                                        </tr>                                                                                                                                                        
                            <?php        
                                                                        
                                }
                            }
                            else
                            {
                            ?>
                             <tr>
                                <td colspan="16" align="center" style = "padding:100px;">
                                    <b>No Records Found</b>
                                </td>
                              </tr>
                            <?php
                            }
                            ?> 

                             <tr>
                                <td colspan="15" align="center">
                                <input type="hidden" name="startoffset" id="startoffset" value="<?=$startoffset?>" />
                                <input type="hidden" name="limit" id="limit" value="<?=$limit?>" />
                                <?php
                                    $this->paginationclass->Items($total);
                                    if($startoffset==0)
                                    $startoffset = 1;
                                    $this->paginationclass->limit($limit);
                                    $this->paginationclass->target("paginator.php");
                                    $this->paginationclass->currentPage($startoffset);
                                    $this->paginationclass->adjacents(3);
                                    $this->paginationclass->show();
                                ?>
                                </td>
                              </tr>
                                    </tbody>

                                </table>
                            </div><!--Widget Body-->
                        </div><!--Widget-->
                    </div>    
 
                </div>
                <!-- /Page Body -->
            </div>
            <!-- /Page Content -->
        </div>
        <!-- /Page Container -->
        <!-- Main Container -->



<?php
$this->load->view('config/footer');
?>

<script>

    var xmlhttp;

    function GetXmlHttpObject()
    {
        if (window.XMLHttpRequest)
        {
            return new XMLHttpRequest();
        }
        if (window.ActiveXObject)
        {
            return new ActiveXObject("Microsoft.XMLHTTP");
        }
        return null;
    }



    function dopagination(pageNumber)
    {
        xmlhttp=GetXmlHttpObject();
        if (xmlhttp==null)
        {
            alert ("Browser does not support HTTP Request");
            return;
        }

        document.getElementById("loading").style.display = "block";
        document.getElementById("loading").style.visibility = "visible";

        var phoneNo=document.getElementById("phoneNo").value;
        var campID=document.getElementById("campID").value;
        var examID=document.getElementById("examID").value;
        var limit=document.getElementById("limit").value;
        
        if(phoneNo=="")
        phoneNo = "NULL";

        if(campID=="")
        campID = "NULL";

        if(examID=="")
        examID = "NULL";


        var url = "<?=site_url("apps/quizResultPagination")?>";
        var myRandom = parseInt(Math.random()*99999999); // cache buster
        xmlhttp.onreadystatechange=stateChanged;
        xmlhttp.open("GET", url + "/" + escape(pageNumber) + "/"  + escape(limit) + "/" + escape(phoneNo) + "/" + escape(campID) + "/" + escape(examID) + "/" + myRandom, true);
        xmlhttp.send(null);
    }



    function searchResult()
    {
        xmlhttp=GetXmlHttpObject();
        if (xmlhttp==null)
        {
            alert ("Browser does not support HTTP Request");
            return;
        }

        document.getElementById("loading").style.display = "block";
        document.getElementById("loading").style.visibility = "visible";

        var phoneNo=document.getElementById("phoneNo").value;
        var campID=document.getElementById("campID").value;
        var examID=document.getElementById("examID").value;
        var limit=document.getElementById("limit").value;
        var startoffset=0;

        if(phoneNo=="")
        phoneNo = "NULL";

        if(campID=="")
        campID = "NULL";

        if(examID=="")
        examID = "NULL";

        var url = "<?=site_url("apps/quizResultPagination")?>";
        var myRandom = parseInt(Math.random()*99999999); // cache buster
        xmlhttp.onreadystatechange=stateChanged;
        xmlhttp.open("GET", url + "/" + escape(startoffset) + "/"  + escape(limit) + "/" + escape(phoneNo) + "/" + escape(campID) + "/" + escape(examID) + "/" + myRandom, true);
        xmlhttp.send(null);
    }


    function stateChanged()
    {
        if (xmlhttp.readyState==4)
        {
            rowID = "pagination";
            document.getElementById("loading").style.visibility = "hidden";
            document.getElementById(rowID).innerHTML=xmlhttp.responseText;
        }
    }

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>