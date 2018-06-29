<?php
require_once '../core/config.php';
?>



<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
	
	<title>Invoice Perview</title>
		<!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="../assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->	
	

	
	
	
	<body>
	<!-- search button -->
	
	<div class = "search_button">
	<input type="search" class="light-table-filter" id="searchFilter" data-table="order-table" placeholder="Filter"><br><br>
	<br><br>
	
	</div>
	
	<!-- Search Table -->
	
	<div id="container">

			
		<!-- Current invoice table -->
	
	<?php
		$record_id = $_REQUEST["q"];
		//$request = json_decode($_REQUEST["q"]);	
		//$table_id = $request[0];
		//$record_id = $request[1];
		//echo $table_id;
		//if($table_id == "PV"){
		//echo $record_id;
		$query="SELECT * FROM purchases_invoices WHERE invoice_number = $record_id";
                                    
		if ($result = $conn->query($query))
		{
	?>
		<table class="order-table table table-striped table-hover table-bordered" id ="current_invoice">
			<thead>
				<tr>
					<th>الباركود</th>
					<th>الصنف</th>
					<th>الكميه</th>
					<th>السعر الابتدائ</th>
					<th>سعر الشراء</th>
					<th>الوصف</th>
					<th>ضريبه</th>
					<th>خصم</th>
					<th>المجموع</th>
					<th>متوسط السعر</th>
				</tr>
            </thead>
		

		
			<tbody>
	  <?php
		while ( $row = $result->fetch_array(MYSQLI_ASSOC))
		{
		?>
				<tr>
					<td><?php echo $row['type_number']; ?></td>
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['quantity']; ?></td>
					<td><?php echo $row['price']; ?></td>
					<td><?php echo $row['new_price']; ?></td>
					<td><?php echo $row['discription']; ?></td>
					<td></td>
					<td></td>
					<td><?php echo $row['Total']; ?></td>
					<td><?php echo $row['average_price']; ?></td>
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
					<td></td>
					<td>
						<?php
							$record_id = $_REQUEST["q"];
							$query = "SELECT SUM(Total)FROM purchases_invoices WHERE invoice_number=$record_id";
							//echo $query;
							if ($results = $conn->query($query))
								{
								$rows = $results->fetch_array(MYSQLI_ASSOC);
								
									if ($conn->query($query) == TRUE) {
										//echo "تم إضافة المجموع الكلى";
								echo $rows['SUM(Total)'];	
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
		//}
		?>
		</table>
		

		
		

		
		<div id="response">
		</div>
		
		<!-- finish and cancel buttons -->
		
		<div>

			<input id= "invoice_cancel" type= "button" value = "CLOSE" onclick= history("CP","0");>

		</div>
		
	
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
		
        <!-- END THEME LAYOUT SCRIPTS -->

</html>