<?php
session_start();
echo $_SESSION["userID"];
?>
<script type="text/javascript">function clearPostCheckout()
{
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET", "clearPostCheckout.php",true);
	xmlhttp.send();
};</script>


<?php
require_once('database.php');	
	

		
	$fullName = filter_input(INPUT_POST,'fullName');
	$fullName = htmlspecialchars($fullName);
	
	
	$emailAdd= filter_input(INPUT_POST,'emailAddress');
	$emailAdd = htmlspecialchars($emailAdd);
	
	$addLine1 = filter_input(INPUT_POST,'addressLine1');
	$addLine1 = htmlspecialchars($addLine1);
	
	
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
	
	
	$updateStatement->execute();
	
	
	
	

	 
	
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
		
		
		
		
		$deleteQuery="DELETE FROM shoppingCart WHERE userID= '$_SESSION[userID]'";
		$deleteStatement = $db-> prepare($deleteQuery);
		
		$deleteStatement->execute();
		
		//header("location:shopping-cart.php");
		
		
?>