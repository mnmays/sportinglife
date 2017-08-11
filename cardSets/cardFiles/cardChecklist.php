<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Cards and Series Checklist</title>
	</head>
	<body>
		<article>
			<header>
				<h1>Sporting Life Cards and Series Checklist</h1>
			</header>
			<?php
				include 'connectionFile/connectionNonPDO.php';	

				$sql1="SELECT seriesID FROM series";		
				$result1 = mysql_query($sql1);
			 	
				$seriesRows = mysql_num_rows($result1);
		  
				for($i=0; $i < $seriesRows; $i++) {
					$row1 = mysql_fetch_assoc($result1);
					echo "<h3>" . $row1['seriesID'] . "</h3>";
					$currSeries = $row1['seriesID'];
					
					$sql2 = "SELECT cardNumber, seriesID, cardName FROM cards WHERE seriesID='".$currSeries."' ORDER BY length(cardNumber), cardNumber ASC";
					$result2 = mysql_query($sql2);
					
					while($row2 = mysql_fetch_assoc($result2)) {
						echo '<p><input type="checkbox"> Card #' . $row2['cardNumber'] . ' - ' .$row2['cardName']. '</p>';
					}//end while
				}//end for
				mysql_close($conn);
			?>
			<input type="button" value="Print Button" onclick="window.print();return false;"><br>
		</article>
	</body>
</html>