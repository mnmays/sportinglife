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
			Enter the <u>name</u> of the custom item: <input type="text" name="AddCustomItemDesc" required/></br></br>
			Enter the <u>size</u> of the custom item: <input type="text" name="AddCustomItemSize" required/></br></br>
			Enter the <u>price</u> of the custom item: <input type="text" name="AddCustomItemPrice" required/></br></br>
			Upload the <u>image</u> of the custom item: <input type="file" name="AddCustomItemImage" required/></br></br>			
			<input type="submit" value="Submit">	
		</form>
		
		<h2><u>EDIT CUSTOM ITEM</u></h2>
		<form method="post" id="customEditForm" name="customEdit" action="editCustom.php" onsubmit="return editCustomForm()" enctype="multipart/form-data">
			<!--Needed to add the name of the item to have a way for him to be able to easily remove the item as well-->
			Enter the <u>name</u> of the custom item you would like to edit(this field is required): <input type="text" name="EditCustomItemDesc" required/></br></br>
			Enter the <u>name</u> you would like to change the custom item to: <input type="text" name="EditCustomItemChangeDesc" /></br></br>
			Enter the <u>size</u> of the custom item you would like to edit: <input type="text" name="EditCustomItemSize" /></br></br>
			Enter the <u>price</u> of the custom item you would like to edit: <input type="text" name="EditCustomItemPrice" /></br></br>
			Upload the <u>image</u> of the custom item you would like to edit: <input type="file" name="EditCustomItemImage"></br></br>			
			<input type="submit" value="Submit">	
		</form>
		
		<h2><u>DELETE CUSTOM ITEM</u></h2>
		<form method="post" id="customDeleteForm" name="customDelete" action="deleteCustom.php" onsubmit="return deleteCustomForm()">
			Enter the <u>name</u> of the custom item you would like to delete: <input type="text" name="DeleteCustomItemDesc" /></br></br>
			<input type="submit" value="Submit">
		</form>
	</body>
</html>