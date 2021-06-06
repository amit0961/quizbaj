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
                    <div class="widget ra_widgetMarginBody">
                        <div class="widget-header ra_bodyHeaderTitleIcon">
                            <i class="widget-icon fa fa-sun-o blue"></i>
                            <span class="widget-caption"><strong>Advanced Search</strong></span>
                            <div class="widget-buttons">

                                <div class="form-group ra_form-group">
                                    <a href="<?=site_url('apps/addFormQuestion/0/'.$examID.'/'.$campID)?>" class="btn btn-sm btn-maroon shiny">
                                        <i class="fa fa-plus"></i> New Question
                                    </a>
                                    
                                    <a href="<?=site_url('apps/questionImportForm/0/'.$examID.'/'.$campID)?>" class="btn btn-sm btn-purple shiny">
                                        <i class="fa fa-upload"></i> Import Question
                                    </a>

                                    <a href="javascript:void(0);" onclick="javascript:searchResult();"  class="btn btn-sm btn-primary shiny">
                                        <i class="fa fa-search"></i> Search Now
                                    </a>                                    
                                </div>    
                            </div><!--Widget Buttons-->
                        </div><!--Widget Header-->

                        <div class="widget-body">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td align="left" class="ra_SeachTDPaddingRight">
                                    <div class="form-group ra_form-group">
                                        <span class="input-icon">
                                            <input type="text" name="question" id="myInput" class="form-control input-sm" placeholder="Question Title"><i class="fa fa-book blue"></i>
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
                                <span class="widget-caption">Question Bank List Total : <?=$total?> Showing <?=$start?> to <?=$end?></span>
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
                                            <th> Question?</th>
                                            <th width="11%"> Subject</th>
                                            <th width="7%"> Campign</th>
                                             <th width="10%"> Question Date</th>
                                            <th width="11%"> Create Date</th>
                                            <th width="2%" class="ratheadTableBodyCenter">?</th>
                                            <th width="12%" class="ratheadTableBodyCenter"> Action</th>
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
                                    $passid =$row->id;
                                    if($row->status == 1)
                                    $checkActive = "checked='checked'";
                                    else
                                    $checkActive = "";


                                    if($row->status == 1)
                                    {
                                        $statusStr = '<i class="fa fa-check-square blue">';
                                    }
                                    else
                                    {
                                        $statusStr = '<i class="fa fa-square red">';
                                    }
                                    $examName = $this->generallib->getExamSubjectName($row->exam_id);

                            ?>
                                        <tr>
                                            <td class="raTableBodyNR"><i class="fa fa-square-o blue"></i></td>
                                            <td><?=$row->question?></td> 
                                            <td><?=$examName?></td>
                                            <td><?=$row->camp_id?></td>
                                            <td><?=$row->question_date?></td>
                                            <td><?=$row->creationdate?></td>
                                            <td class="raTableBodyNR"><?=$statusStr?></td>
                                            <td class="raTableBodyNR">
                                                <a href="<?=site_url('apps/editQuestionForm/0/'.$row->id)?>" class="btn btn-info btn-xs shiny edit"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="<?=site_url('apps/deleteQuestion/'.$row->id.'/'.$row->exam_id.'/'.$row->camp_id)?>" class="btn btn-danger btn-xs shiny delete" onclick="return confirm('Do you really want to remove this Question?')"><i class="fa fa-trash-o"></i> Delete</a>
                                            </td> 
                                        </tr>                                                                                                                                                        
                            <?php        
                                                                        
                                }
                            }
                            else
                            {
                            ?>
                             <tr>
                                <td colspan="11" align="center" style = "padding:100px;">

                                    <b>No Records Found</b>
                                </td>
                              </tr>
                            <?php
                            }
                            ?> 

                             <tr>
                                <td colspan="11" align="center">
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

        var question=document.getElementById("question").value;
        var campID=document.getElementById("campID").value;
        var examID=document.getElementById("examID").value;
        var limit=document.getElementById("limit").value;
        
        if(question=="")
        question = "NULL";

        if(campID=="")
        campID = 0;

        if(examID=="")
        examID = "NULL";


        var url = "<?=site_url("apps/questionBanksPagination")?>";
        var myRandom = parseInt(Math.random()*99999999); // cache buster
        xmlhttp.onreadystatechange=stateChanged;
        xmlhttp.open("GET", url + "/" + escape(pageNumber) + "/"  + escape(limit) + "/" + escape(question) + "/" + escape(campID) + "/" + escape(examID) + "/" + myRandom, true);
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

        var question=document.getElementById("question").value;
        var campID=document.getElementById("campID").value;
        var examID=document.getElementById("examID").value;
        var limit=document.getElementById("limit").value;
        var startoffset=0;

        if(question=="")
        question = "NULL";

        if(campID=="")
        campID = 0;

        if(examID=="")
        examID = "NULL";

        var url = "<?=site_url("apps/questionBanksPagination")?>";
        var myRandom = parseInt(Math.random()*99999999); // cache buster
        xmlhttp.onreadystatechange=stateChanged;
        xmlhttp.open("GET", url + "/" + escape(startoffset) + "/"  + escape(limit) + "/" + escape(question) + "/" + escape(campID) + "/" + escape(examID) + "/" + myRandom, true);
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