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
				
<?php
	
	//declare variable
	$email = $_GET["email"];
	$answer = $_GET["answer"];
	
//connection
	$dataSourceName = 'mysql:host=localhost;dbname=sportinglife';
	$username = 'root';
	$password = 'M3g4nM4ys17';
	
	try {
		$db = new PDO($dataSourceName, $username, $password);	
//echo 'Connected successfully';
//echo "<br>";
	}
	catch (PDOException $e) {
		$error_message = $e->getMessage();
		echo 'Error. Cannot connect to database';
echo "<br>";
		exit();  
	}
//end connection


$sql = "SELECT * FROM admin WHERE email = '$email' AND SA1 = '$answer'";
$result = $db->prepare($sql);
$result->execute();
$row = $result->fetch(PDO::FETCH_ASSOC);

if(! $row)	//nothing found
{
	?>
	
	<form id="form" name="form" type="post" onsubmit="return validate()" action="admin-forgotpassword.php">
		<h2>Password Recovery</h2>
		<hr>
		this answer did not match our records. 
		<p>
		<input id="submit" name="submit" value="Try Again" type="submit">		<!-- Submit Button-->
		</p>
	</form>	
	
	<?php
}
else
{
	?>
	 <form id="form" name="form" type="post" onsubmit="return validate()" action="admin-new-password.php">
		<h2>Password Recovery</h2>
		<hr>
		Enter Your New Password
		<br><br> 
		<!--hidden information to be passed--->
		<input id="email" name="email" value="<?php echo $email ?>" type="hidden">
		<input id="answer" name="answer" value="<?php echo $answer ?>" type="hidden">
		<!--end hidden information to be passed--->
		New Password: 
		<input id="password1" name="password1" placeholder="Password" type="password">		<!-- password 1 text box-->
		<br><br>
		Re-enter your new password: <input id="password2" name="password2" placeholder="Password" type="password">		<!-- password2 text box-->
		<p>
		<input id="submit" name="submit" value="Submit" type="submit">		<!-- Submit Button-->
		</p>
	</form>	
	<?php
}

 ?>
		</div>
	</div> <!-- end log in square div -->
	</center>
	</main>
</body>
</html>