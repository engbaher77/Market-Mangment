<?php include '../core/config.php' ?>
<?php



//fetch ajax message
	$request = json_decode($_REQUEST["q"]);	
	$id = $request[0];
	$request_quantity = floatval($request[1]);
	$request_new_price = floatval($request[2]);

	
//insert data to current_invoice table
// 1- get variables from main table
	$query="SELECT * FROM repairs WHERE ID=$id";

	 
		if ($result = $conn->query($query))
		{
			
            $row = $result->fetch_array(MYSQLI_ASSOC);
			$ID = $row[ID];
			$Barcode = $row[Barcode];
			$Name = $row[Name];
			$Old_Quantity = $row[Quantity];
			$Quantity = $request_quantity;
			$remain_Quantity = $Old_Quantity + $Quantity;
			$Price = $row[Price];
			//$newprice = $request_new_price;
			$Description = $row[Description];
			//$Total = ($Quantity * $newprice);
			$Total = $request_new_price;
			$newprice = ($Total / $Quantity);
			$total_All = $Total;
			$average_price = (($Price) + ($newprice))/2;

			//echo $newprice;
			//echo $average_price;
			//echo $Total;
			//echo Quantity;
			//echo $id;
			//echo "<br>";
			//echo $ID;
			//echo "<br>";
			//echo $Name;
			//echo "<br>";
			//echo $query;
			//$result = $conn->query($query);
		
			if ($conn->query($query) == TRUE) {
					//echo "New Record Entered successfully";
												}
			else {
					//echo "Error Entering record: " . $conn->error;
					}
		}
	  
	 // insert data to current invoice table
	 //test quantity
		if ($Quantity >= 0){
			$query="INSERT INTO current_purchases_invoices
								(type_id,name,quantity,price,new_price,discription,total,remain_Quantity,total_All,average_price
									)VALUES (
										'$Barcode','$Name','$Quantity','$Price','$newprice','$Description','$Total','$remain_Quantity','$total_All','$average_price')";
			//echo $query;
			//$result = $conn->query($query);
		
			if ($conn->query($query) == TRUE) {
					echo "New Record Entered successfully";
			}
			else {
					$Error = $conn->error;
					if($Error=="Duplicate entry '$Barcode' for key 'type_id_UNIQUE'"){echo "لايمكن إدخال نفس الصنف مرتان فى فاتورة الشراء";}
					else{echo "Error:  " . $Error;}
					
					//echo "Error Entering record: " . $conn->error;
			}
			
			echo "";
		}
		
		if(Quantity < 0){
			
			echo "لقد ادخلت الكمية بطريقة غير صحيحة";
		}
		
		
	 $conn->close();
	 //print_r($arr);
	 //echo $query;
?>
