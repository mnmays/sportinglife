<?php
session_start(); 
if (!isset($id))
{
	header("location:../admin-login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<!--
	the admin can view their site within the admin portal to quickly view changes they have made, etc. 
-->
<meta charset="UTF-8">
<title>My Site</title>
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
		
		
		
	</section>
	
</body>

</html>