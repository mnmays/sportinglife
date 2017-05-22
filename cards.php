<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Cards Page</title>
		<link rel = "stylesheet" href = "mainStyles.css">
		<style>
			div.gallery {
				margin: 5px;
				border: 1px solid #ccc;
				float: left;
				width: 480px;
			}
			
			div.gallery:hover {
				border: 1px solid #777;
			}
			
			div.gallery img {
				width: 100%;
				height: auto;
			}
			
			div.desc {
				padding: 15px;
				text-align: center;
			}
		</style>
	</head>
	<header>
		<img src="images/logo.png" alt="Sporting Life Logo" id="logo">
	</header>
	<body>
		<nav>
			<ul>
	 			<li class="active">
		 			<a href="series.php" id="cardSets">Card Sets</a>
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
		<?php
			//$servername = "localhost";
			//$username = "root";
			//$password = "4567db#";
			//$dbname = "sports_entities";
			$servername = 'localhost';
			$username = 'root';
			$password = '4567db#';
			$dbname = 'sportinglife';
					
			//create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			//check connection
			if($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			
			$sql = "SELECT cardImage, cardDesc FROM sports_entities.cards";
			$result = $conn->query($sql);
			if($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo '<div class="gallery"> 
							<img src="data:image/jpeg;base64, '.base64_encode($row['cardImage']).'">
							<div class="desc"> '.$row["cardDesc"].' </div>
							</div>';		
				}//end while	
			}//end if
			$conn->close();
		?>
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
</html>