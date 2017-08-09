<?php
session_start();
$cartID = $_GET['varnam'];
echo $cartID;

require_once('database.php');	

echo "Session variable is set to: " .$_SESSION["userID"] .".<br>";

$deleteQuery="DELETE FROM shoppingCart WHERE cartID= $cartID"; //where passed in cartID = cartID in DB
		$deleteStatement = $db-> prepare($deleteQuery);
		//$insertStatement->bindValue(':userID1', $userID);
		//$insertStatement->bindValue(':id1', $itemId);
		//$insertStatement->bindValue(':image1', $image);
		//$insertStatement->bindValue(':message1', $message);
		//$insertStatement->bindValue(':quantity1', $quantity);
		//$insertStatement->bindValue(':price', $price);
		//$insertStatement->bindValue(':totalCost', $totalCost);
		$deleteStatement->execute();
		
		
		//echo "Item removed!";
		header("location:shopping-cart.php");
		 //echo '<meta http-equiv="refresh" content="1" />';
		

?>
