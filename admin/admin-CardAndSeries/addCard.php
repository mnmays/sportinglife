<?php
	include 'connectionFile/connection.php';
		        
	$cardNumber = $_POST['AddCardNumber'];
	$cardSeriesID = $_POST['AddSeriesID'];
	$cardName = $_POST['AddCardName'];	
	
	//UPLOADING FILE INTO FILE SYSTEM
	//User target_dir for database column
	$target_dir = "cardImage/";
	
	$target_cardName = $_FILES["fileToUpload"]["name"];
	echo $target_cardName;
	
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
	}
	
	// Check if file already exists
	if (file_exists($target_file)) {
	    echo "Sorry, file already exists.";
	    $uploadOk = 0;
	}
	
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 5000000) {
	    echo "Sorry, your file is too large.";
	    $uploadOk = 0;
	}
	
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "jpeg") {
	    echo "Sorry, only JPG, JPEG, files are allowed.";
	    $uploadOk = 0;
	}
	
	//Check to see if the series exists or not
	$sql0 = "SELECT seriesID FROM series WHERE seriesID='$cardSeriesID'";
	$result0 = mysql_query($sql0);
	if(mysql_num_rows($result0) == 0) {
		echo "Series " .$cardSeriesID. " does not exist, therefore no cards can be added to it.";
		$uploadOk = 0;
	}
	
	//Check to see if the card already exists
	$sql1 = "SELECT * FROM cards WHERE seriesID='$cardSeriesID' AND cardNumber='$cardNumber'";
	$result1 = mysql_query($sql1);
	if(mysql_num_rows($result1) > 0) {
		echo "Card number " .$cardNumber. " for series " .$cardSeriesID. " already exists and could not be added.";
		$uploadOk = 0;
	}
	
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

			//if(!empty($_FILES['AddCardImage']['twp_name']) && file_exists($_FILES['AddCardImage']['twp_name'])) {
				//$cardImage = addslashes(file_get_contents($_FILES['AddCardImage']['tmp_name']));
			//}
			
			$sql2 = "INSERT INTO cards (seriesID, cardName, cardNumber, cardImageFolder, cardImageName) VALUES ('$cardSeriesID', '$cardName','$cardNumber', '$target_dir', '$target_cardName')";
			if(mysql_query($sql2)) {
				echo "Card Number " .$cardNumber. " of series " .$cardSeriesID. " was inserted.";
			}else {
				echo "If there is an error at this point...things have gone very wrong";
			}	
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}
?>