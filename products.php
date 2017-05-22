<!DOCTYPE html>
<html>
<head>
<title>Popup contact form</title>
<link href="elements.css" rel="stylesheet">
<link rel = "stylesheet" href = "products.css">
<link rel="styleSheet" href = "styles/generalStyles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src = "orderValidation.js"></script>
<script src="my_js.js"></script>
</head>
<header>
	<img src="images/logo.png" alt="Sporting Life Logo" id="logo">
   	 <link rel = "stylesheet" href = "products.css">
	<link rel="styleSheet" href = "mainStyles.css">
    </header>
<!-- Body Starts Here -->
<body id="body">
			<nav>
   	 <ul>
   		 <li class="active">
   			 <a href="sets.php" id="cardSets">Card Sets</a>
   		 </li>
   		 <li class="active">
   			 <a href="products.php" id="products">Products</a>    
   		 </li>
   		 <li class="active">
   			 <a href="aboutcreator.html" id="abtCreator">About the Creator</a>
   		 </li>
   		 <li class="active">
   			 <a href="connect.html" id="connect">Connect with Sporting Life</a>
   		 </li>
   	 </ul>
    </nav>

			<div id="whiteSpace">
			<script type="text/javascript" src="//www.auctionnudge.com/feed/item/js/theme/carousel/blank/1/carousel_scroll/4/carousel_auto/0/carousel_width/370/SellerID/sport_king1/siteid/0/MaxEntries/6"></script>
			<div id="auction-nudge-items" class="auction-nudge" align="center"></div>
		<div align="center">
			<?php		
require_once('database.php');

$sql="SELECT itemID,itemImage,itemSize,itemDesc,itemPrice FROM customitems";
$viewStmt =$db->prepare($sql);
$viewStmt->execute();

$itemList=$viewStmt->fetchAll();
$viewStmt->closeCursor();
foreach($itemList as $item) {
				echo '<div class="item"><img src="data:image/jpeg;base64, '.base64_encode($item['itemImage']) . ' "><p> '. $item['itemSize'] . "</p><p> " . $item['itemDesc'] ."</p><p> ".$item['itemPrice'].'</p><button id="popup" onclick="div_show('. $item['itemID'] .')">Order</button></div>';
			}//end foreach ?>
<div id="abc">
<!-- Popup Div Starts Here -->
<div id="popupContact">
<!-- Contact Us Form -->
<form action="#" id="myForm" method="post" name="form">
	<img id="close" src="images/close.png" onclick ="div_hide()">
<h3>Enter your contact information and order details below</h3>
			<table>
			<tr>
			<td>Item ID</td>
			<td><input id="id1" name="id" type="text"></td>
			<td><div id='id'></div></td>
			</tr>
			<tr>
			<td>Item Size</td>
			<td><input id="size1" name="size" type="text"></td>
			<td><div id='size'></div></td>
			</tr>
			<tr>
			<td>Item Price</td>
			<td><input id="price1" name="price" type="text"></td>
			<td><div id='price'></div></td>
			</tr>
			<tr>
			<td>First Name</td>
			<td><input id ="firstName1" name="firstName" onblur="validate('firstName', this.value)" type ="text"></td>
			<td><div id = 'firstName'></div></td>
			</tr>
			<tr>
			<td>Last Name</td>
			<td><input id ="lastName1" name="lastName" onblur="validate('lastName', this.value)" type ="text"></td>
			<td><div id = 'lastName'></div></td>
			</tr>
			<tr>
			<td>Email Address</td>
			<td><input id ="emailAdd1" name="emailAdd" onblur="validate('emailAdd', this.value)" type ="text"></td>
			<td><div id = 'emailAdd'></div></td>
			</tr>
			<tr>
			<td>Image Upload</td>
			<td><input id ="image1" name="image" onblur="validate('image', this.value)" type ="file" accept="image/*"></td>
			<!--<td><input type="submit"></td>-->
			<td><div id = 'image'></div></td>
			</tr>
			<td>Message</td>
			<td><input id ="message1" name="message" onblur="validate('message', this.value)" type ="text"></td>
			<td><div id = 'message'></div></td>
			</tr>
			<tr>
			<td>Quantity</td>
			<td><input id ="quantity1" name="quantity" onblur="validate('quantity', this.value)" type ="text"></td>
			<td><div id = 'quantity'></div></td>
			</tr>
			</table>

			<input onclick="return checkForm()" type='submit' value='Add to Cart'>
</form>
</div>
<!-- Popup Div Ends Here -->
</div>
<!-- Display Popup Button

<div align="center"><button id="popup" onclick="div_show()">Order</button></div>-->
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