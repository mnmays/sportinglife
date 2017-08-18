<!DOCTYPE html>
<html lang="en">
<head>
	<!----including main styles sheet---->
	<link rel="stylesheet" type="text/css" href="styles/generalStyles.css">
	<link rel="stylesheet" type="text/css" href="styles/cardSets.css">

	<script src="lazyload.min.js"></script>
  	<style> 
			#container {
				float: left;
				width: 100%;
				padding: 1%;
			}
			
			#column1 {
				list-style-type: circle;
				float: left;
				width: 10%;
				height: 100%;
				padding-top: 1%;
                                
				background-color: #a8c9ff;
			}
			
			#column2 {
				float: left;
				width: 89%;
				padding-top: 1%;
		                padding-left: 1%;
			}
			
			#myDiv {
			    display: none;
			    text-align: center;
			}
			
			div.gallery {
				margin: 5px;
				border: 1px solid #ccc;
				float: left;
				width: auto;
                                height: 360px;
				min-height: 300px;
                                max-height: 400px;
                                min-width: 300px;
      
			}
			
			div.gallery img {
				width: auto;	
                                height: 360px;
			}
	</style>
</head>
<header style="
	background-image:url(../../images/comerica-park-artwork.jpg); 
	background-size: cover;
	" >
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
				<a href="card-sets.php?seriesName" id="cardSets">Card Sets</a>
			</li>
			<li class="active">
				<a href="../../about-sporting-life.html" id="abtCreator">About the Creator</a>
			</li>
			<li class="active">
				<a href="../../connect.php" id="connect">Connect with Sporting Life</a>
			</li>
		</ul>
	</nav>
	<div id="container">
		<input type="button" value="Click here for a checklist of all cards and series" onclick="window.location.href='cardChecklist.php'"><br>
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
	<script>
		var myLazyLoad = new LazyLoad();
		
		myLazyLoad.update();
	</script>
	<footer>
		Connect with Sporting Life: 
		<a href="https://twitter.com/SportingLifeArt?ref_src=twsrc%5Etfw&ref_url=http%3A%2F%2F127.0.0.1%3A8020%2Fsportsentities.home%2Fconnect.html">
			<img src="../../images/twitterlogo.png" alt="twitter icon" id="TwitLogo"/></a>
			<a href="https://www.facebook.com/SportingLifeCards/"><img src="../../images/facebooklogo.png" alt="facebook icon" id="FBLogo"/></a>
			<a href="https://www.pinterest.com/jandrews3d/sporting-life-art-cards-collectibles/?fb_ref=528962056142023372%3Acba652a7869654e0e616">
			<img src="../../images/pintlogo.png" alt ="pinterest icon" id="pinLogo"/>
		</a>
	</footer>
</body>
</html>