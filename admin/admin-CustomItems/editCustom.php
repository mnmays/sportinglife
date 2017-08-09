<?php
	include 'connectionFile/connection.php';
	
	$customItemName = $_POST['EditCustomItemName']; 												//Needed to edit the specified item
	$newCustomItemName = $_POST['EditCustomItemChangeName'];										//Holds the new name of the custom item
	$customItemSize = $_POST['EditCustomItemSize'];													//Holds the new size of the custom item
	$customItemDesc = $_POST['EditCustomItemDesc'];													//Holds the new desc of the custom item
	$customItemPrice = $_POST['EditCustomItemPrice'];												//Holds the new price of the custom item
	$customItemImage = addslashes(file_get_contents($_FILES['EditCustomItemImage']['tmp_name']));	//Holds the new image for the custom item
	
	//Checks if the custom item they want to edit exists
	$sql0 = "SELECT itemName FROM customitems WHERE itemName='$customItemName'";
	$result0 = mysql_query($sql0);
	if(mysql_num_rows($result0) == 0) {
		echo "Custom Item " .$customItemName. " does not exist.";
		exit;
	}
	
	//Checks if the custom item name they want to edit the custom item name too exists
	//$sql1 = "SELECT seriesID FROM cards WHERE seriesID='$newSeriesID'";
	//$result1 = mysql_query($sql1);
	//if(mysql_num_rows($result1) == 0) {
		//echo "Series " .$newSeriesID. " does not exist, therefore no cards can be added to it.";
		//exit;
	//}

	//Updates the custom item size
	if($customItemSize) {
		$sql2 = "UPDATE customitems SET itemSize='$customItemSize' WHERE itemName='$customItemName'";
		if(mysql_query($sql2)) {
			echo "Custom Item Size changed to " .$customItemSize. "</br>";
		}else {
			echo "Custom Item Size failed to edit</br>";
		}
	}
	
	//Updates the custom item desc
	if($customItemDesc) {
		$sql3 = "UPDATE customitems SET itemDesc='$customItemDesc' WHERE itemName='$customItemName'";
		if(mysql_query($sql3)) {
			echo "Custom Item Desc was edited</br>";
		}else {
			echo "Custom Item Desc failed to edit</br>";
		}
	}
	
	//Updates the custom item price
	if($customItemPrice) {
		$sql4 = "UPDATE customitems SET itemPrice='$customItemPrice' WHERE itemName='$customItemName'";
		if(mysql_query($sql4)) {
			echo "Custom Item Price changed to " .$customItemPrice. "</br>";
		}else {
			echo "Custom Item Price failed to edit</br>";
		}
	}
	
	//Updates the custom item image
	if($customItemImage) {
		$sql5 = "UPDATE customitems SET itemImage='$customItemImage' WHERE itemName='$customItemName'";
		if(mysql_query($sql5)) {
			echo "Custom Item Image was edited</br>";
		}else {
			echo "Custom Item Image failed to edit</br>";
		}
	}
	
	//Updates the custom items name to the new name
	//This update must happen last
	if($newCustomItemName) {
		$sql1 = "UPDATE customitems SET itemName='$newCustomItemName' WHERE itemName='$customItemName'";
		if(mysql_query($sql1)) {
			echo "Custom Item Name changed to " .$newCustomItemName. "</br>";
		}else {
			echo "Custom Item Name failed to edit</br>";
		}
	}
?>