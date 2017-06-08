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
echo 'Connected successfully';
echo "<br>";
	}
	catch (PDOException $e) {
		$error_message = $e->getMessage();
		echo 'Error. Cannot connect to database';
echo "<br>";
		exit();  
	}


echo 'Connected successfully';
echo "<br>"; 

 $sql = "SELECT * FROM emailList";
echo 'after sql'; 
echo "<br>";


$result = $db->query($sql);
$result->execute();
$allresults =$result->fetchAll();
echo $allresults; 

echo 'after =result';
echo "<br>";




foreach($allresults as $row) 
{
  $id = $row['address'];
  echo $id; 
  echo "<br>"; 
  
        if($email == $row["address"])
		{
			print "<center><h3>This address is already in the system!</h3></center>"; 	
			break; 
		}
		else
		{
			$sql = "INSERT INTO emailList (address) VALUES ('$email')";
			$insertquery = $db-> prepare($sql);
			$insertquery->execute();	

			print "<center><h3>Success!</h3></center>"; 

		}
}

echo "<br>";
echo ' after echo result';
echo "<br>";
		

echo 'end of file ';
echo "<br>"; 
 ?>
	</body>
</html>