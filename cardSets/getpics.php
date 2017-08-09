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
				height: auto;
			}
		</style>
	</head>
	<body>
		<?php
			include 'connectionFile/connection.php';

			$q = $_GET['q'];
			
			$select_path="SELECT cardImageFolder, cardImageName FROM cards WHERE seriesID = '".$q."' ORDER BY cardNumber ASC";
			$result = $conn->prepare($select_path);
			$result->execute();
			
			while($row=$result->fetch(PDO::FETCH_ASSOC)) {
				$image_folder=$row["cardImageFolder"];
				$image_name=$row["cardImageName"];
				
				echo '<div class="gallery">
					 	<img src="'.$image_folder.''.$image_name.'">
					  </div>';
			}
			
			//$select_path="SELECT cardImageFolder, cardImageName FROM cards WHERE seriesID = '".$q."' ORDER BY cardNumber ASC";
			//$var=mysql_query($select_path);
			
			//while($row=mysql_fetch_array($var)) {
				//$image_folder=$row["cardImageFolder"];
				//$image_name=$row["cardImageName"];
				
				//echo '<div class="gallery">
					 // 	<img src="'.$image_folder.''.$image_name.'">
					 // </div>';		
			//}
			
			//mysql_close($conn);
		?>
	</body>
</html>