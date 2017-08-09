<?php
		//$value = $_GET["query"];
		//$formField = $_GET["field"];
	if (isset($_GET["query"]) && isset($_GET["field"]))
	{
		$value = $_GET["query"];
		$formField = $_GET["field"];
		
	if($formField == "username")
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
	}
?>
