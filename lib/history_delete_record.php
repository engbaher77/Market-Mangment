<?php include '../core/config.php' ?>
<?php

//fetch ajax message
	$request = json_decode($_REQUEST["q"]);	
	$table_id   =  $request[0];
	$record_id  =  $request[1];
	//echo $table_id;
	//echo $record_id;
	
	
	
	if($table_id == "PDEL"){
	//Select all recordes with the current purchases_invoices invoice_number
			
		$query="SELECT * FROM purchases_invoices WHERE invoice_number = $record_id";

		 
			if ($result = $conn->query($query))
			{
				while ( $row = $result->fetch_array(MYSQLI_ASSOC))
				{
					
					//$ID = $row[id];
					$Barcode = $row[type_number];
					//$Name = $row[name];
					$Quantity = $row[quantity];
					$Invoice_number = $invoice_number;
					//echo $Invoice_number;
					
					
					//Subtract each record from repairs
					$query = "UPDATE repairs SET Quantity =Quantity - $Quantity WHERE Barcode = '$Barcode'";
					//echo $query;
			
							if ($conn->query($query) == TRUE) {
								echo "تمت عمليه التغيير .. <br>";
							}
							else {
								echo "Error record: " . $conn->error;
							}
					
					
					
					
				}
			}
			
				//Subtract each record from repairs
					$query = "DELETE FROM purchases_invoices WHERE invoice_number = $record_id";
					//echo $query;
			
							if ($conn->query($query) == TRUE) {
								echo "تمت عمليه الحذف .. <br>";
							}
							else {
								echo "Error record: " . $conn->error;
							}
	
	}
	
	
	
	
	
	
//Select all recordes with the current sells invoices invoice_number
	if($table_id == "SDEL"){
	
			
		$query="SELECT * FROM sells_invoices WHERE invoice_number = $record_id";

		 
			if ($result = $conn->query($query))
			{
				while ( $row = $result->fetch_array(MYSQLI_ASSOC))
				{
					
					//$ID = $row[id];
					$Barcode = $row[type_number];
					//$Name = $row[name];
					$Quantity = $row[quantity];
					$Invoice_number = $invoice_number;
					//echo $Invoice_number;
					
					
					//Subtract each record from repairs
					$query = "UPDATE repairs SET Quantity =Quantity + $Quantity WHERE Barcode = '$Barcode'";
					//echo $query;
			
							if ($conn->query($query) == TRUE) {
								echo "تمت عمليه التغيير .. <br>";
							}
							else {
								echo "Error record: " . $conn->error;
							}
					
					
					
					
				}
			}
			
				//Subtract each record from repairs
					$query = "DELETE FROM sells_invoices WHERE invoice_number = $record_id";
					//echo $query;
			
							if ($conn->query($query) == TRUE) {
								echo "تمت عمليه الحذف .. <br>";
							}
							else {
								echo "Error record: " . $conn->error;
							}
	
	}
	
	
	
	//Select all recordes with the current vendor customer payment invoice_number
	if($table_id == "vcpDEL"){
	
			
		$query="DELETE FROM vendor_customer_payment WHERE invoice_number = $record_id";
			
							if ($conn->query($query) == TRUE) {
								echo "تمت عملية الحذف .. <br>";
							}
							else {
								echo "Error record: " . $conn->error;
							}
	
	}
	
	
	 $conn->close();
	 //print_r($arr);
	 //echo $query;
		
?>
