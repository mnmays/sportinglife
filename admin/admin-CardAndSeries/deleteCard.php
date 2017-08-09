<?php
	include 'connectionFile/connection.php';
	
	//Gets the card and series number to delete
	$cardNumber = $_POST['DeleteCardNumber'];
	$seriesID = $_POST['DeleteSeriesID'];
	
	//Checks to see if the series to be deleted exists	
	$sql0 = "SELECT seriesID FROM cards WHERE seriesID='$seriesID'";
	$result0 = mysql_query($sql0);
	if(mysql_num_rows($result0) == 0) {
		echo "Series " .$seriesID. " does not exist so no cards can be deleted from it.";
		exit;
	}
	
	//Checks to see if the card for the particular series exists to be deleted
	$sql1 = "SELECT * FROM cards WHERE cardNumber='$cardNumber'";
	$result1 = mysql_query($sql1);
	if(mysql_num_rows($result1) == 0) {
		echo "Card Number " .$cardNumber. " for series " .$seriesID. " does not exist and therefore could not be deleted.";
		exit;
	}
	
	//Gets the location of the file to be deleted
	$getCardPath = "SELECT cardImageFolder, cardImageName FROM cards WHERE seriesID='$seriesID' AND cardNumber='$cardNumber'";
	$getCardPathResult = mysql_query($getCardPath);
	$row = mysql_fetch_row($getCardPathResult);
	$cardImageFolder = $row[0];
	echo "cardImageFolder ".$cardImageFolder."";
	$cardImageName = $row[1];
	echo "cardImageName ".$cardImageName."";
	
	//Delets the particular card for the selected series	
	$sql3 = "DELETE FROM cards WHERE seriesID='$seriesID' AND cardNumber='$cardNumber'";
	if(mysql_query($sql3)) {
		echo "Card Number " .$cardNumber. " from series " .$seriesID. " was deleted";
		echo unlink("$cardImageFolder$cardImageName");
	}else {
		echo "Card failed to delete due to it not being in the database";
	}
?>