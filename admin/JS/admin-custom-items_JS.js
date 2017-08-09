function addCustomForm() {
  	if(confirm("Are you sure you want to ADD the custom item?") == true) {
  		//alert("You added the series");
  	}
  	else {
  		//alert("Canceled! Series not added!");
  		return false;
  	}
};

function editCustomForm() {
	 if(confirm("Are you sure you want to EDIT this custom item?") == true) {
  		//alert("You eidted the item");
  	}
  	else {
  		//alert("Canceled! Item not edited!");
  		return false;
  	}
};

function deleteCustomForm() {
  	if(confirm("Are you sure you want to DELETE this custom item?") == true) {
  		//alert("You deleted the item");
  	}
  	else {
  		//alert("Canceled! Item not deleted!");
  		return false;
  	}
};