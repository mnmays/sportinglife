<?php
	include 'connection.php';
	
	$seriesID = $_POST['DeleteSeriesID'];
			
	$sql1 = "DELETE FROM series WHERE seriesID='$seriesID'";
	if(mysql_query($sql1)) {
		echo "Series Number " .$seriesID. " was deleted";
	}else {
		echo "Series failed to delete due to it not being in the database";
	}
?>