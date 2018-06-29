<?php
session_start();
 if(($_SESSION['rank'])!=="1"){
	exit("access denied");
}
?>

<?php include '../core/config.php' ?>
<?php

	  $arr = json_decode($_REQUEST["q"]);
	  $id = $arr[0];
	  $name=$arr[1];
	  $mail=$arr[2];
	  $address=$arr[3]; 
	  $contact=$arr[4];
	  $vendor_customer_id=$arr[5];
	  $newRow=$arr[6];
	  
	  $data=array($arr[1],$arr[2],$arr[3],$arr[4],$arr[5]);
	  //echo $vendor_customer_id;
	  
	  
	  if($newRow==1){
			$query="INSERT INTO vendor_customer
									(name,mail,address,contact,discription
									)VALUES (
									'$name','$mail','$address','$contact','$vendor_customer_id'
									)";
	
	
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
		
		$query="UPDATE vendor_customer
								SET name='$name', mail='$mail', address= '$address', contact='$contact',discription='$vendor_customer_id'
											WHERE ID =$id;";
							
									
      //  $result = $conn->query($query);
		
		if ($conn->query($query) == TRUE) {
				echo "Record updated successfully";
		}
		else {
				echo "Error updating record: " . $conn->error;
		}
	  }

	 $conn->close();
	 //print_r($arr);
	 //echo $query;
?>
