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
                            <span class="widget-caption"> Account Generation Information</span>
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
                                data-bv-feedbackicons-validating="glyphicon glyphicon-refresh" action="<?=site_url('reseller/addEditReseller')?>">
                                
                                <input type='hidden' name='id' id='id' value='<?= $id; ?>' >
                                <input type='hidden' name='action' id='action' value='<?= $action; ?>' >
                                <input type='hidden' name='level' id='level' value='<?= $level; ?>' >
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
                                                <span class="widget-caption"> Lots Name Configuration</span>
                                            </div>

                                            <div class="widget-body">

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Lot Name </label>
                                                    <div class="col-lg-8">
                                                        <input type="text" class="form-control input-sm" name="description"
                                                               data-bv-message="The description is not valid"
                                                               data-bv-notempty="true"
                                                               data-bv-notempty-message="The description is required and cannot be empty"
                                                               data-bv-regexp="true"
                                                               data-bv-regexp-regexp="[a-zA-Z0-9_\.]+"
                                                               data-bv-regexp-message="The description can only consist of alphabetical, number, dot and underscore"
                                                               data-bv-stringlength="true"
                                                               data-bv-stringlength-min="4"
                                                               data-bv-stringlength-max="30"
                                                               data-bv-stringlength-message="The description must be more than 6 and less than 30 characters long" value='<?= $description; ?>'/> 
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Client Type </label>
                                                    <div class="col-lg-8">
                                                        <select name="clientType" id="clientType" class="form-control input-sm" style="width:100%;">
                                                            <option value="<?=SIP_USER?>">Retail Client</option>
                                                        </select> 
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Reseller </label>
                                                    <div class="col-lg-8">
                                                        <select name="id_reseller" id="id_reseller" class="form-control input-sm" style="width:100%;">
                                                            <?=$resellerList?>
                                                        </select> 
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Initial Balance</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" class="form-control input-sm" name="balance"
                                                               data-bv-message="The Balance is not valid"
                                                               data-bv-notempty="true"
                                                               data-bv-notempty-message="The Balance is required and cannot be empty"
                                                               data-bv-regexp="true"
                                                               data-bv-regexp-regexp="[0-9\/]"
                                                               data-bv-regexp-message="The Balance can only consist of number"
                                                               data-bv-stringlength="true"
                                                               data-bv-stringlength-min="1"
                                                               data-bv-stringlength-max="14"
                                                               data-bv-stringlength-message="The Balance must be more than 1 and less than 12 characters long" value='<?= $balance; ?>' />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Codec </label>
                                                    <div class="col-lg-8">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="c_g729" class="inverted" value = "g729" checked="checked">
                                                                <span class="text">G.729</span>
                                                            </label>
                                                            
                                                            <label style="padding-left:5px;">
                                                                <input type="checkbox" name="c_g723" class="inverted" value = "g723" checked="checked">
                                                                <span class="text">G.723</span>
                                                            </label>
                                                            
                                                            <label style="padding-left:5px;">
                                                                <input type="checkbox" name="c_g711" class="inverted" value = "g711" checked="checked">
                                                                <span class="text">G.711μ</span>
                                                            </label>


                                                            <label style="padding-left:5px;">
                                                                <input type="checkbox" name="c_gsm" class="inverted" value = "gsm" checked="checked">
                                                                <span class="text">GSM</span>
                                                            </label>

                                                        </div>

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
                                                <span class="widget-caption">Personal Information</span>
                                            </div>
                                            <div class="widget-body">

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Reseller Name</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" class="form-control input-sm" name="full_name"
                                                               data-bv-message="The Reseller Name is not valid"
                                                               data-bv-notempty="true"
                                                               data-bv-notempty-message="The Reseller Name is required and cannot be empty"
                                                               data-bv-regexp="true"
                                                               data-bv-regexp-regexp="[a-zA-Z0-9_\.]+"
                                                               data-bv-regexp-message="The Reseller Name can only consist of alphabetical, number, dot and underscore"
                                                               data-bv-stringlength="true"
                                                               data-bv-stringlength-min="4"
                                                               data-bv-stringlength-max="30"
                                                               data-bv-stringlength-message="The username must be more than 4 and less than 30 characters long" value='<?= $full_name; ?>'/> 
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Email</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" class="form-control input-sm" name="email" value='<?= $email; ?>'/> 
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Cell Phone No</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" class="form-control input-sm" name="cell" value='<?= $cell; ?>'/> 
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Country </label>
                                                    <div class="col-lg-8">
                                                        <select name="country" class="form-control input-sm" style="width:100%;">
                                                            <?=$countryList?>
                                                        </select> 
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Address</label>
                                                    <div class="col-lg-8">
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

