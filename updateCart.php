<?php
session_start();

require_once('database.php');	
	

		
	$itemId = filter_input(INPUT_POST,'id');
	$itemId = htmlspecialchars($itemId);
	
	
	$userID= filter_input(INPUT_POST,'userID');
	$userID = htmlspecialchars($userID);
	
	$cartID= filter_input(INPUT_POST,'cartID');
	$cartID = htmlspecialchars($cartID);
	
	//$image = filter_input(INPUT_POST,'image');
	//$image = htmlspecialchars($image);
	
	//$message= filter_input(INPUT_POST,'message');
	//$message=htmlspecialchars($message);
	
	$quantity = filter_input(INPUT_POST,'quantity');
	$quantity = htmlspecialchars($quantity);
	
	 $sql="SELECT price FROM shoppingCart WHERE cartID=:cartID1"; 
	 $execStatement= $db->prepare($sql);
	 $execStatement->bindValue(':cartID1', $cartID);
	 $execStatement->execute();
	
	$price = $execStatement->fetch();
	//echo $price;
	print_r($price);
	$index =0;
	$price= $price[0];
	//echo "Session variable is set to: " .$_SESSION["userID"] .".<br>";
	echo $price;
	
	$totalCost = $quantity * $price;
	
	
	
	/*$insertQuery="INSERT INTO shoppingCart (userID,itemID,uploadedImg,specInstr,quantity,price,totalCost) VALUES ('$_SESSION[userID]',:id1,:image1,:message1,:quantity1,'$price','$totalCost')";
		$insertStatement = $db-> prepare($insertQuery);
		//$insertStatement->bindValue(':userID1', $userID);
		$insertStatement->bindValue(':id1', $itemId);
		$insertStatement->bindValue(':image1', $image);
		$insertStatement->bindValue(':message1', $message);
		$insertStatement->bindValue(':quantity1', $quantity);
		//$insertStatement->bindValue(':price', $price);
		//$insertStatement->bindValue(':totalCost', $totalCost);
		$insertStatement->execute();*/
		
		
	$updateQuery="UPDATE shoppingCart SET quantity=:quantity1,totalCost='$totalCost' WHERE cartID=:cartID1";
	$updateStatement =$db-> prepare($updateQuery);
	$updateStatement->bindValue(':quantity1', $quantity);
	$updateStatement->bindValue(':cartID1', $cartID);
	$updateStatement->execute();
	
		
		//echo "Item Added!";
		header("location:shopping-cart.php");
		
		
?>