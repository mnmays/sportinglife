<?php		
session_start();
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



$sql="SELECT userID,cartID,itemID,uploadedImg,specInstr,quantity,price,totalCost FROM orders"; 
$viewStmt =$db->prepare($sql);
$viewStmt->execute();

$itemList=$viewStmt->fetchAll();
$viewStmt->closeCursor(); ?>
<table>
	<tr>
		<th>UserID</th>
		<th>Cart ID</th>
		<th>Item Number</th>
		<th>Image</th>
		<th>Special Instr.</th>
		<th>quantity</th>
		<th>Price</th>
		<th>Total Cost</th>
	</tr>
<?php
$totalCart=0;
$totalQty=0;
foreach($itemList as $item) {
		
		echo '<div class="item"><th> '. $item['userID'] . '</th><th> '. $item['cartID'] . "</th><th> " . $item['itemID'] ."</th><th> ".$item['quantity'].'</th><th> '. $item['price'] . "</th><th> ".$item['totalCost'].'</th><br></div>';
		

	}//end foreach 
	
	?>
