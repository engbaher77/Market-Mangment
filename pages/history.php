<?php
require_once '../core/config.php';
?>



<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
	
	<title>Invoice Page</title>
	         <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="../assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="../assets/global/css/components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="../assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
	
	
	<body>

	
	
	<div 
		id="response">
	</div>
	
	
	
<?php
		$table_id = $_REQUEST["q"];
		//echo $table_id;
		if($table_id == "P"){
			?>
			
			
			
			
			
			
			
			
	<!-- Purchase Table -->
	
	<div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                      
                       <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title"> فواتير المشتريات
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
		
		<!-- Current invoice table -->
	
	<?php
		$query="SELECT purchases_invoices.invoice_number, COUNT(*) FROM database.purchases_invoices
																								GROUP BY
																									purchases_invoices.invoice_number
																										ORDER BY
																											purchases_invoices.invoice_number DESC";
                                    
		if ($result = $conn->query($query))
		{
	?>
		<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
			<thead>
				<tr>
					<th>رقم الفاتوره</th>
					<th>عدد الاصناف</th>
					<th>السعر الاجمالى</th>
					<th>الوقت والتاريخ</th>
					<th>نقدى</th>
					<th>أجل</th>
					<th>اسم المورد</th>
					<th></th>

				</tr>
            </thead>
		

		
			<tbody>
	  <?php
		while ( $row = $result->fetch_array(MYSQLI_ASSOC))
		{
		?>
				<tr>
				
				<!-- Row of invoice_number -->
					<td><?php echo $row['invoice_number']; ?></td>
					
				<!-- Row of # types -->	
					<td><?php echo $row['COUNT(*)']; ?></td>
					
					
				<!-- Row of Total -->
					<?php   
					$query = "SELECT SUM(Total) from `database`.purchases_invoices
																	WHERE purchases_invoices.invoice_number = $row[invoice_number]";
						if ($results = $conn->query($query))
						{	
							$rows = $results->fetch_array(MYSQLI_ASSOC);
							echo "<td>" .$rows['SUM(Total)'] ."</td>";
						}
					?>
				
				
				<!-- Row of Date -->	
					<?php 
					$query = "SELECT * from `database`.purchases_invoices
																	WHERE purchases_invoices.invoice_number = $row[invoice_number]";
							if ($result_v = $conn->query($query))
								{
									$row_v = $result_v->fetch_array(MYSQLI_ASSOC);
									echo "<td>" .$row_v['date'] ."</td>";
								}
					?>
					
					
				<!-- Row of Cash -->
					<td><?php echo $row_v['cash']; ?></td>
				
				
				<!-- Row of Deferred -->
					<td><?php echo $row_v['deferred']; ?></td>
				
				
				<!-- Row of vendor_customer_name -->
					<td><?php echo $row_v['vendor_customer_name']; ?></td>
					

					
					
				<!-- Row of Tools Action -->	
					<td>
					<input id= "invoice_preview" type= "button" value = "عرض الفاتوره" onclick= history("PV",<?php echo $row['invoice_number'];?>);>
					<?php if($row_v['confirmed'] == (null || 0)){ ?>
					<input id= "invoice_preview" type= "button" value = "حذف" onclick= history_delete_record("PDEL",<?php echo $row['invoice_number'];?>);>
					<input id= "invoice_preview" type= "button" value = "تأكيد" onclick= inventory_confirm("PCONFIRM",<?php echo $row['invoice_number'];?>);>
					<?php } ?>
					
					<?php if($row_v['confirmed'] == 1){ ?>
						<a href="#">
						  <span class="glyphicon glyphicon-ok"></span>
						</a>
					<?php } ?>
					
					
					</td>


					
				</tr>
		<?php } ?>
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

                            </div>
                        </div>
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
		
	
	
		<!-- finish and cancel buttons -->
		
		<div>
			<input id= "invoice_cancel" type= "button" value = "CLOSE" onclick= history("CC","0");>

		</div>
<?php
		}
?>		
		
		
		
	







	
		
<?php
		if($table_id == "S"){
			?>
	<!-- Sells Table -->
	
<div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                      
                       <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title"> فواتير البيع
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

		
		<!-- Current invoice table -->
	
	<?php
		$query="SELECT sells_invoices.invoice_number, COUNT(*) FROM database.sells_invoices
																								GROUP BY
																									sells_invoices.invoice_number
																										ORDER BY
																											sells_invoices.invoice_number DESC";
                                    
		if ($result = $conn->query($query))
		{
	?>
		<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
			<thead>
				<tr>
					<th>رقم الفاتوره</th>
					<th>عدد الاصناف</th>
					<th>السعر الاجمالى</th>
					<th>الوقت والتاريخ</th>
					<th>نقدى</th>
					<th>أجل</th>
					<th>إسم العميل</th>
					<th></th>

				</tr>
            </thead>
		

		
			<tbody>
	  <?php
		while ( $row = $result->fetch_array(MYSQLI_ASSOC))
		{
		?>
				<tr>
				<!-- Row of Invoice Number -->
					<td><?php echo $row['invoice_number']; ?></td>
					
					
				<!-- Row of # types -->
					<td><?php echo $row['COUNT(*)']; ?></td>
					
					
				<!-- Row of Total -->					
					<?php   
						$query = "SELECT SUM(Total) from `database`.sells_invoices
																		WHERE sells_invoices.invoice_number = $row[invoice_number]";
						if ($results = $conn->query($query))
						{
							$rows = $results->fetch_array(MYSQLI_ASSOC);
							echo "<td>" .$rows['SUM(Total)'] ."</td>";
						}
					?>
					
					
				<!-- Row of Date -->
					<?php 
							$query = "SELECT * from `database`.sells_invoices
																	WHERE sells_invoices.invoice_number = $row[invoice_number]";
							if ($result_v = $conn->query($query))
								{
									$row_v = $result_v->fetch_array(MYSQLI_ASSOC);
									echo "<td>" .$row_v['date'] ."</td>";
								}
					?>
				
				<!-- Row of Cash -->
					<td><?php echo $row_v['cash']; ?></td>
					
				<!-- Row of Deferred -->
					<td><?php echo $row_v['deferred']; ?></td>
					
				<!-- Row of vendor_customer_name -->
					<td><?php echo $row_v['vendor_customer_name']; ?></td>
					
					
					
					
					<!-- Action Tools -->
					<td>
					<input id= "invoice_preview" type= "button" value = "عرض الفاتوره" onclick= history("SV",<?php echo $row['invoice_number'];?>);>
					<?php if($row_v['confirmed'] == (null || 0)){ ?>
					<input id= "invoice_preview" type= "button" value = "حذف" onclick= history_delete_record("SDEL",<?php echo $row['invoice_number'];?>);>
					<input id= "invoice_preview" type= "button" value = "تأكيد" onclick= inventory_confirm("SCONFIRM",<?php echo $row['invoice_number'];?>);>
					<?php } ?>
					
					<?php if($row_v['confirmed'] == 1){ ?>
						<a href="#">
						  <span class="glyphicon glyphicon-ok"></span>
						</a>
					<?php } ?>		

					</td>
					
					
					
					
				</tr>
		<?php } ?>
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

                            </div>
                        </div>
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
		
		

		
		
		<!-- finish and cancel buttons -->
		
		<div>
			<input id= "invoice_cancel" type= "button" value = "CLOSE" onclick= history("CC","0");>

		</div>
<?php
		}
?>		
		

	
	
	
	
	
	
	
	
	
	<?php
		if($table_id == "vcp"){
			?>
	<!-- vendor_customer_payment Table -->
	
<div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                      
                       <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title">  فواتير الســــداد
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

		
		<!-- Current invoice table -->
	
	<?php
		$query="SELECT * FROM database.vendor_customer_payment
																GROUP BY
																	vendor_customer_payment.invoice_number
																		ORDER BY
																			vendor_customer_payment.invoice_number DESC";
                                    
		if ($result = $conn->query($query))
		{
	?>
		<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
			<thead>
				<tr>
					<th>الرقــم</th>
					<th>البيــان</th>
					<th>المدفوع</th>
					<th>المورد/العميل</th>
					<th>رقم بيان السداد</th>
					<th>الوصف</th>
					<th>التاريخ</th>
					<th></th>

				</tr>
            </thead>
		

		
			<tbody>
	  <?php
		while ( $row = $result->fetch_array(MYSQLI_ASSOC))
		{
		?>
				<tr>
				<!-- Row of Invoice Number -->
					<td><?php echo $row['id']; ?></td>
					
					
				<!-- Row of # types -->
					<td><?php echo $row['name']; ?></td>
					
					
				<!-- Row of Total -->					
					<td><?php echo $row['payment']; ?></td>
					
					
				<!-- Row of Date -->
					<td><?php echo $row['vendor_customer_name']; ?></td>
					
					
				<!-- Row of vendor_customer_name -->
					<td><?php echo $row['invoice_number']; ?></td>
				
				<!-- Row of Cash -->
					<td><?php echo $row['discription']; ?></td>
					
				<!-- Row of Deferred -->
					<td><?php echo $row['date']; ?></td>
					
			
					
					
					
					
					<!-- Action Tools -->
					<td>
					<?php if($row['confirmed'] == (null || 0)){ ?>
					<input id= "invoice_preview" type= "button" value = "حذف" onclick= history_delete_record("vcpDEL",<?php echo $row['invoice_number'];?>);>
					<input id= "invoice_preview" type= "button" value = "تأكيد" onclick= inventory_confirm("vcpCONFIRM",<?php echo $row['invoice_number'];?>);>
					<?php } ?>
					
					<?php if($row['confirmed'] == 1){ ?>
						<a href="#">
						  <span class="glyphicon glyphicon-ok"></span>
						</a>
					<?php } ?>		

					</td>
					
					
					
					
				</tr>
		<?php } ?>
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

                            </div>
                        </div>
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
		
		

		
		
		<!-- finish and cancel buttons -->
		
		<div>
			<input id= "invoice_cancel" type= "button" value = "CLOSE" onclick= history("CC","0");>

		</div>
<?php
		}
?>		

	
	
	
	
	
	
		</div>
	</body>
	    <!-- BEGIN CORE PLUGINS -->
        <script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="../assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../assets/pages/scripts/table-datatables-editable.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
		<script src="../scripts/history.js" type="text/javascript"></script>
		<script src="../scripts/done_cancel_inventory.js" type="text/javascript"></script>
		
        <!-- END THEME LAYOUT SCRIPTS -->


</html>