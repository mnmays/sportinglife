<?php
	include 'connectionFile/connection.php';
	
	$seriesID = $_POST['DeleteSeriesID'];
	
	$sql0 = "SELECT * FROM series WHERE seriesID='$seriesID'";
	$result0 = mysql_query($sql0);
	if(mysql_num_rows($result0) == 0) {
		echo "Series " .$seriesID. " does not exist, therefore it was not deleted.";
		exit;
	}
			
	$sql1 = "DELETE FROM series WHERE seriesID='$seriesID'";
	if(mysql_query($sql1)) {
		echo "Series Number " .$seriesID. " was deleted";
	}else {
		echo "Series failed to delete due to it not being in the database";
	}
?>