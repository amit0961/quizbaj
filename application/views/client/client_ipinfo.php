<?php
$this->load->view('config/header');
if($status ==1)
$checkDisable = "checked='checked'";
else
$checkDisable = "";

if($statusIP ==1)
$checkedStatusIP = "checked='checked'";
else
$checkedStatusIP = "";


if($action == 'Add')
$disableStr = "";
else
$disableStr = "disabled";
?>

            <!-- Page Content -->
            <div class="page-content">
                <!-- Page Body -->
                <div class="page-body ra_bodyHeader">
                    <div class="widget ra_widgetMarginBody">
                        <div class="widget-header ra_bodyHeaderTitleIcon">
                            <i class="widget-icon fa fa-sun-o blue"></i>
                            <span class="widget-caption"><?=$pageHeaderTitle?></span>
                            <div class="widget-buttons">
                                <a href="#" data-toggle="collapse">
                                    <i class="fa fa-minus blue"></i>
                                </a>
                            </div><!--Widget Buttons-->
                        </div><!--Widget Header-->
                        <div class="widget-body">
                            <form id="registrationForm" method="post" class="form-horizontal"
                                data-bv-message="This value is not valid"
                                data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
                                data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
                                data-bv-feedbackicons-validating="glyphicon glyphicon-refresh" action="<?=site_url('client/addEditIPAddress')?>">                                
                                <input type='hidden' name='idClient' id='idClient' value='<?= $id; ?>' >
                                <input type='hidden' name='username' id='username' value='<?= $login; ?>' >
                                <input type='hidden' name='idIP' id='idIP' value='<?= $idIP; ?>' >
                                <?php
                                if($action == 'Edit')
                                {
                                ?>
                                <input type='hidden' name='userIPAddress' id='userIPAddress' value='<?= $ipInfo; ?>' >  
                                <?php
                                }
                                ?>  
                                <input type='hidden' name='idIP' id='idIP' value='<?= $idIP; ?>' >
                                <input type='hidden' name='action' id='action' value='<?= $action; ?>' >
                                <input type='hidden' name='clientTypeString' id='clientTypeString' value='<?= $clientTypeString; ?>' >

                                <div class="row">
                                                                   
                                    <div class="col-lg-6 col-sm-6 col-xs-12">
                                        <div class="widget radius-bordered">
                                            <?=$titleErrorMessage?>    
                                            <div class="widget-header bg-blue">
                                                <span class="widget-caption">Account Information</span>
                                            </div>

                                            <div class="widget-body">

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Username</label>
                                                    <div class="col-lg-8">
                                                        <input disabled type="text" class="form-control input-sm" name="username"
                                                               data-bv-message="The username is not valid"
                                                               data-bv-notempty="true"
                                                               data-bv-notempty-message="The username is required and cannot be empty"
                                                               data-bv-regexp="true"
                                                               data-bv-regexp-regexp="[a-zA-Z0-9_\.]+"
                                                               data-bv-regexp-message="The username can only consist of alphabetical, number, dot and underscore"
                                                               data-bv-stringlength="true"
                                                               data-bv-stringlength-min="<?=MIN_USER_NAME_LEN?>"
                                                               data-bv-stringlength-max="<?=MAX_USER_NAME_LEN?>"
                                                               data-bv-stringlength-message="The username must be more than <?=MIN_USER_NAME_LEN?> and less than <?=MAX_USER_NAME_LEN?> characters long"
                                                               data-bv-different="true"
                                                               data-bv-different-field="password"
                                                               data-bv-different-message="The username and password cannot be the same as each other"  value='<?= $login; ?>'/> 
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Password</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" disabled class="form-control input-sm" name="password"
                                                               data-bv-notempty="true"
                                                               data-bv-notempty-message="The password is required and cannot be empty"
                                                               data-bv-regexp="true"
                                                               data-bv-regexp-regexp="[a-zA-Z0-9_\.]+"
                                                               data-bv-regexp-message="The password can only consist of alphabetical, number, dot and underscore"
                                                               data-bv-stringlength="true"
                                                               data-bv-stringlength-min="<?=MIN_PASSWORD_NAME_LEN?>"
                                                               data-bv-stringlength-max="<?=MAX_PASSWORD_NAME_LEN?>"
                                                               data-bv-stringlength-message="The password must be more than <?=MIN_PASSWORD_NAME_LEN?> and less than <?=MAX_PASSWORD_NAME_LEN?> characters long"
                                                               data-bv-different="true"
                                                               data-bv-different-field="username"
                                                               data-bv-different-message="The password cannot be the same as username" value='<?= $password; ?>'/>       
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Reseller Name </label>
                                                    <div class="col-lg-8">
                                                        <select disabled name="resellerInfo" id="resellerInfo" class="form-control input-sm" style="width:100%;">
                                                            <?=$resellerList?>
                                                        </select> 
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Tariff Name </label>
                                                    <div class="col-lg-8">
                                                        <select disabled name="id_rate" id="id_rate" class="form-control input-sm" style="width:100%;">
                                                            <?=$rateList?>
                                                        </select> 
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Current Balance</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" class="form-control input-sm" name="balance" disabled value='<?= $balance; ?>' />
                                                    </div>
                                                </div> 


                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Active? </label>
                                                    <div class="col-lg-8">
                                                        <input disabled class="checkbox-slider toggle yesno" type="checkbox" name="statusClinet" <?=$checkDisable?>>
                                                        <span class="text"></span>
                                                    </div>
                                                </div>

                                            </div> 
                                        </div>    
                                    </div>


                                    <div class="col-lg-6 col-sm-6 col-xs-12">
                                        <div class="widget radius-bordered">
                                            <div class="widget-header bg-blue">
                                                <span class="widget-caption">IP Address Information</span>
                                            </div>
                                            <div class="widget-body">
                                                <table class="table table-bordered table-striped table-condensed flip-content">
                                                    <thead class="flip-content bordered-blueberry bordered-raTableThead">
                                                        <tr>
                                                            <th width="2%" class="ratheadTableBodyCenter">NR</th>
                                                            <th width="36%"> IP Address</th>
                                                            <th width="15%"> Port</th>
                                                            <th width="15%"> Channel</th>
                                                            <th width="2%" class="ratheadTableBodyCenter">?</th>
                                                            <th width="30%" class="ratheadTableBodyCenter">Action</th>   
                                                        </tr>
                                                    </thead>
                                                    <tbody class="raTabletbody">
                                                    <?php 
                                                    if(is_array($ipAddressList))
                                                    {
                                                      foreach($ipAddressList as $row)
                                                      {
                                                        $k=1;
                                                        if($row->status == 1)
                                                        {
                                                            $statusStr = '<i class="fa fa-check-square blue">';
                                                        }
                                                        else
                                                        {
                                                            $statusStr = '<i class="fa fa-square red">';
                                                        }

                                                        if($row->id == $idIP)
                                                        $trClass="warning";
                                                        else
                                                        $trClass="";  
                                                    ?>
                                                          <tr class="<?=$trClass?>">
                                                              <td class="raTableBodyNR"><i class="fa fa-square-o blue"></i></td>
                                                              <td><?=stripslashes($row->ipinfo)?></td> 
                                                              <td><?=stripslashes($row->port)?></td>
                                                              <td><?=stripslashes($row->call_limit)?></td> 
                                                              <td class="raTableBodyNR"><?=$statusStr?></td>
                                                              
                                                              <td class="raTableBodyNR"> 
                                                                  <a href="<?=site_url('client/editClientIPaddressInfo/0/'.$row->id.'/'.$row->id_client.'/'.$clientTypeString)?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                                                  <a href="<?=site_url('client/deleteClientsIP/'.$row->id.'/'.$row->id_client.'/'.$clientTypeString)?>" class="btn btn-danger btn-xs delete" onclick="return confirm('Do you really want to remove this IP Address, IP:<?=$row->ipinfo?> ?')"><i class="fa fa-trash-o"></i> Del</a>
                                                              </td>
                                                          </tr>                                                        
                                                    <?php    
                                                      }
                                                    }
                                                    else
                                                    {
                                                    ?>
                                                         <tr>
                                                            <td colspan="11" align="center" style="padding:30px">
                                                                <b>No IP Address Found</b>
                                                            </td>
                                                          </tr>                                                    
                                                    <?php  
                                                    }
                                                    ?>  
                                                </table>      

                                               <hr class="wide"> 

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">IP Address </label>
                                                    <div class="col-lg-8">
                                                        <input <?=$disableStr?>  type="text" class="form-control input-sm" name="ipInfo" maxlength="15" value = "<?=$ipInfo?>" placeholder="IP Address">
                                                    </div>                                                   
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Port </label>
                                                    <div class="col-lg-8">  
                                                        <input type="text" class="form-control input-sm" name="port" maxlength="6" value = "<?=$port?>" placeholder="Port: 5060">
                                                    </div>                                                   
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Call Limit </label>
                                                    <div class="col-lg-8">
                                                        <input type="text" class="form-control input-sm" name="callLimit" maxlength="3" value = "<?=$callLimit?>" placeholder="Call Limit">
                                                    </div>                                                   
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Active? </label>
                                                    <div class="col-lg-8">
                                                        <input class="checkbox-slider toggle yesno" type="checkbox" name="statusIP" <?=$checkedStatusIP?>>
                                                        <span class="text"></span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-lg-offset-4 col-lg-8">
                                                        <?php
                                                        if($action == 'Add')
                                                        {
                                                        ?>  
                                                        <input class="btn btn-primary btn-xs" type="submit" value="Insert IP Info" />
                                                        <a href="<?=site_url('client/clientList/0/'.$clientTypeString)?>" class="btn btn-darkorange btn-xs"><i class="fa fa-close"></i> Cancel</a>
                                                        <?php
                                                        }
                                                        else
                                                        {
                                                        ?>
                                                        <input class="btn btn-primary btn-xs" type="submit" value="Update IP Info" />
                                                        <a href="<?=site_url('client/clientIPaddressInfo/0/'.$id.'/'.$clientTypeString)?>" class="btn btn-darkorange btn-xs"><i class="fa fa-close"></i> Cancel</a>
                                                        <?php 
                                                        }
                                                        ?>
                                                    </div>
                                                </div>

                                            </div> 
                                        </div>    
                                    </div>

                                </div>    
                            </form>    
                        </div><!--Widget Body-->
                    </div><!--Widget-->

   
 
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

