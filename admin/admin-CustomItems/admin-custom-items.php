<?php
//session_start(); 
//if (!isset($_SESSION["userid"]))
//{
	//header("location:../admin-login.php");
//}
?>

<!DOCTYPE html>
<html lang="en">
<!--
	this is the admin homepage
-->
<meta charset="UTF-8">
<title>Admin Home</title>
	<head>
		<script src = "admin-login-validation.js"></script>
		<link rel="styleSheet" href = "../styles/generalAdmin.css">
		<link rel="styleSheet" href = "../styles/admin_hompage.css">
	</head>
	<script>
		function addCustomForm() {
			var x=document.forms["customAddForm"]["AddCustomItemDesc"].value;
			var y=document.forms["customAddForm"]["AddCustomItemSize"].value;
			var z=document.forms["customAddForm"]["AddCustomItemPrice"].value;
			
		    if (x === null || x.trim() === "") {
		        alert("The custom item name cannot be blank!");
		        return false;
		    }
		    
		   	if (y === null || y.trim() === "") {
		        alert("The custom item size cannot be blank!");
		        return false;
		    }
		    
		   	if (z === null || z.trim() === "") {
		        alert("The custom item price cannot be blank!");
		        return false;
		    }
		    
		  	if(confirm("Are you sure you want to ADD the custom item?") == true) {
		  		//alert("You added the series");
		  	}
		  	
		  	else {
		  		//alert("Canceled! Series not added!");
		  		return false;
		  	}
		}
		
		function editCustomForm() {
			var w=document.forms["customEditForm"]["EditCustomItemChangeDesc"].value;

			if (w === null || w.trim() === "") {
		        alert("The custom item name cannot be blank!");
		        return false;
		    }

			 if(confirm("Are you sure you want to EDIT this custom item?") == true) {
		  		//alert("You eidted the item");
		  	}
		  	else {
		  		//alert("Canceled! Item not edited!");
		  		return false;
		  	}
		}
		
		function deleteCustomForm() {
		  	if(confirm("Are you sure you want to DELETE this custom item?") == true) {
		  		//alert("You deleted the item");
		  	}
		  	else {
		  		//alert("Canceled! Item not deleted!");
		  		return false;
		  	}
		}
	</script>
<body style="background-image:url(../../images/comerica-park-artwork.jpg); 
	opacity: 0.95" >
	<header>
		<img src="../../images/logo.png" alt="Sporting Life Logo" id="logo">
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
				<a href="admin-CardAndSeries/admin-cards-series.php" id="card-sets">Manage Card Sets and Series</a>	
			</li>
			<li class="active">
				<a href="admin-CustomItems/admin-custom-items.php" id="PersOrders">Manage Available Items</a>
			</li>
			<li class="active">
				<a href=".../admin-CustomOrders/customerOrders.php" id="email">Manage Custom Orders</a>
			</li>
			<li class="active">
				<a href="admin-email.php" id="email">Manage Emails</a>
			</li>
			<li class="active">
				<a href="mysite.php" id="settings">View My Site</a>
			</li>
			<li class="active">
				<a href="admin-settings.php" id="settings">Admin Settings</a>
			</li>
			<li class="active">
				<a href="adminFAQ.html" id="settings">Admin FAQs</a>
			</li>
		</ul>
	</nav>
	
	<article style= "background-color: white;">
		<div id="article" style="overflow-y:scroll;">
			<!--- this file allows the administrator to add, delete, and update the custome items available to the customer on the site --->
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
		</div> <!-- end article div -->
	</article>
	
</body>

</html>