<?php include '../core/config.php' ?>
<?php

	$request = json_decode($_REQUEST["q"]);	
	$vendor_customer_id = $request[0];
	$vendor_customer_payment_value = $request[1];
	$dateval = $request[2];
	$table_order= $request[3];
	
	echo $vendor_customer_name . $vendor_customer_payment_value . $dateval . $id;

	


	// Approve current request
		if ($table_order=="D")
		{
			
			//Get Description;
			$query = "SELECT * FROM vendor_customer WHERE id='$vendor_customer_id'";

				if ($result = $conn->query($query))
					{
						$row = $result->fetch_array(MYSQLI_ASSOC);
						$discription = $row[discription];
						$vendor_customer_name = $row[name];
						echo $discription;
					}	
					
					
			//Get invoice_number
			$query = "SELECT invoice_number FROM vendor_customer_payment ORDER BY id DESC LIMIT 1";
				if ($result_i = $conn->query($query))
					{
							$row = $result_i->fetch_array(MYSQLI_ASSOC);
							
							$invoice_number=$row[invoice_number]+1;
							echo $invoice_number;
					}	
					
					
			
			//Get invoice_name
				$name = "فاتورة سداد";
				
				
			//Get confirmed
				$confirmed = 0;


			
					
			
			//update vendor_customer_payment
					$query = "INSERT INTO vendor_customer_payment (name,payment,vendor_customer_name,vendor_customer_id,invoice_number,date,discription,confirmed) 
										VALUES ('$name','$vendor_customer_payment_value','$vendor_customer_name','$vendor_customer_id','$invoice_number','$dateval','$discription','$confirmed')";
			

					if ($conn->query($query) == TRUE) {
							echo "تم نقل القيد الى فواتير السداد.. <br>";
					}
					else {
							echo "حدث خطأ أثناء عمليه نقل الفاتورة: " . $conn->error;
					}
					
				}

	 $conn->close();
	 //print_r($arr);
	 //echo $query;
		
?>
