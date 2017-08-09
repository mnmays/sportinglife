

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
				
<?php
	
	//declare variable
	$email = $_GET["email"];
	$answer = $_GET["answer"];
	$password1 = $_GET["password1"];
	$password2 = $_GET["password2"];
	
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

if($password1 == $password2)	//if the passwords match
{
	$sql = "UPDATE admin SET password = '$password1' WHERE email = '$email'";
	$result = $db->prepare($sql);
	$result->execute();
	
	print"Password Changed"; 
	
	?>
	
	<br><br>
	<a href="../admin-login.php">Sign In</a>
	
	<?php
}
else
{
	print"these passwords did not match"; 
	
	?>
	<form action="admin-login.php">
		<input id="login" type="submit" value="Try Again" />
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