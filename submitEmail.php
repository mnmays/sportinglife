<?php
	
	//declare variable
	$email = $_GET["email"];
	echo $email; 
	
	//connection
	
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "M3g4nM4ys17";
 $db = "sportinglife";
 
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 $sql = "SELECT * FROM emailList";
 $result = $conn->query($sql);
 
 if ($result->num_rows > 0)
 {
 	while($row = $result->fetch_assoc())
	{
		if($email == $row["address"])
		{
			echo "this address is already subscribed to revieve updates"; 	
		}
		else
		{
			$sql = "INSERT INTO emailList (address)
				VALUES ('$email')";
				
			if ($conn->query($sql) === TRUE) 
			{
   	 			echo "New record created successfully";
			} 
			else 
			{
    			echo "Error: " . $sql . "<br>" . $conn->error;
			} 
		}
		
		break; 
	}
 }
 
 
 
/*	
	//check to see if email is already in database
	$sql = "SELECT * FROM emailTable WHERE address = $email";
	$result = $conn->query($sql);
	
	if($result->num_rows = 0)	//email address does not exist in the DB already
	{
		//insert email address
		$sql = "INSERT INTO emailTable (address)
				VALUES ('$email')";
		
		//confirmation notification
		if ($conn->query($sql) === TRUE) //successful insert
		{
   			 echo "New record created successfully";
		}
		else 	//error occured. email address was not added
		{
    		echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	else 	//email address is in DB
	{
		//return 'error' message
		echo "email address already in database"; 
		
	}	
 * 
 */
?>