<?php
	include 'connection.php';
	
	$customItemName = $_POST['DeleteCustomItemName'];
			
	$sql1 = "DELETE FROM customitems WHERE itemName='$customItemName'";
	if(mysql_query($sql1)) {
		echo "Custom item " .$customItemName. " was deleted";
	}else {
		echo "Custom item failed to delete due to it not being in the database";
	}
?>