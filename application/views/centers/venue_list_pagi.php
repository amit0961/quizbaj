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
                                <span class="widget-caption">Training Venue List Total : <?=$total?> Showing <?=$start?> to <?=$end?></span>
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
                                            <th> Venue Name</th>
                                            <th> Upazila Name</th>
                                            <th> Contacts</th>
                                            <th> Phone</th>
                                            <th> No of Courses</th>
                                            <th width="2%" class="ratheadTableBodyCenter">?</th>
                                            <th width="23%" class="ratheadTableBodyCenter"> Action</th>
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

                                    $upazilaName = $this->generallib->getUpazilaName($row->upazila_id);
                            ?>
                                        <tr>
                                            <td class="raTableBodyNR"><i class="fa fa-square-o blue"></i></td>
                                            <td><?=$row->description?></td>
                                            <td><?=$upazilaName?></td>
                                            <td><?=$row->contacts?></td>
                                            <td><?=$row->phone_no?></td> 
                                            <td>0</td> 
                                            <td class="raTableBodyNR"><?=$statusStr?></td>
                                            <td class="raTableBodyNR">
                                                <a href="<?=site_url('centers/venueBookingInfo/0/'.$row->id)?>" class="btn btn-purple btn-xs edit"><i class="fa fa-calendar"></i> Booking Details</a>  
                                                <a href="<?=site_url('centers/editVenueForm/0/'.$row->id)?>" class="btn btn-info btn-xs edit"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="<?=site_url('centers/deleteVenue/'.$row->id)?>" class="btn btn-danger btn-xs delete" onclick="return confirm('Do you really want to remove this Venue?')"><i class="fa fa-trash-o"></i> Delete</a>
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