<?php 
	$dataSourceName = 'mysql:host=localhost;dbname=sportinglife';
	$username = 'root';
	$password = '4567db#';
	
	try {
		$conn = new PDO($dataSourceName, $username, $password);	
	}
	catch (PDOException $e) {
		$error_message = $e->getMessage();
		echo 'Error. Cannot connect to database';
		exit();  
	}
?>