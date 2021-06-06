<?php
$this->load->view('config/header');
if($status ==1)
$checkDisable = "checked='checked'";
else
$checkDisable = "";

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
                                data-bv-feedbackicons-validating="glyphicon glyphicon-refresh" action="<?=site_url('client/insertClientPayment')?>">                                
                                <input type='hidden' name='idClient' id='idClient' value='<?= $id; ?>' >
                                <input type='hidden' name='username' id='username' value='<?= $login; ?>' >
                                <input type='hidden' name='clienttype' id='clienttype' value='<?= $clienttype; ?>' >
                                <input type='hidden' name='lastBalance' id='lastBalance' value='<?= $balance; ?>' >
                                <input type='hidden' name='idReseller' id='idReseller' value='<?= $idReseller; ?>' >
                                <input type='hidden' name='resellerLevel' id='resellerLevel' value='<?= $resellerLevel; ?>' >
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
                                                    <label class="col-lg-4 control-label">Reseller Name </label>
                                                    <div class="col-lg-8">
                                                        <select disabled name="resellerInfo" id="resellerInfo" class="form-control input-sm" style="width:100%;">
                                                            <?=$resellerList?>
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
                                                <hr class="wide">

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Amount </label>
                                                    <div class="col-lg-8">
                                                        <input type="text" class="form-control input-sm" name="amount" maxlength="15" value = "<?=$amount?>">
                                                    </div>                                                   
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Payment Type </label>
                                                    <div class="col-lg-8">
                                                        <select name="paymentType" id = "paymentType" class="form-control input-sm">
                                                          <option value="1"> Paid </option>
                                                          <option value="3">Return</option>
                                                        </select>
                                                    </div>                                                   
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Payment Date </label>
                                                    <div class="col-lg-8">
                                                        <input disabled="disabled" type="text" class="form-control input-sm" name="paymentdate" value = "<?=$paymentdate?>">
                                                    </div>                                                   
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Payment Date </label>
                                                    <div class="col-lg-8">
                                                        <input type="text" class="form-control input-sm" name="description" value = "<?=$description?>">
                                                    </div>                                                   
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-lg-offset-4 col-lg-8">
                                                        <input class="btn btn-primary btn-xs" type="submit" value="Insert Payment" />
                                                        <a href="<?=site_url('client/clientList/0/'.$clientTypeString)?>" class="btn btn-darkorange btn-xs"><i class="fa fa-close"></i> Cancel</a>
                                                    </div>
                                                </div>

                                            </div> 
                                        </div>    
                                    </div>


                                    <div class="col-lg-6 col-sm-6 col-xs-12">
                                        <div class="widget radius-bordered">
                                            <div class="widget-header bg-blue">
                                                <span class="widget-caption">Payment History</span>
                                            </div>
                                            <div class="widget-body">
                                                <table class="table table-bordered table-striped table-condensed flip-content">
                                                    <thead class="flip-content bordered-blueberry bordered-raTableThead">
                                                        <tr>
                                                            <th width="2%" class="ratheadTableBodyCenter">NR</th>
                                                            <th width="30%"> Date</th>
                                                            <th width="12%"> Type</th>
                                                            <th width="15%"> Amount</th>
                                                            <th width="39%">Description</th>   
                                                        </tr>
                                                    </thead>
                                                    <tbody class="raTabletbody">
                                                    <?php 
                                                    if(is_array($paymentHistory))
                                                    {
                                                      foreach($paymentHistory as $row)
                                                      {
                                                          if($row->type == 1)
                                                            $paymentTypeSting = "Paid";
                                                          else
                                                            $paymentTypeSting = "Return";
                                                    ?>
                                                          <tr>
                                                              <td class="raTableBodyNR"><i class="fa fa-square-o blue"></i></td>
                                                              <td><?=stripslashes($row->paymentdate)?></td> 
                                                              <td><?=$paymentTypeSting?></td>
                                                              <td><?=stripslashes($row->amount)?></td> 
                                                              <td><?=$row->description?></td>
                                                          </tr>                                                        
                                                    <?php    
                                                      }
                                                    }
                                                    else
                                                    {
                                                    ?>
                                                         <tr>
                                                            <td colspan="11" align="center" style="padding:100px">
                                                                <b>No Payment History Found</b>
                                                            </td>
                                                          </tr>                                                    
                                                    <?php  
                                                    }
                                                    ?>  
                                                </table>      

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

