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
	this is the admin homepage
-->
<meta charset="UTF-8">
<title>Admin Home</title>
	<head>
		<script src = "admin-login-validation.js"></script>
		<link rel="styleSheet" href = "styles/generalAdmin.css">
		<link rel="styleSheet" href = "styles/admin_hompage.css">
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
		
		
		
	</section>
	
</body>

</html>