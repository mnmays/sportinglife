<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>Admin Login</title>
	<head>
		<script src = "admin-login-validation.js"></script>
		<link rel="stylesheet" type="text/css" href="styles/adminLogIn.css">
	</head>
	<header>
		<center>	<img src="images/logo.png" alt="Sporting Life Logo" id="logo"> </center>
		<link rel="styleSheet" href = "mainStyles.css">
		<div id="adminLbl">
			Administrator
		</div>
	</header>
	<body style="
		background-image:url(images/comerica-park-artwork.jpg); 
		background-size: cover; 
		" >
		
		<main><center>
			<div id="loginSquare">
			<div id="mainform">
			<form action="post-admin-login.php" id="myForm" method ="post" name="myForm">
			<h3><b>LOGIN</b></h3>
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
			
			<input onclick=" return checkForm()" type='submit' value='log in'>
			
			<br>
			
			<a href="admin-forgotpassword.php" id="forgotpswd">Forgot Password?</a>
			</form>

			</div>
		</div> <!-- end log in square div -->
		</center>
		</main>
	</body>
	<footer>

    </footer>
</html>