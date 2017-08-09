<?php
	include 'connectionFile/connection.php';
	
	$seriesID = $_POST['EditSeriesID'];
	$newSeriesID = $_POST['NewSeriesID'];
	
	$sql0 = "SELECT * FROM series WHERE seriesID='$seriesID'";
	$result0 = $conn->prepare($sql0);
	$result0->execute();
	if($result0->rowCount() == 0) {
		echo "Series " .$seriesID. " does not exist and cannot be edited.";
		exit;
	}
		
	$sql1 = "UPDATE series SET seriesID='$newSeriesID' WHERE seriesID='$seriesID'";
	$result1 = $conn->prepare($sql1);
	if($result1->execute()) {
		echo "Series " .$seriesID. " was changed to series " .$newSeriesID."";
	}else {
		echo "Series " .$newSeriesID. " already exists. Therefore series " .$seriesID. " was not changed.";
	}	
?>