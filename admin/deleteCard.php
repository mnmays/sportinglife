<?php
	include 'connections files/connection.php';
	
	$cardNumber = $_POST['DeleteCardNumber'];
	$seriesID = $_POST['DeleteSeriesID'];
			
	$sql1 = "DELETE FROM cards WHERE seriesID='$seriesID' AND cardNumber='$cardNumber'";
	if(mysql_query($sql1)) {
		echo "Card Number " .$cardNumber. " was deleted";
	}else {
		echo "Card failed to delete due to it not being in the database";
	}
?>