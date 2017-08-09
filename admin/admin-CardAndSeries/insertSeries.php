<?php
	include 'connections files/connection.php';
	
	$seriesID = $_POST['AddSeriesID'];
			
	$sql1 = "INSERT INTO series (seriesID) VALUES ('$seriesID')";
	if(mysql_query($sql1)) {
		echo "Series Number " .$seriesID. " was inserted";
	}else {
		echo "Series failed to insert due to it already existing";
	}
?>