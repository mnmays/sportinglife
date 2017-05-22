<!DOCTYPE html>
<html lang="en">

<html>
	<head>
		<title>Login</title>
		<meta charset = "UTF-8">
	</head>
	<body>

<?php
require_once('database.php');

    $username = filter_input(INPUT_POST,'username');
	$username = htmlspecialchars($username);
		
	$password = filter_input(INPUT_POST,'password');
	$password = htmlspecialchars($password);
	
	
	 $sql="SELECT * FROM admins WHERE username =:username AND password =:password"; 
	 $execStatement=$db->prepare($sql);
	 $execStatement->bindValue(':username', $username);
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
