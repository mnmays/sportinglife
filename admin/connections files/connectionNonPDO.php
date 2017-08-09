<?php 
 			//$servername = 'sportinglifecardscom.ipagemysql.com';
			//$username = 'rootdmc';
			//$password = 'sd4951';
			$servername = 'localhost';
			$username = 'root';
			$password = '4567db#';
			$dbname = 'sportinglife';

			$conn = mysql_connect($servername, $username, $password);
			
			if(!$conn) {
				echo "unable to connect to DB: " . mysql_error();
				exit;
			}
			if(!mysql_select_db($dbname)) {
				echo "unable to select db" . mysql_error();
				exit;
			}
?>