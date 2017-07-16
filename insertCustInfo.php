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
	
	
	echo "<script> insertOrder(); </script>";
	//header("location:order-checkout.php");
	
		
?>