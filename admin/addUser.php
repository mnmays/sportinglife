<?php

//get variables
	$email = $_GET["email"];
	$oldPassword = $_GET["password"];
	$newPassOne = $_GET["newPass1"];
	$newPassTwo = $_GET["newPass2"];

//connect to database
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

//check if email and password are correct
	 $sql="SELECT * FROM admin WHERE email = '$email' AND password = '$oldPassword'"; 
	 $execStatement=$db->prepare($sql);
	 $execStatement->bindValue(':email', $email);
	 $execStatement->bindValue(':password', $password);
	$execStatement->execute();
	
	$userList = $execStatement->fetchAll();
	$userRowCount = $execStatement->rowCount();
	$execStatement->closeCursor();
	
	 if ($userRowCount!=0)	//if any results are returned, that means that the entered email & password match that of an admin.
	 {
	 		if($newPassOne == $newPassTwo) //both of the new emails match
			{

					
			}
			else 
			{
				echo"new passwords do not match"; 
			}
	 }
	 else
	 {
	 	echo "The credentials entered do not match an existing account. Please try again.";		
	 }

?>