<!DOCTYPE html>
<html lang="en">
<head>
	
</head>

<header>
	<div class="header">
		<img src="images/logo.png" id="logo" alt="sporting life logo">
	</div>		
</header>

<nav>
	
</nav>

<body>
	<aside>
		<?php

 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "M3g4nM4ys17";
 $db = "sportinglife";
 
 
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
/*query*/
 $query = "SELECT * FROM series";
 $result = mysqli_query($conn, $query);
 
 $numRows = mysqli_num_rows($result);
  
 for($i=0; $i < $numRows; $i++)
 {
 	  $row = mysqli_fetch_array($result);
	  ?>
	  <button onclick"showPics()"><?php echo $row['seriesName'];?></button> <br>
	  <?php
	  
 } ?>
 
 
 
 	</aside>

	<article>


	</article>

</body>

<footer>
	
</footer>
</html>