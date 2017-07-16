<?php
	include 'connections files/connection.php';
	
	$seriesID = $_POST['EditSeriesID'];
	$cardNumber = $_POST['EditCardNumber'];
	$newCardNumber = $_POST['NewCardNumber'];
	$newSeriesNumber = $_POST['NewSeriesID'];
	$cardImage = addslashes(file_get_contents($_FILES['AddCardImage']['tmp_name']));
	
	$sql1 = "UPDATE cards SET cardNumber='$newCardNumber', seriesID='$newSeriesNumber', cardImage='$cardImage' WHERE seriesID='$seriesID' AND cardNumber='$cardNumber'";
	if(mysql_query($sql1)) {
		echo "Card Number " .$cardNumber. " of series " .$seriesID. " was set to card number " .$newCardNumber. ", series number was set to " .$newSeriesNumber. "";
	}else {
		echo "Card failed to edit";
	}	
?>