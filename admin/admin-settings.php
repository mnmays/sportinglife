<?php
session_start(); 
if (!isset($_SESSION["userid"]))
{
	header("location:../admin-login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<!--
	this is where the administrator can manage their settings (i.e. change their password)
-->
<meta charset="UTF-8">
<title>Admin Home</title>
	<head>
		<link rel="styleSheet" href = "styles/generalAdmin.css">
	</head>
  

<body style="background-image:url(images/comerica-park-artwork.jpg); 
	opacity: 0.95" >
	<header>
		<img src="images/logo.png" alt="Sporting Life Logo" id="logo">
		<div id="adminLbl">
			Administrator
		</div>
	</header>
	<nav>
		<ul>
			<li class="active">
				<a href="admin.php" id="card-sets">Home</a>	
			</li>
			<li class="active">
				<a href="admin-cards-series.php" id="card-sets">Manage Card Sets and Series</a>	
			</li>
			<li class="active">
				<a href="admin-custom-items.php" id="PersOrders">Manage Available Items</a>
			</li>
			<li class="active">
				<a href="customerOrders.php" id="email">Manage Custom Orders</a>
			</li>
			<li class="active">
				<a href="admin-email.php" id="email">Manage Emails</a>
			</li>
			<li class="active">
				<a href="mysite.php" id="settings">View My Site</a>
			</li>
			<li class="active">
				<a href="admin-settings.php" id="settings">Admin Settings</a>
			</li>
			<li class="active">
				<a href="adminFAQ.html" id="settings">Admin FAQs</a>
			</li>
		</ul>
	</nav>
	
	<section>
		<h2><b>Admin Settings</b></h2>
		<br>
		
		<b>Change Password:</b>
		<br>
	<form id="ChangePassform" name="form" type="post" action="checkNewPassword.php">
		<hr>
		Email: <input id="email" name="email" placeholder="Email" type="email">		<!-- Email text box-->
		<br>
		Current Password: <input id="password" name="password" placeholder="Password" type="password">		<!-- password text box-->
		<br>
		New Password: <input id="newPass1" name="newPass1" placeholder="Password" type="password">		<!-- new password text box-->
		<br>
		Repeat New Password: <input id="newPass2" name="newPass2" placeholder="Password" type="password">		<!-- re enter new password text box-->
		<p>
		<input id="submit" name="submit" value="Change Password" type="submit">		<!-- Submit Button-->
		</p>
	</form>		

	<br><br>
<!--	
	<b>Change Security Question: </b>
	<form id="form" name="form" action="checkNewSQ.php">
		<hr>
		Email: <input id="email" name="email" placeholder="Email" type="email">		
		<br>
		Password: <input id="password" name="password" placeholder="Password" type="password">		
		<br>
		<select name="questions" id="questions">
   			<option value="SQ1">Who is your favorite historical character?</option>
    		<option value="SQ2">What is your mother's maiden name?</option>
    		<option value="SQ3">Who was your favorite teacher?</option>
    		<option value="SQ4">What city were you born in?</option>
  		</select>
		<br>
		Answer: <input id="answer1" name="answer1" placeholder="Answer" type="text">		
		<br>
		Repeat Answer: <input id="answer2" name="answer2" placeholder="Answer" type="text">		
		<p>
		<input id="submit" name="submit" value="Update Security Question" type="submit">		
		</p>
	</form>		
	
	<br><br>
	
	<b>Add Another Admin: </b>
	<form id="form" name="form" action="addUser.php">
		<hr>
		Email: <input id="email" name="email" placeholder="Email" type="email">		
		<br>
		Password: <input id="password1" name="password1" placeholder="Password" type="password">		
		<br>
		<br>
		Repeat Password: <input id="password2" name="password2" placeholder="Answer" type="password">		
		<p>
		<input id="submit" name="submit" value="Update Security Question" type="submit">	
		</p>
	</form>		
-->
	</section>
	
</body>

</html>