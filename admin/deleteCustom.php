<?php
	include 'connectionFile/connection.php';
	
	$customItemDesc = $_POST['DeleteCustomItemDesc'];
	
	//Checks to see if the customItem to be deleted exists	
	$sql0 = "SELECT itemDesc FROM customitems WHERE itemDesc='$customItemDesc'";
	$result0 = $conn->prepare($sql0);
	$result0->execute();
	if($result0->rowCount() == 0) {
		echo "That item does not exist and cannot be deleted.";
		exit;
	}
			
	$sql1 = "DELETE FROM customitems WHERE itemDesc='$customItemDesc'";
	$result1 = $conn->prepare($sql1);
	if($result1->execute()) {
		echo "Custom item " .$customItemDesc. " was deleted";
	}else {
		echo "Custom item failed to delete due to it not being in the database";
	}
?>