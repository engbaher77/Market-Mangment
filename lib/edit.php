<?php
session_start();
 if(($_SESSION['rank'])!=="1"){
	exit("access denied");
}
?>

<?php include '../core/config.php' ?>
<?php
 $query="SELECT * FROM repairs";

	 
    if ($result = $conn->query($query))
    {
	  $arr = json_decode($_REQUEST["q"]);
	  $id = $arr[0];
	  $barcode=$arr[1];
	  $name=$arr[2];
	  $quantity=floatval($arr[3]); 
	  $new_price=floatval($arr[4]);
	$price=floatval($arr[5]);
	  $description=$arr[6];
	  $newRow=$arr[7];
	  
	  $data=array($arr[1],$arr[2],$arr[3],$arr[4],$arr[5]);
	  
	  
	  if($newRow==1){
			$query="INSERT INTO repairs
									(Barcode,Name,Quantity,Price,new_price,Description
									)VALUES (
									'$barcode','$name','$quantity','$price','$new_price','$description'
									)";
		//echo $query;
		//$result = $conn->query($query);
		
			if ($conn->query($query) == TRUE) {
					echo "New Record Entered successfully";
			}
			else {
					echo "Error Entering record: " . $conn->error;
			}
		}
		
		
		
		
		
		/*
		
				************		Editing    *********
		
		*/	
	  else{
		
		$query="UPDATE repairs
								SET Barcode='$barcode', Name='$name', Price='$price', new_price= '$new_price', Quantity='$quantity',Description='$description'
											WHERE ID =$id;";
							
									
      //  $result = $conn->query($query);
		
		if ($conn->query($query) == TRUE) {
				echo "Record updated successfully";
		}
		else {
				echo "Error updating record: " . $conn->error;
		}
	  }
	}
	 $conn->close();
	 //print_r($arr);
	 //echo $query;
?>
