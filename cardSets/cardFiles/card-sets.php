<!DOCTYPE html>
<html lang="en">
<head>
	<!----including main styles sheet---->
	<link rel="stylesheet" href="../../styles/generalStyles.css">
		<link rel="stylesheet" href="../../styles/cardSets.css">

	<script src="lazyload.min.js"></script>
</head>
<header style="background-image:url(../../images/LongWoodPlanksBkgrnd.jpg)"; >
	<div class="header">
		<img src="../../images/logo.png" id="logo" alt="sporting life logo">
	</div>		
</header>
<body>	
<nav>
		<ul>
			<li class="active">
				<a href="../../products.php" id="products">Products</a>	
			</li>
			<li class="active">
				<a href="../../cardSets/cardFiles/card-sets.php" id="cardSets">Card Sets</a>
			</li>
			<li class="active">
				<a href="../../about-sporting-life.html" id="abtCreator">About </a>
			</li>
			<li class="active">
				<a href="../../connect.php" id="connect">Contact Sporting Life</a>
			</li>
			<li style="float:right" class="active">
				<a href="../../shopping-cart.php" id="cart"><img id="shopping-cart" src="../../images/shopping-cart.png"/></a>
			</li>
		</ul>
</nav>
	<div id="container">
	<!-- card checklist --> 
	<p id="checklistPar">
		Sporting Life wants you to keep track of all the cards you have! <br><br>
		<button id="checklistBtn" onclick="window.location.href='cardChecklist.php'">View Checklist</button>
	</p>
		<a id="cardSeries"><b>Card Series</b></a> <a id="cardSetsLbl"><b>Cards in the Set</b></a>
		
		<div id="column1">
				<?php
					include 'connectionFile/connectionNonPDO.php';
					
					//get all series and number of series in table
					$getSeries = "SELECT * FROM series";
					$resultSeries = mysql_query($getSeries);
					$numRowsSeries = mysql_num_rows($resultSeries);
					
					//Loops through all series
					for($i = 0; $i < $numRowsSeries; $i++) {
						$rowSeries = mysql_fetch_assoc($resultSeries);
						$currSeries = $rowSeries['seriesID'];
						
						echo "<a href='card-sets.php?seriesName=$currSeries'>$currSeries</a> </br>";
					}
					
					mysql_close();
				?>			
			</div>
			<div id="column2">
				<?php
					include 'connectionFile/connectionNonPDO.php';

					//get the pics for the new series
					if($_GET["seriesName"] == NULL) {
						$getCardDefault="SELECT * FROM series";
						$resultCardDefault = mysql_query($getCardDefault);
						$rowCardDefault = mysql_fetch_assoc($resultCardDefault);
						$seriesName = $rowCardDefault['seriesID'];
					}else {
						$seriesName = $_GET["seriesName"];
					}					
					
					$getCards="SELECT cardImageFolder, cardImageName FROM cards WHERE seriesID = '".$seriesName."' ORDER BY cardNumber ASC";
					$resultCards = mysql_query($getCards);
					
					while($rowCards = mysql_fetch_assoc($resultCards)) {
						$image_folder=$rowCards["cardImageFolder"];
						$image_name=$rowCards["cardImageName"];
						
						echo '<div class="gallery">
								<img alt="..." data-original="'.$image_folder.''.$image_name.'">
							</div>';
					}
					
					mysql_close();
				?>			
			</div>
	</div>
</body>
<footer>
	<div align="center">
		<a href="https://twitter.com/SportingLifeArt?ref_src=twsrc%5Etfw&ref_url=http%3A%2F%2F127.0.0.1%3A8020%2Fsportsentities.home%2Fconnect.html">
			<img src="../../images/whiteTwit.png" alt="Sporitng Life Twitter" id="TwitLogo"/></a>
			<a href="https://www.facebook.com/SportingLifeCards/"><img src="../../images/whiteFB.png" alt="Sporting Life Facebook" id="FBLogo"/></a>
					<a href="https://www.pinterest.com/jandrews3d/sporting-life-art-cards-collectibles/?fb_ref=528962056142023372%3Acba652a7869654e0e616">
 			<img src="../../images/whitePint.png" alt ="Sporting Life Pintrest" id="pinLogo"/>
 		</a>
 	</div>
</footer>
	<script>
		var myLazyLoad = new LazyLoad();
		
		myLazyLoad.update();
	</script>
</html>