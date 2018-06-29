<?php include '../core/config.php' ?>
<?php



//fetch ajax message
	$request = json_decode($_REQUEST["q"]);	
	$id = $request[0];
	

//Get last invoice_number in invoice tables	
	$query = "SELECT invoice_number FROM current_purchases_invoices ORDER BY id DESC LIMIT 1";
			if ($result = $conn->query($query))
					{
						$row = $result->fetch_array(MYSQLI_ASSOC);
						$last_invoice_number = $row[invoice_number];
						
						if ($conn->query($query) == TRUE) {
									echo "تم تاكيد عمليه النقل.. <br>";
								}
								else {
									echo "Error record: " . $conn->error;
								}
					}
					echo $last_invoice_number;
	

//BACKWEND
	if($id == "bw"){
					$query = "SELECT invoice_number FROM purchases_invoices ORDER BY id DESC LIMIT 1";
					if ($result = $conn->query($query))
					{
						$row = $result->fetch_array(MYSQLI_ASSOC);
						$invoice_number = $row[invoice_number];
						
							if($last_invoice_number == "" || "0"){
							$current_invoice_number =$invoice_number;
								}
						
							else{
								$current_invoice_number = $last_invoice_number - 1;
								$query = "TRUNCATE current_purchases_invoices";
			
								if ($conn->query($query) == TRUE) {
									echo "تم إلغاء العمليـــه بنجـــاح";
								}
								else {
									echo "حدث خطأ: " . $conn->error;
									}
								}
						
						$query = "SELECT * FROM purchases_invoices WHERE invoice_number = $current_invoice_number";
							if ($result = $conn->query($query)){
								while ($row = $result->fetch_array(MYSQLI_ASSOC)){
									$invoice_number=$row[invoice_number];
									$type_number= $row[type_number];
									$name= $row[name];
									$quantity = $row[quantity];
									$discription= $row[discription];
									$price= $row[price];
									$new_price= $row[new_price];
									$sale= $row[sale];	
									$total= $row[Total];
									$average_price= $row[average_price];
							
														//echo $invoice_number;
														//echo $type_number;
														//echo $name;
														//echo $quantity;
														//echo $discription;
														//echo $price;
														//echo $new_price;
														//echo $sale;
														//echo $total;
														//echo $average_price;


							$query = "INSERT INTO current_purchases_invoices (type_id,name,quantity,discription,price,new_price,sale,total,average_price,invoice_number) 
								VALUES ('$type_number','$name','$quantity','$description','$price','$new_price','$sale','$total','$average_price','$invoice_number')";
							
							//echo $query;
							//echo $total;
							//echo $invoice_number;
							}
						}
		
					if ($conn->query($query) == TRUE) {
									echo "تم تاكيد عمليه النقل.. <br>";
								}
								else {
									echo "Error record: " . $conn->error;
								}
					}
					
			if ($conn->query($query) == TRUE) {
									echo "تم تاكيد عمليه النقل.. <br>";
								}
								else {
									echo "Error record: " . $conn->error;
								}

	}
	
	
	
	//FORWARD
	if($id == "fw"){
			$query = "SELECT invoice_number FROM purchases_invoices ORDER BY id DESC LIMIT 1";
			if ($result = $conn->query($query))
					{
						$row = $result->fetch_array(MYSQLI_ASSOC);
						$invoice_number = $row[invoice_number];
						$current_invoice_number =$last_invoice_number +1;
						
							$query = "TRUNCATE current_purchases_invoices";
		
							if ($conn->query($query) == TRUE) {
								echo "تم إلغاء العمليـــه بنجـــاح";
							}
							else {
								echo "حدث خطأ: " . $conn->error;
								}
								
						$query = "SELECT * FROM purchases_invoices WHERE invoice_number = $current_invoice_number";
						if ($result = $conn->query($query)){
						while ($row = $result->fetch_array(MYSQLI_ASSOC)){
							$invoice_number=$row[invoice_number];
							$type_number= $row[type_number];
							$name= $row[name];
							$quantity = $row[quantity];
							$discription= $row[discription];
							$price= $row[price];
							$new_price= $row[new_price];
							$sale= $row[sale];	
							$total= $row[Total];
							$average_price= $row[average_price];
							
														//echo $invoice_number;
														//echo $type_number;
														//echo $name;
														//echo $quantity;
														//echo $discription;
														//echo $price;
														//echo $new_price;
														//echo $sale;
														//echo $total;
														//echo $average_price;


							$query = "INSERT INTO current_purchases_invoices (type_id,name,quantity,discription,price,new_price,sale,total,average_price,invoice_number) 
					VALUES ('$type_number','$name','$quantity','$description','$price','$new_price','$sale','$total','$average_price','$invoice_number')";
							
							//echo $query;
							//echo $total;
							//echo $invoice_number;
							}
						}
		
			if ($conn->query($query) == TRUE) {
									echo "تم تاكيد عمليه النقل.. <br>";
								}
								else {
									echo "Error record: " . $conn->error;
								}
					}
					
			if ($conn->query($query) == TRUE) {
									echo "تم تاكيد عمليه النقل.. <br>";
								}
								else {
									echo "Error record: " . $conn->error;
								}

	}
	
			else {
							echo "حدث خطأ أثناء عمليه نقل الفاتورة: " . $conn->error;
							
							
					}
		
	 $conn->close();
	 //print_r($arr);
	 //echo $query;
?>