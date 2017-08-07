<?php
	include 'connectionFile/connection.php';
	
	$seriesID = $_POST['AddSeriesID'];
			
	$sql1 = "INSERT INTO series (seriesID) VALUES ('$seriesID')";
	if(mysql_query($sql1)) {
		echo "Series Number " .$seriesID. " was added";
	}else {
		echo "Series failed to add as it already exists";
	}
?>