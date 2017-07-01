<!DOCTYPE html>
<html lang="en">

<html>
	<head>
		<title>Login</title>
		<meta charset = "UTF-8">
	</head>
	<body>

<?php
//require_once('database.php');

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
	
	
	
	

    $email = filter_input(INPUT_POST,'email');
	$email = htmlspecialchars($email);
		
	$password = filter_input(INPUT_POST,'password');
	$password = htmlspecialchars($password);
	
	
	 $sql="SELECT * FROM admin WHERE email =:email AND password =:password"; 
	 $execStatement=$db->prepare($sql);
	 $execStatement->bindValue(':email', $email);
	 $execStatement->bindValue(':password', $password);
	$execStatement->execute();
	
	$userList = $execStatement->fetchAll();
	$userRowCount = $execStatement->rowCount();
	$execStatement->closeCursor();
	
	 if ($userRowCount!=0)
	 {
		echo "Successful login";
		?>
		
			
	</body>
</html>
<?php
	 }
	 else 
	 {
		echo "login unsuccessful.";
		?>
		
			
	</body>
</html>
		<?php
	 }
	
?>
