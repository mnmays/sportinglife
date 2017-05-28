 <?php 
$link = mysql_connect('sportinglifecardscom.ipagemysql.com', 'rootdmc', 'sd4951'); 
if (!$link) { 
    die('Could not connect: ' . mysql_error()); 
} 
echo 'Connected successfully'; 
mysql_select_db(sportinglife); 
?> 