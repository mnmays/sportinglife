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
				include 'connection.php';	

				$sql1="SELECT * FROM orders";		
				$result1 = mysql_query($sql1);		 	
				$numRows = mysql_numrows($result1);
			?>
			
			<table>
				<tr>
					<td align="center"><strong>OrderID</strong></td>
					<td align="center"><strong>Purchase Date</strong></td>
					<td align="center"><strong>First Name</strong></td>
					<td align="center"><strong>Last Name</strong></td>
					<td align="center"><strong>Email</strong></td>
					<td align="center"><strong>Address</strong></td>
					<td align="center"><strong>Status</strong></td>
					<td align="center"><strong>Shipping Cost</strong></td>
					<td align="center"><strong>Total Cost</strong></td>
					<td align="center"><strong>Edit Status</strong></td>
				</tr>
				
				<?php 
					$i=0;
					while($i < $numRows) {
						$f0=mysql_result($result1,$i,"orderID");
						$f1=mysql_result($result1,$i,"purchaseDate");
						$f2=mysql_result($result1,$i,"firstName");
						$f3=mysql_result($result1,$i,"lastName");
						$f4=mysql_result($result1,$i,"email");
						$f5=mysql_result($result1,$i,"address");
						$f6=mysql_result($result1,$i,"status");
						$f7=mysql_result($result1,$i,"shippingCost");
						$f8=mysql_result($result1,$i,"totalCost");
				?>
				
				<tr>
					<td align="center"><?php echo $f0; ?></td>
					<td align="center"><?php echo $f1; ?></td>
					<td align="center"><?php echo $f2; ?></td>
					<td align="center"><?php echo $f3; ?></td>
					<td align="center"><?php echo $f4; ?></td>
					<td align="center"><?php echo $f5; ?></td>
					<td align="center"><?php echo $f6; ?></td>
					<td align="center"><?php echo $f7; ?></td>
					<td align="center"><?php echo $f8; ?></td>
					<td align="center">
						<form id="orders_admin" method="post">
							<input type="hidden" name="f0" value="<?php echo $f0; ?>">
							<input type="submit" name="approved" value="approved">
							<input type="submit" name="denied" value="denied">
							<input type="submit" name="sent" value="sent">
						</form>
					</td>
				</tr>
				
				<?php 
					if(isset($_POST['approved'])) {
						$f0_submitted = (int) $_POST['f0'];
						$query_update = "UPDATE orders SET status='APPROVED' WHERE orderID='$f0_submitted'";
						$result_update = mysql_query($query_update);
					}else if(isset($_POST['denied'])) {
						$f0_submitted = (int) $_POST['f0'];
						$query_update = "UPDATE orders SET status='DENIED' WHERE orderID='$f0_submitted'";
						$result_update = mysql_query($query_update);
					}else if(isset($_POST['sent'])) {
						$f0_submitted = (int) $_POST['f0'];
						$query_update = "UPDATE orders SET status='SENT' WHERE orderID='$f0_submitted'";
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