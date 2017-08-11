<?php
session_start();
?>
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
	
	
	$city= filter_input(INPUT_POST,'city');
	$city=htmlspecialchars($city);
	
	$state = filter_input(INPUT_POST,'state');
	$state = htmlspecialchars($state);
	
	$zip = filter_input(INPUT_POST,'postalCode');
	$zip = htmlspecialchars($zip);
	
	$country = filter_input(INPUT_POST,'country');
	$country = htmlspecialchars($country);
	
	//enter the customer shipping info into the customer info table first
	$sql="INSERT INTO customerinfo (userID,fullName,emailAddress,addLine1,city,state,zip,country) VALUES ('$_SESSION[userID]',:fullName1,:emailAddress1,:addressLine11,:city1,:state1,:postalCode1,:country)";
	$execStatement=$db->prepare($sql);
	$execStatement->bindValue(':fullName1', $fullName);
	$execStatement->bindValue(':emailAddress1', $emailAdd);
	$execStatement->bindValue(':addressLine11', $addLine1);
	$execStatement->bindValue(':city1', $city);
	$execStatement->bindValue(':state1', $state);
	$execStatement->bindValue(':postalCode1', $zip);
	$execStatement->bindValue(':country', $country);
	$execStatement->execute();
	
	//enter the order details from the shopping cart into the orders table
	$sql2="INSERT INTO orders (cartID,userID,itemID,uploadedImg,specInstr,quantity,price,totalCost) SELECT cartID,userID,itemID,uploadedImg,specInstr,quantity,price,totalCost FROM shoppingCart WHERE userID = '$_SESSION[userID]'";
	$execStatement=$db->prepare($sql2);
	$execStatement->execute();
	
	
	//add the customer info into the orders table
	$updateQuery="UPDATE orders AS o INNER JOIN customerinfo as c ON o.userID=c.userID SET o.fullName=c.fullName,o.emailAdd=c.emailAddress,o.addLine1=c.addLine1,o.city=c.city,o.state=c.state,o.postalCode=c.zip,o.country=c.country WHERE o.userID='$_SESSION[userID]'";
	$updateStatement=$db->prepare($updateQuery);
	
	
	$updateStatement->execute();
	
	$deleteQuery="DELETE FROM shoppingCart WHERE userID= '$_SESSION[userID]'";  //clear the shoppingCart after order is completed
		$deleteStatement = $db-> prepare($deleteQuery);
		$deleteStatement->execute();
		

$to = "ckeyser@umich.edu";    //after successful order, send email notification to client to let him know he has a new order
		$subject = "New Order";
		$txt = "
		<html> 
		<body>
		You have a new order!
		</body>
		</html>

		";
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= "From: webmaster@example.com"; 


		mail($to,$subject,$txt,$headers);


		
	header("Location:products.php");  //after successful order, redirect customer to products page
        //header("Location: http://sportinglifecards.com/qa-2/products.php");
         //window.location.href = "products.php";
	
		
?>