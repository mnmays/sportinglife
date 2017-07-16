<html>
	<!--- this file allows the administrator to add, delete, and update the custome items available to the customer on the site --->
	<head>				
		<script type="text/javascript" src="JS/admin-custom-items_JS.js"></script>
	</head>
	<body>
		<h1><u>CUSTOM ITEMS ADMIN OPTIONS</u></h1>
		<h2><u>ADD CUSTOM ITEM</u></h2>
		<form method="post" id="customAddForm" name="customAdd" action="addCustom.php" onsubmit="return addCustomForm()" enctype="multipart/form-data">
			<!--Needed to add the name of the item to have a way for him to be able to easily remove the item as well-->
			Enter the <u>name</u> of the custom item: <input type="text" name="AddCustomItemName" /></br></br>
			Enter the <u>size</u> of the custom item: <input type="text" name="AddCustomItemSize" /></br></br>
			Enter the <u>description</u> of the custom item: <input type="text" name="AddCustomItemDesc" /></br></br>
			Enter the <u>price</u> of the custom item: <input type="text" name="AddCustomItemPrice" /></br></br>
			Upload the <u>image</u> of the custom item: <input type="file" name="AddCustomItemImage"></br></br>			
			<input type="submit" value="Submit">	
		</form>
		
		<h2><u>DELETE CUSTOM ITEM</u></h2>
		<form method="post" id="customDeleteForm" name="customDelete" action="deleteCustom.php" onsubmit="return deleteCustomForm()">
			Enter the <u>name</u> of the custom item you would like to delete: <input type="text" name="DeleteCustomItemName" /></br></br>
			<input type="submit" value="Submit">
		</form>
	</body>
</html>