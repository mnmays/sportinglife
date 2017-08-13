<?php

//get variables
	$email = $_GET["email"];
	$password = $_GET["password"];
	$question = $_GET['questions'];
	$answer1 = $_GET["answer1"];
	$answer2 = $_GET["answer2"];
	
	echo $email; 
	echo "<br>";
	echo $password; 
	echo "<br>";
	echo $question; 
	echo "<br>";
	echo $answer1; 
	echo "<br>";
	echo $answer2; 
	echo "<br>";

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
	 $sql="SELECT * FROM admin WHERE email = '$email' AND password = '$password'"; 
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
					$sql = "UPDATE admin SET SQ1 = '$question' WHERE email = '$email'";
					$result = $db->prepare($sql);
					$result->execute();
					
					$sql = "UPDATE admin SET SA1 = '$answer1' WHERE email = '$email'";
					$result = $db->prepare($sql);
					$result->execute();
					
					?>
					
					<script>alert("Security Question & Answer Updated!");</script>
					echo "<script>location.href='admin-settings.php';</script>";
					<?php
					
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