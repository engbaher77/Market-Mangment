			<div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar">
                            <h1 class="page-title"> Blue Eyes
                            <small>Technologies</small>
							</h1>     
                        </div>
                        <!-- END PAGE BAR -->
                       <!-- BEGIN PAGE TITLE-->
			
					   <div class="form-group">
						  <label for="sel1"><h1>أختر من القائمة التاليه</h1></label>
						  <select class="form-control" id="vendor_customer">
							<option value="customer">عميل</option>
							<option value="vendor">مورد</option>
						  </select>
						</div>
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
												
                                                    <div class="btn-group" style = <?php if( $_SESSION['rank']!=="1" ){echo "\"display : none;\"";} else {echo "";} ?> >
                                                        <button id="sample_editable_1_new" class="btn green"> Add New
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
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
                                    
                                    $query="SELECT * FROM vendor_customer";
                                    
                                    if ($result = $conn->query($query))
                                    {
                                ?>
                                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                            <thead>
                                            <tr>
                                                <th>الرقم</th>
                                                <th>الاسم</th>
                                                <th>E-mail</th>
                                                <th>العنوان</th>
												<th>هاتف</th>
                                                <th>الوصف</th>
												<?php if( $_SESSION['rank']==='1' ){echo "<th>Edit</th>";} ?>
												<?php if( $_SESSION['rank']==='1' ){echo "<th>Delete</th>";} ?>
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
                                                <td><?php echo $row['mail']; ?></td>
												<td><?php echo $row['address']; ?></td>
                                                <td><?php echo $row['contact']; ?></td>
												 <td><?php echo $row['discription']; ?></td>
												<?php if( $_SESSION['rank']==="1" ){echo "<td><a class=\"edit\" href=\"javascript:;\"> Edit </a></td>";}?>
                                                <?php if( $_SESSION['rank']==="1" ){echo "<td><a class=\"delete\" href=\"javascript:;\"> Delete </a></td>";} ?>   
                                                <!-- <td><a class="delete" href="javascript:;"> Delete </a></td> -->
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
								
								<div id="page_id" value="vcl">
								</div>
								
                            </div>
                        </div>
                    </div>
                    <!-- END CONTENT BODY -->
                </div>