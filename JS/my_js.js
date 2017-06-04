// Validating Empty Field
function check_empty() {
if (document.getElementById('msg').value == ""||document.getElementById('quantity').value == "") {
alert("Fill All Fields !");
} else {
document.getElementById('form').submit();
alert("Form Submitted Successfully...");
}
}
//Function To Display Popup
//var itemIndex= index;
//var itemPrice = price;
//var itemSize = size;
function div_show(index) {
document.getElementById('abc').style.display = "block";

document.getElementById("id1").value=index;

}
function div_show2(index) {
document.getElementById('abc').style.display = "block";

document.getElementById("cartID1").value=index;

}
//Function to Hide Popup
function div_hide(){
document.getElementById("myForm").reset();
document.getElementById('abc').style.display = "none";
//window.location = "http://localhost/aptanadir/sportinglife/products.php";  //will need to be updated with live site URL!!!

}

function checkForm()  //client side validation
{
	
	var message = document.getElementById("message1").value;
	var quantity= document.getElementById("quantity1").value;
	
	if(message==''||quantity=='')
	{
		alert("Please fill in all fields.");
		return false;
	}
	else
	{
		var message1 = document.getElementById("message");
		var quantity1= document.getElementById("quantity");
		if(message1.innerHTML=='Invalid message'||quantity1.innerHTML=='Invalid quantity.')
		{
			alert("Correct invalid information.");
			return false;
		}
		/*else
		{
			var xmlhttp;
			xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET", "contactValidation.php",true);
			xmlhttp.send();
			
		}*/
		else
		{
		alert("Success!");
			var xmlhttp;
			xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET", "shopping-cart.php?cookie="+cookie,true);
			xmlhttp.send();
		}
	}
	
	
	
};

function checkForm2()  //client side validation
{
	
	//var message = document.getElementById("message1").value;
	var quantity= document.getElementById("quantity1").value;
	
	if(quantity=='')
	{
		alert("Please fill in all fields.");
		return false;
	}
	else
	{
		//var message1 = document.getElementById("message");
		var quantity1= document.getElementById("quantity");
		if(quantity1.innerHTML=='Invalid quantity.')
		{
			alert("Correct invalid information.");
			return false;
		}
		/*else
		{
			var xmlhttp;
			xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET", "contactValidation.php",true);
			xmlhttp.send();
			
		}*/
		else
		{
		alert("Success!");
			var xmlhttp;
			xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET", "shopping-cart.php?cookie="+cookie,true);
			xmlhttp.send();
		}
	}
	
	
	
};


function clearCart()
{
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET", "clearCart.php",true);
	xmlhttp.send();
};

function validate(field,query)  //server side validation
{
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		
		
		if (this.readyState != 4 && this.status == 200)
		{
			document.getElementById(field).innerHTML ="validating";
		}
		
		else if (this.readyState ==4 && this.status == 200)
		{
			document.getElementById(field).innerHTML = xmlhttp.responseText;
			
		}
		else
		{
			document.getElementById(field).innerHTML = "Error Occurred.";
		}
	};

	
	xmlhttp.open("GET", "orderValidation.php?field=" + field +"&query=" + query,true);
	xmlhttp.send();
	
};