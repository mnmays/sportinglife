<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);
 			//$servername = 'localhost';
			//$username = 'root';
			//$password = '4567db#';
			//$dbname = 'sportinglife';
			//$con = new mysqli($servername, $username, $password, $dbname);
			//$conn = mysql_connect($servername, $username, $password);
			//if(!$conn) {
			//	echo "unable to connect to DB: " . mysql_error();
			//	exit;
			//}
			//if(!mysql_select_db($dbname)) {
			//	echo "unable to select db" . mysql_error();
			//	exit;
			//}
		include 'connection.php';	
//if (!$conn) {
  //  die('Could not connect: ' . mysqli_error($con));
//}

//mysqli_select_db($con,"series");


$sql="SELECT * FROM series WHERE seriesID = '".$q."'";
echo $q;
//$result = mysqli_query($con,$sql);
$result = mysql_query($sql);
 	
 			//QUERY TO GET IMAGES FROM DB
 			//Need to replace WHERE with which ever button is clicked
			$sql2 = "SELECT seriesID, cardImage, cardDesc FROM cards WHERE seriesID = '".$q."'";
			$result2 = mysql_query($sql2);			
				while($row2 = mysql_fetch_assoc($result2)) {
					echo '<div class="gallery"> 
							<img src="data:image/jpeg;base64, '.base64_encode($row2['cardImage']).'">
							<div class="desc"> '.$row2["cardDesc"].' </div>
							</div>';		
				}//end while	
	
			//$conn->close();
 	
echo "<table>
<tr>
<th>ID</th>
<th>Series Name</th>
</tr>";
while($row = mysql_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['seriesID'] . "</td>";
    echo "<td>" . $row['seriesName'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysql_close($conn);
?>
</body>
</html>