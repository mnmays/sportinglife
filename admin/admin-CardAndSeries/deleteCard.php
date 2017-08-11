<?php
	include 'connectionFile/connection.php';
	
	//Gets the card and series number to delete
	$cardNumber = $_POST['DeleteCardNumber'];
	$seriesID = $_POST['DeleteSeriesID'];
	
	//Checks to see if the series to be deleted exists	
	$sql0 = "SELECT seriesID FROM series WHERE seriesID='$seriesID'";
	$result0 = $conn->prepare($sql0);
	$result0->execute();
	if($result0->rowCount() == 0) {
		echo "Series " .$seriesID. " does not exist so no cards can be deleted from it. ";
		exit;
	}
	
	//Checks to see if the card for the particular series exists to be deleted
	$sql1 = "SELECT * FROM cards WHERE cardNumber='$cardNumber'";
	$result1 = $conn->prepare($sql1);
	$result1->execute();
	if($result1->rowCount() == 0) {
		echo "Card Number " .$cardNumber. " for series " .$seriesID. " does not exist and therefore could not be deleted. ";
		exit;
	}
	
	//Gets the location of the file to be deleted
	$getCardPath = "SELECT cardImageFolder, cardImageName FROM cards WHERE seriesID='$seriesID' AND cardNumber='$cardNumber'";
	$getCardPathResult = $conn->prepare($getCardPath);
	$getCardPathResult->execute();
	$row = $getCardPathResult->fetch(PDO::FETCH_ASSOC);
	$cardImageFolder = $row['cardImageFolder'];
	$cardImageName = $row['cardImageName'];
	
	//Delets the particular card for the selected series	
	$sql3 = "DELETE FROM cards WHERE seriesID='$seriesID' AND cardNumber='$cardNumber'";
	$result3 = $conn->prepare($sql3);
	if($result3->execute()) {
		echo "Card Number " .$cardNumber. " from series " .$seriesID. " was deleted ";
		unlink("$cardImageFolder$cardImageName");
	}else {
		echo "Card failed to delete due to it not being in the database ";
	}
?>