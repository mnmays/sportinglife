<!DOCTYPE html>
<html lang="en">
<!--
	connect with sporting life file. 
	this file includes: subscribing to the email subscription, twitter feed / link, facebook feed / link & sporting life blog
-->
<head>
	<link rel="stylesheet" type="text/css" href="styles/generalStyles.css">
	<link rel="stylesheet" type="text/css" href="styles/connection.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="JS/connpgJscript.js"></script>
</head>
	<header style="background-image:url(images/LongWoodPlanksBkgrnd.jpg)"; >
		<img id="logo" src="images/logo.png" />
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


<aside>
	<p id="SMtitle"><center>
				Catch up with all things sports on Sporting Life social media sites. See links below to see Sporting Life updates! 
		Don't have social media? That's okay! Sporting Life creator sends out routine emails about new items and upcoming sports events! Don't miss the updates!
	<br>
			Follow Sporting Life on Social Media! 
	</center></p>

<p>
	<!----email subscribe---->
<!--	<button id="popup" onclick="show()">Subscribe</button>	<!--Subscribe Button-->
	<div id="emailflip">Subscribe</div>
	<div id="subForm">
<center>		
		<!-- Begin MailChimp Signup Form -->
<link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
<style type="text/css">
	#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
	/* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>
<div id="mc_embed_signup">
<form action="//facebook.us16.list-manage.com/subscribe/post?u=8dc7b50f207d24c0ecad1254a&amp;id=7017efd374" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
	<h2>Subscribe to our mailing list</h2>
<div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
<div class="mc-field-group">
	<label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
</label>
	<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
</div>
	<div id="mce-responses" class="clear">
		<div class="response" id="mce-error-response" style="display:none"></div>
		<div class="response" id="mce-success-response" style="display:none"></div>
	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_8dc7b50f207d24c0ecad1254a_7017efd374" tabindex="-1" value=""></div>
    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
    </div>
</form>
</div>
<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='BIRTHDAY';ftypes[3]='birthday';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
</center>
<!--End mc_embed_signup-->
		
	</div>
</p>

<p>
<!----Twitter drop down---->
	<div id="Twitflip">Twitter</div>
	<div id="twitTmln">
		<!--	
			<a class="twitter-timeline" href="https://twitter.com/SportingLifeArt">Tweets by SportingLifeArt</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8" height="525"></script>
		-->
		<a class="twitter-timeline" data-lang="en" data-height="525" data-theme="light" href="https://twitter.com/SportingLifeArt">Tweets by SportingLifeArt</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
	</div>
</p>
<p>	
<!----Facebook drop down---->	
	<div id="FBflip">Facebook</div>
	<div id="FBTmln">
		<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FSportingLifeCards%2F&tabs=timeline&width=440&height=525&small_header=true&adapt_container_width=true&hide_cover=true&show_facepile=false&appId" width="100%" height="525" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
	</div>
</p>	
</aside>

<article>
	
<!--automated email pop up-->
<script type="text/javascript" src="//s3.amazonaws.com/downloads.mailchimp.com/js/signup-forms/popup/embed.js" data-dojo-config="usePlainJson: true, isDebug: false"></script><script type="text/javascript">require(["mojo/signup-forms/Loader"], function(L) { L.start({"baseUrl":"mc.us16.list-manage.com","uuid":"8dc7b50f207d24c0ecad1254a","lid":"7017efd374"}) })</script>
	
			<iframe id="blogFrame" src="http://sportinglifecards.blogspot.com/">
  			<p>Your browser does not support iframes.</p>
			</iframe>
<!--end automated pop up --> 

	<!---Pop up div ---->
	<div id="PUwindow">
	
	<!-- Popup -->
	<div id="popupContact">

	<!-- iframe email form -->
	<h3 id="exit" onclick="hide()">X</h3>
	<iframe id="popupFrame" src="form.php" width="480" height="320" seamless=""></iframe>
	
	</div>
	<!-- Popup Div Ends Here -->
	</div>
	
	<!-- method to display -->
	<!---End Pop up Form--->		
</article>

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