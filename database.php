<?php
 
 	$dataSourceName = 'mysql:host=localhost;dbname=sportinglife';
	$username = 'root';
	$password = 'M3g4nM4ys17';
	
	try {
		$db = new PDO($dataSourceName, $username, $password);	
	}
	catch (PDOException $e) {
		$error_message = $e->getMessage();
		echo 'Error. Cannot connect to database';
		exit();  
	}

/*
	$dataSourceName = 'mysql:host=localhost;dbname=4951project';
	$username = 'root';
	$password = 'c0568359';
	
	try {
		$db = new PDO($dataSourceName, $username, $password);	
	}
	catch (PDOException $e) {
		$error_message = $e->getMessage();
		echo 'Error. Cannot connect to database';
		exit();  
	}
 * 
 */
?>

 