<?php
	include 'connectionFile/connection.php';
	
	$customItemName = $_POST['DeleteCustomItemName'];
	
	//Checks to see if the customItem to be deleted exists	
	$sql0 = "SELECT itemDesc FROM customitems WHERE itemDesc='$customItemName'";
	$result0 = mysql_query($sql0);
	if(mysql_num_rows($result0) == 0) {
		echo "That item does not exist and cannot be deleted.";
		exit;
	}
			
	$sql1 = "DELETE FROM customitems WHERE itemName='$customItemName'";
	if(mysql_query($sql1)) {
		echo "Custom item " .$customItemName. " was deleted";
	}else {
		echo "Custom item failed to delete due to it not being in the database";
	}
?>