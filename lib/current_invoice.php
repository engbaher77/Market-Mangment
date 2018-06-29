<?php include '../core/config.php' ?>
<?php



//fetch ajax message
	$request = json_decode($_REQUEST["q"]);	
	$id = $request[0];
	$request_quantity = floatval($request[1]);
	$new_price = floatval($request[2]);

	
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
			$remain_Quantity = $Old_Quantity - $Quantity;
			//$Price = $row[Price];
			//$Price = $new_price;
			$Description = $row[Description];
			$Total = $new_price;
			$Price = ($Total / $Quantity);
			$total_All = $Total;


			//echo $Total;
			//echo $Price;
			//echo $remain_Quantity;
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
		if ($remain_Quantity >= 0){
			$query="INSERT INTO current_invoice
								(type_id,name,quantity,price,discription,total,remain_Quantity,total_All
									)VALUES (
										'$Barcode','$Name','$Quantity','$Price','$Description','$Total','$remain_Quantity','$total_All')";
			//echo $query;
			//$result = $conn->query($query);
		
			if ($conn->query($query) == TRUE) {
					//echo "New Record Entered successfully";
			}
			else {
					echo "Error Entering record: " . $conn->error;
			}
			
			echo "";
		}
		
		if($remain_Quantity < 0){
			
			echo "الكمية المطلوبه اكبر من الكمية الموجوده";
		}
		
		
	 $conn->close();
	 //print_r($arr);
	 //echo $query;
?>
