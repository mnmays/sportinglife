<?php
	include 'connectionFile/connection.php';
	
	$customItemDesc = $_POST['EditCustomItemDesc']; 												//Needed to edit the specified item
	$newCustomItemDesc = $_POST['EditCustomItemChangeDesc'];										//Holds the new name of the custom item
	$customItemSize = $_POST['EditCustomItemSize'];													//Holds the new size of the custom item	
	$customItemPrice = $_POST['EditCustomItemPrice'];												//Holds the new price of the custom item
	$customItemImage = addslashes(file_get_contents($_FILES['EditCustomItemImage']['tmp_name']));	//Holds the new image for the custom item
	
	//Checks if the custom item they want to edit exists
	$sql0 = "SELECT itemDesc FROM customitems WHERE itemDesc='$customItemDesc'";
	$result0 = $conn->prepare($sql0);
	$result0->execute();
	if($result0->rowCount() == 0) {
		echo "Custom Item " .$customItemName. " does not exist.";
		exit;
	}
	
	//Checks if the custom item name they want to edit the custom item name too exists
	$sql1 = "SELECT itemDesc FROM customitems WHERE itemDesc='$newCustomItemDesc'";
	$result1 = $conn->prepare($sql1);
	$result1->execute();
	if($result1->rowCount() > 0) {
		echo "That custom item already exists. ";
		exit;
	}

	//Updates the custom item size
	if($customItemSize) {
		$sql2 = "UPDATE customitems SET itemSize='$customItemSize' WHERE itemDesc='$customItemDesc'";
		$result2 = $conn->prepare($sql2);
		if($result2->execute()) {
			echo "Custom Item Size changed to " .$customItemSize. "</br>";
		}else {
			echo "Custom Item Size failed to edit</br>";
		}
	}
	
	//Updates the custom item price
	if($customItemPrice) {
		$sql4 = "UPDATE customitems SET itemPrice='$customItemPrice' WHERE itemDesc='$customItemDesc'";
		$result4 = $conn->prepare($sql4);
		if($result4->execute()) {
			echo "Custom Item Price changed to " .$customItemPrice. "</br>";
		}else {
			echo "Custom Item Price failed to edit</br>";
		}
	}
	
	//Updates the custom item image
	if($customItemImage) {
		$sql5 = "UPDATE customitems SET itemImage='$customItemImage' WHERE itemDesc='$customItemDesc'";
		$result5 = $conn->prepare($sql5);
		if($result5->execute()) {
			echo "Custom Item Image was edited</br>";
		}else {
			echo "Custom Item Image failed to edit</br>";
		}
	}
		
	//Updates the custom item desc
	//THIS MUST HAPPEN LAST
	if($customItemDesc) {
		$sql3 = "UPDATE customitems SET itemDesc='$newCustomItemDesc' WHERE itemDesc='$customItemDesc'";
		$result3 = $conn->prepare($sql3);
		if($result3->execute()) {
			echo "Custom Item Name was edited</br>";
		}else {
			echo "Custom Item Name failed to edit</br>";
		}
	}
?>