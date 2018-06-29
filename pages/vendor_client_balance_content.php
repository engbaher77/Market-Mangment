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
			
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
						
						<form name="vendor_customer_list_option" action="" method="post">
							<div class="form-group row dropdown">
							  <label for="sel1"><h1>أختر من القائمة التاليه</h1></label>
							  <select class="form-control dropdown-toggle" id="vendor_customer" name="vendor_customer_list" onchange="this.form.submit();">
								<option value="customer">عميل</option>
								<option value="vendor">مورد</option>
							  </select>
							  
							  <script type="text/javascript">
								  document.getElementById('vendor_customer').value = "<?php echo $_GET['vendor_customer_list'];?>";
								</script>
							</div>
						</form>
							  
							  
							  
						<form name="vendor_customer_list" action="" method="post">
							<div class="form-group row dropdown">
							  <select class="form-control btn btn-primary dropdown-toggle" name="vendor_customer">
								
									<?php 
										$input = $_POST['vendor_customer_list'];
										
										$query="SELECT * FROM vendor_customer WHERE discription='$input'";
											if ($resultss = $conn->query($query)){
												while ( $rowss = $resultss->fetch_array(MYSQLI_ASSOC))
												{
													?>
												<option value=<?php echo $rowss[id];?>><?php echo $rowss[id] . "   " . $rowss[name];?></option>
									<?php
												}
												
											}
											
									?>

							  </select>
							</div>
								<input class="btn btn-success" type="submit" name="SubmitButton"/>
								<br><br><br>
						</form>
						
						
						
						
						<?php 
						
								//if(isset($_POST['SubmitButton'])){ //check if form was submitted
									$vendor_customer_id = $_POST['vendor_customer']; //get input text
									echo $vendor_customer_id;
									echo "hello";
								//}
						?>
						
						
						
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
                                   
                                    $query="SELECT * FROM vendor_customer_balance WHERE vendor_customer_id = '$vendor_customer_id'";
                                    
                                    if ($result = $conn->query($query))
                                    {
                                ?>
                                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                            <thead>
												<tr>
													<th>الرقم</th>
													<th>الاسم</th>
													<th>دائن</th>
													<th>مدين</th>
													<th>المورد/العميل</th>
													<th>الوصف</th>
													<th>رقم الفاتوره</th>
													<th>الرصيد</th>

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
														<td><?php echo $row['credit']; ?></td>
														<td><?php echo $row['debit']; ?></td>
														<td><?php echo $row['vendor_customer_name']; ?></td>
														<td><?php echo $row['discription']; ?></td>
														<td><?php echo $row['invoice_number']; ?></td>
														<td><?php echo $row['date']; ?></td>
													</tr>
												<?php
													}
												?>
											
													<tr>
														<td>المجموع</td>
														<td></td>
														<td>
															<?php
																$query = "SELECT SUM(credit)FROM vendor_customer_balance WHERE id ='$vendor_customer_id'";
																	if ($result_q = $conn->query($query))
																		{
													
																			$total_all = $result_q->fetch_array(MYSQLI_ASSOC);
																			$total_All = $total_all['SUM(credit)'];

																				if ($conn->query($query) == TRUE) {
																					//echo "تم إضافة المجموع الكلى";
																					echo $total_All;
																					//echo $query;	
																				}
																				else {
																					echo "حث خطأ اثناء حساب المجموع الكلى: " . $conn->error;
																				}
																		}
															?>
														</td>
														<td>
															<?php
																$query = "SELECT SUM(debit)FROM vendor_customer_balance WHERE id ='$vendor_customer_id'";
																	if ($result_q = $conn->query($query))
																		{
													
																			$total_all = $result_q->fetch_array(MYSQLI_ASSOC);
																			$total_All = $total_all['SUM(debit)'];

																				if ($conn->query($query) == TRUE) {
																					//echo "تم إضافة المجموع الكلى";
																					echo $total_All;
																					//echo $query;	
																				}
																				else {
																					echo "حث خطأ اثناء حساب المجموع الكلى: " . $conn->error;
																				}

																		}
															?>
														</td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
													</tr>	
													
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