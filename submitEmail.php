<html>
	<head>
		
	</head>
	<body>
<?php
	
	//declare variable
	$email = $_GET["email"];
	//echo $email; 
	
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


$sql = "SELECT * FROM emailList WHERE address = '$email'";
$result = $db->prepare($sql);
$result->execute();
$row = $result->fetch(PDO::FETCH_ASSOC);

if(! $row)	//nothing found
{
	$sql = "INSERT INTO emailList (address) VALUES ('$email')";
	$insertquery = $db-> prepare($sql);
	$insertquery->execute();	

	print "<center><h3>Success!</h3></center>"; 
}
else
{
	print "<center><h3>This address is already in the system!</h3></center>"; 	
}

 ?>
	</body>
</html>