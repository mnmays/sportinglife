<?php
session_start();
echo $_SESSION["userID"];
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
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
<!--<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script src="checkout.js"></script>-->
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



$sql="SELECT cartID,itemID,itemDesc,uploadedImg,quantity,price,totalCost FROM shoppingCart WHERE userID = '$_SESSION[userID]'"; 
$viewStmt =$db->prepare($sql);
$viewStmt->execute();

$itemList=$viewStmt->fetchAll();
$viewStmt->closeCursor(); ?>
<table>
	<tr>
		<th>Uploaded Image</th>
		<th>Item Name</th>
		<th>Quantity</th>
		<th>Price</th>
		<th>Total Cost</th>
	</tr>
<?php
$totalCart=0;
$totalQty=0;
$totalShip=0;
foreach($itemList as $item) {
			
		$cartID=$item['cartID'];
		echo '<div class="item"><tr><th><img src="data:image/jpeg;base64, '.base64_encode($item['uploadedImg']) . ' "></th><th> ' . $item['itemDesc'] ."</th><th> ".$item['quantity'].'</th><th> '. $item['price'] . "</th><th> ".$item['totalCost'].'</th><td><button id="popup" onclick="div_show2( '. $item['cartID'] .')">Edit Qty</button></td>';
		$totalCart = $totalCart + $item['totalCost'];
		$totalQty = $totalQty + $item['quantity'];
		$cartID=$item['cartID'];?>
		<td></td><a href="removeItem.php?varnam=<?php echo $cartID?>">Remove item</a></td></tr><br></div>
		
  <?php
  
	}//end foreach 
	//echo $totalCart;
	//echo '<br>';
	//echo $totalQty;
	if($totalQty==1)
	{
		$totalShip=3.50;
	}
	else if($totalQty==0)
	{
		$totalShip=0.00;
	}
	else 
	{
		$totalShip=3.50+(($totalQty-1)*.5);
	}
	//echo '<br>';
	//echo $totalShip;
	$totalCart=$totalCart+$totalShip;
	//echo '<br>';
	//echo $totalCart;
	
	?>


</table>
<div id="totals">
	<p> Total Shipping: $<?php echo $totalShip ?> <br>
		Total Cost: $<?php echo $totalCart ?>
		</p>
</div>
<!--<input onclick="clearCart()" type='submit' value='Clear Cart'>-->
<!--<button id="popup" onclick="clearCart()">Clear Cart</button>-->
<a href="clearCart.php">Clear Cart</a>
<!--<button id="checkout" onclick="window.location='order-checkout.php';">Checkout</button>-->
<a href="order-checkout.php?varname=<?php echo $totalCart ?>">Checkout</a>





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