<?php
$this->load->view('config/header');
if($status ==1)
$checkDisable = "checked='checked'";
else
$checkDisable = "";

if($is_editable ==1)
$editableCheckDisable = "checked='checked'";
else
$editableCheckDisable = "";


?>

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
                <!-- <div class="page-header position-relative">
                    <div class="header-title">
                        <h5> Course Information</h5>
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
                </div> -->
                <!-- /Page Header -->
                <!-- Page Body -->
                <div class="page-body ra_bodyHeader">
                    <div class="widget ra_widgetMarginBody">
                        <div class="widget-header ra_bodyHeaderTitleIcon">
                            <i class="widget-icon fa fa-sun-o blue"></i>
                            <span class="widget-caption"> Quiz Subject Information</span>
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
                                action="<?=site_url('apps/addEditSubject')?>">
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
                                                <span class="widget-caption">Subject Information</span>
                                            </div>

                                            <div class="widget-body">
                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label"> Subject Name</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" class="form-control input-sm" name="exam_name" placeholder="Subject Name"
                                                               data-bv-notempty="true"
                                                               data-bv-notempty-message="The Subject Name is required and cannot be empty"  value='<?= $exam_name; ?>' />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label"> Syllabus</label>
                                                    <div class="col-lg-8">
                                                        <textarea class="form-control" rows="2" name="syllabus" placeholder="Subject Syllabus"><?=$syllabus;?></textarea>                                                    
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Campaign Name </label>
                                                    <div class="col-lg-8">
                                                        <select name="campID" id="campID" class="form-control input-sm">
                                                            <?=$campaignList?>
                                                        </select> 
                                                    </div>
                                                </div> 


                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Exam Duration (M)</label>
                                                    <div class="col-lg-4">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control input-sm" name="duration" value='<?=$duration?>' />
                                                            <span class="input-group-addon"> <i class="fa fa-clock-o"></i></span>
                                                        </div>       
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Answer Editable? </label>
                                                    <div class="col-lg-8">
                                                        <input class="checkbox-slider toggle yesno" type="checkbox" name="is_editable" <?=$editableCheckDisable?>>
                                                        <span class="text"></span>
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
                                                <span class="widget-caption"> Others Information</span>
                                            </div>
                                            <div class="widget-body">


                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">No. Questions</label>
                                                    <div class="col-lg-4">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control input-sm" name="no_question" value='<?=$no_question?>' />
                                                            <span class="input-group-addon"> <i class="fa fa-question"></i></span>
                                                        </div>       
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Correct Score</label>
                                                    <div class="col-lg-4">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control input-sm" name="correct_score" value='<?=$correct_score?>' />
                                                            <span class="input-group-addon"> <i class="fa fa-check-square"></i></span>
                                                        </div>       
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Incorrect Score</label>
                                                    <div class="col-lg-4">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control input-sm" name="incorrect_score" value='<?=$incorrect_score?>' />
                                                            <span class="input-group-addon"> <i class="fa fa-close"></i></span>
                                                        </div>       
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Maximum Attempts</label>
                                                    <div class="col-lg-4">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control input-sm" name="maximum_attempts" value='<?=$maximum_attempts?>' />
                                                            <span class="input-group-addon"> <i class="fa fa-bell"></i></span>
                                                        </div>       
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Next Attempts (Hours)</label>
                                                    <div class="col-lg-4">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control input-sm" name="next_attempts" value='<?=$next_attempts?>' />
                                                            <span class="input-group-addon"> <i class="fa fa-bell"></i></span>
                                                        </div>       
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-lg-offset-4 col-lg-8">
                                                        <input class="btn btn-primary shiny" type="submit" value="<?= $action == 'Add' ? " Insert Subject " : "Edit Subject" ?>" />
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

