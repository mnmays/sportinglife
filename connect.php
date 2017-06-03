<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="styles/generalStyles.css">
	<link rel="stylesheet" type="text/css" href="styles/connection.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="JS/connpgJscript.js"></script>
<header style="
	background-image:url(images/comerica-park-artwork.jpg); 
	background-size: cover;
	" >
	<img src="images/logo.png" id="logo" alt="sporting life logo">
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


<aside>
	<p id="SMtitle">
			Follow Sporting Life on Social Media! 
	</p>

<p>
		<button id="popup" onclick="show()">Subscribe</button>	<!--Subscribe Button-->
</p>

<p>
<!----Twitter drop down---->
	<div id="Twitflip">Twitter</div>
	<div id="twitTmln">
			<a class="twitter-timeline" href="https://twitter.com/SportingLifeArt">Tweets by SportingLifeArt</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
	</div>
</p>
<p>	
<!----Facebook drop down---->	
	<div id="FBflip">Facebook</div>
	<div id="FBTmln">
		<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FSportingLifeCards%2F&tabs=timeline&width=300&height=500&small_header=true&adapt_container_width=true&hide_cover=true&show_facepile=false&appId" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
	</div>
</p>	
</aside>

<article>
	<p id="connectPar">			
		Catch up with all things sports on Sporting Life social media sites. See links below to see Sporting Life updates! 
		Don't have social media? That's okay! Sporting Life creator sends out routine emails about new items and upcoming sports events! Don't miss the updates!
	</p>
	
	
			<iframe src="http://meganmays.blogspot.com">
  			<p>Your browser does not support iframes.</p>
			</iframe>

	<!---Pop up div ---->
	<div id="PUwindow">
	
	<!-- Popup -->
	<div id="popupContact">

	<!-- pop up form -->
	<!--
		<form id="form" name="form" type="post" onsubmit="return validate()" action="submitEmail.php"> 
		-->
	<form id="form" name="form" type="post" onsubmit="return validate()" action="submitEmail.php ">

	<h3 id="exit" onclick="hide()">X</h3>
		<h2>Subscribe to Sporting Life Emails</h2>
		<hr>
		<input id="email" name="email" placeholder="Email" type="email">		<!-- Email text box-->
		<p>
		<input id="submit" name="submit" value="Subscribe" type="submit">		<!-- Submit Button-->
		</p>
	</form>
	</div>

	<!-- Popup Div Ends Here -->
	</div>
	
	<!-- method to display -->
	
	
	
	<!---End Pop up Form--->
	
			
</article>

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