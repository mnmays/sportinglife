<?php
	include 'connection.php';
	
	$cardNumber = $_POST['AddCardNumber'];
	$cardSeriesID = $_POST['AddSeriesID'];
	$cardImage = addslashes(file_get_contents($_FILES['AddCardImage']['tmp_name']));
			
	$sql1 = "INSERT INTO cards (seriesID, cardImage, cardNumber) VALUES ('$cardSeriesID', '$cardImage', '$cardNumber')";
	if(mysql_query($sql1)) {
		echo "Card Number " .$cardNumber. " of series " .$cardSeriesID. " was inserted";
	}else {
		echo "Card failed to insert due to the card already existing in the series or the series not existing";
	}
?>