<?php
	include 'connectionFile/connection.php';
	
	$seriesID = $_POST['EditSeriesID'];
	$cardNumber = $_POST['EditCardNumber'];
	$newSeriesID = $_POST['NewSeriesID'];
	$newCardNumber = $_POST['NewCardNumber'];
	$cardName = $_POST['EditCardName'];
	
	$target_cardName = $_FILES["fileToUpload"]["name"];
	//Removes any unwanted special characters
	$target_cardName = preg_replace("/[^a-zA-Z0-9.]/", "", $target_cardName);
	
	//UPLOADING FILE INTO FILE SYSTEM
	$target_dir = "../../cardImage/";
	
	$target_file = $target_dir . $target_cardName;
	
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);		
	$uploadOk = 1;	
	$fileUploaded = 1;
	
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
	
	//checks if a file was uploaded
	if(!is_uploaded_file($_FILES["fileToUpload"]["tmp_name"])) {
		$fileUploaded = 0; //Set to zero as file was not uploaded
	}
	
	//Gets just the cardImageName path for the file system
	if(!$fileUploaded == 0) {
		$target_cardName = $_FILES["fileToUpload"]["name"];
		//Removes any unwanted special characters
		$target_cardName = preg_replace("/[^a-zA-Z0-9.]/", "", $target_cardName);
	}
	
	// Check if file already exists
	if(!$fileUploaded == 0) {
		if (file_exists($target_file)) {
		    echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}		
	}
	
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 5000000) {
	    echo "Sorry, your file is too large.";
	    $uploadOk = 0;
	}
	
	// Allow certain file formats
	if(!$fileUploaded == 0) {
		if($imageFileType != "jpg" && $imageFileType != "jpeg") {
		    echo "Sorry, only JPG, JPEG, files are allowed.";
		    $uploadOk = 0;
		}		
	}

	//Checks if the series they want to edit exists
	$checkSeriesExist = "SELECT count(*) FROM series WHERE seriesID='$seriesID'";
	$checkSeriesExistResult = $conn->prepare($checkSeriesExist);
	$checkSeriesExistResult->execute();
	$checkSeriesExistNumRows = $checkSeriesExistResult->fetchColumn();
	if($checkSeriesExistNumRows == 0) {
		echo "Series " .$seriesID. " does not exist or has no cards contained within and therefore cannot be edited.";
		exit;
	}

	//Checks if the card for a certain series already exists
	if($seriesID != $newSeriesID || $cardNumber != $newCardNumber) {
		$checkNewSeriesCard = "SELECT count(*) FROM cards WHERE seriesID='$newSeriesID' AND cardNumber='$newCardNumber'";
		$checkNewCardResult = $conn->prepare($checkNewSeriesCard);
		$checkNewCardResult->execute();
		$checkNewCardNumRows = $checkNewCardResult->fetchColumn();
		if($checkNewCardNumRows > 0) {
			echo "Card number " .$newCardNumber. " for series " .$newSeriesID. " already exists and could not be added.";
			exit;
		}
		
	}
	
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else if($uploadOk == 1 && $fileUploaded == 1){
	    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded. ";
			
	        //Gets the location of the file to be deleted
			$getCardPath = "SELECT cardImageFolder, cardImageName FROM cards WHERE seriesID='$seriesID' AND cardNumber='$cardNumber'";
			$getCardPathResult = $conn->prepare($getCardPath);
			$getCardPathResult->execute();
			$row = $getCardPathResult->fetch(PDO::FETCH_ASSOC);
			$cardImageFolder = $row['cardImageFolder'];
			$cardImageName = $row['cardImageName'];
			
			unlink("$cardImageFolder$cardImageName");
			
	        //updates the card path in the database
			$updateCardImageName = "UPDATE cards SET cardImageName='$target_cardName' WHERE seriesID='$seriesID' AND cardNumber='$cardNumber'";
			$updateCardImageNameResult = $conn->prepare($updateCardImageName);		
			if($updateCardImageNameResult->execute()) {
				echo "Image file path was inserted ";
			}else {
				echo "Image file path failed to insert ";
			}
	    } else {
	        echo "Error uploading your file. ";
	    }
	}

	//Updates the cardName
	if($cardName) {
		$updateCardName = "UPDATE cards SET cardName='$cardName' WHERE seriesID='$seriesID' AND cardNumber='$cardNumber'";
		$updateCardNameResult = $conn->prepare($updateCardName);
		if($updateCardNameResult->execute()) {
			echo "Card name updated ";
		}else {
			echo "Card name failed to update ";
		}
	}
	
	if($newSeriesID && $newCardNumber) {
		$updateSeriesAndCardNum = "UPDATE cards SET cardNumber='$newCardNumber', seriesID='$newSeriesID' WHERE seriesID='$seriesID' AND cardNumber='$cardNumber'";
		$updateSeriesAndCardNumResult = $conn->prepare($updateSeriesAndCardNum);
		
		if($updateSeriesAndCardNumResult->execute()) {
			echo "Card Number " .$cardNumber. " of series " .$seriesID. " was set to card number " .$newCardNumber. ", series number was set to " .$newSeriesID. ". ";
		}else {
			echo "Card seriesID and cardNumber failed to update. ";
		}
	}else if($newCardNumber) {
		$updateCardNumber = "UPDATE cards SET cardNumber='$newCardNumber' WHERE seriesID='$seriesID' AND cardNumber='$cardNumber'";
		$updateCardNumberResult = $conn->prepare($updateCardNumber);
		
		if($updateCardNumberResult->execute()) {
			echo "Card number updated. ";
		}else {
			echo "Card number failed to update. ";
		}
	}else if($newSeriesID) {
		$updateSeriesID = "UPDATE cards SET seriesID='$newSeriesID' WHERE seriesID='$seriesID' AND cardNumber='$cardNumber'";
		$updateSeriesIDResult = $conn->prepare($updateSeriesID);
		if($updateSeriesIDResult->execute()) {
			echo "Series name updated. ";
		}else {
			echo "Series name failed to update. ";
		}
	}
?>