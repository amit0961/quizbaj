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
                            <span class="widget-caption"> <?=$description?>'s Details</span>
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
                                data-bv-feedbackicons-validating="glyphicon glyphicon-refresh" enctype="multipart/form-data" 
                                action="<?=site_url('centers/addEditBookingVenue')?>">
                                <input type='hidden' name='id_venue' id='id_venue' value='<?= $id; ?>' >
                                <input type='hidden' name='action' id='action' value='<?= $action; ?>' >
                                <div class="row">

                                    <div class="col-lg-6 col-sm-6 col-xs-12">
                                        <div class="widget radius-bordered">
                                            
                                            <?php
                                            if($errorMesssage < 0)
                                            {
                                            ?>    
                                            <div class="alert alert-warning fade in">
                                                <button class="close" data-dismiss="alert">×</button>
                                                <i class="fa-fw fa fa-warning"></i>
                                                <strong>Warning</strong> <?=$titleErrorMessage?>
                                            </div> 
                                            <?php
                                            }
                                            ?>    
                                            <div class="widget-header bg-blue">
                                                <span class="widget-caption"><?=$description?> Information</span>
                                            </div>

                                            <div class="widget-body">

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label"> Division Name </label>
                                                    <div class="col-lg-6">
                                                        <select name="divisionID" id="divisionID" disabled="disabled" class="form-control input-sm">
                                                            <?=$divisionList?>
                                                        </select> 
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label"> District Name </label>
                                                    <div class="col-lg-6">
                                                        <div id="district">
                                                            <select name="districtID" id="districtID" disabled="disabled" class="form-control input-sm">
                                                                <?=$districtList?>
                                                            </select>
                                                        </div>     
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label"> Upazila Name </label>
                                                    <div class="col-lg-6">
                                                        <div id="upazila">
                                                            <select name="upazilaID" id="upazilaID" disabled="disabled" class="form-control input-sm">
                                                                <?=$upazilaList?>
                                                            </select>
                                                        </div>     
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Venue Name</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control input-sm" name="description" disabled="disabled" value='<?= $description; ?>'/> 
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Active? </label>
                                                    <div class="col-lg-8">
                                                        <input class="checkbox-slider toggle yesno" type="checkbox" name="status" <?=$checkDisable?>>
                                                        <span class="text"></span>
                                                    </div>
                                                </div>


                                            </div> 
                                        </div>    
                                    </div>


                                    <div class="col-lg-6 col-sm-6 col-xs-12">
                                        <div class="widget radius-bordered">
                                            <div class="widget-header bg-blue">
                                                <span class="widget-caption"> Booking Information</span>
                                            </div>
                                            <div class="widget-body">

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Start Date</label>
                                                    <div class="col-lg-4">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control input-sm" name="start_date" data-mask="9999-99-99" value='<?= $start_date; ?>'/>
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 
                                                        </div>     
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">End Date</label>
                                                    <div class="col-lg-4">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control input-sm" data-mask="9999-99-99" name="end_date" value='<?= $end_date; ?>'/>
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 
                                                        </div>     
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Start Time</label>
                                                    <div class="col-lg-4">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control input-sm" name="start_time" data-mask="99:99:99" value='<?= $start_time; ?>'/>
                                                            <span class="input-group-addon"><i class="fa fa-clock-o"></i></span> 
                                                        </div>     
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control input-sm" name="end_time" data-mask="99:99:99" value='<?= $end_time; ?>'/>
                                                            <span class="input-group-addon"><i class="fa fa-clock-o"></i></span> 
                                                        </div>     
                                                    </div>
                                                </div>

                                                <!-- <div class="form-group">
                                                    <label class="col-lg-4 control-label">End Time</label>
                                                    <div class="col-lg-4">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control input-sm" name="end_time" data-mask="99:99:99" value='<?= $end_time; ?>'/>
                                                            <span class="input-group-addon"><i class="fa fa-clock-o"></i></span> 
                                                        </div>     
                                                    </div>
                                                </div> -->

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Available Day</label>
                                                    <div class="col-lg-7">
                                                        <label>
                                                            <input type="checkbox" class="inverted" checked="checked" id="sunDay" name="sunDay" value= "1">
                                                            <span class="text"> Sun </span>
                                                        </label>
                                                        <label>
                                                            <input type="checkbox" class="inverted" checked="checked" id="monDay" name="monDay" value= "1">
                                                            <span class="text"> Mon </span>
                                                        </label>
                                                        <label>
                                                            <input type="checkbox" class="inverted" checked="checked" id="tueDay" name="tueDay" value= "1">
                                                            <span class="text"> Tue </span>
                                                        </label>
                                                        <label>
                                                            <input type="checkbox" class="inverted" checked="checked" id="wedDay" name="wedDay" value= "1">
                                                            <span class="text"> Wed </span>
                                                        </label>
                                                        <label>
                                                            <input type="checkbox" class="inverted" checked="checked" id="thuDay" name="thuDay" value= "1">
                                                            <span class="text"> Thu </span>
                                                        </label>
                                                        <label>
                                                            <input type="checkbox" class="inverted" checked="checked" id="friDay" name="friDay" value= "1">
                                                            <span class="text"> Fri </span>
                                                        </label>
                                                        <label>
                                                            <input type="checkbox" class="inverted" checked="checked" id="satDay" name="satDay" value= "1">
                                                            <span class="text"> Sat </span>
                                                        </label>                                                                                                                                                                              
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-lg-offset-4 col-lg-8">
                                                        <input class="btn btn-blue" type="submit" value="<?= $action == 'Add' ? " Booking Now " : "Edit Now" ?>" />
                                                    </div>
                                                </div>
                                                
                                            </div> 
                                        </div>    
                                    </div>

                                </div>    
                            </form>    
                        </div><!--Widget Body-->
                    </div><!--Widget-->

                    <?php
                    if($errorMesssage > 0)
                    {
                        echo $titleErrorMessage;
                    }
                    ?>
                    <div class="widget-header ra_bodyHeaderTitleIcon">
                        <i class="widget-icon fa fa-support blue"></i>
                        <span class="widget-caption"><?=$description?> Booking Details</span>
                    </div><!--Widget Header-->

                    <div class="widget-body ra_widgetBodyTableData">
                        <table class="table table-bordered table-striped table-condensed flip-content">
                            <thead class="flip-content bordered-blueberry bordered-raTableThead">
                                <tr>
                                    <th width="2%"> NR</th>
                                    <th> Booking Start</th>
                                    <th> Booking Start</th>
                                    <th width="2%" class="ratheadTableBodyCenter">?</th>
                                    <th width="12%" class="ratheadTableBodyCenter"> Action</th>
                                </tr>
                            </thead>
                            <tbody class="raTabletbody">
                                <?php
                                $i=1;
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
                                ?>

                                <tr>
                                    <td class="raTableBodyNR"><i class="fa fa-square-o blue"></i></td>
                                        <td><?=$row->start_date?> <?=$row->start_time?></td>
                                        <td><?=$row->end_date?> <?=$row->end_time?></td>
                                        <td class="raTableBodyNR"><?=$statusStr?></td>
                                        <td class="raTableBodyNR">  
                                                <a disabled class="btn btn-info btn-xs edit"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="<?=site_url('centers/deleteVenueBooking/'.$row->id.'/'.$row->id_venue)?>" class="btn btn-danger btn-xs delete" onclick="return confirm('Do you really want to remove this course material?')"><i class="fa fa-trash-o"></i> Delete</a>
                                    </td> 
                                </tr> 

                                <?php                                          
                                    }
                                }
                                else
                                {
                                ?>
                                    <tr>
                                        <td colspan="11" align="center" style = "padding:100px;"><b>No Records Found</b></td>
                                    </tr>
                                <?php
                                }
                                ?> 

                            </tbody>
                        </table>
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

    <!--Page Related Scripts-->
    <script src="<?=base_url()?>assets/js/validation/bootstrapValidator.js"></script>

    <!--Page Related Scripts-->
    <script src="<?=base_url()?>assets/js/inputmask/jasny-bootstrap.min.js"></script>

    <script>



        $(document).ready(function () {

            $("#registrationForm").bootstrapValidator();

            $('#togglingForm').bootstrapValidator({
                message: 'This value is not valid',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                submitHandler: function (validator, form, submitButton) {
                    // Do nothing
                },
                fields: {
                    firstName: {
                        validators: {
                            notEmpty: {
                                message: 'The first name is required'
                            }
                        }
                    },
                    lastName: {
                        validators: {
                            notEmpty: {
                                message: 'The last name is required'
                            }
                        }
                    },
                    company: {
                        validators: {
                            notEmpty: {
                                message: 'The company name is required'
                            }
                        }
                    },
                    // These fields will be validated when being visible
                    job: {
                        validators: {
                            notEmpty: {
                                message: 'The job title is required'
                            }
                        }
                    },
                    department: {
                        validators: {
                            notEmpty: {
                                message: 'The department name is required'
                            }
                        }
                    },
                    mobilePhone: {
                        validators: {
                            notEmpty: {
                                message: 'The mobile phone number is required'
                            },
                            digits: {
                                message: 'The mobile phone number is not valid'
                            }
                        }
                    },
                    // These fields will be validated when being visible
                    homePhone: {
                        validators: {
                            digits: {
                                message: 'The home phone number is not valid'
                            }
                        }
                    },
                    officePhone: {
                        validators: {
                            digits: {
                                message: 'The office phone number is not valid'
                            }
                        }
                    }
                }
            })
            .find('button[data-toggle]')
            .on('click', function () {
                var $target = $($(this).attr('data-toggle'));
                // Show or hide the additional fields
                // They will or will not be validated based on their visibilities
                $target.toggle();
                if (!$target.is(':visible')) {
                    // Enable the submit buttons in case additional fields are not valid
                    $('#togglingForm').data('bootstrapValidator').disableSubmitButtons(false);
                }
            });


            $('#accountForm').bootstrapValidator({
                // Only disabled elements are excluded
                // The invisible elements belonging to inactive tabs must be validated
                excluded: [':disabled'],
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                submitHandler: function (validator, form, submitButton) {
                    // Do nothing
                },
                fields: {
                    fullName: {
                        validators: {
                            notEmpty: {
                                message: 'The full name is required'
                            }
                        }
                    },
                    company: {
                        validators: {
                            notEmpty: {
                                message: 'The company name is required'
                            }
                        }
                    },
                    address: {
                        validators: {
                            notEmpty: {
                                message: 'The address is required'
                            }
                        }
                    },
                    city: {
                        validators: {
                            notEmpty: {
                                message: 'The city is required'
                            }
                        }
                    }
                }
            });

            $('#html5Form').bootstrapValidator();
        });
    </script>

