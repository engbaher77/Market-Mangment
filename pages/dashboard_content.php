
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title"> الفاتورة الحاليه</h1>
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        <!-- search button -->
						
			
				<div class="container">
					<div class="row">
						<div class="col-xs-6 radio">
							<label><input type="radio" id="cash" name="imgsel" value="" checked="checked" onchange="cash_deferred()">نقــــدي</label>
						</div>
						<div class="col-xs-6 radio">
           					<label><input type="radio" id="deferred" name="imgsel" value="" onchange="cash_deferred()">أجــــــل</label> 
						</div>
						
						
						
						<?php
						$query="SELECT * FROM vendor_customer WHERE discription='customer'";
							if ($resultss = $conn->query($query))
								{
									?>
									<div class="col-xs-6 dropdown" id="vendor_customer" style = "visibility:hidden;">
										<select class="btn btn-primary dropdown-toggle" id="vendor_customer_name">
									
										<?php		
											while ( $rowss = $resultss->fetch_array(MYSQLI_ASSOC))
												{
													echo "<option value=" . $rowss['id'] . ">";
													echo $rowss['name'];
													echo "</option>";
									
												}
										?>
										</select>
									</div>
							<?php
								}
								
							if ($conn->query($query) == TRUE) {
										//echo "تم إضافة المجموع الكلى";
										//echo $total_All;
										//echo $query;	
									}
									else {
										echo "حث خطأ اثناء حساب المجموع الكلى: " . $conn->error;
									}
						?>
						
					</div>
				</div>
					
				
					

				<div class = "search_button">
					<input type="search" class="light-table-filter form-control" id="searchFilter" data-table="order-table" placeholder="Filter">
				</div>
			
		
	
	<!-- Search Table -->
	
	<div id="container">
	
	<?php
		$query="SELECT * FROM Repairs";
                                    
		if ($result = $conn->query($query))
		{
	?>
		<table class="order-table table table-striped table-hover table-bordered" id ="search_table" style = "display:none;">
			<thead>
				<tr>
					<th>رقم</th>
					<th>باركود</th>
					<th>الصنف</th>
					<th>الكميه</th>
					<th>سعر البيع</th>
					<th>الوصف</th>
					<th></th>
				



				</tr>
            </thead>
		

		
			<tbody>
	  <?php
		while ( $row = $result->fetch_array(MYSQLI_ASSOC))
		{
		?>
				<tr>
					<td><?php echo $row['ID']; ?></td>
					<td><?php echo $row['Barcode']; ?></td>
					<td><?php echo $row['Name']; ?></td>
					<td><?php echo $row['Quantity']; ?></td>
					<td><?php echo $row['Price']; ?></td>
					<td><?php echo $row['Description']; ?></td>
					<td><input class="btn btn-primary" id= "invoice_id" type= "button" value = "إضافة الى الفاتورة" onclick= currentInvoice(<?php echo $row['ID']; ?>,<?php echo $row['Price'];?>);></td>

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
		
			//$conn->close();
		?>
		</table>
		
		
		
		
		
		<!-- Current invoice table -->
	
	<?php
		$query="SELECT * FROM current_invoice";
                                    
		if ($result = $conn->query($query))
		{
	?>
		<table class="table" id ="current_invoice">
			<thead>
				<tr>
					<th>رقم</th>
					<th>الصنف</th>
					<th>الكميه</th>
					<th>سعر الوحده</th>
					<th>الوصف</th>
					<th>ضريبه</th>
					<th>خصم</th>
					<th>المجموع</th>
					<th>  </th>
				</tr>
            </thead>
		

		
			<tbody>
	  <?php
		while ( $row = $result->fetch_array(MYSQLI_ASSOC))
		{
		?>
				<tr>
					<td><?php echo $row['type_id']; ?></td>
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['quantity']; ?></td>
					<td><?php echo $row['price']; ?></td>
					<td><?php echo $row['discription']; ?></td>
					<td></td>
					<td></td>
					<td><?php echo $row['total']; ?></td>
					<td><button type="button" class="btn btn-default btn-sm" onclick = delete_record("C",<?php echo $row['id']; ?>);>
							<span class="glyphicon glyphicon-trash"></span> Trash 
								</button></td>

				</tr>
					
		<?php
			}
		?>
		
				<tr>
					<td>المجموع</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>
						<?php
							$query = "SELECT SUM(total)FROM current_invoice";
							if ($result = $conn->query($query))
								{
			
								$total_all = $result->fetch_array(MYSQLI_ASSOC);
								$total_All = $total_all['SUM(total)'];

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
		
		

		
		<div id="response">
		</div>
		<div id="page_id" value="r11">
		</div>
		<div id="page_id_search_filter" value="searchfilter">
		</div>
		
		<!-- finish and cancel buttons -->
		
		<div>
			<input class="btn btn-success" id= "invoice_finish" type= "button" value = "إضــــــــافة الفاتوره" onclick= done_cancel_current_invoice("D");>
			<input class="btn btn-danger" id= "invoice_cancel" type= "button" value = "الغـــــــاء" onclick= done_cancel_current_invoice("c");>

		</div>
		<br><br>
	
	
				<!-- history button and search old invoices -->
				<div style="font-size:2em; color:Tomato; margin:25px 25px 50px 100px">
					<span class="glyphicon glyphicon-backward" onclick= history("S","0");></span>
				<!-- Date picker -->		
					<div class="row">
						<div class='col-sm-6'>
							<div class="form-group">
								<div class='input-group date' id="datepicker" data-provide="datepicker">
									<input type='text' class="form-control" id="dateval" />
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
							</div>
						</div>
					</div>
		
					<span class="glyphicon glyphicon-forward" onclick= history("S","0");></span>
				</div>

                 
	
		</div>

                        
                        
                        
                   
                    </div>
					
				
                    <!-- END CONTENT BODY -->
                </div>
				<!-- BEGIN PAGE LEVEL SCRIPTS -->
				<script src="./scripts/delete_record.js" type="text/javascript"></script>
				<script src="./assets/customized/cash_deferred/cash_deferred.js" type="text/javascript"></script>
				<!-- END PAGE LEVEL SCRIPTS -->