<?php
session_start();
echo $_SESSION["userID"];

require_once('database.php');	
	

		
	$fullName = filter_input(INPUT_POST,'fullName');
	$fullName = htmlspecialchars($fullName);
	
	
	$emailAdd= filter_input(INPUT_POST,'emailAddress');
	$emailAdd = htmlspecialchars($emailAdd);
	
	$addLine1 = filter_input(INPUT_POST,'addressLine1');
	$addLine1 = htmlspecialchars($addLine1);
	
	//$addLine2 = filter_input(INPUT_POST,'address-line2');
	//$addLine2 = htmlspecialchars($addLine2);
	
	$city= filter_input(INPUT_POST,'city');
	$city=htmlspecialchars($city);
	
	$state = filter_input(INPUT_POST,'state');
	$state = htmlspecialchars($state);
	
	$zip = filter_input(INPUT_POST,'postalCode');
	$zip = htmlspecialchars($zip);
	
	$country = filter_input(INPUT_POST,'country');
	$country = htmlspecialchars($country);
	
	$sql="INSERT INTO orders (cartID,userID,itemID,uploadedImg,specInstr,quantity,price,totalCost) SELECT cartID,userID,itemID,uploadedImg,specInstr,quantity,price,totalCost FROM shoppingcart WHERE userID = '$_SESSION[userID]'";
	$execStatement=$db->prepare($sql);
	$execStatement->execute();
	
	//$sql2="INSERT INTO orders (fullName,emailAdd,addLine1,city,state,SELECT custID FROM customerInfo WHERE userID = '$_SESSION[userID]'"; 
	 //$execStatement2= $db->prepare($sql2);
	 //$execStatement2->execute();
	
	
	
	$updateQuery="UPDATE orders AS o INNER JOIN customerinfo as c ON o.userID=c.userID SET o.fullName=c.fullName,o.emailAdd=c.emailAddress,o.addLine1=c.addLine1,o.city=c.city,o.state=c.state,o.postalCode=c.zip,o.country=c.country WHERE o.userID='$_SESSION[userID]'";
	//$updateQuery="INSERT INTO customerinfo (userID,fullName,emailAddress,addLine1,city,state,zip,country) VALUES ('$_SESSION[userID]',:fullName1,:emailAddress1,:addressLine11,:city1,:state1,:postalCode1,:country)";
	//$sql4="INSERT INTO customerinfo (userID,fullName) VALUES ('$_SESSION[userID]',:full-name1)";
	$updateStatement=$db->prepare($updateQuery);
	//$updateStatement->bindValue(':fullName1', $fullName);
	//$updateStatement->bindValue(':emailAddress1', $emailAdd);
	//$updateStatement->bindValue(':addressLine11', $addLine1);
	//$execStatement2->bindValue(':address-line21', $addLine2);
	//$updateStatement->bindValue(':city1', $city);
	//$updateStatement->bindValue(':state1', $state);
	//$updateStatement->bindValue(':postalCode1', $zip);
	//$updateStatement->bindValue(':country', $country);
	
	$updateStatement->execute();
	//echo $_SESSION[userID];
	//echo $fullName;
	//echo $emailAdd;
	//echo $addLine1;
	//echo $city;
	//echo $state;
	//echo $zip;
	//echo $country;
	
	
	
	/*$sql3="SELECT cartID FROM orders WHERE userID = '$_SESSION[userID]'";
	$viewStmt =$db->prepare($sql3);
	$viewStmt->execute();
	$itemList=$viewStmt->fetchAll();
	foreach($itemList as $item) {
	
	$sql2="INSERT INTO orders (fullName,emailAdd,addLine1,addLine2,city,state,postalCode,country) VALUES (:full-name1,:emailAddress1,:address-line11,:address-line21,:city1,:state1,:postal-code1,:country)";
	$execStatement2=$db->prepare($sql2);
	$execStatement2->bindValue(':full-name1', $fullName);
	$execStatement2->bindValue(':emailAddress1', $emailAdd);
	$execStatement2->bindValue(':address-line11', $addLine1);
	//$execStatement2->bindValue(':address-line21', $addLine2);
	$execStatement2->bindValue(':city1', $city);
	$execStatement2->bindValue(':state1', $state);
	$execStatement2->bindValue(':postal-code1', $zip);
	$execStatement2->bindValue(':country', $country);
	
	$execStatement2->execute();
	

	 /*$sql="SELECT itemPrice FROM customitems WHERE itemID = :id1"; 
	 $execStatement=$db->prepare($sql);
	 $execStatement->bindValue(':id1', $itemId);
	 $execStatement->execute();
	
	$price = $execStatement->fetch();
	print_r($price);
	$index =0;
	$price= $price[0];
	// "Session variable is set to: " .$_SESSION["userID"] .".<br>";
	//echo $price;
	
	$totalCost = $quantity * $price;
	
	$sql2="SELECT itemDesc FROM customitems WHERE itemID = :id1"; 
	 $execStatement2=$db->prepare($sql2);
	 $execStatement2->bindValue(':id1', $itemId);
	 $execStatement2->execute();
	 
	 $desc = $execStatement2->fetch();
	 print_r($desc);
	 //echo $desc;
	 $index2=0;
	 $desc=$desc[0];
	 //echo $desc;
	 
	
	//$insertQuery="INSERT INTO shoppingCart (userID,itemID,uploadedImg,specInstr,quantity,price,totalCost,itemDesc) VALUES ('$_SESSION[userID]',:id1,:image1,:message1,:quantity1,'$price','$totalCost','$desc')";
		$insertQuery="INSERT INTO shoppingCart (userID,itemID,uploadedImg,specInstr,quantity,price,totalCost) VALUES ('$_SESSION[userID]',:id1,:image1,:message1,:quantity1,'$price','$totalCost')";
		$insertStatement = $db-> prepare($insertQuery);
		//$insertStatement->bindValue(':userID1', $userID);
		$insertStatement->bindValue(':id1', $itemId);
		$insertStatement->bindValue(':image1', $image);
		$insertStatement->bindValue(':message1', $message);
		$insertStatement->bindValue(':quantity1', $quantity);
		//$insertStatement->bindValue(':price', $price);
		//$insertStatement->bindValue(':totalCost', $totalCost);
		$insertStatement->execute();
		
		*/
		echo "order Added!";
		//header("location:shopping-cart.php");
		
		
?>