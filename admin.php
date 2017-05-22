<!DOCTYPE html>

<html lang="en">
	<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<script src = "admin-login-validation.js"></script>
	</head>
	<header>
	<img src="images/logo.png" alt="Sporting Life Logo" id="logo">
	<link rel="styleSheet" href = "mainStyles.css">
    </header>
	<body>
		
		<main>
			
			<nav>
   	 <ul>
   		 <li class="active">
   			 <a href="sets.php" id="cardSets">Card Sets</a>
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
			
			<div id="mainform">
			<form action="post-admin-login.php" id="myForm" method ="post" name="myForm">
			<h3>Enter username and password to enter admin page</h3>
			<table>
			<tr>
			<td>Username</td>
			<td><input id ="username1" name="username" onblur="validate('username', this.value)" type ="text"></td>
			<td><div id = 'username'></div></td>
			</tr>
			<tr>
			<td>Password</td>
			<td><input id ="password1" name="password" onblur="validate('password', this.value)" type ="password"></td>
			<td><div id = 'password'></div></td>
			</tr>
			</table>

			<input onclick="checkForm()" type='submit' value='log in'>
			</form>
			</div>
		
		</main>
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