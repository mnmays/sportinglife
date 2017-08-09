<?php
//this page validates the user shipping information entered from the checkout page
		
	if (isset($_GET["query"]) && isset($_GET["field"]))
	{
		$value = $_GET["query"];
		$formField = $_GET["field"];
		
		if($formField == "fullName")
		{
			if (!preg_match("/^[a-z\040\.\-]+$/i", $value))
			{	
				echo "Name must be alpha characters only.";		
			}
			else 
			{
				echo "<span>Valid</span>";	
			}
		}
		if($formField =="emailAddress")
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
		if($formField =="addressLine1")
		{
			if (!preg_match("/^[a-z0-9\040\.\-]+$/i", $value))
			{
				echo "Invalid address.";
			}
			else 
			{
				echo "<span>Valid</span>";
			}
		}
		if($formField =="address-line2")
		{
			if (!preg_match("/^[a-z0-9 .\-]+$/i", $value))
			{
				echo "Invalid email address.";
			}
			else 
			{
				echo "<span>Valid</span>";
			}
		}
		if($formField == "city")
		{
			if(!preg_match("/^[a-z\040\.\-]+$/i", $value))
			{
				echo "City must be alpha characters only.";		
			}
			else 
			{
				echo "<span>Valid</span>";
			}
		}
		if($formField == "state")
		{
			if(ctype_alpha($value))
			{
				echo "<span>Valid</span>";
			}
			else 
			{
				echo "State must be alpha characters only.";	
			}
		}
		
		if($formField=="postalCode")
		{
			if(is_numeric($value))
			{
				echo "<span>Valid</span>";
			}
			else {
				{
					echo "Postal code must be numeric characters only.";
				}
			}
		}
		
	}

   
?>