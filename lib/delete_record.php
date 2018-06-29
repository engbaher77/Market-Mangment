<?php include '../core/config.php' ?>
<?php

//fetch ajax message
	$request = json_decode($_REQUEST["q"]);	
	$table_id = $request[0];
	$record_id = $request[1];
	
	//echo $table_id;
	//echo $record_id;

	
	if($table_id == "P"){	
		$query="SELECT * FROM current_purchases_invoices";

		 
		if ($result = $conn->query($query))
		{
			
			$query="DELETE FROM current_purchases_invoices WHERE ID = $record_id";
			$result = $conn->query($query);
			
			if ($conn->query($query) == TRUE) {
					echo "Purchase Record deleted successfully";
			}
			else {
					echo "Error deleting purchase record: " . $conn->error;
			}
		}
		 $conn->close();
	}

	elseif($table_id == "C"){	
		$query="SELECT * FROM current_invoice";

		 
		if ($result = $conn->query($query))
		{
			
			$query="DELETE FROM current_invoice WHERE ID = $record_id";
			$result = $conn->query($query);
			
			if ($conn->query($query) == TRUE) {
					echo "Sells Record deleted successfully";
			}
			else {
					echo "Error deleting sells record: " . $conn->error;
			}
		}
		 $conn->close();
	}
	
?>
