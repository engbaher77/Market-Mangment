
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
                                <!-- BEGIN VALIDATION STATES-->
                                  
                                        <!-- BEGIN FORM-->
                                        <form class="form-horizontal" action="" method="get">
                                            <div class="row dropdown">
                                                <h3 class="">فاتورة سداد موردين - عملاء</h3>
                                                <div class="has-warning">
                                                    <label class="control-label col-xs-6" for="inputWarning">مورد - عميل</label>
                                                    <div class="col-md-4">
                                                        <select class="form-control dropdown-toggle" id="vendor_customer" name="vendor_customer_list" onchange="this.form.submit();">
															<option value="any">.......</option>
															<option value="customer">عميل</option>
															<option value="vendor">مورد</option>
														</select>
                                                        <span class="help-block">
															<?php
																$input = $_GET['vendor_customer_list'];
																echo $input;
															?>
														</span>
                                                    </div>
                                                </div>

											</div>
										</form>
											

											
                                        <form class="form-horizontal" name="vendor_customer_list" action="" method="get">
											<div class="row dropdown">
                                                <div class=" has-error">
                                                    <label class="control-label col-xs-6" for="inputError">الاســـــم</label>
                                                    <div class="col-md-4">
														<div class="form-group row dropdown">
														  <select class="form-control btn btn-primary dropdown-toggle" name="vendor_customer" onchange="this.form.submit();">
															<option value="hi">.....</option>
																<?php 
																
																	$input = $_GET['vendor_customer_list'];
																	$query="SELECT * FROM vendor_customer WHERE discription='$input'";
																		if ($resultss = $conn->query($query)){
																			while ( $rowss = $resultss->fetch_array(MYSQLI_ASSOC))
																			{
																				?>
																			<option value=<?php echo $rowss[id];?>><?php echo $rowss[name];?></option>
																<?php
																			}
																			
																		}
																?>
														  </select>
														</div>
														<span class="help-block">
															<?php
																$id = $_GET['vendor_customer'];
																echo $id;
															?>
														</span>
                                                    </div>
                                                </div>
											</div>	
										</form>
                                                        	
                                        
										
												<div class="has-success form-horizontal">
                                                    <label class="control-label col-xs-6" for="inputSuccess">رصيــــد</label>
                                                    <div class="col-md-4">
																<?php
																	$id = $_GET['vendor_customer'];
																		$query = "SELECT SUM(credit),SUM(debit) FROM vendor_customer_balance WHERE vendor_customer_id ='$id'";
																			if ($result_q = $conn->query($query))
																				{
															
																					$total_all = $result_q->fetch_array(MYSQLI_ASSOC);
																					$total_All_credit = $total_all['SUM(credit)'];
																					$total_All_debit = $total_all['SUM(debit)'];

																						if ($conn->query($query) == TRUE) {
																						}
																						else {
																							echo "حث خطأ اثناء حساب المجموع الكلى: " . $conn->error;
																						}
																				}
															?>
														<input type="text" class="form-control" id="inputSuccess" value="  دائن:<?php echo $total_All_credit;?>   مدين:<?php echo $total_All_debit;?>" disabled/>			
													</div>
														<span class="help-block"><br><br><br> </span>
                                                </div>
												<div class="has-success form-horizontal">
                                                    <label class="control-label col-xs-6" for="inputSuccess">قيمة الســداد</label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" id="payment_value" /> </div>
														<span class="help-block"> <br> </span>
                                                </div>
										
										
												<div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <button type="button" class="btn green" onclick= vendor_customer_payment("<?php echo $id; ?>");>تأكيــد</button>
                                                        <button type="button" class="btn default">الغاء</button>
                                                    </div>
                                                </div>
												
												
												<div id="response">
												</div>
												
												
													<!-- history button and search old invoices -->
												<div style="font-size:2em; color:Tomato; margin:25px 25px 50px 100px">
														<span class="glyphicon glyphicon-backward" onclick= history("vcp","0");></span>

												<!-- Date picker -->		
													<div class="row">
														<div class='col-sm-6'>
															<div class="form-group">
																<div class='input-group date' id="datepicker" data-provide="datepicker">
																	<input type='text' class="form-control" id="dateval"/>
																	<span class="input-group-addon">
																		<span class="glyphicon glyphicon-calendar"></span>
																	</span>
																</div>
															</div>
														</div>
													</div>
													
													
														<span class="glyphicon glyphicon-forward" onclick= history("vcp","0");></span>
												</div>
										<div id="page_id" value="r11">
										</div>
								</div>
						</div>
						
						
						
		<script src="./scripts/vendor_customer_payment.js" type="text/javascript"></script>
								
							
							
                          
                        