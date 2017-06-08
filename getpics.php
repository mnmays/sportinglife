<!DOCTYPE html>
<html>
	<head>
		<style>
			div.gallery {
				margin: 5px;
				border: 1px solid #ccc;
				float: left;
				width: 480px;
			}
			
			div.gallery:hover {
				border: 1px solid #777;
			}
			
			div.gallery img {
				width: 100%;
				height: auto;
			}
			
			div.desc {
				padding: 15px;
				text-align: center;
			}
		</style>
	</head>
	<body>
		<?php
			include 'connection.php';
			
			$q = intval($_GET['q']);				
			$sql = "SELECT seriesID, cardImage, cardDesc FROM cards WHERE seriesID = '".$q."'";
			$result = mysql_query($sql);			
			while($row = mysql_fetch_assoc($result)) {
				echo '<div class="gallery"> 
						<img src="data:image/jpeg;base64, '.base64_encode($row['cardImage']).'">
						<div class="desc"> '.$row["cardDesc"].' </div>
						</div>';		
			}//end while	
		
			mysql_close($conn);
		?>
	</body>
</html>