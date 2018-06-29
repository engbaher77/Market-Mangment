<?php include '../core/config.php' ?>
<?php

	$request = json_decode($_REQUEST["q"]);	
	$invoice_order = $request[0];
	$invoice_number = $request[1];

	
	//echo($invoice_order);

	// Approve current request purchases_invoices
	if ($invoice_order=="PCONFIRM")
		{
			
			//last id;
			$query = "SELECT * from `database`.purchases_invoices
																	WHERE purchases_invoices.invoice_number = $invoice_number";
	
			
				if ($result = $conn->query($query))
					{
							$row = $result->fetch_array(MYSQLI_ASSOC);
							
						

						
						//Get name
							$name = "فاتورة شراء";
							
							
						//Get debit value
							$debit = 0;
							
							
						//Get credit value
							$query = "SELECT SUM(Total) from `database`.purchases_invoices
																	WHERE purchases_invoices.invoice_number = $invoice_number";
								if ($results = $conn->query($query))
									{	
										$rows = $results->fetch_array(MYSQLI_ASSOC);
										$credit = $rows['SUM(Total)'];
									}
								

								
								
								
						//Get date		
							$date=$row[date];
							
							
						//Get balance
							
							$query = "SELECT balance FROM inventory ORDER BY id DESC LIMIT 1;";
								if ($resultss = $conn->query($query))
									{	
										$rowss = $resultss->fetch_array(MYSQLI_ASSOC);
										$pervious_balance = $rowss[balance];
									}
								$balance = $pervious_balance - $credit;	
								//echo $pervious_balance;
								
								
						//Get confirmation
							$confirmed = 1;
							
							
						//Get cash value
							$cash = $row[cash];
							
						//Get deferred value
							$deferred = $row[deferred];
							
						//Get vendor_customer_name
							$vendor_customer_name = $row[vendor_customer_name];
							
							
						//Get vendor_customer_id
							$vendor_customer_id = $row[vendor_customer_id];
							
							
						//Get Discription
							$discription = "مورد";
								
						
						//check if invoice is cash?
							if(($cash == 1)&&($deferred == 0)){
						//update inventory
								$query = "INSERT INTO inventory (name,debit,credit,balance,invoice_number,date) 
													VALUES ('$name','$debit','$credit','$balance','$invoice_number','$date')";
								

									if ($conn->query($query) == TRUE) {
											echo "تم تاكيد عمليه النقل.. <br>";
									}
									else {
											echo "Error record: " . $conn->error;
									}
							}
								
								
								
						//check if invoice is deferred?
							if(($cash == 0)&&($deferred == 1)){
								
						//update vendors balance
								$query = "INSERT INTO vendor_customer_balance (name,debit,credit,vendor_customer_name,vendor_customer_id,invoice_number,date,discription) 
													VALUES ('$name','$debit','$credit','$vendor_customer_name','$vendor_customer_id','$invoice_number','$date','$discription')";
								

									if ($conn->query($query) == TRUE) {
											echo "تم تاكيد عمليه النقل.. <br>";
									}
									else {
											echo "Error record: " . $conn->error;
									}
							}		
								
								//update purchases_invoices
							$query = "UPDATE purchases_invoices SET confirmed='$confirmed' WHERE invoice_number = '$invoice_number'";
							

								if ($conn->query($query) == TRUE) {
										echo "تم التأكيد.. <br>";
								}
								else {
										echo "Error record: " . $conn->error;
								}
								
							

					}	
					
					
					
					
			//Error
				else {
						echo "حدث خطأ أثناء عمليه نقل الفاتورة: " . $conn->error;
				}
	
		
		}
					
					
					
					
	/*

		Sells Invoices..............
		
		
	*/

					
					
	// Approve current request sells_invoices
	if ($invoice_order == "SCONFIRM")
		{
			
			//last id;
			$query = "SELECT * from `database`.sells_invoices
																	WHERE sells_invoices.invoice_number = $invoice_number";
	
			
				if ($result = $conn->query($query))
					{
							$row = $result->fetch_array(MYSQLI_ASSOC);
							
						

						
						//Get name
							$name = "فاتورة بيع";
							
							
						//Get debit value
							//$debit = 0;
							$query = "SELECT SUM(Total) from `database`.sells_invoices
																	WHERE sells_invoices.invoice_number = $invoice_number";
								if ($results = $conn->query($query))
									{	
										$rows = $results->fetch_array(MYSQLI_ASSOC);
										$debit = $rows['SUM(Total)'];
									}	
							
						//Get credit value

							$credit = 0;	

								
								
								
						//Get date		
							$date=$row[date];
							
							
						//Get balance
							
							$query = "SELECT balance FROM inventory ORDER BY id DESC LIMIT 1;";
								if ($resultss = $conn->query($query))
									{	
										$rowss = $resultss->fetch_array(MYSQLI_ASSOC);
										$pervious_balance = $rowss[balance];
									}
								$balance = $pervious_balance + $debit;	
								//echo $pervious_balance;
								
								
						//Get confirmation
							$confirmed = 1;
							
							
						//Get cash value
							$cash = $row[cash];
							
						//Get deferred value
							$deferred = $row[deferred];
							
						//Get vendor_customer_name
							$vendor_customer_name = $row[vendor_customer_name];
							
						//Get vendor_customer_id
							$vendor_customer_id = $row[vendor_customer_id];
							
						//Get discription
							$discription = "عميل";
								
							


							
						//check if invoice is cash?
							if(($cash == 1)&&($deferred == 0)){
						//update inventory
							$query = "INSERT INTO vendor_customer_balance (name,debit,credit,vendor_customer_name,invoice_number,date) 
												VALUES ('$name','$debit','$credit','$vendor_customer_name','$invoice_number','$date')";
							

								if ($conn->query($query) == TRUE) {
										echo "تم تاكيد عمليه النقل.. <br>";
								}
								else {
										echo "Error record: " . $conn->error;
								}
							}
							
							
							
							//check if invoice is deferred?
							if(($cash == 0)&&($deferred == 1)){
								
						//update vendors balance
								$query = "INSERT INTO vendor_customer_balance (name,debit,credit,vendor_customer_name,vendor_customer_id,invoice_number,date,discription) 
													VALUES ('$name','$debit','$credit','$vendor_customer_name','$vendor_customer_id','$invoice_number','$date','$discription')";
								

									if ($conn->query($query) == TRUE) {
											echo "تم تاكيد عمليه النقل.. <br>";
									}
									else {
											echo "Error record: " . $conn->error;
									}
							}
							
							
							
							
								
								
								//update sells_invoices
							$query = "UPDATE sells_invoices SET confirmed='$confirmed' WHERE invoice_number = '$invoice_number'";
							

								if ($conn->query($query) == TRUE) {
										echo "تم التأكيد.. <br>";
								}
								else {
										echo "Error record: " . $conn->error;
								}
								
							

					}	
					
					
					
					
			//Error
				else {
						echo "حدث خطأ أثناء عمليه نقل الفاتورة: " . $conn->error;
				}
	
		
		}
		
		
		
		
		
		
		
		
		
							
	/*

		vendor_customer_payments..............
		
		
	*/

					
					
	// Approve current request for vendor_customer_payments
	if ($invoice_order == "vcpCONFIRM")
		{
			
			//last id;
			$query = "SELECT * from `database`.vendor_customer_payment
																	WHERE vendor_customer_payment.invoice_number = $invoice_number";
	
			
				if ($result = $conn->query($query))
					{
							$row = $result->fetch_array(MYSQLI_ASSOC);
							
						

						
						//Get name
							$name = "قيد ســـداد";
							
							
						//Get debit value
							$debit = 0;
							/*
							$query = "SELECT SUM(Total) from `database`.sells_invoices
																	WHERE sells_invoices.invoice_number = $invoice_number";
								if ($results = $conn->query($query))
									{	
										$rows = $results->fetch_array(MYSQLI_ASSOC);
										$debit = $rows['SUM(Total)'];
									}
							*/
							
						//Get credit value

							$credit = 0;	

								
								
						
							
						//Get date		
							$date=$row[date];
							
							
						//Get balance
							
							$query = "SELECT balance FROM inventory ORDER BY id DESC LIMIT 1;";
								if ($resultss = $conn->query($query))
									{	
										$rowss = $resultss->fetch_array(MYSQLI_ASSOC);
										$pervious_balance = $rowss[balance];
									}
								$balance = $pervious_balance + $debit;	
								//echo $pervious_balance;
								
								
						//Get confirmation
							$confirmed = 1;
				
							
						//Get vendor_customer_name
							$vendor_customer_name = $row[vendor_customer_name];
							
						//Get vendor_customer_id
							$vendor_customer_id = $row[vendor_customer_id];
							
						//Get discription
							$discription = $row[discription];
								
							


							
						//check if invoice is cash?
							if($discription=="vendor"){
								
							//Get vendor_customer_payment_value
								$debit = $row[payment];
							//update vendor_customer_balance
								$query = "INSERT INTO vendor_customer_balance (name,debit,credit,vendor_customer_name,vendor_customer_id,invoice_number,date) 
													VALUES ('$name','$debit','$credit','$vendor_customer_name','$vendor_customer_id','$invoice_number','$date')";
								

									if ($conn->query($query) == TRUE) {
											echo "تم تاكيد عمليه النقل.. <br>";
									}
									else {
											echo "Error record: " . $conn->error;
									}
							}
							
							
							
							
							
							
							
							
								
								
								//update vendor_customer_payment table
							$query = "UPDATE vendor_customer_payment SET confirmed='$confirmed' WHERE invoice_number = '$invoice_number'";
							

								if ($conn->query($query) == TRUE) {
										echo "تم التأكيد.. <br>";
								}
								else {
										echo "Error record: " . $conn->error;
								}
								
							

					}	
					
					
					
					
			//Error
				else {
						echo "حدث خطأ أثناء عمليه نقل الفاتورة: " . $conn->error;
				}
	
		
		}
								
					
					
					
		
	 $conn->close();
	 //print_r($arr);
	 //echo $query;
		
?>
