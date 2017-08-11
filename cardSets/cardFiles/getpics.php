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
			
			div.gallery img {
				width: 100%;
				height: 50vh;
			}
		</style>
	</head>
	<body>
		<?php
			include 'connectionFile/connection.php';

			$q = $_GET['q'];
			
			$select_path="SELECT cardImageFolder, cardImageName FROM cards WHERE seriesID = '".$q."' ORDER BY length(cardNumber), cardNumber ASC";
			$result = $conn->prepare($select_path);
			$result->execute();
			
			while($row=$result->fetch(PDO::FETCH_ASSOC)) {
				$image_folder=$row["cardImageFolder"];
				$image_name=$row["cardImageName"];
				
				echo '<div class="gallery">
					 	<img src="'.$image_folder.''.$image_name.'">
					  </div>';
			}		
		?>
	</body>
</html>