<?php
$this->load->view('config/header');
?>

<div id = "loading" style="position:absolute;top:200px;left:530px;width;100px;height:100px; bgcolor:#f2f2f2; border:0px solid #99BBE8;zindex:250;display:none;">
<img src="<?=base_url()?>images/indicator2.gif?>" border="0" />
</div>

            <!-- Page Content -->
            <div class="page-content">
                <!-- /Page Header -->
                <!-- Page Body -->
                <div class="page-body ra_bodyHeader">
                    <div class="widget ra_widgetMarginBody">
                        <div class="widget-header ra_bodyHeaderTitleIcon">
                            <i class="widget-icon fa fa-sun-o blue"></i>
                            <span class="widget-caption"> Account Generation Advanced Search</span>
                            <div class="widget-buttons">
                                <a href="<?=site_url('client/addFormLotsName/0/lt')?>">
                                    <i class="fa fa-plus blue"></i> New Lots
                                </a>
                            </div><!--Widget Buttons-->
                        </div><!--Widget Header-->
                        <div class="widget-body">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td align="left" class="ra_SeachTDPaddingRight">
                                    <div class="form-group ra_form-group">
                                        <span class="input-icon">
                                            <input type="text" name="description" id="description" class="form-control input-sm" placeholder="Lot Description"><i class="fa fa-info-circle blue"></i>
                                          </span>
                                    </div>
                                </td>
   
                                <td align="left" class="ra_SeachTDPaddingRight">
                                    <div class="form-group ra_form-group">
                                        <span class="input-icon">
                                            <select name="idResellerInfo" id="idResellerInfo" class="form-control input-sm" >
                                                <?=$resellerList?>
                                            </select> 
                                          </span>
                                    </div>
                                </td>

                                <td align="left" class="ra_SeachTDPaddingRight">
                                    <div class="form-group ra_form-group">
                                        <span class="input-icon">
                                            <select name="balanceStatus" id = "balanceStatus" class="form-control input-sm">
                                                <option value="NULL">--Client Type--</option>
                                                <option value="<?=SIP_USER?>">Retail Client</option>
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
                                <span class="widget-caption"> Lots Information List Total : <?=$total?> Showing <?=$start?> to <?=$end?></span>
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
                                            <th width="2%">NR</th>
                                            <th width="8%"> Login</th>
                                            <th width="8%"> Password</th>
                                            <th width="15%"> Tariff</th>
                                            <th width="8%" class="numeric"> Balance</th>
                                            <th width="11%"> Parent</th>
                                            <th width="13%"> Account Name</th>
                                            <?php
                                            if($clientType == WHOLESALE_USER)
                                            {
                                            ?>    
                                            <th width="8%"> Phone</th>
                                            <th width="2%" class="ratheadTableBodyCenter">?</th>
                                            <th width="25%" class="ratheadTableBodyCenter">Action</th>
                                            <?php
                                            }
                                            else
                                            {
                                            ?>
                                            <th width="13%"> Last Use</th>
                                            <th width="2%" class="ratheadTableBodyCenter">?</th>
                                            <th width="20%" class="ratheadTableBodyCenter">Action</th>                                            
                                            <?php
                                            }
                                            ?>    
                                        </tr>
                                    </thead>
                                    <tbody class="raTabletbody">
                            <?php
                            $i=1;
                            if(is_array($clientList))
                            {
                                foreach($clientList as $row)
                                {
                                    $passid =$row->id;
                                    if($row->status == 1)
                                    $checkActive = "checked='checked'";
                                    else
                                    $checkActive = "";

                                    $rateName = $this->generallib->getReteName($row->id_rate);
                                    $parentReseller = $this->generallib->getResellerLogin($row->id_reseller,$row->reseller_level);

                                    if($row->reseller_level == -1)
                                    $resellerLevel = "T";
                                    elseif($row->reseller_level == 4)    
                                    $resellerLevel = "IV";
                                    elseif($row->reseller_level == 3)    
                                    $resellerLevel = "III";
                                    elseif($row->reseller_level == 2)    
                                    $resellerLevel = "II";
                                    else
                                    $resellerLevel = "I";    

                                    if($row->status == 1)
                                    {
                                        $statusStr = '<i class="fa fa-check-square blue">';
                                    }
                                    else
                                    {
                                        $statusStr = '<i class="fa fa-square red">';
                                    }

                            ?>
                                        <tr>
                                            <td class="raTableBodyNR"><i class="fa fa-square-o blue"></i></td>
                                            <td><?=stripslashes($row->login)?></td> 
                                            <td><?=$row->password?></td> 
                                            <td><?=$rateName?></td> 
                                            <td class="numeric"><?=number_format($row->balance, 2, '.', '')?></td> 
                                            <td><?=$parentReseller?> <i class="fa fa-info-circle blue"></i> <?=$resellerLevel?></td> 
                                            <td><?=$row->full_name?></td> 
                                            <?php
                                            if($clientType == WHOLESALE_USER)
                                            {
                                            ?>                                            
                                            <td></td>
                                            <td class="raTableBodyNR"><?=$statusStr?></td>
                                            <td class="raTableBodyNR">  
                                                <a href="<?=site_url('client/clientIPaddressInfo/0/'.$row->id.'/'.$clientTypeString)?>" class="btn btn-primary btn-xs"><i class="fa fa-server"></i> IP Info</a>
                                                <a href="<?=site_url('client/showPaymentForm/0/'.$row->id.'/'.$clientTypeString)?>" class="btn btn-darkorange btn-xs edit"><i class="fa fa-money"></i> Payment</a>
                                                <a href="<?=site_url('client/clientEditForm/0/'.$row->id.'/'.$clientTypeString)?>" class="btn btn-info btn-xs edit"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="<?=site_url('client/deleteClientsAccounts/'.$row->id.'/'.$clientTypeString)?>" class="btn btn-danger btn-xs delete" onclick="return confirm('Do you really want to remove this Client ?')"><i class="fa fa-trash-o"></i> Del</a>
                                            </td>                                              
                                            <?php
                                            }
                                            else
                                            {
                                            ?>
                                            <td><?=$row->lastuse?></td>
                                            <td class="raTableBodyNR"><?=$statusStr?></td>
                                            <td class="raTableBodyNR">  
                                                <a href="<?=site_url('client/showPaymentForm/0/'.$row->id.'/'.$clientTypeString)?>" class="btn btn-darkorange btn-xs edit"><i class="fa fa-money"></i> Payment</a>
                                                <a href="<?=site_url('client/clientEditForm/0/'.$row->id.'/'.$clientTypeString)?>" class="btn btn-info btn-xs edit"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="<?=site_url('client/deleteClientsAccounts/'.$row->id.'/'.$clientTypeString)?>" class="btn btn-danger btn-xs delete" onclick="return confirm('Do you really want to remove this Client?')"><i class="fa fa-trash-o"></i> Delete</a>
                                            </td>                                             
                                            <?php
                                            }
                                            ?>
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
                                <input type="hidden" name="ipAddress" id="ipAddress" value="<?=$ipAddress?>" />
                                <input type="hidden" name="idRate" id="idRate" value="<?=$idRate?>" />
                                <input type="hidden" name="idResellerInfo" id="idResellerInfo" value="<?=$idResellerInfo?>" />
                                <input type="hidden" name="login" id="login" value="<?=$login?>" />
                                <input type="hidden" name="fullName" id="fullName" value="<?=$fullName?>" />
                                <input type="hidden" name="idLots" id="idLots" value="<?=$idLots?>" />
                                <input type="hidden" name="clientTypeString" id="clientTypeString" value="<?=$clientTypeString?>" />
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

        var login=document.getElementById("login").value;
        var fullName=document.getElementById("fullName").value;
        var idLots=document.getElementById("idLots").value;
        var ipAddress=document.getElementById("ipAddress").value;
        var idRate=document.getElementById("idRate").value;
        var idResellerInfo=document.getElementById("idResellerInfo").value;
        var clientTypeString=document.getElementById("clientTypeString").value;
        var limit=document.getElementById("limit").value;
        
        if(login=="")
        login = "NULL";

        if(fullName=="")
        fullName = "NULL";

        if(idLots=="")
        idLots = "NULL";

        if(ipAddress=="")
        ipAddress = "NULL";

        if(idRate=="")
        idRate = "NULL";

        if(idResellerInfo=="")
        idResellerInfo = "NULL";

        var url = "<?=site_url("client/clientListPagination")?>";
        var myRandom = parseInt(Math.random()*99999999); // cache buster
        xmlhttp.onreadystatechange=stateChanged;
        xmlhttp.open("GET", url + "/" + escape(pageNumber) + "/"  + escape(limit) + "/" + escape(login) + "/" + escape(fullName) + "/" + escape(idLots) + "/" + escape(ipAddress) + "/" + escape(idRate) + "/" + escape(idResellerInfo) + "/" + escape(clientTypeString) + "/" + myRandom, true);
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


        var login=document.getElementById("login").value;
        var fullName=document.getElementById("fullName").value;
        var idLots=document.getElementById("idLots").value;
        var ipAddress=document.getElementById("ipAddress").value;
        var idRate=document.getElementById("idRate").value;
        var idResellerInfo=document.getElementById("idResellerInfo").value;
        var clientTypeString=document.getElementById("clientTypeString").value;
        var limit=document.getElementById("limit").value;
        var startoffset=0;

        if(login=="")
        login = "NULL";

        if(fullName=="")
        fullName = "NULL";

        if(idLots=="")
        idLots = "NULL";

        if(ipAddress=="")
        ipAddress = "NULL";

        if(idRate=="")
        idRate = "NULL";

        if(idResellerInfo=="")
        idResellerInfo = "NULL";

        
        var url = "<?=site_url("client/clientListPagination")?>";
        var myRandom = parseInt(Math.random()*99999999); // cache buster
        xmlhttp.onreadystatechange=stateChanged;
        xmlhttp.open("GET", url + "/" + escape(startoffset) + "/"  + escape(limit) + "/" + escape(login) + "/" + escape(fullName) + "/" + escape(idLots) + "/" + escape(ipAddress) + "/" + escape(idRate) + "/" + escape(idResellerInfo) + "/" + escape(clientTypeString) + "/" + myRandom, true);
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