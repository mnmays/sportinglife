<!DOCTYPE html>
<html lang="en">
<head>
	<!----including main styles sheet---->
	<link rel="stylesheet" href = "styles/generalStyles.css">
	<link rel="stylesheet" href = "styles/cardSets.css">

	<!-- JS script to populate cards upon butto click --> 
		<script>
		function showPics(str) {
		  if (window.XMLHttpRequest) {
		    // code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp=new XMLHttpRequest();
		  } 
		  else { // code for IE6, IE5
		    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xmlhttp.onreadystatechange=function() {
		  if (this.readyState==4 && this.status==200) {
		      document.getElementById("txtHint").innerHTML=this.responseText;
		    }
		  }
		  xmlhttp.open("GET","getpics.php?q="+str,true);
		  xmlhttp.send();
		}
	</script>

</head>
<header style="background-image:url(../sportinglife/images/LongWoodPlanksBkgrnd.jpg)"; >
	<img id="logo" src="../sportinglife/images/logo.png" />
</header>

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

<body>
	<div id="container">
	<!-- card checklist --> 
	<p id="checklistPar">
		Sporting Life wants you to keep track of all the cards you have! <br>
		<button onclick="window.location.href='cardChecklist.php'">View Checklist</button>
	</p>
		<a id="cardSeries"><b>Card Series</b></a> <a id="cardSetsLbl"><b>Cards in the Set</b></a>
		<div id="column1">
			<?php
				include 'connection.php';
				$sql1 = "SELECT * FROM series";

				$result1 = mysql_query($sql1);
	 
				$numRows = mysql_num_rows($result1);
	  
				for($i=0; $i < $numRows; $i++) {
				 	$row1 = mysql_fetch_assoc($result1);
					?>
				    <table class="buttons">
				  		<tr>
				  			<input type="button" value="<?php echo $row1['seriesName'];?>" onclick="showPics(<?php echo $row1['seriesID'];?>)"><br>
				  		</tr>
				  	</table>					
				  <?php	  
				 } 
	 
				 mysql_close($conn);
			?>
		</div>
		
		<div id="column2">			
				<div id="txtHint"><b>Please select a series from the left</b></div>		
		</div>

	
	</div>

<!-- series --> 
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
</html>