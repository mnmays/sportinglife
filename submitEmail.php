<html>
	<head>
		
	</head>
	<body>
		<?php
	
	//declare variable
	$email = $_GET["email"];
	//echo $email; 
	
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
			?>
				<center><h3>This address is already in the system!</h3></center>
			<?php	
		}
		else
		{
			$sql = "INSERT INTO emailList (address)
				VALUES ('$email')";
				
			if ($conn->query($sql) === TRUE) 
			{
				?>
				<center><h3>Success!</h3></center>
				<p>
					<center><img src="images/success.png-c200"></center>
				</p>
				<?php
			} 
			else 
			{
				?>
				<center><h3>Unfortunatly, your email could not be added to the list.</h3></center>
				<?php
			} 
		}
		
		break; 
	}
 }
 ?>
	</body>
</html>