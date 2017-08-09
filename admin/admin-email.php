

<!DOCTYPE html>
<html lang="en">
<!--
	admins can send emails to sporting life followers from here
-->
<meta charset="UTF-8">
<title>Sporting Life Emails</title>
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
		
		<h2>Send an Email to all of your MailChimp Subscribers!</h2>

		<br>
		
		<form action="admin-emails/emailpreview.php" method="post" enctype="multipart/form-data">
			email subject: 
			<input id="subject" name="subject" type="text" value="Subject">	<br>
			header: 
			<input id="header" name="header"  type = "text" value = "header">	<br>
			email body: <input id="body" name="body" type="text"> <br>
			<input type='submit' value = "submit"> <br>
		</form>
			
	</section>
	
</body>

</html>