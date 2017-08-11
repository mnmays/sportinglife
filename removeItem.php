<?php
session_start();
$cartID = $_GET['varnam'];
//echo $cartID;

require_once('database.php');	

//echo "Session variable is set to: " .$_SESSION["userID"] .".<br>";

$deleteQuery="DELETE FROM shoppingCart WHERE cartID= $cartID"; //where passed in cartID = cartID in DB
		$deleteStatement = $db-> prepare($deleteQuery);
		$deleteStatement->execute();
		
		
		header("location:shopping-cart.php");
		

?>
