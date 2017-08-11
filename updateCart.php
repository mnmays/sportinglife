<?php
//this page is used to update the quantity and subsequent total price if a user changes the qty they are ordering
session_start();

require_once('database.php');	
		
	$itemId = filter_input(INPUT_POST,'id');
	$itemId = htmlspecialchars($itemId);
	
	
	$userID= filter_input(INPUT_POST,'userID');
	$userID = htmlspecialchars($userID);
	
	$cartID= filter_input(INPUT_POST,'cartID');
	$cartID = htmlspecialchars($cartID);
	
	
	$quantity = filter_input(INPUT_POST,'quantity');
	$quantity = htmlspecialchars($quantity);
	
	 $sql="SELECT price FROM shoppingCart WHERE cartID=:cartID1"; 
	 $execStatement= $db->prepare($sql);
	 $execStatement->bindValue(':cartID1', $cartID);
	 $execStatement->execute();
	
	$price = $execStatement->fetch();
	$index =0;
	$price= $price[0];
	
	$totalCost = $quantity * $price;
	
		
		
	$updateQuery="UPDATE shoppingCart SET quantity=:quantity1,totalCost='$totalCost' WHERE cartID=:cartID1";
	$updateStatement =$db-> prepare($updateQuery);
	$updateStatement->bindValue(':quantity1', $quantity);
	$updateStatement->bindValue(':cartID1', $cartID);
	$updateStatement->execute();
	
		
	
		header("location:shopping-cart.php");   //redirect to the shopping cart after the qty update is complete
		
		
?>