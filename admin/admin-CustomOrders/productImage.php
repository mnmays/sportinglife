<?php
	include 'connectionFile/connection.php';
	
	$cartID = $_POST['cartID'];
			
	$select_image="SELECT uploadedImg FROM products WHERE cartID ='$cartID'";
	$result = mysql_query($select_image);
	$row = mysql_fetch_array($result);
	
	echo '<img src="data:image/jpeg;base64, '.base64_encode($row['uploadedImg']).'">';
?>