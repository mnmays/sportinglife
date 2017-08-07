<?php
		//$value = $_GET["query"];
		//$formField = $_GET["field"];
		
		//$userImage = addslashes(file_get_contents($_FILES['AddUserImage']['tmp_name']));
		//$userImage = $_FILES['image']['name'];
		//$imageRes = getimagesize($_FILES['AddUserImage']['tmp_name']);
		
		
		
	if (isset($_GET["query"]) && isset($_GET["field"]))
	{
		$value = $_GET["query"];
		$formField = $_GET["field"];
		
		if($formField == "firstName")
		{
			if(ctype_alpha($value))
			{
				echo "<span>Valid</span>";
			}
			else 
			{
				echo "First name must be alpha characters only.";	
			}
		}
		if($formField == "lastName")
		{
			if(ctype_alpha($value))
			{
				echo "<span>Valid</span>";
			}
			else 
			{
				echo "Last name must be alpha characters only.";	
			}
		}
		/*if($formField == "image")
		{
			if($_FILES["AddUserImage"]["type"] != "image/jpeg"||$_FILES["AddUserImage"]["size"] >= 200000000||$imageRes[0] < 1200 || $imageRes[1] < 1500)
			{
				echo "Invalid file type. Image not uploaded";
			}
			else 
			{
				echo "<span>Valid</span>";
			}
		}*/
		
		if($formField =="emailAdd")
		{
			if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $value))
			{
				echo "Invalid email address.";
			}
			else 
			{
				echo "<span>Valid</span>";
			}
		}
		
		//if($formField == "message")
		//{
		//	echo "<span>Valid</span>";
		//}
		//if($formField == "image") need to validate image uploaded
		//{
		//	if()
		//}
		if($formField=="quantity")
		{
			if(is_numeric($value) && $value > 0 && $value == round($value,0))
			{
				echo "<span>Valid</span>";
			}
			else {
				{
					echo "Invalid quantity.";
				}
			}
		}
		
	}

   
?>
