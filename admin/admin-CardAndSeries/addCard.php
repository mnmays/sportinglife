<?php
	include 'connectionFile/connection.php';
		        
	$cardNumber = $_POST['AddCardNumber'];
	$cardSeriesID = $_POST['AddSeriesID'];
	$cardName = $_POST['AddCardName'];	
	
	//UPLOADING FILE INTO FILE SYSTEM
	//User target_dir for database column
	$target_dir = "../../cardImage/";
	
	$target_cardName = $_FILES["fileToUpload"]["name"];
	
	//Removes any unwanted special characters
	$target_cardName = preg_replace("/[^a-zA-Z0-9.]/", "", $target_cardName);
	
	//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$target_file = $target_dir . $target_cardName;
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ". ";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image. ";
	        $uploadOk = 0;
	    }
	}
	
	// Check if file already exists
	if (file_exists($target_file)) {
	    echo "Sorry, file already exists. ";
	    $uploadOk = 0;
	}
	
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 50000000) {
	    echo "Sorry, your file is too large. ";
	    $uploadOk = 0;
	}
	
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "jpeg") {
	    echo "Sorry, only JPG, JPEG, files are allowed. ";
	    $uploadOk = 0;
	}

	//Check to see if the series exists or not
	$checkSeries = "SELECT count(*) FROM series WHERE seriesID='$cardSeriesID'";
	$checkSeriesResult = $conn->prepare($checkSeries);
	$checkSeriesResult->execute();
	$seriesNumRows = $checkSeriesResult->fetchColumn();
	if($seriesNumRows == 0) {
		echo "Series " .$cardSeriesID. " does not exist, therefore no cards can be added to it. ";
		$uploadOk = 0;
	}
	
	//Check to see if the card already exists
	$checkCard = "SELECT count(*) FROM cards WHERE seriesID='$cardSeriesID' AND cardNumber='$cardNumber'";
	$checkCardResult = $conn->prepare($checkCard);
	$checkCardResult->execute();
	$cardNumRows = $checkCardResult->fetchColumn();
	if($cardNumRows > 0) {
		echo "Card number " .$cardNumber. " for series " .$cardSeriesID. " already exists and could not be added. ";
		$uploadOk = 0;
	}
	
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded. ";
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded. ";

			$cardInsert = "INSERT INTO cards (seriesID, cardName, cardNumber, cardImageFolder, cardImageName) VALUES ('$cardSeriesID', '$cardName','$cardNumber', '$target_dir', '$target_cardName')";
			$cardInsertResult = $conn->prepare($cardInsert);
			
			if($cardInsertResult->execute()) {
				echo "Card Number " .$cardNumber. " of series " .$cardSeriesID. " was inserted. ";
			}else {
				echo "If there is an error at this point...things have gone very wrong ";
			}	
	    } else {
	        echo "Sorry, there was an error uploading your file. ";
	    }
	}
?>