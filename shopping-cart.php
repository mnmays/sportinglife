<?php
session_start();
if (!isset($_SESSION["userID"]))
{
	header("location:products.php");
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Popup contact form</title>
<link href="styles/elements.css" rel="stylesheet">
<link rel = "stylesheet" href = "styles/shoppingCart.css">
<link rel="styleSheet" href = "styles/generalStyles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="JS/my_js.js"></script>
</head>
<header style="
	background-image:url(images/comerica-park-artwork.jpg); 
	background-size: cover;
	" >
	<img src="images/logo.png" alt="Sporting Life Logo" id="logo">
   	 <link rel = "stylesheet" href = "styles/products.css">
	<link rel="styleSheet" href = "styles/generalStyles.css">
    </header>
<!-- Body Starts Here -->
<body id="body">
	<?php
	/*echo "Session variable is set to: " .$_SESSION["userID"] .".<br>";*/
	/*if(!isset($_COOKIE[$cookie_name]))
	{
		echo "Cookie named '" .$cookie_name ."' is not set!";
	}
	else {
		{
			echo "Cookie '" .$cookie_name. "' is set!<br>";
			echo "Value is: " .$_COOKIE[$cookie_name];
		}
	}*/
	
	
	?>
	
<nav>
		<ul>
			<li class="active">
				<a href="products.php" id="products">Products</a>	
			</li>
			<li class="active">
				<a href="card-sets.php" id="cardSets">Card Sets</a>
			</li>
			<li class="active">
				<a href="about-sporting-life.html" id="abtCreator">About the Creator</a>
			</li>
			<li class="active">
				<a href="connect.php" id="connect">Connect with Sporting Life</a>
			</li>
		</ul>
</nav>


<script src="JS/my_js.js"></script>

<?php		
require_once('database.php');


$sql="SELECT cartID,itemID,uploadedImg,quantity,price,totalCost FROM shoppingCart WHERE userID = '$_SESSION[userID]'"; 
$viewStmt =$db->prepare($sql);
$viewStmt->execute();

$itemList=$viewStmt->fetchAll();
$viewStmt->closeCursor(); ?>
<table>
	<tr>
		<th>Uploaded Image</th>
		<th>Cart ID</th>
		<th>Item Number</th>
		<th>Quantity</th>
		<th>Price</th>
		<th>Total Cost</th>
	</tr>
<?php
foreach($itemList as $item) {
		/*$cart_id=$item["cartID"];
		$item_id=$item["itemID"];
		$item_qty=$item["quantity"];
		$item_price=$item['price'];
		$item_total=$item['totalCost'];
		
		echo '<div class="item"><tr><th><img src="data:image/jpeg;base64, '.base64_encode($item['uploadedImg']).'></th>';
		echo '<td>'.$cart_id.'</td>';
		echo '<td>'.$item_id.'</td>';
		echo '<td>Qty <input type="text" size="2" maxlength="2" name="quantity" value="'.$item_price.'" /></td>';
		echo '<td>'.$item_price.'</td>';
		echo '<td>'.$item_qty.'</td>';
		echo '<td>'.$item_total.'</td>';*/
		
		
		
	
		echo '<div class="item"><tr><th><img src="data:image/jpeg;base64, '.base64_encode($item['uploadedImg']) . ' "></th><th> '. $item['cartID'] . "</th><th> " . $item['itemID'] ."</th><th> ".$item['quantity'].'</th><th> '. $item['price'] . "</th><th> ".$item['totalCost'].'</th><td><button id="popup" onclick="div_show2( '. $item['cartID'] .')">Edit Qty</button></td></tr><br></div>';
			

	}//end foreach ?>


</table>
<input onclick="clearCart()" type='submit' value='Clear Cart'>
<input onclick="()" type='submit' value='Checkout'>
<div id="abc">
<!-- Popup Div Starts Here -->
<div id="popupContact">
<!-- Contact Us Form -->
<form action="updateCart.php" id="myForm" method="post" name="form">
	<img id="close" src="images/close.png" onclick ="div_hide()">
<h3>Enter order details below</h3>
			<table>
			<tr>
			<td><input id="id1" name="id" type="hidden"></td>
			<td><div id='id'></div></td>
			</tr>
			<tr>
			<td><input id="userID1" name="userID" type="hidden" value=<?php echo $_SESSION["userID"] ?>></td>
			<td><div id='userID'></div></td>
			</tr>
			<tr>
			<td><input id="cartID1" name="cartID" type="hidden"></td>
			<td><div id='cartID'></div></td>
			</tr>
			<tr>
			<td>Quantity</td>
			<td><input id ="quantity1" name="quantity" onblur="validate('quantity', this.value)" type ="text"></td>
			<td><div id = 'quantity'></div></td>
			</tr>
			</table>

			<input onclick="return checkForm2()" type='submit' value='Save'>
</form>
</div>
<!-- Popup Div Ends Here -->
</div>
</body>
<footer>
   	 <div id="SMlinks">
   		 Connect with Sporting Life:
   	 <a href="https://twitter.com/SportingLifeArt?ref_src=twsrc%5Etfw&ref_url=http%3A%2F%2F127.0.0.1%3A8020%2Fsportsentities.home%2Fconnect.html">
   	 	<img src="images/twitterlogo.png" alt="twitter icon" id="TwitLogo"/>
		 </a>
		 <a href="https://www.facebook.com/SportingLifeCards/">
		 	<img src="images/facebooklogo.png" alt="facebook icon" id="FBLogo"/>
   	 </a>
		 <a href="https://www.pinterest.com/jandrews3d/sporting-life-art-cards-collectibles/?fb_ref=528962056142023372%3Acba652a7869654e0e616">
		 	<img src="images/pintlogo.png" alt ="pinterest icon" id="pinLogo"/>    		 
		 </a>
   	 </div>
    </footer>
<!-- Body Ends Here -->
</html>