<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>Admin Login</title>
	<head>
		<link rel="stylesheet" type="text/css" href="../styles/adminLogIn.css">
	</head>
	<header>
		<center>	<img src="../images/logo.png" alt="Sporting Life Logo" id="logo"> </center>
		<link rel="styleSheet" href = "mainStyles.css">
		<div id="adminLbl">
			Administrator
		</div>
	</header>
	<body style="
		background-image:url(../images/comerica-park-artwork.jpg); 
		background-size: cover; 
		" >
		
		<main><center>
			<div id="loginSquare">
			<div id="mainform">
			
	<form id="form" name="form" type="post" onsubmit="return validate()" action="admin-security-question.php">
		<h2>FORGOT PASSWORD</h2>
		<hr>
		<input id="email" name="email" placeholder="Email" type="email">		<!-- Email text box-->
		<p>
		<input id="submit" name="submit" value="Answer Security Question" type="submit">		<!-- Submit Button-->
		</p>
	</form>

			</div>
		</div> <!-- end log in square div -->
		</center>
		</main>
	</body>
	<footer>

    </footer>
</html>