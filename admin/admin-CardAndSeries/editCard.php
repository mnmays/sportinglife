<?php
	include 'connectionFile/connection.php';
	
	$seriesID = $_POST['EditSeriesID'];
	$cardNumber = $_POST['EditCardNumber'];
	$newSeriesID = $_POST['NewSeriesID'];
	$newCardNumber = $_POST['NewCardNumber'];
	$cardName = $_POST['EditCardName'];
		
	//UPLOADING FILE INTO FILE SYSTEM
	$target_dir = "cardImage/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
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
		echo "target_cardName was set to ".$target_cardName."";
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
	$checkSeriesExist = "SELECT seriesID FROM series WHERE seriesID='$seriesID'";
	$checkSeriesExistResult = mysql_query($checkSeriesExist);
	if(mysql_num_rows($checkSeriesExistResult) == 0) {
		echo "Series " .$seriesID. " does not exist or has no cards contained within and therefore cannot be edited.";
		exit;
	}
	
	//Checks to see if the series they want to change the card too exists
	//Additionally checks if the card for the new series already exists
	if($newSeriesID) {
		$checkSeries = "SELECT seriesID FROM series WHERE seriesID='$newSeriesID'";
		$checkSeriesResult = mysql_query($checkSeries);
		if(mysql_num_rows($checkSeriesResult) == 0) {
			echo "Series " .$newSeriesID. " does not exist.";
			exit;
		}	
		
		$checkSeriesCard = "SELECT * FROM cards WHERE seriesID='$newSeriesID' AND cardNumber='$cardNumber'";
		$checkSeriesCardResult = mysql_query($checkSeriesCard);
		if(mysql_num_rows($checkSeriesCardResult) > 0) {
			echo "The card you are changing the series of already has a card for that particular series and therefore cannot be edited.";
			exit;
		}
			
	}
	
	//Checks for when only the cardNumber is being updated if the current series already contains that card
	if($newCardNumber) {
		$checkCard = "SELECT  * FROM cards WHERE seriesID='$seriesID' AND cardNumber='$newCardNumber'";
		$checkCardResult = mysql_query($checkCard);
		if(mysql_num_rows($checkCardResult) > 0) {
			echo "That card already exists for that particular series and therefore cannot be edited.";
			exit;
		}
	}


	//Checks if the card for a certain series already exists
	if($seriesID != $newSeriesID || $cardNumber != $newCardNumber) {
		$checkCard = "SELECT * FROM cards WHERE seriesID='$newSeriesID' AND cardNumber='$newCardNumber'";
		$checkCardResult = mysql_query($checkCard);
		if(mysql_num_rows($checkCardResult) > 0) {
			echo "Card number " .$newCardNumber. " for series " .$newSeriesID. " already exists and could not be added.";
			exit;
		}
		
	}
	
	echo "before image upload: uploadOK, fileUploaded";
	echo $uploadOk;
	echo $fileUploaded;
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else if($uploadOk == 1 && $fileUploaded == 1){
	    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	        
	        //Gets the location of the file to be deleted
			$getCardPath = "SELECT cardImageFolder, cardImageName FROM cards WHERE seriesID='$seriesID' AND cardNumber='$cardNumber'";
			$getCardPathResult = mysql_query($getCardPath);
			$row = mysql_fetch_row($getCardPathResult);
			$cardImageFolder = $row[0];
			echo "cardImageFolder ".$cardImageFolder."";
			$cardImageName = $row[1];
			echo "cardImageName ".$cardImageName."";
			
			echo unlink("$cardImageFolder$cardImageName");
			

	        //updates the card path in the database
			$updateCardImageName = "UPDATE cards SET cardImageName='$target_cardName' WHERE seriesID='$seriesID' AND cardNumber='$cardNumber'";
			if(mysql_query($updateCardImageName)) {
				echo "Image file path was inserted";
			}else {
				echo "Image file path failed to insert";
			}
	    } else {
	        echo "Error uploading your file.";
	    }
	}

	//Updates the cardName
	if($cardName) {
		$sql3 = "UPDATE cards SET cardName='$cardName' WHERE seriesID='$seriesID' AND cardNumber='$cardNumber'";
		if(mysql_query($sql3)) {
			echo "card name updated";
		}else {
			echo "card name failed to update";
		}
	}
	
	//NEED TO FIGURE OUT IF WORTH ALLOWING JUST THE CHANGING OF INDIIDUAL CARDNUMEBR AND SERIES NUMBER
	//Updates the seriesID and cardNumber THIS MUST HAPPEN LAST
	if($newSeriesID && $newCardNumber) {
		$updateSeriesAndCardNum = "UPDATE cards SET cardNumber='$newCardNumber', seriesID='$newSeriesID' WHERE seriesID='$seriesID' AND cardNumber='$cardNumber'";
		if(mysql_query($updateSeriesAndCardNum)) {
			echo "Card Number " .$cardNumber. " of series " .$seriesID. " was set to card number " .$newCardNumber. ", series number was set to " .$newSeriesID. "";
		}else {
			echo "Card seriesID and cardNumber failed to update";
		}
	}else if($newCardNumber) {
		$updateCardNumber = "UPDATE cards SET cardNumber='$newCardNumber' WHERE seriesID='$seriesID' AND cardNumber='$cardNumber'";
		if(mysql_query($updateCardNumber)) {
			echo "only cardNumber updated";
		}else {
			echo "cardNumber failed to update";
		}
	}else if($newSeriesID) {
		$updateSeriesID = "UPDATE cards SET seriesID='$newSeriesID' WHERE seriesID='$seriesID' AND cardNumber='$cardNumber'";
		if(mysql_query($updateSeriesID)) {
			echo "only seriesID updated";
		}else {
			echo "seriesID failed to update";
		}
	}
?>