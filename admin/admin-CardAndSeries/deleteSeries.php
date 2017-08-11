<?php
	include 'connectionFile/connection.php';
	
	$seriesID = $_POST['DeleteSeriesID'];
	
	$sql0 = "SELECT * FROM series WHERE seriesID='$seriesID'";
	$result0 = $conn->prepare($sql0);
	$result0->execute();
	if($result0->rowCount() == 0) {
		echo "Series " .$seriesID. " does not exist, therefore it was not deleted.";
		exit;
	}
			
	$sql1 = "DELETE FROM series WHERE seriesID='$seriesID'";
	$result1 = $conn->prepare($sql1);
	if($result1->execute()) {
		echo "Series " .$seriesID. " was deleted";
	}else {
		echo "Series failed to delete due to it not being in the database" . mysql_error();
	}
?>