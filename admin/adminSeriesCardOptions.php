<?php
session_start(); 
if (!isset($id))
{
	header("location:../admin-login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<!--
	this is the admin series and cards 
-->
<meta charset="UTF-8">
<title>Admin Home</title>
	<head>
		<script src = "admin-login-validation.js"></script>
		<link rel="styleSheet" href = "styles/generalAdmin.css">
		<link rel="styleSheet" href = "styles/admin_hompage.css">
		
				<script>
			function addSeriesForm() {
				var x=document.forms["seriesAddForm"]["AddSeriesID"].value;
				
			  	if (isNaN(x) || x<0) {
			    	alert("Please enter a number greater than zero");
			    	return false;
			  	}
			  	
			  	if(confirm("Are you sure you want to ADD the series?") == true) {
			  		//alert("You added the series");
			  	}
			  	else {
			  		//alert("Canceled! Series not added!");
			  		return false;
			  	}
			}
			
			function editSeriesForm() {
				var x=document.forms["seriesEditForm"]["EditSeriesID"].value;
				var y=dcouemnt.forms["seriesEditForm"]["NewSeriesID"].value;
				
				if (isNaN(x) || x<0) {
			    	alert("Please enter a number greater than zero");
			    	return false;
			  	}
			  	if (isNaN(y) || y<0) {
			    	alert("Please enter a number greater than zero");
			    	return false;
			  	}
			  	
			  	if(confirm("Are you sure you want to EDIT the series?") == true) {
			  		//alert("You edited the series");
			  	}
			  	else {
			  		//alert("Canceled! Series not edited!"); 
			  		return false;
			  	}
			}
			
			function deleteSeriesForm() {
				var x=document.forms["seriesDeleteForm"]["DeleteSeriesID"].value;
				
			  	if (isNaN(x) || x<0) {
			    	alert("Please enter a number greater than zero");
			    	return false;
			  	}
			  	
			  	if(confirm("Are you sure you want to DELETE the series?") == true) {
			  		//alert("You deleted the series");
			  	}
			  	else {
			  		//alert("Canceled! Series not deleted!");
			  		return false;
			  	}
			}
			
			function addCardForm() {
				var x=document.forms["cardAddForm"]["AddCardNumber"].value;
				var y=document.forms["cardAddForm"]["AddSeriesID"].value;
				
				if (isNaN(x) || x<0) {
			    	alert("Please enter a number greater than zero");
			    	return false;
			  	}
			  	if (isNaN(y) || y<0) {
			    	alert("Please enter a number greater than zero");
			    	return false;
			  	}
			  	
			  	if(confirm("Are you sure you want to ADD the card?") == true) {
			  		//alert("You added the card");
			  	}
			  	else {
			  		//alert("Canceled! Card not added!");
			  		return false;
			  	}
			}
			
			function editCardForm() {
				
			}
			
			function deleteCardForm() {
				var x=document.forms["cardDeleteForm"]["DeleteCardNumber"].value;
				var y=document.forms["cardDeleteForm"]["DeleteSeriesID"].value;
				
				if (isNaN(x) || x<0) {
			    	alert("Please enter a number greater than zero");
			    	return false;
			  	}
			  	if (isNaN(y) || y<0) {
			    	alert("Please enter a number greater than zero");
			    	return false;
			  	}
			  	
			  	if(confirm("Are you sure you want to DELETE the card?") == true) {
			  		//alert("You deleted the card");
			  	}
			  	else {
			  		//alert("Canceled! Card not deleted!");
			  		return false;
			  	}
			}
			
			function addCustomForm() {
			  	if(confirm("Are you sure you want to ADD the custom item?") == true) {
			  		//alert("You added the series");
			  	}
			  	else {
			  		//alert("Canceled! Series not added!");
			  		return false;
			  	}
			}
			
			function deleteCustomForm() {
			  	if(confirm("Are you sure you want to DELETE this custom item?") == true) {
			  		//alert("You deleted the series");
			  	}
			  	else {
			  		//alert("Canceled! Series not deleted!");
			  		return false;
			  	}
			}
		</script>
	</head>
  

<body>
	<header>
		<img src="images/logo.png" alt="Sporting Life Logo" id="logo">
		<div id="adminLbl">
			Administrator
		</div>
	</header>
	<nav>
		<ul>
			<li class="active">
				<a href="admin.php" id="card-sets">Home</a>	
			</li>
			<li class="active">
				<a href="" id="card-sets">Manage Card Sets</a>	
			</li>
			<li class="active">
				<a href="" id="PersOrders">Manage Personalized Orders</a>
			</li>
			<li class="active">
				<a href="admin-social-media.html" id="connection">Sporting Life Social Media</a>
			</li>
			<li class="active">
				<a href="" id="blog">Manage Blog</a>
			</li>
			<li class="active">
				<a href="" id="email">Emailing List</a>
			</li>
			<li class="active">
				<a href="" id="settings">Admin Settings</a>
			</li>
		</ul>
	</nav>

	<body>
		<h1><u>SERIES ADMIN OPTIONS</u></h1>
		<h2><u>ADD SERIES</u></h2>
		<form method="post" id="seriesAddForm" name="seriesInsert" action="insertSeries.php" onsubmit="return addSeriesForm()">
			Enter the <u>series number</u> you would like to add: <input type="text" name="AddSeriesID" /></br></br>	
			<input type="submit" value="Submit">	
		</form>
		
		<h2><u>EDIT SERIES</u></h2>
		<form method="post" id="seriesEditForm" name="seriesEdit" action="editSeries.php" onsubmit="return editSeriesForm()">
			Enter the <u>series number</u> you would like to edit: <input type="text" name="EditSeriesID" /></br></br>
			Enter what you would like to change the <u>series number</u> too. NOTE: this will change all cards of the series to the new series: <input type="text" name="NewSeriesID" /></br></br>
			<input type="submit" value="Submit">	
		</form>
		
		<h2><u>DELETE SERIES</u></h2>
		<form method="post" id="seriesDeleteForm" name="seriesDelete" action="deleteSeries.php" onsubmit="return deleteSeriesForm()">
			Enter the <u>series number</u> you would like to delete: <input type="text" name="DeleteSeriesID" /></br></br>
			<input type="submit" value="Submit">
		</form>
		
		<h1><u>CARDS ADMIN OPTIONS</u></h1>
		<h2><u>ADD CARD</u></h2>
		<form method="post" id="cardAddForm" name="cardInsert" action="insertCard.php" onsubmit="return addCardForm()" enctype="multipart/form-data">
			Enter the <u>series number</u> of the card you would like to add: <input type="text" name="AddSeriesID" /></br></br>
			Enter the <u>card number</u> you would like to add: <input type="text" name="AddCardNumber" /></br></br>
			Upload the <u>image</u> of the card: <input type="file" name="AddCardImage"></br></br>			
			<input type="submit" value="Submit">	
		</form>
		
		<h2><u>EDIT CARD</u></h2>
		<form method="post" id="cardEditForm" name="cardEdit" action="editCard.php" onsubmit="return editCardForm()" enctype="multipart/form-data">
			Enter the <u>series number</u> of the card you would like to edit: <input type="text" name="EditSeriesID" /> </br></br>
			Enter the <u>card number</u> you would like to edit: <input type="text" name="EditCardNumber" /></br></br>
			Enter the cards new <u>card number</u>: <input type="text" name="NewCardNumber" /></br></br>
			Enter the cards new <u>series number</u>: <input type="text" name="NewSeriesID"	/></br></br>
			Upload the cards new <u>image</u>: <input type="file" name="AddCardImage"></br></br>
			<input type="submit" value="Submit">	
		</form>
				
		<h2><u>DELETE CARD</u></h2>
		<form method="post" id="cardDeleteForm" name="cardDelete" action="deleteCard.php" onsubmit="return deleteCardForm()">
			Enter the <u>card number</u> you would like to delete: <input type="text" name="DeleteCardNumber" /></br></br>
			Enter the <u>series number</u> of the card you would like to delete: <input type="text" name="DeleteSeriesID" /></br></br>
			<input type="submit" value="Submit">
		</form>
		
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
		
		<h1><u>CUSTOMER ORDERS ADMIN OPTIONS</u></h1>
		<h2><u>VIEW CUSTOMER ORDERS</u></h2>
		<input type="button" value="Click" onclick="window.location.href='customerOrders.php'"> here to view all orders<br>
	</body>
</html>