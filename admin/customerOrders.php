<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Customer Orders</title>
	</head>
	<body>
		<article>
			<header>
				<h1>Customer Orders</h1>
			</header>
			<?php
				include 'connectionFile/connection.php';	

				$sql1="SELECT * FROM products";		
				$result1 = mysql_query($sql1);		 	
				$numRows = mysql_numrows($result1);
			?>
			
			<table>
				<tr>
					<td align="center"><strong>cartID</strong></td>
					<td align="center"><strong>userID</strong></td>
					<td align="center"><strong>itemID</strong></td>
					<td align="center"><strong>Uploaded Image</strong></td>
					<td align="center"><strong>Special Instruction</strong></td>
					<td align="center"><strong>Quantity</strong></td>
					<td align="center"><strong>Price</strong></td>
					<td align="center"><strong>Total Cost</strong></td>
					<td align="center"><strong>Full Name</strong></td>
					<td align="center"><strong>Email Address</strong></td>
					<td align="center"><strong>Address Line 1</strong></td>
					<td align="center"><strong>City</strong></td>
					<td align="center"><strong>State</strong></td>
					<td align="center"><strong>Postal Code</strong></td>
					<td align="center"><strong>Country</strong></td>
					<td align="center"><strong>Edit Status</strong></td>
					<td align="center"><strong>Order Placed</strong></td>
				</tr>
				
				<?php 
					$i=0;
					while($i < $numRows) {
						$f0=mysql_result($result1,$i,"cartID");
						$f1=mysql_result($result1,$i,"userID");
						$f2=mysql_result($result1,$i,"itemID");
						//$f3=mysql_result($result1,$i,"uploadedImg"); Just need to have a button for the image to open in new page
						$f4=mysql_result($result1,$i,"specInstr");
						$f6=mysql_result($result1,$i,"quantity");
						$f7=mysql_result($result1,$i,"price");
						$f8=mysql_result($result1,$i,"totalCost");
						$f9=mysql_result($result1,$i,"fullName");
						$f10=mysql_result($result1,$i,"emailAdd");
						$f11=mysql_result($result1,$i,"addLine1");
						$f12=mysql_result($result1,$i,"city");
						$f13=mysql_result($result1,$i,"state");
						$f14=mysql_result($result1,$i,"postalCode");
						$f15=mysql_result($result1,$i,"country");
						$f16=mysql_result($result1,$i,"status");
						$f17=mysql_result($result1,$i,"orderPlaced");
				?>
				
				<tr>
					<td align="center"><?php echo $f0; ?></td>
					<td align="center"><?php echo $f1; ?></td>
					<td align="center"><?php echo $f2; ?></td>
					<td align="center">
						<form id="products_image" action="productImage.php" method="post">
							<input type="hidden" name="cartID" value="<?php echo $f0; ?>">
							<input type="submit" value="Get picture">
						</form>
					</td>
					<td align="center"><?php echo $f4; ?></td>
					<td align="center"><?php echo $f6; ?></td>
					<td align="center"><?php echo $f7; ?></td>
					<td align="center"><?php echo $f8; ?></td>
					<td align="center"><?php echo $f9; ?></td>
					<td align="center"><?php echo $f10; ?></td>
					<td align="center"><?php echo $f11; ?></td>
					<td align="center"><?php echo $f12; ?></td>
					<td align="center"><?php echo $f13; ?></td>
					<td align="center"><?php echo $f14; ?></td>
					<td align="center"><?php echo $f15; ?></td>
					<td align="center"><?php echo $f16; ?></td>
					<td align="center"><?php echo $f17; ?></td>
					<td align="center">
						<form id="orders_admin" method="post">
							<input type="hidden" name="f0" value="<?php echo $f0; ?>">
							<input type="submit" name="approved" value="approved">
							<input type="submit" name="sent" value="sent">
						</form>
					</td>
				</tr>
				
				
				<?php 
					//Sets the status to either approved or denied
					if(isset($_POST['approved'])) {
						$f0_submitted = (int) $_POST['f0'];
						$query_update = "UPDATE products SET status='APPROVED' WHERE cartID='$f0_submitted'";
						$result_update = mysql_query($query_update);
					}else if(isset($_POST['sent'])) {
						$f0_submitted = (int) $_POST['f0'];
						$query_update = "UPDATE products SET status='SENT' WHERE cartID='$f0_submitted'";
						$result_update = mysql_query($query_update);	
					}
						$i++;
					}
					
					mysql_close();
				?>
			</table>
			<h1>WILL NEED TO REFRESH TO SEE CHANGES</h1>
		</article>
	</body>
</html>