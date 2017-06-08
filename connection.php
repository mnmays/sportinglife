<?php 
			//IF USING THIS FILE ON LOCAL MACHINE BE SURE TO UN-COMMENT QA LOGIN INFO AND COMMENT OUT YOUR OWN
 			$servername = 'sportinglifecardscom.ipagemysql.com';
			$username = 'rootdmc';
			$password = 'sd4951';
			
			//SAVE YOUR OWN PERSONAL LOCAL LOGIN CREDENTIALS HERE IF YOU SO WISH
			//$servername = 'localhost';
			//$username = 'root';
			//$password = '4567db#';
			
			//QA database name
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