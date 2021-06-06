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
                                <span class="widget-caption"><?=$listTitle?> Total : <?=$total?> Showing <?=$start?> to <?=$end?></span>
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