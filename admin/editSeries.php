<?php
	include 'connectionFile/connection.php';
	
	$seriesID = $_POST['EditSeriesID'];
	$newSeriesID = $_POST['NewSeriesID'];
	
	$sql0 = "SELECT * FROM series WHERE seriesID='$seriesID'";
	$result0 = mysql_query($sql0);
	if(mysql_num_rows($result0) == 0) {
		echo "Series " .$seriesID. " does not exist and cannot be edited.";
		exit;
	}
		
	$sql1 = "UPDATE series SET seriesID='$newSeriesID' WHERE seriesID='$seriesID'";
	if(mysql_query($sql1)) {
		echo "Series " .$seriesID. " was changed to series " .$newSeriesID."";
	}else {
		echo "Series " .$newSeriesID. " already exists. Therefore series " .$seriesID. " was not changed.";
	}	
?>