<!DOCTYPE html>
<html lang="en">
<head>
	<!----including main styles sheet---->
	<link rel="stylesheet" type="text/css" href="styles/generalStyles.css">
	
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

<header>
	<div class="header">
		<img src="images/logo.png" id="logo" alt="sporting life logo">
	</div>		
</header>

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

<body>
	<aside>
		<?php

 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "M3g4nM4ys17";
 $db = "sportinglife";
 
 
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
/*query*/
 $query = "SELECT * FROM series";
 $result = mysqli_query($conn, $query);
 
 $numRows = mysqli_num_rows($result);
  
 for($i=0; $i < $numRows; $i++)
 {
 	  $row = mysqli_fetch_array($result);
	  ?>
		<input type="button" value="<?php echo $row['seriesName'];?>" onclick="showPics(this.value)"><br>

	  <?php	  
 } ?>
 
 
 	</aside>

	<article>

		<div id="txtHint"><b>Person info will be listed here.</b></div>

	</article>

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