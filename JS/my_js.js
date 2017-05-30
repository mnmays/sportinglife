// Validating Empty Field
function check_empty() {
if (document.getElementById('name').value == "" || document.getElementById('email').value == "" || document.getElementById('msg').value == "") {
alert("Fill All Fields !");
} else {
document.getElementById('form').submit();
alert("Form Submitted Successfully...");
}
}
//Function To Display Popup
var itemIndex= index;
var itemPrice = price;
var itemSize = size;
function div_show(index,size,price) {
document.getElementById('abc').style.display = "block";

document.getElementById("id1").value=index;


<?php		
require_once('database.php');

$sql="SELECT itemSize,itemPrice FROM customitems WHERE itemID = index";
$viewStmt =$db->prepare($sql);
$viewStmt->execute();

$itemList=$viewStmt->fetchAll();
$viewStmt->closeCursor(); ?>

document.getElementById("size1").value='. $item[itemSize]. ';
document.getElementById("price1").value='. $item[itemPrice]. ';



}
//Function to Hide Popup
function div_hide(){
document.getElementById("myForm").reset();
document.getElementById('abc').style.display = "none";
window.location = "http://localhost/aptanadir/sportinglife/products.php";  //will need to be updated with live site URL!!!

}

function checkForm()  //client side validation
{
	
	var firstName = document.getElementById("firstName1").value;
	var lastName = document.getElementById("lastName1").value;
	var emailAdd = document.getElementById("emailAdd1").value;
	var message = document.getElementById("message1").value;
	
	if(firstName==''||lastName==''||emailAdd==''||message=='')
	{
		alert("Please fill in all fields.");
		return false;
	}
	else
	{
		var firstName1 = document.getElementById("firstName");
		var lastName1 = document.getElementById("lastName");
		var emailAdd1 = document.getElementById("emailAdd");
		var message1 = document.getElementById("message");
		var quantity1= document.getElementById("quantity");
		if(firstName1.innerHTML == 'First name must be alpha characters only.'
		|| lastName1.innerHTML == 'Last name must be alpha characters only.'||emailAdd1.innerHTML == 'Invalid email address.'
		||message1.innerHTML=='Invalid message'||quantity1.innerHTML=='Invalid quantity.')
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
		}
	}
	
	
	
};