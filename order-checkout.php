<!--This page is where a customer fills out their shipping information and is prompted to pay with PayPal.-->

<script type="text/javascript">function noItems()
{
	alert("No items in your shopping cart to purchase.");
	window.location.href = "shopping-cart.php";
};</script>

<?php
session_start();
if (!isset($_SESSION["userID"]))
{
	header("location:products.php");  //if user doesn't have a session ID yet, redirect them to the products page
}
require_once('database.php');

$sql="SELECT cartID FROM shoppingCart WHERE userID = '$_SESSION[userID]'"; 
$viewStmt =$db->prepare($sql);
$viewStmt->execute();

$itemList=$viewStmt->fetchAll();
$cartRowCount = $viewStmt->rowCount();

if($cartRowCount==0)
{
	echo "<script> noItems(); </script>";  //if user has no items in cart yet, display this message
}

$totalCart = $_GET['varname'];

?>

<!DOCTYPE html>
<html>
<head>
<title>Popup contact form</title>
<link href="styles/elements.css" rel="stylesheet">
<link rel = "stylesheet" href = "styles/shoppingCart.css">
<link rel = "stylesheet" href = "styles/checkout.css">
<link rel="styleSheet" href = "styles/generalStyles.css">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="JS/my_js.js"></script>
</head>

<header style="background-image:url(images/LongWoodPlanksBkgrnd.jpg)"; >
		<img id="logo" src="images/logo.png" />
</header>

<!-- Body Starts Here -->
<body id="body">
    <nav>
		<ul>
			<li class="active">
				<a href="products.php" id="products">Products</a>	
			</li>
			<li class="active">
				<a href="cardSets/cardFiles/card-sets.php" id="cardSets">Card Sets</a>
			</li>
			<li class="active">
				<a href="about-sporting-life.html" id="abtCreator">About </a>
			</li>
			<li class="active">
				<a href="connect.php" id="connect">Contact Sporting Life</a>
			</li>
			<li style="float:right" class="active">
				<a href="shopping-cart.php" id="cart"><img id="shopping-cart" src="images/shopping-cart.png"/></a>
			</li>
		</ul>
</nav>



<form action="insertCustInfo.php" id="myForm" method="post" name="form">
<h3>Step 1: Enter Shipping Details</h3>
<p>Note: Orders can only be shipped inside the United States.</p>
			<table>
			<tr>
			<td><input id="totalCart1" name="totalCart" type="hidden" value=<?php echo $totalCart ?>></td>
			<td><div id='totalCart'></div></td>
			</tr>
			<tr>
			<td>Full Name</td>
			<td><input id="fullName1" name="fullName" onblur="validate2('fullName', this.value)" type="text"></td>
			<td><div id='fullName'></div></td>
			</tr>
			<tr>
			<td>Email Address</td>
			<td><input id="emailAddress1" name="emailAddress" onblur="validate2('emailAddress', this.value)" type="text"></td>
			<td><div id='emailAddress'></div></td>
			</tr>
			<tr>
			<td>Street Address/Apartment/Suite/Building, etc.</td>
			<td><input id="addressLine11" name="addressLine1" onblur="validate2('addressLine1', this.value)" type="text"></td>
			<td><div id='addressLine1'></div></td>
			</tr>
			<tr>
			<td>City</td>
			<td><input id="city1" name="city" onblur="validate2('city', this.value)" type="text"></td>
			<td><div id='city'></div></td>
			</tr>
			<tr>
			<td>State/Province/Region</td>
			<td><input id="state1" name="state" onblur="validate2('state', this.value)" type="text"></td>
			<td><div id='state'></div></td>
			</tr>
			<tr>
			<td>Zip/Postal Code</td>
			<td><input id="postalCode1" name="postalCode" onblur="validate2('postalCode', this.value)" type="text"></td>
			<td><div id='postalCode'></div></td>
			</tr>
			<tr>
			<td>Country</td>
			<td><input id="country1" name="country" type="text" value="United States" readonly></td>
			<td><div id='country'></div></td>	 
			</tr>		
</table>

			<input type="button" id="continue" value="Continue" onclick="return checkForm3()" />
</form>
<br>

<div id="paypal-button-container" style="display:none;" class="answer_list">
	<h3>Step 2: Payment</h3>
</div>

<footer>
	<center>
		<a href="https://twitter.com/SportingLifeArt?ref_src=twsrc%5Etfw&ref_url=http%3A%2F%2F127.0.0.1%3A8020%2Fsportsentities.home%2Fconnect.html">
			<img src="images/whiteTwit.png" alt="Sporitng Life Twitter" id="TwitLogo"/></a>
			<a href="https://www.facebook.com/SportingLifeCards/"><img src="images/whiteFB.png" alt="Sporting Life Facebook" id="FBLogo"/></a>
					<a href="https://www.pinterest.com/jandrews3d/sporting-life-art-cards-collectibles/?fb_ref=528962056142023372%3Acba652a7869654e0e616">
 			<img src="images/whitePint.png" alt ="Sporting Life Pintrest" id="pinLogo"/>
 		</a>
 	</center>
</footer>
</body>
<!-- Body Ends Here -->
</html>