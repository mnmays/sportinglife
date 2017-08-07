<?php 
	include 'connectionFile/connection.php';
	
	$customItemName = $_POST['AddCustomItemName'];
	$customItemSize = $_POST['AddCustomItemSize'];
	$customItemDesc = $_POST['AddCustomItemDesc'];
	$customItemPrice = $_POST['AddCustomItemPrice'];
	$customItemImage = addslashes(file_get_contents($_FILES['AddCustomItemImage']['tmp_name']));
			
	$sql1 = "INSERT INTO customitems (itemImage, itemSize, itemDesc, itemPrice, itemName) VALUES ('$customItemImage', '$customItemSize', '$customItemDesc', '$customItemPrice', '$customItemName')";
	if(mysql_query($sql1)) {
		echo "Custom item: " .$customItemName. " was inserted";
	}else {
		echo "Custom item failed to insert";
	}
?>