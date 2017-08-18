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
};

function editSeriesForm() {
  	if(confirm("Are you sure you want to EDIT the series?") == true) {
  		//alert("You edited the series");
  	}
  	else {
  		//alert("Canceled! Series not edited!"); 
  		return false;
  	}
};

function deleteSeriesForm() {
  	if(confirm("Are you sure you want to DELETE the series?") == true) {
  		//alert("You deleted the series");
  	}
  	else {
  		//alert("Canceled! Series not deleted!");
  		return false;
  	}
};

function addCardForm() {
  	if(confirm("Are you sure you want to ADD the card?") == true) {
  		//alert("You added the card");
  	}
  	else {
  		//alert("Canceled! Card not added!");
  		return false;
  	}
};

function editCardForm() {
  	if(confirm("Are you sure you want to EDIT this card?")==true) {
  		//alert("You edited the card");
  	}else {
  		return false;
  	}
};

function deleteCardForm() {
  	if(confirm("Are you sure you want to DELETE the card?") == true) {
  		//alert("You deleted the card");
  	}
  	else {
  		//alert("Canceled! Card not deleted!");
  		return false;
  	}
};
