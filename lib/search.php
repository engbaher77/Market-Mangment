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
        $q = $_REQUEST["q"];
		
        $query="DELETE FROM repairs WHERE ID = $q";
        $result = $conn->query($query);
		
		if ($conn->query($query) == TRUE) {
				echo "Record deleted successfully";
		}
		else {
				echo "Error deleting record: " . $conn->error;
		}
	}
	 $conn->close();
	
?>