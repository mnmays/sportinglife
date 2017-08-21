<?php 
	include 'connectionFile/connection.php';

	$customItemDesc = $_POST['AddCustomItemDesc'];
	$customItemPrice = $_POST['AddCustomItemPrice'];
	$customItemImage = addslashes(file_get_contents($_FILES['AddCustomItemImage']['tmp_name']));
	
	$sql0 = "SELECT * FROM customitems WHERE itemDesc='$customItemDesc'";
	$result0 = $conn->prepare($sql0);
	$result0->execute();
	if($result0->rowCount() > 0) {
		echo "That custom item already exists. ";
		exit;
	}
			
	$sql1 = "INSERT INTO customitems (itemImage, itemDesc, itemPrice) VALUES ('$customItemImage', '$customItemDesc', '$customItemPrice')";
	$result1 = $conn->prepare($sql1);
	if($result1->execute()) {
		echo "Custom item: " .$customItemName. " was inserted";
	}else {
		echo "Custom item failed to insert";
	}
?>