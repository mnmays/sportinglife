<!--This page displayed the shopping cart, allows user to edit the quantity of items, 
	remove specific line items, clear the entire cart and proceed to checkout.  -->

<?php
session_start();
//echo $_SESSION["userID"];
if (!isset($_SESSION["userID"]))
{
	header("location:products.php");
}

?>

<!DOCTYPE html>
<html>
	
<head>
<title>Sporting Life Cards Shopping Cart</title>
<link href="styles/elements.css" rel="stylesheet">
<link rel = "stylesheet" href = "styles/shoppingCart.css">
<link rel="styleSheet" href = "styles/generalStyles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script src="JS/my_js.js"></script>
</head>

<header style="background-image:url(images/LongWoodPlanksBkgrnd.jpg)"; >
	<img id="logo" src="images/logo.png" />
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
<article>
	

<?php	

//this section grabs all cart items for a user's session ID and displays them	
require_once('database.php');



$sql="SELECT cartID,itemID,itemDesc,uploadedImg,quantity,price,totalCost FROM shoppingCart WHERE userID = '$_SESSION[userID]'"; 
$viewStmt =$db->prepare($sql);
$viewStmt->execute();

$itemList=$viewStmt->fetchAll();
$viewStmt->closeCursor(); ?>
<table>
	<tr>
		<th>Image</th>
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
		echo '<div class="item"><tr><th><img style="width: 10%;" src="data:image/jpeg;base64, '.base64_encode($item['uploadedImg']) . ' "></th><th> ' . $item['itemDesc'] ."</th><th> ".$item['quantity'].'</th><th> '. $item['price'] . "</th><th> ".$item['totalCost'].'</th><td><button class="button" onclick="div_show2( '. $item['cartID'] .')">Edit Qty</button></td><td><a class="button" href=removeItem.php?varnam='. $item['cartID'] .'>Remove Item</a></td>'; 
		
		$totalCart = $totalCart + $item['totalCost'];
		$totalQty = $totalQty + $item['quantity'];
		$cartID=$item['cartID'];?>
		
		<td></td></td></tr><br></div>
		
  <?php
  
	}//end foreach 
	
	if($totalQty==1)   //calculate shipping based on number of items in the order
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
	
	$totalCart=$totalCart+$totalShip;
	
	
	?>


</table>
<div id="totals">
	<p> Total Shipping: $<?php echo $totalShip ?> <br>
		Total Cost: $<?php echo $totalCart ?>
		</p>
</div>

<div id="buttons">
<a href="clearCart.php" class="button">Clear Cart</a>    <!--calls the clearCart.php file to delete the cart items from the DB -->
<a href="order-checkout.php?varname=<?php echo $totalCart ?>" class="button">Checkout</a>   <!--calls the orderCheckout.php file to direct user to checkout-->
</div> <!--- end buttons div --->




<div id="abc">
<!-- Popup Div Starts Here -->
<div id="popupContact">
<!-- Edit quantity Form -->
<form action="updateCart.php" id="myForm" method="post" name="form">   <!--calls updateCart.php file to update with new qty-->
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

			<input onclick="return checkForm2()" type='submit' value='Save'>  <!--validate the update qty form-->
</form>
</div>
<!-- Popup Div Ends Here -->
</div>
</article>

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