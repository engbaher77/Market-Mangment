			<div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                      
                       <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title"> رصيـــــد الخزنــــه
                        </h1>
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                 
                                    <div class="portlet-body">
                                        <div class="table-toolbar">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="btn-group pull-right">
                                                        <ul class="dropdown-menu pull-right">
                                                            <li>
                                                                <a href="javascript:;"> Print </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;"> Save as PDF </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;"> Export to Excel </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
								<?php		
                                    
                                    $query="SELECT * FROM inventory";
                                    
                                    if ($result = $conn->query($query))
                                    {
                                ?>
                                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                            <thead>
                                            <tr>
                                                <th>الرقم</th>
                                                <th>بيــان</th>
                                                <th>مديــــن</th>
                                                <th>دائـــن</th>
												<th>رصيد الخزنه</th>
                                                <th>رقم الفاتـــورة</th>
                                                <th>التاريخ</th>
                                            </tr>
                                        </thead>
                                            <tbody>
                                                <?php
                                        while ( $row = $result->fetch_array(MYSQLI_ASSOC))
                                        {
                                            //echo $row['ID']."-".$row['Owner']."<br>";
                                            ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['debit']; ?></td>
                                                <td><?php echo $row['credit']; ?></td>
												<td><?php echo $row['balance']; ?></td>
                                                <td><?php echo $row['invoice_number']; ?></td>
                                                <td><?php echo $row['date']; ?></td>
                                                </tr>
												<?php
                                        }
                                        ?>
                                            </tbody>
											<?php
                                    }
                                    else
                                    {
                                        $errorMsg = "DB Error: ".$conn->error;
                                    }
                                    
                                    if ($errorMsg)
                                    {
                                        echo $errorMsg;
                                    }
                                    
                                    $conn->close();
                                ?>
                                        </table>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
								<div id="response">
								</div>
								<div id="page_id" value="r11">
								</div>
                            </div>
                        </div>
                    </div>
                    <!-- END CONTENT BODY -->
                </div>