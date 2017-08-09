
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
	
//connection
	$dataSourceName = 'mysql:host=localhost;dbname=sportinglife';
	$username = 'root';
	$password = 'M3g4nM4ys17';
	
	try {
		$db = new PDO($dataSourceName, $username, $password);	
	}
	catch (PDOException $e) {
		$error_message = $e->getMessage();
		echo 'Error. Cannot connect to database';
echo "<br>";
		exit();  
	}

 ?>
 
 	<form id="form" name="form" type="post" onsubmit="return validate()" action="admin-verifySA.php">
		<h2>Password Recovery</h2>
		<hr>
		<input id="email" name="email" value="<?php echo $email ?>" type="hidden">		<!-- Email text box-->		 
		<br><br>
		
		<?php
		
			$sql = "SELECT SQ1 FROM admin WHERE email = '$email'";
			$result = $db->query($sql);
   			 foreach ($result as $question) 
   			 {
       			 print $question['SQ1'] . "\t";
   			 }
		?>
		
		<br><br>
		Answer: 
		<input id="answer" name="answer" placeholder="Answer" type="text">		<!-- answer text box-->
		<p>
		<input id="submit" name="submit" value="Submit" type="submit">		<!-- Submit Button-->
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