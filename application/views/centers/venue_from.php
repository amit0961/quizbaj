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
                            <span class="widget-caption"> Venue Details</span>
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
                                action="<?=site_url('centers/addEditVenue')?>">
                                <input type='hidden' name='id' id='id' value='<?= $id; ?>' >
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
                                                <span class="widget-caption">Venue Information</span>
                                            </div>

                                            <div class="widget-body">

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label"> Division Name </label>
                                                    <div class="col-lg-6">
                                                        <select name="divisionID" id="divisionID" onChange="showDistrict(this);" class="form-control input-sm">
                                                            <?=$divisionList?>
                                                        </select> 
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label"> District Name </label>
                                                    <div class="col-lg-6">
                                                        <div id="district">
                                                            <select name="districtID" id="districtID" <?=$isDisable?> class="form-control input-sm">
                                                                <?=$districtList?>
                                                            </select>
                                                        </div>     
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label"> Upazila Name </label>
                                                    <div class="col-lg-6">
                                                        <div id="upazila">
                                                            <select name="upazilaID" id="upazilaID" <?=$isDisable?> class="form-control input-sm">
                                                                <?=$upazilaList?>
                                                            </select>
                                                        </div>     
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Venue Name</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control input-sm" name="description"  placeholder="Venue Name"
                                                               data-bv-message="The Venue Name is not valid"
                                                               required
                                                               data-bv-notempty-message="The Venue Name is required and cannot be empty"
                                                               pattern="[a-zA-Z0-9]+"
                                                               data-bv-regexp-message="The Venue Name can only consist of alphabetical, number" 
                                                               data-bv-stringlength="true"
                                                               data-bv-stringlength-min="2"
                                                               data-bv-stringlength-max="200"
                                                               data-bv-stringlength-message="The Venue Name must be more than 2 and less than 200 characters long" 
                                                               value='<?= $description; ?>' />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label"> Venue Image</label>
                                                    <div class="col-lg-6">
                                                        <span class="file-input btn btn-azure btn-file">
                                                            Browse <input type="file" name="userfile" size="20" />
                                                        </span>
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
                                                <span class="widget-caption">Contact Information</span>
                                            </div>
                                            <div class="widget-body">

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Contact Name</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control input-sm" name="contacts" value='<?= $contacts; ?>'/> 
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Email</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control input-sm" name="email" value='<?= $email; ?>'/> 
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Cell Phone No</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control input-sm" name="phone_no" value='<?= $phone_no; ?>'/> 
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Location</label>
                                                    <div class="col-lg-6">
                                                        <textarea class="form-control" rows="3" name="address" placeholder="Address"><?=$address;?></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-lg-offset-4 col-lg-8">
                                                        <input class="btn btn-blue" type="submit" value="<?= $action == 'Add' ? " Submit Now " : "Edit Now" ?>" />
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

    <!--Page Related Scripts-->
    <script src="<?=base_url()?>assets/js/validation/bootstrapValidator.js"></script>

    <script>

                    function showDistrict(sel) {
                        var divisionID = sel.options[sel.selectedIndex].value;
                        $("#district").html("");
                        //$("#upazila").html("");
                        if (divisionID.length > 0) {
                            $.ajax({
                                type: "POST",
                                url: "<?=site_url('centers/getDistrictListInDropDown')?>",
                                data: "divisionID=" + divisionID,
                                cache: false,
                                beforeSend: function() {
                                    $('#district').html('<img src="<?=base_url()?>assets/img/loader_001.gif" alt="" width="24" height="24">');
                                },
                                success: function(html) {
                                    $("#district").html(html);
                                }
                            });
                        }
                    }


                   function showUpazila(sel) {
                        var districtID = sel.options[sel.selectedIndex].value;
                        if (districtID.length > 0) {
                            $.ajax({
                                type: "POST",
                                url: "<?=site_url('centers/getUpazilaListInDropDown')?>",
                                data: "districtID=" + districtID,
                                cache: false,
                                beforeSend: function() {
                                    $('#upazila').html('<img src="<?=base_url()?>assets/img/loader_001.gif" alt="" width="24" height="24">');
                                },
                                success: function(html) {
                                    $("#upazila").html(html);
                                }
                            });
                        } else {
                            $("#upazila").html("");
                        }
                    }


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

