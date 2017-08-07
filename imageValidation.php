<?php

$userImage = addslashes(file_get_contents($_FILES['AddUserImage']['tmp_name']));
	$imageRes = getimagesize($_FILES['AddUserImage']['tmp_name']);
	
		if($_FILES["AddUserImage"]["type"] != "image/jpeg"||$_FILES["AddUserImage"]["size"] >= 200000000||$imageRes[0] < 1200 || $imageRes[1] < 1500)
			{
				echo "Invalid file type. Image not uploaded";
			}
			else 
			{
				echo "<span>Valid</span>";
			}
	

?>