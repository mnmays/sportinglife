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
		<link rel="styleSheet" href = "styles/admin_hompage.css">
	</head>

<script>
	function addSeriesForm() {
		var x=document.forms["seriesAddForm"]["AddSeriesID"].value;
	
	    if (x === null || x.trim() === "") {
	        alert("The series requires atleast one character!");
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
		var y=document.forms["seriesEditForm"]["NewSeriesID"].value;
	
	    if (x === null || x.trim() === "") {
	        alert("The series requires atleast one character!");
	        return false;
	    }
	    
	   	if (y === null || y.trim() === "") {
	        alert("The series requires atleast one character!");
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
		var y=document.forms["cardAddForm"]["AddCardName"].value;
	
	    if (x === null || x.trim() === "") {
	        alert("The card number cannot be empty!");
	        return false;
	    }
	    
	   	if (y === null || y.trim() === "") {
	        alert("The card name must contain atleast one character!");
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
		var x=document.forms["cardEditForm"]["NewSeriesID"].value;
		var y=document.forms["cardEditForm"]["NewCardNumber"].value;
	
	    if (x === null || x.trim() === "") {
	        alert("The new series number cannot be empty!");
	        return false;
	    }
	    
	   	if (y === null || y.trim() === "") {
	        alert("The new card number cannot be empty!");
	        return false;
	    }
	    
	  	if(confirm("Are you sure you want to EDIT this card?")==true) {
	  		//alert("You edited the card");
	  	}else {
	  		return false;
	  	}
	}
	
	function deleteCardForm() {
	  	if(confirm("Are you sure you want to DELETE the card?") == true) {
	  		//alert("You deleted the card");
	  	}
	  	else {
	  		//alert("Canceled! Card not deleted!");
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
				<a href="../admin-CustomItems/admin-custom-items.php" id="PersOrders">Manage Available Items</a>
			</li>
			<li class="active">
				<a href="../admin-CustomOrders/customerOrders.php" id="email">Manage Custom Orders</a>
			</li>
			<li class="active">
				<a href="../admin-email.php" id="email">Manage Emails</a>
			</li>
			<li class="active">
				<a href="../mysite.php" id="settings">View My Site</a>
			</li>
			<li class="active">
				<a href="../admin-settings.php" id="settings">Admin Settings</a>
			</li>
			<li class="active">
				<a href="../adminFAQ.html" id="settings">Admin FAQs</a>
			</li>
		</ul>
	</nav>
	
	<article style= "background-color: white;">
		<div id="article" style="overflow-y:scroll;">
			<!--- this file allows the administrator to add, delete, and update the cards and series that are visible on the website --->	
	<body>
		<h1><u>SERIES ADMIN OPTIONS</u></h1>
		<h2><u>ADD SERIES</u></h2>
		<form method="post" id="seriesAddForm" name="seriesInsert" action="addSeries.php" onsubmit="return addSeriesForm()">
			Enter the <u>series number</u> you would like to add: <input type="text" name="AddSeriesID" required/></br></br>	
			<input type="submit" value="Submit">
		</form>
		
		<h2><u>EDIT SERIES</u></h2>
		<form method="post" id="seriesEditForm" name="seriesEdit" action="editSeries.php" onsubmit="return editSeriesForm()">
			Enter the <u>series</u> you would like to edit: <input type="text" name="EditSeriesID" required/></br></br>
			Enter what you would like to change the name of the <u>series</u> too. NOTE: this will change all cards of the series to the new series: <input type="text" name="NewSeriesID" required/></br></br>
			<input type="submit" value="Submit">	
		</form>
		
		<h2><u>DELETE SERIES</u></h2>
		<form method="post" id="seriesDeleteForm" name="seriesDelete" action="deleteSeries.php" onsubmit="return deleteSeriesForm()">
			Enter the <u>series number</u> you would like to delete: <input type="text" name="DeleteSeriesID" required/></br></br>
			<input type="submit" value="Submit">
		</form>
		
		<h1><u>CARDS ADMIN OPTIONS</u></h1>
		<h2><u>ADD CARD</u></h2>
		<form method="post" id="cardAddForm" name="cardInsert" action="addCard.php" onsubmit="return addCardForm()" enctype="multipart/form-data">
			Enter the <u>series number</u> of the card you would like to add: <input type="text" name="AddSeriesID" required/></br></br>
			Enter the <u>card number</u> you would like to add: <input type="text" name="AddCardNumber" required/></br></br>
			Enter the <u>name</u> of the card you would like to add: <input type="text" name="AddCardName" required/></br></br>
			Upload the <u>image</u> of the card: <input type="file" name="fileToUpload" id="fileToUpload" required></br></br>			
			<input type="submit" value="Submit">
		</form>
		
		<h2><u>EDIT CARD</u></h2>
		<form method="post" id="cardEditForm" name="cardEdit" action="editCard.php" onsubmit="return editCardForm()" enctype="multipart/form-data">
			Enter the <u>series number</u> of the card you would like to edit: <input type="text" name="EditSeriesID" required/> </br></br>
			Enter the <u>card number</u> you would like to edit: <input type="text" name="EditCardNumber" required/></br></br>
			Enter the cards new <u>series number</u>: <input type="text" name="NewSeriesID"	required/></br></br>
			Enter the cards new <u>card number</u>: <input type="text" name="NewCardNumber" required/></br></br>			
			Enter the cards new <u>player name</u>: <input type="text" name="EditCardName" /><br></br>		
			Upload the cards new <u>image</u>: <input type="file" name="fileToUpload" id="fileToUpload" ></br></br>
			<input type="submit" value="Submit">
		</form>
				
		<h2><u>DELETE CARD</u></h2>
		<form method="post" id="cardDeleteForm" name="cardDelete" action="deleteCard.php" onsubmit="return deleteCardForm()">
			Enter the <u>series number</u> of the card you would like to delete: <input type="text" name="DeleteSeriesID" required/></br></br>
			Enter the <u>card number</u> you would like to delete: <input type="text" name="DeleteCardNumber" required/></br></br>			
			<input type="submit" value="Submit">
		</form>
		</div>
	</article>
	
</body>

</html>