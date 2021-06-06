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
                        <h5> Upazila Information</h5>
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
                            <span class="widget-caption"> Advanced Search</span>
                            <div class="widget-buttons">
                                <a href="<?=site_url('centers/addFormUpazila/0')?>">
                                    <i class="fa fa-plus blue"></i> New Upazila
                                </a>
                            </div><!--Widget Buttons-->
                        </div><!--Widget Header-->
                        <div class="widget-body">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td align="left" class="ra_SeachTDPaddingRight">
                                    <div class="form-group ra_form-group">
                                        <span class="input-icon">
                                            <input type="text" name="description" id="description" class="form-control input-sm" placeholder="Division Name"><i class="fa fa-map-marker blue"></i>
                                          </span>
                                    </div>
                                </td>

                                <td align="left" class="ra_SeachTDPaddingRight">
                                    <div class="form-group ra_form-group">
                                        <span class="input-icon">
                                            <select name="districtID" id="districtID" class="form-control input-sm">
                                                <?=$districtList?>
                                            </select> 
                                          </span>
                                    </div>
                                </td>

                                <td align="left" class="ra_SeachTDPaddingRight">
                                    <div class="form-group ra_form-group">
                                        <div class="buttons-preview ">
                                            <a href="javascript:void(0);" onclick="javascript:searchResult();" class="btn btn-primary shiny"><i class="fa fa-search"></i> Apply Now</a>
                                        </div>
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
                                <span class="widget-caption">Upazila List Total : <?=$total?> Showing <?=$start?> to <?=$end?></span>
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
                                            <th> Upazila Name</th>
                                            <th> District Name</th>
                                            <th> No of Courses</th>
                                            <th width="2%" class="ratheadTableBodyCenter">?</th>
                                            <th width="12%" class="ratheadTableBodyCenter"> Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="raTabletbody">
                            <?php
                            $i=1;
                            //$resellerList = 0;
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

                                    $districtName = $this->generallib->getDistrictName($row->district_id);
                            ?>
                                        <tr>
                                            <td class="raTableBodyNR"><i class="fa fa-square-o blue"></i></td>
                                            <td><?=$row->description?></td>
                                            <td><?=$districtName?></td>  
                                            <td>0</td> 
                                            <td class="raTableBodyNR"><?=$statusStr?></td>
                                            <td class="raTableBodyNR">  
                                                <a href="<?=site_url('centers/editUpazilaForm/0/'.$row->id)?>" class="btn btn-info btn-xs edit"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="<?=site_url('centers/deleteUpazila/'.$row->id)?>" class="btn btn-danger btn-xs delete" onclick="return confirm('Do you really want to remove this Upazila?')"><i class="fa fa-trash-o"></i> Delete</a>
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

        var description=document.getElementById("description").value;
        var districtID=document.getElementById("districtID").value;
        var limit=document.getElementById("limit").value;
        
        if(description=="")
        description = "NULL";

        if(districtID=="")
        districtID = -1;

        var url = "<?=site_url("centers/upazilaListPagination")?>";
        var myRandom = parseInt(Math.random()*99999999); // cache buster
        xmlhttp.onreadystatechange=stateChanged;
        xmlhttp.open("GET", url + "/" + escape(pageNumber) + "/"  + escape(limit) + "/" + escape(description) + "/" + escape(districtID)  + "/" + myRandom, true);
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

        var description=document.getElementById("description").value;
        var districtID=document.getElementById("districtID").value;
        var limit=document.getElementById("limit").value;
        var startoffset=0;

        if(description=="")
        description = "NULL";

        if(districtID=="")
        districtID = -1;
        
        var url = "<?=site_url("centers/upazilaListPagination")?>";
        var myRandom = parseInt(Math.random()*99999999); // cache buster
        xmlhttp.onreadystatechange=stateChanged;
        xmlhttp.open("GET", url + "/" + escape(startoffset) + "/"  + escape(limit) + "/" + escape(description) + "/" + escape(districtID) + "/" + myRandom, true);
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