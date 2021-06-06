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
                            <span class="widget-caption"> District Details</span>
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
                                data-bv-feedbackicons-validating="glyphicon glyphicon-refresh" action="<?=site_url('centers/addEditDistrict')?>">
                                <input type='hidden' name='id' id='id' value='<?= $id; ?>' >
                                <input type='hidden' name='action' id='action' value='<?= $action; ?>' >
                                <div class="row">

                                    <div class="col-lg-12 col-sm-12 col-xs-12">
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
                                                <span class="widget-caption">District Information</span>
                                            </div>

                                            <div class="widget-body">
                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">District Name</label>
                                                    <div class="col-lg-4">
                                                        <input type="text" class="form-control input-sm" name="description"  placeholder="District Name"
                                                               data-bv-message="The Division Name is not valid"
                                                               required
                                                               data-bv-notempty-message="The District Name is required and cannot be empty"
                                                               pattern="[a-zA-Z0-9]+"
                                                               data-bv-regexp-message="The District Name can only consist of alphabetical, number" 
                                                               data-bv-stringlength="true"
                                                               data-bv-stringlength-min="2"
                                                               data-bv-stringlength-max="20"
                                                               data-bv-stringlength-message="The District Name must be more than 5 and less than 20 characters long" 
                                                               value='<?= $description; ?>' />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Division Name </label>
                                                    <div class="col-lg-4">
                                                        <select name="divisionID" id="divisionID" class="form-control input-sm">
                                                            <?=$divisionList?>
                                                        </select> 
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Active? </label>
                                                    <div class="col-lg-8">
                                                        <input class="checkbox-slider toggle yesno" type="checkbox" name="status" <?=$checkDisable?>>
                                                        <span class="text"></span>
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

