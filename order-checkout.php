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