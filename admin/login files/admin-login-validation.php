<?php
		//$value = $_GET["query"];
		//$formField = $_GET["field"];
	if (isset($_GET["query"]) && isset($_GET["field"]))
	{
		$value = $_GET["query"];
		$formField = $_GET["field"];
		
		if($formField == "username")
		{
			if(ctype_alpha($value))
			{
				echo "<span>Valid</span>";
			}
			else 
			{
				echo "Username must be alpha characters only.";	
			}
		}
		
	}

   
?>
