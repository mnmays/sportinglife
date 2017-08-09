
<?php
//this page executes a query to remove the selected item from the DB
session_start();

require_once('database.php');	

echo "Session variable is set to: " .$_SESSION["userID"] .".<br>";

$deleteQuery="DELETE FROM shoppingCart WHERE userID= '$_SESSION[userID]'";
		$deleteStatement = $db-> prepare($deleteQuery);
		$deleteStatement->execute();
		
		header("location:shopping-cart.php");  //redirect user to shoppingCart page after item has been removed from DB
		

?>
