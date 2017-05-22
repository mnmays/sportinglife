<?php
		//$value = $_GET["query"];
		//$formField = $_GET["field"];
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
		
		if($formField == "message")
		{
			echo "<span>Valid</span>";
		}
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
