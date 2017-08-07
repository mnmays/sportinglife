<html>
	<!--- this file allows the administrator to add, delete, and update the cards and series that are visible on the website --->
	<head>
		<script type="text/javascript" src="JS/admin-cards-series_JS.js"></script>
	</head>
	<body>
		<h1><u>SERIES ADMIN OPTIONS</u></h1>
		<h2><u>ADD SERIES</u></h2>
		<form method="post" id="seriesAddForm" name="seriesInsert" action="addSeries.php" onsubmit="return addSeriesForm()">
			Enter the <u>series number</u> you would like to add: <input type="text" name="AddSeriesID" required/></br></br>	
			<input type="submit" value="Submit">
		</form>
		
		<h2><u>EDIT SERIES</u></h2>
		<form method="post" id="seriesEditForm" name="seriesEdit" action="editSeries.php" onsubmit="return editSeriesForm()">
			Enter the <u>series number</u> you would like to edit: <input type="text" name="EditSeriesID" required/></br></br>
			Enter what you would like to change the <u>series number</u> too. NOTE: this will change all cards of the series to the new series: <input type="text" name="NewSeriesID" required/></br></br>
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
			Enter the <u>series number</u> of the card you would like to edit: <input type="text" name="EditSeriesID" /> </br></br>
			Enter the <u>card number</u> you would like to edit: <input type="text" name="EditCardNumber" /></br></br>
			Enter the cards new <u>series number</u>: <input type="text" name="NewSeriesID"	/></br></br>
			Enter the cards new <u>card number</u>: <input type="text" name="NewCardNumber" /></br></br>			
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
	</body>
</html>