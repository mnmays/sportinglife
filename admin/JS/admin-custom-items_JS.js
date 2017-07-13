function addCustomForm() {
  	if(confirm("Are you sure you want to ADD the custom item?") == true) {
  		//alert("You added the series");
  	}
  	else {
  		//alert("Canceled! Series not added!");
  		return false;
  	}
};

function deleteCustomForm() {
  	if(confirm("Are you sure you want to DELETE this custom item?") == true) {
  		//alert("You deleted the series");
  	}
  	else {
  		//alert("Canceled! Series not deleted!");
  		return false;
  	}
};