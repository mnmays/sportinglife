
<!DOCTYPE html>
<html lang="en">
<!--
	this page displays a preview of what the email being sent to the users will look like. 
-->
<meta charset="UTF-8">
<title>Email Preview</title>
	<head>
		<link rel="styleSheet" href = "../styles/generalAdmin.css">
	</head>
	
<body style="background-image:url(../images/comerica-park-artwork.jpg); 
	opacity: 0.95" >
	<header>
		<img src="../images/logo.png" alt="Sporting Life Logo" id="logo">
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
		<?php
		$subject = $_POST["subject"];
 		$header = $_POST["header"];
 		$body = $_POST["body"];
		
		$totalMessage = "
		
		<html>
		<body>
			<h3>Sporting Life</h3>
			<center>
				<h2>$header</h2>
				$body
			</center>
		</body>
		<footer>
			twitter, facebook, pinterest, website link
			<br>
			&copy; sporting life
		</footer>
		</html>
		";
		?>
		
		<b>Preview:</b>
		<br>
		<?php
			echo $totalMessage; 
		?>
		
		<form action="admin-emails/sendmail.php" method="post" enctype="multipart/form-data">
			<input id="subject" name="subject" type="hidden" value="<?php $subject ?>">
			<input id="totalMessage" name="totalMessage"  type = "hidden" value = "<?php $totalMessage ?>">
			<input type='submit' value = "Send Email"> <br>
		</form>
	</section>
	
</body>

</html>