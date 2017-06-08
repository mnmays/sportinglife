<!DOCTYPE html>
<html lang="en">
<head>
	<style>
		#container {
			float:left;
			width:100%;
			padding:1%;
		}
		#column1 {
			list-style-type: circle;
			float:left;
			width:8%;
			padding-top: 1%;
		}
		#column2 {
			float:left;
			width:92%;
			padding-top: 1%;		
		}
		#buttons {
			width: 100%;
			table-layout: fixed;
			border-collapse: collapse;
			background-color: red;
		}
		#buttons button{
			width: 100%;
		}
	</style>
	<!----including main styles sheet---->
	<link rel="stylesheet" type="text/css" href="styles/generalStyles.css">
	<link rel="stylesheet" type="text/css" href="styles/cardSets.css">
	
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
<header style="
	background-image:url(images/comerica-park-artwork.jpg); 
	background-size: cover;
	" >
	<div class="header">
		<img src="images/logo.png" id="logo" alt="sporting life logo">
	</div>		
</header>
<body>
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
	<div id="container">
		<input type="button" value="Click here for a checklist of all cards and series" onclick="window.location.href='cardChecklist.php'"><br>
		<div id="column1">
			<?php
				include 'connection.php';
				$sql1 = "SELECT * FROM series";

				$result1 = mysql_query($sql1);
	 
				$numRows = mysql_num_rows($result1);
	  
				for($i=0; $i < $numRows; $i++) {
				 	$row1 = mysql_fetch_assoc($result1);
					?>
				    <table class=buttons>
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
</html>