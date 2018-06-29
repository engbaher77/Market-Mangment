
<?php include '../core/config.php' ?>
<?php

	$request = json_decode($_REQUEST["q"]);	
	$id = $request[0];
	$dateval = $request[1];
	$cash = $request[2];
	$deferred = $request[3];
	$vendor_customer_name = $request[4];
	$vendor_customer_id = $request[5];
	


	 // cancel request for current invoice
		if ($id=="c")
		{
			
            $query = "TRUNCATE current_invoice";
		
			if ($conn->query($query) == TRUE) {
					echo "تم إلغاء العمليـــه بنجـــاح";
			}
			else {
					echo "حدث خطأ: " . $conn->error;
			}
		}
		
	

	// Approve current request
		elseif ($id=="D")
		{
			
			//last id;
			$query = "SELECT invoice_number FROM sells_invoices ORDER BY id DESC LIMIT 1";
	
			
			
				if ($result = $conn->query($query))
					{
							$row = $result->fetch_array(MYSQLI_ASSOC);
							
							$invoice_number=$row[invoice_number]+1;
							//echo $invoice_number;

					}	
					
					
			//move invoice to sells_invoices
			
			$query="SELECT * FROM current_invoice";

		 
			if ($result = $conn->query($query))
			{
				while ( $row = $result->fetch_array(MYSQLI_ASSOC))
				{
					
					$ID = $row[id];
					$Barcode = $row[type_id];
					$Name = $row[name];
					$Quantity = $row[quantity];
					$remain_Quantity = $row[remain_Quantity];
					$Description = $row[discription];
					$Price = $row[price];
					//$sale = $row[sale];
					$sale = "0";
					$Total = $Price * $Quantity;
					$Invoice_number = $invoice_number;
					//ignor vendor_customer_name if cash true
					if($cash == true){$vendor_customer_name = "";$deferred=0;}
					if($deferred == true){$cash = 0;}
					//echo $vendor_customer_name;
					//echo "hello";
					
					
					
					
					//update sells_invoices
					$query = "INSERT INTO sells_invoices (type_number,name,quantity,discription,price,sale,total,invoice_number,date,cash,deferred,vendor_customer_name,vendor_customer_id) 
										VALUES ('$Barcode','$Name','$Quantity','$Description','$Price','$sale','$Total','$Invoice_number','$dateval','$cash','$deferred','$vendor_customer_name','$vendor_customer_id')";
			

					if ($conn->query($query) == TRUE) {
							echo "تم نقل الفاتورة الى فواتير المبيعات.. <br>";
					}
					else {
							echo "حدث خطأ أثناء عمليه نقل الفاتورة: " . $conn->error;
					}

						
					
					
					
					//update Repairs
					$query = "UPDATE repairs SET Quantity=Quantity-'$Quantity' WHERE Barcode='$Barcode'";					
					

					if ($conn->query($query) == TRUE) {
							echo "تم تاكيد عمليه النقل.. <br>";
					}
					else {
							echo "Error record: " . $conn->error;
					}
					
					
				/*	
					
					//update inventory
					$query = "INSERT INTO inventory (name,debit,credit,total,invoice_number,date) 
										VALUES ('فاتورة بيع','$Total','0','$Total','$Invoice_number','$dateval')";
					

					if ($conn->query($query) == TRUE) {
							echo "تم تاكيد عمليه النقل.. <br>";
					}
					else {
							echo "Error record: " . $conn->error;
					}
					
					*/
					//echo $query;
					//echo "<br>";
					//echo $ID;
					//echo "Hello";
					//echo $remain_Quantity;
					//echo "<br>";
					
				}

			}
			
			
			//Delete Current invoice
			$query = "TRUNCATE current_invoice";
		
			if ($conn->query($query) == TRUE) {
					echo "الفاتورة الحالية خاليه";
			}
			else {
					echo "Error record: " . $conn->error;
			}
			

		}
					
		
	 $conn->close();
	 //print_r($arr);
	 //echo $query;
		
?>
