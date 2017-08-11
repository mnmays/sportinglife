<?php
	include 'connectionFile/connection.php';
	
	$seriesID = $_POST['AddSeriesID'];
			
	$sql1 = "INSERT INTO series (seriesID) VALUES ('$seriesID')";
	$result1 = $conn->prepare($sql1);

	if($result1->execute()) {
		echo "Series " .$seriesID. " was added";
	}else {
		echo "Series failed to add as it already exists";
	}
?>