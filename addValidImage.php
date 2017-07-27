<?php 
	//include your connection file
	include 'connection.php';

	$userImage = addslashes(file_get_contents($_FILES['AddUserImage']['tmp_name']));
	
	//Allows for upload of only jpg file types
	if($_FILES["AddUserImage"]["type"] == "image/jpeg") {
		echo "Valid file type\n";
	}else {
		echo "Invalid file type. Image not uploaded";
		exit;
	}
	
	//Allows for upload of only images less than 200GB 
	if($_FILES["AddUserImage"]["size"] < 200000000) {
		echo "Valid file size\n";
	}else {
		echo "Invalid file size. Image not uploaded";
		exit;
	}
	
	//Checks the file resolution(and or size)
	$imageRes = getimagesize($_FILES['AddUserImage']['tmp_name']);
	//$imageRes[0] is the width and $imageRes[1] is the height
	if($imageRes[0] < 1200 || $imageRes[1] < 1500) {
		echo "Invalid file resolution. Please make sure you're file is 1200x1500 resolution at 300dpi";
		exit;
	}

	//Need to replace with PDO just placeholder for now
	$sql = "INSERT INTO orders (orderImage) VALUES ('$userImage')";
	if(mysql_query($sql)) {
		echo "User image was inserted into DB\n";
	}else {
		echo "Image failed to insert.";
	}
?>