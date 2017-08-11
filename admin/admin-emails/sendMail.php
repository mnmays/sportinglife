<?php
		include('./MailChimp.php'); 
		use \DrewM\MailChimp\MailChimp;
		
		$your_api_key = 'c655cd4a584a348c6134fa9c5b3ae264-us16'; 
		
		$MailChimp = new MailChimp($your_api_key);
		$list_id = '7017efd374'; 
		

$result = $MailChimp->get('/lists/'.$list_id.'/members?fields=members.email_address,members.status');

//create an array to hold only email addresses of individuals who are subscribed to the list
$data = array(); 	//define array
foreach($result['members'] as $value)
{
	//print $value['email_address'];
	if($value['status'] == 'subscribed')	//if user is subscribed
	{
			array_push($data, $value['email_address']); 	//add their email address to array
	}
}

print_r($data); 	//delete this later

//convert array to recipient form
$to = ""; 
foreach ($data as $value) 
{
	 $to .= $value.', ';
}

echo var_dump($to);		//delete this later



$subject = $_POST["subject"];
$txt = $_POST["totalMessage"];
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: webmaster@example.com"; 


mail($to,$subject,$txt,$headers);

header("location: sendSuccessful.php");
 
?>