<?php
session_start();

require_once('database.php');	
	
		
	$itemId = filter_input(INPUT_POST,'id');
	$itemId = htmlspecialchars($itemId);
	
	
	$userID= filter_input(INPUT_POST,'userID');
	$userID = htmlspecialchars($userID);
	
	$image = filter_input(INPUT_POST,'image');
	$image = htmlspecialchars($image);
	
	$message= filter_input(INPUT_POST,'message');
	$message=htmlspecialchars($message);
	
	$quantity = filter_input(INPUT_POST,'quantity');
	$quantity = htmlspecialchars($quantity);
	
	 $sql="SELECT itemPrice FROM customitems WHERE itemID = :id1"; 
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
	 echo $desc;
	 
	
	//$insertQuery="INSERT INTO shoppingCart (userID,itemID,uploadedImg,specInstr,quantity,price,totalCost,itemDesc) VALUES ('$_SESSION[userID]',:id1,:image1,:message1,:quantity1,'$price','$totalCost','$desc')";
		$insertQuery="INSERT INTO shoppingCart (userID,itemID,itemDesc,uploadedImg,specInstr,quantity,price,totalCost) VALUES ('$_SESSION[userID]',:id1,'$desc',:image1,:message1,:quantity1,'$price','$totalCost')";
		$insertStatement = $db-> prepare($insertQuery);
		//$insertStatement->bindValue(':userID1', $userID);
		$insertStatement->bindValue(':id1', $itemId);
		$insertStatement->bindValue(':image1', $image);
		$insertStatement->bindValue(':message1', $message);
		$insertStatement->bindValue(':quantity1', $quantity);
		//$insertStatement->bindValue(':price', $price);
		//$insertStatement->bindValue(':totalCost', $totalCost);
		$insertStatement->execute();
		
		
		//echo "Item Added!";
		header("location:shopping-cart.php");
		
		
		
		
		
		
?>