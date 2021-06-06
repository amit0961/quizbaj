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
                                <span class="widget-caption">Quiz Result List Total : <?=$total?> Showing <?=$start?> to <?=$end?></span>
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
                                            <th> Phone No</th>
                                            <th> Access Name</th>
                                            <th> Subject</th>
                                            <th> Campign</th>
                                            <th> Exam Date</th>
                                            <th> Times</th>
                                            <th> Result</th>
                                            <th> Points</th>
                                            <th> Round</th>
                                            <th width="2%" class="ratheadTableBodyCenter">?</th>
                                            <th width="8%" class="ratheadTableBodyCenter"> Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="raTabletbody">
                            <?php
                            $i=1;
                            //$queryList = 0;
                            if(is_array($queryList))
                            {
                                foreach($queryList as $row)
                                {
                                    $passid =$row->examLogID;
                                    if($row->isComplete == 1)
                                    $checkActive = "checked='checked'";
                                    else
                                    $checkActive = "";


                                    if($row->isComplete == 1)
                                    {
                                        $statusStr = '<i class="fa fa-check-square blue">';
                                    }
                                    else
                                    {
                                        $statusStr = '<i class="fa fa-square red">';
                                    }

                                    $examName = $this->generallib->getExamSubjectName($row->examID);
                                    $attemptTimeStr = strtotime($row->attemptTime);
                                    $submitTime = strtotime($row->submitTime);
                                    $duration = $submitTime - $attemptTimeStr;
                                    $duration = $this->generallib->sec_to_time($duration);


                            ?>
                                        <tr>
                                            <td class="raTableBodyNR"><i class="fa fa-square-o blue"></i></td>
                                             
                                            <td><?=$row->phoneNo?></td>
                                            <td><?=$row->fullName?></td> 
                                            <td><?=$examName?></td>
                                            <td><?=$row->campID?></td>
                                            <td><?=$row->attemptTime?></td>
                                            <td><?=$duration?></td>
                                            <td><?=$row->questions?>/<?=$row->correct?></td>
                                            <td><?=$row->points?></td>
                                            <td><?=$row->rounds?></td>
                                            <td class="raTableBodyNR"><?=$statusStr?></td>
                                            <td class="raTableBodyNR">
                                                <a disabled="disabled" class="btn btn-info btn-xs shiny edit"><i class="fa fa-edit"></i> View Quiz</a>
                                            </td> 
                                        </tr>                                                                                                                                                        
                            <?php        
                                                                        
                                }
                            }
                            else
                            {
                            ?>
                             <tr>
                                <td colspan="16" align="center" style = "padding:100px;">
                                    <b>No Records Found</b>
                                </td>
                              </tr>
                            <?php
                            }
                            ?> 

                             <tr>
                                <td colspan="15" align="center">
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