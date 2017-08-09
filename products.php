<!--This page displays the custom items available for purchase and allows the user to fill out
	an order form to add these items to their cart.-->

<?php
session_start();
$id=session_id();
?>

<!DOCTYPE html>
<html>
<head>
<title>Popup contact form</title>
<link href="styles/elements.css" rel="stylesheet">
<link rel = "stylesheet" href = "styles/products.css">
<link rel="stylesheet" href = "styles/generalStyles.css">
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
	$_SESSION["userID"]=$id;
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
			<li class="active">
				<a href="shopping-cart.php" id="cart">Shopping Cart</a>
			</li>
		</ul>
</nav>
    </nav>

			<div id="whiteSpace">
			<script type="text/javascript" src="//www.auctionnudge.com/feed/item/js/theme/carousel/blank/1/carousel_scroll/4/carousel_auto/0/carousel_width/370/SellerID/sport_king1/siteid/0/MaxEntries/6"></script>
			<div id="auction-nudge-items" class="auction-nudge" align="center"></div>
		<div align="center">
			
	<div id="details">
		<p>Choose from four previously designed Sporting Life card formats displayed below. <br>
			Upload a clear photo of your subject person (4"x5" jpeg @ 300 dpi) and a card write up/biography<br>
			if needed. Six classic cards come in an order. Please allow 4-6 weeks<br>
			for delivery. 
		</p>
	</div>		
			<?php		
require_once('database.php');
			
			
$sql="SELECT itemID,itemImage,itemDesc,itemPrice FROM customitems";  //select the available products from the DB
$viewStmt =$db->prepare($sql);
$viewStmt->execute();

$itemList=$viewStmt->fetchAll();
$viewStmt->closeCursor();
foreach($itemList as $item) {
				echo '<div class="item"><img style="width: 30%;" src="data:image/jpeg;base64, '.base64_encode($item['itemImage']) . ' "><p> ' . $item['itemDesc'] ."</p><p> ".$item['itemPrice'].'</p><button id="popup" onclick="div_show( '. $item['itemID'] .')">Order</button></div>';
			}//end foreach ?>			


<div id="abc">
<!-- Popup Div Starts Here -->
<div id="popupContact">
<!-- Contact Us Form -->

<form action="insertCart.php" id="myForm" method="post"  name="form">   <!--upon submitting the form, insert the order details into the cart table in DB-->
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
			<td>Image Upload of subject (4"x5" jpeg @ 300 dpi)</td>
			<td><input id ="image1" name="image" onchange="validateImg3('image', this.value)" type ="file" accept="image/*"></td>
			<td><div id = 'image'></div></td>
			</tr>
			<tr>
			<td>Card Back Write Up/Biography</td>
			<td><input id ="message1" name="message" onblur="validate('message', this.value)" type ="text"></td>
			<td><div id = 'message'></div></td>
			</tr>
			<tr>
			<td>Number of sets (a set contains 6 cards)</td>
			<td><input id ="quantity1" name="quantity" onblur="validate('quantity', this.value)" type ="text"></td>
			<td><div id = 'quantity'></div></td>
			</tr>
			</table>

			<input onclick="return checkForm()" type='submit' value='Add to Cart'>
</form>
</div>
<!-- Popup Div Ends Here -->
</div>
<!-- Display Popup Button-->


<footer>
			Connect with Sporting Life: 
		<a href="https://twitter.com/SportingLifeArt?ref_src=twsrc%5Etfw&ref_url=http%3A%2F%2F127.0.0.1%3A8020%2Fsportsentities.home%2Fconnect.html">
			<img src="images/twitterlogo.png" alt="twitter icon" id="TwitLogo"/></a>
			<a href="https://www.facebook.com/SportingLifeCards/"><img src="images/facebooklogo.png" alt="facebook icon" id="FBLogo"/></a>
					<a href="https://www.pinterest.com/jandrews3d/sporting-life-art-cards-collectibles/?fb_ref=528962056142023372%3Acba652a7869654e0e616">
 			<img src="images/pintlogo.png" alt ="pinterest icon" id="pinLogo"/>
 		</a>
</footer>
</body>
<!-- Body Ends Here -->
</html>