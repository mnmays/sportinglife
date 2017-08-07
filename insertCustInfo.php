<?php
session_start();
//echo $_SESSION["userID"];
?>
<script type="text/javascript">function insertOrder()
{
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET", "insertOrder.php",true);
	xmlhttp.send();
};</script>


<?php
require_once('database.php');	
	
    $totalCart=filter_input(INPUT_POST, 'totalCost');
	$totalCart=htmlspecialchars($totalCart);
    
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
	
	
	$sql="INSERT INTO customerinfo (userID,fullName,emailAddress,addLine1,city,state,zip,country) VALUES ('$_SESSION[userID]',:fullName1,:emailAddress1,:addressLine11,:city1,:state1,:postalCode1,:country)";
	$execStatement=$db->prepare($sql);
	$execStatement->bindValue(':fullName1', $fullName);
	$execStatement->bindValue(':emailAddress1', $emailAdd);
	$execStatement->bindValue(':addressLine11', $addLine1);
	//$execStatement2->bindValue(':address-line21', $addLine2);
	$execStatement->bindValue(':city1', $city);
	$execStatement->bindValue(':state1', $state);
	$execStatement->bindValue(':postalCode1', $zip);
	$execStatement->bindValue(':country', $country);
	$execStatement->execute();
	/*echo $fullName;
	echo $emailAdd;
	echo $addLine1;
	echo $city;
	echo $state;
	echo $zip;
	echo $country;*/
	
	
	
	//echo "<script> insertOrder(); </script>";
	
	//header("location:order-checkout.php");

	//header("location:shopping-cart.php");
	$sql2="INSERT INTO orders (cartID,userID,itemID,uploadedImg,specInstr,quantity,price,totalCost) SELECT cartID,userID,itemID,uploadedImg,specInstr,quantity,price,totalCost FROM shoppingcart WHERE userID = '$_SESSION[userID]'";
	$execStatement=$db->prepare($sql2);
	$execStatement->execute();
	
	//$sql2="INSERT INTO orders (fullName,emailAdd,addLine1,city,state,SELECT custID FROM customerInfo WHERE userID = '$_SESSION[userID]'"; 
	 //$execStatement2= $db->prepare($sql2);
	 //$execStatement2->execute();
	
	
	
	$updateQuery="UPDATE orders AS o INNER JOIN customerinfo as c ON o.userID=c.userID SET o.fullName=c.fullName,o.emailAdd=c.emailAddress,o.addLine1=c.addLine1,o.city=c.city,o.state=c.state,o.postalCode=c.zip,o.country=c.country WHERE o.userID='$_SESSION[userID]'";
	//$updateQuery="INSERT INTO customerinfo (userID,fullName,emailAddress,addLine1,city,state,zip,country) VALUES ('$_SESSION[userID]',:fullName1,:emailAddress1,:addressLine11,:city1,:state1,:postalCode1,:country)";
	//$sql4="INSERT INTO customerinfo (userID,fullName) VALUES ('$_SESSION[userID]',:full-name1)";
	$updateStatement=$db->prepare($updateQuery);
	
	
	$updateStatement->execute();
	
	$deleteQuery="DELETE FROM shoppingCart WHERE userID= '$_SESSION[userID]'";
		$deleteStatement = $db-> prepare($deleteQuery);
		//$insertStatement->bindValue(':userID1', $userID);
		//$insertStatement->bindValue(':id1', $itemId);
		//$insertStatement->bindValue(':image1', $image);
		//$insertStatement->bindValue(':message1', $message);
		//$insertStatement->bindValue(':quantity1', $quantity);
		//$insertStatement->bindValue(':price', $price);
		//$insertStatement->bindValue(':totalCost', $totalCost);
		$deleteStatement->execute();
		
		//$msg = 'You have a new order.'; 
		//mail("ckeyser@umich.edu","New Order",$msg);
		
	header("location:products.php");
	
		
?>