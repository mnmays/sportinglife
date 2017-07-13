<?php
	include 'connections files/connection.php';
	
	$seriesID = $_POST['EditSeriesID'];
	$newSeriesID = $_POST['NewSeriesID'];
	
	$sql1 = "UPDATE series SET seriesID='$newSeriesID' WHERE seriesID='$seriesID'";
	if(mysql_query($sql1)) {
		echo "Series Number " .$seriesID. " was changed to series number " .$newSeriesID."";
	}else {
		echo "Series failed to edit";
	}	
?>