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
};

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
};

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
};

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
};

function editCardForm() {
	
};

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
};